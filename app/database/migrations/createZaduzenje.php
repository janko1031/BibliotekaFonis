


<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('zaduzenja2', function($table)
		{

			$table->increments('id');
			$table->integer('knjiga_id');
			$table->integer('user_id');
			$table->timestamps();
		}
	}

		/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
		public function down()
		{
			Schema::drop('users');
		//
		}

	}