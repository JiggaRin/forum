<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
    protected $dates
        = [
            'created_at',
            'updated_at'
        ];

    /**
     * Автор статьи.
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    /**
     * Комментарий статьи.
     *
     * @return BelongsTo
     */
    public function post()
    {
        return $this->belongsTo('App\Models\Posts', 'post_id');
    }
}
