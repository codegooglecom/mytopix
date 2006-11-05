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
	var $_pack;

   /**
	* Variable Description
	* @access Private
	* @var Integer
	*/
	var $_module;

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

   /**
	* Variable Description
	* @access Private
	* @var Integer
	*/
	var $_FileHandler;

   /**
	* Variable Description
	* @access Private
	* @var Integer
	*/
	var $_TarHandler;

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

		$this->_id	 = isset($this->get['id'])	 ? (int) $this->get['id']	 : 0;
		$this->_code   = isset($this->get['code'])   ?	   $this->get['code']   : 00;
		$this->_hash   = isset($this->post['hash'])  ?	   $this->post['hash']  : null;
		$this->_module = isset($this->get['module']) ?	   $this->get['module'] : null;

		$this->_pack = $this->config['language'];

		if(isset($this->post['language']))
		{
			$this->_pack = $this->post['language'];
		}
		elseif(isset($this->get['language']))
		{
			$this->_pack = $this->get['language'];
		}

		if(isset($this->post['module']))
		{
			$this->_module = $this->post['module'];
		}
		elseif(isset($this->get['module']))
		{
			$this->_module = $this->get['module'];
		}

		require_once SYSTEM_PATH . 'admin/lib/onepanel.php';
		$this->OnePanel = new OnePanel($this);

		require_once SYSTEM_PATH . 'lib/file.han.php';
		$this->_FileHandler = new FileHandler($this->config);

		require_once SYSTEM_PATH . 'lib/tar.han.php';
		$this->_TarHandler = new TarHandler();
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
		$this->OnePanel->addHeader($this->LanguageHandler->word_header);

		switch($this->_code)
		{
			case '00':
				$this->OnePanel->_make_nav(5, 19, 34, $this->_pack);
				$this->_showModules();
				break;

			case '01':
				$this->OnePanel->_make_nav(5, 19, -2, $this->_pack);
				$this->_EditWords();
				break;

			case '02':
				$this->OnePanel->_make_nav(5, 19, -2, $this->_pack);
				$this->_doEditWords();
				break;

			case '03':
				$this->OnePanel->_make_nav(5, 19, 35, $this->_pack);
				$this->_showPacks();
				break;

			case '04':
				$this->OnePanel->_make_nav(5, 19, -2, $this->_pack);
				$this->_doRemovePack();
				break;

			case '05':
				$this->OnePanel->_make_nav(5, 19, 36, $this->_pack);
				$this->_showAddPack();
				break;

			case '06':
				$this->OnePanel->_make_nav(5, 19, 36, $this->_pack);
				$this->_doAddPack();
				break;

			case '07':
				$this->OnePanel->_make_nav(5, 19, 37, $this->_pack);
				$this->_showInstall();
				break;

			case '08':
				$this->OnePanel->_make_nav(5, 19, 37, $this->_pack);
				if($this->files['upload']['name'])
				{
					$this->_doUpload(); 
				}
				else {
					$this->_doInstall();
				}
				break;

			case '09':
				$this->OnePanel->_make_nav(5, 19, 38, $this->_pack);
				$this->_showExport();
				break;

			case '10':
				$this->OnePanel->_make_nav(5, 19, 38, $this->_pack);
				$this->_doExport();
				break;

			case '11':
				$this->OnePanel->_make_nav(5, 19, -2, $this->_pack);
				$this->_doRemoveExport();
				break;

			case '12':
				$this->OnePanel->_make_nav(5, 19, -2, $this->_pack);
				$this->_doDownload();
				break;

			default:
				$this->OnePanel->_make_nav(5, 19, 34, $this->_pack);
				$this->_showModules();
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
	function _showModules()
	{
		$this->OnePanel->form->startForm(GATEWAY . '?a=words');
		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());

			$this->OnePanel->form->addWrapSelect('language', $this->_fetchPacks(), $this->_pack, false, 
											 array(1,	$this->LanguageHandler->word_choose_title, 
														 $this->LanguageHandler->word_choose_desc));

		$this->OnePanel->form->endForm();
		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());

		$this->OnePanel->table->addColumn($this->LanguageHandler->word_tbl_id, ' width="1%"');
		$this->OnePanel->table->addColumn($this->LanguageHandler->word_tbl_modules, " align='left'");
		$this->OnePanel->table->addColumn($this->LanguageHandler->word_tbl_words, " align='center'");
		$this->OnePanel->table->addColumn('&nbsp;');

		$this->OnePanel->table->startTable($this->LanguageHandler->word_tbl_header);

			$i	 = 0;
			$total = 0;
			foreach($this->_fetchModules() as $module)
			{
				$i++;
				$total += $module['count'];

				$title = 'skin_sect_' . $module['name'];

				$this->OnePanel->table->addRow(array(array("<strong>{$i}</strong>", ' align="center"', 'headera'),
											   array($this->LanguageHandler->$title, false, 'headerb'),
											   array(number_format($module['count']), ' align="center"', 'headerb'),
											   array("<a href=\"" . GATEWAY . "?a=words&code=01&amp;language={$this->_pack}&module=" .		   
													 "{$module['name']}\"><strong>{$this->LanguageHandler->link_edit}</strong></a>", 
													 " align='center'", 'headerc')));
			}

			$total = number_format($total);

			$this->OnePanel->table->addRow(array(array('', false, 'headera'),
												 array("<strong>{$this->LanguageHandler->word_list_total}</strong>", false, 'headerb'),
												 array("<strong>{$total}</strong>", " align='center'", 'headerb'),
												 array('&nbsp;', false, 'headerb')));

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
	function _EditWords()
	{
		$title = 'skin_sect_' . $this->_module;
		
		$this->OnePanel->appendBuffer("<form method=\"post\" action=\"" . GATEWAY . '?a=words&amp;code=02">');

			$this->OnePanel->table->addColumn($this->LanguageHandler->word_wtbl_name, ' style="width: 50%;"');
			$this->OnePanel->table->addColumn($this->LanguageHandler->word_wtbl_value);

			$this->OnePanel->table->startTable(sprintf($this->LanguageHandler->word_wtbl_header, $this->LanguageHandler->$title));

				$path = SYSTEM_PATH . "lang/{$this->_pack}/{$this->_module}.lang.php";

				if(false == file_exists($path))
				{
					$this->OnePanel->messenger($this->LanguageHandler->word_err_no_pack, GATEWAY . '?a=words');
				}

				include $path;

				foreach($lang as $key => $val)
				{
					$var = "<br /><b>&lt;lang:{$key}></b>";

					$this->OnePanel->table->addRow(array(array($this->OnePanel->form->addTextBox('name[]',  $key, false, false, true) . $var, " valign='top'"),
															   $this->OnePanel->form->addTextArea('value[]', $this->ParseHandler->uncleanString($val, true), " style=\"width: 90%;\"", false, true)));
				}

				$this->OnePanel->table->addRow(array($this->OnePanel->form->addTextBox('name[]',  false, false, false, true),
													 $this->OnePanel->form->addTextBox('value[]', false, false, false, true)));
				$this->OnePanel->table->addRow(array($this->OnePanel->form->addTextBox('name[]',  false, false, false, true),
													 $this->OnePanel->form->addTextBox('value[]', false, false, false, true)));
				$this->OnePanel->table->addRow(array($this->OnePanel->form->addTextBox('name[]',  false, false, false, true),
													 $this->OnePanel->form->addTextBox('value[]', false, false, false, true)));
				$this->OnePanel->table->addRow(array($this->OnePanel->form->addTextBox('name[]',  false, false, false, true),
													 $this->OnePanel->form->addTextBox('value[]', false, false, false, true)));
				$this->OnePanel->table->addRow(array($this->OnePanel->form->addTextBox('name[]',  false, false, false, true),
													 $this->OnePanel->form->addTextBox('value[]', false, false, false, true)));
				$this->OnePanel->table->addRow(array($this->OnePanel->form->addTextBox('name[]',  false, false, false, true),
													 $this->OnePanel->form->addTextBox('value[]', false, false, false, true)));

			$this->OnePanel->form->addHidden('hash',	 $this->UserHandler->getUserHash());
			$this->OnePanel->form->addHidden('module',   $this->_module);
			$this->OnePanel->form->addHidden('language', $this->_pack);

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
	function _doEditWords()
	{
		if($this->_hash != $this->UserHandler->getUserhash())
		{
			$this->OnePanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
		}

		extract($this->post);

		$path = SYSTEM_PATH . "lang/{$this->_pack}/{$this->_module}.lang.php";

		if(false == file_exists($path))
		{
			$this->OnePanel->messenger($this->LanguageHandler->word_err_no_pack, GATEWAY . '?a=words');
		}

		$mod = array();
		for($i = 0; $i < count($name); $i++)
		{
			if($name[$i] || $value[$i])
			{
				$value[$i] = str_replace("&gt;", ">", $value[$i]);
				$value[$i] = str_replace("&lt;", "<", $value[$i]);

				$mod[$name[$i]] = $this->ParseHandler->cleanString($value[$i]);
			}
		}

		$this->_FileHandler->updateFileArray($mod, 'lang', SYSTEM_PATH . "lang/{$this->_pack}/{$this->_module}.lang.php");

		$this->OnePanel->messenger($this->LanguageHandler->word_edit_err_done, 
								   GATEWAY . "?a=words&code=01&amp;language={$this->_pack}&amp;module={$this->_module}");
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
	function _showPacks()
	{
		$this->OnePanel->table->addColumn($this->LanguageHandler->word_tbl_pack_language, " align='left'");
		$this->OnePanel->table->addColumn($this->LanguageHandler->word_tbl_pack_active, " align='center'");
		$this->OnePanel->table->addColumn($this->LanguageHandler->word_tbl_pack_users,  " align='center'");
		$this->OnePanel->table->addColumn('&nbsp;');

		$this->OnePanel->table->startTable($this->LanguageHandler->word_tbl_pack_header);
	
			$packs = $this->_fetchPacks();

			$sql = $this->DatabaseHandler->query("SELECT members_language FROM " . DB_PREFIX . "members WHERE members_id <> 1");

			$used = array();
			while($row = $sql->getRow())
			{
				foreach($packs as $match)
				{
					if($match == $row['members_language'])
					{
						@$used[$match] += 1;
					}
				}
			}

			foreach($packs as $language)
			{
				$delete = $language == 'english' 
						? $this->LanguageHandler->blank 
						: "<a href=\"" . GATEWAY . "?a=words&amp;code=04&amp;language={$language}\" onclick='javascript:return confirm" . 
						  "(\"{$this->LanguageHandler->word_pack_err_confirm}\");'><b>{$this->LanguageHandler->link_delete}</b></a>" ;

				$active = $language == $this->config['language'] 
						? "<strong>{$this->LanguageHandler->yes}</strong>" 
						: $this->LanguageHandler->blank;

				$this->OnePanel->table->addRow(array(array(ucwords($language), false, 'headerb'),
											   array($active, " align='center'", 'headerb'),
											   array(@number_format($used[$language]), " align='center'", 'headerb'),
											   array($delete, " align='center'  width='15%'", 'headerc')));
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
	function _doRemovePack()
	{
		if($this->_pack == 'english') 
		{
			$this->OnePanel->messenger($this->LanguageHandler->word_pack_err_default, GATEWAY . '?a=words&amp;code=03');
		}

		if(false == is_dir(SYSTEM_PATH . "lang/{$this->_pack}")) 
		{
			$this->OnePanel->messenger($this->LanguageHandler->word_pack_err_no_results, GATEWAY . '?a=words&amp;code=03');
		}

		$this->DatabaseHandler->query("UPDATE " . DB_PREFIX . "members SET members_language = 'english' WHERE members_language = '{$this->_pack}'");

		if(false == $this->_FileHandler->remDir(SYSTEM_PATH . "lang/{$this->_pack}"))
		{
			$this->OnePanel->messenger($this->LanguageHandler->word_pack_err_cannot_rem, GATEWAY . '?a=words&amp;code=03');
		}

		$this->config['language'] = 'english';
		$this->_FileHandler->updateFileArray($this->config, 'config', SYSTEM_PATH . 'config/settings.php');

		$this->CacheHandler->updateCache('languages');

		header('LOCATION: ' . GATEWAY . '?a=words&code=03');
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
	function _showAddPack()
	{
		$this->OnePanel->form->startForm(GATEWAY . '?a=words&amp;code=06');
		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());

			$this->OnePanel->form->addTextBox('name',  false, false, 
											  array(1, $this->LanguageHandler->word_pack_form_name_title, 
													   $this->LanguageHandler->word_pack_form_name_desc));

			$this->OnePanel->form->addWrapSelect('language', $this->_fetchPacks(), $this->_pack, false, 
											 array(1,	$this->LanguageHandler->word_pack_form_language_title, 
														 $this->LanguageHandler->word_pack_form_language_desc));

			$this->OnePanel->form->appendBuffer("<h1>{$this->LanguageHandler->word_pack_form_options}</h1>");

			$this->OnePanel->form->addCheckBox('default', 1, false, false, false, false, 
											   $this->LanguageHandler->word_pack_form_default_desc);

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
	function _doAddPack()
	{
		if($this->_hash != $this->UserHandler->getUserhash())
		{
			$this->OnePanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
		}
		extract($this->post);

		if(false == $name) 
		{
			$this->OnePanel->messenger($this->LanguageHandler->word_pack_err_bad_name, GATEWAY . '?a=words&code=05');
		}

		$packs = $this->_fetchPacks();

		if(is_dir(SYSTEM_PATH . "lang/{$name}/"))
		{
			$this->OnePanel->messenger($this->LanguageHandler->word_pack_err_taken, GATEWAY . '?a=words&code=05');
		}

		if(false == preg_match('#^([a-zA-Z0-9_-]+)$#s', $name))
		{
			$this->OnePanel->messenger($this->LanguageHandler->word_pack_err_bad_name, GATEWAY . '?a=words&code=05');
		}

		$this->_FileHandler->copyDir($this->config['site_path'] . "lang/{$name}/", 
									 $this->config['site_path'] . "lang/{$this->_pack}/");

		if($default)
		{
			$this->config['language'] = $name;
			$this->_FileHandler->updateFileArray($this->config, 'config', SYSTEM_PATH . 'config/settings.php');
		}

		$this->CacheHandler->updateCache('languages');

		header('LOCATION: ' . GATEWAY . '?a=words&code=03');
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
	function _showInstall()
	{
		$this->OnePanel->form->startForm(GATEWAY . '?a=words&amp;code=08', false, 
										'POST', " enctype='multipart/form-data'");

		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());

			$list = array();
			$handle = opendir(SYSTEM_PATH . 'lang/');
			while(false !== ($file = readdir($handle)))
			{
				$ext = end(explode('.', $file));
				if($ext == 'tar')
				{
					$list[$file] = $file;
				}
			}
			closedir($handle);

			if(sizeof($list))
			{
				$this->OnePanel->form->addWrapSelect('pack', $list, false, false, 
												 array(1, $this->LanguageHandler->word_inst_file_title,
														  $this->LanguageHandler->word_inst_file_desc));
	
				$this->OnePanel->form->appendBuffer("<p style='text-align: center;'><b>" .
													$this->LanguageHandler->word_inst_form_or  .
													"</b></p>");
			}

			$this->OnePanel->form->addFile('upload', 
										   array(1, $this->LanguageHandler->word_inst_remote_title, 
													$this->LanguageHandler->word_inst_remote_desc));

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
	function _doUpload()
	{
		if($this->_hash != $this->UserHandler->getUserhash())
		{
			$this->OnePanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
		}

		$dir = $this->config['site_path'] . "lang/";

		if(file_exists($dir . $this->files['upload']['name']))
		{
			$this->OnePanel->messenger($this->LanguageHandler->word_inst_err_exists, GATEWAY . '?a=words&amp;code=07');
		}

		require_once SYSTEM_PATH . 'lib/upload.han.php';
		$UploadHandler = new UploadHandler($this->files, $dir, 'upload');

		$UploadHandler->setExtTypes(array('tar'));
		$UploadHandler->setMaxSize(500);

		if(false == $UploadHandler->doUpload())
		{
			$error_msg = $UploadHandler->getError();
			return $this->OnePanel->messenger($this->LanguageHandler->$error_msg, GATEWAY . '?a=words&amp;code=07');
		}

		$this->_doInstall($this->files['upload']['name']);
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
	function _doInstall($pack = false)
	{
		if($this->_hash != $this->UserHandler->getUserhash())
		{
			$this->OnePanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
		}

		extract($this->post);

		if(false == file_exists(SYSTEM_PATH . "lang/{$pack}"))
		{
			$this->OnePanel->messenger($this->LanguageHandler->word_exp_rem_missing, 
									   GATEWAY . '?a=words&amp;code=07');
		}

		$from = $this->config['site_path'] . 'lang/';

		$this->_TarHandler->setCurrent($from);

		if(false == $this->_TarHandler->searchTar($pack, array('global.lang.php')))
		{
			chdir($this->config['site_path'] . 'admin/');

			$this->OnePanel->messenger($this->LanguageHandler->word_inst_err_invalid, 
									   GATEWAY . '?a=words&amp;code=07');
		}

		chdir($this->config['site_path'] . 'admin/');

		$name = explode('.', $pack);
		$name = $name[0];
		
		if(file_exists(SYSTEM_PATH . "lang/{$name}"))
		{
			$this->OnePanel->messenger($this->LanguageHandler->word_inst_err_taken, 
									   GATEWAY . '?a=words&amp;code=07');
		}

		mkdir(SYSTEM_PATH . "lang/{$name}/");

		$to = $this->config['site_path'] . "lang/{$name}/";

		$this->_TarHandler->extractTar($pack, $from, $to);

		$this->CacheHandler->updateCache('languages');

		header("LOCATION: " . GATEWAY . "?a=words&amp;code=03");
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
	function _showExport()
	{
		$this->OnePanel->form->startForm(GATEWAY . '?a=words&amp;code=10');
		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());

			$this->OnePanel->form->addSelect('language', $this->_fetchPacks(), false, false, 
											 array(1, $this->LanguageHandler->word_exp_form_choose_title, 
													  $this->LanguageHandler->word_exp_form_choose_desc));

			$this->OnePanel->form->addHidden('hash', $this->UserHandler->getUserHash());

		$this->OnePanel->form->endForm();
		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());

		$this->OnePanel->table->addColumn($this->LanguageHandler->word_exp_tbl_id, ' width="1%"');
		$this->OnePanel->table->addColumn($this->LanguageHandler->word_exp_tbl_name, " align='left'");
		$this->OnePanel->table->addColumn($this->LanguageHandler->word_exp_tbl_date, " align='center'");
		$this->OnePanel->table->addColumn('&nbsp;', ' width="15%"');

		$this->OnePanel->table->startTable($this->LanguageHandler->word_exp_tbl_header);

			$i	= 0;
			$list = array();
			$handle = opendir(SYSTEM_PATH . 'lang/');
			while(false !== ($file = readdir($handle)))
			{
				$ext = end(explode('.', $file));
				if($ext == 'tar')
				{
					$i++;
					$list[$i] = $file;
				}
			}
			closedir($handle);

			if(false == sizeof($list))
			{
				$this->OnePanel->table->addRow(array(array($this->LanguageHandler->word_exp_tbl_no_packs, " align='center' colspan='4'")));
			}
			else
			{
				foreach($list as $key => $val)
				{

					$this->OnePanel->table->addRow(array(array("<strong>{$key}</strong>"),
														 array($val),
														 array(date($this->config['date_long'], filemtime(SYSTEM_PATH . "lang/{$val}")), " align='center'"),
														 array("<a href=\"" . GATEWAY . "?a=words&amp;code=12&amp;language={$val}\">{$this->LanguageHandler->style_tbl_download}</a>" .
															   " | <a href=\"" . GATEWAY . "?a=words&amp;code=11&amp;language={$val}\" onclick='javascript: return confirm" . 
															   "(\"{$this->LanguageHandler->word_exp_rem_confirm}\");'><b>{$this->LanguageHandler->link_delete}</b></a>", " align='center'")));
				}
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
	function _doExport()
	{
		if($this->_hash != $this->UserHandler->getUserhash())
		{
			$this->OnePanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
		}
		extract($this->post);

		$this->_TarHandler->setCurrent($this->config['site_path'] . "lang/{$this->_pack}");

		$this->_TarHandler->newTar($this->config['site_path'] . 'lang/', "{$this->_pack}.tar");
		$this->_TarHandler->addDirectory(".");
		$this->_TarHandler->writeTar();

		chdir($this->config['site_path'] . 'admin/');

		header("LOCATION: " . GATEWAY . "?a=words&code=09");
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
	function _doRemoveExport()
	{
		if(@file_exists(SYSTEM_PATH . '/lang/' . $this->_pack))
		{
			@unlink(SYSTEM_PATH . '/lang/' . $this->_pack);
			header("LOCATION: " . GATEWAY . "?a=words&code=09");
			exit();
		}
		
		$this->OnePanel->messenger($this->LanguageHandler->word_exp_rem_missing, GATEWAY . '?a=words&amp;code=08');
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
		if(@file_exists(SYSTEM_PATH . '/lang/' . $this->_pack))
		{
			header("Content-type: application/tar");
			header("Content-Disposition: attachment; filename={$this->_pack}");

			readfile(SYSTEM_PATH . 'lang/' . $this->_pack);

			exit();	
		}

		$this->OnePanel->messenger($this->LanguageHandler->word_rem_missing, GATEWAY . '?a=skin&amp;code=08');
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
	function _fetchPacks()
	{
		$handle = opendir(SYSTEM_PATH . 'lang/');
		while(false !== ($file = readdir($handle)))
		{
			if(false == file_exists($file) && $file != 'index.html' && end(explode('.', $file)) != 'tar') 
			{
				$list[$file] = $file;
			}
		}
		closedir($handle);

		return $list;
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
	function _fetchModules()
	{
		$handle = opendir(SYSTEM_PATH . "lang/{$this->_pack}/");
		$list   = array();
		while(false !== ($file = readdir($handle)))
		{
			@list($name, $ext) = explode('.', $file);

			if(false == file_exists($file) && 
			   $file != 'index.html'	   && 
			   $file != 'garbage.txt')
			{
				include SYSTEM_PATH . "lang/{$this->_pack}/{$file}";

				$list[] = array('name'  => $name,
								'count' => @sizeof($lang));

				unset($lang);
			}
		}
		closedir($handle);

		return $list;
	}
}

?>