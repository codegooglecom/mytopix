<?php

/***
 * MyTopix | Personal Message Board
 * Copyright (C) 2005 - 2007 Wilhelm Murdoch
 * 
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 ***/
/**
* Cache Handling Class
*
* This library allows the system to retrieve the
* most commonly accessed types of data all at once.
* This has the potential to boost system preformance
* while also knocking off a few queries.
*
* @license http://www.jaia-interactive.com/licenses/mytopix/
* @version $Id: cache.han.php murdochd Exp $
* @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
* @company Jaia Interactive http://www.jaia-interactive.com/
* @package MyTopix | Personal Message Board
*/
class MailHandler
{
   /**
    * Multi-dimensional array containing
    * requested data.
    * @access Private
    * @var Array
    */
    var $_error;

   /**
    * Multi-dimensional array containing
    * requested data.
    * @access Private
    * @var Array
    */
    var $_use_html;

   /**
    * Multi-dimensional array containing
    * requested data.
    * @access Private
    * @var Array
    */
    var $_send_method;

   /**
    * Multi-dimensional array containing
    * requested data.
    * @access Private
    * @var Array
    */
    var $_email_from;

   /**
    * Multi-dimensional array containing
    * requested data.
    * @access Private
    * @var Array
    */
    var $_email_to;

   /**
    * Multi-dimensional array containing
    * requested data.
    * @access Private
    * @var Array
    */
    var $_email_subject;

   /**
    * Multi-dimensional array containing
    * requested data.
    * @access Private
    * @var Array
    */
    var $_email_message;

   /**
    * Multi-dimensional array containing
    * requested data.
    * @access Private
    * @var Array
    */
    var $_smtp_port;

   /**
    * Multi-dimensional array containing
    * requested data.
    * @access Private
    * @var Array
    */
    var $_smtp_host;

   /**
    * Multi-dimensional array containing
    * requested data.
    * @access Private
    * @var Array
    */
    var $_smtp_pass;

   /**
    * Multi-dimensional array containing
    * requested data.
    * @access Private
    * @var Array
    */
    var $_smtp_user;

   /**
    * Multi-dimensional array containing
    * requested data.
    * @access Private
    * @var Array
    */
    var $_smtp_server_id;

   /**
    * Multi-dimensional array containing
    * requested data.
    * @access Private
    * @var Array
    */
    var $_smtp_server_response;

   /**
    * Multi-dimensional array containing
    * requested data.
    * @access Private
    * @var Array
    */
    var $_smtp_server_code;

   // ! Constructor Method

   /**
    * Instansiates class and defines instance
    * variables.
    *
    * @param Object $System System library passed by reference
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @access Private
    * @return String
    */
    function MailHandler()
    {
        $this->_error         = null;
        $this->_bcc           = array();
        $this->_use_html      = false;
        $this->_send_method   = 'smtp';

        $this->_email_from    = '';
        $this->_email_to      = '';
        $this->_email_subject = '';
        $this->_email_message = '';

        $this->_smtp_port     = 25;
        $this->_smtp_host     = '';
        $this->_smtp_pass     = '';
        $this->_smtp_user     = '';

        $this->_smtp_server_id       = null;
        $this->_smtp_server_response = null;
        $this->_smtp_server_code     = null;
    }

   // ! Action Method

   /**
    * This method is to be used after updating certain
    * system settings or types of data. This ensures that
    * the cache is always up-to-date with the correct data.
    *
    * @param String $type The specific cache group to update
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @access Public
    * @return Boolean
    */
    function setSubject($subject)
    {
        $this->_email_subject = rtrim($subject);
    }

   // ! Action Method

   /**
    * This method is to be used after updating certain
    * system settings or types of data. This ensures that
    * the cache is always up-to-date with the correct data.
    *
    * @param String $type The specific cache group to update
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @access Public
    * @return Boolean
    */
    function setMessage($message)
    {
        $this->_email_message = rtrim($message);
    }

   // ! Action Method

   /**
    * This method is to be used after updating certain
    * system settings or types of data. This ensures that
    * the cache is always up-to-date with the correct data.
    *
    * @param String $type The specific cache group to update
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @access Public
    * @return Boolean
    */
    function setFromEmail($email_from)
    {
        $this->_email_from = $email_from;
    }

   // ! Action Method

   /**
    * This method is to be used after updating certain
    * system settings or types of data. This ensures that
    * the cache is always up-to-date with the correct data.
    *
    * @param String $type The specific cache group to update
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @access Public
    * @return Boolean
    */
    function setToEmail($email_to)
    {
        $this->_email_from = $email_to;
    }

   // ! Action Method

   /**
    * This method is to be used after updating certain
    * system settings or types of data. This ensures that
    * the cache is always up-to-date with the correct data.
    *
    * @param String $type The specific cache group to update
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @access Public
    * @return Boolean
    */
    function setBcc($bcc)
    {
        if(is_array($bcc))
        {
            $this->_bcc = $bcc;
        }

        return false;
    }

   // ! Action Method

   /**
    * This method is to be used after updating certain
    * system settings or types of data. This ensures that
    * the cache is always up-to-date with the correct data.
    *
    * @param String $type The specific cache group to update
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @access Public
    * @return Boolean
    */
    function setMethod($method = 'mail')
    {
        $types = array('mail', 'smtp');

        if(false == in_array($method, $types))
        {
            return false;
        }

        $this->_send_method = $method;
    }

   // ! Action Method

