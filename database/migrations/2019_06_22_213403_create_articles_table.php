<?php

use App\Models\Article;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->unsigned()->nullable();
            Article::statusColumn($table);
            Article::positionColumn($table);
            $table->boolean('popular');
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });

        Schema::create('article_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->text('text')->nullable();

            $table->unique(['article_id','locale']);
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade');
        });

        \DB::statement('ALTER TABLE `article_translations` ADD FULLTEXT(`title`, `text`)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_translations');
        Schema::dropIfExists('articles');
    }
}
