<?php

namespace SquareProton\BondBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Bond\Di\FactoryBuilderExtension;

use SquareProton\BondBundle\DependencyInjection\FactoryBuilderCompilerPass;

class SquareProtonBondBundle extends Bundle
{
	public function build(ContainerBuilder $container)
	{
//        $factoryBuilderExtension = new FactoryBuilderExtension();
//        $container->registerExtension($factoryBuilderExtension);

		$container->addCompilerPass(new FactoryBuilderCompilerPass());
	}
}
