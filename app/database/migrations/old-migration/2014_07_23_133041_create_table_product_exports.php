<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductExports extends Migration {

public function up()
	{
		Schema::create('product_exports', function($table){

			$table->engine = 'InnoDB';

			$table->increments('id')->unsigned();
			$table->string('file_path',255);
			$table->string('file_size',55);
			$table->date('exported_date');
			
			$table->integer('product_posting_id')->unsigned();
			$table->integer('export_type_id')->unsigned();
			
			$table->timestamps();

			$table->foreign('product_posting_id')->references('id')->on('product_postings');
			$table->foreign('export_type_id')->references('id')->on('export_types');
		});
	}


	public function down()
	{
		Schema::table('product_exports', function($table)
		{
				
			
			$table->dropForeign('product_exports_product_posting_id_foreign');
			$table->dropForeign('product_exports_export_type_id_foreign');
			

		});
		
		Schema::drop('product_exports');
		
	}

}
