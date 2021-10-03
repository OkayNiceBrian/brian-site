

@extends('layouts._layout')

@section('title',  'Weather')
@section('about')

@stop()

@section('navbar')

@section('content')
    
    <form action="" method="get">
        @csrf
        <label for="zip">Enter Zip Code:</label>
        <input type="number" id="zip" name="zip">
        <input type="submit" value="See Weather">
    </form>

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
            $windMph = "Wind: " . $weatherData["current"]["wind_mph"] . " m/h " . $weatherData["current"]["wind_dir"];
        ?>
        <div>
            <h3><?php echo $cityState; ?></h3>
            <h3><?php echo $month . "/" . $day . "/" . $year; ?></h3>
            <h3><?php echo $time; ?></h3>
            <img src="<?php echo $weatherData["current"]["condition"]["icon"] ?>" alt="Weather Icon">
            <p><?php echo $temperatureF . " " . $weatherData["current"]["condition"]["text"]; ?></p>
            <p><?php echo $windMph; ?></p>
        </div>
    @endisset

    <div>
    </div>

@stop