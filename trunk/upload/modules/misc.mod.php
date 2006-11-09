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

		$this->_id   = isset($this->get['id'])   ? (int) $this->get['id']   : 0;
		$this->_code = isset($this->get['CODE']) ?	   $this->get['CODE'] : 00;
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
				return $this->_doEmoticonList();
				break;

			case '01':
				return $this->_flushAttachment();
				break;

			case 'p00p':
				return $this->_takeCrap();

			default:
				return $this->messenger();
				break;
		}
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
	function _flushAttachment()
	{
		$sql = $this->DatabaseHandler->query("
		SELECT
			t.topics_forum,
			u.upload_name,
			u.upload_file,
			u.upload_ext,
			u.upload_mime
		FROM " . DB_PREFIX . "uploads u
			LEFT JOIN " . DB_PREFIX . "posts  p ON p.posts_id  = u.upload_post
			LEFT JOIN " . DB_PREFIX . "topics t ON t.topics_id = p.posts_topic
		WHERE u.upload_id = {$this->_id}
		ORDER BY u.upload_id DESC",
		__FILE__, __LINE__);

		if(false == $sql->getNumRows())
		{
			return $this->messenger();
		}
	
		$upload	= $sql->getRow();
		$file_path = SYSTEM_PATH . "uploads/attachments/{$upload['upload_file']}.{$upload['upload_ext']}";

		if(false == file_exists($file_path))
		{
			return $this->messenger();
		}

		if(false == $this->ForumHandler->checkAccess('can_view', $upload['topics_forum']) || 
		   false == $this->ForumHandler->checkAccess('can_read', $upload['topics_forum']))
		{
			return $this->messenger(array('MSG' => 'file_err_no_perm'));
		}

		$attach_type = 'attachment';

		if(in_array($upload['upload_ext'], explode('|', $this->config['good_image_types'])))
		{
			$attach_type = 'inline';
		}

		header("Content-Type: {$upload['upload_mime']}");
		header("Content-Disposition: {$attach_type}; filename=\"{$upload['upload_name']}\"");
		header("Content-Length: " . filesize($file_path));

		readfile($file_path);

		$this->DatabaseHandler->query("
		UPDATE " . DB_PREFIX . "uploads SET
			upload_hits = (upload_hits + 1)
		WHERE upload_id = {$this->_id}",
		__FILE__, __LINE__);

		exit();
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
	function _doEmoticonList()
	{
		$this->ParseHandler->getEmoticons();

		$code = array();
		$name = array();

		foreach($this->ParseHandler->emoticons as $emoticon)
		{
			$code[] = $emoticon['CODE'];
			$name[] = $emoticon['NAME'];
		}

		$list = '';

		for($i = 0; $i < sizeof($code); $i++)
		{
			$list .= eval($this->TemplateHandler->fetchTemplate('emoticon_row'));
		}

		return eval($this->TemplateHandler->fetchTemplate('emoticon_wrapper'));
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
	function _takeCrap()
	{
		header("Content-Type: image/gif");
		header("Content-Disposition: inline; filename=\"p00p.gif\"");

		echo base64_decode('R0lGODlhEAAQAKIFAAAAAHspCJxCGL1jOf///////wAAAP///yH/C05FVFNDQVBFMi4wAwEAAAAh+' .
			'QQJCgAFACwAAAAAEAAQAAADRli63ArPLTgHpLKAES742CSAQ1mGmqAKXMCiWiDLgIqCeG1PgbmuHR6rNaM9ZMMcL'	 . 
			'jYyOUs2gOv5FHSkvyzwU+x2PUplIQEAIfkECQoABQAsAAAAABAAEAAAA0hYutwNDsYhHQMjQMB5FN0gip'			. 
			'UCCKiQBWppBjB8gsvW3WkFBCM6C5oaSxQrSnZDyu1W2KFGUJHPGY0COaxcaqtBFr8x23IMSQAAIfkECQo'			.
			'ABQAsAAAAABAAEAAAA0dYutwNCjoGhpyrBgh6d4DgDSR5RUIqDEGwnlErh+Lj3eoFBKWqbpLdiiWbxUKm'			. '260gHJpKg1THBa1GgS6fNoUteoscpfiTAAAh+QQJCgAFACwAAAAAEAAQAAADR1hasP6rOQnBoDCO0ID3z'			. 'CR8Q1lijKAKW8CiTCDLgIp+eG1HgbmOAg6P1ZrRFAAZMYeLqUzQki1JjPo4VN3vhzV6vR2muJAAACH5BA'			. 'kKAAUALAAAAAAQABAAAANHWLrcDQw+BYZ0cQQIeneA4A0keVFCKmjBykVBHIfi493qBQSlqm6L3Yolm1F'			. 'iw5uyIKyUnoNUpwWFCjZCn9SHLXq9HKX4kwAAIfkEBQoABQAsAAAAABAAEAAAA0hYutwNwEkwYmRX0WAh'			. 'dIDgDSSZWUIqDEGwZgvQzqH4eLh6BqWqcjEXaUa8yIQVHK4gS5WepBQESYEOBJymb5vKEr/fjnIcSQAAOw==');
	}
}

?>