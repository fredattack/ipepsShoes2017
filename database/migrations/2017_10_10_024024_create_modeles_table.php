<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModelesTable extends Migration {

	public function up()
	{
		Schema::create('modeles', function(Blueprint $table) {
			$table->increments('id');
			$table->string('color');
			$table->integer('idGender')->unsigned();
			$table->integer('idBrand')->unsigned();
			$table->integer('idReduction')->unsigned();
			$table->integer('idType')->unsigned();
			$table->timestamps();
			$table->decimal('price');
			$table->string('image', 200);
		});
	}

	public function down()
	{
		Schema::drop('modeles');
	}
}