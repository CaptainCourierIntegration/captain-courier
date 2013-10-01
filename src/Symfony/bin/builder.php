<?php

(@include_once __DIR__ . '/../vendor/autoload.php') || @include_once __DIR__ . '/../../../autoload.php';

use Bond\Database\Exception\DatabaseAlreadyExistsException;

use Bond\Normality;
use Bond\Normality\DatabaseBuilder;
use Bond\Normality\Exception\AssetChangedException;
use Bond\Normality\MatchRelation\Closure;
use Bond\Normality\Options;
use Bond\Pg;
use Bond\Pg\Catalog;
use Bond\Pg\ConnectionSettings;
use Bond\Pg\Resource;
use Bond\Sql\Raw;


// $container = new \Symfony\Component\DependencyInjection\ContainerBuilder();
// $configurator = new \Bond\Di\Configurator($container);
// $configurator->load( __DIR__ . "/../vendor/squareproton/bond/src/Bond/Pg/Tests/Di/ConnectionFactoryConfigurable.yml");
// $container->compile();

$connectionSettings = new ConnectionSettings(
    array(
        'host' => 'localhost',
        'dbname' => 'captain',
        'user' => 'captain',
        'password' => 'captain',
    )
);

createDb( $connectionSettings );
normality( $connectionSettings );

function createDb( ConnectionSettings $settingsDb )
{

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

    $db->query( new Raw("alter database captain set search_path TO captain, common, extension;") );

    $db->resource->terminate();

}

function normality( ConnectionSettings $settingsDb )
{

    // normality build
    $db = new Pg( new Resource( $settingsDb ) );
    $catalog = new Catalog( $db );
    $options = new Options( $catalog, __DIR__ . "/../src" );

    $options->setPath(
        array(
            'entity' => '/CaptainCourier/CaptainBundle/Entity/Normality',
            'entityPlaceholder' => '/CaptainCourier/CaptainBundle/Entity',
            'repository' => '/CaptainCourier/CaptainBundle/Repository/Normality',
            'repositoryPlaceholder' => '/CaptainCourier/CaptainBundle/Repository',
            'register' => '/CaptainCourier/CaptainBundle/Register',
            'log' => '/CaptainCourier/CaptainBundle/Logs',
            'backup' => '/CaptainCourier/CaptainBundle/Backups',
            'entityFileStore' => '/CaptainCourier/CaptainBundle/EntityFileStore',
        )
    );

    $options->prepareOptions = Options::BACKUP;
    $options->regenerateEntityPlaceholders = true;
    $options->regenerateRepositoryPlaceholders = true;

    $options->matches[] = new Closure(
        function($relation){
            return true;
//            return in_array( $relation->schema, [ 'unit', 'logs', 'common' ] );
        }
    );

    $normality = new Normality($options);

    $built = $normality->build();

    $db->resource->terminate();

}