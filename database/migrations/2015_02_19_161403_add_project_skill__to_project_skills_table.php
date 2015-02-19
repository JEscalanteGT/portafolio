<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectSkillToProjectSkillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('project_skills', function(Blueprint $table)
		{
			$table->integer('project_id')->unsigned();
			$table->integer('skill_id')->unsigned();

			$table->foreign('project_id')
						->references('id')->on('projects')
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
		Schema::table('project_skills', function(Blueprint $table)
		{
			$table->dropForeign('project_id');
			$table->dropForeign('skill_id');
		});
	}

}
