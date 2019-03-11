<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new \App\Admin([
            'email' => 'benlkamle.developer.95@gmail.com',
            'password' => bcrypt("123456")
        ]);

        $admin->save();
    }
}
