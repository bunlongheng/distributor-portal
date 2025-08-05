<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAddresses extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('addresses', function($table){

			$table->engine = 'InnoDB';
			
			$table->increments('id')->unsigned();
			$table->string('type',45)->nullable()->default(NULL);
			$table->string('adline1',255)->nullable()->default(NULL);
			$table->string('adline2',45)->nullable()->default(NULL);
			$table->string('city',45)->nullable()->default(NULL);
			$table->string('state',45)->nullable()->default(NULL);
			$table->string('postcode',45)->nullable()->default(NULL);
			$table->integer('distributor_id')->unsigned();
			$table->integer('country_id')->unsigned();

			$table->foreign('distributor_id')->references('id')->on('distributors')->onDelete('cascade')->onUpdate('cascade');
			$table->timestamps();
			


		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('addresses', function($table)
		{
			
			$table->dropForeign('addresses_distributor_id_foreign');

		});
		
		Schema::drop('addresses');
	}

}
