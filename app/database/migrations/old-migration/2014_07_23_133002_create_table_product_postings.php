<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductPostings extends Migration {

public function up()
	{
		Schema::create('product_postings', function($table){

			$table->engine = 'InnoDB';

			$table->increments('id')->unsigned();
			$table->string('title',100);
			$table->string('discription');
			$table->text('note')->nullable()->default(NULL);
			$table->date('posted_date');
			$table->integer('user_id')->unsigned();
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	public function down()
	{
		Schema::table('product_postings', function($table)
		{
			
			$table->dropForeign('product_postings_user_id_foreign');

		});
		
		Schema::drop('product_postings');
	}

}
