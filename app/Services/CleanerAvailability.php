<?php

namespace App\Services;

use App\Models\User;
use \Carbon\CarbonInterval;
use \Carbon\Carbon;
use Exception;
use App\Models\CleanerPrescheduledOffTime;

class CleanerAvailability {


    protected $slotIntervalInMinutes = 30, $cleaner, $timeFormat = "H:i:s";

    public function __construct(User $cleaner)
    {
        if ( ! $cleaner->role == "cleaner" ){
            throw new Exception(User::class." should be cleaner");
        }

        $this->cleaner = $cleaner;
        $this->cleaner->loadMissing('cleanerHours');
    }


    public function weekdays(bool $inNumbers = true):array
    {
        $weekdaysNames = $this->cleaner->cleanerHours->pluck('day')->unique()->map('strtolower')->toArray();

        if ( $inNumbers ){
            $weekdaysInNumbers = parseWeekdaysNameIntoWeekDaysNumber( $weekdaysNames );
            return $weekdaysInNumbers;
        } 
        
        return $weekdaysNames;
    }

    public function getSlotsByWeekday(int $weekday)
    {
        $weekdayName = Carbon::getDays()[ $weekday];

         /* Get from and to time from cleaner hours table of selected day */
         $cleanerTimeSlots = $this->cleaner->cleanerHours->where('day', $weekdayName )->pluck('to_time', 'from_time');         

         /* Parse those time to display in frontend */
         $timeSlotsForCustomer = [];
         foreach ( $cleanerTimeSlots as $from => $to ) {
 
             $startTimeOfEachTimeSlot = CarbonInterval::minutes( $this->slotIntervalInMinutes)->toPeriod( $from, $to )->toArray();

             foreach ( $startTimeOfEachTimeSlot as $startTime ){
                $slot = [
                    'start_time' => $startTime->format( $this->timeFormat ),
                    'end_time'   => $startTime->copy()->addMinutes( $this->slotIntervalInMinutes )->format( $this->timeFormat ),
                    'date'  => $startTime->toDateString(),
                ];           
                
                if ( ! in_array( $slot, $timeSlotsForCustomer ) ){
                    array_push( $timeSlotsForCustomer, $slot);
                }                
             }

         }

         return $timeSlotsForCustomer;
    }

    public function getNumberOfScheduledOrdersCleanerHasInSlot( string $date, string $startTime, string $endTime )
    {
        $this->cleaner->loadMissing('cleanerOrders');

        $date      = Carbon::parse( $date )->toDateString();
        $startTime = Carbon::parse( $startTime )->toTimeString();
        $endTime   = Carbon::parse( $endTime )->toTimeString();

        $startDateTime = Carbon::createFromFormat("Y-m-d H:i:s", "$date $startTime")->startOfMinute();
        $endDateTime   = Carbon::createFromFormat("Y-m-d H:i:s", "$date $endTime")->startOfMinute();        

        $totalOrdersInSlot = 0;
        $scheduledOrders = $this->cleaner->cleanerOrders->whereIn('status', ['pending', 'accepted', 'payment_collected']);
        
        foreach ( $scheduledOrders as $scheduledOrder ){

            $orderStartDateTime = $scheduledOrder->cleaning_datetime;
            $orderEndDateTime   = $scheduledOrder->cleaning_datetime->copy()->addMinute( $this->slotIntervalInMinutes );

            if ( $orderStartDateTime->greaterThanOrEqualTo($startDateTime) && $orderEndDateTime->lessThanOrEqualTo($endDateTime) ){                
                $totalOrdersInSlot++;                
            }
        }

        return $totalOrdersInSlot;
    }

    public function isSlotSetAsPrescheduledOff(string $date, string $startTime, string $endTime ):bool 
    {           
        $this->cleaner->loadMissing('cleanerPrescheduledOffs');
        $offs = $this->cleaner->cleanerPrescheduledOffs;
        
        
        $date      = Carbon::parse( $date )->toDateString();
        $startTime = Carbon::parse( $startTime )->toTimeString();
        $endTime   = Carbon::parse( $endTime )->toTimeString();

        $startDateTime = Carbon::createFromFormat("Y-m-d H:i:s", "$date $startTime")->startOfMinute();
        $endDateTime   = Carbon::createFromFormat("Y-m-d H:i:s", "$date $endTime")->startOfMinute();

        foreach ( $offs as $off ) {
            $offStartDateTime = Carbon::createFromFormat("Y-m-d H:i:s", $off['date']." ".$off['from_time']);
            $offEndDateTime   = Carbon::createFromFormat("Y-m-d H:i:s", $off['date']." ".$off['to_time']);
        
            if ( $startDateTime->greaterThanOrEqualTo($offStartDateTime) && $endDateTime->lessThanOrEqualTo($offEndDateTime)) {
                return true;
            }

            /*
            if ( $slot['start_time']  >= $off['from_time'] && $slot['end_time'] <= $off['to_time'] ){
                return true;
            }
            */
        }

        return false;
    }

    protected function isSlotAvailable(string $date, array $slot ): bool
    {
        $slotSetAsPrescheduledOff = $this->isSlotSetAsPrescheduledOff($date, $slot['start_time'], $slot['end_time']);

        if ( $slotSetAsPrescheduledOff ) {
            return false;
        }

        $totalOrdersInSlot = $this->getNumberOfScheduledOrdersCleanerHasInSlot($date, $slot['start_time'], $slot['end_time']);
        $maxOrdersAllowedForSameTime  = $this->cleaner->UserDetails->jobs;
        if  ( $totalOrdersInSlot >=  $maxOrdersAllowedForSameTime ) {
            return false;
        }

        return true;
    }

    private function markAvailabilityInEachSlot(string $date, array $slots): array
    {
        foreach ( $slots as $index => $slot ){

            $slots[$index]['is_available'] = false;

            if ( $this->isSlotAvailable( $date, $slot ) ){
                $slots[$index]['is_available'] = true;
                
            }
        }

        return $slots;
    }


    public function getAvailableSlotsByDate(string $date): array
    {
        $weekday              = Carbon::parse( $date )->dayOfWeek;
        $allSlotsInDate       = $this->getSlotsByWeekday($weekday);
        $availableSlotsInDate = $this->markAvailabilityInEachSlot($date, $allSlotsInDate);
        return $availableSlotsInDate;
    }

    public function slotIntervalMinutes($minutes)
    {
        $this->slotIntervalInMinutes = $minutes;
        return $this;
    }

}