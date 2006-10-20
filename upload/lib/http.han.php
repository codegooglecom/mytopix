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
class HttpHandler
{
   // ! Action Method

   /**
    * Comment
    *
    * @param String $string Description
    * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
    * @since v1.0
    * @return String
    */
    function HttpHandler()
	{

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
    function checkVars(& $array)
    {
        foreach($array as $key => $val)
        {
            if(false == is_array($val))
            {
                $val = HttpHandler::_cleanVal(rtrim($val));

                $array[$key] = $val;
            }
            else {
                $array[$key] = HttpHandler::checkVars($val);
            }

            if(false == $key) unset($array[$key]);
        }
        
        return $array;
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
    function _cleanVal(& $val)
    {
        if(false == $val)
        {
            return '';
        }

        if(PHP_MAGIC_GPC)
        {
            $val = stripslashes($val);
        }

        $val = str_replace("&" , "&amp;",  $val);
    	$val = str_replace(">",  "&gt;",   $val);
    	$val = str_replace("<",  "&lt;",   $val);
    	$val = str_replace("\"", "&quot;", $val);
        $val = str_replace("'",  "&#39;",  $val);

        $val = preg_replace("/\\\(?!&amp;#|\?#)/", "&#092;", $val);

        return $val;
    }
}

?>