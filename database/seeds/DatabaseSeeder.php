<?php

use Illuminate\Database\Seeder;
use App\Models\Posts;
use App\Models\Comments;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);

        factory(Posts::class, 50)->create();
        factory(Comments::class, 100)->create();

    }
}
