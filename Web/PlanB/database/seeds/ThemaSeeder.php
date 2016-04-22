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
            'naam' => 'Natuur',
            'beschrijving' => ''
        ]);
        Thema::create([
            'naam' => 'Infrastructuur',
            'beschrijving' => ''
        ]);
        Thema::create([
            'naam' => 'Mobiliteit',
            'beschrijving' => ''
        ]);
//        Thema::create([
//            'naam'=>'',
//            'beschrijving'=>''
//        ]);
    }
}
