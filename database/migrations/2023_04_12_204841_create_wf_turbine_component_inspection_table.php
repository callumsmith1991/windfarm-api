<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wf_turbine_component_inspection', function (Blueprint $table) {
            $table->id();
            $table->time('time');
            $table->bigInteger('wf_turbine_inspection')->unsigned();
            $table->bigInteger('wf_turbine_component')->unsigned();
            $table->bigInteger('wf_turbine_component_grade')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wf_turbine_component_inspection');
    }
};
