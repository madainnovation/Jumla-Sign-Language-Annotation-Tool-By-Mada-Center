<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    /*
     *  $table->foreignId("sentence_id")->constrained();
            $table->string("view");
            $table->string("path",500);
     */
    protected $fillable=[
        "sentence_id",
        "view",
        "path",

    ];

    public function Sentence()
    {
        return $this->belongsTo(Sentence::class);
    }
}
