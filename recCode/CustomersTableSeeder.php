<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Customer;
use App\Role;
use App\User;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_customer = Role::where('name', 'customer')->first();

        $faker = Factory::create();
        for ($i = 0; $i !=100; $i++) {
            $customer_user = new User();
            $customer_user->name = $faker->name;
            $customer_user->email = $faker->email;
            $customer_user->password = bcrypt('secret');
            $customer_user->save();
            $customer_user->roles()->attach($role_customer);

            $customer = new Customer();
            $customer->addressLine1 = $faker->streetAddress;
            $customer->addressLine2 = $faker->secondaryAddress;
            $customer->town = $faker->city;
            $customer->county = $faker->state;
            $customer->nameOnCard = $customer_user->name;
            $customer->cardNumber = $faker->creditCardNumber;
            $customer->expiryDate = $faker->creditCardExpirationDateString;
            $customer->cvv = "" . rand(pow(10, 2), pow(10, 3)-1);
            $customer->user_id = $customer_user->id;
            $customer->save();
        }
    }
}
