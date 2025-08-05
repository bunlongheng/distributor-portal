<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveColumnsFromContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('contacts', function($table)
		{
			$table->dropColumn('address_type');
			$table->dropColumn('photo_path');
			$table->dropColumn('adline1');
			$table->dropColumn('adline2');
			$table->dropColumn('city');
			$table->dropColumn('state');
			$table->dropColumn('postcode');


		});
	}
/**

		 * Reverse the migrations.
	 *
	 * @return void
	 */
public function down()
{
	Schema::table('users', function($table)
	{

		$table->string('adline1',255)->nullable()->default(NULL);
		$table->string('adline2',45)->nullable()->default(NULL);
		$table->string('city',45)->nullable()->default(NULL);
		$table->string('state',45)->nullable()->default(NULL);
		$table->string('postcode',45)->nullable()->default(NULL);
		$table->string('address_type',45)->nullable()->default(NULL);
		$table->string('photo_path',255)->nullable()->default(NULL);
	});
}

}
