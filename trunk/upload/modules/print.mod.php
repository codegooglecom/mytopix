<?php

/***
 * MyTopix | Personal Message Board
 * Copyright (C) 2005 - 2007 Wilhelm Murdoch
 * 
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 ***/

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

		$this->_id = false == isset($this->get['t'])  ? 0  : (int) $this->get['t'];
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
		$sql = $this->DatabaseHandler->query("
		SELECT 
			t.topics_id, 
			t.topics_title, 
			t.topics_forum,
			t.topics_date,
			m.members_id,
			m.members_name
		FROM " . DB_PREFIX . "topics t
			LEFT JOIN " . DB_PREFIX . "members m ON m.members_id = t.topics_author
		WHERE t.topics_id = {$this->_id}", __FILE__, __LINE__);

		if(false == $sql->getNumRows())
		{
			return $this->messenger();
		}

		$topic = $sql->getRow();

		$options = F_BREAKS | F_SMILIES | F_CODE | F_CURSE;

		$topic['topics_date']  = $this->TimeHandler->doDateFormat($this->config['date_short'],
																  $topic['topics_date']);

		if(false == $this->ForumHandler->checkAccess('can_view', $topic['topics_forum']))
		{
			return $this->messenger(array('MSG' => 'err_no_perm'));
		}

		if(false == $this->ForumHandler->checkAccess('can_read', $topic['topics_forum']))
		{
			return $this->messenger(array('MSG' => 'err_no_perm'));
		}

		$sql = $this->DatabaseHandler->query("
		SELECT 
			p.posts_id, 
			p.posts_author, 
			p.posts_date, 
			p.posts_body, 
			p.posts_code,
			p.posts_emoticons,
			m.members_id, 
			m.members_name, 
			m.members_posts, 
			m.members_homepage, 
			m.members_sig, 
			c.class_title, 
			c.class_prefix, 
			c.class_suffix
		FROM " . DB_PREFIX . "members m
			LEFT JOIN " . DB_PREFIX . "posts p ON p.posts_author = m.members_id
			LEFT JOIN " . DB_PREFIX . "class c ON c.class_id	 = m.members_class
		WHERE 
			p.posts_topic = {$this->_id}
		ORDER BY 
			p.posts_date", 
		__FILE__, __LINE__);

		if(false == $sql->getNumRows())
		{
			return $this->messenger();
		}

		$content = '';
		while($row = $sql->getRow())
		{
			$options  = F_ENTS | F_BREAKS | F_CURSE;
			$options |= $row['posts_code']	  ? F_CODE	: '';
			$options |= $row['posts_emoticons'] ? F_SMILIES : '';

			$row['posts_body'] = $this->ParseHandler->parseText($row['posts_body'], $options);
			$row['posts_date'] = $this->TimeHandler->doDateFormat($this->config['date_short'],
																  $row['posts_date']);

			$content .= eval($this->TemplateHandler->fetchTemplate('print_row'));
		}

		return eval($this->TemplateHandler->fetchTemplate('print_body'));
	}

}

?>