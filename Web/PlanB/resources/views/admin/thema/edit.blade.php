@extends('layout.main')

@section('pagetitle')
    Wijzig thema
@endsection

@section('css')
    @yield('css-sub')
@endsection

@section('content')
    <h1>Wijzig Thema</h1>
    {!! Form::model($thema,['method'=>'PATCH','route'=>['admin.thema.update',$thema->id],'class'=>"form-horizontal"]) !!}
    @include('admin.thema._form',['submitbuttonText'=>"Thema wijzigen"])
    {!! Form::close() !!}
@endsection

@section('js')
    @yield('js-sub')
@endsection