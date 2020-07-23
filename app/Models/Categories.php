<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categories extends Model
{
    use SoftDeletes;
//    public $timestamps = false;

    protected $fillable
        = [
            'user_id',
            'parent_id',
            'slug',
            'title',
            'description',
        ];

    protected $dates
        = [
          'created_at',
          'updated_at'
        ];

    /**
     * Статьи категории.
     *
     * @return HasMany
     */
    public function post()
    {
        return $this->hasMany('App\Models\Posts');
    }

    /**
     * Автор категории.
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
