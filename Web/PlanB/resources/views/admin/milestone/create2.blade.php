@extends('layout.main')

@section('pagetitle')
    Projecten
@endsection


@section('content')
    {!! Form::open(['method'=>'POST','route'=>['admin.milestone.store', $project->slug],'class'=>'form-horizontal']) !!}
    <div class="row">
        <div class="col-xs-12">
            <h1 class="pull-left">Milestone</h1>
            <div class="pull-right">
                <button type="submit" name="submit" value="sluit" class="btn btn-default">Opslaan
                </button>
                <button type="submit" name="submit" value="sluit" class="btn btn-default">Opslaan &amp;
                    Sluiten
                </button>
                <button type="submit" name="submit" value="nieuw" class="btn btn-default">Opslaan
                    &amp;
                    Nieuw
                </button>
                <a href="{{route('admin.project.show',$project->slug)}}" class="btn btn-default">Annuleer</a>
            </div>
        </div>
    </div>
    @include('admin.milestone._form2',['submitbuttonText'=>"Milestone opslaan",'create'=>true])
    {!! Form::close() !!}
@endsection

@section('js')
    @yield('js-sub')
@endsection
@section('css')
    @yield('css-sub')
@endsection



