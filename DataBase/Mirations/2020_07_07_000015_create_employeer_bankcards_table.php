<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeerBankcardsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'employeer_bankcards';

    /**
     * Run the migrations.
     * @table employeer_bankcards
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idEmployeer_BankCards');
            $table->string('Name', 45)->nullable();
            $table->string('Bank', 45)->nullable();
            $table->string('Card_Name', 45)->nullable();
            $table->string('Card_Number', 45)->nullable();
            $table->string('Card_Exp_Date', 45)->nullable();
            $table->string('Card_CVV_Number', 45)->nullable();
            $table->integer('employer_profiles_idEmployer_Profile');

            $table->index(["employer_profiles_idEmployer_Profile"], 'fk_employeer_bankcards_employer_profiles1_idx');
            $table->nullableTimestamps();


            $table->foreign('employer_profiles_idEmployer_Profile', 'fk_employeer_bankcards_employer_profiles1_idx')
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
