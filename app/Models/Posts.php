<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Posts
 * @package App\Models
 *
 * @property Categories             $category
 * @property User                   $user
 * @property string                 $title
 * @property string                 $slug
 * @property string                 $content_html
 * @property string                 $content_raw
 * @property string                 $excerpt
 * @property string                 $published_at
 * @property boolean                $is_published
 */
class Posts extends Model
{
    use softDeletes;

    protected $fillable
        = [
            'title',
            'slug',
            'category_id',
            'excerpt',
            'content_raw',
            'is_published',
            'published_at',
            'user_id',
        ];

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
