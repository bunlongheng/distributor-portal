<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MulLogins extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//

        Schema::create('distributors_users', function($table) {

            $table->engine = 'InnoDB';

            $table->increments('id');
            $table->integer('distributor_id');
            $table->integer('user_id');
            $table->timestamps();

        });

        Schema::table('distributors', function($table) {
           $table->string('logo_path');
        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
	}

}
