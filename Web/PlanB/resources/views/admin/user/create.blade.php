@extends('layout.main')

@section('pagetitle')
    Nieuwe gebruiker
@endsection

@section('css')
    @yield('css-sub')
@endsection

@section('content')
    <h1>Nieuwe gebruiker</h1>
    {!! Form::open(['method'=>'POST','route'=>'admin.user.store','class'=>"form-horizontal"]) !!}
    @include('auth._register-form',['submitbuttonText'=>"Gebruiker opslaan"])
    {!! Form::close() !!}
@endsection

@section('js')
    @yield('js-sub')
@endsection