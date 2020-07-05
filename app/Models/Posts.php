<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
     * Комментарии поста.
     *
     * @return HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

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
     * Категория статьи.
     *
     * @return BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
}
