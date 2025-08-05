<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUsers extends Migration {

public function up()
	{
		Schema::create('users', function($table){

			$table->engine = 'InnoDB';

			$table->increments('id')->unsigned();
			$table->string('firstname',45);
			$table->string('lastname',45);
			$table->string('username',45);
			$table->string('email',255)->unique();
			$table->string('password',60);
			$table->string('password_temp',60);
			$table->string('code',60);
			$table->tinyInteger('active');		
			$table->string('logo_path',255)->nullable()->default(NULL);
			$table->string('remember_token')->nullable()->default(NULL);
			$table->timestamps();

			
		});
	}

	
	public function down()
	{
		Schema::drop('users');
	}

}
