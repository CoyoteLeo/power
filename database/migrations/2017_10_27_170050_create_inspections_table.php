<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspections', function (Blueprint $table) {
            //查核巡視__欄位建立
            $table->increments('id');
            $table->date('Date');
            $table->time('Time');
            $table->integer('ContractorProjectID')->unsigned();//外鍵
            $table->string('InspectionWorkNumber',50);
            $table->date('remind',50)->nullable();
            $table->timestamps();
            //索引
            $table->index('ContractorProjectID');
            //外鍵建立    查核巡視→供應商
            $table->foreign('ContractorProjectID')->references('id')->on('contractor_projects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inspections', function (Blueprint $table) {
            $table->dropForeign(['ContractorProjectID']);
            $table->dropIndex(['ContractorProjectID']);
        });
        Schema::dropIfExists('inspections');
    }
}
