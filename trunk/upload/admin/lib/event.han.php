<?php

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
class EventHandler
{
   /**
    * Variable Description
    * @access Private
    * @var Integer
    */
	var $_module;

   /**
    * Variable Description
    * @access Private
    * @var Integer
    */
    var $_config;

   /**
    * Variable Description
    * @access Private
    * @var Integer
    */
	var $ModuleObject;


   // ! Action Method

   /**
    * Comment
    *
    * @param String $string Description
    * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
    * @since v1.0
    * @return String
    */
	function EventHandler($module, & $config)
	{
        $this->_config =& $config;

        include_once SYSTEM_PATH . 'config/acp_modules.php';

   	    if(false == file_exists(SYSTEM_PATH . "admin/modules/{$module}.mod.php") || 
           false == in_array($module, $modules))
        {
            $this->_module = 'main';
        }
        else {
            $this->_module =& $module;
        }

        require SYSTEM_PATH . "admin/modules/{$this->_module}.mod.php";
        $this->ModuleObject = new ModuleObject($this->_module, $this->_config);
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
    function doEvent()
    {
        if(false == USER_ADMIN)
        {
            header("LOCATION: {$this->_config['site_link']}?a=logon");
        }

        return $this->ModuleObject->execute();
    }
}

?>