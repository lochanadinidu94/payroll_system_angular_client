<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesFtatHoursTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'sites_ftat_hours';

    /**
     * Run the migrations.
     * @table sites_ftat_hours
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idSites_Ftat_Hours');
            $table->string('hours', 45)->nullable();
            $table->integer('Sites_Shifts_idSites_Shifts');

            $table->index(["Sites_Shifts_idSites_Shifts"], 'fk_Sites_Ftat_Hours_Sites_Shifts1_idx');
            $table->nullableTimestamps();


            $table->foreign('Sites_Shifts_idSites_Shifts', 'fk_Sites_Ftat_Hours_Sites_Shifts1_idx')
                ->references('idSites_Shifts')->on('sites_shifts')
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
