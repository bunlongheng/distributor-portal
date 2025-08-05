<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableDistributorsAddNullable extends Migration {

	public function up()
	{

		Schema::table('distributors', function($table)
		{
			
			$table->dropColumn('shipping_number');

		});

		
		Schema::table('distributors', function($table)
		{
	
			$table->string('shipping_number',255)->nullable();

		});
	}


	public function down()
	{
		Schema::table('distributors', function($table)
		{
			
			$table->dropColumn('shipping_number');

		});
	}

}
