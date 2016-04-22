@extends('layout.main')

@section('pagetitle')
Projecten
@endsection

@section('css')
@yield('css-sub')
@endsection

@section('content')
<h1>Projecten</h1>
@foreach ($projecten as $project)
<div>
	<h3>{{ $project->naam }}</h3>
	<p><a href="">verwijderen</a></p>
	<p><a href="">aanpassen</a></p>
	<p><a href="{{ route('admin.milestone.create', $project->slug) }}">milestone toevoegen</a></p>
</div>
@endforeach
@endsection

@section('js')
@yield('js-sub')
@endsection