<?php

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Crêpes normandes',
                'description' => 'Superbes crêpes, délicieuses à manger !',
                'image' => 'https://static.cuisineaz.com/400x320/i138956-crepes-sans-oeufs.jpeg',
                'priority' => '100',
                'available' => true,
                'price' => 1.2,
                'points' => 10
            ],
            [
                'name' => 'Muffins normands',
                'description' => 'De superbes muffins au bon camembert Normand !',
                'image' => 'https://2.bp.blogspot.com/-_YeCqYC-mLk/UgH3ropSFOI/AAAAAAAAAvc/DK6gxOO86BE/s1600/bdefIMG_8265.jpg',
                'priority' => '100',
                'available' => true,
                'price' => 2.5,
                'points' => 20
            ],
            [
                'name' => 'Tarte aux pommes normandes',
                'description' => 'De superbes part de tartes aux pommes normandes !',
                'image' => 'https://www.mesinspirationsculinaires.com/wp-content/uploads/2016/11/recette-tarte-aux-pommes-a-la-creme-patissiere-1-600x330.jpg',
                'priority' => '100',
                'available' => true,
                'price' => 2.6,
                'points' => 25
            ]
        ]);

        Product::factory()->count(10)->create();
    }
}
