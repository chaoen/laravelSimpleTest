<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConstellationFortunesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('constellation_fortunes', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->string('name');
            $table->tinyInteger('overall_fortune')->comment('整體運勢評分');
            $table->string('overall_description')->comment('整體運勢說明');
            $table->tinyInteger('love_fortune')->comment('愛情運勢評分');
            $table->string('love_description')->comment('愛情運勢說明');
            $table->tinyInteger('business_fortune')->comment('事業運勢評分');
            $table->string('business_description')->comment('事業運勢說明');
            $table->tinyInteger('wealth_fortune')->comment('財運運勢評分');
            $table->string('wealth_description')->comment('財運運勢說明');
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
        Schema::dropIfExists('constellation_fortunes');
    }
}
