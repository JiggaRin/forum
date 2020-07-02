<?php

namespace App\Observers;

use App\Models\Categories;
use Illuminate\Support\Str;

class CategoryObserver
{
    /**
     * Handle the categories "created" event.
     *
     * @param  \App\Models\Categories  $categories
     * @return void
     */
    public function creating(Categories $categories)
    {
        $this->setSlug($categories);
    }

    /**
     * Если поле слаг пустое, то заполняем его конвертацией заголовка.
     *
     * @param Categories $categories
     */
    protected function setSlug(Categories $categories)
    {
        if (empty($categories->slug)) {
            $categories->slug = Str::slug($categories->title);
        }
    }

    /**
     * Handle the categories "updated" event.
     *
     * @param  \App\Models\Categories  $categories
     * @return void
     */
    public function updating(Categories $categories)
    {
        $this->setSlug($categories);
    }

    /**
     * Handle the categories "deleted" event.
     *
     * @param  \App\Models\Categories  $categories
     * @return void
     */
    public function deleted(Categories $categories)
    {
        //
    }

    /**
     * Handle the categories "restored" event.
     *
     * @param  \App\Models\Categories  $categories
     * @return void
     */
    public function restored(Categories $categories)
    {
        //
    }

    /**
     * Handle the categories "force deleted" event.
     *
     * @param  \App\Models\Categories  $categories
     * @return void
     */
    public function forceDeleted(Categories $categories)
    {
        //
    }
}
