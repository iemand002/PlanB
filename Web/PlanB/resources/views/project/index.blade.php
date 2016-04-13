@extends('layout.main')
@section('pagetitle')
    Alle projecten
@endsection
@section('content')
    <pre>
        <?php print_r($projecten)?>
    </pre>
@endsection