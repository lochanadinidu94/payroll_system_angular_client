<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployerUsersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'employer_users';

    /**
     * Run the migrations.
     * @table employer_users
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idEmployer_Users');
            $table->string('Name', 45)->nullable();
            $table->string('Mobile', 45)->nullable();
            $table->string('Email', 45)->nullable();
            $table->integer('Employer_Profiles_idEmployer_Profile');
            $table->integer('Employer_Users_Type_idEmployer_Users_Type');
            $table->integer('Employer_Users_Status_idEmployer_Users_Status');

            $table->index(["Employer_Users_Status_idEmployer_Users_Status"], 'fk_Employer_Users_Employer_Users_Status1_idx');

            $table->index(["Employer_Profiles_idEmployer_Profile"], 'fk_Employer_Users_Employer_Profiles_idx');

            $table->index(["Employer_Users_Type_idEmployer_Users_Type"], 'fk_Employer_Users_Employer_Users_Type1_idx');
            $table->nullableTimestamps();


            $table->foreign('Employer_Profiles_idEmployer_Profile', 'fk_Employer_Users_Employer_Profiles_idx')
                ->references('idEmployer_Profile')->on('employer_profiles')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Employer_Users_Type_idEmployer_Users_Type', 'fk_Employer_Users_Employer_Users_Type1_idx')
                ->references('idEmployer_Users_Type')->on('employer_users_types')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Employer_Users_Status_idEmployer_Users_Status', 'fk_Employer_Users_Employer_Users_Status1_idx')
                ->references('idEmployer_Users_Status')->on('employer_users_status')
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
