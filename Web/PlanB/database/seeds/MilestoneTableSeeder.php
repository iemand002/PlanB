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
            'locatie' => 'E19, Antwerpen, België',
            'coordinaten'=>'51.212092,4.446369',
            'beschrijving' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolorem illo, incidunt inventore ipsum
            minus nesciunt numquam, perferendis perspiciatis quis veniam voluptate voluptates voluptatum! Alias eveniet
            id illo nobis qui.',
            'afbeelding' => '/Grote_Markt_Antwerpen.jpg',
            'publish_from'=>Carbon\Carbon::now()->addWeek(-1)->format('d/m/Y H:i:s'),
            'publish_till'=>Carbon\Carbon::now()->format('d/m/Y H:i:s'),
            'project_id' => 1,
            'likes' => 25,
            'dislikes' => 12
        ]);
        Milestone::create([
            'naam' => 'Uittekenen plannen',
            'locatie' => 'E19, Antwerpen, België',
            'coordinaten'=>'51.212092,4.446369',
            'beschrijving' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolorem illo, incidunt inventore ipsum
            minus nesciunt numquam, perferendis perspiciatis quis veniam voluptate voluptates voluptatum! Alias eveniet
            id illo nobis qui.',
            'afbeelding' => '/Grote_Markt_Antwerpen.jpg',
            'publish_from'=>Carbon\Carbon::now()->format('d/m/Y H:i:s'),
            'publish_till'=>Carbon\Carbon::now()->addWeek(2)->format('d/m/Y H:i:s'),
            'project_id' => 1,
            'likes' => 50,
            'dislikes' => 9
        ]);
        Milestone::create([
            'naam' => 'Uitkiezen bomen',
            'locatie' => 'Groenplaats, Antwerpen, België',
            'coordinaten'=>'51.21941,4.401093',
            'beschrijving' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolorem illo, incidunt inventore ipsum
            minus nesciunt numquam, perferendis perspiciatis quis veniam voluptate voluptates voluptatum! Alias eveniet
            id illo nobis qui.',
            'afbeelding' => '/Grote_Markt_Antwerpen.jpg',
            'publish_from'=>Carbon\Carbon::now()->format('d/m/Y H:i:s'),
            'publish_till'=>Carbon\Carbon::now()->addWeek(2)->format('d/m/Y H:i:s'),
            'project_id' => 2,
            'likes' => 18,
            'dislikes' => 1
        ]);
//        Milestone::create([
//            'naam'=>'',
//            'locatie'=>'',
//        'coordinaten'=>'',
//            'beschrijving'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolorem illo, incidunt inventore ipsum
//        minus nesciunt numquam, perferendis perspiciatis quis veniam voluptate voluptates voluptatum! Alias eveniet
//            id illo nobis qui.',
//            'afbeelding'=>'/Grote_Markt_Antwerpen.jpg',
//        'publish_at'=>Carbon\Carbon::now()->format('d/m/Y H:i:s'),
//            'project_id'=>,
//        'likes'=>,
//        'dislikes'=>
//        ]);
    }
}
