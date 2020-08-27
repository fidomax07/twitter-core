<?php

namespace App\Http\Controllers\Api\Media;

use App\TweetMedia;
use App\Http\Controllers\Controller;
use App\Http\Resources\TweetMediaCollection;
use App\Http\Requests\Media\MediaStoreRequest;

class MediaController extends Controller
{
	/**
	 * Undocumented function
	 */
	public function __construct()
	{
		// $this->middleware(['auth:sanctum']);
	}

	/**
	 * Undocumented function
	 *
	 * @param MediaStoreRequest $request
	 * @return TweetMediaCollection
	 */
	public function store(MediaStoreRequest $request)
	{
		$result = collect($request->media)->map(function ($media) {
			return $this->addMedia($media);
		});

		return new TweetMediaCollection($result);
	}

	/**
	 * Undocumented function
	 *
	 * @param  $media
	 * @return TweetMedia|\Illuminate\Database\Eloquent\Model
	 * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\DiskDoesNotExist
	 * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileDoesNotExist
	 * @throws \Spatie\MediaLibrary\Exceptions\FileCannotBeAdded\FileIsTooBig
	 */
	protected function addMedia($media)
	{
		$tweetMedia = TweetMedia::create([]);

		$tweetMedia->baseMedia()
			->associate($tweetMedia->addMedia($media)->toMediaCollection())
			->save();

		return $tweetMedia;
	}
}
