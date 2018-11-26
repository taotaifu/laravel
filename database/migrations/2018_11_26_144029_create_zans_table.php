<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger ('user_id')->index ()->default (0)->comment ('用户id');
			$table->unsignedInteger ('zan_id')->index ()->default (0)->comment ('获得点赞的文章的id/评论的id');
			$table->string ('zan_type')->index ()->default ('')->comment ('获得点赞的类型  文章/评论');
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
        Schema::dropIfExists('zans');
    }
}
