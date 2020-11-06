<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvtcalanderTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'evtcalander';

    /**
     * Run the migrations.
     * @table evtcalander
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idCal');
            $table->string('EvtName', 45)->nullable();
            $table->string('date', 45)->nullable();
            $table->integer('States_idStates');

            $table->index(["States_idStates"], 'fk_Cal_States1_idx');
            $table->nullableTimestamps();


            $table->foreign('States_idStates', 'fk_Cal_States1_idx')
                ->references('idStates')->on('states')
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
