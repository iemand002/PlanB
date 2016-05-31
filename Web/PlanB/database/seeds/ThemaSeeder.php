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
            'beschrijving'=>'Projecten in gebied Antwerpen Noord',
            'slug'=>str_slug('Antwerpen Noord')
        ]);
        Thema::create([
            'naam'=>'Merksem',
            'beschrijving'=>'Projecten in gebied Merksem',
            'slug'=>str_slug('Merksem')
        ]);
        Thema::create([
            'naam'=>'Antwerpen',
            'beschrijving'=>'Projecten in gebied Antwerpen',
            'slug'=>str_slug('Antwerpen')
        ]);
        Thema::create([
            'naam'=>'Berchem',
            'beschrijving'=>'Projecten in gebied Berchem',
            'slug'=>str_slug('Berchem')
        ]);
        Thema::create([
            'naam'=>'Hoboken',
            'beschrijving'=>'Projecten in gebied Hoboken',
            'slug'=>str_slug('Hoboken')
        ]);
        Thema::create([
            'naam'=>'Wilrijk',
            'beschrijving'=>'Projecten in gebied Wilrijk',
            'slug'=>str_slug('Wilrijk')
        ]);
//        Thema::create([
//            'naam'=>'',
//            'beschrijving'=>'',
//        'slug'=>str_slug('')
//        ]);
    }
}
