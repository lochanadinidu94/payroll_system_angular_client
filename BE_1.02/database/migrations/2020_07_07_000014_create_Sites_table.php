<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Sites';

    /**
     * Run the migrations.
     * @table Sites
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('idSites');
            $table->string('Name', 45)->nullable();
            $table->string('SiteDis', 45)->nullable();
            $table->string('Location', 45)->nullable();
            $table->string('GeoTag', 190)->nullable();
            $table->string('GeoTag2', 190)->nullable();
            $table->string('Range', 45)->nullable();
            $table->integer('Employer_Profiles_idEmployer_Profile');
            $table->string('States', 45)->nullable();

            $table->index(["Employer_Profiles_idEmployer_Profile"], 'fk_Sites_Employer_Profiles1_idx');
            $table->nullableTimestamps();


            $table->foreign('Employer_Profiles_idEmployer_Profile', 'fk_Sites_Employer_Profiles1_idx')
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
