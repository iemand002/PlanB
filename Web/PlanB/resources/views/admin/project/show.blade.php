@extends('layout.main')

@section('pagetitle')
    {{$project->naam}} - Projecten
@endsection

@section('content')
    <nav role="navigation" class="breadcrumbs" aria-label="breadcrumbs">
        <ol>
            <li><a href="{{route('admin.projecten.index')}}" title="Projecten">Alle Projecten</a>
                <ol>
                    <li class="is-current">Project: {{$project->naam}}</li>
                </ol>
            </li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-xs-12">
            <h1 class="pull-left">Project: {{$project->naam}}
            </h1>
            <a href="{{ route('admin.project.edit',$project->slug) }}" class="btn btn-warning pull-right"><i
                        class="fa fa-pencil"></i>
                Project wijzigen</a>
            <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#del-project-modal"
                    data-projectnaam="{{$project->naam}}" data-projectslug="{{$project->slug}}"><i
                        class="fa fa-trash"></i>
                Verwijder
            </button>
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
                <table class="table table-striped table-bordered" id="milestones-table"
                       data-order="[[ 4, &quot;desc&quot; ]]">
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
                        <th data-sortable="false">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($project->milestones as $milestone)
                        <tr>
                            <td>
                                <?php $url = $milestone->afbeelding?>
                                <img src="{{((strpos($url,'http')===0||strpos($url,'/images')===0)?'':'/img').$url}}">
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
                            <td>
                                <button class="btn btn-xs btn-danger" data-toggle="modal"
                                        data-target="#del-milestone-modal" data-milestonenaam="{{$milestone->naam}}"
                                        data-milestoneslug="{{$milestone->slug}}"><i class="fa fa-trash"></i>
                                    Verwijder
                                </button>
                            </td>
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
    @include('admin.project._modal_del_project')
    @include('admin.milestone._modal_del_milestone')
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
    @include('admin.project._modal_del_project_js')
    @include('admin.milestone._modal_del_milestone_js')
@endsection