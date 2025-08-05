<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePromotions extends Migration {

	public function up()
	{
		Schema::create('promotions', function($table){

			$table->engine = 'InnoDB';

			$table->increments('id')->unsigned();
			$table->string('name',255);
			$table->string('rate',255);
			$table->date('start_date');
			$table->date('end_date');
			$table->string('media_path',255);
			
			$table->integer('user_id')->unsigned();

			$table->foreign('user_id')->references('id')->on('users');
		
		});
	}

	public function down()
	{
		Schema::table('promotions', function($table)
		{
		
			$table->dropForeign('promotions_user_id_foreign');

		});

		Schema::drop('promotions');

	}

}
