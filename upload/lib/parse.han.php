<?php

/**
* Text Parsing Handler
*
* The purpose of this class is to give the parent system the ability
* to parse and/or modify a given string.
*
* @version $Id: parse.han.php murdochd Exp $
* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
* @company Jaia Interactive <admin@jaia-interactive.com>
* @package MyTopix Personal Message Board
*/
class ParseHandler
{
   /**
	* Increments by 1 every time the parser
	* finds an image tag.
	* @access Private
	* @var Integer
	*/
	var $_imageCount;

   /**
	* Increments by 1 every time the parser
	* finds an emoticon tag.
	* @access Private
	* @var Integer
	*/
	var $_smilieCount;

   /**
	* Contains words and replacements for
	* the system's word filter.
	* @access Private
	* @var Array
	*/
	var $_filter;

   /**
	* Contains code and image replacements
	* for emoticon parsing.
	* @access Public
	* @var Array
	*/
	var $emoticons;

   /**
	* System Object passed by reference for
	* use within this class.
	* @access Private
	* @var Object
	*/
	var $_config;

   /**
	* System Object passed by reference for
	* use within this class.
	* @access Private
	* @var Object
	*/
	var $_image_cache;

   // ! Constructor Method

   /**
	* Loads class and defines instance variables.
	*
	* @param Object $SystemObject System Object passed by reference
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return Void
	*/
	function ParseHandler(& $emoticons, & $filter, $config)
	{
		$this->_config	  =  $config;

		$this->_imageCount  =  0;
		$this->_smilieCount =  0;

		$this->_cache_filter	=& $filter;
		$this->_cache_emoticons =& $emoticons;

		$this->_filter	  = array();
		$this->emoticons	= array();
		$this->_image_cache = array();
	}

   // ! Action Method

   /**
	* Takes a given string and manipulates it according
	* to passed options.
	*
	* @param String  $string  String to manipulate
	* @param Integer $options String of options for parsing.
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return String
	*/
	function parseText($string, $options = 0)
	{
		if(false == $string)
		{
			return;
		}

		if(false == $options) 
		{
			$options = F_BREAKS;
		}

		if($options & F_CURSE && $this->_config['word_active'])
		{
			$string = $this->_doFilter($string);
		}

		if($options & F_BBSTRIP)
		{
			$string = $this->doBBCodeStrip($string);
		}

		if($options & F_CODE)
		{
			$string = $this->parseBlocks($string);
			$string = $this->parseLinks($string);
			$string = $this->parseSimple($string);
		}

		if($this->_config['wrap_on'])
		{
			$string = $this->doWrapString($string, $this->_config['wrap_count']);
		}

		if($options & F_SMILIES)
		{
			$string = $this->_parseEmoticons($string);
		}

		if($options & F_BREAKS)
		{
			$string = $this->formatBreaks($string);
		}

		return $string;
	}

   // ! Action Method

   /**
	* Simply replaces carriage returns and translates
	* them into simple html <break> tags.
	*
	* @param String $string String to evaluate.
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return String
	*/
	function formatBreaks($string)
	{
		return false == $string ? '' : str_replace(array("\n"), "<br />", $string);
	}

   // ! Action Method

   /**
	* During the POST routine certain charactors are switched to thier
	* html entity equivalents. This simply reverses the effect.
	*
	* @param String $string String to manipulate.
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return String
	*/
	function uncleanString($string, $slashes = false)
	{
		$string = str_replace("&amp;",  "&",  $string);
		$string = str_replace("&gt;",   ">",  $string);
		$string = str_replace("&lt;",   "<",  $string);
		$string = str_replace("&quot;", "\"", $string);
		$string = str_replace("&#39;",  "'",  $string);

		if($slashes)
		{
			return addslashes(str_replace("&#092;", "\\", $string));
		}

		return $string;
	}

   // ! Action Method

