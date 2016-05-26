@extends('layout.main')

@section('pagetitle')
Projecten
@endsection

@section('css')
@yield('css-sub')
@endsection

@section('content')
{!! Form::model($milestone,['method'=>'PATCH','route'=>['admin.milestone.update2', $project->slug, $milestone->slug],'class'=>'form-horizontal']) !!}
<div class="row">
    <div class="col-xs-12">
        <h1 class="pull-left">Milestone</h1>
        <div class="pull-right">
            <button type="submit" name="submit" value="opslaan" class="btn btn-default">Opslaan
            </button>
            <button type="submit" name="submit" value="sluit" class="btn btn-default">Opslaan &amp;
                Sluiten
            </button>
            <a href="{{route('admin.project.show',$project->slug)}}" class="btn btn-default">Annuleer</a>
        </div>
    </div>
</div>
@include('admin.milestone._form2',['submitbuttonText'=>"Milestone wijzigen"])
{!! Form::close() !!}
@endsection

@section('js')
@yield('js-sub')
@endsection



