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
	var $_code;

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
	var $_hash;

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

		$this->_id   = isset($this->get['id'])	? (int) $this->get['id']	: 0;
		$this->_code = isset($this->get['code'])  ?	   $this->get['code']  : 00;
		$this->_hash = isset($this->post['hash']) ?	   $this->post['hash'] : null;

		require_once SYSTEM_PATH . 'admin/lib/mypanel.php';
		$this->MyPanel = new MyPanel($this);
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
		$this->MyPanel->addHeader($this->LanguageHandler->style_form_header);

		switch($this->_code)
		{
			case '00':
				$this->MyPanel->_make_nav(4, 15, -1);
				$this->_showStyles();
				break;

			case '01':
				$this->MyPanel->_make_nav(4, 15, -1);
				$this->_doDownload();
				break;

			case '02':
				$this->MyPanel->_make_nav(4, 15, -1);
				$this->_editStyle();
				break;

			case '03':
				$this->MyPanel->_make_nav(4, 15, -1);
				$this->_doEditStyle();
				break;

			default:
				$this->MyPanel->_make_nav(4, 15, -1);
				$this->_showStyles();
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
	function _showStyles()
	{
		$this->MyPanel->table->addColumn($this->LanguageHandler->skin_temp_tbl_id, " width='1%'");
		$this->MyPanel->table->addColumn($this->LanguageHandler->style_tbl_skin, " align='left'");
		$this->MyPanel->table->addColumn($this->LanguageHandler->style_tbl_author);
		$this->MyPanel->table->addColumn($this->LanguageHandler->style_tbl_active, " align='center'");
		$this->MyPanel->table->addColumn('&nbsp;', ' width="20%"');

		$this->MyPanel->table->startTable($this->LanguageHandler->style_tbl_header);

			$sql = $this->DatabaseHandler->query("SELECT * FROM " . DB_PREFIX . "skins");

			$i	= 0;
			$list = '';
			while($row = $sql->getRow())
			{
				$i++;
				$active = $row['skins_id'] == $this->config['skin']
						? "<b>{$this->LanguageHandler->style_tbl_yes}</b>"
						: $this->LanguageHandler->blank;

				$author = $row['skins_author_link']
						? "<a href=\"{$row['skins_author_link']}\" title=\"{$this->LanguageHandler->style_author_title}\">{$row['skins_author']}</a>"
						: $row['skins_author'];

				$this->MyPanel->table->addRow(array(array("<strong>{$i}</strong>", " align='center'", 'headera'),
											   array($row['skins_name'], " align='left'", 'headerb'),
											   array($author, " align='center'", 'headerb'),
											   array($active, " align='center'", 'headerb'),
											   array("<a href=\"" . GATEWAY . "?a=styles&amp;code=01&amp;id={$row['skins_id']}\">{$this->LanguageHandler->style_tbl_download}</a> " .
													 "<a href=\"" . GATEWAY . "?a=styles&amp;code=02&amp;id={$row['skins_id']}\"><b>" .
													 "{$this->LanguageHandler->link_edit}</b></a>", " align='center'", 'headerc')));
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
	function _doDownload()
	{
		extract($this->get);

		$sql  = $this->DatabaseHandler->query("SELECT * FROM " . DB_PREFIX . "skins WHERE skins_id = {$this->_id}");

		if(false == $sql->getNumRows())
		{
			$this->MyPanel->messenger($this->LanguageHandler->style_err_no_skin, GATEWAY . '?a=styles');
		}

		$row  = $sql->getRow();
		$path = SYSTEM_PATH . "skins/{$row['skins_id']}/styles.css";

		if(false == file_exists($path))
		{
			$this->MyPanel->messenger($this->LanguageHandler->style_err_no_style, GATEWAY . '?a=styles');
		}

		header("Content-type: text/plain");
		header("Content-Disposition: attachment; filename=styles.css");

		readfile($path);

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
	function _editStyle()
	{
		extract($this->get);

		$sql  = $this->DatabaseHandler->query("SELECT * FROM " . DB_PREFIX . "skins WHERE skins_id = {$this->_id}");

		if(false == $sql->getNumRows())
		{
			$this->MyPanel->messenger($this->LanguageHandler->style_err_no_skin, GATEWAY . '?a=styles');
		}

		$row  = $sql->getRow();
		$path = SYSTEM_PATH . "skins/{$row['skins_id']}/styles.css";

		if(false == file_exists($path))
		{
			$this->MyPanel->messenger($this->LanguageHandler->style_err_no_style, GATEWAY . '?a=styles');
		}

		$buffer = '';
		foreach(file($path) as $line)
		{
			$buffer .= $line;
		}

		$this->MyPanel->form->startForm(GATEWAY . "?a=styles&amp;code=03&amp;id={$this->_id}");
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

			$this->MyPanel->form->addTextArea('css',   $buffer, "wrap='off' style='height: 350px;'",
											   array(1, sprintf($this->LanguageHandler->style_form_css_title, $row['skins_name']),
														$this->LanguageHandler->style_form_css_desc));

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
	function _doEditStyle()
	{
		if($this->_hash != $this->UserHandler->getUserhash())
		{
			$this->MyPanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
		}

		extract($this->post);

		$sql  = $this->DatabaseHandler->query("SELECT * FROM " . DB_PREFIX . "skins WHERE skins_id = {$this->_id}");

		if(false == $sql->getNumRows())
		{
			$this->MyPanel->messenger($this->LanguageHandler->style_err_no_skin, GATEWAY . '?a=styles');
		}

		$row  = $sql->getRow();
		$path = SYSTEM_PATH . "skins/{$row['skins_id']}/styles.css";

		if(false == file_exists($path))
		{
			$this->MyPanel->messenger($this->LanguageHandler->style_err_no_style, GATEWAY . '?a=styles');
		}

		$fp = @fopen($path, 'w');
		@fwrite($fp, stripslashes($this->ParseHandler->uncleanString($css)));
		fclose($fp);

		$this->MyPanel->messenger($this->LanguageHandler->style_form_done, GATEWAY . "?a=styles&code=02&id={$this->_id}");
	}
}
?>