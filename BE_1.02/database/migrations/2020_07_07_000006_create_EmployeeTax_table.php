<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeetaxTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'EmployeeTax';

    /**
     * Run the migrations.
     * @table EmployeeTax
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idEmployeeTax');
            $table->string('PayType', 45)->nullable();
            $table->string('ABN', 45)->nullable();
            $table->string('TFN', 45)->nullable();
            $table->string('TaxPurposes', 45)->nullable();
            $table->string('TaxFreeThreshold', 45)->nullable();
            $table->string('Taxbypayperiod', 45)->nullable();
            $table->nullableTimestamps();
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
