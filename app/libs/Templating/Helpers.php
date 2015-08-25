<?php

namespace Tiplap\Templating;

use Tiplap\Domain\Images\ImageEntity;
use Nette\Application\Application;
use Nette\Object;

/**
 * Template helpers
 *
 * @author Pecina Ondřej <pecina.ondrej@gmail.com>
 */
class Helpers extends Object
{
	/**
	 * @param string $helper
	 * @return \Nette\Callback
	 */
	public function loader($helper)
	{
		if (method_exists($this, $helper)) {
			return callback($this, $helper);
		}
	}
}