<?php

define ( 'MYPANEL', 1 );

require_once 'init.php';
require_once 'lib/form.han.php';
require_once 'lib/table.han.php';

ob_start ();

$mytopix = new MyTopix ( '../' );
$mytopix->initialize ();

ob_end_flush();

?>