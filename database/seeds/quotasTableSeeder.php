<?php

use Illuminate\Database\Seeder;

class quotasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
		for($i=0; $i <= 20; $i++):
				DB::table('quotas')
					->insert([
						'nombre' => $faker->numberBetween(0,50) ,
						'type' => $faker->numberBetween(1, 5) ,
						'user_id' => $faker->numberBetween(1, 5) ,
					]);
	    endfor;
    }
}
