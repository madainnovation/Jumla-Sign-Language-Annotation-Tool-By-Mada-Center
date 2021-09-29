<?php

namespace App\Http\Livewire\Component;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class FileSelector extends Component
{
    public $files=[];
    public $directories=[];
    public $root="files/shares";
    public $path="";
    public $name="";
    public $file_name="";
    public function render()
    {
        return view('livewire.component.file-selector');
    }

    public function mount()
    {
        $this->path=$this->root;
        $this->getDirectory();
    }

    public function openDirectory($directory)
    {
        if($directory==".."){
            if($this->path!=$this->root){
                $this->path=substr($this->path,0,strrpos($this->path,"/"));
            }
        }else{
            $this->path=$this->path."/".$directory;
        }
        $this->getDirectory();
    }

    private function getDirectory()
    {
        $files=Storage::disk("public")->files($this->path);
        $directories=Storage::disk("public")->directories($this->path);
        $this->files=$files;
        foreach ($directories as $key=> $directory){
            $directories[$key]=substr($directory, strrpos($directory, '/') + 1);
        }
        foreach ($files as $key=> $file){
            $files[$key]=substr($file, strrpos($file, '/') + 1);
        }
        $this->files=$files;
        $this->directories=$directories;
    }

    public function selectFile($file)
    {

        $this->file_name=$file;
        $this->emit($this->name."_fileselector",$this->path."/".$file);
    }

    public function dda($file)
    {

//        dd($file);
    }
}
