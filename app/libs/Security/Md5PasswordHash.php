<?php
namespace Tiplap\Security;

use Nette\Object;

/**
 * @author Pecina Ondřej <pecina.ondrej@gmail.com>
 */
class Md5PasswordHash extends Object
{
	const SALT = "15155155-8788asfa";

	/**
	 * @param string $hash
	 * @return string
	 */
	public function hashPassword($hash) {
		return md5($hash . self::SALT);
	}
}