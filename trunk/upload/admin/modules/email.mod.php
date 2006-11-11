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
	var $_comp1;

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
	function ModuleObject(& $module, & $config)
	{
		$this->MasterObject($module, $config);

		$this->_id   = isset($this->get['id'])	? (int) $this->get['id']	: 0;
		$this->_code = isset($this->get['code'])  ?	   $this->get['code']  : 00;
		$this->_hash = isset($this->post['hash']) ?	   $this->post['hash'] : null;

		require_once SYSTEM_PATH . 'admin/lib/mypanel.php';
		$this->MyPanel = new MyPanel($this);

		require_once SYSTEM_PATH . 'lib/page.han.php';
		$this->_PageHandler = new PageHandler(isset($this->get['p']) ? (int) $this->get['p'] : 1,
											 $this->config['page_sep'],
											 $this->config['per_page'],
											 $this->DatabaseHandler,
											 $this->config);

		$this->_comp1 = array('contain' => $this->LanguageHandler->comp_contain,
							  'equal'   => $this->LanguageHandler->comp_equal,
							  'begin'   => $this->LanguageHandler->comp_begin,
							  'end'	 => $this->LanguageHandler->comp_end);
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
			case '01':
				$this->MyPanel->_make_nav(1, 4);
				$this->_showSearchForm();
				break;

			case '02':
				$this->MyPanel->_make_nav(1, 4);
				$this->_doSearch();
				break;

			case '03':
				$this->MyPanel->_make_nav(1, 4);
				$this->_viewEmail();
				break;

			case '04':
				$this->MyPanel->_make_nav(1, 4);
				$this->_doRemove();
				break;

			default:
				$this->MyPanel->_make_nav(1, 4);
				$this->_showSearchForm();
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
	function _showSearchForm()
	{
		$this->MyPanel->addHeader($this->LanguageHandler->email_form_header);

		$this->MyPanel->appendBuffer("<form method=\"post\" action=\"" . GATEWAY . '?a=email&amp;code=02#results">');

			$this->MyPanel->table->addColumn($this->LanguageHandler->email_tbl_field, "align='left'");
			$this->MyPanel->table->addColumn('&nbsp;');
			$this->MyPanel->table->addColumn($this->LanguageHandler->email_tbl_term,  "align='left'");

			$this->MyPanel->table->startTable($this->LanguageHandler->email_tbl_header);

				$this->MyPanel->table->addRow(array($this->LanguageHandler->email_form_sender,
											   $this->MyPanel->form->addSelect('sender_type', $this->_comp1, false, false, false, true),
											   $this->MyPanel->form->addTextBox('sender', false, false, false, true)));

				$this->MyPanel->table->addRow(array($this->LanguageHandler->email_form_recipient,
											   $this->MyPanel->form->addSelect('recipient_type', $this->_comp1, false, false, false, true),
											   $this->MyPanel->form->addTextBox('recipient', false, false, false, true)));

				$this->MyPanel->table->addRow(array($this->LanguageHandler->email_form_subject,
											   $this->MyPanel->form->addSelect('subject_type', $this->_comp1, false, false, false, true),
											   $this->MyPanel->form->addTextBox('subject', false, false, false, true)));

			$this->MyPanel->table->endTable(true);
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
	function _doSearch()
	{
		$pageQuery = array();

		if(true == $this->post)
		{
			foreach($this->post as $key => $val)
			{
				$this->post[$key] = trim($val);

				$pageQuery[] = "{$key}=" . urlencode($val);
			}
		}
		else {
			foreach($this->get as $key => $val)
			{
				$this->get[$key] = trim($val);

			if($key != 'code' && $key != 'a' && $key != 'id')
			{
				$pageQuery[] = "{$key}=" . urlencode($val);
			}
			}
		}

		$pageQuery = implode('&amp;', $pageQuery);

		extract($this->post);
		extract($this->get);

		$this->MyPanel->addHeader($this->LanguageHandler->email_form_header);

		$query = array();

		if($sender)
		{
			switch($sender_type)
			{
				case 'equal':
					$query[] = "AND s.members_name = '{$sender}'";
					break;
				case 'contain':
					$query[] = "AND s.members_name LIKE '%{$sender}%'";
					break;
				case 'begin':
					$query[] = "AND s.members_name LIKE '{$sender}%'";
					break;
				case 'end':
					$query[] = "AND s.members_name LIKE '%{$sender}'";
					break;
			}
		}

		if($recipient)
		{
			switch($recipient_type)
			{
				case 'equal':
					$query[] = "AND r.members_name = '{$recipient}'";
					break;
				case 'contain':
					$query[] = "AND r.members_name LIKE '%{$recipient}%'";
					break;
				case 'begin':
					$query[] = "AND r.members_name LIKE '{$recipient}%'";
					break;
				case 'end':
					$query[] = "AND r.members_name LIKE '%{$recipient}'";
					break;
			}
		}

		if($subject)
		{
			switch($subject_type)
			{
				case 'equal':
					$query[] = "AND e.email_subject = '{$subject}'";
					break;
				case 'contain':
					$query[] = "AND e.email_subject LIKE '%{$subject}%'";
					break;
				case 'begin':
					$query[] = "AND e.email_subject LIKE '{$subject}%'";
					break;
				case 'end':
					$query[] = "AND e.email_subject LIKE '%{$subject}'";
					break;
			}
		}

		if(false == $query)
		{
			$this->MyPanel->messenger($this->LanguageHandler->email_err_no_fields, GATEWAY . '?a=email');
		}

		$query = substr(implode(" \n", $query), 4);

   		$sql = $this->DatabaseHandler->query("SELECT COUNT(email_id) AS Count FROM " . DB_PREFIX . "emails");
		$row = $sql->getRow();

		$this->_PageHandler->setRows($row['Count']);
		$this->_PageHandler->doPages(GATEWAY . "?a=email{$pageQuery}");

 		$sql = $this->_PageHandler->getData("
		SELECT
			e.email_id,
			e.email_date,
			e.email_subject,
			s.members_id   AS email_sender_id,
			s.members_name AS email_sender,
			r.members_id   AS email_recipient_id,
			r.members_name AS email_recipient
		FROM " . DB_PREFIX . "emails e
			LEFT JOIN " . DB_PREFIX . "members s ON s.members_id = e.email_from
			LEFT JOIN " . DB_PREFIX . "members r ON r.members_id = e.email_to
		WHERE
		{$query}
		ORDER BY
			e.email_date DESC");

		if(false == $sql->getNumRows())
		{
			$this->MyPanel->messenger($this->LanguageHandler->email_err_no_results, GATEWAY . '?a=email');
		}

		$this->MyPanel->appendBuffer('<p id="bar">' . $this->_PageHandler->getSpan() . '</p>');

		$this->MyPanel->table->addColumn($this->LanguageHandler->email_tbl_id);
		$this->MyPanel->table->addColumn($this->LanguageHandler->email_tbl_sender,	" align='center'");
		$this->MyPanel->table->addColumn($this->LanguageHandler->email_tbl_recipient, " align='center'");
		$this->MyPanel->table->addColumn($this->LanguageHandler->email_tbl_subject,   " align='left'");
		$this->MyPanel->table->addColumn($this->LanguageHandler->email_tbl_date,	  " align='center'");
		$this->MyPanel->table->addColumn('&nbsp;');

		$this->MyPanel->table->startTable(number_format($row['Count']) .  ' ' . $this->LanguageHandler->email_form_results);

			while($row = $sql->getRow())
			{
				$this->MyPanel->table->addRow(array(array("<strong>{$row['email_id']}</strong>", ' align="center"', 'headera'),
											   array("<a href=\"" . GATEWAY . "?a=members&amp;code=05&amp;id={$row['email_sender_id']}\">{$row['email_sender']}</a>",	" align='center'", 'headerb'),
											   array("<a href=\"" . GATEWAY . "?a=members&amp;code=05&amp;id={$row['email_recipient_id']}\">{$row['email_recipient']}</a>", " align='center'", 'headerb'),
											   array($row['email_subject'], '', 'headerb'),
											   array(date($this->config['date_short'], $row['email_date']), " align='center'", 'headerb'),
											   array("<a href=\"" . GATEWAY . "?a=email&amp;code=03&amp;id={$row['email_id']}\">{$this->LanguageHandler->link_view}</a> " .
													 "<a href=\"" . GATEWAY . "?a=email&amp;code=04&amp;id={$row['email_id']}&{$pageQuery}\"><strong>{$this->LanguageHandler->link_delete}</strong></a>", ' align="center"', 'headerc')));
			}

		$this->MyPanel->table->endTable();
		$this->MyPanel->appendBuffer($this->MyPanel->table->flushBuffer());

		$this->MyPanel->appendBuffer('<p id="bar">' . $this->_PageHandler->getSpan() . '</p>');
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
	function _viewEmail()
	{
		extract($this->get);

		$sql = $this->DatabaseHandler->query("
		SELECT
			e.*,
			s.members_id   AS email_sender_id,
			s.members_name AS email_sender,
			r.members_id   AS email_recipient_id,
			r.members_name AS email_recipient
		FROM " . DB_PREFIX . "emails e
			LEFT JOIN " . DB_PREFIX . "members s ON s.members_id = e.email_from
			LEFT JOIN " . DB_PREFIX . "members r ON r.members_id = e.email_to
		WHERE	e.email_id = {$this->_id}
		ORDER BY e.email_date DESC");

		if(false == $sql->getNumRows())
		{
			$this->MyPanel->messenger($this->LanguageHandler->email_form_no_results, GATEWAY . '?a=email');
		}

		$row = $sql->getRow();

		$this->MyPanel->addHeader(sprintf($this->LanguageHandler->email_read_viewing, $row['email_id']));

		$this->MyPanel->appendBuffer("
		<p style=\"font: normal normal 14px Courier;\">
			<b>From:</b>&nbsp;<a href=\"" . GATEWAY . "?a=members&amp;code=05&amp;id={$row['email_sender_id']}\">{$row['email_sender']}</a><br />
			<b>To:</b>&nbsp;&nbsp;&nbsp;<a href=\"" . GATEWAY . "?a=members&amp;code=05&amp;id={$row['email_recipient_id']}\">{$row['email_recipient']}</a><br />
			<b>Date:</b> " . date($this->config['date_long'], $row['email_date']) . "<br />
			<br />
			<b>Subject:</b> {$row['email_subject']}<br />
			<br />
			<b>Message Body:</b><br />
			<br />
			" . $this->ParseHandler->parseText($row['email_body']) . "</p>");
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
	function _doRemove()
	{
		$trailer = array();
		foreach($this->get as $key => $val)
		{
			if($key != 'code' && $key != 'a')
			{
				$trailer[] = "{$key}=" . urlencode($val);
			}
		}

		$trailer = implode('&', $trailer);

		$sql = $this->DatabaseHandler->query("SELECT email_id FROM " . DB_PREFIX . "emails WHERE email_id = {$this->_id}");

		if(false == $sql->getNumRows())
		{
			$this->MyPanel->messenger($this->LanguageHandler->email_err_no_results, GATEWAY . '?a=email');
		}

		$this->DatabaseHandler->query("DELETE FROM " . DB_PREFIX . "emails WHERE email_id = {$this->_id}");

		header("LOCATION: " . GATEWAY . "?a=email&code=02&{$trailer}");
	}

}
?>