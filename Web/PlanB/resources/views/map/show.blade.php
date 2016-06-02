@extends('layout.main')

@section('pagetitle')
Projecten
@endsection

@section('css')
    <style>
        #my_map {
            height: 500px;
            width: 500px;
        }
    </style>
@endsection

@section('content')


<input type="text" id="my_input">
<div id="my_map">
</div>
<p id="adress">Adress:</p>

@endsection