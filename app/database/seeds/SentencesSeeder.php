<?php

use Faker\Factory as Faker;

/**
 * Class SentencesSeeder
 */
class SentencesSeeder extends Seeder {
    /**
     * Seed table
     */
    public function run()
    {
        $faker = Faker::create();

        $authorIds = Author::lists('id');

        foreach (range(1, 30) as $i) {
            Sentence::create([
                'user_id'   => 1,
                'author_id' => $faker->randomElement($authorIds),
                'content'   => $faker->paragraph(2),
            ]);
        }
    }
} 