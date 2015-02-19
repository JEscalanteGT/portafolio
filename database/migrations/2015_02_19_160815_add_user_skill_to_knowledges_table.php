<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserSkillToKnowledgesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('knowledges', function(Blueprint $table)
		{
			$table->integer('user_id')->unsigned();
			$table->integer('skill_id')->unsigned();

			$table->foreign('user_id')
				->references('id')->on('users')
				->onDelete('cascade');
			$table->foreign('skill_id')
				->references('id')->on('skills')
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
		Schema::table('knowledges', function(Blueprint $table)
		{
			$table->dropForeign('user_id');
			$table->dropForeign('skill_id');
		});
	}

}
