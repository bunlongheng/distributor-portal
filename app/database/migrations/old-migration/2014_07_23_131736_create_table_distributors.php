<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDistributors extends Migration {

public function up()
	{
		
		Schema::create('distributors', function($table){

			$table->engine = 'InnoDB';

			$table->increments('id')->unsigned();
			$table->string('company_name',45);
			$table->string('logo_path',255)->nullable()->default(NULL);
			$table->string('url',255)->nullable()->default(NULL);
			$table->string('export_type',45);
			$table->string('discount_rate_info',45);
			$table->text('internal_note');
			$table->string('remember_token',100)->nullable()->default(NULL);
			$table->timestamps();
			$table->integer('user_id')->unsigned();
			$table->integer('export_type_id')->unsigned();
			

			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('export_type_id')->references('id')->on('export_types');
		});

		
	}


	public function down()
	{
		
		Schema::table('distributors', function($table)
		{
			$table->dropForeign('distributors_export_type_id_foreign');
			$table->dropForeign('distributors_user_id_foreign');
			
		});
		
		Schema::drop('distributors');

	}

}
