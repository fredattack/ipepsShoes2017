<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('shoes', function(Blueprint $table) {
			$table->foreign('IdModel')->references('id')->on('modeles')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('shoes', function(Blueprint $table) {
			$table->foreign('idReduction')->references('id')->on('reductions')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('modeles', function(Blueprint $table) {
			$table->foreign('idGender')->references('id')->on('genders')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('modeles', function(Blueprint $table) {
			$table->foreign('idBrand')->references('id')->on('brands')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('modeles', function(Blueprint $table) {
			$table->foreign('idReduction')->references('id')->on('reductions')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('modeles', function(Blueprint $table) {
			$table->foreign('idType')->references('id')->on('types')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->foreign('idUser')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->foreign('idShipment')->references('id')->on('shipments')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('orderLines', function(Blueprint $table) {
			$table->foreign('IdShoe')->references('id')->on('shoes')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('orderLines', function(Blueprint $table) {
			$table->foreign('IdOrder')->references('id')->on('orders')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('adresses', function(Blueprint $table) {
			$table->foreign('idUser')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('shoes', function(Blueprint $table) {
			$table->dropForeign('shoes_IdModel_foreign');
		});
		Schema::table('shoes', function(Blueprint $table) {
			$table->dropForeign('shoes_idReduction_foreign');
		});
		Schema::table('modeles', function(Blueprint $table) {
			$table->dropForeign('modeles_idGender_foreign');
		});
		Schema::table('modeles', function(Blueprint $table) {
			$table->dropForeign('modeles_idBrand_foreign');
		});
		Schema::table('modeles', function(Blueprint $table) {
			$table->dropForeign('modeles_idReduction_foreign');
		});
		Schema::table('modeles', function(Blueprint $table) {
			$table->dropForeign('modeles_idType_foreign');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->dropForeign('orders_idUser_foreign');
		});
		Schema::table('orders', function(Blueprint $table) {
			$table->dropForeign('orders_idShipment_foreign');
		});
		Schema::table('orderLines', function(Blueprint $table) {
			$table->dropForeign('orderLines_IdShoe_foreign');
		});
		Schema::table('orderLines', function(Blueprint $table) {
			$table->dropForeign('orderLines_IdOrder_foreign');
		});
		Schema::table('adresses', function(Blueprint $table) {
			$table->dropForeign('adresses_idUser_foreign');
		});
	}
}