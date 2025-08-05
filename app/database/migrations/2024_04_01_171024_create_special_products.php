<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpecialProducts extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('special_products', function($table){
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('sku',50)->unique();
            $table->string('name',255)->nullable();
            $table->string('price',255)->nullable();
            $table->string('conjugation',255)->nullable();
            $table->timestamps();

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('special_products');
    }

}
