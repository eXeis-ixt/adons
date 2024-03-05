<?php

namespace App\Livewire;

use App\Models\Portfolio;
use Livewire\Component;

class AboutPage extends Component
{
    public function render()
    {
        $portfolios = Portfolio::orderBy('created_at', 'DESC')->paginate(15);

        return view('livewire.about-page',[
            "portfolios"=> $portfolios
        ]);
    }
}
