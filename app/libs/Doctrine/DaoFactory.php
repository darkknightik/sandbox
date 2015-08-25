<?php
namespace Tiplap\Doctrine;


use Kdyby\Doctrine\EntityManager;
use Nette\Object;

class DaoFactory extends Object
{
	/**
	 * @param $entityName
	 * @param EntityManager $entityManager
	 * @return \Kdyby\Doctrine\EntityDao
	 */
	public static function create($entityName, EntityManager $entityManager)
	{
		return $entityManager->getDao($entityName);
	}
}