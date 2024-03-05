<?php

namespace App\Livewire;

use App\Models\Clent;
use App\Models\Service;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        $clients = Clent::where('status',1)->orderBy('created_at', 'DESC')->take(10)->get();
        $services = Service::where('status',1)->orderBy('id', 'ASC')->get();
        return view('livewire.home', [
            'services' => $services,
            'clients'=> $clients,
        ]);
    }
}
