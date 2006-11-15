<?php

error_reporting(0);

ini_set ( 'arg_separator.output', '&amp;' );
ini_set ( 'magic_quotes_runtime', 0 );

session_start();

class MyTopix
{
	var $path;

	function MyTopix ( $path )
	{
		$this->path = $path;
	}

	function initialize()
	{
		define ( 'SYSTEM_PATH', $this->path );
		define ( 'SYSTEM_ACP',  true);

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

		$_GET  = HttpHandler::checkVars ( $_GET );
		$_POST = HttpHandler::checkVars ( $_POST );

		if ( isset ( $_GET[ 'debug' ] ) )
		{
			define ( 'DEBUG', true );
		}
		else {
			define ( 'DEBUG', false );
		}

		$this->Event = new EventHandler ( $this->_setEvent(), $config );

		return $this->Event->executeEvent();
	}

	function _setEvent()
	{
		if ( false == isset ( $_GET[ 'a' ] ) )
		{
			$_GET[ 'a '] = 'main';
		}

		return $_GET[ 'a' ];
	}
}

?>