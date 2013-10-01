<?php

/*
 * (c) Captain Courier Integration <captain@captaincourier.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CaptainCourier\CaptainBundle\DependencyInjection;

class EntityManagerConfigurator
{
	private $entityManagerRegisterFactory;

	public function __construct($entityManagerRegisterFactory) 
	{
		$this->entityManagerRegisterFactory = $entityManagerRegisterFactory;
	}

	public function configure($entityManager)
	{
		$this->entityManagerRegisterFactory->create($entityManager);
	}

}