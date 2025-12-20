<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;  
class CreateGovernorateUserTable extends Migration {

	public function up()
	{
		Schema::create('governorate_user', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedBigInteger('user_id');
			$table->unsignedInteger('governorate_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('governorate_user');
	}
}
