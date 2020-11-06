<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanksTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Banks';

    /**
     * Run the migrations.
     * @table Banks
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idBanks');
            $table->string('Name', 45)->nullable();
            $table->integer('country_idCountry');

            $table->index(["country_idCountry"], 'fk_Banks_country1_idx');


            $table->foreign('country_idCountry', 'fk_Banks_country1_idx')
                ->references('idCountry')->on('country')
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
