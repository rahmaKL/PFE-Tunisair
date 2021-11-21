<?php

use Illuminate\Database\Seeder;

class ReclamationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i <= 30; $i++) :
            DB::table('reclamations')
                ->insert([
                    'email' => $faker->email,
                    'sujet' => $faker->sentence(4),
                    'msg' => $faker->sentence(30),
                    'date' => $faker->date,
                    'user_id' => $faker->numberBetween(1, 24),
                    'etat' => $faker->numberBetween(1, 3),
                ]);
        endfor;
    }
}
