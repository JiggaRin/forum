<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public $timestamps = false;

    protected $fillable
        = [
            'user_id',
            'parent_id',
            'slug',
            'title',
            'description',
        ];
}
