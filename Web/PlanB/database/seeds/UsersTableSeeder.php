<?php

use App\User;
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
        User::create([
            'email'=>'ruud.lamers@live.nl',
            'password'=>bcrypt('password'),
            'admin'=>true,
            'name'=>'Ruud',
            'surname'=>'Lamers',
            'geslacht'=>'man',
            'geboortedatum'=>'1993-07-07'
        ]);
        
//        Gebruiker::create([
//            'email'=>'',
//            'password'=>bcrypt('password'),
//            'admin'=>true,
//            'name'=>'',
//            'surname'=>'',
//            'geslacht'=>'',
//            'geboortedatum'=>''
//        ]);
    }
}
