@extends('layout.main')

@section('pagetitle')
    Nieuw thema
@endsection

@section('css')
    @yield('css-sub')
@endsection

@section('content')
    <h1>Nieuw Thema</h1>
    {!! Form::open(['method'=>'POST','route'=>'admin.thema.store','class'=>"form-horizontal"]) !!}
    @include('admin.thema._form',['submitbuttonText'=>"Thema opslaan"])
    {!! Form::close() !!}
@endsection

@section('js')
    @yield('js-sub')
@endsection