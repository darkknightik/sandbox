<?php

namespace Tiplap\Doctrine\Entities;

use Doctrine\ORM\Mapping as ORM;
use Kdyby;
use Nette;

/**
 * @author Ondrej Pecina
 *
 * @property-read int $id
 */
abstract class IdentifiedEntity extends BaseEntity
{

	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer", options={"unsigned"=true})
	 * @ORM\GeneratedValue
	 * @var int
	 */
	protected  $id;

	/**
	 * @return int
	 */
	final public function getId()
	{
		return $this->id;
	}

	public function __clone()
	{
		$this->id = NULL;
	}
}