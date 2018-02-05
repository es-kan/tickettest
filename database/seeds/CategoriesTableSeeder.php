<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /// Let's truncate our existing records to start from scratch.
        Category::truncate();

        $faker = \Faker\Factory::create();
        $category_names = array('Category One', 'Category Two');
        foreach($category_names as $name) {
            Category::create([
                'name' => $name,
                'price_mod' => $faker->randomFloat($nbMaxDecimals = 2, $min = -2, $max = 10.0),
            ]);
        }
    }
}