   /**
	* Simply replaces carriage returns and translates
	* them into simple html <break> tags.
	*
	* @param String $string String to evaluate.
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return String
	*/
	function cleanString($string)
	{
		$string = str_replace("<", "&lt;",   $string);
		$string = str_replace(">", "&gt;",   $string);
		$string = str_replace('"', "&quot;", $string);
		$string = str_replace("'", '&#039;', $string);
		$string = str_replace("&", "&amp;",  $string);
		
		return $string;
	}

   // ! Action Method

   /**
	* A callback function that increments _imageCount every time
	* it is called.
	*
	* @param none
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return Void
	*/
	function _handleImages()
	{
		$this->_imageCount++;
	}

   // ! Action Method

   /**
	* Checks for image tags and determines whether or not
	* they have exceeded the system's limit per posting.
	*
	* @param String $string String to parse for image counting.
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return Bool
	*/
	function countImages($string)
	{
		$string = preg_replace('#\[img\](http|https|ftp)://(.*?)\[/img\]#ie', 
							   '$this->_handleImages()', $string);

		return ($this->_imageCount > $this->_config['max_images'] ? false : true);
	}

   // ! Action Method

   /**
	* A callback function that increments _smilieCount every time
	* it is called.
	*
	* @param none
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return Void
	*/
	function _handleSmilies()
	{
		$this->_smilieCount++;
	}

   // ! Action Method

   /**
	* Checks for emoticon tags and determines whether or not
	* they have exceeded the system's limit per posting.
	*
	* @param String $string String to parse for emoticon counting.
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return Bool
	*/
	function countSmilies($string)
	{
		if(false == $this->emoticons)
		{
			$this->getEmoticons();
		}

		foreach($this->emoticons as $emoticon)
		{
			$code = preg_quote($emoticon['CODE'], '/');

			preg_replace("#(?<=[^\w/])$code#ei", "\$this->_handleSmilies()", $string);
		}

		return $this->_smilieCount > $this->_config['max_smilies'] ? false : true;
	}

   // ! Action Method

   /**
	* Used to strip post content of all bbcode tags.
	*
	* @param String $string String to strip.
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return String
	*/
	function doBBCodeStrip($string)
	{
		$string = preg_replace('/:([a-zA-Z0-9]*):/i', '', $string);
		$string = preg_replace('#\[(\/?)(flash|quote|code|b|u|i|s|email|img|color|font|size)(.*?)]#i', '', $string);
		$string = preg_replace("#(^|\s)((http|https|news|ftp)://\w+[^\s\[\]]+)#ie", '', $string);

		return $string;
	}

   // ! Action Method

   /**
	* Simple emoticon replacement method.
	*
	* @param String $string String to parse for emoticons
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return String
	*/
	function _parseEmoticons($string)
	{
		if(false == $this->emoticons)
		{
			$this->getEmoticons();
		}
		
		foreach($this->emoticons as $emoticon)
		{
			$code = preg_quote($emoticon['CODE'], '/');
			$name = $emoticon['NAME'];

			$string = preg_replace("#(?<=[^\w/])$code#i", $name, $string);
		}

		return $string;
	}

   // ! Accessor Method

   /**
	* Fetches emoticons from the database and prepares them
	* for parsing.
	*
	* @param Bool $clicky Used to determine whether or not to 
	* fetch clickable emoticons only.
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return Bool
	*/
	function getEmoticons($clickable = false)
	{
		foreach($this->_cache_emoticons as $emoticon)
		{
			if($emoticon['emo_skin'] == SKIN_ID)
			{
				if($clickable && $emoticon['emo_click'])
				{
					$this->emoticons[] = array('NAME' => "<img src=\"" . SKIN_PATH . "/emoticons/{$emoticon['emo_name']}\" alt=\"\" />",
											   'CODE' => $emoticon['emo_code']);
				}
				else {
					$this->emoticons[] = array('NAME' => "<img src=\"" . SKIN_PATH . "/emoticons/{$emoticon['emo_name']}\" alt=\"\" />",
											   'CODE' => $emoticon['emo_code']);
				}
			}
		}

		return true;
	}

   // ! Action Method

