@extends('layout.main')
@section('pagetitle')
Start
@endsection
@section('content')

<div class="row">
    <div class="col-md-4 col-sm-3">
        <img src="http://placehold.it/350x350" class="img-responsive">
        <img src="http://placehold.it/350x150/000/fff?text=Google+Play+Store+Logo" class="img-responsive">
    </div>
    <div class="col-md-8 col-sm-9">
        <h1>Inspraak in Antwerpen</h1>
        <p>Inspraak in Antwerpen is een website ontworpen door Plan B om de inwoners invloed te geven op projecten binnen agglomeratie Antwerpen.
        Zodoende kan u vragen beantwoorden op de website, of projecten liken of disliken via de bijhorende Android applicatie.
        U kan steeds de likes en dislikes bekijken op de website en de antwoorden van de vragen bekijken op de Android applicatie.</p>
        <p>Wij hopen dat u geniet van dit platform dat gemaakt is met veel liefde door Karel De Grote's schoolgroep Plan B.</p>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <h2>Laatste 2 gestarte projecten</h2>
    </div>
</div>
<div class="row">
    @foreach ($projecten as $project)
    <div class="col-sm-6 project {{$project->thema->slug}}">
        <a href="{{ route('project.show', $project->slug) }}"><h3>{{ ucfirst($project->naam) }}</h3>
        </a>
        <div class="row">
            <?php $url = $project->milestones[0]->afbeelding ?>
            <div class="col-sm-6"><img
                src="{{((strpos($url,'http')===0||strpos($url,'/images')===0)?'':'/img').$url}}"
                alt="" class='img-responsive'></div>
                <div class="col-sm-6"><p
                    class="justify">{{ str_limit($project->beschrijving, $limit = 200, $end = '...') }}</p>
                </div>
            </div>
            <p>Looptijd: {{ $project->publish_from }} t.e.m. {{$project->publish_till}}</p>
            <p>Thema: {{$project->thema->naam}}</p>
            <div>
                @if ((($project->milestones[0]->likes+$project->milestones[0]->dislikes)) != 0)
                <?php $likesPercentage = round(($project->milestones[0]->likes / ($project->milestones[0]->likes + $project->milestones[0]->dislikes)) * 100);
                if ($likesPercentage > 90) {
                    $likesPercentage = 90;
                } else if ($likesPercentage < 10) {
                    $likesPercentage = 10;
                }?>
                @else
                <?php $likesPercentage = 50 ?>
                @endif
                <div class="progress">
                    <div class="progress-bar progress-bar-success" style="width: {{$likesPercentage}}%">
                        <p>{{ $project->milestones[0]->likes }}</p>
                    </div>
                    <div class="progress-bar progress-bar-danger"
                    style="width: {{100-$likesPercentage}}%">
                    <p>{{ $project->milestones[0]->dislikes }}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection