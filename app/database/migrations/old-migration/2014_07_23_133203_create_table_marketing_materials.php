<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMarketingMaterials extends Migration {

public function up()
	{
		Schema::create('marketing_materials', function($table){

			$table->engine = 'InnoDB';

			$table->increments('id')->unsigned();
			$table->string('title',255);
			$table->text('discription',255);
			$table->string('media_path',255);
			$table->string('thumb_path',255);
			$table->integer('user_id')->unsigned();
			$table->integer('marketing_materials_category_id')->unsigned();

			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('marketing_materials_category_id')->references('id')->on('marketing_materials_categories');

		
		});
	}

	public function down()
	{
		Schema::table('marketing_materials', function($table)
		{
		
			$table->dropForeign('marketing_materials_user_id_foreign');
			$table->dropForeign('marketing_materials_marketing_materials_category_id_foreign');

		});

		Schema::drop('marketing_materials');

	}

}

