<?php

namespace App\Models;
use App\Models\Comments;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class BlogPost
 * @package App\Models
 *
 */
class Posts extends Model
{
    use softDeletes;



    protected $fillable
        = [
            'user_id',
            'category_id',
            'title',
            'slug',
            'excerpt',
            'content_raw',
            'content_html',
            'is_published',
            'published_at',
        ];

    /**
     * Категория статьи
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */




}
