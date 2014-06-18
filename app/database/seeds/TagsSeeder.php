<?php

use Faker\Factory as Faker;

/**
 * Class TagsSeeder
 */
class TagsSeeder  extends Seeder {
    /**
     * Seed table
     */
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $i) {
            Tag::create([
                'name' => $faker->word,
            ]);
        }
    }
} 