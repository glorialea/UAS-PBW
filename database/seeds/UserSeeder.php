<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'nik_user' => '210983456',
            'nama_user' => 'Kate',
            'no_handphone' => '123456769',
            'password' => 'kate123',
        ]);
    }
}
