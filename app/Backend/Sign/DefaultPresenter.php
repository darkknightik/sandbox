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
		$presenter = $this;
		$form = $this->iLoginControlFactory->create();
		$form->setCallback(function($name, $password) use ($presenter) {
			$presenter->getUser()->login($name, $password);
			if ($presenter->getUser()->isLoggedIn()) {
				$presenter->redirect(':Backend:Homepage:');
			}
		});

		return $form;
	}


}