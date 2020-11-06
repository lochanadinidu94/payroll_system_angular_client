<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeLoginsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'employee_logins';

    /**
     * Run the migrations.
     * @table employee_logins
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idEmployee_Logins');
            $table->string('User_Name', 45)->nullable();
            $table->string('Password', 45)->nullable();
            $table->integer('Employee_Profiles_idEmployee_Profiles');

            $table->index(["Employee_Profiles_idEmployee_Profiles"], 'fk_Employee_Logins_Employee_Profiles1_idx');
            $table->nullableTimestamps();


            $table->foreign('Employee_Profiles_idEmployee_Profiles', 'fk_Employee_Logins_Employee_Profiles1_idx')
                ->references('idEmployee_Profiles')->on('employee_profiles')
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
