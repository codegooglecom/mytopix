<?php

if(!defined('MYPANEL')) die('<b>ERROR:</b> Hack attempt detected!');

/**
* Onepanel's Form Handling Class
*
* Allows a developer to create forms and fields on the fly without
* having to worry about playing with (X)HTML markup.
*
* @version $Id: form.han.php murdochd Exp $
* @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
* @package Onepanel
*/
class MyForm
{
  /**
   * Holds current form buffer.
   * @access private
   * @var String
   */
	var $buffer;

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
	function MyForm()
	{
		$this->buffer = '';
	}

  /**
   * Action Method
   *
   * Wraps provided content into a pretty form 
   * display.
   *
   * @param String $tag	Form field to wrap.
   * @param String $title  Wrapper title.
   * @param String $desc   Wrapper description
   * @param String $append Gives the choice to either append to current buffer or flush into variable
   * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
   * @since v1.0 BETA
   * @access public
   */
	function addWrap($tag, $title, $desc, $append = false)
	{
		$out  = "<h1>{$title}</h1>\n";
		$out .= "<h2>{$desc}</h2>\n";
		$out .= "{$tag}\n";
	
		if(!$append) return $out;

		$this->buffer .= $out;
	}

  /**
   * Action Method
   *
   * Generates a drop down list with provided parameters.
   *
   * @param String $name   Select field name.
   * @param Array  $list   Select field values / labels.
   * @param String $offset Currently highlighted value.
   * @param String $extra  Extra tags or data.
   * @param Array  $wrap   Field wrapper definitions.
   * @param Bool   $return Gives the choice to either append to current buffer or flush into variable
   * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
   * @since v1.0 BETA
   * @access public
   */
	function addSelect($name, $list, $offset = null, $extra = '', $wrap = null, $return = false, $add = '')
	{
		$out  = "<select name='{$name}'{$extra}>\n";
		foreach($list as $key => $val)
		{
			$sel  = $key == $offset ? " selected='selected'" : '';
			$out .= "\t<option value='{$key}'{$sel}>{$val}</option>\n";
		}
		$out .= $add;
		$out .= "</select>\n";

		if(isset($wrap['0'])) $out = $this->addWrap($out, $wrap['1'], $wrap['2']);

		if($return)	return $out;

		$this->buffer .= $out;
	}

	function addWrapSelect($name, $list, $offset = null, $extra = '', $wrap = null, $return = false, $add = '', $label = '')
	{
		$out  = "<div class=\"checkwrap\"><select name='{$name}'{$extra}>\n";
		foreach($list as $key => $val)
		{
			$sel  = $key == $offset ? " selected='selected'" : '';
			$out .= "\t<option value='{$key}'{$sel}>{$val}</option>\n";
		}
		$out .= $add;
		$out .= "</select> {$label}</div>\n";

		if(isset($wrap['0'])) $out = $this->addWrap($out, $wrap['1'], $wrap['2'], false);

		if($return)	return $out;

		$this->buffer .= $out;
	}


  /**
   * Action Method
   *
   * Generates a textbox based on provided parameters.
   *
   * @param String $name   Input field name
   * @param String $value  Input field value
   * @param String $extra  Extra tags or data
   * @param Array  $wrap   Field wrapper definitions
   * @param Bool   $return Gives the choice to either append to current buffer or flush into variable
   * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
   * @since v1.0 BETA
   * @access public
   */
	function addTextBox($name, $value = '', $extra = '', $wrap = null, $return = false)
	{
		
		$out = "<input type='text' name='{$name}'{$extra} value='{$value}' />";
	
		if(isset($wrap['0'])) $out = $this->addWrap($out, $wrap['1'], $wrap['2']);

		if($return)	return $out;

		$this->buffer .= $out;
	}

  /**
   * Action Method
   *
   * Generates a password box based on provided parameters.
   *
   * @param String $name   Input field name
   * @param String $value  Input field value
   * @param String $extra  Extra tags or data
   * @param Array  $wrap   Field wrapper definitions
   * @param Bool   $return Gives the choice to either append to current buffer or flush into variable
   * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
   * @since v1.0 BETA
   * @access public
   */
	function addPassBox($name, $value = '', $extra = '', $wrap = null, $return = false)
	{
		
		$out = "<input type='password' name='{$name}'{$extra} value='{$value}' />";
	
		if(isset($wrap['0'])) $out = $this->addWrap($out, $wrap['1'], $wrap['2']);

		if($return)	return $out;

		$this->buffer .= $out;
	}

  /**
   * Action Method
   *
   * Generates a textarea based on provided parameters.
   *
   * @param String $name   Input field name
   * @param String $value  Input field value
   * @param String $extra  Extra tags or data
   * @param Array  $wrap   Field wrapper definitions
   * @param Bool   $return Gives the choice to either append to current buffer or flush into variable
   * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
   * @since v1.0 BETA
   * @access public
   */
	function addTextArea($name, $value = '', $extra = '', $wrap = null, $return = false)
	{
		$out = "<textarea name='{$name}'{$extra} cols='' rows=''>{$value}</textarea>";

		if($wrap['0']) $out = $this->addWrap($out, $wrap['1'], $wrap['2']);

		if($return)	return $out;

		$this->buffer .= $out;		
	}

  /**
   * Action Method
   *
   * Generates a hidden form field based on provided parameters.
   *
   * @param String $name   Input field name
   * @param String $value  Input field value
   * @param Bool   $return Gives the choice to either append to current buffer or flush into variable
   * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
   * @since v1.0 BETA
   * @access public
   */
	function addHidden($name, $value = '', $return = false)
	{
		$out = "<input type='hidden' name='{$name}' value='{$value}' />";

		if($return)	return $out;

		$this->buffer .= $out;
	}

