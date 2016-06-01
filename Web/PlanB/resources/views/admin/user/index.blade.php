@extends('layout.main')
@section('pagetitle')
    Alle gebruikers
@endsection
@section('content')

    {{-- Top Bar --}}
    <div class="row page-title-row">
        <div class="col-md-6">
            <h1>Alle gebruikers</h1>

        </div>
        <div class="col-md-6 text-right">
            <a href="{{route('admin.user.create')}}" type="button" class="btn btn-success btn-md">
                <i class="fa fa-plus-circle"></i> Nieuwe gebruiker
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="users-table">
                    <thead>
                    <tr>
                        <th>Naam &amp; Familienaam</th>
                        <th>E-mail</th>
                        <th>Admin?</th>
                        <th>Geregistreerd op</th>
                        <th data-sortable="false">Acties</th>
                        <th data-sortable="false">&nbsp;</th>
                        <th data-sortable="false">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>

                    {{-- The Subfolders --}}
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->fullname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->admin?'Ja':'Nee'}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
                                <a href="{{route('admin.user.edit',$user->id)}}" class="btn btn-xs btn-warning"><i
                                            class="fa fa-pencil"></i> Wijzigen</a>
                            </td>
                            <td>
                                {!! reset_form($user->email) !!}
                            </td>
                            <td>
                                <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#del-user-modal" data-username="{{$user->fullname}}" data-userid="{{$user->id}}"><i class="fa fa-trash"></i>
                                    Verwijder</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="del-user-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Ben je zeker?</h4>
                </div>
                <div class="modal-body">
                    <p>Ben je zeker dat je gebruiker "<span id="username"></span>" wilt verwijderen?</p>
                    {!! Form::open(['route'=>['admin.user.destroy',0],'method'=>'delete','id'=>'delete-form']) !!}
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
            $("#users-table").DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Dutch.json"
                }
            });
        });
        $('#del-user-modal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var username = button.data('username') // Extract info from data-* attributes
            var userid = button.data('userid') // Extract info from data-* attributes
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('#username').text(username)
            var url = '{{route('admin.user.destroy',':user')}}'.replace(':user', userid);
            modal.find('#delete-form').attr('action', url);
        })
        jQuery('#really-delete').click(function () {
            jQuery('#del-user-modal form').submit();
        });
    </script>
@endsection