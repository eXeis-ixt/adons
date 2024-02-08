<?php

namespace App\Livewire;

use Livewire\Component;

class ShowContactPage extends Component
{

    public $name = '';
    public $email = '';
    public $message = '';

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'message' => 'required',
    ];
    public function submit(){
        $this->validate();
    }

    public function render()
    {



        return view('livewire.show-contact-page');
    }
}
