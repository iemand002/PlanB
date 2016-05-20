<?php

use App\Type;
use Illuminate\Database\Seeder;

class TypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Type::create([
            'naam'=>'h1'
        ]);
        Type::create([
            'naam'=>'afbeelding'
        ]);
        Type::create([
            'naam'=>'rechts afbeelding-links tekst'
        ]);
        Type::create([
            'naam'=>'links afbeelding-rechts tekst'
        ]);
        Type::create([
            'naam'=>'tekst'
        ]);
    }
}
