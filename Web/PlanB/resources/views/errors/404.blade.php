@extends('layout.main')

@section('pagetitle')
    Error 404 - Not Found
@endsection
@section('content')
    <div class="row">
        <div class="col-xs-12 text-center">
            <h1>Sorry!</h1>
            <p>We konden de door u gevraagde pagina niet (meer) vinden...</p>
            <p><a href="{{route('home')}}" class="btn btn-success">Klik hier om naar de homepagina te gaan</a> </p>
        </div>
    </div>
@endsection
