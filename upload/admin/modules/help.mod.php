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
    var $_hash;

   /**
    * Variable Description
    * @access Private
    * @var Integer
    */
    var $OnePanel;

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
        $this->_hash = isset($this->post['hash']) ?       $this->post['hash'] : null;

        require_once SYSTEM_PATH . 'admin/lib/onepanel.php';
        $this->OnePanel = new OnePanel($this);
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
        $this->OnePanel->addHeader($this->LanguageHandler->help_form_header);

		switch($this->_code)
		{
			case '00':
                $this->OnePanel->_make_nav(1, 5, 11);
				$this->_showList();
				break;

			case '01':
                $this->OnePanel->_make_nav(1, 5, -5);
				$this->_showEditForm();
				break;

			case '02':
                $this->OnePanel->_make_nav(1, 5, -5);
				$this->_doEdit();
				break;

			case '03':
                $this->OnePanel->_make_nav(1, 5, -5);
				$this->_doRemove();
				break;

			case '04':
                $this->OnePanel->_make_nav(1, 5, 12);
				$this->_showAddForm();
				break;

			case '05':
                $this->OnePanel->_make_nav(1, 5, 12);
				$this->_doAdd();
				break;

			default:
                $this->OnePanel->_make_nav(1, 5, 11);
				$this->_showList();
				break;
		}

		$this->OnePanel->flushBuffer();
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
	function _showList()
	{
        $sql = $this->DatabaseHandler->query("SELECT help_id, help_title, help_position FROM " . DB_PREFIX .
                                             "help ORDER BY help_position ASC");

        $positions = array();
        for($i = 1; $i < $sql->getNumRows() + 1; $i++)
        {
            $positions[$i] = $i;
        }

		$this->OnePanel->table->addColumn($this->LanguageHandler->help_tbl_id,       " width='1%'");
		$this->OnePanel->table->addColumn($this->LanguageHandler->help_tbl_title, " align='left'");
		$this->OnePanel->table->addColumn($this->LanguageHandler->help_tbl_position, " align='center'");
		$this->OnePanel->table->addColumn('&nbsp;');

		$this->OnePanel->table->startTable($this->LanguageHandler->help_tbl_header);

			while($row = $sql->getRow())
			{

				$this->OnePanel->table->addRow(array(array("<strong>{$row['help_id']}</strong>", ' align="center"', 'headera'),
										   array($row['help_title'], false, 'headerb'),
										   array($this->OnePanel->form->addSelect('pos', $positions, $row['help_position'], " onchange='window.location = \"index.php?a=help&amp;code=02&amp;id={$row['help_id']}&amp;pos=\" + this.options[this.selectedIndex].value;'", false, true), " align='center'", 'headerb'),
										   array("<a href=\"" . GATEWAY . "?a=help&amp;code=01&amp;id={$row['help_id']}\">{$this->LanguageHandler->link_edit}</a> | " .
												 "<a href=\"" . GATEWAY . "?a=help&amp;code=03&amp;id={$row['help_id']}\" onclick='javascript:return confirm(\"{$this->LanguageHandler->help_err_confirm}\");'><b>{$this->LanguageHandler->link_delete}</b></a>", " align='center'", 'headerc')));

			}

		$this->OnePanel->table->endTable();
		$this->OnePanel->appendBuffer($this->OnePanel->table->flushBuffer());
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
    function _doRemove()
    {
        $sql = $this->DatabaseHandler->query("SELECT help_id FROM " . DB_PREFIX . "help WHERE help_id = {$this->_id}");

        if(false == $sql->getNumRows())
        {
            $this->OnePanel->messenger($this->LanguageHandler->help_err_no_results, GATEWAY . '?a=help');
        }

        $this->DatabaseHandler->query("DELETE FROM " . DB_PREFIX . "help WHERE help_id = {$this->_id}");

        header("LOCATION: " . GATEWAY . '?a=help');
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
    function _showEditForm()
    {
        $sql = $this->DatabaseHandler->query("SELECT * FROM " . DB_PREFIX . "help WHERE help_id = {$this->_id}");

        if(false == $sql->getNumRows())
        {
            $this->OnePanel->messenger($this->LanguageHandler->help_err_no_results, GATEWAY . '?a=help');
        }

        $row = $sql->getRow();

		$this->OnePanel->form->startForm(GATEWAY . "?a=help&amp;code=02&amp;id={$this->_id}");
		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());

            $this->OnePanel->form->addTextBox('help_title',    $row['help_title'],   false, array(1, $this->LanguageHandler->help_form_title_title, 
                                                                                                     $this->LanguageHandler->help_form_title_desc));
            $this->OnePanel->form->addTextArea('help_content', $row['help_content'], false, array(1, $this->LanguageHandler->help_form_body_title,
                                                                                                     $this->LanguageHandler->help_form_body_desc));

		$this->OnePanel->form->endForm();
		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());
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
    function _doEdit()
    {
        extract($this->post);
        extract($this->get);

        if(isset($pos))
        {
            $this->DatabaseHandler->query("UPDATE " . DB_PREFIX . "help SET help_position = '{$pos}' WHERE help_id = {$this->_id}");

            header("LOCATION: " . GATEWAY . "?a=help");
            exit();
        }

        if(false == $help_title || false == $help_content)
        {
            $this->OnePanel->messenger($this->LanguageHandler->help_err_empty_fields, GATEWAY . "?a=help&amp;code=01&amp;id={$this->_id}");
        }

        $this->DatabaseHandler->query("
        UPDATE " . DB_PREFIX . "help SET 
            help_title   = '{$help_title}', 
            help_content = '{$help_content}' 
        WHERE help_id = {$this->_id}");

        $this->OnePanel->messenger($this->LanguageHandler->help_err_update_done, GATEWAY . "?a=help&amp;code=01&amp;id={$this->_id}");
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
    function _showAddForm()
    {
		$this->OnePanel->form->startForm(GATEWAY . '?a=help&amp;code=05');
		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());

            $this->OnePanel->form->addTextBox('help_title',    false, false, array(1, $this->LanguageHandler->help_form_title_title, 
                                                                                      $this->LanguageHandler->help_form_title_desc));
            $this->OnePanel->form->addTextArea('help_content', false, false, array(1, $this->LanguageHandler->help_form_body_title,
                                                                                      $this->LanguageHandler->help_form_body_desc));

        $this->OnePanel->form->addHidden('hash', $this->UserHandler->getUserHash());

		$this->OnePanel->form->endForm();
		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());
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
    function _doAdd()
    {
        if($this->_hash != $this->UserHandler->getUserhash())
        {
            $this->OnePanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
        }

        extract($this->post);

        if(false == $help_title || false == $help_content)
        {
            $this->OnePanel->messenger($this->LanguageHandler->help_err_empty_fields, GATEWAY . "?a=help&amp;code=04");
        }

        $this->DatabaseHandler->query("
        INSERT INTO " . DB_PREFIX . "help(
            help_title, 
            help_content) 
        VALUES (
            '{$help_title}', 
            '{$help_content}')");

        $this->OnePanel->messenger($this->LanguageHandler->help_form_err_new_done, GATEWAY . '?a=help&amp;code=01&amp;id=' . $this->DatabaseHandler->insertId());
    }

}
?>