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
    var $OnePanel;

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

        $this->_id   = isset($this->get['id'])    ? (int) $this->get['id']    : 0;
        $this->_code = isset($this->get['code'])  ?       $this->get['code']  : 00;

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
		switch($this->_code)
		{
			case '00':
                $this->OnePanel->_make_nav(3, 22, 47);
				$this->_showValidatingList();
				break;

			case '01':
                $this->OnePanel->_make_nav(3, 22, 47);
				$this->_doUserValidation();
				break;

			case '02':
                $this->OnePanel->_make_nav(3, 22, 48);
				$this->_showCoppaList();
				break;

			case '03':
                $this->OnePanel->_make_nav(3, 22, 48);
				$this->_doCoppaValidation();
				break;

			default:
                $this->OnePanel->_make_nav(3, 22, 47);
				$this->_showValidatingList();
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
	function _showValidatingList()
	{
        $this->OnePanel->addHeader($this->LanguageHandler->q_val_header);
        $this->OnePanel->appendBuffer($this->LanguageHandler->q_header_tip);

        $query = "
        SELECT
              members_id,
              members_name,
              members_registered,
              members_lastvisit
        FROM " . DB_PREFIX . "members
        WHERE members_class = 5 AND
              members_coppa = 0";

		$sql = $this->DatabaseHandler->query($query);

        $num = $sql->getNumRows();

        $this->OnePanel->table->addColumn($this->LanguageHandler->mem_search_tbl_id,     "align='center' width='1%'");
        $this->OnePanel->table->addColumn($this->LanguageHandler->mem_search_tbl_name,   "align='left'");
        $this->OnePanel->table->addColumn($this->LanguageHandler->mem_search_tbl_joined, "align='center'");
        $this->OnePanel->table->addColumn($this->LanguageHandler->mem_search_tbl_visit, "align='center'");
        $this->OnePanel->table->addColumn('&nbsp;', ' width="15%"');

		$this->OnePanel->appendBuffer("<div id=\"bar\">" . $this->_PageHandler->getSpan() . "</div>");     

        $this->OnePanel->table->startTable(number_format($num) . ' ' .$this->LanguageHandler->mem_search_tbl_header);

        if($num)
        {
            while($row = $sql->getRow())
            {
                if(false == $row['members_lastvisit'])
                {
                    $lastvisit = $this->LanguageHandler->blank;
                }
                else {
                    $lastvisit = date($this->config['date_short'], $row['members_lastvisit']);
                }

                $this->OnePanel->table->addRow(array(array("<strong>{$row['members_id']}</strong>", ' align="center"', 'headera'),
                                                     array("<a href=\"" . GATEWAY . "?a=members&amp;code=05&amp;id={$row['members_id']}\">{$row['members_name']}</a>", 'headerb'),
                                                     array(date($this->config['date_short'], $row['members_registered']), " align=\"center\"", 'headerb'),
                                                     array($lastvisit, 'align="center"'),
                                                     array("<a href=\"" . GATEWAY . "?a=queue&amp;code=01&amp;id={$row['members_id']}\"><strong>{$this->LanguageHandler->link_approve}</strong></a>", ' align="center"')));
            }
        }
        else {
                $this->OnePanel->table->addRow(array(array($this->LanguageHandler->q_no_val_users, ' align="center" colspan="5"')));
        }

        $this->OnePanel->table->endTable();
        $this->OnePanel->appendBuffer($this->OnePanel->table->flushBuffer());

		$this->OnePanel->appendBuffer("<div id=\"bar\">" . $this->_PageHandler->getSpan() . "</div>");
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
    function _doUserValidation()
    {
        $this->DatabaseHandler->query("
        UPDATE " . DB_PREFIX . "members 
        SET members_class = 2 
        WHERE members_id  = {$this->_id}");

        header("LOCATION: " . GATEWAY . '?a=queue');
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
    function _showCoppaList()
    {
        $this->OnePanel->addHeader($this->LanguageHandler->q_cop_header);
        $this->OnePanel->appendBuffer($this->LanguageHandler->q_header_tip);

        $query = "
        SELECT
              members_id,
              members_name,
              members_registered,
              members_lastvisit
        FROM " . DB_PREFIX . "members
        WHERE members_class = 5 AND
              members_coppa = 1";

		$sql = $this->DatabaseHandler->query($query);

        $num = $sql->getNumRows();

        $this->OnePanel->table->addColumn($this->LanguageHandler->mem_search_tbl_id,     "align='center' width='1%'");
        $this->OnePanel->table->addColumn($this->LanguageHandler->mem_search_tbl_name,   "align='left'");
        $this->OnePanel->table->addColumn($this->LanguageHandler->mem_search_tbl_joined, "align='center'");
        $this->OnePanel->table->addColumn($this->LanguageHandler->mem_search_tbl_visit, "align='center'");
        $this->OnePanel->table->addColumn('&nbsp;', ' width="15%"');

		$this->OnePanel->appendBuffer("<div id=\"bar\">" . $this->_PageHandler->getSpan() . "</div>");     

        $this->OnePanel->table->startTable(number_format($num) . ' ' .$this->LanguageHandler->mem_search_tbl_header);

        if($num)
        {
            while($row = $sql->getRow())
            {
                if(false == $row['members_lastvisit'])
                {
                    $lastvisit = $this->LanguageHandler->blank;
                }
                else {
                    $lastvisit = date($this->config['date_short'], $row['members_lastvisit']);
                }

                $this->OnePanel->table->addRow(array(array("<strong>{$row['members_id']}</strong>", ' align="center"', 'headera'),
                                                     array("<a href=\"" . GATEWAY . "?a=members&amp;code=05&amp;id={$row['members_id']}\">{$row['members_name']}</a>", 'headerb'),
                                                     array(date($this->config['date_short'], $row['members_registered']), " align=\"center\"", 'headerb'),
                                                     array($lastvisit, 'align="center"'),
                                                     array("<a href=\"" . GATEWAY . "?a=queue&amp;code=03&amp;id={$row['members_id']}\"><strong>{$this->LanguageHandler->link_approve}</strong></a>", ' align="center"')));
            }
        }
        else {
                $this->OnePanel->table->addRow(array(array($this->LanguageHandler->q_no_cop_users, ' align="center" colspan="5"')));

        }

        $this->OnePanel->table->endTable();
        $this->OnePanel->appendBuffer($this->OnePanel->table->flushBuffer());

		$this->OnePanel->appendBuffer("<div id=\"bar\">" . $this->_PageHandler->getSpan() . "</div>");
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
    function _doCoppaValidation()
    {
        $this->DatabaseHandler->query("
        UPDATE " . DB_PREFIX . "members 
        SET members_class = 2 
        WHERE members_id  = {$this->_id}");

        header("LOCATION: " . GATEWAY . '?a=queue&code=02');
    }
}

?>