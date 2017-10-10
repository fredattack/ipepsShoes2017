<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSizesTable extends Migration {

	public function up()
	{
		Schema::create('sizes', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('value');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('sizes');
	}
}