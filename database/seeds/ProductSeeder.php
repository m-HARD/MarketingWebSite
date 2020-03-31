<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        
        
        for ($i=0; $i < 7 ; $i++) { 
            DB::table('products')->insert([
                'name'   =>  $faker->randomElement($array = [
                    'MacBook Pro (15 inch)',
                    'Samsung Galaxy Note 7',
                    'iPhone 7 cover',
                    'iPad Pro (9.7 inch)',
                    'OnePlus 3 cover'
                    ]),
                'description' => $faker->randomElement($array = [
                    'This one might not last for so long, but hey, printers never work anyways, right?',
                    'Unlike the overpriced MacBook Pro, we\'re selling this one a bit cheap, as we heard it might explode...',
                    'This one might not last for so long, but hey, printers never work anyways, right?',
                    'Having problems keeping a hold of that phone, huh? Ever considered not dropping it in the first place?',
                    'Does your phone spend most of its time on the ground? This cheap piece of plastic is the solution!'
                    ]),
                'price'  => $faker->numberBetween($min = 0, $max = 4000),
                'inStock'  => $faker->numberBetween($min = 0, $max = 20),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
