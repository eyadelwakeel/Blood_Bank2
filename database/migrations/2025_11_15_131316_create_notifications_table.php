<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreateNotificationsTable extends Migration {

	public function up()
	{
		Schema::create('notifications', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->text('massage');
			$table->timestamps();
			$table->bigInteger('donation_request_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('notifications');
	}
}
