<?php

namespace App\Http\Livewire\Front;

use App\Models\Parameter;
use App\Models\Sentence;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class AnnotationPage extends Component
{

    public Sentence $model;
    public $parameters='';
    public $json="";
    protected $listeners=[
        "save"=>"save"
    ];
    protected $rules=[
        "model.original"=>"required",
    ];
    public function render()
    {
        return view('livewire.front.annotation-page')->layout("Front.layouts.app");
    }
    public function mount($id)
    {
        $this->model=Sentence::find($id);
        $this->parameters=Parameter::select("*")->with("parameter_forms","parameter_forms.form_items")->get();
    }

    public function save($json)
    {
        $this->model->json=$json;
        $this->model->status="Annotated";
        $this->model->save();
        Storage::disk('local')->put('JSON\\JSON_'.$this->model->id, $json);
        $path="JSON\JSON_".$this->model->id;
        $this->model->json_path=$path;
        $this->model->update();
        $this->emit('toast-success',"Saved","");
//        $this->redirect(route("front.annotation",["id"=>$this->model->id]));
    }


}
