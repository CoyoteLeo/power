<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractorProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractor_projects', function (Blueprint $table) {
            //供應商__專案__欄位創建
            $table->increments('id');
            $table->Integer('ContractorID')->unsigned();//外鍵
            $table->string('name',50);
            $table->date('StartDate');
            $table->date('EndDate');
            $table->Integer('Year');
            $table->Integer('PowerPlantDepID')->unsigned();//外鍵
            $table->Integer('PowerPlantStaffID')->unsigned();//外鍵
            $table->timestamps();
            //索引
            $table->index('ContractorID');
            $table->index('PowerPlantDepID');
            $table->index('PowerPlantStaffID');
            //外鍵建立
            //  供應商__專案→供應商
            $table->foreign('ContractorID')->references('id')->on('contractors');
            //  供應商__專案→電廠__部門
            $table->foreign('PowerPlantDepID')->references('id')->on('power_plant_deps');
            //  供應商__專案→電廠__員工
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
        Schema::table('contractor_projects', function (Blueprint $table) {
            $table->dropForeign(['PowerPlantStaffID']);
            $table->dropForeign(['PowerPlantDepID']);
            $table->dropForeign(['ContractorID']); 

            $table->dropIndex(['PowerPlantStaffID']);
            $table->dropIndex(['PowerPlantDepID']);
            $table->dropIndex(['ContractorID']);
        });
               
        Schema::dropIfExists('contractor_projects');
    }
}
