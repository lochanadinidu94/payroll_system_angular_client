<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesShiftsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'sites_shifts';

    /**
     * Run the migrations.
     * @table sites_shifts
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idSites_Shifts');
            $table->string('Name', 45)->nullable();
            $table->integer('Sites_Hours_Type_idSites_Hours_Type');
            $table->integer('Sites_idSites');
            $table->string('States', 45)->nullable();

            $table->index(["Sites_idSites"], 'fk_Sites_Shifts_Sites1_idx');

            $table->index(["Sites_Hours_Type_idSites_Hours_Type"], 'fk_Sites_Shifts_Sites_Hours_Type1_idx');
            $table->nullableTimestamps();


            $table->foreign('Sites_Hours_Type_idSites_Hours_Type', 'fk_Sites_Shifts_Sites_Hours_Type1_idx')
                ->references('idSites_Hours_Type')->on('sites_hours_type')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Sites_idSites', 'fk_Sites_Shifts_Sites1_idx')
                ->references('idSites')->on('Sites')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
