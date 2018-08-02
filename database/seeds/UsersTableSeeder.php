<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name' => 'Sergio Ratti',
            'email' => 'sratti@hotmail.co.uk',
            'admin' => 1,
            'password' => bcrypt('password') 
        ]) ;

        App\Profile::create([
            'avatar' => 'uploads/avatars/1.jpg',
            'user_id' => $user->id,
            'about' => 'ciao questa è la mia storia',
            'facebook' => 'www.facebook.com',
            'youtube' => 'www.youtube.com'
        ]) ;
    }
}
