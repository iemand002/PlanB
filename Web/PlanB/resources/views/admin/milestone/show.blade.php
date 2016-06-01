@extends('layout.main')

@section('pagetitle')
    {{$milestone->naam}} - {{$project->naam}} - Projecten
@endsection

@section('content')
    <nav role="navigation" class="breadcrumbs" aria-label="breadcrumbs">
        <ol>
            <li><a href="{{route('admin.projecten.index')}}" title="Projecten">Alle Projecten</a>
                <ol>
                    <li><a href="{{route('admin.project.show',$project->slug)}}"
                           title="{{$project->naam}}">Project: {{$project->naam}}</a>
                        <ol>
                            <li class="is-current">Milestone: {{$milestone->naam}}</li>
                        </ol>
                    </li>
                </ol>
            </li>
        </ol>
    </nav>
    <div class="row">
        <div class="col-xs-12">
            <h1 class="pull-left">Milestone: {{$milestone->naam}}</h1>
            <a href="{{ route('admin.milestone.edit',[$project->slug,$milestone->slug]) }}"
               class="btn btn-warning pull-right"><i
                        class="fa fa-pencil"></i>
                Milestone wijzigen</a>
            <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#del-milestone-modal"
                    data-milestonenaam="{{$milestone->naam}}" data-milestoneslug="{{$milestone->slug}}"><i
                        class="fa fa-trash"></i>
                Verwijder
            </button>
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
                        <th data-sortable="false">&nbsp;</th>
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
                            <td>
                                <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#del-vraag-modal"
                                        data-vraag="{{$vraag->vraag}}" data-vraagid="{{$vraag->id}}"><i
                                            class="fa fa-trash"></i>
                                    Verwijder
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.milestone._modal_del_milestone')
    <div class="modal fade" tabindex="-1" role="dialog" id="del-vraag-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Ben je zeker?</h4>
                </div>
                <div class="modal-body">
                    <p>Ben je zeker dat je vraag "<span id="naam"></span>" wilt verwijderen?</p>
                    <p>Hiermee worden ook alle bijhorende antwoorden verwijderd</p>
                    <p>Deze actie is onomkeerbaar!</p>
                    {!! Form::open(['route'=>['admin.vraag.destroy',0],'method'=>'delete','id'=>'delete-form']) !!}
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">Annuleer</button>
                    <button type="button" class="btn btn-danger" id="really-delete">Verwijder</button>
                </div>
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
    @include('admin.milestone._modal_del_milestone_js')
    <script>
        $('#del-vraag-modal').on('show.bs.modal', function (event) {
                    {{--Button that triggered the modal--}}
            var button = $(event.relatedTarget);
                    {{--Extract info from data-* attributes--}}
            var naam = button.data('vraag');
            var idslug = button.data('vraagid');
                    {{-- Update the modal's content. --}}
            var modal = $(this);
            modal.find('#naam').text(naam)
            var url = '{{route('admin.vraag.destroy',':var')}}'.replace(':var', idslug);
            modal.find('#delete-form').attr('action', url);
        });
        jQuery('#del-vraag-modal #really-delete').click(function () {
            jQuery('#del-vraag-modal form').submit();
        });
    </script>
@endsection