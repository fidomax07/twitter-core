<?php

namespace App\Http\Resources;

use App\TweetMedia;
use Illuminate\Http\Resources\Json\JsonResource;

class MediaResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return array
	 */
	public function toArray($request)
	{
		/** @var TweetMedia $this */
		return [
			'url' => $this->baseMedia->getFullUrl(),
			'type' => $this->baseMedia->type(),
		];
	}
}