   /**
	* Used to check a string to see if it contains a 
	* filtered word.
	*
	* @param String $string String to evaluate.
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return True on yes / False on no
	*/
	function checkFilter($string)
	{
		if(false == $this->_filter)
		{
			$this->_getFilterWords();
		}

		foreach($this->_filter as $key => $val)
		{
			if($val['match'])
			{   
				if(preg_match("/(^|\b)" . $key . "(\b|!|\?|\.|,|$)/i", $string))
				{
					return false;
				}
			}
			else {
				if(preg_match('/' . $key . '/i', $string))
				{
					return false;
				}
			}
		}

		return true;
	}

   // ! Action Method

   /**
	* Used to parse posting content for filtered words
	* and replaces them accordingly.
	*
	* @param String $string String to parse for filtered words.
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return String
	*/
	function _doFilter($string)
	{
		if(false == $this->_filter)
		{
			$this->_getFilterWords();
		}

		foreach($this->_filter as $key => $val)
		{
			if($val['match'])
			{   
				$string = preg_replace("/(^|\b)" . $key . "(\b|!|\?|\.|,|$)/i", $val['replace'], $string);
			}
			else {
				$string = preg_replace('/' . $key . '/i', $val['replace'], $string);
			}
		}

		return $string;
	}

   // ! Accessor Method

   /**
	* Fetches word filters from the database.
	*
	* @param none
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return Bool
	*/
	function _getFilterWords()
	{
		foreach($this->_cache_filter as $filter)
		{
			$this->_filter[$filter['replace_search']] = array('replace' => $filter['replace_replace'],
															  'match'   => $filter['replace_match']);
		}

		return true;
	}

   // ! Action Method

   /**
	* Parses given text and replaces valid bbcode tags with
	* thier html equivalents.
	*
	* @param String $string String to parse for bbcode tags.
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return String
	*/
	function parseSimple($string)
	{
		$string = str_replace(array('(tm)',	'(c)',	'(r)'), 
							  array('&trade;', '&copy;', '&reg;'), 
							  $string);

		$s[] = "#(\[flash=)(\S+?)(\,)(\S+?)(\])(\S+?)(\[\/flash\])#ie";
		$s[] = "#\n?\[list\](.+?)\[/list\]\n?#ies";
		$s[] = '#\[b\](.+?)\[/b\]#is';
		$s[] = '#\[i\](.+?)\[/i\]#is';
		$s[] = '#\[u\](.+?)\[/u\]#is';
		$s[] = '#\[s\](.+?)\[/s\]#is';

		$r[] = "\$this->_parseFlash('$2','$4','$6')";
		$r[] = "\$this->_doList('$1')";
		$r[] = "<strong>$1</strong>";
		$r[] = "<em>$1</em>";
		$r[] = "<span style=\"text-decoration: underline;\">$1</span>";
		$r[] = "<strike>$1</strike>";

		while(preg_match("#\[color=([^\]]+)\](.+?)\[/color\]#ies", $string))
		{
			$string = preg_replace("#\[color=(.*?)\](.*?)\[/color\]#ies", "\$this->_checkFontTags('color', '$1', '$2')", $string);
		}

		while(preg_match("#\[font=(.*?)\](.*?)\[/font\]#si", $string))
		{
			$string = preg_replace("#\[font=(.*?)\](.*?)\[/font\]#ies", "\$this->_checkFontTags('font', '$1', '$2')", $string);
		}

		while(preg_match("#\[size=([^\]]+)\](.+?)\[/size\]#ies", $string))
		{
			$string = preg_replace("#\[size=(.*?)\](.*?)\[/size\]#ies", "\$this->_checkFontTags('size', '$1', '$2')", $string);
		}

		return preg_replace($s, $r, $string);
	}


   // ! Action Method

