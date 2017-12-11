<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_records', function (Blueprint $table) {
            //查核紀錄 欄位
            $table->increments('id');
            $table->date('Date');
            $table->time('Time');
            $table->string('CheckRecordWorkNumber',50);
            $table->integer('PowerPlantStaffID')->unsigned();//外鍵
            $table->timestamps();
            //索引
            $table->index('PowerPlantStaffID');
            //外鍵   查核紀錄→供應商
            $table->foreign('PowerPlantStaffID')->references('id')->on('power_plant_staffs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('check_records', function (Blueprint $table) {
            $table->dropForeign(['PowerPlantStaffID']);
            $table->dropIndex(['PowerPlantStaffID']);
        });
        Schema::dropIfExists('check_records');
    }
}
