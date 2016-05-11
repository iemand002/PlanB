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
        
        User::create([
            'email'=>'kilianvde@gmail.com',
            'password'=>bcrypt('password'),
            'admin'=>true,
            'name'=>'Kilian',
            'surname'=>'van den Eynde',
            'geslacht'=>'man',
            'geboortedatum'=>''
        ]);

        User::create([
            'email'=>'vanakenk@gmail.com',
            'password'=>bcrypt('password'),
            'admin'=>true,
            'name'=>'Kristof',
            'surname'=>'van Aken',
            'geslacht'=>'man',
            'geboortedatum'=>''
        ]);

        User::create([
            'email'=>'seppe.p@hotmail.com',
            'password'=>bcrypt('password'),
            'admin'=>true,
            'name'=>'Seppe',
            'surname'=>'Peelman',
            'geslacht'=>'man',
            'geboortedatum'=>''
        ]);

//        User::create([
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
