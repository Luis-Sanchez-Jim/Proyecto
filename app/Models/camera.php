<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class camera extends Model
{
    protected $fillable = [
        'mark',
        'model',
        'serial',
    ];
}
