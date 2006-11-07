<?php

/**
* ACP Event Handler
*
* This class handles all event requests for the
* administrative control panel.
*
* @version $Id:	event.han.php murdochd Exp $
* @author Daniel Wilhelm II	Murdoch	<wilhelm@jaia-interactive.com>
* @company Jaia	Interactive	<admin@jaia-interactive.com>
* @package MyTopix Personal	Message	Board
*/
class EventHandler
{
   /**
	* Name of requested module
	* @access Private
	* @var String
	*/
	var $_module;

   /**
	* System configuration
	* @access Private
	* @var Array
	*/
	var $_config;

   /**
	* Point of access for requested module.
	* Can only be used AFTER it has been loaded.
	* @access Public
	* @var Object
	*/
	var $ModuleObject;

   // !	Constructor	Method

   /**
	* Instansiates class and defines instance variables.
	*
	* @param String	$module	Current	module title
	* @param Array	$config	System configuration array
	* @author Daniel Wilhelm II	Murdoch	<jaiainteractive@gmail.com>
	* @since v1.3.0
	* @access Private
	* @return Void
	*/
	function EventHandler ( $module, & $config )
	{
		$this->_config =& $config;

		include_once SYSTEM_PATH . 'config/acp_modules.php';

		if ( false == file_exists ( SYSTEM_PATH . "admin/modules/{$module}.mod.php" ) ||
			 false == in_array ( $module, $modules ) )
		{
			$this->_module = 'main';
		}
		else {
			$this->_module =& $module;
		}

		require SYSTEM_PATH . "admin/modules/{$this->_module}.mod.php";
		$this->ModuleObject = new ModuleObject ( $this->_module, $this->_config );
	}

   // !	Action Method

   /**
	* Executes the requested module ( event )
	*
	* @param none
	* @author Daniel Wilhelm II	Murdoch	<jaiainteractive@gmail.com>
	* @since v1.3.0
	* @access Public
	* @return HTML Output
	*/
	function doEvent ()
	{
		if( false == USER_ADMIN )
		{
			header( "LOCATION: {$this->_config['site_link']}?a=logon" );
		}

		return $this->ModuleObject->execute();
	}
}

?>