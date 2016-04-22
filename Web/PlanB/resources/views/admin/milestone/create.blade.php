@extends('layout.main')

@section('pagetitle')
Projecten
@endsection

@section('css')
@yield('css-sub')
@endsection

@section('content')
<h1>Milestone</h1>
{!! Form::open(['method'=>'POST','route'=>['admin.milestone.store', $project->slug]]) !!}
@include('admin.milestone._form',['submitbuttonText'=>"Milestone opslaan"])
{!! Form::close() !!}
@endsection

@section('js')
@yield('js-sub')
@endsection



