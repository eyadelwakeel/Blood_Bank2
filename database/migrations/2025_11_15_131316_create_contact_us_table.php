<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema; 
class CreateContactUsTable extends Migration {

	public function up()
	{
		Schema::create('contact_us', function(Blueprint $table) {
			$table->increments('id');
			$table->string('subject');
			$table->text('massage');
			$table->unsignedBigInteger('user_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('contact_us');
	}
}
