<?php

namespace App\Http\Livewire\Forms;

use App\Models\Parameter;
use Livewire\Component;

class FormsList extends Component
{
    public $list=[];
    protected $listeners=[
        "delete"=>"delete",
    ];
    public function render()
    {
        return view('livewire.forms.forms-list')->layout("ControlPanel.layouts.app");
    }

    public function mount()
    {
        $this->list=Parameter::all();
    }

    public function confirmDelete($id)
    {
        $tempModel=Parameter::find($id);
        $this->emit("confirm-box","delete",$id,"Are you sure you want delete ".$tempModel->name,"Are you Sure!");
    }

    private function refreshData()
    {
        $this->list=Parameter::all();
    }

    public function delete($id)
    {
        $tempModel=Parameter::find($id);
        $tempModel->delete();
        $this->refreshData();
    }


}
