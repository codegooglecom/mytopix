<?php

/**
* This file is merely an example of how easy it is to 
* integrate MyTopix into virtually any other web-based
* application.
*
* Essentially, all that needs to be done is take the few 
* lines of code below and place them within a new file in
* a seperate location or paste them within an existing app.
*
* Then merely enter the correct path value for $path and that
* 'should' be it. Depending on your server and third party
* application it may take a little more work to integrate, but
* for the most part you shouldn't have any trouble at all.
*
* @license http://www.jaia-interactive.com/licenses/mytopix/
* @version $Id: index.php murdochd Exp $
* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
* @company Jaia Interactive http://www.jaia-interactive.com/
* @package MyTopix | Personal Message Board
*/

/**
 * Enter the direct path to the root directory of your MyTopix 
 * installation within the parenthesis below:
 **/

$path = './';

require_once $path . 'init.php';

$MyTopix = new MyTopix($path);

/**
 * We use output buffering below ( ob_start, ob_end_flush ) to
 * allow the setting of cookies AFTER headers have already been
 * sent to the current viewer's browser:
 **/

ob_start();

echo $MyTopix->initialize();

ob_end_flush();

?>