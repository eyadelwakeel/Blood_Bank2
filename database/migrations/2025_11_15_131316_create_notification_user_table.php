<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema; 
class CreateNotificationUserTable extends Migration {

	public function up()
	{
		Schema::create('notification_user', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedBigInteger('user_id');
			$table->unsignedInteger('notification_id');
			$table->boolean('is_read');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('notification_user');
	}
}
