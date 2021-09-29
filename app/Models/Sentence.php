<?php

namespace App\Models;

use App\Infrastructure\Interfaces\ValidationInterface;
use App\Infrastructure\Traits\ValidationTraits;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sentence extends Model implements ValidationInterface
{
    use ValidationTraits;
    use HasFactory;
    protected $fillable = [
        'code',
        "original",
        "json_path",
        "status",
        "json"
    ];

    public function getValidationRule(): array
    {
       return [
           "original"=>"required",
       ];
    }

    public function getValidationMessage(): array
    {
        return [
            "original.required"=>"Original field is required",
        ];
    }

    public function video()
    {
        return $this->hasMany(Video::class);
    }

    public function getLeftSideVideoPath()
    {
        $value=$this->video()->where("view","left")->first();
        if(is_null($value)){
            return "";
        }
        return "storage/".$value["path"];
    }
    public function getRightSideVideoPath()
    {
        $value=$this->video()->where("view","right")->first();
        if(is_null($value)){
            return "";
        }
        return "storage/".$value["path"];
    }
    public function getfrontSideVideoPath()
    {
        $value=$this->video()->where("view","front")->first();
        if(is_null($value)){
            return "";
        }
        return "storage/".$value["path"];
    }
    public function getFacialSideVideoPath()
    {
        $value=$this->video()->where("view","facial")->first();
        if(is_null($value)){
            return "";
        }
        return "storage/".$value["path"];
    }

}
