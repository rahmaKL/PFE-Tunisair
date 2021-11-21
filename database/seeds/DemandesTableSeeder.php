<?php

use Illuminate\Database\Seeder;

class DemandesTableSeeder extends Seeder
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
            DB::table('demandes')
                ->insert([
                    'nombre' => $faker->numberBetween(0, 20),
                    'etat' => $faker->numberBetween(1, 3),
                    'date_demande' => $faker->date,
                    'date_validation' => $faker->date,
                    'user_id' => $faker->numberBetween(1, 20),
                    'quota_id' => $faker->numberBetween(1, 20),
                ]);
        endfor;
    }
}
