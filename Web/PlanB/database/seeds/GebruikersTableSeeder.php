<?php

use App\Gebruiker;
use Illuminate\Database\Seeder;

class GebruikersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Gebruiker::create([
            'email'=>'ruud.lamers@live.nl',
            'wachtwoord'=>bcrypt('password'),
            'admin'=>true,
            'voornaam'=>'Ruud',
            'familienaam'=>'Lamers',
            'geslacht'=>'man',
            'geboortedatum'=>'1993-07-07'
        ]);
        
//        Gebruiker::create([
//            'email'=>'',
//            'wachtwoord'=>bcrypt('password'),
//            'admin'=>true,
//            'voornaam'=>'',
//            'familienaam'=>'',
//            'geslacht'=>'',
//            'geboortedatum'=>''
//        ]);
    }
}
