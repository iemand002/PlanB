@extends('layout.main')

@section('pagetitle')
Projecten
@endsection

@section('css')
@yield('css-sub')
@endsection

@section('content')

<h1>{{ $project->naam }}</h1>

<div>
	<div class="projectAfbeelding">
	<img src="img/{{ $milestone->afbeelding }}" alt="">
	</div>
	<div class="projectBeschrijving">
		<p>{{ $project->beschrijving }}</p>
		<p>Looptijd project:</p>
		<p>van: {{ $project->publish_from->format('d-m-Y') }}</p>
		<p>tot: {{ $project->publish_till->format('d-m-Y') }}</p>
	</div>
	<div class="projectMilestones">
		<h2>Milestones</h2>
		@foreach ($milestones as $milestone)
		<h3>{{ $milestone->naam }}</h3>
		<p>{{ $milestone->beschrijving }}</p>
		<p>Looptijd milestone:</p>
		<p>van: </p>
		<p>tot: </p>
		@endforeach
	</div>
</div>


@endsection