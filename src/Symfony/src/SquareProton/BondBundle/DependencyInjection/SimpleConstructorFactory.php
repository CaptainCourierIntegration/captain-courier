<?php

namespace SquareProton\BondBundle\DependencyInjection;

use Bond\Di\Factory;
use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\DependencyInjection\Reference;
use Bond\Di\Inject;

/**
 * will only inject constructor args
 */
class SimpleConstructorFactory extends ContainerAware implements Factory
{
	private $classReflector;
	private $arguments;

	public function __construct($className, array $arguments = array())
	{
		$this->reflector = new \ReflectionClass($className);
		$this->arguments = $arguments;
	}

	public function create()
	{
		$createArgs = func_get_args();
		$constructorArgs = [];

		foreach($this->arguments as $templateArgument) {
			if ($templateArgument instanceof Inject) {
				$constructorArgs[] = array_shift($createArgs);
			} elseif($templateArgument instanceof Reference) {
				$constructorArgs[] = $this->container->get((string)$templateArgument);
			} else {
				$constructorArgs[] = $templateArgument;
			}
		}

		return $this->reflector->newInstanceArgs($constructorArgs);
	}

}