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
    var $_master_groups;

   /**
    * Variable Description
    * @access Private
    * @var Integer
    */
    var $MyPanel;

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

        $this->_master_groups = array(1);

        require_once SYSTEM_PATH . 'admin/lib/mypanel.php';
        $this->MyPanel = new MyPanel($this);
	}

   // ! Action Method

   /**
    * Displays tables containing administrative groups and their 
    * assigned user admins.
    *
    * @param none
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.3.0
    * @access Private
    * @return Void
    */
	function execute()
	{
		switch($this->_code)
		{
			case '00':
                $this->MyPanel->_make_nav(3, 23, 46);
				$this->_showSearchForm();
				break;

			case '01':
                $this->MyPanel->_make_nav(3, 23, 46);
				$this->_removeAdmins();
				break;

			case '02':
                $this->MyPanel->_make_nav(3, 23, false);
				$this->_editAdminGroup();
				break;

			case '03':
                $this->MyPanel->_make_nav(3, 23, 46);
				$this->_processAdminEdit();
				break;

			case '04':
                $this->MyPanel->_make_nav(3, 23, 49);
				$this->_addAdminGroup();
				break;

			case '05':
                $this->MyPanel->_make_nav(3, 23, 49);
				$this->_processAddGroup();
				break;

			case '06':
                $this->MyPanel->_make_nav(3, 23, 49);
				$this->_processRemoveGroup();
				break;
		}

        if(false == $this->MyPanel->canAccess('admin_manage_admins'))
        {
            $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
        }

		$this->MyPanel->flushBuffer();
	}

   // ! Action Method

   /**
    * Displays tables containing administrative groups and their 
    * assigned user admins.
    *
    * @param none
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.3.0
    * @access Private
    * @return Void
    */
	function _showSearchForm()
	{
        $sql = $this->DatabaseHandler->query("SELECT * FROM " . DB_PREFIX . "admins");

        $group_ids  = array();
        $group_data = array();

        while($row = $sql->getRow())
        {
            $group_data[$row['admin_id']] = $row;

            $group_id[] = $row['admin_id'];
        }

        $sql = $this->DatabaseHandler->query("
        SELECT 
            members_id, 
            members_name,
            members_admin_group
        FROM " . DB_PREFIX . "members 
        WHERE members_admin_group IN (" . implode(',', $group_id) . ")");

        $admin_data = array();

        while($row = $sql->getRow())
        {
            $admin_data[] = $row;
        }

        $this->MyPanel->addHeader($this->LanguageHandler->admin_list_header);
        $this->MyPanel->appendBuffer($this->LanguageHandler->admin_list_tip);

		$this->MyPanel->appendBuffer("<form method=\"post\" action=\"" . GATEWAY . '?a=admins&amp;code=01">');

        foreach($group_data as $group => $data)
        {
            $this->MyPanel->table->addColumn($this->LanguageHandler->admin_list_tbl_id,     " width='1%'");
            $this->MyPanel->table->addColumn('', " width='1%'");
            $this->MyPanel->table->addColumn($this->LanguageHandler->admin_list_tbl_user,   " align='left'");
            $this->MyPanel->table->addColumn('', " width='5%'");

            $this->MyPanel->table->startTable($group_data[$group]['admin_title'] . ':');

            $description = $group_data[$group]['admin_description'] ? $group_data[$group]['admin_description'] : $this->LanguageHandler->blank;

            $delete = in_array($group, $this->_master_groups) ? " <img src=\"lib/theme/btn_delete_off.gif\" alt=\"\" />" : " <a href=\"" . GATEWAY . "?a=admins&amp;code=06&amp;id={$group}\" title=\"\" onclick=\"javascript:return confirm('{$this->LanguageHandler->admin_js_confirm}');\"><strong>{$this->LanguageHandler->link_delete}</strong></a>";

            $this->MyPanel->table->addRow(array(array("<h2>{$description}</h2>", ' colspan="3"'),
                                           array("<a href=\"" . GATEWAY . "?a=admins&amp;code=02&amp;id={$group}\" title=\"\">{$this->LanguageHandler->link_edit}</a>" . $delete, ' align="center" colspan="2" width="15%"')));

            foreach($admin_data as $user)
            {
                if($user['members_admin_group'] == $group)
                {
                    $this->MyPanel->table->addRow(array(array("<strong>{$user['members_id']}</strong>", ' align="center"'),
                                                         array("<input type=\"checkbox\" class=\"check\" name=\"remove[]\" value=\"{$user['members_id']}\" />", ' align="center"'),
                                                         array("<a href=\"" . GATEWAY . "?a=members&amp;code=05&amp;id={$user['members_id']}\" title=\"\">{$user['members_name']}</a>", ' colspan="2"')));
                }
            }

            $this->MyPanel->table->endTable(true);
            $this->MyPanel->appendBuffer($this->MyPanel->table->flushBuffer());    
        }

        $this->MyPanel->form->addHidden('hash', $this->UserHandler->getUserHash());
        $this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

        $this->MyPanel->appendBuffer("</form>");
	}


   // ! Action Method

   /**
    * Removes selected administrators from their groups.
    *
    * @param none
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.3.0
    * @access Private
    * @return Void
    */
    function _removeAdmins()
    {
        if($this->_hash != $this->UserHandler->getUserhash())
        {
            $this->MyPanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
        }
        
        extract($this->post);

        if(in_array(2, $remove))
        {
            $this->MyPanel->messenger($this->LanguageHandler->admin_err_no_rem_root, GATEWAY . '?a=admins');
        }

        $sql_in = implode(',', $remove);

        $this->DatabaseHandler->query("
        UPDATE " . DB_PREFIX . "members 
        SET members_admin_group = 0 
        WHERE members_id IN ({$sql_in})");

        header('LOCATION: ' . GATEWAY . '?a=admins');
    }

   // ! Action Method

   /**
    * Removes selected administrators from their groups.
    *
    * @param none
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.3.0
    * @access Private
    * @return Void
    */
    function _editAdminGroup()
    {
        $sql = $this->DatabaseHandler->query("SELECT * FROM " . DB_PREFIX . "admins WHERE admin_id = {$this->_id}");

        if(false == $sql->getNumRows())
        {
            $this->MyPanel->messenger($this->LanguageHandler->admin_err_not_found, GATEWAY . '?a=admins');
        }

        $row = $sql->getRow();

        $this->MyPanel->addHeader(sprintf($this->LanguageHandler->admin_edit_header, $row['admin_title']));

		$this->MyPanel->form->startForm(GATEWAY . "?a=admins&amp;code=03&amp;id={$this->_id}");
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

			$this->MyPanel->form->addTextBox('admin_title',   $row['admin_title'], false, 
									          array(1, $this->LanguageHandler->admin_title_title, 
                                                       $this->LanguageHandler->admin_title_desc));

			$this->MyPanel->form->addTextArea('admin_description',  $row['admin_description'], false, 
									          array(1, $this->LanguageHandler->admin_desc_title, 
                                                       $this->LanguageHandler->admin_desc_desc));

			$this->MyPanel->form->appendBuffer("<h1>{$this->LanguageHandler->admin_edit_perm_header}</h1>");
			$this->MyPanel->form->appendBuffer("<h2>{$this->LanguageHandler->admin_edit_perm_desc}</h2>");

            foreach($row as $key => $val)
            {
                if(false == in_array($key, array('admin_id', 'admin_title', 'admin_description')))
                {
                    $class = 'checkwrap';
                        
                    if($key == 'admin_front_end')
                    {
                        $class = 'checkwrap_4';
                    }

                    $this->MyPanel->form->addCheckBox($key, 1, false, false, false, 
                                                      ($val ? true : false), $this->LanguageHandler->$key, false, $class);
                }
            }

            $this->MyPanel->form->addHidden('hash', $this->UserHandler->getUserHash());

		$this->MyPanel->form->endForm();
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());
    }

   // ! Action Method

   /**
    * Removes selected administrators from their groups.
    *
    * @param none
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.3.0
    * @access Private
    * @return Void
    */
    function _processAdminEdit()
    {
        if($this->_hash != $this->UserHandler->getUserhash())
        {
            $this->MyPanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
        }
        
        extract($this->post);

        $sql = $this->DatabaseHandler->query("SELECT admin_id FROM " . DB_PREFIX . "admins WHERE admin_id = {$this->_id}");

        if(false == $sql->getNumRows())
        {
            $this->MyPanel->messenger($this->LanguageHandler->admin_err_not_found, GATEWAY . '?a=admins');
        }

        $this->DatabaseHandler->query("
        UPDATE " . DB_PREFIX . "admins SET
            admin_title            = '{$admin_title}',
            admin_description      = '{$admin_description}',
            admin_front_end        = " . (int) $admin_front_end        . ",
            admin_view_home        = " . (int) $admin_view_home        . ",
            admin_conf_general     = " . (int) $admin_conf_general     . ",
            admin_conf_status      = " . (int) $admin_conf_status      . ",
            admin_conf_images      = " . (int) $admin_conf_images      . ",
            admin_conf_cookies     = " . (int) $admin_conf_cookies     . ",
            admin_conf_features    = " . (int) $admin_conf_features    . ",
            admin_conf_email       = " . (int) $admin_conf_email       . ",
            admin_conf_misc        = " . (int) $admin_conf_misc        . ",
            admin_conf_avatars     = " . (int) $admin_conf_avatars     . ",
            admin_secure_names     = " . (int) $admin_secure_names     . ",
            admin_secure_emails    = " . (int) $admin_secure_emails    . ",
            admin_secure_ips       = " . (int) $admin_secure_ips       . ",
            admin_secure_list      = " . (int) $admin_secure_list      . ",
            admin_prune_topics     = " . (int) $admin_prune_topics     . ",
            admin_synch_main       = " . (int) $admin_synch_main       . ",
            admin_synch_stats      = " . (int) $admin_synch_stats      . ",
            admin_synch_members    = " . (int) $admin_synch_members    . ",
            admin_synch_forums     = " . (int) $admin_synch_forums     . ",
            admin_synch_system     = " . (int) $admin_synch_system     . ",
            admin_email_log        = " . (int) $admin_email_log        . ",
            admin_help_add         = " . (int) $admin_help_add         . ",
            admin_help_edit        = " . (int) $admin_help_edit        . ",
            admin_help_remove      = " . (int) $admin_help_remove      . ",
            admin_file_manage      = " . (int) $admin_file_manage      . ",
            admin_forum_add        = " . (int) $admin_forum_add        . ",
            admin_forum_edit       = " . (int) $admin_forum_edit       . ",
            admin_forum_remove     = " . (int) $admin_forum_remove     . ",
            admin_mod_add          = " . (int) $admin_mod_add          . ",
            admin_mod_edit         = " . (int) $admin_mod_edit         . ",
            admin_mod_remove       = " . (int) $admin_mod_remove       . ",
            admin_member_add       = " . (int) $admin_member_add       . ",
            admin_member_edit      = " . (int) $admin_member_edit      . ",
            admin_member_remove    = " . (int) $admin_member_remove    . ",
            admin_group_add        = " . (int) $admin_group_add        . ",
            admin_group_edit       = " . (int) $admin_group_edit       . ",
            admin_group_remove     = " . (int) $admin_group_remove     . ",
            admin_group_masks      = " . (int) $admin_group_masks      . ",
            admin_title_add        = " . (int) $admin_title_add        . ",
            admin_title_edit       = " . (int) $admin_title_edit       . ",
            admin_title_remove     = " . (int) $admin_title_remove     . ",
            admin_validate_regular = " . (int) $admin_validate_regular . ",
            admin_validate_coppa   = " . (int) $admin_validate_coppa   . ",
            admin_skin_add         = " . (int) $admin_skin_add         . ",
            admin_skin_edit        = " . (int) $admin_skin_edit        . ",
            admin_skin_delete      = " . (int) $admin_skin_delete      . ",
            admin_skin_install     = " . (int) $admin_skin_install     . ",
            admin_skin_export      = " . (int) $admin_skin_export      . ",
            admin_css_edit         = " . (int) $admin_css_edit         . ",
            admin_images_add       = " . (int) $admin_images_add       . ",
            admin_images_remove    = " . (int) $admin_images_remove    . ",
            admin_macro_add        = " . (int) $admin_macro_add        . ",
            admin_macro_edit       = " . (int) $admin_macro_edit       . ",
            admin_macro_remove     = " . (int) $admin_macro_remove     . ",
            admin_emot_add         = " . (int) $admin_emot_add         . ",
            admin_emot_edit        = " . (int) $admin_emot_edit        . ",
            admin_emot_remove      = " . (int) $admin_emot_remove      . ",
            admin_filter_add       = " . (int) $admin_filter_add       . ",
            admin_filter_edit      = " . (int) $admin_filter_edit      . ",
            admin_filter_remove    = " . (int) $admin_filter_remove    . ",
            admin_word_edit        = " . (int) $admin_word_edit        . ",
            admin_word_create      = " . (int) $admin_word_create      . ",
            admin_word_import      = " . (int) $admin_word_import      . ",
            admin_word_export      = " . (int) $admin_word_export      . ",
            admin_word_remove      = " . (int) $admin_word_remove      . ",
            admin_manage_admins    = " . (int) $admin_manage_admins    . " 
        WHERE admin_id             = {$this->_id}");

        $this->CacheHandler->updateCache('admins');

        $this->MyPanel->messenger($this->LanguageHandler->admin_err_edit_done, GATEWAY . "?a=admins&code=02&id={$this->_id}");
    }

   // ! Action Method

   /**
    * Removes selected administrators from their groups.
    *
    * @param none
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.3.0
    * @access Private
    * @return Void
    */
    function _addAdminGroup()
    {
		$this->MyPanel->addHeader($this->LanguageHandler->admin_add_header);

		$this->MyPanel->form->startForm(GATEWAY . '?a=admins&amp;code=05');
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

            $sql = $this->DatabaseHandler->query("SELECT admin_id, admin_title FROM " . DB_PREFIX . "admins");
    
            $admin_groups = array();

            while($row = $sql->getRow())
            {
                $admin_groups[$row['admin_id']] = $row['admin_title'];
            }

            $this->MyPanel->form->addWrapSelect('admin_base', $admin_groups, false, false, 
                                              array(1, $this->LanguageHandler->admin_add_base_title,
                                                       $this->LanguageHandler->admin_add_base_desc));


            $this->MyPanel->form->addTextBox('admin_title', '', false, 
                                              array(1, $this->LanguageHandler->admin_title_title,
                                                       $this->LanguageHandler->admin_title_desc));

            $this->MyPanel->form->addTextBox('admin_description', '', false, 
                                              array(1, $this->LanguageHandler->admin_desc_title,
                                                       $this->LanguageHandler->admin_desc_desc));

            $this->MyPanel->form->addHidden('hash', $this->UserHandler->getUserHash());

		$this->MyPanel->form->endForm();
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());
    }

   // ! Action Method

   /**
    * Removes selected administrators from their groups.
    *
    * @param none
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.3.0
    * @access Private
    * @return Void
    */
    function _processAddGroup()
    {
        if($this->_hash != $this->UserHandler->getUserhash())
        {
            $this->MyPanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
        }
        
        extract($this->post);

        $sql = $this->DatabaseHandler->query("SELECT * FROM " . DB_PREFIX . "admins WHERE admin_id = {$admin_base}");

        if(false == $sql->getNumRows())
        {
            $this->MyPanel->messenger($this->LanguageHandler->admin_err_no_role, GATEWAY . '?a=admins&code=04');
        }

        if(false == $admin_title)
        {
            $this->MyPanel->messenger($this->LanguageHandler->admin_err_no_title, GATEWAY . '?a=admins&code=04');
        }

        if(false == $admin_description)
        {
            $this->MyPanel->messenger($this->LanguageHandler->admin_err_no_description, GATEWAY . '?a=admins&code=04');
        }

        $row = $sql->getRow();

        $sql_fields = array();
        $sql_values = array();

        foreach($row as $key => $val)
        {
            if(false == in_array($key, array('admin_title', 'admin_description', 'admin_id')))
            {
                $sql_fields[] = $key;
                $sql_values[] = $val;
            }
        }

        $sql_fields[] = 'admin_title';
        $sql_values[] = "'{$admin_title}'";

        $sql_fields[] = 'admin_description';
        $sql_values[] = "'{$admin_description}'";

        $final_fields = implode(", \n", $sql_fields);
        $final_values = implode(", \n", $sql_values);

        $final_sql = "INSERT INTO " . DB_PREFIX . "admins ({$final_fields}) VALUES ({$final_values})";

        $this->DatabaseHandler->query($final_sql);

        $this->CacheHandler->updateCache('admins');

        $this->MyPanel->messenger($this->LanguageHandler->admin_err_add_done, GATEWAY . '?a=admins');
    }

   // ! Action Method

   /**
    * Removes selected administrators from their groups.
    *
    * @param none
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.3.0
    * @access Private
    * @return Void
    */
    function _processRemoveGroup()
    {
        $sql = $this->DatabaseHandler->query("SELECT admin_id FROM " . DB_PREFIX . "admins WHERE admin_id = {$this->_id}");

        if(false == $sql->getNumRows())
        {
            $this->MyPanel->messenger($this->LanguageHandler->admin_err_not_found, GATEWAY . '?a=admins');
        }

        if($this->_id == 1)
        {
            $this->MyPanel->messenger($this->LanguageHandler->admin_err_no_rem, GATEWAY . '?a=admins');
        }

        $this->DatabaseHandler->query("UPDATE      " . DB_PREFIX . "members SET members_admin_group = 0 WHERE members_admin_group = {$this->_id}");
        $this->DatabaseHandler->query("DELETE FROM " . DB_PREFIX . "admins WHERE admin_id = {$this->_id}");

        $this->CacheHandler->updateCache('admins');

        $this->MyPanel->messenger($this->LanguageHandler->admin_err_del_done, GATEWAY . '?a=admins');
    }
}

?>