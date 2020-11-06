<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployerSystemPaymentsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'employer_system_payments';

    /**
     * Run the migrations.
     * @table employer_system_payments
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idEmployer_System_Payment');
            $table->string('Month', 45)->nullable();
            $table->string('Date', 45)->nullable();
            $table->string('States', 45)->nullable();
            $table->integer('Employer_Profiles_idEmployer_Profile');

            $table->index(["Employer_Profiles_idEmployer_Profile"], 'fk_Employer_System_Payment_Employer_Profiles1_idx');
            $table->nullableTimestamps();


            $table->foreign('Employer_Profiles_idEmployer_Profile', 'fk_Employer_System_Payment_Employer_Profiles1_idx')
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
