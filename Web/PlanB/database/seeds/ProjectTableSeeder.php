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
            'naam' => "Halenstraat",
            'beschrijving'=>'Na het afronden van de Viséstraat, wordt ook de Halenstraat volledig heraangelegd. Zo wordt de nieuwe Halenstraat een stuk comfortabeler voor fietsers. 

Timing en hinder

De werken in de Halenstraat starten op 20 juni en zullen, afhankelijk van onvoorziene omstandigheden duren tot eind oktober. Gedurende heel deze periode zal er geen doorgaand verkeer mogelijk zijn.

Tussen 1 juli en 15 augustus zal het kruispunt Schijnpoort volledig worden afgesloten in verband met werken aan de Noordersingel. In deze periode rijdt er ook geen tram door de Halenstraat. Voor meer informatie over deze werken kan u terecht op www.noordersingel.be',
            'thema_id' => 1,
            'publish_from' => Carbon::now()->addWeek(-1)->format('d/m/Y H:i:s'),
            'publish_till' => Carbon::now()->addMonth()->format('d/m/Y H:i:s'),
            'slug' => str_slug("Halenstraat")
        ]);
//        Project::create([
//            'naam' => "Bomen op de Groenplaats",
//            'beschrijving'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque dolorem illo, incidunt inventore ipsum
//            minus nesciunt numquam, perferendis perspiciatis quis veniam voluptate voluptates voluptatum! Alias eveniet
//            id illo nobis qui.',
//            'thema_id' => 2,
//            'publish_from' => Carbon::now()->format('d/m/Y H:i:s'),
//            'publish_till' => Carbon::now()->addMonth()->format('d/m/Y H:i:s'),
//            'slug' => str_slug("Bomen op de Groenplaats")
//        ]);
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