   /**
	* Validates the data used within font-related tags.
	*
	* @param Integer $type      Defines the type of font tag being used.
	* @param Integer $attribute The value of the font tag.
	* @param String  $string    The string used within the font tag.
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.3.0
	* @return String
	*/
	function _checkFontTags ( $type, $attribute, $string )
	{
		$original = "[{$type}={$attribute}]{$string}[/$type]";

		if ( false == $string )
		{
			return $original;
		}

		$attrib_bits = explode ( ';', $attribute );
		$attribute   = $attrib_bits[0];

		switch ( $type )
		{
			case 'size':

				if ( false == (int) $attribute )
				{
					$attribute = 11;
				}

				if ( $attribute > 25 )
				{
					$attribute = 25;
				}

				return "<span style=\"font-size: {$attribute}px\">{$string}</span>";

				break;

			case 'color':

				return "<span style=\"color: {$attribute}\">{$string}</span>";

				break;

			case 'font':

				return "<span style=\"font-family: {$attribute}\">{$string}</span>";

				break;
		}

		return $original;
	}


   // ! Action Method

   /**
	* Used to determine whether the flash object provided
	* is valid and can be properly displayed.
	*
	* @param Integer $width  User defined set width of object.
	* @param Integer $height User defined set height of object.
	* @param String  $url	Path to flash object.	
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return String
	*/
	function _parseFlash($width, $height, $url)
	{
		$original = "\[flash={$width},{$height}\]{$url}\[/flash\]";
	
		if(false == $this->_config['flash_on'])
		{
			return $original;
		}

		if(false == preg_match( "/^http:\/\/(\S+)\.swf$/i", $url))
		{
			return $original;
		}

		if($width  > $this->_config['flash_max_width'] ||
		   $height > $this->_config['flash_max_height'])
		{
			$width  = $this->_config['flash_max_width'];
			$height = $this->_config['flash_max_height'];
		}

		return "<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' width={$width} " . 
			   "height={$height}><param name=movie value={$url}><param name=play value=true>" .
			   "<param name=loop value=true><param name=quality value=high><embed src={$url}" .
			   "width=$width height={$height} play=true loop=true quality=high></embed></object>";
	}

   // ! Action Method

   /**
	* Parses a bbcode image tag and determines whether the given image
	* is valid and can be properly displayed.
	*
	* @param String $image User posted url to image.
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return String
	*/
	function prePostImage($string)
	{
		return preg_replace("#\[img\](.*?)\[/img\]#sie", '$this->_processImage(\'$1\')', $string);
	}

   // ! Action Method

   /**
	* Parses a bbcode image tag and determines whether the given image
	* is valid and can be properly displayed.
	*
	* @param String $image User posted url to image.
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return String
	*/
	function _processImage($image)
	{
		$default = "[img]{$image}[/img]";

		if(false == preg_match("/^(\S+)\.({$this->_config['good_image_types']})$/i", $image))
		{
			return $default;
		}

		$image = trim($image);

		if(false == preg_match("/^(http|https|ftp):\/\//i", $image))
		{
			return $default;
		}

		if(preg_match("/[?&;]/", $image))
		{
			return $default;
		}

		$image = str_replace(' ', '%20', $image);
		$dim   = '';

		if($this->_config['image_dim_check'] && false == isset($this->_image_cache[$image]))
		{
			if($image_data = @getimagesize($image))
			{
				$width  = $image_data[0];
				$height = $image_data[1];

				$max_width  = $this->_config['image_max_width'];
				$max_height = $this->_config['image_max_height'];

				if($width > $max_width &&
					$height <= $max_height)
				{
					$ratio = $max_width / $width;
				}
				elseif($height > $max_height &&
					$width <= $max_width)
				{
					$ratio = $max_height / $height;
				}
				elseif($width > $max_width && 
					$height > $max_height)
				{
					$ratio1 = $max_width  / $width;
					$ratio2 = $max_height / $height;

					$ratio = $ratio1 < $ratio2 ? $ratio1 : $ratio2;
				}
				else
				{
					$ratio = 1;
				}

				$new_width  = floor($width  * $ratio);
				$new_height = floor($height * $ratio);

				if($new_width && $new_height)
				{
					$dim  = '" width="' . $new_width . '" height="' . $new_height . '"';
				}
			}

			$this->_image_cache[$image] = $dim;
		}
		else {
			$dim = $this->_image_cache[$image];
		}

		return '<img src="' . $image . $dim . ' alt="' . $image . '" />';
	}

   // ! Action Method

