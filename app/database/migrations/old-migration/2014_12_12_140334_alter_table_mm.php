<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableMm extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('downloads', function($table){

			$table->engine = 'InnoDB';

			$table->increments('id')->unsigned();
			$table->string('title',255);
			$table->string('count',45)->default(0);
			$table->timestamps();
			$table->integer('user_id')->unsigned();
			
			
			$table->foreign('user_id')->references('id')->on('users');
			
		});


		Schema::table('marketing_materials', function($table)
		{
			
			$table->string('download_total', 45 )->default(0);
			$table->integer('download_id');
			
			$table->foreign('download_id')->references('id')->on('downloads');
			

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

		Schema::table('users', function($table)
		{
			$table->dropForeign('users_user_id_foreign');
			
		});

		Schema::drop('downloads');


		Schema::table('marketing_materials', function($table)
		{
			$table->dropForeign('marketing_materials_download_id_foreign');
			
		});

		Schema::table('marketing_materials', function($table)
		{
			
			$table->dropColumn('download_total');
			$table->dropColumn('download_id');
		
			
		});
	}

}