   /**
    * This method is to be used after updating certain
    * system settings or types of data. This ensures that
    * the cache is always up-to-date with the correct data.
    *
    * @param String $type The specific cache group to update
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @access Public
    * @return Boolean
    */
    function setHtmlUsage($usage = true)
    {
        $this->_use_html = $usage;
    }

   // ! Action Method

   /**
    * This method is to be used after updating certain
    * system settings or types of data. This ensures that
    * the cache is always up-to-date with the correct data.
    *
    * @param String $type The specific cache group to update
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @access Public
    * @return Boolean
    */
    function setSmtpPort($port = 25)
    {
        $this->_smtp_port = $port;
    }    

   // ! Action Method

   /**
    * This method is to be used after updating certain
    * system settings or types of data. This ensures that
    * the cache is always up-to-date with the correct data.
    *
    * @param String $type The specific cache group to update
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @access Public
    * @return Boolean
    */
    function setSmtpHost($host = 'localhost')
    {
        $this->_smtp_host = $host;
    }   

   // ! Action Method

   /**
    * This method is to be used after updating certain
    * system settings or types of data. This ensures that
    * the cache is always up-to-date with the correct data.
    *
    * @param String $type The specific cache group to update
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @access Public
    * @return Boolean
    */
    function setSmtpUser($user)
    {
        $this->_smtp_user = $user;
    }

   // ! Action Method

   /**
    * This method is to be used after updating certain
    * system settings or types of data. This ensures that
    * the cache is always up-to-date with the correct data.
    *
    * @param String $type The specific cache group to update
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @access Public
    * @return Boolean
    */
    function setSmtpPass($pass)
    {
        $this->_smtp_pass = $pass;
    }   

   // ! Action Method

   /**
    * This method is to be used after updating certain
    * system settings or types of data. This ensures that
    * the cache is always up-to-date with the correct data.
    *
    * @param String $type The specific cache group to update
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @access Public
    * @return Boolean
    */
    function getSmtpResponse()
    {
        $this->_smtp_server_response = fgets($this->_smtp_server_id, 1024);
		$this->_smtp_server_code     = substr($this->_smtp_server_response, 0, 3);
    }

   // ! Action Method

   /**
    * This method is to be used after updating certain
    * system settings or types of data. This ensures that
    * the cache is always up-to-date with the correct data.
    *
    * @param String $type The specific cache group to update
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @access Public
    * @return Boolean
    */
    function sendSmtpCommand($command)
    {
    	fputs($this->_smtp_server_id, $command . "\r\n");

		$this->getSmtpResponse();

		return $this->_smtp_server_code ? true : false;
    }

   // ! Action Method

   /**
    * This method is to be used after updating certain
    * system settings or types of data. This ensures that
    * the cache is always up-to-date with the correct data.
    *
    * @param String $type The specific cache group to update
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @access Public
    * @return Boolean
    */
    function openSmtpSocket()
    {
		$this->_smtp_server_id = fsockopen($this->_smtp_host,
                                           $this->_smtp_port,
                                           $errno, $errstr, 30);

        if(false == $this->_smtp_server_id)
        {
            $this->_setError(101);
            return false;
        }

        $this->sendSmtpCommand("EHLO {$this->_smtp_host}");

        if($this->_smtp_server_code != 220) // Service not ready ...
        {
            $this->_setError(102);
            return false;
        }

        if($this->_smtp_user && $this->_smtp_pass)
        {
            $this->sendSmtpCommand('AUTH LOGIN');

            if($this->_smtp_server_code == 334) // Server accepts user authentication ...
            {
                $this->sendSmtpCommand(base64_encode($this->_smtp_user)); // Encode username
                $this->sendSmtpCommand(base64_encode($this->_smtp_pass)); // Encode password

                if($this->_smtp_server_code != 235) // Could not authenticate ...
                {
                    $this->_setError(201);
                    return false;
                }
            }
            else
            {
                $this->_setError(202);
                return false;
            }
        }

        return true;
    }

   // ! Action Method

   /**
    * This method is to be used after updating certain
    * system settings or types of data. This ensures that
    * the cache is always up-to-date with the correct data.
    *
    * @param String $type The specific cache group to update
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @access Public
    * @return Boolean
    */
    function closeSmtpSocket()
    {
        $this->sendSmtpCommand('QUIT');

        if($this->_smtp_server_code != 221) // Cannot close transmission channel
        {
            $this->_setError(103);
            return false;
        }

        @fclose($this->_smtp_server_id);

        $this->_smtp_server_id       = null;
        $this->_smtp_server_response = null;
        $this->_smtp_server_code     = null;

        return true;
    }

   // ! Action Method

   /**
    * This method is to be used after updating certain
    * system settings or types of data. This ensures that
    * the cache is always up-to-date with the correct data.
    *
    * @param String $type The specific cache group to update
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @access Public
    * @return Boolean
    */
    function _setError($type)
    {
        $error_types = array(101 => 'mail_cannot_connect',
                             102 => 'mail_no_status',
                             103 => 'mail_no_close_connection',
                
                             201 => 'mail_logon_fail',
                             202 => 'mail_no_auth_support');

        $this->_error = $error_types[$type];
        return true;
    }

   // ! Action Method

   /**
    * This method is to be used after updating certain
    * system settings or types of data. This ensures that
    * the cache is always up-to-date with the correct data.
    *
    * @param String $type The specific cache group to update
    * @author Daniel Wilhelm II Murdoch <jaiainteractive@gmail.com>
    * @since v1.0
    * @access Public
    * @return Boolean
    */
    function getError()
    {
        return $this->_error;
    }
}

?>