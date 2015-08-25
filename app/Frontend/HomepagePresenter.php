<?php

namespace Tiplap\Frontend;


use Nette\Utils\ArrayHash;
use Tiplap\Aplication\UI\Presenter;
use Tiplap\Facade\FooFacade;
use Tiplap\Filters\FooFilter;

class HomepagePresenter extends Presenter
{
	/**
	 * @inject
	 * @var FooFacade
	 */
	private $fooFacade;

	public function actionDefault() {

		$this->getTemplate()->items = $this->fooFacade->find(new FooFilter(0,10));
	}

	public function handleInsert() {
		$this->fooFacade->save(ArrayHash::from(['fooName' => 'Test insert']));

		$this->redirect('default');
	}
}