<?php

if(!defined('ONEPANEL')) die('<b>ERROR:</b> Hack attempt detected!');

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
class OneTab
{
   /**
    * Variable Description
    * @access Private
    * @var Integer
    */
    var $buffer;

   // ! Action Method

   /**
    * Comment
    *
    * @param String $string Description
    * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
    * @since v1.0
    * @return String
    */
    function OneTab()
    {
        $this->buffer = '';
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
    function addTabs($values, $active)
    {
        if(!is_array($values)) $this->buffer .= '';

        $this->buffer .= "<br />";
		$this->buffer .= "<ul id='tabNav'>\n";

        foreach($values as $key => $val)
        {
            if($active == end(explode('=', $val)))
            {
                $this->buffer .= "\t<li><span>{$key}</span></li>\n";
            }
            else
            {
                $this->buffer .= "\t<li><a href='{$val}'>{$key}</a></li>\n";
            }
        }

        $this->buffer .= "</ul>\n";

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
        $out = $this->buffer;
        $this->buffer = '';

        return $out;
    }
}

?>