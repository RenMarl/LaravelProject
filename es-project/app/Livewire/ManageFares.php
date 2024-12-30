<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Fare;

class ManageFares extends Component
{
    public $fares;
    public $route;
    public $distance;
    public $regular_fare;
    public $discounted_fare;
    public $fareIdToUpdate = null;

    public function mount()
    {
        $this->fares = Fare::all();
    }

    public function render()
    {
        return view('livewire.manage-fares');
    }

    public function createFare()
    {
        $this->validate([
            'route' => 'required',
            'distance' => 'required|numeric',
            'regular_fare' => 'required|numeric',
            'discounted_fare' => 'required|numeric',
        ]);

        Fare::create([
            'route' => $this->route,
            'distance' => $this->distance,
            'regular_fare' => $this->regular_fare,
            'discounted_fare' => $this->discounted_fare,
        ]);

        $this->resetInputFields();
        $this->fares = Fare::all();
    }

    public function editFare(Fare $fare)
    {
        $this->fareIdToUpdate = $fare->id;
        $this->route = $fare->route;
        $this->distance = $fare->distance;
        $this->regular_fare = $fare->regular_fare;
        $this->discounted_fare = $fare->discounted_fare;
    }

    public function updateFare()
    {
        $this->validate([
            'route' => 'required',
            'distance' => 'required|numeric',
            'regular_fare' => 'required|numeric',
            'discounted_fare' => 'required|numeric',
        ]);

        $fare = Fare::find($this->fareIdToUpdate);
        $fare->update([
            'route' => $this->route,
            'distance' => $this->distance,
            'regular_fare' => $this->regular_fare,
            'discounted_fare' => $this->discounted_fare,
        ]);

        $this->resetInputFields();
        $this->fares = Fare::all();
        $this->fareIdToUpdate = null;
    }

    public function deleteFare(Fare $fare)
    {
        $fare->delete();
        $this->fares = Fare::all();
    }

    private function resetInputFields()
    {
        $this->route = '';
        $this->distance = '';
        $this->regular_fare = '';
        $this->discounted_fare = '';
    }
}
