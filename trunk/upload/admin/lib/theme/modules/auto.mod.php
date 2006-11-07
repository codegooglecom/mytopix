<?php

/**
* Moderator Tools Class
*
* This object creates an abstraction layer for all 
* commonly used moderator functions and provides a
* simple API for use throughout the system.
*
* @license http://www.jaia-interactive.com/licenses/mytopix/
* @version $Id: auto.mod.php murdochd Exp $
* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
* @company Jaia Interactive http://www.jaia-interactive.com/
* @package MyTopix | Personal Message Board
*/
class ModuleObject extends MasterObject
{
   /**
	* System configuration array
	* @access Private
	* @var Array
	*/
	var $_id;

   /**
	* System configuration array
	* @access Private
	* @var Array
	*/
	var $_code;

   /**
	* System configuration array
	* @access Private
	* @var Array
	*/
	var $_hash;

   /**
	* System configuration array
	* @access Private
	* @var Array
	*/
	var $MyPanel;

   // !	Action Method

   /**
	* Instansiates class and defines instance variables.
	*
	* @param Object $DatabaseHandler Database layer object
	* @param Object $ForumHandler    Forum handling object
	* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
	* @since v 1.3.0
	* @access Private
	* @return Void
	*/
	function ModuleObject ( & $module, & $config )
	{
		$this->MasterObject ( $module, $config );

		$this->_id   = isset ( $this->get[ 'id' ] )    ? (int) $this->get[ 'id' ]    : 0;
		$this->_code = isset ( $this->get[ 'code' ] )  ?       $this->get[ 'code' ]  : 00;
		$this->_hash = isset ( $this->post[ 'hash' ] ) ?       $this->post[ 'hash' ] : null;

		require_once SYSTEM_PATH . 'admin/lib/mypanel.php';
		$this->MyPanel = new MyPanel ( $this );
	}

   // ! Action Method

   /**
	* This method pins or unpins either a single topic or
	* multiple topics.
	*
	* @param none
	* the effects of this method
	* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
	* @since v 1.3.0
	* @access Public
	* @return Bool
	*/
	function execute()
	{
		$this->MyPanel->addHeader ( $this->LanguageHandler->auto_main_header );

		switch ( $this->_code )
		{
			case '00':
				$this->MyPanel->_make_nav ( 6, 24, 50 );
				$this->_showAutoList();
				break;

			case '01':
				$this->MyPanel->_make_nav ( 6, 24, 51 );
				$this->_showAddForm();
				break;

			case '02':
				$this->MyPanel->_make_nav ( 6, 24, 51 );
				$this->_addAutoMod();
				break;

			case '03':
				$this->MyPanel->_make_nav ( 6, 24, -10 );
				$this->_showEditForm();
				break;

			case '04':
				$this->MyPanel->_make_nav ( 6, 24, -10 );
				$this->_editAutoMod();
				break;

			case '05':
				$this->MyPanel->_make_nav ( 6, 24, -10 );
				$this->_removeAutoMod();
				break;

			default:
				$this->MyPanel->_make_nav ( 6, 24, 50 );
				$this->_showAutoList();
				break;
		}

		$this->MyPanel->flushBuffer();
	}

   // ! Action Method

