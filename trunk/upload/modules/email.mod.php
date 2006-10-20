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
class ModuleObject extends MasterObject
{
   /**
    * A pool of posting error codes
    * @access Private
    * @var String
    */
	var $_errors;

   /**
    * Variable Description
    * @access Private
    * @var Integer
    */
	var $_id;

   /**
    * Variable Description
    * @access Private
    * @var Integer
    */
	var $_code;

   /**
    * Variable Description
    * @access Private
    * @var Integer
    */
    var $_hash;

   /**
    * Variable Description
    * @access Private
    * @var Integer
    */
	var $_MailHandler;

   // ! Action Method

   /**
    * Comment
    *
    * @param String $string Description
    * @author Daniel Wilhelm II Murdoch <wilhelm@cyberxtreme.org>
    * @since v1.0
    * @return String
    */
	function ModuleObject(& $module, & $config, $cache)
	{
        $this->MasterObject($module, $config, $cache);

		$this->_id     = isset($this->get['id'])    ? (int) $this->get['id']    : 0;
        $this->_code   = isset($this->get['CODE'])  ?       $this->get['CODE']  : 00;
        $this->_hash   = isset($this->post['hash']) ?       $this->post['hash'] : null;
        $this->_errors = array();

		require SYSTEM_PATH . 'lib/mail.han.php';
		$this->_MailHandler = new MailHandler($this->config['email_incoming'], 
                                              $this->config['email_outgoing'], 
                                              $this->config['email_name']);
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
	function execute()
	{
		if(false == $this->config['mailer_on'])
        {
            return $this->messenger(array('MSG' => 'err_not_active'));
        }

		if(false == $this->UserHandler->getField('class_canSendEmail'))
        {
            return $this->messenger(array('MSG' => 'err_no_perm'));
        }

		switch($this->_code)
		{
			case '00':
				return $this->_getForm();
				break;

			case '01':
				return $this->_sendMail();
				break;

			default:
				return $this->_getForm();
				break;
		}
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
	function _getForm()
	{
        $subject = isset($this->post['subject']) ? $this->post['subject'] : '';
        $body    = isset($this->post['body'])    ? $this->post['body']    : '';

        $error_list = '';

        if($this->_errors)
        {
            $error_list = $this->buildErrorList($this->_errors);
        }


		$sql = $this->DatabaseHandler->query("
        SELECT 
            members_id, 
            members_name 
        FROM " . DB_PREFIX . "members 
        WHERE members_id = {$this->_id}", __FILE__, __LINE__);

		if(false == $sql->getNumRows())
        {
            return $this->messenger(array('MSG' => 'err_invalid_user'));
        }

		$row = $sql->getRow();

        $this->LanguageHandler->email_form_title = sprintf($this->LanguageHandler->email_form_title,
                                                           $row['members_name']);

        $hash    = $this->UserHandler->getUserHash();
		$content = eval($this->TemplateHandler->fetchTemplate('email_member_form'));
		return     eval($this->TemplateHandler->fetchTemplate('global_wrapper'));
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
	function _sendMail()
	{
        if($this->_hash != $this->UserHandler->getUserhash())
        {
            return $this->messenger();
        }

		extract($this->post);

		$sql = $this->DatabaseHandler->query("
		SELECT 
			members_id, 
			members_name,
			members_email,
			members_show_email
		FROM " . DB_PREFIX . "members 
		WHERE members_id = {$this->_id}", 
        __FILE__, __LINE__);

        if(false == $sql->getNumRows())
        {
            $this->_errors[] = 'err_invalid_user';
        }

        $row = $sql->getRow();

        $offset = time() - $this->UserHandler->getField('class_floodDelay');

        $sql = $this->DatabaseHandler->query("
        SELECT email_id 
        FROM " . DB_PREFIX . "emails 
        WHERE 
            email_date > {$offset} AND 
            email_from = " . USER_ID, 
        __FILE__, __LINE__);

        if($sql->getNumRows())
        {
            $this->LanguageHandler->err_flood_control = sprintf($this->LanguageHandler->err_flood_control,                                                            $this->UserHandler->getField('class_floodDelay'));

            $this->_errors[] = 'err_flood_control';
        }

		if(false == $body)
        {
            $this->_errors[] = 'err_invalid_field';
        }

        if($this->_errors)
        {
            return $this->_getForm();
        }

		$subject = $subject ? $subject : $this->LanguageHandler->no_subject;

        $this->TemplateHandler->addTemplate(array('mail_header', 'mail_footer'));

        $sent = date($this->config['date_short'], time());
        $who  = $row['members_name'];

        $subject = $this->ParseHandler->parseText($subject, F_CURSE);
        $body    = $this->ParseHandler->parseText($body,    F_CURSE);

        $message  = eval($this->TemplateHandler->fetchTemplate('mail_header'));
        $message .= $body;
        $message .= eval($this->TemplateHandler->fetchTemplate('mail_footer'));

		$this->_MailHandler->setRecipient($row['members_email']);
		$this->_MailHandler->setSubject($this->config['title'] . ': ' . $subject);
		$this->_MailHandler->setMessage($message);
		
		if(false == $this->_MailHandler->doSend())
        {
            return $this->messenger(array('MSG' => 'err_no_send'));
        }

		$this->DatabaseHandler->query("
		INSERT INTO " . DB_PREFIX . "emails(
			email_to,
			email_from,
			email_subject,
			email_body,
			email_date)
		VALUES (
			{$row['members_id']},
			" . USER_ID . ",
			'{$subject}',
			'{$body}',
			" . time() . ")", 
        __FILE__, __LINE__);

        $this->LanguageHandler->err_sent = sprintf($this->LanguageHandler->err_sent, $row['members_name']);

        return $this->messenger(array('MSG' => 'err_sent', 'LEVEL' => 1));
	}
}

?>