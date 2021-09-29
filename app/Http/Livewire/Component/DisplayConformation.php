<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;

class DisplayConformation extends Component
{
    protected $listeners=["confirm-box"=>"confirmBox"];
    public function render()
    {
        return view('livewire.component.display-conformation');
    }
    public function confirmBox($fierEvent,$data,$msg="",$title="")
    {
        $this->dispatchBrowserEvent("display-conformation",
            [
                "title"=>$title,
                "msg"=>$msg,
                "fierEvent"=>$fierEvent,
                "data"=>$data,
            ]
        );
    }
}
