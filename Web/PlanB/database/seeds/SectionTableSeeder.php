<?php

use App\Section;
use Illuminate\Database\Seeder;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Section::create([
            'milestone_id' => 1,
            'tekst' => 'Het definitieve ontwerp voor de Halen- en Viséstraat',
            'url' => null,
            'type_id' => 1,
        ]);
        Section::create([
            'milestone_id' => 1,
            'tekst' => null,
            'url' => '/Halenstraat/Halenstraat_na.jpg',
            'type_id' => 2,
        ]);
        Section::create([
            'milestone_id' => 1,
            'tekst' => '
                    In het voorjaar van 2012 toonden we de eerste plannen en het schetsontwerp aan de bewoners. Dat gebeurde in een hoorzitting, maar ook in het park, in de moskee en online.
                    
                    We luistereden toen naar de opmerkingen van de bewoners en hebben de plannen veranderd.
                    <h2>Halenstraat</h2>
                    <ul>
                        <li>Ter hoogte van de Veldstraat en de sociale woningen in de Halenstraat komen twee extra zebrapaden.</li>
                        <li>Het kruispunt Halenstraat-Viséstraat- Stuivenbergplein wordt veiliger voor fietsers. Fietsers komen sneller op de rijweg. Zo zijn ze beter zichtbaar voor auto’s. Het zebrapad op dit kruispunt werd verplaatst. Door dit op te schuiven van de kant van het Stuivenbergplein richting het park is er meer ruimte voor voetgangers aan dit zebrapad.</li>
                        <li>De bomen aan de Meloenstraat blijven. Er komen drie extra bomen ter hoogte van de tramhalte. Op het pleintje aan Schijnpoort komt één extra plataan in plaats van twee om de bomen de kans te geven om volwaardig te groeien.</li>
                    </ul>
                    <h2>Viséstraat</h2>
                    <ul>
                        <li>Een deel van de Viséstraat en de Trapstraat is nu woonerf. In de eerste plannen wilden we dit ook heraanleggen. Dit deel wordt toch niet mee heraangelegd. Het blijft dus gewoon woonerf. Het kruispunt met de Oranjestraat wordt daarom ook aangepast ten opzichte van het voorontwerp.</li>
                        <li>Enkele mobiliteitsingrepen zoals de knip in de Viséstraat of het enkelrichting maken een stukje Viséstraat werden momenteel niet meegenomen in het definitief ontwerp. Na de heraanleg zullen deze maatregelen opnieuw bekeken worden in een ruimere context, zoals de impact op de omliggende straten. Het ontwerp laat toe dat er achteraf nog mobiliteitsingrepen kunnen gebeuren.</li>
                        <li>Aan de kruispunten planten we extra bomen. Dit maakt de oversteken meer zichtbaar en veiliger.</li>
                        <li>Aan de Klamperstraat wordt een extra verhoogde oversteekplaats naar het park voorzien.</li>
                        <li>Aan alle oversteken naar het park worden zebrapaden voorzien.</li>
                    </ul>
                    ',
            'url' => null,
            'type_id' => 5,
        ]);
        Section::create([
            'milestone_id' => 2,
            'tekst' => 'Het definitieve ontwerp voor de Halen- en Viséstraat',
            'url' => null,
            'type_id' => 1,
        ]);
        Section::create([
            'milestone_id' => 2,
            'tekst' => null,
            'url' => '/Halenstraat/Halenstraat_na.jpg',
            'type_id' => 2,
        ]);
        Section::create([
            'milestone_id' => 2,
            'tekst' => '<h2>Viséstraat</h2>
                    <h3>Viséstraat als woonstraat</h3>
                    <p>De Viséstraat wordt een woonstraat. U kan ook gemakkelijker naar Park Spoor Noord gaan.</p>
                    <p>De Straat wordt een zone 30. De weg wordt smaller. Zo gaan auto\'s trager rijden. Het voetpad aan ke kant van de huizen wordt breder. Op de kruispunten komen verhoogde zebrapaden naar het park. Er komen ook bomen. Zo vallen de kruispunten meer op.</p>
                    <h3>Sorteerstraten</h3>
                    <p>Er komen twee sorteerstraten ter hoogte van de Oranjestraat en de klamperstraat. Deze komen niet recht tegenover woningen.</p>
                    <div> </div>
                    <h2>Halenstraat</h2>
                    <h3>Zone 30</h3>
                    <p>Het hele project – Halenstraat en Viséstraat – wordt een zone 30.</p>
                    <h3>Fietsen in de Halenstraat</h3>
                    <p>De Halenstraat wordt comfortabeler voor fietsers. Er komt een fietsverbinding. Die sluit aan op de fietsroute in Park Spoor Noord en op de fietspaden op het kruispunt Schijnpoortweg.</p>
                    <p>De straat is heel smal tussen de Veldstraat en de Meloenstraat. Er is te weinig ruimte voor een fietspad aan beide kanten van de straat. Daarom komt er een fietsverbinding langs de kant van het park. Dit is geen gewoon fietspad, maar een gemengde zone voor fietsers en voetgangers. Fietsers mogen hier in de beide richtingen fietsen. Er komt hier aparte verlichting. Zo is het veiliger.</p>
                    <h3>Voetgangers</h3>
                    <p>Aan de kant van het park lopen voetgangers over dezelfde zone als de fietsers. Er is geen ruimte voor een apart voetpad.</p>
                    <p>Aan de andere kant van de straat blijft het voetpad. Dit wordt helemaal vernieuwd.</p>
                    <h3>Tramhalte</h3>
                    <p>De tramsporen verschuiven in de richting van de huizen. Zo is er plaats voor de fietsverbinding. De halteplaats staduitwaarts verschuift richting Veldstraat. Mensen moeten zo de weg niet oversteken om de tram te nemen.</p>
                    <h3>Pleintje aan Schijnpoortweg</h3>
                    <p>Het pleintje aan Schijnpoortweg wordt opgefrist. We planten ook een nieuwe boom. Dit is plataan, zoals de andere bomen.</p>',
            'url' => null,
            'type_id' => 5,
        ]);
        Section::create([
            'milestone_id' => 2,
            'tekst' => null,
            'url' => '/Halenstraat/Halenstraat_na.jpg',
            'type_id' => 2,
        ]);
//        Section::create([
//            'milestone_id' => ,
//            'tekst' => ,
//            'url' => ,
//            'type_id' => ,
//        ]);
    }
}
