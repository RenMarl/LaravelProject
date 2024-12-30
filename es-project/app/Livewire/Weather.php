<?php

namespace App\Livewire;

use Livewire\Component;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;

class Weather extends Component
{
    public $locations = [
        ['latitude' => 13.940104432067631, 'longitude' => 124.28950272619466],
        ['latitude' => 13.696781292257144, 'longitude' => 124.3596994430746],
        ['latitude' => 13.609572112760187, 'longitude' => 124.31704827332474],
        ['latitude' => 13.986669121498197, 'longitude' => 124.12867227359624],
        ['latitude' => 13.790861841637719, 'longitude' => 124.36147657514752],
        ['latitude' => 14.03494847447767, 'longitude' => 124.16776917920025],
        ['latitude' => 13.89266777584558, 'longitude' => 124.28772559412172],
        ['latitude' => 13.611034730676675, 'longitude' => 124.07699336025219],
        ['latitude' => 13.682255171887936, 'longitude' => 124.27396163864056],
        ['latitude' => 13.846868845578717, 'longitude' => 124.31596343675264],
        ['latitude' => 13.5849, 'longitude' => 124.2066]
    ];
    public $weatherData = [];

    public function mount()
    {
        // Fetch weather data on initial load
        $this->fetchWeatherData();
    }

    public function fetchWeatherData()
    {
        $apiKey = env('OPENWEATHER_API_KEY');
        $client = new Client();

        $this->weatherData = []; // Clear existing data before fetching

        foreach ($this->locations as $location) {
            $url = "https://api.openweathermap.org/data/2.5/weather?lat=" . $location['latitude'] . "&lon=" . $location['longitude'] . "&units=metric&appid=$apiKey";

            try {
                $response = $client->request('GET', $url);
                $data = json_decode($response->getBody(), true);

                // Basic error checking
                if (isset($data['cod']) && $data['cod'] != 200) {
                    $this->weatherData[] = ['error' => 'API Error: ' . $data['message']];
                } else {
                    $this->weatherData[] = $data;
                }
            } catch (ConnectException $e) {
                $this->weatherData[] = ['error' => 'Connection error!'];
            } catch (\Exception $e) {
                $this->weatherData[] = ['error' => 'An error occurred!'];
            }
        }
    }

    public function render()
{
    return view('livewire.weather', ['weatherData' => $this->weatherData]); 
}
}
class Location
{
    public $latitude;
    public $longitude;

    public function __construct($latitude, $longitude)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }
}
