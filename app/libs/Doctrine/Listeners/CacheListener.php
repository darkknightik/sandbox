<?php
namespace Tiplap\Doctrine\Listeners;


use Doctrine\ORM\Event\OnFlushEventArgs;
use Kdyby\Events\Subscriber;
use Tiplap\Cache\CacheManager;
use Nette\Object;
use Tiplap\Doctrine\Entities\BaseEntity;

/**
 * Listener for clearing Cache, when entity has been changed
 * @author Pecina Ondřej <pecina.ondrej@gmail.com>
 */
class CacheListener extends Object implements Subscriber
{
	/**
	 * @inject
	 * @var CacheManager
	 */
	private $cacheManager;

	/**
	 * Doctrine on flush event
	 *
	 * @param OnFlushEventArgs $args
	 */
	public function onFlush(OnFlushEventArgs $args) {

	}

	/**
	 * Process entity depend on Entity type
	 * @param BaseEntity $entity
	 */
	private function processEntity(BaseEntity $entity) {
		// TODO: Invalid cache
	}

	/**
	 * Subscribe cache onFlush listener
	 * @return array
	 */
	public function getSubscribedEvents()
	{
		return array(
			'onFlush'
		);
	}
}