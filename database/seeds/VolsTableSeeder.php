<?php

use Illuminate\Database\Seeder;

class VolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i <= 10; $i++) :
            DB::table('vols')
                ->insert([
                    'de' => $faker->numberBetween(1, 800),
                    'a' => $faker->numberBetween(1, 800),
                    'date' => $faker->datetime,
                    'tarif' => $faker->randomFloat(2, 1, 1500),
                ]);
        endfor;
    }
}
