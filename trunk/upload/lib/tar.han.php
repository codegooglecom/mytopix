<?php

/**
* Tarball Handling Class
*
* This is an all-purpose tarball handler written simply
* because there is a real lack of decent tar'ing methods
* for use in php.
*
* USEAGE:
* ------------------------------------------------------
* Writing a tarball:
* ------------------------------------------------------
*
* $TarHandler = new TarHandler(); 
*
* $TarHandler->newTar('path/to/new/tar/', 'my_tar.tar');
* $TarHandler->addDirectory("path/to/directory/");
* $TarHandler->addFile('path/to/file.txt');
* $TarHandler->writeTar();
*
* ------------------------------------------------------
* Extracting a tarball:
* ------------------------------------------------------
*
* $TarHandler = new TarHandler(); 
*
* $TarHandler->extractTar('tar_name.tar', 'path/to/tar/', 'extract/to/path');
*
* ------------------------------------------------------
* Listing tarball contents:
* ------------------------------------------------------
*
* $TarHandler = new TarHandler();
* 
* $TarHandler->setCurrent('absolute/path/to/tar/');
* 
* $files = $TarHandler->listTarFiles('tar_name.tar');
*
* OR PULL ONLY CERTAIN FILE TYPES:
* 
* $files = $TarHandler->listTarFiles('tar_name.tar', array('txt', 'html'));
* 
* foreach($files as $file)
* {
*     echo $file . '<br />';
* }
*
* ------------------------------------------------------
* Searching for files:
* ------------------------------------------------------
*
* $TarHandler = new TarHandler();
* 
* $TarHandler->setCurrent('absolute/path/to/tar/');
* 
* $files = $TarHandler->searchTar('tar_name.tar', array('index.html'));
* 
* foreach($files as $file)
* {
*     echo $file . '<br />';
* }
*
*
* ERROR HANDLING:
* ------------------------------------------------------
* This system comes complete with a comprehensive error
* handling system that covers just about any error type.
* Almost every public function within this class can 
* exit with an error ( if there is one ). To determine
* what error has occurred, try the following method:
*
* if(false == $TarHandler->addFile('path/to/file.txt'))
* {
*     echo $TarHandler->getError();
* }
*
* @version $Id: tar.han.php murdochd Exp $
* @author Daniel Wilhelm II Murdoch <wilhelm@jaia-interactive.com>
* @company Jaia Interactive / http://www.jaia-interactive.com
* @package MyTopix - Personal Message Board
*/
class TarHandler
{
   /**
    * Error listing
    * @access Private
    * @var Array
    */    
	var $_error_list;

   /**
    * Identifier of last error
    * @access Private
    * @var Integer
    */    
    var $_error_last;

   /**
    * A list of files for tar'ing
    * @access Private
    * @var Array
    */    
	var $_tar_cache;

   /**
    * Filename of current tar
    * @access Private
    * @var String
    */    
	var $_tar_name;

   /**
    * Path to tar file
    * @access Private
    * @var String
    */    
    var $_tar_path;

   /**
    * Full literal path to tar file
    * @access Private
    * @var String
    */    
    var $_tar_full_path;

   /**
    * Original location of tar
    * @access Private
    * @var String
    */    
    var $_path_from;

   /**
    * Destination point for extracted
    * tarball files
    * @access Private
    * @var String
    */    
    var $_path_to;

   /**
    * Currently accessed directory
    * @access Private
    * @var String
    */    
    var $_current;


   // ! Constructor Method

   /**
    * Initiates tar handling class and defines
    * all instance variables.
    *
    * @param None
    * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
    * @since v1.0
    * @access Public
    * @return Void
    */
    function TarHandler()
    {
        $this->_current       = getcwd() ? getcwd() : './';
        $this->_tar_name      = '';
        $this->_tar_full_path = '';
        $this->_tar_path      = '';
        $this->_path_from     = '';
        $this->_path_to       = '';

        $this->_tar_cache     = array();
        $this->_error_last    = array();
        $this->_error_list    = array(1  => 'Could not find or create tar file destination \'%s\' .',
                                      2  => 'File stats for \'%s\' could not be pulled.',
                                      3  => 'Could not add file \'%s\' to tar.',
                                      4  => 'A file name or path was not included for writing a new tar file.',
                                      5  => 'There is no data within \'%s\'  to write a tar with.',
                                      6  => 'Filename \'%s\' is too large.',
                                      7  => 'Filepath \'%s\' is too large.',
                                      8  => 'Directory \'%s\' could not be added because it does not exist.',
                                      9  => 'Extraction destination \'%s\' is not a valid directory.',
                                      10 => 'Tar read error has occurred.',
                                      11 => 'File \'%s\' could not be found.',
                                      12 => 'Directory \'%s\' could not be found.',
                                      13 => 'Cannot extract archive. Directory \'%s\' cannot be located.',
                                      14 => 'Cannot extract archive. File \'%s\' cannot be located.',
                                      15 => 'You must enter a file name to search for.',
                                      16 => 'Search failed. Could not locate \'%s\' within the archive.',
                                      17 => 'Read failed. \'%s\' could not be located.',
                                      18 => 'Search failed. Could not locate filetypes \'%s\' within the archive.',
                                      19 => 'There are no errors to report.');

    }

