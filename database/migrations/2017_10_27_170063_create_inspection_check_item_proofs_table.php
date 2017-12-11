<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspectionCheckItemProofsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspection_check_item_proofs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('InspectionWorkNumber',50);
            $table->integer('InspectionItemSpecID')->unsigned();//外鍵
            $table->timestamps();

            $table->string('FileName',50);
            $table->string('Path',50);
            $table->string('Type',10);
            //索引
            $table->index('InspectionItemSpecID');
            $table->foreign('InspectionItemSpecID')->references('id')->on('inspection_specs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inspection_check_item_proofs', function (Blueprint $table) {
            $table->dropForeign(['InspectionItemSpecID']);

            $table->dropIndex(['InspectionItemSpecID']);
        });
        Schema::dropIfExists('inspection_check_item_proofs');
    }
}
