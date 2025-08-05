<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMarketingMaterialsCategories extends Migration {

	public function up()
	{
		Schema::create('marketing_materials_categories', function($table){

			$table->engine = 'InnoDB';

			$table->increments('id')->unsigned();
			$table->string('name',255);
			
		});
	}

	public function down()
	{
		

		Schema::drop('marketing_materials_categories');

	}

}
