@extends('layout.main')

@section('pagetitle')
    Wijzig project
@endsection

@section('css')
    @yield('css-sub')
@endsection

@section('content')
    <h1>Wijzig project</h1>
    <h2>Algemene gegevens</h2>
    {!! Form::model($project,['method'=>'PATCH','route'=>['admin.project.update',$project->slug],'class'=>"form-horizontal"]) !!}
    @include('admin.project._form',['submitbuttonText'=>"Project wijzigen"])
    {!! Form::close() !!}
@endsection

@section('js')
    @yield('js-sub2')
@endsection