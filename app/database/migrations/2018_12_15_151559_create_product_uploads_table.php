<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductUploadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_uploads', function($table){
			$table->engine = 'InnoDB';
			$table->increments('id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->string('file_path',255)->nullable();
			$table->integer('records')->nullable()->default(0);
			$table->integer('polls_total')->nullable()->default(0);
			$table->integer('polls_completed')->nullable()->default(0);
			$table->integer('records_skipped')->nullable()->default(0);
			$table->string('status',20)->nullable();
			$table->timestamps();
			
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('product_uploads');	
	}

}
