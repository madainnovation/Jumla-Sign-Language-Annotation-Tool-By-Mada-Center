<?php

namespace App\Http\Livewire\Sentence;

use App\Models\Sentence;
use Livewire\Component;

class SentenceForm extends Component
{
    public Sentence $model;
    public $left_side_view="";
    public $front_view="";
    public $right_view="";
    public $facial_view="";
    public $action="Create";
    public $listeners=[
        "facial_view_fileselector"=>"facial_view_fileselector",
        "front_view_fileselector"=>"front_view_fileselector",
        "right_view_fileselector"=>"right_view_fileselector",
        "left_side_view_fileselector"=>"left_side_viewfileselector",
    ];
    protected $rules=[
        "model.original"=>"required",
        "model.status"=>'',
        "model.code"=>'',
    ];
    public function mount($id="")
    {
        if($id!=""){
            $this->action="Edit";
            $this->model=Sentence::find($id);
        }else{
            $this->model=new Sentence();
            $this->model->status="Not Annotated";
        }
    }
    public function render()
    {
        return view('livewire.sentence.sentence-form')->layout("ControlPanel.layouts.app");
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function save()
    {
        $this->validate();
        $this->model->save();

        if(!empty($this->left_side_view)){
            $this->model->video()->create([
                "view"=>"left",
                "path"=>$this->left_side_view,
            ]);
        }
        if(!empty($this->front_view)){
            $this->model->video()->create([
                "view"=>"front",
                "path"=>$this->front_view,
            ]);
        }
        if(!empty($this->right_view)){
            $this->model->video()->create([
                "view"=>"right",
                "path"=>$this->right_view,
            ]);
        }
        if(!empty($this->facial_view)){
            $this->model->video()->create([
                "view"=>"facial",
                "path"=>$this->facial_view,
            ]);
        }


        $this->emit('toast-success',"New sentence has been successfully created!",route("sentence.list"));
    }

    public function facial_view_fileselector($path)
    {
        $this->facial_view=$path;
    }
    public function front_view_fileselector($path)
    {
        $this->front_view=$path;
    }
    public function right_view_fileselector($path)
    {
        $this->right_view=$path;
    }
    public function left_side_viewfileselector($path)
    {
        $this->left_side_view=$path;
    }


}