   // ! Mutator Method

   /**
    * USAGE
    * --------------
    * $TarHandler->setCurrent( str(CURRENT DIRECTORY) );
    * 
    * Allows a user to set a user-defined
    * directory path starting point.
    *
    * @param String $path Directory path to desired location
    * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
    * @since v1.0
    * @access Public
    * @return Boolean
    */
    function setCurrent($path)
    {
        if(false == is_dir($path))
        {
            $this->_error_last = array(12, $path);
            return false;
        }

        $this->_current = $path;
        return true;
    }

   // ! Action Method

   /**
    * USAGE
    * --------------
    * $TarHandler->newTar( str(DESTINATION PATH), str(TARBALL NAME) );
    * 
    * Initiates the tar creation process and
    * prepares handler to build internal file
    * listing.
    *
    * @param String $to_path Tarball save location
    * @param String $name    Tarball file name
    * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
    * @since v1.0
    * @access Public
    * @return Boolean
    */
    function newTar($to_path, $name)
    {
        $to_path = preg_replace('~/$~', '', $to_path);

        if(false == is_dir($to_path))
        {
            if(false == @mkdir($to_path, 0777))
            {
                $this->_error_last = array(1, $to_path);
                return false;
            }
        }

        $this->_tar_name      = $name;
        $this->_tar_full_path      = $to_path;
        $this->_tar_full_path = $this->_tar_full_path . '/' . $this->_tar_name;

  		chdir($this->_current);

        return true;
    }

   // ! Action Method

   /**
    * USAGE
    * --------------
    * $TarHandler->addDirectory( str(DIRECTORY PATH) );
    * 
    * Allows user to add the contents of an
    * entire directory for archiving.
    *
    * @param String $path Directory path to spider for files
    * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
    * @since v1.0
    * @access Public
    * @return Boolean
    */
    function addDirectory($path)
    {
        if(false == is_dir($path))
        {
            $this->_error_last = array(12, $path);
            return false;
        }

        chdir($this->_current);

        $this->_spiderDirectory($path);

        return true;
    }

   // ! Action Method

   /**
    * USAGE
    * --------------
    * $TarHandler->addFile( str(FILEPATH AND NAME) );
    * 
    * Allows user to add a single file to the
    * internal file listing. Error checking
    * allows for troubleshooting.
    *
    * @param String $file Filepath & name to add to file listing
    * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
    * @since v1.0
    * @access Public
    * @return Boolean
    */
    function addFile($file)
    {
        if(false == file_exists($file))
        {
            $this->_error_last = array(11, $file);
            return false;
        }

        $data = '';
        $link = '';

        $stat = stat($file);

        if(false == $stat)
        {
            $this->_error_last = array(2, $stat);
            return false;
        }

        if(is_file($file))
        {
            $typeflag = 0;

            if($handle = fopen($file, 'rb'))
            {
                $data = fread($handle, filesize($file));
                fclose($handle);
            }
            else {
                $this->_error_last = array(3, $file);
                return false;
            }
        }
        elseif(is_link($file))
        {
            $typeflag = 1;
            $link = @readlink($file);
        }
        elseif(is_dir($file))
        {
            $typeflag = 5;
        }
        else {
            $typeflag = 'p00p';
        }

        $this->_tar_cache[] = array('name'     => $file,
                                    'mode'     => fileperms($file),
                                    'uid'      => $stat[4],
                                    'gid'      => $stat[5],
                                    'size'     => strlen($data),
                                    'mtime'    => filemtime($file),
                                    'chksum'   => '      ',
                                    'typeflag' => $typeflag,
                                    'linkname' => $link,
                                    'magic'    => 'ustar\0',
                                    'version'  => '00',
                                    'uname'    => 'unknown',
                                    'gname'    => 'unknown',
                                    'devmajor' => '',
                                    'devminor' => '',
                                    'prefix'   => '',
                                    'data'     => $data);

        @clearstatcache();
        @chdir($this->_current);

        return true;
    }

