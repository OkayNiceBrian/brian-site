

@extends('layouts._layout')

@section('title',  'Weather')
@section('head')
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 0;
        }
        .dataContainer {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin: 0;
            padding: 0;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            width: 450;
            background-color: lavender;
            border-width: 20;
            border-color: cadetblue;
        }
        .dateTime {
            display: flex;
            flex-direction: row;
        }
        .iconAndTemp {
            display: flex;
            flex-direction: row-reverse;
            justify-content: center;
            padding-top: 0;
            margin-top: 0;
        }
        .iconAndText {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding-right: 40;
            color: darkgrey;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        .titleText {
            font-size: 24pt;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        .zipForm {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            padding-top: 20;
        }
    </style>
@stop()

@section('navbar')

@section('content')

    <div class="container">

        <h1 class="titleText">Current Weather</h1>

        <?php
            use Illuminate\Support\Facades\Http;

            $weatherData;

            if (isset($_GET["zip"])) {
                $zip = $_GET["zip"];

                $request = 'https://weatherapi-com.p.rapidapi.com/current.json';
                $response = Http::withHeaders([
                    'x-rapidapi-host' => 'weatherapi-com.p.rapidapi.com',
                    'x-rapidapi-key' => env('RAPID_API_KEY'),
                ])->get($request, [
                    'q' => $zip,
                ]);

                if ($response->getReasonPhrase() == 'Bad Request') {
                    echo "<h3>Invalid Zip Code.</h3>";
                } else {
                    $weatherData = $response->json();
                }
            }
        ?>

        @isset($weatherData)
            <?php 
                $cityState = $weatherData["location"]["name"] . ", " . $weatherData["location"]["region"] . ", " . $weatherData["location"]["country"];
                list($date, $time) = explode(" ", $weatherData["location"]["localtime"]);
                list($year, $month, $day) = explode("-", $date);
                $temperatureF = $weatherData["current"]["temp_f"] . " ℉";
                $windMph = "Wind: " . $weatherData["current"]["wind_mph"] . " m/h ";
            ?>
            <div class="dataContainer">
                <h3 style="margin-bottom: 0"><?php echo $cityState; ?></h3>
                <div class="dateTime">
                    <h4 style="padding-right: 15"><?php echo $month . "/" . $day . "/" . $year; ?></h3>
                    <h4><?php echo $time; ?></h3>
                </div>
                <div class="iconAndTemp">
                    <p style="font-size: 30pt; margin-top: 12;"><?php echo $temperatureF; ?></h1>
                    <div class="iconAndText">
                        <img src="<?php echo $weatherData["current"]["condition"]["icon"] ?>" alt="Weather Icon">
                        <p style="margin-top: 0"><?php echo $weatherData["current"]["condition"]["text"]; ?></p>
                    </div>
                </div>
                <p style="margin-top: 5;"><?php echo $windMph; ?></p>
            </div>
        @endisset
    
        <form class="zipForm" action="" method="get">
            @csrf
            <label for="zip">Enter Zip Code:</label>
            <input type="number" id="zip" name="zip">
            <input type="submit" value="See Weather">
        </form>

    </div>

@stop