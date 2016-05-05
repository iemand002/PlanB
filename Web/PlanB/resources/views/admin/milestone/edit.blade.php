@extends('layout.main')

@section('pagetitle')
Projecten
@endsection

@section('css')
@yield('css-sub')
@endsection

@section('content')
<h1>Milestone</h1>
{!! Form::model($milestone,['method'=>'PATCH','route'=>['admin.milestone.update', $project->slug, $milestone->slug]]) !!}
@include('admin.milestone._form',['submitbuttonText'=>"Milestone wijzigen"])
{!! Form::close() !!}
@endsection

@section('js')
@yield('js-sub')
@endsection



