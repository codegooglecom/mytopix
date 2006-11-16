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

if ( false == defined ( 'SYSTEM_ACTIVE' ) ) die ( '<strong>ERROR:</strong> Hack attempt detected!' );

class ModuleObject extends MasterObject
{
	var $_id;
	var $_code;
	var $_pack;
	var $_module;
	var $_hash;

	var $MyPanel;
	var $FileHandler;
	var $TarHandler;

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

		require_once SYSTEM_PATH . 'admin/lib/mypanel.php';
		$this->MyPanel = new MyPanel($this);

		require_once SYSTEM_PATH . 'lib/file.han.php';
		$this->FileHandler = new FileHandler($this->config);

		require_once SYSTEM_PATH . 'lib/tar.han.php';
		$this->TarHandler = new TarHandler();
	}

	function execute()
	{
		$this->MyPanel->addHeader($this->LanguageHandler->word_header);

		switch($this->_code)
		{
			case '00':
				$this->MyPanel->make_nav(5, 19, 34, $this->_pack);
				$this->_showModules();
				break;

			case '01':
				$this->MyPanel->make_nav(5, 19, -2, $this->_pack);
				$this->_EditWords();
				break;

			case '02':
				$this->MyPanel->make_nav(5, 19, -2, $this->_pack);
				$this->_doEditWords();
				break;

			case '03':
				$this->MyPanel->make_nav(5, 19, 35, $this->_pack);
				$this->_showPacks();
				break;

			case '04':
				$this->MyPanel->make_nav(5, 19, -2, $this->_pack);
				$this->_doRemovePack();
				break;

			case '05':
				$this->MyPanel->make_nav(5, 19, 36, $this->_pack);
				$this->_showAddPack();
				break;

			case '06':
				$this->MyPanel->make_nav(5, 19, 36, $this->_pack);
				$this->_doAddPack();
				break;

			case '07':
				$this->MyPanel->make_nav(5, 19, 37, $this->_pack);
				$this->_showInstall();
				break;

			case '08':
				$this->MyPanel->make_nav(5, 19, 37, $this->_pack);
				if($this->files['upload']['name'])
				{
					$this->_doUpload();
				}
				else {
					$this->_doInstall();
				}
				break;

			case '09':
				$this->MyPanel->make_nav(5, 19, 38, $this->_pack);
				$this->_showExport();
				break;

			case '10':
				$this->MyPanel->make_nav(5, 19, 38, $this->_pack);
				$this->_doExport();
				break;

			case '11':
				$this->MyPanel->make_nav(5, 19, -2, $this->_pack);
				$this->_doRemoveExport();
				break;

			case '12':
				$this->MyPanel->make_nav(5, 19, -2, $this->_pack);
				$this->_doDownload();
				break;

			default:
				$this->MyPanel->make_nav(5, 19, 34, $this->_pack);
				$this->_showModules();
				break;
		}

		$this->MyPanel->flushBuffer();
	}

	function _showModules()
	{
		$this->MyPanel->form->startForm(GATEWAY . '?a=words');
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

			$this->MyPanel->form->addWrapSelect('language', $this->_fetchPacks(), $this->_pack, false,
											 array(1,	$this->LanguageHandler->word_choose_title,
														 $this->LanguageHandler->word_choose_desc));

		$this->MyPanel->form->endForm();
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

		$this->MyPanel->table->addColumn($this->LanguageHandler->word_tbl_id, ' width="1%"');
		$this->MyPanel->table->addColumn($this->LanguageHandler->word_tbl_modules, " align='left'");
		$this->MyPanel->table->addColumn($this->LanguageHandler->word_tbl_words, " align='center'");
		$this->MyPanel->table->addColumn('&nbsp;');

		$this->MyPanel->table->startTable($this->LanguageHandler->word_tbl_header);

			$i	 = 0;
			$total = 0;
			foreach($this->_fetchModules() as $module)
			{
				$i++;
				$total += $module['count'];

				$title = 'skin_sect_' . $module['name'];

				$this->MyPanel->table->addRow(array(array("<strong>{$i}</strong>", ' align="center"', 'headera'),
											   array($this->LanguageHandler->$title, false, 'headerb'),
											   array(number_format($module['count']), ' align="center"', 'headerb'),
											   array("<a href=\"" . GATEWAY . "?a=words&code=01&amp;language={$this->_pack}&module=" .
													 "{$module['name']}\"><strong>{$this->LanguageHandler->link_edit}</strong></a>",
													 " align='center'", 'headerc')));
			}

			$total = number_format($total);

			$this->MyPanel->table->addRow(array(array('', false, 'headera'),
												 array("<strong>{$this->LanguageHandler->word_list_total}</strong>", false, 'headerb'),
												 array("<strong>{$total}</strong>", " align='center'", 'headerb'),
												 array('&nbsp;', false, 'headerb')));

		$this->MyPanel->table->endTable();
		$this->MyPanel->appendBuffer($this->MyPanel->table->flushBuffer());
	}

	function _EditWords()
	{
		$title = 'skin_sect_' . $this->_module;

		$this->MyPanel->appendBuffer("<form method=\"post\" action=\"" . GATEWAY . '?a=words&amp;code=02">');

			$this->MyPanel->table->addColumn($this->LanguageHandler->word_wtbl_name, ' style="width: 50%;"');
			$this->MyPanel->table->addColumn($this->LanguageHandler->word_wtbl_value);

			$this->MyPanel->table->startTable(sprintf($this->LanguageHandler->word_wtbl_header, $this->LanguageHandler->$title));

				$path = SYSTEM_PATH . "lang/{$this->_pack}/{$this->_module}.lang.php";

				if(false == file_exists($path))
				{
					$this->MyPanel->messenger($this->LanguageHandler->word_err_no_pack, GATEWAY . '?a=words');
				}

				include $path;

				foreach($lang as $key => $val)
				{
					$var = "<br /><b>&lt;lang:{$key}></b>";

					$this->MyPanel->table->addRow(array(array($this->MyPanel->form->addTextBox('name[]',  $key, false, false, true) . $var, " valign='top'"),
															   $this->MyPanel->form->addTextArea('value[]', $this->ParseHandler->uncleanString($val, true), " style=\"width: 90%;\"", false, true)));
				}

				$this->MyPanel->table->addRow(array($this->MyPanel->form->addTextBox('name[]',  false, false, false, true),
													 $this->MyPanel->form->addTextBox('value[]', false, false, false, true)));
				$this->MyPanel->table->addRow(array($this->MyPanel->form->addTextBox('name[]',  false, false, false, true),
													 $this->MyPanel->form->addTextBox('value[]', false, false, false, true)));
				$this->MyPanel->table->addRow(array($this->MyPanel->form->addTextBox('name[]',  false, false, false, true),
													 $this->MyPanel->form->addTextBox('value[]', false, false, false, true)));
				$this->MyPanel->table->addRow(array($this->MyPanel->form->addTextBox('name[]',  false, false, false, true),
													 $this->MyPanel->form->addTextBox('value[]', false, false, false, true)));
				$this->MyPanel->table->addRow(array($this->MyPanel->form->addTextBox('name[]',  false, false, false, true),
													 $this->MyPanel->form->addTextBox('value[]', false, false, false, true)));
				$this->MyPanel->table->addRow(array($this->MyPanel->form->addTextBox('name[]',  false, false, false, true),
													 $this->MyPanel->form->addTextBox('value[]', false, false, false, true)));

			$this->MyPanel->form->addHidden('hash',	 $this->UserHandler->getUserHash());
			$this->MyPanel->form->addHidden('module',   $this->_module);
			$this->MyPanel->form->addHidden('language', $this->_pack);

			$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

		$this->MyPanel->table->endTable(true);
		$this->MyPanel->appendBuffer($this->MyPanel->table->flushBuffer());
	}

	function _doEditWords()
	{
		if($this->_hash != $this->UserHandler->getUserhash())
		{
			$this->MyPanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
		}

		extract($this->post);

		$path = SYSTEM_PATH . "lang/{$this->_pack}/{$this->_module}.lang.php";

		if(false == file_exists($path))
		{
			$this->MyPanel->messenger($this->LanguageHandler->word_err_no_pack, GATEWAY . '?a=words');
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

		$this->FileHandler->updateFileArray($mod, 'lang', SYSTEM_PATH . "lang/{$this->_pack}/{$this->_module}.lang.php");

		$this->MyPanel->messenger($this->LanguageHandler->word_edit_err_done,
								   GATEWAY . "?a=words&code=01&amp;language={$this->_pack}&amp;module={$this->_module}");
	}

	function _showPacks()
	{
		$this->MyPanel->table->addColumn($this->LanguageHandler->word_tbl_pack_language, " align='left'");
		$this->MyPanel->table->addColumn($this->LanguageHandler->word_tbl_pack_active, " align='center'");
		$this->MyPanel->table->addColumn($this->LanguageHandler->word_tbl_pack_users,  " align='center'");
		$this->MyPanel->table->addColumn('&nbsp;');

		$this->MyPanel->table->startTable($this->LanguageHandler->word_tbl_pack_header);

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
						? '<img src="lib/theme/btn_delete_off.gif" alt=""/>'
						: "<a href=\"" . GATEWAY . "?a=words&amp;code=04&amp;language={$language}\" onclick='javascript:return confirm" .
						  "(\"{$this->LanguageHandler->word_pack_err_confirm}\");'><b>{$this->LanguageHandler->link_delete}</b></a>" ;

				$active = $language == $this->config['language']
						? "<strong>{$this->LanguageHandler->yes}</strong>"
						: $this->LanguageHandler->blank;

				$this->MyPanel->table->addRow(array(array(ucwords($language), false, 'headerb'),
											   array($active, " align='center'", 'headerb'),
											   array(@number_format($used[$language]), " align='center'", 'headerb'),
											   array($delete, " align='center'  width='15%'", 'headerc')));
			}

		$this->MyPanel->table->endTable();
		$this->MyPanel->appendBuffer($this->MyPanel->table->flushBuffer());
	}

	function _doRemovePack()
	{
		if($this->_pack == 'english')
		{
			$this->MyPanel->messenger($this->LanguageHandler->word_pack_err_default, GATEWAY . '?a=words&amp;code=03');
		}

		if(false == is_dir(SYSTEM_PATH . "lang/{$this->_pack}"))
		{
			$this->MyPanel->messenger($this->LanguageHandler->word_pack_err_no_results, GATEWAY . '?a=words&amp;code=03');
		}

		$this->DatabaseHandler->query("UPDATE " . DB_PREFIX . "members SET members_language = 'english' WHERE members_language = '{$this->_pack}'");

		if(false == $this->FileHandler->remDir(SYSTEM_PATH . "lang/{$this->_pack}"))
		{
			$this->MyPanel->messenger($this->LanguageHandler->word_pack_err_cannot_rem, GATEWAY . '?a=words&amp;code=03');
		}

		$this->config['language'] = 'english';
		$this->FileHandler->updateFileArray($this->config, 'config', SYSTEM_PATH . 'config/settings.php');

		$this->CacheHandler->updateCache('languages');

		header('LOCATION: ' . GATEWAY . '?a=words&code=03');
	}

	function _showAddPack()
	{
		$this->MyPanel->form->startForm(GATEWAY . '?a=words&amp;code=06');
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

			$this->MyPanel->form->addTextBox('name',  false, false,
											  array(1, $this->LanguageHandler->word_pack_form_name_title,
													   $this->LanguageHandler->word_pack_form_name_desc));

			$this->MyPanel->form->addWrapSelect('language', $this->_fetchPacks(), $this->_pack, false,
											 array(1,	$this->LanguageHandler->word_pack_form_language_title,
														 $this->LanguageHandler->word_pack_form_language_desc));

			$this->MyPanel->form->appendBuffer("<h1>{$this->LanguageHandler->word_pack_form_options}</h1>");

			$this->MyPanel->form->addCheckBox('default', 1, false, false, false, false,
											   $this->LanguageHandler->word_pack_form_default_desc);

			$this->MyPanel->form->addHidden('hash', $this->UserHandler->getUserHash());

		$this->MyPanel->form->endForm();
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());
	}

	function _doAddPack()
	{
		if($this->_hash != $this->UserHandler->getUserhash())
		{
			$this->MyPanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
		}
		extract($this->post);

		if(false == $name)
		{
			$this->MyPanel->messenger($this->LanguageHandler->word_pack_err_bad_name, GATEWAY . '?a=words&code=05');
		}

		$packs = $this->_fetchPacks();

		if(is_dir(SYSTEM_PATH . "lang/{$name}/"))
		{
			$this->MyPanel->messenger($this->LanguageHandler->word_pack_err_taken, GATEWAY . '?a=words&code=05');
		}

		if(false == preg_match('#^([a-zA-Z0-9_-]+)$#s', $name))
		{
			$this->MyPanel->messenger($this->LanguageHandler->word_pack_err_bad_name, GATEWAY . '?a=words&code=05');
		}

		$this->FileHandler->copyDir($this->config['site_path'] . "lang/{$name}/",
									 $this->config['site_path'] . "lang/{$this->_pack}/");

		if($default)
		{
			$this->config['language'] = $name;
			$this->FileHandler->updateFileArray($this->config, 'config', SYSTEM_PATH . 'config/settings.php');
		}

		$this->CacheHandler->updateCache('languages');

		header('LOCATION: ' . GATEWAY . '?a=words&code=03');
	}

	function _showInstall()
	{
		$this->MyPanel->form->startForm(GATEWAY . '?a=words&amp;code=08', false,
										'POST', " enctype='multipart/form-data'");

		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

			$list = array();
			$handle = opendir(SYSTEM_PATH . 'lang/');
			while(false !== ($file = readdir($handle)))
			{
				$ext = end(explode('.', $file));
				if($ext == 'tar' || $ext == 'gz')
				{
					$list[$file] = $file;
				}
			}
			closedir($handle);

			if(sizeof($list))
			{
				$this->MyPanel->form->addWrapSelect('pack', $list, false, false,
												 array(1, $this->LanguageHandler->word_inst_file_title,
														  $this->LanguageHandler->word_inst_file_desc));

				$this->MyPanel->form->appendBuffer("<p style='text-align: center;'><b>" .
													$this->LanguageHandler->word_inst_form_or  .
													"</b></p>");
			}

			$this->MyPanel->form->addFile('upload',
										   array(1, $this->LanguageHandler->word_inst_remote_title,
													$this->LanguageHandler->word_inst_remote_desc));

			$this->MyPanel->form->addHidden('hash', $this->UserHandler->getUserHash());

		$this->MyPanel->form->endForm();
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());
	}

	function _doUpload()
	{
		if($this->_hash != $this->UserHandler->getUserhash())
		{
			$this->MyPanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
		}

		$dir = $this->config['site_path'] . "lang/";

		if(file_exists($dir . $this->files['upload']['name']))
		{
			$this->MyPanel->messenger($this->LanguageHandler->word_inst_err_exists, GATEWAY . '?a=words&amp;code=07');
		}

		require_once SYSTEM_PATH . 'lib/upload.han.php';
		$UploadHandler = new UploadHandler($this->files, $dir, 'upload');

		$UploadHandler->setExtTypes(array('tar', 'gz'));
		$UploadHandler->setMaxSize(500);

		if(false == $UploadHandler->doUpload())
		{
			$error_msg = $UploadHandler->getError();
			return $this->MyPanel->messenger($this->LanguageHandler->$error_msg, GATEWAY . '?a=words&amp;code=07');
		}

		$this->_doInstall($this->files['upload']['name']);
	}

	function _doInstall($pack = false)
	{
		if($this->_hash != $this->UserHandler->getUserhash())
		{
			$this->MyPanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
		}

		extract($this->post);

		if(false == file_exists(SYSTEM_PATH . "lang/{$pack}"))
		{
			$this->MyPanel->messenger($this->LanguageHandler->word_exp_rem_missing,
									   GATEWAY . '?a=words&amp;code=07');
		}

		$from = $this->config['site_path'] . 'lang/';

		$this->TarHandler->setCurrent($from);

		if ( false == in_array ( 'global.lang.php', $this->TarHandler->listContents ( $pack, $from ) ) )
		{
			chdir($this->config['site_path'] . 'admin/');

			$this->MyPanel->messenger($this->LanguageHandler->word_inst_err_invalid,
									   GATEWAY . '?a=words&amp;code=07');
		}

		chdir($this->config['site_path'] . 'admin/');

		$name = explode('.', $pack);
		$name = $name[0];

		if(file_exists(SYSTEM_PATH . "lang/{$name}"))
		{
			$this->MyPanel->messenger($this->LanguageHandler->word_inst_err_taken,
									   GATEWAY . '?a=words&amp;code=07');
		}

		mkdir(SYSTEM_PATH . "lang/{$name}/");

		$to = $this->config['site_path'] . "lang/{$name}/";

		$this->TarHandler->extractTar ( $pack, $from, $to );

		$this->CacheHandler->updateCache('languages');

		header("LOCATION: " . GATEWAY . "?a=words&amp;code=03");
	}

	function _showExport()
	{
		$this->MyPanel->form->startForm(GATEWAY . '?a=words&amp;code=10');
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

			$this->MyPanel->form->addSelect('language', $this->_fetchPacks(), false, false,
											 array(1, $this->LanguageHandler->word_exp_form_choose_title,
													  $this->LanguageHandler->word_exp_form_choose_desc));

			$this->MyPanel->form->addHidden('hash', $this->UserHandler->getUserHash());

		$this->MyPanel->form->endForm();
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

		$this->MyPanel->table->addColumn($this->LanguageHandler->word_exp_tbl_id, ' width="1%"');
		$this->MyPanel->table->addColumn($this->LanguageHandler->word_exp_tbl_name, " align='left'");
		$this->MyPanel->table->addColumn($this->LanguageHandler->word_exp_tbl_date, " align='center'");
		$this->MyPanel->table->addColumn('&nbsp;', ' width="15%"');

		$this->MyPanel->table->startTable($this->LanguageHandler->word_exp_tbl_header);

			$i	= 0;
			$list = array();
			$handle = opendir(SYSTEM_PATH . 'lang/');
			while(false !== ($file = readdir($handle)))
			{
				$ext = end(explode('.', $file));
				if($ext == 'tar' || $ext == 'gz' )
				{
					$i++;
					$list[$i] = $file;
				}
			}
			closedir($handle);

			if(false == sizeof($list))
			{
				$this->MyPanel->table->addRow(array(array($this->LanguageHandler->word_exp_tbl_no_packs, " align='center' colspan='4'")));
			}
			else
			{
				foreach($list as $key => $val)
				{

					$this->MyPanel->table->addRow(array(array("<strong>{$key}</strong>"),
														 array($val),
														 array(date($this->config['date_long'], filemtime(SYSTEM_PATH . "lang/{$val}")), " align='center'"),
														 array("<a href=\"" . GATEWAY . "?a=words&amp;code=12&amp;language={$val}\">{$this->LanguageHandler->style_tbl_download}</a>" .
															   " <a href=\"" . GATEWAY . "?a=words&amp;code=11&amp;language={$val}\" onclick='javascript: return confirm" .
															   "(\"{$this->LanguageHandler->word_exp_rem_confirm}\");'><b>{$this->LanguageHandler->link_delete}</b></a>", " align='center'")));
				}
			}

		$this->MyPanel->table->endTable();
		$this->MyPanel->appendBuffer($this->MyPanel->table->flushBuffer());
	}

	function _doExport()
	{
		if($this->_hash != $this->UserHandler->getUserhash())
		{
			$this->MyPanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
		}
		extract($this->post);

		$this->TarHandler->setCurrent ( $this->config['site_path'] . "lang/{$this->_pack}" );
		$this->TarHandler->newTar ( "{$this->_pack}.tar", $this->config['site_path'] . 'lang' );
		$this->TarHandler->setGzLevel ( 9 );
		$this->TarHandler->addDirectory ( '.' );

		$this->TarHandler->writeTar();

		chdir($this->config['site_path'] . 'admin/');

		header("LOCATION: " . GATEWAY . "?a=words&code=09");
	}

	function _doRemoveExport()
	{
		if(@file_exists(SYSTEM_PATH . '/lang/' . $this->_pack))
		{
			@unlink(SYSTEM_PATH . '/lang/' . $this->_pack);
			header("LOCATION: " . GATEWAY . "?a=words&code=09");
			exit();
		}

		$this->MyPanel->messenger($this->LanguageHandler->word_exp_rem_missing, GATEWAY . '?a=words&amp;code=08');
	}

	function _doDownload()
	{
		if(@file_exists(SYSTEM_PATH . '/lang/' . $this->_pack))
		{
			header("Content-type: application/tar");
			header("Content-Disposition: attachment; filename={$this->_pack}");

			readfile(SYSTEM_PATH . 'lang/' . $this->_pack);

			exit();
		}

		$this->MyPanel->messenger($this->LanguageHandler->word_rem_missing, GATEWAY . '?a=skin&amp;code=08');
	}

	function _fetchPacks()
	{
		$handle = opendir(SYSTEM_PATH . 'lang/');
		while(false !== ($file = readdir($handle)))
		{
			$ext = end(explode('.', $file));

			if(false == file_exists($file) && $file != 'index.html' && $ext != 'tar' && $ext != 'gz' )
			{
				$list[$file] = $file;
			}
		}
		closedir($handle);

		return $list;
	}

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