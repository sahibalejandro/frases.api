<?php

use Faker\Factory as Faker;

/**
 * Class SentenceTagSeeder
 */
class SentenceTagSeeder  extends Seeder {
    /**
     * Seed table
     */
    public function run()
    {
        $faker       = Faker::create();
        $tagIds      = Tag::lists('id');
        $sentenceIds = Sentence::lists('id');

        foreach (range(1, 30) as $i) {
            DB::table('sentence_tag')->insert([
                'sentence_id' => $faker->randomElement($sentenceIds),
                'tag_id'      => $faker->randomElement($tagIds),
            ]);
        }
    }
} 