   /**
	* This method pins or unpins either a single topic or
	* multiple topics.
	*
	* @param none
	* the effects of this method
	* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
	* @since v 1.3.0
	* @access Public
	* @return Bool
	*/
	function _showAutoList()
	{
		$this->MyPanel->appendBuffer ( $this->LanguageHandler->auto_main_tip );
		$this->MyPanel->appendBuffer ( $this->LanguageHandler->auto_main_warn );

		$sql = $this->DatabaseHandler->query ( "SELECT * FROM " . DB_PREFIX . "auto_mod ORDER BY auto_id" );

		$this->MyPanel->table->addColumn ( $this->LanguageHandler->auto_main_table_id,   ' width="1%" align="center"' );
		$this->MyPanel->table->addColumn ( $this->LanguageHandler->auto_main_table_name, ' align="left"' );
		$this->MyPanel->table->addColumn ( '&nbsp;', " width='10%'" );

		$this->MyPanel->table->startTable ( $this->LanguageHandler->auto_main_table_title );

			if ( false == $sql->getNumRows() )
			{
					$this->MyPanel->table->addRow ( array ( array ( $this->LanguageHandler->auto_main_table_none, ' colspan="3" align="center"' ) ) );
			}
			else {
				while ( $row = $sql->getRow() )
				{
					$this->MyPanel->table->addRow ( array ( array ( "<strong>{$row['auto_id']}</strong>", ' align="center"' ),
												    array ( $row[ 'auto_title' ] ),
												    array ( "<a href=\"" . GATEWAY . "?a=auto&amp;code=03&amp;id={$row['auto_id']}\">{$this->LanguageHandler->link_edit}</a> <a href=\"" . GATEWAY . "?a=auto&amp;code=05&amp;id={$row['auto_id']}\" onclick='return confirm(\"{$this->LanguageHandler->auto_err_confirm}\");'>{$this->LanguageHandler->link_delete}</a>", " align='center'" ) ) );

				}
			}

		$this->MyPanel->table->endTable();
		$this->MyPanel->appendBuffer ( $this->MyPanel->table->flushBuffer() );
	}

   // ! Action Method

   /**
	* This method pins or unpins either a single topic or
	* multiple topics.
	*
	* @param none
	* the effects of this method
	* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
	* @since v 1.3.0
	* @access Public
	* @return Bool
	*/
	function _showAddForm()
	{
		$arr_pin  = array ( 0 => $this->LanguageHandler->auto_form_nothing,
							1 => $this->LanguageHandler->auto_form_pin,
							2 => $this->LanguageHandler->auto_form_unpin );

		$arr_lock = array ( 0 => $this->LanguageHandler->auto_form_nothing,
							1 => $this->LanguageHandler->auto_form_lock,
							2 => $this->LanguageHandler->auto_form_unlock );

		$this->MyPanel->form->startForm ( GATEWAY . '?a=auto&amp;code=02' );
		$this->MyPanel->appendBuffer ( $this->MyPanel->form->flushBuffer() );

			$this->MyPanel->form->addTextBox ( 'auto_title', false, false, array (1,
												$this->LanguageHandler->auto_form_title_title,
												$this->LanguageHandler->auto_form_title_desc ) );

			$forum_select = $this->ForumHandler->makeDropDown();

			$this->MyPanel->form->addWrapSelect ('forums[]', false, false, " size='5' style='width: 98%;' multiple=\"multiple\"", array ( 1, 
												  $this->LanguageHandler->auto_form_forum_title,
												  $this->LanguageHandler->auto_form_forum_desc ), false, 
												  $forum_select );

			$this->MyPanel->form->addTextBox ( 'auto_prefix', false, false, array ( 1,
												$this->LanguageHandler->auto_form_prefix_title,
												$this->LanguageHandler->auto_form_prefix_desc ) );

			$this->MyPanel->form->addTextBox ( 'auto_suffix', false, false, array ( 1, 
												$this->LanguageHandler->auto_form_suffix_title,
												$this->LanguageHandler->auto_form_suffix_desc ) );

			$this->MyPanel->form->addWrapSelect ( 'lock', $arr_lock, false, false, array ( 1,
												  $this->LanguageHandler->auto_form_lock_title,
												  $this->LanguageHandler->auto_form_lock_desc ) );

			$this->MyPanel->form->addWrapSelect ( 'pin', $arr_pin, false, false, array(1,
												   $this->LanguageHandler->auto_form_pin_title,
												   $this->LanguageHandler->auto_form_pin_desc ) );

			$forum_select  = "<option value=\"0\">{$this->LanguageHandler->auto_form_nothing}</option>";
			$forum_select .= $this->ForumHandler->makeDropDown();

			$this->MyPanel->form->addWrapSelect ( 'move_forum', false, false, false, array (1, 
												   $this->LanguageHandler->auto_form_move_title,
												   $this->LanguageHandler->auto_form_move_desc ), false, 
												   $forum_select );

			$this->MyPanel->form->addCheckBox ( 'move_link', 1, false, false, false, false, $this->LanguageHandler->auto_form_move_link);

			$this->MyPanel->form->addTextArea ( 'reply', false, false, array ( 1, 
												$this->LanguageHandler->auto_form_reply_title,
												$this->LanguageHandler->auto_form_reply_desc ) );

			$this->MyPanel->form->addCheckBox ( 'reply_code', 1, false, false, false, true, $this->LanguageHandler->auto_form_code );

			$this->MyPanel->form->addCheckBox ( 'reply_emoticons', 1, false, false, false, true, $this->LanguageHandler->auto_form_emoticons );

			$this->MyPanel->form->addHidden ( 'hash', $this->UserHandler->getUserHash() );

		$this->MyPanel->form->endForm();
		$this->MyPanel->appendBuffer ( $this->MyPanel->form->flushBuffer() );
	}

