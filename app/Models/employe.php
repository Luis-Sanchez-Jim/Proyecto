<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class employe extends Model
{
    protected $fillable = [
        'name',
        'document',
        'role',
        'age',
    ];
}
