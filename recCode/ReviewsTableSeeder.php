<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\Review;
use App\Customer;
use App\Movie;
use App\User;
use App\Role;

class ReviewsTableSeeder extends Seeder
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

        for ($i = 0; $i != 300; $i++) {
            $review = new Review();
            $review->title = $faker->realText($maxNbChars = 20, $indexSize = 2);
            $review->text = $faker->paragraph($nbSentences = 2, $variableNbSentences = false);
            $review->starRating = rand(1,5);
            $review->date = $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null);
            $review->customer_id = $customers->random()->customer->id;
            $review->movie_id = $movies->random()->id;
            $review->save();
        }
    }
}
