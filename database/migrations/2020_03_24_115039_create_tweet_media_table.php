<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTweetMediaTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tweet_media', function (Blueprint $table) {
			$table->id();
			$table->bigInteger('tweet_id')->unsigned()->index()->nullable();
			$table->bigInteger('media_id')->unsigned()->index()->nullable();
			$table->timestamps();

			$table->foreign('tweet_id')
				->references('id')->on('tweets')
				->onDelete('cascade');
			$table->foreign('media_id')
				->references('id')->on('media')
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
		Schema::dropIfExists('tweet_media');
	}
}
