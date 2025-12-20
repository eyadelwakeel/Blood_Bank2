<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;  
class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->bigIncrements('id');
			$table->string('name');
			$table->string('age');
			$table->unsignedInteger('blood_type_id');
			$table->decimal('longitude', 10,8);
			$table->decimal('latitude', 10,8);
			$table->unsignedInteger('city_id');
			$table->string('phone');
			$table->text('notes');
			$table->string('hospital_name');
			$table->unsignedBigInteger('user_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}
