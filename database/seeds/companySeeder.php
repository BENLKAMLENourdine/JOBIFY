<?php

use Illuminate\Database\Seeder;

class companySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $company = new \App\Company([
            'name' => 'Optimizely'
        ]);

        $company->save();

        $company = new \App\Company([
            'name' => 'Netflix'
        ]);

        $company->save();

        $company = new \App\Company([
            'name' => 'Google'
        ]);

        $company->save();

        $company = new \App\Company([
            'name' => 'Facebook'
        ]);

        $company->save();
    }
}
