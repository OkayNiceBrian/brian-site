

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
                echo "Invalid Zip Code.";
            } else {
                $weatherData = $response->json();
                echo $weatherData["location"]["name"];
            }
        }
    ?>

    @isset($weatherData)
        <div>
            <h3></h3>
        </div>
    @endisset

    <div>
    </div>

@stop