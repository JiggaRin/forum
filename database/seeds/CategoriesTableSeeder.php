<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Categories;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories= [];

        $cName = 'Без категории';
        $categories[] = [
            'title'         =>  $cName,
            'slug'          =>  Str::slug($cName, '-'),
            'parent_id'     =>  0,
            'user_id'       =>  2,
            'description'   =>  null,
        ];

        // Цикл создания рандомных категорий

        for ($i = 2; $i <= 11; $i++) {
            $cName = 'Категория №' . $i;
            $parentId = ($i > 4) ? rand(1, 4) : 1;

            $categories[] = [
                'title'         =>  $cName,
                'slug'          =>  Str::slug($cName, '-'),
                'parent_id'     =>  $parentId,
                'user_id'       =>  rand (1,2),
                'description'   =>  null,
            ];
        }

        Categories::insert($categories);
    }
}
