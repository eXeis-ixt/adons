<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;

class ShowService extends Component
{
    public $service;
    public function mount($slug){
        $this->service = Service::findOrFail($slug);
        // dd($this->service);
    }
    public function render()
    {
        return view('livewire.show-service');
    }
}
