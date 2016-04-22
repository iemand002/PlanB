<?php

use App\Milestone;
use Illuminate\Database\Seeder;

class MilestoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Milestone::create([
            'naam' => 'Bespreken Ringland',
            'locatie' => 'ring antwerpen',
            'beschrijving' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolorem illo, incidunt inventore ipsum
            minus nesciunt numquam, perferendis perspiciatis quis veniam voluptate voluptates voluptatum! Alias eveniet
            id illo nobis qui.',
            'afbeelding' => 'Grote_Markt_Antwerpen.jpg',
            'project_id' => 1,
            'likes' => 25,
            'dislikes' => 12
        ]);
        Milestone::create([
            'naam' => 'Uittekenen plannen',
            'locatie' => 'ring antwerpen',
            'beschrijving' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolorem illo, incidunt inventore ipsum
            minus nesciunt numquam, perferendis perspiciatis quis veniam voluptate voluptates voluptatum! Alias eveniet
            id illo nobis qui.',
            'afbeelding' => 'Grote_Markt_Antwerpen.jpg',
            'project_id' => 1,
            'likes' => 50,
            'dislikes' => 9
        ]);
        Milestone::create([
            'naam' => 'Uitkiezen bomen',
            'locatie' => 'groenplaats',
            'beschrijving' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolorem illo, incidunt inventore ipsum
            minus nesciunt numquam, perferendis perspiciatis quis veniam voluptate voluptates voluptatum! Alias eveniet
            id illo nobis qui.',
            'afbeelding' => 'Grote_Markt_Antwerpen.jpg',
            'project_id' => 2,
            'likes' => 18,
            'dislikes' => 1
        ]);
//        Milestone::create([
//            'naam'=>'',
//            'locatie'=>'',
//            'beschrijving'=>'',
//            'afbeelding'=>'',
//            'project_id'=>
//        ]);
    }
}