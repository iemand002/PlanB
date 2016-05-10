@extends('layout.main')

@section('pagetitle')
    Wijzig vraag
@endsection

@section('css')
    @yield('css-sub')
@endsection

@section('content')
    <h1>Wijzig vraag voor milestone "{{$milestone->naam}}" van project "{{$project->naam}}"</h1>
    {!! Form::model($vraag,['method'=>'PATCH','route'=>['admin.vraag.update', $project->slug, $milestone->slug, $vraag->id],'class'=>"form-horizontal"]) !!}
    @include('admin.vraag._form',['submitbuttonText'=>"Vraag wijzigen"])
    {!! Form::close() !!}
@endsection

@section('js')
    @yield('js-sub')
@endsection