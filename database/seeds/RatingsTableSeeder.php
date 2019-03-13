<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use App\User;
use App\Song;
use App\SongRating;

class RatingsTableSeeder extends Seeder
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
        $users = User::all();
        for ($i = 0; $i != 250; $i++) {
            $rating = new SongRating();
            $user_id = $users->random()->id;
            $song_id = $songs->random()->id;
            $query = SongRating::where('user_id', '=', $user_id);
            $query = $query->where('song_id', '=', $song_id);
            if ($query->get()->count() == 0) {
                $rating->user_id = $user_id;
                $rating->song_id = $song_id;
                $rating->rating = rand(1, 10);
                $rating->save();
            }
        }
    }
}
