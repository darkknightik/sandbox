<?php

namespace Tiplap\Backend\Sign;


use Nette\Utils\ArrayHash;
use Tiplap\Aplication\UI\Presenter;
use Tiplap\Backend\Controls\Login\ILoginControlFactory;
use Tiplap\Facade\FooFacade;
use Tiplap\Filters\FooFilter;

/**
 * @author Pecina Ondřej <pecina.ondrej@gmail.com>
 */
class DefaultPresenter extends Presenter
{

	/**
	 * @inject
	 * @var ILoginControlFactory
	 */
	private $iLoginControlFactory;

	protected function createComponentLoginForm()
	{
		$form = $this->iLoginControlFactory->create();
		$form->setCallback(function($name, $password) {
			$this->getUser()->login($name, $password);
		});

		return $form;
	}


}