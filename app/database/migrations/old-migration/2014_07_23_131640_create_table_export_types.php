<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableExportTypes extends Migration {

	public function up()
	{
		Schema::create('export_types', function($table){

			$table->engine = 'InnoDB';

			$table->increments('id')->unsigned();
			$table->string('name',45);
			
		});

	}


	public function down()
	{
		Schema::drop('export_types');
	}

}
