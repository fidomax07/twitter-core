<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLikesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('likes', function (Blueprint $table) {
			$table->id();
			$table->bigInteger('user_id')->unsigned()->index();
			$table->bigInteger('tweet_id')->unsigned()->index();
			$table->timestamps();

			$table->foreign('user_id')
				->references('id')->on('users')
				->onDelete('cascade');
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
		Schema::dropIfExists('likes');
	}
}
