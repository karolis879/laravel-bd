<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 30) as $_) {
            DB::table('car_workshops')->insert([
                'name' => $faker->cityPrefix . $faker->streetSuffix,
                'address' => $faker->address,
                'phone_number' => $faker->unique()->randomNumber(9, true),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
