<?php

namespace App\Repositories;

use App\Models\Categories as Model;
use Illuminate\Database\Eloquent\Collection;
//use Your Model

/**
 * Class CategoryRepository.
 */
class CategoryRepository extends CoreRepository
{
    protected function GetModelClass()
    {
        return Model::class;
    }

    /**
     * Получения модели для редактирования в админке.
     *
     * @param int $id
     *
     * @return Model
     */
    public function getEdit($id)
    {
        return $this->startConditions()->find($id);
    }
    /**
     * Получение списка категорий для вывода в выпадающем списке.
     *
     * @return Collection
     */
    public function getForComboBox()
    {
        return $this->startConditions()->all();
    }
}
