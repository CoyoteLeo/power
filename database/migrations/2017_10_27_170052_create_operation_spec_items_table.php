<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationSpecItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operation_spec_items', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('Year',4);
            $table->integer('OperationSpecCategoryID')->unsigned();
            $table->string('Name',255)->nullable();
            $table->timestamps();
            $table->index('OperationSpecCategoryID');

            $table->foreign('OperationSpecCategoryID')->references('ID')->on('operation_spec_categories');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operation_spec_items');
    }
}
