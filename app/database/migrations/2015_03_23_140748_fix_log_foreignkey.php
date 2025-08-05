<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixLogForeignkey extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::update('alter table `logs` modify `user_id` INT(10) UNSIGNED');
		Schema::table('logs', function($table)
		{
			$table->dropForeign('logs_user_id_foreign');
			$table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('logs', function($table)
		{
			$table->dropForeign('logs_user_id_foreign');
			$table->foreign('user_id')->references('id')->on('users');
		});
		DB::update('alter table `logs` modify `user_id` INT(10) UNSIGNED NOT NULL');
	}

}
