<?php

(@include_once __DIR__ . '/../vendor/autoload.php') || @include_once __DIR__ . '/../../../autoload.php';

use Bond\Database\Exception\DatabaseAlreadyExistsException;
use Bond\Normality\DatabaseBuilder;
use Bond\Normality\Exception\AssetChangedException;
use Bond\Pg;
use Bond\Pg\Resource;

$container = new \Symfony\Component\DependencyInjection\ContainerBuilder();
$configurator = new \Bond\Di\Configurator($container);
$configurator->load( __DIR__ . "/../vendor/squareproton/bond/src/Bond/Pg/Tests/Di/ConnectionFactoryConfigurable.yml");
$container->compile();

$settingsDb = $container->get('connectionSettingsRW');

print_r( $settingsDb );

$databaseBuilder = new DatabaseBuilder();
try {
    $settingsDb = $databaseBuilder->create( $settingsDb, '-' );
} catch ( DatabaseAlreadyExistsException $e ) {
    $databaseBuilder->emptyDb( $settingsDb );
}

// make a connection to the new database
$db = new Pg( new Resource( $settingsDb ) );

try {
    $assets = $databaseBuilder->getSqlAssetsFromDirs(
        $db,
        [
            __DIR__ . "/../../../res/database",
            __DIR__ . "/../vendor/squareproton/bond/database/assets"
        ],
        $assetsResolved
    );
    $databaseBuilder->resolveByDirs(
        [
            __DIR__ . "/../../../res/database",
//            __DIR__ . "/../vendor/squareproton/bond/database/assets"
        ],
        $assets,
        $assetsResolved
    );
    // cleanup
} catch ( AssetChangedException $e ) {
    // work around a phpunit bug with serialization
    // don't get me wrong - this is totally stupid and is a duplication of work
    // https://github.com/sebastianbergmann/phpunit/issues/451
    $newException = new \Exception( $e->getMessage() );
    $db->resource->terminate();
    throw $newException;
}

$db->resource->terminate();