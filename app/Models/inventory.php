<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inventory extends Model
{
    protected $fillable = [
        'code_item','item_name','item_condition','item_quantity'
    ];
}

