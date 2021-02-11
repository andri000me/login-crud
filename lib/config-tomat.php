<?php
ini_set( "display_errors", true );
define( "DB_DSN", "mysql:host=localhost;dbname=tokomate_rial" );
define( "DB_USERNAME", "tokomate_rial" );
define( "DB_PASSWORD", "12qwaszx" );
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
