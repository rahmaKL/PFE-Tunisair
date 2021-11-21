<?php

use Illuminate\Database\Seeder;

class FonctionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        for ($i = 0; $i <= 6; $i++) :
            DB::table('fonctions')
                ->insert([
                    'nom' => $faker->jobTitle,
                ]);
        endfor;
    }
}
