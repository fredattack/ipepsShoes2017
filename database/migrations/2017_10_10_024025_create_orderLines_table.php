<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrderLinesTable extends Migration {

	public function up()
	{
		Schema::create('orderLines', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('IdShoe')->unsigned();
			$table->integer('quantity');
			$table->integer('IdOrder')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('orderLines');
	}
}