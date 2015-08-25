<?php
namespace Tiplap\Backend\Controls\Login;


interface ILoginControlFactory
{
	/**
	 * @return LoginControl
	 */
	public function create();
}