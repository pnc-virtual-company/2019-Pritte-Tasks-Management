<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('avatar')->default('default.png');
            $table->string('gender');
            $table->string('position');
            $table->string('province');
            $table->rememberToken();
            $table->timestamps();
        });

        //Insert the default admin user
        DB::table('users')->insert(
            array(
                'id' => 1,
                'name' => 'Administrator',
                'email' => 'manager@example.com',
                'password' => bcrypt('password'),
                'remember_token' => str_random(10),
                'gender'=>'Male',
                'position'=>'Student',
                'province'=>'Siem Reap'
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
        Schema::dropIfExists('users');
    }
}
