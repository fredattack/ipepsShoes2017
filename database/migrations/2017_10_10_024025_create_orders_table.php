<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('idUser')->unsigned();
			$table->boolean('delivered');
			$table->decimal('totalProducts');
			$table->integer('idShipment')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}