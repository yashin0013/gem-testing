<?php

namespace Database\Seeders;

use App\Models\Jewellery;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class JewellerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i=0; $i < 10; $i++) {
            $jewellery = new Jewellery();
            $jewellery->report_number = $faker->randomNumber(5, true);
            $jewellery->type = 3;
            $jewellery->gross_wt = $faker->randomNumber(2, true);
            $jewellery->gold_wt = $faker->randomNumber(2, true);
            $jewellery->dia_wt = $faker->randomNumber(2, true);
            $jewellery->shape_cut = $faker->randomNumber(2, true);
            $jewellery->clarity = $faker->word();
            $jewellery->name = $faker->word();
            $jewellery->color = $faker->colorName();
            $jewellery->finish = $faker->word();
            $jewellery->image = "img";
            $jewellery->description = $faker->sentence();
            $jewellery->save();
        }
    }
}
