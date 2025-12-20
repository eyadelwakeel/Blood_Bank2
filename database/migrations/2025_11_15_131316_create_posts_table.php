<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->text('content');
			$table->string('photo');
			$table->bigInteger('category_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}
