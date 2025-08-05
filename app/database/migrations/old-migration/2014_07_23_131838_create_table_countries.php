<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCountries extends Migration {
public function up()
	{
		Schema::create('countries', function($table){

			$table->engine = 'InnoDB';

			$table->increments('id')->unsigned();
			$table->string('name',45)->unique();
			$table->string('code',60)->unique();
			$table->string('logo',255);
			$table->timestamps();

		});
		
	}

	public function down()
	{
		
		Schema::drop('countries');
	}

}





