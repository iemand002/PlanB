@extends('layout.main')

@section('pagetitle')
    Projecten
@endsection

@section('css')
    @yield('css-sub')
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-8">
            <div class="row">
                <div class="projectAfbeelding">
                    @if($project->milestones->count()!=0)
                        <img src="{{(strpos($project->milestones[0]->afbeelding,'http')===0?'':'/img').$project->milestones[0]->afbeelding}}"
                             alt="" class='projectImage'>
                    @else
                        {!! Html::image('/images/dummy.png','',['class'=>'projectImage']) !!}
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <h1>{{$project->milestones[0]->naam}}</h1>
                    <p>{{$project->milestones[0]->beschrijving}}</p>
                </div>
            </div>
<<<<<<< HEAD
<<<<<<< HEAD
        </div>
<!--         <div class="row">
            <div class="projectVragen col-sm-12">
            <h1>Vragen</h1>

                @foreach ($project->milestones[2]->vragen as $vraag)
                    <h3>{{ $vraag->vraag }}</h3>
                    @foreach ($project->milestones[2]->vragen[$vraag->id]->antwoorden as $antwoord)

                        <p>{{ $antwoord->antwoord }}</p>

                    @endforeach
                @endforeach
            </div>
        </div> -->
=======
            <div class="row">
                <div class="projectVragen col-sm-12">
                    <h1>Vragen</h1>
                </div>
            </div>
>>>>>>> parent of cd4eebd... Tink - Tijdlijn

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
=======
            <div class="row">
                <div class="projectVragen col-sm-12">
                    <h1>Vragen</h1>
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
>>>>>>> parent of cd4eebd... Tink - Tijdlijn
            <div class="row">
                <div class="projectMilestones col-sm-12">
                    <h2>Milestones</h2>
                    @foreach ($project->milestones as $milestone)
                        <h3>{{ $milestone->naam }}</h3>
                        <p>{{ $milestone->beschrijving }}</p>
                        <p>Aangemakt op: {{ $milestone->created_at->format('d-m-Y') }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


@endsection