<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
            'site_name' => 'PostKar',
            'contact_number' => '0 900 78 601',
            'contact_email' => 'itsgardezi@gmail.com',
            'address'  =>  'Lahore, Pakistan',
            'sub_address' => 'VU Software House',
            'working_hours' => '9am to 10pm, Tuesday-Saturday',
            'about'         =>  'This is my very first project in laravel.'
        ]);
    }
}
