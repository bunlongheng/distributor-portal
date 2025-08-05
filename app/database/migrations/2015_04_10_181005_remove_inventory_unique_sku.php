<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveInventoryUniqueSku extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */

	public function up()
	{
		Schema::table('inventories', function($table)
		{
			$table->dropUnique('sku');
		});
		//DB::update('alter table `inventories` modify `sku` VARCHAR(200) NOT NULL');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		
		DB::update('alter table `inventories` modify `sku` VARCHAR(200) UNIQUE NOT NULL');

	}

}
