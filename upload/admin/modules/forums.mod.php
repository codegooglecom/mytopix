<?php

/**
* Forum Management Module
*
* This module is responsible for the creation and management 
* of forums and categories for MyTopix.
*
* @version $Id: forums.mod.php murdochd Exp $
* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
* @company Jaia Interactive <admin@jaia-interactive.com>
* @package MyTopix | Personal Message Board
*/
class ModuleObject extends MasterObject
{
   /**
    * Determines what section of this
    * module to call.
    * @access Private
    * @var Integer
    */
    var $_code;

   /**
    * Forum selected for viewing.
    * @access Private
    * @var Integer
    */
    var $_forum;

   /**
    * A hash used to prevent possible
    * bot attacks.
    * @access Private
    * @var String
    */
    var $_hash;

   /**
    * The 'XHTML' widget object that handles
    * all output within this control panel.
    * @access Public
    * @var Object
    */
    var $OnePanel;

   /**
    * Allows direct manipulation of files
    * @access Public
    * @var Object
    */
    var $_FileHandler;

   // ! Constructor Method

   /**
    * Instantiates this object and prepares for use.
    *
    * @param String $module Currently loaded module.
    * @param Array  $config System configuration array
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @return Void
    */
    function ModuleObject($module, $config)
	{
        $this->MasterObject($module, $config);

        $this->_forum = isset($this->get['forum']) ? (int) $this->get['forum'] : 0;
        $this->_code  = isset($this->get['code'])  ?       $this->get['code']  : 00;
        $this->_hash  = isset($this->post['hash']) ?       $this->post['hash'] : null;

        require_once SYSTEM_PATH . 'admin/lib/onepanel.php';
        $this->OnePanel = new OnePanel($this);

        require_once SYSTEM_PATH . 'lib/file.han.php';
        $this->_FileHandler  = new FileHandler($this->config);
	}

   // ! Action Method

   /**
    * Calls various sections of this module by utilizing
    * the private '_code' instance variable.
    *
    * @param String $string Description
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @return Void
    */
	function execute()
	{
		switch($this->_code)
		{
			case '00':
                $this->OnePanel->_make_nav(2, 7);
				$this->_showAddForum();
				break;

			case '01':
                $this->OnePanel->_make_nav(2, 7);
				$this->_doAddForum();
				break;

			case '02':
                $this->OnePanel->_make_nav(2, 6);
				$this->_showForumList();
				break;

			case '03':
                $this->OnePanel->_make_nav(2, 6);
				$this->_doReOrder();
				break;

			case '04':
                $this->OnePanel->_make_nav(2, 6);
				$this->_showEditForm();
				break;

			case '05':
                $this->OnePanel->_make_nav(2, 6);
				$this->_doEditForum();
				break;

			case '06':
                $this->OnePanel->_make_nav(2, 6);
				$this->_doRemoveStepOne();
				break;

			case '07':
                $this->OnePanel->_make_nav(2, 6);
				$this->_doRemoveStepTwo();
				break;

			default:
                $this->OnePanel->_make_nav(2, 7);
				$this->_showAddForum();
				break;
		}

		$this->OnePanel->flushBuffer();
	}

   // ! Action Method

