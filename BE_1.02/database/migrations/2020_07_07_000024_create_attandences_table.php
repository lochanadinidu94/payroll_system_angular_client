<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttandencesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'attandences';

    /**
     * Run the migrations.
     * @table attandences
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idAttandences');
            $table->string('Date', 45)->nullable();
            $table->string('Start_Time', 45)->nullable();
            $table->string('End_Time', 45)->nullable();
            $table->integer('Sites_Shifts_idSites_Shifts');
            $table->text('comments')->nullable();
            $table->string('img1', 45)->nullable();
            $table->string('img2', 45)->nullable();
            $table->integer('employer_has_employees_idemployer_has_employees');

            $table->index(["Sites_Shifts_idSites_Shifts"], 'fk_Attandences_Sites_Shifts1_idx');

            $table->index(["employer_has_employees_idemployer_has_employees"], 'fk_attandences_employer_has_employees1_idx');
            $table->nullableTimestamps();


            $table->foreign('Sites_Shifts_idSites_Shifts', 'fk_Attandences_Sites_Shifts1_idx')
                ->references('idSites_Shifts')->on('sites_shifts')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('employer_has_employees_idemployer_has_employees', 'fk_attandences_employer_has_employees1_idx')
                ->references('idemployer_has_employees')->on('employer_has_employees')
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
