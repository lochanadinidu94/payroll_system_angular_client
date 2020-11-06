<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployerProfilesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'employer_profiles';

    /**
     * Run the migrations.
     * @table employer_profiles
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idEmployer_Profile');
            $table->string('EName', 45)->nullable();
            $table->string('ABN', 45)->nullable();
            $table->string('ACN', 45)->nullable();
            $table->string('TFN', 45)->nullable();
            $table->string('Email', 45)->nullable();
            $table->string('Mobile', 45)->nullable();
            $table->string('Web', 45)->nullable();
            $table->string('WorkCoverNumber', 45)->nullable();
            $table->string('PublicLibilityNumber', 45)->nullable();
            $table->string('LaboureCoverNumber', 45)->nullable();
            $table->string('Status', 45)->nullable();
            $table->integer('States_idStates');
            $table->string('EXPDate', 45)->nullable();

            $table->index(["States_idStates"], 'fk_Employer_Profiles_States1_idx');
            $table->nullableTimestamps();


            $table->foreign('States_idStates', 'fk_Employer_Profiles_States1_idx')
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
