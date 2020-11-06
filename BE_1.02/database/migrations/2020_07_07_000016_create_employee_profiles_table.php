<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeProfilesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'employee_profiles';

    /**
     * Run the migrations.
     * @table employee_profiles
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idEmployee_Profiles');
            $table->string('EName', 45)->nullable();
            $table->string('DOB', 45)->nullable();
            $table->string('Gender', 45)->nullable();
            $table->string('Mobile', 45)->nullable();
            $table->string('Email', 45)->nullable();
            $table->string('Address', 45)->nullable();
            $table->string('Profile_Pic', 190)->nullable();
            $table->integer('Employer_Profiles_idEmployer_Profile');

            $table->index(["Employer_Profiles_idEmployer_Profile"], 'fk_Employee_Profiles_Employer_Profiles1_idx');
            $table->nullableTimestamps();


            $table->foreign('Employer_Profiles_idEmployer_Profile', 'fk_Employee_Profiles_Employer_Profiles1_idx')
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
