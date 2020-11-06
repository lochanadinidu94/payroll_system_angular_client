<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovedTimeSheetTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'approved_time_sheet';

    /**
     * Run the migrations.
     * @table approved_time_sheet
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idApproved_Time_Sheet');
            $table->string('States', 45)->nullable();
            $table->integer('Time_Sheets_idTime_Sheet');
            $table->integer('Employer_Users_idEmployer_Users');
            $table->text('comment')->nullable();

            $table->index(["Time_Sheets_idTime_Sheet"], 'fk_Approved_Time_Sheet_Time_Sheets1_idx');

            $table->index(["Employer_Users_idEmployer_Users"], 'fk_Approved_Time_Sheet_Employer_Users1_idx');
            $table->nullableTimestamps();


            $table->foreign('Time_Sheets_idTime_Sheet', 'fk_Approved_Time_Sheet_Time_Sheets1_idx')
                ->references('idTime_Sheet')->on('time_sheets')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Employer_Users_idEmployer_Users', 'fk_Approved_Time_Sheet_Employer_Users1_idx')
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
