<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('firstName', 50);
			$table->string('surname', 50);
			$table->string('login', 50)->unique();
			$table->string('email', 100)->unique();
			$table->enum('role', array('client', 'admin', 'seller'));
			$table->string('password');
			$table->timestamps();
            $table->rememberToken();
		});
		
	}

	public function down()
	{
		Schema::drop('users');
	}
}