<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Author extends Component
{
    public function render()
    {
        return view('livewire.author')->layout('layout.app');
    }
}
