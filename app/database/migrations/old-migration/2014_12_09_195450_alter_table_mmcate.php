<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableMmcate extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('marketing_materials_categories', function($table)
		{
			
			$table->string('order', 2)->default(0);
			

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('marketing_materials_categories', function($table)
		{
			
			$table->dropColumn('order');
			
		});
	}

}
