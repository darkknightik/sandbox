<?php

namespace Tiplap\Facade;
use Nette\Utils\ArrayHash;
use Tiplap\Doctrine\Entities\BaseEntity;
use Tiplap\Doctrine\ORM\Tools\Pagination\PaginatorFixed;
use Tiplap\Domain\Foo\FooDao;
use Tiplap\Domain\Foo\FooEntity;
use Tiplap\Exception\RecordNotFoundException;
use Tiplap\Filters\FooFilter;
use Tiplap\Filters\IFilter;


/**
 * @author Pecina Ondřej <pecina.ondrej@gmail.com>
 */
class FooFacade extends BaseFacade
{

	/**
	 * @inject
	 * @var FooDao
	 */
	private $fooDao;

	/**
	 * @param FooFilter $filter
	 * @return array
	 */
	public function find(IFilter $filter)
	{
		/** @var FooFilter $filter */
		$pf =  new PaginatorFixed($this->fooDao->createQueryBuilder('i'));

		return $pf->getQuery()
			->setMaxResults($filter->getLimit())
			->setFirstResult($filter->getOffset())
			->getResult();
	}

	/**
	 * @param int $id
	 * @return FooEntity
	 * @throws RecordNotFoundException
	 */
	public function get($id)
	{
		return $this->fooDao->find((int) $id);
	}

	/**
	 * @param ArrayHash $values
	 * @return BaseEntity
	 */
	public function save(ArrayHash $values)
	{
		$fooEntity = new FooEntity();

		if (isset($values->id) && !empty($values->id)) {
			$fooEntity = $this->get($values->id);
		}

		$fooEntity = $this->formEntityMapper->setValuesToEntity($values, $fooEntity, ['fooName']);

		return $this->saveEntity($fooEntity);
	}

	/**
	 * @param int $id
	 * @return bool
	 */
	public function delete($id)
	{
		$this->removeEntity($this->get($id));
		return $this->get($id) === NULL;
	}
}