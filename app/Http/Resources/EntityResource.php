<?php

namespace App\Http\Resources;

use App\Entity;
use Illuminate\Http\Resources\Json\JsonResource;

class EntityResource extends JsonResource
{
	/**
	 * Transform the resource into an array.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @return array
	 */
	public function toArray($request)
	{
		/** @var Entity $this */
		return [
			'type' => $this->type,
			'body' => $this->body,
			'start' => $this->start,
			'end' => $this->end,
		];
	}
}
