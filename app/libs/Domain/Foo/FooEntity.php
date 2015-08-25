<?php
namespace Tiplap\Domain\Foo;

use Doctrine\ORM\Mapping as ORM;
use Tiplap\Doctrine\Entities\IdentifiedEntity;


/**
 * User Entity
 *
 * @ORM\Entity(repositoryClass="FooDao")
 * @ORM\Table(name="tp_foo", indexes={
 * })
 * @author Pecina Ondřej <pecina.ondrej@gmail.com>
 */
class FooEntity extends IdentifiedEntity
{
	/**
	 * @ORM\Column(name="foo_name", type="text", nullable=true)
	 * @var string
	 */
	protected $fooName;

	/**
	 * @return string
	 */
	public function getFooName()
	{
		return $this->fooName;
	}

	/**
	 * @param string $fooName
	 * @return FooEntity
	 */
	public function setFooName($fooName)
	{
		$this->fooName = $fooName;
		return $this;
	}
}