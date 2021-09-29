<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Test extends Component
{
    public $msg="Hello";
    public $count=0;
    public function render()
    {
        return view('livewire.test')->layout("ControlPanel.layouts.app");
    }

    public function increment()
    {
        $this->count++;
    }
}
