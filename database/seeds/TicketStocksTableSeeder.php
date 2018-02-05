<?php

use Illuminate\Database\Seeder;
use App\Match;
use App\Category;
use App\Stand;
use App\TicketStock;


class TicketStocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TicketStock::truncate();

        $faker = \Faker\Factory::create();
        $matches = Match::all();
        $categories = Category::all();
        $stands = Stand::all();

        foreach($matches as $match){
            foreach($categories as $category){
                foreach($stands as $stand){
                    /// create a ticket stock
                    TicketStock::create([
                        'size' => $faker->numberBetween($min=2, $max=10),
                        'match_id' => $match->id,
                        'category_id' => $category->id,
                        'stand_id' => $stand->id,
                    ]);
                }
            }
        }
    }
}
