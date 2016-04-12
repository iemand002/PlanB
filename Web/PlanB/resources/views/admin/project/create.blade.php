@extends('layout.main')

@section('pagetitle')
    Nieuw project
@endsection

@section('css')
    @yield('css-sub')
@endsection

@section('content')
    <h1>Nieuw project</h1>
    {!! Form::open(['method'=>'POST','route'=>'project.store']) !!}
    @include('admin.project._form',['submitbuttonText'=>"Project opslaan"])
    {!! Form::close() !!}
@endsection

@section('js')
    @yield('js-sub')
@endsection