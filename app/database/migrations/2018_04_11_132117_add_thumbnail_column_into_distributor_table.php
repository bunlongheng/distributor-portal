<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddThumbnailColumnIntoDistributorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('distributors', function(Blueprint $table)
		{
            $table->string('thumbnail_path')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('distributors', function(Blueprint $table)
		{
            $table->dropColumn('thumbnail_path');
		});
	}

}
