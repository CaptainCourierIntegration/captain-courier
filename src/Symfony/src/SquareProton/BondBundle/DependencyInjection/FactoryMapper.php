<?php

namespace SquareProton\BondBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Definition;
use Bond\Di\Inject;

class FactoryMapper
{
	const TYPE_CONSTRUCTOR = "constructor";
	const TYPE_CALL = "call";
	const TYPE_PROPERTY = "property";

	public function __construct(Definition $definition) {
		$args = [];

		for ($i = 0; $i < count($definition->getArguments()); $i++) {
			$args[] = $this->makeConstructorArg($i, $definition->getArguments()[$i]);
		}

		foreach ($definition->getMethodCalls() as $method => $arguments) {
			for ($i = 0; $i < count($arguments); $i++) {
				$args[] = $this->makeCallArg($method, $i, $arguments[$i]);
			}
		}

		foreach ($definition->getProperties() as $property => $value) {
			$args[] = $this->makePropertyArg($property, $value);
		}

		$this->args = $args;

	}


	private function makeConstructorArg($constructorIndex, $value) {
		return [
			"type" => self::TYPE_CONSTRUCTOR, 
			"value" => $value,
			"constructorIndex" => $constructorIndex
		];
	}

	private function makeCallArg($methodName, $methodArgumentsIndex, $value) {
		return [
			"type" => self::TYPE_CALL,
			"method" => $methodName,
			"methodIndex" => $methodArgumentsIndex,
			"value" => $value
		];
	}

	private function makePropertyArg($propertyName, $value) {
		return [
			"type" => self::TYPE_PROPERTY,
			"property" => $propertyName,
			"value" => $value
		];
	}


}