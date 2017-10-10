<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdressesTable extends Migration {

	public function up()
	{
		Schema::create('adresses', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('idUser')->unsigned();
			$table->enum('type', array('facturation', 'livraison1', 'livraison2', 'livraison3'));
			$table->string('street', 100);
			$table->string('number', 5)->nullable();
			$table->integer('postCode');
			$table->string('city', 50);
			$table->string('country', 50);
			$table->decimal('deliveryCost');
		});
	}

	public function down()
	{
		Schema::drop('adresses');
	}
}