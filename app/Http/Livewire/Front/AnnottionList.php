<?php

namespace App\Http\Livewire\Front;

use App\Models\Sentence;
use Livewire\Component;

class AnnottionList extends Component
{
    public $list=[];
    public function render()
    {
        return view('livewire.front.annottion-list')->layout("Front.layouts.app");
    }

    public function mount()
    {
        $this->list=Sentence::select("*")->get();
//        dd($list);
    }
}
