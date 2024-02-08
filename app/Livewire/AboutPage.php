<?php

namespace App\Livewire;

use App\Models\Portfolio;
use Livewire\Component;

class AboutPage extends Component
{
    public function render()
    {
        $portfolios = Portfolio::orderBy('name', 'DESC')->get();

        return view('livewire.about-page',[
            "portfolios"=> $portfolios
        ]);
    }
}
