@extends('layout.main')

@section('pagetitle')
    {{$project->naam}} - Projecten
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h1 class="pull-left">{{$project->naam}}
                <small><i class="fa fa-arrow-right"></i> <a href="{{route('admin.projecten.index')}}">Projecten</a>
                </small>
            </h1>
            <a href="{{ route('admin.project.edit',$project->slug) }}" class="btn btn-warning pull-right"><i
                        class="fa fa-pencil"></i>
                Project wijzigen</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <p>{{$project->beschrijving}}</p>
        </div>
        <div class="col-md-6">
            <p>{{$project->publish_from}} - {{$project->publish_till}}</p>
            <p>Thema: {{$project->thema->naam}}</p>
            <p>Gemaakt door: {{$project->creator!=null?$project->creator->fullname:'-'}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <h2 class="pull-left" id="milestones">Milestones</h2>
            <a href="{{ route('admin.milestone.create', $project->slug) }}"
               class="btn btn-success pull-right"><i
                        class="fa fa-plus"></i> Milestone toevoegen</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="milestones-table">
                    <thead>
                    <tr>
                        <th data-sortable="false">Afbeelding</th>
                        <th>Naam</th>
                        <th>Vragen</th>
                        <th>Locatie</th>
                        <th>Zichtbaar vanaf</th>
                        <th>Zichtbaar t/m</th>
                        <th>Gemaakt door</th>
                        <th data-sortable="false">Acties</th>
                        <th data-sortable="false">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($project->milestones as $milestone)
                        <tr>
                            <td>{!! Html::image('/img'.$milestone->afbeelding,'',['class'=>'img-responsive']) !!}</td>
                            <td>
                                <a href="{{route('admin.milestone.show',[$project->slug,$milestone->slug])}}">{{ $milestone->naam }}</a>
                            </td>
                            <td>
                                <a href="{{route('admin.milestone.show',[$project->slug,$milestone->slug])}}#vragen">{{$milestone->vragen->count()}}</a>
                            </td>
                            <td>{{$milestone->locatie}}</td>
                            <td>{{$milestone->publish_from}}</td>
                            <td>
                                {{$milestone->publish_till}}
                            </td>
                            <td>{{$milestone->creator!=null?$milestone->creator->fullname:'-'}}</td>
                            <td><a href="{{route('admin.milestone.edit',[$project->slug,$milestone->slug])}}"
                                   class="btn btn-xs btn-warning"><i
                                            class="fa fa-pencil"></i> Wijzigen</a></td>
                            <td><a href="{{ route('admin.vraag.create', [$project->slug,$milestone->slug]) }}"
                                   class="btn btn-xs btn-default"><i
                                            class="fa fa-plus"></i> Vraag toevoegen</a></td>
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