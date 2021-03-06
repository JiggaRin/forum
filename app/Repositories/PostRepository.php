<?php

namespace App\Repositories;

use App\Models\Posts as Model;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class PostRepository.
 *
 * @package App\Repositories
 */
class PostRepository extends CoreRepository
{
   /**
    * @return string
    */
   protected function getModelClass()
   {
       return Model::class;
   }

   /**
    * Получить список статей для вывода в списке
    * (Админка)
    *
    * @return LengthAwarePaginator
    */
   public function getAllWithPaginate()
   {
       $columns = [
           'id',
           'title',
           'slug',
           'is_published',
           'published_at',
           'user_id',
           'category_id',
       ];

       $result = $this->startConditions()
                      ->select($columns)
                      ->orderBy('id', 'DESC')
                      ->with([
                          #1 способ
                          'category' => function ($query) {
                                $query->select(['id', 'title']);
                          },
                          #2 способ
                          'user:id,name',
                      ])
                      ->paginate(25);
       return $result;
   }

   /**
    * Получить модель для редактирования в админке.
    *
    * @param int $id
    *
    * @return Model
    */
   public function getEdit($id)
   {
       return $this->startConditions()->find($id);
   }
}