   /**
    * Displays a form used to create a new forum.
    *
    * @param none
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @return Void
    */
	function _showAddForum()
	{
        $this->OnePanel->addHeader($this->LanguageHandler->forum_new_header);

        $sql = $this->DatabaseHandler->query("
        SELECT 
            forum_id, 
            forum_name, 
            forum_parent 
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

        $forum_select  = "<option value=\"0\">{$this->LanguageHandler->forum_new_parent_option}</option>";
        $forum_select .= $this->ForumHandler->makeDropDown();

		$this->OnePanel->form->startForm(GATEWAY . '?a=forums&amp;code=01');

            $this->OnePanel->form->addTextBox('forum_name', false, false, array(1,
                                              $this->LanguageHandler->forum_new_name_title, 
                                              $this->LanguageHandler->forum_new_name_desc));

            $this->OnePanel->form->addTextArea('forum_description', false, false, array(1, 
                                               $this->LanguageHandler->forum_new_description_title,
                                               $this->LanguageHandler->forum_new_description_desc));

            $this->OnePanel->form->addWrapSelect('forum_parent', false, false, false, array(1, 
                                                 $this->LanguageHandler->forum_new_parent_title,
                                                 $this->LanguageHandler->forum_new_parent_desc), false, 
                                                 $forum_select);

            $this->OnePanel->form->addWrapSelect('forum_state', 
                                                 array(1 => $this->LanguageHandler->forum_new_status_option_one,
                                                       0 => $this->LanguageHandler->forum_new_status_option_two), 
                                                 false, false, array(1, 
                                                 $this->LanguageHandler->forum_new_state_title,
                                                 $this->LanguageHandler->forum_new_state_desc));

            $this->OnePanel->form->appendBuffer("<h1>{$this->LanguageHandler->forum_option_title}</h1>");

			$this->OnePanel->form->addCheckBox('allow_content', 1, false, false,
								            false, true, $this->LanguageHandler->forum_new_content_tip, false , 'checkwrap_4');

			$this->OnePanel->form->addCheckBox('post_count', 1, false, false,
								            false, true, $this->LanguageHandler->forum_post_counting, false);

			$this->OnePanel->form->addCheckBox('red_on', 1, false, false,
								            false, false, $this->LanguageHandler->forum_new_red_on_tip, false);

            $this->OnePanel->form->addTextBox('red_url', 'http://', false, array(1, 
                                              $this->LanguageHandler->forum_new_red_url_title, 
                                              $this->LanguageHandler->forum_new_red_url_desc));
            
            $this->OnePanel->form->addHidden('hash', $this->UserHandler->getUserHash());

            $this->OnePanel->form->appendBuffer("</div>");
            $this->OnePanel->form->appendBuffer("<h2>{$this->LanguageHandler->forum_new_matrix_desc}</h2>");

    		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());
             
			$this->OnePanel->table->addColumn($this->LanguageHandler->forum_new_tbl_group,  "align='left'");
			$this->OnePanel->table->addColumn($this->LanguageHandler->forum_new_tbl_view,   "align='center'");
			$this->OnePanel->table->addColumn($this->LanguageHandler->forum_new_tbl_read,   "align='center'");
			$this->OnePanel->table->addColumn($this->LanguageHandler->forum_new_tbl_post,   "align='center'");
			$this->OnePanel->table->addColumn($this->LanguageHandler->forum_new_tbl_topics, "align='center'");
            $this->OnePanel->table->addColumn($this->LanguageHandler->forum_new_tbl_upload,   "align='center'");

			$this->OnePanel->table->startTable($this->LanguageHandler->forum_new_matrix_title);

            $sql = $this->DatabaseHandler->query("
            SELECT 
                class_id, 
                class_title, 
                class_prefix,
                class_suffix 
            FROM " . DB_PREFIX . "class");

            while($row = $sql->getRow())
            {

				$this->OnePanel->table->addRow(array(array($row['class_prefix'] . $row['class_title'] . $row['class_suffix'], false, 'headerb'),
										       array($this->OnePanel->form->addCheckBox('can_view_'   . $row['class_id'], 1, " checked=\"checked\"", false, true, false, false, 'center', 'checkwrap_1')),
                    					       array($this->OnePanel->form->addCheckBox('can_read_'   . $row['class_id'], 1, " checked=\"checked\"", false, true, false, false, 'center', 'checkwrap_2')),
                    						   array($this->OnePanel->form->addCheckBox('can_reply_'  . $row['class_id'], 1, " checked=\"checked\"", false, true, false, false, 'center', 'checkwrap_3')),
                    						   array($this->OnePanel->form->addCheckBox('can_start_'  . $row['class_id'], 1, " checked=\"checked\"", false, true, false, false, 'center', 'checkwrap_4')),
                    						   array($this->OnePanel->form->addCheckBox('can_upload_' . $row['class_id'], 1, " checked=\"checked\"", false, true, false, false, 'center', 'checkwrap'))));

            }

			$this->OnePanel->table->endTable(true);
			$this->OnePanel->appendBuffer($this->OnePanel->table->flushBuffer());
	}

   // ! Action Method

   /**
    * Processes and inserts data used to create a new forum for
    * the system.
    *
    * @param none
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @return Void
    */
    function _doAddForum()
    {
        if($this->_hash != $this->UserHandler->getUserhash())
        {
            $this->OnePanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
        }

        extract($this->post);

        if(false == $forum_name)
        {
            $this->OnePanel->messenger($this->LanguageHandler->forum_new_err_no_name, GATEWAY . '?a=forums');
        }

        if(false == preg_match("#^http://#", $red_url))
        {
            $red_url = "http://{$site_link}";
        }

        $matrix = array('can_reply'  => '',
                        'can_start'  => '',
                        'can_view'   => '',
                        'can_read'   => '',
                        'can_upload' => '');

        $sql = $this->DatabaseHandler->query("
        SELECT 
            class_id, 
            class_title 
        FROM " . DB_PREFIX . "class");

        while($row = $sql->getRow())
        {
            if($this->post['can_reply_' . $row['class_id']])
            {
                $matrix['can_reply'] .= $row['class_id'] . '|';
            }

            if($this->post['can_start_' . $row['class_id']])
            {
                $matrix['can_start'] .= $row['class_id'] . '|';
            }

            if($this->post['can_view_' . $row['class_id']])
            {
                $matrix['can_view'] .= $row['class_id'] . '|';
            }

            if($this->post['can_read_' . $row['class_id']])
            {
                $matrix['can_read'] .= $row['class_id'] . '|';
            }

            if($this->post['can_upload_' . $row['class_id']])
            {
                $matrix['can_upload'] .= $row['class_id'] . '|';
            }
        }

        foreach($matrix as $key => $val)
        {
            $matrix[$key] = substr($matrix[$key], 0, strlen($matrix[$key]) - 1);
        }

        $matrix = addslashes(serialize($matrix));

        $this->DatabaseHandler->query("
        INSERT INTO " . DB_PREFIX . "forums(
            forum_parent,
            forum_name,
            forum_description,
            forum_closed,
            forum_red_url,
            forum_red_on,
            forum_access_matrix,
            forum_allow_content,
            forum_enable_post_counts)
        VALUES (
            " . (int) $forum_parent . ",
            '{$forum_name}',
            '" . addslashes($this->ParseHandler->uncleanString($forum_description)) . "',
            "  . (int) $forum_state . ",
            '{$red_url}',
            " . (int) $red_on . ",
            '{$matrix}',
            " . (int) $allow_content . ",
            " . (int) $post_count . ")");

        $this->CacheHandler->updateCache('forums');

        $this->OnePanel->messenger($this->LanguageHandler->forum_new_err_done, GATEWAY . '?a=forums&code=02');
    }

   // ! Action Method

   /**
    * Displays a navigatable list of the forum tree which is
    * used for the management of specific forums.
    *
    * @param none
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @return Void
    */
    function _showForumList()
    {
        $this->OnePanel->addHeader($this->LanguageHandler->forum_list_header);

        if($this->_forum && false == $this->CacheHandler->getCacheByVal('forums', $this->_forum))
        {
            $this->OnePanel->messenger($this->LanguageHandler->forum_err_no_match, GATEWAY . '?a=forums&code=02');
        }

        $list = $this->CacheHandler->getCacheByKey('forums');

        $positions = array();
        for($i = 1; $i < sizeof($list) + 1; $i++)
        {
            $positions[$i] = $i;
        }

        $this->OnePanel->appendBuffer("<form method=\"post\" action=\"" . GATEWAY . "?a=forums&amp;code=03&amp;forum={$this->_forum}\">");

		$this->OnePanel->table->addColumn($this->LanguageHandler->forum_list_tbl_title,    ' align="left"');
		$this->OnePanel->table->addColumn($this->LanguageHandler->forum_list_tbl_child,    ' align="center"');
		$this->OnePanel->table->addColumn($this->LanguageHandler->forum_list_tbl_position, ' align="center"');
		$this->OnePanel->table->addColumn('&nbsp;', ' width="15%"');

		$this->OnePanel->table->startTable($this->LanguageHandler->forum_list_tbl_header);

        $this->OnePanel->table->addRow(array(
                                       array('&nbsp;'), array('&nbsp;'),
                                       array("<input type=\"submit\" style=\"width: 4.7em; padding: 2px; " . 
                                             "background-color: #F7F7F7;\" value=\"{$this->LanguageHandler->btn_order}\" />", 
                                             " align=\"center\""), 
                                       array('&nbsp;')));

        if(false == $this->_forum)
        {
            foreach($list as $category)
            {
                if(false == $category['forum_parent'])
                {
                    $this->OnePanel->table->addRow(array(array("<strong><a href=\"" . GATEWAY . "?a=forums&amp;code=02&amp;forum={$category['forum_id']}\">" . $category['forum_name'] . '</a></strong>', ' style="background-color: #F7F7F7;"'),
                                                   array('&nbsp;', ' style="background-color: #F7F7F7;"'),
                                                   array($this->OnePanel->form->addSelect("pos[{$category['forum_id']}]", $positions, $category['forum_position'], false, false, true), " align='center' style='background-color: #F7F7F7;'" , 'headerb'),
                                                   array("<a href=\"" . GATEWAY . "?a=forums&amp;code=04&amp;forum={$category['forum_id']}\" title=\"\">{$this->LanguageHandler->link_edit}</a> | <a href=\"" . GATEWAY . "?a=forums&amp;code=06&amp;forum={$category['forum_id']}\" onclick=\"javascript: return confirm('{$this->LanguageHandler->forum_list_js_delete}');\"><strong>{$this->LanguageHandler->link_delete}</strong></a>", ' align="center" style="background-color: #F7F7F7;"', ' align="center"')));

                    foreach($list as $forum)
                    {
                        if($forum['forum_parent'] == $category['forum_id'])
                        {
                            $forum    = $this->ForumHandler->calcForumStats($forum['forum_id'], $forum, true);

                            if($children = $this->ForumHandler->hasChildren($forum['forum_id']))
                            {
                                $forum['forum_name'] = "<a href=\"" . GATEWAY . "?a=forums&amp;code=02&amp;forum={$forum['forum_id']}\">{$forum['forum_name']}</a>";
                            }

                            $this->OnePanel->table->addRow(array(array('|-- ' . $forum['forum_name'], false, 'headerb'),
                                                           array($children ? "<strong>{$this->LanguageHandler->yes}</strong>" : '--', ' align="center"'),
                                                           array($this->OnePanel->form->addSelect("pos[{$forum['forum_id']}]", $positions, $forum['forum_position'], false, false, true), " align='center'", 'headerb'),
                                                           array("<a href=\"" . GATEWAY . "?a=forums&amp;code=04&amp;forum={$forum['forum_id']}\" title=\"\">{$this->LanguageHandler->link_edit}</a> | <a href=\"" . GATEWAY . "?a=forums&amp;code=06&amp;forum={$forum['forum_id']}\" onclick=\"javascript: return confirm('{$this->LanguageHandler->forum_list_js_delete}');\"><strong>{$this->LanguageHandler->link_delete}</strong></a>", ' align="center"')));
                        }
                    }
                }
            }
        }
        else {

            $category = $list[$this->_forum];

            $this->OnePanel->table->addRow(array(array("<strong><a href=\"" . GATEWAY . "?a=forums&amp;code=02&amp;forum={$category['forum_parent']}\">Level Up</a> | " . $category['forum_name'] . '</strong>', ' style="background-color: #F7F7F7;"'),
                                           array('&nbsp;', ' style="background-color: #F7F7F7;"'),
                                           array($this->OnePanel->form->addSelect("pos[{$category['forum_id']}]", $positions, $category['forum_position'], false, false, true), " align='center' style='background-color: #F7F7F7;'" , 'headerb'),
                                           array("<a href=\"" . GATEWAY . "?a=forums&amp;code=04&amp;forum={$category['forum_id']}\" title=\"\">{$this->LanguageHandler->link_edit}</a> | <a href=\"" . GATEWAY . "?a=forums&amp;code=06&amp;forum={$category['forum_id']}\" onclick=\"javascript: return confirm('{$this->LanguageHandler->forum_list_js_delete}');\"><strong>{$this->LanguageHandler->link_delete}</strong></a>", ' align="center" style="background-color: #F7F7F7;"')));

                $this->ForumHandler->calcForumStats($this->_forum, $category, true);

                if(false == $children = $this->ForumHandler->hasChildren($category['forum_id']))
                {
                    $this->OnePanel->messenger($this->LanguageHandler->forum_list_err_no_kids, GATEWAY . '?a=forums&code=02');
                }

            foreach($list as $forum)
            {
                if($forum['forum_parent'] == $this->_forum)
                {
                    $forum = $this->ForumHandler->calcForumStats($forum['forum_id'], $forum, true);

                    if($children = $this->ForumHandler->hasChildren($forum['forum_id']))
                    {
                        $forum['forum_name'] = "<a href=\"" . GATEWAY . "?a=forums&amp;code=02&amp;forum={$forum['forum_id']}\">{$forum['forum_name']}</a>";
                    }

                    $this->OnePanel->table->addRow(array(array('|-- ' . $forum['forum_name'], false, 'headerb'),
                                                   array($children ? "<strong>{$this->LanguageHandler->yes}</strong>" : '--', ' align="center"'),
                                                   array($this->OnePanel->form->addSelect("pos[{$forum['forum_id']}]", $positions, $forum['forum_position'], false, false, true), " align='center'", 'headerb'),
                                                   array("<a href=\"" . GATEWAY . "?a=forums&amp;code=04&amp;forum={$forum['forum_id']}\" title=\"\">{$this->LanguageHandler->link_edit}</a> | <a href=\"" . GATEWAY . "?a=forums&amp;code=06&amp;forum={$forum['forum_id']}\" onclick=\"javascript: return confirm('{$this->LanguageHandler->forum_list_js_delete}');\"><strong>{$this->LanguageHandler->link_delete}</strong></a>", ' align="center"')));
                }
            }

        }

        $this->OnePanel->appendBuffer("<input type=\"hidden\" name=\"hash\" value=\"" . $this->UserHandler->getUserHash() . "\" />");

        $this->OnePanel->table->addRow(array(
                                       array('&nbsp;'), array('&nbsp;'),
                                       array("<input type=\"submit\" style=\"width: 4.7em; padding: 2px; " . 
                                             "background-color: #F7F7F7;\" value=\"{$this->LanguageHandler->btn_order}\" />", 
                                             " align=\"center\""), 
                                       array('&nbsp;')));

		$this->OnePanel->table->endTable();
		$this->OnePanel->appendBuffer($this->OnePanel->table->flushBuffer() . '</form>');
    }

   // ! Action Method

   /**
    * A quick and dirty method that is used to reposition
    * a given set of forums.
    *
    * @param none
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @return Void
    */
    function _doReOrder()
    {
        if($this->_hash != $this->UserHandler->getUserhash())
        {
            $this->OnePanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
        }

        extract($this->post);

        foreach($pos as $forum => $position)
        {
            $this->DatabaseHandler->query("
            UPDATE " . DB_PREFIX . "forums 
            SET forum_position = {$position} 
            WHERE forum_id     = {$forum}");
        }

        $this->CacheHandler->updateCache('forums');

        header("LOCATION: " . GATEWAY . "?a=forums&code=02&forum={$this->_forum}");
    }

   // ! Action Method

   /**
    * Displays the form used to edit a specific forum.
    *
    * @param none
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @return Void
    */
    function _showEditForm()
    {
        $list = $this->CacheHandler->getCacheByKey('forums');

        if($this->_forum && false == $forum = $this->ForumHandler->forumExists($this->_forum, true))
        {
            $this->OnePanel->messenger($this->LanguageHandler->forum_err_no_match, GATEWAY . '?a=forums&code=02');
        }

        $this->OnePanel->addHeader(sprintf($this->LanguageHandler->forum_edit_header, $forum['forum_name']));

        $forum_select  = "<option value=\"0\">{$this->LanguageHandler->forum_new_parent_option}</option>";
        $forum_select .= $this->ForumHandler->makeDropDown($forum['forum_parent']);

		$this->OnePanel->form->startForm(GATEWAY . "?a=forums&amp;code=05&amp;forum={$this->_forum}");
		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());

            $this->OnePanel->form->addTextBox('forum_name', $forum['forum_name'], false, array(1,
                                              $this->LanguageHandler->forum_new_name_title, 
                                              $this->LanguageHandler->forum_new_name_desc));

            $this->OnePanel->form->addTextArea('forum_description',$forum['forum_description'], 
                                             false, array(1,
                                             $this->LanguageHandler->forum_new_description_title,
                                             $this->LanguageHandler->forum_new_description_desc));

            $this->OnePanel->form->addWrapSelect('forum_parent', false, false, false, array(1, 
                                                 $this->LanguageHandler->forum_new_parent_title,
                                                 $this->LanguageHandler->forum_new_parent_desc), false, 
                                                 $forum_select);

            $this->OnePanel->form->addWrapSelect('forum_state', 
                                                 array(1 => $this->LanguageHandler->forum_new_status_option_one, 
                                                       0 => $this->LanguageHandler->forum_new_status_option_two), 
                                                 $forum['forum_closed'], false, array(1, 
                                                 $this->LanguageHandler->forum_new_state_title,
                                                 $this->LanguageHandler->forum_new_state_desc));

            $this->OnePanel->form->appendBuffer("<h1>{$this->LanguageHandler->forum_option_title}</h1>");

			$this->OnePanel->form->addCheckBox('allow_content', 1, false, false,
								            false, $forum['forum_allow_content'], $this->LanguageHandler->forum_new_content_tip, false , 'checkwrap_4');

			$this->OnePanel->form->addCheckBox('post_count', 1, false, false,
								            false, $forum['forum_enable_post_counts'], $this->LanguageHandler->forum_post_counting, false);

			$this->OnePanel->form->addCheckBox('red_on', 1, false, false,
								            false, $forum['forum_red_on'], $this->LanguageHandler->forum_new_red_on_tip, false);

            $this->OnePanel->form->addTextBox('red_url', $forum['forum_red_url'], false, array(1, 
                                              $this->LanguageHandler->forum_new_red_url_title, 
                                              $this->LanguageHandler->forum_new_red_url_desc));

            $this->OnePanel->form->addHidden('hash', $this->UserHandler->getUserHash());

            $this->OnePanel->form->appendBuffer("</div>");
            $this->OnePanel->form->appendBuffer("<h2>{$this->LanguageHandler->forum_new_matrix_desc}</h2>");

    		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer()); 

			$this->OnePanel->table->addColumn($this->LanguageHandler->forum_new_tbl_group,  "align='left'");
			$this->OnePanel->table->addColumn($this->LanguageHandler->forum_new_tbl_view,   "align='center'");
			$this->OnePanel->table->addColumn($this->LanguageHandler->forum_new_tbl_read,   "align='center'");
			$this->OnePanel->table->addColumn($this->LanguageHandler->forum_new_tbl_post,   "align='center'");
			$this->OnePanel->table->addColumn($this->LanguageHandler->forum_new_tbl_topics, "align='center'");
            $this->OnePanel->table->addColumn($this->LanguageHandler->forum_new_tbl_upload, "align='center'");

			$this->OnePanel->table->startTable($this->LanguageHandler->forum_new_matrix_title);

            extract(unserialize(stripslashes($forum['forum_access_matrix'])));

            $can_reply  = explode('|', $can_reply);
            $can_start  = explode('|', $can_start);
            $can_view   = explode('|', $can_view);
            $can_read   = explode('|', $can_read);
            $can_upload = explode('|', $can_upload);

            $sql = $this->DatabaseHandler->query("
            SELECT 
                class_id, 
                class_title, 
                class_prefix, 
                class_suffix 
            FROM " . DB_PREFIX . "class");

            while($row = $sql->getRow())
            {
				$this->OnePanel->table->addRow(array(array($row['class_prefix'] . $row['class_title'] . $row['class_suffix'], false, 'headerb'),
										       array($this->OnePanel->form->addCheckBox('can_view_'   . $row['class_id'], 1, false, false, true, in_array($row['class_id'], $can_view)   ? true : false,  false, 'center', 'checkwrap_1')),
                    					       array($this->OnePanel->form->addCheckBox('can_read_'   . $row['class_id'], 1, false, false, true, in_array($row['class_id'], $can_read)   ? true : false,  false, 'center', 'checkwrap_2')),
                    						   array($this->OnePanel->form->addCheckBox('can_reply_'  . $row['class_id'], 1, false, false, true, in_array($row['class_id'], $can_reply)  ? true : false, false,  'center', 'checkwrap_3')),
                    						   array($this->OnePanel->form->addCheckBox('can_start_'  . $row['class_id'], 1, false, false, true, in_array($row['class_id'], $can_start)  ? true : false, false,  'center', 'checkwrap_4')),
                    						   array($this->OnePanel->form->addCheckBox('can_upload_' . $row['class_id'], 1, false, false, true, in_array($row['class_id'], $can_upload) ? true : false, false,  'center', 'checkwrap'))));
            }

			$this->OnePanel->table->endTable(true);
			$this->OnePanel->appendBuffer($this->OnePanel->table->flushBuffer());
    }

   // ! Action Method

   /**
    * Does all the processing involved in modifying
    * an existing forum.
    *
    * @param none
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @return Void
    */
    function _doEditForum()
    {
        if($this->_hash != $this->UserHandler->getUserhash())
        {
            $this->OnePanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
        }
        extract($this->post);

        $list = $this->CacheHandler->getCacheByKey('forums');

        if($forum_parent == $this->_forum)
        {
            $this->OnePanel->messenger($this->LanguageHandler->forum_new_err_same, GATEWAY . "?a=forums&code=04&forum={$this->_forum}");
        }

        if($this->_forum && false == $forum = $this->ForumHandler->forumExists($this->_forum, true))
        {
            $this->OnePanel->messenger($this->LanguageHandler->forum_err_no_match, GATEWAY . '?a=forums&code=02');
        }

        if(false == $forum_name)
        {
            $this->OnePanel->messenger($this->LanguageHandler->forum_new_err_no_name, GATEWAY . "?a=forums&code=04&forum={$this->_forum}");
        }

        if(false == preg_match("#^http://#", $red_url))
        {
            $red_url = "http://{$site_link}";
        }

        $matrix = array('can_reply'  => '',
                        'can_start'  => '',
                        'can_view'   => '',
                        'can_read'   => '',
                        'can_upload' => '');

        $sql = $this->DatabaseHandler->query("
        SELECT 
            class_id, 
            class_title 
        FROM " . DB_PREFIX . "class");

        while($row = $sql->getRow())
        {
            if($this->post['can_reply_' . $row['class_id']])
            {
                $matrix['can_reply'] .= $row['class_id'] . '|';
            }

            if($this->post['can_start_' . $row['class_id']])
            {
                $matrix['can_start'] .= $row['class_id'] . '|';
            }

            if($this->post['can_view_' . $row['class_id']])
            {
                $matrix['can_view'] .= $row['class_id'] . '|';
            }

            if($this->post['can_read_' . $row['class_id']])
            {
                $matrix['can_read'] .= $row['class_id'] . '|';
            }

            if($this->post['can_upload_' . $row['class_id']])
            {
                $matrix['can_upload'] .= $row['class_id'] . '|';
            }
        }

        foreach($matrix as $key => $val)
        {
            $matrix[$key] = substr($matrix[$key], 0, strlen($matrix[$key]) - 1);
        }

        $matrix = addslashes(serialize($matrix));

        $this->DatabaseHandler->query("
        UPDATE " . DB_PREFIX . "forums SET
            forum_parent             = " . (int) $forum_parent . ",
            forum_name               = '{$forum_name}',
            forum_description        = '" . addslashes($this->ParseHandler->uncleanString($forum_description)) . "',
            forum_closed             = "  . (int) $forum_state . ",
            forum_red_url            = '{$red_url}',
            forum_red_on             = " . (int) $red_on . ",
            forum_access_matrix      = '{$matrix}',
            forum_allow_content      = " . (int) $allow_content . ",
            forum_enable_post_counts = " . (int) $post_count . "
        WHERE forum_id = {$this->_forum}");

        $this->CacheHandler->updateCache('forums');

        $this->OnePanel->messenger($this->LanguageHandler->forum_edit_err_done, GATEWAY . "?a=forums&code=04&forum={$this->_forum}");
    }

   // ! Action Method

   /**
    * First step of the forum removal process. If the forum in
    * question contains topics, the user will be prompted to 
    * select a new forum to transfer them to.
    *
    * @param none
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @return Void
    */
    function _doRemoveStepOne()
    {
        $sql = $this->DatabaseHandler->query("
        SELECT * 
        FROM " . DB_PREFIX . "forums 
        ORDER BY 
            forum_parent, 
            forum_position");

        $list = array();
        while($row = $sql->getRow())
        {
            $list[$row['forum_id']] = $row;
        }

        $this->ForumHandler->setForumList($list);

        if($this->_forum && false == $forum = $this->ForumHandler->forumExists($this->_forum, true))
        {
            $this->OnePanel->messenger($this->LanguageHandler->forum_err_no_match, GATEWAY . '?a=forums&code=02');
        }

        if($this->ForumHandler->hasChildren($this->_forum))
        {
            $this->OnePanel->messenger($this->LanguageHandler->forum_err_has_children, GATEWAY . '?a=forums&code=02');
        }

        if(sizeof($list) > 1)
        {
            $sql = $this->DatabaseHandler->query("
            SELECT topics_id 
            FROM " . DB_PREFIX . "topics 
            WHERE topics_forum = {$this->_forum}");

            if(false == $sql->getNumRows())
            {
                return $this->_doRemoveStepFinal();
            }

            $forum_select .= $this->ForumHandler->makeDropDown();

            $this->OnePanel->addHeader($this->LanguageHandler->forum_rem_move_header);

            $this->OnePanel->form->startForm(GATEWAY . "?a=forums&amp;code=07&amp;forum={$this->_forum}");
            $this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());

                $this->OnePanel->form->addWrapSelect('transfer_forum', false, false, false, array(1,
                                                     sprintf($this->LanguageHandler->forum_rem_move_title, $forum['forum_name']),
                                                     $this->LanguageHandler->forum_rem_move_desc), false, 
                                                     $forum_select, $this->LanguageHandler->forum_new_parent_tip);

            $this->OnePanel->form->addHidden('hash', $this->UserHandler->getUserHash());

            $this->OnePanel->form->endForm();
            $this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());
        }
        else {

            $sql = $this->DatabaseHandler->query("
            SELECT topics_id 
            FROM " . DB_PREFIX . "topics 
            WHERE topics_forum = {$this->_forum}");

            while($row = $sql->getRow())
            {
                $this->DatabaseHandler->query("
                DELETE FROM " . DB_PREFIX . "posts 
                WHERE posts_topic = {$row['topics_id']}");
            }

                $this->DatabaseHandler->query("
                DELETE FROM " . DB_PREFIX . "topics 
                WHERE topics_forum = {$this->_forum}");

            $sql    = $this->DatabaseHandler->query("SELECT topics_id FROM " . DB_PREFIX . "topics");
            $topics = $sql->getNumRows();

            $sql    = $this->DatabaseHandler->query("SELECT posts_id FROM " . DB_PREFIX . "posts");
            $post   = $sql->getNumRows();

            $this->config['topics'] = $topics;
            $this->config['posts']  = $post - $topics;

            $this->_FileHandler->updateFileArray($this->config, 'config', SYSTEM_PATH . 'config/settings.php');

            return $this->_doRemoveStepFinal();
        }
    }

   // ! Action Method

   /**
    * If the forum chosen for removal contains topics
    * then move all topics to the transfer forum and 
    * update the statistics accordingly.
    *
    * @param none
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @return Void
    */
    function _doRemoveStepTwo()
    {
        if($this->_hash != $this->UserHandler->getUserhash())
        {
            $this->OnePanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
        }
        extract($this->post);
        
        if($transfer_forum == $this->_forum)
        {
            $this->OnePanel->messenger($this->LanguageHandler->forum_rem_err_same, GATEWAY . "?a=forums&code=06&forum={$this->_forum}");
        }

        $this->DatabaseHandler->query("
        UPDATE " . DB_PREFIX . "topics 
        SET topics_forum   = {$transfer_forum} 
        WHERE topics_forum = {$this->_forum}");

        $sql = $this->DatabaseHandler->query("
        SELECT topics_id 
        FROM " . DB_PREFIX . "topics 
        WHERE topics_forum = {$transfer_forum}");

        $topics = $sql->getNumRows();
        $posts  = 0;

        while($row = $sql->getRow())
        {
            $pSql = $this->DatabaseHandler->query("
            SELECT posts_id 
            FROM " . DB_PREFIX . "posts 
            WHERE posts_topic = {$row['topics_id']}");

            $posts += $pSql->getNumRows();
        }

        $posts -= $topics;

        $sql = $this->DatabaseHandler->query("
        SELECT
            p.posts_date,
            p.posts_id,
            p.posts_author,
            p.posts_author_name,
            t.topics_title
        FROM " . DB_PREFIX . "posts p
            LEFT JOIN " . DB_PREFIX . "topics t ON t.topics_id = p.posts_topic
        WHERE
            t.topics_forum = {$transfer_forum}
        ORDER BY p.posts_date DESC LIMIT 0, 1");

        $latest = $sql->getRow();

        $this->DatabaseHandler->query("
        UPDATE " . DB_PREFIX . "forums SET
            forum_posts               = {$posts},
            forum_topics              = {$topics},
            forum_last_post_id        = {$latest['posts_id']},
            forum_last_post_time      = {$latest['posts_date']},
            forum_last_post_user_name = '{$latest['posts_author_name']}',
            forum_last_post_user_id   = {$latest['posts_author']},
            forum_last_post_title     = '{$latest['topics_title']}'
        WHERE forum_id = {$transfer_forum}");

        return $this->_doRemoveStepFinal();
    }

   // ! Action Method

   /**
    * The final step of the forum removal process; simply
    * delete the forum entry completely.
    *
    * @param none
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @return Void
    */
    function _doRemoveStepFinal()
    {
        $this->DatabaseHandler->query("
        DELETE FROM " . DB_PREFIX . "forums 
        WHERE forum_id = {$this->_forum}");

        $this->DatabaseHandler->query("
        DELETE FROM " . DB_PREFIX . "moderators
        WHERE mod_forum = {$this->_forum}");

        $this->CacheHandler->updateCache('moderators');
        $this->CacheHandler->updateCache('forums');

        $this->OnePanel->messenger($this->LanguageHandler->forum_rem_err_done, GATEWAY . '?a=forums&code=02');
    }
}
?>