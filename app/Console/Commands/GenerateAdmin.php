<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use \Faker\Factory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class GenerateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates an admin user';

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
            'role' => 'admin',
            'first_name' => $faker->firstName(),
            'last_name'  => $faker->lastName(),
            'email' => $faker->email(),
            'password' => Hash::make( $password ),
            'email_verified_at' => now(),
            'contact_number' => $faker->randomNumber(9, true ),
        ]);

        $this->info(PHP_EOL.'ADMIN USER GENERATED!'.PHP_EOL);
        $this->info("Email: $user->email".PHP_EOL);
        $this->info("Password: $password".PHP_EOL);

        return Command::SUCCESS;
    }
}
