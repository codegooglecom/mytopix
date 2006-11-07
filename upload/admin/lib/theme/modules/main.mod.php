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
    var $_comp1;

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

        $this->_comp1 = array('contain' => $this->LanguageHandler->comp_contain,
                              'equal'   => $this->LanguageHandler->comp_equal, 
						      'begin'   => $this->LanguageHandler->comp_begin, 
						      'end'     => $this->LanguageHandler->comp_end);

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
        $this->MyPanel->_make_nav(0, 0);

        $this->MyPanel->addHeader($this->LanguageHandler->main_header);
        $this->MyPanel->appendBuffer($this->LanguageHandler->main_tip);

        $sql = $this->DatabaseHandler->query("
        SELECT COUNT(*) AS Count 
        FROM " . DB_PREFIX . "members 
        WHERE 
            members_class = 5 AND 
            members_coppa = 0");

        $count = $sql->getRow();

        $this->MyPanel->table->addColumn($this->LanguageHandler->sync_over_tbl_var,  " align='left' width='80%'");
        $this->MyPanel->table->addColumn($this->LanguageHandler->sync_over_tbl_val,  " align='center'");

        $this->MyPanel->table->startTable($this->LanguageHandler->main_stats_header);

            $this->MyPanel->table->addRow(array(array($this->LanguageHandler->sync_over_tbl_members),
                                           array(number_format($this->config['total_members']), " align='center'")));

            $this->MyPanel->table->addRow(array(array($this->LanguageHandler->main_validating_count),
                                           array("<a href=\"" . GATEWAY . "?a=queue\">" . number_format($count['Count']) . '</a>', ' align="center"')));

            $sql = $this->DatabaseHandler->query("
            SELECT COUNT(*) AS Count 
            FROM " . DB_PREFIX . "members 
            WHERE 
                members_class = {$this->config['coppa_group']} AND 
                members_coppa = 1");

            $count = $sql->getRow();

            $this->MyPanel->table->addRow(array(array($this->LanguageHandler->main_coppa_count),
                                           array("<a href=\"" . GATEWAY . "?a=queue&amp;code=02\">" . number_format($count['Count']) . '</a>', ' align="center"')));

            $this->MyPanel->table->addRow(array(array($this->LanguageHandler->sync_over_tbl_latest),
                                           array("<a href=\"" . GATEWAY . "?a=members&amp;code=05&amp;id={$this->config['latest_member_id']}\" " . 
                                                 "title=\"\">{$this->config['latest_member_name']}</a>", " align='center'")));

            $this->MyPanel->table->addRow(array(array($this->LanguageHandler->sync_over_tbl_topics),
                                           array(number_format($this->config['topics']), " align='center'")));

            $this->MyPanel->table->addRow(array(array($this->LanguageHandler->sync_over_tbl_posts),
                                           array(number_format($this->config['posts'])," align='center'")));

        $this->MyPanel->table->endTable();
        $this->MyPanel->appendBuffer($this->MyPanel->table->flushBuffer());

        $this->MyPanel->appendBuffer("<form method=\"post\" action=\"" . GATEWAY . "?a=members&amp;code=03#results\">");

            $this->MyPanel->table->addColumn($this->LanguageHandler->mem_search_tbl_field, "align='left' width='33%'");
            $this->MyPanel->table->addColumn('&nbsp;', " width='33%'");
            $this->MyPanel->table->addColumn($this->LanguageHandler->mem_search_tbl_term,  "align='left'");

            $this->MyPanel->table->startTable($this->LanguageHandler->main_usr_find);

                $this->MyPanel->table->addRow(array($this->LanguageHandler->mem_search_tbl_name,
                                           $this->MyPanel->form->addSelect('name_type', $this->_comp1, false, false, false, true),
                                           $this->MyPanel->form->addTextBox('name',     false, false, false, true)));

                $sql = $this->DatabaseHandler->query("SELECT class_id, class_title FROM " . DB_PREFIX . "class ORDER BY class_title ASC");

                $list   = array();
                $list[] = $this->LanguageHandler->mem_search_tbl_group_list;
                while($row = $sql->getRow())
                {
                    $list[$row['class_id']] = $row['class_title'];
                }

                $this->MyPanel->table->addRow(array($this->LanguageHandler->mem_search_tbl_group, '&nbsp;',
                                           $this->MyPanel->form->addSelect('group', $list, false, false, false, true)));

            $this->MyPanel->table->endTable(true);
            $this->MyPanel->appendBuffer($this->MyPanel->table->flushBuffer());

        if(false == $this->MyPanel->canAccess('admin_view_home'))
        {
            $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
        }

		$this->MyPanel->flushBuffer();
	}
}

?>