  /**
   * Action Method
   *
   * Generates a toggle checkbox based on provided parameters.
   *
   * @param String $name	Input field name
   * @param String $value   Input field value
   * @param String $extra   Extra tags or data
   * @param Array  $wrap	Field wrapper definitions
   * @param Bool   $return  Gives the choice to either append to current buffer or flush into variable
   * @param Bool   $checked Checks/Unchecks current field
   * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
   * @since v1.0 BETA
   * @access public
   */
	function addYesNo($name, $value, $extra = '', $wrap = null, $return = false, $checked = true)
	{
		$check = array();

		if($checked)
		{
			$check['on']  = " checked='checked'";
			$check['off'] = '';
		}
		else
		{
			$check['on']  = '';
			$check['off'] = " checked='checked'";
		}

		$out  = "<p class=\"nobox\"><input type='radio' value='0' class='check' name='{$name}' {$check['off']} /> no\n</p>";
		$out .= "<p class=\"yesbox\"><input type='radio' value='1' class='check' name='{$name}' {$check['on']} /> yes</p>\n";

		if(isset($wrap['0'])) $out = $this->addWrap($out, $wrap['1'], $wrap['2']);

		if($return)	return $out;

		$this->buffer .= $out;	
	}

  /**
   * Action Method
   *
   * Generates a radio button based on provided parameters.
   *
   * @param String $name	Input field name
   * @param String $value   Input field value
   * @param String $extra   Extra tags or data
   * @param Array  $wrap	Field wrapper definitions
   * @param Bool   $return  Gives the choice to either append to current buffer or flush into variable
   * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
   * @since v1.0 BETA
   * @access public
   */
	function addRadio($name, $value = '', $extra = '', $wrap = null, $return = false)
	{
		static $i;

		$i++;

		$out  = "<div class=\"checkwrap\"><input type='radio' value='{$value}' class='check' id='radio_{$name}_{$i}' name='{$name}'{$extra} />";

		if(is_array($wrap['0']))
		{
			$out = $this->addWrap($out, $wrap['1'], $wrap['2']);
		}
		elseif(is_string($wrap))
		{
			$out .= "<label for=\"radio_{$name}_{$i}\"><strong>{$wrap}</strong></label>";
		}

		if($return)	return $out . "\n</div>";

		$this->buffer .= $out . "\n</div>";	
	}

  /**
   * Action Method
   *
   * Generates a checkbox field based on provided parameters.
   *
   * @param String $name   Input field name
   * @param String $value  Input field value
   * @param String $extra  Extra tags or data
   * @param Array  $wrap   Field wrapper definitions
   * @param Bool   $return Gives the choice to either append to current buffer or flush into variable
   * @param Bool   $check  Checks/Unchecks current field
   * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
   * @since v1.0 BETA
   * @access public
   */
	function addCheckBox($name, $value, $extra = '', $wrap = null, $return = false, $check = false, $label = '', $align = 'left', $style = "checkwrap")
	{
		static $i;

		$i++;

		$new_name = str_replace ( '[]', '', $name );

		if($label)
		{
			$label = "<label for=\"check_{$new_name}_{$i}\"><strong>{$label}</strong></label>";
		}

		$check = $check ? " checked='checked'" : '';
		$out   = "<div class=\"{$style}\" style=\"text-align: {$align};\"><input type='checkbox' class='check' id='check_{$new_name}_{$i}' name='{$name}' value='{$value}'{$check}{$extra} /> {$label}</div>";

		if(is_array($wrap))
		{
			$out = $this->addWrap($out, $wrap['1'], $wrap['2']);
		}

		if($return)	return $out;

		$this->buffer .= $out;
	}

  /**
   * Action Method
   *
   * Generates a file upload field based on provided parameters.
   *
   * @param String $name   Input field name
   * @param Array  $wrap   Field wrapper definitions
   * @param Bool   $return Gives the choice to either append to current buffer or flush into variable
   * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
   * @since v1.0 BETA
   * @access public
   */
	function addFile($name, $wrap = null, $return = false)
	{
		$out = "<input type='file' name='{$name}' />";

		if($wrap['0']) $out = $this->addWrap($out, $wrap['1'], $wrap['2']);

		if($return)	return $out;

		$this->buffer .= $out;		
	}

  /**
   * Action Method
   *
   * Creates a new form based on provided parameters.
   *
   * @param String $action URI to executable action
   * @param String $name   The form's name
   * @param String $method POST or GET methods will go here
   * @param String $extra  Extra tags or data
   * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
   * @since v1.0 BETA
   * @access public
   */
	function startForm($action, $name = '', $method = 'POST', $extra = '')
	{
		$name = $name ? "name='{$name}'" : '';

		$this->buffer .= "<div id=\"formwrap\">";
		$this->buffer .= "<form method='{$method}' action='{$action}' {$name} {$extra}>\n";
	}

  /**
   * Action Method
   *
   * Completes the form with adding submit
   * buttons.
   *
   * @param String $title  Submit field header title.
   * @param Array  $extra  Extra tags or data.
   * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
   * @since v1.0 BETA
   * @access public
   */
	function endForm($submit = 'Submit Entry')
	{
		$this->buffer .= "\t<p class=\"submit\">\n";
		$this->buffer .= "\t\t<input type='submit' class='button' value='{$submit}' />";
		$this->buffer .= "&nbsp;";
		$this->buffer .= "<input type='reset' class='reset' value='Reset Form' />\n";
		$this->buffer .= "\t</p>\n";
		$this->buffer .= "</form>\n";
		$this->buffer .= "</div>";
	}

  /**
   * Action Method
   *
   * Adds more content to the end of the
   * current buffer.
   *
   * @param String $content New content to append.
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
		$this->buffer = '';

		return $out;
	}

}
?>