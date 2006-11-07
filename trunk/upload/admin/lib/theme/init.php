<?php

error_reporting ( 0 );

/**
* MyPanel's Form Handling Class
*
* Allows a developer to create forms and fields
* on the fly without having to worry about playing
* with (X)HTML markup.
*
* @version $Id: form.han.php murdochd Exp $
* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
* @company Jaia Interactive <admin@jaia-interactive.com>
* @package MyTopix Personal Message Board
*/
class MyTopix
{

   /**
	* Holds output for form buffer.
	* @access Public
	* @var String
	*/
	var $_path;

   // ! Constructor Method

   /**
	* Instansiates class and defines instance variables.
	*
	* @param Object $_System Currently loaded system library.
	* @param String $path    Absolute path to system files.
	* @author Daniel Wilhelm II	Murdoch	<jaiainteractive@gmail.com>
	* @since v1.3.0
	* @access Private
	* @return Void
	*/
	function MyTopix ( $path )
	{
		$this->_path = $path;
	}

   // ! Action Method

   /**
	* Simply adds a header to the current buffer.
	*
	* @param String $title Text to include within new header.
	* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
	* @since v1.3.0
	* @access Public
	* @return Void
	*/
	function initialize ()
	{
		define ( 'SYSTEM_PATH', $this->_path );
		define ( 'SYSTEM_ACP',  true );
		define ( 'DEBUG',       true );

		require_once SYSTEM_PATH . 'config/settings.php';
		require_once SYSTEM_PATH . 'config/constants.php';
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
		require_once               'lib/event.han.php';

		$_GET  = HttpHandler::checkVars ( $_GET );
		$_POST = HttpHandler::checkVars ( $_POST );

		$this->Event = new EventHandler ( $this->_setEvent (), $config );

		ob_start ();

		echo $this->Event->doEvent ();

		ob_end_flush ();
	}

   // ! Action Method

   /**
	* Simply adds a header to the current buffer.
	*
	* @param String $title Text to include within new header.
	* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
	* @since v1.3.0
	* @access Public
	* @return Void
	*/
	function _setEvent ()
	{
		if ( false == isset ( $_GET[ 'a' ]) )
		{
			$_GET[ 'a' ] = 'main';
		}

		return $_GET[ 'a' ];
	}
}

?>