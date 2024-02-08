<?php

namespace App\Livewire;

use App\Models\Team;
use Livewire\Component;

class TeamPage extends Component
{
    public function render()
    {
        $teams =  Team::orderBy('name', 'ASC')->get();
        return view('livewire.team-page',[
            "teams"=> $teams
        ]);
    }
}
