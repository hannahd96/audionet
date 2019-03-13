<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Order;
use App\Movie;
use App\Customer;
use App\User;
use App\Role;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_customer = Role::where('name', 'customer')->first();
        $customers = $role_customer->users;
        $movies = Movie::all();
        $faker = Factory::create();

        for ($i = 0; $i !=100; $i++) {
            $order = new Order();
            $order->date = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null);
            $order->customer_id = $customers->random()->customer->id;
            $order->save();

            $orderMovies = collect([]);
            $num = rand(1,5);
            for ($j = 0; $j != $num; $j++) {
                $movie = $movies->random();
                if (!$orderMovies->contains($movie)) {
                    $orderMovies->push($movie);
                    $quantity = rand(1,3);
                    $order->movies()->attach($movie->id, ['quantity' => $quantity]);
                }
            }
        }
    }
}
