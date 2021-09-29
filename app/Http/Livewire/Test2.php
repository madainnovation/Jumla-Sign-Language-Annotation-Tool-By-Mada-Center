<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Test2 extends Component
{
    public $counter=0;
    public function render()
    {
        return view('livewire.test2')->layout("ControlPanel.layouts.app");
    }
}
