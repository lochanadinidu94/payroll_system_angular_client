<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayPeriodsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'pay_periods';

    /**
     * Run the migrations.
     * @table pay_periods
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idPay_Period');
            $table->string('Name', 45)->nullable();
            $table->string('Start_date', 45)->nullable();
            $table->string('End_Date', 45)->nullable();
            $table->string('Status', 45)->nullable();
            $table->integer('Employer_Profiles_idEmployer_Profile');

            $table->index(["Employer_Profiles_idEmployer_Profile"], 'fk_Pay_Period_Employer_Profiles1_idx');
            $table->nullableTimestamps();


            $table->foreign('Employer_Profiles_idEmployer_Profile', 'fk_Pay_Period_Employer_Profiles1_idx')
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
