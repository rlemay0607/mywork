<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requirements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('priority')->default('3-Medium');
            $table->string('short_description')->nullable();
            $table->string('description')->nullable();
            $table->string('type')->nullable();
            $table->string('state')->default('Draft');
            $table->integer('points')->nullable();
            $table->string('classification')->nullable();
            $table->string('acceptance_criteria')->nullable();
            $table->integer('module_id');
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
        Schema::dropIfExists('requirements');
    }
}
