<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableContacts extends Migration {

public function up()
	{
		

		Schema::create('contacts', function($table){

			$table->engine = 'InnoDB';

			$table->increments('id')->unsigned();
			$table->string('firstname',45);
			$table->string('lastname',45);
			$table->string('phone',45);
			$table->string('email',255)->unique();
			$table->string('adline1',45)->nullable()->default(NULL);
			$table->string('adline2',45)->nullable()->default(NULL);
			$table->string('city',45)->nullable()->default(NULL);
			$table->string('state',45)->nullable()->default(NULL);
			$table->string('postcode',45)->nullable()->default(NULL);
			$table->tinyInteger('is_primary');
			
			$table->integer('distributor_id')->unsigned();
			$table->integer('country_id')->unsigned();
			$table->integer('contact_type_id')->unsigned();
			
			$table->timestamps();

			$table->foreign('distributor_id')->references('id')->on('distributors');
			$table->foreign('country_id')->references('id')->on('countries');
			$table->foreign('contact_type_id')->references('id')->on('contact_types');

		});

		
	}

	# tableName_foreignkeyName_foreign

	public function down()
	{
		Schema::table('contacts', function($table)
		{
			
			$table->dropForeign('contacts_contact_type_id_foreign');
			$table->dropForeign('contacts_country_id_foreign');
			$table->dropForeign('contacts_distributor_id_foreign');

		});
		
		Schema::drop('contacts');

	}

}





