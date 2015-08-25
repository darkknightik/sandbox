<?php

namespace Tiplap;

use Nette;
use Nette\Application\Routers\Route;
use Nette\Application\Routers\RouteList;


/**
 * Router factory.
 *
 * @author Pecina Ondřej <pecina.ondrej@gmail.com>
 * @package Tiplap
 */
class RouterFactory extends Nette\Object
{

	/**
	 * @return \Nette\Application\IRouter
	 */
	public function createRouter()
	{
		$router = new RouteList();

		$router[] = $backendRouter = new RouteList('Backend');
		$backendRouter[] = new Route('admin/[<locale [a-z]{2}>/]<presenter>/<action>', 'Homepage:');

		$router[] = $frontendRouter = new RouteList('Frontend');

		$frontendRouter[] = new Route(
			'[<lang [a-z]{2}>/]<presenter>/<action>',
			array(
				'presenter' => 'Homepage',
				'action' => 'default'
			)
		);

		return $router;
	}
}
