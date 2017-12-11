<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationSpecCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operation_spec_categories', function (Blueprint $table) {
            $table->increments('ID');
            $table->integer('OperationSpecTypeID')->unsigned();//外鍵
            $table->string('Name',80)->nullable();
            $table->timestamps();

            $table->index('OperationSpecTypeID');

            $table->foreign('OperationSpecTypeID')->references('ID')->on('operation_spec_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operation_spec_categories');
    }
}