   /**
	* Displays an unordered list of bbcode.
	*
	* @param String $string list bbcode contents.
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return String
	*/
	function doFormatEditImage($string)
	{
		return preg_replace('#<img src="(\S+?)" width=".+?" height=".+?" />#', "[img]$1[/img]", $string);
	}

   // ! Action Method

   /**
	* Displays an unordered list of bbcode.
	*
	* @param String $string list bbcode contents.
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return String
	*/
	function _doList($string)
	{
		return "</p><ul>" . $this->_doListItem($string) . "</ul><p>";
	}

   // ! Action Method

   /**
	* A simple function that properly formats a list for display.
	*
	* @param String $item List item content.
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return String
	*/
	function _doListItem($item)
	{
		$item = preg_replace("#\[\*\]#",  "</li><li>", trim($item));
		$item = preg_replace("#^</?li>#", '',		  trim($item));
		
		return str_replace("</li>", "</li>", stripslashes($item) . "</li>");
	}

   // ! Action Method

   /**
	* This method is used for URI parsing.
	*
	* @param String $string String to parse for URI bbcode tags
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return String
	*/
	function parseLinks($string)
	{
		$s[] = "#(^|\s)(http|https|ftp)(://[^\s\[]+)#ie";
		$s[] = "#\[email=(.*?)\](.*?)\[/email\]#sie";
		$s[] = "#\[email\](.*?)\[/email\]#sie";
		$s[] = "#\[url\](.*?)\[/url\]#sie";
		$s[] = "#\[url=(.+?)](.+?)\[/url]#sie";

		$r[] = '$this->_parseLongUrl(\'$1\', \'$2$3\')';
		$r[] = '$this->_stripLinksOfCode(\'email\', \'$2\', \'$3\')';
		$r[] = '$this->_stripLinksOfCode(\'email\', \'$1\')';
		$r[] = '$this->_stripLinksOfCode(\'url\', \'$1\')';
		$r[] = '$this->_stripLinksOfCode(\'url\', \'$1\', \'$2\')';

		return preg_replace($s, $r, $string);
	}

   // ! Action Method

   /**
	* This method is used for URI parsing.
	*
	* @param String $string String to parse for URI bbcode tags
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return String
	*/
	function _stripLinksOfCode($type, $url, $title = null)
	{
		$pre   = $type == 'email' ? 'mailto:' : '';
		$title = $title		   ? $title	: $url;

		$out   = preg_replace('#javascript:#i', '', $pre . $url);

		return "<a href=\"{$out}\" title=\"\">{$title}</a>";
	}

   // ! Action Method

   /**
	* Simply shortens a very long URI for display.
	*
	* @param String $url Url to shorten
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return String
	*/
	function _parseLongUrl($space, $url)
	{
		$url = preg_replace('#javascript:#i', '', $url);

		return "{$space}[url={$url}]" . (strlen($url) > 40 
				? substr($url, 0, 15) . '...' . substr($url, -15) 
				: $url) . '[/url]';
	}

   // ! Action Method

   /**
	* Used to parse the bigger, more complex blocks of bbcode.
	*
	* @param String $string String to parse for block bbcode.
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return String
	*/
	function parseBlocks($string)
	{
		$s[] = "#\[code\](.+?)\[/code]#ise";
		$s[] = "#(\[quote=(.+?)?\].*\[/quote\])#ise";
		$s[] = "#(\[quote\].*\[/quote\])#ise";

		$r[] = "\$this->parseCode('\\1')";
		$r[] = "\$this->parseQuotes('\\1', '\\2')";
		$r[] = "\$this->parseQuotes('\\1')";

		return preg_replace($s, $r, $string);
	}

   // ! Action Method