   // ! Action Method

   /**
	* This method pins or unpins either a single topic or
	* multiple topics.
	*
	* @param none
	* the effects of this method
	* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
	* @since v 1.3.0
	* @access Public
	* @return Bool
	*/
	function _addAutoMod()
	{
		if ( $this->_hash != $this->UserHandler->getUserhash() )
		{
			$this->MyPanel->messenger ( $this->LanguageHandler->invalid_access, $this->config[ 'site_link' ] );
		}
		
		extract ( $this->post );

		if ( false == $auto_title )
		{
			return $this->MyPanel->messenger ( $this->LanguageHandler->auto_err_title, GATEWAY . '?a=auto&amp;code=01' );
		}

		if ( false == $auto_prefix &&
			 false == $auto_suffix &&
			 false == $pin         &&
			 false == $lock	       &&
			 false == $move_forum  &&
			 false == $reply )
		{
			return $this->MyPanel->messenger ( $this->LanguageHandler->auto_err_nothing, GATEWAY . '?a=auto&amp;code=01' );
		}

		$auto_prefix = $this->ParseHandler->uncleanString ( $auto_prefix );
		$auto_suffix = $this->ParseHandler->uncleanString ( $auto_suffix );

		$this->DatabaseHandler->query ( "
		INSERT INTO " . DB_PREFIX . "auto_mod (
			auto_title,
			auto_forums,
			auto_prefix,
			auto_suffix,
			auto_state,
			auto_pin,
			auto_move,
			auto_move_link,
			auto_response,
			auto_code,
			auto_emoticons)
		VALUES (
			'{$auto_title}',
			'" . addslashes(serialize($forums)) . "',
			'{$auto_prefix}',
			'{$auto_suffix}',
			" . (int) $lock . ",
			" . (int) $pin  . ",
			" . (int) $move_forum . ",
			" . (int) $move_link . ",
			'" . trim ( $reply ) . "',
			" . (int) $reply_code . ",
			" . (int) $reply_emoticons . ")" );

		$this->CacheHandler->updateCache ( 'auto' );

		return $this->MyPanel->messenger ( $this->LanguageHandler->auto_err_add_done, GATEWAY . '?a=auto' );
	}

   // ! Action Method

   /**
	* This method pins or unpins either a single topic or
	* multiple topics.
	*
	* @param none
	* the effects of this method
	* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
	* @since v 1.3.0
	* @access Public
	* @return Bool
	*/
	function _showEditForm()
	{
		$sql = $this->DatabaseHandler->query ( "SELECT * FROM " . DB_PREFIX . "auto_mod WHERE auto_id = {$this->_id}" );

		if ( false == $sql->getNumRows() )
		{
			return $this->MyPanel->messenger ( $this->LanguageHandler->auto_err_no_match, GATEWAY . '?a=auto' );
		}

		$mod = $sql->getRow();

		$arr_pin  = array ( 0 => $this->LanguageHandler->auto_form_nothing,
							1 => $this->LanguageHandler->auto_form_pin,
							2 => $this->LanguageHandler->auto_form_unpin );

		$arr_lock = array ( 0 => $this->LanguageHandler->auto_form_nothing,
							1 => $this->LanguageHandler->auto_form_lock,
							2 => $this->LanguageHandler->auto_form_unlock );

		$this->MyPanel->form->startForm ( GATEWAY . "?a=auto&amp;code=04&amp;id={$this->_id}" );
		$this->MyPanel->appendBuffer ( $this->MyPanel->form->flushBuffer() );

			$this->MyPanel->form->addTextBox ( 'auto_title', $mod[ 'auto_title' ], false, array (1,
												$this->LanguageHandler->auto_form_title_title,
												$this->LanguageHandler->auto_form_title_desc ) );

			$forum_select = $this->_makeDropDown ( unserialize ( stripslashes ( $mod[ 'auto_forums' ] ) ) );

			$this->MyPanel->form->addWrapSelect ('forums[]', false, false, " size='5' style='width: 98%;' multiple=\"multiple\"", array ( 1, 
												  $this->LanguageHandler->auto_form_forum_title,
												  $this->LanguageHandler->auto_form_forum_desc ), false, 
												  $forum_select );

			$this->MyPanel->form->addTextBox ( 'auto_prefix', $mod[ 'auto_prefix' ], false, array ( 1,
												$this->LanguageHandler->auto_form_prefix_title,
												$this->LanguageHandler->auto_form_prefix_desc ) );

			$this->MyPanel->form->addTextBox ( 'auto_suffix', $mod[ 'auto_suffix' ], false, array ( 1, 
												$this->LanguageHandler->auto_form_suffix_title,
												$this->LanguageHandler->auto_form_suffix_desc ) );

			$this->MyPanel->form->addWrapSelect ( 'lock', $arr_lock, $mod[ 'auto_state' ], false, array ( 1,
												  $this->LanguageHandler->auto_form_lock_title,
												  $this->LanguageHandler->auto_form_lock_desc ) );

			$this->MyPanel->form->addWrapSelect ( 'pin', $arr_pin, $mod[ 'auto_pin' ], false, array(1,
												   $this->LanguageHandler->auto_form_pin_title,
												   $this->LanguageHandler->auto_form_pin_desc ) );

			$forum_select  = "<option value=\"0\">{$this->LanguageHandler->auto_form_nothing}</option>";
			$forum_select .= $this->ForumHandler->makeDropDown( $mod[ 'auto_move' ] );

			$this->MyPanel->form->addWrapSelect ( 'move_forum', false, false, false, array (1, 
												   $this->LanguageHandler->auto_form_move_title,
												   $this->LanguageHandler->auto_form_move_desc ), false, 
												   $forum_select );

			$this->MyPanel->form->addCheckBox ( 'move_link', 1, false, false, false, $mod[ 'auto_move_link' ], $this->LanguageHandler->auto_form_move_link);

			$this->MyPanel->form->addTextArea ( 'reply', $mod[ 'auto_response' ], false, array ( 1, 
												$this->LanguageHandler->auto_form_reply_title,
												$this->LanguageHandler->auto_form_reply_desc ) );

			$this->MyPanel->form->addCheckBox ( 'reply_code', 1, false, false, false, $mod[ 'auto_code' ], $this->LanguageHandler->auto_form_code );

			$this->MyPanel->form->addCheckBox ( 'reply_emoticons', 1, false, false, false, $mod[ 'auto_emoticons' ], $this->LanguageHandler->auto_form_emoticons );

			$this->MyPanel->form->addHidden ( 'hash', $this->UserHandler->getUserHash() );

		$this->MyPanel->form->endForm();
		$this->MyPanel->appendBuffer ( $this->MyPanel->form->flushBuffer() );
	}

   // ! Action Method

   /**
	* This method pins or unpins either a single topic or
	* multiple topics.
	*
	* @param none
	* the effects of this method
	* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
	* @since v 1.3.0
	* @access Public
	* @return Bool
	*/
	function _editAutoMod()
	{
		if ( $this->_hash != $this->UserHandler->getUserhash() )
		{
			$this->MyPanel->messenger ( $this->LanguageHandler->invalid_access, $this->config[ 'site_link' ] );
		}
		
		extract ( $this->post );

		$sql = $this->DatabaseHandler->query ( "SELECT * FROM " . DB_PREFIX . "auto_mod WHERE auto_id = {$this->_id}" );

		if ( false == $sql->getNumRows() )
		{
			return $this->MyPanel->messenger ( $this->LanguageHandler->auto_err_no_match, GATEWAY . '?a=auto' );
		}

		if ( false == $auto_title )
		{
			return $this->MyPanel->messenger ( $this->LanguageHandler->auto_err_title, GATEWAY . "?a=auto&amp;code=03&amp;id={$this->_id}" );
		}

		if ( false == $auto_prefix &&
			 false == $auto_suffix &&
			 false == $pin         &&
			 false == $lock	       &&
			 false == $move_forum  &&
			 false == $reply )
		{
			return $this->MyPanel->messenger ( $this->LanguageHandler->auto_err_nothing, GATEWAY . "?a=auto&amp;code=03&amp;id={$this->_id}" );
		}

		$auto_prefix = $this->ParseHandler->uncleanString ( $auto_prefix );
		$auto_suffix = $this->ParseHandler->uncleanString ( $auto_suffix );

		$this->DatabaseHandler->query ( "
		UPDATE " . DB_PREFIX . "auto_mod SET
			auto_title     = '{$auto_title}',
			auto_forums    = '" . addslashes(serialize($forums)) . "',
			auto_prefix    = '{$auto_prefix}',
			auto_suffix    = '{$auto_suffix}',
			auto_state     = " . (int) $lock . ",
			auto_pin       = " . (int) $pin  . ",
			auto_move      = " . (int) $move_forum . ",
			auto_move_link = " . (int) $move_link . ",
			auto_response  = '" . trim ( $reply ) . "',
			auto_code      = " . (int) $reply_code . ",
			auto_emoticons = " . (int) $reply_emoticons . "
		WHERE auto_id = {$this->_id}" );

		$this->CacheHandler->updateCache ( 'auto' );

		return $this->MyPanel->messenger ( $this->LanguageHandler->auto_err_edit_done, GATEWAY . "?a=auto&amp;code=03&amp;id={$this->_id}" );
	}

   // ! Action Method

   /**
	* This method pins or unpins either a single topic or
	* multiple topics.
	*
	* @param none
	* the effects of this method
	* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
	* @since v 1.3.0
	* @access Public
	* @return Bool
	*/
	function _removeAutoMod()
	{
		$sql = $this->DatabaseHandler->query ( "SELECT * FROM " . DB_PREFIX . "auto_mod WHERE auto_id = {$this->_id}" );

		if ( false == $sql->getNumRows() )
		{
			return $this->MyPanel->messenger ( $this->LanguageHandler->auto_err_no_match, GATEWAY . '?a=auto' );
		}

		$sql = $this->DatabaseHandler->query ( "DELETE FROM " . DB_PREFIX . "auto_mod WHERE auto_id = {$this->_id}" );

		$this->CacheHandler->updateCache ( 'auto' );

		header ( "LOCATION: " . GATEWAY . "?a=auto" );
	}

   // !	Action Method

   /**
	* Builds a full	and	unrestricted forum list	dropdown. This
	* function is mainly used within the admin control panel.
	*
	* @param Int	$select	Autoselects	an entry based on this number
	* @param Int	$parent	The	next forum to cycle	through	the	tree
	* @param String	$space	Generates spacing for child	categories
	* @author Daniel Wilhelm II	Murdoch	<jaiainteractive@gmail.com>
	* @since v1.3.0
	* @access public
	* @return String
	*/
	function _makeDropDown ( $select = array(), $parent = 0, $space = '' )
	{
		$out = null;

		foreach ( $this->_sortForums ( $parent ) as $val )
		{
			$dot      = $parent ? '&nbsp;|' : '';
			$selected = '';

			if ( $select && in_array ( $val[ 'forum_id' ], $select ) == $select )
			{
				$selected =	" selected=\"selected\"";
			}

			$out .=	"<option value=\"{$val['forum_id']}\"{$selected}>{$dot}{$space}	{$val['forum_name']}" .
					"</option>\n" .	$this->_makeDropDown ( $select, $val[ 'forum_id' ], $space . '--' );
		}

		return $out;
	}

   // !	Action Method

   /**
	* Searches for child categories	based on the provided
	* parent category id.
	*
	* @param Int $parent Parent	id used	to find	children
	* @author Daniel Wilhelm II	Murdoch	<jaiainteractive@gmail.com>
	* @since v1.3.0
	* @access private
	* @return Array
	*/
	function _sortForums ( $parent )
	{
		$array = array();

		foreach ( $this->ForumHandler->getForumList() as $key => $val )
		{
			if ( $val[ 'forum_parent' ] == $parent )
			{
				$array[] = $val;
			}
		}

		return $array;
	}
}

?>