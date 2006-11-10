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
	var $_file;

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
		$this->_file = isset($this->get['file'])  ? $this->get['file']  : null;

		$this->_skin = $this->config['skin'];

		if(isset($this->post['skin']))
		{
			$this->_skin = $this->post['skin'];
		}
		elseif(isset($this->get['skin']))
		{
			$this->_skin = $this->get['skin'];
		}

		require_once SYSTEM_PATH . 'admin/lib/onepanel.php';
		$this->OnePanel = new OnePanel($this);

		require_once SYSTEM_PATH . 'lib/file.han.php';
		$this->_FileHandler  = new FileHandler($this->config);
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
		$this->OnePanel->addHeader($this->LanguageHandler->image_form_header);

		switch($this->_code)
		{
			case '00':
				$this->OnePanel->_make_nav(4, 16, 27, $this->_skin);
				$this->_showImages();
				break;

			case '01':
				$this->OnePanel->_make_nav(4, 16, 28, $this->_skin);
				$this->_addImage();
				break;

			case '02':
				$this->OnePanel->_make_nav(4, 16, 28, $this->_skin);
				$this->_doAddImage();
				break;

			case '03':
				$this->OnePanel->_make_nav(4, 16, -2, $this->_skin);
				$this->_doDeleteImage();
				break;

			case '04':
				$this->OnePanel->_make_nav(4, 16, -2, $this->_skin);
				$this->_viewImage();
				break;

			default:
				$this->OnePanel->_make_nav(4, 16, 27, $this->_skin);
				$this->_showImages();
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
	function _showImages()
	{
		$this->OnePanel->appendBuffer("
		<script language='javascript'>
			function popup(url, width, height)
			{
				window.open(url, '','width=' + width + ',height=' + height + ',resizable=yes,scrollbars=no');
			}
		</script>");

		$skins = $this->_fetchSkins();

		$this->OnePanel->form->startForm(GATEWAY . '?a=image');
		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());

			$this->OnePanel->form->addWrapSelect('skin', $skins, $this->_skin, '',
											 array(1, $this->LanguageHandler->image_form_skin_title,
													  $this->LanguageHandler->image_form_skin_desc));

		$this->OnePanel->form->endForm();
		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());

		$this->OnePanel->table->addColumn($this->LanguageHandler->image_tbl_name, " align='left'");
		$this->OnePanel->table->addColumn($this->LanguageHandler->image_tbl_size);
		$this->OnePanel->table->addColumn($this->LanguageHandler->image_tbl_dims, " align='center'");
		$this->OnePanel->table->addColumn('&nbsp;', ' width="15%"');

		$this->OnePanel->table->startTable(sprintf($this->LanguageHandler->image_tbl_header,
												   $skins[$this->_skin]));

			$dir  = SYSTEM_PATH . "skins/{$this->_skin}/";
			$list = array();
			if($handle = opendir($dir))
			{
				while(false !== ($file = readdir($handle)))
				{
					@list($name, $ext) = explode('.', $file);
					$ext = strtolower($ext);
					if($file != "."	&&
					   $file != ".."   &&
					   in_array($ext, explode('|', $this->config['good_image_types']))
					   )
					{
						$list[] = $file;
					}
				}
				closedir($handle);
			}

			foreach($list as $file)
			{
				$dims = @getimagesize($dir . $file);

				$height = $dims[1];
				$width  = $dims[0];

				$popup = "javascript: popup(\"" . GATEWAY . "?a=image&amp;code=04&amp;file={$file}&amp;" .
						 "skin={$this->_skin}\", {$width}, {$height});";

				$this->OnePanel->table->addRow(array(array($file, '', 'headerb'),
											   array($this->_FileHandler->getFileSize(filesize($dir . $file)), ' align="center"', 'headerb'),
											   array($dims[0] . 'x' . $dims[1], ' align="center"', 'headerb'),
											   array("<a href='#' onclick='{$popup}'>{$this->LanguageHandler->link_view}</a>" .
													 " | <a href=\"" . GATEWAY . "?a=image&amp;file={$file}&amp;skin=" .
													 "{$this->_skin}&amp;code=03\" onclick='return confirm(\"" .
													 "{$this->LanguageHandler->image_tbl_confirm}\");'><b>"   .
													 "{$this->LanguageHandler->link_delete}</b></a>",
													 ' align="center"', 'headerc')));
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
	function _addImage()
	{
		$this->OnePanel->form->startForm(GATEWAY . "?a=image&amp;code=02", '', 'POST', " enctype='multipart/form-data'");
		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());

			$ext   = explode('|', $this->config['good_image_types']);
			$types = '';

			foreach($ext as $type)
			{
				$types .= "<b>.{$type}</b>, ";
			}

			$types = substr($types, 0, strlen($types) - 2);

			$this->OnePanel->form->addFile('image',
								 array(1, $this->LanguageHandler->image_new_form_upload_title,
										  sprintf($this->LanguageHandler->image_new_form_upload_desc,
												  $types)));

			$this->OnePanel->form->addWrapSelect('skin',  $this->_fetchSkins(), $this->_skin, false,
											 array(1, $this->LanguageHandler->image_form_skin_title,
													  $this->LanguageHandler->image_form_skin_desc));

			$this->OnePanel->form->addHidden('skin', $this->_skin);
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
	function _doAddImage()
	{
		if($this->_hash != $this->UserHandler->getUserhash())
		{
			$this->OnePanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
		}

		if(false == is_writable(SYSTEM_PATH . "/skins/{$this->_skin}/"))
		{
			$this->OnePanel->messenger(sprintf($this->LanguageHandler->chmod_images, $this->_skin),
									   GATEWAY . "?a=image&skin={$this->_skin}&code=01");
		}

		$dir = $this->config['site_path'] . "skins/{$this->_skin}/";

		require_once SYSTEM_PATH . 'lib/upload.han.php';
		$UploadHandler = new UploadHandler($this->files, $dir, 'image', true);

		$UploadHandler->setImgTypes(explode('|', $this->config['good_image_types']));
		$UploadHandler->setMaxSize(500);

		if(false == $UploadHandler->doUpload())
		{
			$error_msg = $UploadHandler->getError();
			return $this->OnePanel->messenger($this->LanguageHandler->$error_msg, GATEWAY . "?a=image&skin={$this->_skin}&code=01");
		}

		$this->OnePanel->messenger($this->LanguageHandler->image_new_form_done, GATEWAY . "?a=image&skin={$this->_skin}");
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
	function _doDeleteImage()
	{
		$dir = SYSTEM_PATH . "skins/{$this->_skin}/";

		if(is_writable($dir))
		{
			@unlink($dir . $this->_file);
			header("LOCATION: " . GATEWAY . "?a=image&skin={$this->_skin}");
			exit();
		}

		$this->OnePanel->messenger($this->LanguageHandler->image_err_not_writable, GATEWAY . "?a=image&amp;skin={$this->_skin}");
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
	function _viewImage()
	{
		$sql = $this->DatabaseHandler->query("SELECT skins_name FROM " . DB_PREFIX . "skins WHERE skins_id = {$this->_skin}");
		$row = $sql->getRow();

		$this->OnePanel->clearBuffer();
		$this->OnePanel->appendBuffer("<title>{$this->LanguageHandler->image_view_title} {$this->_file} ( {$row['skins_name']} )</title>");
		$this->OnePanel->appendBuffer("<style>body{margin:0px;}</style>");
		$this->OnePanel->appendBuffer("<a href='javascript:this.close();' title='{$this->LanguageHandler->image_view_close}'>");
		$this->OnePanel->appendBuffer("<img src='" . SYSTEM_PATH . "skins/{$this->_skin}/{$this->_file}' border='0' alt='' />");
		$this->OnePanel->appendBuffer("</a>");

		echo $this->OnePanel->buffer;
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
	function _fetchSkins()
	{
		$sql  = $this->DatabaseHandler->query("SELECT skins_id, skins_name FROM " . DB_PREFIX . "skins");
		$list = array();

		while($row = $sql->getRow())
		{
			$list[$row['skins_id']] = $row['skins_name'];
		}

		return $list;
	}

}

?>