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
            'naam' => 'Het definitieve ontwerp voor de Halen- en Viséstraat',
            'locatie' => 'Halenstraat, Antwerpen, België',
            'coordinaten'=>'51.227878,4.434213',
            'beschrijving' => 'Viséstraat
Viséstraat als woonstraat

De Viséstraat wordt een woonstraat. U kan ook gemakkelijker naar Park Spoor Noord gaan.

De Straat wordt een zone 30. De weg wordt smaller. Zo gaan auto\'s trager rijden. Het voetpad aan ke kant van de huizen wordt breder. Op de kruispunten komen verhoogde zebrapaden naar het park. Er komen ook bomen. Zo vallen de kruispunten meer op.',
            'afbeelding' => '/Halenstraat/Halenstraat_na.jpg',
            'publish_from'=>Carbon\Carbon::now()->format('d/m/Y H:i:s'),
            'publish_till'=>Carbon\Carbon::now()->addWeek(2)->format('d/m/Y H:i:s'),
            'project_id' => 1,
            'likes' => 50,
            'dislikes' => 9
        ]);
        Milestone::create([
            'naam' => 'Aanpassingen aan het ontwerp op basis van inspraak',
            'locatie' => 'Halenstraat, Antwerpen, België',
            'coordinaten'=>'51.227878,4.434213',
            'beschrijving' => '

In het voorjaar van 2012 toonden we de eerste plannen en het schetsontwerp aan de bewoners. Dat gebeurde in een hoorzitting, maar ook in het park, in de moskee en online.

We luistereden toen naar de opmerkingen van de bewoners en hebben de plannen veranderd.
',
            'afbeelding' => '/Halenstraat/Halenstraat_na.jpg',
            'publish_from'=>Carbon\Carbon::now()->format('d/m/Y H:i:s'),
            'publish_till'=>Carbon\Carbon::now()->addWeek(2)->format('d/m/Y H:i:s'),
            'project_id' => 1,
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
