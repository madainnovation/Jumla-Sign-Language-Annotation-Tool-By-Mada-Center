<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParameterForm extends Model
{
    use HasFactory;
    protected $fillable=[
        "parameter_id",
        "label",
        "name",
        "type"
    ];

    public function form_items()
    {
        return $this->hasMany(FormItem::class);
    }

}
