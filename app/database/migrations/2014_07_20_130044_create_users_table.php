<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table)
		{
            $table->increments('id');
            $table->string('firstname', 20);
            $table->string('lastname', 20);
            $table->string('remember_token', 100);
            $table->string('email', 100)->unique();
            $table->enum('is_admin',array(0,1))->default(0);
            $table->string('password', 64);
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
		Schema::drop('users');
	}

}
