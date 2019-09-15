<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration
{
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name')->nullable();

            $table->string('code')->nullable();

            $table->boolean('main_currency')->default(0);

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
