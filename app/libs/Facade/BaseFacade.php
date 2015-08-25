<?php

namespace Tiplap\Facade;
use Kdyby\Doctrine\EntityManager;
use Tiplap\Doctrine\Entities\BaseEntity;
use Tiplap\Doctrine\Tools\FormEntityMapper;

/**
 * Abstract Facade layer
 *
 * @package Tiplap\Facade
 * @author Pecina Ondřej <pecina.ondrej@gmail.com>
 */
abstract class BaseFacade implements IFacade
{
	/**
	 * @inject
	 * @var EntityManager
	 */
	protected $entityManager;

	/**
	 * @inject
	 * @var FormEntityMapper
	 */
	protected $formEntityMapper;

	/**
	 * Remove entity from DB
	 *
	 * @param BaseEntity $baseEntity
	 * @throws \Exception
	 */
	protected function removeEntity(BaseEntity $baseEntity)
	{
		$this->entityManager->remove($baseEntity);
		$this->entityManager->flush();
	}

	/**
	 * Save entity into DB
	 *
	 * @param BaseEntity $baseEntity
	 * @return BaseEntity
	 * @throws \Exception
	 */
	protected function saveEntity(BaseEntity $baseEntity)
	{
		$this->entityManager->persist($baseEntity);
		$this->entityManager->flush();

		return $baseEntity;
	}
}