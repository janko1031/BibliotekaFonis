<?php

use Illuminate\Database\Migrations\Migration;

class CreateKnjigeTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		
	Schema::create('books', function($table)
 {
 	$table->increments('id');
$table->string('name', 128);

 $table->string('naziv', 32);

 $table->integer('id_knjige');
 $table->string('autor', 32);
 $table->string('godina_izdanja', 32);
 $table->string('tehnologija', 32);
 $table->integer('br_strana');
 $table->text('opis', 420);;
 $table->boolean('dostupnost');
	$table->timestamps();

 });	
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	Schema::drop('knjige');
	
		//
	}

}