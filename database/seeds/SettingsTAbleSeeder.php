<?php

use Illuminate\Database\Seeder;

class SettingsTAbleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting = App\Setting::create([
            'site_name' => 'www.sergioratti.com',
            'contact_number' => '1234567890',
            'contact_email' => 'sergio@sergioratti.com',
            'address'=> 'Parco della Vittoria, 23, Monopoli'
               ]
        );
    }
}
