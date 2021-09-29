<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormItem extends Model
{
    use HasFactory;
    protected $fillable=[
        "parameter_form_id",
        "label",
        "value",
    ];
}
