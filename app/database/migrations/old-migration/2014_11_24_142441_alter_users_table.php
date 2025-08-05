<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table)
		{
			$table->dateTime('last_logged_in');
			$table->dateTime('last_logged_out');
			$table->string('logged_in_count', 10)->default(0);
			$table->string('is_online', 1)->default(0);

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
			$table->dropColumn('last_logged_in');
			$table->dropColumn('last_logged_out');
			$table->dropColumn('logged_in_count');
			$table->dropColumn('is_online');
		});
	}

}
