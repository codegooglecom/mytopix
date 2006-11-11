<?php

error_reporting(0);

ini_set("arg_separator.output", "&amp;");
ini_set("magic_quotes_runtime", 0);

session_start();

/**
* Class Name
*
* Description
*
* @version $Id: filename murdochd Exp $
* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
* @company Jaia Interactive <admin@jaia-interactive.com>
* @package MyTopix Personal Message Board
*/
class MyTopix
{

   /**
	* Variable Description
	* @access Private
	* @var Integer
	*/
	var $_path;

   // ! Action Method

   /**
	* Comment
	*
	* @param String $string Description
	* @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
	* @since v1.0
	* @return String
	*/
	function MyTopix($path)
	{
		$this->_path = $path;
	}

	
   // ! Action Method

   /**
	* Comment
	*
	* @param String $string Description
	* @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
	* @since v1.0
	* @return String
	*/
	function initialize()
	{
		define('SYSTEM_PATH', $this->_path);
		define('SYSTEM_ACP',  true);

		require_once SYSTEM_PATH . 'config/db_config.php';
		require_once SYSTEM_PATH . 'config/settings.php';
		require_once SYSTEM_PATH . 'config/constants.php';
		require_once SYSTEM_PATH . 'lib/master.han.php';
		require_once SYSTEM_PATH . 'lib/time.han.php';
		require_once SYSTEM_PATH . 'lib/db/database.db.php';
		require_once SYSTEM_PATH . 'lib/db/' . DB_TYPE . '.db.php';
		require_once SYSTEM_PATH . 'lib/cookie.han.php';
		require_once SYSTEM_PATH . 'lib/http.han.php';
		require_once SYSTEM_PATH . 'lib/language.han.php';
		require_once SYSTEM_PATH . 'lib/template.han.php';
		require_once SYSTEM_PATH . 'lib/user.han.php';
		require_once SYSTEM_PATH . 'lib/parse.han.php';
		require_once SYSTEM_PATH . 'lib/forum.han.php';
		require_once SYSTEM_PATH . 'lib/cache.han.php';
		require_once               'lib/event.han.php';

		$_GET  = HttpHandler::checkVars($_GET);
		$_POST = HttpHandler::checkVars($_POST);

		if(isset($_GET['debug']))
		{
			define('DEBUG', true);
		}
		else {
			define('DEBUG', false);
		}

		$this->Event = new EventHandler($this->_setEvent(), $config);

		ob_start();
		
		echo $this->Event->doEvent();

		ob_end_flush();
	}

   // ! Action Method

   /**
	* Comment
	*
	* @param String $string Description
	* @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
	* @since v1.0
	* @return String
	*/
	function _setEvent()
	{
		if(false == isset($_GET['a']))
		{
			$_GET['a'] = 'main';
		}
		
		return $_GET['a'];
	}
}

?>