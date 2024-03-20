<?php

namespace Database\Seeders;

use App\Models\Diamond;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DiamondSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i=0; $i < 10; $i++) {
            $diamond = new Diamond();
            $diamond->report_number = $faker->randomNumber(5, true);
            $diamond->type = 2;
            $diamond->description = $faker->word();
            $diamond->name = $faker->word();
            $diamond->shape_cut = $faker->randomNumber(2, true);
            $diamond->dimension = $faker->word();
            $diamond->weight = $faker->randomNumber(2, true);
            $diamond->clarity_grade = $faker->word();
            $diamond->color_grade = $faker->colorName();
            $diamond->cut_prop = $faker->word();
            $diamond->finish = $faker->word();
            $diamond->fluoresc = $faker->word();
            $diamond->image = "img";
            $diamond->comments = $faker->sentence();
            $diamond->save();
        }
    }
}
