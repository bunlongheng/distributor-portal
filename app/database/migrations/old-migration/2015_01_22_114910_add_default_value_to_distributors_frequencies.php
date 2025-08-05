<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDefaultValueToDistributorsFrequencies extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		foreach(Distributor::all() as $distributor ){

			$distributor->export_frequency_id = 1;
			$distributor->export_type_id = 1;

			$distributor->save();
		}
	}


}
