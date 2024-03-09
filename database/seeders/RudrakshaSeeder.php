<?php

namespace Database\Seeders;

use App\Models\Rudraksha;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class RudrakshaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i=0; $i < 10; $i++) { 
            $rudra = new Rudraksha();
            $rudra->report_number = $faker->randomNumber(5, true);
            $rudra->type = 4;
            $rudra->weight = $faker->word();
            $rudra->dimension = $faker->randomNumber(2, true);
            $rudra->color = $faker->word();
            $rudra->shape = $faker->randomNumber(2, true);
            $rudra->natural_face = $faker->word();
            $rudra->artificial_face = $faker->colorName();
            $rudra->test = $faker->word();
            $rudra->origin = $faker->word();
            $rudra->image = "img";
            $rudra->comments = $faker->sentence();
            $rudra->save();
        }
    }
}
