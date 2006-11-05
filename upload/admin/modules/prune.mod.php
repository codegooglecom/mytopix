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
	var $_comp1;

   /**
	* Variable Description
	* @access Private
	* @var Integer
	*/
	var $_comp2;

   /**
	* Variable Description
	* @access Private
	* @var Integer
	*/
	var $_comp3;

   /**
	* Variable Description
	* @access Private
	* @var Integer
	*/
	var $OnePanel;

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

		$this->_code = isset($this->get['code'])  ? $this->get['code']  : 00;
		$this->_hash = isset($this->post['hash']) ? $this->post['hash'] : null;

		require_once SYSTEM_PATH . 'admin/lib/onepanel.php';
		$this->OnePanel = new OnePanel($this);

		require_once SYSTEM_PATH . 'lib/file.han.php';
		$this->_FileHandler  = new FileHandler($this->config);

		$this->_comp1 = array('contain' => $this->LanguageHandler->comp_contain,
							  'equal'   => $this->LanguageHandler->comp_equal, 
							  'begin'   => $this->LanguageHandler->comp_begin, 
							  'end'	 => $this->LanguageHandler->comp_end);

		$this->_comp2 = array('equal'	  => '=', 
							  'greater'	=> '>', 
							  'lesser'	 => '<', 
							  'lessequal'  => '<=', 
							  'greatequal' => '>=');

		$this->_comp3 = array('greater'	=> '>', 
							  'lesser'	 => '<');
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
				$this->OnePanel->_make_nav(1, 2);
				$this->_showSearchForm();
				break;

			case '01':
				$this->OnePanel->_make_nav(1, 2);
				$this->_doSearch();
				break;

			case '02':
				$this->OnePanel->_make_nav(1, 2);
				$this->_doPrune();
				break;

			default:
				$this->OnePanel->_make_nav(1, 2);
				$this->_showSearchForm();
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
	function _showSearchForm()
	{
		$this->OnePanel->addHeader($this->LanguageHandler->prune_form_header);
		$this->OnePanel->appendBuffer($this->LanguageHandler->prune_tip);
		$this->OnePanel->form->appendBuffer("<form method=\"post\" action=\"" . GATEWAY . '?a=prune&amp;code=01#results">');
		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());

			$this->OnePanel->table->addColumn($this->LanguageHandler->prune_tbl_field, "align='left'");
			$this->OnePanel->table->addColumn('&nbsp;');
			$this->OnePanel->table->addColumn($this->LanguageHandler->prune_tbl_term,  "align='center' style='width: 40px;'");

			$this->OnePanel->table->startTable($this->LanguageHandler->prune_form_header);

				$this->OnePanel->table->addRow(array($this->LanguageHandler->prune_form_name,
										   $this->OnePanel->form->addSelect('name_type', $this->_comp1, false, false, false, true),
										   array($this->OnePanel->form->addTextBox('name',	 false, false, false, true), ' align="right"')));

				$this->OnePanel->table->addRow(array($this->LanguageHandler->prune_form_title,
										   $this->OnePanel->form->addSelect('title_type', $this->_comp1, false, false, false, true),
										   array($this->OnePanel->form->addTextBox('title',	 false, false, false, true), ' align="right"')));

				$this->OnePanel->table->addRow(array($this->LanguageHandler->prune_form_posts,
										   $this->OnePanel->form->addSelect('post_type', $this->_comp2, false, false, false, true),
										   array($this->OnePanel->form->addTextBox('post',	 false, false, false, true), ' align="right"')));

				$this->OnePanel->table->addRow(array($this->LanguageHandler->prune_form_views,
										   $this->OnePanel->form->addSelect('view_type', $this->_comp2, false, false, false, true),
										   array($this->OnePanel->form->addTextBox('view',	 false, false, false, true), ' align="right"')));

				$this->OnePanel->table->addRow(array($this->LanguageHandler->prune_form_age,
										   $this->OnePanel->form->addSelect('age_type', $this->_comp3, false, false, false, true),
										   array($this->OnePanel->form->addTextBox('age',	 false, false, false, true), ' align="right"')));

				$this->OnePanel->table->addRow(array($this->LanguageHandler->prune_form_last,
										   $this->OnePanel->form->addSelect('last_type', $this->_comp3, false, false, false, true),
										   array($this->OnePanel->form->addTextBox('last',	 false, false, false, true), ' align="right"')));

			$forum_select  = "<option value=\"0\" selected=\"selected\">{$this->LanguageHandler->prune_any_forum}</option>";
			$forum_select .= $this->ForumHandler->makeDropDown($mod['mod_forum']);

				$this->OnePanel->table->addRow(array($this->LanguageHandler->prune_form_forum,
										   '&nbsp;',
										   array($this->OnePanel->form->addSelect('forums[]', false, false, " size='5' style='width: 300px;' multiple='multiple'", false, true, $forum_select), ' align="right"')));

				$this->OnePanel->table->addRow(array($this->LanguageHandler->prune_form_locked,
										   '&nbsp;',
										   array($this->OnePanel->form->addYesNo('locked', false, false, false, true, false), ' align="right"')));

				$this->OnePanel->table->addRow(array($this->LanguageHandler->prune_form_stuck,
										   '&nbsp;',
										   array($this->OnePanel->form->addYesNo('stuck', false, false, false, true, false), ' align="right"')));

				$this->OnePanel->table->addRow(array($this->LanguageHandler->prune_form_announce,
										   '&nbsp;',
										   array($this->OnePanel->form->addYesNo('announce', false, false, false, true, false), ' align="right"')));

				$this->OnePanel->table->addRow(array($this->LanguageHandler->prune_form_poll,
										   '&nbsp;',
										   array($this->OnePanel->form->addYesNo('poll', false, false, false, true, false), ' align="right"')));

				$this->OnePanel->table->addRow(array($this->LanguageHandler->prune_form_file,
										   '&nbsp;',
										   array($this->OnePanel->form->addYesNo('file', false, false, false, true, false), ' align="right"')));

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
	function _doSearch()
	{
		$trailer = array();
		foreach($this->post as $key => $val)
		{
			$trailer[] = "{$key}={$val}";
		}

		foreach($this->get as $key => $val)
		{
			$trailer[] = "{$key}={$val}";
		}

		$trailer = implode('&', $trailer);

		extract($this->post);
		extract($this->get);

		$query = array();

		if($name)
		{
			switch($name_type)
			{
				case 'equal':
					$query[] = "AND (m.members_name	  = '{$name}'";
					$query[] = "OR  t.topics_author_name = '{$name}')";
					break;

				case 'contain':
					$query[] = "AND (m.members_name	  LIKE '%{$name}%'";
					$query[] = "OR  t.topics_author_name LIKE '%{$name}%')";
					break;

				case 'begin':
					$query[] = "AND (m.members_name	  LIKE '{$name}%'";
					$query[] = "OR  t.topics_author_name LIKE '{$name}%')";
					break;

				case 'end':
					$query[] = "AND (m.members_name	  LIKE '%{$name}'";
					$query[] = "OR  t.topics_author_name LIKE '%{$name}')";
					break;
			}
		}

		if(sizeof($forums) == 1 && in_array('0', $forums))
		{
			$forums = null;
		}

		if($forums)
		{
			$forums_in = implode("','", $forums);
			$query[] = "AND t.topics_forum IN ('{$forums_in}')";
		}

		if($title)
		{
			switch($title_type)
			{
				case 'equal':
					$query[] = "AND t.topics_title = '{$title}'";
					break;

				case 'contain':
					$query[] = "AND t.topics_title LIKE '%{$title}%'";
					break;

				case 'begin':
					$query[] = "AND t.topics_title LIKE '{$title}%'";
					break;

				case 'end':
					$query[] = "AND t.topics_title LIKE '%{$title}'";
					break;
			}
		}

		if($post > 0)
		{
			$post = (int) $post;

			switch($post_type)
			{
				case 'equal':
					$query[] = "AND t.topics_posts = {$post}";
					break;

				case 'greater':
					$query[] = "AND t.topics_posts > {$post}";
					break;

				case 'lesser':
					$query[] = "AND t.topics_posts < {$post}";
					break;

				case 'lessequal':
					$query[] = "AND t.topics_posts <= {$post}";
					break;

				case 'greatequal':
					$query[] = "AND t.topics_posts >= {$post}";
					break;
			}
		}

		if($view)
		{
			$view = (int) $view;

			switch($view_type)
			{
				case 'equal':
					$query[] = "AND t.topics_views = {$view}";
					break;

				case 'greater':
					$query[] = "AND t.topics_views > {$view}";
					break;

				case 'lesser':
					$query[] = "AND t.topics_views < {$view}";
					break;

				case 'lessequal':
					$query[] = "AND t.topics_views <= {$view}";
					break;

				case 'greatequal':
					$query[] = "AND t.topics_views >= {$view}";
					break;
			}
		}

		if($age)
		{
			$age = (int) time() - ((($age * 60) * 60) * 24);

			switch($age_type)
			{
				case 'greater':
					$query[] = "AND t.topics_date > {$age}";
					break;
				case 'lesser':
					$query[] = "AND t.topics_date < {$age}";
					break;
			}
		}

		if($last)
		{
			$last = (int) time() - ((($last * 60) * 60) * 24);

			switch($last_type)
			{
				case 'greater':
					$query[] = "AND t.topics_last_post_time > {$last}";
					break;
				case 'lesser':
					$query[] = "AND t.topics_last_post_time < {$last}";
					break;
			}
		}

		if($locked)   $query[] = "AND t.topics_state	= {$locked}";
		if($stuck)	$query[] = "AND t.topics_pinned   = {$stuck}";
		if($poll)	 $query[] = "AND t.topics_is_poll  = {$poll}";
		if($announce) $query[] = "AND t.topics_announce = {$announce}";
		if($file)	 $query[] = "AND t.topics_has_file = {$file}";

		if(false == $query)
		{
			$this->OnePanel->messenger($this->LanguageHandler->prune_err_no_fields, GATEWAY . '?a=prune');
		}

		$query = substr(implode(" \n", $query), 4);

		$string = "
		SELECT 
			m.members_id,
			m.members_name,
			t.topics_id,
			t.topics_posts,
			t.topics_title,
			t.topics_date,
			t.topics_last_post_time,
			t.topics_posts,
			t.topics_author_name,
			f.forum_id,
			f.forum_name
		FROM " . DB_PREFIX . "topics t
			LEFT JOIN " . DB_PREFIX . "members m ON m.members_id = t.topics_author
			LEFT JOIN " . DB_PREFIX . "forums  f ON f.forum_id   = t.topics_forum
		WHERE {$query}
		ORDER BY t.topics_last_post_time DESC";

		$sql = $this->DatabaseHandler->query($string);

		if(false == $sql->getNumRows())
		{
			$this->OnePanel->messenger($this->LanguageHandler->prune_err_no_results, GATEWAY . '?a=prune');
		}

		$this->OnePanel->appendBuffer("<a name='results'></a>");

		$this->OnePanel->appendBuffer("
		<script language='javascript'>
			function doConfirm()
			{
				choice = confirm('{$this->LanguageHandler->prune_err_confirm}');

				return choice;
			}
		</script>");

		$this->OnePanel->addHeader($this->LanguageHandler->prune_result_header);

		$this->OnePanel->appendBuffer("<form method=\"post\" action=\"" . GATEWAY . '?a=prune&amp;code=02">');

			$this->OnePanel->table->addColumn($this->LanguageHandler->prune_tbl_id);
			$this->OnePanel->table->addColumn($this->LanguageHandler->prune_tbl_title);
			$this->OnePanel->table->addColumn($this->LanguageHandler->prune_tbl_author, 'align="center"');
			$this->OnePanel->table->addColumn($this->LanguageHandler->prune_tbl_posts,  'align="center"');
			$this->OnePanel->table->addColumn($this->LanguageHandler->prune_tbl_forum,  'align="center"');
			$this->OnePanel->table->addColumn($this->LanguageHandler->prune_tbl_date,   'align="center"');
			$this->OnePanel->table->addColumn($this->LanguageHandler->prune_tbl_prune,  'align="center" style="width: 5px;"');

			$this->OnePanel->table->startTable(number_format($sql->getNumRows()) . ' ' . $this->LanguageHandler->prune_tbl_header);

			while($row = $sql->getRow())
			{

				if($row['members_id'] == 1)
				{
					$author = $row['topics_author_name'];
				}
				else {
					$author = "<a href=\"" . GATEWAY . "?a=members&amp;code=05&amp;id={$row['members_id']}\" " . 
							  "title=\"\">{$row['members_name']}</a>";
				}

				if(strlen($row['topics_title']) > 25)
				{
					$row['topics_title'] = substr($row['topics_title'], 0, 25) . ' ...';
				}

				$this->OnePanel->table->addRow(array(array("<strong>{$row['topics_id']}</strong>", false, 'headera'),
										   array("<a href=\"{$this->config['site_link']}index.php?a=read&amp;t={$row['topics_id']}\"  title=\"\" target='_blank'>{$row['topics_title']}</a>", false, 'headerb'),
										   array($author, ' align="center"', 'headerb'),
										   array(number_format($row['topics_posts']), ' align="center"', 'headerb'),
										   array("<a href=\"" . GATEWAY . "?a=forums&amp;code=04&amp;forum={$row['forum_id']}\">{$row['forum_name']}</a>", ' align="center"'),
										   array(date($this->config['date_short'], $row['topics_date']), ' align="center"', 'headerb'),
										   array($this->OnePanel->form->addCheckBox('prune[]', $row['topics_id'], " checked=\"checked\"", false, true, false, false, false, 'c'), " valign=\"top\" align=\"center\"")));
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
	function _doPrune()
	{
		if($this->_hash != $this->UserHandler->getUserhash())
		{
			$this->OnePanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
		}

		extract($this->post);

		$list = array();
		foreach($prune as $id)
		{
			$topicList[] = "topics_id   = {$id}";
			$postList[]  = "posts_topic = {$id}";
			$pollList[]  = "poll_topic  = {$id}";
			$voteList[]  = "vote_topic  = {$id}";
		}

		$topics = implode(' OR ', $topicList);
		$posts  = implode(' OR ', $postList);
		$polls  = implode(' OR ', $pollList);
		$votes  = implode(' OR ', $voteList);
		
		$sql = $this->DatabaseHandler->query("SELECT posts_id FROM " . DB_PREFIX . "posts WHERE {$posts}");

		$file_posts = array();

		while($row = $sql->getRow())
		{
			$sql_files = $this->DatabaseHandler->query("
			SELECT
				upload_id,
				upload_file,
				upload_ext
			FROM " . DB_PREFIX . "uploads
			WHERE upload_post = {$row['posts_id']}");

			$file = $sql_files->getRow();

			unlink(SYSTEM_PATH . "uploads/attachments/{$file['upload_file']}.{$file['upload_ext']}"); 

			$file_posts[] = "upload_post = {$row['posts_id']}";
		}

		$files = implode(' OR ', $file_posts);

		$count  = sizeof($prune);

		$this->DatabaseHandler->query("DELETE FROM " . DB_PREFIX . "uploads WHERE {$files}");
		$this->DatabaseHandler->query("DELETE FROM " . DB_PREFIX . "topics  WHERE {$topics}");
		$this->DatabaseHandler->query("DELETE FROM " . DB_PREFIX . "posts   WHERE {$posts}");
		$this->DatabaseHandler->query("DELETE FROM " . DB_PREFIX . "polls   WHERE {$polls}");
		$this->DatabaseHandler->query("DELETE FROM " . DB_PREFIX . "voters  WHERE {$votes}");

		$sql	= $this->DatabaseHandler->query("SELECT topics_id FROM " . DB_PREFIX . "topics");
		$topics = $sql->getNumRows();

		$sql	= $this->DatabaseHandler->query("SELECT posts_id FROM " . DB_PREFIX . "posts");
		$post   = $sql->getNumRows();

		$this->config['topics'] = $topics;
		$this->config['posts']  = $post - $topics;

		$this->_FileHandler->updateFileArray($this->config, 'config', SYSTEM_PATH . 'config/settings.php');

		$this->ForumHandler->updateForumStats();
		$this->CacheHandler->updateCache('forums');

		$this->OnePanel->messenger(number_format($count) . ' ' . $this->LanguageHandler->prune_err_done, GATEWAY . '?a=prune');
	}
}

?>