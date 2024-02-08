<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $services = Service::orderBy('title', 'DESC')->get();
        return view('livewire.home', [
            'services' => $services
        ]);
    }
}
