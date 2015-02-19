<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserCityToUserProfilesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_profiles', function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned();
			$table->integer('city_id')->unsigned();

			$table->foreign('user_id')
						->references('id')->on('users')
						->onDelete('cascade');
			$table->foreign('city_id')
						->references('id')->on('cities')
						->onDelete('cascade');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_profiles', function(Blueprint $table)
		{
			$table->dropForeign('user_id');
			$table->dropForeign('city_id');
		});
	}

}
