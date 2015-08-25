<?php
namespace Tiplap\Aplication\UI;

use Nette\Bridges\ApplicationLatte\Template;
use Tiplap\Exception\InvalidStateException;
use Tiplap\Templating\Helpers;

/**
 * Base presenter
 * @author Pecina Ondřej <pecina.ondrej@gmail.com>
 */
abstract class Presenter extends \Nette\Application\UI\Presenter
{
	/**
	 * @inject
	 * @var \Tiplap\Configuration\Configuration
	 */
	protected  $configuration;

	/**
	 * @inject
	 * @var Helpers
	 */
	protected $helpers;

	/**
	 * @return Template
	 * @throws InvalidStateException
	 */
	protected function createTemplate()
	{
		/** @var Template $template */
		$template = parent::createTemplate();

		if($this->helpers === NULL) {
			throw new InvalidStateException('Please register presenter in config as Service, for autowiring dependencies!, ' . $this->getReflection()->getName());
		}

		$template->getLatte()->addFilter('base', callback($this->helpers, 'loader'));

		return $template;
	}

	/**
	 * Check permissions for action
	 * @param $element
	 */
	public function checkRequirements($element)
	{
		parent::checkRequirements($element);

		$permission = (array)$element->getAnnotation('permission');

		if ($permission) {
			if (count($permission) === 1) {
				$resource = $permission[0];
				$privilege = Permission::ALL;
			} else {
				list($resource, $privilege) = array_values($permission);
			}

			if (!$this->getUser()->isAllowed($resource, $privilege)) {
				$this->redirectToHomepage($this->translate("admin.permission.error"), 'error');
			}
		}
	}
} 