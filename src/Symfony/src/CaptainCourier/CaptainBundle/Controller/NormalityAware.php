<?php

namespace CaptainCourier\CaptainBundle\Controller;

trait NormalityAware
{

	private $entityManager;
	private $database;

	private function persist($type, $entity) 
	{
		if(is_array($entity)) {
			$entity = $this->entityManager[$type]->make($entity);
		}
		$this->entityManager->recordManager->persist($entity);
		$this->entityManager->recordManager->flush();
		return $entity;
	}

	public function setEntityManager($entityManager) 
	{
		$this->entityManager = $entityManager;
	}

	public function setDatabase($database)
	{
		$this->database = $database;
	}

}