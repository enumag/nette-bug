<?php

class FooExtension extends Nette\DI\CompilerExtension
{

	private $defaults = array(
		'bar' => TRUE,
	);

	public function loadConfiguration()
	{
		$builder = $this->getContainerBuilder();
		$config = $this->getConfig($this->defaults);

		$builder->addDefinition('fooService')
			->setClass('FooService')
			//->addSetup('setBar', array($config['bar'])); // OK
			->addSetup('setBar', $config['bar']); // buggy
	}

	public function afterCompile(Nette\PhpGenerator\ClassType $class)
	{
		$initialize = $class->methods['initialize'];
		$initialize->addBody('$this->getByType("FooService");');
	}

}
