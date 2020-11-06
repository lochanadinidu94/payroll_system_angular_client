<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'payment';

    /**
     * Run the migrations.
     * @table payment
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idPayment');
            $table->string('Total_Diposit', 45)->nullable();
            $table->string('States', 45)->nullable();
            $table->integer('Payment_Type_idPayment_Type');
            $table->integer('Invoice_idInvoice');
            $table->integer('Employer_Users_idEmployer_Users');

            $table->index(["Payment_Type_idPayment_Type"], 'fk_Payment_Payment_Type1_idx');

            $table->index(["Invoice_idInvoice"], 'fk_Payment_Invoice1_idx');

            $table->index(["Employer_Users_idEmployer_Users"], 'fk_Payment_Employer_Users1_idx');
            $table->nullableTimestamps();


            $table->foreign('Payment_Type_idPayment_Type', 'fk_Payment_Payment_Type1_idx')
                ->references('idPayment_Type')->on('payment_type')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Invoice_idInvoice', 'fk_Payment_Invoice1_idx')
                ->references('idInvoice')->on('invoice')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Employer_Users_idEmployer_Users', 'fk_Payment_Employer_Users1_idx')
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
