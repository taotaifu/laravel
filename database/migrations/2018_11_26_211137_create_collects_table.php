<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collects', function (Blueprint $table) {
            $table->increments('id');
			$table->unsignedInteger ('user_id')->index ()->default (0)->comment ('用户id');
			$table->unsignedInteger ('collect_id')->index ()->default (0)->comment ('获得收藏的文章的id/评论的id');
			$table->string ('collect_type')->index ()->default ('')->comment ('获得收藏的类型  文章/评论');
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
        Schema::dropIfExists('collects');
    }
}
