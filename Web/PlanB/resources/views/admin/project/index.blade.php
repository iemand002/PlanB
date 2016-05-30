@extends('layout.main')

@section('pagetitle')
    Projecten
@endsection

@section('css')
    @yield('css-sub')
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h1 class="pull-left">Projecten</h1>
            <a href="{{ route('admin.project.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>
                Project toevoegen</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="projecten-table" data-order="[[ 3, &quot;desc&quot; ]]">
                    <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Milestones</th>
                        <th>Thema</th>
                        <th>Zichtbaar vanaf</th>
                        <th>Zichtbaar t/m</th>
                        <th>Gemaakt door</th>
                        <th data-sortable="false">Acties</th>
                        <th data-sortable="false">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($projecten as $project)
                        <tr>
                            <td><a href="{{route('admin.project.show',$project->slug)}}">{{ $project->naam }}</a></td>
                            <td>
                                <a href="{{route('admin.project.show',$project->slug)}}#milestones">{{$project->milestones->count()}}</a>
                            </td>
                            <td>{{$project->thema->naam}}</td>
                            <td>{{$project->publish_from}}</td>
                            <td>{{$project->publish_till}}</td>
                            <td>{{$project->creator!=null?$project->creator->fullname:'-'}}</td>
                            <td><a href="{{route('admin.project.edit',$project->slug)}}" class="btn btn-xs btn-warning"><i
                                            class="fa fa-pencil"></i> Wijzigen</a></td>
                            <td><a href="{{ route('admin.milestone.create', $project->slug) }}"
                                   class="btn btn-xs btn-default"><i
                                            class="fa fa-plus"></i> Milestone toevoegen</a></td>
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
            $("#projecten-table").DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Dutch.json"
                }
            });
        });
    </script>
@endsection