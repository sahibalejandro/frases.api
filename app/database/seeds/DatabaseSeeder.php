<?php

class DatabaseSeeder extends Seeder {

    private $tables = [
        'users',
        'authors',
        'sentence_tag',
        'tags',
        'sentences',
    ];
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

        $this->truncate();

        // Insert auth user
        User::create([
           'username'  => 'test',
            'password' => Hash::make('test123'),
        ]);

        // Seed tables
		$this->call('AuthorsSeeder');
		$this->call('TagsSeeder');
        $this->call('SentencesSeeder');
        $this->call('SentenceTagSeeder');
	}

    private function truncate()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach ($this->tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }

}
