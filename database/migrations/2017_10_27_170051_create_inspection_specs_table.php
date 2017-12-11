<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInspectionSpecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inspection_specs', function (Blueprint $table) {
            //查核巡視__項目規格
            $table->increments('id');
            $table->string('Year',4);
            $table->string('ItemB',20);
            $table->string('ItemL',20);
            $table->string('Item',50);
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
        Schema::dropIfExists('inspection_specs');
    }
}
