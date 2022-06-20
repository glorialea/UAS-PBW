<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 100; $i++)
        {
            DB::table('mahasiswa')->insert([
                'nim' => $faker->unique()->numberBetween(72200443, 72200555),
                'nama' => $faker->name(),
                'gender' => $faker->randomElement(['Perempuan', 'Laki-Laki']),
                'jurusan' => $faker->randomElement(['Sistem Informasi', 'Teknik Informasi']),
                'bidang_minat' => $faker->randomElement(['Badminton', 'Basket', 'Voli', 'Futsal'])
            ]);
        }
    }
}
