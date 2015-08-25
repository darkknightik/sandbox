<?php
namespace Tiplap\Configuration;
use Nette\Object;

/**
 * Configuration holder service
 *
 * @package Tiplap\Configuration
 * @author Pecina Ondřej <pecina.ondrej@gmail.com>
 */
class Configuration extends Object
{
	/** @var array block of configuration */
	private $configuration;

	/**
	 * @param array $configuration
	 */
	public function __construct(array $configuration)
	{
		$this->configuration = $configuration;
	}
}