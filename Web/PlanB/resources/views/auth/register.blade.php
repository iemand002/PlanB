@extends('layout.main')
@section('pagetitle')
    Registreren
@endsection
@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card card-default">
                <div class="card-heading">Register</div>
                <div class="card-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        @include('auth._register-form',['submitbuttonText'=>"Gebruiker opslaan"])
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
