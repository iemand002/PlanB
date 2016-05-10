@extends('layout.main')
@section('pagetitle')
    {{$project->naam}} - projecten
@endsection
@section('content')
<pre>
    <?php print_r($project->toArray())?>
</pre>
@endsection
@section('js')

@endsection