   // ! Action Method

   /**
    * USAGE
    * --------------
    * $TarHandler->writeTar(  );
    * 
    * Takes the internal file listing and
    * builds a properly formatted tarball
    * archive. Will stop on error, see USEAGE
    * within this file's header for trouble-
    * shooting.
    *
    * @param None
    * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
    * @since v1.0
    * @access Public
    * @return Boolean
    */
    function writeTar()
    {
		if(false == $this->_tar_full_path)
        {
			$this->_error_last = array(4, false);
			return false;
		}

		if(false == $this->_tar_cache)
        {
			$this->_error_last = array(5, false);
			return false;
		}

		$data = '';

		foreach($this->_tar_cache as $file) {

			$prefix   = '';
			$tmp      = '';
			$checksum = 0;

            if(strlen($file['name']) > 99)
			{
				$position = strrpos($file['name'], "/");

				if(is_string($position) && false == $position)
				{
                    $this->_error_last = array(6, $file['name']);
                    return false;
				}

				$prefix       = substr($file['name'], 0 , $position );
				$file['name'] = substr($file['name'], ($position + 1));

				if(strlen($prefix) > 154)
				{
                    $this->_error_last = array(7, $prefix);
                    return false;
				}
			}

			$mode  = sprintf("%6s ",  decoct($file['mode']));
			$uid   = sprintf("%6s ",  decoct($file['uid']));
			$gid   = sprintf("%6s ",  decoct($file['gid']));
			$size  = sprintf("%11s ", decoct($file['size']));
			$mtime = sprintf("%11s ", decoct($file['mtime']));

            $tmp  = pack("a100a8a8a8a12a12", $file['name'], $mode, $uid, $gid, $size, $mtime);

			$last  = pack("a1"   , $file['typeflag']);
			$last .= pack("a100" , $file['linkname']);

			$last .= pack("a6",   'ustar');
			$last .= pack("a2",   '');
			$last .= pack("a32",  $file['uname']);
			$last .= pack("a32",  $file['gname']);
			$last .= pack("a8",   '');
			$last .= pack("a8",   '');
			$last .= pack("a155", $prefix);
			$last .= $this->_buildString("\0", (512 - strlen($tmp . $last . "12345678")));

			for ($i = 0 ; $i < 148 ; $i++ )
			{
				$checksum += ord(substr($tmp, $i, 1));
			}

			for ($i = 148 ; $i < 156 ; $i++)
			{
				$checksum += ord(' ');
			}

			for ($i = 156, $j = 0 ; $i < 512 ; $i++, $j++)
			{
				$checksum += ord(substr($last, $j, 1));
			}

			$checksum = sprintf("%6s ", decoct($checksum));

			$tmp .= pack("a8", $checksum);
			$tmp .= $last;
		   	$tmp .= $file['data'];

		   	if($file['size'])
		   	{
		   		if($file['size'] % 512 != 0)
		   		{
		   			$tmp .= $this->_buildString("\0" , (512 - ($file['size'] % 512)));
		   		}
		   	}

		   	$data .= $tmp;
		}

		$data .= pack("a512", "");

        @chdir($this->_tar_full_path);

		$handle = fopen($this->_tar_full_path, 'wb');
		fputs($handle, $data, strlen($data));
		fclose($handle);

        return true;
    }

   // ! Action Method

