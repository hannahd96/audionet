<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\User;
use App\Song;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $songs = Song::all();
        for ($i = 0; $i !=50; $i++) {
            $u = new User();
            $u->name = $faker->name;
            $u->email = $faker->email;
            $u->password = bcrypt("secret");
            $u->favourite_song = $songs->random()->title;
            $u->save();
        }
    }
}
