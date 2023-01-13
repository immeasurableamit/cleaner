<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Notifications\Cleaner\OrderReminder;
use App\Models\Order;

class SendOrderReminders extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'send:order-reminders';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'It will send reminders to cleaner of orders they have been scheduled for after 24 hours';

	/**
	 * Execute the console command.
	 *
	 * @return int
	 */
	public function handle()
	{
//		$fromTime = now()->addDay()->startOfHour();
//		$toTime   = now()->addDay()->endOfHour();

		$orders = Order::with('cleaner')->where('status','payment_collected')
//			->where("cleaning_datetime", ">=", $fromTime )
//			->where('cleaning_datetime', '<=', $toTime )
            ->where('is_reminder_sent', 0)->get();

		foreach ( $orders as $order )
		{
			$order->cleaner->notify(new OrderReminder($order));

            $order->is_reminder_sent = 1;
            $order->save();
		}

		return Command::SUCCESS;
	}
}
