@extends('layout.main')

@section('pagetitle')
Projecten
@endsection

@section('css')
@yield('css-sub')
@endsection

@section('content')
<h1>Projecten</h1>
<a href="{{ route('admin.project.create') }}">Project toevoegen</a>
@foreach ($projecten as $project)
<div>
	<h3>{{ $project->naam }}</h3>
	<p>verwijderen</p>
	<p>aanpassen</p>
	<p><a href="{{ route('admin.milestone.create', $project->slug) }}">milestone toevoegen</a></p>
</div>
@endforeach
<h1>Themas</h1>
<a href="{{ route('admin.thema.create') }}">Thema Toevoegen</a>
@foreach ($themas as $thema)
<div>
	<h3>{{ $thema->naam }}</h3>
	<p>verwijderen</p>
	<p>aanpassen</p>
</div>
@endforeach
@endsection

@section('js')
@yield('js-sub')
@endsection