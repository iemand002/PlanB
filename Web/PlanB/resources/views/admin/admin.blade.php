@extends('layout.main')

@section('pagetitle')
    Adminpanel
@endsection
@section('css')
    <style>
        .card{
            height: 200px;
            line-height: 160px;
        }
    </style>
    @endsection

@section('content')
    <h1>Adminpanel</h1>
    <div class="row">
        <div class="col-md-4">
            <section class="card">
                <a href="{{route('admin.projecten.index')}}">
                    <div class="card-body text-center">
                        Projecten
                    </div>
                </a>
            </section>
        </div>
        <div class="col-md-4">
            <section class="card">
                <a href="{{route('admin.thema.index')}}">
                    <div class="card-body text-center">
                        Themas
                    </div>
                </a>
            </section>
        </div>
        <div class="col-md-4">
            <section class="card">
                <a href="{{route('admin.user.index')}}">
                    <div class="card-body text-center">
                        Gebruikers
                    </div>
                </a>
            </section>
        </div>
    </div>
@endsection