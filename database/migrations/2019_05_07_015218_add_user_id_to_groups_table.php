<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserIdToGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('groups', function (Blueprint $table) {
            $table->integer('manager_id')->unsigned();
            $table->integer('viewers_id')->unsigned();
            $table->integer('members_id')->unsigned();

            $table->foreign('manager_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('viewers_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
            $table->foreign('members_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('groups', function (Blueprint $table) {
            //
        });
    }
}
