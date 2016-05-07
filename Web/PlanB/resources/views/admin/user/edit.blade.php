@extends('layout.main')

@section('pagetitle')
    Nieuwe gebruiker
@endsection

@section('css')
    @yield('css-sub')
@endsection

@section('content')
    <h1>Nieuwe gebruiker</h1>
    {!! Form::model($user,['method'=>'PATCH','route'=>['admin.user.update',$user->id],'class'=>"form-horizontal"]) !!}
    @include('auth._register-form',['submitbuttonText'=>"Gebruiker wijzigen"])
    {!! Form::close() !!}
@endsection

@section('js')
    @yield('js-sub')
@endsection