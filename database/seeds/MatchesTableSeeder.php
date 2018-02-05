<?php

use Illuminate\Database\Seeder;
use App\Match;

class MatchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Match::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 5; $i++) {
            Match::create([
                'date_scheduled' => $faker->unique()->date,
                'base_price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 0, $max = 50.0),
            ]);
        }
    }
}
