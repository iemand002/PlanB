@extends('layout.main')

@section('pagetitle')
    Projecten
@endsection

@section('css')
    @yield('css-sub')
@endsection

@section('content')
    <h1>Projecten</h1>
    <a href="{{ route('admin.project.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Project toevoegen</a>
    <div class="table-responsive">
        <table class="table table-hover">
            @foreach ($projecten as $project)
                <tr>
                    <td>{{ $project->naam }}</td>
                    <td>verwijderen</td>
                    <td><a href="{{route('admin.project.edit',$project->slug)}}" class="btn btn-xs btn-warning"><i
                                    class="fa fa-pencil"></i> Wijzigen</a></td>
                    <td><a href="{{ route('admin.milestone.create', $project->slug) }}" class="btn btn-xs btn-success"><i
                                    class="fa fa-plus"></i> Milestone toevoegen</a></td>
                    <td></td>
                </tr>
                @foreach($project->milestones as $milestone)
                    <tr>
                        <th>Milestone:</th>
                        <td>{{$milestone->naam}}</td>
                        <td><a href="{{ route('admin.vraag.create', [$project->slug,$milestone->slug]) }}"
                               class="btn btn-xs btn"><i class="fa fa-question"></i> Vraag
                                toevoegen</a></td>
                        <td><a href="{{route('admin.milestone.edit',[$project->slug,$milestone->slug])}}"
                               class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Wijzig</a></td>
                        <td></td>
                    </tr>
                    @foreach($milestone->vragen as $vraag)
                        <tr>
                            <td></td>
                            <th>Vraag:</th>
                            <td>{{$vraag->vraag}}</td>
                            <td><a href="{{ route('admin.vraag.edit',[$project->slug,$milestone->slug,$vraag->id]) }}">wijzig</a></td>
                            <td></td>
                        </tr>
                        @foreach($vraag->antwoorden as $antwoord)
                            <tr>
                                <td></td>
                                <td> </td>
                                <th>Antwoord:</th>
                                <td>{{$antwoord->antwoord}}</td>
                                <td>{{$antwoord->aaantal_gekozen}}</td>
                            </tr>
                        @endforeach
                    @endforeach
                @endforeach
            @endforeach
        </table>
    </div>

    <h1>Themas</h1>
    <a href="{{ route('admin.thema.create') }}" class="btn btn-success"><i class="fa fa-plus"></i> Thema Toevoegen</a>
    <div class="table-responsive">
        <table class="table table-hover">
            @foreach ($themas as $thema)
                <tr>
                    <td>{{ $thema->naam }}</td>
                    <td>verwijderen</td>
                    <td><a href="{{route('admin.thema.edit',$thema->id)}}" class="btn btn-xs btn-warning"><i
                                    class="fa fa-pencil"></i> Wijzigen</a></td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

@section('js')
    @yield('js-sub')
@endsection