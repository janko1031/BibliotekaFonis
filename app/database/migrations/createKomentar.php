


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
		Schema::create('komentari2', function($table)
		{

			$table->increments('id');

			$table->string('naziv', 32);

			$table->integer('knjiga_id');
			$table->integer('user_id');
			$table->string('komentar', 200);
			$table->integer('ocena');

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