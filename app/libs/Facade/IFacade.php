<?php
namespace Tiplap\Facade;


use Nette\Utils\ArrayHash;
use Tiplap\Doctrine\Entities\BaseEntity;
use Tiplap\Exception\RecordNotFoundException;
use Tiplap\Filters\IFilter;

/**
 * Interface IFacade
 * @package Tiplap\Facade
 * @author Pecina Ondřej <pecina.ondrej@gmail.com>
 */
interface IFacade
{
	/**
	 * @param IFilter $filter
	 * @return array
	 */
	public function find(IFilter $filter);

	/**
	 * @param int $id
	 * @return BaseEntity
	 * @throws RecordNotFoundException
	 */
	public function get($id);

	/**
	 * @param ArrayHash $values
	 * @return BaseEntity
	 */
	public function save(ArrayHash $values);

	/**
	 * @param int $id
	 * @return bool
	 */
	public function delete($id);
}