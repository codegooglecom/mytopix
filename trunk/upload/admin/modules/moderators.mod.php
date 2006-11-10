<?php

if(!defined('SYSTEM_ACTIVE')) die('<b>ERROR:</b> Hack attempt detected!');

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
	var $_comp1;

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

		$this->_id   = isset($this->get['id'])	? (int) $this->get['id']	: 0;
		$this->_code = isset($this->get['code'])  ?	   $this->get['code']  : 00;
		$this->_hash = isset($this->post['hash']) ?	   $this->post['hash'] : null;

		require_once SYSTEM_PATH . 'admin/lib/onepanel.php';
		$this->OnePanel = new OnePanel($this);

		$this->_comp1 = array('contain' => $this->LanguageHandler->comp_contain,
							  'equal'   => $this->LanguageHandler->comp_equal, 
							  'begin'   => $this->LanguageHandler->comp_begin, 
							  'end'	 => $this->LanguageHandler->comp_end);
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
		$this->OnePanel->addHeader($this->LanguageHandler->mod_header);

		$this->OnePanel->_make_nav(2, 8);

		switch($this->_code)
		{
			case '00':
				$this->_showModerators();
				break;

			case '01':
				$this->_showStepTwo();
				break;

			case '02':
				$this->_findUsers();
				break;

			case '03':
				$this->_showAddForm();
				break;

			case '04':
				$this->_doModAdd();
				break;

			case '05':
				$this->_showModEditForm();
				break;

			case '06':
				$this->_doModEdit();
				break;

			case '07':
				$this->_doRemoveMod();
				break;

			default:
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
	function _showModerators()
	{
		$this->OnePanel->appendBuffer($this->LanguageHandler->mod_step_one_tip);

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

		$this->OnePanel->appendBuffer("<form method=\"post\" action=\"" . GATEWAY . "?a=moderators&amp;code=01\">");

			$this->OnePanel->table->addColumn($this->LanguageHandler->mod_table_add,   "align='center' width='2%'");
			$this->OnePanel->table->addColumn($this->LanguageHandler->mod_table_forum, "align='left'");
			$this->OnePanel->table->addColumn($this->LanguageHandler->mod_table_mods,  "align='left'");

			$this->OnePanel->table->startTable($this->LanguageHandler->mod_forum_list_title);

			for($i = 0; $i < sizeof($forums); $i++)
			{
				$sql = $this->DatabaseHandler->query("
				SELECT * 
				FROM " . DB_PREFIX . "moderators 
				WHERE mod_forum = {$forums[$i]['forum_id']}");

				if(false == $sql->getNumRows())
				{
					$mods = "<em>{$this->LanguageHandler->mod_no_mods}</em>";
				}
				else {
					$mods = "<table width=\"100%\" cellpadding=\"0\" cellspacing=\"1\" style=\"border: 1px solid #CCC; border-bottom-width: 0;\">";
					
					$inc = 0;

					while($row = $sql->getRow())
					{
						$inc++;

						if($row['mod_group'])
						{
							$prefix = $this->LanguageHandler->mod_main_prefix;
							$link   = GATEWAY . "?a=groups&amp;code=03&amp;id={$row['mod_group']}";
						}
						else {
							$prefix = '';
							$link   = GATEWAY . "?a=members&amp;code=05&amp;id={$row['mod_user_id']}";
						}

						$mods .= "<tr>";
						$mods .= "<td class=\"none\"><strong>{$inc}.</strong> {$prefix} <a href=\"{$link}\">{$row['mod_user_name']}</a></td>";
						$mods .= "<td class=\"none\" align=\"right\"><a href=\"" . GATEWAY . "?a=moderators&amp;code=05&amp;id={$row['mod_id']}\">{$this->LanguageHandler->link_edit}</a> | <a href=\"" . GATEWAY . "?a=moderators&amp;code=07&amp;id={$row['mod_id']}\" onclick=\"javascript: return confirm('{$this->LanguageHandler->mod_del_js}');\"><strong>{$this->LanguageHandler->link_delete}</strong></a></td>";
						$mods .= "</tr>";
					}

					$mods .= "</table>";
				}
				
				$this->OnePanel->table->addRow(array(array($this->OnePanel->form->addCheckBox("forums[{$forums[$i]['forum_id']}]", $forums[$i]['forum_id'], false, false, true, false, false, false, 'checkwrap_4'), " valign=\"top\""),
													 array($forums[$i]['forum_name'], " valign=\"middle\""),
													 array($mods)));

			}

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
			$dot	   = $parent ? '<strong>|</strong>' : '';
			$is_parent = false;
			$val['forum_name'] = "<a href=\"" . GATEWAY . "?a=forums&amp;code=04&amp;forum={$val['forum_id']}\">{$val['forum_name']}</a>";

			foreach($list as $forum)
			{
				if(false == $val['forum_parent'])
				{
					$is_parent = true;
					$val['forum_name'] = "<strong>{$val['forum_name']}</strong>";
				}
			}

			$data[] = array('forum_name' => $dot . $space . ' ' . $val['forum_name'], 
							'forum_id'   => $val['forum_id'],
							'is_parent'  => $is_parent);

			$data   = $this->_makeForumList($list, $val['forum_id'], $space . '<strong>--</strong>--', $data);
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
	function _showStepTwo()
	{
		extract($this->post);

		$this->OnePanel->appendBuffer($this->LanguageHandler->mod_step_two_tip);

		if(false == $forums)
		{
			$this->OnePanel->messenger($this->LanguageHandler->mod_err_no_forum, GATEWAY . '?a=moderators');
		}

		$this->OnePanel->form->startForm(GATEWAY . '?a=moderators&amp;code=02');
		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());

			$select = $this->OnePanel->form->addSelect('match', $this->_comp1, false, false, false, true);
			$match  = $this->OnePanel->form->addTextBox('name', false,		 false, false, true);

			$this->OnePanel->form->addWrap($select . $match, 
										   $this->LanguageHandler->mod_step_two_name_title,
										   $this->LanguageHandler->mod_step_two_name_desc,
										   true);

			$this->OnePanel->form->addHidden('forums', serialize($forums));
			$this->OnePanel->form->addHidden('hash', $this->UserHandler->getUserHash());

		$this->OnePanel->form->endForm($this->LanguageHandler->mod_step_two_submit);
		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());

		$this->OnePanel->form->startForm(GATEWAY . '?a=moderators&amp;code=03');
		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());

			$sql = $this->DatabaseHandler->query("
			SELECT 
				class_id, 
				class_title 
			FROM " . DB_PREFIX . "class 
			WHERE class_id <> 1 ORDER BY class_id");

			$list = array();
			while($row = $sql->getRow())
			{
				$list[$row['class_id']] = $row['class_title'];
			}

			$groups = $this->OnePanel->form->addSelect('group', $list, false, false, false, true);

			$this->OnePanel->form->addWrap($groups, 
										   $this->LanguageHandler->mod_step_two_group_title,
										   $this->LanguageHandler->mod_step_two_group_desc,
										   true);

			$this->OnePanel->form->addHidden('forums', serialize($forums));
			$this->OnePanel->form->addHidden('hash', $this->UserHandler->getUserHash());

		$this->OnePanel->form->endForm($this->LanguageHandler->mod_step_two_submit_group);
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
	function _findUsers()
	{
		if($this->_hash != $this->UserHandler->getUserhash())
		{
			$this->OnePanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
		}

		extract($this->post);

		if(false == $name)
		{
			$this->OnePanel->messenger($this->LanguageHandler->mod_err_no_name, GATEWAY . '?a=moderators&code=00');
		}

		switch($match)
		{
			case 'equal':

				$match_sql = "members_name = '{$name}'";
				break;

			case 'contain':

				$match_sql = "members_name LIKE '%{$name}%'";
				break;

			case 'begin':

				$match_sql = "members_name LIKE '{$name}%'";
				break;

			case 'end':

				$match_sql = "members_name LIKE '%{$name}'";
				break;
		}

		$sql = $this->DatabaseHandler->query("
		SELECT 
			members_name, 
			members_id 
		FROM " . DB_PREFIX . "members 
		WHERE 
			{$match_sql} AND
			members_id <> 1
		ORDER BY members_name");

		if(false == $sql->getNumRows())
		{
			$this->OnePanel->messenger($this->LanguageHandler->mod_err_no_match, GATEWAY . '?a=moderators&code=01');
		}

		$list = array();
		while($row = $sql->getRow())
		{
			$list[$row['members_id']] = $row['members_name'];
		}

		$this->OnePanel->appendBuffer($this->LanguageHandler->mod_step_two_tip);

		$this->OnePanel->form->startForm(GATEWAY . '?a=moderators&amp;code=02');
		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());

			$select = $this->OnePanel->form->addSelect('match', $this->_comp1, $match, false, false, true);
			$match  = $this->OnePanel->form->addTextBox('name', $name,		 false, false, true);

			$this->OnePanel->form->addWrap($select . $match, 
										   $this->LanguageHandler->mod_step_two_name_title,
										   $this->LanguageHandler->mod_step_two_name_desc,
										   true);

			$this->OnePanel->form->addHidden('forums', stripslashes($this->ParseHandler->uncleanString($forums)));
			$this->OnePanel->form->addHidden('hash', $this->UserHandler->getUserHash());

		$this->OnePanel->form->endForm($this->LanguageHandler->mod_step_two_submit);
		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());

		$this->OnePanel->appendBuffer($this->LanguageHandler->mod_step_three_tip);

		$this->OnePanel->form->startForm(GATEWAY . '?a=moderators&amp;code=03');
		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());

			$this->OnePanel->form->addSelect('user',   $list, false, false,
											  array(1, sprintf($this->LanguageHandler->mod_step_three_list_title, $sql->getNumRows()),
													   $this->LanguageHandler->mod_step_three_list_desc));

			$this->OnePanel->form->addHidden('forums', stripslashes($this->ParseHandler->uncleanString($forums)));
			$this->OnePanel->form->addHidden('hash', $this->UserHandler->getUserHash());

		$this->OnePanel->form->endForm($this->LanguageHandler->mod_step_three_submit);
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
	function _showAddForm()
	{
		if($this->_hash != $this->UserHandler->getUserhash())
		{
			$this->OnePanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
		}

		extract($this->post);

		$forums = stripslashes($this->ParseHandler->uncleanString($forums));

		$forums_sql = implode("','", unserialize($forums));

		$user  = false == isset($user)  ? (int) $user  : $user;
		$group = false == isset($group) ? (int) $group : $group;

		if($group)
		{
			$sql = $this->DatabaseHandler->query("
			SELECT mod_id 
			FROM " . DB_PREFIX . "moderators 
			WHERE 
				mod_group =  {$group} AND
				mod_forum IN ('{$forums_sql}')");

			if($sql->getNumRows())
			{
				$this->OnePanel->messenger($this->LanguageHandler->mod_err_group_dups, GATEWAY . '?a=moderators');
			}
		}
		else if($user)
		{
			$sql = $this->DatabaseHandler->query("
			SELECT mod_id 
			FROM " . DB_PREFIX . "moderators 
			WHERE 
				mod_user_id =  {$user} AND
				mod_forum IN ('{$forums_sql}')");

			if($sql->getNumRows())
			{
				$this->OnePanel->messenger($this->LanguageHandler->mod_err_user_dups, GATEWAY . '?a=moderators');
			}
		}

		if($user)
		{
			$sql = $this->DatabaseHandler->query("
			SELECT 
				members_id   AS id, 
				members_name AS name 
			FROM " . DB_PREFIX . "members 
			WHERE members_id = {$user}");

			$type = 'user';
		}
		else {
			$sql = $this->DatabaseHandler->query("
			SELECT 
				class_id	AS id, 
				class_title AS name
			FROM " . DB_PREFIX . "class 
			WHERE class_id = {$group}");

			$type = 'group';
		}

		$data = $sql->getRow();

		$this->OnePanel->appendBuffer($this->LanguageHandler->mod_step_four_tip);

		$this->OnePanel->appendBuffer("<form method=\"post\" action=\"" . GATEWAY . '?a=moderators&amp;code=04">');

			$this->OnePanel->table->addColumn($this->LanguageHandler->mod_add_table_perm, "align='left'");
			$this->OnePanel->table->addColumn('&nbsp;',  "align='center'");

			$this->OnePanel->table->startTable(sprintf($this->LanguageHandler->mod_add_table_header, $data['name'])); 

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->mod_perm_edit_topics),
											   array($this->OnePanel->form->addYesNo('edit_topics', 1, false, false, true))));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->mod_perm_edit_others),
											   array($this->OnePanel->form->addYesNo('edit_others', 1, false, false, true))));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->mod_perm_delete_posts),
											   array($this->OnePanel->form->addYesNo('delete_posts', 1, false, false, true))));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->mod_perm_delete_topics),
											   array($this->OnePanel->form->addYesNo('delete_topics', 1, false, false, true))));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->mod_perm_move),
											   array($this->OnePanel->form->addYesNo('move_topics', 1, false, false, true))));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->mod_perm_lock),
											   array($this->OnePanel->form->addYesNo('lock_topics', 1, false, false, true))));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->mod_perm_pin),
											   array($this->OnePanel->form->addYesNo('pin_topics', 1, false, false, true))));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->mod_perm_announce),
											   array($this->OnePanel->form->addYesNo('mod_announce', 1, false, false, true))));

			$this->OnePanel->form->addHidden('type',   $type);
			$this->OnePanel->form->addHidden('id',	 $data['id']);
			$this->OnePanel->form->addHidden('hash',   $this->UserHandler->getUserHash());
			$this->OnePanel->form->addHidden('forums', $forums);
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
	function _doModAdd()
	{
		if($this->_hash != $this->UserHandler->getUserhash())
		{
			$this->OnePanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
		}

		extract($this->post);

		if($type == 'user')
		{
			$sql = $this->DatabaseHandler->query("
			SELECT 
				members_id   AS id, 
				members_name AS name 
			FROM " . DB_PREFIX . "members 
			WHERE members_id = {$id}");
	
			$data   = $sql->getRow(); 

			$user  = $data['id'];
			$group = 0;
		}
		else {
			$sql = $this->DatabaseHandler->query("
			SELECT 
				class_id	AS id, 
				class_title AS name
			FROM " . DB_PREFIX . "class 
			WHERE class_id = {$id}");

			$data   = $sql->getRow(); 

			$user  = 0;
			$group = $data['id'];
		}


		$forums = unserialize(stripslashes($this->ParseHandler->uncleanString($forums)));

		foreach($forums as $forum)
		{
			$this->DatabaseHandler->query("
			INSERT INTO " . DB_PREFIX . "moderators(
				mod_forum,
				mod_user_id,
				mod_group,
				mod_user_name,
				mod_edit_other_posts,
				mod_delete_other_posts,
				mod_delete_other_topics,
				mod_move_topics,
				mod_lock_topics,
				mod_pin_topics,
				mod_announce)
			VALUES (
				{$forum},
				{$user},
				{$group},
				'{$data['name']}',
				" . (int) $edit_others   . ",
				" . (int) $delete_posts  . ",
				" . (int) $delete_topics . ",
				" . (int) $move_topics   . ",
				" . (int) $lock_topics   . ",
				" . (int) $pin_topics	. ",
				" . (int) $mod_announce  . ")");
		}

		$this->CacheHandler->updateCache('moderators');

		$this->OnePanel->messenger($this->LanguageHandler->mod_err_done, GATEWAY . '?a=moderators');
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
	function _showModEditForm()
	{
		$sql = $this->DatabaseHandler->query("
		SELECT *
		FROM " . DB_PREFIX . "moderators
		WHERE mod_id = {$this->_id}");

		$mod = $sql->getRow();

		$this->OnePanel->appendBuffer("<form method=\"post\" action=\"" . GATEWAY . "?a=moderators&amp;code=06&amp;id={$this->_id}\">");

			$this->OnePanel->table->addColumn($this->LanguageHandler->mod_add_table_perm, "align='left'");
			$this->OnePanel->table->addColumn('&nbsp;',  "align='center'");

			$this->OnePanel->table->startTable(sprintf($this->LanguageHandler->mod_add_table_header, $mod['mod_user_name'])); 

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->mod_perm_edit_topics),
											   array($this->OnePanel->form->addYesNo('edit_topics', 1, false, false, true, $mod['mod_edit_topics']))));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->mod_perm_edit_others),
											   array($this->OnePanel->form->addYesNo('edit_others', 1, false, false, true, $mod['mod_edit_other_posts']))));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->mod_perm_delete_posts),
											   array($this->OnePanel->form->addYesNo('delete_posts', 1, false, false, true, $mod['mod_delete_other_posts']))));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->mod_perm_delete_topics),
											   array($this->OnePanel->form->addYesNo('delete_topics', 1, false, false, true, $mod['mod_delete_other_topics']))));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->mod_perm_move),
											   array($this->OnePanel->form->addYesNo('move_topics', 1, false, false, true, $mod['mod_move_topics']))));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->mod_perm_lock),
											   array($this->OnePanel->form->addYesNo('lock_topics', 1, false, false, true, $mod['mod_lock_topics']))));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->mod_perm_pin),
											   array($this->OnePanel->form->addYesNo('pin_topics', 1, false, false, true, $mod['mod_pin_topics']))));

				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->mod_perm_announce),
											   array($this->OnePanel->form->addYesNo('mod_announce', 1, false, false, true, $mod['mod_announce']))));

			$this->OnePanel->table->endTable();
			$this->OnePanel->form->appendBuffer($this->OnePanel->table->flushBuffer() . "<div id=\"formwrap\">");

			$forum_select .= $this->ForumHandler->makeDropDown($mod['mod_forum']);

			$this->OnePanel->form->addWrapSelect('forum', false, false, " size='5' style='width: 98%;'", array(1, 
												 $this->LanguageHandler->mod_edit_forum_title,
												 $this->LanguageHandler->mod_edit_forum_desc), false, 
												 $forum_select);

			if($mod['mod_group'])
			{
				$type = 'group';
				$id   = $mod['mod_group'];
			}
			else {
				$type = 'user';
				$id   = $mod['mod_user_id'];
			}

			$this->OnePanel->form->addHidden('type',   $type);
			$this->OnePanel->form->addHidden('id',	 $id);

			$this->OnePanel->form->addHidden('user',   $mod['mod_user_id']);
			$this->OnePanel->form->addHidden('hash',   $this->UserHandler->getUserHash());

		$this->OnePanel->form->endForm($this->LanguageHandler->mod_edit_submit);
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
	function _doModEdit()
	{
		if($this->_hash != $this->UserHandler->getUserhash())
		{
			$this->OnePanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
		}

		extract($this->post);

		$sql = $this->DatabaseHandler->query("
		SELECT mod_forum 
		FROM " . DB_PREFIX . "moderators 
		WHERE mod_id = {$this->_id}");

		$row = $sql->getRow();

		if($row['mod_forum'] != $forum)
		{
			if($type == 'group')
			{
				$sql = $this->DatabaseHandler->query("
				SELECT mod_id 
				FROM " . DB_PREFIX . "moderators 
				WHERE 
					mod_group = {$id} AND
					mod_forum = {$forum}");

				if($sql->getNumRows())
				{
					$this->OnePanel->messenger($this->LanguageHandler->mod_err_group_dups, GATEWAY . '?a=moderators');
				}
			}
			else if($user)
			{
				$sql = $this->DatabaseHandler->query("
				SELECT mod_id 
				FROM " . DB_PREFIX . "moderators 
				WHERE 
					mod_user_id = {$id} AND
					mod_forum   = {$forum}");

				if($sql->getNumRows())
				{
					$this->OnePanel->messenger($this->LanguageHandler->mod_err_user_dups, GATEWAY . '?a=moderators');
				}
			}
		}

		$this->DatabaseHandler->query("
		UPDATE " . DB_PREFIX . "moderators SET
			mod_forum			   = " . (int) $forum		 . ",
			mod_edit_topics		 = " . (int) $edit_topics   . ",
			mod_edit_other_posts	= " . (int) $edit_others   . ",
			mod_delete_other_posts  = " . (int) $delete_posts  . ",
			mod_delete_other_topics = " . (int) $delete_topics . ",
			mod_move_topics		 = " . (int) $move_topics   . ",
			mod_lock_topics		 = " . (int) $lock_topics   . ",
			mod_pin_topics		  = " . (int) $pin_topics	. ",
			mod_announce			= " . (int) $mod_announce  . "
		WHERE mod_id = {$this->_id}");	   

		$this->CacheHandler->updateCache('moderators');

		$this->OnePanel->messenger($this->LanguageHandler->mod_err_edit_done, GATEWAY . "?a=moderators&code=05&id={$this->_id}");
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
	function _doRemoveMod()
	{
		$this->DatabaseHandler->query("
		DELETE FROM " . DB_PREFIX . "moderators 
		WHERE mod_id = {$this->_id}");

		$this->CacheHandler->updateCache('moderators');

		header("LOCATION: " . GATEWAY . "?a=moderators");
	}
}

?>