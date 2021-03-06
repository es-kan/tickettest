<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MatchesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(StandsTableSeeder::class);
        $this->call(TicketStocksTableSeeder::class);
    }
}
