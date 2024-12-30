<div class="container mx-auto responsive"> 
    <div class="mb-4">
        <input type="text" wire:model="search" placeholder="Search by Route" class="form-control">
    </div>
    <h1>Fares</h1>
    <table class="table table-responsive"> 
        <thead>
            <tr>
                <th>Route</th>
                <th>Distance (KM)</th>
                <th>Regular Fare</th>
                <th>Discounted Fare</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fares as $fare)
                <tr>
                    <td>{{ $fare->route }}</td>
                    <td>{{ $fare->distance }}</td>
                    <td>{{ number_format($fare->regular_fare, 2) }}</td>
                    <td>{{ number_format($fare->discounted_fare, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>