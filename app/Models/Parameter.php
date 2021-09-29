<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    use HasFactory;
    /*
     *         $table->string("label");
            $table->string("type");
            $table->string("name");
     */
    protected $fillable=[
        "name",
        "label",
        "type"
    ];
    public function parameter_forms()
    {
        return $this->hasMany(ParameterForm::class);
    }

}
