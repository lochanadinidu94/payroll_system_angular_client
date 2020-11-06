<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployerUsersPivilegesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'employer_users_pivileges';

    /**
     * Run the migrations.
     * @table employer_users_pivileges
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idEmployer_Users_Pivileges');
            $table->string('Employer_Profile', 45)->nullable();
            $table->string('Employee_Profile', 45)->nullable();
            $table->string('Attandences_Profile', 45)->nullable();
            $table->string('Payment_Profile', 45)->nullable();
            $table->integer('employer_users_idEmployer_Users');

            $table->index(["employer_users_idEmployer_Users"], 'fk_employer_users_pivileges_employer_users1_idx');
            $table->nullableTimestamps();


            $table->foreign('employer_users_idEmployer_Users', 'fk_employer_users_pivileges_employer_users1_idx')
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
