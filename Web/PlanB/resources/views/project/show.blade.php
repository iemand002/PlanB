@extends('layout.main')

@section('pagetitle')
    {{$project->naam}} - Projecten
@endsection

@section('css')
    @yield('css-sub')
    <style>
        .show-grid{
            margin-bottom: 15px;
        }
    </style>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-8">
            @if($project->milestones->count()!=0)
                @foreach($project->milestones[0]->sections as $section)
                    <?php switch ($section->type_id){
                    case 1:?>
                    @include('section.h1',['tekst'=>$section->tekst])
                    <?php break;
                    case 2:?>
                    @include('section.afbeelding',['url'=>$section->url])
                    <?php break;
                    case 3:?>
                    @include('section.lart',['url'=>$section->url,'tekst'=>$section->tekst])
                    <?php break;
                    case 4:?>
                    @include('section.ralt',['url'=>$section->url,'tekst'=>$section->tekst])
                    <?php break;
                    case 5:?>
                    @include('section.tekst',['tekst'=>$section->tekst])
                    <?php break;
                    }?>
                @endforeach
            @else

            @endif
            {{--<div class="row">--}}
                {{--<div class="projectAfbeelding">--}}
                    {{--@if($project->milestones->count()!=0)--}}
                        {{--<img src="{{(strpos($project->milestones[0]->afbeelding,'http')===0?'':'/img').$project->milestones[0]->afbeelding}}"--}}
                             {{--alt="" class='projectImage img-responsive'>--}}
                    {{--@else--}}
                        {{--{!! Html::image('/images/dummy.png','',['class'=>'projectImage img-responsive']) !!}--}}
                    {{--@endif--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="row">--}}
                {{--<div class="col-sm-12">--}}
                    {{--<h1>{{$project->milestones[0]->naam}}</h1>--}}
                    {{--<p>{{$project->milestones[0]->beschrijving}}</p>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="row">
                <div class="projectVragen col-sm-12">
                    @if($project->milestones[0]->vragen->count() == 0)
                        <h3>Er zijn nog geen vragen voor deze milestone</h3>
                    @else
                        <?php $slideCounter = 0 ?>
                        <div class="slider">
                            <h3>Vragen</h3>
                            <div class="slide-container">
                                @foreach ($project->milestones[0]->vragen as $vraag)
                                    <?php $slideCounter++ ?>
                                    <div class="slide {{$slideCounter}}">
                                        <p class="smallTitles">{{ $vraag->vraag }}</p>
                                        @foreach ($vraag->antwoorden as $antwoord)
                                            <button type="button" class="btn-success btn-block next"
                                                    id="{{$antwoord->id}}">{{ $antwoord->antwoord }}</button>
                                        @endforeach
                                    </div>
                                @endforeach
                                <?php $slideCounter++ ?>
                                <div class="slide {{$slideCounter}}">
                                    <h3>Antwoorden</h3>
                                    @foreach ($project->milestones[0]->vragen as $vraag)
                                        <p class="mediumTitles">{{ $vraag->vraag }}</p>
                                        @foreach ($vraag->antwoorden as $antwoord)
                                            <p>{{ $antwoord->antwoord }}: <span
                                                        class="answer">{{ $antwoord->aantal_gekozen }}</span></p>
                                        @endforeach
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

        </div>

        <div class="col-sm-4">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Projectinfo</h2>
                    <h3>{{$project->naam}}</h3>
                    <div>{{$project->beschrijving}}</div>
                    <div>
                        <p>Looptijd project:</p>
                        <p>van: {{ $project->publish_from }}</p>
                        <p>tot: {{ $project->publish_till }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="projectMilestones col-sm-12">
                    <div class="timeline">
                        <div class="timeline-label">Milestones</div>
                        <ul class="timeline-list">
                            @foreach ($project->milestones as $milestone)
                                <li>
                                    <div class="timeline-list-label">
                                        <time datetime="{{ $milestone->publish_from_date_only}}">{{ $milestone->publish_from_date_only }}</time>
                                    </div>
                                    <div class="card">
                                        <div class="card-body">
                                            <p class="milestoneTitles">{{ $milestone->naam }}</p>
                                            <p>{{ str_limit($milestone->beschrijving, $limit = 120, $end = '...')}}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection