<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CopyDataFromContactsToAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
		
		
		$contacts = Contact::all();


		foreach ($contacts as $contact){

			$distributor = $contact->distributor()->firstOrFail();
			
			if ($contact->address_type       == 'Billing') {
				
				$address                 = new Address;
				$address->type           = 'Billing';
				$address->adline1        = $contact->adline1;
				$address->adline2        = $contact->adline2 ;
				$address->city           = $contact->city;
				$address->state          = $contact->state;
				$address->postcode       = $contact->postcode ;
				$address->country_id     = $contact->country_id;
				$address->distributor_id = $distributor->id;
				$address->save();
			}
			

			if ($contact->address_type   == 'Shipping') {
				
				$address                 = new Address;
				$address->type           = 'Shipping';
				$address->adline1        = $contact->adline1;
				$address->adline2        = $contact->adline2 ;
				$address->city           = $contact->city;
				$address->state          = $contact->state;
				$address->postcode       = $contact->postcode ;
				$address->country_id     = $contact->country_id;
				$address->distributor_id = $distributor->id;
				$address->save();
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
		Address::truncate();
	}

}
