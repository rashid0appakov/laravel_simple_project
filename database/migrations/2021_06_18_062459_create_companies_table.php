<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo')->nullable();
            $table->smallInteger('form')->unsigned()->default(0);
            $table->string('license')->nullable();
            $table->string('license_date')->nullable();
            $table->string('leader1')->nullable();
            $table->string('leader2')->nullable();
            $table->string('prefix')->nullable();
            $table->string('email')->nullable();
            $table->text('description')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->text('uaddress')->nullable();
            $table->string('inn')->nullable();
            $table->string('bik')->nullable();
            $table->string('ks')->nullable();
            $table->string('rs')->nullable();
            $table->string('bank')->nullable();
            $table->string('ogrn')->nullable();
            $table->string('kpp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
