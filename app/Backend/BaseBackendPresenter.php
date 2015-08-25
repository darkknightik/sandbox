<?php

namespace Tiplap\Backend;


use Nette\Utils\ArrayHash;
use Tiplap\Aplication\UI\Presenter;
use Tiplap\Facade\FooFacade;
use Tiplap\Filters\FooFilter;

/**
 * @author Pecina Ondřej <pecina.ondrej@gmail.com>
 */
abstract class BaseBackendPresenter extends Presenter
{
	protected function startup()
	{
		if (!$this->getUser()->isLoggedIn()) {
			$this->redirect(':Backend:Sign:Default:');
			return;
		}

		parent::startup();
	}

}