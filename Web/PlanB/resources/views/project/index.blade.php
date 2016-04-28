@extends('layout.main')
@section('pagetitle')
Alle projecten
@endsection
@section('content')
<div>
	@foreach ($projecten as $k => $project)
	

	@if ($k % 2 == 0)
	<div class="project pLeft">
		@else
		<div class="project pRight">
			@endif
			<a href="{{ route('project.show', $project->slug) }}"><h1>{{ $project->naam }}</h1></a>
			<p>{{ $project->beschrijving }}</p>
			<p>Aangemaakt op: {{ date("d-m-Y", $project->created_at = time() ) }}</p>
		</div>
		@endforeach

	</div>
@endsection