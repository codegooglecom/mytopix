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
	var $OnePanel;

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

		require_once SYSTEM_PATH . 'lib/file.han.php';
		$this->_FileHandler  = new FileHandler($this->config);

		require_once SYSTEM_PATH . 'admin/lib/onepanel.php';
		$this->OnePanel = new OnePanel($this);

		require_once SYSTEM_PATH . 'lib/page.han.php';
		$this->_PageHandler = new PageHandler(isset($this->get['p']) ? (int) $this->get['p'] : 1,
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
		$this->OnePanel->addHeader($this->LanguageHandler->files_main_header);

		switch($this->_code)
		{
			case '00':
				$this->OnePanel->_make_nav(1, 21);
				$this->_showSearchForm();
				break;

			case '01':
				$this->OnePanel->_make_nav(1, 21);
				$this->_viewResults();
				break;

			case '02':
				$this->OnePanel->_make_nav(1, 21);
				$this->_delAttachment();
				break;

			default:
				$this->OnePanel->_make_nav(1, 21);
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
		$this->OnePanel->appendBuffer("<form method=\"post\" action=\"" . GATEWAY . '?a=files&amp;code=01">');

			$this->OnePanel->table->addColumn($this->LanguageHandler->mem_search_tbl_field, "align='left'");
			$this->OnePanel->table->addColumn('&nbsp;');
			$this->OnePanel->table->addColumn($this->LanguageHandler->mem_search_tbl_term,  "align='left'");

			$this->OnePanel->table->startTable($this->LanguageHandler->mem_search_form_tbl_header);

				$this->OnePanel->table->addRow(array($this->LanguageHandler->files_form_name,
										   $this->OnePanel->form->addSelect('file_type', $this->_comp1, false, false, false, true),
										   $this->OnePanel->form->addTextBox('file',	 false, false, false, true)));

				$this->OnePanel->table->addRow(array($this->LanguageHandler->files_form_ext,
										   $this->OnePanel->form->addSelect('ext_type', $this->_comp1, false, false, false, true),
										   $this->OnePanel->form->addTextBox('ext',	 false, false, false, true)));

				$this->OnePanel->table->addRow(array($this->LanguageHandler->files_form_author,
										   $this->OnePanel->form->addSelect('author_type', $this->_comp1, false, false, false, true),
										   $this->OnePanel->form->addTextBox('author',	 false, false, false, true)));

				$this->OnePanel->table->addRow(array($this->LanguageHandler->files_form_size,
										   $this->OnePanel->form->addSelect('size_type', $this->_comp2, false, false, false, true),
										   $this->OnePanel->form->addTextBox('size',	 false, false, false, true)));

				$this->OnePanel->table->addRow(array($this->LanguageHandler->files_form_hits,
										   $this->OnePanel->form->addSelect('hits_type', $this->_comp2, false, false, false, true),
										   array($this->OnePanel->form->addTextBox('hits',	 false, false, false, true))));

				$this->OnePanel->table->addRow(array($this->LanguageHandler->files_form_days,
										   $this->OnePanel->form->addSelect('days_type', $this->_comp3, false, false, false, true),
										   array($this->OnePanel->form->addTextBox('days',	 false, false, false, true))));

 			$this->OnePanel->table->endTable(true);
			$this->OnePanel->appendBuffer($this->OnePanel->table->flushBuffer());
	}

	function _viewResults()
	{
		$pageQuery = '';

		if(true == $this->post)
		{
			foreach($this->post as $key => $val)
			{
				$pageQuery .= "{$key}=" . urlencode($val) . "&amp;";
			}
		}
		else
		{
			foreach($this->get as $key => $val)
			{
				$pageQuery .= "{$key}=" . urlencode($val) . "&amp;";
			}
		}

		$pageQuery = $this->ParseHandler->uncleanString(substr($pageQuery, 0, -1));

		extract($this->post);
		extract($this->get);

		$query = array();

		if(@$file)
		{
			switch($file_type)
			{
				case 'equal':
					$query[] = "AND u.upload_name = '{$file}'";
					break;

				case 'contain':
					$query[] = "AND u.upload_name LIKE '%{$file}%'";
					break;

				case 'begin':
					$query[] = "AND u.upload_name LIKE '{$file}%'";
					break;

				case 'end':
					$query[] = "AND u.upload_name LIKE '%{$file}'";
					break;
			}
		}

		if(@$ext)
		{
			switch($ext_type)
			{
				case 'equal':
					$query[] = "AND u.upload_ext = '{$ext}'";
					break;

				case 'contain':
					$query[] = "AND u.upload_ext LIKE '%{$ext}%'";
					break;

				case 'begin':
					$query[] = "AND u.upload_ext LIKE '{$ext}%'";
					break;

				case 'end':
					$query[] = "AND u.upload_ext LIKE '%{$ext}'";
					break;
			}
		}

		if(@$author)
		{
			switch($author_type)
			{
				case 'equal':
					$query[] = "AND m.members_name = '{$author}'";
					break;

				case 'contain':
					$query[] = "AND m.members_name LIKE '%{$author}%'";
					break;

				case 'begin':
					$query[] = "AND m.members_name LIKE '{$author}%'";
					break;

				case 'end':
					$query[] = "AND m.members_name LIKE '%{$author}'";
					break;
			}
		}

		if($hits)
		{
			$hits = (int) $hits;

			switch($hits_type)
			{
				case 'equal':
					$query[] = "AND u.upload_hits = {$hits}";
					break;

				case 'greater':
					$query[] = "AND u.upload_hits > {$hits}";
					break;

				case 'lesser':
					$query[] = "AND u.upload_hits < {$hits}";
					break;

				case 'lessequal':
					$query[] = "AND u.upload_hits <= {$hits}";
					break;

				case 'greatequal':
					$query[] = "AND u.upload_hits >= {$hits}";
					break;
			}
		}

		if($size)
		{
			$size = (int) $size;

			switch($size_type)
			{
				case 'equal':
					$query[] = "AND u.upload_size = {$size}";
					break;

				case 'greater':
					$query[] = "AND u.upload_size > {$size}";
					break;

				case 'lesser':
					$query[] = "AND u.upload_size < {$size}";
					break;

				case 'lessequal':
					$query[] = "AND u.upload_size <= {$size}";
					break;

				case 'greatequal':
					$query[] = "AND u.upload_size >= {$size}";
					break;
			}
		}

		if(@$days)
		{
			$days = (int) time() - ((($days * 60) * 60) * 24);

			switch($days_type)
			{
				case 'greater':
					$query[] = "AND u.upload_date > {$days}";
					break;

				case 'lesser':
					$query[] = "AND u.upload_date < {$days}";
					break;
			}
		}

		if(false == $query)
		{
			$this->OnePanel->messenger($this->LanguageHandler->files_err_no_fields, GATEWAY . '?a=files');
		}

		$query = substr(implode(" \n", $query), 4);

		$string = "
		SELECT
			t.topics_id,
			t.topics_title,
			m.members_id,
			m.members_name,
			u.*
		FROM " . DB_PREFIX . "uploads u
			LEFT JOIN " . DB_PREFIX . "members m ON m.members_id = u.upload_user
			LEFT JOIN " . DB_PREFIX . "posts   p ON p.posts_id   = u.upload_post
			LEFT JOIN " . DB_PREFIX . "topics  t ON t.topics_id  = p.posts_topic
		WHERE {$query}
		ORDER BY u.upload_id DESC";

		$sql = $this->DatabaseHandler->query($string);

		$num = $sql->getNumRows();

		if(false == $num)
		{
			$this->OnePanel->messenger($this->LanguageHandler->files_err_no_match, GATEWAY . '?a=files');
		}

		$this->_PageHandler->setRows($num);
		$this->_PageHandler->doPages(GATEWAY . "?a=members&amp;code=03&amp;{$pageQuery}");

		$sql = $this->_PageHandler->getData($string);

		$this->OnePanel->appendBuffer("<a name='results'></a>");

		$this->OnePanel->table->addColumn($this->LanguageHandler->files_result_id,	 "align='center' width='1%'");
		$this->OnePanel->table->addColumn($this->LanguageHandler->files_result_name,   "align='left'");
		$this->OnePanel->table->addColumn($this->LanguageHandler->files_result_topic,  "align='left'");
		$this->OnePanel->table->addColumn($this->LanguageHandler->files_result_poster, "align='center'");
		$this->OnePanel->table->addColumn($this->LanguageHandler->files_result_date,   "align='center'");
		$this->OnePanel->table->addColumn($this->LanguageHandler->files_result_size,   "align='center'");
		$this->OnePanel->table->addColumn($this->LanguageHandler->files_result_hits,   "align='center'");
		$this->OnePanel->table->addColumn('&nbsp;', ' width="10%"');

		$this->OnePanel->appendBuffer("<div id=\"bar\">" . $this->_PageHandler->getSpan() . "</div>");

		$this->OnePanel->table->startTable(number_format($num) . ' ' .$this->LanguageHandler->mem_search_tbl_header);

		while($row = $sql->getRow())
		{
			$this->OnePanel->table->addRow(array(array("<strong>{$row['upload_id']}</strong>", ' align="center"', 'headera'),
												 array("<a href=\"{$this->config['site_link']}index.php?a=misc&amp;CODE=01&amp;id={$row['upload_id']}\">{$row['upload_name']}</a>", 'headerb'),
												 array("<a href=\"{$this->config['site_link']}?a=read&amp;CODE=02&amp;p={$row['upload_post']}\" title=\"\">{$row['topics_title']}</a>"),
												 array("<a href=\"" . GATEWAY . "?a=members&code=05&id={$row['members_id']}\" title=\"\">{$row['members_name']}</a>", 'align="center"'),
												 array(date($this->config['date_short'], $row['upload_date']), " align=\"center\"", 'headerb'),
												 array($this->_FileHandler->getFileSize($row['upload_size']), " align=\"center\"", 'headerb'),
												 array(number_format($row['upload_hits']), " align=\"center\"", 'headerb'),
												 array("<a href=\"" . GATEWAY . "?a=files&amp;{$pageQuery}&amp;code=02&amp;id={$row['upload_id']}\" onclick='return confirm(\"{$this->LanguageHandler->files_del_conf}\");'><strong>{$this->LanguageHandler->link_delete}</strong></a>", " align='center'", 'headerc')));
		}

		$this->OnePanel->table->endTable();
		$this->OnePanel->appendBuffer($this->OnePanel->table->flushBuffer());

		$this->OnePanel->appendBuffer("<div id=\"bar\">" . $this->_PageHandler->getSpan() . "</div>");
	}

	function _delAttachment()
	{
		$pageQuery = '';

		foreach($this->get as $key => $val)
		{
			$pageQuery .= "{$key}=" . urlencode($val) . "&amp;";
		}

		$pageQuery = $this->ParseHandler->uncleanString($pageQuery);

		$sql = $this->DatabaseHandler->query("
		SELECT
			p.posts_id,
			t.topics_id,
			u.upload_id,
			u.upload_name,
			u.upload_size,
			u.upload_hits,
			u.upload_date,
			u.upload_file,
			u.upload_ext
		FROM " . DB_PREFIX . "uploads u
			LEFT JOIN " . DB_PREFIX . "posts  p ON p.posts_id  = u.upload_post
			LEFT JOIN " . DB_PREFIX . "topics t ON t.topics_id = p.posts_topic
		WHERE
			u.upload_user = " . USER_ID . " AND
			u.upload_id   = {$this->_id}
		ORDER BY u.upload_id DESC",
		__FILE__, __LINE__);

		if(false == $sql->getNumRows())
		{
			$this->OnePanel->messenger($this->LanguageHandler->files_err_no_file, GATEWAY . "?a=files&code=01&{$pageQuery}");
		}

		$upload	= $sql->getRow();
		$file_path = SYSTEM_PATH . "uploads/attachments/{$upload['upload_file']}.{$upload['upload_ext']}";

		if(false == file_exists($file_path))
		{
			$this->OnePanel->messenger($this->LanguageHandler->files_err_no_file, GATEWAY . "?a=files&code=01&{$pageQuery}");
		}

		unlink($file_path);

		$this->DatabaseHandler->query("
		DELETE FROM " . DB_PREFIX . "uploads
		WHERE
			upload_id   = {$upload['upload_id']} AND
			upload_post = {$upload['posts_id']}",
		__FILE__, __LINE__);

		$sql = $this->DatabaseHandler->query("
		SELECT upload_id
		FROM " . DB_PREFIX . "uploads u
			LEFT JOIN " . DB_PREFIX . "posts  p ON p.posts_id  = u.upload_post
			LEFT JOIN " . DB_PREFIX . "topics t ON t.topics_id = p.posts_topic
		WHERE t.topics_id = {$upload['topics_id']}",
		__FILE__, __LINE__);

		if(false == $sql->getNumRows())
		{
			$this->DatabaseHandler->query("
			UPDATE " . DB_PREFIX . "topics SET
				topics_has_file = 0
			WHERE topics_id	 = {$upload['topics_id']}",
			__FILE__, __LINE__);
		}

		header("LOCATION: " . GATEWAY . "?a=files&{$pageQuery}&code=01");
	}
}

?>