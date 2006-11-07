<?php

/**
* MyPanel's Form Handling Class
*
* Allows a developer to create forms and fields
* on the fly without having to worry about playing
* with (X)HTML markup.
*
* @version $Id: form.han.php murdochd Exp $
* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
* @company Jaia Interactive <admin@jaia-interactive.com>
* @package MyTopix Personal Message Board
*/
class MyPanel
{
   /**
	* Holds output for form buffer.
	* @access Public
	* @var String
	*/
	var $buffer;

   /**
	* Holds top-level navigation entries.
	* @access Private
	* @var Array
	*/
	var $_top_nav_array;

   /**
	* Holds mid-level navigation entries.
	* @access Private
	* @var Array
	*/
	var $_mid_nav_array;

   /**
	* Holds bottom-level navigation entries
	* @access Private
	* @var Array
	*/
	var $_bot_nav_array;

   /**
	* Top-level navigation bar.
	* @access Public
	* @var String
	*/
	var $_nav_top;

   /**
	* Mid-level navigation bar.
	* @access Public
	* @var String
	*/
	var $_nav_middle;

   /**
	* Bottom-level navigation bar.
	* @access Public
	* @var String
	*/
	var $_nav_bottom;

   /**
	* Holds the MyPanel form handler.
	* @access Public
	* @var Object
	*/
	var $form;

   /**
	* Holds the MyPanel table handler.
	* @access Public
	* @var Object
	*/
	var $table;

   // ! Constructor Method

   /**
	* Instansiates class and defines instance variables.
	*
	* @param Object $_System Currently loaded system library.
	* @param String $path    Absolute path to system files.
	* @author Daniel Wilhelm II	Murdoch	<jaiainteractive@gmail.com>
	* @since v1.3.0
	* @access Private
	* @return Void
	*/
	function MyPanel ( $_System, $path = false )
	{
		$this->_System =& $_System;

		if( $path )
		{
			define ( SYSTEM_PATH, $path );
		}

		require_once SYSTEM_PATH . 'admin/lib/navlinks.php';

		$this->_perms = $this->_getPerms ( $this->_System->UserHandler->getField ( 'members_admin_group' ) );

		$this->_top_nav_array = $top_links;
		$this->_mid_nav_array = $mid_links;
		$this->_bot_nav_array = $bot_links;

		$this->buffer      = '';
		$this->_nav_top    = '';
		$this->_nav_middle = '';
		$this->_nav_bottom = '';

		$this->form  = new MyForm ();
		$this->table = new MyTable ();
	}

   // ! Action Method

   /**
	* Simply adds a header to the current buffer.
	*
	* @param String $title Text to include within new header.
	* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
	* @since v1.3.0
	* @access Public
	* @return Void
	*/
	function addHeader ( $title )
	{
		$this->buffer .= "<h3>{$title}</h3>\n";
	}

   // ! Action Method

   /**
	* Wraps provided content into a form field.
	*
	* @param Integer $top    Top-level menu position.
	* @param Integer $middle Middle-level menu position.
	* @param Integer $last   Bottom-level menu position.
	* @param Boolean $extra  Extra data to append to end of url.
	* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
	* @since v1.3.0
	* @access Private
	* @return Void
	*/
	function _make_nav ( $top, $middle, $last = -1, $extra = false )
	{
		$this->_nav_top = '<ul>';

		foreach ( $this->_top_nav_array as $key => $val )
		{
			if ( $top == $key )
			{
				$this->_nav_top.= "<li><span>{$val[ 0 ]}</span></li>";
			}
			else {
				$this->_nav_top .= "<li><a href=\"" . GATEWAY . "{$val[ 1 ]}\" title=\"{$val[ 0 ]}\">" .
								   "{$val[ 0 ]}</a></li>";
			}
		}

		$this->_nav_top .= '</ul>';

		$exists = false;

		$this->_nav_middle = '<ul>';

		foreach ( $this->_mid_nav_array as $key => $val )
		{
			if ( $top == $val['parent'] )
			{
				if ( $middle == $key )
				{
					$exists	= true;

					$this->_nav_middle .= "<li><a href=\"{$val[ 'link' ]}\"  class=\"active\" " . 
										  "title=\"{$val[ 'title' ]}\">{$val[ 'title' ]}</a></li>";
				}
				else {
					$this->_nav_middle .= "<li><a href=\"{$val[ 'link' ]}\" title=\"{$val[ 'title' ]}\">" .
										  "{$val[ 'title' ]}</a></li>";
				}
			}
		}

		if ( false == $exists )
		{
			$this->_nav_middle = '';
		}
		else {
			$this->_nav_middle .= '</ul>';
		}

		if ( $last != -1 )
		{
			$this->_nav_bottom .= '<ul>';

			foreach ( $this->_bot_nav_array as $key => $val )
			{
				if ( $middle == $val[ 'parent' ] )
				{
					if ( $last == $key )
					{
						$val[ 'link' ] = sprintf ( $val[ 'link' ], $extra );

						$this->_nav_bottom .= "<li><a href=\"{$val[ 'link' ]}\" class=\"active\" " .
											  "title=\"{$val[ 'title' ]}\">{$val[ 'title' ]}</a></li>\n";
					}
					else {
						$val[ 'link' ] = sprintf ( $val[ 'link' ], $extra );

						$this->_nav_bottom .= "<li><a href=\"{$val[ 'link' ]}\" title=\"{$val[ 'title' ]}\">" .
											  "{$val[ 'title' ]}</a></li>\n";
					}
				}
			}

			$this->_nav_bottom .= '</ul>';
		}
	}

