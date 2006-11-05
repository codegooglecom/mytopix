<?php

ini_set("arg_separator.output", "&amp;");
ini_set("magic_quotes_runtime", 0);

/**
* System Initialization Class
*
* This class handles all the work behind actually
* getting the system started. Nothing to it other than
* the fact that it retrieves the necessary files, starts the
* error handling system and initiates a chosen module.
*
* @license http://www.jaia-interactive.com/licenses/mytopix/
* @version $Id: ini.php murdochd Exp $
* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
* @company Jaia Interactive http://www.jaia-interactive.com/
* @package MyTopix | Personal Message Board
*/
class MyTopix
{
   /**
	* System path used for file manipulation.
	* @access Private
	* @var String
	*/
	var $_path;

   /**
	* The event handler object.
	* @access Public
	* @var Object
	*/
	var $EventHandler;

   // ! Constructor Method

   /**
	* Instansiates class and defines instance variables.
	*
	* @param String  $path System path used for file manipulation.
	* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
	* @since v 1.2.3
	* @access Private
	* @return Void
	*/
	function MyTopix($path = './')
	{
		$this->_path = $path;

		$this->EventHandler = null;
	}

   // ! Action Method

   /**
	* Initializes the system! Omg WOW!
	*
	* @param none
	* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
	* @since v 1.2.3
	* @access Public
	* @return String
	*/
	function initialize()
	{
		define('SYSTEM_PATH', $this->_path);
		define('SYSTEM_ACP',  false);

		require_once SYSTEM_PATH . 'config/settings.php';
		require_once SYSTEM_PATH . 'config/constants.php';
		require_once SYSTEM_PATH . 'lib/error.han.php';

		error_reporting(E_PARSE);

		if(function_exists('set_error_handler') &&
		   str_replace('.', '', PHP_VERSION) < 500)
		{
			error_reporting(E_ALL);
			set_error_handler('error');
		}

		session_start();

		require_once SYSTEM_PATH . 'lib/master.han.php';
		require_once SYSTEM_PATH . 'lib/time.han.php';
		require_once SYSTEM_PATH . 'lib/db/database.db.php';
		require_once SYSTEM_PATH . "lib/db/{$config['db_type']}.db.php";
		require_once SYSTEM_PATH . 'lib/cookie.han.php';
		require_once SYSTEM_PATH . 'lib/http.han.php';
		require_once SYSTEM_PATH . 'lib/language.han.php';
		require_once SYSTEM_PATH . 'lib/template.han.php';
		require_once SYSTEM_PATH . 'lib/user.han.php';
		require_once SYSTEM_PATH . 'lib/parse.han.php';
		require_once SYSTEM_PATH . 'lib/forum.han.php';
		require_once SYSTEM_PATH . 'lib/cache.han.php';
		require_once SYSTEM_PATH . 'lib/event.han.php';

		$_GET  = HttpHandler::checkVars($_GET);
		$_POST = HttpHandler::checkVars($_POST);

		if(isset($_GET['debug']))
		{
			define('DEBUG', true);
		}
		else {
			define('DEBUG', false);
		}

		$this->EventHandler = new EventHandler($this->_setEvent(), $config);

		return $this->EventHandler->doEvent();
	}

   // ! Mutator Method

   /**
	* The brains behind the SEF feature; it modifies the
	* appropriate $_GET values to 'trick' the system into
	* loading a requested piece of data.
	*
	* @param none
	* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
	* @since v 1.2.3
	* @access Private
	* @return String
	*/
	function _setEvent()
	{
		if(false == isset($_GET['a']))
		{
			$_GET['a'] = 'main';
		}

		if(isset($_GET['getforum']))
		{
			$_GET['a']	 = 'topics';
			$_GET['forum'] = (int) $_GET['getforum'];
		}

		if(isset($_GET['getuser']))
		{
			$_GET['a']   = 'profile';
			$_GET['uid'] = (int) $_GET['getuser'];
		}

		if(isset($_GET['gettopic']))
		{
			$_GET['a'] = 'read';
			$_GET['t'] = (int) $_GET['gettopic'];
		}

		if(isset($_GET['getevent']))
		{
			$_GET['a']	= 'calendar';
			$_GET['CODE'] = '01';
			$_GET['id']   = (int) $_GET['getevent'];
		}

		return $_GET['a'];
	}
}

?>