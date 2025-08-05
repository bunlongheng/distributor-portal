<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDistributorsPromotions extends Migration {

	public function up()
	{
		

		# Pivot Table 
		Schema::create('distributors_promotions', function($table){

			$table->engine = 'InnoDB';
			
			$table->integer('distributor_id')->unsigned();
			$table->integer('promotion_id')->unsigned();
				
			$table->foreign('distributor_id')->references('id')->on('distributors')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('promotion_id')->references('id')->on('promotions')->onDelete('cascade')->onUpdate('cascade');

		});
		
	}

	public function down()
	{
		

		Schema::table('distributors_countries', function($table)
		{
			$table->dropForeign('distributors_promotions_distributor_id_foreign');
			$table->dropForeign('distributors_promotions_promotion_id_foreign');
			
		});
		
		Schema::drop('distributors_promotions');

	}

}





