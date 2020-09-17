<?php

namespace App\Tweets\Entities;

class EntityExtractor
{
	protected $string;

	const HASHTAG_REGEX = '/(?!\s)#([A-Za-z]\w*)\b/';

	const MENTION_REGEX = '/(?=[^\w!])@(\w+)\b/';

	/**
	 * @param [type] $string
	 */
	public function __construct($string)
	{
		$this->string = $string;
	}

	/**
	 * @return array
	 */
	public function getHashtagEntities()
	{
		return $this->buildEntityCollection(
			$this->match(self::HASHTAG_REGEX),
			EntityType::HASHTAG
		);
	}

	/**
	 * @return array
	 */
	public function getMentionEntities()
	{
		return $this->buildEntityCollection(
			$this->match(self::MENTION_REGEX),
			EntityType::MENTION
		);
	}

	/**
	 * @return array
	 */
	public function getAllEntities()
	{
		return array_merge(
			$this->getHashtagEntities(),
			$this->getMentionEntities()
		);
	}

	/**
	 * @param [type] $entities
	 * @param [type] $type
	 * @return array
	 */
	protected function buildEntityCollection($entities, $type)
	{
		return array_map(function ($entity, $index) use ($entities, $type) {
			return [
				'body' => $entity[0],
				'body_plain' => $entities[1][$index][0],
				'start' => $start = $entity[1],
				'end' => $start + strlen($entity[0]),
				'type' => $type
			];
		}, $entities[0], array_keys($entities[0]));
	}

	/**
	 * @param [type] $pattern
	 * @return string[][]|mixed
	 */
	protected function match($pattern)
	{
		preg_match_all($pattern, $this->string, $matches, PREG_OFFSET_CAPTURE);

		return $matches;
	}
}