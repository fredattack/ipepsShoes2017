<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGendersTable extends Migration {

	public function up()
	{
		Schema::create('genders', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 25)->unique();
			$table->integer('maxSize');
			$table->integer('minSize')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('genders');
	}
}