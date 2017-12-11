<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePowerPlantDepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('power_plant_deps', function (Blueprint $table) {
            //電廠部門
            $table->increments('id');
            $table->string('Dep',20);
            $table->string('Class',20);
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
        Schema::table('power_plant_deps', function (Blueprint $table) {
            $table->dropForeign(['PowerPlantStaffId']);    
            $table->dropForeign(['PowerPlantDepId']);
        });
        Schema::dropIfExists('power_plant_deps');
    }
}
