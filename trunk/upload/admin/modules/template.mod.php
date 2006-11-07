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
    var $_skin;

   /**
    * Variable Description
    * @access Private
    * @var Integer
    */
    var $_section;

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

        $this->_id      = isset($this->get['id'])      ? (int) $this->get['id']      : 0;
        $this->_code    = isset($this->get['code'])    ?       $this->get['code']    : 00;
        $this->_hash    = isset($this->post['hash'])   ?       $this->post['hash']   : null;
		$this->_skin    = $this->config['skin'];
        $this->_section = '';

		if(isset($this->post['skin']))
		{
			$this->_skin = $this->post['skin'];
		}
        elseif(isset($this->get['skin']))
        {
			$this->_skin = $this->get['skin'];
		}

		if(isset($this->post['section']))
		{
			$this->_section = $this->post['section'];
		}
        elseif(isset($this->get['section']))
        {
			$this->_section = $this->get['section'];
		}

        require_once SYSTEM_PATH . 'admin/lib/onepanel.php';
        $this->OnePanel = new OnePanel($this);

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
		$this->OnePanel->addHeader($this->LanguageHandler->skin_temp_header);

		switch($this->_code)
		{
			case '00':
                $this->OnePanel->_make_nav(4, 14, -1);
				$this->_showSections();
				break;

			case '01':
                $this->OnePanel->_make_nav(4, 14, -1);
				$this->_showTemplateList();
				break;

			case '02':
                $this->OnePanel->_make_nav(4, 14, -1);
				$this->_showTemplate();
				break;

			case '03':
                $this->OnePanel->_make_nav(4, 14, -1);
				$this->_doEditTemplate();
				break;

			default:
                $this->OnePanel->_make_nav(4, 14, -1);
				$this->_showSections();
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
	function _showSections()
	{
        $skins = $this->_fetchSkins();

		$this->OnePanel->form->startForm(GATEWAY . '?a=template');
		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());

			$this->OnePanel->form->addWrapSelect('skin',  $skins, $this->_skin, false, 
                                             array(1, $this->LanguageHandler->skin_temp_choose_title,
                                                      $this->LanguageHandler->skin_temp_choose_desc));

		$this->OnePanel->form->endForm();
		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());

		$this->OnePanel->table->addColumn($this->LanguageHandler->skin_temp_tbl_id,     " align='center' width='1%'");
		$this->OnePanel->table->addColumn($this->LanguageHandler->skin_temp_tbl_module, " align='left'");
		$this->OnePanel->table->addColumn($this->LanguageHandler->skin_temp_tbl_count,  " align='center'");

		$this->OnePanel->table->startTable(sprintf($this->LanguageHandler->skin_temp_tbl_header, $skins[$this->_skin]));

			$sql = $this->DatabaseHandler->query("
			SELECT
				DISTINCT(temp_section),
				COUNT(temp_name) AS temp_count
			FROM " . DB_PREFIX . "templates
			WHERE temp_skin = {$this->_skin}
			GROUP BY temp_section");

			$rows  = '';
			$total = 0;
			$i     = 0;
			while($row = $sql->getRow())
			{
				$i++;
				$total += $row['temp_count'];

                $section = 'skin_sect_' . $row['temp_section'];

				$this->OnePanel->table->addRow(array(array("<strong>{$i}</strong>", " align='center'", 'headera'),
                                               array("<a href=\"" . GATEWAY . "?a=template&amp;skin={$this->_skin}&amp;section=" .
                                                     "{$row['temp_section']}&amp;code=01\">" . $this->LanguageHandler->$section . "</a>", false, 'headerb'),
                                               array(number_format($row['temp_count']), " align='center'", 'headerb')));
			}

            $total = number_format($total);

            $this->OnePanel->table->addRow(array(array('', false, 'headera'),
                                                 array("<b>{$this->LanguageHandler->skin_temp_tbl_total}</b>", false, 'headerb'),
                                                 array("<b>{$total}</b>", " align='center'", 'headerb')));

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
	function _showTemplateList()
	{
        $sql = $this->DatabaseHandler->query("SELECT skins_id, skins_name FROM " . DB_PREFIX . "skins " . 
                                             "WHERE skins_id = {$this->_skin}");

        if(false == $sql->getNumRows())
        {
            $this->OnePanel->messenger($this->LanguageHandler->skin_temp_err_no_skin, GATEWAY . '?a=template');
        }

        $skin = $sql->getRow();

        $section = 'skin_sect_' . $this->_section;

		@$this->OnePanel->appendBuffer("<div id=\"bottom_nav\"><a href=\"" . GATEWAY . "?a=template&amp;skin={$this->_skin}\">" .
                                      $this->LanguageHandler->skin_temp_nav_section . " ( <b>{$skin['skins_name']}</b> )" .
                                      "</a> / {$this->LanguageHandler->skin_temp_nav_template} ( <b>{$this->LanguageHandler->$section}</b> )</div>");

		$this->OnePanel->appendBuffer("<form method=\"post\" action=\"" . GATEWAY . '?a=template&amp;code=02">');

            $this->OnePanel->table->addColumn($this->LanguageHandler->skin_temp_tbl_id, " align='center' width='1%'");
			$this->OnePanel->table->addColumn('&nbsp;',  " align='center' width='1%'");
			$this->OnePanel->table->addColumn($this->LanguageHandler->skin_temp_list_tbl_temp);
			$this->OnePanel->table->addColumn($this->LanguageHandler->skin_temp_list_tbl_size,  " align='right'");

			$this->OnePanel->table->startTable($this->LanguageHandler->skin_temp_list_tbl_header);

				$sql = $this->DatabaseHandler->query("
				SELECT 
					temp_name, 
					CHAR_LENGTH(temp_code) AS temp_size 
				FROM " . DB_PREFIX . "templates 
				WHERE 
                    temp_section = '{$this->_section}' AND 
                    temp_skin    = {$this->_skin}
				ORDER BY temp_name");

                if(false == $sql->getNumRows())
                {
                    $this->OnePanel->messenger($this->LanguageHandler->skin_temp_err_no_skin, GATEWAY . '?a=template');
                }

				$rows  = '';
				$total = 0;
				$i     = 0;
				while($row = $sql->getRow())
				{
					$total += $row['temp_size'];

                    $row['temp_size'] = $this->_FileHandler->getFileSize($row['temp_size']);
					
					$i++;

					$this->OnePanel->table->addRow(array(array("<strong>{$i}.</strong>", " align='center'", 'headera'),
                                                         array("<input type=\"checkbox\" id=\"{$row['temp_name']}\" class=\"check\" name=\"temp[$i]\" value=\"{$row['temp_name']}\" />", " align='center'", 'headerc'),
                                                         array("<label for=\"{$row['temp_name']}\">{$row['temp_name']}</label>", false, 'headerb'),
                                                         array($row['temp_size'], " align='right'", 'headerb')));
				}

				$total  = $this->_FileHandler->getFileSize($total);

                $this->OnePanel->table->addRow(array(array("<strong>{$this->LanguageHandler->skin_temp_list_total}</strong>", " colspan=\"3\"", 'headerb'),
                                                     array("<strong>{$total}</strong>", " align='right'", 'headerb')));

                    $this->OnePanel->form->addHidden('skin',    $this->_skin);
                    $this->OnePanel->form->addHidden('section', $this->_section);

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
	function _showTemplate()
	{
		extract($this->post);

        $sql = $this->DatabaseHandler->query("SELECT skins_id, skins_name FROM " . DB_PREFIX . "skins " . 
                                             "WHERE skins_id = {$this->_skin}");

        if(false == $sql->getNumRows())
        {
            $this->OnePanel->messenger($this->LanguageHandler->skin_temp_err_no_skin, GATEWAY . '?a=template');
        }

        $skin = $sql->getRow();

        if(isset($this->get['temps']))
        {
            $temp = unserialize($this->ParseHandler->uncleanString($this->get['temps']));
        }

		if(false == isset($temp)) 
        {
            $this->OnePanel->messenger($this->LanguageHandler->skin_temp_err_none, 
                                       GATEWAY . "?a=template&skin={$this->_skin}&section={$this->_section}&code=01");
        }

        $section = 'skin_sect_' . $this->_section;

		$this->OnePanel->appendBuffer("<div id=\"bottom_nav\"><a href=\"" . GATEWAY . "?a=template&amp;skin={$this->_skin}\">" . 
                                      $this->LanguageHandler->skin_temp_nav_section . " ( <b>{$skin['skins_name']}</b> )</a> / <a href=\"" . 
                                      GATEWAY . "?a=template&amp;skin={$this->_skin}&amp;section={$this->_section}" .
                                      "&amp;code=01\">{$this->LanguageHandler->skin_temp_nav_template} ( <b>" . 
                                      "{$this->LanguageHandler->$section}</b> )</a> / {$this->LanguageHandler->skin_temp_nav_edit}</div>");

		$this->OnePanel->form->startForm(GATEWAY . '?a=template&amp;code=03');
		$this->OnePanel->appendBuffer($this->OnePanel->form->flushBuffer());

			$query = array();
			foreach($temp as $bit)
            {
                $query[] = $bit;
            }

			$sql = $this->DatabaseHandler->query("
			SELECT 
				temp_name, 
				temp_code 
			FROM  " . DB_PREFIX . "templates 
			WHERE  temp_skin = {$this->_skin} AND temp_name IN ('" . implode("','", $query) . "')");

			if(false == $sql->getNumRows())
            {
                $this->OnePanel->messenger($this->LanguageHandler->skin_temp_err_no_match, 
                                           GATEWAY . "?a=template&skin={$this->_skin}");
            }

			while($row = $sql->getRow())
			{
				$this->OnePanel->form->addTextArea("template[{$row['temp_name']}]", 
                                                   htmlentities($row['temp_code']), 
                                                   " wrap='off' style='height: 350px;'", 
                                                   array(1, $row['temp_name'], $this->LanguageHandler->skin_temp_edit_form_desc));
			}

			$this->OnePanel->form->addHidden('temps',   serialize($temp));
			$this->OnePanel->form->addHidden('skin',    $this->_skin);
			$this->OnePanel->form->addHidden('section', $this->_section);
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
	function _doEditTemplate()
	{
        if($this->_hash != $this->UserHandler->getUserhash())
        {
            $this->OnePanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
        }
		extract($this->post);

		foreach($template as $key => $val)
		{
            $val = addslashes($this->ParseHandler->uncleanString($val));

			$this->DatabaseHandler->query("UPDATE " . DB_PREFIX . "templates SET temp_code = '{$val}' " .
                                          "WHERE temp_name = '{$key}' AND temp_skin = {$this->_skin}");
		}

        $temps = $this->ParseHandler->uncleanString($temps);

		$this->OnePanel->messenger($this->LanguageHandler->skin_temp_edit_err_done, 
                                   GATEWAY . "?a=template&code=02&skin={$this->_skin}&section={$this->_section}&temps={$temps}");
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
		$list = array();
		$sql  = $this->DatabaseHandler->query("SELECT * FROM " . DB_PREFIX . "skins");
		while($row = $sql->getRow())
        {
            $list[$row['skins_id']] = $row['skins_name'];
        }

		return $list;
	}

}

?>