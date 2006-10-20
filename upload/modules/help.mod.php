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
class ModuleObject extends MasterObject
{
	function ModuleObject(& $module, & $config, $cache)
	{
        $this->MasterObject($module, $config, $cache);
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
	function execute()
	{
		if(false == $this->UserHandler->getField('class_canViewHelp'))
        {
            return $this->messenger(array('MSG' => 'err_no_perm'));
        }

		$sql = $this->DatabaseHandler->query("SELECT * FROM " . DB_PREFIX . "help ORDER BY help_position", __FILE__, __LINE__);

        $count   = 0;
        $titles  = '';
        $entries = '';

		while($row = $sql->getRow())
        {
            $count++;
            $titles .= eval($this->TemplateHandler->fetchTemplate('title_row'));

			$row['help_content'] = $this->ParseHandler->parseText($row['help_content'], F_ENTS | F_SMILIES | F_CODE | F_BREAKS);
			$entries .= eval($this->TemplateHandler->fetchTemplate('content_row'));
        }

		$content = eval($this->TemplateHandler->fetchTemplate('container_help'));
		return     eval($this->TemplateHandler->fetchTemplate('global_wrapper'));

	}
}

?>