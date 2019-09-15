<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToProjectsTable extends Migration
{
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            $table->unsignedInteger('client_id')->nullable();

            $table->foreign('client_id', 'client_fk_340038')->references('id')->on('clients');

            $table->unsignedInteger('status_id')->nullable();

            $table->foreign('status_id', 'status_fk_340042')->references('id')->on('project_statuses');
        });
    }
}
