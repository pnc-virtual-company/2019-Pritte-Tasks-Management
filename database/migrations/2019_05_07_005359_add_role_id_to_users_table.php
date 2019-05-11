<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRoleIdToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');
        });

        DB::table('users')->insert(
            array(
                'id' => 1,
                'name' => 'Administrator',
                'email' => 'manager@example.com',
                'password' => bcrypt('password'),
                'remember_token' => str_random(10),
                'gender'=>'Male',
                'position'=>'Manager',
                'province'=>'Siem Reap',
                'role_id'=>1
            )
        );
        
        DB::table('users')->insert(
            array(
                'id' => 2,
                'name' => 'Sam Oun',
                'email' => 'samoun@gmail.com',
                'password' => bcrypt('password'),
                'remember_token' => str_random(10),
                'gender'=>'Male',
                'position'=>'Developer',
                'province'=>'Siem Reap',
                'role_id'=>2
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('role_id');
        });
    }
}
