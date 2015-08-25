<?php
namespace Tiplap\Security;


final class SystemRoles {

	// only static Calling
	/** @noinspection PhpUnusedPrivateMethodInspection */
	private function SystemRoles(){}
	private function __construct(){}

	/** Admin role */
	const ADMIN = 'admin';

	/** Guest role */
	const GUEST = 'guest';
}