<?php

use Illuminate\Database\Seeder;

class FamillesTableSeeder extends Seeder
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
            DB::table('familles')
                ->insert([
                    'nom' => $faker->name(),
                    'type' => $faker->numberBetween(1, 5),
                    'user_id' => $faker->numberBetween(1, 25),
                ]);
        endfor;
    }
}
