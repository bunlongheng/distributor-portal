<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HqTables extends Migration {

	public function up()
	{
		$billing_addresses = Address::where("type","=","Billing")->get();


		foreach ( $billing_addresses as $address){


			$distributor = $address->distributor()->firstOrFail();

				$hq_address                 = new Address;
				$hq_address->type           = 'Hq';
				$hq_address->adline1        = $address->adline1;
				$hq_address->adline2        = $address->adline2 ;
				$hq_address->city           = $address->city;
				$hq_address->state          = $address->state;
				$hq_address->postcode       = $address->postcode ;
				$hq_address->country_id     = $address->country_id;
				$hq_address->distributor_id = $distributor->id;
				$hq_address->save();
			}
	}


}
