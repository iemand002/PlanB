@extends('layout.main')
@section('pagetitle')
    Alle projecten
@endsection
@section('content')
    <div>
        <?php $counter = 2 ?>
        <?php $counter2 = 0 ?>
        @foreach ($projecten as $project)
            @if (++$counter % 3 === 0)
                <div class="row">
                    @endif
                    <div class="col-xs-4">
                        <a href="{{ route('project.show', $project->slug) }}"><h1>{{ ucfirst($project->naam) }}</h1></a>
                        <p>{{ str_limit($project->beschrijving, $limit = 300, $end = '...') }}</p>
                        <p>Looptijd: {{ $project->publish_from }} t.e.m. {{$project->publish_till}}</p>
                    </div>
                    @if (++$counter2 % 3 === 0)
                </div>
            @endif
        @endforeach
        @if ($counter2 % 3 != 0)
    </div>
    @endif
    </div>
@endsection