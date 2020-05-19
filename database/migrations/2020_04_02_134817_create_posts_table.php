<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();

            $table->string('title');
            $table->string('slug');
            $table->text('excerpt')->nullable(); // Отрывок основного текст

            $table->text('content_raw');
            $table->text('content_html');

            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();





            $table->timestamps();
            $table->softDeletes(); // Deleted_at

            $table->foreign('user_id')->references('id')->on('users'); // Вторичный ключ (обязаловка)
            $table->foreign('category_id')->references('id')->on('categories');
            $table->index('is_published'); // Необходимо для поиска
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
