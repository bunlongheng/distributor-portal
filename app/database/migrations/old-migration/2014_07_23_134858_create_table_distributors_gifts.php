<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDistributorsGifts extends Migration {

public function up()
	{
		

		# Pivot Table 
		Schema::create('distributors_gifts', function($table){

			$table->engine = 'InnoDB';
			
			$table->integer('distributor_id')->unsigned();
			$table->integer('gift_id')->unsigned();
				
			$table->foreign('distributor_id')->references('id')->on('distributors')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('gift_id')->references('id')->on('gifts')->onDelete('cascade')->onUpdate('cascade');

		});
		
	}

	public function down()
	{
		

		Schema::table('distributors_gifts', function($table)
		{
			$table->dropForeign('distributors_gifts_distributor_id_foreign');
			$table->dropForeign('distributors_gifts_gift_id_foreign');
			
		});
		
		Schema::drop('distributors_gifts');

	}

}





