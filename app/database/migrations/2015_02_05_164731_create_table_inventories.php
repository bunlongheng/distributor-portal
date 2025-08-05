<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableInventories extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inventories', function($table){

			$table->engine = 'InnoDB';

			$table->increments('id')->unsigned();
			$table->string('sku',255);
			$table->string('description', 255 )->nullable();
			$table->integer('stock')->nullable()->default(0);
			$table->tinyInteger('day_of_week')->unsigned();
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
		Schema::drop('inventories');	
	}

}
