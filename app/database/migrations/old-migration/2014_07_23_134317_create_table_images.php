<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableImages extends Migration {

public function up()
	{
		Schema::create('images', function($table){

			$table->engine = 'InnoDB';

			$table->increments('id')->unsigned();
			$table->string('name',255);
			$table->string('image_path',255);
			$table->integer('gift_id')->unsigned();

			$table->foreign('gift_id')->references('id')->on('gifts');
		
		});
	}

	public function down()
	{
		Schema::table('images', function($table)
		{
		
			$table->dropForeign('images_gift_id_foreign');

		});

		Schema::drop('images');

	}

}