   /**
	* Used to parse quote tags and display them all neat
	* and pretty-like.
	*
	* @param String $string String to quote.
	* @param String $name   Name of user who is being quoted.
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return String
	*/
	function parseQuotes($string, $name = null)
	{
		if(false == $string || false == $this->_blockCount($string))
		{
			return $string;
		}
	
		$string = preg_replace("#quote#is", "quote", $string);

		if((substr_count($string, '[quote]')  + 
			substr_count($string, '[quote=')) == 
			substr_count($string, '[/quote]'))
		{
			$s[] = '~\[quote=(.+?)]~i';
			$s[] = '~\[quote]~i';
			$s[] = '~\[/quote]~i';

			$r[] = "</p><blockquote><p><span class=\"name\">$1:</span> ";
			$r[] = " </p><blockquote><p>";
			$r[] = " </p></blockquote><p>";

			return preg_replace($s, $r, $string);
		}
	}

   // ! Action Method

   /**
	* Used to translate bbcode code tags into pretty code boxes with optional
	* line numbering.
	*
	* @param String $string String to parse for bbcode code tags.
	* @param String $mark   Line numbering / highlighting options.
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return String
	*/
	function parseCode($string)
	{
		if(false == $string)
		{
			return;
		}

		$original = "[code]{$string}[/code]";

		if(false == $this->_blockCount($string))
		{
			return $original;
		}

		$s = array("#&lt;#", "#&gt;#", "#&quot;#", "#:#",   "#\[#",  "#\]#",  "#\)#",  "#\(#",  "# #");
		$r = array("&#60;",  "&#62;",  "&#34;",	"&#58;", "&#91;", "&#93;", "&#41;", "&#40;", "&nbsp;");

		$string = str_replace("\t", '&nbsp;&nbsp;&nbsp;&nbsp;', $string);

		return "</p>" . $this->_getLines(preg_replace($s, $r, $string)) . "<p>";
	}

   // ! Action Method

   /**
	* Creates an ordered list to display line numbers.
	*
	* @param String $string String used to create line numbers.
	* @param String $line   Line numbering options.
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return String
	*/
	function _getLines($string)
	{
		$num = 0;

		foreach(explode("\n", trim($string)) as $line)
		{
			if($num % 2 == 0)
			{
				$class = " class=\"crowone\"";
			}
			else {
				$class = " class=\"crowtwo\"";
			}

			if(strlen($line) == 1)
			{
				$line = '&nbsp;';
			}

			$lines[] = "<li{$class}><code>{$line}</code></li>";
			$num++;
		}

		return "<div style=\"overflow: auto; width: 95%;\"><ol class=\"code\">" . implode('', $lines) . "</ol></div>\n";
	}

   // ! Action Method

   /**
	* Counts the number of nested block tags as they can, on occasion,
	* crash certain browsers.
	*
	* @param String $string String to evaluate.
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return Bool
	*/
	function _blockCount($string)
	{
		if(preg_match("/\[(quote|code)\].+?\[(quote|code)\].+?\[(quote|code)\].+?"  . 
					  "\[(quote|code)\].+?\[(quote|code)\].+?\[(quote|code)\].+?\[" .
					  "(quote|code)\]/i", $string))
		{
			return false;
		}
		else {
			return true;
		}
	}

   // ! Action Method

   /**
	* A simple word wrapping method.
	*
	* @param String  $string String to wrap.
	* @param Integer $size   How many chars before wrapping.
	* @param String  $break  Markup used to wrap a string.
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return String
	*/
	function doCutOff($string, $size = 30)
	{
		$string = str_replace(array('&quot;', '&#39;'), array('"', "'"), $string);
		$trail  = '';

		if(strlen($string) > $size)
		{
			$string = substr($string, 0, $size - 3) . '&#8230;';
			$trail  = '&#8230;';
		}

		return preg_replace("/&(#(\d+?)?)?$/", $trail, $string);
	}

   // ! Action Method

   /**
	* A simple word wrapping method.
	*
	* @param String  $string String to wrap.
	* @param Integer $size   How many chars before wrapping.
	* @param String  $break  Markup used to wrap a string.
	* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
	* @since v1.0
	* @return String
	*/
	function doWrapString($string, $size = 75, $break = "\n")
	{
		if(false == $string || $size < 1)
		{
			return $string;
		}

		return preg_replace("#([^\s<>'\"/\.\\-\?&\n\r\%]{" . $size . "})#i", " \\1"  . $break, $string);
	}
}

?>