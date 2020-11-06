<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeProfilesHasSitesShiftsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'employee_profiles_has_sites_shifts';

    /**
     * Run the migrations.
     * @table employee_profiles_has_sites_shifts
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idemployee_profiles_has_sites_shifts');
            $table->integer('Sites_Shifts_idSites_Shifts');
            $table->integer('employer_has_employees_idemployer_has_employees');

            $table->index(["employer_has_employees_idemployer_has_employees"], 'fk_employee_profiles_has_sites_shifts_employer_has_employee_idx');

            $table->index(["Sites_Shifts_idSites_Shifts"], 'fk_Employee_Profiles_has_Sites_Shifts_Sites_Shifts1_idx');
            $table->nullableTimestamps();


            $table->foreign('Sites_Shifts_idSites_Shifts', 'fk_Employee_Profiles_has_Sites_Shifts_Sites_Shifts1_idx')
                ->references('idSites_Shifts')->on('sites_shifts')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('employer_has_employees_idemployer_has_employees', 'fk_employee_profiles_has_sites_shifts_employer_has_employee_idx')
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
