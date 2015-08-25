<?php

namespace Tiplap\Filters;

use Nette\Object;

/**
 * @author Pecina Ondřej <pecina.ondrej@gmail.com>
 */
abstract class BaseFilter extends Object implements IFilter
{
	/**
	 * Populate filter form array
	 *
	 * @param array $data
	 */
	public function __construct(array $data = NULL) {
		if ($data === NULL) {
			return;
		}

		foreach ($data as $key => $value) {
			if (property_exists($this, $key)) {
				$this->$key = $value;
			}
		}
	}
}