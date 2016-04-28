@extends('layout.main')
@section('pagetitle')
Alle projecten
@endsection
@section('content')
<div>
	<?php $counter = 2 ?>
	<?php $counter2 = 0 ?>
	@foreach ($projecten as $project)
	@if (++$counter % 3 === 0)
	<div class="row">
		@endif
		<div class="col-xs-4">
			<a href="{{ route('project.show', $project->slug) }}"><h1>{{ $project->naam }}</h1></a>
			<p>{{ str_limit($project->beschrijving, $limit = 300, $end = '...') }}</p>
			<p>Aangemaakt op: {{ date("d-m-Y", $project->created_at = time() ) }}</p>
		</div>
		@if (++$counter2 % 3 === 0)
	</div>
	@endif
	@endforeach
	@if ($counter2 % 3 != 0)
	</div>
	@endif
</div>
@endsection