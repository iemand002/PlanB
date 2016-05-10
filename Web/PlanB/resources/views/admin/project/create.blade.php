@extends('layout.main')

@section('pagetitle')
    Nieuw project
@endsection

@section('css')
    @yield('css-sub')
@endsection

@section('content')
    <h1>Nieuw project</h1>
    <h2>Algemene gegevens</h2>
    {!! Form::open(['method'=>'POST','route'=>'admin.project.store','class'=>"form-horizontal"]) !!}
    @include('admin.project._form')
    <h2>Eerste milestone</h2>
    @include('admin.milestone._form',['submitbuttonText'=>"Project opslaan",'create'=>true,'projectcreate'=>true])
    {!! Form::close() !!}
@endsection

@section('js')
    @yield('js-sub2')
    @yield('js-sub')
@endsection