   /**
    * USAGE
    * --------------
    * $TarHandler->extractTar( str(TARBALL NAME), str(TARBALL DIRECTORY), str(EXTRACT TO PATH) );
    * 
    * Opens and extracts the contents of
    * a tarball to a specified location.
    * This method will stop and exit on 
    * error. Consult this file's USAGE
    * section for troubleshooting methods.
    *
    * @param String $tar         Name of tarball
    * @param String $from        Current location of tarball
    * @param String $destination Tarball's extraction point
    * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
    * @since v1.0
    * @access Public
    * @return Boolean
    */
    function extractTar($tar, $from, $destination)
    {
        if(false == is_dir($from))
        {
            $this->_error_last = array(13, $from);
            return false;
        }

        if(false == file_exists($from . '/' . $tar))
        {
            $this->_error_last = array(14, $from . '/' . $tar);
            return false;
        }

		if(false == is_dir($destination) )
		{
			$this->_error_last = array(9, $destination);
			return false ;
		}

        $this->_tar_name  = $tar;
        $this->_path_from = $from;
        $this->_path_to   = $destination;

        chdir($this->_path_from);

		foreach($this->_readTar() as $key => $file) 
        {
			if(preg_match("#/#", $file['name']))
			{
				$path_info = explode( "/" , $file['name'] );
				$file_name = array_pop($path_info);
			} 
            else {
				$path_info = array();
				$file_name = $file['name'];
			}
			
			if($path_info)
			{
				foreach($path_info as $dir_component)
				{
					if($dir_component)
					{
                        if(false == is_dir($dir_component))
                        {
                            @mkdir($this->_path_to . $dir_component, 0777);
                            chmod($this->_path_to . $dir_component, 0777);
                        }
                    }
				}
			}
			
            chdir($this->_path_to . $dir_component);

			if(false == $file['typeflag'])
			{
				if($handle = @fopen($file_name, "wb"))
				{
					fputs($handle, $file['data'], strlen($file['data']));
					fclose($handle);
				}
			}
			elseif ($file['typeflag'] == 5)
			{
				if(false == is_dir($file_name))
				{
					@mkdir($file_name, 0777);
				}
			}

            @chmod($file_name, $file['mode']);
			@touch($file_name, $file['mtime']);
		}

        @chdir($this->_current);

        return true;
    }

   // ! Action Method

   /**
    * USAGE
    * --------------
    * $TarHandler->searchTar( str(TAR PATH AND NAME), [ arr(FILES TO SEARCH) ] );
    * 
    * Allows a user to search an
    * existing tarball for predefined 
    * filenames.
    *
    * MUST USE setCurrent(); METHOD
    *
    * @param String $tar   Name of target tarball
    * @param Array  $files Listing of filenames to search for
    * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
    * @since v1.0
    * @access Public
    * @return Boolean on error / Array on success
    */
    function searchTar($tar, $files = array())
    {
        if(false == $files)
        {
			$this->_error_last = array(15, false);
			return false ;            
        }

        $this->_tar_name = $tar;

        chdir($this->_current);

        if(false == ($list = $this->_readTar()))
        {
            return false;
        }

        $out = array();
        foreach($list as $file)
        {
            $paths = explode("/" , $file['name']);
            $name  = array_pop($paths);

            foreach($files as $names)
            {
                if($name == $names)
                {
                    $out[] = 'Found: ' . $file['name'];
                }
            }
        }

        if(false == $out)
        {
			$this->_error_last = array(16, implode(', ', $files));
			return false ;  
        }

        return $out;
    }

   // ! Action Method

   /**
    * USAGE
    * --------------
    * $TarHandler->listTarFiles( str(TAR PATH AND NAME), [ arr(TYPES TO SEARCH) ] );
    * 
    * Opens a pre-existing tarball and 
    * generates an array containing a list
    * of archived files. A user may also 
    * specify what filetypes to list by using
    * the second parameter.
    *
    * MUST USE setCurrent(); METHOD
    *
    * @param String $tar   Name of target tarball
    * @param Array  $types Listing of filetypes to search for
    * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
    * @since v1.0
    * @access Public
    * @return Boolean on error / Array on success
    */
    function listTarFiles($tar, $types = array())
    {
        $this->_tar_name = $tar;

        chdir($this->_current);

        if(false == ($list = $this->_readTar()))
        {
            return false;
        }

        $out = array();
        foreach($list as $file)
        {
            if(sizeof($types))
            {
                foreach($types as $ext)
                {
                    if(end(explode('.', $file['name'])) == strtolower($ext))
                    {
                        $out[] = $file['name'];
                    }
                }
            }
            else {
                $out[] = $file['name'];
            }
        }

        if(false == $out)
        {
			$this->_error_last = array(18, implode(', ', $types));
			return false ;  
        }

        return $out;
    }

   // ! Action Method

   /**
    * USAGE
    * --------------
    * echo $TarHandler->getError(  );
    * 
    * Retrieves the last error generated by
    * the tar handler.
    *
    * @param None
    * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
    * @since v1.0
    * @access Public
    * @return String on success / Boolean on failure
    */
    function getError()
    {
        if($this->_error_last)
        {
            return sprintf($this->_error_list[$this->_error_last[0]], $this->_error_last[1]);
        }

        return $this->_error_list['19'];        
    }

    /*********************************************
     * ALL METHODS BELOW THIS POINT ARE PRIVATE: *
     *********************************************/

