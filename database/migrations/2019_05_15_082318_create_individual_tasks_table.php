<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('due_date');
            $table->string('status')->default('Open');
            $table->string('workload')->nullable();
            $table->string('type')->default('p');
            $table->string('attachment')->nullable();
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
        Schema::dropIfExists('individual_tasks');
    }
}
