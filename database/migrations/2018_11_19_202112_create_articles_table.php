<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->unsignedTinyInteger ('user_id')->index ()->default (0)->comment('文章作者');
            $table->string ('title')->default ('')->comment ('文章标题');
            //外键约束
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedTinyInteger ('category_id')->index ()->default (0)->comment ('文章栏目id');
            $table->foreign ('categroy_id')->references('id')->on('categroy')->onDelete('cascade');
            $table->text ('content');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
