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
		Schema::table('marketing_materials', function($table)
		{
			
			$table->string('ext', 255 );
			$table->string('resolution', 255 )->nullable();
			$table->string('print_size', 255 )->nullable();
			

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('marketing_materials', function($table)
		{
			
			$table->dropColumn('ext');
			$table->dropColumn('resolution');
			$table->dropColumn('print_size');
			
		});
	}

}
