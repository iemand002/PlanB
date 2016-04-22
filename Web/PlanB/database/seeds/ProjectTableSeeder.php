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
            'thema_id' => 3,
            'publish_from' => Carbon::now()->format('d/m/Y H:i:s'),
            'publish_till' => Carbon::now()->addMonth()->format('d/m/Y H:i:s'),
            'slug' => str_slug("Ringland")
        ]);
        Project::create([
            'naam' => "Bomen op de Groenplaats",
            'thema_id' => 2,
            'publish_from' => Carbon::now()->format('d/m/Y H:i:s'),
            'publish_till' => Carbon::now()->addMonth()->format('d/m/Y H:i:s'),
            'slug' => str_slug("Bomen op de Groenplaats")
        ]);
//        Project::create([
//            'naam'=>'',
//            'thema_id'=>,
//            'publish_from'=> Carbon::now(),
//            'publish_till'=> Carbon::now()->addMonth(),
//        'slug'=>str_slug("")
//        ]);
    }
}
