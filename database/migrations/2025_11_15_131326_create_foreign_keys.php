<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('blood_type_id')->references('id')->on('blood_types')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('cities', function(Blueprint $table) {
			$table->foreign('governorate_id')->references('id')->on('governorates')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('post_user', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('post_user', function(Blueprint $table) {
			$table->foreign('post_id')->references('id')->on('posts')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('donation_requests', function(Blueprint $table) {
			$table->foreign('blood_type_id')->references('id')->on('blood_types')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('donation_requests', function(Blueprint $table) {
			$table->foreign('city_id')->references('id')->on('cities')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('donation_requests', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('contact_us', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('notifications', function(Blueprint $table) {
			$table->foreign('donation_request_id')->references('id')->on('donation_requests')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('notification_user', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('notification_user', function(Blueprint $table) {
			$table->foreign('notification_id')->references('id')->on('notifications')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('blood_type_user', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('blood_type_user', function(Blueprint $table) {
			$table->foreign('blood_type_id')->references('id')->on('blood_types')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('governorate_user', function(Blueprint $table) {
			$table->foreign('user_id')->references('id')->on('users')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
		Schema::table('governorate_user', function(Blueprint $table) {
			$table->foreign('governorate_id')->references('id')->on('governorates')
						->onDelete('restrict')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_blood_type_id_foreign');
		});
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_city_id_foreign');
		});
		Schema::table('cities', function(Blueprint $table) {
			$table->dropForeign('cities_governorate_id_foreign');
		});
		Schema::table('post_user', function(Blueprint $table) {
			$table->dropForeign('post_user_user_id_foreign');
		});
		Schema::table('post_user', function(Blueprint $table) {
			$table->dropForeign('post_user_post_id_foreign');
		});
		Schema::table('donation_requests', function(Blueprint $table) {
			$table->dropForeign('donation_requests_blood_type_id_foreign');
		});
		Schema::table('donation_requests', function(Blueprint $table) {
			$table->dropForeign('donation_requests_city_id_foreign');
		});
		Schema::table('donation_requests', function(Blueprint $table) {
			$table->dropForeign('donation_requests_user_id_foreign');
		});
		Schema::table('contact_us', function(Blueprint $table) {
			$table->dropForeign('contact_us_user_id_foreign');
		});
		Schema::table('notifications', function(Blueprint $table) {
			$table->dropForeign('notifications_donation_request_id_foreign');
		});
		Schema::table('notification_user', function(Blueprint $table) {
			$table->dropForeign('notification_user_user_id_foreign');
		});
		Schema::table('notification_user', function(Blueprint $table) {
			$table->dropForeign('notification_user_notification_id_foreign');
		});
		Schema::table('blood_type_user', function(Blueprint $table) {
			$table->dropForeign('blood_type_user_user_id_foreign');
		});
		Schema::table('blood_type_user', function(Blueprint $table) {
			$table->dropForeign('blood_type_user_blood_type_id_foreign');
		});
		Schema::table('governorate_user', function(Blueprint $table) {
			$table->dropForeign('governorate_user_user_id_foreign');
		});
		Schema::table('governorate_user', function(Blueprint $table) {
			$table->dropForeign('governorate_user_governorate_id_foreign');
		});
	}
}
