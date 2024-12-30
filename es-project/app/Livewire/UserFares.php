<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Fare;

class UserFares extends Component
{
    public $search = '';
    public $fares;

    public function mount()
    {
        $this->fares = $this->getFares();
    }

    public function updatedSearch()
    {
        $this->fares = $this->getFares();
    }

    public function getFares()
    {
        return Fare::where('route', 'like', '%' . $this->search . '%')->get();
    }

    public function render()
    {
        return view('livewire.user-fares');
    }
}