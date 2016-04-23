@extends('layout.main')
@section('pagetitle')
Alle projecten
@endsection
@section('content')
<div>
	@foreach ($projecten as $project)
	<h1>{{ $project->naam }}</h1>
	<p>{{ $project->created_at }}</p>
		<pre>
			<?php print_r($project->toArray())?>
		</pre>
		<pre>
			<?php print_r($project->milestones->toArray())?>
		</pre>
</div>
@endforeach
@endsection