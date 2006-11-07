<?php

/**
* Resynchonize Module
*
* This module allows the user to update certain system-
* wide statistics.
*
* @license http://www.jaia-interactive.com/licenses/mytopix/
* @version $Id: filename murdochd Exp $
* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
* @company Jaia Interactive <admin@jaia-interactive.com>
* @package MyTopix | Personal Message Board
*/
class ModuleObject extends MasterObject
{
   /**
    * Denotes a user-requested sub section id
    * @access Private
    * @var Integer
    */
    var $_code;

   /**
    * Admin interface system library
    * @access Public
    * @var Object
    */
    var $MyPanel;

   /**
    * Allows direct manipulation of files
    * @access Public
    * @var Object
    */
    var $_FileHandler;

   // ! Constructor Method

   /**
    * Instansiates class and defines instance
    * variables.
    *
    * @param String $module Currently loaded module
    * @param Array  $config System configuration
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @access Private
    * @return String
    */
	function ModuleObject(& $module, & $config)
	{
        $this->MasterObject($module, $config);

        $this->_code = isset($this->get['code']) ? $this->get['code'] : 00;

        require_once SYSTEM_PATH . 'admin/lib/mypanel.php';
        $this->MyPanel = new MyPanel($this);

        require_once SYSTEM_PATH . 'lib/file.han.php';
        $this->_FileHandler  = new FileHandler($this->config);
	}

   // ! Action Method

