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
    var $_comp2;

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
    var $_MailHandler;

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

        $this->_id   = isset($this->get['id'])    ? (int) $this->get['id']    : 0;
        $this->_code = isset($this->get['code'])  ?       $this->get['code']  : 00;
        $this->_hash = isset($this->post['hash']) ?       $this->post['hash'] : null;

        require_once SYSTEM_PATH . 'lib/file.han.php';
        $this->_FileHandler  = new FileHandler($this->config);

        require_once SYSTEM_PATH . 'admin/lib/mypanel.php';
        $this->MyPanel = new MyPanel($this);

		require_once SYSTEM_PATH . 'lib/page.han.php';
		$this->_PageHandler = new PageHandler(isset($this->get['p']) ? (int) $this->get['p'] : 1, 
                                             '', 
                                             $this->config['per_page'], 
                                             $this->DatabaseHandler,
                                             $this->config);

		require SYSTEM_PATH . 'lib/mail.han.php';
		$this->_MailHandler = new MailHandler($this->config['email_incoming'], 
                                              $this->config['email_outgoing'], 
                                              $this->config['email_name']);

        $this->_comp1 = array('contain' => $this->LanguageHandler->comp_contain,
                              'equal'   => $this->LanguageHandler->comp_equal, 
						      'begin'   => $this->LanguageHandler->comp_begin, 
						      'end'     => $this->LanguageHandler->comp_end);

        $this->_comp2 = array('equal'      => '=', 
                              'greater'    => '>', 
                              'lesser'     => '<', 
                              'lessequal'  => '<=', 
                              'greatequal' => '>=');
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
                $this->MyPanel->_make_nav(3, 10);

                if(false == $this->MyPanel->canAccess('admin_member_add'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
    				$this->_showAddForm();
                }

				break;

			case '01':
                $this->MyPanel->_make_nav(3, 10);

                if(false == $this->MyPanel->canAccess('admin_member_add'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
    				$this->_doAdd();
                }

				break;

			case '02':
                $this->MyPanel->_make_nav(3, 9);
				$this->_showSearchForm();
				break;

			case '03':
                $this->MyPanel->_make_nav(3, 9);
				$this->_doSearch();
				break;

			case '04':
                $this->MyPanel->_make_nav(3, 9, -1, $this->_id);

                if(false == $this->MyPanel->canAccess('admin_member_remove'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
    				$this->_doDelete();
                }

				break;

			case '05':
                $this->MyPanel->_make_nav(3, 9, 15, $this->_id);

                if(false == $this->MyPanel->canAccess('admin_member_edit'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
    				$this->_editGeneral();
                }

				break;

			case '06':
                $this->MyPanel->_make_nav(3, 9, 15, $this->_id);

                if(false == $this->MyPanel->canAccess('admin_member_edit'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
    				$this->_doEditGeneral();
                }

				break;

			case '07':
                $this->MyPanel->_make_nav(3, 9, 16, $this->_id);

                if(false == $this->MyPanel->canAccess('admin_member_edit'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
    				$this->_editPersonal();
                }

				break;

			case '08':
                $this->MyPanel->_make_nav(3, 9, 16, $this->_id);

                if(false == $this->MyPanel->canAccess('admin_member_edit'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
				    $this->_doEditPersonal();
                }

				break;

			case '09':
                $this->MyPanel->_make_nav(3, 9, 17, $this->_id);

                if(false == $this->MyPanel->canAccess('admin_member_edit'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
			    	$this->_editEmail();
                }

				break;

			case '10':
                $this->MyPanel->_make_nav(3, 9, 17, $this->_id);

                if(false == $this->MyPanel->canAccess('admin_member_edit'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
    				$this->_doEditEmail();
                }

				break;

			case '11':
                $this->MyPanel->_make_nav(3, 9, 18, $this->_id);

                if(false == $this->MyPanel->canAccess('admin_member_edit'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
    				$this->_editPassword();
                }

				break;

			case '12':
                $this->MyPanel->_make_nav(3, 9, 18, $this->_id);

                if(false == $this->MyPanel->canAccess('admin_member_edit'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
    				$this->_doEditPassword();
                }

				break;

			case '13':
                $this->MyPanel->_make_nav(3, 9, 15, $this->_id);

                if(false == $this->MyPanel->canAccess('admin_member_edit'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
    				$this->_quickBan();
                }

				break;

			case '14':
                $this->MyPanel->_make_nav(3, 9, 15, $this->_id);

                if(false == $this->MyPanel->canAccess('admin_member_edit'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
    				$this->_doQuickBan();
                }

				break;

			default:
                $this->MyPanel->_make_nav(3, 9);
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
    function _showAddForm()
    {
		$this->MyPanel->addHeader($this->LanguageHandler->mem_add_form_header);

		$this->MyPanel->form->startForm(GATEWAY . '?a=members&amp;code=01');
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

			$this->MyPanel->form->addTextBox('name', false, false, 
									array(1, $this->LanguageHandler->mem_add_form_name_title, 
                                             $this->LanguageHandler->mem_add_form_name_desc));

			$this->MyPanel->form->addPassBox('password', false, false, 
									array(1, $this->LanguageHandler->mem_add_form_pass_title, 
                                             $this->LanguageHandler->mem_add_form_pass_desc));

			$this->MyPanel->form->addPassBox('cpassword', false, false, 
									array(1, $this->LanguageHandler->mem_add_form_cpass_title,
                                             $this->LanguageHandler->mem_add_form_cpass_desc));

			$this->MyPanel->form->addTextBox('email', false, false, 
									array(1, $this->LanguageHandler->mem_add_form_mail_title, 
                                             $this->LanguageHandler->mem_add_form_mail_desc));

			$this->MyPanel->form->addTextBox('cemail', false, false, 
									array(1, $this->LanguageHandler->mem_add_form_cmail_title,
                                             $this->LanguageHandler->mem_add_form_cmail_desc));

            $this->MyPanel->form->addWrapSelect('skin', $this->_fetchSkins(false), false, false, 
                                   array(1, $this->LanguageHandler->mem_add_form_skin_title,
                                            $this->LanguageHandler->mem_add_form_skin_desc));

            $this->MyPanel->form->addWrapSelect('language', $this->_fetchPacks(false), false, false, 
                                   array(1, $this->LanguageHandler->mem_add_form_lang_title, 
                                            $this->LanguageHandler->mem_add_form_lang_desc));

            $sql = $this->DatabaseHandler->query("SELECT class_id, class_title FROM " . DB_PREFIX . "class ORDER BY class_title ASC");

            $list   = array();
            while($row = $sql->getRow())
            {
                $list[$row['class_id']] = $row['class_title'];
            }

            $this->MyPanel->form->addWrapSelect('group', $list, 2, false, 
                                   array(1, $this->LanguageHandler->mem_add_form_class_title,
                                            $this->LanguageHandler->mem_add_form_class_desc));

            $this->MyPanel->form->appendBuffer("<h1>{$this->LanguageHandler->mem_add_form_options}</h1>");

			$this->MyPanel->form->addCheckBox('admin', 1, false, false,
								            false, ($this->config['closed'] ? true : false),$this->LanguageHandler->mem_add_form_admin_desc, false, 'checkwrap_4');

			$this->MyPanel->form->addCheckBox('mod', 1, false, false,
								            false, ($this->config['closed'] ? true : false),$this->LanguageHandler->mem_add_form_mod_desc);

			$this->MyPanel->form->addCheckBox('notify', 1, false, false,
								            false, ($this->config['closed'] ? true : false),$this->LanguageHandler->mem_add_form_notify_desc);

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
    function _doAdd()
    {
        if($this->_hash != $this->UserHandler->getUserhash())
        {
            $this->MyPanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
        }

		extract($this->post);

		if(strlen($password) < 3 || strlen($password) > 15 || $password != $cpassword)
        {
			$this->MyPanel->messenger($this->LanguageHandler->mem_add_err_pass, GATEWAY . '?a=members&amp;code=00');
        }

		if(false == preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*$/i", $email) || $email != $cemail)
        {
			$this->MyPanel->messenger($this->LanguageHandler->mem_add_err_mail, GATEWAY . '?a=members&amp;code=00');
        }

		$len_name = stripslashes($name);
		$name     = preg_replace("/\s{2,}/", " ", $name);

		$sql = $this->DatabaseHandler->query("SELECT members_id FROM " . DB_PREFIX . "members WHERE members_name = '{$name}'");
		if($sql->getNumRows() || strlen($len_name) < 3 || strlen($len_name) > 20)
        {
			$this->MyPanel->messenger($this->LanguageHandler->mem_add_err_taken, GATEWAY . '?a=members&amp;code=00');
        }
        
        $admin = false == isset($admin) ? 0 : (int) $admin;
        $mod   = false == isset($mod)   ? 0 : (int) $mod;

        $salt = $this->UserHandler->makeSalt();
        $auto = $this->UserHandler->makeAutoPass();

        $pass = md5(md5($salt) . md5($password));

    	$this->DatabaseHandler->query("
		INSERT INTO " . DB_PREFIX . "members(
			members_name, 
			members_class, 
			members_pass, 
            members_pass_salt,
            members_pass_auto,
			members_email, 
			members_registered, 
			members_lastaction,
            members_skin,
            members_language,
            members_admin_group,
            members_is_super_mod) 
		VALUES(
			'{$name}', 
            {$group}, 
			'{$pass}', 
            '{$salt}',
            '{$auto}',
			'{$email}', 
			'" . time() . "', 
			'" . time() . "',
            {$skin},
            '{$language}',
            {$admin},
            {$mod})");

		$this->config['latest_member_id']   = $this->DatabaseHandler->insertid();
		$this->config['latest_member_name'] = $this->ParseHandler->parseText(stripslashes($name), F_ENTS);
		$this->config['total_members']++;

		$this->_FileHandler->updateFileArray($this->config, 'config', SYSTEM_PATH . 'config/settings.php');

        if(isset($notify))
        {
            $this->LanguageHandler->loadFile('mail_stuff');

            $sent = date($this->config['date_short'], time());
            $who  = $this->config['title'];

            $message  = sprintf($this->LanguageHandler->mail_header, $who, $sent);
            
            $message .= sprintf($this->LanguageHandler->mail_admin_user, $name, 
                                $this->config['title'],                  $this->config['site_link'],     
                                $name, $password,                        $this->config['site_link'], GATEWAY);

            $message .= sprintf($this->LanguageHandler->mail_footer, $this->config['version']);

			$this->_MailHandler->setRecipient($email);
			$this->_MailHandler->setSubject($this->config['title'] . ': ' . $this->LanguageHandler->mem_add_notify);
			$this->_MailHandler->setMessage($message);
			$this->_MailHandler->doSend();            
        }

    	$this->MyPanel->messenger($this->LanguageHandler->mem_add_err_done, GATEWAY . '?a=members&amp;code=05&amp;id=' . $this->DatabaseHandler->insertId());
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
		$this->MyPanel->addHeader($this->LanguageHandler->mem_search_form_header);

		$this->MyPanel->appendBuffer("<form method=\"post\" action=\"" . GATEWAY . '?a=members&amp;code=03#results">');

			$this->MyPanel->table->addColumn($this->LanguageHandler->mem_search_tbl_field, "align='left'");
			$this->MyPanel->table->addColumn('&nbsp;');
			$this->MyPanel->table->addColumn($this->LanguageHandler->mem_search_tbl_term,  "align='left'");

			$this->MyPanel->table->startTable($this->LanguageHandler->mem_search_form_tbl_header);

				$this->MyPanel->table->addRow(array($this->LanguageHandler->mem_search_tbl_name,
										   $this->MyPanel->form->addSelect('name_type', $this->_comp1, false, false, false, true),
										   $this->MyPanel->form->addTextBox('name',     false, false, false, true)));

				$this->MyPanel->table->addRow(array($this->LanguageHandler->mem_search_tbl_ip,
										   $this->MyPanel->form->addSelect('ip_type', $this->_comp1, false, false, false, true),
										   $this->MyPanel->form->addTextBox('ip',     false, false, false, true)));

				$this->MyPanel->table->addRow(array($this->LanguageHandler->mem_search_tbl_mail,
										   $this->MyPanel->form->addSelect('email_type', $this->_comp1, false, false, false, true),
										   $this->MyPanel->form->addTextBox('email',     false, false, false, true)));


				$this->MyPanel->table->addRow(array($this->LanguageHandler->mem_search_tbl_post,
										   $this->MyPanel->form->addSelect('post_type', $this->_comp2, false, false, false, true),
										   $this->MyPanel->form->addTextBox('post',     false, false, false, true)));

                $post_from = $this->MyPanel->form->addSelect('from_day',   $this->TimeHandler->buildDays(),   false, false, false, true) . ' of ' .
                             $this->MyPanel->form->addSelect('from_month', $this->TimeHandler->buildMonths('F'), false, false, false, true) . ' in ' .
                             $this->MyPanel->form->addSelect('from_year',  $this->TimeHandler->buildYears(1900, date('Y', time()) + 10),   false, false, false, true);

                $post_to   = $this->MyPanel->form->addSelect('to_day',     $this->TimeHandler->buildDays(),   false, false, false, true) . ' of ' .
                             $this->MyPanel->form->addSelect('to_month',   $this->TimeHandler->buildMonths('F'), false, false, false, true) . ' in ' .
                             $this->MyPanel->form->addSelect('to_year',    $this->TimeHandler->buildYears(1900, date('Y', time()) + 10),   false, false, false, true);

				$this->MyPanel->table->addRow(array(array($this->LanguageHandler->mem_search_tbl_from, " valign='top'"), array($post_from, " align='right' colspan='2'")));
				$this->MyPanel->table->addRow(array(array($this->LanguageHandler->mem_search_tbl_to,   " valign='top'"), array($post_to,   " align='right' colspan='2'")));

				$this->MyPanel->table->addRow(array($this->LanguageHandler->mem_search_tbl_lang,
										   '&nbsp;',
										   $this->MyPanel->form->addSelect('language', $this->_fetchPacks(), false, false, false, true)));

				$this->MyPanel->table->addRow(array($this->LanguageHandler->mem_search_tbl_skin,
										   '&nbsp;',
										   $this->MyPanel->form->addSelect('skin', $this->_fetchSkins(), false, false, false, true)));

                $sql = $this->DatabaseHandler->query("SELECT class_id, class_title FROM " . DB_PREFIX . "class ORDER BY class_title ASC");

                $list   = array();
                $list[] = $this->LanguageHandler->mem_search_tbl_group_list;
                while($row = $sql->getRow())
                {
                    $list[$row['class_id']] = $row['class_title'];
                }

				$this->MyPanel->table->addRow(array($this->LanguageHandler->mem_search_tbl_group,
										   '&nbsp;',
										   $this->MyPanel->form->addSelect('group', $list, false, false, false, true)));

				$this->MyPanel->table->addRow(array($this->LanguageHandler->mem_search_tbl_admin,
										   '&nbsp;',
										   $this->MyPanel->form->addYesNo('admin', false, false, false, true, false)));

				$this->MyPanel->table->addRow(array($this->LanguageHandler->mem_search_tbl_mod,
										   '&nbsp;',
										   $this->MyPanel->form->addYesNo('mod', false, false, false, true, false)));

				$this->MyPanel->table->addRow(array($this->LanguageHandler->mem_search_tbl_coppa,
										   '&nbsp;',
										   $this->MyPanel->form->addYesNo('coppa', false, false, false, true, false)));

				$this->MyPanel->table->addRow(array($this->LanguageHandler->mem_search_tbl_ban,
										   '&nbsp;',
										   $this->MyPanel->form->addYesNo('ban', false, false, false, true, false)));

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
		$this->MyPanel->addHeader($this->LanguageHandler->mem_search_form_header);

        $pageQuery = '';

        if(true == $this->post)
        {
            foreach($this->post as $key => $val)
            {
                $this->post[$key] = trim($val);
                
                $pageQuery .= "{$key}=" . urlencode($val) . "&amp;";
            }
        }
        else
        {
            foreach($this->get as $key => $val)
            {
                $this->get[$key] = trim($val);
                
                $pageQuery .= "{$key}=" . urlencode($val) . "&amp;";
            }
        }

        $pageQuery = substr($pageQuery, 0, -1);

        extract($this->post);
        extract($this->get);

        $query = array();

        if(@$name)
        {
            switch($name_type)
            {
				case 'equal':
					$query[] = "AND m.members_name = '{$name}'";
					break;

				case 'contain':
					$query[] = "AND m.members_name LIKE '%{$name}%'";
					break;

				case 'begin':
					$query[] = "AND m.members_name LIKE '{$name}%'";
					break;

				case 'end':
					$query[] = "AND m.members_name LIKE '%{$name}'";
					break;
			}
        }

        if(@$ip)
        {
            switch($ip_type)
            {
				case 'equal':
					$query[] = "AND m.members_ip = '{$ip}'";
					break;

				case 'contain':
					$query[] = "AND m.members_ip LIKE '%{$ip}%'";
					break;

				case 'begin':
					$query[] = "AND m.members_ip LIKE '{$ip}%'";
					break;

				case 'end':
					$query[] = "AND m.members_ip LIKE '%{$ip}'";
					break;
			}
        }

        if(@$email)
        {
            switch($email_type)
            {
				case 'equal':
					$query[] = "AND m.members_email = '{$email}'";
					break;

				case 'contain':
					$query[] = "AND m.members_email LIKE '%{$email}%'";
					break;

				case 'begin':
					$query[] = "AND m.members_email LIKE '{$email}%'";
					break;

				case 'end':
					$query[] = "AND m.members_email LIKE '%{$email}'";
					break;
			}
        }
        
        if(@$post)
        {
            switch($post_type)
            {
				case 'equal':
					$query[] = "AND m.members_posts = {$post}";
					break;
				case 'greater':

					$query[] = "AND m.members_posts > {$post}";
					break;

				case 'lesser':
					$query[] = "AND m.members_posts < {$post}";
					break;

				case 'lessequal':
					$query[] = "AND m.members_posts <= {$post}";
					break;

				case 'greatequal':
					$query[] = "AND m.members_posts >= {$post}";
					break;
			}
        }

		if(@$from_month && @$from_day && @$from_year)
        {
            $from_stamp = mktime(0, 0, 0, $from_month, $from_day, $from_year);
            $query[]    = "AND m.members_registered  > {$from_stamp}";
        }

		if(@$to_month && @$to_day && @$to_year)
        {
            $to_stamp = mktime(0, 0, 0, $from_month, $from_day, $from_year);
            $query[]    = "AND m.members_registered  < {$to_stamp}";
        }

        if(@$skin)     $query[] = "AND m.members_skin         =  {$skin}";
        if(@$language) $query[] = "AND m.members_language     =  '{$language}'";
        if(@$group)    $query[] = "AND m.members_class        =  {$group}";
        if(@$admin)    $query[] = "AND m.members_admin_group  <> 0";
        if(@$mod)      $query[] = "AND m.members_is_super_mod =  {$mod}";
        if(@$coppa)    $query[] = "AND m.members_coppa        =  {$coppa}";
        if(@$ban)      $query[] = "AND m.members_is_banned    =  {$ban}";

        if(false == $query)
        {
            $this->MyPanel->messenger($this->LanguageHandler->mem_search_err_no_fields, GATEWAY . '?a=members&amp;code=02');
        }

        $query = substr(implode(" \n", $query), 4);

        $query = "
        SELECT 
            m.members_id,
            m.members_name,
            m.members_registered,
            m.members_posts
        FROM " . DB_PREFIX . "members m
            LEFT JOIN " . DB_PREFIX . "class c ON c.class_id = m.members_class
        WHERE {$query} AND m.members_id <> 1
        ORDER BY m.members_id";

		$sql = $this->DatabaseHandler->query($query);

        $num = $sql->getNumRows();

        if(false == $num)
        {
            $this->MyPanel->messenger($this->LanguageHandler->mem_search_err_no_results, GATEWAY . '?a=members&amp;code=02');
        }

		$this->_PageHandler->setRows($num);
		$this->_PageHandler->doPages(GATEWAY . "?a=members&amp;code=03&amp;{$pageQuery}");        

		$sql = $this->_PageHandler->getData($query);

		$this->MyPanel->appendBuffer("<a name='results'></a>");

        $this->MyPanel->table->addColumn($this->LanguageHandler->mem_search_tbl_id,     "align='center' width='1%'");
        $this->MyPanel->table->addColumn($this->LanguageHandler->mem_search_tbl_name,   "align='left'");
        $this->MyPanel->table->addColumn($this->LanguageHandler->mem_search_tbl_joined, "align='center'");
        $this->MyPanel->table->addColumn($this->LanguageHandler->mem_search_tbl_posts,  "align='center'");
        $this->MyPanel->table->addColumn('&nbsp;', ' width="10%"');

		$this->MyPanel->appendBuffer("<div id=\"bar\">" . $this->_PageHandler->getSpan() . "</div>");     

        $this->MyPanel->table->startTable(number_format($num) . ' ' .$this->LanguageHandler->mem_search_tbl_header);

        while($row = $sql->getRow())
        {
            $this->MyPanel->table->addRow(array(array("<strong>{$row['members_id']}</strong>", ' align="center"', 'headera'),
                                                 array("<a href=\"" . GATEWAY . "?a=members&amp;code=05&amp;id={$row['members_id']}\">{$row['members_name']}</a>", 'headerb'),
                                                 array(date($this->config['date_short'], $row['members_registered']), " align=\"center\"", 'headerb'),
                                                 array($row['members_posts'], 'align="center"'),
                                                 array("<a href=\"" . GATEWAY . "?a=members&amp;code=05&amp;id={$row['members_id']}\">{$this->LanguageHandler->link_edit}</a> " . 
                                                       "<a href=\"" . GATEWAY . "?a=members&amp;code=04&amp;id={$row['members_id']}\" onclick='return confirm(\"{$this->LanguageHandler->mem_search_err_confirm}\");'>{$this->LanguageHandler->link_delete}</a>", " align='center'", 'headerc')));
        }

        $this->MyPanel->table->endTable();
        $this->MyPanel->appendBuffer($this->MyPanel->table->flushBuffer());

		$this->MyPanel->appendBuffer("<div id=\"bar\">" . $this->_PageHandler->getSpan() . "</div>");       
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
    function _doDelete()
    {
        $sql = $this->DatabaseHandler->query("
        SELECT 
            members_id,
            members_name, 
            members_class, 
            members_admin_group 
        FROM " . DB_PREFIX . "members 
        WHERE members_id = {$this->_id}");

        $row = $sql->getRow();

        if($row['members_id'] == 2)
        {
            $this->MyPanel->messenger($this->LanguageHandler->mem_rem_err_admin, GATEWAY . '?a=members&amp;code=02');
        }

        $this->DatabaseHandler->query("UPDATE " . DB_PREFIX . "posts  SET posts_author       = 1, posts_author_name       = '{$row['members_name']}' WHERE posts_author       = {$this->_id}");
        $this->DatabaseHandler->query("UPDATE " . DB_PREFIX . "topics SET topics_author      = 1, topics_author_name      = '{$row['members_name']}' WHERE topics_author      = {$this->_id}");
        $this->DatabaseHandler->query("UPDATE " . DB_PREFIX . "topics SET topics_last_poster = 1, topics_last_poster_name = '{$row['members_name']}' WHERE topics_last_poster = {$this->_id}");

        $this->DatabaseHandler->query("DELETE FROM " . DB_PREFIX . "notes       WHERE notes_recipient = {$this->_id}");
        $this->DatabaseHandler->query("DELETE FROM " . DB_PREFIX . "tracker     WHERE track_user      = {$this->_id}");
        $this->DatabaseHandler->query("DELETE FROM " . DB_PREFIX . "members     WHERE members_id      = {$this->_id}");
        $this->DatabaseHandler->query("DELETE FROM " . DB_PREFIX . "admins      WHERE admin_id        = {$this->_id}");
        $this->DatabaseHandler->query("DELETE FROM " . DB_PREFIX . "moderators  WHERE mod_user_id     = {$this->_id}");

        $sql = $this->DatabaseHandler->query("SELECT members_id, members_name FROM " . DB_PREFIX . "members ORDER BY members_id DESC LIMIT 0, 1");
        $row = $sql->getRow();

        $this->config['latest_member_id']   = $row['members_id'];
        $this->config['latest_member_name'] = $row['members_name'];
        $this->config['total_members']--;

        $this->_FileHandler->updateFileArray($this->config, 'config', SYSTEM_PATH . 'config/settings.php');

        if(isset($this->get['where']))
        {
            $this->LanguageHandler->loadFile('mail_stuff');

            $sent = date($this->config['date_short'], time());
            $who  = $this->config['title'];
            $name = $row['members_name'];

            $message  = sprintf($this->LanguageHandler->mail_header, $who, $sent);
            
            $message .= sprintf($this->LanguageHandler->mail_user_reject_notify, $name, 
                                $this->config['title'],                          $this->config['site_link']);

            $message .= sprintf($this->LanguageHandler->mail_footer, $this->config['version']);

			$this->_MailHandler->setRecipient($row['members_email']);
			$this->_MailHandler->setSubject($this->config['title'] . ': ' . $this->LanguageHandler->mem_add_notify);
			$this->_MailHandler->setMessage($message);
			$this->_MailHandler->doSend();

            if($this->get['where'] == 'normal')
            {
                $this->MyPanel->messenger($this->LanguageHandler->mem_rem_err_gone, GATEWAY . '?a=queue');
            }
            else {
                $this->MyPanel->messenger($this->LanguageHandler->mem_rem_err_gone, GATEWAY . '?a=queue&code=02');
            }
        }

        $this->MyPanel->messenger($this->LanguageHandler->mem_rem_err_gone, GATEWAY . '?a=members&amp;code=02');
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
    function _editGeneral()
    {
        $sql = $this->DatabaseHandler->query("SELECT * FROM " . DB_PREFIX . "members WHERE members_id = {$this->_id}");

        if(false == $sql->getNumRows())
        {
            $this->MyPanel->messenger($this->LanguageHandler->mem_gen_err_no_results, GATEWAY . '?a=members&amp;code=02');
        }

        $row = $sql->getRow();

        if($row['members_id'] == 2 && $row['members_id'] != USER_ID)
        {
            $this->MyPanel->messenger($this->LanguageHandler->mem_gen_err_admin, GATEWAY . '?a=members&amp;code=02');
        }

        $this->MyPanel->appendBuffer("
        <script type=\"text/javascript\">

        function warnBan(isMsg)
        {
            if(document.form.ban.checked)
            {
                return confirm('{$this->LanguageHandler->mem_gen_ban_confirm}');
            }

            return true;
        }

        </script>");

		$this->MyPanel->addHeader(sprintf($this->LanguageHandler->mem_gen_form_header, $row['members_name']));

		$this->MyPanel->form->startForm(GATEWAY . "?a=members&amp;code=06&amp;id={$row['members_id']}", 'form', 'POST', "onsubmit=\"javascript: return warnBan();\"");
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

			$this->MyPanel->form->addTextBox('name', $row['members_name'], false, 
									array(1, $this->LanguageHandler->mem_gen_form_name_title, 
                                             $this->LanguageHandler->mem_gen_form_name_desc));

			$this->MyPanel->form->addCheckBox('name_notify', 1, false, false,
								            false, false,$this->LanguageHandler->mem_gen_name_notify_title, '', 'checkwrap_4');

            $sql = $this->DatabaseHandler->query("SELECT class_id, class_title FROM " . DB_PREFIX . "class ORDER BY class_title ASC");

            $list   = array();
            while($result = $sql->getRow())
            {
                $list[$result['class_id']] = $result['class_title'];
            }

            $this->MyPanel->form->addWrapSelect('group', $list, $row['members_class'], false, 
                                   array(1, $this->LanguageHandler->mem_gen_form_class_title, 
                                            $this->LanguageHandler->mem_gen_form_class_desc));

            $sql = $this->DatabaseHandler->query("SELECT admin_id, admin_title FROM " . DB_PREFIX . "admins ORDER BY admin_title ASC");

            $list   = array(0 => $this->LanguageHandler->mem_gen_form_admin_deny);
            while($result = $sql->getRow())
            {
                $list[$result['admin_id']] = $result['admin_title'];
            }

            $this->MyPanel->form->addWrapSelect('admin_group', $list, $row['members_admin_group'], false, 
                                   array(1, $this->LanguageHandler->mem_gen_form_admin_title, 
                                            $this->LanguageHandler->mem_gen_form_admin_desc));

            $this->MyPanel->form->appendBuffer("<h1>{$this->LanguageHandler->mem_add_form_options}</h1>");

			$this->MyPanel->form->addCheckBox('admin', 1, false, false,
								            false, ($row['members_admin_group'] ? true : false),$this->LanguageHandler->mem_add_form_admin_desc);

			$this->MyPanel->form->addCheckBox('mod', 1, false, false,
								            false, ($row['members_is_super_mod'] ? true : false),$this->LanguageHandler->mem_add_form_mod_desc);

			$this->MyPanel->form->addCheckBox('notify', 1, false, false,
								            false, ($row['members_noteNotify'] ? true : false),$this->LanguageHandler->mem_gen_form_notify_desc);

			$this->MyPanel->form->addCheckBox('email', 1, false, false,
								            false, ($row['members_show_email'] ? true : false),$this->LanguageHandler->mem_gen_form_email_desc);

            if($this->_id != 2)
            {
                if(false == $row['members_is_banned'])
                {
                    $this->MyPanel->form->addCheckBox('ban', 1, false, false, false, 
                                                       ($row['members_is_banned'] ? true : false),$this->LanguageHandler->mem_gen_form_banned, ' id="ban"', 'checkwrap_4');
                }
            }

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
    function _doEditGeneral()
    {
        if($this->_hash != $this->UserHandler->getUserhash())
        {
            $this->MyPanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
        }

        extract($this->post);

        if($this->_id == 2 && USER_ID != 2)
        {
            $this->MyPanel->messenger($this->LanguageHandler->mem_gen_err_admin, GATEWAY . '?a=members&amp;code=02');
        }

        $sql = $this->DatabaseHandler->query("SELECT members_name, members_email FROM " . DB_PREFIX . "members WHERE members_id = {$this->_id}");

        if(false == $sql->getNumRows())
        {
            $this->MyPanel->messenger($this->LanguageHandler->mem_gen_err_no_match, GATEWAY . '?a=members&amp;code=02');
        }

        $member       = $sql->getRow();
        $name_changed = false;

        if(trim($name) != $member['members_name'])
        {
            $name_changed = true;
        }

        if($name_changed)
        {
            $len_user = preg_replace("/&(#)([0-9a-z]+);/", '_', $name);
            $name     = preg_replace("/\s{2,}/",      ' ', $name);

            $sql = $this->DatabaseHandler->query("
            SELECT members_id 
            FROM " . DB_PREFIX . "members 
            WHERE members_name = '{$name}'", 
            __FILE__, __LINE__);

            if($sql->getNumRows())
            {
                $this->MyPanel->messenger($this->LanguageHandler->mem_gen_err_name_taken, GATEWAY . "?a=members&amp;id={$this->_id}&amp;code=05");
            }

            if(strlen($len_user) < 3)
            {
                $this->MyPanel->messenger($this->LanguageHandler->mem_gen_err_name_short, GATEWAY . "?a=members&amp;id={$this->_id}&amp;code=05");
            }
            
            if(strlen($len_user) > 32)
            {
                $this->MyPanel->messenger($this->LanguageHandler->mem_gen_err_name_long, GATEWAY . "?a=members&amp;id={$this->_id}&amp;code=05");
            }

            if($this->config['banned_names'])
            {
                foreach(explode('|', strtolower($this->config['banned_names'])) as $names)
                {
                    if($names == strtolower($name))
                    {
                        $this->MyPanel->messenger($this->LanguageHandler->mem_gen_err_name_bad, GATEWAY . "?a=members&amp;id={$this->_id}&amp;code=05");
                    }
                }
            }
            
            $this->DatabaseHandler->query("UPDATE " . DB_PREFIX ."members SET members_name = '{$name}' WHERE members_id = {$this->_id}");

            $sql = $this->DatabaseHandler->query("UPDATE " . DB_PREFIX . "topics SET topics_last_poster_name = '{$name}' WHERE topics_last_poster = {$this->_id}");
            $sql = $this->DatabaseHandler->query("UPDATE " . DB_PREFIX . "posts  SET posts_author_name       = '{$name}' WHERE posts_author       = {$this->_id}");

            $this->ForumHandler->updateForumStats();
            $this->CacheHandler->updateCache('forums');

            if($name_notify)
            {
                $this->LanguageHandler->loadFile('mail_stuff');

                $sent = date($this->config['date_short'], time());
                $who  = $this->config['title'];

                $message  = sprintf($this->LanguageHandler->mail_header, $who, $sent);

                $message .= sprintf($this->LanguageHandler->mail_admin_user_name, $member['members_name'], 
                                    $this->config['title'],                       $this->config['site_link'], 
                                    $name, $this->config['site_link'], GATEWAY);

                $message .= sprintf($this->LanguageHandler->mail_footer, $this->config['version']);

                $this->_MailHandler->setRecipient($member['members_email']);
                $this->_MailHandler->setSubject($this->config['title'] . ': ' . $this->LanguageHandler->mem_gen_name_notify);
                $this->_MailHandler->setMessage($message);
                $this->_MailHandler->doSend();
            }
        }

        if($this->_id == 2)
        {
            $admin_group = 1;
        }

        $this->DatabaseHandler->query("
        UPDATE " . DB_PREFIX . "members SET 
            members_class        = " . (false == isset($group)  ? 2 : (int) $group)  . ", 
            members_admin_group  = " . (false == isset($admin_group)  ? 0 : (int) $admin_group)  . ", 
            members_is_super_mod = " . (false == isset($mod)    ? 0 : (int) $mod)    . ", 
            members_show_email   = " . (false == isset($email)  ? 0 : (int) $email)  . ", 
            members_noteNotify   = " . (false == isset($notify) ? 0 : (int) $notify) . " 
        WHERE members_id = {$this->_id}");

        if(isset($ban))
        {
            $this->MyPanel->messenger($this->LanguageHandler->mem_gen_err_done_ban, GATEWAY . "?a=members&id={$this->_id}&code=13");
        }

        $this->MyPanel->messenger($this->LanguageHandler->mem_gen_err_done, GATEWAY . "?a=members&id={$this->_id}&code=05");
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
    function _quickBan()
    {
        extract($this->post);

        if($this->_id == 2)
        {
            header("LOCATION: " . GATEWAY . "?a=members&id={$this->_id}&code=05");
        }

        $sql = $this->DatabaseHandler->query("SELECT members_name, members_email FROM " . DB_PREFIX . "members WHERE members_id = {$this->_id}");

        if(false == $sql->getNumRows())
        {
            $this->MyPanel->messenger($this->LanguageHandler->mem_gen_err_no_match, GATEWAY . '?a=members&amp;code=02');
        }

        $row = $sql->getRow();

		$this->MyPanel->addHeader(sprintf($this->LanguageHandler->mem_gen_ban_title, $row['members_name']));

		$this->MyPanel->form->startForm(GATEWAY . "?a=members&amp;code=14&amp;id={$this->_id}");
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

            $post_from = $this->MyPanel->form->addSelect('day',   $this->TimeHandler->buildDays(),          false, false, false, true) . ' of ' .
                         $this->MyPanel->form->addSelect('month', $this->TimeHandler->buildMonths('F'),     false, false, false, true) . ' in ' .
                         $this->MyPanel->form->addSelect('year',  $this->TimeHandler->buildYears(date('Y'), date('Y') + 50),     false, false, false, true);

            $this->MyPanel->form->addWrap("<div class=\"checkwrap\">{$this->LanguageHandler->mem_gen_ban_until} {$post_from}</div>", 
                                           $this->LanguageHandler->mem_gen_ban_temp_title, 
                                           $this->LanguageHandler->mem_gen_ban_temp_desc, true);

            $this->MyPanel->form->appendBuffer("<h1>{$this->LanguageHandler->mem_gen_form_ban_ip_title}</h1>");

			$this->MyPanel->form->addRadio('ip', 1, ' checked="checked"', $this->LanguageHandler->mem_gen_form_ban_no_ip);
			$this->MyPanel->form->addRadio('ip', 2, false, $this->LanguageHandler->mem_gen_form_ban_latest_ip);
			$this->MyPanel->form->addRadio('ip', 3, false, $this->LanguageHandler->mem_gen_form_ban_all_ip);

            $this->MyPanel->form->appendBuffer("<h1>{$this->LanguageHandler->mem_gen_form_ban_other}</h1>");

			$this->MyPanel->form->addCheckBox('email', 1, false, false,
								            false, false, $this->LanguageHandler->mem_gen_form_ban_email);

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
    function _doQuickBan()
    {
        extract($this->post);

        if($this->_id == 2)
        {
            $this->MyPanel->messenger($this->LanguageHandler->mem_gen_err_admin, GATEWAY . "?a=members&id={$this->_id}&code=05");
        }

        $sql = $this->DatabaseHandler->query("SELECT members_name, members_email, members_ip FROM " . DB_PREFIX . "members WHERE members_id = {$this->_id}");

        if(false == $sql->getNumRows())
        {
            $this->MyPanel->messenger($this->LanguageHandler->mem_gen_err_no_match, GATEWAY . '?a=members&amp;code=02');
        }

        $member   = $sql->getRow();
        $temp_ban = '0';

        if($month || $day || $year)
        {
            if(false == @checkdate($month, $day, $year))
            {
                $this->MyPanel->messenger($this->LanguageHandler->mem_gen_err_temp_bad, GATEWAY . "?a=members&id={$this->_id}&code=05");
            }

            if(mktime(0, 0, 0, $month, $day, $year) < time())
            {
                $this->MyPanel->messenger($this->LanguageHandler->mem_gen_err_temp_small, GATEWAY . "?a=members&id={$this->_id}&code=05");
            }

            $temp_ban = mktime(0, 0, 0, $month, $day, $year);
        }

        switch($ip)
        {
            case 1: // Do nothing with IP

                $banned_ips = '';
                break;

            case 2:

                $banned_ips = $member['members_ip'];
                break;

            case 3:

                $sql_posts  = $this->DatabaseHandler->query("SELECT posts_ip FROM " . DB_PREFIX . "posts  WHERE posts_author = {$this->_id}");
                $sql_events = $this->DatabaseHandler->query("SELECT event_ip FROM " . DB_PREFIX . "events WHERE event_user   = {$this->_id}");
                $sql_notes  = $this->DatabaseHandler->query("SELECT notes_ip FROM " . DB_PREFIX . "notes  WHERE notes_sender = {$this->_id}");

                $banned_ips   = array();
                $banned_ips[] = $member['members_ip'];

                while($row = $sql_posts->getRow()) { $banned_ips[] = $row['posts_ip']; }
                while($row = $sql_events->getRow()){ $banned_ips[] = $row['event_ip']; }
                while($row = $sql_notes->getRow()) { $banned_ips[] = $row['notes_ip']; }

                break;
        }

        if($ip != 1)
        {
            $conf_banned_ips = explode('|', $this->config['banned_ips']);
            $banned_ips      = array_merge($conf_banned_ips, $banned_ips);

            $banned_ips = array_unique($banned_ips);
            $clean_ips  = array();

            foreach($banned_ips as $val)
            {
                if($val)
                {
                    $clean_ips[] = trim($val);
                }
            }

            $clean_ips = implode('|', array_unique($clean_ips));

            $this->config['banned_ips'] = $clean_ips;
        }

        if($email)
        {
            $conf_banned_emails   = explode('|', $this->config['banned_emails']);
            $conf_banned_emails[] = $member['members_email'];

            $conf_banned_emails = array_unique($conf_banned_emails);
            $clean_emails       = array();

            foreach($conf_banned_emails as $val)
            {
                if($val)
                {
                    $clean_emails[] = $val;
                }
            }

            $clean_emails = implode('|', $clean_emails);

            $this->config['banned_emails'] = $clean_emails;
        }

        $this->_FileHandler->updateFileArray($this->config, 'config', '../config/settings.php');

        $this->DatabaseHandler->query("
        UPDATE " . DB_PREFIX . "members SET 
            members_is_banned = 1, 
            members_temp_ban  = {$temp_ban} 
        WHERE members_id      = {$this->_id}");

        $this->MyPanel->messenger($this->LanguageHandler->mem_gen_err_ban_done, GATEWAY . "?a=members&id={$this->_id}&code=05");
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
    function _editPersonal()
    {
        $sql = $this->DatabaseHandler->query("SELECT * FROM " . DB_PREFIX . "members WHERE members_id = {$this->_id}");

        if(false == $sql->getNumRows())
        {
            $this->MyPanel->messenger($this->LanguageHandler->mem_per_err_no_results, GATEWAY . '?a=members&amp;code=02');
        }

        $row = $sql->getRow();

        if($row['members_id'] == 2 && $row['members_id'] != USER_ID)
        {
            $this->MyPanel->messenger($this->LanguageHandler->mem_per_err_no_admin, GATEWAY . '?a=members&amp;code=02');
        }

		$this->MyPanel->addHeader(sprintf($this->LanguageHandler->mem_per_form_header, $row['members_name']));

        $row['members_sig'] = $this->ParseHandler->doFormatEditImage($row['members_sig']);		

		$this->MyPanel->form->startForm(GATEWAY . "?a=members&amp;code=08&amp;id={$row['members_id']}");
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

			$this->MyPanel->form->addTextBox('location', $this->ParseHandler->parseText($row['members_location'], F_ENTS), false, 
									array(1, $this->LanguageHandler->mem_per_form_loc_title, 
                                             $this->LanguageHandler->mem_per_form_loc_desc));

			$this->MyPanel->form->addTextBox('icq', $this->ParseHandler->parseText($row['members_icq'], F_ENTS), false, 
									array(1, $this->LanguageHandler->mem_per_form_icq_title,
                                             $this->LanguageHandler->mem_per_form_icq_desc));

			$this->MyPanel->form->addTextBox('msn', $this->ParseHandler->parseText($row['members_msn'], F_ENTS), false, 
									array(1, $this->LanguageHandler->mem_per_form_msn_title,
                                             $this->LanguageHandler->mem_per_form_msn_desc));

			$this->MyPanel->form->addTextBox('aim', $this->ParseHandler->parseText($row['members_aim'], F_ENTS), false, 
									array(1, $this->LanguageHandler->mem_per_form_aim_title,
                                             $this->LanguageHandler->mem_per_form_aim_desc));

			$this->MyPanel->form->addTextBox('yim', $this->ParseHandler->parseText($row['members_yim'], F_ENTS), false, 
									array(1, $this->LanguageHandler->mem_per_form_yim_title,
                                             $this->LanguageHandler->mem_per_form_yim_desc));

			$this->MyPanel->form->addTextBox('website', $this->ParseHandler->parseText($row['members_homepage'], F_ENTS), false, 
									array(1, $this->LanguageHandler->mem_per_form_home_title,
                                             $this->LanguageHandler->mem_per_form_home_desc));

			$this->MyPanel->form->addTextArea('sig', $this->ParseHandler->parseText($row['members_sig'], F_ENTS), false, 
									array(1, $this->LanguageHandler->mem_per_form_sig_title,
                                             $this->LanguageHandler->mem_per_form_sig_desc));

            $this->MyPanel->form->addWrapSelect('skin', $this->_fetchSkins(false), $row['members_skin'], false, 
                                   array(1, $this->LanguageHandler->mem_per_form_skin_title,
                                            $this->LanguageHandler->mem_per_form_skin_desc));

            $this->MyPanel->form->addWrapSelect('language', $this->_fetchPacks(false), $row['members_language'], false, 
                                   array(1, $this->LanguageHandler->mem_per_form_lang_title,
                                            $this->LanguageHandler->mem_per_form_lang_desc));

			$this->MyPanel->form->addWrapSelect('timezone', $this->TimeHandler->makeTimeZones(), $row['members_timeZone'], '',
								   array(1, $this->LanguageHandler->mem_per_form_zone_title,
                                            $this->LanguageHandler->mem_per_form_zone_desc));

            $types = array(2 => $this->LanguageHandler->mem_per_ava_type_url,
                           3 => $this->LanguageHandler->mem_per_ava_type_upload,
                           1 => $this->LanguageHandler->mem_per_ava_type_gallery);

			$this->MyPanel->form->addWrapSelect('ava_type', $types, $row['members_avatar_type'], '',
								   array(1, $this->LanguageHandler->mem_per_form_ava_type_title,
                                            $this->LanguageHandler->mem_per_form_ava_type_desc));

			$this->MyPanel->form->addTextBox('ava_dims', $this->ParseHandler->parseText($row['members_avatar_dims'], F_ENTS), false, 
									array(1, $this->LanguageHandler->mem_per_form_ava_dim_title,
                                             $this->LanguageHandler->mem_per_form_ava_dim_desc));

			$this->MyPanel->form->addTextBox('ava_location', $this->ParseHandler->parseText($row['members_avatar_location'], F_ENTS), false, 
									array(1, $this->LanguageHandler->mem_per_form_ava_loc_title,
                                             $this->LanguageHandler->mem_per_form_ava_loc_desc));

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
    function _doEditPersonal()
    {
        if($this->_hash != $this->UserHandler->getUserhash())
        {
            $this->MyPanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
        }

        extract($this->post);

        $sql = $this->DatabaseHandler->query("SELECT * FROM " . DB_PREFIX . "members WHERE members_id = {$this->_id}");

        if(false == $sql->getNumRows())
        {
            $this->MyPanel->messenger($this->LanguageHandler->mem_per_err_no_results, GATEWAY . '?a=members&amp;code=02');
        }

        $row = $sql->getRow();

        if($row['members_id'] == 2 && USER_ID != 2)
        {
            $this->MyPanel->messenger($this->LanguageHandler->mem_per_err_no_admin, GATEWAY . '?a=members&amp;code=02');
        }

        if($icq && false == is_numeric($icq) && false == intval($icq))
        {
            $this->MyPanel->messenger($this->LanguageHandler->mem_per_err_bad_icq, GATEWAY . "?a=members&amp;id={$this->_id}&amp;code=07");
        }

        $sig = $this->ParseHandler->prePostImage($sig);

        if(substr_count($ava_dims, 'x') > 1)
        {
            $this->MyPanel->messenger($this->LanguageHandler->mem_per_err_bad_dims, GATEWAY . "?a=members&amp;id={$this->_id}&amp;code=07");
        }

		if($website && false == preg_match("#^http://#", $website))
        {
			$website = "http://" . $website;
        }

        $this->DatabaseHandler->query("
        UPDATE " . DB_PREFIX . "members SET 
            members_location        = '{$location}',
            members_icq             = '{$icq}',
            members_msn             = '{$msn}',
            members_aim             = '{$aim}',
            members_yim             = '{$yim}',
            members_sig             = '{$sig}',
            members_skin            = '{$skin}',
            members_language        = '{$language}',
            members_timeZone        = '{$timezone}',
            members_homepage        = '{$website}',
            members_avatar_dims     = '{$ava_dims}',
            members_avatar_location = '{$ava_location}',
            members_avatar_type     = " . (int) $ava_type . "
        WHERE members_id = {$this->_id}");

        $this->MyPanel->messenger($this->LanguageHandler->mem_gen_err_done, GATEWAY . "?a=members&amp;id={$this->_id}&amp;code=07");
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
    function _editEmail()
    {
        $this->MyPanel->tabs->addTabs($this->_tabList, $this->_code);

        $sql = $this->DatabaseHandler->query("SELECT * FROM " . DB_PREFIX . "members WHERE members_id = {$this->_id}");

        if(false == $sql->getNumRows())
        {
            $this->MyPanel->messenger($this->LanguageHandler->mem_per_err_no_results, GATEWAY . '?a=members&amp;code=02');
        }

        $row = $sql->getRow();

        if($row['members_id'] == 2 && $row['members_id'] != USER_ID)
        {
            $this->MyPanel->messenger($this->LanguageHandler->mem_per_err_no_admin, GATEWAY . '?a=members&amp;code=02');
        }

		$this->MyPanel->addHeader(sprintf($this->LanguageHandler->mem_per_form_header, $row['members_name']));

   		

		$this->MyPanel->form->startForm(GATEWAY . "?a=members&amp;code=10&amp;id={$row['members_id']}");
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

			$this->MyPanel->form->addTextBox('email', $row['members_email'], false, 
									array(1, $this->LanguageHandler->mem_mail_form_email_title,
                                             $this->LanguageHandler->mem_mail_form_email_desc));

			$this->MyPanel->form->addTextBox('cemail', $row['members_email'], false, 
									array(1, $this->LanguageHandler->mem_mail_form_cmail_title,
                                             $this->LanguageHandler->mem_mail_form_cmail_desc));

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
    function _doEditEmail()
    {
        if($this->_hash != $this->UserHandler->getUserhash())
        {
            $this->MyPanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
        }

        extract($this->post);

        $sql = $this->DatabaseHandler->query("SELECT * FROM " . DB_PREFIX . "members WHERE members_id = {$this->_id}");

        if(false == $sql->getNumRows())
        {
            $this->MyPanel->messenger($this->LanguageHandler->mem_per_err_no_results, GATEWAY . '?a=members&amp;code=02');
        }

        $row = $sql->getRow();

        if($row['members_id'] == 2 && USER_ID != 2)
        {
            $this->MyPanel->messenger($this->LanguageHandler->mem_per_err_no_admin, GATEWAY . '?a=members&amp;code=02');
        }

        if($email != $cemail)
        {
			$this->MyPanel->messenger($this->LanguageHandler->mem_mail_err_confirm, GATEWAY . "?a=members&amp;id={$this->_id}&amp;code=09");
        }

		if(false == preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*$/i", $email))
        {
			$this->MyPanel->messenger($this->LanguageHandler->mem_mail_err_invalid, GATEWAY . "?a=members&amp;id={$this->_id}&amp;code=09");
        }

        $this->DatabaseHandler->query("UPDATE " . DB_PREFIX . "members SET members_email = '{$email}' WHERE members_id = {$this->_id}");

        $this->MyPanel->messenger($this->LanguageHandler->mem_gen_err_done, GATEWAY . "?a=members&amp;id={$this->_id}&amp;code=09");
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
    function _editPassword()
    {
        $this->MyPanel->tabs->addTabs($this->_tabList, $this->_code);

        $sql = $this->DatabaseHandler->query("SELECT * FROM " . DB_PREFIX . "members WHERE members_id = {$this->_id}");

        if(false == $sql->getNumRows())
        {
            $this->MyPanel->messenger($this->LanguageHandler->mem_per_err_no_results, GATEWAY . '?a=members&amp;code=02');
        }

        $row = $sql->getRow();

        if($row['members_id'] == 2 && $row['members_id'] != USER_ID)
        {
            $this->MyPanel->messenger($this->LanguageHandler->mem_per_err_no_admin, GATEWAY . '?a=members&amp;code=02');
        }

		$this->MyPanel->addHeader(sprintf($this->LanguageHandler->mem_per_form_header, $row['members_name']));

		

		$this->MyPanel->form->startForm(GATEWAY . "?a=members&amp;code=12&amp;id={$row['members_id']}");
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

			$this->MyPanel->form->addPassBox('password', false, false, 
									array(1, $this->LanguageHandler->mem_pass_form_pass_title,
                                             $this->LanguageHandler->mem_pass_form_pass_desc));

			$this->MyPanel->form->addPassBox('cpassword', false, false, 
									array(1, $this->LanguageHandler->mem_pass_form_cpass_title,
                                             $this->LanguageHandler->mem_pass_form_cpass_desc));

            $this->MyPanel->form->appendBuffer("<h1>{$this->LanguageHandler->mem_add_form_options}</h1>");
            
            $this->MyPanel->form->addCheckBox('notify', 1, false, false,
								            false, false, $this->LanguageHandler->mem_pass_form_notify_desc);

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
    function _doEditPassword()
    {
        if($this->_hash != $this->UserHandler->getUserhash())
        {
            $this->MyPanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
        }

        extract($this->post);

        $sql = $this->DatabaseHandler->query("
        SELECT * 
        FROM " . DB_PREFIX . "members 
        WHERE members_id = {$this->_id}");

        if(false == $sql->getNumRows())
        {
            $this->MyPanel->messenger($this->LanguageHandler->mem_per_err_no_results, GATEWAY . '?a=members&amp;code=02');
        }

        $row = $sql->getRow();

        if($row['members_id'] == 2 && USER_ID != 2)
        {
            $this->MyPanel->messenger($this->LanguageHandler->mem_per_err_no_admin, GATEWAY . '?a=members&amp;code=02');
        }

        if(false == $password)
        {
            $this->MyPanel->messenger($this->LanguageHandler->mem_pass_err_invalid, GATEWAY . "?a=members&amp;id={$this->_id}&amp;code=11");
        }

        if($password != $cpassword)
        {
            $this->MyPanel->messenger($this->LanguageHandler->mem_pass_err_confirm, GATEWAY . "?a=members&amp;id={$this->_id}&amp;code=11");
        }

        $salt = $row['members_pass_salt'];
        $pass = md5(md5($row['members_pass_salt']) . md5($password));
        $auto = $this->UserHandler->makeAutoPass();

        $this->DatabaseHandler->query("
        UPDATE " . DB_PREFIX . "members SET 
            members_pass      = '{$pass}',
            members_pass_auto = '{$auto}'
        WHERE members_id = {$this->_id}");

        if(isset($notify))
        {
            $this->LanguageHandler->loadFile('mail_stuff');

            $sent = date($this->config['date_short'], time());
            $who  = $this->config['title'];
            $name = $row['members_name'];

            $message  = sprintf($this->LanguageHandler->mail_header, $who, $sent);
            
            $message .= sprintf($this->LanguageHandler->mail_admin_user, $name, 
                                $this->config['title'],                  $this->config['site_link'],     
                                $name, $password,                        $this->config['site_link'], GATEWAY);

            $message .= sprintf($this->LanguageHandler->mail_footer, $this->config['version']);

			$this->_MailHandler->setRecipient($row['members_email']);
			$this->_MailHandler->setSubject($this->config['title'] . ': ' . $this->LanguageHandler->mem_add_notify);
			$this->_MailHandler->setMessage($message);
			$this->_MailHandler->doSend();
        }

        $this->MyPanel->messenger($this->LanguageHandler->mem_gen_err_done, GATEWAY . "?a=members&amp;id={$this->_id}&amp;code=11");
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
	function _fetchPacks($any = true)
	{
		$handle = opendir(SYSTEM_PATH . 'lang/');
        $list   = array();

        if($any) $list[] = 'Any Language';
		
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
    function _fetchSkins($any = true)
    {
        $sql  = $this->DatabaseHandler->query("SELECT skins_id, skins_name FROM " . DB_PREFIX . "skins");
        $list = array();

        if($any) $list[] = "Any Skin";

        while($row = $sql->getRow())
        {
            $list[$row['skins_id']] = $row['skins_name'];
        }

        return $list;
    }

}

?>