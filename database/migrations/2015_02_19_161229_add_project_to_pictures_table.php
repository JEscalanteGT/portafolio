<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProjectToPicturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pictures', function(Blueprint $table)
		{
			$table->integer('project_id')->unsigned();

			$table->foreign('project_id')
						->references('id')->on('projects')
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
		Schema::table('pictures', function(Blueprint $table)
		{
			$table->dropForeign('project_id');
		});
	}

}