   /**
    * Calls functions based on user request.
    *
    * @param none
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @access public
    * @return String
    */
	function execute()
	{
		$this->MyPanel->addHeader($this->LanguageHandler->sync_form_header);

        switch($this->_code)
        {
            case '00':
                $this->MyPanel->_make_nav(6, 3, 41);

                if(false == $this->MyPanel->canAccess('admin_synch_main'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
                    $this->_showOverView();
                }

                break;

            case '01':
                $this->MyPanel->_make_nav(6, 3, 42);

                if(false == $this->MyPanel->canAccess('admin_synch_stats'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
                    $this->_SynchBoard();
                }

                break;

            case '02':
                $this->MyPanel->_make_nav(6, 3, 43);

                if(false == $this->MyPanel->canAccess('admin_synch_members'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
                    $this->_SynchMembers();
                }

                break;

            case '03':
                $this->MyPanel->_make_nav(6, 3, 44);

                if(false == $this->MyPanel->canAccess('admin_synch_forums'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
                    $this->_SynchForums();
                }

                break;

            case '04':
                $this->MyPanel->_make_nav(6, 3, 45);

                if(false == $this->MyPanel->canAccess('admin_synch_system'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
                    $this->_SynchCache();
                }

                break;

            default:
                $this->MyPanel->_make_nav(6, 3, 41);

                if(false == $this->MyPanel->canAccess('admin_synch_main'))
                {
                    $this->MyPanel->warning($this->LanguageHandler->role_no_perm, false);
                }
                else {
                    $this->_showOverView();
                }

                break;
        }

   		$this->MyPanel->flushBuffer();
    }

   // ! Action Method

   /**
    * Displays a summary of system statistics
    *
    * @param none
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @access private
    * @return String
    */
    function _showOverView()
    {

        $this->MyPanel->appendBuffer($this->LanguageHandler->sync_over_tip);

        $this->MyPanel->table->addColumn($this->LanguageHandler->sync_over_tbl_var,  " align='left'");
        $this->MyPanel->table->addColumn($this->LanguageHandler->sync_over_tbl_val, " align='right'");

        $this->MyPanel->table->startTable($this->LanguageHandler->sync_over_tbl_header);

            $this->MyPanel->table->addRow(array(array($this->LanguageHandler->sync_over_tbl_posts),
                                           array(number_format($this->config['posts']), " align='right'")));

            $this->MyPanel->table->addRow(array(array($this->LanguageHandler->sync_over_tbl_topics),
                                           array(number_format($this->config['topics']), " align='right'")));

            $this->MyPanel->table->addRow(array(array($this->LanguageHandler->sync_over_tbl_members),
                                           array(number_format($this->config['total_members']), " align='right'")));

            $this->MyPanel->table->addRow(array(array($this->LanguageHandler->sync_over_tbl_latest),
                                           array("<a href=\"" . GATEWAY . "?a=members&amp;code=05&amp;id={$this->config['latest_member_id']}\" " . 
                                                 "title=\"\">{$this->config['latest_member_name']}</a>", " align='right'")));

            $this->MyPanel->table->addRow(array(array($this->LanguageHandler->sync_over_tbl_forums),
                                           array(number_format(sizeof($this->CacheHandler->getCacheByKey('forums'))), " align='right'")));

        $this->MyPanel->table->endTable();
        $this->MyPanel->appendBuffer($this->MyPanel->table->flushBuffer());
    }

   // ! Action Method

   /**
    * Updates board stats
    *
    * @param none
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @access private
    * @return String
    */
    function _SynchBoard()
    {
		$sql = $this->DatabaseHandler->query("
        SELECT 
            members_id, 
            members_name 
        FROM " . DB_PREFIX . "members 
        ORDER BY members_id DESC LIMIT 0, 1");

		$latest = $sql->getRow();

		$sql = $this->DatabaseHandler->query("
        SELECT members_id 
        FROM " . DB_PREFIX . "members 
        WHERE members_id != 1");

		$count  = $sql->getNumRows();

		$sql    = $this->DatabaseHandler->query("SELECT topics_id FROM " . DB_PREFIX . "topics");
		$topics = $sql->getNumRows();

		$sql    = $this->DatabaseHandler->query("SELECT posts_id FROM " . DB_PREFIX . "posts");
		$post   = $sql->getNumRows();

		$this->config['latest_member_id']   = $latest['members_id'];
		$this->config['latest_member_name'] = $this->ParseHandler->parseText($latest['members_name']);
		$this->config['total_members']      = $count;
		$this->config['topics']             = $topics;
		$this->config['posts']              = $post - $topics;

		$this->_FileHandler->updateFileArray($this->config, 'config', SYSTEM_PATH . 'config/settings.php');

		$sql = $this->DatabaseHandler->query("SELECT topics_id FROM " . DB_PREFIX . "topics");

		while($row = $sql->getRow())
		{
			$getPosts = $this->DatabaseHandler->query("
            SELECT posts_id 
            FROM " . DB_PREFIX . "posts 
            WHERE posts_topic = {$row['topics_id']}");

			$this->DatabaseHandler->query("
            UPDATE " . DB_PREFIX . "topics 
            SET topics_posts = " . ($getPosts->getNumRows() - 1) . " 
            WHERE topics_id = {$row['topics_id']}");
		}

        $this->MyPanel->messenger($this->LanguageHandler->synch_err_board_done, GATEWAY . '?a=recount');
    }

   // ! Action Method

   /**
    * Updates member posting stats.
    *
    * @param none
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @access private
    * @return String
    */
    function _SynchMembers()
    {
		$sql = $this->DatabaseHandler->query("SELECT members_id FROM " . DB_PREFIX . "members");

		while($row = $sql->getRow())
		{
			$getPosts = $this->DatabaseHandler->query("
            SELECT 
                p.posts_id,
                f.forum_enable_post_counts
            FROM " . DB_PREFIX . "posts p
                LEFT JOIN " . DB_PREFIX . "topics t ON t.topics_id = p.posts_topic
                LEFT JOIN " . DB_PREFIX . "forums f ON f.forum_id  = t.topics_forum
            WHERE posts_author = {$row['members_id']}");

            $forum_data = $getPosts->getRow();

            if($forum_data['forum_enable_post_counts'])
            {
                $this->DatabaseHandler->query("
                UPDATE " . DB_PREFIX . "members 
                SET members_posts = " . $getPosts->getNumRows() . " 
                WHERE members_id  = {$row['members_id']}");
            }
		}

        $this->MyPanel->messenger($this->LanguageHandler->synch_err_members_done, GATEWAY . '?a=recount');
    }

   // ! Action Method

   /**
    * Updates forum stats
    *
    * @param none
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @access private
    * @return String
    */
    function _SynchForums()
    {
        $this->ForumHandler->updateForumStats();

        $this->MyPanel->messenger($this->LanguageHandler->synch_err_forums_done, GATEWAY . '?a=recount');
    }

   // ! Action Method

   /**
    * Updates system cache
    *
    * @param none
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @access private
    * @return String
    */
    function _SynchCache()
    {
        $this->CacheHandler->updateAllCache();

        $this->MyPanel->messenger($this->LanguageHandler->synch_err_cache_done, GATEWAY . '?a=recount');
    }
}

?>