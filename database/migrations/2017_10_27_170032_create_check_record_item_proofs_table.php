<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckRecordItemProofsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_record_item_proofs', function (Blueprint $table) {
            //查核紀錄項目佐證資料
            $table->increments('id');
            $table->string('CheckRecordWorkNumber',50);
            $table->integer('CheckRecordIndex')->unsigned();
            $table->integer('Index')->unsigned();
            $table->string('FileName',50);
            $table->string('Path',50);
            $table->string('Type',10);
            $table->timestamps();

            //$table->index('lid');
            //$table->index('lid');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('check_record_item_proofs');
    }
}
