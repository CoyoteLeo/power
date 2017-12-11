<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspectionCheckItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspection_check_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('InspectionWorkNumber',50);
            $table->integer('InspectionItemSpecID')->unsigned();//外鍵
            $table->string('Type',10);
            $table->integer('TermsID')->unsigned()->nullable();//外鍵
            $table->text('Remark');
            $table->timestamps();
            //索引
            $table->index('InspectionItemSpecID');
            $table->index('TermsID');
            //外鍵建立
            //  查核巡視__項目→查核巡視__項目規格
            $table->foreign('InspectionItemSpecID')->references('id')->on('inspection_specs');
            //  查核巡視__項目→安全衛生條款
            $table->foreign('TermsID')->references('id')->on('terms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inspection_check_items', function (Blueprint $table) {
            $table->dropForeign(['InspectionItemSpecID']);
            $table->dropForeign(['TermsID']);

            $table->dropIndex(['InspectionItemSpecID']);
            $table->dropIndex(['TermsID']);
        });
        
        Schema::dropIfExists('inspection_check_items');
    }
}
