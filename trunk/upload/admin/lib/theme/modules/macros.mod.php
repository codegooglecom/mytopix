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
    var $MyPanel;

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
    var $_id;

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

        $this->_id   = isset($this->get['id'])    ? $this->get['id']    : false;
        $this->_code = isset($this->get['code'])  ? $this->get['code']  : 00;
        $this->_hash = isset($this->post['hash']) ? $this->post['hash'] : null;
		$this->_skin = $this->config['skin'];

		if(isset($this->post['skin']))
		{
			$this->_skin = $this->post['skin'];
		}
        elseif(isset($this->get['skin']))
        {
			$this->_skin = $this->get['skin'];
		}

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
        $this->MyPanel->addHeader($this->LanguageHandler->macro_header);

		switch($this->_code)
		{
			case '00':
                $this->MyPanel->_make_nav(4, 20, 39, $this->_skin);
				$this->_showNames();
				break;

			case '01':
                $this->MyPanel->_make_nav(4, 20, 40, $this->_skin);

                if(false == $this->MyPanel->canAccess('admin_macro_add'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
    				$this->_showAddForm();
                }

				break;

			case '02':
                $this->MyPanel->_make_nav(4, 20, 40, $this->_skin);

                if(false == $this->MyPanel->canAccess('admin_macro_add'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
    				$this->_doAddMacro();
                }

				break;

			case '03':
                $this->MyPanel->_make_nav(4, 20, 39, $this->_skin);

                if(false == $this->MyPanel->canAccess('admin_macro_edit'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
    				$this->_showEditForm();
                }

				break;

			case '04':
                $this->MyPanel->_make_nav(4, 20, 39, $this->_skin);

                if(false == $this->MyPanel->canAccess('admin_macro_edit'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
    				$this->_doMacroEdit();
                }

				break;

			case '05':
                $this->MyPanel->_make_nav(4, 20, 39, $this->_skin);

                if(false == $this->MyPanel->canAccess('admin_macro_remove'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
    				$this->_doRemoveMacro();
                }

				break;

			default:
                $this->MyPanel->_make_nav(4, 20, 39, $this->_skin);
				$this->_showNames();
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
	function _showNames()
	{
        $skins = $this->_fetchSkins();

		$this->MyPanel->form->startForm(GATEWAY . '?a=macros');
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

			$this->MyPanel->form->addWrapSelect('skin',  $skins, $this->_skin, false, 
                                             array(1, $this->LanguageHandler->macro_skin_choose_title,
                                                      $this->LanguageHandler->macro_skin_choose_desc));

		$this->MyPanel->form->endForm();
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

		$this->MyPanel->table->addColumn($this->LanguageHandler->macro_tbl_col_id,   " align='center' width='1%'");
		$this->MyPanel->table->addColumn($this->LanguageHandler->macro_tbl_col_name, " align='left' width='20%'");
		$this->MyPanel->table->addColumn($this->LanguageHandler->macro_tbl_col_prev, " align='center'");
		$this->MyPanel->table->addColumn('&nbsp;', ' width="15%"');

		$this->MyPanel->table->startTable(sprintf($this->LanguageHandler->macro_table_header, $skins[$this->_skin]));

            $sql = $this->DatabaseHandler->query("
            SELECT *  
            FROM " . DB_PREFIX ."macros
            WHERE macro_skin = {$this->_skin}
            ORDER BY macro_id");
            
            if(false == $sql->getNumRows())
            {
                $this->MyPanel->table->addRow(array(array("<strong>{$this->LanguageHandler->macro_tbl_none}</strong>", " colspan='4' align='center'")));   
            }
            else {
                while($row = $sql->getRow())
                {
                    $row['macro_body'] = str_replace('{%SKIN%}', SYSTEM_PATH . "skins/{$this->_skin}", $row['macro_body']);

                    $delete = "  <img src=\"lib/theme/btn_delete_off.gif\" alt=\"\" />";
                    $back   = '';
                    if($row['macro_remove'])
                    {
                        $delete = "<a href=\"" . GATEWAY . "?a=macros&amp;code=05&amp;id=" .
                                  "{$row['macro_id']}\" onclick=\"javascript: return confirm('{$this->LanguageHandler->macro_js_delete}');\"><strong>{$this->LanguageHandler->link_delete}" . 
                                  "</strong></a>";
                    }

                    $this->MyPanel->table->addRow(array(array("<strong>{$row['macro_id']}</strong>", ' align="center"'),
                                                   array("&lt;macro:{$row['macro_title']}&gt;"),
                                                   array($row['macro_body'], " align='center'"),
                                                   array("<a href=\"" . GATEWAY . "?a=macros&amp;code=03&amp;skin={$row['macro_skin']}&amp;id=" .
                                                         "{$row['macro_id']}\">{$this->LanguageHandler->link_edit}</a> {$delete}", " align='center'")));
                }
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
    function _showAddForm()
    {
        $this->MyPanel->appendBuffer($this->LanguageHandler->macro_tip);
        $this->MyPanel->appendBuffer($this->LanguageHandler->macro_tip_2);
        
        $this->MyPanel->form->startForm(GATEWAY . '?a=macros&amp;code=02');
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

			$this->MyPanel->form->addTextBox('title', false, false, 
									          array(1, $this->LanguageHandler->macro_form_add_title_title,
                                                       $this->LanguageHandler->macro_form_add_title_desc));

			$this->MyPanel->form->addTextArea('body', false, false, 
									          array(1, $this->LanguageHandler->macro_form_add_body_title,
                                                       $this->LanguageHandler->macro_form_add_body_desc));

			$this->MyPanel->form->addWrapSelect('skin',  $this->_fetchSkins(), $this->_skin, false, 
                                             array(1, $this->LanguageHandler->macro_form_add_skin_title,
                                                      $this->LanguageHandler->macro_form_add_skin_desc));

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
    function _doAddMacro()
    {
        if($this->_hash != $this->UserHandler->getUserhash())
        {
            $this->MyPanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
        }

        extract($this->post);

        if(false == $title)
        {
            $this->MyPanel->messenger($this->LanguageHandler->macro_err_bad_title, GATEWAY . "?a=macros&code=01&skin={$this->_skin}");
        }

        if(false == $body)
        {
            $this->MyPanel->messenger($this->LanguageHandler->macro_err_no_body, GATEWAY . "?a=macros&code=01&skin={$this->_skin}");
        }

        $sql = $this->DatabaseHandler->query("
        SELECT macro_id 
        FROM " . DB_PREFIX . "macros 
        WHERE macro_title = '{$title}'");

        if($sql->getNumRows())
        {
            $this->MyPanel->messenger($this->LanguageHandler->macro_err_bad_title, GATEWAY . "?a=macros&code=01&skin={$this->_skin}");
        }

        $this->DatabaseHandler->query("
        INSERT INTO " . DB_PREFIX . "macros(
            macro_skin,
            macro_title,
            macro_body,
            macro_remove)
        VALUES (
            {$this->_skin},
            '{$title}',
            '" . $this->ParseHandler->uncleanString($body) . "',
            1)");

        $this->CacheHandler->updateCache('macros', $this->_skin);

        $this->MyPanel->messenger($this->LanguageHandler->macro_err_add_done, GATEWAY . "?a=macros&code=01&skin={$this->_skin}");
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
    function _showEditForm()
    {
        $sql = $this->DatabaseHandler->query("
        SELECT *
        FROM " . DB_PREFIX . "macros 
        WHERE macro_id = {$this->_id}");

        if(false == $sql->getNumRows())
        {
            $this->MyPanel->messenger($this->LanguageHandler->macro_err_no_match, GATEWAY . "?a=macros");
        }

        $row = $sql->getRow();
        
        $body = str_replace('{%SKIN%}', SYSTEM_PATH . "skins/{$this->_skin}", $row['macro_body']);

        $this->MyPanel->appendBuffer($this->LanguageHandler->macro_tip);
        $this->MyPanel->appendBuffer($this->LanguageHandler->macro_tip_2);

        $this->MyPanel->appendBuffer("<p class=\"checkwrap\"><strong>{$this->LanguageHandler->macro_preview}<br />{$body}</p>");

        $this->MyPanel->form->startForm(GATEWAY . "?a=macros&amp;code=04&amp;id={$this->_id}");
		$this->MyPanel->appendBuffer($this->MyPanel->form->flushBuffer());

			$this->MyPanel->form->addTextBox('title', $row['macro_title'], false, 
									          array(1, $this->LanguageHandler->macro_form_edit_title_title,
                                                       $this->LanguageHandler->macro_form_edit_title_desc));

			$this->MyPanel->form->addTextArea('body',  $this->ParseHandler->uncleanString($row['macro_body']), false, 
									           array(1, $this->LanguageHandler->macro_form_edit_body_title,
                                                        $this->LanguageHandler->macro_form_edit_body_desc));

            $this->MyPanel->form->addHidden('hash', $this->UserHandler->getUserHash());
            $this->MyPanel->form->addHidden('skin', $this->_skin);

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
    function _doMacroEdit()
    {
        if($this->_hash != $this->UserHandler->getUserhash())
        {
            $this->MyPanel->messenger($this->LanguageHandler->invalid_access, $this->config['site_link']);
        }

        extract($this->post);

        if(false == $title)
        {
            $this->MyPanel->messenger($this->LanguageHandler->macro_err_bad_title, GATEWAY . "?a=macros&code=03&id={$this->_id}");
        }

        if(false == $body)
        {
            $this->MyPanel->messenger($this->LanguageHandler->macro_err_no_body, GATEWAY . "?a=macros&code=03&id={$this->_id}");
        }

        $sql = $this->DatabaseHandler->query("
        SELECT * 
        FROM " . DB_PREFIX . "macros 
        WHERE macro_id = '{$this->_id}'");

        if(false == $sql->getNumRows())
        {
            $this->MyPanel->messenger($this->LanguageHandler->macro_err_no_match, GATEWAY . "?a=macros&code=03&id={$this->_id}");
        }

        $row = $sql->getRow();

        if($match['macro_title'] != $title)
        {
            $sql = $this->DatabaseHandler->query("
            SELECT macro_id 
            FROM " . DB_PREFIX . "macros 
            WHERE 
                macro_title =  '{$title}' AND 
                macro_skin  =  {$row['macro_skin']} AND
                macro_id    <> {$this->_id}");

            if($sql->getNumRows())
            {
                $this->MyPanel->messenger($this->LanguageHandler->macro_err_bad_title, GATEWAY . "?a=macros&code=03&id={$this->_id}");
            }
        }

        $this->DatabaseHandler->query("
        UPDATE " . DB_PREFIX . "macros SET
            macro_title = '{$title}',
            macro_body  = '" . $this->ParseHandler->uncleanString($body) . "'
        WHERE macro_id  = {$this->_id}");

        $this->CacheHandler->updateCache('macros', $this->_skin);

        $this->MyPanel->messenger($this->LanguageHandler->macro_err_edit_done, GATEWAY . "?a=macros&code=03&id={$this->_id}");
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
    function _doRemoveMacro()
    {
        $sql = $this->DatabaseHandler->query("
        SELECT * 
        FROM " . DB_PREFIX . "macros 
        WHERE macro_id = '{$this->_id}'");

        if(false == $sql->getNumRows())
        {
            $this->MyPanel->messenger($this->LanguageHandler->macro_err_no_match, GATEWAY . "?a=macros");
        }

        $row = $sql->getRow();

        if(false == $row['macro_remove'])
        {
            $this->MyPanel->messenger($this->LanguageHandler->macro_err_remove, GATEWAY . "?a=macros&amp;skin={$row['macro_skin']}");
        }

        $this->DatabaseHandler->query("DELETE FROM " . DB_PREFIX . "macros WHERE macro_id = {$this->_id}");

        $this->CacheHandler->updateCache('macros', $this->_skin);

        header("LOCATION: " . GATEWAY . "?a=macros&skin={$row['macro_skin']}");
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