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
class FileHandler
{

   /**
    * Variable Description
    * @access Private
    * @var Integer
    */
	var $_config;

   // ! Action Method

   /**
    * Comment
    *
    * @param String $string Description
    * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
    * @since v1.0
    * @return String
    */
	function FileHandler(& $config)
	{
		$this->_config =& $config;
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
	function remDir($dir)
	{
		if(false == is_dir($dir)) return false;

		$handle = opendir($dir);
		while(false !== ($file = readdir($handle)))
		{
			if(($file != '.') & ($file != '..'))
			{
				if(is_dir($dir . '/' . $file))
                {
					$this->remDir($dir . '/' . $file);
                }

				if(is_file($dir . '/' . $file))
                {
					unlink($dir . '/' . $file);
                }
			}
		}
		closedir($handle);
		rmdir($dir);

		return true;
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
	function copyDir($to, $from)
	{
		$to   = preg_replace('~/$~', '', $to);
		$from = preg_replace('~/$~', '', $from);

		if(false == is_dir($from)) return false;

		if(false == is_dir($to))
		{
			if(false == mkdir($to, 0777))
			{
				return false;
			}
			else {
				chmod($to,  0777);
			}
		}

		chdir($from);
		$handle = opendir('.');
		while(false !== ($file = readdir($handle)))
		{
			if(($file != '.') & ($file != '..') & ($file != '.svn'))
			{

				if(is_dir($file))
				{
					$this->copyDir($to . '/' . $file, $from . '/' . $file);
					chdir($from);
				}

				if(is_file($file) && is_readable($file))
				{
					copy($from . '/' . $file, $to . '/' . $file);
					@chmod($to . '/' . $file, 0777);
				}

			}
		}
		closedir($handle);

		return true;
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
    function writeFile($name, $contents, $destination, $overwrite = false, $chmod = 0655)
    {
        if(false == is_dir($destination))
        {
            return false;
        }

        if(false == is_writable($destination))
        {
            return false;
        }

        if(file_exists($destination . $name) && $overwrite)
        {
            return false;
        }

        $handle = fopen($destination . $name, 'a');
        fwrite($handle, $contents);
        fclose($handle); 

        chmod($destination . $name, $chmod);

        return true;
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
	function getFileSize($size)
	{
		$sizes = array(' b.', ' kb.', ' mb.', ' gb.', ' tb.', ' pb.', ' eb.');
		$ext   = $sizes[0];
		for ($i=1; (($i < count($sizes)) && ($size >= 1024)); $i++)
		{
			$size = $size / 1024;
			$ext  = $sizes[$i];
		}

		return round($size, 2) . $ext;	
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
	function updateFileArray($array, $name, $file)
	{
		if(false == is_file($file)) return false;
		
		$out  = "<?php\n";
		foreach($array as $key => $val)
		{
			$out .= "\${$name}['{$key}'] = '{$val}';\n";
		}

		$out .= '?>';

		$fp = @fopen($file, 'w');
		@fwrite($fp, $out);
		fclose($fp);

		return true;
	}
}

?>