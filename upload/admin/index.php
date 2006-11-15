<?php

define('MYPANEL', 1);

require_once 'init.php';
require_once 'lib/form.han.php';
require_once 'lib/table.han.php';
require_once 'lib/tab.han.php';

$MyTopix = new MyTopix ( '../' );

ob_start();

$MyTopix->initialize();

ob_end_flush();

?>