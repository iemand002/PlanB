@extends('layout.main')

@section('pagetitle')
    Projecten
@endsection

@section('css')
    @yield('css-sub')
@endsection

@section('content')

    <h1>{{ $project->naam }}</h1>

    <div>
        <div class="projectAfbeelding">
            {!! Html::image('/img/'.$project->milestones[0]->afbeelding,'',['class'=>'projectImage']) !!}
        </div>
        <div class="projectBeschrijving">
            <p>{{ $project->beschrijving }}</p>
            <p>Looptijd project:</p>
            <p>van: {{ $project->publish_from->format('d-m-Y') }}</p>
            <p>tot: {{ $project->publish_till->format('d-m-Y') }}</p>
        </div>
        <div class="projectMilestones">
            <h2>Milestones</h2>
            @foreach ($project->milestones as $milestone)
                <h3>{{ $milestone->naam }}</h3>
                <p>{{ $milestone->beschrijving }}</p>
                <p>Aangemakt op: {{ $milestone->created_at->format('d-m-Y') }}</p>
            @endforeach
        </div>
    </div>


@endsection