<?php

use Faker\Factory as Faker;

/**
 * Class AuthorsSeeder
 */
class AuthorsSeeder extends Seeder {
    /**
     * Seed table
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 5) as $i) {
            Author::create([
                'name' => $faker->name,
            ]);
        }
    }
} 