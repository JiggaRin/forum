<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use SoftDeletes;
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
