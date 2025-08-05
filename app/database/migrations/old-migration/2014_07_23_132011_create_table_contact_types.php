<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContactTypes extends Migration {

public function up()
	{
		
		Schema::create('contact_types', function($table){

			$table->engine = 'InnoDB';
			
			$table->increments('id')->unsigned();
			$table->string('name',45);

			
		});

		
	}

	# tableName_foreignkeyName_foreign

	public function down()
	{

		Schema::drop('contact_types');

	}

}





