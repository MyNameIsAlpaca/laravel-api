<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TechnologiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $technologies = ['Vs Code', 'MAMP', 'MySql'];

        foreach ($technologies as $technology) {
            $newTechnology = new Technology();

            $newTechnology->name = $technology;
            $newTechnology->color = $faker->hexColor();

            $newTechnology->save();
        }
    }
}
