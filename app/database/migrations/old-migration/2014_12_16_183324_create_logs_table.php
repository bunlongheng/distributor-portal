<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('logs', function($table){

			$table->engine = 'InnoDB';

			$table->increments('id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->string('action',255);
			$table->string('object',255);
			$table->string('name',255);
			$table->string('note',255)->nullable();
			$table->string('user',45);
			
			$table->timestamps();
			
		
			$table->foreign('user_id')->references('id')->on('users');

			//Add onDELETE onUPDATE cascade...


			
		});


		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

		Schema::table('logs', function($table)
		{
			
			$table->dropForeign('logs_user_id_foreign');
			
		});
		
		Schema::drop('logs');


		
	}

}
