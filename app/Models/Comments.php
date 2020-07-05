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

    /**
     * Автор статьи.
     *
     * @return BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Комментарий статьи.
     *
     * @return BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Posts::class);
    }
}
