<?php

namespace SquareProton\BondBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Definition;

use Bond\Di\FactoryBuilderExtension;
use Bond\Di\Inject;
class FactoryBuilderCompilerPass implements CompilerPassInterface
{

	const TAG = "factory";

	public function process(ContainerBuilder $container)
	{
		$services = $container->findTaggedServiceIds(self::TAG);

		foreach ($services as $serviceName => $tagConfigs) {
			foreach($tagConfigs as $tagConfig) {
				
				$def = $container->getDefinition($serviceName);
			}
		}	
		// $config = [];
		// foreach ($services as $serviceName => $tagConfigs) {
		// 	foreach ($tagConfigs as $tagConfig) {
		// 		if(count($tagConfig) > 1 or (count($tagConfig) == 1 and !isset($tagConfig["definition"]))) {
		// 			throw new \Exception(sprintf("%s tag has the optional parameter 'definition', no other parameters allowed", self::TAG));
		// 		}
		// 		$factoryName = isset($tagConfig["definition"]) ? $tagConfig["definition"] : "{$serviceName}Factory";
		// 		$config[$factoryName] = $serviceName;
		// 	}
		// }

		// $factoryBuilder = new FactoryBuilderExtension();
		// $factoryBuilder->load([$config], $container);
	}

	private function resolveReferences(ContainerBuilder $container, Definition $definition)
	{
		$args = [];
		foreach($definition->getArguments() as $argument) {
			if($argument instanceof Definition) {
				$args[] = $this->resolveReferences($container, $argument);
			} else if($argument instanceof Reference) {
				$args[] = $this->resolveReferences($container, $container->get((string)$argument));
			} 
		}
	}

}