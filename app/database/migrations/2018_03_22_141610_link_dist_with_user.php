<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LinkDistWithUser extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		if (Schema::hasColumn('distributors', 'user_id'))
		{
		    $generon = Distributor::find(284);
		    if ( $generon ) {
		    	$generon->user_id = 368; $generon->save();
		    }

		    $bionova = Distributor::find(285);
		    if ( $bionova ) {
		    	$bionova->user_id = 370; $bionova->save();
		    }
		}
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		if (Schema::hasColumn('distributors', 'user_id'))
		{
		    $generon = Distributor::find(284);
		    if ( $generon ) {
		    	$generon->user_id = 0; $generon->save();
		    }
		    
		    $bionova = Distributor::find(285);
		    if ( $bionova ) {
		    	$bionova->user_id = 0; $bionova->save();
		    }
		}
	}

}
