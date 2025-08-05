<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUniqueIndexToSkuColInInventoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		DB::update('alter table `inventories` modify `sku` VARCHAR(200) UNIQUE NOT NULL');

	}
	public function down()
	{
		DB::update('alter table `inventories` modify `sku` VARCHAR(200) NOT NULL');
	}

}