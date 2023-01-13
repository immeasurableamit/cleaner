<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \Faker\Factory;
use App\Models\User;
use App\Models\UserDetails;
use Illuminate\Support\Facades\Hash;


class GenerateCustomer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:customer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $faker = Factory::create();
        $password = '123456789';

        $user = User::create([
            'role' => 'customer',
            'first_name' => $faker->firstName(),
            'last_name'  => $faker->lastName(),
            'email' => $faker->email(),
            'password' => Hash::make( $password ),
            'email_verified_at' => now(),
            'contact_number' => $faker->randomNumber(9, true ),
        ]);


        $userDetails = UserDetails::create([
            'user_id'   => $user->id,
            'about'     => $faker->realText(100),
            'dob'       => today()->subYears(rand(5,15) )->toDateString(),
            'ssn_or_tax' => $faker->randomNumber(5, true),
            'apt_or_unit' => $faker->randomNumber(3, true),
            'address'     => '12149 Farm-to-Market 1960 Rd',
            'city'        => 'Houston',
            'states_id'   => 51, // it's a taxas
            'zip_code'   => '77065',
            'payment_method' => 'none',
            'latitude' => 29.923976,
            'longitude' => -95.599301,
        ]);

        $this->info(PHP_EOL.'CUSTOMER USER GENERATED!'.PHP_EOL);
        $this->info("Email: $user->email".PHP_EOL);
        $this->info("Password: $password".PHP_EOL);
        return Command::SUCCESS;
    }
}
