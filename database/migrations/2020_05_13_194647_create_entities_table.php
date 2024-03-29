<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntitiesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('entities', function (Blueprint $table) {
			$table->id();
			$table->bigInteger('tweet_id')->unsigned()->index();
			$table->text('body');
			$table->text('body_plain');
			$table->string('type');
			$table->integer('start')->unsigned();
			$table->integer('end')->unsigned();
			$table->timestamps();

			$table->foreign('tweet_id')
				->references('id')->on('tweets')
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
		Schema::dropIfExists('entities');
	}
}
