<?php
namespace Tiplap\Backend\Controls\Login;
use Nette\Application\UI\Form;

/**
 *
 * @author Pecina Ondřej <pecina.ondrej@gmail.com>
 */
class LoginControl extends \Tiplap\Aplication\UI\Control
{


	/**
	 * @var callable
	 */
	public $callback;

	public function render()
	{
		$this->doRender(__METHOD__);
	}

	protected function createComponentLoginForm()
	{
		$form = new Form();

		$form->addText('username', 'Emailová adresa')
			->setRequired('Email je povinný');

		$form->addPassword('password', 'Heslo')
			->setRequired('Heslo je povinné');

		$control = $this;
		$form->onSuccess[] = function(Form $form) use($control) {
			if ($control->callback !== NULL) {
				$values = $form->getValues();
				$control->callback($values->username, $values->password);
			}
		};

		$form->addSubmit('sub');
		return $form;
	}

	/**
	 * @param callable $callback
	 * @return LoginControl
	 */
	public function setCallback($callback)
	{
		$this->callback = $callback;
		return $this;
	}
}