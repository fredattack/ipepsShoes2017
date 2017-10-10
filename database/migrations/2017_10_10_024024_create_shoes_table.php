<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShoesTable extends Migration {

	public function up()
	{
		Schema::create('shoes', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->boolean('reduction');
			$table->integer('IdModel')->unsigned();
			$table->integer('idReduction')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('shoes');
	}
}