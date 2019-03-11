<?php

use Illuminate\Database\Seeder;

class jobtypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jobtype = new \App\Jobtype([
            'type' => 'Full Time'
        ]);

        $jobtype->save();

        $jobtype = new \App\Jobtype([
            'type' => 'Part Time'
        ]);

        $jobtype->save();
    }
}
