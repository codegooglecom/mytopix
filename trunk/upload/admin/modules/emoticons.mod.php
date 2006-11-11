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
	var $_skin;

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

		$this->_id   = isset($this->get['id'])	? (int) $this->get['id']	: 0;
		$this->_code = isset($this->get['code'])  ?	   $this->get['code']  : 00;
		$this->_hash = isset($this->post['hash']) ?	   $this->post['hash'] : null;
		$this->_skin = $this->config['skin'];

		if(isset($this->post['skin']))
		{
			$this->_skin = $this->post['skin'];
		}
		elseif(isset($this->get['skin']))
		{
			$this->_skin = (int) $this->get['skin'];
		}

		require_once SYSTEM_PATH . 'admin/lib/mypanel.php';
		$this->MyPanel = new MyPanel($this);

		require_once SYSTEM_PATH . 'lib/file.han.php';
		$this->_FileHandler = new FileHandler($this->config);
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
		$this->MyPanel->addHeader($this->LanguageHandler->emo_header);


		switch($this->_code)
		{
			case '00':
				$this->MyPanel->_make_nav(5, 17, 29, $this->_skin);
				$this->_showEmoticons();
				break;

			case '01':
				$this->MyPanel->_make_nav(5, 17, -2, $this->_skin);
				$this->_doRemoveEmoticon();
				break;

			case '02':
				$this->MyPanel->_make_nav(5, 17, -2, $this->_skin);
				$this->_showEmoticonEditForm();
				break;

			case '03':
				$this->MyPanel->_make_nav(5, 17, -2, $this->_skin);
				$this->_doEmoticonEdit();
				break;

			case '04':
				$this->MyPanel->_make_nav(5, 17, 30, $this->_skin);
				$this->_showUploadForm();
				break;

			case '05':
				$this->MyPanel->_make_nav(5, 17, 30, $this->_skin);
				$this->_doUpload();
				break;

			case '06':
				$this->MyPanel->_make_nav(5, 17, 31, $this->_skin);
				$this->_showImportForm();
				break;

			case '07':
				$this->MyPanel->_make_nav(5, 17, 31, $this->_skin);
				$this->_doImport();
				break;

			default:
				$this->MyPanel->_make_nav(5, 17, 29, $this->_skin);
				$this->_showEmoticons();
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
	function _showEmoticons()
	{
		$this->MyPanel->form->startForm(GATEWAY . '?a=emoticons');
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

			$this->MyPanel->form->addWrapSelect('skin',  $this->_fetchSkins(), $this->_skin, false,
		   									 array(1, $this->LanguageHandler->emo_form_choose_title,
		  											  $this->LanguageHandler->emo_form_choose_desc));

		$this->MyPanel->form->endForm();
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

		$this->MyPanel->table->addColumn($this->LanguageHandler->emo_list_tbl_id, ' width="1%"');
		$this->MyPanel->table->addColumn($this->LanguageHandler->emo_list_tbl_image, ' width="1%"');
		$this->MyPanel->table->addColumn($this->LanguageHandler->emo_list_tbl_code,  " align='center'");
		$this->MyPanel->table->addColumn($this->LanguageHandler->emo_list_tbl_click, " align='center'");
		$this->MyPanel->table->addColumn('&nbsp;', ' width="15%"');

		$sql = $this->DatabaseHandler->query("SELECT skins_name FROM " . DB_PREFIX . "skins WHERE skins_id = {$this->_skin}");

		if(false == $sql->getNumRows())
		{
			$this->MyPanel->messenger($this->LanguageHandler->emo_list_no_skin, GATEWAY . '?a=emoticons');
		}

		$row = $sql->getRow();

		$this->MyPanel->table->startTable(sprintf($this->LanguageHandler->emo_list_tbl_header, $row['skins_name']));

			$sql = $this->DatabaseHandler->query("SELECT * FROM " . DB_PREFIX . "emoticons WHERE emo_skin = {$this->_skin} ORDER BY emo_id ASC");

			$i = 0;
			while($row = $sql->getRow())
			{
				$i++;

				$path = SYSTEM_PATH . "skins/{$this->_skin}/emoticons/{$row['emo_name']}";

				if(false == file_exists($path))
				{
					$image = "???";

				}
				else {
					$image = "<img src=\"{$path}\" alt=\"{$row['emo_name']}\" />";
				}

				$clicky = $row['emo_click']
						? "<b>{$this->LanguageHandler->yes}</b>"
						: $this->LanguageHandler->blank;

				$this->MyPanel->table->addRow(array(array("<a name=\"{$row['emo_id']}\"></a><strong>{$row['emo_id']}</strong>", ' align="center"', 'headera'),
											   array($image, ' align="center"', 'headera'),
											   array($row['emo_code'], " align='center'", 'headerb'),
											   array($clicky, " align='center'", 'headerb'),
											   array("<a href=\"" . GATEWAY . "?a=emoticons&amp;code=02&amp;id" .
													 "={$row['emo_id']}\">{$this->LanguageHandler->link_edit}</a>" .
													 " <a href=\"" . GATEWAY . "?a=emoticons&amp;code=01&amp;id" .
													 "={$row['emo_id']}&amp;skin={$this->_skin}\" onclick='javascript:" .
													 "return confirm(\"{$this->LanguageHandler->emo_list_err_confirm}\");'>" .
													 "<b>{$this->LanguageHandler->link_delete}</b></a>", " align='center'", 'headerc')));
			}

		$this->MyPanel->table->endTable();
		$this->MyPanel->appendBuffer($this->MyPanel->table->flushBuffer());
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
	function _doRemoveEmoticon()
	{
		$sql = $this->DatabaseHandler->query("SELECT emo_skin, emo_name FROM " . DB_PREFIX . "emoticons " .
											 "WHERE emo_id = {$this->_id}");

		if(false == $sql->getNumRows())
		{
			$this->MyPanel->messenger($this->LanguageHandler->emo_rem_err_no_results,
									   GATEWAY . "?a=emoticons&amp;skin={$this->_skin}");
		}

		$row  = $sql->getRow();
		$path = SYSTEM_PATH . "skins/{$row['emo_skin']}/emoticons/{$row['emo_name']}";

		if(false == file_exists($path))
		{
			$this->MyPanel->messenger($this->LanguageHandler->emo_rem_err_no_results,
									   GATEWAY . "?a=emoticons&amp;skin={$this->_skin}");
		}

		$this->DatabaseHandler->query("DELETE FROM " . DB_PREFIX . "emoticons WHERE emo_id = {$this->_id}");

		$this->CacheHandler->updateCache('emoticons');

		if(@unlink($path))
		{
			header("LOCATION: " . GATEWAY . "?a=emoticons&amp;skin={$this->_skin}");
		}

		$this->MyPanel->messenger($this->LanguageHandler->emo_rem_err_no_remove,
								   GATEWAY . "?a=emoticons&amp;skin={$this->_skin}");

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
	function _showEmoticonEditForm()
	{
		$sql = $this->DatabaseHandler->query("SELECT * FROM " . DB_PREFIX . "emoticons " .
											 "WHERE emo_id = {$this->_id}");

		if(false == $sql->getNumRows())
		{
			$this->MyPanel->messenger($this->LanguageHandler->emo_rem_err_no_results,
									   GATEWAY . "?a=emoticons&amp;skin={$this->_skin}");
		}

		$row  = $sql->getRow();
		$path = SYSTEM_PATH . "skins/{$row['emo_skin']}/emoticons/{$row['emo_name']}";

		if(false == file_exists($path))
		{
			$this->MyPanel->messenger($this->LanguageHandler->emo_rem_err_no_results,
									   GATEWAY . "?a=emoticons&amp;skin={$this->_skin}");
		}

		$this->MyPanel->form->startForm(GATEWAY . "?a=emoticons&amp;code=03&amp;id={$this->_id}");
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());


			$list = array();
			if($handle = opendir(SYSTEM_PATH . "skins/{$row['emo_skin']}/emoticons/"))
			{
				while(false !== ($file = readdir($handle)))
				{
					if($file != "." && $file != ".." && $file != 'index.html')
					{
						$list[$file] = $file;
					}
				}
				closedir($handle);
			}

			$out = $this->MyPanel->form->addSelect('name', $list, $row['emo_name'], "onchange=\"document.emoticon" .
													".src='" . SYSTEM_PATH . "skins/{$row['emo_skin']}/emoticons/'" .
													"+ this.options[selectedIndex].value\"", false, true)
													. "<img name=\"emoticon\" src=\"{$path}\" />";

			$this->MyPanel->form->addWrap($out, $this->LanguageHandler->emo_edit_image_title,
												 $this->LanguageHandler->emo_edit_image_desc, true);

			$this->MyPanel->form->addTextBox('code',  $row['emo_code'], false,
											  array(1, $this->LanguageHandler->emo_edit_code_title,
													   $this->LanguageHandler->emo_edit_code_desc));

			$this->MyPanel->form->addWrapSelect('skin',  $this->_fetchSkins(), $row['emo_skin'], false,
											 array(1, $this->LanguageHandler->emo_edit_skin_title,
													  $this->LanguageHandler->emo_edit_skin_desc));

			$this->MyPanel->form->appendBuffer("<h1>{$this->LanguageHandler->emo_form_options}</h1>");

			$this->MyPanel->form->addCheckBox('click', 1, false, false,
											false, ($row['emo_click'] ? true : false),$this->LanguageHandler->emo_edit_click_desc);

			$this->MyPanel->form->addHidden('hash', $this->UserHandler->getUserHash());

		$this->MyPanel->form->endForm();
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());
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
	function _doEmoticonEdit()
	{
		if($this->_hash != $this->UserHandler->getUserhash())
		{
			$this->MyPanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
		}

		extract($this->post);

		$sql = $this->DatabaseHandler->query("SELECT * FROM " . DB_PREFIX . "emoticons " .
											 "WHERE emo_id = {$this->_id}");

		if(false == $sql->getNumRows())
		{
			$this->MyPanel->messenger($this->LanguageHandler->emo_rem_err_no_results,
									   GATEWAY . "?a=emoticons&amp;skin={$this->_skin}");
		}

		$row  = $sql->getRow();
		$path = SYSTEM_PATH . "skins/{$row['emo_skin']}/emoticons/{$row['emo_name']}";

		if(false == file_exists($path))
		{
			$this->MyPanel->messenger($this->LanguageHandler->emo_rem_err_no_results,
									   GATEWAY . "?a=emoticons&amp;skin={$this->_skin}");
		}

		$code = false == isset($code) ? $row['emo_code'] : $code;

		$this->DatabaseHandler->query("
		UPDATE " . DB_PREFIX . "emoticons SET
			emo_name  = '{$name}',
			emo_code  = '{$code}',
			emo_skin  = {$skin},
			emo_click = " . (int) $click . "
		WHERE
			emo_id = {$this->_id}");

		$this->CacheHandler->updateCache('emoticons');

		$this->MyPanel->messenger($this->LanguageHandler->emo_edit_err_done,
								   GATEWAY . "?a=emoticons&amp;skin={$this->_skin}#{$this->_id}");
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
	function _showUploadForm()
	{
		$this->MyPanel->form->startForm(GATEWAY . '?a=emoticons&amp;code=05', false, 'POST', " enctype='multipart/form-data'");
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

			$ext   = explode('|', $this->config['good_image_types']);
			$types = '';

			foreach($ext as $type)
			{
				$types .= "<b>.{$type}</b>, ";
			}

			$types = substr($types, 0, strlen($types) - 2);

			$this->MyPanel->form->addFile('emoticon', array(1,
										   $this->LanguageHandler->emo_new_file_title,
										   sprintf($this->LanguageHandler->emo_new_file_desc, $types)));

			$this->MyPanel->form->addTextBox('code',  false, false,
											  array(1, $this->LanguageHandler->emo_new_code_title,
													   $this->LanguageHandler->emo_new_code_desc));

			$this->MyPanel->form->addWrapSelect('skin',  $this->_fetchSkins(), $this->_skin, false,
											 array(1, $this->LanguageHandler->emo_new_skin_title,
													  $this->LanguageHandler->emo_new_skin_desc));

			$this->MyPanel->form->appendBuffer("<h1>{$this->LanguageHandler->emo_form_options}</h1>");

			$this->MyPanel->form->addCheckBox('click', 1, false, false,
											false, false,$this->LanguageHandler->emo_edit_click_desc);

			$this->MyPanel->form->addHidden('hash', $this->UserHandler->getUserHash());

		$this->MyPanel->form->endForm();
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());
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
	function _doUpload()
	{
		if($this->_hash != $this->UserHandler->getUserhash())
		{
			$this->MyPanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
		}

		extract($this->post);
		extract($this->files);

		if(false == isset($this->files['emoticon']))
		{
			$this->MyPanel->messenger($this->LanguageHandler->emo_new_err_empty,
									   GATEWAY . '?a=emoticons&amp;code=05');
		}

		$sql = $this->DatabaseHandler->query("SELECT emo_id FROM " . DB_PREFIX . "emoticons WHERE emo_name = '{$emoticon['name']}'");

		if($sql->getNumRows())
		{
			$this->MyPanel->messenger($this->LanguageHandler->emo_new_err_exists,
									   GATEWAY . '?a=emoticons&amp;code=05');
		}

		$dir = $this->config['site_path'] . "skins/{$this->_skin}/emoticons/";

		require_once SYSTEM_PATH . 'lib/upload.han.php';
		$UploadHandler = new UploadHandler($this->files, $dir, 'emoticon', true);

		$UploadHandler->setImgTypes(explode('|', $this->config['good_image_types']));
		$UploadHandler->setMaxSize(500);

		if(false == $UploadHandler->doUpload())
		{
			$error_msg = $UploadHandler->getError();
			return $this->MyPanel->messenger($this->LanguageHandler->$error_msg, GATEWAY . '?a=emoticons&amp;code=05');
		}

		if(false == $code)
		{
			list($name, $ext) = explode('.', $emoticon['name']);
			$code = ":{$name}:";
		}

		$click = false == isset($click) ? 0 : (int) $click;

		$this->DatabaseHandler->query("
		INSERT INTO " . DB_PREFIX . "emoticons(
			emo_skin,
			emo_name,
			emo_code,
			emo_click)
		VALUES(
			{$this->_skin},
			'{$emoticon['name']}',
			'{$code}',
			" . (int) $click . ")");

		$this->CacheHandler->updateCache('emoticons');

		$this->MyPanel->messenger($this->LanguageHandler->emo_new_err_done,
								   GATEWAY . "?a=emoticons&skin={$this->_skin}");
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
	function _showImportForm()
	{
		$this->MyPanel->form->startForm(GATEWAY . '?a=emoticons&amp;code=06');
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

			$this->MyPanel->form->addWrapSelect('skin',  $this->_fetchSkins(), $this->_skin, false,
											 array(1, $this->LanguageHandler->emo_all_choose_title,
													  $this->LanguageHandler->emo_all_choose_desc));

		$this->MyPanel->form->endForm();
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

		$this->MyPanel->appendBuffer("<form method=\"post\" action=\"" . GATEWAY . '?a=emoticons&amp;code=07">');

			$this->MyPanel->table->addColumn($this->LanguageHandler->emo_all_tbl_image,   " width='1%'");
			$this->MyPanel->table->addColumn($this->LanguageHandler->emo_all_tbl_name,	" align='center'");
			$this->MyPanel->table->addColumn($this->LanguageHandler->emo_all_tbl_code,	" align='center'");
			$this->MyPanel->table->addColumn($this->LanguageHandler->emo_all_tbl_clicky,  " align='center'");
			$this->MyPanel->table->addColumn($this->LanguageHandler->emo_all_tbl_import,  " align='center'");

			$this->MyPanel->table->startTable($this->LanguageHandler->emo_all_sect_header);

				$list = array();
				if ($handle = opendir(SYSTEM_PATH . "skins/{$this->_skin}/emoticons/"))
				{
					while(false !== ($file = readdir($handle)))
					{
						if($file != "." && $file != ".." && $file != 'index.html')
						{
							$list[$file] = $file;
						}
					}
					closedir($handle);
				}

				$sql = $this->DatabaseHandler->query("SELECT emo_name FROM " . DB_PREFIX . "emoticons WHERE emo_skin = {$this->_skin}");

				$compare = array();
				while($row = $sql->getRow())
				{
					$compare[$row['emo_name']] = $row['emo_name'];
				}

				$unallocated = array_diff_assoc($list, $compare);

				if(sizeof($unallocated))
				{
					$i = 0;
					foreach($unallocated as $emo)
					{
						list($code, $ext) = explode('.', $emo);

						$this->MyPanel->table->addRow(array(array("<img src=\"" . SYSTEM_PATH . "skins/{$this->_skin}/emoticons/{$emo}\" alt=\"{$emo}\" />", " align='center'"),
												   array("<strong>{$emo}</strong>", " align='center'"),
												   array($this->MyPanel->form->addTextBox("code[{$emo}]", ":{$code}:", false, false, true)),
												   array("<input type=\"checkbox\" name=\"clicky[{$emo}]\" value=\"1\" class=\"check\" />", " align='center'"),
												   array("<input type=\"checkbox\" name=\"import[{$emo}]\" value=\"{$emo}\" class=\"check\" />", " align='center'")));

						$i++;
					}

					$this->MyPanel->form->addHidden('skin', $this->_skin);
				}
				else
				{
					$this->MyPanel->table->addRow(array(array($this->LanguageHandler->emo_all_err_none, "colspan='5' align='center'")));
				}

			$this->MyPanel->table->endTable(true);
			$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

		$this->MyPanel->appendBuffer($this->MyPanel->table->flushBuffer());
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
	function _doImport()
	{
		extract($this->post);

		if(false == isset($import))
		{
			$this->MyPanel->messenger($this->LanguageHandler->emo_all_err_empty,
									   GATEWAY . "?a=emoticons&amp;skin={$this->_skin}&amp;code=06");
		}

		$sql = $this->DatabaseHandler->query("SELECT emo_code FROM " . DB_PREFIX . "emoticons WHERE emo_skin = {$this->_skin}");

		$list = array();
		while($row = $sql->getRow())
		{
			$list[$row['emo_code']] = $row['emo_code'];
		}

		$clicky = isset($clicky) ? $clicky : array();

		foreach($import as $emo)
		{
			if(false == $code[$emo])
			{
				list($name, $ext) = explode('.', $emo);
				$code[$emo] = ":{$name}:";
			}

			if(isset($list[trim($code[$emo])]))
			{
				$this->MyPanel->messenger($this->LanguageHandler->emo_all_err_code,
										   GATEWAY . "?a=emoticons&amp;skin={$this->_skin}&amp;code=06");
			}

			$click = isset($clicky[$emo]) ? (int) $clicky[$emo] : 0;

			$this->DatabaseHandler->query("
			INSERT INTO " . DB_PREFIX . "emoticons(
				emo_skin,
				emo_name,
				emo_code,
				emo_click)
			VALUES(
				{$this->_skin},
				'{$emo}',
				'{$code[$emo]}',
				'{$click}')
			");
		}

		$this->CacheHandler->updateCache('emoticons');

		$this->MyPanel->messenger($this->LanguageHandler->emo_all_err_done,
								   GATEWAY . "?a=emoticons&amp;skin={$this->_skin}");
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
	function _fetchSkins()
	{
		$sql  = $this->DatabaseHandler->query("SELECT * FROM " . DB_PREFIX . "skins");

		$list = array();
		while($row = $sql->getRow())
		{
			$list[$row['skins_id']] = $row['skins_name'];
		}

		return $list;
	}
}

?>