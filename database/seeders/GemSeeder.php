<?php

namespace Database\Seeders;

use App\Models\Gem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class GemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i=0; $i < 10; $i++) { 
            $gem = new Gem();
            $gem->report_number = $faker->randomNumber(5, true);
            $gem->weight = $faker->randomNumber(2, true);
            $gem->dimension = $faker->randomNumber(2, true);
            $gem->color = $faker->colorName();
            $gem->shape_cut = $faker->word();
            $gem->optic_char = $faker->word();
            $gem->refractive_index = $faker->word();
            $gem->specific_gravity = "specific_gravity";
            $gem->microscope_view = "microscope_view";
            $gem->species = "species";
            $gem->comments = $faker->sentence();
            $gem->image = "image";
            $gem->save();
        }


    }
}
