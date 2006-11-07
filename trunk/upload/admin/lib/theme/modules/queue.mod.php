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
    var $_id;

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
    var $_MailHandler;


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

        $this->_id   = isset($this->get['id'])    ? (int) $this->get['id']    : 0;
        $this->_code = isset($this->get['code'])  ?       $this->get['code']  : 00;

        require_once SYSTEM_PATH . 'admin/lib/mypanel.php';
        $this->MyPanel = new MyPanel($this);

		require SYSTEM_PATH . 'lib/mail.han.php';
		$this->_MailHandler = new MailHandler($this->config['email_incoming'], 
                                              $this->config['email_outgoing'], 
                                              $this->config['email_name']);

		require_once SYSTEM_PATH . 'lib/page.han.php';
		$this->_PageHandler = new PageHandler(isset($this->get['p']) ? (int) $this->get['p'] : 1, 
                                             '', 
                                             $this->config['per_page'], 
                                             $this->DatabaseHandler,
                                             $this->config);
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
                $this->MyPanel->_make_nav(3, 22, 47);
				$this->_showValidatingList();
				break;

			case '01':
                $this->MyPanel->_make_nav(3, 22, 47);

                if(false == $this->MyPanel->canAccess('admin_validate_regular'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
    				$this->_doUserValidation();
                }

				break;

			case '02':
                $this->MyPanel->_make_nav(3, 22, 48);
				$this->_showCoppaList();
				break;

			case '03':
                $this->MyPanel->_make_nav(3, 22, 48);

                if(false == $this->MyPanel->canAccess('admin_validate_coppa'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
    				$this->_doCoppaValidation();
                }

				break;

            case '04':

                $this->_removeUser();
                break;

			default:
                $this->MyPanel->_make_nav(3, 22, 47);
				$this->_showValidatingList();
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
	function _showValidatingList()
	{
        $this->MyPanel->addHeader($this->LanguageHandler->q_val_header);
        $this->MyPanel->appendBuffer($this->LanguageHandler->q_header_tip);

        $query = "
        SELECT
              members_id,
              members_name,
              members_registered,
              members_lastvisit
        FROM " . DB_PREFIX . "members
        WHERE members_class = 5 AND
              members_coppa = 0";

		$sql = $this->DatabaseHandler->query($query);

        $num = $sql->getNumRows();

        $this->MyPanel->table->addColumn($this->LanguageHandler->mem_search_tbl_id,     "align='center' width='1%'");
        $this->MyPanel->table->addColumn($this->LanguageHandler->mem_search_tbl_name,   "align='left'");
        $this->MyPanel->table->addColumn($this->LanguageHandler->mem_search_tbl_joined, "align='center'");
        $this->MyPanel->table->addColumn($this->LanguageHandler->mem_search_tbl_visit, "align='center'");
        $this->MyPanel->table->addColumn('&nbsp;', ' width="15%"');

		$this->MyPanel->appendBuffer("<div id=\"bar\">" . $this->_PageHandler->getSpan() . "</div>");     

        $this->MyPanel->table->startTable(number_format($num) . ' ' .$this->LanguageHandler->mem_search_tbl_header);

        if($num)
        {
            while($row = $sql->getRow())
            {
                if(false == $row['members_lastvisit'])
                {
                    $lastvisit = $this->LanguageHandler->blank;
                }
                else {
                    $lastvisit = date($this->config['date_short'], $row['members_lastvisit']);
                }

                $this->MyPanel->table->addRow(array(array("<strong>{$row['members_id']}</strong>", ' align="center"', 'headera'),
                                                     array("<a href=\"" . GATEWAY . "?a=members&amp;code=05&amp;id={$row['members_id']}\">{$row['members_name']}</a>", 'headerb'),
                                                     array(date($this->config['date_short'], $row['members_registered']), " align=\"center\"", 'headerb'),
                                                     array($lastvisit, 'align="center"'),
                                                     array("<a href=\"" . GATEWAY . "?a=queue&amp;code=01&amp;id={$row['members_id']}\"><strong>{$this->LanguageHandler->link_approve}</strong></a> <a href=\"" . GATEWAY . "?a=members&code=04&id={$row['members_id']}&where=normal\"><strong>{$this->LanguageHandler->link_reject}</strong></a>", ' align="center"')));
            }
        }
        else {
                $this->MyPanel->table->addRow(array(array($this->LanguageHandler->q_no_val_users, ' align="center" colspan="5"')));
        }

        $this->MyPanel->table->endTable();
        $this->MyPanel->appendBuffer($this->MyPanel->table->flushBuffer());

		$this->MyPanel->appendBuffer("<div id=\"bar\">" . $this->_PageHandler->getSpan() . "</div>");
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
    function _doUserValidation()
    {
        $this->DatabaseHandler->query("
        UPDATE " . DB_PREFIX . "members 
        SET members_class = 2 
        WHERE members_id  = {$this->_id}");

        $this->LanguageHandler->loadFile('mail_stuff');

        $sent = date($this->config['date_short'], time());
        $who  = $this->config['title'];

        $message  = sprintf($this->LanguageHandler->mail_header, $who, $sent);
        
        $message .= sprintf($this->LanguageHandler->mail_user_active_notify, $name, 
                            $this->config['title'],     $this->config['site_link'],     
                            $this->config['site_link'], GATEWAY);

        $message .= sprintf($this->LanguageHandler->mail_footer, $this->config['version']);

        $this->_MailHandler->setRecipient($email);
        $this->_MailHandler->setSubject($this->config['title'] . ': ' . $this->LanguageHandler->mem_add_notify);
        $this->_MailHandler->setMessage($message);
        $this->_MailHandler->doSend();  

        header("LOCATION: " . GATEWAY . '?a=queue');
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
    function _showCoppaList()
    {
        $this->MyPanel->addHeader($this->LanguageHandler->q_cop_header);
        $this->MyPanel->appendBuffer($this->LanguageHandler->q_header_tip);

        $query = "
        SELECT
              members_id,
              members_name,
              members_registered,
              members_lastvisit
        FROM " . DB_PREFIX . "members
        WHERE members_class = 5 AND
              members_coppa = 1";

		$sql = $this->DatabaseHandler->query($query);

        $num = $sql->getNumRows();

        $this->MyPanel->table->addColumn($this->LanguageHandler->mem_search_tbl_id,     "align='center' width='1%'");
        $this->MyPanel->table->addColumn($this->LanguageHandler->mem_search_tbl_name,   "align='left'");
        $this->MyPanel->table->addColumn($this->LanguageHandler->mem_search_tbl_joined, "align='center'");
        $this->MyPanel->table->addColumn($this->LanguageHandler->mem_search_tbl_visit, "align='center'");
        $this->MyPanel->table->addColumn('&nbsp;', ' width="15%"');

		$this->MyPanel->appendBuffer("<div id=\"bar\">" . $this->_PageHandler->getSpan() . "</div>");     

        $this->MyPanel->table->startTable(number_format($num) . ' ' .$this->LanguageHandler->mem_search_tbl_header);

        if($num)
        {
            while($row = $sql->getRow())
            {
                if(false == $row['members_lastvisit'])
                {
                    $lastvisit = $this->LanguageHandler->blank;
                }
                else {
                    $lastvisit = date($this->config['date_short'], $row['members_lastvisit']);
                }

                $this->MyPanel->table->addRow(array(array("<strong>{$row['members_id']}</strong>", ' align="center"', 'headera'),
                                                     array("<a href=\"" . GATEWAY . "?a=members&amp;code=05&amp;id={$row['members_id']}\">{$row['members_name']}</a>", 'headerb'),
                                                     array(date($this->config['date_short'], $row['members_registered']), " align=\"center\"", 'headerb'),
                                                     array($lastvisit, 'align="center"'),
                                                     array("<a href=\"" . GATEWAY . "?a=queue&amp;code=03&amp;id={$row['members_id']}\"><strong>{$this->LanguageHandler->link_approve}</strong></a> <a href=\"" . GATEWAY . "?a=members&code=04&id={$row['members_id']}&where=coppa\"><strong>{$this->LanguageHandler->link_reject}</strong></a>", ' align="center"')));
            }
        }
        else {
                $this->MyPanel->table->addRow(array(array($this->LanguageHandler->q_no_cop_users, ' align="center" colspan="5"')));

        }

        $this->MyPanel->table->endTable();
        $this->MyPanel->appendBuffer($this->MyPanel->table->flushBuffer());

		$this->MyPanel->appendBuffer("<div id=\"bar\">" . $this->_PageHandler->getSpan() . "</div>");
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
    function _doCoppaValidation()
    {
        $this->DatabaseHandler->query("
        UPDATE " . DB_PREFIX . "members 
        SET members_class = 2 
        WHERE members_id  = {$this->_id}");

        $this->LanguageHandler->loadFile('mail_stuff');

        $sent = date($this->config['date_short'], time());
        $who  = $this->config['title'];

        $message  = sprintf($this->LanguageHandler->mail_header, $who, $sent);
        
        $message .= sprintf($this->LanguageHandler->mail_user_active_notify, $name, 
                            $this->config['title'],     $this->config['site_link'],     
                            $this->config['site_link'], GATEWAY);

        $message .= sprintf($this->LanguageHandler->mail_footer, $this->config['version']);

        $this->_MailHandler->setRecipient($email);
        $this->_MailHandler->setSubject($this->config['title'] . ': ' . $this->LanguageHandler->mem_add_notify);
        $this->_MailHandler->setMessage($message);
        $this->_MailHandler->doSend();  

        header("LOCATION: " . GATEWAY . '?a=queue&code=02');
    }
}

?>