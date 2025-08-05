<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableMarketingMaterials extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('marketing_materials', function($table)
		{
			$table->dropColumn('discription');
		});

		Schema::table('marketing_materials', function($table)
		{
			$table->timestamps();
			$table->text('description');
			$table->string('media_size',100);


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
			$table->dropColumn('description');
			$table->dropColumn('media_size');
			$table->dropColumn('created_at');
			$table->dropColumn('updated_at');

		});

		Schema::table('marketing_materials', function($table)
		{
			$table->text('discription');

		});


	}

}
