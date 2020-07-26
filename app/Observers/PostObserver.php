<?php

namespace App\Observers;

use App\Models\Posts;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PostObserver
{
    /**
     * Handle the posts "created" event.
     *
     * @param \App\Models\Posts $posts
     * @return void
     */
    public function creating(Posts $posts)
    {
        $this->setPublishedAt($posts);
        $this->setSlug($posts);
        $this->setHtml($posts);
        $this->setUser($posts);
    }

    /**
     * Обработка перед обновлением записи
     *
     * @param \App\Models\Posts $posts
     * @return void
     */
    public function updating(Posts $posts)
    {
        $this->setPublishedAt($posts);

        $this->setSlug($posts);
    }

    /**
     * Если дата публикации не установлена и происходит установка флажка - Опубликовано,
     * то устанавливаем текущую дату
     * @param Posts $posts
     */

    private function setPublishedAt(Posts $posts)
    {
        // Проверка на наличие даты публикации
        $needSetPublished = empty($posts->published_at) && $posts->is_published;
        if ($needSetPublished) {
            $posts['published_at'] = Carbon::now();
        }
    }

    /**
     * Если слаг пустой, то заполняем его конвертацией заголовка.
     *
     * @param Posts $posts
     */
    protected function setSlug(Posts $posts)
    {
        if (empty($posts->slug)) {
            $posts->slug = Str::slug($posts->title);
        }
    }

    /**
     * Установка значения полю content_html относительно поля content_raw.
     *
     * @param Posts $post
     */
    protected function setHtml(Posts $post)
    {
        if ($post->isDirty('content_raw')) {
            $post->content_html = $post->content_raw;
        }
    }

    /**
     * Усли не указан user_id, то устанавливаем пользователя по умолчанию
     *
     * @param Posts $post
     */
    protected function setUser(Posts $post)
    {
        $post->user_id = auth()->id() ?? Posts::UNKNOWN_USER; // заполнение поля user_id авторизованным юзером
    }

    /**
     * Handle the posts "deleted" event.
     *
     * @param  \App\Models\Posts  $posts
     * @return void
     */
    public function deleted(Posts $posts)
    {
        //
    }

    /**
     * Handle the posts "restored" event.
     *
     * @param  \App\Models\Posts  $posts
     * @return void
     */
    public function restored(Posts $posts)
    {
        //
    }

    /**
     * Handle the posts "force deleted" event.
     *
     * @param  \App\Models\Posts  $posts
     * @return void
     */
    public function forceDeleted(Posts $posts)
    {
        //
    }
}
