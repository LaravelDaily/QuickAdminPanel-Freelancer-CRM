<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');

            $table->string('first_name')->nullable();

            $table->string('last_name')->nullable();

            $table->string('company')->nullable();

            $table->string('email')->nullable();

            $table->string('phone')->nullable();

            $table->string('website')->nullable();

            $table->string('skype')->nullable();

            $table->string('country')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }
}
