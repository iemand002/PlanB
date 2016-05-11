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
                <table class="table table-hover" id="themas-table">
                    <thead>
                    <tr>
                        <th>Naam</th>
                        <th data-sortable="false">Acties</th>
                        <th data-sortable="false">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($themas as $thema)
                        <tr>
                            <td>{{ $thema->naam }}</td>
                            <td>verwijderen</td>
                            <td><a href="{{route('admin.thema.edit',$thema->id)}}" class="btn btn-xs btn-warning"><i
                                            class="fa fa-pencil"></i> Wijzigen</a></td>
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
            $("#themas-table").DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Dutch.json"
                }
            });
        });
    </script>
@endsection