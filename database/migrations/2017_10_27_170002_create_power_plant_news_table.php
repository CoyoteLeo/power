<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePowerPlantNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('power_plant_news', function (Blueprint $table) {
            //電廠__最新消息  欄位
            $table->increments('id');
            $table->string('Titile',50);
            $table->text('Content');
            $table->dateTime('Date');
            $table->integer('PowerPlantStaffId')->unsigned();//外鍵
            $table->integer('PowerPlantDepId')->unsigned();//外鍵
            $table->string('status',50)->nullable()->default("未處理");
            $table->timestamps();
            //索引
            $table->index('PowerPlantStaffId');
            $table->index('PowerPlantDepId');
            //外鍵建立
            // 電廠__最新消息→電廠__員工
            $table->foreign('PowerPlantStaffId')->references('id')->on('power_plant_staffs');
            // 電廠__最新消息→電廠__部門
            $table->foreign('PowerPlantDepId')->references('id')->on('power_plant_deps');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('power_plant_news', function (Blueprint $table) {
            $table->dropForeign(['PowerPlantStaffId']);    
            $table->dropForeign(['PowerPlantDepId']);

            $table->dropIndex(['PowerPlantStaffId']);
            $table->dropIndex(['PowerPlantDepId']);
        });
            
        Schema::dropIfExists('power_plant_news');
    }
}
