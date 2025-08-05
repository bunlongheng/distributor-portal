<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDistributorsCountries extends Migration {

	public function up()
	{
		

		# Pivot Table 
		Schema::create('distributors_countries', function($table){

			$table->engine = 'InnoDB';
			
			$table->integer('distributor_id')->unsigned();
			$table->integer('country_id')->unsigned();
				
			$table->foreign('distributor_id')->references('id')->on('distributors')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade')->onUpdate('cascade');

		});
		
	}

	public function down()
	{
		

		Schema::table('distributors_countries', function($table)
		{
			$table->dropForeign('distributors_countries_distributor_id_foreign');
			$table->dropForeign('distributors_countries_country_id_foreign');
			
		});
		
		Schema::drop('distributors_countries');

	}

}





