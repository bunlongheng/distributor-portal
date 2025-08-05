<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableDistributors extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('distributors', function($table)
		{
			$table->string('payment_method',255);
			$table->string('shipping_carrier',255);
			$table->string('shipping_number',255);

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('distributors', function($table)
		{
			$table->dropColumn('payment_method');
			$table->dropColumn('shipping_carrier');
			$table->dropColumn('shipping_number');
		});
	}

}
