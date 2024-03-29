<?php

namespace App\Http\Resources;

use App\TweetMedia;
use Illuminate\Http\Resources\Json\JsonResource;

class TweetMediaResource extends JsonResource
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
			'id' => $this->id
		];
	}
}
