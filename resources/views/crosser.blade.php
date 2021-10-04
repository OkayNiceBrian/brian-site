@extends('layouts._layout')

@section('title',  'Crosser')
@section('head')
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .container p {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-size: 30pt;
            margin-top: 0;
        }
    </style>
@stop

@section('navbar')

@section('content')

    <div class="container">
        <p>Crosser</p>
        <iframe src="https://preview.p5js.org/OkayNiceBrian/embed/P3dDM8PnN" height ="450" width="450"></iframe>
    </div>

@stop