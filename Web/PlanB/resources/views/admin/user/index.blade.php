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
                                <a href="" class="btn btn-xs btn-danger" disabled=""><i class="fa fa-trash"></i>
                                    Verwijder</a>
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
            $("#users-table").DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Dutch.json"
                }
            });
        });
    </script>
@endsection