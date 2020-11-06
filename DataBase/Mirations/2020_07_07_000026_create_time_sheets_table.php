<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeSheetsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'time_sheets';

    /**
     * Run the migrations.
     * @table time_sheets
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idTime_Sheet');
            $table->string('Date', 45)->nullable();
            $table->string('Tot_Sunt_Hr', 45)->nullable();
            $table->string('Tot_Sat_Hr', 45)->nullable();
            $table->string('Tot_PHol_Hr', 45)->nullable();
            $table->string('Tot_WDay_Hr', 45)->nullable();
            $table->string('states', 45)->nullable();
            $table->integer('Sites_Shifts_idSites_Shifts');
            $table->integer('Pay_Period_idPay_Period');
            $table->text('comment')->nullable();
            $table->integer('employer_has_employees_idemployer_has_employees');

            $table->index(["Pay_Period_idPay_Period"], 'fk_Time_Sheets_Pay_Period1_idx');

            $table->index(["employer_has_employees_idemployer_has_employees"], 'fk_time_sheets_employer_has_employees1_idx');

            $table->index(["Sites_Shifts_idSites_Shifts"], 'fk_Time_Sheets_Sites_Shifts1_idx');
            $table->nullableTimestamps();


            $table->foreign('Sites_Shifts_idSites_Shifts', 'fk_Time_Sheets_Sites_Shifts1_idx')
                ->references('idSites_Shifts')->on('sites_shifts')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Pay_Period_idPay_Period', 'fk_Time_Sheets_Pay_Period1_idx')
                ->references('idPay_Period')->on('pay_periods')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('employer_has_employees_idemployer_has_employees', 'fk_time_sheets_employer_has_employees1_idx')
                ->references('idemployer_has_employees')->on('employer_has_employees')
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
