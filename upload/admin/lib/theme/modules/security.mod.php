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

   /**
    * Variable Description
    * @access Private
    * @var Integer
    */
    var $_code;

   /**
    * Variable Description
    * @access Private
    * @var Integer
    */
    var $_hash;

   /**
    * Variable Description
    * @access Private
    * @var Integer
    */
    var $MyPanel;

   /**
    * Variable Description
    * @access Private
    * @var Integer
    */
    var $_PageHandler;

   /**
    * Variable Description
    * @access Private
    * @var Integer
    */
    var $_FileHandler;

   // ! Action Method

   /**
    * Comment
    *
    * @param String $string Description
    * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
    * @since v1.0
    * @return String
    */
	function ModuleObject(& $module, & $config)
	{
        $this->MasterObject($module, $config);

        $this->_code = isset($this->get['code']) ? $this->get['code'] : 00;
        $this->_hash = isset($this->post['hash']) ? $this->post['hash'] : null;

        require_once SYSTEM_PATH . 'admin/lib/mypanel.php';
        $this->MyPanel = new MyPanel($this);

		require_once SYSTEM_PATH . 'lib/page.han.php';
		$this->_PageHandler = new PageHandler(isset($this->get['p']) ? (int) $this->get['p'] : 1, 
                                             '', 
                                             $this->config['per_page'], 
                                             $this->DatabaseHandler,
                                             $this->config);

        require_once SYSTEM_PATH . 'lib/file.han.php';
        $this->_FileHandler  = new FileHandler($this->config);
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
		switch($this->_code)
		{
			case '00':
                $this->MyPanel->_make_nav(1, 1, 7);

                if(false == $this->MyPanel->canAccess('admin_secure_names'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
    				$this->_showNames();
                }

				break;

			case '01':
                $this->MyPanel->_make_nav(1, 1, 8);

                if(false == $this->MyPanel->canAccess('admin_secure_emails'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
    				$this->_showEmail();
                }

				break;

			case '02':
                $this->MyPanel->_make_nav(1, 1, 9);

                if(false == $this->MyPanel->canAccess('admin_secure_ips'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
    				$this->_showIP();
                }

				break;

            case '03':
                $this->MyPanel->_make_nav(1, 1, 7);
                $this->_doUpdateSimple();
                break;

			case '04':
                $this->MyPanel->_make_nav(1, 1, 10);

                if(false == $this->MyPanel->canAccess('admin_secure_list'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
    				$this->_showSuspended();
                }

				break;

			case '05':
                $this->MyPanel->_make_nav(1, 1, 10);

                if(false == $this->MyPanel->canAccess('admin_secure_list'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
    				$this->_doSuspended();
                }

				break;

			default:
                $this->MyPanel->_make_nav(1, 1, 7);

                if(false == $this->MyPanel->canAccess('admin_secure_names'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
    				$this->_showNames();
                }

				break;
		}

		$this->MyPanel->flushBuffer();
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
	function _showNames()
	{
		$this->MyPanel->addHeader($this->LanguageHandler->names_form_header);

		$this->MyPanel->form->startForm(GATEWAY . '?a=security&amp;code=03');
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

			$this->MyPanel->form->addTextArea('banned_names', 
                                               str_replace('|', "\n", $this->config['banned_names']), false, 
                                               array(true, $this->LanguageHandler->names_form_banned_title,
                                                           $this->LanguageHandler->names_form_banned_desc));

			$this->MyPanel->form->addHidden('code', $this->_code);
            $this->MyPanel->form->addHidden('hash', $this->UserHandler->getUserHash());

		$this->MyPanel->form->endForm();
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());
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
	function _showEmail()
	{
		$this->MyPanel->addHeader($this->LanguageHandler->email_form_header);

		$this->MyPanel->form->startForm(GATEWAY . '?a=security&amp;code=03');
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

			$this->MyPanel->form->addTextArea('banned_emails', 
                                               str_replace('|', "\n", $this->config['banned_emails']), false, 
                                               array(true, $this->LanguageHandler->email_form_email_title,
                                                           $this->LanguageHandler->email_form_email_desc));

			$this->MyPanel->form->addHidden('code', $this->_code);
            $this->MyPanel->form->addHidden('hash', $this->UserHandler->getUserHash());

		$this->MyPanel->form->endForm();
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());
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
	function _showIP()
	{
		$this->MyPanel->addHeader($this->LanguageHandler->ip_form_header);

		$this->MyPanel->form->startForm(GATEWAY . '?a=security&amp;code=03');
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

			$this->MyPanel->form->addTextArea('banned_ips', 
                                               str_replace('|', "\n", $this->config['banned_ips']), false, 
                                               array(true, $this->LanguageHandler->ip_form_ip_title, 
                                                           $this->LanguageHandler->ip_form_ip_desc));

			$this->MyPanel->form->addHidden('code', $this->_code);
            $this->MyPanel->form->addHidden('hash', $this->UserHandler->getUserHash());

		$this->MyPanel->form->endForm();
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());
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
	function _doUpdateSimple()
	{
        if($this->_hash != $this->UserHandler->getUserhash())
        {
            $this->MyPanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
        }

        extract($this->post);

        $this->config['banned_names']  = false == isset($banned_names)
                                       ? $this->config['banned_names']
                                       : str_replace("\n", '|', $this->ParseHandler->parseText(stripslashes($banned_names), F_ENTS));

        $this->config['banned_emails'] = false == isset($banned_emails)
                                       ? $this->config['banned_emails']
                                       : str_replace("\n", '|', $this->ParseHandler->parseText(stripslashes($banned_emails), F_ENTS));

        $this->config['banned_ips']    = false == isset($banned_ips)
                                       ? $this->config['banned_ips']
                                       : str_replace("\n", '|', $this->ParseHandler->parseText(stripslashes($banned_ips), F_ENTS));

		$this->_FileHandler->updateFileArray($this->config, 'config', '../config/settings.php');

		$this->MyPanel->messenger($this->LanguageHandler->ban_err_done, GATEWAY . "?a=security&code={$code}");
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
	function _showSuspended()
	{
		$sql = $this->DatabaseHandler->query("
        SELECT COUNT(members_id) AS Count 
        FROM " . DB_PREFIX . "members 
        WHERE members_class = 4 OR members_is_banned = 1");

	    $row = $sql->getRow();

		$this->_PageHandler->setRows($row['Count']);
		$this->_PageHandler->doPages(GATEWAY . '?a=security&amp;code=05');

		$this->MyPanel->addHeader($this->LanguageHandler->security_tab_banned);

		$this->MyPanel->appendBuffer('<p id="bar">' . $this->_PageHandler->getSpan() . '</p>');

		$sql = $this->_PageHandler->getData("
        SELECT 
			members_id, 
			members_name, 
			members_lastvisit,
            members_temp_ban
		FROM " . DB_PREFIX . "members 
		WHERE 
            members_class     =  4 OR
            members_is_banned <> 0 OR
            members_temp_ban  <> 0
		ORDER BY members_lastvisit");

		$this->MyPanel->appendBuffer("<form method=\"post\" action=\"" . GATEWAY . '?a=security&amp;code=05">');

            $this->MyPanel->table->addColumn($this->LanguageHandler->susp_tbl_id,     " align='center' width='1%'");
			$this->MyPanel->table->addColumn($this->LanguageHandler->susp_tbl_name,   " align='left'");
			$this->MyPanel->table->addColumn($this->LanguageHandler->susp_tbl_since,  " align='center'");
			$this->MyPanel->table->addColumn($this->LanguageHandler->susp_tbl_until,  " align='center'");
			$this->MyPanel->table->addColumn($this->LanguageHandler->susp_tbl_unsusp, " align='center' width='1%'");

			$this->MyPanel->table->startTable(number_format($row['Count']) . ' ' . $this->LanguageHandler->susp_form_header);


            if(false == $sql->getNumRows())
            {
                $this->MyPanel->table->addRow(array(array("<strong>{$this->LanguageHandler->security_list_none}</strong>", " align='center' colspan='5'")));
            }
            else {

                while($row = $sql->getRow())
                {
                    $row['members_lastvisit'] = false == $row['members_lastvisit']
                                              ? $this->LanguageHandler->global_none
                                              : date($this->config['date_long'], $row['members_lastvisit']);

                    $row['members_temp_ban'] = false == $row['members_temp_ban']
                                             ? $this->LanguageHandler->global_none
                                             : date('F j, Y', $row['members_temp_ban']);


                    $this->MyPanel->table->addRow(array(array("<strong>{$row['members_id']}</strong>", " align='center'", 'headera'),
                                               array("<a href=\"" . GATEWAY . "?a=members&amp;code=05&amp;id={$row['members_id']}\" " . 
                                                     "title=\"View this member\'s profile.\">{$row['members_name']}</a>", false, 'headerb'),
                                               array($row['members_lastvisit'], " align='center'", 'headerb'),
                                               array($row['members_temp_ban'], " align='center'", 'headerb'),
                                               array("<input type=\"checkbox\" class=\"check\" name=\"unban[]\" value=\"{$row['members_id']}\" />", " align='center'", 'headerc')));
                }

            }

            $this->MyPanel->form->addHidden('hash', $this->UserHandler->getUserHash());
            $this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

        $this->MyPanel->table->endTable(true);
        $this->MyPanel->appendBuffer($this->MyPanel->table->flushBuffer());
        
        $this->MyPanel->appendBuffer('<p id="bar">' . $this->_PageHandler->getSpan() . '</p>');
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
	function _doSuspended()
	{
        if($this->_hash != $this->UserHandler->getUserhash())
        {
            $this->MyPanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
        }

		extract($this->post);

		if(false == sizeof($unban))
        {
            $this->MyPanel->messenger($this->LanguageHandler->susp_err_none_chosen, GATEWAY . '?a=security&amp;code=05');
        }

		$query = array();
        $ips   = array();

		foreach($unban as $id)
        {
            $query[] = $id;
        }

		$query = implode(',', $query);

        $sql = $this->DatabaseHandler->query("SELECT members_ip FROM " . DB_PREFIX . "members WHERE members_id IN ({$query})");

        while($row = $sql->getRow())
        {
            $ips[] = $row['members_ip'];
        }   

        if($ips)
        {
            $conf_ips  = explode('|', $this->config['banned_ips']);
            $clean_ips = array();

            foreach($conf_ips as $val)
            {
                if(false == in_array($val, $ips))
                {
                    $clean_ips[] = $val;
                }
            }

            $clean_ips = implode('|', $clean_ips);

            $this->config['banned_ips'] = $clean_ips;
        }

        $this->_FileHandler->updateFileArray($this->config, 'config', '../config/settings.php');

		$this->DatabaseHandler->query("
        UPDATE " . DB_PREFIX . "members SET 
            members_class     = 2,
            members_is_banned = 0,
            members_temp_ban  = 0
        WHERE members_id IN ({$query})");

		$this->MyPanel->messenger($this->LanguageHandler->susp_err_done, GATEWAY . '?a=security&amp;code=04');
	}
}

?>