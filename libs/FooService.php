<?php

class FooService extends \Nette\Object
{

	public function setBar($bar)
	{
		\Nette\Diagnostics\Debugger::barDump($bar);
	}

}
