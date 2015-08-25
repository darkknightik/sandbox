<?php
namespace Tiplap\Aplication\UI;

use Nette\Bridges\ApplicationLatte\Template;
use Nette\Templating\FileTemplate;
use Tiplap\Templating\Helpers;
use Nette\Utils\Strings;

/**
 * Base control class
 *
 * @author Pecina Ondřej <pecina.ondrej@gmail.com>
 */
abstract class Control extends \Nette\Application\UI\Control
{

	/** @var Helpers */
	protected $helpers;

	/**
	 * @param Helpers $helpers
	 */
	public function __construct(Helpers $helpers)
	{
		$this->helpers = $helpers;
	}

	/**
	 * @param string name of current render method, typically __METHOD__ (containing "ClassName::render")
	 * @return void
	 */
	protected function doRender($renderMethod)
	{
		$template = $this->getTemplate();

		if ($template instanceof FileTemplate) {
			$classFile = $this->getReflection()->getFileName();

			list (, $view) = Strings::match($renderMethod, '~::render(.*)\z~');

			$templateFile = Strings::replace($classFile, '~(?<=/)(.+)\.php\z~i', function ($m) use ($view) {
				return $m[1] . ($view ? ".$view" : '') . '.latte';
			});

			$template->setFile($templateFile);
		}

		$template->render();
	}

	/**
	 * @return Template
	 */
	protected function createTemplate()
	{
		/** @var Template $template */
		$template = parent::createTemplate();

		$template->getLatte()->addFilter('base', callback($this->helpers, 'loader'));

		return $template;
	}
}