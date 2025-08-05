<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRequests extends Migration {

public function up()
	{
		Schema::create('requests', function($table){

			$table->engine = 'InnoDB';

			$table->increments('id')->unsigned();
			$table->integer('quantity')->unsigned();
			$table->text('note');
			$table->tinyInteger('option');
			$table->integer('distributor_id')->unsigned();
			$table->integer('gift_id')->unsigned();

			$table->foreign('distributor_id')->references('id')->on('users');
			$table->foreign('gift_id')->references('id')->on('gifts');
		
		});
	}

	public function down()
	{
		Schema::table('requests', function($table)
		{
		
			$table->dropForeign('requests_distributor_id_foreign');
			$table->dropForeign('requests_gift_id_foreign');

		});

		Schema::drop('requests');

	}

}
