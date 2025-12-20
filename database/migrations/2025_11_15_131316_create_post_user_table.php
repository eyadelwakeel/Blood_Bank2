<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreatePostUserTable extends Migration {

	public function up()
	{
		Schema::create('post_user', function(Blueprint $table) {
			$table->increments('id');
			$table->unsignedBigInteger('user_id');
			$table->unsignedInteger('post_id');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('post_user');
	}
}
