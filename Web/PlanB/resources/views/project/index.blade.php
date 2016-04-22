@extends('layout.main')
@section('pagetitle')
Alle projecten
@endsection
@section('content')
<div>
	@foreach ($projecten as $project)
	<h1>{{ $project->naam }}</h1>
	<p>{{ $project->created_at }}</p>
</div>
@endforeach
@endsection