<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractorStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractor_staffs', function (Blueprint $table) {
            //供應商__員工__欄位
            $table->increments('id');
            $table->integer('ContractorID')->unsigned();//外鍵
            $table->string('PID',20);
            $table->string('Name',40);
            $table->string('Titile',40);
            $table->timestamps();

            //外鍵
            $table->index('ContractorID');
            //外鍵建立    供應商__員工→供應商
            $table->foreign('ContractorID')->references('id')->on('contractors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contractor_staffs', function (Blueprint $table) {
            $table->dropForeign(['ContractorID']); 
            
            $table->dropIndex(['ContractorID']);
        });
               
        Schema::dropIfExists('contractor_staffs');
    }
}
