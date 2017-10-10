<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReductionsTable extends Migration {

	public function up()
	{
		Schema::create('reductions', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('value');
		});
	}

	public function down()
	{
		Schema::drop('reductions');
	}
}