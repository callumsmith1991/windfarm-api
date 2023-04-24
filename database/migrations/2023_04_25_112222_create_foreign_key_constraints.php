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
        Schema::table('wf_turbine', function($table) {
            $table->foreign('wf_farm')->references('id')->on('wf_farm')->onDelete('cascade');
        });

        Schema::table('wf_turbine_component', function($table) {
            $table->foreign('wf_turbine')->references('id')->on('wf_turbine')->onDelete('cascade');
        });

        Schema::table('wf_inspection', function($table) {
            $table->foreign('wf_farm')->references('id')->on('wf_farm')->onDelete('cascade');
        });

        Schema::table('wf_turbine_inspection', function($table) {
            $table->foreign('wf_inspection')->references('id')->on('wf_inspection')->onDelete('cascade');
        });

        Schema::table('wf_turbine_inspection', function($table) {
            $table->foreign('wf_turbine')->references('id')->on('wf_turbine')->onDelete('cascade');
        });

        Schema::table('wf_turbine_component_inspection', function($table) {
            $table->foreign('wf_turbine_inspection')->references('id')->on('wf_turbine_inspection')->onDelete('cascade');
        });

        Schema::table('wf_turbine_component_inspection', function($table) {
            $table->foreign('wf_turbine_component')->references('id')->on('wf_turbine_component')->onDelete('cascade');
        });

        Schema::table('wf_turbine_component_inspection', function($table) {
            $table->foreign('wf_turbine_component_grade', 'wf_grade')->references('id')->on('wf_turbine_component_grade')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('wf_turbine_component_inspection', function ($table) {
            $table->dropForeign('wf_grade');
            $table->dropColumn('wf_turbine_component_grade');
        });

        Schema::table('wf_turbine_component_inspection', function ($table) {
            $table->dropForeign(['wf_turbine_inspection']);
            $table->dropColumn('wf_turbine_inspection');
        });

        Schema::table('wf_turbine_component_inspection', function ($table) {
            $table->dropForeign(['wf_turbine_component']);
            $table->dropColumn('wf_turbine_component');
        });

        Schema::table('wf_turbine_inspection', function ($table) {
            $table->dropForeign(['wf_inspection']);
            $table->dropColumn('wf_inspection');
        });
        Schema::table('wf_turbine_inspection', function ($table) {
            $table->dropForeign(['wf_turbine']);
            $table->dropColumn('wf_turbine');
        });
        Schema::table('wf_inspection', function ($table) {
            $table->dropForeign(['wf_farm']);
            $table->dropColumn('wf_farm');
        });
        Schema::table('wf_turbine_component', function ($table) {
            $table->dropForeign(['wf_turbine']);
            $table->dropColumn('wf_turbine');
        });
        Schema::table('wf_turbine', function ($table) {
            $table->dropForeign(['wf_farm']);
            $table->dropColumn('wf_farm');
        });
    }
};
