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
	var $_PageHandler;

   // ! Action Method

   /**
	* Comment
	*
	* @param String $string Description
	* @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
	* @since v1.0
	* @return String
	*/
	function ModuleObject(& $module, & $config, $cache)
	{
		$this->MasterObject($module, $config, $cache);

		require_once SYSTEM_PATH . 'lib/page.han.php';
		$this->_PageHandler = new PageHandler(isset($this->get['p']) ? $this->get['p'] : 1,
											 $this->config['page_sep'],
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
		if(false == $this->config['active_on'])
		{
			return $this->messenger(array('MSG' => 'err_active_disabled'));
		}

		if(false == $this->UserHandler->getField('class_canSeeActive'))
		{
			return $this->messenger(array('MSG' => 'err_no_perm'));
		}

		$bot_list   = '';
		$bot_bits   = '';
		$bot_agents = array();
		$bot_names  = array();

		foreach(explode("\n", $this->config['bots_agents']) as $bot)
		{
			list($agent, $name) = explode('=', $bot);

			if($agent && $name)
			{
				$bot_agents[]	  = preg_quote($agent, '/');
				$bot_names[$agent] = $name;
			}
		}

		$bot_string = implode('|', $bot_agents);

		$sql = $this->DatabaseHandler->query("
		SELECT COUNT(active_id) as Count
		FROM " . DB_PREFIX . "active",
		__FILE__, __LINE__);

		$row = $sql->getRow();

		$this->_PageHandler->setRows($row['Count']);
		$this->_PageHandler->doPages(GATEWAY . '?a=active');

		$pages = $this->_PageHandler->getSpan();
		$count = $row['Count'];

		$sql = $this->_PageHandler->getData("
		SELECT
			a.*,
			m.members_id,
			m.members_name,
			c.class_canUseNotes,
			c.class_title,
			c.class_prefix,
			c.class_suffix,
			t.topics_title,
			t.topics_forum,
			f.forum_name,
			f.forum_id
		FROM " . DB_PREFIX . "active a
			LEFT JOIN " . DB_PREFIX . "forums  f ON f.forum_id   = a.active_forum
			LEFT JOIN " . DB_PREFIX . "members m ON m.members_id = a.active_user
			LEFT JOIN " . DB_PREFIX . "class   c ON c.class_id   = m.members_class
			LEFT JOIN " . DB_PREFIX . "topics  t ON t.topics_id  = a.active_topic
		ORDER BY
			a.active_time DESC",
		__FILE__, __LINE__);

		$list = '';

		while($row = $sql->getRow())
		{
			$title = $row['active_forum'] ? $row['forum_name']   : $row['topics_title'];
			$type  = $row['active_forum'] ? true : false;
			$forum = $row['topics_forum'] ? $row['topics_forum'] : $row['forum_id'];
			$id	= $row['active_topic'] ? $row['active_topic'] : $row['active_forum'];

			$row['active_time']	 = $this->TimeHandler->doDateFormat($this->config['date_long'], $row['active_time']);
			$row['active_location'] = $this->getLocation($id, $title, $row['active_location'], $type, $forum);

			$row['active_notes']	= $row['class_canUseNotes']
									? "<a href='" . GATEWAY ."?a=notes&amp;CODE=07&amp;send={$row['members_id']}'><macro:btn_mini_note></a>"
									: $this->LanguageHandler->blank;

			if(preg_match('#' . $bot_string . '#i', $row['active_agent'], $agent))
			{
				$row['members_name'] = $bot_names[trim($agent[0])];
			}

			$row['active_user']	 = $row['active_user'] != 1
									? "<a href='" . GATEWAY . "?getuser={$row['active_user']}'>" .
									  "{$row['class_prefix']}{$row['members_name']}{$row['class_suffix']}</a>"
									: $row['class_prefix'] . $row['members_name'] . $row['class_suffix'];

			$row['active_ip']	   = USER_ADMIN || USER_MOD
									? " ( {$row['active_ip']} )": '';

			$list .= eval($this->TemplateHandler->fetchTemplate('active_row'));
		}

		$content = eval($this->TemplateHandler->fetchTemplate('active_table'));
		return	 eval($this->TemplateHandler->fetchTemplate('global_wrapper'));
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
	function getLocation($id, $title, $location, $type, $forum)
	{
		$modules = array(
			'main'	 => $this->LanguageHandler->location_main,
			'logon'	=> $this->LanguageHandler->location_logon,
			'register' => $this->LanguageHandler->location_register,
			'misc'	 => $this->LanguageHandler->location_main,
			'post'	 => $this->LanguageHandler->location_post,
			'search'   => $this->LanguageHandler->location_search,
			'active'   => $this->LanguageHandler->location_active,
			'help'	 => $this->LanguageHandler->location_help,
			'members'  => $this->LanguageHandler->location_members,
			'profile'  => $this->LanguageHandler->location_profile,
			'ucp'	  => $this->LanguageHandler->location_ucp,
			'notes'	=> $this->LanguageHandler->location_notes,
			'active'   => $this->LanguageHandler->location_active,
			'print'	=> $this->LanguageHandler->location_print,
			'email'	=> $this->LanguageHandler->location_email,
			'calendar' => $this->LanguageHandler->location_calendar);

		if($type && $location == 'topics' && $title)
		{
			if($this->ForumHandler->checkAccess('can_view', $forum) &&
			   $this->ForumHandler->checkAccess('can_read', $forum))
			{
				return $this->LanguageHandler->location_forum . " <a href='" . GATEWAY . "?getforum={$id}'>{$title}</a>";
			}

			$location = 'main';
		}
		else if(false == $type && $title && $location == 'read')
		{
			if($this->ForumHandler->checkAccess('can_view', $forum) &&
			   $this->ForumHandler->checkAccess('can_read', $forum))
			{
				return $this->LanguageHandler->location_reading . " <a href='" . GATEWAY . "?gettopic={$id}'>{$title}</a>";
			}

			$location = 'main';
		}
		else if(false == isset($modules[$location]))
		{
			$location = 'main';
		}

		return $modules[$location];
	}

}

?>