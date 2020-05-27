<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comments extends Model
{
    use softDeletes;

    protected $fillable
        = [
            'user_id',
            'post_id',
            'category_id',
            'body',
        ];
}
