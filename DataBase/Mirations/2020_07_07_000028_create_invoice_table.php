<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'invoice';

    /**
     * Run the migrations.
     * @table invoice
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idInvoice');
            $table->string('Date', 45)->nullable();
            $table->string('Tot_WEnd_Pay', 45)->nullable();
            $table->string('Tot_WDay_Pay', 45)->nullable();
            $table->string('Allowances', 45)->nullable();
            $table->string('Tax_Didct', 45)->nullable();
            $table->string('Super_Didct', 45)->nullable();
            $table->string('Other_Didct', 45)->nullable();
            $table->string('Sub_Total', 45)->nullable();
            $table->string('States', 45)->nullable();
            $table->integer('Approved_Time_Sheet_idApproved_Time_Sheet');
            $table->integer('Employer_Users_idEmployer_Users');
            $table->text('comment')->nullable();

            $table->index(["Employer_Users_idEmployer_Users"], 'fk_Invoice_Employer_Users1_idx');

            $table->index(["Approved_Time_Sheet_idApproved_Time_Sheet"], 'fk_Invoice_Approved_Time_Sheet1_idx');
            $table->nullableTimestamps();


            $table->foreign('Approved_Time_Sheet_idApproved_Time_Sheet', 'fk_Invoice_Approved_Time_Sheet1_idx')
                ->references('idApproved_Time_Sheet')->on('approved_time_sheet')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Employer_Users_idEmployer_Users', 'fk_Invoice_Employer_Users1_idx')
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
