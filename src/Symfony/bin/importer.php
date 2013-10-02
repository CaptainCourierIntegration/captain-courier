<?php

(@include_once __DIR__ . '/../vendor/autoload.php') || @include_once __DIR__ . '/../../../autoload.php';

require_once __DIR__.'/../app/bootstrap.php.cache';
require_once __DIR__.'/../app/AppKernel.php';

\Symfony\Component\Debug\Debug::enable();
$kernel = new AppKernel('dev', true);
$kernel->boot();

$container = $kernel->getContainer();

$importer = $container->get('databaseImporter');
$importer->build();