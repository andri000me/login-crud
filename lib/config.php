<?php
ini_set( "display_errors", true );
define( "DB_DSN", "mysql:host=localhost;dbname=k1090803_morilloroom" );
define( "DB_USERNAME", "k1090803_morilloroom" );
define( "DB_PASSWORD", "!@#123QWEasdzxc" );
define('DB_CHARACSET', 'utf8');

require_once ('Database.php');
require_once ('DTable.php');

$db=new Database();
$datatable=New Dtable();

function handleException( $exception ) {
  echo  $exception->getMessage();
}

set_exception_handler( 'handleException' );
?>
