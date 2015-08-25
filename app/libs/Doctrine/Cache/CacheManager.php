<?php

namespace Tiplap\Cache;

use Nette\Caching\Cache;
use Nette\Object;

/**
 * Cache manager, cache and clean entities
 * @author Pecina Ondřej <pecina.ondrej@gmail.com>
 */
class CacheManager extends Object
{
	/**
	 * @inject
	 * @var Cache
	 */
	private $cache;


	/**
	 * Save data into cache
	 *
	 * @param string $key
	 * @param mixed $callback
	 * @param array|NULL $params
	 * @return mixed|NULL
	 */
	public function storeValue($key, $callback, array $params = NULL)
	{
		// load from cache
		$savedData = $this->cache->load($key);
		if (!empty($savedData)) {
			return $savedData;
		}

		return $this->cache->save($key, $callback, $params);
	}
}