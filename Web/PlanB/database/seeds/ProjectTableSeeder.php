<?php

use App\Project;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'naam' => "Ringland",
            'beschrijving'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolorem illo, incidunt inventore ipsum
            minus nesciunt numquam, perferendis perspiciatis quis veniam voluptate voluptates voluptatum! Alias eveniet
            id illo nobis qui.',
            'thema_id' => 3,
            'publish_from' => Carbon::now()->format('d/m/Y H:i:s'),
            'publish_till' => Carbon::now()->addMonth()->format('d/m/Y H:i:s'),
            'slug' => str_slug("Ringland")
        ]);
        Project::create([
            'naam' => "Bomen op de Groenplaats",
            'beschrijving'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolorem illo, incidunt inventore ipsum
            minus nesciunt numquam, perferendis perspiciatis quis veniam voluptate voluptates voluptatum! Alias eveniet
            id illo nobis qui.',
            'thema_id' => 2,
            'publish_from' => Carbon::now()->format('d/m/Y H:i:s'),
            'publish_till' => Carbon::now()->addMonth()->format('d/m/Y H:i:s'),
            'slug' => str_slug("Bomen op de Groenplaats")
        ]);
//        Project::create([
//            'naam'=>'',
//        'beschrijving'=>'',
//            'thema_id'=>,
//            'publish_from'=> Carbon::now(),
//            'publish_till'=> Carbon::now()->addMonth(),
//        'slug'=>str_slug("")
//        ]);
    }
}
