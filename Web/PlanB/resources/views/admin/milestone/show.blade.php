@extends('layout.main')

@section('pagetitle')
    {{$milestone->naam}} - {{$project->naam}} - Projecten
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h1 class="pull-left">{{$milestone->naam}}
                <small><i class="fa fa-arrow-right"></i> <a
                            href="{{route('admin.project.show',$project->slug)}}">{{$project->naam}}</a></small>
            </h1>
            <a href="{{ route('admin.milestone.edit',[$project->slug,$milestone->slug]) }}"
               class="btn btn-warning pull-right"><i
                        class="fa fa-pencil"></i>
                Milestone wijzigen</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            {!! Html::image('/img'.$milestone->afbeelding,'',['class'=>'img-responsive']) !!}
        </div>
        <div class="col-md-4">
            <p>{{$milestone->beschrijving}}</p>
        </div>
        <div class="col-md-4">
            <p>{{$milestone->publish_from}} - {{$milestone->publish_till}}</p>
            <p>Locatie: {{$milestone->locatie}}</p>
            <p>Gemaakt door: {{$project->creator!=null?$project->creator->fullname:'-'}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h2 class="pull-left" id="vragen">Vragen</h2>
            <a href="{{ route('admin.vraag.create', [$project->slug,$milestone->slug]) }}"
               class="btn btn-success pull-right"><i
                        class="fa fa-plus"></i> Vraag toevoegen</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="milestones-table">
                    <thead>
                    <tr>
                        <th>Vraag</th>
                        <th>Antwoorden (aantal gekozen)</th>
                        <th data-sortable="false">Acties</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($milestone->vragen as $vraag)
                        <tr>
                            <td>{{ $vraag->vraag }}</td>
                            <td>
                                @foreach($vraag->antwoorden as $antwoord)
                                    {{$antwoord->antwoord}} ({{$antwoord->aantal_gekozen}})<br/>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{route('admin.vraag.edit',[$project->slug,$milestone->slug,$vraag->id])}}"
                                   class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i> Wijzigen</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            $("#milestones-table").DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Dutch.json"
                }
            });
        });
    </script>
@endsection