<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckRecordItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_record_items', function (Blueprint $table) {
            //查核紀錄__項目 欄位
            $table->increments('id');
            $table->string('CheckWorkNumber',50);
            $table->integer('Index');
            $table->integer('PowerPlantStaffId')->unsigned(); //外鍵
            $table->string('Area',50);
            $table->text('Content');
            $table->date('Deadline')->nullable();
            $table->date('CompleteDate')->nullable();
            $table->timestamps();
            //索引
            $table->index('PowerPlantStaffId');
            //外鍵建立 查核紀錄__項目→電廠__部門
            $table->foreign('PowerPlantStaffId')->references('id')->on('power_plant_staffs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('check_record_items', function (Blueprint $table) {
            $table->dropForeign(['PowerPlantStaffId']);
            $table->dropIndex(['PowerPlantStaffId']);
        });
        Schema::dropIfExists('check_record_items');
    }
}
