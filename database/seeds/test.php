<?php

use Illuminate\Database\Seeder;

class test extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
 		DB::table('user')->insert([
            'password' => str_random(10),
            'group_id' => 1,
            'username' => bcrypt('secret'),
        ]);
    }
}
