<?php

if(false == defined('INSTALLER'))
{
    die('<b>ERROR:</b> You may not access this file directly!');
}

setup_log('Updating default skin templates.', $file);

setup_log('... TEMPLATE: Personal Notes          -> notes_reply_form',              $file);
setup_log('... TEMPLATE: Personal Notes          -> note_read ',                    $file);
setup_log('... TEMPLATE: Universal Items         -> global_message_level_2_logon ', $file);
setup_log('... TEMPLATE: Content Posting Screens -> form_field_attach',             $file);
setup_log('... TEMPLATE: Content Posting Screens -> form_wrapper',                  $file);

setup_log('Templates Updated.', $file);

$query   = array();

$query[] = 'DELETE FROM ' . DB_PREFIX . "templates WHERE temp_name IN ('form_wrapper', 'global_message_level_2_logon', 'notes_reply_form', 'note_read', 'form_field_attach') AND temp_skin = 1";

$query[] = 'INSERT INTO ' . DB_PREFIX . 'templates VALUES("1", "post", "form_wrapper", "<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> {$bread_crumb}\r\n</div>\r\n{$errors}\r\n<script language=\'javascript\'>\r\nfunction check_length()\r\n{\r\n	var limit  = <conf:max_post> * 1000;\r\n	var length = document.REPLIER.body.value.length;\r\n		if ( (length > limit) ) {\r\n		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');\r\n	} else {\r\n		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);\r\n	}\r\n\r\n}\r\n</script>\r\n<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>\r\n<form method=\"POST\" action=\"{$this->_form_action}\" name=\"REPLIER\" {$this->_form_multipart}>\r\n	<div class=\"formwrap\">\r\n		<h3>{$this->_form_title}</h3>\r\n		<p class=\"checkwrap\">{$this->_form_tip}</p>\r\n		{$recipient}\r\n		{$name}\r\n		{$title}\r\n		{$subject}\r\n		{$bbcode}\r\n		{$emoticons}\r\n		<h3><lang:post_message_title></h3>\r\n		<h4><lang:post_message_tip> (  <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:post_link_bbcode></a> � <a href=\'javascript:smilie_window(\"<sys:gate>\")\'><lang:post_link_emoticons></a> � <a href=\'javascript:check_length()\'><lang:post_link_length></a> )</h4>\r\n		<textarea name=\"body\" rows=\"5\" tabindex=\"1\">{$message}</textarea>\r\n		{$quote}\r\n		{$convert}\r\n		{$upload}\r\n		{$tools}\r\n		<p class=\"submit\">\r\n			<input class=\"button\" type=\"submit\" tabindex=\"2\" value=\"{$this->_form_submit}\" />&nbsp;\r\n			<input class=\"reset\" type=\"reset\" value=\"<lang:form_button_reset>\" />\r\n		</p>\r\n		<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n		{$hidden}\r\n	</div>\r\n</form>");';
$query[] = 'INSERT INTO ' . DB_PREFIX . 'templates VALUES("1", "global", "global_message_level_2_logon", "<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">\r\n	<div class=\"formwrap\">\r\n		<h3><lang:sys_log_name_title></h3>\r\n		<h4><lang:sys_log_name_desc></h4>\r\n		<input type=\'text\' name=\'username\' tabindex=\'1\' />\r\n		<h3><lang:sys_log_pass_title></h3>\r\n		<h4><lang:sys_log_pass_desc></h4>\r\n		<input type=\'password\' name=\'password\' tabindex=\'2\' />\r\n		<p class=\"submit\">\r\n			<input class=\"button\" type=\"submit\" value=\"<lang:form_logon_button_submit>\" />&nbsp;\r\n			<input class=\"reset\" type=\"reset\" value=\"<lang:form_logon_button_reset>\" />\r\n		</p>\r\n		<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n		<input type=\"hidden\" name=\"referer\" value=\"{$referer}\" />\r\n	</div>\r\n</form>");';
$query[] = 'INSERT INTO ' . DB_PREFIX . 'templates VALUES("1", "notes", "notes_reply_form", "<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=notes\" title=\"\"><lang:notes_inbox_title></a> / <a href=\"<sys:gate>?a=notes&amp;CODE=01&amp;nid={$this->_id}\" title=\"\">{$bread_title}</a> / <lang:notes_reply_crumb_title>\r\n</div>\r\n{$error_list}\r\n<script language=\"javascript\">\r\nfunction check_length()\r\n{\r\n	var limit  = <conf:max_post> * 1000;\r\n	var length = document.REPLIER.body.value.length;\r\n\r\n	if ( (length > limit) ) {\r\n		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');\r\n	} else {\r\n		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);\r\n	}\r\n\r\n}\r\n</script>\r\n<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>\r\n<a name=\"qwiknote\"></a>\r\n<form method=\"POST\" action=\"<sys:gate>?a=notes&amp;CODE=02&amp;nid={$this->_id}\" name=\"REPLIER\">\r\n	<div class=\"formwrap\">\r\n		<h3><lang:notes_reply_title> {$note[\'notes_title\']}</h3>\r\n		<h4><lang:form_send_tip></h4>\r\n		<h3><lang:post_field_recipient_title>:</h3>\r\n		<h4><lang:post_field_recipient_tip> ( <a href=\'<sys:gate>?a=members\'><lang:post_field_recipient_link_search></a> )</h4>\r\n		<input type=\'text\' name=\'recipient\' value=\'{$recipient}\' tabindex=\'1\' />\r\n		<h3><lang:post_field_title>:</h3>\r\n		<h4><lang:post_field_title_tip>.</h4>\r\n		<input type=\'text\' name=\'title\' value=\"{$note[\'notes_title\']} \"tabindex=\'2\' />\r\n		{$bbcode}\r\n		<h3><lang:post_emoticon_title></h3>\r\n		<h4><lang:post_emoticon_tip></h4>\r\n		{$emoticons}\r\n		<h3><lang:post_message_title></h3>\r\n		<h4><lang:post_message_tip> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:post_link_bbcode></a> � <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:post_link_emoticons></a> � <a href=\"javascript:check_length()\"><lang:post_link_length></a> )</h4>\r\n		<textarea name=\"body\" tabindex=\'3\'>{$body}</textarea>\r\n		<h3><lang:post_field_quote></h3>\r\n		<h4><lang:post_field_quote_tip></h4>\r\n		<textarea name=\"quote\" tabindex=\'3\'>{$quote}</textarea>\r\n		<h3><lang:post_options></h3>\r\n		<h4><lang:post_options_tip>.</h4>\r\n		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_code></p>\r\n		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_emoticon></p>\r\n		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:post_button_send>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:post_button_reset>\" /></p>\r\n		<input type=\'hidden\' name=\"id\" value=\"{$this->_id}\" />\r\n		<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n	</div>\r\n</form>");';
$query[] = 'INSERT INTO ' . DB_PREFIX . 'templates VALUES("1", "notes", "note_read", "<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=notes\" title=\"\"><lang:notes_inbox_title></a> / <lang:notes_read_crumb_title> {$row[\'notes_title\']}\r\n</div>\r\n<div class=\"postbutton\">\r\n	<a href=\'<sys:gate>?a=notes&amp;CODE=3&amp;nid={$this->_id}&amp;send={$row[\'members_name\']}\'><macro:btn_note_reply></a>&nbsp;<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>\r\n</div>\r\n<div class=\"postwrap\">\r\n	<div class=\"postheader\">{$row[\'notes_title\']}</div>\r\n	<div class=\"user\">\r\n		<a name=\"{$row[\'notes_id\']}\"></a>\r\n		<p><a href=\"<sys:gate>?getuser={$row[\'members_id\']}\" title=\"<lang:entry_link_profile>\"><strong>{$row[\'members_name\']}</strong></a> <em>( <a href=\"<sys:gate>?a=search&CODE=02&mid={$row[\'members_id\']}\" title=\"<lang:entry_post_find> {$row[\'members_name\']}\">{$row[\'members_posts\']}</a> )</em>\r\n		<span><strong>&middot; <lang:posted_group></strong> {$row[\'class_title\']}</span>\r\n		<span><strong>&middot; <lang:entry_rank></strong> {$row[\'members_pips\']}</span></p>\r\n		{$avatar}<div style=\"clear:both;\" /></div>\r\n	</div>\r\n	<div class=\"post\">\r\n		<h5><span><a href=\"<sys:gate>?a=notes&amp;CODE=04&amp;nid={$row[\'notes_id\']}\" title=\"<lang:read_button_delete>\" onclick=\"javascript: return confirm(\'<lang:read_delete_confirm>\');\"><img src=\"<sys:skinPath>/post_delete.gif\" alt=\"<lang:read_delete_confirm>\" /></a></span><strong><lang:sent_on></strong> {$row[\'notes_date\']}</h5>\r\n		<p>{$row[\'notes_body\']}</p>{$sig}\r\n	</div>\r\n	<div class=\"foot\">\r\n		<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:read_link_top_title>.\"><lang:read_link_top></a></span>\r\n		<ul class=\"extras\">{$linkSpan}</ul>\r\n	</div>\r\n	<div class=\"postend\">&nbsp;</div>\r\n</div>\r\n<div class=\"postbutton\">\r\n	<a href=\'<sys:gate>?a=notes&amp;CODE=3&amp;nid={$this->_id}&amp;send={$row[\'members_name\']}\'><macro:btn_note_reply></a>&nbsp;<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>\r\n</div>");';
$query[] = 'INSERT INTO ' . DB_PREFIX . 'templates VALUES("1", "post", "form_field_attach", "		<h3><lang:attach_title></h3>\r\n		<h4>{$size_lang}</h4>\r\n		<p class=\"checkwrap\"><input type=\"file\" name=\"upload\" /></p>");';

foreach($query as $sql)
{
    $DB->query($sql);
}

setup_log('Updating version within system settings file.', $file);

switch($config['db_type'])
{
    case 'MySQL':
        
        $config['db_type'] = 'MySql';
        break;

    case 'MySQL41':

        $config['db_type'] = 'MySql41';
        break;
}

$config['version'] = 'v 1.2.3 Beta';

FileHandler::updateFileArray($config, 'config', SYSTEM_PATH . 'config/settings.php');

?>