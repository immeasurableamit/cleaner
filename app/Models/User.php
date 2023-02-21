<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\BillingAddress;
use App\Notifications\CustomChannels\TwilioChannel;
use App\Notifications\VerifyEmail;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'role',
        'first_name',
        'last_name',
        'email',
        'password',
        'image',
        'contact_number',
        'status',
        'email_verified_at',
        'last_active_at'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'name', 'profile_pic', 'unread_messages', 'online', 'online_date'
    ];

    protected $with = ['UserDetails'];

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getOnlineAttribute()
    {
        $newTime = \Carbon\Carbon::now()->subMinutes(10)->timestamp;

        $userLast = strtotime($this->last_active_at);

        if($userLast > $newTime){
            return 1;
        }
        return 0;
    }

    public function getOnlineDateAttribute()
    {
        $date = date('m-d-Y', strtotime($this->last_active_at));
        $dateDay = date('l', strtotime($this->last_active_at));
        $time = date('h:ma', strtotime($this->last_active_at));

        $newDate = \Carbon\Carbon::now()->subDays(6)->format('m-d-Y');

        if($date >= $newDate){
            return $dateDay.' '.$time;
        }
        return $date.' '.$time;
    }


    public function getProfilePicAttribute(){
        if($this->image){
            return asset('storage/images/'.$this->image);
        }

        return asset('no-user.jpg');
    }

    public function getUnreadMessagesAttribute(){
        return $this->messages()->where('read', '0')->count();
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'rec_id', 'id');
    }

    public function messagesSender()
    {
        return $this->hasMany(Message::class, 'sender_id', 'id');
    }




    public function UserDetails()

    {
        return $this->hasOne(UserDetails::class, 'user_id', 'id');
    }

    public function cleanerTeam()
    {
        return $this->hasMany(CleanerTeam::class, 'user_id', 'id');
    }

    public function cleanerHours()
    {
        return $this->hasMany(CleanerHours::class, 'users_id', 'id');
    }

    public function cleanerServices()
    {
        return $this->hasMany(CleanerServices::class, 'users_id', 'id');
    }


    public static function getDays()
    {
        return ['Monday' => 'Monday', 'Tuesday' => 'Tuesday', 'Wednesday' => 'Wednesday', 'Thursday' => 'Thursday', 'Friday' => 'Friday', 'Saturday' => 'Saturday', 'Sunday' => 'Sunday'];
    }

    public function bankInfo()
    {
        return $this->hasOne(BankInfo::class, 'users_id', 'id');
    }

    public function billing_address()
    {
        return $this->hasOne(BillingAddress::class);
    }

    public function card()
    {
        return $this->hasOne(UserCard::class, 'user_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function ordersReview()
    {
        return $this->hasMany(Order::class, 'cleaner_id', 'id');
    }

    public function hasCleanerSetHisServedLocations()
    {
        $userDetails = $this->UserDetails;
        $result      = $userDetails->serve_center_lat &&  $userDetails->serve_center_lng && $userDetails->serve_radius_in_meters;
        return $result;
    }

    /* Cleaner user function */
    public function isWithInRadius($lat, $lng)
    {

        $distanceInKm = getDistance(
            (float) $lat,
            (float) $lng,
            (float) $this->UserDetails->serve_center_lat,
            (float) $this->UserDetails->serve_center_lng,
        );


        $radiusInKm = convertMeters( $this->UserDetails->serve_radius_in_meters, "km" );
        return $distanceInKm <= $radiusInKm;
    }

    /* Customer user function */
    public function favourites()
    {
        return $this->hasMany(Favourite::class, 'user_id', 'id');
    }

    /* Cleaner user function */

    public function cleanerReviews()
    {
        return $this->hasMany(Review::class, 'cleaner_id');
    }

    /* Customer user function */
    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id');
    }

    /* cleaner user function */

    public function isEligibleForListing()
    {
        if ( $this->hasCleanerSetHisServedLocations() === false ) {
            return false;
        }

        if ( $this->cleanerHours->isEmpty() ){
            return false;
        }

        if ( $this->cleanerServices->where('status', '1')->isEmpty() ){
            return false;
        }

        if ( ! $this->bankInfo ){
            return false;
        }

        return true;
    }

    // cleaner user function
    public function avgRating()
    {
        return $this->cleanerReviews->avg('rating');
    }

/**
 * Send the email verification notification.
 *
 * @return void
 */
public function sendEmailVerificationNotification()
{
    $this->notify(new VerifyEmail); // my notification
}

	public function cleanerOrders()
	{
		return $this->hasMany( Order::class, 'cleaner_id', 'id' );
	}

    public function getContactNumberWithCountryCodeAttribute()
    {
        $contactNumber = config('app.country_prefix_for_phone_number').$this->contact_number;
        return $contactNumber;
    }

    public function autoVerifyEmailIfNotVerified()
    {
        if ( ! $this->hasVerifiedEmail() ){
            $this->markEmailAsVerified();
        }

        return true;
    }    

    public function subscribedNotificationChannels():array
    {
        $channels = [];

        if ( $this->UserDetails->sms_marketing ) {
            array_push( $channels, TwilioChannel::class);
        }

        if ( $this->UserDetails->email_marketing ) {
            array_push( $channels, 'mail');
        }
                
        return $channels;
    }

    public function cleanerPrescheduledOffs()
    {
        return $this->hasMany( CleanerPrescheduledOffTime::class, 'user_id', 'id');
    }

    public function cleanerServicesDescriptions()
    {
        return $this->hasMany( CleanerServicesIncluded::class, 'cleaner_id');
    }

    public function cleanerDiscounts()
    {
        return $this->hasMany( CleanerDiscount::class, 'user_id', 'id');
    }

    public function transactions()
    {
        return $this->hasMany( Transaction::class, 'user_id', 'id');        
    }
}
