<?php

(@include_once __DIR__ . '/../vendor/autoload.php') || @include_once __DIR__ . '/../../../autoload.php';

use Bond\Pg\ConnectionSettings;

$connectionSettings = new ConnectionSettings(
    array(
        'host' => 'localhost',
        'dbname' => 'captain',
        'user' => 'captain',
        'password' => 'captain',
    )
);

$schemaSpyDir = realpath( '/usr/share/schemaspy' );
$outputDir = realpath( __DIR__ . '/../../../docs' ) . '/schemaSpy';
$postgresqlAdapterDir = $schemaSpyDir;

if(!$outputDir) {
    //throw new \Exception("Output dir doesn't exist");
}

// ~/bond/Docs$ java -jar schemaSpy_5.0.0.jar -cp postgresql-9.1-901.jdbc3.jar -t pgsql -host localhost -db bond -u bond -schemas "app" -p password -o ~/ss3
// rmrf( $outputDir );

$command = sprintf(
    'java -jar %s -noads -nologo -cp %s -t pgsql -host %s -db %s -u %s -p %s -schemas %s -o %s',
    escapeshellarg( "{$schemaSpyDir}/schemaSpy_5.0.0.jar" ),
    escapeshellarg( "{$schemaSpyDir}/postgresql-9.2-1002.jdbc3.jar" ),
    escapeshellarg( $connectionSettings->host ),
    escapeshellarg( $connectionSettings->dbname ),
    escapeshellarg( $connectionSettings->user ),
    escapeshellarg( $connectionSettings->password ),
    escapeshellarg( implode( ',', $data['schemas'] ) ),
    escapeshellarg( $outputDir )
);

echo "Executing schema spy with command\n{$command}\n";
exec( $command, $output, $exitCode );
echo "\nOutput index file can be found at\n{$outputDir}/index.html\n";

//exit $exitCode;
//exit return [ "", implode( "\n", $output) , $exitCode ];

/**
 * recursively deletes every folder and file within the directory and the directory itself.
 * same as rm -rf on bash
 * @param type $dir directory to delete
 * @author Joseph
 */
function rmrf($dir) {
    $files = glob( $dir . '*', GLOB_MARK );
    foreach( $files as $file ){
        if( substr( $file, -1 ) == '/' ) {
            rmrf( $file );
        } else {
            unlink( $file );
        }
    }
    if (is_dir($dir)) {
        rmdir( $dir );
    }
}