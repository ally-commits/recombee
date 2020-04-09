<?php

use Illuminate\Database\Seeder;

class Faker extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 50; 
        for ($i = 1; $i <= $limit; $i++) {
            App\User::create([
                'name' => $faker->name,
                'id' => 'user-' . $i
            ]);
            App\Content::create([
                'name' => $faker->name,
                'id' => 'content-' . $i
            ]);
        } 
    }
}