   // ! Action Method

   /**
	* Adds output to the current buffer.
	*
	* @param String $content Output to append to current buffer.
	* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
	* @since v1.3.0
	* @access Public
	* @return Void
	*/
	function appendBuffer ( $content )
	{
		$this->buffer .= $content;
	}

   // ! Action Method

   /**
	* Your friendly neighborhood tranfer screen.
	*
	* @param String  $msg      Message to display to user.
	* @param String  $url      Url to redirect to.
	* @param Boolean $redirect Determines whether or not to redirect user.
	* @param Boolean $flush	   Determines whether or not to flush all message 
	* output, or display it on top of current output.
	* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
	* @since v1.3.0
	* @access Public
	* @return Void
	*/
	function messenger ( $msg, $url = '', $redirect = true, $flush = true )
	{
		$this->clearBuffer ();

		$trail = '';

		if ( $redirect )
		{
			@header ( "Refresh: 6; url={$url}" );
			$trail = "<a href='{$url}'>{$this->_System->LanguageHandler->error_continue}</a>";
		}

		$this->buffer .= "<div id=\"message\">";
		$this->buffer .= "<h3>{$this->_System->LanguageHandler->error_message}</h3>";
		$this->buffer .= "<p>{$msg}<span>( {$trail} )</span></p>";
		$this->buffer .= "</div>";

		if ( $flush )
		{
			$this->flushBuffer ();
			exit ();
		}
	}

   // ! Action Method

   /**
	* Generates a simple system warning message.
	*
	* @param none
	* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
	* @since v1.3.0
	* @access Public
	* @return String
	*/
	function warning ($msg, $flush = true, $list = '' )
	{
		$this->buffer =	'';

		$this->buffer .= "<div id=\"warning\">";
		$this->buffer .= "<h3>{$this->_System->LanguageHandler->error_header}</h3>";
		$this->buffer .= "<p>{$msg}</p>";
		$this->buffer .= $list;
		$this->buffer .= "</div>";

		if ( $flush )
		{
			$this->flushBuffer ();
			exit ();
		}
	}

   // ! Action Method

   /**
	* This method checks the CHMOD settings of specific files
	* that require 'write' access and generates a list of files
	* or folders that need proper CHMOD'ing.
	*
	* @param none
	* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
	* @since v1.3.0
	* @access Private
	* @return String
	*/
	function _checkPerms ()
	{
		$files = array( $this->_System->LanguageHandler->file_check_config	=> SYSTEM_PATH . 'config/settings.php',
						$this->_System->LanguageHandler->file_check_lang	=> SYSTEM_PATH . 'lang/',
						$this->_System->LanguageHandler->file_check_dlang	=> SYSTEM_PATH . 'lang/english/',
						$this->_System->LanguageHandler->file_check_skin	=> SYSTEM_PATH . 'skins/',
						$this->_System->LanguageHandler->file_check_dskin	=> SYSTEM_PATH . 'skins/1/',
						$this->_System->LanguageHandler->file_check_css		=> SYSTEM_PATH . 'skins/1/styles.css',
						$this->_System->LanguageHandler->file_check_demo	=> SYSTEM_PATH . 'skins/1/emoticons/',
						$this->_System->LanguageHandler->file_check_atta	=> SYSTEM_PATH . 'uploads/attachments/',
						$this->_System->LanguageHandler->file_check_ava		=> SYSTEM_PATH . 'uploads/avatars/' );

		$errors = '';

		foreach ( $files as $key => $val )
		{
			if ( false == is_writable ( $val ) )
			{
				$errors	.= "<li>{$key} ( {$val} )</li>";
			}
		}

		if ( $errors )
		{
			return "<ul>{$errors}</ul>";
		}

		return false;
	}

   // ! Accessor Method

   /**
	* Retrieves the permission set of the current
	* user's permissions group.
	*
	* @param Integer $group Id of assigned administrator group.
	* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
	* @since v1.3.0
	* @access Private
	* @return Array
	*/
	function _getPerms ( $group )
	{
		$sql = $this->_System->DatabaseHandler->query ( "
		SELECT *
		FROM " . DB_PREFIX . "admins
		WHERE admin_id = {$group}" );

		$perms = array();

		foreach ( $sql->getRow () as $key => $val )
		{
			$perms[ $key ] = $val;
		}

		return $perms;
	}

   // ! Accessor Method

   /**
	* Checks the provided permission to check access.
	*
	* @param String $perm Permission name to check
	* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
	* @since v1.3.0
	* @access Public
	* @return Boolean
	*/
	function canAccess ( $perm )
	{
		return $this->_perms[ $perm ] ? true : false;
	}

   // ! Action Method

   /**
	* Flushes all data currently held within the 
	* buffer.
	*
	* @param none
	* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
	* @since v1.3.0
	* @access Public
	* @return Void
	*/
	function flushBuffer ()
	{
		if ( $list = $this->_checkPerms () )
		{
			$this->warning ($this->_System->LanguageHandler->chmod_config, false, $list );
		}

		include SYSTEM_PATH . 'admin/lib/theme/layout.php';
	}

   // ! Action Method

   /**
	* Clears the current output buffer.
	*
	* @param none
	* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
	* @since v1.3.0
	* @access Public
	* @return Void
	*/
	function clearBuffer ()
	{
		$this->buffer = '';
	}
}

?>