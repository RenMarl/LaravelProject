<div>
    <div class="container">
        <style>
            h1 {
                text-align: center;
            }
        </style>
        
        <h1>Weather Forecast</h1> 

        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Municipality</th>
                    <th>Temperature</th>
                    <th>Description</th>
                    <th>---</th>
                    <th>Humidity</th>
                    <th>Wind Speed</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($weatherData as $data)
                    <tr>
                        @if (isset($data['name']))
                            <td>{{ $data['name'] }}</td>
                        @else
                            <td>N/A</td>
                        @endif

                        @if (isset($data['main']) && isset($data['main']['temp']))
                            <td>{{ $data['main']['temp'] }}°C</td>
                        @else
                            <td>N/A</td>
                        @endif

                        <td>{{ $data['weather'][0]['description'] ?? 'N/A' }}</td>

                        <td>
                            @if (isset($data['weather'][0]['icon']))
                                <img src="http://openweathermap.org/img/wn/{{ $data['weather'][0]['icon'] }}.png" alt="{{ $data['weather'][0]['description'] }}" width="32" height="32">
                            @else
                                N/A
                            @endif
                        </td>

                        <td>{{ $data['main']['humidity'] ?? 'N/A' }}%</td>
                        <td>{{ $data['wind']['speed'] ?? 'N/A' }} m/s</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
