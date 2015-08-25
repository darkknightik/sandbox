<?php
namespace Tiplap\Security;


use NajdiDrazby\Domain\Orders\Prices;
use NajdiDrazby\Domain\Users\UserEntity;
use Nette\Object;
use Nette\Security\IIdentity;
use Smartmania\Security\SystemRoles;

/**
 * @author Pecina Ondřej <pecina.ondrej@gmail.com>
 */
class UserHolder extends Object implements IIdentity
{
	/** @var int */
	private $id;
	/** @var string */
	private $email;
	/** @var string */
	private $role;

	public function fill($user) {
//		todo: your stuff
	}

	/**
	 * @return string
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}

	public function getRoles()
	{
		return array($this->role);
	}

	public function isAdmin()
	{
		return $this->role === SystemRoles::ADMIN;
	}
}