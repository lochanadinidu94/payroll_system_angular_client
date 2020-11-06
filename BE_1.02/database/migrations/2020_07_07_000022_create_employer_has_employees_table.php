<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployerHasEmployeesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'employer_has_employees';

    /**
     * Run the migrations.
     * @table employer_has_employees
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idemployer_has_employees');
            $table->integer('Banks_idBanks');
            $table->string('AccountName', 45)->nullable();
            $table->string('BSB', 45)->nullable();
            $table->string('AccountNumber', 45)->nullable();
            $table->string('Rate_WeekDay', 45)->nullable();
            $table->string('Rate_Holiday', 45)->nullable();
            $table->string('Rate_Sunday', 45)->nullable();
            $table->string('Rate_Saturday', 45)->nullable();
            $table->integer('EmployeeTax_idEmployeeTax');
            $table->string('States', 45)->nullable();
            $table->integer('employee_profiles_idEmployee_Profiles');
            $table->integer('employer_profiles_idEmployer_Profile');

            $table->index(["employee_profiles_idEmployee_Profiles"], 'fk_employer_has_employees_employee_profiles1_idx');

            $table->index(["employer_profiles_idEmployer_Profile"], 'fk_employer_has_employees_employer_profiles1_idx');

            $table->index(["EmployeeTax_idEmployeeTax"], 'fk_employer_profiles_has_employee_profiles_EmployeeTax1_idx');

            $table->index(["Banks_idBanks"], 'fk_employer_profiles_has_employee_profiles_Banks1_idx');
            $table->nullableTimestamps();


            $table->foreign('Banks_idBanks', 'fk_employer_profiles_has_employee_profiles_Banks1_idx')
                ->references('idBanks')->on('Banks')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('EmployeeTax_idEmployeeTax', 'fk_employer_profiles_has_employee_profiles_EmployeeTax1_idx')
                ->references('idEmployeeTax')->on('EmployeeTax')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('employee_profiles_idEmployee_Profiles', 'fk_employer_has_employees_employee_profiles1_idx')
                ->references('idEmployee_Profiles')->on('employee_profiles')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('employer_profiles_idEmployer_Profile', 'fk_employer_has_employees_employer_profiles1_idx')
                ->references('idEmployer_Profile')->on('employer_profiles')
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
