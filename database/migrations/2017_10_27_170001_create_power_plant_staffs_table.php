<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePowerPlantStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('power_plant_staffs', function (Blueprint $table) {
            //電廠__員工 欄位
            $table->increments('id');
            $table->integer('PID');
            $table->integer('Name')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->integer('PowerPlantDepID')->unsigned();//外鍵
            $table->string('Titile',20);
            $table->string('Email',60)->unique();
            $table->timestamps();
            //索引
            $table->index('PowerPlantDepID');
            //外鍵建立  電廠__員工→電廠__部門
            $table->foreign('PowerPlantDepID')->references('id')->on('power_plant_deps');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('power_plant_staffs', function (Blueprint $table) {
            $table->dropForeign(['PowerPlantDepID']); 
            $table->dropIndex(['PowerPlantDepID']); 
        });
        Schema::dropIfExists('power_plant_staffs');
    }
}