   // ! Action Method

   /**
    * Opens a specified tarball archive and
    * creates an array containing detailed
    * information about it's contents.
    *
    * @param None
    * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
    * @since v1.0
    * @access Private
    * @return Array
    */
    function _readTar()
    {
        if(false == file_exists($this->_tar_name))
        {
			$this->_error_last = array(17, $this->_tar_name);
			return false ;  
        }

		$handle = fopen($this->_tar_name, 'rb');
		
		while(false == feof($handle)) 
        {
			$buffer   = fread($handle, 512);
			$checksum = 0;
			
			for ($i = 0 ; $i < 148 ; $i++) 
            {
				$checksum += ord(substr($buffer, $i, 1));
			}

			for ($i = 148 ; $i < 156 ; $i++)
            {
				$checksum += ord(' ');
			}

			for ($i = 156 ; $i < 512 ; $i++)
            {
				$checksum += ord(substr($buffer, $i, 1));
			}
			
			$attrib = unpack('a100filename/a8mode/a8uid/a8gid/a12size/'  .
                             'a12mtime/a8chksum/a1typeflag/a100link'     .
                             '/a6magic/a2version/a32uname/a32gname/a8de' .
                             'vmajor/a8devminor/a155/prefix', 
                             $buffer);

			$name   = trim($attrib['filename']);
            $size   = OctDec(trim($attrib['size']));
			$prefix = @trim($attrib['prefix']);
            $chksum = OctDec(trim($attrib['chksum']));

			if(($checksum == 256) && ($chksum == 0))
            {
				break;
			}
			
			if($prefix)
            {
				$name = $prefix.'/'.$name;
			}

			if((preg_match( "#/$#" , $name)) && (false == $name))
            {
				$typeflag = 5;
			}

			if($buffer == $this->_buildString('\0' , 512))
            {
				break;
			}
			
    		$data = fread($handle, $size);
			
			if(strlen($data) != $size)
            {
				$this->_error_last = array(10, $name);
				fclose($handle);
				return array();
			}
			
			$diff = $size % 512;
			
			if($diff != 0)
            {
				$crap = fread($handle, (512 - $diff));
			}
			
			if(false == $name)
            {
				break;
			}

    		$info[] = array('name'     => $name,
                            'mode'     => OctDec(trim($attrib['mode'])),
                            'uid'      => OctDec(trim($attrib['uid'])),
                            'gid'      => OctDec(trim($attrib['gid'])),
                            'size'     => $size,
                            'mtime'    => OctDec(trim($attrib['mtime'])),
                            'chksum'   => $chksum,
                            'typeflag' => trim($attrib['typeflag']),
                            'linkname' => @trim($attrib['linkname']),
                            'magic'    => trim($attrib['magic']),
                            'version'  => trim($attrib['version']),
                            'uname'    => trim($attrib['uname']),
                            'gname'    => trim($attrib['gname']),
                            'devmajor' => OctDec(trim($attrib['devmajor'])),
                            'devminor' => OctDec(trim($attrib['devminor'])),
                            'prefix'   => $prefix,
                            'data'     => $data);
		}
		
		fclose($handle);
		
		return $info;
    }

   // ! Action Method

   /**
    * A recursive method that spiders a
    * specified directory tree. It will 
    * add to the current file cache any
    * file it comes across.
    *
    * @param String $string Description
    * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
    * @since v1.0
    * @access Private
    * @return Boolean
    */
    function _spiderDirectory($path)
    {
        if(false == is_dir($path))
        {
			$this->_error_last = array(12, $path);
			return false ;  
        }

		$handle = opendir($path);
		while(false !== ($file = readdir($handle)))
		{
			if(($file != '.') & ($file != '..'))
			{
				if(@is_dir($path . '/' . $file))
                {
					$this->_spiderDirectory($path . '/' . $file);
                }

				if(@is_file($path . '/' . $file))
                {
					$this->addFile($path . '/' . $file);
                }
			}
		}
		closedir($handle);

        return true;
    }

   // ! Action Method

   /**
    * A simple method that creates garbage
    * data and returns it as a string based on
    * how many iterations are passed.
    *
    * @param String  $data       String to build upon
    * @param Integer $iterations Amount of cycles that will generate the garbage data
    * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
    * @since v1.0
    * @access Private
    * @return String
    */
	function _buildString($data, $iterations) {

		$out = '';
		for($i = 0 ; $i < $iterations ; ++$i )
        {
			$out .= $data;
		}

		return $out;
	}
}

?>