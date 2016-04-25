@extends('layout.main')

@section('pagetitle')
    Nieuwe vraag
@endsection

@section('css')
    @yield('css-sub')
@endsection

@section('content')
    <h1>Nieuw vraag voor milestone "{{$milestone->naam}}" van project "{{$project->naam}}"</h1>
    {!! Form::open(['method'=>'POST','route'=>['admin.vraag.store', $project->slug, $milestone->slug]]) !!}
    @include('admin.vraag._form',['submitbuttonText'=>"Vraag opslaan"])
    {!! Form::close() !!}
@endsection

@section('js')
    @yield('js-sub')
@endsection