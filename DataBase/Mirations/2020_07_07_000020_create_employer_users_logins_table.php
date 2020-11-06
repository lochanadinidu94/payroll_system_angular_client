<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployerUsersLoginsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'employer_users_logins';

    /**
     * Run the migrations.
     * @table employer_users_logins
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idEmployer_Users_Logins');
            $table->string('User_Name', 45)->nullable();
            $table->string('Password', 45)->nullable();
            $table->integer('Employer_Users_idEmployer_Users');

            $table->index(["Employer_Users_idEmployer_Users"], 'fk_Employer_Users_Logins_Employer_Users1_idx');
            $table->nullableTimestamps();


            $table->foreign('Employer_Users_idEmployer_Users', 'fk_Employer_Users_Logins_Employer_Users1_idx')
                ->references('idEmployer_Users')->on('employer_users')
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
