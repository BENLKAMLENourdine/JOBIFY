<?php

use Illuminate\Database\Seeder;

class citySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = new \App\Citi([
            'name' => 'Rabat'
        ]);

        $city->save();

        $city = new \App\Citi([
            'name' => 'Casablanca'
        ]);

        $city->save();

        $city = new \App\Citi([
            'name' => 'Marrakech'
        ]);

        $city->save();

        $city = new \App\Citi([
            'name' => 'Agadir'
        ]);

        $city->save();
    }
}
