<?php

if(!defined('MYPANEL')) die('<b>ERROR:</b> Hack attempt detected!');

/**
* Onepanel's Table Handling Class
*
* Allows a developer to create tables on the fly without
* having to worry about playing with (X)HTML markup.
*
* @version $Id: table.han.php murdochd Exp $
* @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
* @package Onepanel
*/

/**
 * USAGE:
 *
 * The example below will create a table titled 'User List'
 * and will include a list of 3 user rows.
 *
 * $MP = new MyPanel();
 *
 * $MP->table->addColumn('id');
 * $MP->table->addColumn('name');
 * 
 * $MP->table->startTable('<b>User List:</b>');
 * 
 * 	  $MP->table->addRow(array(1, 'Dan'));
 *    $MP->table->addRow(array(4, 'Bob'));
 * 	  $MP->table->addRow(array(7, 'Edd'));
 * 
 * $MP->table->endTable();
 * 
 */

class MyTable
{

  /**
   * Holds current table buffer.
   * @access private
   * @var String
   */
	var $buffer;

  /**
   * Contains the columns headers ( if any ).
   * for currently buffered table.
   * @access private
   * @var Array
   */
	var $columns;


  /**
   * Constructor
   *
   * This initializes instance variables / objects.
   *
   * @param none
   * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
   * @since v1.0 BETA
   * @return void;
   */
	function MyTable()
	{
		$this->buffer  = '';
		$this->columns = array();
	}


  /**
   * Action Method
   *
   * Adds a header column to the table. ( optional )
   *
   * @param string $title The title of the column.
   * @param string $extra Used to add extra tag attributes.
   * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
   * @since v1.0 BETA
   * @access public
   * @return void;
   */
	function addColumn($title, $extra = '')
	{
		$this->columns[] = "\t\t<th class='tblheader'{$extra}>{$title}</th>\n";
	}


  /**
   * Action Method
   *
   * Adds new row of data to the current table. An element of
   * a value can be scalar or array. You use an array for a 
   * value when you wish to add extra attributes to that current 
   * row such as alignment, events or CSS stylings.
   *
   * @param Scalar / Array $value Data applied for display in a row.
   * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
   * @since v1.0 BETA
   * @access public
   * @return void;
   */
	function addRow($value)
	{
		static $i;

		if(!is_array($value)) $this->buffer .= '';

		$this->buffer .= "\t<tr>\n";
		foreach($value as $val)
		{
			$extra = '';
			if(is_array($val))
            {
                @list($val, $extra, $class) = $val;
            }

            if($i % 2 == 0)
            {
                $color = "#FFF";
            }
            else {
                $color = "#FAFAFA";
            }

 			$this->buffer .= "\t\t<td class='{$class}'{$extra} style=\"background-color: {$color};\">{$val}</td>\n";
		}
		$this->buffer .= "\t</tr>\n";

		$i++;
	}


  /**
   * Action Method
   *
   * Creates a new table with a header. Also auto-
   * generates column headers if they exist.
   *
   * @param string $title The title of the table.
   * @param string $extra Used to add extra tag attributes.
   * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
   * @since v1.0 BETA
   * @access public
   * @return void;
   */
	function startTable($title = '', $extra = '')
	{
		$colspan = sizeof($this->columns);
        
		if($title)
		{
			$title = "<tr><td colspan=\"{$colspan}\" class=\"header\">{$title}</td></tr>";
		}

		$this->buffer .= "<div class=\"tablewrap\"><table cellspacing='1' cellpadding='0' class='table'{$extra}>{$title}";

		if($colspan)
		{
			$this->buffer .= "\t<tr>\n";
			foreach($this->columns as $col) $this->buffer .= $col;
			$this->buffer .= "\t</tr>\n";
		}
	}

  /**
   * Action Method
   *
   * Ends the current table.
   *
   * @param none
   * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
   * @since v1.0 BETA
   * @access public
   */
	function endTable($form = false)
	{
		$colspan = sizeof($this->columns);

        if($form)
        {
            $form  = "<span>";
            $form .= "<input type='submit' class='button' value='Submit Form' />&nbsp;";
		    $form .= "<input type='reset' class='reset' value='Reset Form' /></span>";
        }
        else {
            $form = '&nbsp;';
        }

		$this->buffer .= "<tr><td colspan=\"{$colspan}\" class=\"footer\">{$form}</td></tr></table></div>\n";
	}


  /**
   * Action Method
   *
   * Appends content to current buffer.
   *
   * @param String $content Content to append.
   * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
   * @since v1.0 BETA
   * @access public
   */
	function appendBuffer($content)
	{
		$this->buffer .= $content;
	}


  /**
   * Action Method
   *
   * Empties the buffer and flushes all data out of
   * the system.
   *
   * @param none
   * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
   * @since v1.0 BETA
   * @access public
   */
	function flushBuffer()
	{
		$out = $this->buffer;
		$this->buffer  = '';
		$this->columns = array();

		return $out;
	}

}

?>