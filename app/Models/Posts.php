<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use softDeletes;

    /**
     * Категория статьи.
     *
     * @return BelongsTo
     */
    public function category()
    {
        //Статья принадлежит категории
        return $this->belongsTo(Categories::class);
    }

    /**
     * Автор статьи.
     *
     * @return BelongsTo
     */
    public function user()
    {
        //Статья принадлежит пользователю
        return $this->belongsTo(User::class);
    }
}
