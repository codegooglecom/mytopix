<?php

class EventHandler
{
	var $module;
	var $config;
	var $ModuleObject;

	function EventHandler ( $module, & $config )
	{
		$this->config =& $config;

		include_once SYSTEM_PATH . 'config/acp_modules.php';

		if ( false == file_exists ( SYSTEM_PATH . "admin/modules/{$module}.mod.php" ) ||
			 false == in_array ( $module, $modules ) )
		{
			$this->module = 'main';
		}
		else {
			$this->module = $module;
		}

		require_once SYSTEM_PATH . "admin/modules/{$this->module}.mod.php";

		$this->ModuleObject = new ModuleObject ( $this->module, $this->config );
	}

	function executeEvent()
	{
		if ( false == USER_ADMIN )
		{
			header ( "LOCATION: {$this->config['site_link']}?a=logon" );
		}

		return $this->ModuleObject->execute();
	}
}

?>