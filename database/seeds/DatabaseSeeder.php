<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(AdminSeeder::class);
        //$this->call(citySeeder::class);
        //$this->call(companySeeder::class);
        //$this->call(jobtypeSeeder::class);
        $this->call(JobsSeeder::class);
    }
}
