<?php
namespace Tiplap\Doctrine\Tools;

use Nette\Utils\ArrayHash;
use Tiplap\Doctrine\Entities\BaseEntity;
use Tiplap\Doctrine\Entities\IdentifiedEntity;
use Nette\Application\UI\Form;
use Nette\ComponentModel\Component;
use Nette\Object;

/**
 * @author Pecina Ondřej <pecina.ondrej@gmail.com>
 */
class FormEntityMapper extends Object
{
	const DATE_TIME_FORMAT = 'dd.mm.YY H:i:s';

	/**
	 * @param BaseEntity $entity
	 * @param Form $form
	 */
	public function setEntityToForm(BaseEntity &$entity, Form &$form) {
		/** @var BaseControl $control */
		foreach($form->getComponents() as $control) {

			/** @noinspection PhpParamsInspection */
			$value = $this->getEntityValue($entity, $control);

			if(!$value) {
				continue;
			}
			// do base
			$this->mapValueToForm($value, $control);
		}
	}

	/**
	 * Dynamically map values to entity - for plain values
	 * @param ArrayHash $values
	 * @param BaseEntity $entity
	 * @param array $columns
	 * @return BaseEntity $entity
	 */
	public function setValuesToEntity(ArrayHash $values, BaseEntity &$entity, array $columns) {
		foreach($columns as $column) {
			$setterName = 'set' . ucfirst($column);
			if(method_exists($entity, $setterName) && isset($values->$column)) {
				$entity->$setterName($values->$column);
			}
		}

		return $entity;
	}

	/**
	 * @param BaseEntity $entity
	 * @param Component $control
	 * @return NULL|string
	 */
	protected function getEntityValue(BaseEntity $entity, Component $control) {
		$getterName = ['get' . ucfirst($control->getName()), 'is' . ucfirst($control->getName())];

		$value = NULL;
		foreach ($getterName as $getter) {
			if(method_exists($entity, $getter) && $value === NULL) {
				$value = $entity->$getter();
			}
		}

		return $value;
	}

	/**
	 * @param $value
	 * @param Component $control
	 */
	protected function mapValueToForm($value, Component &$control) {
		$defaultValue = $value;

		if(is_object($value)) {
			if($value instanceof \Tiplap\Doctrine\Entities\IdentifiedEntity) {
				$control->setValue($value->getId());
				return;
			}
			else if(get_class($value) === 'Doctrine\ORM\PersistentCollection')
			{
				$defaultValue = array();
				/** @var IdentifiedEntity $entity */
				foreach($value->getValues() as $entity) {
					$defaultValue[] = $entity->getId();
				}
			}
		}

		if($defaultValue !== NULL) {
			$control->setDefaultValue($defaultValue);
		}
	}
}