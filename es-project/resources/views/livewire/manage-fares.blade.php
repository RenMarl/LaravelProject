<div>
<div>
    <h1>Manage Fares</h1>

    <div class="mb-3">
        <input type="text" wire:model="route" placeholder="Route" class="form-control">
    </div>
    <div class="mb-3">
        <input type="number" wire:model="distance" placeholder="Distance" class="form-control">
    </div>
    <div class="mb-3">
        <input type="number" wire:model="regular_fare" placeholder="Regular Fare" class="form-control">
    </div>
    <div class="mb-3">
        <input type="number" wire:model="discounted_fare" placeholder="Discounted Fare" class="form-control">
    </div>

    @if ($fareIdToUpdate)
        <button wire:click="updateFare" class="btn btn-primary">Update Fare</button>
    @else
        <button wire:click="createFare" class="btn btn-primary">Create Fare</button>
    @endif
    

    <table class="table">
        <thead>
            <tr>
                <th>Route</th>
                <th>Distance (KM)</th>
                <th>Regular Fare</th>
                <th>Discounted Fare</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fares as $fare)
                <tr>
                    <td>{{ $fare->route }}</td>
                    <td>{{ $fare->distance }}</td>
                    <td>{{ number_format($fare->regular_fare, 2) }}</td>
                    <td>{{ number_format($fare->discounted_fare, 2) }}</td>
                    <td>
                        <button wire:click="editFare({{ $fare }})" class="btn btn-primary btn-sm">Edit</button>
                        <button wire:click="deleteFare({{ $fare }})" class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<li class="nav-item dropdown me-auto"> 
    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Logout?
    </a>
    <livewire:logout />
</li>
</div>
