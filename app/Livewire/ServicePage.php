<?php

namespace App\Livewire;
use App\Models\Portfolio;

use App\Models\Service;
use Livewire\Component;

class ServicePage extends Component
{
    public function render()
    {
        $portfolios = Portfolio::orderBy('name', 'DESC')->get();
        $services = Service::orderBy('title', 'DESC')->get();
        return view('livewire.service-page',[
            "services"=> $services,
            "portfolios"=> $portfolios
        ]);
    }
}
