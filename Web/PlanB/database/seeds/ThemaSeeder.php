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
            'beschrijving' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolorem illo, incidunt inventore ipsum
            minus nesciunt numquam, perferendis perspiciatis quis veniam voluptate voluptates voluptatum! Alias eveniet
            id illo nobis qui.'
        ]);
        Thema::create([
            'naam' => 'Infrastructuur',
            'beschrijving' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolorem illo, incidunt inventore ipsum
            minus nesciunt numquam, perferendis perspiciatis quis veniam voluptate voluptates voluptatum! Alias eveniet
            id illo nobis qui.'
        ]);
        Thema::create([
            'naam' => 'Mobiliteit',
            'beschrijving' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolorem illo, incidunt inventore ipsum
            minus nesciunt numquam, perferendis perspiciatis quis veniam voluptate voluptates voluptatum! Alias eveniet
            id illo nobis qui.'
        ]);
//        Thema::create([
//            'naam'=>'',
//            'beschrijving'=>''
//        ]);
    }
}
