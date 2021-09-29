<?php

namespace App\Http\Livewire\Sentence;

use App\Models\Sentence;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddFromFile extends Component
{
    use WithFileUploads;
    public $data;
    public $file;
    public $selectedSentences;
    public function render()
    {
        return view('livewire.sentence.add-from-file')->layout("ControlPanel.layouts.app");
    }
    public function mount()
    {
        $this->selectedSentences=[];
        $this->data="";
    }

    public function save()
    {
//        unset($this->selectedSentences[0]);
//        dd($this->data,$this->selectedSentences);
        foreach ($this->selectedSentences as $key){
            $model=Sentence::create([
                "code"=>$this->data[$key][0],
                "original"=>$this->data[$key][1],
                "status"=>"Not Annotated",
            ]);
            if(!empty($this->data[$key][2])) {
                $model->video()->create([
                    "view"=>"front",
                    "path"=>'files/shares/'.$this->data[$key][2],
                ]);
            }
            if(!empty($this->data[$key][3])) {
                $model->video()->create([
                    "view" => "right",
                    "path" =>'files/shares/'.$this->data[$key][3],
                ]);
            }
            if(!empty($this->data[$key][4])){
                $model->video()->create([
                    "view"=>"left",
                    "path"=>'files/shares/'.$this->data[$key][4],
                ]);
            }
            unset($this->data[$key]);
            unset($this->selectedSentences[$key]);
        }
    }
    public function loadFile()
    {
        if(is_file($this->file)){
            $this->data=[];
            foreach ( preg_split("/((\r?\n)|(\r\n?))/", $this->file->get()) as $key=>$line){
                $this->data[]=explode(',',$line);
                $this->selectedSentences[]="$key";
            }
            unset($this->data[count($this->data)-1]);
            unset($this->selectedSentences[count($this->selectedSentences)-1]);


        }
    }
}
