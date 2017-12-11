<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terms', function (Blueprint $table) {
            //安全衛生條款 欄位
            $table->increments('id');
            $table->string('Year',50);
            $table->string('ItemB',20);
            $table->string('ItemL',20);
            $table->string('Item',50);
            $table->text('Content');
            $table->integer('Fine');
            //$table->string('Unit',30);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terms');
    }
}
