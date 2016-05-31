<?php

use App\Thema;
use Illuminate\Database\Seeder;

class ThemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Thema::create([
            'naam'=>'Antwerpen Noord',
            'beschrijving'=>'Projecten in gebied Antwerpen Noord'
        ]);
        Thema::create([
            'naam'=>'Merksem',
            'beschrijving'=>'Projecten in gebied Merksem'
        ]);
        Thema::create([
            'naam'=>'Antwerpen',
            'beschrijving'=>'Projecten in gebied Antwerpen'
        ]);
        Thema::create([
            'naam'=>'Berchem',
            'beschrijving'=>'Projecten in gebied Berchem'
        ]);
        Thema::create([
            'naam'=>'Hoboken',
            'beschrijving'=>'Projecten in gebied Hoboken'
        ]);
        Thema::create([
            'naam'=>'Wilrijk',
            'beschrijving'=>'Projecten in gebied Wilrijk'
        ]);
//        Thema::create([
//            'naam'=>'',
//            'beschrijving'=>''
//        ]);
    }
}
