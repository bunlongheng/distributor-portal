<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotTableExportFrequencyCatalogDownload extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		# Pivot Table 
		Schema::create('export_frequency_catalog_download', function($table){

			$table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('export_frequency_id')->unsigned();
			$table->integer('catalog_download_id')->unsigned();
				

		});
		
	}

	public function down()
	{
		
		Schema::drop('export_frequency_catalog_download');

	}

}




