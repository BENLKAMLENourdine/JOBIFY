<?php

use Illuminate\Database\Seeder;

class JobsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $job = new \App\Job([
            'title' => 'Web Developer',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo',
            'min_salary' => 20000,
            'max_salary' => 50000,
            'company_id' => 1,
            'jobtype_id' => 1,
            'city_id' => 1
        ]);

        $job->save();

        $job = new \App\Job([
            'title' => 'Web Designer',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo',
            'min_salary' => 30000,
            'max_salary' => 70000,
            'company_id' => 2,
            'jobtype_id' => 2,
            'city_id' => 2
        ]);

        $job->save();

        $job = new \App\Job([
            'title' => 'Web Developer',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo',
            'min_salary' => 20000,
            'max_salary' => 50000,
            'company_id' => 3,
            'jobtype_id' => 2,
            'city_id' => 3
        ]);

        $job->save();

        $job = new \App\Job([
            'title' => 'Full Stack Developer',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo',
            'min_salary' => 40000,
            'max_salary' => 50000,
            'company_id' => 4,
            'jobtype_id' => 1,
            'city_id' => 4
        ]);

        $job->save();
    }
}
