@extends('layout.main')

@section('pagetitle')
Projecten
@endsection

@section('css')
@yield('css-sub')
@endsection

@section('content')

<h1>{{ $project->naam }}</h1>

<div class="row">
	<div class="projectAfbeelding col-sm-3">
		{!! Html::image('/img/'.$project->milestones[0]->afbeelding,'',['class'=>'projectImage']) !!}
	</div>
	<div class="projectBeschrijving col-sm-5">
		<p>{{ $project->beschrijving }}</p>
		<p>Looptijd project:</p>
		<p>van: {{ $project->publish_from->format('d-m-Y') }}</p>
		<p>tot: {{ $project->publish_till->format('d-m-Y') }}</p>
	</div>
	<div class="projectMilestones col-sm-4">
		<h2>Milestones</h2>
		@foreach ($project->milestones as $milestone)
		<h3>{{ $milestone->naam }}</h3>
		<p>{{ $milestone->beschrijving }}</p>
		<p>Aangemakt op: {{ $milestone->created_at->format('d-m-Y') }}</p>
		@endforeach
	</div>
</div>
<div class="row">
	<div class="projectVragen col-sm-12">
		<h1>Vragen</h1>
	</div>
</div>


@endsection