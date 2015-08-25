<?php
namespace Tiplap\Security\Authenticators;

use Nette\Security\AuthenticationException;
use Nette\Security\IAuthenticator;
use Tiplap\Security\Md5PasswordHash;
use Tiplap\Security\UserHolder;

/**
 * Login users into admin
 *
 * @author Pecina Ondřej <pecina.ondrej@gmail.com>
 */
class BackendAuthenticator implements IAuthenticator
{

	/**
	 * @inject
	 * @var Md5PasswordHash
	 */
	private $passwordHash;

	public function authenticate(array $credentials)
	{
		list ($username, $password) = $credentials;
		// todo: your stuff
		$user = $this->usersFacade->findUserByEmail($username);

		if (empty($user)) {
			throw new AuthenticationException('Lituji, ale zadaná kombinace hesla a přihlašovacího jména neexistuje!');
		}

		if ($user->getPassword() !== $this->passwordHash->hashPassword($password)) {
			throw new AuthenticationException('Lituji, ale zadaná kombinace hesla a přihlašovacího jména neexistuje!');
		}

		if (!$user->isAdmin()) {
			throw new AuthenticationException('Lituji, ale zadaná kombinace hesla a přihlašovacího jména neexistuje!');
		}

		$userH =  new UserHolder();
		$userH->fill($user);
		return $userH;
	}
}