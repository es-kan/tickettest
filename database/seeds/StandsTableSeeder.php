<?php

use Illuminate\Database\Seeder;
use App\Stand;

class StandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      /// Let's truncate our existing records to start from scratch.
      Stand::truncate();

      $faker = \Faker\Factory::create();
      $stand_names = array('Noord', 'Oost', 'Zuid', 'West', 'Eretribune');
      foreach($stand_names as $name) {
          Stand::create([
              'name' => $name,
              'price_mod' => $faker->randomFloat($nbMaxDecimals = 2, $min = -2, $max = 10.0),
          ]);
      }
    }
}
