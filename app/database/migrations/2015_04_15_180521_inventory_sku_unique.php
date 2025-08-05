<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InventorySkuUnique extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('inventories', function($table)
		{
			$table->dropUnique('inventories_sku_day_of_week_unique');
			$table->unique('sku');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('inventories', function($table)
		{
			$table->dropUnique('inventories_sku_unique');
			$table->unique(array('sku', 'day_of_week'));
		});
	}

}
