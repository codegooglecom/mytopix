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
class OnePanel
{
   /**
    * Variable Description
    * @access Private
    * @var Integer
    */    
    var $buffer;

   /**
    * Variable Description
    * @access Private
    * @var Integer
    */
	var $nav;

   /**
    * Variable Description
    * @access Private
    * @var Integer
    */
	var $form;

   /**
    * Variable Description
    * @access Private
    * @var Integer
    */
	var $table;

   /**
    * Variable Description
    * @access Private
    * @var Integer
    */
	var $tabs;


   // ! Action Method

   /**
    * Comment
    *
    * @param String $string Description
    * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
    * @since v1.0
    * @return String
    */
	function OnePanel($_System, $path = false)
	{
        $this->_System =& $_System;
        
        if($path)
        {
            define(SYSTEM_PATH, $path);
        }

		require_once SYSTEM_PATH . 'admin/lib/navlinks.php';

        $this->_top_nav_array = $top_links;
        $this->_mid_nav_array = $mid_links;
        $this->_bot_nav_array = $bot_links;

		$this->buffer      = '';
		$this->_nav_top    = '';
        $this->_nav_middle = '';
        $this->_nav_bottom = '';

		$this->form    =  new OneForm();
		$this->table   =  new OneTable();
		$this->tabs    =  new OneTab();
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
	function addHeader($title)
	{
		$this->buffer .= "<h3>{$title}</h3>\n";
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
    function _make_nav($top, $middle, $last = -1, $extra = false)
    {
        $this->_nav_top   = '<ul>';

        foreach($this->_top_nav_array as $key => $val)
        {
            if($top == $key)
            {
                $this->_nav_top .= "<li><span>{$val[0]}</span></li>";
            }
            else {
                $this->_nav_top .= "<li><a href=\"" . GATEWAY . "{$val[1]}\" title=\"{$val[0]}\">{$val[0]}</a></li>";
            }
        }

        $this->_nav_top .= '</ul>';

        $exists = false;

        $this->_nav_middle = '<ul>';

        foreach($this->_mid_nav_array as $key => $val)
        {
            if($top == $val['parent'])
            {
                if($middle == $key)
                {
                    $exists = true;

                    $this->_nav_middle .= "<li><a href=\"{$val['link']}\"  class=\"active\" title=\"{$val['title']}\">{$val['title']}</a></li>";
                }
                else {
                    $this->_nav_middle .= "<li><a href=\"{$val['link']}\" title=\"{$val['title']}\">{$val['title']}</a></li>";
                }
            }
        }

        if(false == $exists)
        {
            $this->_nav_middle = '';
        }
        else {
            $this->_nav_middle .= '</ul>';
        }

        if($last != -1)
        {
            $this->_nav_bottom .= '<ul>';

            foreach($this->_bot_nav_array as $key => $val)
            {
                if($middle == $val['parent'])
                {
                    if($last == $key)
                    {
                        $val['link'] = sprintf($val['link'], $extra);

                        $this->_nav_bottom .= "<li><a href=\"{$val['link']}\" class=\"active\"  title=\"{$val['title']}\">{$val['title']}</a></li>\n";
                    }
                    else {
                        $val['link'] = sprintf($val['link'], $extra);

                        $this->_nav_bottom .= "<li><a href=\"{$val['link']}\" title=\"{$val['title']}\">{$val['title']}</a></li>\n";
                    }
                }
            }

            $this->_nav_bottom .= '</ul>';
        }
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
	function appendBuffer($content)
	{
		$this->buffer .= $content;
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
	function messenger($msg, $url = '', $redirect = true, $flush = true)
	{
		$this->clearBuffer();
		
		$trail = '';
		if($redirect)
		{
			@header("Refresh: 6; url={$url}");
			$trail = "<a href='{$url}'>{$this->_System->LanguageHandler->error_continue}</a>";
		}
		
        $this->buffer .= "<div id=\"message\">";
        $this->buffer .= "<h3>{$this->_System->LanguageHandler->error_message}</h3>";
		$this->buffer .= "<p>{$msg}<span>( {$trail} )</span></p>";
        $this->buffer .= "</div>";

        if($flush)
        {
    		$this->flushBuffer();
	    	exit();
        }
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
    function warning($msg, $flush = true, $list = '')
    {
        $this->buffer = '';

        $this->buffer .= "<div id=\"warning\">";
        $this->buffer .= "<h3>{$this->_System->LanguageHandler->error_header}</h3>";
		$this->buffer .= "<p>{$msg}</p>";
        $this->buffer .= $list;
        $this->buffer .= "</div>";

        if($flush)
        {
    		$this->flushBuffer();
	    	exit();
        }
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
    function _checkPerms()
    {
        $files = array($this->_System->LanguageHandler->file_check_config => SYSTEM_PATH . 'config/settings.php',
                       $this->_System->LanguageHandler->file_check_lang   => SYSTEM_PATH . 'lang/',
                       $this->_System->LanguageHandler->file_check_dlang  => SYSTEM_PATH . 'lang/english/',
                       $this->_System->LanguageHandler->file_check_skin   => SYSTEM_PATH . 'skins/',
                       $this->_System->LanguageHandler->file_check_dskin  => SYSTEM_PATH . 'skins/1/',
                       $this->_System->LanguageHandler->file_check_css    => SYSTEM_PATH . 'skins/1/styles.css',
                       $this->_System->LanguageHandler->file_check_demo   => SYSTEM_PATH . 'skins/1/emoticons/',
                       $this->_System->LanguageHandler->file_check_atta   => SYSTEM_PATH . 'uploads/attachments/',
                       $this->_System->LanguageHandler->file_check_ava    => SYSTEM_PATH . 'uploads/avatars/');

        $errors = '';

        foreach($files as $key => $val)
        {
            if(false == is_writable($val))
            {
                $errors .= "<li>{$key} ( {$val} )</li>";
            }
        }

        if($errors)
        {
            return "<ul>{$errors}</ul>";
        }

        return false;
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
	function flushBuffer()
	{
        if($list = $this->_checkPerms())
        {
            $this->warning($this->_System->LanguageHandler->chmod_config, false, $list);
        }

		include SYSTEM_PATH . 'admin/lib/theme/layout.php';
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
	function clearBuffer()
	{
		$this->buffer = '';
	}
}

?>