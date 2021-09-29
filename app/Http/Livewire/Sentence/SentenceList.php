<?php

namespace App\Http\Livewire\Sentence;

use App\Models\Sentence;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class SentenceList extends Component
{
    public $list;
    public $deleteId;
    protected $listeners=["deleteSentence"=>"delete"];
    public function render()
    {
        $this->list=Sentence::select("*")->get();
        return view('livewire.sentence.sentence-list')->layout("ControlPanel.layouts.app");
    }

    public function confirmDelete($id)
    {
        $this->deleteId=$id;
        $this->emit("confirm-box","deleteSentence",$id,"Are you Sure","Are you Sure");
    }

    public function delete($id)
    {
        $model=Sentence::find($id);
        if(!is_null($model)){
            $model->delete();
            $this->list=Sentence::select("*")->get();
            $this->emit("toast-success","deleted successfully");
        }else{
            $this->emit("toast-error","Sentence not found!");
        }
    }
    public function downloadjson($id)
    {
        $model=Sentence::find($id);
        $headers = array(
            'Content-Type: application/json',
        );
         return Storage::disk("local")->download($model->json_path,$model->original.".json",$headers);
    }

}
