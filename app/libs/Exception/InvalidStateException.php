<?php
namespace Tiplap\Exception;

/**
 * @author Pecina Ondřej <pecina.ondrej@gmail.com>
 */
class InvalidStateException extends TiplapException
{
	/**
	 * @param string $message
	 */
	public function __construct($message)
	{
		parent::__construct($message, 500);
	}
} 