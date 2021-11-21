<?php

use Illuminate\Database\Seeder;

class ReservationsTableSeeder extends Seeder
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
            DB::table('reservations')
                ->insert([
                    'type' => $faker->numberBetween(1, 5),
                    'depart' =>  $faker->date,
                    'retour' => $faker->date,
                    'de' => $faker->country,
                    'a' => $faker->country,
                    'date_demande' => $faker->date,
                    'date_validation' => $faker->date,
                    'etat' => $faker->numberBetween(1, 3),
                    'commentaire' => $faker->sentence(20),
                    'user_id' => $faker->numberBetween(1, 24),
                ]);
        endfor;
    }
}
