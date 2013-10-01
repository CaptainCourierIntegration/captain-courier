<?php

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