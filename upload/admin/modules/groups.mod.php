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
        $this->OnePanel->addHeader($this->LanguageHandler->group_form_header);

		switch($this->_code)
		{
			case '00':
                $this->OnePanel->_make_nav(3, 11, 19, $this->_id);
				$this->_showGroups();
				break;

			case '01':
                $this->OnePanel->_make_nav(3, 11, 20, $this->_id);
				$this->_addGroup();
				break;

			case '02':
                $this->OnePanel->_make_nav(3, 11, 20, $this->_id);
				$this->_doAddGroup();
				break;

			case '03':
                $this->OnePanel->_make_nav(3, 11, -5, $this->_id);
				$this->_editGroup();
				break;

			case '04':
                $this->OnePanel->_make_nav(3, 11, -5, $this->_id);
				$this->_doEditGroup();
				break;

			case '05':
                $this->OnePanel->_make_nav(3, 11, -5, $this->_id);
				$this->_doDeleteGroup();
				break;

			case '06':
                $this->OnePanel->_make_nav(3, 11, -5, $this->_id);
				$this->_showForumMasks();
				break;

			case '07':
                $this->OnePanel->_make_nav(3, 11, -5, $this->_id);
				$this->_updateForumMasks();
				break;

			default:
                $this->OnePanel->_make_nav(3, 11, 19, $this->_id);
				$this->_showGroups();
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
	function _showGroups()
	{
		$sql = $this->DatabaseHandler->query("
		SELECT 
			c.class_id, 
			c.class_title, 
			c.class_prefix, 
			c.class_suffix,
			COUNT(m.members_id) AS class_count
		FROM " . DB_PREFIX . "class c 
			LEFT JOIN " . DB_PREFIX . "members m ON m.members_class = c.class_id
		GROUP BY c.class_id
		ORDER BY class_id ASC");

        $this->OnePanel->table->addColumn($this->LanguageHandler->group_tbl_id, ' width="1%" align="center"');
        $this->OnePanel->table->addColumn($this->LanguageHandler->group_tbl_title, "align='left'");
        $this->OnePanel->table->addColumn($this->LanguageHandler->group_tbl_users, "align='center'");
        $this->OnePanel->table->addColumn('&nbsp;', 'width="15%"');

        $this->OnePanel->table->startTable($this->LanguageHandler->group_tbl_header);

        while($row = $sql->getRow())
        {

            if(in_array($row['class_id'], array(1, 2, 3, 4, 5)))
            {
                $delete = '| --';
            }
            else {
                $delete = " | <a href=\"" . GATEWAY . "?a=groups&amp;code=05&amp;id={$row['class_id']}\"" .
                          "onclick='return confirm(\"{$this->LanguageHandler->group_err_confirm}\");'>"  .
                          "<b>{$this->LanguageHandler->link_delete}</b></a>";
            }

            if($row['class_count'])
            {
                $count = number_format($row['class_count']);
                $count = "<a href=\"" . GATEWAY . "?a=members&amp;code=03&amp;group={$row['class_id']}#results\"" . 
                         "title=\"{$this->LanguageHandler->group_get_mems}.\">{$count}</a>";
            }
            else {
                $count = $this->LanguageHandler->blank;
            }

            if($row['class_id'] == 1)
            {
                $count = $this->LanguageHandler->blank;
            }

            $this->OnePanel->table->addRow(array(array("<strong>{$row['class_id']}</strong>", ' align="center"', 'headera'),
                                                 array($row['class_prefix'] . $row['class_title'] . $row['class_suffix'], 'headerb'),
                                                 array($count, " align='center'", 'headerb'),
                                                 array("<a href=\"" . GATEWAY . "?a=groups&amp;code=06&amp;id={$row['class_id']}\">{$this->LanguageHandler->group_mask_mask_link}</a> | <a href=\"" . GATEWAY . "?a=groups&amp;code=03&amp;id={$row['class_id']}\">" .
                                                       "{$this->LanguageHandler->link_edit}</a> {$delete}", ' align="center"', 'headerc')));
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
    function _doDeleteGroup()
    {
        if(in_array($this->_id, array(1, 2, 3, 4, 5)))
        {
            $this->OnePanel->messenger($this->LanguageHandler->group_del_err_sys_remove, GATEWAY . '?a=groups');
        }

        $sql = $this->DatabaseHandler->query("
        SELECT 
            forum_id, 
            forum_access_matrix 
        FROM " . DB_PREFIX . "forums 
        ORDER BY 
            forum_parent, 
            forum_position");

        while($row = $sql->getRow())
        {
            extract(unserialize(stripslashes($row['forum_access_matrix'])));

            $can_reply = explode('|', $can_reply);
            $can_start = explode('|', $can_start);
            $can_view  = explode('|', $can_view);
            $can_read  = explode('|', $can_read);

            foreach($can_reply as $key => $val)
            {
                if($val == $this->_id)
                {
                    unset($can_reply[$key]);
                }
            }

            foreach($can_start as $key => $val)
            {
                if($val == $this->_id)
                {
                    unset($can_start[$key]);
                }
            }

            foreach($can_view as $key => $val)
            {
                if($val == $this->_id)
                {
                    unset($can_view[$key]);
                }
            }

            foreach($can_read as $key => $val)
            {
                if($val == $this->_id)
                {
                    unset($can_read[$key]);
                }
            }

            $matrix = array();

            $matrix['can_view']  = implode('|', $can_view);
            $matrix['can_read']  = implode('|', $can_read);
            $matrix['can_reply'] = implode('|', $can_reply);
            $matrix['can_start'] = implode('|', $can_start);

            $matrix = addslashes(serialize($matrix));

            $this->DatabaseHandler->query("
            UPDATE " . DB_PREFIX . "forums 
            SET forum_access_matrix = '{$matrix}' 
            WHERE forum_id = {$row['forum_id']}");
        }

        $this->DatabaseHandler->query("UPDATE "      . DB_PREFIX . "members SET members_class = 2 WHERE members_class = {$this->_id}");
        $this->DatabaseHandler->query("DELETE FROM " . DB_PREFIX . "class WHERE class_id = {$this->_id}");

        $this->CacheHandler->updateCache('groups');

        $this->OnePanel->messenger($this->LanguageHandler->group_del_err_done, GATEWAY . '?a=groups');
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
    function _addGroup()
    {
		$this->OnePanel->form->startForm(GATEWAY . '?a=groups&amp;code=02');
		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());

			$this->OnePanel->form->addTextBox('name', false, false, 
									          array(1, $this->LanguageHandler->group_new_form_name_title,
                                                       $this->LanguageHandler->group_new_form_name_desc));

            $sql = $this->DatabaseHandler->query("SELECT class_id, class_title, class_suffix, class_prefix FROM " . DB_PREFIX . "class ORDER BY class_id");

            $list = array();
            while($row = $sql->getRow())
            {
                $list[$row['class_id']] = $row['class_title'];
            }

            $this->OnePanel->form->addWrapSelect('base', $list, 2, false, 
                                             array(1, $this->LanguageHandler->group_new_form_base_title,
                                                      $this->LanguageHandler->group_new_form_base_desc));

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
    function _doAddGroup()
    {
        if($this->_hash != $this->UserHandler->getUserhash())
        {
            $this->OnePanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
        }

        extract($this->post);

        if(false == $name)
        {
            $this->OnePanel->messenger($this->LanguageHandler->group_new_err_no_name, GATEWAY . '?a=groups&amp;code=01');
        }

		$sql = $this->DatabaseHandler->query("SELECT class_id FROM " . DB_PREFIX . "class WHERE class_title = '{$name}'");

		if($sql->getNumRows())
        {
			$this->OnePanel->messenger($this->LanguageHandler->group_new_err_name_taken, GATEWAY . '?a=groups&amp;code=01');
        }

        $this->DatabaseHandler->query("INSERT INTO " . DB_PREFIX . "class(class_title) VALUES('{$name}')");

        $sql = $this->DatabaseHandler->query("SELECT * FROM " . DB_PREFIX . "class WHERE class_id = {$base}");
        $id  = $this->DatabaseHandler->insertid();
        $row = $sql->getRow();

        $this->DatabaseHandler->query("
        UPDATE " . DB_PREFIX . "class SET
			class_canPost             = {$row['class_canPost']},
			class_canSearch           = {$row['class_canSearch']},
			class_canSeeStats         = {$row['class_canSeeStats']},
			class_canViewHelp         = {$row['class_canViewHelp']},
			class_canViewMembers      = {$row['class_canViewMembers']},
			class_canUseNotes         = {$row['class_canUseNotes']},
			class_canSendNotes        = {$row['class_canSendNotes']},
			class_canGetNotes         = {$row['class_canGetNotes']},
			class_canDeleteOwnPosts   = {$row['class_canDeleteOwnPosts']},
			class_canStartTopics	  = {$row['class_canStartTopics']},
			class_canReadTopics		  = {$row['class_canReadTopics']},
			class_canEditProfile	  = {$row['class_canEditProfile']},
			class_canViewProfiles	  = {$row['class_canViewProfiles']},
			class_canPostLocked		  = {$row['class_canPostLocked']},
			class_canSeeActive		  = {$row['class_canSeeActive']},
			class_sigLength			  = {$row['class_sigLength']},
			class_canSeeHidden		  = {$row['class_canSeeHidden']},
			class_canPostHidden		  = {$row['class_canPostHidden']},
			class_canSendEmail        = {$row['class_canSendEmail']},
			class_floodDelay		  = {$row['class_floodDelay']},
			class_maxNotes            = {$row['class_maxNotes']},
            class_change_pass         = {$row['class_change_pass']},
            class_change_email        = {$row['class_change_email']},
            class_see_hidden_skins    = {$row['class_see_hidden_skins']},
            class_canSubscribe        = {$row['class_canSubscribe']},
            class_canViewClosedBoard  = {$row['class_canViewClosedBoard']},
            class_hidden              = {$row['class_hidden']},
            class_upload_avatars      = {$row['class_upload_avatars']},
            class_use_avatars         = {$row['class_use_avatars']},
            class_can_post_events     = {$row['class_can_post_events']},
            class_can_start_polls     = {$row['class_can_start_polls']},
            class_can_vote_polls      = {$row['class_can_vote_polls']},
            class_upload_max          = {$row['class_upload_max']}
		WHERE class_id = {$id}");

        $this->CacheHandler->updateCache('groups');

        $this->OnePanel->messenger($this->LanguageHandler->group_new_err_done, GATEWAY . "?a=groups&code=03&id={$id}");
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
    function _editGroup()
    {
        $sql = $this->DatabaseHandler->query("SELECT * FROM " . DB_PREFIX . "class WHERE class_id = {$this->_id}");

        if(false == $sql->getNumRows())
        {
            $this->OnePanel->messenger($this->LanguageHandler->group_edit_err_no_results, GATEWAY . '?a=groups');
        }

        $row = $sql->getRow();

		$this->OnePanel->form->startForm(GATEWAY . "?a=groups&amp;code=04&amp;id={$row['class_id']}");
		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());

			$this->OnePanel->form->addTextBox('title', $this->ParseHandler->parseText($row['class_title'], F_ENTS), false, 
									array(1, $this->LanguageHandler->group_edit_name_title,
                                             $this->LanguageHandler->group_edit_name_desc));

			$this->OnePanel->form->addTextBox('class_prefix', $this->ParseHandler->parseText($row['class_prefix'], F_ENTS), false, 
									array(1, $this->LanguageHandler->group_edit_pre_title,
                                             $this->LanguageHandler->group_edit_pre_desc));

			$this->OnePanel->form->addTextBox('class_suffix', $this->ParseHandler->parseText($row['class_suffix'], F_ENTS), false, 
									array(1, $this->LanguageHandler->group_edit_suf_title,
                                             $this->LanguageHandler->group_edit_suf_desc));

			$this->OnePanel->form->addTextBox('class_sigLength', $row['class_sigLength'], false, 
									array(1, $this->LanguageHandler->group_edit_sig_title,
                                             $this->LanguageHandler->group_edit_sig_desc));

			$this->OnePanel->form->addTextBox('class_floodDelay', $row['class_floodDelay'], false, 
									array(1, $this->LanguageHandler->group_edit_flood_title,
                                             $this->LanguageHandler->group_edit_flood_desc));

			$this->OnePanel->form->addTextBox('class_maxNotes', $row['class_maxNotes'], false, 
									array(1, $this->LanguageHandler->group_edit_max_title,
                                             $this->LanguageHandler->group_edit_max_desc));

			$this->OnePanel->form->addTextBox('class_upload_max', $row['class_upload_max'], false, 
									array(1, $this->LanguageHandler->group_edit_file_title,
                                             $this->LanguageHandler->group_edit_file_desc));

			$this->OnePanel->form->addCheckBox('class_hidden', 1, false, 
									array(1, $this->LanguageHandler->group_form_hide_title,
                                             $this->LanguageHandler->group_form_hide_desc), false, $row['class_hidden'], $this->LanguageHandler->group_form_label, 1);

            $this->OnePanel->form->addHidden('hash', $this->UserHandler->getUserHash());

            $this->OnePanel->form->appendBuffer("</div>");
            $this->OnePanel->form->appendBuffer("<h2>{$this->LanguageHandler->group_tbl_perm_desc}</h2>");

    		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());

			$this->OnePanel->table->addColumn($this->LanguageHandler->group_tbl_perms, "align='left'");
			$this->OnePanel->table->addColumn($this->LanguageHandler->group_tbl_val,   " width='1%'");

			$this->OnePanel->table->startTable($this->LanguageHandler->group_tbl_perm_header);

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_can_post, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_canPost', 1, false, false, true, 
										   ($row['class_canPost'] ? true : false)), " width='25%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_can_search, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_canSearch', 1, false, false, true, 
										   ($row['class_canSearch'] ? true : false)), " width='20%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_see_stats, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_canSeeStats', 1, false, false, true, 
										   ($row['class_canSeeStats'] ? true : false)), " width='20%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_see_help, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_canViewHelp', 1, false, false, true, 
										   ($row['class_canViewHelp'] ? true : false)), " width='20%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_see_members, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_canViewMembers', 1, false, false, true, 
										   ($row['class_canViewMembers'] ? true : false)), " width='20%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_use_notes, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_canUseNotes', 1, false, false, true, 
										   ($row['class_canUseNotes'] ? true : false)), " width='20%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_send_notes, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_canSendNotes', 1, false, false, true, 
										   ($row['class_canSendNotes'] ? true : false)), " width='20%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_get_notes, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_canGetNotes', 1, false, false, true, 
										   ($row['class_canGetNotes'] ? true : false)), " width='20%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_del_own_posts, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_canDeleteOwnPosts', 1, false, false, true, 
										   ($row['class_canDeleteOwnPosts'] ? true : false)), " width='20%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_start_topics, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_canStartTopics', 1, false, false, true, 
										   ($row['class_canStartTopics'] ? true : false)), " width='20%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_edit_own_posts, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_canEditOwnPosts', 1, false, false, true, 
										   ($row['class_canEditOwnPosts'] ? true : false)), " width='20%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_read_topics, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_canReadTopics', 1, false, false, true, 
										   ($row['class_canReadTopics'] ? true : false)), " width='20%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_edit_profile, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_canEditProfile', 1, false, false, true, 
										   ($row['class_canEditProfile'] ? true : false)), " width='20%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_see_profiles, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_canViewProfiles', 1, false, false, true, 
										   ($row['class_canViewProfiles'] ? true : false)), " width='20%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_post_locked, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_canPostLocked', 1, false, false, true, 
										   ($row['class_canPostLocked'] ? true : false)), " width='20%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_see_active, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_canSeeActive', 1, false, false, true, 
										   ($row['class_canSeeActive'] ? true : false)), " width='20%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_see_hidden, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_canSeeHidden', 1, false, false, true, 
										   ($row['class_canSeeHidden'] ? true : false)), " width='20%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_post_hidden, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_canPostHidden', 1, false, false, true, 
										   ($row['class_canPostHidden'] ? true : false)), " width='20%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_send_mail, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_canSendEmail', 1, false, false, true, 
										   ($row['class_canSendEmail'] ? true : false)), " width='20%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_change_mail, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_change_email', 1, false, false, true, 
										   ($row['class_change_email'] ? true : false)), " width='20%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_change_pass, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_change_pass', 1, false, false, true, 
										   ($row['class_change_pass'] ? true : false)), " width='20%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_see_hidden_skins, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_see_hidden_skins', 1, false, false, true, 
										   ($row['class_see_hidden_skins'] ? true : false)), " width='20%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_can_subscribe, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_canSubscribe', 1, false, false, true, 
										   ($row['class_canSubscribe'] ? true : false)), " width='20%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_see_closed_board, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_canViewClosedBoard', 1, false, false, true, 
										   ($row['class_canViewClosedBoard'] ? true : false)), " width='20%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_can_post_events, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_can_post_events', 1, false, false, true, 
										   ($row['class_can_post_events'] ? true : false)), " width='20%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_upload_avatars, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_upload_avatars', 1, false, false, true, 
										   ($row['class_upload_avatars'] ? true : false)), " width='20%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_use_avatars, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_use_avatars', 1, false, false, true, 
										   ($row['class_use_avatars'] ? true : false)), " width='20%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_vote_polls, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_can_vote_polls', 1, false, false, true, 
										   ($row['class_can_vote_polls'] ? true : false)), " width='20%'", 'headerc')));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->group_tbl_start_polls, false, 'headerb'),
										   array($this->OnePanel->form->addYesNo('class_can_start_polls', 1, false, false, true, 
										   ($row['class_can_start_polls'] ? true : false)), " width='20%'", 'headerc')));

			$this->OnePanel->table->endTable(true);
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
    function _doEditGroup()
    {
        if($this->_hash != $this->UserHandler->getUserhash())
        {
            $this->OnePanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
        }

        extract($this->post);

        $sql = $this->DatabaseHandler->query("SELECT class_title FROM " . DB_PREFIX . "class WHERE class_id = {$this->_id}");

        if(false == $sql->getNumRows())
        {
            $this->OnePanel->messenger($this->LanguageHandler->group_edit_err_no_results, GATEWAY . "?a=groups");
        }

        $row = $sql->getRow();

        if($row['class_title'] != $title)
        {
            $sql = $this->DatabaseHandler->query("SELECT class_id FROM " . DB_PREFIX . "class WHERE class_title = '{$title}'");

            if($sql->getNumRows())
            {
                $this->OnePanel->messenger($this->LanguageHandler->group_new_err_name_taken, GATEWAY . "?a=groups&amp;code=03&amp;id={$this->_id}");
            }
        }

        if(false == $title)
        {
            $this->OnePanel->messenger('Your new group must have a name.', GATEWAY . "?a=groups&amp;code=03&amp;id={$this->_id}");
        }

        $class_hidden = isset($class_hidden) ? (int) $class_hidden : false;

        $this->DatabaseHandler->query("
        UPDATE " . DB_PREFIX . "class SET
            class_title              = '{$title}',
            class_prefix             = '" . strip_tags($this->ParseHandler->uncleanString($class_prefix), '<b><s><i><u><span>') . "',
            class_suffix             = '" . strip_tags($this->ParseHandler->uncleanString($class_suffix), '<b><s><i><u><span>') . "',
            class_floodDelay         = " . (int) $class_floodDelay          . ",
            class_sigLength          = " . (int) $class_sigLength           . ",
            class_maxNotes           = " . (int) $class_maxNotes            . ",
			class_canPost            = " . (int) $class_canPost             . ",
			class_canSearch          = " . (int) $class_canSearch           . ",
			class_canSeeStats        = " . (int) $class_canSeeStats         . ",
			class_canViewHelp        = " . (int) $class_canViewHelp         . ",
			class_canViewMembers     = " . (int) $class_canViewMembers      . ",
			class_canUseNotes        = " . (int) $class_canUseNotes         . ",
			class_canSendNotes       = " . (int) $class_canSendNotes        . ",
			class_canGetNotes        = " . (int) $class_canGetNotes         . ",
			class_canDeleteOwnPosts  = " . (int) $class_canDeleteOwnPosts   . ",
			class_canStartTopics	 = " . (int) $class_canStartTopics      . ",
			class_canEditOwnPosts	 = " . (int) $class_canEditOwnPosts     . ",
			class_canReadTopics		 = " . (int) $class_canReadTopics       . ",
			class_canEditProfile	 = " . (int) $class_canEditProfile      . ",
			class_canViewProfiles	 = " . (int) $class_canViewProfiles     . ",
			class_canPostLocked		 = " . (int) $class_canPostLocked       . ",
			class_canSeeActive		 = " . (int) $class_canSeeActive        . ",
			class_canSeeHidden		 = " . (int) $class_canSeeHidden        . ",
			class_canPostHidden		 = " . (int) $class_canPostHidden       . ",
			class_canSendEmail       = " . (int) $class_canSendEmail        . ",
            class_change_pass        = " . (int) $class_change_pass         . ",
            class_change_email       = " . (int) $class_change_email        . ",
            class_see_hidden_skins   = " . (int) $class_see_hidden_skins    . ",
            class_canSubscribe       = " . (int) $class_canSubscribe        . ",
            class_canViewClosedBoard = " . (int) $class_canViewClosedBoard  . ",
            class_hidden             = " . (int) $class_hidden              . ",
            class_upload_avatars     = " . (int) $class_upload_avatars      . ",
            class_use_avatars        = " . (int) $class_use_avatars         . ",
            class_can_post_events    = " . (int) $class_can_post_events     . ",
            class_can_start_polls    = " . (int) $class_can_start_polls     . ",
            class_can_vote_polls     = " . (int) $class_can_vote_polls      . ",
            class_upload_max         = " . (int) $class_upload_max          . "
		WHERE class_id = {$this->_id}");

        $this->CacheHandler->updateCache('groups');

        $this->OnePanel->messenger($this->LanguageHandler->group_edit_err_done, GATEWAY . "?a=groups&code=03&id={$this->_id}");
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
    function _showForumMasks()
    {
        $sql = $this->DatabaseHandler->query("
        SELECT 
            class_title, 
            class_id 
        FROM " . DB_PREFIX . "class 
        WHERE class_id = {$this->_id}");

        if(false == $sql->getNumRows())
        {
            $this->OnePanel->messenger($this->LanguageHandler->group_err_no_match, GATEWAY . "?a=groups");
        }

        $group = $sql->getRow();

        $sql = $this->DatabaseHandler->query("
        SELECT * 
        FROM " . DB_PREFIX . "forums 
        ORDER BY 
            forum_parent, 
            forum_position");

        $list = array();
        while($row = $sql->getRow())
        {
            $list[] = $row;
        }

        $this->ForumHandler->setForumList($list);

        $forums = $this->_makeForumList($list);

		$this->OnePanel->appendBuffer("<form method=\"post\" action=\"" . GATEWAY . "?a=groups&amp;code=07&amp;id={$this->_id}\">");

            $this->OnePanel->form->appendBuffer("<h2>{$this->LanguageHandler->forum_new_matrix_desc}</h2>");

			$this->OnePanel->table->addColumn($this->LanguageHandler->forum_new_tbl_group,  "align='left'");
			$this->OnePanel->table->addColumn($this->LanguageHandler->forum_new_tbl_view,   "align='center'");
			$this->OnePanel->table->addColumn($this->LanguageHandler->forum_new_tbl_read,   "align='center'");
			$this->OnePanel->table->addColumn($this->LanguageHandler->forum_new_tbl_post,   "align='center'");
			$this->OnePanel->table->addColumn($this->LanguageHandler->forum_new_tbl_topics, "align='center'");
            $this->OnePanel->table->addColumn($this->LanguageHandler->forum_new_tbl_upload, "align='center'");

            $this->OnePanel->table->startTable(sprintf($this->LanguageHandler->group_matrix_header, $group['class_title']));

            for($i = 0; $i < sizeof($forums); $i++)
            {
                extract(unserialize(stripslashes($forums[$i]['matrix'])));

                $can_reply  = explode('|', $can_reply);
                $can_start  = explode('|', $can_start);
                $can_view   = explode('|', $can_view);
                $can_read   = explode('|', $can_read);
                $can_upload = explode('|', $can_upload);

                if($forums[$i]['is_parent'])
                {
                    $this->OnePanel->table->addRow(array(array($forums[$i]['forum_name'], ' style="background-color: #F0F0F0; font-weight: bold;"', 'headerb'),
                                                   array($this->OnePanel->form->addCheckBox('can_view_'   . $forums[$i]['forum_id'], 1, false, false, true, in_array($group['class_id'], $can_view)   ? true : false, false, 'center', 'checkwrap_1'), ' style="background-color: #F0F0F0; font-weight: bold;"'),
                                                   array($this->OnePanel->form->addCheckBox('can_read_'   . $forums[$i]['forum_id'], 1, false, false, true, in_array($group['class_id'], $can_read)   ? true : false, false, 'center', 'checkwrap_2'), ' style="background-color: #F0F0F0; font-weight: bold;"'),
                                                   array($this->OnePanel->form->addCheckBox('can_reply_'  . $forums[$i]['forum_id'], 1, false, false, true, in_array($group['class_id'], $can_reply)  ? true : false, false, 'center', 'checkwrap_3'), ' style="background-color: #F0F0F0; font-weight: bold;"'),
                                                   array($this->OnePanel->form->addCheckBox('can_start_'  . $forums[$i]['forum_id'], 1, false, false, true, in_array($group['class_id'], $can_start)  ? true : false, false, 'center', 'checkwrap_4'), ' style="background-color: #F0F0F0; font-weight: bold;"'),
                                                   array($this->OnePanel->form->addCheckBox('can_upload_' . $forums[$i]['forum_id'], 1, false, false, true, in_array($group['class_id'], $can_upload) ? true : false, false, 'center', 'checkwrap'),   ' style="background-color: #F0F0F0; font-weight: bold;"')));
                }
                else {
                    $this->OnePanel->table->addRow(array(array($forums[$i]['forum_name'], false, 'headerb'),
                                                   array($this->OnePanel->form->addCheckBox('can_view_'   . $forums[$i]['forum_id'], 1, false, false, true, in_array($group['class_id'], $can_view)   ? true : false, false, 'center', 'checkwrap_1')),
                                                   array($this->OnePanel->form->addCheckBox('can_read_'   . $forums[$i]['forum_id'], 1, false, false, true, in_array($group['class_id'], $can_read)   ? true : false, false, 'center', 'checkwrap_2')),
                                                   array($this->OnePanel->form->addCheckBox('can_reply_'  . $forums[$i]['forum_id'], 1, false, false, true, in_array($group['class_id'], $can_reply)  ? true : false, false, 'center', 'checkwrap_3')),
                                                   array($this->OnePanel->form->addCheckBox('can_start_'  . $forums[$i]['forum_id'], 1, false, false, true, in_array($group['class_id'], $can_start)  ? true : false, false, 'center', 'checkwrap_4')),
                                                   array($this->OnePanel->form->addCheckBox('can_upload_' . $forums[$i]['forum_id'], 1, false, false, true, in_array($group['class_id'], $can_upload) ? true : false, false, 'center', 'checkwrap'))));

                }

            }

            $this->OnePanel->form->addHidden('hash', $this->UserHandler->getUserHash());
    		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());

            $this->OnePanel->table->endTable(true);
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
	function _makeForumList($list, $parent = 0, $space = '', $data = array())
	{
		$array = $this->ForumHandler->_sortForums($parent);

		$out = null;
		foreach($array as $val)
		{
            $dot       = $parent ? '|' : '';
            $is_parent = false;

            foreach($list as $forum)
            {
                if($forum['forum_parent'] == $val['forum_id'])
                {
                    $is_parent = true;
                }
            }

            $data[] = array('forum_name' => $dot . $space . ' ' . $val['forum_name'], 
                            'forum_id'   => $val['forum_id'],
                            'is_parent'  => $is_parent, 
                            'matrix'     => $val['forum_access_matrix']);

			$data   = $this->_makeForumList($list, $val['forum_id'], $space . '--', $data);
		}

		return $data;
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
    function _updateForumMasks()
    {
        if($this->_hash != $this->UserHandler->getUserhash())
        {
            $this->OnePanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
        }

        extract($this->post);

        $sql = $this->DatabaseHandler->query("
        SELECT 
            class_title, 
            class_id 
        FROM " . DB_PREFIX . "class 
        WHERE class_id = {$this->_id}");

        if(false == $sql->getNumRows())
        {
            $this->OnePanel->messenger($this->LanguageHandler->group_err_no_match, GATEWAY . "?a=groups");
        }

        $group = $sql->getRow();

        $sql = $this->DatabaseHandler->query("
        SELECT * 
        FROM " . DB_PREFIX . "forums 
        ORDER BY 
            forum_parent, 
            forum_position");

        while($row = $sql->getRow())
        {
            extract(unserialize(stripslashes($row['forum_access_matrix'])));

            $can_reply  = explode('|', $can_reply);
            $can_start  = explode('|', $can_start);
            $can_view   = explode('|', $can_view);
            $can_read   = explode('|', $can_read);
            $can_upload = explode('|', $can_upload);

            $matrix = array();

            $matrix['can_view']   = implode('|', $this->_updateMask($can_view,   $group['class_id'], $row['forum_id'], 'can_view_'));
            $matrix['can_read']   = implode('|', $this->_updateMask($can_read,   $group['class_id'], $row['forum_id'], 'can_read_'));
            $matrix['can_reply']  = implode('|', $this->_updateMask($can_reply,  $group['class_id'], $row['forum_id'], 'can_reply_'));
            $matrix['can_start']  = implode('|', $this->_updateMask($can_reply,  $group['class_id'], $row['forum_id'], 'can_start_'));
            $matrix['can_upload'] = implode('|', $this->_updateMask($can_upload, $group['class_id'], $row['forum_id'], 'can_upload_'));

            $matrix = addslashes(serialize($matrix));

            $this->DatabaseHandler->query("
            UPDATE " . DB_PREFIX . "forums 
            SET forum_access_matrix = '{$matrix}' 
            WHERE forum_id = {$row['forum_id']}");
        }

        $this->CacheHandler->updateCache('forums');

        $this->OnePanel->messenger($this->LanguageHandler->group_matrix_done, GATEWAY . "?a=groups&code=06&id={$group['class_id']}");
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
    function _updateMask($mask, $group_id, $forum_id, $value)
    {
        if(isset($this->post[$value . $forum_id]))
        {
            if(false == in_array($group_id, $mask))
            {
                $mask[] = $group_id;
            }
        }
        else {
            foreach($mask as $key => $val)
            {
                if($val == $group_id)
                {
                    unset($mask[$key]);
                }
            }
        }

        return $mask;
    }
}

?>