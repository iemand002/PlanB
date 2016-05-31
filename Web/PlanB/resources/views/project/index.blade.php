@extends('layout.main')
@section('pagetitle')
Alle projecten
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="cols-sm-12">
            <?php $counter = 0 ?>
            @foreach ($projecten as $project)
            @if (++$counter == 1)
            <div class="row">
                @endif
                <div class="col-sm-6">
                    <a href="{{ route('project.show', $project->slug) }}"><h1>{{ ucfirst($project->naam) }}</h1></a>
                    <div class="row">
                        <?php $url = $project->milestones[0]->afbeelding ?>
                        <div class="col-sm-6"><img src="{{((strpos($url,'http')===0||strpos($url,'/images')===0)?'':'/img').$url}}" alt="" class='img-responsive'></div>
                        <div class="col-sm-6"><p class="justify">{{ str_limit($project->beschrijving, $limit = 200, $end = '...') }}</p></div>
                    </div>
                    <p>Looptijd: {{ $project->publish_from }} t.e.m. {{$project->publish_till}}</p>
                    <div>
                        @if ((($project->milestones[0]->likes+$project->milestones[0]->dislikes)) != 0)
                        <?php $likesPercentage = round(($project->milestones[0]->likes/($project->milestones[0]->likes+$project->milestones[0]->dislikes))*100);
                        if ($likesPercentage > 90) {
                            $likesPercentage = 90;
                        }
                        else if ($likesPercentage < 10) {
                            $likesPercentage = 10;
                        }?>
                        @else
                        <?php $likesPercentage = 50 ?>
                        @endif
                        <div class="progress">
                            <div class="progress-bar progress-bar-success" style="width: {{$likesPercentage}}%">
                                <p>{{ $project->milestones[0]->likes }}</p>
                            </div>
                            <div class="progress-bar progress-bar-danger" style="width: {{100-$likesPercentage}}%">
                                <p>{{ $project->milestones[0]->dislikes }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @if ($counter == 2)
            </div>
            <?php $counter = 0 ?>
            @endif
            @endforeach
            @if ($counter != 2)
        </div>
        @endif
    </div>
</div>
</div>
@endsection