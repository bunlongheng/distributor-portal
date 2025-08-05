<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableGifts extends Migration {

public function up()
	{
		Schema::create('gifts', function($table){

			$table->engine = 'InnoDB';

			$table->increments('id')->unsigned();
			$table->string('name',255);
			$table->text('discription');
			$table->text('option');
			$table->tinyInteger('status');
			$table->integer('user_id')->unsigned();

			$table->foreign('user_id')->references('id')->on('users');
		
		});
	}

	public function down()
	{
		Schema::table('gifts', function($table)
		{
		
			$table->dropForeign('gifts_user_id_foreign');

		});

		Schema::drop('gifts');

	}

}
