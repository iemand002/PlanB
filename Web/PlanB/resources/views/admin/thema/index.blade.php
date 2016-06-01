@extends('layout.main')

@section('pagetitle')
    Themas
@endsection

@section('css')
    @yield('css-sub')
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <h1 class="pull-left">Themas</h1>
            <a href="{{ route('admin.thema.create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>
                Thema
                Toevoegen</a>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered" id="themas-table">
                    <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Aantal projecten</th>
                        <th data-sortable="false">Acties</th>
                        <th data-sortable="false">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($themas as $thema)
                        <tr>
                            <td>{{ $thema->naam }}</td>
                            <td>{{$thema->projecten->count()}}</td>
                            <td>
                                <button @if($thema->projecten->count()>0)disabled @endif class="btn btn-xs btn-danger" data-toggle="modal" data-target="#del-thema-modal" data-themanaam="{{$thema->naam}}" data-themaid="{{$thema->id}}"><i class="fa fa-trash"></i>
                                    Verwijder</button>
                            </td>
                            <td><a href="{{route('admin.thema.edit',$thema->id)}}" class="btn btn-xs btn-warning"><i
                                            class="fa fa-pencil"></i> Wijzigen</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="del-thema-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Ben je zeker?</h4>
                </div>
                <div class="modal-body">
                    <p>Ben je zeker dat je thema "<span id="naam"></span>" wilt verwijderen?</p>
                    {!! Form::open(['route'=>['admin.thema.destroy',0],'method'=>'delete','id'=>'delete-form']) !!}
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
            $("#themas-table").DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Dutch.json"
                }
            });
        });
        $('#del-thema-modal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var naam = button.data('themanaam') // Extract info from data-* attributes
            var idslug = button.data('themaid') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('#naam').text(naam)
            var url = '{{route('admin.thema.destroy',':var')}}'.replace(':var', idslug);
            modal.find('#delete-form').attr('action', url);
        })
        jQuery('#really-delete').click(function () {
            jQuery('#del-thema-modal form').submit();
        });
    </script>
@endsection