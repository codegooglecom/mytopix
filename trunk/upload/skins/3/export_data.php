<?php
$temps  = array();
$emots  = array();
$titles = array();
$macros = array();
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_attach', '<p class=\"attach\">
	<a href=\"<sys:gate>?a=misc&amp;CODE=01&amp;id={\$row[\'upload_id\']}\" title=\"\">{\$row[\'upload_name\']}</a> <strong><lang:attach_size></strong> {\$row[\'upload_size\']} <strong><lang:attach_hits></strong> {\$row[\'upload_hits\']}
</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_coppa', 'In compliance with the COPPA act your account is currently inactive.

Please print this message out and have your parent or guardian sign and date it. 
Then fax it to:

<conf:coppa_fax>

OR mail it to:

<conf:coppa_mail>

------------------------------ CUT HERE ------------------------------
Permission to Participate at <conf:title> ( <conf:site_link> )

Username: {\$username}
Password: {\$password}
Email:    {\$email}

I HAVE REVIEWED THE INFORMATION PROVIDED BY MY CHILD AND HEREBY GRANT PERMISSION 
TO <conf:title> TO STORE THIS INFORMATION. I UNDERSTAND THIS INFORMATION CAN BE 
CHANGED AT ANY TIME BY ENTERING A PASSWORD. I UNDERSTAND THAT I MAY REQUEST FOR 
THIS INFORMATION TO BE REMOVED FROM <conf:title> AT ANY TIME.


Parent or Guardian: ____________________________
                       (print full name here)
Full Signature:     ____________________________

Today\'s Date:       ____________________________

------------------------------ CUT HERE ------------------------------


Once the administrator has received the above form via fax or regular mail your 
account will be activated.

Please do not forget your password as it has been encrypted in our database and 
we cannot retrieve it for you. However, should you forget your password you can 
request a new one which will be activated in the same way as this account.

Thank you for registering.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'form_error_wrapper', '<div id=\"warning\">
<h3><lang:err_wrap_title></h3>
<p><strong><lang:err_wrap_desc></strong></p>
<ul>{\$err_list}</ul>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_files_none', '<tr>
	<td colspan=\"7\" align=\"center\"><strong><lang:file_none></strong></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_files_row', '<tr>
	<td class=\"one\" align=\"center\"><strong>{\$row[\'upload_id\']}</strong></td>
	<td><a href=\"<sys:gate>?a=misc&amp;CODE=01&amp;id={\$row[\'upload_id\']}\" title=\"\">{\$row[\'upload_name\']}</a></td>
	<td class=\"one\"><a href=\"<sys:gate>?a=read&amp;CODE=02&amp;p={\$row[\'upload_post\']}\" title=\"\">{\$row[\'topics_title\']}</a></td>
	<td align=\"center\">{\$row[\'upload_date\']}</td>
	<td class=\"one\" align=\"center\">{\$row[\'upload_size\']}</td>
	<td align=\"center\">{\$row[\'upload_hits\']}</td>
	<td class=\"one\" align=\"center\"><a href=\"<sys:gate>?a=ucp&amp;CODE=18&amp;id={\$row[\'upload_id\']}\" title=\"\" onclick=\"javascript: return confirm(\'<lang:file_link_del_conf>\');\"><lang:file_link_del></a></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_new_note', '<div id=\"message_alert\">
	<h3><lang:note_title></h3>
	<p><a href=\"<sys:gate>?getuser={\$note[\'members_id\']}\" title=\"\">{\$note[\'members_name\']}</a> <lang:note_desc> <a href=\"<sys:gate>?a=notes&amp;CODE=01&amp;nid={\$note[\'notes_id\']}\" title=\"\">{\$note[\'notes_title\']}</a>!</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'mod_poll_option_row', '		<input type=\"text\" name=\"choice[{\$val[\'id\']}]\" style=\"width: 60%;\" tabindex=\"2\" value=\"{\$val[\'choice\']}\" /><input type=\"text\" name=\"votes[{\$val[\'id\']}]\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$val[\'votes\']}\" /><br />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'attach_rem_field', '<p class=\"checkwarn\"><input type=\"checkbox\" class=\"check\" name=\"remove_attach\" value=\"1\"  />&nbsp;<lang:attach_rem>&nbsp;( <a href=\"<sys:gate>?a=misc&amp;CODE=01&amp;id={\$file_id}\">{\$file_name}</a> )</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'mod_poll_wrapper', '		<h3><lang:mod_poll_editor_title></h3>
		<h4><lang:mod_poll_editor_desc></h4>
		<input type=\"text\" name=\"poll_title\" tabindex=\"1\" value=\"{\$poll[\'poll_question\']}\" />
		<h3><lang:poll_choice_title></h3>
		<h4><lang:poll_choice_desc></h4>
		{\$choices}
		<h3><lang:poll_expire_title></h3>
		<h4><lang:poll_expire_desc></h4>
		<input type=\"text\" name=\"days\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$days}\" />
		<h3><lang:poll_lock_title></h3>
		<h4><lang:poll_lock_desc></h4>
		<input type=\"text\" name=\"vote_lock\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$poll[\'poll_vote_lock\']}\" />
		<h3><lang:poll_options_title></h3>
		<h4><lang:poll_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"poll_only\" value=\"1\" tabindex=\"3\" {\$poll_only} /> <lang:poll_lock_option></p>
		<p class=\"checkwarn\"><input type=\"checkbox\" class=\"check\" name=\"remove\" value=\"1\" tabindex=\"3\" /> <lang:poll_delete></p>
		<input type=\"hidden\" name=\"poll\" value=\"{\$poll[\'poll_id\']}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_result_wrapper', '<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"2\">{\$poll[\'poll_question\']}</td>
		</tr>
		<tr>
			<th width=\"50%\"><lang:poll_tbl_header_choice></th>
			<th><lang:poll_tbl_header_result></th>
		</tr>
			{\$poll_list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_poll_choice_row', '<tr>
	<td class=\"cellone np\"><p class=\"checkwrap\"><input type=\"radio\" name=\"vote\" class=\"check\" id=\"choice_{\$val[\'id\']}\" value=\"{\$val[\'id\']}\" />&nbsp;<label for=\"choice_{\$val[\'id\']}\"><strong>{\$val[\'choice\']}</strong></label></p></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_poll_result_row', '<tr>
	<td class=\"cellone\"><strong>{\$val[\'choice\']}</strong></td>
	<td class=\"cellone\" align=\"right\"><img src=\"<sys:skinPath>/bar_left.gif\" alt=\"\" /><img src=\"<sys:skinPath>/bar_center.gif\" alt=\"\" width=\"{\$width}\" height=\"17px\" /><img src=\"<sys:skinPath>/bar_right.gif\" alt=\"\" /><br />{\$percent}% ( {\$val[\'votes\']} votes ) --
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_option_poll', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"poll\" value=\"1\" {\$poll_check} /> <lang:post_options_poll></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_choice_wrapper', '<form method=\"post\" action=\"<sys:gate>?a=read&amp;CODE=05&amp;t={\$this->_id}\">
	<div class=\"maintable\">
		<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
			<tr>
				<td class=\"header\">{\$poll[\'poll_question\']}</td>
			</tr>
			<tr>
				<th>&nbsp;</th>
			</tr>
				{\$poll_list}
		</table>
	</div>
<p class=\"submit\"><input type=\"button\" value=\"<lang:poll_submit_add>\" style=\"width: auto;\" /></p>
	<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_attach_poll', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / <a href=\"<sys:gate>?gettopic={\$this->_id}\" title=\"\">{\$topic[\'topics_title\']}</a> / <lang:poll_bread_title>
</div>
{\$error_list}
<form method=\"POST\" action=\"<sys:gate>?a=post&amp;CODE=08&amp;t={\$this->_id}\">
	<div class=\"formwrap\">
		<h3><lang:poll_title_title></h3>
		<h4><lang:poll_title_desc></h4>
		<input type=\"text\" name=\"title\" tabindex=\"1\" value=\"{\$title}\" />
		<h3><lang:poll_choice_title></h3>
		<h4><lang:poll_choice_desc></h4>
		<textarea name=\"choices\" tabindex=\"1\">{\$choices}</textarea>
		<h3><lang:poll_expire_title></h3>
		<h4><lang:poll_expire_desc></h4>
		<input type=\"text\" name=\"days\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$days}\" />
		<h3><lang:poll_lock_title></h3>
		<h4><lang:poll_lock_desc></h4>
		<input type=\"text\" name=\"vote_lock\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$vote_lock}\" />
		<h3><lang:poll_options_title></h3>
		<h4><lang:poll_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"poll_only\" value=\"1\" tabindex=\"3\" {\$poll_only} /> <strong><lang:poll_lock_option></strong></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:poll_button_submit>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:poll_button_reset>\" /></p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_edit_event_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=calendar\" title=\"\"><lang:bread_title_two></a> / <a href=\"<sys:gate>?getevent={\$this->_id}\" title=\"\">{\$row[\'event_title\']}</a> / <lang:edit_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}
}
</script>
<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
<a name=\"qwiknote\"></a>
<form method=\"POST\" action=\"<sys:gate>?a=calendar&amp;CODE=06&amp;id={\$this->_id}\" name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:form_add_type_title></h3>
		<h4><lang:form_add_type_desc></h4>
		<p class=\"checkwrap\">
			<strong><lang:form_start_date_on></strong>&nbsp;
			<select name=\"start_month\">{\$start_months}</select>&nbsp;
			<select name=\"start_day\">{\$start_days}</select>&nbsp;
			<select name=\"start_year\">{\$start_years}</select>
		</p>
		<p class=\"checkwrap\">
			<strong><lang:form_loop_every> </strong>&nbsp;
			<select name=\"loop_type\">{\$loop_types}</select>&nbsp;<strong><lang:form_loop_until></strong>&nbsp;
			<select name=\"end_month\">{\$end_months}</select>&nbsp;
			<select name=\"end_day\">{\$end_days}</select>&nbsp;
			<select name=\"end_year\">{\$end_years}</select>
		</p>
		{\$groups}
		<h3><lang:form_add_title_title></h3>
		<h4><lang:form_add_title_desc></h4>
		<input type=\'text\' name=\'title\' tabindex=\'1\' value=\"{\$title}\">
		{\$bbcode}
		<h3><lang:form_emoticon_title></h3>
		<h4><lang:form_emoticon_desc></h4>
		{\$emoticons}
		<h3><lang:form_body_title></h3>
		<h4><lang:form_body_desc> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:form_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:form_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:form_link_length></a> )</h4>
		<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
		<h3><lang:form_options_title></h3>
		<h4><lang:form_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" {\$code_check} /> <lang:form_code_desc></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" {\$emo_check} /> <lang:form_emo_desc></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:form_button_update>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:form_button_reset>\" /></p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_month_event', '<p>{\$event}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_read_event', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=calendar\" title=\"\"><lang:bread_title_two></a> / <lang:bread_title_read> {\$row[\'event_title\']}
</div>
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=calendar&CODE=02\" title=\"\"><macro:btn_add_event></a>
</div>
<div class=\"postwrap\">
	<div class=\"postheader\">{\$row[\'event_title\']} <em>( {\$type} )</em></div>
	<div class=\"user\">
		<p><a href=\"<sys:gate>?getuser={\$row[\'members_id\']}\" title=\"<lang:entry_link_profile>\"><strong>{\$row[\'members_name\']}</strong></a> <em>( <a href=\"<sys:gate>?a=search&CODE=02&mid={\$row[\'members_id\']}\" title=\"<lang:entry_post_find> {\$row[\'members_name\']}\">{\$row[\'members_posts\']}</a> )</em>
		<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span>
		<span><strong>&middot; <lang:entry_rank></strong> {\$row[\'members_pips\']}</span></p>
		{\$avatar}
	</div>
	<div class=\"post\">
		<h5><span>{\$link_delete}&nbsp;{\$link_edit}</span><strong><lang:event_started></strong> {\$date_starts} <strong><lang:event_ends></strong> {\$date_ends}</h5>
		<p>{\$row[\'event_body\']}</p>{\$sig}
	</div>
	<div class=\"foot\">
		<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:read_link_top_title>.\"><lang:read_link_top></a></span>
		<ul class=\"extras\">{\$active}{\$linkSpan}</ul>
	</div>
	<div class=\"postend\">&nbsp;</div>
</div>
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=calendar&CODE=02\" title=\"\"><macro:btn_add_event></a>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_group_list', '		<h3><lang:form_groups_title></h3>
		<h4><lang:form_groups_desc></h4>
		<p class=\"checkwrap\"><select name=\"groups[]\" size=\"5\" multiple=\"multiple\" style=\"width: 200px;\" class=\"jump\">{\$group_list}</select></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_new_event_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=calendar\" title=\"\"><lang:bread_title_two></a> / <lang:add_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}
}
</script>
<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
<a name=\"qwiknote\"></a>
<form method=\"POST\" action=\"<sys:gate>?a=calendar&amp;CODE=03\" name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:form_add_type_title></h3>
		<h4><lang:form_add_type_desc></h4>
		<p class=\"checkwrap\">
			<strong><lang:form_start_date_on> </strong>&nbsp;
			<select name=\"start_month\">{\$start_months}</select>&nbsp;
			<select name=\"start_day\">{\$start_days}</select>&nbsp;
			<select name=\"start_year\">{\$start_years}</select>
		</p>
		<p class=\"checkwrap\">
			<strong><lang:form_loop_every> </strong>&nbsp;
			<select name=\"loop_type\">{\$loop_types}</select>&nbsp;<strong><lang:form_loop_until></strong>&nbsp;
			<select name=\"end_month\">{\$end_months}</select>&nbsp;
			<select name=\"end_day\">{\$end_days}</select>&nbsp;
			<select name=\"end_year\">{\$end_years}</select>
		</p>
		{\$groups}
		<h3><lang:form_add_title_title></h3>
		<h4><lang:form_add_title_desc></h4>
		<input type=\'text\' name=\'title\' tabindex=\'1\' value=\"{\$title}\" />
		{\$bbcode}
		<h3><lang:form_emoticon_title></h3>
		<h4><lang:form_emoticon_desc></h4>
		{\$emoticons}
		<h3><lang:form_body_title></h3>
		<h4><lang:form_body_desc> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:form_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:form_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:form_link_length></a> )</h4>
		<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
		<h3><lang:form_options_title></h3>
		<h4><lang:form_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" checked=\"checked\" /> <lang:form_code_desc></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" checked=\"checked\" /> <lang:form_emo_desc></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:form_button_submit>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:form_button_reset>\" /></p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_blank_row', '<td class=\"{\$class}\">&nbsp;</td>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_date_row', '<td class=\"{\$class}\"><h4>{\$day}</h4><div class=\"events\">{\$events}</div></td>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_month_wrapper', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:bread_title> {\$lit_month}, {\$lit_year}
</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"2\" align=\"left\"><a href=\"<sys:gate>?a=calendar{\$link_prev}\" title=\"\">« {\$link_prev_lit_month}, {\$link_prev_lit_year}</a></td>
			<td class=\"header\" colspan=\"3\" align=\"center\">{\$lit_month}, {\$lit_year}</td>
			<td class=\"header\" colspan=\"2\" align=\"right\"><a href=\"<sys:gate>?a=calendar{\$link_next}\" title=\"\">{\$link_next_lit_month}, {\$link_next_lit_year} »</a></td>
		</tr>
		<tr>
			<th width=\"14%\" align=\"center\"><lang:lit_day_one></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_two></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_three></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_four></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_five></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_six></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_seven></th>
		</tr>
			{\$day_list}
	</table>
</div>
<div class=\"postbutton\"><a href=\"<sys:gate>?a=calendar&amp;CODE=02\" title=\"\"><macro:btn_add_event></a>
</div>
<form method=\"post\" action=\"<sys:gate>?a=calendar\">
<div class=\"formwrap\"><p class=\"sort\">
					<select name=\"month\" class=\"jump\">{\$months}</select>
					<select name=\"year\" class=\"jump\">{\$years}</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"go\" /></p>
</div>
				</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_avatar_row', '<td align=\"center\">
	<label for=\"{\$val}\"><img src=\"<sys:sys_path>sys_images/ava_gallery/{\$gallery}/{\$val}\" alt=\"{\$val}\" /><br />
	<strong>{\$val}</strong></label><br /><input type=\"radio\" class=\"check\" name=\"avatar\" value=\"{\$val}\" id=\"{\$val}\" />
</td>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_avatar_gallery_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:ava_gallery_form_title></h3>
	<p class=\"checkwrap\"><lang:ava_tip></p>
	<h3><lang:ava_gallery_title></h3>
	<h4><lang:ava_gallery_tip></h4>
	<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=15\">
		<p class=\"checkwrap\">
			<select name=\"gallery\" class=\"jump\">
				{\$gallery_list}
			</select>
		</p>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:ava_gallery_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</form>
	<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=16\">
		<div id=\"maintable\">
			<table cellpadding=\"15\" cellspacing=\"1\" width=\"100%\">
				{\$avatar_rows}
			</table>
		</div>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:ava_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		<input type=\"hidden\" name=\"gallery\" value=\"{\$gallery}\" />
	</form>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sub_forum_row', '		<tr>
			<td align=\"center\" class=\"one\" width=\"1%\"><macro:icon_open_new></td>
			<td><a href=\"<sys:gate>?getforum={\$row[\'forum_id\']}\" title=\"\"><strong>{\$row[\'forum_name\']}</strong></a></td>
			<td align=\"center\" class=\"one\">{\$row[\'track_date\']}</td>
			<td align=\"center\"><a href=\"<sys:gate>?a=ucp&amp;CODE=13&amp;forum={\$row[\'forum_id\']}\" title=\"\"><strong><lang:sub_delete></strong></a></td>
		</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_stats', '<div class=\"infowrap\">
	<h1><lang:stat_title>:</h1>
	<h2><lang:stat_tip></h2>
	<p><lang:stat_totals><br />
	<lang:stat_newest><br />
	<lang:stat_online></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_announce', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"announce\" value=\"1\" {\$check[\'announce\']} /> <strong><lang:post_mod_options_announce></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_avatar_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:ava_title></h3>
	<p class=\"checkwrap\"><lang:ava_tip></p>
	<h4><strong><lang:ava_current></strong><br /> {\$avatar}</h4>
	<h4><lang:ava_ext> {\$ext}</h4>
</div>
<div class=\"formwrap\">
	<h3><lang:ava_gallery_title></h3>
	<h4><lang:ava_gallery_tip></h4>
	<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=15\">
		<p class=\"checkwrap\">
			<select name=\"gallery\" class=\"jump\">
				{\$gallery_list}
			</select>
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		</p>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:ava_gallery_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</form>
</div>
<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=17\" enctype=\'multipart/form-data\'>
	<div class=\"formwrap\">
		<h3><lang:ava_url_title></h3>
		<h4><lang:ava_url_tip></h4>
		<input type=\"text\" name=\"url\" value=\"{\$url}\" />
	</div>
	<div class=\"formwrap\">
		<h3><lang:ava_upload_title></h3>
		<h4><lang:ava_upload_tip></h4>
		<input type=\"file\" name=\"upload\" />
	</div>
	<div class=\"formwrap\">
		<h3><lang:ava_remove_title></h3>
		<p class=\"checkwarn\"><input type=\"checkbox\" class=\"check\" name=\"remove\" value=\"1\" /> <strong><lang:ava_remove_warn></strong></p>
		<p class=\"submit\">
		<input class=\"button\" type=\"submit\" value=\"<lang:ava_submit>\" />&nbsp;
		<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_jump_list', '	<form method=\"post\" action=\"<sys:gate>?a=topics\">
		<p class=\"sort\"><select name=\"forum\" class=\"jump\">
			{\$jump_list}
		</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:forum_jump>\" /></p>
	</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_mod_list', '	<form method=\"post\" action=\"<sys:gate>?a=mod&amp;t={\$this->_id}\" class=\"shaft\">
		<p class=\"sort\"><select name=\"CODE\" class=\"jump\">
			{\$mod_list}
		</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:mod_list>\" /></p>
		<input type=\"hidden\"  name=\"hash\" value=\"{\$hash}\" />
	</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topics_active', '<div class=\"infowrap\">
	<h1><lang:viewers_title></h1>
	<h2><lang:viewers_user_summary> ( <a href=\"<sys:gate>?a=active\" title=\"\"><lang:active_link_details></a> )</h2>
	<p>{\$list}</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_mod_wrapper', '<p class=\"mod_list\"><strong><lang:mod_label></strong> {\$mod_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_sub_wrapper', '<p class=\"subforum_list\">{\$sub_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_mod_wrapper', '<p class=\"mod_list\"><strong><lang:mod_label></strong> {\$mod_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_sub_wrapper', '<p class=\"mod_list\"><strong><lang:sub_label></strong> {\$sub_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_subscribe_forum_notice', 'Hello {\$row[\'members_name\']},

{\$topic[\'topics_last_poster_name\']}, from <conf:title> ( <conf:site_link> ), has just posted a reply
to a forum you have subscribed to ( {\$row[\'forum_name\']} ). You may follow the link below to 
read this topic:

<conf:site_link><sys:gate>?gettopic={\$topic[\'topics_id\']}

If you do not wish to receive subscription notices any longer you may turn this feature 
off within your personal control panel. To do this you may access your UCP through the 
above link.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_subs', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:sub_title></h3>
	<p class=\"checkwrap\"><lang:sub_tip></p>
	<h3><lang:sub_topics_title></h3>
	<h4><lang:sub_topics_desc></h4>
	<table class=\"ucp_table\" cellpadding=\"3\" cellspacing=\"1\">
		{\$topics}
	</table>
	<h3><lang:sub_forums_title></h3>
	<h4><lang:sub_forums_desc></h4>
	<table class=\"ucp_table\" cellpadding=\"3\" cellspacing=\"1\">
		{\$forums}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_field_subject', '		<h3><lang:post_field_subject></h3>
		<h4><lang:post_field_subject_tip></h4>
		<input type=\"text\" name=\"subject\" tabindex=\"1\" value=\"{\$subject}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_last_post', '<span><macro:img_mini_box> {\$last_date}</span>
<lang:last_post_in> {\$forum[\'forum_last_post_title\']}
<lang:last_post_by> <strong>{\$forum[\'forum_last_post_user_name\']}</strong>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_wrapper', '		<h3><lang:post_options></h3>
		<h4><lang:post_options_tip></h4>
		{\$lock}
		{\$pin}
		{\$announce}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_pin', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"stick\" value=\"1\" {\$check[\'stuck\']} /> <strong><lang:post_mod_options_pin></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_option_bar', '		<h3><lang:post_options></h3>
		<h4><lang:post_options_tip>.</h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" {\$check_code} /> <lang:post_options_code></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" {\$check_emoticon} /> <lang:post_options_emoticon></p>
		{\$poll}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'topic_prefix', '<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><macro:img_prefix></a>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_button', '<a href=\"<sys:gate>{\$url}\" title=\"{\$title}\"><img src=\"<sys:skinPath>/{\$button}.gif\" alt=\"\" /></a>&nbsp;');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_cat_redirect', '<tr>
	<td class=\"cellthree\" align=\"center\" valign=\"top\"><macro:cat_redirect></td>
	<td class=\"cellone\"><h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"\">{\$forum[\'forum_name\']}</a></h4><p>{\$forum[\'forum_description\']}</p></td>
	<td class=\"redirect\" nowrap=\"nowrap\" align=\"center\" colspan=\"3\">{\$forum[\'forum_red_clicks\']} <lang:cat_redirect></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_cat_wrapper', '<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"5\"><a href=\"<sys:gate>?getforum={\$category[\'forum_id\']}\">{\$category[\'forum_name\']}</a></td>
		</tr>
		<tr>
			<th width=\"1%\">&nbsp;</th>
			<th width=\"35%\"><lang:topics_col_forum></th>
			<th align=\"center\" width=\"5%\"><lang:topics_col_topics></th>
			<th align=\"center\" width=\"5%\"><lang:topics_col_replies></th>
			<th  align=\"left\" width=\"15%\"><lang:topics_col_latest></th>
		</tr>
			{\$forum_list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_last_post', '<em>{\$last_date}</em>
<br /><lang:last_post_in> {\$forum[\'forum_last_post_title\']} <lang:last_post_by> <strong>{\$forum[\'forum_last_post_user_name\']}</strong>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_news_section', '<p id=\"community_news\">
	<strong><lang:news_title>: <a href=\"<sys:gate>?a=read&amp;CODE=02&amp;p={\$news[\'news_post\']}\" title=\"<lang:news_title>\">{\$news[\'news_title\']}</a></strong>
	<br /><cite>--<lang:news_date> {\$news[\'news_date\']}.</cite>
</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_none', '							<tr>
								<td class=\"cellone\" align=\"center\" colspan=\"6\"><strong><lang:no_topics></strong></td>
							</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_cat_row', '<tr>
	<td class=\"cellthree\" align=\"center\" valign=\"top\"><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"\">{\$marker}</a></td>
	<td class=\"cellone\"><h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"\">{\$forum[\'forum_name\']}</a></h4><p>{\$forum[\'forum_description\']}{\$mods}{\$subs}</p></td>
	<td class=\"celltwo\" align=\"center\"><strong>{\$forum[\'forum_topics\']}</strong></td>
	<td class=\"celltwo\" align=\"center\">{\$forum[\'forum_posts\']}</td>
	<td class=\"celllast\" nowrap=\"nowrap\">{\$last_post}</td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sub_none', '<tr>
	<td colspan=\"4\" align=\"center\"><strong><lang:main_sub_none></strong></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sub_topic_row', '		<tr>
			<td align=\"center\" class=\"one\"><macro:icon_open_new></td>
			<td><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}\" title=\"\"><strong>{\$row[\'topics_title\']}</strong></a></td>
			<td align=\"center\" class=\"one\">{\$row[\'track_date\']}</td>
			<td align=\"center\"><a href=\"<sys:gate>?a=ucp&amp;CODE=12&amp;id={\$row[\'topics_id\']}\" title=\"\"><strong><lang:sub_delete></strong></a></td>
		</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_container', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <lang:bread_title>
</div>
{\$new_note}
{\$news_bit}
{\$category_list}
<div class=\"bar\"><span><a href=\"<sys:gate>?a=logon&amp;CODE=06\" title=\"<lang:link_delete_cookies>\"><lang:link_delete_cookies></a> &middot; <a href=\"<sys:gate>?a=logon&amp;CODE=07\" title=\"<lang:link_mark_all_read>\"><lang:link_mark_all_read></a></span>&nbsp;</div>
{\$active_users}
{\$board_stats}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_cat_row', '<tr>
	<td class=\"cellthree\" align=\"center\" valign=\"top\"><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"\">{\$marker}</a></td>
	<td class=\"cellone\"><h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"\">{\$forum[\'forum_name\']}</a></h4>{\$subs}<p>{\$forum[\'forum_description\']}{\$mods}</p></td>
	<td class=\"celltwo\" align=\"center\"><strong>{\$forum[\'forum_topics\']}</strong></td>
	<td class=\"celltwo\" align=\"center\">{\$forum[\'forum_posts\']}</td>
	<td class=\"celllast\" nowrap=\"nowrap\">{\$last_post}</td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_cat_redirect', '<tr>
	<td class=\"cellthree\" align=\"center\" valign=\"top\"><macro:cat_redirect></td>
	<td class=\"cellone\"><h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"\">{\$forum[\'forum_name\']}</a></h4><p>{\$forum[\'forum_description\']}</p></td>
	<td class=\"celllast\" nowrap=\"nowrap\" align=\"center\" colspan=\"3\"><b>{\$forum[\'forum_red_clicks\']} <lang:cat_redirect></b></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_cat_wrapper', '<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"5\"><a href=\"<sys:gate>?getforum={\$category[\'forum_id\']}\">{\$category[\'forum_name\']}</a></td>
		</tr>
		<tr>
			<th width=\"1%\">&nbsp;</th>
			<th width=\"49%\"><lang:main_col_forum></th>
			<th align=\"center\" width=\"10%\"><lang:main_col_topics></th>
			<th align=\"center\" width=\"10%\"><lang:main_col_replies></th>
			<th  align=\"left\" width=\"30%\"><lang:main_col_latest></th>
		</tr>
			{\$forum_list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'register', 'resend_validation_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:validate_crumb_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=register&amp;CODE=04\">
	<div class=\"formwrap\">
		<h3><lang:validate_title></h3>
		<p class=\"checkwrap\"><lang:validate_tip></p>
		<h3><lang:validate_field_email></h4>
		<h4><lang:validate_field_email_tip></h3>
		<input type=\'text\' name=\'email\' tabindex=\'1\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:validate_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:validate_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_registration_complete', 'Hello, {\$username}

The account you created at <conf:title> ( <conf:site_link> ) is now activated and ready to
use. Depending on your browser settings you may or may not be automatically logged in.
If not just use the following link to log your account:

<conf:site_link><sys:gate>?a=logon

Thank you for participating in our community!');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_main', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:main_title></h3>
	<p class=\"checkwrap\"><lang:main_tip></p>
	<h3><lang:main_email></h3>
	<h4><user:members_email></h4>
	<h3><lang:main_joined></h3>
	<h4>{\$join_date}</h4>
	<h3><lang:main_posts></h3>
	<h4><a href=\"<sys:gate>?a=search&amp;CODE=02&amp;mid=<user:members_id>\">{\$total_posts}</a> <lang:main_posts_stat></h4>
	<h3><lang:main_notes></h3>
	<h4><a href=\"<sys:gate>?a=notes\">{\$total_notes}</a> <lang:main_notes_stat></h4>
	<h3><lang:file_title></h3>
	<h4><lang:file_desc></h4>
	<table class=\"ucp_table\" cellpadding=\"3\" cellspacing=\"1\" with=\"100%\">
		<tr>
			<th width=\"1%\" align=\"center\"><lang:file_col_id></th>
			<th><lang:file_col_name></th>
			<th><lang:file_col_topic></th>
			<th align=\"center\"><lang:file_col_date></th>
			<th align=\"center\"><lang:file_col_size></th>
			<th align=\"center\"><lang:file_col_hits></th>
			<th>&nbsp;</th>
		</tr>
		{\$files}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_tabs', '<ul id=\"ucp_tabs\">
	{\$list}
</ul>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_match_result_row', '<tr>
	<td class=\"cellthree\" align=\"center\" valign=\"top\"><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\">{\$row[\'topics_marker\']}</a></td>
	<td class=\"cellone\">{\$row[\'topics_prefix\']} <a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;hl={\$hlLink}\" title=\"\">{\$row[\'topics_title\']}</a> {\$inlineNav}<span class=\"special\">-- {\$row[\'topics_subject\']}</span></td>
	<td class=\"celltwo\" align=\"center\"><strong>{\$row[\'topics_posts\']}</strong></td>
	<td class=\"cellone\" align=\"center\">{\$row[\'topics_views\']}</td>
	<td class=\"celltwo\" align=\"center\"><strong>{\$row[\'topics_author\']}</strong></td>
	<td class=\"cellone\" align=\"center\"><a href=\"<sys:gate>?getforum={\$row[\'topics_forum\']}\" title=\"\">{\$row[\'forum_name\']}</a></td>
	<td class=\"celllast\" nowrap=\"nowrap\"><span><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><macro:img_mini_box></a> {\$row[\'topics_last\']}</span><lang:topic_last_replied>: <strong>{\$row[\'topics_poster\']}</strong></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_match_result_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=search\" title=\"<lang:search_form_title>\"><lang:search_form_title></a> / <strong>{\$count}</strong> <lang:search_result_title>:
</div>
<div class=\"bar\">{\$pages}</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"7\">{\$count} <lang:search_result_title></td>
		</tr>
		<tr>
			<th width=\"5%\">&nbsp;</th>
			<th width=\"30%\"><lang:result_col_title></th>
			<th align=\"center\" width=\"10%\"><lang:result_col_replies></th>
			<th align=\"center\" width=\"10%\"><lang:result_col_views></th>
			<th align=\"center\" width=\"10%\"><lang:result_col_author></th>
			<th align=\"center\" width=\"20%\"><lang:result_col_forum></th>
			<th width=\"25%\"><lang:result_col_last></th>
		</tr>
		{\$list}
	</table>
</div>
<div class=\"bar\">{\$pages}</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_pass_get_1', 'You have recently attempted to recover your password from <conf:title> ( <conf:site_link> ).
To complete the process you must click the following link to validate your request. Once validation is 
complete you will be mailed your new account password. You will be able to change this password at anytime 
via your control panel.

{\$url}

Take note that this validation link will expire within 24 hours.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_admin_user', 'Hello, {\$name}

This message is to inform you that your account for <conf:title> ( <conf:site_link> )
has been activated. Below you will find your account access information which you may change
at anytime through your personal control panel.

Username: {\$name}
Password: {\$password}

Log your account through the link below:
<conf:site_link><sys:gate>?a=logon\";');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_pass_get_2', 'Hello, {\$row[\'members_name\']}

This message is to inform you that your account for <config:title> ( <config:site_link> )
has been activated. Below you will find your account access information which you may change
at anytime through your personal control panel.

Username: {\$row[\'members_name\']}
Password: {\$pass}

Log your account through the link below:

<conf:site_link><sys:gate>?a=logon');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_email', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=10\'>
	<div class=\"formwrap\">
		<h3><lang:email_title></h3>
		<p class=\"checkwrap\"><lang:email_tip></p>
		<h4><strong><lang:email_current></strong> <user:members_email></h4>
		<h3><lang:email_field_pass></h3>
		<h4><lang:email_field_pass_tip></h4>
		<input type=\"password\" name=\"password\" />
		<h3><lang:email_field_new></h3>
		<h4><lang:email_field_new_tip></h4>
		<input type=\"text\" name=\"new\" value=\"{\$email_one}\" />
		<h3><lang:email_field_con></h3>
		<h4><lang:email_field_con_tip></h4>
		<input type=\"text\" name=\"confirm\" value=\"{\$email_two}\" />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:email_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:email_button_reset>\" />
		</p>
	</div>
	<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_options', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=08\'>
	<div class=\"formwrap\">
		<h3><lang:board_title></h3>
		<p class=\"checkwrap\"><lang:board_tip></p>
		<h3><lang:board_field_skin></h3>
		<h4><lang:board_field_skin_tip></h4>
		<p class=\"checkwrap\"><select name=\"skin\">
			{\$skins}
		</select></p>
		<h3><lang:board_field_lang></h3>
		<h4><lang:board_field_lang_tip></h4>
		<p class=\"checkwrap\"><select name=\"lang\">
			{\$langs}
		</select></p>
		<h3><lang:board_field_zone></h3>
		<h4><lang:board_field_zone_tip></h4>
		<p class=\"checkwrap\"><select name=\"zone\">
			{\$zones}
		</select></p>
		<h3><lang:board_field_notify></h3>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"notes\" value=\"1\"{\$checked[\'notes\']} /> <b><lang:board_field_note>?</b></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"sigs\" value=\"1\"{\$checked[\'sigs\']} /> <b><lang:board_field_sigs>?</b></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"avatars\" value=\"1\"{\$checked[\'avatars\']} /> <b><lang:board_field_avatars>?</b></p>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:board_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'print', 'print_row', '<div id=\"resultwrap\">
	<h3><a href=\'<sys:gate>?getuser={\$row[\'members_id\']}\'><strong>{\$row[\'members_name\']}</strong></a> | <span>{\$row[\'posts_date\']}</span></h3>
	<div class=\"post\"><p>{\$row[\'posts_body\']}</p></div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_lock', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"lock\" value=\"1\" {\$check[\'locked\']} /> <strong><lang:post_mod_options_lock></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'post_name_field', '		<h3><lang:post_field_name></h3>
		<h4><lang:post_field_name_tip></h4>
		<input type\"text\" name=\"name\" tabindex=\"1\" value=\"{\$name}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_banned', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:banned_title></h3>
		<div id=\"warning\">
			<h3><lang:err_warn_title></h3>
			<p><strong><lang:banned_info></strong></p>
		</div>
		<h3><lang:banned_form_name_title></h3>
		<h4><lang:banned_form_name_title_info></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:banned_form_pass_title></h3>
		<h4><lang:banned_form_pass_title_info></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:banned_form_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:banned_form_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_pass', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=06\'>
	<div class=\"formwrap\">
		<h3><lang:pass_title></h3>
		<p class=\"checkwrap\"><lang:pass_tip></p>
		<h3><lang:pass_field_password></h3>
		<h4><lang:pass_field_password_tip></h4>
		<input type=\"password\" name=\"current\" />
		<h3><lang:pass_field_new></h3>
		<h4><lang:pass_field_new_tip></h4>
		<input type=\"password\" name=\"new\" />
		<h3><lang:pass_field_con></h3>
		<h4><lang:pass_field_con_tip></h4>
		<input type=\"password\" name=\"confirm\"\" />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:pass_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:pass_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'page_wrapper', '<macro:img_mini_pages> {\$links}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'print', 'print_body', '<script language=\"JavaScript\">
	<!--
	window.print();
	-->
</script>
<div id=\"print\">
	<h2><span><conf:title> ( <a href=\"<conf:site_link>\" title=\"\"><conf:site_link></a> )</span> {\$topic[\'topics_title\']}</h2>
	<p class=\"bar\"><b><lang:source>: <a href=\"#\" onclick=\"javascript: return prompt(\'<lang:link_copy_prompt>:\', \'<conf:site_link><sys:gate>?gettopic={\$topic[\'topics_id\']}\');\"><conf:site_link><sys:gate>?gettopic={\$this->_id}</a></b></p>
	{\$content}
	<p class=\"bar\"><span><a href=\"javascript: scroll(0,0);\" title=\"\"><strong><lang:top></strong></a></span><strong><lang:source>: <a href=\"#\" onclick=\"javascript: return prompt(\'<lang:link_copy_prompt>:\', \'<conf:site_link><sys:gate>?gettopic={\$topic[\'topics_id\']}\');\"><conf:site_link><sys:gate>?gettopic={\$this->_id}</a></strong></p>
	<div id=\"copyright\"><span>Powered By: <strong>MyTopix&trade; | Personal Message Board</strong> <conf:version></span>Copyright &copy;  2004,  <a href=\"http://www.jaia-interactive.com/\" title=\"<lang:visit_jaia>\">Jaia Interactive</a> all rights reserved.</div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_full_result_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=search\" title=\"<lang:search_form_title>\"><lang:search_form_title></a> / <strong>{\$count}</strong> <lang:search_result_title>:
</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"8\">{\$count} <lang:search_result_title></td>
		</tr>
		<tr>
			<th width=\"5%\"><lang:result_col_score></th>
			<th width=\"5%\">&nbsp;</th>
			<th width=\"30%\"><lang:result_col_title></th>
			<th align=\"center\" width=\"10%\"><lang:result_col_replies></th>
			<th align=\"center\" width=\"10%\"><lang:result_col_views></th>
			<th align=\"center\" width=\"10%\"><lang:result_col_author></th>
			<th align=\"center\" width=\"20%\"><lang:result_col_forum></th>
			<th width=\"35%\"><lang:result_col_last></th>
		</tr>
		{\$list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sig', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <user:class_sigLength>;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}

}
</script>
<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
<form method=\'post\' action=\'<sys:gate>?a=ucp&amp;CODE=04\' name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:sig_title></h3>
		<p class=\"checkwrap\"><lang:sig_tip></p>
		<h3><lang:sig_field_current></h3>
		<p class=\"sig\">{\$parsed}</p>
		{\$bbcode}
		<h3><lang:sig_emoticons></h3>
		<h4><lang:sig_emoticons_tip></h4>
		{\$emoticons}
		<h3><lang:sig_field_body></h3>
		<h4><lang:sig_field_body_tip> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\" title=\"<lang:sig_link_code_title>\"><lang:sig_link_code></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\" title=\"<lang:sig_link_emoticons_tip>\"><lang:sig_link_emoticons></a> · <a href=\"javascript:check_length()\" title=\"<lang:sig_link_length_tip>\"><lang:sig_link_length></a> )</h4>
		<textarea name=\"body\">{\$sig}</textarea>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:sig_button_submit>\" /> 
			<input class=\"reset\" type=\"reset\" value=\"<lang:sig_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_jump_list', '<form method=\"post\" action=\"<sys:gate>?a=topics\" class=\"shaft\">
			<p class=\"sort\"><select name=\"forum\" class=\"jump\">
				{\$jump_list}
			</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:forum_jump>\" /></p>
		</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_full_result_row', '<tr>
	<td class=\"cellone\" align=\"center\"><strong>{\$row[\'topics_score\']}%</strong></td>
	<td class=\"cellthree\" align=\"center\" valign=\"top\"><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\">{\$row[\'topics_marker\']}</a></td>
	<td class=\"cellone\">{\$row[\'topics_prefix\']} <a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;hl={\$hlLink}\" title=\"\">{\$row[\'topics_title\']}</a> {\$inlineNav}<span class=\"special\">-- {\$row[\'topics_subject\']}</span></td>
	<td class=\"celltwo\" align=\"center\"><strong>{\$row[\'topics_posts\']}</strong></td>
	<td class=\"cellone\" align=\"center\">{\$row[\'topics_views\']}</td>
	<td class=\"celltwo\" align=\"center\"><strong>{\$row[\'topics_author\']}</strong></td>
	<td class=\"cellone\" align=\"center\"><a href=\"<sys:gate>?getforum={\$row[\'topics_forum\']}\" title=\"\">{\$row[\'forum_name\']}</a></td>
	<td class=\"celllast\" nowrap=\"nowrap\"><span><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><macro:img_mini_box></a> {\$row[\'topics_last\']}</span><lang:topic_last_replied>: <strong>{\$row[\'topics_poster\']}</strong></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'move_topic', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / <a href=\"<sys:gate>?gettopic={\$this->_id}\" title=\"\">{\$row[\'topics_title\']}</a> / <lang:mod_move_bread>
</div>
<form method=\"post\" action=\"<sys:gate>?a=mod&amp;CODE=05&amp;t={\$this->_id}\">
	<div class=\"formwrap\">
		<h3><lang:mod_move_title></h3>
		<h4><lang:mod_move_desc></h4>
		<p class=\"checkwrap\">
			<input type=\"checkbox\" name=\"link\" class=\"check\" value=\"1\"> <strong><lang:mod_move_link></strong>
		</p>
		<p class=\"checkwrap\">
			<select name=\"forum\" size=\"5\" class=\"big\" id=\"forum\">
				{\$search_list}
			</select>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:mod_move_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:mod_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_validate_user', 'Hello, {\$username}

Our records indicate that you have just attempted to register a new account with our board.
Currently, the administrator of this community thinks it best to first validate all new 
user accounts to prevent spamming and abuse. To activate your account you only need to click
on the link below. Once you do this the system will allow you to log in to your account.

Activation Key:

<conf:site_link><sys:gate>?a=register&CODE=02&key={\$key}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'by_user_row', '<div id=\"resultwrap\">
	<h3><a href=\"<sys:gate>?a=read&amp;CODE=02&amp;p={\$row[\'posts_id\']}\" title=\"\"><b>{\$row[\'topics_title\']}</b></a> | <span>{\$row[\'posts_date\']}</span></h3>
	<div class=\"post\"><p>{\$row[\'posts_body\']}</p></div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'by_user_table', '<div id=\"crumb_nav\">
<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <strong>{\$count}</strong> <lang:search_result_user_title> <strong>{\$user}</strong>:
</div>
<div class=\"bar\">{\$pages}</div>
{\$list}
<div class=\"bar\">{\$pages}</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:search_form_title>:
</div>
<script language=\"javascript\">

	function selectAll(list, select)
	{
		var list = document.getElementById(list);
		
		for (var i = 0; i < list.length; i++)
		{
			list.options[i].selected = select.checked;
		}
	}

</script>
<form method=\"post\" action=\"<sys:gate>?a=search&CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:search_form_field_phrase></h3>
		<h4><lang:search_form_field_phrase_tip></h4>
		<input type=\"text\" name=\"keywords\" value=\"{\$this->_phrase}\" />
		<h3><lang:search_form_type>:</h3>
		<h4><lang:search_form_type_tip>.</h4>
		<p class=\"checkwrap\">
			<input type=\"radio\" name=\"mode\" class=\"check\" value=\"match\" checked=\"checked\" /> <strong><lang:search_form_basic></strong>&nbsp;
			<span id=\"matchtype\">
				<input type=\"checkbox\" name=\"type\" class=\"check\" value=\"1\" /> <lang:search_form_basic_exact>
			</span>
		</p>
		<p class=\"checkwrap\">
			<input type=\"radio\" name=\"mode\" class=\"check\" value=\"full\" /> <strong><lang:search_form_full></strong> &nbsp;
			<span id=\"limit\">
				<select name=\"limit\">
					<option value=\"10\" selected=\"selected\">10</option>
					<option value=\"20\">20</option>
					<option value=\"30\">30</option>
					<option value=\"40\">40</option>
				</select> <lang:search_form_full_limit>
			</span>
		</p>
		<h3><lang:search_form_forum_title></h3>
		<h4><lang:search_form_forum_desc></h4>
		<p class=\"checkwrap\">
			<input type=\"checkbox\" name=\"all\" class=\"check\" value=\"all\" onclick=\"selectAll(\'forums\', this)\" checked=\"checked\"/> <strong><lang:search_form_forum_all></strong>
		</p>
		<p class=\"checkwrap\">
			<select name=\"forums[]\" size=\"5\" multiple=\"multiple\" class=\"big\" id=\"forums\">
				{\$search_list}
			</select>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:search_form_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:search_form_button_reset>\" />
		</p>
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'sig', '<p class=\"sig\">{\$row[\'members_sig\']}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'register', 'form_register', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:register_crumb_title>
</div>
{\$error_list}
<form method=\"post\" action=\"<sys:gate>?a=register&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:registration_title></h3>
		<p class=\"checkwrap\"><lang:registration_tip></p>
		<h3><lang:field_username></h3>
		<h4><lang:field_username_tip></h4>
		<input type=\"text\" name=\"username\" value=\"{\$username}\" />
		<h3><lang:field_pass></h3>
		<h4><lang:field_pass_tip></h4>
		<input type=\"password\" name=\"password\" />
		<h3><lang:field_con_pass></h3>
		<h4><lang:field_con_pass_tip></h4>
		<input type=\"password\" name=\"cpassword\" />
		<h3><lang:field_email></h3>
		<h4><lang:field_email_tip></h4>
		<input type=\"text\" name=\"email\" value=\"{\$email_one}\" />
		<h3><lang:field_con_email></h3>
		<h4><lang:field_con_email_tip></h4>
		<input type=\"text\" name=\"cemail\" value=\"{\$email_two}\" />
		<h3><lang:field_terms></h3>
		<h4><lang:field_terms_tip></h4>
		<textarea rows=\"\" cols=\"\"><lang:field_terms_content></textarea>
		<p class=\"checkwrap\"><input class=\"check\" type=\"checkbox\" name=\"contract\" {\$contract} /> <strong><lang:field_agree></strong></p>
		{\$coppa_field}
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_general', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=02\'>
	<div class=\"formwrap\">
		<h3><lang:gen_title></h3>
		<p class=\"checkwrap\"><lang:gen_tip></p>
		<h3><lang:gen_field_location></h3>
		<h4><lang:gen_field_location_tip></h4>
		<input type=\"text\" name=\"location\" value=\"{\$location}\" />
		<h3><lang:gen_field_website></h3>
		<h4><lang:gen_field_website_tip></h4>
		<input type=\"text\" name=\"homepage\" value=\"{\$homepage}\" />
		<h3><lang:gen_field_birthday></h3>
		<h4><lang:gen_field_birthday_tip></h4>
		<p class=\"checkwrap\">
			<select name=\'bmonth\'>
				{\$months}
			</select>
			&nbsp;
			<select name=\'bday\'>
				{\$days}
			</select>
			&nbsp;
			<select name=\'byear\'>
				{\$years}
			</select>
		</p>
		<h3><lang:gen_field_aim></h3>
		<h4><lang:gen_field_aim_tip></h4>
		<input type=\"text\" name=\"aim\" value=\"{\$aim}\" />
		<h3><lang:gen_field_icq></h3>
		<h4><lang:gen_field_icq_tip></h4>
		<input type=\"text\" name=\"icq\" value=\"{\$icq}\" />
		<h3><lang:gen_field_yim></h3>
		<h4><lang:gen_field_yim_tip></h4>
		<input type=\"text\" name=\"yim\" value=\"{\$yim}\" />
		<h3><lang:gen_field_msn></h3>
		<h4><lang:gen_field_msn_tip></h4>
		<input type=\"text\" name=\"msn\" value=\"{\$msn}\" />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:gen_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:gen_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'post_row_guest', '<div class=\"user\">
	<a name=\"{\$row[\'posts_id\']}\"></a>
	<p><strong>{\$row[\'posts_author_name\']}</strong>
	<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span></p>
	<img src=\"<sys:skinPath>/ava_none.gif\" class=\"avatar\" alt=\"\" title=\"\" />
</div>
<div class=\"post\">
	<h5><strong><lang:posted_on> {\$row[\'posts_date\']}</strong><span>{\$linkDelete}{\$linkEdit}{\$linkQuote}</span></h5>
	<p>{\$row[\'posts_body\']}</p>{\$attach}
</div>
<div class=\"foot\">
	<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:entry_link_top_tip>\"><lang:entry_link_top></a></span>
	&nbsp;
</div>
<div class=\"postend\">&nbsp;</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'post_table', '{\$poll_data}
<div class=\"postwrap\">
        <div class=\"postheader\"><span>{\$topic[\'topics_title\']}</span></div>
        {\$list}
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_active', '<div class=\"infowrap\">
	<h1><lang:readers_title></h1>
	<h2><lang:readers_user_summary> ( <a href=\"<sys:gate>?a=active\" title=\"\"><lang:active_link_details></a> )</h2>
	<p>{\$list}</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_buttons', '<div class=\"postbutton\">
	<p class=\"links\">&nbsp;</p>
	{\$button_reply} {\$button_qwik} {\$button_topic} {\$button_poll}
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'reply_bit', '<div id=\"qwikwrap\" style=\"display: none;\">
	<script language=\"javascript\">
	function check_length()
	{
		var limit  = <conf:max_post> * 1000;
		var length = document.REPLIER.body.value.length;

		if ( (length > limit) ) {
			alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
		} else {
			alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
		}

	}
	</script>
	<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
	<a name=\"qwik\"></a>
	<form method=\"post\" action=\"<sys:gate>?a=post&amp;CODE=01&amp;t={\$this->_id}&amp;qwik=1\" name=\"REPLIER\">
		<div class=\"formwrap\">
			<h3><lang:qwik_title>.</h3>
			<p class=\"checkwrap\"><lang:qwik_title_tip>.</p>
			<h3><lang:qwik_field_body>:</h3>
			<h4><lang:qwik_field_body_tip> (<a href=\'javascript:smilie_window(\"<sys:gate>\");\' title=\"<lang:qwik_link_emoticons>\"><lang:qwik_link_emoticons></a> &middot; <a href=\"javascript:check_length();\" title=\"<lang:qwik_link_length>\"><lang:qwik_link_length></a>)</h2>
			<textarea name=\"body\" rows=\"\" cols=\"\"></textarea>
			<p class=\"submit\">
				<input class=\"button\" type=\"submit\" value=\"<lang:qwik_button_submit>\" />&nbsp;
				<input class=\"reset\" type=\"reset\" value=\"<lang:qwik_button_reset>\" />
			</p>
			<input type=\"hidden\" name=\"cOption\" value=\"1\" />
			<input type=\"hidden\" name=\"eOption\" value=\"1\" />
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		</div>
	</form>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'post_row', '<div class=\"user\">
	<a name=\"{\$row[\'posts_id\']}\"></a>
	<p><a href=\"<sys:gate>?getuser={\$row[\'members_id\']}\" title=\"<lang:entry_link_profile>\"><strong>{\$row[\'members_name\']}</strong></a> <em>( <a href=\"<sys:gate>?a=search&CODE=02&mid={\$row[\'members_id\']}\" title=\"<lang:entry_post_find> {\$row[\'members_name\']}\">{\$row[\'members_posts\']}</a> )</em>
	<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span>
	<span><strong>&middot; <lang:entry_rank></strong> {\$row[\'members_pips\']}</span></p>
	{\$avatar}<div style=\"clear:both;\" /></div>
</div>
<div class=\"post\">
	<h5><strong><lang:posted_on> {\$row[\'posts_date\']}</strong><span>{\$linkDelete}{\$linkEdit}{\$linkQuote}</span></h5>
	<p>{\$row[\'posts_body\']}</p>{\$attach}{\$sig}
</div>
<div class=\"foot\">
	<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:entry_link_top_tip>\"><lang:entry_link_top></a></span>
	<ul class=\"extras\"><li>{\$active}</li>{\$linkSpan}</ul>
</div>
<div class=\"postend\">&nbsp;</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'container_read', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / {\$topic[\'topics_title\']}
</div>
{\$buttons}
<div class=\"bar\">
	<span><a href=\"<sys:gate>?a=print&amp;t={\$topic[\'topics_id\']}\" title=\"<lang:print_view_tip>\" target=\"_blank\"><strong><lang:print_view></strong></a> &middot; <a href=\"<sys:gate>?gettopic={\$topic[\'topics_id\']}&amp;CODE=01\" title=\"<lang:subscribe_tip>\"><strong><lang:subscribe></strong></a></span>
	{\$pages}
</div>
{\$content}
<div class=\"bar\">
	<span><a href=\"<sys:gate>?gettopic={\$topic[\'topics_id\']}&amp;CODE=03&amp;forum={\$topic[\'topics_forum\']}\" title=\"<lang:previous>\"><strong><lang:previous></strong></a> &middot; <a href=\"<sys:gate>?a=topics&amp;forum={\$topic[\'topics_forum\']}\" title=\"<lang:index>\"><strong><lang:index></strong></a> &middot; <a href=\"<sys:gate>?gettopic={\$topic[\'topics_id\']}&amp;CODE=04&amp;forum={\$topic[\'topics_forum\']}\" title=\"<lang:next>\"><strong><lang:next></strong></a></span>
	{\$pages}
</div>
{\$buttons}
<div class=\"formwrap\">
{\$mod}
{\$jump}
</div>
{\$replier}
{\$readers}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'quote_field', '		<h3><lang:post_field_quote></h3>
		<h4><lang:post_field_quote_tip></h4>
		<textarea name=\"quote\">{\$message}</textarea>
		{\$hidden}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'smilie_wrapper', '<table class=\"emoticon\" cellpadding=\"0\" cellspacing=\"0\">
	{\$smilies}
</table>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_field_title', '		<h3><lang:post_field_title></h3>
		<h4><lang:post_field_title_tip></h4>
		<input type=\"text\" name=\"title\" tabindex=\"1\" value=\"{\$title}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'profile', 'profile_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:profile_title> {\$row[\'members_name\']}
</div>
<div id=\"left_column\">
	<div class=\"formwrap\">
		<h3><lang:profile_name></h3>
		<h4>{\$row[\'members_name\']} ( {\$row[\'class_prefix\']}{\$row[\'class_title\']}{\$row[\'class_suffix\']} )</h4>
		<h3><lang:profile_last_visit></h3>
		<h4>{\$row[\'members_lastvisit\']}</h4>
		<h3><lang:profile_registered></h3>
		<h4>{\$row[\'members_registered\']}</h4>
		<h3><lang:profile_birthday></h3>
		<h4>{\$birthday}</h4>
		<h3><lang:profile_stats></h3>
		<h4><a href=\'<sys:gate>?a=search&amp;CODE=02&amp;mid={\$row[\'members_id\']}\'>{\$row[\'members_posts\']}</a> <lang:profile_posts> ( {\$row[\'members_per_day\']} / <lang:per_day> )</h4>
		<h3><lang:profile_last_5></h3>
		<ul>
			{\$topics}
		</ul>
		<h3><lang:profile_location></h3>
		<h4>{\$row[\'members_location\']}</h4>
	</div>
</div>
<div id=\"right_column\">
	<div class=\"formwrap\">
		<h3><lang:profile_home></h3>
		<h4>{\$row[\'members_homepage\']}</h4>
		<h3><lang:profile_aol></h3>
		<h4>{\$row[\'members_aim\']}</h4>
		<h3><lang:profile_yim></h3>
		<h4>{\$row[\'members_yim\']}</h4>
		<h3><lang:profile_msn></h3>
		<h4>{\$row[\'members_msn\']}</h4>
		<h3><lang:profile_icq></h3>
		<h4>{\$row[\'members_icq\']}</h4>
		<h3><lang:profile_other></h3>
		<ul>
			<li><a href=\'<sys:gate>?a=notes&amp;CODE=07&amp;send={\$row[\'members_id\']}\'><lang:profile_link_note></a></li>
		</ul>
	</div>
</div>
<div id=\"signature\">
	<div class=\"formwrap\">
		<h3><lang:profile_sig></h3>
		<p class=\"sig\">{\$row[\'members_sig\']}</p>
	</div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'emoticons_field', '		<h3><lang:post_emoticon_title></h3>
		<h4><lang:post_emoticon_tip></h4>
		{\$smilies}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_wrapper', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> {\$bread_crumb}
</div>
{\$errors}
<script language=\'javascript\'>
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;
		if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}

}
</script>
<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
<form method=\"POST\" action=\"{\$this->_form_action}\" name=\"REPLIER\" {\$this->_form_multipart}>
	<div class=\"formwrap\">
		<h3>{\$this->_form_title}</h3>
		<p class=\"checkwrap\">{\$this->_form_tip}</p>
		{\$recipient}
		{\$name}
		{\$title}
		{\$subject}
		{\$bbcode}
		{\$emoticons}
		<h3><lang:post_message_title></h3>
		<h4><lang:post_message_tip> (  <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:post_link_bbcode></a> · <a href=\'javascript:smilie_window(\"<sys:gate>\")\'><lang:post_link_emoticons></a> · <a href=\'javascript:check_length()\'><lang:post_link_length></a> )</h4>
		<textarea name=\"body\" rows=\"5\" tabindex=\"1\">{\$message}</textarea>
		{\$quote}
		{\$convert}
		{\$upload}
		{\$tools}
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" tabindex=\"2\" value=\"{\$this->_form_submit}\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		{\$hidden}
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'bbcode_field', '	<div id=\'bbcode_panel\' style=\'display: none;\'>
		<h3><lang:bb_title></h3>
		<h4><lang:bb_title_tip></h4>
		<table cellpadding=\'3\' cellspacing=\'0\'>
			<tr>
				<td align=\'left\'>
					<input type=\'button\' class=\'bbcode\' value=\' U \' onClick=\'codeBasic(this)\' name=\'u\' />
					<input type=\'button\' class=\'bbcode\' value=\' I \' onClick=\'codeBasic(this)\' name=\'i\' />
					<input type=\'button\' class=\'bbcode\' value=\' B \' onClick=\'codeBasic(this)\' name=\'b\' /> 
					<select name=\'FONT\' style=\'width: 100px;\' onchange=\'fontFace(this.options[this.selectedIndex].value)\'>
						<option value=\'0\'><lang:bb_select_font></option>
						<option style=\'font-family: tahoma; font-weight: bold;\' value=\'Arial\'>Tahoma</option>
						<option style=\'font-family: times; font-weight: bold;\' value=\'Times\'>Times</option>
						<option style=\'font-family: courier; font-weight: bold;\' value=\'Courier\'>Courier</option>
						<option style=\'font-family: impact; font-weight: bold;\' value=\'Impact\'>Impact</option>
						<option style=\'font-family: geneva; font-weight: bold;\' value=\'Geneva\'>Geneva</option>
						<option style=\'font-family: optima; font-weight: bold;\' value=\'Optima\'>Optima</option>
					</select>
					<select name=\'SIZE\' style=\'width: 100px;\' onchange=\'fontSize(this.options[this.selectedIndex].value)\'>
						<option value=\'0\'><lang:bb_select_size></option>
						<option value=\'1\'><lang:bb_size_small></option>
						<option value=\'7\'><lang:bb_size_large></option>
						<option value=\'14\'><lang:bb_size_largest></option>
					</select>
					<select name=\'COLOR\' style=\'width: 100px;\' onchange=\'fontColor(this.options[this.selectedIndex].value)\'>
						<option value=\'0\'><lang:bb_select_color></option>
						<option value=\'blue\' style=\'color:blue\'><lang:bb_color_blue></option>
						<option value=\'red\' style=\'color:red\'><lang:bb_color_red></option>
						<option value=\'purple\' style=\'color:purple\'><lang:bb_color_purple></option>
						<option value=\'orange\' style=\'color:orange\'><lang:bb_color_orange></option>
						<option value=\'yellow\' style=\'color:yellow\'><lang:bb_color_yellow></option>
						<option value=\'gray\' style=\'color:gray\'><lang:bb_color_gray></option>
						<option value=\'green\' style=\'color:green\'><lang:bb_color_green></option>
					</select>
				</td>
			</tr>
			<tr>
				<td align=\'left\'>
					<input type=\'button\' class=\'bbcode\' value=\' # \' onClick=\'codeBasic(this)\' name=\'code\' />
					<input type=\'button\' class=\'bbcode\' value=\' \"QUOTE\" \' onClick=\'codeBasic(this)\' name=\'quote\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' List \' onClick=\'codeList()\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' IMG \' onClick=\'codeBasic(this)\' name=\'img\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' @ \' onClick=\'codeBasic(this)\' name=\'email\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' URL \' onClick=\'codeBasic(this)\' name=\'url\' /> 
				</td>
			</tr>
		</table>
		<p class=\"checkwrap\"><input type=\'radio\' class=\"check\" name=\'mode\' value=\'adv\' checked=\'checked\' /> <b><lang:bb_mode_advanced></b> <lang:bb_mode_advanced_tip>.</p>
		<p class=\"checkwrap\"><input type=\'radio\' class=\"check\" name=\'mode\' value=\'simple\'/> <b><lang:bb_mode_simple></b> <lang:bb_mode_simple_tip>.</p>
	</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <lang:notes_main_title>
</div>
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>
</div>
<div class=\"bar\">
	{\$pages}
</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"5\"><lang:note_your_notes> ( {\$filled}% <lang:note_full> )</td>
		</tr>
		<tr>
			<th align=\"left\" width=\"5%\">&nbsp;</td>
			<th align=\"left\" width=\"35%\"><lang:note_col_title></td>
			<th align=\"center\" width=\"20%\"><lang:note_col_sender></td>
			<th align=\"center\" width=\"25%\"><lang:note_col_recieved></td>
			<th width=\"5%\">&nbsp;</td>
		</tr>
		{\$list}
	</table>
</div>
<div class=\"bar\">
	{\$pages}
</div>
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>&nbsp;<a href=\"<sys:gate>?a=notes&amp;CODE=05\" title=\"\" onclick=\"javascript: return confirm(\'<lang:empty_inbox_confirm>?\');\"><macro:btn_delete_note></a>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_row', '<tr>
	<td class=\'cellone\' align=\"center\"><a href=\'<sys:gate>?a=notes&amp;CODE=06&amp;nid={\$row[\'notes_id\']}\'>{\$row[\'notes_marker\']}</a></td>
	<td class=\'celltwo\'><a href=\'<sys:gate>?a=notes&amp;CODE=01&amp;nid={\$row[\'notes_id\']}\'>{\$row[\'notes_title\']}</a></td>
	<td class=\'cellone\' align=\"center\"><a href=\'<sys:gate>?getuser={\$row[\'notes_sender\']}\'><strong>{\$row[\'members_name\']}</strong></a></td>
	<td class=\'celltwo\' align=\"center\">{\$row[\'notes_date\']}</td>
	<td class=\'celllast\' align=\"center\"><a href=\"<sys:gate>?a=notes&amp;CODE=04&amp;nid={\$row[\'notes_id\']}\" title=\"\" onclick=\"javascript: return confirm(\'<lang:read_delete_confirm>?\');\"><b><lang:read_delete_title></b></a></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_read', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=notes\" title=\"\"><lang:notes_inbox_title></a> / <lang:notes_read_crumb_title> {\$row[\'notes_title\']}
</div>
<div class=\"postbutton\">
	<a href=\'<sys:gate>?a=notes&amp;CODE=3&amp;nid={\$this->_id}&amp;send={\$row[\'members_name\']}\'><macro:btn_note_reply></a>&nbsp;<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>
</div>
<div class=\"postwrap\">
	<div class=\"postheader\">{\$row[\'notes_title\']}</div>
	<div class=\"user\">
		<a name=\"{\$row[\'notes_id\']}\"></a>
		<p><a href=\"<sys:gate>?getuser={\$row[\'members_id\']}\" title=\"<lang:entry_link_profile>\"><strong>{\$row[\'members_name\']}</strong></a> <em>( <a href=\"<sys:gate>?a=search&CODE=02&mid={\$row[\'members_id\']}\" title=\"<lang:entry_post_find> {\$row[\'members_name\']}\">{\$row[\'members_posts\']}</a> )</em>
		<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span>
		<span><strong>&middot; <lang:entry_rank></strong> {\$row[\'members_pips\']}</span></p>
		{\$avatar}<div style=\"clear:both;\" /></div>
	</div>
	<div class=\"post\">
		<h5><strong><lang:sent_on> {\$row[\'notes_date\']}</strong><span><a href=\"<sys:gate>?a=notes&amp;CODE=04&amp;nid={\$row[\'notes_id\']}\" title=\"<lang:read_button_delete>\" onclick=\"javascript: return confirm(\'<lang:read_delete_confirm>\');\"><img src=\"<sys:skinPath>/post_delete.gif\" alt=\"<lang:read_delete_confirm>\" /></a></span></h5>
		<p>{\$row[\'notes_body\']}</p>{\$sig}
	</div>
	<div class=\"foot\">
		<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:read_link_top_title>.\"><lang:read_link_top></a></span>
		<ul class=\"extras\">{\$linkSpan}</ul>
	</div>
	<div class=\"postend\">&nbsp;</div>
</div>
<div class=\"postbutton\">
	<a href=\'<sys:gate>?a=notes&amp;CODE=3&amp;nid={\$this->_id}&amp;send={\$row[\'members_name\']}\'><macro:btn_note_reply></a>&nbsp;<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_none', '							<tr>
								<td class=\"cellone\" align=\"center\" colspan=\"5\"><strong><lang:no_notes></strong></td>
							</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'notes_send_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <a href=\"<sys:gate>?a=notes\" title=\"\"><lang:notes_main_title></a> <macro:txt_bread_sep> <lang:notes_new_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
	function check_length()
	{
		var limit  = <conf:max_post> * 1000;
		var length = document.REPLIER.body.value.length;

		if ( (length > limit) ) {
			alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
		} else {
			alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
		}
	}
	</script>
	<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
	<a name=\"qwiknote\"></a>
	<form method=\"POST\" action=\"<sys:gate>?a=notes&amp;CODE=02\" name=\"REPLIER\">
		<div class=\"formwrap\">
			<h3><lang:notes_send_title></h3>
			<p class=\"checkwrap\"><lang:form_send_tip></p>
			<h3><lang:post_field_recipient_title>:</h3>
			<h4><lang:post_field_recipient_tip> ( <a href=\'<sys:gate>?a=members\'><lang:post_field_recipient_link_search></a> )</h4>
			<input type=\'text\' name=\'recipient\' value=\'{\$to}\' tabindex=\'1\'  />
			<h3><lang:post_field_title>:</h3>
			<h4><lang:post_field_title_tip>.</h4>
			<input type=\'text\' name=\'title\' tabindex=\'2\' value=\"{\$title}\" />
			{\$bbcode}
			<h3><lang:post_emoticon_title></h3>
			<h4><lang:post_emoticon_tip></h4>
			{\$emoticons}
			<h3><lang:post_message_title></h3>
			<h4><lang:post_message_tip> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:post_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:post_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:post_link_length></a> )</h4>
			<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
			<h3><lang:post_options></h3>
			<h4><lang:post_options_tip>.</h4>
			<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_code></p>
			<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_emoticon></p>
			<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:post_button_send>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:post_button_reset>\" /></p>
			<input type=\'hidden\' name=\'redirect\' value=\'new\' />
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		</div>
	</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'notes_reply_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=notes\" title=\"\"><lang:notes_inbox_title></a> / <a href=\"<sys:gate>?a=notes&amp;CODE=01&amp;nid={\$this->_id}\" title=\"\">{\$bread_title}</a> / <lang:notes_reply_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}

}
</script>
<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
<a name=\"qwiknote\"></a>
<form method=\"POST\" action=\"<sys:gate>?a=notes&amp;CODE=02&amp;nid={\$this->_id}\" name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:notes_reply_title> {\$note[\'notes_title\']}</h3>
		<h4><lang:form_send_tip></h4>
		<h3><lang:post_field_recipient_title>:</h3>
		<h4><lang:post_field_recipient_tip> ( <a href=\'<sys:gate>?a=members\'><lang:post_field_recipient_link_search></a> )</h4>
		<input type=\'text\' name=\'recipient\' value=\'{\$recipient}\' tabindex=\'1\' />
		<h3><lang:post_field_title>:</h3>
		<h4><lang:post_field_title_tip>.</h4>
		<input type=\'text\' name=\'title\' value=\"{\$note[\'notes_title\']} \"tabindex=\'2\' />
		{\$bbcode}
		<h3><lang:post_emoticon_title></h3>
		<h4><lang:post_emoticon_tip></h4>
		{\$emoticons}
		<h3><lang:post_message_title></h3>
		<h4><lang:post_message_tip> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:post_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:post_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:post_link_length></a> )</h4>
		<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
		<h3><lang:post_field_quote></h3>
		<h4><lang:post_field_quote_tip></h4>
		<textarea name=\"quote\" tabindex=\'3\'>{\$quote}</textarea>
		<h3><lang:post_options></h3>
		<h4><lang:post_options_tip>.</h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_code></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_emoticon></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:post_button_send>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:post_button_reset>\" /></p>
		<input type=\'hidden\' name=\"id\" value=\"{\$this->_id}\" />
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'misc', 'emoticon_row', '	<tr>
		<td class=\'celltwo\'>{\$code[\$i]}</td>
		<td class=\'celltwo\'>
			<a href=\'javascript:add_smilie(\"{\$code[\$i]}\")\'>{\$name[\$i]}</a>
		</td>
	</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'misc', 'emoticon_wrapper', '<script language=\'javascript\'>

	function add_smilie(text)
	{
		opener.document.REPLIER.body.value += \" \" + text + \" \";

	}

</script>
<table class=\"maintable\" cellpadding=\'6\' cellspacing=\'1\' width=\"95%\">
	<tr>
		<td class=\"header\" colspan=\"2\"><lang:emoticon_legend>:</td>
	</tr>
	<tr>
		<th class=\"cellone\" colspan=\'2\'>( <a href=\'javascript:this.close()\'><lang:close_window></a> )</th>
	</tr>
	{\$list}
	<tr>
		<td class=\"footer\" colspan=\"2\">&nbsp;</td>
	</tr>
</table>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'topic_editor', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / <a href=\"<sys:gate>?gettopic={\$this->_id}\" title=\"\">{\$topic[\'topics_title\']}</a> / <lang:mod_edit_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=mod&amp;CODE=03&amp;t={\$this->_id}\">
	<div class=\"formwrap\">
		<h3><lang:mod_form_title> {\$topic[\'topics_title\']}</h3>
		<h4><lang:mod_form_tip></h4>
		<h3><lang:mod_field_title></h3>
		<h4><lang:mod_field_title_tip></h4>
		<input type=\"text\" name=\"title\" value=\"{\$topic[\'topics_title\']}\" />
		<h3><lang:mod_field_subject></h3>
		<h4><lang:mod_field_subject></h4>
		<input type=\"text\" name=\"subject\" value=\"{\$topic[\'topics_subject\']}\" />
		<h3><lang:mod_field_views></h3>
		<h4><lang:mod_field_views_tip></h4>
		<input type=\"text\" name=\"views\" value=\"{\$topic[\'topics_views\']}\" />
		{\$mod_poll}
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" name=\"submit\" value=\"<lang:mod_edit_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:mod_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_table', '{\$buttons}
<div class=\"bar\">
	<span>
		<a href=\"<sys:gate>?getforum={\$this->_forum}&amp;CODE=02\" title=\"\"><strong><lang:forum_subscribe></strong></a>
	</span>
	{\$pages}
</div>
<div class=\"maintable\">
<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"6\">{\$forum_data[\'forum_name\']}</td>
		</tr>
	<tr>
		<th width=\"1%\">&nbsp;</th>
		<th width=\"30%\"><lang:main_col_title></th>
		<th align=\"center\" width=\"10%\"><lang:topic_posts></th>
		<th align=\"center\" width=\"10%\"><lang:topic_views></th>
		<th  align=\"center\" width=\"10%\"><lang:main_col_author></th>
		<th width=\"25%\"><lang:main_col_last_post></th>
	</tr>
	{\$list}
</table>
</div>
<div class=\"bar\">
	<span>
		<a href=\"<sys:gate>?getforum={\$this->_forum}&amp;CODE=01\" title=\"<lang:mark_read>\"><strong><lang:mark_read></strong></a>
	</span>
	{\$pages}
</div>
{\$buttons}
{\$post}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'members', 'list_row', '<tr>
	<td class=\"cellone\"><a href=\'<sys:gate>?getuser={\$row[\'members_id\']}\'>{\$row[\'class_prefix\']}{\$row[\'members_name\']}{\$row[\'class_suffix\']}</a></td>
	<td class=\"celltwo\" align=\"center\">{\$row[\'members_posts\']}</td>
	<td class=\"cellone\" align=\"center\">{\$row[\'members_rank\']}</td>
	<td class=\"celltwo\" align=\"center\"><strong>{\$row[\'class_title\']}</strong></td>
	<td class=\"cellone\" align=\"center\">{\$row[\'members_registered\']}</td>
	<td class=\"celltwo\" align=\"center\">{\$row[\'members_homepage\']}</td>
	<td class=\"celllast\" align=\"center\"><a href=\'<sys:gate>?a=notes&amp;CODE=07&amp;send={\$row[\'members_id\']}\'><macro:btn_mini_note></a></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'members', 'list_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:index_title>
</div>
<div class=\"bar\">{\$pages}</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"8\"><lang:index_title>:</td>
		</tr>
		<tr>
			<th width=\"15%\"><lang:member_name></th>
			<th align=\"center\" width=\"10%\"><lang:member_posts></th>
			<th align=\"center\" width=\"10%\"><lang:member_rank></th>
			<th align=\"center\" width=\"20%\"><lang:member_group></th>
			<th align=\"center\" width=\"25%\"><lang:member_joined></th>
			<th align=\"center\" width=\"10%\"><lang:member_page></th>
			<th align=\"center\" width=\"10%\"><lang:member_note></th>
		</tr>
		{\$list}
	</table>
</div>
<div class=\"bar\">{\$pages}</div>
<form method=\"post\" action=\"<sys:gate>?a=members\">
	<div class=\"formwrap\">
		<h3><lang:search_title></h3>
		<p class=\"sort\">
		<lang:search_get> 
		<select name=\'sGroup\'>
			<option value=\'all\'><lang:search_group></option>
			{\$sort_groups}
		</select> by 
		<select name=\'sField\'>
			{\$sort_type}
		</select> <lang:search_in>
		<select name=\'sOrder\'>
			{\$sort_order}
		</select> <lang:search_with>
		<select name=\'sResults\'>
			{\$sort_count}
		</select> <lang:search_per_page> 
		<input class=\"submit\" type=\"submit\" value=\"<lang:search_button>\" />
		</p>
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_row', '<tr>
	<td class=\"cellthree\"><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\">{\$row[\'topics_marker\']}</a></td>
	<td class=\"cellone\">{\$row[\'topics_prefix\']} <a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}\" title=\"\">{\$row[\'topics_title\']}</a> {\$inlineNav}<span class=\"special\">-- {\$row[\'topics_subject\']}</span></td>
	<td class=\"celltwo\" align=\"center\"><strong>{\$row[\'topics_posts\']}</strong></td>
	<td class=\"cellone\" align=\"center\">{\$row[\'topics_views\']}</td>
	<td class=\"celltwo\" align=\"center\"><strong>{\$row[\'topics_author\']}</strong></td>
	<td class=\"celllast\" nowrap=\"nowrap\"><span><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><macro:img_mini_box></a> {\$row[\'topics_last\']}</span><br /><lang:topic_last_replied> <strong>{\$row[\'topics_poster\']}</strong></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'active_users', '<div class=\"infowrap\">
	<h1><lang:active_user_title> </h1>
	<h2><lang:active_user_summary> (<a href=\"<sys:gate>?a=active\" title=\"<lang:active_link_details>\"><lang:active_link_details></a>)</h2>
	<p>{\$list}</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'container_main', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb}
</div>
{\$child_forums}
{\$topics}
<div class=\"formwrap\">
	{\$jump}
	<form method=\"post\" action=\"<sys:gate>?a=search&amp;CODE=01\">
		<input type=\"text\" class=\"small_text\" name=\"keywords\" value=\"<lang:search_forums>\" onfocus=\"javascript: this.value=\'\';\" />&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:search_forums>\" />
		<input type=\"hidden\" name=\"forum\" value=\"{\$this->_forum}\" />
	</form>
</div>
{\$active}
{\$board_stats}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'main_buttons', '<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=post&CODE=03&amp;forum={\$this->_forum}\" title=\"<lang:button_new_topic>\"><macro:btn_main_new></a>&nbsp;<a href=\"#qwik\" title=\"<lang:button_new_qwik>\" onclick=\"javascript:return toggleBox(\'qwikform\');\"><macro:btn_main_qtopic></a>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'statistics', '<div class=\"infowrap\">
	<h1><lang:stat_title>:</h1>
	<h2><lang:stat_tip></h2>
	<p><lang:stat_totals><br />
	<lang:stat_newest><br />
	<lang:stat_online></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_bit', '<div id=\"qwikform\" style=\"display: none;\">
	<script language=\"javascript\">
	function check_length()
	{

		var limit = {\$length};

		var length = document.REPLIER.body.value.length;

		if ( (length > limit) ) {

			alert(\'Your message is too long ( \' + length + \' chars ), please shorten it to less than \' + limit + \' characters.\');

		} else {

			alert(\'You are currently using \' + length + \' characters. Maximum allowable amount should not exceed \' + limit);

		}

	}
	</script>
	<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
	<form method=\"POST\" action=\"<sys:gate>?a=post&amp;CODE=00\" name=\"REPLIER\">
		<a name=\"qwik\"></a>
		<div class=\"formwrap\">
			<h3><lang:qwik_title></h3>
			<p class=\"checkwrap\"><lang:qwik_form_tip></p>
			<h3><lang:qwik_form_field_title></h3>
			<h4><lang:qwik_form_field_title_field></h4>
			<input type=\"text\" name=\"title\" />
			<h3><lang:qwik_form_field_body></h3>
			<h4><lang:qwik_form_field_body_tip> ( <a href=\"javascript:smilie_window(\'<sys:gate>\')\" title=\"View emoticon choices\"><lang:qwik_form_link_emoticons></a> &middot; <a href=\"javascript:check_length()\" title=\"Check the length of your topic\"><lang:qwik_form_link_length></a> )</h4>
			<textarea name=\"body\" rows=\"\" cols=\"\"></textarea>
			<p class=\"submit\">
				<input class=\"button\" type=\"submit\" value=\"<lang:qwik_form_button_post>\" />&nbsp;
				<input class=\"reset\" type=\"reset\" value=\"<lang:qwik_form_button_reset>\" />
			</p>
			<input type=\"hidden\" name=\"cOption\" value=\"1\" />
			<input type=\"hidden\" name=\"eOption\" value=\"1\" />
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
			<input type=\"hidden\" name=\"subject\" value=\"\" />
			<input type=\"hidden\" name=\"forum\" value=\"{\$this->_forum}\" />
		</div>
	</form>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'logon', 'form_pass_retrieve_1', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:form_retrieve_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=04\">
	<div class=\"formwrap\">
		<h3><lang:form_retrieve_title></h3>
		<p class=\"checkwrap\"><lang:form_retrieve_tip></p>
		<h3><lang:form_retrieve_field_email></h3>
		<h4><lang:form_retrieve_field_email_tip></h4>
		<input type=\'text\' name=\'email\' tabindex=\'1\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:form_retrieve_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_retrieve_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_note_notify', 'Hello, {\$row[\'members_name\']}

<user:members_name>, from <conf:title> ( <conf:site_link> ), has just sent you a new personal note.
If you wish to read it, click the link below to go straight to your notes index:	

<conf:site_link><sys:gate>?a=notes

If you do not wish to recieve notifications any longer be sure to turn this feature off within your
personal control panel which can be found through the link above.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_subscribe_topic_notice', 'Hello {\$row[\'members_name\']},

{\$row[\'topics_last_poster_name\']}, from <conf:title> ( <conf:site_link> ), has just posted a reply
to a topic you have subscribed to. You may follow the link below to read this post:

<conf:site_link><sys:gate>?gettopic={\$this->_id}&p={\$page}#{\$post}

If you do not wish to recieve subscription notices any longer you may turn this feature 
off within your personal control panel. To do this you may access your UCP through the 
above link.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'help', 'title_row', '<li><a href=\"#{\$count}\" title=\"{\$row[\'help_title\']}\">{\$row[\'help_title\']}</a></li>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'logon', 'form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:form_logon_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:form_logon_title></h3>
		<p class=\"checkwrap\"><lang:form_logon_tip></p>
		<h3><lang:sys_err_option_title></h3>
		<ul>
			<li><a href=\"<sys:gate>?a=register\" title=\"\"><lang:sys_err_option_reg></a></li>
			<li><a href=\"<sys:gate>?a=logon&amp;CODE=03\" title=\"\"><lang:sys_err_option_rec></a></li>
			<li><a href=\"<sys:gate>?a=help\" title=\"\"><lang:sys_err_option_doc></a></li>
		</ul>
		<h3><lang:form_logon_field_username></h3>
		<h4><lang:form_logon_field_username_tip></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:form_logon_field_password></h3>
		<h4><lang:form_logon_field_password_tip></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:form_logon_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_logon_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'help', 'container_help', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:help_crumb_title>
</div>
<div class=\"infowrap\">
    <h1><lang:help_title></h1>
    <h2><lang:help_tip></h2>
    <ul>
        {\$titles}
    </ul>
</div>
{\$entries}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'help', 'content_row', '<div class=\"infowrap\">
	<a name=\"{\$count}\"></a>
	<h3>{\$count}. {\$row[\'help_title\']}</h3>
	<p>{\$row[\'help_content\']}</p>
	<p class=\"top\"><a href=\"javascript:scroll(0,0);\" title=\"<lang:link_top_title>\"><lang:link_top></a></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_footer', '
----------------------------------------------------------------
<lang:mailer_footer> MyTopix | Personal Message Board {\$this->config[\'version\']}.  http://www.jaia-interactive.com');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_wrapper', '			<div id=\"wrap\">
				<h1 id=\"logo\"><a href=\"<sys:gate>?a=main\" title=\"<lang:logo_alt>\">MyTopix</a></h1>
				<ul id=\"top_nav\">
					<li><a href=\"<conf:site_link><sys:gate>?a=members\" title=\"\"><lang:uni_tab_members></a></li>
					<li><a href=\"<conf:site_link><sys:gate>?a=search\" title=\"\"><lang:uni_tab_search></a></li>
					<li><a href=\"<conf:site_link><sys:gate>?a=calendar\" title=\"\"><lang:uni_tab_calendar></a></li>
				</ul>
				{\$this->welcome}
				{\$content}
				<p id=\"copyright\">Powered By: <strong>MyTopix <conf:version></strong><br />Copyright &copy;2004 - 2007,  <a href=\"http://www.jaia-interactive.com/\" title=\"<lang:visit_jaia>\">Jaia Interactive</a> all rights reserved.</p>
			</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_header', '{\$who} <lang:mailer_header> {\$sent}:
----------------------------------------------------------------

');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_member', '<div class=\"welcome\">
	<p class=\"shaft\"><a href=\"<sys:gate>?a=ucp\" title=\"<lang:welcome_control_title>\"><strong><lang:welcome_profile></strong></a> &middot; <a href=\"<sys:gate>?a=search&amp;CODE=03\" title=\"<lang:welcome_latest_title>\"><lang:welcome_latest></a> &middot; <a href=\"<sys:gate>?a=notes\" title=\"<lang:welcome_inbox_title>\"><lang:welcome_messages> (<user:members_newNotes>)</a></p>
	<p><lang:welcome_back>, <a href=\"<sys:gate>?getuser=<user:members_id>\" title=\"<lang:welcome_profile_title>\"><strong><user:members_name></strong></a>! (<a href=\"<sys:gate>?a=logon&CODE=02\" title=\"<lang:welcome_logout_title>\"><lang:welcome_logout></a>)</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_disabled', '<div class=\"welcome\">
        <p class=\"shaft\">&nbsp;</p>
	<p><lang:welcome_disabled></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_guest', '<div class=\"welcome\">
	<p class=\"shaft\"><a href=\"<sys:gate>?a=register&amp;CODE=03\" title=\"\"><lang:welcome_resend_validation></a></p>
	<p><lang:welcome_guest>, <user:members_name>! (<a href=\"<sys:gate>?a=register\" title=\"\"><lang:welcome_register></a> &middot; <a href=\"<sys:gate>?a=logon\" title=\"\"><lang:welcome_logon></a>)</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_message_level_1', '<div id=\"messenger\">
	<h2><lang:messenger_title>:</h2>
	<p>{\$message}</p>
	<h4>(<a href=\"{\$link}\" title=\"<lang:messenger_forward>\"><lang:messenger_forward></a>)</h4>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_admin', '<div class=\"welcome\">
	<p class=\"shaft\"><a href=\"<sys:gate>?a=ucp\" title=\"<lang:welcome_control_title>\"><strong><lang:welcome_profile></strong></a> &middot; <a href=\"<sys:gate>?a=search&amp;CODE=03\" title=\"<lang:welcome_latest_title>\"><lang:welcome_latest></a> &middot; <a href=\"<sys:gate>?a=notes\" title=\"<lang:welcome_inbox_title>\"><lang:welcome_messages> (<user:members_newNotes>)</a> &middot; <a href=\"<conf:site_link>admin/\" title=\"<lang:welcome_admin_title>\"><lang:welcome_link_admin></a></p>
	<p><lang:welcome_back>, <a href=\"<sys:gate>?getuser=<user:members_id>\" title=\"<lang:welcome_profile_title>\"><strong><user:members_name></strong></a>! (<a href=\"<sys:gate>?a=logon&CODE=02\" title=\"<lang:welcome_logout_title>\"><lang:welcome_logout></a>)</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_body', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<!-- Powered By: <conf:application> <conf:version> -->
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en\" xml:lang=\"en\"  dir=\"<lang:text_direction>\">
	<head>
		<title><conf:forum_title> - <lang:powered_by> <conf:application></title>
		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
		<meta name=\"generator\" content=\"editplus\" />
		<meta name=\"author\" content=\"Daniel Wilhelm II Murdoch, wilhelm@jaia-interactive.com, http://www.jaia-interactive.com\" />
		<meta name=\"keywords\" content=\"<conf:application> <conf:version>\" />
		<meta name=\"description\" content=\"\" />
		<script src=\"<sys:skinPath>/js/main.js\" type=\"text/javascript\"></script>
		<link href=\"<sys:skinPath>/styles.css\" rel=\"stylesheet\" type=\"text/css\" title=\"default\" />
	</head>
	<body>
	{\$content}
	</body>
</html>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_board_closed', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:global_board_closed></h3>
		<div id=\"warning\">
			<h3><lang:err_warn_title></h3>
			<p><strong><conf:closed_message></strong></p>
		</div>
		<h3><lang:closed_form_name_title></h3>
		<h4><lang:closed_form_name_title_info></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:closed_form_pass_title></h3>
		<h4><lang:closed_form_pass_title_info></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:closed_form_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:closed_form_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'active', 'active_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:location_active>
</div>
<div class=\"bar\">{\$pages}</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"4\"><lang:active_title></td>
		</tr>
		<tr>
			<th align=\"left\" width=\"15%\"><lang:col_name></td>
			<th align=\"left\" width=\"25%\"><lang:col_location></td>
			<th align=\"center\" width=\"25%\"><lang:col_last_seen></td>
			<th align=\"center\" width=\"10%\"><lang:col_note></td>
		</tr>
		{\$list}
	</table>
</div>
<div class=\"bar\">{\$pages}</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'active', 'active_row', '		<tr>
			<td class=\"cellone\" align=\"left\">{\$row[\'active_user\']} {\$row[\'active_ip\']}</td>
			<td class=\"celltwo\" align=\"left\">{\$row[\'active_location\']}</td>
			<td class=\"cellone\" align=\"center\">{\$row[\'active_time\']}</td>
			<td class=\"celltwo\" align=\"center\">{\$row[\'active_notes\']}</td>
		</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_message_level_2', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <lang:sys_bread_title>
</div>
<div class=\"formwrap\">
	<h3><lang:sys_err_title></h3>
	<h4><lang:sys_err_desc></h4>
	<div id=\"warning\">
		<h3><lang:err_warn_title></h3>
		<p><strong>{\$message}</strong></p>
	</div>
	<h3><lang:sys_err_option_title></h3>
	<ul>
		<li><a href=\"<sys:gate>?a=register\" title=\"\"><lang:sys_err_option_reg></a></li>
		<li><a href=\"<sys:gate>?a=logon&amp;CODE=03\" title=\"\"><lang:sys_err_option_rec></a></li>
		<li><a href=\"<sys:gate>?a=help\" title=\"\"><lang:sys_err_option_doc></a></li>
	</ul>
</div>
{\$logon_form}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_message_level_2_logon', '<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:sys_log_name_title></h3>
		<h4><lang:sys_log_name_desc></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:sys_log_pass_title></h3>
		<h4><lang:sys_log_pass_desc></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:form_logon_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_logon_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		<input type=\"hidden\" name=\"referer\" value=\"{\$referer}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'register', 'form_coppa_field', '		<p class=\"checkwarn\"><input class=\"check\" type=\"checkbox\" name=\"coppa\" {\$coppa} /> <strong><lang:field_coppa_agree></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_admin_user_name', 'Hello, {\$member[\'members_name\']}

This message is to inform you that your user name for <conf:title> ( <conf:site_link> )
has been modified. Below you will find your new user name:

Username: {\$name}

Log into your account through the link below:
<conf:site_link><sys:gate>?a=logon');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_field_attach', '		<h3><lang:attach_title></h3>
		<h4>{\$size_lang}</h4>
		<p class=\"checkwrap\"><input type=\"file\" name=\"upload\" /></p>');";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'wtf.gif', ':wtf:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'wink.gif', ';)', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'huh.gif', ':huh:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'up.gif', ':up:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'tongue.gif', ':P', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'stare.gif', ':|', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'squint.gif', '>_<', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'smile.gif', ':)', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'sick.gif', ':sick:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'shock.gif', ':o', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'shame.gif', ':shame:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'scared.gif', ':scared:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'sad.gif', ':(', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'rolleyes.gif', ':rolleyes:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'right.gif', ':right:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'rage.gif', ':rage:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'point.gif', ':point:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'nerd.gif', ':nerd:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'lup.gif', ':lup:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'left.gif', ':left:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'ldown.gif', ':ldown:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'laugh.gif', ':laugh:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'joy.gif', ':joy:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'angry.gif', ':angry:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'happy.gif', ':happy:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'grin.gif', ':D', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'glare.gif', ':glare:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'evil.gif', ':evil:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'down.gif', ':down:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'dead.gif', ':dead:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'crazy.gif', ':crazy:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'cool.gif', ':cool:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'booyah.gif', ':booyah:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'blank.gif', ':blank:', 1);";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Newcomer', 0, 1, 'pip_blue.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Common Folk', 25, 3, 'pip_poop.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'MyTopix™ Enthusiast', 100, 4, 'pip_purple.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Needs a Life', 500, 6, 'pip_red.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Post Meister', 1000, 8, 'pip_green.gif', {$dir});";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_announce_old', '<img src=\"{%SKIN%}/post_announce_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'txt_online_sep', ',&nbsp;', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_announce_new', '<img src=\"{%SKIN%}/post_announce_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'txt_bread_sep', '/', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_email', '<img src=\"{%SKIN%}/btn_email.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_go', '<input type=\"image\" src=\"{%SKIN%}/btn_go.gif\" width=\"23px\" height=\"23px\" class=\"small_button\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_prefix', '<img src=\"{%SKIN%}/topic_prefix.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_note_reply', '<img src=\"{%SKIN%}/reply_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_online', '<img src=\"{%SKIN%}/btn_online.gif\" alt=\"\" title=\"\" />&nbsp;', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_pin_old', '<img src=\"{%SKIN%}/post_pinned_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_pin_new', '<img src=\"{%SKIN%}/post_pinned_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_offline', '<img src=\"{%SKIN%}/btn_offline.gif\" alt=\"\" title=\"\" />&nbsp;', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_new_dot', '<img src=\"{%SKIN%}/post_open_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_old_dot', '<img src=\"{%SKIN%}/post_open_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_old', '<img src=\"{%SKIN%}/post_open_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_new', '<img src=\"{%SKIN%}/post_open_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_moved', '<img src=\"{%SKIN%}/post_moved.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_old', '<img src=\"{%SKIN%}/post_locked_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_old_dot', '<img src=\"{%SKIN%}/post_locked_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_new_dot', '<img src=\"{%SKIN%}/post_locked_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_new', '<img src=\"{%SKIN%}/post_locked_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_old_dot', '<img src=\"{%SKIN%}/post_hot_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_old', '<img src=\"{%SKIN%}/post_hot_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_new_dot', '<img src=\"{%SKIN%}/post_hot_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_new', '<img src=\"{%SKIN%}/post_hot_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_post_quote', '<img src=\"{%SKIN%}/post_quote.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_post_edit', '<img src=\"{%SKIN%}/post_edit.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_post_delete', '<img src=\"{%SKIN%}/post_delete.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_mini_pages', '<img src=\"{%SKIN%}/pages.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_note_unread', '<img src=\"{%SKIN%}/note_unread.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_note_read', '<img src=\"{%SKIN%}/note_read.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_mini_box', '<img src=\"{%SKIN%}/mini_box.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_reply', '<img src=\"{%SKIN%}/main_reply.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_qtopic', '<img src=\"{%SKIN%}/main_qtopic.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_qreply', '<img src=\"{%SKIN%}/main_qreply.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_new', '<img src=\"{%SKIN%}/main_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_locked', '<img src=\"{%SKIN%}/main_locked.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_delete_note', '<img src=\"{%SKIN%}/delete_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_subs_old', '<img src=\"{%SKIN%}/cat_subs_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_subs_new', '<img src=\"{%SKIN%}/cat_subs_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_redirect', '<img src=\"{%SKIN%}/cat_red.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_old', '<img src=\"{%SKIN%}/cat_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_new', '<img src=\"{%SKIN%}/cat_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_archived', '<img src=\"{%SKIN%}/cat_archived.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_yim', '<img src=\"{%SKIN%}/btn_yim.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_profile', '<img src=\"{%SKIN%}/btn_profile.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_note', '<img src=\"{%SKIN%}/btn_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_msn', '<img src=\"{%SKIN%}/btn_msn.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_icq', '<img src=\"{%SKIN%}/btn_icq.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_homepage', '<img src=\"{%SKIN%}/btn_homepage.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_aim', '<img src=\"{%SKIN%}/btn_aim.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_go', '<img src=\"{%SKIN%}/btn_go.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_new', '<img src=\"{%SKIN%}/post_poll_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_new_dot', '<img src=\"{%SKIN%}/post_poll_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_old_dot', '<img src=\"{%SKIN%}/post_poll_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_old', '<img src=\"{%SKIN%}/post_poll_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_note_send', '<img src=\"{%SKIN%}/send_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_add_event', '<img src=\"{%SKIN%}/main_event.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_poll', '<img src=\"{%SKIN%}/main_poll.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_clip', '&nbsp;<img src=\"{%SKIN%}/topic_attach_prefix.gif\" alt=\"\" title=\"\" />', 0);";
?><?php
$temps  = array();
$emots  = array();
$titles = array();
$macros = array();
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_attach', '<p class=\"attach\">
	<a href=\"<sys:gate>?a=misc&amp;CODE=01&amp;id={\$row[\'upload_id\']}\" title=\"\">{\$row[\'upload_name\']}</a> <strong><lang:attach_size></strong> {\$row[\'upload_size\']} <strong><lang:attach_hits></strong> {\$row[\'upload_hits\']}
</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_coppa', 'In compliance with the COPPA act your account is currently inactive.

Please print this message out and have your parent or guardian sign and date it. 
Then fax it to:

<conf:coppa_fax>

OR mail it to:

<conf:coppa_mail>

------------------------------ CUT HERE ------------------------------
Permission to Participate at <conf:title> ( <conf:site_link> )

Username: {\$username}
Password: {\$password}
Email:    {\$email}

I HAVE REVIEWED THE INFORMATION PROVIDED BY MY CHILD AND HEREBY GRANT PERMISSION 
TO <conf:title> TO STORE THIS INFORMATION. I UNDERSTAND THIS INFORMATION CAN BE 
CHANGED AT ANY TIME BY ENTERING A PASSWORD. I UNDERSTAND THAT I MAY REQUEST FOR 
THIS INFORMATION TO BE REMOVED FROM <conf:title> AT ANY TIME.


Parent or Guardian: ____________________________
                       (print full name here)
Full Signature:     ____________________________

Today\'s Date:       ____________________________

------------------------------ CUT HERE ------------------------------


Once the administrator has received the above form via fax or regular mail your 
account will be activated.

Please do not forget your password as it has been encrypted in our database and 
we cannot retrieve it for you. However, should you forget your password you can 
request a new one which will be activated in the same way as this account.

Thank you for registering.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'form_error_wrapper', '<div id=\"warning\">
<h3><lang:err_wrap_title></h3>
<p><strong><lang:err_wrap_desc></strong></p>
<ul>{\$err_list}</ul>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_files_none', '<tr>
	<td colspan=\"7\" align=\"center\"><strong><lang:file_none></strong></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_files_row', '<tr>
	<td class=\"one\" align=\"center\"><strong>{\$row[\'upload_id\']}</strong></td>
	<td><a href=\"<sys:gate>?a=misc&amp;CODE=01&amp;id={\$row[\'upload_id\']}\" title=\"\">{\$row[\'upload_name\']}</a></td>
	<td class=\"one\"><a href=\"<sys:gate>?a=read&amp;CODE=02&amp;p={\$row[\'upload_post\']}\" title=\"\">{\$row[\'topics_title\']}</a></td>
	<td align=\"center\">{\$row[\'upload_date\']}</td>
	<td class=\"one\" align=\"center\">{\$row[\'upload_size\']}</td>
	<td align=\"center\">{\$row[\'upload_hits\']}</td>
	<td class=\"one\" align=\"center\"><a href=\"<sys:gate>?a=ucp&amp;CODE=18&amp;id={\$row[\'upload_id\']}\" title=\"\" onclick=\"javascript: return confirm(\'<lang:file_link_del_conf>\');\"><lang:file_link_del></a></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_new_note', '<div id=\"message_alert\">
	<h3><lang:note_title></h3>
	<p><a href=\"<sys:gate>?getuser={\$note[\'members_id\']}\" title=\"\">{\$note[\'members_name\']}</a> <lang:note_desc> <a href=\"<sys:gate>?a=notes&amp;CODE=01&amp;nid={\$note[\'notes_id\']}\" title=\"\">{\$note[\'notes_title\']}</a>!</p>
</div>
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'mod_poll_option_row', '		<input type=\"text\" name=\"choice[{\$val[\'id\']}]\" style=\"width: 60%;\" tabindex=\"2\" value=\"{\$val[\'choice\']}\" /><input type=\"text\" name=\"votes[{\$val[\'id\']}]\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$val[\'votes\']}\" /><br />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'attach_rem_field', '<p class=\"checkwarn\"><input type=\"checkbox\" class=\"check\" name=\"remove_attach\" value=\"1\"  />&nbsp;<lang:attach_rem>&nbsp;( <a href=\"<sys:gate>?a=misc&amp;CODE=01&amp;id={\$file_id}\">{\$file_name}</a> )</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'mod_poll_wrapper', '		<h3><lang:mod_poll_editor_title></h3>
		<h4><lang:mod_poll_editor_desc></h4>
		<input type=\"text\" name=\"poll_title\" tabindex=\"1\" value=\"{\$poll[\'poll_question\']}\" />
		<h3><lang:poll_choice_title></h3>
		<h4><lang:poll_choice_desc></h4>
		{\$choices}
		<h3><lang:poll_expire_title></h3>
		<h4><lang:poll_expire_desc></h4>
		<input type=\"text\" name=\"days\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$days}\" />
		<h3><lang:poll_lock_title></h3>
		<h4><lang:poll_lock_desc></h4>
		<input type=\"text\" name=\"vote_lock\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$poll[\'poll_vote_lock\']}\" />
		<h3><lang:poll_options_title></h3>
		<h4><lang:poll_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"poll_only\" value=\"1\" tabindex=\"3\" {\$poll_only} /> <lang:poll_lock_option></p>
		<p class=\"checkwarn\"><input type=\"checkbox\" class=\"check\" name=\"remove\" value=\"1\" tabindex=\"3\" /> <lang:poll_delete></p>
		<input type=\"hidden\" name=\"poll\" value=\"{\$poll[\'poll_id\']}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_result_wrapper', '<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"2\">{\$poll[\'poll_question\']}</td>
		</tr>
		<tr>
			<th width=\"50%\"><lang:poll_tbl_header_choice></th>
			<th><lang:poll_tbl_header_result></th>
		</tr>
			{\$poll_list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_poll_choice_row', '<tr>
	<td class=\"cellone np\"><p class=\"checkwrap\"><input type=\"radio\" name=\"vote\" class=\"check\" id=\"choice_{\$val[\'id\']}\" value=\"{\$val[\'id\']}\" />&nbsp;<label for=\"choice_{\$val[\'id\']}\"><strong>{\$val[\'choice\']}</strong></label></p></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_poll_result_row', '<tr>
	<td class=\"cellone\"><strong>{\$val[\'choice\']}</strong></td>
	<td class=\"cellone\" align=\"right\"><img src=\"<sys:skinPath>/bar_left.gif\" alt=\"\" /><img src=\"<sys:skinPath>/bar_center.gif\" alt=\"\" width=\"{\$width}\" height=\"17px\" /><img src=\"<sys:skinPath>/bar_right.gif\" alt=\"\" /><br />{\$percent}% ( {\$val[\'votes\']} votes ) --
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_option_poll', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"poll\" value=\"1\" {\$poll_check} /> <lang:post_options_poll></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_choice_wrapper', '<form method=\"post\" action=\"<sys:gate>?a=read&amp;CODE=05&amp;t={\$this->_id}\">
	<div class=\"maintable\">
		<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
			<tr>
				<td class=\"header\">{\$poll[\'poll_question\']}</td>
			</tr>
			<tr>
				<th>&nbsp;</th>
			</tr>
				{\$poll_list}
		</table>
	</div>
<p class=\"submit\"><input type=\"button\" value=\"<lang:poll_submit_add>\" style=\"width: auto;\" /></p>
	<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_attach_poll', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / <a href=\"<sys:gate>?gettopic={\$this->_id}\" title=\"\">{\$topic[\'topics_title\']}</a> / <lang:poll_bread_title>
</div>
{\$error_list}
<form method=\"POST\" action=\"<sys:gate>?a=post&amp;CODE=08&amp;t={\$this->_id}\">
	<div class=\"formwrap\">
		<h3><lang:poll_title_title></h3>
		<h4><lang:poll_title_desc></h4>
		<input type=\"text\" name=\"title\" tabindex=\"1\" value=\"{\$title}\" />
		<h3><lang:poll_choice_title></h3>
		<h4><lang:poll_choice_desc></h4>
		<textarea name=\"choices\" tabindex=\"1\">{\$choices}</textarea>
		<h3><lang:poll_expire_title></h3>
		<h4><lang:poll_expire_desc></h4>
		<input type=\"text\" name=\"days\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$days}\" />
		<h3><lang:poll_lock_title></h3>
		<h4><lang:poll_lock_desc></h4>
		<input type=\"text\" name=\"vote_lock\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$vote_lock}\" />
		<h3><lang:poll_options_title></h3>
		<h4><lang:poll_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"poll_only\" value=\"1\" tabindex=\"3\" {\$poll_only} /> <strong><lang:poll_lock_option></strong></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:poll_button_submit>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:poll_button_reset>\" /></p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_edit_event_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=calendar\" title=\"\"><lang:bread_title_two></a> / <a href=\"<sys:gate>?getevent={\$this->_id}\" title=\"\">{\$row[\'event_title\']}</a> / <lang:edit_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}
}
</script>
<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
<a name=\"qwiknote\"></a>
<form method=\"POST\" action=\"<sys:gate>?a=calendar&amp;CODE=06&amp;id={\$this->_id}\" name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:form_add_type_title></h3>
		<h4><lang:form_add_type_desc></h4>
		<p class=\"checkwrap\">
			<strong><lang:form_start_date_on></strong>&nbsp;
			<select name=\"start_month\">{\$start_months}</select>&nbsp;
			<select name=\"start_day\">{\$start_days}</select>&nbsp;
			<select name=\"start_year\">{\$start_years}</select>
		</p>
		<p class=\"checkwrap\">
			<strong><lang:form_loop_every> </strong>&nbsp;
			<select name=\"loop_type\">{\$loop_types}</select>&nbsp;<strong><lang:form_loop_until></strong>&nbsp;
			<select name=\"end_month\">{\$end_months}</select>&nbsp;
			<select name=\"end_day\">{\$end_days}</select>&nbsp;
			<select name=\"end_year\">{\$end_years}</select>
		</p>
		{\$groups}
		<h3><lang:form_add_title_title></h3>
		<h4><lang:form_add_title_desc></h4>
		<input type=\'text\' name=\'title\' tabindex=\'1\' value=\"{\$title}\">
		{\$bbcode}
		<h3><lang:form_emoticon_title></h3>
		<h4><lang:form_emoticon_desc></h4>
		{\$emoticons}
		<h3><lang:form_body_title></h3>
		<h4><lang:form_body_desc> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:form_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:form_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:form_link_length></a> )</h4>
		<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
		<h3><lang:form_options_title></h3>
		<h4><lang:form_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" {\$code_check} /> <lang:form_code_desc></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" {\$emo_check} /> <lang:form_emo_desc></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:form_button_update>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:form_button_reset>\" /></p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_month_event', '<p>{\$event}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_read_event', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=calendar\" title=\"\"><lang:bread_title_two></a> / <lang:bread_title_read> {\$row[\'event_title\']}
</div>
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=calendar&CODE=02\" title=\"\"><macro:btn_add_event></a>
</div>
<div class=\"postwrap\">
	<div class=\"postheader\">{\$row[\'event_title\']} <em>( {\$type} )</em></div>
	<div class=\"user\">
		<p><a href=\"<sys:gate>?getuser={\$row[\'members_id\']}\" title=\"<lang:entry_link_profile>\"><strong>{\$row[\'members_name\']}</strong></a> <em>( <a href=\"<sys:gate>?a=search&CODE=02&mid={\$row[\'members_id\']}\" title=\"<lang:entry_post_find> {\$row[\'members_name\']}\">{\$row[\'members_posts\']}</a> )</em>
		<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span>
		<span><strong>&middot; <lang:entry_rank></strong> {\$row[\'members_pips\']}</span></p>
		{\$avatar}
	</div>
	<div class=\"post\">
		<h5><span>{\$link_delete}&nbsp;{\$link_edit}</span><strong><lang:event_started></strong> {\$date_starts} <strong><lang:event_ends></strong> {\$date_ends}</h5>
		<p>{\$row[\'event_body\']}</p>{\$sig}
	</div>
	<div class=\"foot\">
		<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:read_link_top_title>.\"><lang:read_link_top></a></span>
		<ul class=\"extras\">{\$active}{\$linkSpan}</ul>
	</div>
	<div class=\"postend\">&nbsp;</div>
</div>
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=calendar&CODE=02\" title=\"\"><macro:btn_add_event></a>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_group_list', '		<h3><lang:form_groups_title></h3>
		<h4><lang:form_groups_desc></h4>
		<p class=\"checkwrap\"><select name=\"groups[]\" size=\"5\" multiple=\"multiple\" style=\"width: 200px;\" class=\"jump\">{\$group_list}</select></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_new_event_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=calendar\" title=\"\"><lang:bread_title_two></a> / <lang:add_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}
}
</script>
<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
<a name=\"qwiknote\"></a>
<form method=\"POST\" action=\"<sys:gate>?a=calendar&amp;CODE=03\" name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:form_add_type_title></h3>
		<h4><lang:form_add_type_desc></h4>
		<p class=\"checkwrap\">
			<strong><lang:form_start_date_on> </strong>&nbsp;
			<select name=\"start_month\">{\$start_months}</select>&nbsp;
			<select name=\"start_day\">{\$start_days}</select>&nbsp;
			<select name=\"start_year\">{\$start_years}</select>
		</p>
		<p class=\"checkwrap\">
			<strong><lang:form_loop_every> </strong>&nbsp;
			<select name=\"loop_type\">{\$loop_types}</select>&nbsp;<strong><lang:form_loop_until></strong>&nbsp;
			<select name=\"end_month\">{\$end_months}</select>&nbsp;
			<select name=\"end_day\">{\$end_days}</select>&nbsp;
			<select name=\"end_year\">{\$end_years}</select>
		</p>
		{\$groups}
		<h3><lang:form_add_title_title></h3>
		<h4><lang:form_add_title_desc></h4>
		<input type=\'text\' name=\'title\' tabindex=\'1\' value=\"{\$title}\" />
		{\$bbcode}
		<h3><lang:form_emoticon_title></h3>
		<h4><lang:form_emoticon_desc></h4>
		{\$emoticons}
		<h3><lang:form_body_title></h3>
		<h4><lang:form_body_desc> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:form_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:form_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:form_link_length></a> )</h4>
		<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
		<h3><lang:form_options_title></h3>
		<h4><lang:form_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" checked=\"checked\" /> <lang:form_code_desc></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" checked=\"checked\" /> <lang:form_emo_desc></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:form_button_submit>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:form_button_reset>\" /></p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_blank_row', '<td class=\"{\$class}\">&nbsp;</td>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_date_row', '<td class=\"{\$class}\"><h4>{\$day}</h4><div class=\"events\">{\$events}</div></td>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_month_wrapper', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:bread_title> {\$lit_month}, {\$lit_year}
</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"2\" align=\"left\"><a href=\"<sys:gate>?a=calendar{\$link_prev}\" title=\"\">« {\$link_prev_lit_month}, {\$link_prev_lit_year}</a></td>
			<td class=\"header\" colspan=\"3\" align=\"center\">{\$lit_month}, {\$lit_year}</td>
			<td class=\"header\" colspan=\"2\" align=\"right\"><a href=\"<sys:gate>?a=calendar{\$link_next}\" title=\"\">{\$link_next_lit_month}, {\$link_next_lit_year} »</a></td>
		</tr>
		<tr>
			<th width=\"14%\" align=\"center\"><lang:lit_day_one></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_two></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_three></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_four></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_five></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_six></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_seven></th>
		</tr>
			{\$day_list}
	</table>
</div>
<div class=\"postbutton\"><a href=\"<sys:gate>?a=calendar&amp;CODE=02\" title=\"\"><macro:btn_add_event></a>
</div>
<form method=\"post\" action=\"<sys:gate>?a=calendar\">
<div class=\"formwrap\"><p class=\"sort\">
					<select name=\"month\" class=\"jump\">{\$months}</select>
					<select name=\"year\" class=\"jump\">{\$years}</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"go\" /></p>
</div>
				</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_avatar_row', '<td align=\"center\">
	<label for=\"{\$val}\"><img src=\"<sys:sys_path>sys_images/ava_gallery/{\$gallery}/{\$val}\" alt=\"{\$val}\" /><br />
	<strong>{\$val}</strong></label><br /><input type=\"radio\" class=\"check\" name=\"avatar\" value=\"{\$val}\" id=\"{\$val}\" />
</td>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_avatar_gallery_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:ava_gallery_form_title></h3>
	<p class=\"checkwrap\"><lang:ava_tip></p>
	<h3><lang:ava_gallery_title></h3>
	<h4><lang:ava_gallery_tip></h4>
	<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=15\">
		<p class=\"checkwrap\">
			<select name=\"gallery\" class=\"jump\">
				{\$gallery_list}
			</select>
		</p>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:ava_gallery_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</form>
	<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=16\">
		<div id=\"maintable\">
			<table cellpadding=\"15\" cellspacing=\"1\" width=\"100%\">
				{\$avatar_rows}
			</table>
		</div>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:ava_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		<input type=\"hidden\" name=\"gallery\" value=\"{\$gallery}\" />
	</form>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sub_forum_row', '		<tr>
			<td align=\"center\" class=\"one\" width=\"1%\"><macro:icon_open_new></td>
			<td><a href=\"<sys:gate>?getforum={\$row[\'forum_id\']}\" title=\"\"><strong>{\$row[\'forum_name\']}</strong></a></td>
			<td align=\"center\" class=\"one\">{\$row[\'track_date\']}</td>
			<td align=\"center\"><a href=\"<sys:gate>?a=ucp&amp;CODE=13&amp;forum={\$row[\'forum_id\']}\" title=\"\"><strong><lang:sub_delete></strong></a></td>
		</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_stats', '<div class=\"infowrap\">
	<h1><lang:stat_title>:</h1>
	<h2><lang:stat_tip></h2>
	<p><lang:stat_totals><br />
	<lang:stat_newest><br />
	<lang:stat_online></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_announce', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"announce\" value=\"1\" {\$check[\'announce\']} /> <strong><lang:post_mod_options_announce></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_avatar_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:ava_title></h3>
	<p class=\"checkwrap\"><lang:ava_tip></p>
	<h4><strong><lang:ava_current></strong><br /> {\$avatar}</h4>
	<h4><lang:ava_ext> {\$ext}</h4>
</div>
<div class=\"formwrap\">
	<h3><lang:ava_gallery_title></h3>
	<h4><lang:ava_gallery_tip></h4>
	<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=15\">
		<p class=\"checkwrap\">
			<select name=\"gallery\" class=\"jump\">
				{\$gallery_list}
			</select>
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		</p>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:ava_gallery_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</form>
</div>
<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=17\" enctype=\'multipart/form-data\'>
	<div class=\"formwrap\">
		<h3><lang:ava_url_title></h3>
		<h4><lang:ava_url_tip></h4>
		<input type=\"text\" name=\"url\" value=\"{\$url}\" />
	</div>
	<div class=\"formwrap\">
		<h3><lang:ava_upload_title></h3>
		<h4><lang:ava_upload_tip></h4>
		<input type=\"file\" name=\"upload\" />
	</div>
	<div class=\"formwrap\">
		<h3><lang:ava_remove_title></h3>
		<p class=\"checkwarn\"><input type=\"checkbox\" class=\"check\" name=\"remove\" value=\"1\" /> <strong><lang:ava_remove_warn></strong></p>
		<p class=\"submit\">
		<input class=\"button\" type=\"submit\" value=\"<lang:ava_submit>\" />&nbsp;
		<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_jump_list', '	<form method=\"post\" action=\"<sys:gate>?a=topics\">
		<p class=\"sort\"><select name=\"forum\" class=\"jump\">
			{\$jump_list}
		</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:forum_jump>\" /></p>
	</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_mod_list', '	<form method=\"post\" action=\"<sys:gate>?a=mod&amp;t={\$this->_id}\" class=\"shaft\">
		<p class=\"sort\"><select name=\"CODE\" class=\"jump\">
			{\$mod_list}
		</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:mod_list>\" /></p>
		<input type=\"hidden\"  name=\"hash\" value=\"{\$hash}\" />
	</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topics_active', '<div class=\"infowrap\">
	<h1><lang:viewers_title></h1>
	<h2><lang:viewers_user_summary> ( <a href=\"<sys:gate>?a=active\" title=\"\"><lang:active_link_details></a> )</h2>
	<p>{\$list}</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_mod_wrapper', '<p class=\"moderator_list\"><em><lang:mod_label></em> {\$mod_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_sub_wrapper', '<p class=\"subforum_list\">{\$sub_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_mod_wrapper', '<p class=\"mod_list\"><strong><lang:mod_label></strong> {\$mod_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_sub_wrapper', '<p class=\"mod_list\"><strong><lang:sub_label></strong> {\$sub_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_subscribe_forum_notice', 'Hello {\$row[\'members_name\']},

{\$topic[\'topics_last_poster_name\']}, from <conf:title> ( <conf:site_link> ), has just posted a reply
to a forum you have subscribed to ( {\$row[\'forum_name\']} ). You may follow the link below to 
read this topic:

<conf:site_link><sys:gate>?gettopic={\$topic[\'topics_id\']}

If you do not wish to receive subscription notices any longer you may turn this feature 
off within your personal control panel. To do this you may access your UCP through the 
above link.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_subs', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:sub_title></h3>
	<p class=\"checkwrap\"><lang:sub_tip></p>
	<h3><lang:sub_topics_title></h3>
	<h4><lang:sub_topics_desc></h4>
	<table class=\"ucp_table\" cellpadding=\"3\" cellspacing=\"1\">
		{\$topics}
	</table>
	<h3><lang:sub_forums_title></h3>
	<h4><lang:sub_forums_desc></h4>
	<table class=\"ucp_table\" cellpadding=\"3\" cellspacing=\"1\">
		{\$forums}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_field_subject', '		<h3><lang:post_field_subject></h3>
		<h4><lang:post_field_subject_tip></h4>
		<input type=\"text\" name=\"subject\" tabindex=\"1\" value=\"{\$subject}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_last_post', '<span><macro:img_mini_box> {\$last_date}</span>
<lang:last_post_in> {\$forum[\'forum_last_post_title\']}
<lang:last_post_by> <strong>{\$forum[\'forum_last_post_user_name\']}</strong>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_wrapper', '		<h3><lang:post_options></h3>
		<h4><lang:post_options_tip></h4>
		{\$lock}
		{\$pin}
		{\$announce}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_pin', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"stick\" value=\"1\" {\$check[\'stuck\']} /> <strong><lang:post_mod_options_pin></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_option_bar', '		<h3><lang:post_options></h3>
		<h4><lang:post_options_tip>.</h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" {\$check_code} /> <lang:post_options_code></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" {\$check_emoticon} /> <lang:post_options_emoticon></p>
		{\$poll}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'topic_prefix', '<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><macro:img_prefix></a>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_button', '<a href=\"<sys:gate>{\$url}\" title=\"{\$title}\"><img src=\"<sys:skinPath>/{\$button}.gif\" alt=\"\" /></a>&nbsp;');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_cat_redirect', '<tr>
	<td class=\"cellthree\" align=\"center\" valign=\"top\"><macro:cat_redirect></td>
	<td class=\"cellone\"><h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"\">{\$forum[\'forum_name\']}</a></h4><p>{\$forum[\'forum_description\']}</p></td>
	<td class=\"redirect\" nowrap=\"nowrap\" align=\"center\" colspan=\"3\">{\$forum[\'forum_red_clicks\']} <lang:cat_redirect></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_cat_wrapper', '<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"5\"><a href=\"<sys:gate>?getforum={\$category[\'forum_id\']}\">{\$category[\'forum_name\']}</a></td>
		</tr>
		<tr>
			<th width=\"1%\">&nbsp;</th>
			<th width=\"35%\"><lang:topics_col_forum></th>
			<th align=\"center\" width=\"5%\"><lang:topics_col_topics></th>
			<th align=\"center\" width=\"5%\"><lang:topics_col_replies></th>
			<th  align=\"left\" width=\"15%\"><lang:topics_col_latest></th>
		</tr>
			{\$forum_list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_last_post', '	<span class=\"lastpost\">{\$last_date}</span><br />
	<strong><lang:last_post_in></strong> {\$forum[\'forum_last_post_title\']}<br />
	<strong><lang:last_post_by></strong> {\$forum[\'forum_last_post_user_name\']}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_news_section', '<p id=\"community_news\">
	<strong><lang:news_title>: <a href=\"<sys:gate>?a=read&amp;CODE=02&amp;p={\$news[\'news_post\']}\" title=\"<lang:news_title>\">{\$news[\'news_title\']}</a></strong><br />
	<cite>--<lang:news_date> {\$news[\'news_date\']}.</cite>
</p>
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_none', '							<tr>
								<td class=\"cellone\" align=\"center\" colspan=\"6\"><strong><lang:no_topics></strong></td>
							</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_cat_row', '<tr>
	<td class=\"cellthree\" align=\"center\" valign=\"top\"><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"\">{\$marker}</a></td>
	<td class=\"cellone\"><h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"\">{\$forum[\'forum_name\']}</a></h4><p>{\$forum[\'forum_description\']}{\$mods}{\$subs}</p></td>
	<td class=\"celltwo\" align=\"center\"><strong>{\$forum[\'forum_topics\']}</strong></td>
	<td class=\"celltwo\" align=\"center\">{\$forum[\'forum_posts\']}</td>
	<td class=\"celllast\" nowrap=\"nowrap\">{\$last_post}</td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sub_none', '<tr>
	<td colspan=\"4\" align=\"center\"><strong><lang:main_sub_none></strong></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sub_topic_row', '		<tr>
			<td align=\"center\" class=\"one\"><macro:icon_open_new></td>
			<td><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}\" title=\"\"><strong>{\$row[\'topics_title\']}</strong></a></td>
			<td align=\"center\" class=\"one\">{\$row[\'track_date\']}</td>
			<td align=\"center\"><a href=\"<sys:gate>?a=ucp&amp;CODE=12&amp;id={\$row[\'topics_id\']}\" title=\"\"><strong><lang:sub_delete></strong></a></td>
		</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_container', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <lang:bread_title>
</div>
<hr />
{\$new_note}
{\$news_bit}
{\$category_list}
<hr />
<div class=\"bar\"><span><a href=\"<sys:gate>?a=logon&amp;CODE=06\" title=\"<lang:link_delete_cookies>\"><strong><lang:link_delete_cookies></strong></a> &middot; <a href=\"<sys:gate>?a=logon&amp;CODE=07\" title=\"<lang:link_mark_all_read>\"><strong><lang:link_mark_all_read></strong></a></span>&nbsp;</div>
<hr />
{\$active_users}
<hr />
{\$board_stats}
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_cat_row', '<tr>
	<td class=\"cellone {\$row_color}\" width=\"1%\" align=\"center\">
		<a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$marker}</a>
	</td>
	<td class=\"cellone {\$row_color}\">
		<h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$forum[\'forum_name\']}</a></h4>
		{\$subs}
		<p>{\$forum[\'forum_description\']}{\$mods}</p>
	</td>
	<td class=\"cellone {\$row_color}\">{\$last_post}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$forum[\'forum_topics\']} / {\$forum[\'forum_posts\']}</h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_cat_redirect', '<tr>
	<td class=\"cellone {\$row_color}\" width=\"1%\" align=\"center\"><macro:cat_redirect></td>
	<td class=\"cellone {\$row_color}\" colspan=\"2\">
		<h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$forum[\'forum_name\']}</a></h4>
		<p>{\$forum[\'forum_description\']}</p>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$forum[\'forum_red_clicks\']} <lang:cat_redirect></h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_cat_wrapper', '<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"5\"><a href=\"<sys:gate>?getforum={\$category[\'forum_id\']}\" title=\"{\$category[\'forum_name\']}\">{\$category[\'forum_name\']}</a></td>
		</tr>
		<tr>
			<th colspan=\"2\" align=\"left\" width=\"50%\"><lang:main_col_forum></th>
			<th align=\"left\" width=\"30%\"><lang:main_col_latest></th>
			<th align=\"center\" width=\"20%\"><lang:main_col_topics> / <lang:main_col_replies></th>
		</tr>
		{\$forum_list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'register', 'resend_validation_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:validate_crumb_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=register&amp;CODE=04\">
	<div class=\"formwrap\">
		<h3><lang:validate_title></h3>
		<p class=\"checkwrap\"><lang:validate_tip></p>
		<h3><lang:validate_field_email></h4>
		<h4><lang:validate_field_email_tip></h3>
		<input type=\'text\' name=\'email\' tabindex=\'1\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:validate_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:validate_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_registration_complete', 'Hello, {\$username}

The account you created at <conf:title> ( <conf:site_link> ) is now activated and ready to
use. Depending on your browser settings you may or may not be automatically logged in.
If not just use the following link to log your account:

<conf:site_link><sys:gate>?a=logon

Thank you for participating in our community!');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_main', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:main_title></h3>
	<p class=\"checkwrap\"><lang:main_tip></p>
	<h3><lang:main_email></h3>
	<h4><user:members_email></h4>
	<h3><lang:main_joined></h3>
	<h4>{\$join_date}</h4>
	<h3><lang:main_posts></h3>
	<h4><a href=\"<sys:gate>?a=search&amp;CODE=02&amp;mid=<user:members_id>\">{\$total_posts}</a> <lang:main_posts_stat></h4>
	<h3><lang:main_notes></h3>
	<h4><a href=\"<sys:gate>?a=notes\">{\$total_notes}</a> <lang:main_notes_stat></h4>
	<h3><lang:file_title></h3>
	<h4><lang:file_desc></h4>
	<table class=\"ucp_table\" cellpadding=\"3\" cellspacing=\"1\" with=\"100%\">
		<tr>
			<th width=\"1%\" align=\"center\"><lang:file_col_id></th>
			<th><lang:file_col_name></th>
			<th><lang:file_col_topic></th>
			<th align=\"center\"><lang:file_col_date></th>
			<th align=\"center\"><lang:file_col_size></th>
			<th align=\"center\"><lang:file_col_hits></th>
			<th>&nbsp;</th>
		</tr>
		{\$files}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_tabs', '<ul id=\"ucp_tabs\">
	{\$list}
</ul>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_match_result_row', '<tr>
	<td class=\"cellthree\" align=\"center\" valign=\"top\"><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\">{\$row[\'topics_marker\']}</a></td>
	<td class=\"cellone\">{\$row[\'topics_prefix\']} <a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;hl={\$hlLink}\" title=\"\">{\$row[\'topics_title\']}</a> {\$inlineNav}<span class=\"special\">-- {\$row[\'topics_subject\']}</span></td>
	<td class=\"celltwo\" align=\"center\"><strong>{\$row[\'topics_posts\']}</strong></td>
	<td class=\"cellone\" align=\"center\">{\$row[\'topics_views\']}</td>
	<td class=\"celltwo\" align=\"center\"><strong>{\$row[\'topics_author\']}</strong></td>
	<td class=\"cellone\" align=\"center\"><a href=\"<sys:gate>?getforum={\$row[\'topics_forum\']}\" title=\"\">{\$row[\'forum_name\']}</a></td>
	<td class=\"celllast\" nowrap=\"nowrap\"><span><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><macro:img_mini_box></a> {\$row[\'topics_last\']}</span><lang:topic_last_replied>: <strong>{\$row[\'topics_poster\']}</strong></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_match_result_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=search\" title=\"<lang:search_form_title>\"><lang:search_form_title></a> / <strong>{\$count}</strong> <lang:search_result_title>:
</div>
<div class=\"bar\">{\$pages}</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"7\">{\$count} <lang:search_result_title></td>
		</tr>
		<tr>
			<th width=\"5%\">&nbsp;</th>
			<th width=\"30%\"><lang:result_col_title></th>
			<th align=\"center\" width=\"10%\"><lang:result_col_replies></th>
			<th align=\"center\" width=\"10%\"><lang:result_col_views></th>
			<th align=\"center\" width=\"10%\"><lang:result_col_author></th>
			<th align=\"center\" width=\"20%\"><lang:result_col_forum></th>
			<th width=\"25%\"><lang:result_col_last></th>
		</tr>
		{\$list}
	</table>
</div>
<div class=\"bar\">{\$pages}</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_pass_get_1', 'You have recently attempted to recover your password from <conf:title> ( <conf:site_link> ).
To complete the process you must click the following link to validate your request. Once validation is 
complete you will be mailed your new account password. You will be able to change this password at anytime 
via your control panel.

{\$url}

Take note that this validation link will expire within 24 hours.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_admin_user', 'Hello, {\$name}

This message is to inform you that your account for <conf:title> ( <conf:site_link> )
has been activated. Below you will find your account access information which you may change
at anytime through your personal control panel.

Username: {\$name}
Password: {\$password}

Log your account through the link below:
<conf:site_link><sys:gate>?a=logon\";');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_pass_get_2', 'Hello, {\$row[\'members_name\']}

This message is to inform you that your account for <config:title> ( <config:site_link> )
has been activated. Below you will find your account access information which you may change
at anytime through your personal control panel.

Username: {\$row[\'members_name\']}
Password: {\$pass}

Log your account through the link below:

<conf:site_link><sys:gate>?a=logon');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_email', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=10\'>
	<div class=\"formwrap\">
		<h3><lang:email_title></h3>
		<p class=\"checkwrap\"><lang:email_tip></p>
		<h4><strong><lang:email_current></strong> <user:members_email></h4>
		<h3><lang:email_field_pass></h3>
		<h4><lang:email_field_pass_tip></h4>
		<input type=\"password\" name=\"password\" />
		<h3><lang:email_field_new></h3>
		<h4><lang:email_field_new_tip></h4>
		<input type=\"text\" name=\"new\" value=\"{\$email_one}\" />
		<h3><lang:email_field_con></h3>
		<h4><lang:email_field_con_tip></h4>
		<input type=\"text\" name=\"confirm\" value=\"{\$email_two}\" />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:email_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:email_button_reset>\" />
		</p>
	</div>
	<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_options', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=08\'>
	<div class=\"formwrap\">
		<h3><lang:board_title></h3>
		<p class=\"checkwrap\"><lang:board_tip></p>
		<h3><lang:board_field_skin></h3>
		<h4><lang:board_field_skin_tip></h4>
		<p class=\"checkwrap\"><select name=\"skin\">
			{\$skins}
		</select></p>
		<h3><lang:board_field_lang></h3>
		<h4><lang:board_field_lang_tip></h4>
		<p class=\"checkwrap\"><select name=\"lang\">
			{\$langs}
		</select></p>
		<h3><lang:board_field_zone></h3>
		<h4><lang:board_field_zone_tip></h4>
		<p class=\"checkwrap\"><select name=\"zone\">
			{\$zones}
		</select></p>
		<h3><lang:board_field_notify></h3>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"notes\" value=\"1\"{\$checked[\'notes\']} /> <b><lang:board_field_note>?</b></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"sigs\" value=\"1\"{\$checked[\'sigs\']} /> <b><lang:board_field_sigs>?</b></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"avatars\" value=\"1\"{\$checked[\'avatars\']} /> <b><lang:board_field_avatars>?</b></p>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:board_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'print', 'print_row', '<div id=\"resultwrap\">
	<h3><a href=\'<sys:gate>?getuser={\$row[\'members_id\']}\'><strong>{\$row[\'members_name\']}</strong></a> | <span>{\$row[\'posts_date\']}</span></h3>
	<div class=\"post\"><p>{\$row[\'posts_body\']}</p></div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_lock', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"lock\" value=\"1\" {\$check[\'locked\']} /> <strong><lang:post_mod_options_lock></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'post_name_field', '		<h3><lang:post_field_name></h3>
		<h4><lang:post_field_name_tip></h4>
		<input type\"text\" name=\"name\" tabindex=\"1\" value=\"{\$name}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_banned', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:banned_title></h3>
		<div id=\"warning\">
			<h3><lang:err_warn_title></h3>
			<p><strong><lang:banned_info></strong></p>
		</div>
		<h3><lang:banned_form_name_title></h3>
		<h4><lang:banned_form_name_title_info></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:banned_form_pass_title></h3>
		<h4><lang:banned_form_pass_title_info></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:banned_form_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:banned_form_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_pass', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=06\'>
	<div class=\"formwrap\">
		<h3><lang:pass_title></h3>
		<p class=\"checkwrap\"><lang:pass_tip></p>
		<h3><lang:pass_field_password></h3>
		<h4><lang:pass_field_password_tip></h4>
		<input type=\"password\" name=\"current\" />
		<h3><lang:pass_field_new></h3>
		<h4><lang:pass_field_new_tip></h4>
		<input type=\"password\" name=\"new\" />
		<h3><lang:pass_field_con></h3>
		<h4><lang:pass_field_con_tip></h4>
		<input type=\"password\" name=\"confirm\"\" />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:pass_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:pass_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'page_wrapper', '<macro:img_mini_pages> {\$links}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'print', 'print_body', '<script language=\"JavaScript\">
	<!--
	window.print();
	-->
</script>
<div id=\"print\">
	<h2><span><conf:title> ( <a href=\"<conf:site_link>\" title=\"\"><conf:site_link></a> )</span> {\$topic[\'topics_title\']}</h2>
	<p class=\"bar\"><b><lang:source>: <a href=\"#\" onclick=\"javascript: return prompt(\'<lang:link_copy_prompt>:\', \'<conf:site_link><sys:gate>?gettopic={\$topic[\'topics_id\']}\');\"><conf:site_link><sys:gate>?gettopic={\$this->_id}</a></b></p>
	{\$content}
	<p class=\"bar\"><span><a href=\"javascript: scroll(0,0);\" title=\"\"><strong><lang:top></strong></a></span><strong><lang:source>: <a href=\"#\" onclick=\"javascript: return prompt(\'<lang:link_copy_prompt>:\', \'<conf:site_link><sys:gate>?gettopic={\$topic[\'topics_id\']}\');\"><conf:site_link><sys:gate>?gettopic={\$this->_id}</a></strong></p>
	<div id=\"copyright\"><span>Powered By: <strong>MyTopix&trade; | Personal Message Board</strong> <conf:version></span>Copyright &copy;  2004,  <a href=\"http://www.jaia-interactive.com/\" title=\"<lang:visit_jaia>\">Jaia Interactive</a> all rights reserved.</div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_full_result_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=search\" title=\"<lang:search_form_title>\"><lang:search_form_title></a> / <strong>{\$count}</strong> <lang:search_result_title>:
</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"8\">{\$count} <lang:search_result_title></td>
		</tr>
		<tr>
			<th width=\"5%\"><lang:result_col_score></th>
			<th width=\"5%\">&nbsp;</th>
			<th width=\"30%\"><lang:result_col_title></th>
			<th align=\"center\" width=\"10%\"><lang:result_col_replies></th>
			<th align=\"center\" width=\"10%\"><lang:result_col_views></th>
			<th align=\"center\" width=\"10%\"><lang:result_col_author></th>
			<th align=\"center\" width=\"20%\"><lang:result_col_forum></th>
			<th width=\"35%\"><lang:result_col_last></th>
		</tr>
		{\$list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sig', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <user:class_sigLength>;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}

}
</script>
<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
<form method=\'post\' action=\'<sys:gate>?a=ucp&amp;CODE=04\' name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:sig_title></h3>
		<p class=\"checkwrap\"><lang:sig_tip></p>
		<h3><lang:sig_field_current></h3>
		<p class=\"sig\">{\$parsed}</p>
		{\$bbcode}
		<h3><lang:sig_emoticons></h3>
		<h4><lang:sig_emoticons_tip></h4>
		{\$emoticons}
		<h3><lang:sig_field_body></h3>
		<h4><lang:sig_field_body_tip> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\" title=\"<lang:sig_link_code_title>\"><lang:sig_link_code></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\" title=\"<lang:sig_link_emoticons_tip>\"><lang:sig_link_emoticons></a> · <a href=\"javascript:check_length()\" title=\"<lang:sig_link_length_tip>\"><lang:sig_link_length></a> )</h4>
		<textarea name=\"body\">{\$sig}</textarea>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:sig_button_submit>\" /> 
			<input class=\"reset\" type=\"reset\" value=\"<lang:sig_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_jump_list', '<form method=\"post\" action=\"<sys:gate>?a=topics\" class=\"shaft\">
			<p class=\"sort\"><select name=\"forum\" class=\"jump\">
				{\$jump_list}
			</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:forum_jump>\" /></p>
		</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_full_result_row', '<tr>
	<td class=\"cellone\" align=\"center\"><strong>{\$row[\'topics_score\']}%</strong></td>
	<td class=\"cellthree\" align=\"center\" valign=\"top\"><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\">{\$row[\'topics_marker\']}</a></td>
	<td class=\"cellone\">{\$row[\'topics_prefix\']} <a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;hl={\$hlLink}\" title=\"\">{\$row[\'topics_title\']}</a> {\$inlineNav}<span class=\"special\">-- {\$row[\'topics_subject\']}</span></td>
	<td class=\"celltwo\" align=\"center\"><strong>{\$row[\'topics_posts\']}</strong></td>
	<td class=\"cellone\" align=\"center\">{\$row[\'topics_views\']}</td>
	<td class=\"celltwo\" align=\"center\"><strong>{\$row[\'topics_author\']}</strong></td>
	<td class=\"cellone\" align=\"center\"><a href=\"<sys:gate>?getforum={\$row[\'topics_forum\']}\" title=\"\">{\$row[\'forum_name\']}</a></td>
	<td class=\"celllast\" nowrap=\"nowrap\"><span><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><macro:img_mini_box></a> {\$row[\'topics_last\']}</span><lang:topic_last_replied>: <strong>{\$row[\'topics_poster\']}</strong></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'move_topic', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / <a href=\"<sys:gate>?gettopic={\$this->_id}\" title=\"\">{\$row[\'topics_title\']}</a> / <lang:mod_move_bread>
</div>
<form method=\"post\" action=\"<sys:gate>?a=mod&amp;CODE=05&amp;t={\$this->_id}\">
	<div class=\"formwrap\">
		<h3><lang:mod_move_title></h3>
		<h4><lang:mod_move_desc></h4>
		<p class=\"checkwrap\">
			<input type=\"checkbox\" name=\"link\" class=\"check\" value=\"1\"> <strong><lang:mod_move_link></strong>
		</p>
		<p class=\"checkwrap\">
			<select name=\"forum\" size=\"5\" class=\"big\" id=\"forum\">
				{\$search_list}
			</select>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:mod_move_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:mod_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_validate_user', 'Hello, {\$username}

Our records indicate that you have just attempted to register a new account with our board.
Currently, the administrator of this community thinks it best to first validate all new 
user accounts to prevent spamming and abuse. To activate your account you only need to click
on the link below. Once you do this the system will allow you to log in to your account.

Activation Key:

<conf:site_link><sys:gate>?a=register&CODE=02&key={\$key}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'by_user_row', '<div id=\"resultwrap\">
	<h3><a href=\"<sys:gate>?a=read&amp;CODE=02&amp;p={\$row[\'posts_id\']}\" title=\"\"><b>{\$row[\'topics_title\']}</b></a> | <span>{\$row[\'posts_date\']}</span></h3>
	<div class=\"post\"><p>{\$row[\'posts_body\']}</p></div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'by_user_table', '<div id=\"crumb_nav\">
<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <strong>{\$count}</strong> <lang:search_result_user_title> <strong>{\$user}</strong>:
</div>
<div class=\"bar\">{\$pages}</div>
{\$list}
<div class=\"bar\">{\$pages}</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:search_form_title>:
</div>
<script language=\"javascript\">

	function selectAll(list, select)
	{
		var list = document.getElementById(list);
		
		for (var i = 0; i < list.length; i++)
		{
			list.options[i].selected = select.checked;
		}
	}

</script>
<form method=\"post\" action=\"<sys:gate>?a=search&CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:search_form_field_phrase></h3>
		<h4><lang:search_form_field_phrase_tip></h4>
		<input type=\"text\" name=\"keywords\" value=\"{\$this->_phrase}\" />
		<h3><lang:search_form_type>:</h3>
		<h4><lang:search_form_type_tip>.</h4>
		<p class=\"checkwrap\">
			<input type=\"radio\" name=\"mode\" class=\"check\" value=\"match\" checked=\"checked\" /> <strong><lang:search_form_basic></strong>&nbsp;
			<span id=\"matchtype\">
				<input type=\"checkbox\" name=\"type\" class=\"check\" value=\"1\" /> <lang:search_form_basic_exact>
			</span>
		</p>
		<p class=\"checkwrap\">
			<input type=\"radio\" name=\"mode\" class=\"check\" value=\"full\" /> <strong><lang:search_form_full></strong> &nbsp;
			<span id=\"limit\">
				<select name=\"limit\">
					<option value=\"10\" selected=\"selected\">10</option>
					<option value=\"20\">20</option>
					<option value=\"30\">30</option>
					<option value=\"40\">40</option>
				</select> <lang:search_form_full_limit>
			</span>
		</p>
		<h3><lang:search_form_forum_title></h3>
		<h4><lang:search_form_forum_desc></h4>
		<p class=\"checkwrap\">
			<input type=\"checkbox\" name=\"all\" class=\"check\" value=\"all\" onclick=\"selectAll(\'forums\', this)\" checked=\"checked\"/> <strong><lang:search_form_forum_all></strong>
		</p>
		<p class=\"checkwrap\">
			<select name=\"forums[]\" size=\"5\" multiple=\"multiple\" class=\"big\" id=\"forums\">
				{\$search_list}
			</select>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:search_form_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:search_form_button_reset>\" />
		</p>
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'sig', '<p class=\"sig\">{\$row[\'members_sig\']}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'register', 'form_register', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:register_crumb_title>
</div>
{\$error_list}
<form method=\"post\" action=\"<sys:gate>?a=register&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:registration_title></h3>
		<p class=\"checkwrap\"><lang:registration_tip></p>
		<h3><lang:field_username></h3>
		<h4><lang:field_username_tip></h4>
		<input type=\"text\" name=\"username\" value=\"{\$username}\" />
		<h3><lang:field_pass></h3>
		<h4><lang:field_pass_tip></h4>
		<input type=\"password\" name=\"password\" />
		<h3><lang:field_con_pass></h3>
		<h4><lang:field_con_pass_tip></h4>
		<input type=\"password\" name=\"cpassword\" />
		<h3><lang:field_email></h3>
		<h4><lang:field_email_tip></h4>
		<input type=\"text\" name=\"email\" value=\"{\$email_one}\" />
		<h3><lang:field_con_email></h3>
		<h4><lang:field_con_email_tip></h4>
		<input type=\"text\" name=\"cemail\" value=\"{\$email_two}\" />
		<h3><lang:field_terms></h3>
		<h4><lang:field_terms_tip></h4>
		<textarea rows=\"\" cols=\"\"><lang:field_terms_content></textarea>
		<p class=\"checkwrap\"><input class=\"check\" type=\"checkbox\" name=\"contract\" {\$contract} /> <strong><lang:field_agree></strong></p>
		{\$coppa_field}
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_general', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=02\'>
	<div class=\"formwrap\">
		<h3><lang:gen_title></h3>
		<p class=\"checkwrap\"><lang:gen_tip></p>
		<h3><lang:gen_field_location></h3>
		<h4><lang:gen_field_location_tip></h4>
		<input type=\"text\" name=\"location\" value=\"{\$location}\" />
		<h3><lang:gen_field_website></h3>
		<h4><lang:gen_field_website_tip></h4>
		<input type=\"text\" name=\"homepage\" value=\"{\$homepage}\" />
		<h3><lang:gen_field_birthday></h3>
		<h4><lang:gen_field_birthday_tip></h4>
		<p class=\"checkwrap\">
			<select name=\'bmonth\'>
				{\$months}
			</select>
			&nbsp;
			<select name=\'bday\'>
				{\$days}
			</select>
			&nbsp;
			<select name=\'byear\'>
				{\$years}
			</select>
		</p>
		<h3><lang:gen_field_aim></h3>
		<h4><lang:gen_field_aim_tip></h4>
		<input type=\"text\" name=\"aim\" value=\"{\$aim}\" />
		<h3><lang:gen_field_icq></h3>
		<h4><lang:gen_field_icq_tip></h4>
		<input type=\"text\" name=\"icq\" value=\"{\$icq}\" />
		<h3><lang:gen_field_yim></h3>
		<h4><lang:gen_field_yim_tip></h4>
		<input type=\"text\" name=\"yim\" value=\"{\$yim}\" />
		<h3><lang:gen_field_msn></h3>
		<h4><lang:gen_field_msn_tip></h4>
		<input type=\"text\" name=\"msn\" value=\"{\$msn}\" />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:gen_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:gen_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'post_row_guest', '<div class=\"user\">
	<a name=\"{\$row[\'posts_id\']}\"></a>
	<p><strong>{\$row[\'posts_author_name\']}</strong>
	<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span></p>
	<img src=\"<sys:skinPath>/ava_none.gif\" class=\"avatar\" alt=\"\" title=\"\" />
</div>
<div class=\"post\">
	<h5><strong><lang:posted_on> {\$row[\'posts_date\']}</strong><span>{\$linkDelete}{\$linkEdit}{\$linkQuote}</span></h5>
	<p>{\$row[\'posts_body\']}</p>{\$attach}
</div>
<div class=\"foot\">
	<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:entry_link_top_tip>\"><lang:entry_link_top></a></span>
	&nbsp;
</div>
<div class=\"postend\">&nbsp;</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'post_table', '{\$poll_data}
<div class=\"postwrap\">
        <div class=\"postheader\"><span>{\$topic[\'topics_title\']}</span></div>
        {\$list}
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_active', '<div class=\"infowrap\">
	<h1><lang:readers_title></h1>
	<h2><lang:readers_user_summary> ( <a href=\"<sys:gate>?a=active\" title=\"\"><lang:active_link_details></a> )</h2>
	<p>{\$list}</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_buttons', '<div class=\"postbutton\">
	<p class=\"links\">&nbsp;</p>
	{\$button_reply} {\$button_qwik} {\$button_topic} {\$button_poll}
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'reply_bit', '<div id=\"qwikwrap\" style=\"display: none;\">
	<script language=\"javascript\">
	function check_length()
	{
		var limit  = <conf:max_post> * 1000;
		var length = document.REPLIER.body.value.length;

		if ( (length > limit) ) {
			alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
		} else {
			alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
		}

	}
	</script>
	<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
	<a name=\"qwik\"></a>
	<form method=\"post\" action=\"<sys:gate>?a=post&amp;CODE=01&amp;t={\$this->_id}&amp;qwik=1\" name=\"REPLIER\">
		<div class=\"formwrap\">
			<h3><lang:qwik_title>.</h3>
			<p class=\"checkwrap\"><lang:qwik_title_tip>.</p>
			<h3><lang:qwik_field_body>:</h3>
			<h4><lang:qwik_field_body_tip> (<a href=\'javascript:smilie_window(\"<sys:gate>\");\' title=\"<lang:qwik_link_emoticons>\"><lang:qwik_link_emoticons></a> &middot; <a href=\"javascript:check_length();\" title=\"<lang:qwik_link_length>\"><lang:qwik_link_length></a>)</h2>
			<textarea name=\"body\" rows=\"\" cols=\"\"></textarea>
			<p class=\"submit\">
				<input class=\"button\" type=\"submit\" value=\"<lang:qwik_button_submit>\" />&nbsp;
				<input class=\"reset\" type=\"reset\" value=\"<lang:qwik_button_reset>\" />
			</p>
			<input type=\"hidden\" name=\"cOption\" value=\"1\" />
			<input type=\"hidden\" name=\"eOption\" value=\"1\" />
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		</div>
	</form>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'post_row', '<div class=\"user\">
	<a name=\"{\$row[\'posts_id\']}\"></a>
	<p><a href=\"<sys:gate>?getuser={\$row[\'members_id\']}\" title=\"<lang:entry_link_profile>\"><strong>{\$row[\'members_name\']}</strong></a> <em>( <a href=\"<sys:gate>?a=search&CODE=02&mid={\$row[\'members_id\']}\" title=\"<lang:entry_post_find> {\$row[\'members_name\']}\">{\$row[\'members_posts\']}</a> )</em>
	<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span>
	<span><strong>&middot; <lang:entry_rank></strong> {\$row[\'members_pips\']}</span></p>
	{\$avatar}<div style=\"clear:both;\" /></div>
</div>
<div class=\"post\">
	<h5><strong><lang:posted_on> {\$row[\'posts_date\']}</strong><span>{\$linkDelete}{\$linkEdit}{\$linkQuote}</span></h5>
	<p>{\$row[\'posts_body\']}</p>{\$attach}{\$sig}
</div>
<div class=\"foot\">
	<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:entry_link_top_tip>\"><lang:entry_link_top></a></span>
	<ul class=\"extras\"><li>{\$active}</li>{\$linkSpan}</ul>
</div>
<div class=\"postend\">&nbsp;</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'container_read', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / {\$topic[\'topics_title\']}
</div>
{\$buttons}
<div class=\"bar\">
	<span><a href=\"<sys:gate>?a=print&amp;t={\$topic[\'topics_id\']}\" title=\"<lang:print_view_tip>\" target=\"_blank\"><strong><lang:print_view></strong></a> &middot; <a href=\"<sys:gate>?gettopic={\$topic[\'topics_id\']}&amp;CODE=01\" title=\"<lang:subscribe_tip>\"><strong><lang:subscribe></strong></a></span>
	{\$pages}
</div>
{\$content}
<div class=\"bar\">
	<span><a href=\"<sys:gate>?gettopic={\$topic[\'topics_id\']}&amp;CODE=03&amp;forum={\$topic[\'topics_forum\']}\" title=\"<lang:previous>\"><strong><lang:previous></strong></a> &middot; <a href=\"<sys:gate>?a=topics&amp;forum={\$topic[\'topics_forum\']}\" title=\"<lang:index>\"><strong><lang:index></strong></a> &middot; <a href=\"<sys:gate>?gettopic={\$topic[\'topics_id\']}&amp;CODE=04&amp;forum={\$topic[\'topics_forum\']}\" title=\"<lang:next>\"><strong><lang:next></strong></a></span>
	{\$pages}
</div>
{\$buttons}
<div class=\"formwrap\">
{\$mod}
{\$jump}
</div>
{\$replier}
{\$readers}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'quote_field', '		<h3><lang:post_field_quote></h3>
		<h4><lang:post_field_quote_tip></h4>
		<textarea name=\"quote\">{\$message}</textarea>
		{\$hidden}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'smilie_wrapper', '<table class=\"emoticon\" cellpadding=\"0\" cellspacing=\"0\">
	{\$smilies}
</table>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_field_title', '		<h3><lang:post_field_title></h3>
		<h4><lang:post_field_title_tip></h4>
		<input type=\"text\" name=\"title\" tabindex=\"1\" value=\"{\$title}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'profile', 'profile_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:profile_title> {\$row[\'members_name\']}
</div>
<div id=\"left_column\">
	<div class=\"formwrap\">
		<h3><lang:profile_name></h3>
		<h4>{\$row[\'members_name\']} ( {\$row[\'class_prefix\']}{\$row[\'class_title\']}{\$row[\'class_suffix\']} )</h4>
		<h3><lang:profile_last_visit></h3>
		<h4>{\$row[\'members_lastvisit\']}</h4>
		<h3><lang:profile_registered></h3>
		<h4>{\$row[\'members_registered\']}</h4>
		<h3><lang:profile_birthday></h3>
		<h4>{\$birthday}</h4>
		<h3><lang:profile_stats></h3>
		<h4><a href=\'<sys:gate>?a=search&amp;CODE=02&amp;mid={\$row[\'members_id\']}\'>{\$row[\'members_posts\']}</a> <lang:profile_posts> ( {\$row[\'members_per_day\']} / <lang:per_day> )</h4>
		<h3><lang:profile_last_5></h3>
		<ul>
			{\$topics}
		</ul>
		<h3><lang:profile_location></h3>
		<h4>{\$row[\'members_location\']}</h4>
	</div>
</div>
<div id=\"right_column\">
	<div class=\"formwrap\">
		<h3><lang:profile_home></h3>
		<h4>{\$row[\'members_homepage\']}</h4>
		<h3><lang:profile_aol></h3>
		<h4>{\$row[\'members_aim\']}</h4>
		<h3><lang:profile_yim></h3>
		<h4>{\$row[\'members_yim\']}</h4>
		<h3><lang:profile_msn></h3>
		<h4>{\$row[\'members_msn\']}</h4>
		<h3><lang:profile_icq></h3>
		<h4>{\$row[\'members_icq\']}</h4>
		<h3><lang:profile_other></h3>
		<ul>
			<li><a href=\'<sys:gate>?a=notes&amp;CODE=07&amp;send={\$row[\'members_id\']}\'><lang:profile_link_note></a></li>
		</ul>
	</div>
</div>
<div id=\"signature\">
	<div class=\"formwrap\">
		<h3><lang:profile_sig></h3>
		<p class=\"sig\">{\$row[\'members_sig\']}</p>
	</div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'emoticons_field', '		<h3><lang:post_emoticon_title></h3>
		<h4><lang:post_emoticon_tip></h4>
		{\$smilies}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_wrapper', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> {\$bread_crumb}
</div>
{\$errors}
<script language=\'javascript\'>
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;
		if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}

}
</script>
<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
<form method=\"POST\" action=\"{\$this->_form_action}\" name=\"REPLIER\" {\$this->_form_multipart}>
	<div class=\"formwrap\">
		<h3>{\$this->_form_title}</h3>
		<p class=\"checkwrap\">{\$this->_form_tip}</p>
		{\$recipient}
		{\$name}
		{\$title}
		{\$subject}
		{\$bbcode}
		{\$emoticons}
		<h3><lang:post_message_title></h3>
		<h4><lang:post_message_tip> (  <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:post_link_bbcode></a> · <a href=\'javascript:smilie_window(\"<sys:gate>\")\'><lang:post_link_emoticons></a> · <a href=\'javascript:check_length()\'><lang:post_link_length></a> )</h4>
		<textarea name=\"body\" rows=\"5\" tabindex=\"1\">{\$message}</textarea>
		{\$quote}
		{\$convert}
		{\$upload}
		{\$tools}
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" tabindex=\"2\" value=\"{\$this->_form_submit}\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		{\$hidden}
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'bbcode_field', '	<div id=\'bbcode_panel\' style=\'display: none;\'>
		<h3><lang:bb_title></h3>
		<h4><lang:bb_title_tip></h4>
		<table cellpadding=\'3\' cellspacing=\'0\'>
			<tr>
				<td align=\'left\'>
					<input type=\'button\' class=\'bbcode\' value=\' U \' onClick=\'codeBasic(this)\' name=\'u\' />
					<input type=\'button\' class=\'bbcode\' value=\' I \' onClick=\'codeBasic(this)\' name=\'i\' />
					<input type=\'button\' class=\'bbcode\' value=\' B \' onClick=\'codeBasic(this)\' name=\'b\' /> 
					<select name=\'FONT\' style=\'width: 100px;\' onchange=\'fontFace(this.options[this.selectedIndex].value)\'>
						<option value=\'0\'><lang:bb_select_font></option>
						<option style=\'font-family: tahoma; font-weight: bold;\' value=\'Arial\'>Tahoma</option>
						<option style=\'font-family: times; font-weight: bold;\' value=\'Times\'>Times</option>
						<option style=\'font-family: courier; font-weight: bold;\' value=\'Courier\'>Courier</option>
						<option style=\'font-family: impact; font-weight: bold;\' value=\'Impact\'>Impact</option>
						<option style=\'font-family: geneva; font-weight: bold;\' value=\'Geneva\'>Geneva</option>
						<option style=\'font-family: optima; font-weight: bold;\' value=\'Optima\'>Optima</option>
					</select>
					<select name=\'SIZE\' style=\'width: 100px;\' onchange=\'fontSize(this.options[this.selectedIndex].value)\'>
						<option value=\'0\'><lang:bb_select_size></option>
						<option value=\'1\'><lang:bb_size_small></option>
						<option value=\'7\'><lang:bb_size_large></option>
						<option value=\'14\'><lang:bb_size_largest></option>
					</select>
					<select name=\'COLOR\' style=\'width: 100px;\' onchange=\'fontColor(this.options[this.selectedIndex].value)\'>
						<option value=\'0\'><lang:bb_select_color></option>
						<option value=\'blue\' style=\'color:blue\'><lang:bb_color_blue></option>
						<option value=\'red\' style=\'color:red\'><lang:bb_color_red></option>
						<option value=\'purple\' style=\'color:purple\'><lang:bb_color_purple></option>
						<option value=\'orange\' style=\'color:orange\'><lang:bb_color_orange></option>
						<option value=\'yellow\' style=\'color:yellow\'><lang:bb_color_yellow></option>
						<option value=\'gray\' style=\'color:gray\'><lang:bb_color_gray></option>
						<option value=\'green\' style=\'color:green\'><lang:bb_color_green></option>
					</select>
				</td>
			</tr>
			<tr>
				<td align=\'left\'>
					<input type=\'button\' class=\'bbcode\' value=\' # \' onClick=\'codeBasic(this)\' name=\'code\' />
					<input type=\'button\' class=\'bbcode\' value=\' \"QUOTE\" \' onClick=\'codeBasic(this)\' name=\'quote\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' List \' onClick=\'codeList()\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' IMG \' onClick=\'codeBasic(this)\' name=\'img\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' @ \' onClick=\'codeBasic(this)\' name=\'email\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' URL \' onClick=\'codeBasic(this)\' name=\'url\' /> 
				</td>
			</tr>
		</table>
		<p class=\"checkwrap\"><input type=\'radio\' class=\"check\" name=\'mode\' value=\'adv\' checked=\'checked\' /> <b><lang:bb_mode_advanced></b> <lang:bb_mode_advanced_tip>.</p>
		<p class=\"checkwrap\"><input type=\'radio\' class=\"check\" name=\'mode\' value=\'simple\'/> <b><lang:bb_mode_simple></b> <lang:bb_mode_simple_tip>.</p>
	</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <lang:notes_main_title>
</div>
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>
</div>
<div class=\"bar\">
	{\$pages}
</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"5\"><lang:note_your_notes> ( {\$filled}% <lang:note_full> )</td>
		</tr>
		<tr>
			<th align=\"left\" width=\"5%\">&nbsp;</td>
			<th align=\"left\" width=\"35%\"><lang:note_col_title></td>
			<th align=\"center\" width=\"20%\"><lang:note_col_sender></td>
			<th align=\"center\" width=\"25%\"><lang:note_col_recieved></td>
			<th width=\"5%\">&nbsp;</td>
		</tr>
		{\$list}
	</table>
</div>
<div class=\"bar\">
	{\$pages}
</div>
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>&nbsp;<a href=\"<sys:gate>?a=notes&amp;CODE=05\" title=\"\" onclick=\"javascript: return confirm(\'<lang:empty_inbox_confirm>?\');\"><macro:btn_delete_note></a>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_row', '<tr>
	<td class=\'cellone\' align=\"center\"><a href=\'<sys:gate>?a=notes&amp;CODE=06&amp;nid={\$row[\'notes_id\']}\'>{\$row[\'notes_marker\']}</a></td>
	<td class=\'celltwo\'><a href=\'<sys:gate>?a=notes&amp;CODE=01&amp;nid={\$row[\'notes_id\']}\'>{\$row[\'notes_title\']}</a></td>
	<td class=\'cellone\' align=\"center\"><a href=\'<sys:gate>?getuser={\$row[\'notes_sender\']}\'><strong>{\$row[\'members_name\']}</strong></a></td>
	<td class=\'celltwo\' align=\"center\">{\$row[\'notes_date\']}</td>
	<td class=\'celllast\' align=\"center\"><a href=\"<sys:gate>?a=notes&amp;CODE=04&amp;nid={\$row[\'notes_id\']}\" title=\"\" onclick=\"javascript: return confirm(\'<lang:read_delete_confirm>?\');\"><b><lang:read_delete_title></b></a></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_read', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=notes\" title=\"\"><lang:notes_inbox_title></a> / <lang:notes_read_crumb_title> {\$row[\'notes_title\']}
</div>
<div class=\"postbutton\">
	<a href=\'<sys:gate>?a=notes&amp;CODE=3&amp;nid={\$this->_id}&amp;send={\$row[\'members_name\']}\'><macro:btn_note_reply></a>&nbsp;<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>
</div>
<div class=\"postwrap\">
	<div class=\"postheader\">{\$row[\'notes_title\']}</div>
	<div class=\"user\">
		<a name=\"{\$row[\'notes_id\']}\"></a>
		<p><a href=\"<sys:gate>?getuser={\$row[\'members_id\']}\" title=\"<lang:entry_link_profile>\"><strong>{\$row[\'members_name\']}</strong></a> <em>( <a href=\"<sys:gate>?a=search&CODE=02&mid={\$row[\'members_id\']}\" title=\"<lang:entry_post_find> {\$row[\'members_name\']}\">{\$row[\'members_posts\']}</a> )</em>
		<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span>
		<span><strong>&middot; <lang:entry_rank></strong> {\$row[\'members_pips\']}</span></p>
		{\$avatar}<div style=\"clear:both;\" /></div>
	</div>
	<div class=\"post\">
		<h5><strong><lang:sent_on> {\$row[\'notes_date\']}</strong><span><a href=\"<sys:gate>?a=notes&amp;CODE=04&amp;nid={\$row[\'notes_id\']}\" title=\"<lang:read_button_delete>\" onclick=\"javascript: return confirm(\'<lang:read_delete_confirm>\');\"><img src=\"<sys:skinPath>/post_delete.gif\" alt=\"<lang:read_delete_confirm>\" /></a></span></h5>
		<p>{\$row[\'notes_body\']}</p>{\$sig}
	</div>
	<div class=\"foot\">
		<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:read_link_top_title>.\"><lang:read_link_top></a></span>
		<ul class=\"extras\">{\$linkSpan}</ul>
	</div>
	<div class=\"postend\">&nbsp;</div>
</div>
<div class=\"postbutton\">
	<a href=\'<sys:gate>?a=notes&amp;CODE=3&amp;nid={\$this->_id}&amp;send={\$row[\'members_name\']}\'><macro:btn_note_reply></a>&nbsp;<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_none', '							<tr>
								<td class=\"cellone\" align=\"center\" colspan=\"5\"><strong><lang:no_notes></strong></td>
							</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'notes_send_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <a href=\"<sys:gate>?a=notes\" title=\"\"><lang:notes_main_title></a> <macro:txt_bread_sep> <lang:notes_new_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
	function check_length()
	{
		var limit  = <conf:max_post> * 1000;
		var length = document.REPLIER.body.value.length;

		if ( (length > limit) ) {
			alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
		} else {
			alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
		}
	}
	</script>
	<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
	<a name=\"qwiknote\"></a>
	<form method=\"POST\" action=\"<sys:gate>?a=notes&amp;CODE=02\" name=\"REPLIER\">
		<div class=\"formwrap\">
			<h3><lang:notes_send_title></h3>
			<p class=\"checkwrap\"><lang:form_send_tip></p>
			<h3><lang:post_field_recipient_title>:</h3>
			<h4><lang:post_field_recipient_tip> ( <a href=\'<sys:gate>?a=members\'><lang:post_field_recipient_link_search></a> )</h4>
			<input type=\'text\' name=\'recipient\' value=\'{\$to}\' tabindex=\'1\'  />
			<h3><lang:post_field_title>:</h3>
			<h4><lang:post_field_title_tip>.</h4>
			<input type=\'text\' name=\'title\' tabindex=\'2\' value=\"{\$title}\" />
			{\$bbcode}
			<h3><lang:post_emoticon_title></h3>
			<h4><lang:post_emoticon_tip></h4>
			{\$emoticons}
			<h3><lang:post_message_title></h3>
			<h4><lang:post_message_tip> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:post_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:post_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:post_link_length></a> )</h4>
			<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
			<h3><lang:post_options></h3>
			<h4><lang:post_options_tip>.</h4>
			<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_code></p>
			<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_emoticon></p>
			<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:post_button_send>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:post_button_reset>\" /></p>
			<input type=\'hidden\' name=\'redirect\' value=\'new\' />
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		</div>
	</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'notes_reply_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=notes\" title=\"\"><lang:notes_inbox_title></a> / <a href=\"<sys:gate>?a=notes&amp;CODE=01&amp;nid={\$this->_id}\" title=\"\">{\$bread_title}</a> / <lang:notes_reply_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}

}
</script>
<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
<a name=\"qwiknote\"></a>
<form method=\"POST\" action=\"<sys:gate>?a=notes&amp;CODE=02&amp;nid={\$this->_id}\" name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:notes_reply_title> {\$note[\'notes_title\']}</h3>
		<h4><lang:form_send_tip></h4>
		<h3><lang:post_field_recipient_title>:</h3>
		<h4><lang:post_field_recipient_tip> ( <a href=\'<sys:gate>?a=members\'><lang:post_field_recipient_link_search></a> )</h4>
		<input type=\'text\' name=\'recipient\' value=\'{\$recipient}\' tabindex=\'1\' />
		<h3><lang:post_field_title>:</h3>
		<h4><lang:post_field_title_tip>.</h4>
		<input type=\'text\' name=\'title\' value=\"{\$note[\'notes_title\']} \"tabindex=\'2\' />
		{\$bbcode}
		<h3><lang:post_emoticon_title></h3>
		<h4><lang:post_emoticon_tip></h4>
		{\$emoticons}
		<h3><lang:post_message_title></h3>
		<h4><lang:post_message_tip> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:post_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:post_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:post_link_length></a> )</h4>
		<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
		<h3><lang:post_field_quote></h3>
		<h4><lang:post_field_quote_tip></h4>
		<textarea name=\"quote\" tabindex=\'3\'>{\$quote}</textarea>
		<h3><lang:post_options></h3>
		<h4><lang:post_options_tip>.</h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_code></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_emoticon></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:post_button_send>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:post_button_reset>\" /></p>
		<input type=\'hidden\' name=\"id\" value=\"{\$this->_id}\" />
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'misc', 'emoticon_row', '	<tr>
		<td class=\'celltwo\'>{\$code[\$i]}</td>
		<td class=\'celltwo\'>
			<a href=\'javascript:add_smilie(\"{\$code[\$i]}\")\'>{\$name[\$i]}</a>
		</td>
	</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'misc', 'emoticon_wrapper', '<script language=\'javascript\'>

	function add_smilie(text)
	{
		opener.document.REPLIER.body.value += \" \" + text + \" \";

	}

</script>
<table class=\"maintable\" cellpadding=\'6\' cellspacing=\'1\' width=\"95%\">
	<tr>
		<td class=\"header\" colspan=\"2\"><lang:emoticon_legend>:</td>
	</tr>
	<tr>
		<th class=\"cellone\" colspan=\'2\'>( <a href=\'javascript:this.close()\'><lang:close_window></a> )</th>
	</tr>
	{\$list}
	<tr>
		<td class=\"footer\" colspan=\"2\">&nbsp;</td>
	</tr>
</table>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'topic_editor', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / <a href=\"<sys:gate>?gettopic={\$this->_id}\" title=\"\">{\$topic[\'topics_title\']}</a> / <lang:mod_edit_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=mod&amp;CODE=03&amp;t={\$this->_id}\">
	<div class=\"formwrap\">
		<h3><lang:mod_form_title> {\$topic[\'topics_title\']}</h3>
		<h4><lang:mod_form_tip></h4>
		<h3><lang:mod_field_title></h3>
		<h4><lang:mod_field_title_tip></h4>
		<input type=\"text\" name=\"title\" value=\"{\$topic[\'topics_title\']}\" />
		<h3><lang:mod_field_subject></h3>
		<h4><lang:mod_field_subject></h4>
		<input type=\"text\" name=\"subject\" value=\"{\$topic[\'topics_subject\']}\" />
		<h3><lang:mod_field_views></h3>
		<h4><lang:mod_field_views_tip></h4>
		<input type=\"text\" name=\"views\" value=\"{\$topic[\'topics_views\']}\" />
		{\$mod_poll}
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" name=\"submit\" value=\"<lang:mod_edit_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:mod_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_table', '{\$buttons}
<div class=\"bar\">
	<span>
		<a href=\"<sys:gate>?getforum={\$this->_forum}&amp;CODE=02\" title=\"\"><strong><lang:forum_subscribe></strong></a>
	</span>
	{\$pages}
</div>
<div class=\"maintable\">
<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"6\">{\$forum_data[\'forum_name\']}</td>
		</tr>
	<tr>
		<th width=\"1%\">&nbsp;</th>
		<th width=\"30%\"><lang:main_col_title></th>
		<th align=\"center\" width=\"10%\"><lang:topic_posts></th>
		<th align=\"center\" width=\"10%\"><lang:topic_views></th>
		<th  align=\"center\" width=\"10%\"><lang:main_col_author></th>
		<th width=\"25%\"><lang:main_col_last_post></th>
	</tr>
	{\$list}
</table>
</div>
<div class=\"bar\">
	<span>
		<a href=\"<sys:gate>?getforum={\$this->_forum}&amp;CODE=01\" title=\"<lang:mark_read>\"><strong><lang:mark_read></strong></a>
	</span>
	{\$pages}
</div>
{\$buttons}
{\$post}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'members', 'list_row', '<tr>
	<td class=\"cellone\"><a href=\'<sys:gate>?getuser={\$row[\'members_id\']}\'>{\$row[\'class_prefix\']}{\$row[\'members_name\']}{\$row[\'class_suffix\']}</a></td>
	<td class=\"celltwo\" align=\"center\">{\$row[\'members_posts\']}</td>
	<td class=\"cellone\" align=\"center\">{\$row[\'members_rank\']}</td>
	<td class=\"celltwo\" align=\"center\"><strong>{\$row[\'class_title\']}</strong></td>
	<td class=\"cellone\" align=\"center\">{\$row[\'members_registered\']}</td>
	<td class=\"celltwo\" align=\"center\">{\$row[\'members_homepage\']}</td>
	<td class=\"celllast\" align=\"center\"><a href=\'<sys:gate>?a=notes&amp;CODE=07&amp;send={\$row[\'members_id\']}\'><macro:btn_mini_note></a></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'members', 'list_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:index_title>
</div>
<div class=\"bar\">{\$pages}</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"8\"><lang:index_title>:</td>
		</tr>
		<tr>
			<th width=\"15%\"><lang:member_name></th>
			<th align=\"center\" width=\"10%\"><lang:member_posts></th>
			<th align=\"center\" width=\"10%\"><lang:member_rank></th>
			<th align=\"center\" width=\"20%\"><lang:member_group></th>
			<th align=\"center\" width=\"25%\"><lang:member_joined></th>
			<th align=\"center\" width=\"10%\"><lang:member_page></th>
			<th align=\"center\" width=\"10%\"><lang:member_note></th>
		</tr>
		{\$list}
	</table>
</div>
<div class=\"bar\">{\$pages}</div>
<form method=\"post\" action=\"<sys:gate>?a=members\">
	<div class=\"formwrap\">
		<h3><lang:search_title></h3>
		<p class=\"sort\">
		<lang:search_get> 
		<select name=\'sGroup\'>
			<option value=\'all\'><lang:search_group></option>
			{\$sort_groups}
		</select> by 
		<select name=\'sField\'>
			{\$sort_type}
		</select> <lang:search_in>
		<select name=\'sOrder\'>
			{\$sort_order}
		</select> <lang:search_with>
		<select name=\'sResults\'>
			{\$sort_count}
		</select> <lang:search_per_page> 
		<input class=\"submit\" type=\"submit\" value=\"<lang:search_button>\" />
		</p>
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_row', '<tr>
	<td class=\"cellthree\"><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\">{\$row[\'topics_marker\']}</a></td>
	<td class=\"cellone\">{\$row[\'topics_prefix\']} <a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}\" title=\"\">{\$row[\'topics_title\']}</a> {\$inlineNav}<span class=\"special\">-- {\$row[\'topics_subject\']}</span></td>
	<td class=\"celltwo\" align=\"center\"><strong>{\$row[\'topics_posts\']}</strong></td>
	<td class=\"cellone\" align=\"center\">{\$row[\'topics_views\']}</td>
	<td class=\"celltwo\" align=\"center\"><strong>{\$row[\'topics_author\']}</strong></td>
	<td class=\"celllast\" nowrap=\"nowrap\"><span><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><macro:img_mini_box></a> {\$row[\'topics_last\']}</span><br /><lang:topic_last_replied> <strong>{\$row[\'topics_poster\']}</strong></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'active_users', '<div class=\"infowrap\">
	<h1><lang:active_user_title> </h1>
	<h2><lang:active_user_summary> (<a href=\"<sys:gate>?a=active\" title=\"<lang:active_link_details>\"><lang:active_link_details></a>)</h2>
	<p>{\$list}</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'container_main', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb}
</div>
{\$child_forums}
{\$topics}
<div class=\"formwrap\">
	{\$jump}
	<form method=\"post\" action=\"<sys:gate>?a=search&amp;CODE=01\">
		<input type=\"text\" class=\"small_text\" name=\"keywords\" value=\"<lang:search_forums>\" onfocus=\"javascript: this.value=\'\';\" />&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:search_forums>\" />
		<input type=\"hidden\" name=\"forum\" value=\"{\$this->_forum}\" />
	</form>
</div>
{\$active}
{\$board_stats}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'main_buttons', '<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=post&CODE=03&amp;forum={\$this->_forum}\" title=\"<lang:button_new_topic>\"><macro:btn_main_new></a>&nbsp;<a href=\"#qwik\" title=\"<lang:button_new_qwik>\" onclick=\"javascript:return toggleBox(\'qwikform\');\"><macro:btn_main_qtopic></a>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'statistics', '<div class=\"infowrap\">
	<h1><lang:stat_title>:</h1>
	<h2><lang:stat_tip></h2>
	<p><lang:stat_totals><br />
	<lang:stat_newest><br />
	<lang:stat_online></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_bit', '<div id=\"qwikform\" style=\"display: none;\">
	<script language=\"javascript\">
	function check_length()
	{

		var limit = {\$length};

		var length = document.REPLIER.body.value.length;

		if ( (length > limit) ) {

			alert(\'Your message is too long ( \' + length + \' chars ), please shorten it to less than \' + limit + \' characters.\');

		} else {

			alert(\'You are currently using \' + length + \' characters. Maximum allowable amount should not exceed \' + limit);

		}

	}
	</script>
	<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
	<form method=\"POST\" action=\"<sys:gate>?a=post&amp;CODE=00\" name=\"REPLIER\">
		<a name=\"qwik\"></a>
		<div class=\"formwrap\">
			<h3><lang:qwik_title></h3>
			<p class=\"checkwrap\"><lang:qwik_form_tip></p>
			<h3><lang:qwik_form_field_title></h3>
			<h4><lang:qwik_form_field_title_field></h4>
			<input type=\"text\" name=\"title\" />
			<h3><lang:qwik_form_field_body></h3>
			<h4><lang:qwik_form_field_body_tip> ( <a href=\"javascript:smilie_window(\'<sys:gate>\')\" title=\"View emoticon choices\"><lang:qwik_form_link_emoticons></a> &middot; <a href=\"javascript:check_length()\" title=\"Check the length of your topic\"><lang:qwik_form_link_length></a> )</h4>
			<textarea name=\"body\" rows=\"\" cols=\"\"></textarea>
			<p class=\"submit\">
				<input class=\"button\" type=\"submit\" value=\"<lang:qwik_form_button_post>\" />&nbsp;
				<input class=\"reset\" type=\"reset\" value=\"<lang:qwik_form_button_reset>\" />
			</p>
			<input type=\"hidden\" name=\"cOption\" value=\"1\" />
			<input type=\"hidden\" name=\"eOption\" value=\"1\" />
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
			<input type=\"hidden\" name=\"subject\" value=\"\" />
			<input type=\"hidden\" name=\"forum\" value=\"{\$this->_forum}\" />
		</div>
	</form>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'logon', 'form_pass_retrieve_1', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:form_retrieve_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=04\">
	<div class=\"formwrap\">
		<h3><lang:form_retrieve_title></h3>
		<p class=\"checkwrap\"><lang:form_retrieve_tip></p>
		<h3><lang:form_retrieve_field_email></h3>
		<h4><lang:form_retrieve_field_email_tip></h4>
		<input type=\'text\' name=\'email\' tabindex=\'1\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:form_retrieve_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_retrieve_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_note_notify', 'Hello, {\$row[\'members_name\']}

<user:members_name>, from <conf:title> ( <conf:site_link> ), has just sent you a new personal note.
If you wish to read it, click the link below to go straight to your notes index:	

<conf:site_link><sys:gate>?a=notes

If you do not wish to recieve notifications any longer be sure to turn this feature off within your
personal control panel which can be found through the link above.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_subscribe_topic_notice', 'Hello {\$row[\'members_name\']},

{\$row[\'topics_last_poster_name\']}, from <conf:title> ( <conf:site_link> ), has just posted a reply
to a topic you have subscribed to. You may follow the link below to read this post:

<conf:site_link><sys:gate>?gettopic={\$this->_id}&p={\$page}#{\$post}

If you do not wish to recieve subscription notices any longer you may turn this feature 
off within your personal control panel. To do this you may access your UCP through the 
above link.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'help', 'title_row', '<li><a href=\"#{\$count}\" title=\"{\$row[\'help_title\']}\">{\$row[\'help_title\']}</a></li>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'logon', 'form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:form_logon_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:form_logon_title></h3>
		<p class=\"checkwrap\"><lang:form_logon_tip></p>
		<h3><lang:sys_err_option_title></h3>
		<ul>
			<li><a href=\"<sys:gate>?a=register\" title=\"\"><lang:sys_err_option_reg></a></li>
			<li><a href=\"<sys:gate>?a=logon&amp;CODE=03\" title=\"\"><lang:sys_err_option_rec></a></li>
			<li><a href=\"<sys:gate>?a=help\" title=\"\"><lang:sys_err_option_doc></a></li>
		</ul>
		<h3><lang:form_logon_field_username></h3>
		<h4><lang:form_logon_field_username_tip></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:form_logon_field_password></h3>
		<h4><lang:form_logon_field_password_tip></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:form_logon_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_logon_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'help', 'container_help', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:help_crumb_title>
</div>
<div class=\"infowrap\">
    <h1><lang:help_title></h1>
    <h2><lang:help_tip></h2>
    <ul>
        {\$titles}
    </ul>
</div>
{\$entries}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'help', 'content_row', '<div class=\"infowrap\">
	<a name=\"{\$count}\"></a>
	<h3>{\$count}. {\$row[\'help_title\']}</h3>
	<p>{\$row[\'help_content\']}</p>
	<p class=\"top\"><a href=\"javascript:scroll(0,0);\" title=\"<lang:link_top_title>\"><lang:link_top></a></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_footer', '
----------------------------------------------------------------
<lang:mailer_footer> MyTopix | Personal Message Board {\$this->config[\'version\']}.  http://www.jaia-interactive.com');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_wrapper', '			<div id=\"wrap\">
				<h1 id=\"logo\"><a href=\"<sys:gate>?a=main\" title=\"<lang:logo_alt>\">MyTopix</a></h1>
				<ul id=\"top_nav\">
					<li><a href=\"<conf:site_link><sys:gate>?a=members\" title=\"\"><lang:uni_tab_members></a></li>
					<li><a href=\"<conf:site_link><sys:gate>?a=search\" title=\"\"><lang:uni_tab_search></a></li>
					<li><a href=\"<conf:site_link><sys:gate>?a=calendar\" title=\"\"><lang:uni_tab_calendar></a></li>
				</ul>
				{\$this->welcome}
				{\$content}
				<p id=\"copyright\">Powered By: <strong>MyTopix <conf:version></strong><br />Copyright &copy;2004 - 2007,  <a href=\"http://www.jaia-interactive.com/\" title=\"<lang:visit_jaia>\">Jaia Interactive</a> all rights reserved.</p>
			</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_header', '{\$who} <lang:mailer_header> {\$sent}:
----------------------------------------------------------------

');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_member', '<div class=\"welcome\">
	<p class=\"shaft\"><a href=\"<sys:gate>?a=ucp\" title=\"<lang:welcome_control_title>\"><strong><lang:welcome_profile></strong></a> &middot; <a href=\"<sys:gate>?a=search&amp;CODE=03\" title=\"<lang:welcome_latest_title>\"><lang:welcome_latest></a> &middot; <a href=\"<sys:gate>?a=notes\" title=\"<lang:welcome_inbox_title>\"><lang:welcome_messages> (<user:members_newNotes>)</a></p>
	<p><lang:welcome_back>, <a href=\"<sys:gate>?getuser=<user:members_id>\" title=\"<lang:welcome_profile_title>\"><strong><user:members_name></strong></a>! (<a href=\"<sys:gate>?a=logon&CODE=02\" title=\"<lang:welcome_logout_title>\"><lang:welcome_logout></a>)</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_disabled', '<div class=\"welcome\">
        <p class=\"shaft\">&nbsp;</p>
	<p><lang:welcome_disabled></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_guest', '<div class=\"welcome\">
	<p class=\"shaft\"><a href=\"<sys:gate>?a=register&amp;CODE=03\" title=\"\"><lang:welcome_resend_validation></a></p>
	<p><lang:welcome_guest>, <user:members_name>! (<a href=\"<sys:gate>?a=register\" title=\"\"><lang:welcome_register></a> &middot; <a href=\"<sys:gate>?a=logon\" title=\"\"><lang:welcome_logon></a>)</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_message_level_1', '<div id=\"messenger\">
	<h2><lang:messenger_title>:</h2>
	<p>{\$message}</p>
	<h4>(<a href=\"{\$link}\" title=\"<lang:messenger_forward>\"><lang:messenger_forward></a>)</h4>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_admin', '<div class=\"welcome\">
	<p class=\"shaft\"><a href=\"<sys:gate>?a=ucp\" title=\"<lang:welcome_control_title>\"><strong><lang:welcome_profile></strong></a> &middot; <a href=\"<sys:gate>?a=search&amp;CODE=03\" title=\"<lang:welcome_latest_title>\"><lang:welcome_latest></a> &middot; <a href=\"<sys:gate>?a=notes\" title=\"<lang:welcome_inbox_title>\"><lang:welcome_messages> (<user:members_newNotes>)</a> &middot; <a href=\"<conf:site_link>admin/\" title=\"<lang:welcome_admin_title>\"><lang:welcome_link_admin></a></p>
	<p><lang:welcome_back>, <a href=\"<sys:gate>?getuser=<user:members_id>\" title=\"<lang:welcome_profile_title>\"><strong><user:members_name></strong></a>! (<a href=\"<sys:gate>?a=logon&CODE=02\" title=\"<lang:welcome_logout_title>\"><lang:welcome_logout></a>)</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_body', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<!-- Powered By: <conf:application> <conf:version> -->
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en\" xml:lang=\"en\"  dir=\"<lang:text_direction>\">
	<head>
		<title><conf:forum_title> - <lang:powered_by> <conf:application></title>
		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
		<meta name=\"generator\" content=\"editplus\" />
		<meta name=\"author\" content=\"Daniel Wilhelm II Murdoch, wilhelm@jaia-interactive.com, http://www.jaia-interactive.com\" />
		<meta name=\"keywords\" content=\"<conf:application> <conf:version>\" />
		<meta name=\"description\" content=\"\" />
		<script src=\"<sys:skinPath>/js/main.js\" type=\"text/javascript\"></script>
		<link href=\"<sys:skinPath>/styles.css\" rel=\"stylesheet\" type=\"text/css\" title=\"default\" />
	</head>
	<body>
	{\$content}
	</body>
</html>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_board_closed', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:global_board_closed></h3>
		<div id=\"warning\">
			<h3><lang:err_warn_title></h3>
			<p><strong><conf:closed_message></strong></p>
		</div>
		<h3><lang:closed_form_name_title></h3>
		<h4><lang:closed_form_name_title_info></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:closed_form_pass_title></h3>
		<h4><lang:closed_form_pass_title_info></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:closed_form_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:closed_form_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'active', 'active_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:location_active>
</div>
<div class=\"bar\">{\$pages}</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"4\"><lang:active_title></td>
		</tr>
		<tr>
			<th align=\"left\" width=\"15%\"><lang:col_name></td>
			<th align=\"left\" width=\"25%\"><lang:col_location></td>
			<th align=\"center\" width=\"25%\"><lang:col_last_seen></td>
			<th align=\"center\" width=\"10%\"><lang:col_note></td>
		</tr>
		{\$list}
	</table>
</div>
<div class=\"bar\">{\$pages}</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'active', 'active_row', '		<tr>
			<td class=\"cellone\" align=\"left\">{\$row[\'active_user\']} {\$row[\'active_ip\']}</td>
			<td class=\"celltwo\" align=\"left\">{\$row[\'active_location\']}</td>
			<td class=\"cellone\" align=\"center\">{\$row[\'active_time\']}</td>
			<td class=\"celltwo\" align=\"center\">{\$row[\'active_notes\']}</td>
		</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_message_level_2', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <lang:sys_bread_title>
</div>
<div class=\"formwrap\">
	<h3><lang:sys_err_title></h3>
	<h4><lang:sys_err_desc></h4>
	<div id=\"warning\">
		<h3><lang:err_warn_title></h3>
		<p><strong>{\$message}</strong></p>
	</div>
	<h3><lang:sys_err_option_title></h3>
	<ul>
		<li><a href=\"<sys:gate>?a=register\" title=\"\"><lang:sys_err_option_reg></a></li>
		<li><a href=\"<sys:gate>?a=logon&amp;CODE=03\" title=\"\"><lang:sys_err_option_rec></a></li>
		<li><a href=\"<sys:gate>?a=help\" title=\"\"><lang:sys_err_option_doc></a></li>
	</ul>
</div>
{\$logon_form}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_message_level_2_logon', '<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:sys_log_name_title></h3>
		<h4><lang:sys_log_name_desc></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:sys_log_pass_title></h3>
		<h4><lang:sys_log_pass_desc></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:form_logon_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_logon_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		<input type=\"hidden\" name=\"referer\" value=\"{\$referer}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'register', 'form_coppa_field', '		<p class=\"checkwarn\"><input class=\"check\" type=\"checkbox\" name=\"coppa\" {\$coppa} /> <strong><lang:field_coppa_agree></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_admin_user_name', 'Hello, {\$member[\'members_name\']}

This message is to inform you that your user name for <conf:title> ( <conf:site_link> )
has been modified. Below you will find your new user name:

Username: {\$name}

Log into your account through the link below:
<conf:site_link><sys:gate>?a=logon');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_field_attach', '		<h3><lang:attach_title></h3>
		<h4>{\$size_lang}</h4>
		<p class=\"checkwrap\"><input type=\"file\" name=\"upload\" /></p>');";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'wtf.gif', ':wtf:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'wink.gif', ';)', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'huh.gif', ':huh:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'up.gif', ':up:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'tongue.gif', ':P', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'stare.gif', ':|', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'squint.gif', '>_<', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'smile.gif', ':)', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'sick.gif', ':sick:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'shock.gif', ':o', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'shame.gif', ':shame:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'scared.gif', ':scared:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'sad.gif', ':(', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'rolleyes.gif', ':rolleyes:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'right.gif', ':right:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'rage.gif', ':rage:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'point.gif', ':point:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'nerd.gif', ':nerd:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'lup.gif', ':lup:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'left.gif', ':left:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'ldown.gif', ':ldown:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'laugh.gif', ':laugh:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'joy.gif', ':joy:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'angry.gif', ':angry:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'happy.gif', ':happy:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'grin.gif', ':D', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'glare.gif', ':glare:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'evil.gif', ':evil:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'down.gif', ':down:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'dead.gif', ':dead:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'crazy.gif', ':crazy:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'cool.gif', ':cool:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'booyah.gif', ':booyah:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'blank.gif', ':blank:', 1);";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Newcomer', 0, 1, 'pip_blue.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Common Folk', 25, 3, 'pip_poop.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'MyTopix™ Enthusiast', 100, 4, 'pip_purple.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Needs a Life', 500, 6, 'pip_red.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Post Meister', 1000, 8, 'pip_green.gif', {$dir});";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_announce_old', '<img src=\"{%SKIN%}/post_announce_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'txt_online_sep', ',&nbsp;', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_announce_new', '<img src=\"{%SKIN%}/post_announce_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'txt_bread_sep', '/', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_email', '<img src=\"{%SKIN%}/btn_email.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_go', '<input type=\"image\" src=\"{%SKIN%}/btn_go.gif\" width=\"23px\" height=\"23px\" class=\"small_button\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_prefix', '<img src=\"{%SKIN%}/topic_prefix.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_note_reply', '<img src=\"{%SKIN%}/reply_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_online', '<img src=\"{%SKIN%}/btn_online.gif\" alt=\"\" title=\"\" />&nbsp;', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_pin_old', '<img src=\"{%SKIN%}/post_pinned_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_pin_new', '<img src=\"{%SKIN%}/post_pinned_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_offline', '<img src=\"{%SKIN%}/btn_offline.gif\" alt=\"\" title=\"\" />&nbsp;', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_new_dot', '<img src=\"{%SKIN%}/post_open_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_old_dot', '<img src=\"{%SKIN%}/post_open_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_old', '<img src=\"{%SKIN%}/post_open_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_new', '<img src=\"{%SKIN%}/post_open_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_moved', '<img src=\"{%SKIN%}/post_moved.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_old', '<img src=\"{%SKIN%}/post_locked_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_old_dot', '<img src=\"{%SKIN%}/post_locked_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_new_dot', '<img src=\"{%SKIN%}/post_locked_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_new', '<img src=\"{%SKIN%}/post_locked_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_old_dot', '<img src=\"{%SKIN%}/post_hot_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_old', '<img src=\"{%SKIN%}/post_hot_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_new_dot', '<img src=\"{%SKIN%}/post_hot_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_new', '<img src=\"{%SKIN%}/post_hot_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_post_quote', '<img src=\"{%SKIN%}/post_quote.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_post_edit', '<img src=\"{%SKIN%}/post_edit.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_post_delete', '<img src=\"{%SKIN%}/post_delete.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_mini_pages', '<img src=\"{%SKIN%}/pages.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_note_unread', '<img src=\"{%SKIN%}/note_unread.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_note_read', '<img src=\"{%SKIN%}/note_read.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_mini_box', '<img src=\"{%SKIN%}/mini_box.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_reply', '<img src=\"{%SKIN%}/main_reply.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_qtopic', '<img src=\"{%SKIN%}/main_qtopic.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_qreply', '<img src=\"{%SKIN%}/main_qreply.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_new', '<img src=\"{%SKIN%}/main_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_locked', '<img src=\"{%SKIN%}/main_locked.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_delete_note', '<img src=\"{%SKIN%}/delete_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_subs_old', '<img src=\"{%SKIN%}/cat_subs_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_subs_new', '<img src=\"{%SKIN%}/cat_subs_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_redirect', '<img src=\"{%SKIN%}/cat_red.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_old', '<img src=\"{%SKIN%}/cat_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_new', '<img src=\"{%SKIN%}/cat_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_archived', '<img src=\"{%SKIN%}/cat_archived.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_yim', '<img src=\"{%SKIN%}/btn_yim.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_profile', '<img src=\"{%SKIN%}/btn_profile.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_note', '<img src=\"{%SKIN%}/btn_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_msn', '<img src=\"{%SKIN%}/btn_msn.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_icq', '<img src=\"{%SKIN%}/btn_icq.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_homepage', '<img src=\"{%SKIN%}/btn_homepage.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_aim', '<img src=\"{%SKIN%}/btn_aim.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_go', '<img src=\"{%SKIN%}/btn_go.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_new', '<img src=\"{%SKIN%}/post_poll_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_new_dot', '<img src=\"{%SKIN%}/post_poll_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_old_dot', '<img src=\"{%SKIN%}/post_poll_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_old', '<img src=\"{%SKIN%}/post_poll_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_note_send', '<img src=\"{%SKIN%}/send_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_add_event', '<img src=\"{%SKIN%}/main_event.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_poll', '<img src=\"{%SKIN%}/main_poll.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_clip', '&nbsp;<img src=\"{%SKIN%}/topic_attach_prefix.gif\" alt=\"\" title=\"\" />', 0);";
?><?php
$temps  = array();
$emots  = array();
$titles = array();
$macros = array();
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_attach', '<p class=\"attach\">
	<a href=\"<sys:gate>?a=misc&amp;CODE=01&amp;id={\$row[\'upload_id\']}\" title=\"\">{\$row[\'upload_name\']}</a> <strong><lang:attach_size></strong> {\$row[\'upload_size\']} <strong><lang:attach_hits></strong> {\$row[\'upload_hits\']}
</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_coppa', 'In compliance with the COPPA act your account is currently inactive.

Please print this message out and have your parent or guardian sign and date it. 
Then fax it to:

<conf:coppa_fax>

OR mail it to:

<conf:coppa_mail>

------------------------------ CUT HERE ------------------------------
Permission to Participate at <conf:title> ( <conf:site_link> )

Username: {\$username}
Password: {\$password}
Email:    {\$email}

I HAVE REVIEWED THE INFORMATION PROVIDED BY MY CHILD AND HEREBY GRANT PERMISSION 
TO <conf:title> TO STORE THIS INFORMATION. I UNDERSTAND THIS INFORMATION CAN BE 
CHANGED AT ANY TIME BY ENTERING A PASSWORD. I UNDERSTAND THAT I MAY REQUEST FOR 
THIS INFORMATION TO BE REMOVED FROM <conf:title> AT ANY TIME.


Parent or Guardian: ____________________________
                       (print full name here)
Full Signature:     ____________________________

Today\'s Date:       ____________________________

------------------------------ CUT HERE ------------------------------


Once the administrator has received the above form via fax or regular mail your 
account will be activated.

Please do not forget your password as it has been encrypted in our database and 
we cannot retrieve it for you. However, should you forget your password you can 
request a new one which will be activated in the same way as this account.

Thank you for registering.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'form_error_wrapper', '<div id=\"warning\">
<h3><lang:err_wrap_title></h3>
<p><strong><lang:err_wrap_desc></strong></p>
<ul>{\$err_list}</ul>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_files_none', '<tr>
	<td colspan=\"7\" align=\"center\"><strong><lang:file_none></strong></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_files_row', '<tr>
	<td class=\"one\" align=\"center\"><strong>{\$row[\'upload_id\']}</strong></td>
	<td><a href=\"<sys:gate>?a=misc&amp;CODE=01&amp;id={\$row[\'upload_id\']}\" title=\"\">{\$row[\'upload_name\']}</a></td>
	<td class=\"one\"><a href=\"<sys:gate>?a=read&amp;CODE=02&amp;p={\$row[\'upload_post\']}\" title=\"\">{\$row[\'topics_title\']}</a></td>
	<td align=\"center\">{\$row[\'upload_date\']}</td>
	<td class=\"one\" align=\"center\">{\$row[\'upload_size\']}</td>
	<td align=\"center\">{\$row[\'upload_hits\']}</td>
	<td class=\"one\" align=\"center\"><a href=\"<sys:gate>?a=ucp&amp;CODE=18&amp;id={\$row[\'upload_id\']}\" title=\"\" onclick=\"javascript: return confirm(\'<lang:file_link_del_conf>\');\"><lang:file_link_del></a></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_new_note', '<div id=\"message_alert\">
	<h3><lang:note_title></h3>
	<p><a href=\"<sys:gate>?getuser={\$note[\'members_id\']}\" title=\"\">{\$note[\'members_name\']}</a> <lang:note_desc> <a href=\"<sys:gate>?a=notes&amp;CODE=01&amp;nid={\$note[\'notes_id\']}\" title=\"\">{\$note[\'notes_title\']}</a>!</p>
</div>
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'mod_poll_option_row', '		<input type=\"text\" name=\"choice[{\$val[\'id\']}]\" style=\"width: 60%;\" tabindex=\"2\" value=\"{\$val[\'choice\']}\" /><input type=\"text\" name=\"votes[{\$val[\'id\']}]\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$val[\'votes\']}\" /><br />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'attach_rem_field', '<p class=\"checkwarn\"><input type=\"checkbox\" class=\"check\" name=\"remove_attach\" value=\"1\"  />&nbsp;<lang:attach_rem>&nbsp;( <a href=\"<sys:gate>?a=misc&amp;CODE=01&amp;id={\$file_id}\">{\$file_name}</a> )</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'mod_poll_wrapper', '		<h3><lang:mod_poll_editor_title></h3>
		<h4><lang:mod_poll_editor_desc></h4>
		<input type=\"text\" name=\"poll_title\" tabindex=\"1\" value=\"{\$poll[\'poll_question\']}\" />
		<h3><lang:poll_choice_title></h3>
		<h4><lang:poll_choice_desc></h4>
		{\$choices}
		<h3><lang:poll_expire_title></h3>
		<h4><lang:poll_expire_desc></h4>
		<input type=\"text\" name=\"days\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$days}\" />
		<h3><lang:poll_lock_title></h3>
		<h4><lang:poll_lock_desc></h4>
		<input type=\"text\" name=\"vote_lock\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$poll[\'poll_vote_lock\']}\" />
		<h3><lang:poll_options_title></h3>
		<h4><lang:poll_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"poll_only\" value=\"1\" tabindex=\"3\" {\$poll_only} /> <lang:poll_lock_option></p>
		<p class=\"checkwarn\"><input type=\"checkbox\" class=\"check\" name=\"remove\" value=\"1\" tabindex=\"3\" /> <lang:poll_delete></p>
		<input type=\"hidden\" name=\"poll\" value=\"{\$poll[\'poll_id\']}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_result_wrapper', '<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"2\">{\$poll[\'poll_question\']}</td>
		</tr>
		<tr>
			<th width=\"50%\"><lang:poll_tbl_header_choice></th>
			<th><lang:poll_tbl_header_result></th>
		</tr>
			{\$poll_list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_poll_choice_row', '<tr>
	<td class=\"cellone np\"><p class=\"checkwrap\"><input type=\"radio\" name=\"vote\" class=\"check\" id=\"choice_{\$val[\'id\']}\" value=\"{\$val[\'id\']}\" />&nbsp;<label for=\"choice_{\$val[\'id\']}\"><strong>{\$val[\'choice\']}</strong></label></p></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_poll_result_row', '<tr>
	<td class=\"cellone\"><strong>{\$val[\'choice\']}</strong></td>
	<td class=\"cellone\" align=\"right\"><img src=\"<sys:skinPath>/bar_left.gif\" alt=\"\" /><img src=\"<sys:skinPath>/bar_center.gif\" alt=\"\" width=\"{\$width}\" height=\"17px\" /><img src=\"<sys:skinPath>/bar_right.gif\" alt=\"\" /><br />{\$percent}% ( {\$val[\'votes\']} votes ) --
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_option_poll', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"poll\" value=\"1\" {\$poll_check} /> <lang:post_options_poll></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_choice_wrapper', '<form method=\"post\" action=\"<sys:gate>?a=read&amp;CODE=05&amp;t={\$this->_id}\">
	<div class=\"maintable\">
		<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
			<tr>
				<td class=\"header\">{\$poll[\'poll_question\']}</td>
			</tr>
			<tr>
				<th>&nbsp;</th>
			</tr>
				{\$poll_list}
		</table>
	</div>
<p class=\"submit\"><input type=\"button\" value=\"<lang:poll_submit_add>\" style=\"width: auto;\" /></p>
	<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_attach_poll', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / <a href=\"<sys:gate>?gettopic={\$this->_id}\" title=\"\">{\$topic[\'topics_title\']}</a> / <lang:poll_bread_title>
</div>
{\$error_list}
<form method=\"POST\" action=\"<sys:gate>?a=post&amp;CODE=08&amp;t={\$this->_id}\">
	<div class=\"formwrap\">
		<h3><lang:poll_title_title></h3>
		<h4><lang:poll_title_desc></h4>
		<input type=\"text\" name=\"title\" tabindex=\"1\" value=\"{\$title}\" />
		<h3><lang:poll_choice_title></h3>
		<h4><lang:poll_choice_desc></h4>
		<textarea name=\"choices\" tabindex=\"1\">{\$choices}</textarea>
		<h3><lang:poll_expire_title></h3>
		<h4><lang:poll_expire_desc></h4>
		<input type=\"text\" name=\"days\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$days}\" />
		<h3><lang:poll_lock_title></h3>
		<h4><lang:poll_lock_desc></h4>
		<input type=\"text\" name=\"vote_lock\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$vote_lock}\" />
		<h3><lang:poll_options_title></h3>
		<h4><lang:poll_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"poll_only\" value=\"1\" tabindex=\"3\" {\$poll_only} /> <strong><lang:poll_lock_option></strong></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:poll_button_submit>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:poll_button_reset>\" /></p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_edit_event_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=calendar\" title=\"\"><lang:bread_title_two></a> / <a href=\"<sys:gate>?getevent={\$this->_id}\" title=\"\">{\$row[\'event_title\']}</a> / <lang:edit_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}
}
</script>
<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
<a name=\"qwiknote\"></a>
<form method=\"POST\" action=\"<sys:gate>?a=calendar&amp;CODE=06&amp;id={\$this->_id}\" name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:form_add_type_title></h3>
		<h4><lang:form_add_type_desc></h4>
		<p class=\"checkwrap\">
			<strong><lang:form_start_date_on></strong>&nbsp;
			<select name=\"start_month\">{\$start_months}</select>&nbsp;
			<select name=\"start_day\">{\$start_days}</select>&nbsp;
			<select name=\"start_year\">{\$start_years}</select>
		</p>
		<p class=\"checkwrap\">
			<strong><lang:form_loop_every> </strong>&nbsp;
			<select name=\"loop_type\">{\$loop_types}</select>&nbsp;<strong><lang:form_loop_until></strong>&nbsp;
			<select name=\"end_month\">{\$end_months}</select>&nbsp;
			<select name=\"end_day\">{\$end_days}</select>&nbsp;
			<select name=\"end_year\">{\$end_years}</select>
		</p>
		{\$groups}
		<h3><lang:form_add_title_title></h3>
		<h4><lang:form_add_title_desc></h4>
		<input type=\'text\' name=\'title\' tabindex=\'1\' value=\"{\$title}\">
		{\$bbcode}
		<h3><lang:form_emoticon_title></h3>
		<h4><lang:form_emoticon_desc></h4>
		{\$emoticons}
		<h3><lang:form_body_title></h3>
		<h4><lang:form_body_desc> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:form_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:form_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:form_link_length></a> )</h4>
		<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
		<h3><lang:form_options_title></h3>
		<h4><lang:form_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" {\$code_check} /> <lang:form_code_desc></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" {\$emo_check} /> <lang:form_emo_desc></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:form_button_update>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:form_button_reset>\" /></p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_month_event', '<p>{\$event}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_read_event', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=calendar\" title=\"\"><lang:bread_title_two></a> / <lang:bread_title_read> {\$row[\'event_title\']}
</div>
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=calendar&CODE=02\" title=\"\"><macro:btn_add_event></a>
</div>
<div class=\"postwrap\">
	<div class=\"postheader\">{\$row[\'event_title\']} <em>( {\$type} )</em></div>
	<div class=\"user\">
		<p><a href=\"<sys:gate>?getuser={\$row[\'members_id\']}\" title=\"<lang:entry_link_profile>\"><strong>{\$row[\'members_name\']}</strong></a> <em>( <a href=\"<sys:gate>?a=search&CODE=02&mid={\$row[\'members_id\']}\" title=\"<lang:entry_post_find> {\$row[\'members_name\']}\">{\$row[\'members_posts\']}</a> )</em>
		<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span>
		<span><strong>&middot; <lang:entry_rank></strong> {\$row[\'members_pips\']}</span></p>
		{\$avatar}
	</div>
	<div class=\"post\">
		<h5><span>{\$link_delete}&nbsp;{\$link_edit}</span><strong><lang:event_started></strong> {\$date_starts} <strong><lang:event_ends></strong> {\$date_ends}</h5>
		<p>{\$row[\'event_body\']}</p>{\$sig}
	</div>
	<div class=\"foot\">
		<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:read_link_top_title>.\"><lang:read_link_top></a></span>
		<ul class=\"extras\">{\$active}{\$linkSpan}</ul>
	</div>
	<div class=\"postend\">&nbsp;</div>
</div>
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=calendar&CODE=02\" title=\"\"><macro:btn_add_event></a>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_group_list', '		<h3><lang:form_groups_title></h3>
		<h4><lang:form_groups_desc></h4>
		<p class=\"checkwrap\"><select name=\"groups[]\" size=\"5\" multiple=\"multiple\" style=\"width: 200px;\" class=\"jump\">{\$group_list}</select></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_new_event_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=calendar\" title=\"\"><lang:bread_title_two></a> / <lang:add_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}
}
</script>
<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
<a name=\"qwiknote\"></a>
<form method=\"POST\" action=\"<sys:gate>?a=calendar&amp;CODE=03\" name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:form_add_type_title></h3>
		<h4><lang:form_add_type_desc></h4>
		<p class=\"checkwrap\">
			<strong><lang:form_start_date_on> </strong>&nbsp;
			<select name=\"start_month\">{\$start_months}</select>&nbsp;
			<select name=\"start_day\">{\$start_days}</select>&nbsp;
			<select name=\"start_year\">{\$start_years}</select>
		</p>
		<p class=\"checkwrap\">
			<strong><lang:form_loop_every> </strong>&nbsp;
			<select name=\"loop_type\">{\$loop_types}</select>&nbsp;<strong><lang:form_loop_until></strong>&nbsp;
			<select name=\"end_month\">{\$end_months}</select>&nbsp;
			<select name=\"end_day\">{\$end_days}</select>&nbsp;
			<select name=\"end_year\">{\$end_years}</select>
		</p>
		{\$groups}
		<h3><lang:form_add_title_title></h3>
		<h4><lang:form_add_title_desc></h4>
		<input type=\'text\' name=\'title\' tabindex=\'1\' value=\"{\$title}\" />
		{\$bbcode}
		<h3><lang:form_emoticon_title></h3>
		<h4><lang:form_emoticon_desc></h4>
		{\$emoticons}
		<h3><lang:form_body_title></h3>
		<h4><lang:form_body_desc> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:form_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:form_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:form_link_length></a> )</h4>
		<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
		<h3><lang:form_options_title></h3>
		<h4><lang:form_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" checked=\"checked\" /> <lang:form_code_desc></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" checked=\"checked\" /> <lang:form_emo_desc></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:form_button_submit>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:form_button_reset>\" /></p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_blank_row', '<td class=\"{\$class}\">&nbsp;</td>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_date_row', '<td class=\"{\$class}\"><h4>{\$day}</h4><div class=\"events\">{\$events}</div></td>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_month_wrapper', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:bread_title> {\$lit_month}, {\$lit_year}
</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"2\" align=\"left\"><a href=\"<sys:gate>?a=calendar{\$link_prev}\" title=\"\">« {\$link_prev_lit_month}, {\$link_prev_lit_year}</a></td>
			<td class=\"header\" colspan=\"3\" align=\"center\">{\$lit_month}, {\$lit_year}</td>
			<td class=\"header\" colspan=\"2\" align=\"right\"><a href=\"<sys:gate>?a=calendar{\$link_next}\" title=\"\">{\$link_next_lit_month}, {\$link_next_lit_year} »</a></td>
		</tr>
		<tr>
			<th width=\"14%\" align=\"center\"><lang:lit_day_one></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_two></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_three></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_four></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_five></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_six></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_seven></th>
		</tr>
			{\$day_list}
	</table>
</div>
<div class=\"postbutton\"><a href=\"<sys:gate>?a=calendar&amp;CODE=02\" title=\"\"><macro:btn_add_event></a>
</div>
<form method=\"post\" action=\"<sys:gate>?a=calendar\">
<div class=\"formwrap\"><p class=\"sort\">
					<select name=\"month\" class=\"jump\">{\$months}</select>
					<select name=\"year\" class=\"jump\">{\$years}</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"go\" /></p>
</div>
				</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_avatar_row', '<td align=\"center\">
	<label for=\"{\$val}\"><img src=\"<sys:sys_path>sys_images/ava_gallery/{\$gallery}/{\$val}\" alt=\"{\$val}\" /><br />
	<strong>{\$val}</strong></label><br /><input type=\"radio\" class=\"check\" name=\"avatar\" value=\"{\$val}\" id=\"{\$val}\" />
</td>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_avatar_gallery_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:ava_gallery_form_title></h3>
	<p class=\"checkwrap\"><lang:ava_tip></p>
	<h3><lang:ava_gallery_title></h3>
	<h4><lang:ava_gallery_tip></h4>
	<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=15\">
		<p class=\"checkwrap\">
			<select name=\"gallery\" class=\"jump\">
				{\$gallery_list}
			</select>
		</p>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:ava_gallery_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</form>
	<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=16\">
		<div id=\"maintable\">
			<table cellpadding=\"15\" cellspacing=\"1\" width=\"100%\">
				{\$avatar_rows}
			</table>
		</div>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:ava_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		<input type=\"hidden\" name=\"gallery\" value=\"{\$gallery}\" />
	</form>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sub_forum_row', '		<tr>
			<td align=\"center\" class=\"one\" width=\"1%\"><macro:icon_open_new></td>
			<td><a href=\"<sys:gate>?getforum={\$row[\'forum_id\']}\" title=\"\"><strong>{\$row[\'forum_name\']}</strong></a></td>
			<td align=\"center\" class=\"one\">{\$row[\'track_date\']}</td>
			<td align=\"center\"><a href=\"<sys:gate>?a=ucp&amp;CODE=13&amp;forum={\$row[\'forum_id\']}\" title=\"\"><strong><lang:sub_delete></strong></a></td>
		</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_stats', '<div class=\"infowrap\">
	<h1><lang:stat_title>:</h1>
	<h2><lang:stat_tip></h2>
	<p><lang:stat_totals><br />
	<lang:stat_newest><br />
	<lang:stat_online></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_announce', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"announce\" value=\"1\" {\$check[\'announce\']} /> <strong><lang:post_mod_options_announce></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_avatar_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:ava_title></h3>
	<p class=\"checkwrap\"><lang:ava_tip></p>
	<h4><strong><lang:ava_current></strong><br /> {\$avatar}</h4>
	<h4><lang:ava_ext> {\$ext}</h4>
</div>
<div class=\"formwrap\">
	<h3><lang:ava_gallery_title></h3>
	<h4><lang:ava_gallery_tip></h4>
	<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=15\">
		<p class=\"checkwrap\">
			<select name=\"gallery\" class=\"jump\">
				{\$gallery_list}
			</select>
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		</p>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:ava_gallery_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</form>
</div>
<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=17\" enctype=\'multipart/form-data\'>
	<div class=\"formwrap\">
		<h3><lang:ava_url_title></h3>
		<h4><lang:ava_url_tip></h4>
		<input type=\"text\" name=\"url\" value=\"{\$url}\" />
	</div>
	<div class=\"formwrap\">
		<h3><lang:ava_upload_title></h3>
		<h4><lang:ava_upload_tip></h4>
		<input type=\"file\" name=\"upload\" />
	</div>
	<div class=\"formwrap\">
		<h3><lang:ava_remove_title></h3>
		<p class=\"checkwarn\"><input type=\"checkbox\" class=\"check\" name=\"remove\" value=\"1\" /> <strong><lang:ava_remove_warn></strong></p>
		<p class=\"submit\">
		<input class=\"button\" type=\"submit\" value=\"<lang:ava_submit>\" />&nbsp;
		<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_jump_list', '	<form method=\"post\" action=\"<sys:gate>?a=topics\">
		<p class=\"sort\"><select name=\"forum\" class=\"jump\">
			{\$jump_list}
		</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:forum_jump>\" /></p>
	</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_mod_list', '	<form method=\"post\" action=\"<sys:gate>?a=mod&amp;t={\$this->_id}\" class=\"shaft\">
		<p class=\"sort\"><select name=\"CODE\" class=\"jump\">
			{\$mod_list}
		</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:mod_list>\" /></p>
		<input type=\"hidden\"  name=\"hash\" value=\"{\$hash}\" />
	</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topics_active', '<div class=\"infowrap\">
	<h1><lang:viewers_title></h1>
	<h2><lang:viewers_user_summary> ( <a href=\"<sys:gate>?a=active\" title=\"\"><lang:active_link_details></a> )</h2>
	<p>{\$list}</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_mod_wrapper', '<p class=\"moderator_list\"><em><lang:mod_label></em> {\$mod_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_sub_wrapper', '<p class=\"subforum_list\">{\$sub_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_mod_wrapper', '<p class=\"moderator_list\"><em><lang:mod_label></em> {\$mod_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_sub_wrapper', '<p class=\"subforum_list\">{\$sub_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_subscribe_forum_notice', 'Hello {\$row[\'members_name\']},

{\$topic[\'topics_last_poster_name\']}, from <conf:title> ( <conf:site_link> ), has just posted a reply
to a forum you have subscribed to ( {\$row[\'forum_name\']} ). You may follow the link below to 
read this topic:

<conf:site_link><sys:gate>?gettopic={\$topic[\'topics_id\']}

If you do not wish to receive subscription notices any longer you may turn this feature 
off within your personal control panel. To do this you may access your UCP through the 
above link.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_subs', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:sub_title></h3>
	<p class=\"checkwrap\"><lang:sub_tip></p>
	<h3><lang:sub_topics_title></h3>
	<h4><lang:sub_topics_desc></h4>
	<table class=\"ucp_table\" cellpadding=\"3\" cellspacing=\"1\">
		{\$topics}
	</table>
	<h3><lang:sub_forums_title></h3>
	<h4><lang:sub_forums_desc></h4>
	<table class=\"ucp_table\" cellpadding=\"3\" cellspacing=\"1\">
		{\$forums}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_field_subject', '		<h3><lang:post_field_subject></h3>
		<h4><lang:post_field_subject_tip></h4>
		<input type=\"text\" name=\"subject\" tabindex=\"1\" value=\"{\$subject}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_last_post', '	<span class=\"lastpost\">{\$last_date}</span><br />
	<strong><lang:last_post_in></strong> {\$forum[\'forum_last_post_title\']}<br />
	<strong><lang:last_post_by></strong> {\$forum[\'forum_last_post_user_name\']}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_wrapper', '		<h3><lang:post_options></h3>
		<h4><lang:post_options_tip></h4>
		{\$lock}
		{\$pin}
		{\$announce}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_pin', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"stick\" value=\"1\" {\$check[\'stuck\']} /> <strong><lang:post_mod_options_pin></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_option_bar', '		<h3><lang:post_options></h3>
		<h4><lang:post_options_tip>.</h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" {\$check_code} /> <lang:post_options_code></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" {\$check_emoticon} /> <lang:post_options_emoticon></p>
		{\$poll}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'topic_prefix', '<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><macro:img_prefix></a>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_button', '<a href=\"<sys:gate>{\$url}\" title=\"{\$title}\"><img src=\"<sys:skinPath>/{\$button}.gif\" alt=\"\" /></a>&nbsp;');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_cat_redirect', '<tr>
	<td class=\"cellone {\$row_color}\" width=\"1%\" align=\"center\"><macro:cat_redirect></td>
	<td class=\"cellone {\$row_color}\" colspan=\"2\">
		<h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$forum[\'forum_name\']}</a></h4>
		<p>{\$forum[\'forum_description\']}</p>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$forum[\'forum_red_clicks\']} <lang:cat_redirect></h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_cat_wrapper', '<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"5\"><a href=\"<sys:gate>?getforum={\$category[\'forum_id\']}\" title=\"{\$category[\'forum_name\']}\">{\$category[\'forum_name\']}</a></td>
		</tr>
		<tr>
			<th colspan=\"2\" align=\"left\" width=\"50%\"><lang:topics_col_forum></th>
			<th align=\"left\" width=\"30%\"><lang:topics_col_topics></th>
			<th align=\"center\" width=\"20%\"><lang:topics_col_topics> / <lang:topics_col_replies></th>
		</tr>
		{\$forum_list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_last_post', '	<span class=\"lastpost\">{\$last_date}</span><br />
	<strong><lang:last_post_in></strong> {\$forum[\'forum_last_post_title\']}<br />
	<strong><lang:last_post_by></strong> {\$forum[\'forum_last_post_user_name\']}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_news_section', '<p id=\"community_news\">
	<strong><lang:news_title>: <a href=\"<sys:gate>?a=read&amp;CODE=02&amp;p={\$news[\'news_post\']}\" title=\"<lang:news_title>\">{\$news[\'news_title\']}</a></strong><br />
	<cite>--<lang:news_date> {\$news[\'news_date\']}.</cite>
</p>
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_none', '							<tr>
								<td class=\"cellone\" align=\"center\" colspan=\"6\"><strong><lang:no_topics></strong></td>
							</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_cat_row', '<tr>
	<td class=\"cellone {\$row_color}\" width=\"1%\" align=\"center\">
		<a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$marker}</a>
	</td>
	<td class=\"cellone {\$row_color}\">
		<h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$forum[\'forum_name\']}</a></h4>
		{\$subs}
		<p>{\$forum[\'forum_description\']}{\$mods}</p>
	</td>
	<td class=\"cellone {\$row_color}\">{\$last_post}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$forum[\'forum_topics\']} / {\$forum[\'forum_posts\']}</h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sub_none', '<tr>
	<td colspan=\"4\" align=\"center\"><strong><lang:main_sub_none></strong></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sub_topic_row', '		<tr>
			<td align=\"center\" class=\"one\"><macro:icon_open_new></td>
			<td><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}\" title=\"\"><strong>{\$row[\'topics_title\']}</strong></a></td>
			<td align=\"center\" class=\"one\">{\$row[\'track_date\']}</td>
			<td align=\"center\"><a href=\"<sys:gate>?a=ucp&amp;CODE=12&amp;id={\$row[\'topics_id\']}\" title=\"\"><strong><lang:sub_delete></strong></a></td>
		</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_container', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <lang:bread_title>
</div>
<hr />
{\$new_note}
{\$news_bit}
{\$category_list}
<hr />
<div class=\"bar\"><span><a href=\"<sys:gate>?a=logon&amp;CODE=06\" title=\"<lang:link_delete_cookies>\"><strong><lang:link_delete_cookies></strong></a> &middot; <a href=\"<sys:gate>?a=logon&amp;CODE=07\" title=\"<lang:link_mark_all_read>\"><strong><lang:link_mark_all_read></strong></a></span>&nbsp;</div>
<hr />
{\$active_users}
<hr />
{\$board_stats}
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_cat_row', '<tr>
	<td class=\"cellone {\$row_color}\" width=\"1%\" align=\"center\">
		<a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$marker}</a>
	</td>
	<td class=\"cellone {\$row_color}\">
		<h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$forum[\'forum_name\']}</a></h4>
		{\$subs}
		<p>{\$forum[\'forum_description\']}{\$mods}</p>
	</td>
	<td class=\"cellone {\$row_color}\">{\$last_post}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$forum[\'forum_topics\']} / {\$forum[\'forum_posts\']}</h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_cat_redirect', '<tr>
	<td class=\"cellone {\$row_color}\" width=\"1%\" align=\"center\"><macro:cat_redirect></td>
	<td class=\"cellone {\$row_color}\" colspan=\"2\">
		<h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$forum[\'forum_name\']}</a></h4>
		<p>{\$forum[\'forum_description\']}</p>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$forum[\'forum_red_clicks\']} <lang:cat_redirect></h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_cat_wrapper', '<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"5\"><a href=\"<sys:gate>?getforum={\$category[\'forum_id\']}\" title=\"{\$category[\'forum_name\']}\">{\$category[\'forum_name\']}</a></td>
		</tr>
		<tr>
			<th colspan=\"2\" align=\"left\" width=\"50%\"><lang:main_col_forum></th>
			<th align=\"left\" width=\"30%\"><lang:main_col_latest></th>
			<th align=\"center\" width=\"20%\"><lang:main_col_topics> / <lang:main_col_replies></th>
		</tr>
		{\$forum_list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'register', 'resend_validation_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:validate_crumb_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=register&amp;CODE=04\">
	<div class=\"formwrap\">
		<h3><lang:validate_title></h3>
		<p class=\"checkwrap\"><lang:validate_tip></p>
		<h3><lang:validate_field_email></h4>
		<h4><lang:validate_field_email_tip></h3>
		<input type=\'text\' name=\'email\' tabindex=\'1\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:validate_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:validate_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_registration_complete', 'Hello, {\$username}

The account you created at <conf:title> ( <conf:site_link> ) is now activated and ready to
use. Depending on your browser settings you may or may not be automatically logged in.
If not just use the following link to log your account:

<conf:site_link><sys:gate>?a=logon

Thank you for participating in our community!');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_main', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:main_title></h3>
	<p class=\"checkwrap\"><lang:main_tip></p>
	<h3><lang:main_email></h3>
	<h4><user:members_email></h4>
	<h3><lang:main_joined></h3>
	<h4>{\$join_date}</h4>
	<h3><lang:main_posts></h3>
	<h4><a href=\"<sys:gate>?a=search&amp;CODE=02&amp;mid=<user:members_id>\">{\$total_posts}</a> <lang:main_posts_stat></h4>
	<h3><lang:main_notes></h3>
	<h4><a href=\"<sys:gate>?a=notes\">{\$total_notes}</a> <lang:main_notes_stat></h4>
	<h3><lang:file_title></h3>
	<h4><lang:file_desc></h4>
	<table class=\"ucp_table\" cellpadding=\"3\" cellspacing=\"1\" with=\"100%\">
		<tr>
			<th width=\"1%\" align=\"center\"><lang:file_col_id></th>
			<th><lang:file_col_name></th>
			<th><lang:file_col_topic></th>
			<th align=\"center\"><lang:file_col_date></th>
			<th align=\"center\"><lang:file_col_size></th>
			<th align=\"center\"><lang:file_col_hits></th>
			<th>&nbsp;</th>
		</tr>
		{\$files}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_tabs', '<ul id=\"ucp_tabs\">
	{\$list}
</ul>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_match_result_row', '<tr>
	<td class=\"cellone {\$row_color}\" align=\"center\" width=\"1%\"><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\">{\$row[\'topics_marker\']}</a></td>
	<td class=\"cellone {\$row_color}\">
		{\$row[\'topics_prefix\']} 
		<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;hl={\$hlLink}\" title=\"{\$row[\'topics_title\']}\">{\$row[\'topics_title\']}</a> {\$inlineNav}<br />
		<span class=\"subject\">{\$row[\'topics_subject\']}</span>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><strong>{\$row[\'topics_author\']}</strong></td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><a href=\"<sys:gate>?getforum={\$row[\'topics_forum\']}\" title=\"\">{\$row[\'forum_name\']}</a></td>
	<td class=\"cellone {\$row_color}\">
		<span class=\"lastpost\">{\$row[\'topics_last\']}</span><br />
		<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><lang:topic_last_replied>:</a> <strong>{\$row[\'topics_poster\']}</strong>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$row[\'topics_posts\']} / {\$row[\'topics_views\']}</h2></td>
<!--<span><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><macro:img_mini_box></a> {\$row[\'topics_last\']}</span><lang:topic_last_replied>: <strong>{\$row[\'topics_poster\']}</strong></td>-->
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_match_result_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=search\" title=\"<lang:search_form_title>\"><lang:search_form_title></a> / <strong>{\$count}</strong> <lang:search_result_title>:
</div>
<div class=\"bar\">{\$pages}</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"6\">{\$count} <lang:search_result_title></td>
		</tr>
		<tr>
			<th align=\"left\" width=\"30%\" colspan=\"2\"><lang:result_col_title></th>
			<th align=\"center\" width=\"10%\"><lang:result_col_author></th>
			<th align=\"center\" width=\"20%\"><lang:result_col_forum></th>
			<th align=\"center\" width=\"20%\"><lang:result_col_last></th>
			<th align=\"center\" width=\"15%\"><lang:result_col_replies> / <lang:result_col_views></th>
		</tr>
		{\$list}
	</table>
</div>
<div class=\"bar\">{\$pages}</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_pass_get_1', 'You have recently attempted to recover your password from <conf:title> ( <conf:site_link> ).
To complete the process you must click the following link to validate your request. Once validation is 
complete you will be mailed your new account password. You will be able to change this password at anytime 
via your control panel.

{\$url}

Take note that this validation link will expire within 24 hours.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_admin_user', 'Hello, {\$name}

This message is to inform you that your account for <conf:title> ( <conf:site_link> )
has been activated. Below you will find your account access information which you may change
at anytime through your personal control panel.

Username: {\$name}
Password: {\$password}

Log your account through the link below:
<conf:site_link><sys:gate>?a=logon\";');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_pass_get_2', 'Hello, {\$row[\'members_name\']}

This message is to inform you that your account for <config:title> ( <config:site_link> )
has been activated. Below you will find your account access information which you may change
at anytime through your personal control panel.

Username: {\$row[\'members_name\']}
Password: {\$pass}

Log your account through the link below:

<conf:site_link><sys:gate>?a=logon');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_email', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=10\'>
	<div class=\"formwrap\">
		<h3><lang:email_title></h3>
		<p class=\"checkwrap\"><lang:email_tip></p>
		<h4><strong><lang:email_current></strong> <user:members_email></h4>
		<h3><lang:email_field_pass></h3>
		<h4><lang:email_field_pass_tip></h4>
		<input type=\"password\" name=\"password\" />
		<h3><lang:email_field_new></h3>
		<h4><lang:email_field_new_tip></h4>
		<input type=\"text\" name=\"new\" value=\"{\$email_one}\" />
		<h3><lang:email_field_con></h3>
		<h4><lang:email_field_con_tip></h4>
		<input type=\"text\" name=\"confirm\" value=\"{\$email_two}\" />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:email_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:email_button_reset>\" />
		</p>
	</div>
	<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_options', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=08\'>
	<div class=\"formwrap\">
		<h3><lang:board_title></h3>
		<p class=\"checkwrap\"><lang:board_tip></p>
		<h3><lang:board_field_skin></h3>
		<h4><lang:board_field_skin_tip></h4>
		<p class=\"checkwrap\"><select name=\"skin\">
			{\$skins}
		</select></p>
		<h3><lang:board_field_lang></h3>
		<h4><lang:board_field_lang_tip></h4>
		<p class=\"checkwrap\"><select name=\"lang\">
			{\$langs}
		</select></p>
		<h3><lang:board_field_zone></h3>
		<h4><lang:board_field_zone_tip></h4>
		<p class=\"checkwrap\"><select name=\"zone\">
			{\$zones}
		</select></p>
		<h3><lang:board_field_notify></h3>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"notes\" value=\"1\"{\$checked[\'notes\']} /> <b><lang:board_field_note>?</b></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"sigs\" value=\"1\"{\$checked[\'sigs\']} /> <b><lang:board_field_sigs>?</b></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"avatars\" value=\"1\"{\$checked[\'avatars\']} /> <b><lang:board_field_avatars>?</b></p>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:board_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'print', 'print_row', '<div id=\"resultwrap\">
	<h3><a href=\'<sys:gate>?getuser={\$row[\'members_id\']}\'><strong>{\$row[\'members_name\']}</strong></a> | <span>{\$row[\'posts_date\']}</span></h3>
	<div class=\"post\"><p>{\$row[\'posts_body\']}</p></div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_lock', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"lock\" value=\"1\" {\$check[\'locked\']} /> <strong><lang:post_mod_options_lock></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'post_name_field', '		<h3><lang:post_field_name></h3>
		<h4><lang:post_field_name_tip></h4>
		<input type\"text\" name=\"name\" tabindex=\"1\" value=\"{\$name}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_banned', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:banned_title></h3>
		<div id=\"warning\">
			<h3><lang:err_warn_title></h3>
			<p><strong><lang:banned_info></strong></p>
		</div>
		<h3><lang:banned_form_name_title></h3>
		<h4><lang:banned_form_name_title_info></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:banned_form_pass_title></h3>
		<h4><lang:banned_form_pass_title_info></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:banned_form_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:banned_form_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_pass', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=06\'>
	<div class=\"formwrap\">
		<h3><lang:pass_title></h3>
		<p class=\"checkwrap\"><lang:pass_tip></p>
		<h3><lang:pass_field_password></h3>
		<h4><lang:pass_field_password_tip></h4>
		<input type=\"password\" name=\"current\" />
		<h3><lang:pass_field_new></h3>
		<h4><lang:pass_field_new_tip></h4>
		<input type=\"password\" name=\"new\" />
		<h3><lang:pass_field_con></h3>
		<h4><lang:pass_field_con_tip></h4>
		<input type=\"password\" name=\"confirm\"\" />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:pass_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:pass_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'page_wrapper', '<macro:img_mini_pages> {\$links}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'print', 'print_body', '<script language=\"JavaScript\">
	<!--
	window.print();
	-->
</script>
<div id=\"print\">
	<h2><span><conf:title> ( <a href=\"<conf:site_link>\" title=\"\"><conf:site_link></a> )</span> {\$topic[\'topics_title\']}</h2>
	<p class=\"bar\"><b><lang:source>: <a href=\"#\" onclick=\"javascript: return prompt(\'<lang:link_copy_prompt>:\', \'<conf:site_link><sys:gate>?gettopic={\$topic[\'topics_id\']}\');\"><conf:site_link><sys:gate>?gettopic={\$this->_id}</a></b></p>
	{\$content}
	<p class=\"bar\"><span><a href=\"javascript: scroll(0,0);\" title=\"\"><strong><lang:top></strong></a></span><strong><lang:source>: <a href=\"#\" onclick=\"javascript: return prompt(\'<lang:link_copy_prompt>:\', \'<conf:site_link><sys:gate>?gettopic={\$topic[\'topics_id\']}\');\"><conf:site_link><sys:gate>?gettopic={\$this->_id}</a></strong></p>
	<div id=\"copyright\"><span>Powered By: <strong>MyTopix&trade; | Personal Message Board</strong> <conf:version></span>Copyright &copy;  2004,  <a href=\"http://www.jaia-interactive.com/\" title=\"<lang:visit_jaia>\">Jaia Interactive</a> all rights reserved.</div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_full_result_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=search\" title=\"<lang:search_form_title>\"><lang:search_form_title></a> / <strong>{\$count}</strong> <lang:search_result_title>:
</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"8\">{\$count} <lang:search_result_title></td>
		</tr>
		<tr>
			<th width=\"5%\"><lang:result_col_score></th>
			<th width=\"5%\">&nbsp;</th>
			<th width=\"30%\"><lang:result_col_title></th>
			<th align=\"center\" width=\"10%\"><lang:result_col_replies></th>
			<th align=\"center\" width=\"10%\"><lang:result_col_views></th>
			<th align=\"center\" width=\"10%\"><lang:result_col_author></th>
			<th align=\"center\" width=\"20%\"><lang:result_col_forum></th>
			<th width=\"35%\"><lang:result_col_last></th>
		</tr>
		{\$list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sig', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <user:class_sigLength>;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}

}
</script>
<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
<form method=\'post\' action=\'<sys:gate>?a=ucp&amp;CODE=04\' name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:sig_title></h3>
		<p class=\"checkwrap\"><lang:sig_tip></p>
		<h3><lang:sig_field_current></h3>
		<p class=\"sig\">{\$parsed}</p>
		{\$bbcode}
		<h3><lang:sig_emoticons></h3>
		<h4><lang:sig_emoticons_tip></h4>
		{\$emoticons}
		<h3><lang:sig_field_body></h3>
		<h4><lang:sig_field_body_tip> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\" title=\"<lang:sig_link_code_title>\"><lang:sig_link_code></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\" title=\"<lang:sig_link_emoticons_tip>\"><lang:sig_link_emoticons></a> · <a href=\"javascript:check_length()\" title=\"<lang:sig_link_length_tip>\"><lang:sig_link_length></a> )</h4>
		<textarea name=\"body\">{\$sig}</textarea>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:sig_button_submit>\" /> 
			<input class=\"reset\" type=\"reset\" value=\"<lang:sig_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_jump_list', '<form method=\"post\" action=\"<sys:gate>?a=topics\" class=\"shaft\">
			<p class=\"sort\"><select name=\"forum\" class=\"jump\">
				{\$jump_list}
			</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:forum_jump>\" /></p>
		</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_full_result_row', '<tr>
	<td class=\"cellone {\$row_color}\" align=\"center\"><strong>{\$row[\'topics_score\']}%</strong></td>
	<td class=\"cellone {\$row_color}\" align=\"center\" valign=\"top\"><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\">{\$row[\'topics_marker\']}</a></td>
	<td class=\"cellone {\$row_color}\">{\$row[\'topics_prefix\']} <a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;hl={\$hlLink}\" title=\"\">{\$row[\'topics_title\']}</a> {\$inlineNav}<span class=\"special\">-- {\$row[\'topics_subject\']}</span></td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><strong>{\$row[\'topics_posts\']}</strong></td>
	<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'topics_views\']}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><strong>{\$row[\'topics_author\']}</strong></td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><a href=\"<sys:gate>?getforum={\$row[\'topics_forum\']}\" title=\"\">{\$row[\'forum_name\']}</a></td>
	<td class=\"cellone {\$row_color}\" nowrap=\"nowrap\"><span><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><macro:img_mini_box></a> {\$row[\'topics_last\']}</span><lang:topic_last_replied>: <strong>{\$row[\'topics_poster\']}</strong></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'move_topic', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / <a href=\"<sys:gate>?gettopic={\$this->_id}\" title=\"\">{\$row[\'topics_title\']}</a> / <lang:mod_move_bread>
</div>
<form method=\"post\" action=\"<sys:gate>?a=mod&amp;CODE=05&amp;t={\$this->_id}\">
	<div class=\"formwrap\">
		<h3><lang:mod_move_title></h3>
		<h4><lang:mod_move_desc></h4>
		<p class=\"checkwrap\">
			<input type=\"checkbox\" name=\"link\" class=\"check\" value=\"1\"> <strong><lang:mod_move_link></strong>
		</p>
		<p class=\"checkwrap\">
			<select name=\"forum\" size=\"5\" class=\"big\" id=\"forum\">
				{\$search_list}
			</select>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:mod_move_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:mod_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_validate_user', 'Hello, {\$username}

Our records indicate that you have just attempted to register a new account with our board.
Currently, the administrator of this community thinks it best to first validate all new 
user accounts to prevent spamming and abuse. To activate your account you only need to click
on the link below. Once you do this the system will allow you to log in to your account.

Activation Key:

<conf:site_link><sys:gate>?a=register&CODE=02&key={\$key}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'by_user_row', '<div id=\"resultwrap\">
	<h3><a href=\"<sys:gate>?a=read&amp;CODE=02&amp;p={\$row[\'posts_id\']}\" title=\"\"><b>{\$row[\'topics_title\']}</b></a> | <span>{\$row[\'posts_date\']}</span></h3>
	<div class=\"post\"><p>{\$row[\'posts_body\']}</p></div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'by_user_table', '<div id=\"crumb_nav\">
<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <strong>{\$count}</strong> <lang:search_result_user_title> <strong>{\$user}</strong>:
</div>
<div class=\"bar\">{\$pages}</div>
{\$list}
<div class=\"bar\">{\$pages}</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:search_form_title>:
</div>
<script language=\"javascript\">

	function selectAll(list, select)
	{
		var list = document.getElementById(list);
		
		for (var i = 0; i < list.length; i++)
		{
			list.options[i].selected = select.checked;
		}
	}

</script>
<form method=\"post\" action=\"<sys:gate>?a=search&CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:search_form_field_phrase></h3>
		<h4><lang:search_form_field_phrase_tip></h4>
		<input type=\"text\" name=\"keywords\" value=\"{\$this->_phrase}\" />
		<h3><lang:search_form_type>:</h3>
		<h4><lang:search_form_type_tip>.</h4>
		<p class=\"checkwrap\">
			<input type=\"radio\" name=\"mode\" class=\"check\" value=\"match\" checked=\"checked\" /> <strong><lang:search_form_basic></strong>&nbsp;
			<span id=\"matchtype\">
				<input type=\"checkbox\" name=\"type\" class=\"check\" value=\"1\" /> <lang:search_form_basic_exact>
			</span>
		</p>
		<p class=\"checkwrap\">
			<input type=\"radio\" name=\"mode\" class=\"check\" value=\"full\" /> <strong><lang:search_form_full></strong> &nbsp;
			<span id=\"limit\">
				<select name=\"limit\">
					<option value=\"10\" selected=\"selected\">10</option>
					<option value=\"20\">20</option>
					<option value=\"30\">30</option>
					<option value=\"40\">40</option>
				</select> <lang:search_form_full_limit>
			</span>
		</p>
		<h3><lang:search_form_forum_title></h3>
		<h4><lang:search_form_forum_desc></h4>
		<p class=\"checkwrap\">
			<input type=\"checkbox\" name=\"all\" class=\"check\" value=\"all\" onclick=\"selectAll(\'forums\', this)\" checked=\"checked\"/> <strong><lang:search_form_forum_all></strong>
		</p>
		<p class=\"checkwrap\">
			<select name=\"forums[]\" size=\"5\" multiple=\"multiple\" class=\"big\" id=\"forums\">
				{\$search_list}
			</select>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:search_form_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:search_form_button_reset>\" />
		</p>
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'sig', '<p class=\"sig\">{\$row[\'members_sig\']}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'register', 'form_register', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:register_crumb_title>
</div>
{\$error_list}
<form method=\"post\" action=\"<sys:gate>?a=register&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:registration_title></h3>
		<p class=\"checkwrap\"><lang:registration_tip></p>
		<h3><lang:field_username></h3>
		<h4><lang:field_username_tip></h4>
		<input type=\"text\" name=\"username\" value=\"{\$username}\" />
		<h3><lang:field_pass></h3>
		<h4><lang:field_pass_tip></h4>
		<input type=\"password\" name=\"password\" />
		<h3><lang:field_con_pass></h3>
		<h4><lang:field_con_pass_tip></h4>
		<input type=\"password\" name=\"cpassword\" />
		<h3><lang:field_email></h3>
		<h4><lang:field_email_tip></h4>
		<input type=\"text\" name=\"email\" value=\"{\$email_one}\" />
		<h3><lang:field_con_email></h3>
		<h4><lang:field_con_email_tip></h4>
		<input type=\"text\" name=\"cemail\" value=\"{\$email_two}\" />
		<h3><lang:field_terms></h3>
		<h4><lang:field_terms_tip></h4>
		<textarea rows=\"\" cols=\"\"><lang:field_terms_content></textarea>
		<p class=\"checkwrap\"><input class=\"check\" type=\"checkbox\" name=\"contract\" {\$contract} /> <strong><lang:field_agree></strong></p>
		{\$coppa_field}
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_general', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=02\'>
	<div class=\"formwrap\">
		<h3><lang:gen_title></h3>
		<p class=\"checkwrap\"><lang:gen_tip></p>
		<h3><lang:gen_field_location></h3>
		<h4><lang:gen_field_location_tip></h4>
		<input type=\"text\" name=\"location\" value=\"{\$location}\" />
		<h3><lang:gen_field_website></h3>
		<h4><lang:gen_field_website_tip></h4>
		<input type=\"text\" name=\"homepage\" value=\"{\$homepage}\" />
		<h3><lang:gen_field_birthday></h3>
		<h4><lang:gen_field_birthday_tip></h4>
		<p class=\"checkwrap\">
			<select name=\'bmonth\'>
				{\$months}
			</select>
			&nbsp;
			<select name=\'bday\'>
				{\$days}
			</select>
			&nbsp;
			<select name=\'byear\'>
				{\$years}
			</select>
		</p>
		<h3><lang:gen_field_aim></h3>
		<h4><lang:gen_field_aim_tip></h4>
		<input type=\"text\" name=\"aim\" value=\"{\$aim}\" />
		<h3><lang:gen_field_icq></h3>
		<h4><lang:gen_field_icq_tip></h4>
		<input type=\"text\" name=\"icq\" value=\"{\$icq}\" />
		<h3><lang:gen_field_yim></h3>
		<h4><lang:gen_field_yim_tip></h4>
		<input type=\"text\" name=\"yim\" value=\"{\$yim}\" />
		<h3><lang:gen_field_msn></h3>
		<h4><lang:gen_field_msn_tip></h4>
		<input type=\"text\" name=\"msn\" value=\"{\$msn}\" />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:gen_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:gen_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'post_row_guest', '<div class=\"user\">
	<a name=\"{\$row[\'posts_id\']}\"></a>
	<p><strong>{\$row[\'posts_author_name\']}</strong>
	<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span></p>
	<img src=\"<sys:skinPath>/ava_none.gif\" class=\"avatar\" alt=\"\" title=\"\" />
</div>
<div class=\"post\">
	<h5><strong><lang:posted_on> {\$row[\'posts_date\']}</strong><span>{\$linkDelete}{\$linkEdit}{\$linkQuote}</span></h5>
	<p>{\$row[\'posts_body\']}</p>{\$attach}
</div>
<div class=\"foot\">
	<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:entry_link_top_tip>\"><lang:entry_link_top></a></span>
	&nbsp;
</div>
<div class=\"postend\">&nbsp;</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'post_table', '{\$poll_data}
<div class=\"postwrap\">
        <div class=\"postheader\"><span>{\$topic[\'topics_title\']}</span></div>
        {\$list}
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_active', '<div class=\"infowrap\">
	<h1><lang:readers_title></h1>
	<h2><lang:readers_user_summary> ( <a href=\"<sys:gate>?a=active\" title=\"\"><lang:active_link_details></a> )</h2>
	<p>{\$list}</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_buttons', '<div class=\"postbutton\">
	<p class=\"links\">&nbsp;</p>
	{\$button_reply} {\$button_qwik} {\$button_topic} {\$button_poll}
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'reply_bit', '<div id=\"qwikwrap\" style=\"display: none;\">
	<script language=\"javascript\">
	function check_length()
	{
		var limit  = <conf:max_post> * 1000;
		var length = document.REPLIER.body.value.length;

		if ( (length > limit) ) {
			alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
		} else {
			alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
		}

	}
	</script>
	<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
	<a name=\"qwik\"></a>
	<form method=\"post\" action=\"<sys:gate>?a=post&amp;CODE=01&amp;t={\$this->_id}&amp;qwik=1\" name=\"REPLIER\">
		<div class=\"formwrap\">
			<h3><lang:qwik_title>.</h3>
			<p class=\"checkwrap\"><lang:qwik_title_tip>.</p>
			<h3><lang:qwik_field_body>:</h3>
			<h4><lang:qwik_field_body_tip> (<a href=\'javascript:smilie_window(\"<sys:gate>\");\' title=\"<lang:qwik_link_emoticons>\"><lang:qwik_link_emoticons></a> &middot; <a href=\"javascript:check_length();\" title=\"<lang:qwik_link_length>\"><lang:qwik_link_length></a>)</h2>
			<textarea name=\"body\" rows=\"\" cols=\"\"></textarea>
			<p class=\"submit\">
				<input class=\"button\" type=\"submit\" value=\"<lang:qwik_button_submit>\" />&nbsp;
				<input class=\"reset\" type=\"reset\" value=\"<lang:qwik_button_reset>\" />
			</p>
			<input type=\"hidden\" name=\"cOption\" value=\"1\" />
			<input type=\"hidden\" name=\"eOption\" value=\"1\" />
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		</div>
	</form>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'post_row', '<div class=\"user\">
	<a name=\"{\$row[\'posts_id\']}\"></a>
	<p><a href=\"<sys:gate>?getuser={\$row[\'members_id\']}\" title=\"<lang:entry_link_profile>\"><strong>{\$row[\'members_name\']}</strong></a> <em>( <a href=\"<sys:gate>?a=search&CODE=02&mid={\$row[\'members_id\']}\" title=\"<lang:entry_post_find> {\$row[\'members_name\']}\">{\$row[\'members_posts\']}</a> )</em>
	<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span>
	<span><strong>&middot; <lang:entry_rank></strong> {\$row[\'members_pips\']}</span></p>
	{\$avatar}<div style=\"clear:both;\" /></div>
</div>
<div class=\"post\">
	<h5><strong><lang:posted_on> {\$row[\'posts_date\']}</strong><span>{\$linkDelete}{\$linkEdit}{\$linkQuote}</span></h5>
	<p>{\$row[\'posts_body\']}</p>{\$attach}{\$sig}
</div>
<div class=\"foot\">
	<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:entry_link_top_tip>\"><lang:entry_link_top></a></span>
	<ul class=\"extras\"><li>{\$active}</li>{\$linkSpan}</ul>
</div>
<div class=\"postend\">&nbsp;</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'container_read', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / {\$topic[\'topics_title\']}
</div>
{\$buttons}
<div class=\"bar\">
	<span><a href=\"<sys:gate>?a=print&amp;t={\$topic[\'topics_id\']}\" title=\"<lang:print_view_tip>\" target=\"_blank\"><strong><lang:print_view></strong></a> &middot; <a href=\"<sys:gate>?gettopic={\$topic[\'topics_id\']}&amp;CODE=01\" title=\"<lang:subscribe_tip>\"><strong><lang:subscribe></strong></a></span>
	{\$pages}
</div>
{\$content}
<div class=\"bar\">
	<span><a href=\"<sys:gate>?gettopic={\$topic[\'topics_id\']}&amp;CODE=03&amp;forum={\$topic[\'topics_forum\']}\" title=\"<lang:previous>\"><strong><lang:previous></strong></a> &middot; <a href=\"<sys:gate>?a=topics&amp;forum={\$topic[\'topics_forum\']}\" title=\"<lang:index>\"><strong><lang:index></strong></a> &middot; <a href=\"<sys:gate>?gettopic={\$topic[\'topics_id\']}&amp;CODE=04&amp;forum={\$topic[\'topics_forum\']}\" title=\"<lang:next>\"><strong><lang:next></strong></a></span>
	{\$pages}
</div>
{\$buttons}
<div class=\"formwrap\">
{\$mod}
{\$jump}
</div>
{\$replier}
{\$readers}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'quote_field', '		<h3><lang:post_field_quote></h3>
		<h4><lang:post_field_quote_tip></h4>
		<textarea name=\"quote\">{\$message}</textarea>
		{\$hidden}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'smilie_wrapper', '<table class=\"emoticon\" cellpadding=\"0\" cellspacing=\"0\">
	{\$smilies}
</table>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_field_title', '		<h3><lang:post_field_title></h3>
		<h4><lang:post_field_title_tip></h4>
		<input type=\"text\" name=\"title\" tabindex=\"1\" value=\"{\$title}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'profile', 'profile_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:profile_title> {\$row[\'members_name\']}
</div>
<div id=\"left_column\">
	<div class=\"formwrap\">
		<h3><lang:profile_name></h3>
		<h4>{\$row[\'members_name\']} ( {\$row[\'class_prefix\']}{\$row[\'class_title\']}{\$row[\'class_suffix\']} )</h4>
		<h3><lang:profile_last_visit></h3>
		<h4>{\$row[\'members_lastvisit\']}</h4>
		<h3><lang:profile_registered></h3>
		<h4>{\$row[\'members_registered\']}</h4>
		<h3><lang:profile_birthday></h3>
		<h4>{\$birthday}</h4>
		<h3><lang:profile_stats></h3>
		<h4><a href=\'<sys:gate>?a=search&amp;CODE=02&amp;mid={\$row[\'members_id\']}\'>{\$row[\'members_posts\']}</a> <lang:profile_posts> ( {\$row[\'members_per_day\']} / <lang:per_day> )</h4>
		<h3><lang:profile_last_5></h3>
		<ul>
			{\$topics}
		</ul>
		<h3><lang:profile_location></h3>
		<h4>{\$row[\'members_location\']}</h4>
	</div>
</div>
<div id=\"right_column\">
	<div class=\"formwrap\">
		<h3><lang:profile_home></h3>
		<h4>{\$row[\'members_homepage\']}</h4>
		<h3><lang:profile_aol></h3>
		<h4>{\$row[\'members_aim\']}</h4>
		<h3><lang:profile_yim></h3>
		<h4>{\$row[\'members_yim\']}</h4>
		<h3><lang:profile_msn></h3>
		<h4>{\$row[\'members_msn\']}</h4>
		<h3><lang:profile_icq></h3>
		<h4>{\$row[\'members_icq\']}</h4>
		<h3><lang:profile_other></h3>
		<ul>
			<li><a href=\'<sys:gate>?a=notes&amp;CODE=07&amp;send={\$row[\'members_id\']}\'><lang:profile_link_note></a></li>
		</ul>
	</div>
</div>
<div id=\"signature\">
	<div class=\"formwrap\">
		<h3><lang:profile_sig></h3>
		<p class=\"sig\">{\$row[\'members_sig\']}</p>
	</div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'emoticons_field', '		<h3><lang:post_emoticon_title></h3>
		<h4><lang:post_emoticon_tip></h4>
		{\$smilies}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_wrapper', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> {\$bread_crumb}
</div>
{\$errors}
<script language=\'javascript\'>
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;
		if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}

}
</script>
<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
<form method=\"POST\" action=\"{\$this->_form_action}\" name=\"REPLIER\" {\$this->_form_multipart}>
	<div class=\"formwrap\">
		<h3>{\$this->_form_title}</h3>
		<p class=\"checkwrap\">{\$this->_form_tip}</p>
		{\$recipient}
		{\$name}
		{\$title}
		{\$subject}
		{\$bbcode}
		{\$emoticons}
		<h3><lang:post_message_title></h3>
		<h4><lang:post_message_tip> (  <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:post_link_bbcode></a> · <a href=\'javascript:smilie_window(\"<sys:gate>\")\'><lang:post_link_emoticons></a> · <a href=\'javascript:check_length()\'><lang:post_link_length></a> )</h4>
		<textarea name=\"body\" rows=\"5\" tabindex=\"1\">{\$message}</textarea>
		{\$quote}
		{\$convert}
		{\$upload}
		{\$tools}
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" tabindex=\"2\" value=\"{\$this->_form_submit}\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		{\$hidden}
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'bbcode_field', '	<div id=\'bbcode_panel\' style=\'display: none;\'>
		<h3><lang:bb_title></h3>
		<h4><lang:bb_title_tip></h4>
		<table cellpadding=\'3\' cellspacing=\'0\'>
			<tr>
				<td align=\'left\'>
					<input type=\'button\' class=\'bbcode\' value=\' U \' onClick=\'codeBasic(this)\' name=\'u\' />
					<input type=\'button\' class=\'bbcode\' value=\' I \' onClick=\'codeBasic(this)\' name=\'i\' />
					<input type=\'button\' class=\'bbcode\' value=\' B \' onClick=\'codeBasic(this)\' name=\'b\' /> 
					<select name=\'FONT\' style=\'width: 100px;\' onchange=\'fontFace(this.options[this.selectedIndex].value)\'>
						<option value=\'0\'><lang:bb_select_font></option>
						<option style=\'font-family: tahoma; font-weight: bold;\' value=\'Arial\'>Tahoma</option>
						<option style=\'font-family: times; font-weight: bold;\' value=\'Times\'>Times</option>
						<option style=\'font-family: courier; font-weight: bold;\' value=\'Courier\'>Courier</option>
						<option style=\'font-family: impact; font-weight: bold;\' value=\'Impact\'>Impact</option>
						<option style=\'font-family: geneva; font-weight: bold;\' value=\'Geneva\'>Geneva</option>
						<option style=\'font-family: optima; font-weight: bold;\' value=\'Optima\'>Optima</option>
					</select>
					<select name=\'SIZE\' style=\'width: 100px;\' onchange=\'fontSize(this.options[this.selectedIndex].value)\'>
						<option value=\'0\'><lang:bb_select_size></option>
						<option value=\'1\'><lang:bb_size_small></option>
						<option value=\'7\'><lang:bb_size_large></option>
						<option value=\'14\'><lang:bb_size_largest></option>
					</select>
					<select name=\'COLOR\' style=\'width: 100px;\' onchange=\'fontColor(this.options[this.selectedIndex].value)\'>
						<option value=\'0\'><lang:bb_select_color></option>
						<option value=\'blue\' style=\'color:blue\'><lang:bb_color_blue></option>
						<option value=\'red\' style=\'color:red\'><lang:bb_color_red></option>
						<option value=\'purple\' style=\'color:purple\'><lang:bb_color_purple></option>
						<option value=\'orange\' style=\'color:orange\'><lang:bb_color_orange></option>
						<option value=\'yellow\' style=\'color:yellow\'><lang:bb_color_yellow></option>
						<option value=\'gray\' style=\'color:gray\'><lang:bb_color_gray></option>
						<option value=\'green\' style=\'color:green\'><lang:bb_color_green></option>
					</select>
				</td>
			</tr>
			<tr>
				<td align=\'left\'>
					<input type=\'button\' class=\'bbcode\' value=\' # \' onClick=\'codeBasic(this)\' name=\'code\' />
					<input type=\'button\' class=\'bbcode\' value=\' \"QUOTE\" \' onClick=\'codeBasic(this)\' name=\'quote\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' List \' onClick=\'codeList()\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' IMG \' onClick=\'codeBasic(this)\' name=\'img\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' @ \' onClick=\'codeBasic(this)\' name=\'email\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' URL \' onClick=\'codeBasic(this)\' name=\'url\' /> 
				</td>
			</tr>
		</table>
		<p class=\"checkwrap\"><input type=\'radio\' class=\"check\" name=\'mode\' value=\'adv\' checked=\'checked\' /> <b><lang:bb_mode_advanced></b> <lang:bb_mode_advanced_tip>.</p>
		<p class=\"checkwrap\"><input type=\'radio\' class=\"check\" name=\'mode\' value=\'simple\'/> <b><lang:bb_mode_simple></b> <lang:bb_mode_simple_tip>.</p>
	</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <lang:notes_main_title>
</div>
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>
</div>
<div class=\"bar\">
	{\$pages}
</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"5\"><lang:note_your_notes> ( {\$filled}% <lang:note_full> )</td>
		</tr>
		<tr>
			<th align=\"left\" width=\"5%\">&nbsp;</td>
			<th align=\"left\" width=\"35%\"><lang:note_col_title></td>
			<th align=\"center\" width=\"20%\"><lang:note_col_sender></td>
			<th align=\"center\" width=\"25%\"><lang:note_col_recieved></td>
			<th width=\"5%\">&nbsp;</td>
		</tr>
		{\$list}
	</table>
</div>
<div class=\"bar\">
	{\$pages}
</div>
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>&nbsp;<a href=\"<sys:gate>?a=notes&amp;CODE=05\" title=\"\" onclick=\"javascript: return confirm(\'<lang:empty_inbox_confirm>?\');\"><macro:btn_delete_note></a>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_row', '<tr>
	<td class=\'cellone\' align=\"center\"><a href=\'<sys:gate>?a=notes&amp;CODE=06&amp;nid={\$row[\'notes_id\']}\'>{\$row[\'notes_marker\']}</a></td>
	<td class=\'celltwo\'><a href=\'<sys:gate>?a=notes&amp;CODE=01&amp;nid={\$row[\'notes_id\']}\'>{\$row[\'notes_title\']}</a></td>
	<td class=\'cellone\' align=\"center\"><a href=\'<sys:gate>?getuser={\$row[\'notes_sender\']}\'><strong>{\$row[\'members_name\']}</strong></a></td>
	<td class=\'celltwo\' align=\"center\">{\$row[\'notes_date\']}</td>
	<td class=\'celllast\' align=\"center\"><a href=\"<sys:gate>?a=notes&amp;CODE=04&amp;nid={\$row[\'notes_id\']}\" title=\"\" onclick=\"javascript: return confirm(\'<lang:read_delete_confirm>?\');\"><b><lang:read_delete_title></b></a></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_read', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=notes\" title=\"\"><lang:notes_inbox_title></a> / <lang:notes_read_crumb_title> {\$row[\'notes_title\']}
</div>
<div class=\"postbutton\">
	<a href=\'<sys:gate>?a=notes&amp;CODE=3&amp;nid={\$this->_id}&amp;send={\$row[\'members_name\']}\'><macro:btn_note_reply></a>&nbsp;<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>
</div>
<div class=\"postwrap\">
	<div class=\"postheader\">{\$row[\'notes_title\']}</div>
	<div class=\"user\">
		<a name=\"{\$row[\'notes_id\']}\"></a>
		<p><a href=\"<sys:gate>?getuser={\$row[\'members_id\']}\" title=\"<lang:entry_link_profile>\"><strong>{\$row[\'members_name\']}</strong></a> <em>( <a href=\"<sys:gate>?a=search&CODE=02&mid={\$row[\'members_id\']}\" title=\"<lang:entry_post_find> {\$row[\'members_name\']}\">{\$row[\'members_posts\']}</a> )</em>
		<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span>
		<span><strong>&middot; <lang:entry_rank></strong> {\$row[\'members_pips\']}</span></p>
		{\$avatar}<div style=\"clear:both;\" /></div>
	</div>
	<div class=\"post\">
		<h5><strong><lang:sent_on> {\$row[\'notes_date\']}</strong><span><a href=\"<sys:gate>?a=notes&amp;CODE=04&amp;nid={\$row[\'notes_id\']}\" title=\"<lang:read_button_delete>\" onclick=\"javascript: return confirm(\'<lang:read_delete_confirm>\');\"><img src=\"<sys:skinPath>/post_delete.gif\" alt=\"<lang:read_delete_confirm>\" /></a></span></h5>
		<p>{\$row[\'notes_body\']}</p>{\$sig}
	</div>
	<div class=\"foot\">
		<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:read_link_top_title>.\"><lang:read_link_top></a></span>
		<ul class=\"extras\">{\$linkSpan}</ul>
	</div>
	<div class=\"postend\">&nbsp;</div>
</div>
<div class=\"postbutton\">
	<a href=\'<sys:gate>?a=notes&amp;CODE=3&amp;nid={\$this->_id}&amp;send={\$row[\'members_name\']}\'><macro:btn_note_reply></a>&nbsp;<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_none', '							<tr>
								<td class=\"cellone\" align=\"center\" colspan=\"5\"><strong><lang:no_notes></strong></td>
							</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'notes_send_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <a href=\"<sys:gate>?a=notes\" title=\"\"><lang:notes_main_title></a> <macro:txt_bread_sep> <lang:notes_new_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
	function check_length()
	{
		var limit  = <conf:max_post> * 1000;
		var length = document.REPLIER.body.value.length;

		if ( (length > limit) ) {
			alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
		} else {
			alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
		}
	}
	</script>
	<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
	<a name=\"qwiknote\"></a>
	<form method=\"POST\" action=\"<sys:gate>?a=notes&amp;CODE=02\" name=\"REPLIER\">
		<div class=\"formwrap\">
			<h3><lang:notes_send_title></h3>
			<p class=\"checkwrap\"><lang:form_send_tip></p>
			<h3><lang:post_field_recipient_title>:</h3>
			<h4><lang:post_field_recipient_tip> ( <a href=\'<sys:gate>?a=members\'><lang:post_field_recipient_link_search></a> )</h4>
			<input type=\'text\' name=\'recipient\' value=\'{\$to}\' tabindex=\'1\'  />
			<h3><lang:post_field_title>:</h3>
			<h4><lang:post_field_title_tip>.</h4>
			<input type=\'text\' name=\'title\' tabindex=\'2\' value=\"{\$title}\" />
			{\$bbcode}
			<h3><lang:post_emoticon_title></h3>
			<h4><lang:post_emoticon_tip></h4>
			{\$emoticons}
			<h3><lang:post_message_title></h3>
			<h4><lang:post_message_tip> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:post_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:post_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:post_link_length></a> )</h4>
			<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
			<h3><lang:post_options></h3>
			<h4><lang:post_options_tip>.</h4>
			<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_code></p>
			<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_emoticon></p>
			<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:post_button_send>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:post_button_reset>\" /></p>
			<input type=\'hidden\' name=\'redirect\' value=\'new\' />
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		</div>
	</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'notes_reply_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=notes\" title=\"\"><lang:notes_inbox_title></a> / <a href=\"<sys:gate>?a=notes&amp;CODE=01&amp;nid={\$this->_id}\" title=\"\">{\$bread_title}</a> / <lang:notes_reply_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}

}
</script>
<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
<a name=\"qwiknote\"></a>
<form method=\"POST\" action=\"<sys:gate>?a=notes&amp;CODE=02&amp;nid={\$this->_id}\" name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:notes_reply_title> {\$note[\'notes_title\']}</h3>
		<h4><lang:form_send_tip></h4>
		<h3><lang:post_field_recipient_title>:</h3>
		<h4><lang:post_field_recipient_tip> ( <a href=\'<sys:gate>?a=members\'><lang:post_field_recipient_link_search></a> )</h4>
		<input type=\'text\' name=\'recipient\' value=\'{\$recipient}\' tabindex=\'1\' />
		<h3><lang:post_field_title>:</h3>
		<h4><lang:post_field_title_tip>.</h4>
		<input type=\'text\' name=\'title\' value=\"{\$note[\'notes_title\']} \"tabindex=\'2\' />
		{\$bbcode}
		<h3><lang:post_emoticon_title></h3>
		<h4><lang:post_emoticon_tip></h4>
		{\$emoticons}
		<h3><lang:post_message_title></h3>
		<h4><lang:post_message_tip> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:post_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:post_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:post_link_length></a> )</h4>
		<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
		<h3><lang:post_field_quote></h3>
		<h4><lang:post_field_quote_tip></h4>
		<textarea name=\"quote\" tabindex=\'3\'>{\$quote}</textarea>
		<h3><lang:post_options></h3>
		<h4><lang:post_options_tip>.</h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_code></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_emoticon></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:post_button_send>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:post_button_reset>\" /></p>
		<input type=\'hidden\' name=\"id\" value=\"{\$this->_id}\" />
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'misc', 'emoticon_row', '	<tr>
		<td class=\'celltwo\'>{\$code[\$i]}</td>
		<td class=\'celltwo\'>
			<a href=\'javascript:add_smilie(\"{\$code[\$i]}\")\'>{\$name[\$i]}</a>
		</td>
	</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'misc', 'emoticon_wrapper', '<script language=\'javascript\'>

	function add_smilie(text)
	{
		opener.document.REPLIER.body.value += \" \" + text + \" \";

	}

</script>
<table class=\"maintable\" cellpadding=\'6\' cellspacing=\'1\' width=\"95%\">
	<tr>
		<td class=\"header\" colspan=\"2\"><lang:emoticon_legend>:</td>
	</tr>
	<tr>
		<th class=\"cellone\" colspan=\'2\'>( <a href=\'javascript:this.close()\'><lang:close_window></a> )</th>
	</tr>
	{\$list}
	<tr>
		<td class=\"footer\" colspan=\"2\">&nbsp;</td>
	</tr>
</table>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'topic_editor', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / <a href=\"<sys:gate>?gettopic={\$this->_id}\" title=\"\">{\$topic[\'topics_title\']}</a> / <lang:mod_edit_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=mod&amp;CODE=03&amp;t={\$this->_id}\">
	<div class=\"formwrap\">
		<h3><lang:mod_form_title> {\$topic[\'topics_title\']}</h3>
		<h4><lang:mod_form_tip></h4>
		<h3><lang:mod_field_title></h3>
		<h4><lang:mod_field_title_tip></h4>
		<input type=\"text\" name=\"title\" value=\"{\$topic[\'topics_title\']}\" />
		<h3><lang:mod_field_subject></h3>
		<h4><lang:mod_field_subject></h4>
		<input type=\"text\" name=\"subject\" value=\"{\$topic[\'topics_subject\']}\" />
		<h3><lang:mod_field_views></h3>
		<h4><lang:mod_field_views_tip></h4>
		<input type=\"text\" name=\"views\" value=\"{\$topic[\'topics_views\']}\" />
		{\$mod_poll}
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" name=\"submit\" value=\"<lang:mod_edit_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:mod_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_table', '{\$buttons}
<hr />
<div class=\"bar\">
	<span>
		<a href=\"<sys:gate>?getforum={\$this->_forum}&amp;CODE=02\" title=\"<lang:forum_subscribe>\"><strong><lang:forum_subscribe></strong></a>
	</span>
	{\$pages}
</div>
<hr />
<div class=\"maintable\">
<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
	<tr>
		<td class=\"header\" colspan=\"5\">{\$forum_data[\'forum_name\']}</td>
	</tr>
	<tr>
		<th width=\"45%\" colspan=\"2\" align=\"left\"><lang:main_col_title></th>
		<th  align=\"center\" width=\"10%\"><lang:main_col_author></th>
		<th width=\"20%\"><lang:main_col_last_post></th>
		<th align=\"center\" width=\"25%\"><lang:topic_posts> / <lang:topic_views></th>
	</tr>
	{\$list}
</table>
</div>
<hr />
<div class=\"bar\">
	<span>
		<a href=\"<sys:gate>?getforum={\$this->_forum}&amp;CODE=01\" title=\"<lang:mark_read>\"><strong><lang:mark_read></strong></a>
	</span>
	{\$pages}
</div>
<hr />
{\$buttons}
<hr />
{\$post}
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'members', 'list_row', '<tr>
	<td class=\"cellone\"><a href=\'<sys:gate>?getuser={\$row[\'members_id\']}\'>{\$row[\'class_prefix\']}{\$row[\'members_name\']}{\$row[\'class_suffix\']}</a></td>
	<td class=\"celltwo\" align=\"center\">{\$row[\'members_posts\']}</td>
	<td class=\"cellone\" align=\"center\">{\$row[\'members_rank\']}</td>
	<td class=\"celltwo\" align=\"center\"><strong>{\$row[\'class_title\']}</strong></td>
	<td class=\"cellone\" align=\"center\">{\$row[\'members_registered\']}</td>
	<td class=\"celltwo\" align=\"center\">{\$row[\'members_homepage\']}</td>
	<td class=\"celllast\" align=\"center\"><a href=\'<sys:gate>?a=notes&amp;CODE=07&amp;send={\$row[\'members_id\']}\'><macro:btn_mini_note></a></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'members', 'list_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:index_title>
</div>
<div class=\"bar\">{\$pages}</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"8\"><lang:index_title>:</td>
		</tr>
		<tr>
			<th width=\"15%\"><lang:member_name></th>
			<th align=\"center\" width=\"10%\"><lang:member_posts></th>
			<th align=\"center\" width=\"10%\"><lang:member_rank></th>
			<th align=\"center\" width=\"20%\"><lang:member_group></th>
			<th align=\"center\" width=\"25%\"><lang:member_joined></th>
			<th align=\"center\" width=\"10%\"><lang:member_page></th>
			<th align=\"center\" width=\"10%\"><lang:member_note></th>
		</tr>
		{\$list}
	</table>
</div>
<div class=\"bar\">{\$pages}</div>
<form method=\"post\" action=\"<sys:gate>?a=members\">
	<div class=\"formwrap\">
		<h3><lang:search_title></h3>
		<p class=\"sort\">
		<lang:search_get> 
		<select name=\'sGroup\'>
			<option value=\'all\'><lang:search_group></option>
			{\$sort_groups}
		</select> by 
		<select name=\'sField\'>
			{\$sort_type}
		</select> <lang:search_in>
		<select name=\'sOrder\'>
			{\$sort_order}
		</select> <lang:search_with>
		<select name=\'sResults\'>
			{\$sort_count}
		</select> <lang:search_per_page> 
		<input class=\"submit\" type=\"submit\" value=\"<lang:search_button>\" />
		</p>
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_row', '<tr>
	<td class=\"cellone {\$row_color}\" width=\"1%\"><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\">{\$row[\'topics_marker\']}</a></td>
	<td class=\"cellone {\$row_color}\">
		{\$row[\'topics_prefix\']} 
		<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}\" title=\"{\$row[\'topics_title\']}\">{\$row[\'topics_title\']}</a> {\$inlineNav}<br />
		<span class=\"subject\">{\$row[\'topics_subject\']}</span>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><strong>{\$row[\'topics_author\']}</strong></td>
	<td class=\"cellone {\$row_color}\">
		<span class=\"lastpost\">{\$row[\'topics_last\']}</span><br />
		<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><lang:topic_last_replied></a> <strong>{\$row[\'topics_poster\']}</strong>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$row[\'topics_posts\']} / {\$row[\'topics_views\']}</h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'active_users', '<div class=\"infowrap\">
	<h1><lang:active_user_title> </h1>
	<h2><lang:active_user_summary> (<a href=\"<sys:gate>?a=active\" title=\"<lang:active_link_details>\"><lang:active_link_details></a>)</h2>
	<p>{\$list}</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'container_main', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb}
</div>
{\$child_forums}
{\$topics}
<div class=\"formwrap\">
	{\$jump}
	<form method=\"post\" action=\"<sys:gate>?a=search&amp;CODE=01\">
		<input type=\"text\" class=\"small_text\" name=\"keywords\" />&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:search_forums>\" />
		<input type=\"hidden\" name=\"forum\" value=\"{\$this->_forum}\" />
	</form>
</div>
{\$active}
{\$board_stats}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'main_buttons', '<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=post&CODE=03&amp;forum={\$this->_forum}\" title=\"<lang:button_new_topic>\"><macro:btn_main_new></a>&nbsp;<a href=\"#qwik\" title=\"<lang:button_new_qwik>\" onclick=\"javascript:return toggleBox(\'qwikform\');\"><macro:btn_main_qtopic></a>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'statistics', '<div class=\"infowrap\">
	<h1><lang:stat_title>:</h1>
	<h2><lang:stat_tip></h2>
	<p><lang:stat_totals><br />
	<lang:stat_newest><br />
	<lang:stat_online></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_bit', '<div id=\"qwikform\" style=\"display: none;\">
	<script language=\"javascript\">
	function check_length()
	{

		var limit = {\$length};

		var length = document.REPLIER.body.value.length;

		if ( (length > limit) ) {

			alert(\'Your message is too long ( \' + length + \' chars ), please shorten it to less than \' + limit + \' characters.\');

		} else {

			alert(\'You are currently using \' + length + \' characters. Maximum allowable amount should not exceed \' + limit);

		}

	}
	</script>
	<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
	<form method=\"POST\" action=\"<sys:gate>?a=post&amp;CODE=00\" name=\"REPLIER\">
		<a name=\"qwik\"></a>
		<div class=\"formwrap\">
			<h3><lang:qwik_title></h3>
			<p class=\"checkwrap\"><lang:qwik_form_tip></p>
			<h3><lang:qwik_form_field_title></h3>
			<h4><lang:qwik_form_field_title_field></h4>
			<input type=\"text\" name=\"title\" />
			<h3><lang:qwik_form_field_body></h3>
			<h4><lang:qwik_form_field_body_tip> ( <a href=\"javascript:smilie_window(\'<sys:gate>\')\" title=\"View emoticon choices\"><lang:qwik_form_link_emoticons></a> &middot; <a href=\"javascript:check_length()\" title=\"Check the length of your topic\"><lang:qwik_form_link_length></a> )</h4>
			<textarea name=\"body\" rows=\"\" cols=\"\"></textarea>
			<p class=\"submit\">
				<input class=\"button\" type=\"submit\" value=\"<lang:qwik_form_button_post>\" />&nbsp;
				<input class=\"reset\" type=\"reset\" value=\"<lang:qwik_form_button_reset>\" />
			</p>
			<input type=\"hidden\" name=\"cOption\" value=\"1\" />
			<input type=\"hidden\" name=\"eOption\" value=\"1\" />
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
			<input type=\"hidden\" name=\"subject\" value=\"\" />
			<input type=\"hidden\" name=\"forum\" value=\"{\$this->_forum}\" />
		</div>
	</form>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'logon', 'form_pass_retrieve_1', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:form_retrieve_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=04\">
	<div class=\"formwrap\">
		<h3><lang:form_retrieve_title></h3>
		<p class=\"checkwrap\"><lang:form_retrieve_tip></p>
		<h3><lang:form_retrieve_field_email></h3>
		<h4><lang:form_retrieve_field_email_tip></h4>
		<input type=\'text\' name=\'email\' tabindex=\'1\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:form_retrieve_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_retrieve_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_note_notify', 'Hello, {\$row[\'members_name\']}

<user:members_name>, from <conf:title> ( <conf:site_link> ), has just sent you a new personal note.
If you wish to read it, click the link below to go straight to your notes index:	

<conf:site_link><sys:gate>?a=notes

If you do not wish to recieve notifications any longer be sure to turn this feature off within your
personal control panel which can be found through the link above.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_subscribe_topic_notice', 'Hello {\$row[\'members_name\']},

{\$row[\'topics_last_poster_name\']}, from <conf:title> ( <conf:site_link> ), has just posted a reply
to a topic you have subscribed to. You may follow the link below to read this post:

<conf:site_link><sys:gate>?gettopic={\$this->_id}&p={\$page}#{\$post}

If you do not wish to recieve subscription notices any longer you may turn this feature 
off within your personal control panel. To do this you may access your UCP through the 
above link.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'help', 'title_row', '<li><a href=\"#{\$count}\" title=\"{\$row[\'help_title\']}\">{\$row[\'help_title\']}</a></li>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'logon', 'form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:form_logon_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:form_logon_title></h3>
		<p class=\"checkwrap\"><lang:form_logon_tip></p>
		<h3><lang:sys_err_option_title></h3>
		<ul>
			<li><a href=\"<sys:gate>?a=register\" title=\"\"><lang:sys_err_option_reg></a></li>
			<li><a href=\"<sys:gate>?a=logon&amp;CODE=03\" title=\"\"><lang:sys_err_option_rec></a></li>
			<li><a href=\"<sys:gate>?a=help\" title=\"\"><lang:sys_err_option_doc></a></li>
		</ul>
		<h3><lang:form_logon_field_username></h3>
		<h4><lang:form_logon_field_username_tip></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:form_logon_field_password></h3>
		<h4><lang:form_logon_field_password_tip></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:form_logon_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_logon_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'help', 'container_help', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:help_crumb_title>
</div>
<div class=\"infowrap\">
    <h1><lang:help_title></h1>
    <h2><lang:help_tip></h2>
    <ul>
        {\$titles}
    </ul>
</div>
{\$entries}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'help', 'content_row', '<div class=\"infowrap\">
	<a name=\"{\$count}\"></a>
	<h3>{\$count}. {\$row[\'help_title\']}</h3>
	<p>{\$row[\'help_content\']}</p>
	<p class=\"top\"><a href=\"javascript:scroll(0,0);\" title=\"<lang:link_top_title>\"><lang:link_top></a></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_footer', '
----------------------------------------------------------------
<lang:mailer_footer> MyTopix | Personal Message Board {\$this->config[\'version\']}.  http://www.jaia-interactive.com');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_wrapper', '			<div id=\"wrap\">
				<h1 id=\"logo\"><a href=\"<sys:gate>?a=main\" title=\"<lang:logo_alt>\">MyTopix</a></h1>
				<ul id=\"top_nav\">
					<li><a href=\"<conf:site_link><sys:gate>?a=members\" title=\"\"><lang:uni_tab_members></a></li>
					<li><a href=\"<conf:site_link><sys:gate>?a=search\" title=\"\"><lang:uni_tab_search></a></li>
					<li><a href=\"<conf:site_link><sys:gate>?a=calendar\" title=\"\"><lang:uni_tab_calendar></a></li>
				</ul>
				{\$this->welcome}
				{\$content}
				<p id=\"copyright\">Powered By: <strong>MyTopix <conf:version></strong><br />Copyright &copy;2004 - 2007,  <a href=\"http://www.jaia-interactive.com/\" title=\"<lang:visit_jaia>\">Jaia Interactive</a> all rights reserved.</p>
			</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_header', '{\$who} <lang:mailer_header> {\$sent}:
----------------------------------------------------------------

');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_member', '<div class=\"welcome\">
	<p class=\"shaft\"><a href=\"<sys:gate>?a=ucp\" title=\"<lang:welcome_control_title>\"><strong><lang:welcome_profile></strong></a> &middot; <a href=\"<sys:gate>?a=search&amp;CODE=03\" title=\"<lang:welcome_latest_title>\"><lang:welcome_latest></a> &middot; <a href=\"<sys:gate>?a=notes\" title=\"<lang:welcome_inbox_title>\"><lang:welcome_messages> (<user:members_newNotes>)</a></p>
	<p><lang:welcome_back>, <a href=\"<sys:gate>?getuser=<user:members_id>\" title=\"<lang:welcome_profile_title>\"><strong><user:members_name></strong></a>! (<a href=\"<sys:gate>?a=logon&CODE=02\" title=\"<lang:welcome_logout_title>\"><lang:welcome_logout></a>)</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_disabled', '<div class=\"welcome\">
        <p class=\"shaft\">&nbsp;</p>
	<p><lang:welcome_disabled></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_guest', '<div class=\"welcome\">
	<p class=\"shaft\"><a href=\"<sys:gate>?a=register&amp;CODE=03\" title=\"\"><lang:welcome_resend_validation></a></p>
	<p><lang:welcome_guest>, <user:members_name>! (<a href=\"<sys:gate>?a=register\" title=\"\"><lang:welcome_register></a> &middot; <a href=\"<sys:gate>?a=logon\" title=\"\"><lang:welcome_logon></a>)</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_message_level_1', '<div id=\"messenger\">
	<h2><lang:messenger_title>:</h2>
	<p>{\$message}</p>
	<h4>(<a href=\"{\$link}\" title=\"<lang:messenger_forward>\"><lang:messenger_forward></a>)</h4>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_admin', '<div class=\"welcome\">
	<p class=\"shaft\"><a href=\"<sys:gate>?a=ucp\" title=\"<lang:welcome_control_title>\"><strong><lang:welcome_profile></strong></a> &middot; <a href=\"<sys:gate>?a=search&amp;CODE=03\" title=\"<lang:welcome_latest_title>\"><lang:welcome_latest></a> &middot; <a href=\"<sys:gate>?a=notes\" title=\"<lang:welcome_inbox_title>\"><lang:welcome_messages> (<user:members_newNotes>)</a> &middot; <a href=\"<conf:site_link>admin/\" title=\"<lang:welcome_admin_title>\"><lang:welcome_link_admin></a></p>
	<p><lang:welcome_back>, <a href=\"<sys:gate>?getuser=<user:members_id>\" title=\"<lang:welcome_profile_title>\"><strong><user:members_name></strong></a>! (<a href=\"<sys:gate>?a=logon&CODE=02\" title=\"<lang:welcome_logout_title>\"><lang:welcome_logout></a>)</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_body', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<!-- Powered By: <conf:application> <conf:version> -->
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en\" xml:lang=\"en\"  dir=\"<lang:text_direction>\">
	<head>
		<title><conf:forum_title> - <lang:powered_by> <conf:application></title>
		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
		<meta name=\"generator\" content=\"editplus\" />
		<meta name=\"author\" content=\"Daniel Wilhelm II Murdoch, wilhelm@jaia-interactive.com, http://www.jaia-interactive.com\" />
		<meta name=\"keywords\" content=\"<conf:application> <conf:version>\" />
		<meta name=\"description\" content=\"\" />
		<script src=\"<sys:skinPath>/js/main.js\" type=\"text/javascript\"></script>
		<link href=\"<sys:skinPath>/styles.css\" rel=\"stylesheet\" type=\"text/css\" title=\"default\" />
	</head>
	<body>
	{\$content}
	</body>
</html>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_board_closed', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:global_board_closed></h3>
		<div id=\"warning\">
			<h3><lang:err_warn_title></h3>
			<p><strong><conf:closed_message></strong></p>
		</div>
		<h3><lang:closed_form_name_title></h3>
		<h4><lang:closed_form_name_title_info></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:closed_form_pass_title></h3>
		<h4><lang:closed_form_pass_title_info></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:closed_form_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:closed_form_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'active', 'active_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"<conf:title>\"><conf:title></a> / <lang:location_active>
</div>
<hr />
<div class=\"bar\">{\$pages}</div>
<hr />
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"4\"><lang:active_title></td>
		</tr>
		<tr>
			<th align=\"left\" width=\"15%\"><lang:col_name></td>
			<th align=\"left\" width=\"25%\"><lang:col_location></td>
			<th align=\"center\" width=\"25%\"><lang:col_last_seen></td>
			<th align=\"center\" width=\"10%\"><lang:col_note></td>
		</tr>
		{\$list}
	</table>
</div>
<hr />
<div class=\"bar\">{\$pages}</div>
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'active', 'active_row', '		<tr>
			<td class=\"cellone {\$row_color}\" align=\"left\">{\$row[\'active_user\']} {\$row[\'active_ip\']}</td>
			<td class=\"cellone {\$row_color}\" align=\"left\">{\$row[\'active_location\']}</td>
			<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'active_time\']}</td>
			<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'active_notes\']}</td>
		</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_message_level_2', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <lang:sys_bread_title>
</div>
<div class=\"formwrap\">
	<h3><lang:sys_err_title></h3>
	<h4><lang:sys_err_desc></h4>
	<div id=\"warning\">
		<h3><lang:err_warn_title></h3>
		<p><strong>{\$message}</strong></p>
	</div>
	<h3><lang:sys_err_option_title></h3>
	<ul>
		<li><a href=\"<sys:gate>?a=register\" title=\"\"><lang:sys_err_option_reg></a></li>
		<li><a href=\"<sys:gate>?a=logon&amp;CODE=03\" title=\"\"><lang:sys_err_option_rec></a></li>
		<li><a href=\"<sys:gate>?a=help\" title=\"\"><lang:sys_err_option_doc></a></li>
	</ul>
</div>
{\$logon_form}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_message_level_2_logon', '<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:sys_log_name_title></h3>
		<h4><lang:sys_log_name_desc></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:sys_log_pass_title></h3>
		<h4><lang:sys_log_pass_desc></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:form_logon_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_logon_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		<input type=\"hidden\" name=\"referer\" value=\"{\$referer}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'register', 'form_coppa_field', '		<p class=\"checkwarn\"><input class=\"check\" type=\"checkbox\" name=\"coppa\" {\$coppa} /> <strong><lang:field_coppa_agree></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_admin_user_name', 'Hello, {\$member[\'members_name\']}

This message is to inform you that your user name for <conf:title> ( <conf:site_link> )
has been modified. Below you will find your new user name:

Username: {\$name}

Log into your account through the link below:
<conf:site_link><sys:gate>?a=logon');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_field_attach', '		<h3><lang:attach_title></h3>
		<h4>{\$size_lang}</h4>
		<p class=\"checkwrap\"><input type=\"file\" name=\"upload\" /></p>');";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'wtf.gif', ':wtf:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'wink.gif', ';)', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'huh.gif', ':huh:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'up.gif', ':up:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'tongue.gif', ':P', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'stare.gif', ':|', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'squint.gif', '>_<', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'smile.gif', ':)', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'sick.gif', ':sick:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'shock.gif', ':o', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'shame.gif', ':shame:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'scared.gif', ':scared:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'sad.gif', ':(', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'rolleyes.gif', ':rolleyes:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'right.gif', ':right:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'rage.gif', ':rage:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'point.gif', ':point:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'nerd.gif', ':nerd:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'lup.gif', ':lup:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'left.gif', ':left:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'ldown.gif', ':ldown:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'laugh.gif', ':laugh:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'joy.gif', ':joy:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'angry.gif', ':angry:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'happy.gif', ':happy:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'grin.gif', ':D', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'glare.gif', ':glare:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'evil.gif', ':evil:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'down.gif', ':down:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'dead.gif', ':dead:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'crazy.gif', ':crazy:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'cool.gif', ':cool:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'booyah.gif', ':booyah:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'blank.gif', ':blank:', 1);";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Newcomer', 0, 1, 'pip_blue.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Common Folk', 25, 3, 'pip_poop.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'MyTopix™ Enthusiast', 100, 4, 'pip_purple.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Needs a Life', 500, 6, 'pip_red.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Post Meister', 1000, 8, 'pip_green.gif', {$dir});";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_announce_old', '<img src=\"{%SKIN%}/post_announce_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'txt_online_sep', ',&nbsp;', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_announce_new', '<img src=\"{%SKIN%}/post_announce_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'txt_bread_sep', '/', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_email', '<img src=\"{%SKIN%}/btn_email.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_go', '<input type=\"image\" src=\"{%SKIN%}/btn_go.gif\" width=\"23px\" height=\"23px\" class=\"small_button\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_prefix', '<img src=\"{%SKIN%}/topic_prefix.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_note_reply', '<img src=\"{%SKIN%}/reply_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_online', '<img src=\"{%SKIN%}/btn_online.gif\" alt=\"\" title=\"\" />&nbsp;', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_pin_old', '<img src=\"{%SKIN%}/post_pinned_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_pin_new', '<img src=\"{%SKIN%}/post_pinned_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_offline', '<img src=\"{%SKIN%}/btn_offline.gif\" alt=\"\" title=\"\" />&nbsp;', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_new_dot', '<img src=\"{%SKIN%}/post_open_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_old_dot', '<img src=\"{%SKIN%}/post_open_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_old', '<img src=\"{%SKIN%}/post_open_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_new', '<img src=\"{%SKIN%}/post_open_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_moved', '<img src=\"{%SKIN%}/post_moved.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_old', '<img src=\"{%SKIN%}/post_locked_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_old_dot', '<img src=\"{%SKIN%}/post_locked_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_new_dot', '<img src=\"{%SKIN%}/post_locked_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_new', '<img src=\"{%SKIN%}/post_locked_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_old_dot', '<img src=\"{%SKIN%}/post_hot_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_old', '<img src=\"{%SKIN%}/post_hot_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_new_dot', '<img src=\"{%SKIN%}/post_hot_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_new', '<img src=\"{%SKIN%}/post_hot_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_post_quote', '<img src=\"{%SKIN%}/post_quote.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_post_edit', '<img src=\"{%SKIN%}/post_edit.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_post_delete', '<img src=\"{%SKIN%}/post_delete.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_mini_pages', '<img src=\"{%SKIN%}/pages.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_note_unread', '<img src=\"{%SKIN%}/note_unread.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_note_read', '<img src=\"{%SKIN%}/note_read.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_mini_box', '<img src=\"{%SKIN%}/mini_box.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_reply', '<img src=\"{%SKIN%}/main_reply.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_qtopic', '<img src=\"{%SKIN%}/main_qtopic.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_qreply', '<img src=\"{%SKIN%}/main_qreply.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_new', '<img src=\"{%SKIN%}/main_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_locked', '<img src=\"{%SKIN%}/main_locked.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_delete_note', '<img src=\"{%SKIN%}/delete_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_subs_old', '<img src=\"{%SKIN%}/cat_subs_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_subs_new', '<img src=\"{%SKIN%}/cat_subs_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_redirect', '<img src=\"{%SKIN%}/cat_red.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_old', '<img src=\"{%SKIN%}/cat_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_new', '<img src=\"{%SKIN%}/cat_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_archived', '<img src=\"{%SKIN%}/cat_archived.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_yim', '<img src=\"{%SKIN%}/btn_yim.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_profile', '<img src=\"{%SKIN%}/btn_profile.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_note', '<img src=\"{%SKIN%}/btn_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_msn', '<img src=\"{%SKIN%}/btn_msn.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_icq', '<img src=\"{%SKIN%}/btn_icq.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_homepage', '<img src=\"{%SKIN%}/btn_homepage.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_aim', '<img src=\"{%SKIN%}/btn_aim.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_go', '<img src=\"{%SKIN%}/btn_go.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_new', '<img src=\"{%SKIN%}/post_poll_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_new_dot', '<img src=\"{%SKIN%}/post_poll_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_old_dot', '<img src=\"{%SKIN%}/post_poll_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_old', '<img src=\"{%SKIN%}/post_poll_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_note_send', '<img src=\"{%SKIN%}/send_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_add_event', '<img src=\"{%SKIN%}/main_event.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_poll', '<img src=\"{%SKIN%}/main_poll.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_clip', '&nbsp;<img src=\"{%SKIN%}/topic_attach_prefix.gif\" alt=\"\" title=\"\" />', 0);";
?><?php
$temps  = array();
$emots  = array();
$titles = array();
$macros = array();
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_attach', '<p class=\"attach\">
	<a href=\"<sys:gate>?a=misc&amp;CODE=01&amp;id={\$row[\'upload_id\']}\" title=\"\">{\$row[\'upload_name\']}</a> <strong><lang:attach_size></strong> {\$row[\'upload_size\']} <strong><lang:attach_hits></strong> {\$row[\'upload_hits\']}
</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_coppa', 'In compliance with the COPPA act your account is currently inactive.

Please print this message out and have your parent or guardian sign and date it. 
Then fax it to:

<conf:coppa_fax>

OR mail it to:

<conf:coppa_mail>

------------------------------ CUT HERE ------------------------------
Permission to Participate at <conf:title> ( <conf:site_link> )

Username: {\$username}
Password: {\$password}
Email:    {\$email}

I HAVE REVIEWED THE INFORMATION PROVIDED BY MY CHILD AND HEREBY GRANT PERMISSION 
TO <conf:title> TO STORE THIS INFORMATION. I UNDERSTAND THIS INFORMATION CAN BE 
CHANGED AT ANY TIME BY ENTERING A PASSWORD. I UNDERSTAND THAT I MAY REQUEST FOR 
THIS INFORMATION TO BE REMOVED FROM <conf:title> AT ANY TIME.


Parent or Guardian: ____________________________
                       (print full name here)
Full Signature:     ____________________________

Today\'s Date:       ____________________________

------------------------------ CUT HERE ------------------------------


Once the administrator has received the above form via fax or regular mail your 
account will be activated.

Please do not forget your password as it has been encrypted in our database and 
we cannot retrieve it for you. However, should you forget your password you can 
request a new one which will be activated in the same way as this account.

Thank you for registering.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'form_error_wrapper', '<div id=\"warning\">
<h3><lang:err_wrap_title></h3>
<p><strong><lang:err_wrap_desc></strong></p>
<ul>{\$err_list}</ul>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_files_none', '<tr>
	<td colspan=\"7\" align=\"center\"><strong><lang:file_none></strong></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_files_row', '<tr>
	<td class=\"one\" align=\"center\"><strong>{\$row[\'upload_id\']}</strong></td>
	<td><a href=\"<sys:gate>?a=misc&amp;CODE=01&amp;id={\$row[\'upload_id\']}\" title=\"\">{\$row[\'upload_name\']}</a></td>
	<td class=\"one\"><a href=\"<sys:gate>?a=read&amp;CODE=02&amp;p={\$row[\'upload_post\']}\" title=\"\">{\$row[\'topics_title\']}</a></td>
	<td align=\"center\">{\$row[\'upload_date\']}</td>
	<td class=\"one\" align=\"center\">{\$row[\'upload_size\']}</td>
	<td align=\"center\">{\$row[\'upload_hits\']}</td>
	<td class=\"one\" align=\"center\"><a href=\"<sys:gate>?a=ucp&amp;CODE=18&amp;id={\$row[\'upload_id\']}\" title=\"\" onclick=\"javascript: return confirm(\'<lang:file_link_del_conf>\');\"><lang:file_link_del></a></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_new_note', '<div id=\"message_alert\">
	<h3><lang:note_title></h3>
	<p><a href=\"<sys:gate>?getuser={\$note[\'members_id\']}\" title=\"\">{\$note[\'members_name\']}</a> <lang:note_desc> <a href=\"<sys:gate>?a=notes&amp;CODE=01&amp;nid={\$note[\'notes_id\']}\" title=\"\">{\$note[\'notes_title\']}</a>!</p>
</div>
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'mod_poll_option_row', '		<input type=\"text\" name=\"choice[{\$val[\'id\']}]\" style=\"width: 60%;\" tabindex=\"2\" value=\"{\$val[\'choice\']}\" /><input type=\"text\" name=\"votes[{\$val[\'id\']}]\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$val[\'votes\']}\" /><br />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'attach_rem_field', '<p class=\"checkwarn\"><input type=\"checkbox\" class=\"check\" name=\"remove_attach\" value=\"1\"  />&nbsp;<lang:attach_rem>&nbsp;( <a href=\"<sys:gate>?a=misc&amp;CODE=01&amp;id={\$file_id}\">{\$file_name}</a> )</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'mod_poll_wrapper', '		<h3><lang:mod_poll_editor_title></h3>
		<h4><lang:mod_poll_editor_desc></h4>
		<input type=\"text\" name=\"poll_title\" tabindex=\"1\" value=\"{\$poll[\'poll_question\']}\" />
		<h3><lang:poll_choice_title></h3>
		<h4><lang:poll_choice_desc></h4>
		{\$choices}
		<h3><lang:poll_expire_title></h3>
		<h4><lang:poll_expire_desc></h4>
		<input type=\"text\" name=\"days\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$days}\" />
		<h3><lang:poll_lock_title></h3>
		<h4><lang:poll_lock_desc></h4>
		<input type=\"text\" name=\"vote_lock\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$poll[\'poll_vote_lock\']}\" />
		<h3><lang:poll_options_title></h3>
		<h4><lang:poll_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"poll_only\" value=\"1\" tabindex=\"3\" {\$poll_only} /> <lang:poll_lock_option></p>
		<p class=\"checkwarn\"><input type=\"checkbox\" class=\"check\" name=\"remove\" value=\"1\" tabindex=\"3\" /> <lang:poll_delete></p>
		<input type=\"hidden\" name=\"poll\" value=\"{\$poll[\'poll_id\']}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_result_wrapper', '<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"2\">{\$poll[\'poll_question\']}</td>
		</tr>
		<tr>
			<th width=\"50%\"><lang:poll_tbl_header_choice></th>
			<th><lang:poll_tbl_header_result></th>
		</tr>
			{\$poll_list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_poll_choice_row', '<tr>
	<td class=\"cellone np\"><p class=\"checkwrap\"><input type=\"radio\" name=\"vote\" class=\"check\" id=\"choice_{\$val[\'id\']}\" value=\"{\$val[\'id\']}\" />&nbsp;<label for=\"choice_{\$val[\'id\']}\"><strong>{\$val[\'choice\']}</strong></label></p></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_poll_result_row', '<tr>
	<td class=\"cellone\"><strong>{\$val[\'choice\']}</strong></td>
	<td class=\"cellone\" align=\"right\"><img src=\"<sys:skinPath>/bar_left.gif\" alt=\"\" /><img src=\"<sys:skinPath>/bar_center.gif\" alt=\"\" width=\"{\$width}\" height=\"17px\" /><img src=\"<sys:skinPath>/bar_right.gif\" alt=\"\" /><br />{\$percent}% ( {\$val[\'votes\']} votes ) --
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_option_poll', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"poll\" value=\"1\" {\$poll_check} /> <lang:post_options_poll></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_choice_wrapper', '<form method=\"post\" action=\"<sys:gate>?a=read&amp;CODE=05&amp;t={\$this->_id}\">
	<div class=\"maintable\">
		<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
			<tr>
				<td class=\"header\">{\$poll[\'poll_question\']}</td>
			</tr>
			<tr>
				<th>&nbsp;</th>
			</tr>
				{\$poll_list}
		</table>
	</div>
<p class=\"submit\"><input type=\"button\" value=\"<lang:poll_submit_add>\" style=\"width: auto;\" /></p>
	<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_attach_poll', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / <a href=\"<sys:gate>?gettopic={\$this->_id}\" title=\"\">{\$topic[\'topics_title\']}</a> / <lang:poll_bread_title>
</div>
{\$error_list}
<form method=\"POST\" action=\"<sys:gate>?a=post&amp;CODE=08&amp;t={\$this->_id}\">
	<div class=\"formwrap\">
		<h3><lang:poll_title_title></h3>
		<h4><lang:poll_title_desc></h4>
		<input type=\"text\" name=\"title\" tabindex=\"1\" value=\"{\$title}\" />
		<h3><lang:poll_choice_title></h3>
		<h4><lang:poll_choice_desc></h4>
		<textarea name=\"choices\" tabindex=\"1\">{\$choices}</textarea>
		<h3><lang:poll_expire_title></h3>
		<h4><lang:poll_expire_desc></h4>
		<input type=\"text\" name=\"days\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$days}\" />
		<h3><lang:poll_lock_title></h3>
		<h4><lang:poll_lock_desc></h4>
		<input type=\"text\" name=\"vote_lock\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$vote_lock}\" />
		<h3><lang:poll_options_title></h3>
		<h4><lang:poll_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"poll_only\" value=\"1\" tabindex=\"3\" {\$poll_only} /> <strong><lang:poll_lock_option></strong></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:poll_button_submit>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:poll_button_reset>\" /></p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_edit_event_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=calendar\" title=\"\"><lang:bread_title_two></a> / <a href=\"<sys:gate>?getevent={\$this->_id}\" title=\"\">{\$row[\'event_title\']}</a> / <lang:edit_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}
}
</script>
<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
<a name=\"qwiknote\"></a>
<form method=\"POST\" action=\"<sys:gate>?a=calendar&amp;CODE=06&amp;id={\$this->_id}\" name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:form_add_type_title></h3>
		<h4><lang:form_add_type_desc></h4>
		<p class=\"checkwrap\">
			<strong><lang:form_start_date_on></strong>&nbsp;
			<select name=\"start_month\">{\$start_months}</select>&nbsp;
			<select name=\"start_day\">{\$start_days}</select>&nbsp;
			<select name=\"start_year\">{\$start_years}</select>
		</p>
		<p class=\"checkwrap\">
			<strong><lang:form_loop_every> </strong>&nbsp;
			<select name=\"loop_type\">{\$loop_types}</select>&nbsp;<strong><lang:form_loop_until></strong>&nbsp;
			<select name=\"end_month\">{\$end_months}</select>&nbsp;
			<select name=\"end_day\">{\$end_days}</select>&nbsp;
			<select name=\"end_year\">{\$end_years}</select>
		</p>
		{\$groups}
		<h3><lang:form_add_title_title></h3>
		<h4><lang:form_add_title_desc></h4>
		<input type=\'text\' name=\'title\' tabindex=\'1\' value=\"{\$title}\">
		{\$bbcode}
		<h3><lang:form_emoticon_title></h3>
		<h4><lang:form_emoticon_desc></h4>
		{\$emoticons}
		<h3><lang:form_body_title></h3>
		<h4><lang:form_body_desc> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:form_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:form_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:form_link_length></a> )</h4>
		<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
		<h3><lang:form_options_title></h3>
		<h4><lang:form_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" {\$code_check} /> <lang:form_code_desc></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" {\$emo_check} /> <lang:form_emo_desc></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:form_button_update>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:form_button_reset>\" /></p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_month_event', '<p>{\$event}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_read_event', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=calendar\" title=\"\"><lang:bread_title_two></a> / <lang:bread_title_read> {\$row[\'event_title\']}
</div>
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=calendar&CODE=02\" title=\"\"><macro:btn_add_event></a>
</div>
<div class=\"postwrap\">
	<div class=\"postheader\">{\$row[\'event_title\']} <em>( {\$type} )</em></div>
	<div class=\"user\">
		<p><a href=\"<sys:gate>?getuser={\$row[\'members_id\']}\" title=\"<lang:entry_link_profile>\"><strong>{\$row[\'members_name\']}</strong></a> <em>( <a href=\"<sys:gate>?a=search&CODE=02&mid={\$row[\'members_id\']}\" title=\"<lang:entry_post_find> {\$row[\'members_name\']}\">{\$row[\'members_posts\']}</a> )</em>
		<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span>
		<span><strong>&middot; <lang:entry_rank></strong> {\$row[\'members_pips\']}</span></p>
		{\$avatar}
	</div>
	<div class=\"post\">
		<h5><span>{\$link_delete}&nbsp;{\$link_edit}</span><strong><lang:event_started></strong> {\$date_starts} <strong><lang:event_ends></strong> {\$date_ends}</h5>
		<p>{\$row[\'event_body\']}</p>{\$sig}
	</div>
	<div class=\"foot\">
		<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:read_link_top_title>.\"><lang:read_link_top></a></span>
		<ul class=\"extras\">{\$active}{\$linkSpan}</ul>
	</div>
	<div class=\"postend\">&nbsp;</div>
</div>
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=calendar&CODE=02\" title=\"\"><macro:btn_add_event></a>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_group_list', '		<h3><lang:form_groups_title></h3>
		<h4><lang:form_groups_desc></h4>
		<p class=\"checkwrap\"><select name=\"groups[]\" size=\"5\" multiple=\"multiple\" style=\"width: 200px;\" class=\"jump\">{\$group_list}</select></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_new_event_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=calendar\" title=\"\"><lang:bread_title_two></a> / <lang:add_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}
}
</script>
<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
<a name=\"qwiknote\"></a>
<form method=\"POST\" action=\"<sys:gate>?a=calendar&amp;CODE=03\" name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:form_add_type_title></h3>
		<h4><lang:form_add_type_desc></h4>
		<p class=\"checkwrap\">
			<strong><lang:form_start_date_on> </strong>&nbsp;
			<select name=\"start_month\">{\$start_months}</select>&nbsp;
			<select name=\"start_day\">{\$start_days}</select>&nbsp;
			<select name=\"start_year\">{\$start_years}</select>
		</p>
		<p class=\"checkwrap\">
			<strong><lang:form_loop_every> </strong>&nbsp;
			<select name=\"loop_type\">{\$loop_types}</select>&nbsp;<strong><lang:form_loop_until></strong>&nbsp;
			<select name=\"end_month\">{\$end_months}</select>&nbsp;
			<select name=\"end_day\">{\$end_days}</select>&nbsp;
			<select name=\"end_year\">{\$end_years}</select>
		</p>
		{\$groups}
		<h3><lang:form_add_title_title></h3>
		<h4><lang:form_add_title_desc></h4>
		<input type=\'text\' name=\'title\' tabindex=\'1\' value=\"{\$title}\" />
		{\$bbcode}
		<h3><lang:form_emoticon_title></h3>
		<h4><lang:form_emoticon_desc></h4>
		{\$emoticons}
		<h3><lang:form_body_title></h3>
		<h4><lang:form_body_desc> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:form_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:form_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:form_link_length></a> )</h4>
		<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
		<h3><lang:form_options_title></h3>
		<h4><lang:form_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" checked=\"checked\" /> <lang:form_code_desc></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" checked=\"checked\" /> <lang:form_emo_desc></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:form_button_submit>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:form_button_reset>\" /></p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_blank_row', '<td class=\"{\$class}\">&nbsp;</td>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_date_row', '<td class=\"{\$class}\"><h4>{\$day}</h4><div class=\"events\">{\$events}</div></td>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_month_wrapper', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:bread_title> {\$lit_month}, {\$lit_year}
</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"2\" align=\"left\"><a href=\"<sys:gate>?a=calendar{\$link_prev}\" title=\"\">« {\$link_prev_lit_month}, {\$link_prev_lit_year}</a></td>
			<td class=\"header\" colspan=\"3\" align=\"center\">{\$lit_month}, {\$lit_year}</td>
			<td class=\"header\" colspan=\"2\" align=\"right\"><a href=\"<sys:gate>?a=calendar{\$link_next}\" title=\"\">{\$link_next_lit_month}, {\$link_next_lit_year} »</a></td>
		</tr>
		<tr>
			<th width=\"14%\" align=\"center\"><lang:lit_day_one></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_two></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_three></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_four></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_five></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_six></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_seven></th>
		</tr>
			{\$day_list}
	</table>
</div>
<div class=\"postbutton\"><a href=\"<sys:gate>?a=calendar&amp;CODE=02\" title=\"\"><macro:btn_add_event></a>
</div>
<form method=\"post\" action=\"<sys:gate>?a=calendar\">
<div class=\"formwrap\"><p class=\"sort\">
					<select name=\"month\" class=\"jump\">{\$months}</select>
					<select name=\"year\" class=\"jump\">{\$years}</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"go\" /></p>
</div>
				</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_avatar_row', '<td align=\"center\">
	<label for=\"{\$val}\"><img src=\"<sys:sys_path>sys_images/ava_gallery/{\$gallery}/{\$val}\" alt=\"{\$val}\" /><br />
	<strong>{\$val}</strong></label><br /><input type=\"radio\" class=\"check\" name=\"avatar\" value=\"{\$val}\" id=\"{\$val}\" />
</td>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_avatar_gallery_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:ava_gallery_form_title></h3>
	<p class=\"checkwrap\"><lang:ava_tip></p>
	<h3><lang:ava_gallery_title></h3>
	<h4><lang:ava_gallery_tip></h4>
	<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=15\">
		<p class=\"checkwrap\">
			<select name=\"gallery\" class=\"jump\">
				{\$gallery_list}
			</select>
		</p>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:ava_gallery_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</form>
	<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=16\">
		<div id=\"maintable\">
			<table cellpadding=\"15\" cellspacing=\"1\" width=\"100%\">
				{\$avatar_rows}
			</table>
		</div>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:ava_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		<input type=\"hidden\" name=\"gallery\" value=\"{\$gallery}\" />
	</form>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sub_forum_row', '		<tr>
			<td align=\"center\" class=\"one\" width=\"1%\"><macro:icon_open_new></td>
			<td><a href=\"<sys:gate>?getforum={\$row[\'forum_id\']}\" title=\"\"><strong>{\$row[\'forum_name\']}</strong></a></td>
			<td align=\"center\" class=\"one\">{\$row[\'track_date\']}</td>
			<td align=\"center\"><a href=\"<sys:gate>?a=ucp&amp;CODE=13&amp;forum={\$row[\'forum_id\']}\" title=\"\"><strong><lang:sub_delete></strong></a></td>
		</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_stats', '<div class=\"infowrap\">
	<h1><lang:stat_title>:</h1>
	<h2><lang:stat_tip></h2>
	<p><lang:stat_totals><br />
	<lang:stat_newest><br />
	<lang:stat_online></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_announce', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"announce\" value=\"1\" {\$check[\'announce\']} /> <strong><lang:post_mod_options_announce></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_avatar_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:ava_title></h3>
	<p class=\"checkwrap\"><lang:ava_tip></p>
	<h4><strong><lang:ava_current></strong><br /> {\$avatar}</h4>
	<h4><lang:ava_ext> {\$ext}</h4>
</div>
<div class=\"formwrap\">
	<h3><lang:ava_gallery_title></h3>
	<h4><lang:ava_gallery_tip></h4>
	<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=15\">
		<p class=\"checkwrap\">
			<select name=\"gallery\" class=\"jump\">
				{\$gallery_list}
			</select>
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		</p>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:ava_gallery_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</form>
</div>
<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=17\" enctype=\'multipart/form-data\'>
	<div class=\"formwrap\">
		<h3><lang:ava_url_title></h3>
		<h4><lang:ava_url_tip></h4>
		<input type=\"text\" name=\"url\" value=\"{\$url}\" />
	</div>
	<div class=\"formwrap\">
		<h3><lang:ava_upload_title></h3>
		<h4><lang:ava_upload_tip></h4>
		<input type=\"file\" name=\"upload\" />
	</div>
	<div class=\"formwrap\">
		<h3><lang:ava_remove_title></h3>
		<p class=\"checkwarn\"><input type=\"checkbox\" class=\"check\" name=\"remove\" value=\"1\" /> <strong><lang:ava_remove_warn></strong></p>
		<p class=\"submit\">
		<input class=\"button\" type=\"submit\" value=\"<lang:ava_submit>\" />&nbsp;
		<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_jump_list', '	<form method=\"post\" action=\"<sys:gate>?a=topics\">
		<p class=\"sort\"><select name=\"forum\" class=\"jump\">
			{\$jump_list}
		</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:forum_jump>\" /></p>
	</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_mod_list', '	<form method=\"post\" action=\"<sys:gate>?a=mod&amp;t={\$this->_id}\" class=\"shaft\">
		<p class=\"sort\"><select name=\"CODE\" class=\"jump\">
			{\$mod_list}
		</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:mod_list>\" /></p>
		<input type=\"hidden\"  name=\"hash\" value=\"{\$hash}\" />
	</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topics_active', '<div class=\"infowrap\">
	<h1><lang:viewers_title></h1>
	<h2><lang:viewers_user_summary> ( <a href=\"<sys:gate>?a=active\" title=\"\"><lang:active_link_details></a> )</h2>
	<p>{\$list}</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_mod_wrapper', '<p class=\"moderator_list\"><em><lang:mod_label></em> {\$mod_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_sub_wrapper', '<p class=\"subforum_list\">{\$sub_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_mod_wrapper', '<p class=\"moderator_list\"><em><lang:mod_label></em> {\$mod_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_sub_wrapper', '<p class=\"subforum_list\">{\$sub_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_subscribe_forum_notice', 'Hello {\$row[\'members_name\']},

{\$topic[\'topics_last_poster_name\']}, from <conf:title> ( <conf:site_link> ), has just posted a reply
to a forum you have subscribed to ( {\$row[\'forum_name\']} ). You may follow the link below to 
read this topic:

<conf:site_link><sys:gate>?gettopic={\$topic[\'topics_id\']}

If you do not wish to receive subscription notices any longer you may turn this feature 
off within your personal control panel. To do this you may access your UCP through the 
above link.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_subs', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:sub_title></h3>
	<p class=\"checkwrap\"><lang:sub_tip></p>
	<h3><lang:sub_topics_title></h3>
	<h4><lang:sub_topics_desc></h4>
	<table class=\"ucp_table\" cellpadding=\"3\" cellspacing=\"1\">
		{\$topics}
	</table>
	<h3><lang:sub_forums_title></h3>
	<h4><lang:sub_forums_desc></h4>
	<table class=\"ucp_table\" cellpadding=\"3\" cellspacing=\"1\">
		{\$forums}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_field_subject', '		<h3><lang:post_field_subject></h3>
		<h4><lang:post_field_subject_tip></h4>
		<input type=\"text\" name=\"subject\" tabindex=\"1\" value=\"{\$subject}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_last_post', '	<span class=\"lastpost\">{\$last_date}</span><br />
	<strong><lang:last_post_in></strong> {\$forum[\'forum_last_post_title\']}<br />
	<strong><lang:last_post_by></strong> {\$forum[\'forum_last_post_user_name\']}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_wrapper', '		<h3><lang:post_options></h3>
		<h4><lang:post_options_tip></h4>
		{\$lock}
		{\$pin}
		{\$announce}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_pin', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"stick\" value=\"1\" {\$check[\'stuck\']} /> <strong><lang:post_mod_options_pin></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_option_bar', '		<h3><lang:post_options></h3>
		<h4><lang:post_options_tip>.</h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" {\$check_code} /> <lang:post_options_code></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" {\$check_emoticon} /> <lang:post_options_emoticon></p>
		{\$poll}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'topic_prefix', '<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><macro:img_prefix></a>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_button', '<a href=\"<sys:gate>{\$url}\" title=\"{\$title}\"><img src=\"<sys:skinPath>/{\$button}.gif\" alt=\"\" /></a>&nbsp;');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_cat_redirect', '<tr>
	<td class=\"cellone {\$row_color}\" width=\"1%\" align=\"center\"><macro:cat_redirect></td>
	<td class=\"cellone {\$row_color}\" colspan=\"2\">
		<h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$forum[\'forum_name\']}</a></h4>
		<p>{\$forum[\'forum_description\']}</p>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$forum[\'forum_red_clicks\']} <lang:cat_redirect></h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_cat_wrapper', '<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"5\"><a href=\"<sys:gate>?getforum={\$category[\'forum_id\']}\" title=\"{\$category[\'forum_name\']}\">{\$category[\'forum_name\']}</a></td>
		</tr>
		<tr>
			<th colspan=\"2\" align=\"left\" width=\"50%\"><lang:topics_col_forum></th>
			<th align=\"left\" width=\"30%\"><lang:topics_col_topics></th>
			<th align=\"center\" width=\"20%\"><lang:topics_col_topics> / <lang:topics_col_replies></th>
		</tr>
		{\$forum_list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_last_post', '	<span class=\"lastpost\">{\$last_date}</span><br />
	<strong><lang:last_post_in></strong> {\$forum[\'forum_last_post_title\']}<br />
	<strong><lang:last_post_by></strong> {\$forum[\'forum_last_post_user_name\']}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_news_section', '<p id=\"community_news\">
	<strong><lang:news_title>: <a href=\"<sys:gate>?a=read&amp;CODE=02&amp;p={\$news[\'news_post\']}\" title=\"<lang:news_title>\">{\$news[\'news_title\']}</a></strong><br />
	<cite>--<lang:news_date> {\$news[\'news_date\']}.</cite>
</p>
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_none', '							<tr>
								<td class=\"cellone\" align=\"center\" colspan=\"6\"><strong><lang:no_topics></strong></td>
							</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_cat_row', '<tr>
	<td class=\"cellone {\$row_color}\" width=\"1%\" align=\"center\">
		<a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$marker}</a>
	</td>
	<td class=\"cellone {\$row_color}\">
		<h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$forum[\'forum_name\']}</a></h4>
		{\$subs}
		<p>{\$forum[\'forum_description\']}{\$mods}</p>
	</td>
	<td class=\"cellone {\$row_color}\">{\$last_post}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$forum[\'forum_topics\']} / {\$forum[\'forum_posts\']}</h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sub_none', '<tr>
	<td colspan=\"4\" align=\"center\"><strong><lang:main_sub_none></strong></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sub_topic_row', '		<tr>
			<td align=\"center\" class=\"one\"><macro:icon_open_new></td>
			<td><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}\" title=\"\"><strong>{\$row[\'topics_title\']}</strong></a></td>
			<td align=\"center\" class=\"one\">{\$row[\'track_date\']}</td>
			<td align=\"center\"><a href=\"<sys:gate>?a=ucp&amp;CODE=12&amp;id={\$row[\'topics_id\']}\" title=\"\"><strong><lang:sub_delete></strong></a></td>
		</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_container', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <lang:bread_title>
</div>
<hr />
{\$new_note}
{\$news_bit}
{\$category_list}
<hr />
<div class=\"bar\"><span><a href=\"<sys:gate>?a=logon&amp;CODE=06\" title=\"<lang:link_delete_cookies>\"><strong><lang:link_delete_cookies></strong></a> &middot; <a href=\"<sys:gate>?a=logon&amp;CODE=07\" title=\"<lang:link_mark_all_read>\"><strong><lang:link_mark_all_read></strong></a></span>&nbsp;</div>
<hr />
{\$active_users}
<hr />
{\$board_stats}
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_cat_row', '<tr>
	<td class=\"cellone {\$row_color}\" width=\"1%\" align=\"center\">
		<a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$marker}</a>
	</td>
	<td class=\"cellone {\$row_color}\">
		<h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$forum[\'forum_name\']}</a></h4>
		{\$subs}
		<p>{\$forum[\'forum_description\']}{\$mods}</p>
	</td>
	<td class=\"cellone {\$row_color}\">{\$last_post}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$forum[\'forum_topics\']} / {\$forum[\'forum_posts\']}</h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_cat_redirect', '<tr>
	<td class=\"cellone {\$row_color}\" width=\"1%\" align=\"center\"><macro:cat_redirect></td>
	<td class=\"cellone {\$row_color}\" colspan=\"2\">
		<h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$forum[\'forum_name\']}</a></h4>
		<p>{\$forum[\'forum_description\']}</p>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$forum[\'forum_red_clicks\']} <lang:cat_redirect></h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_cat_wrapper', '<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"5\"><a href=\"<sys:gate>?getforum={\$category[\'forum_id\']}\" title=\"{\$category[\'forum_name\']}\">{\$category[\'forum_name\']}</a></td>
		</tr>
		<tr>
			<th colspan=\"2\" align=\"left\" width=\"50%\"><lang:main_col_forum></th>
			<th align=\"left\" width=\"30%\"><lang:main_col_latest></th>
			<th align=\"center\" width=\"20%\"><lang:main_col_topics> / <lang:main_col_replies></th>
		</tr>
		{\$forum_list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'register', 'resend_validation_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:validate_crumb_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=register&amp;CODE=04\">
	<div class=\"formwrap\">
		<h3><lang:validate_title></h3>
		<p class=\"checkwrap\"><lang:validate_tip></p>
		<h3><lang:validate_field_email></h4>
		<h4><lang:validate_field_email_tip></h3>
		<input type=\'text\' name=\'email\' tabindex=\'1\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:validate_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:validate_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_registration_complete', 'Hello, {\$username}

The account you created at <conf:title> ( <conf:site_link> ) is now activated and ready to
use. Depending on your browser settings you may or may not be automatically logged in.
If not just use the following link to log your account:

<conf:site_link><sys:gate>?a=logon

Thank you for participating in our community!');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_main', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:main_title></h3>
	<p class=\"checkwrap\"><lang:main_tip></p>
	<h3><lang:main_email></h3>
	<h4><user:members_email></h4>
	<h3><lang:main_joined></h3>
	<h4>{\$join_date}</h4>
	<h3><lang:main_posts></h3>
	<h4><a href=\"<sys:gate>?a=search&amp;CODE=02&amp;mid=<user:members_id>\">{\$total_posts}</a> <lang:main_posts_stat></h4>
	<h3><lang:main_notes></h3>
	<h4><a href=\"<sys:gate>?a=notes\">{\$total_notes}</a> <lang:main_notes_stat></h4>
	<h3><lang:file_title></h3>
	<h4><lang:file_desc></h4>
	<table class=\"ucp_table\" cellpadding=\"3\" cellspacing=\"1\" with=\"100%\">
		<tr>
			<th width=\"1%\" align=\"center\"><lang:file_col_id></th>
			<th><lang:file_col_name></th>
			<th><lang:file_col_topic></th>
			<th align=\"center\"><lang:file_col_date></th>
			<th align=\"center\"><lang:file_col_size></th>
			<th align=\"center\"><lang:file_col_hits></th>
			<th>&nbsp;</th>
		</tr>
		{\$files}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_tabs', '<ul id=\"ucp_tabs\">
	{\$list}
</ul>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_match_result_row', '<tr>
	<td class=\"cellone {\$row_color}\" align=\"center\" width=\"1%\"><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\">{\$row[\'topics_marker\']}</a></td>
	<td class=\"cellone {\$row_color}\">
		{\$row[\'topics_prefix\']} 
		<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;hl={\$hlLink}\" title=\"{\$row[\'topics_title\']}\">{\$row[\'topics_title\']}</a> {\$inlineNav}<br />
		<span class=\"subject\">{\$row[\'topics_subject\']}</span>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><strong>{\$row[\'topics_author\']}</strong></td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><a href=\"<sys:gate>?getforum={\$row[\'topics_forum\']}\" title=\"\">{\$row[\'forum_name\']}</a></td>
	<td class=\"cellone {\$row_color}\">
		<span class=\"lastpost\">{\$row[\'topics_last\']}</span><br />
		<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><lang:topic_last_replied>:</a> <strong>{\$row[\'topics_poster\']}</strong>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$row[\'topics_posts\']} / {\$row[\'topics_views\']}</h2></td>
<!--<span><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><macro:img_mini_box></a> {\$row[\'topics_last\']}</span><lang:topic_last_replied>: <strong>{\$row[\'topics_poster\']}</strong></td>-->
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_match_result_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=search\" title=\"<lang:search_form_title>\"><lang:search_form_title></a> / <strong>{\$count}</strong> <lang:search_result_title>:
</div>
<div class=\"bar\">{\$pages}</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"6\">{\$count} <lang:search_result_title></td>
		</tr>
		<tr>
			<th align=\"left\" width=\"30%\" colspan=\"2\"><lang:result_col_title></th>
			<th align=\"center\" width=\"10%\"><lang:result_col_author></th>
			<th align=\"center\" width=\"20%\"><lang:result_col_forum></th>
			<th align=\"center\" width=\"20%\"><lang:result_col_last></th>
			<th align=\"center\" width=\"15%\"><lang:result_col_replies> / <lang:result_col_views></th>
		</tr>
		{\$list}
	</table>
</div>
<div class=\"bar\">{\$pages}</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_pass_get_1', 'You have recently attempted to recover your password from <conf:title> ( <conf:site_link> ).
To complete the process you must click the following link to validate your request. Once validation is 
complete you will be mailed your new account password. You will be able to change this password at anytime 
via your control panel.

{\$url}

Take note that this validation link will expire within 24 hours.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_admin_user', 'Hello, {\$name}

This message is to inform you that your account for <conf:title> ( <conf:site_link> )
has been activated. Below you will find your account access information which you may change
at anytime through your personal control panel.

Username: {\$name}
Password: {\$password}

Log your account through the link below:
<conf:site_link><sys:gate>?a=logon\";');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_pass_get_2', 'Hello, {\$row[\'members_name\']}

This message is to inform you that your account for <config:title> ( <config:site_link> )
has been activated. Below you will find your account access information which you may change
at anytime through your personal control panel.

Username: {\$row[\'members_name\']}
Password: {\$pass}

Log your account through the link below:

<conf:site_link><sys:gate>?a=logon');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_email', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=10\'>
	<div class=\"formwrap\">
		<h3><lang:email_title></h3>
		<p class=\"checkwrap\"><lang:email_tip></p>
		<h4><strong><lang:email_current></strong> <user:members_email></h4>
		<h3><lang:email_field_pass></h3>
		<h4><lang:email_field_pass_tip></h4>
		<input type=\"password\" name=\"password\" />
		<h3><lang:email_field_new></h3>
		<h4><lang:email_field_new_tip></h4>
		<input type=\"text\" name=\"new\" value=\"{\$email_one}\" />
		<h3><lang:email_field_con></h3>
		<h4><lang:email_field_con_tip></h4>
		<input type=\"text\" name=\"confirm\" value=\"{\$email_two}\" />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:email_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:email_button_reset>\" />
		</p>
	</div>
	<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_options', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=08\'>
	<div class=\"formwrap\">
		<h3><lang:board_title></h3>
		<p class=\"checkwrap\"><lang:board_tip></p>
		<h3><lang:board_field_skin></h3>
		<h4><lang:board_field_skin_tip></h4>
		<p class=\"checkwrap\"><select name=\"skin\">
			{\$skins}
		</select></p>
		<h3><lang:board_field_lang></h3>
		<h4><lang:board_field_lang_tip></h4>
		<p class=\"checkwrap\"><select name=\"lang\">
			{\$langs}
		</select></p>
		<h3><lang:board_field_zone></h3>
		<h4><lang:board_field_zone_tip></h4>
		<p class=\"checkwrap\"><select name=\"zone\">
			{\$zones}
		</select></p>
		<h3><lang:board_field_notify></h3>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"notes\" value=\"1\"{\$checked[\'notes\']} /> <b><lang:board_field_note>?</b></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"sigs\" value=\"1\"{\$checked[\'sigs\']} /> <b><lang:board_field_sigs>?</b></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"avatars\" value=\"1\"{\$checked[\'avatars\']} /> <b><lang:board_field_avatars>?</b></p>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:board_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'print', 'print_row', '<div id=\"resultwrap\">
	<h3><a href=\'<sys:gate>?getuser={\$row[\'members_id\']}\'><strong>{\$row[\'members_name\']}</strong></a> | <span>{\$row[\'posts_date\']}</span></h3>
	<div class=\"post\"><p>{\$row[\'posts_body\']}</p></div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_lock', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"lock\" value=\"1\" {\$check[\'locked\']} /> <strong><lang:post_mod_options_lock></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'post_name_field', '		<h3><lang:post_field_name></h3>
		<h4><lang:post_field_name_tip></h4>
		<input type\"text\" name=\"name\" tabindex=\"1\" value=\"{\$name}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_banned', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:banned_title></h3>
		<div id=\"warning\">
			<h3><lang:err_warn_title></h3>
			<p><strong><lang:banned_info></strong></p>
		</div>
		<h3><lang:banned_form_name_title></h3>
		<h4><lang:banned_form_name_title_info></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:banned_form_pass_title></h3>
		<h4><lang:banned_form_pass_title_info></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:banned_form_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:banned_form_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_pass', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=06\'>
	<div class=\"formwrap\">
		<h3><lang:pass_title></h3>
		<p class=\"checkwrap\"><lang:pass_tip></p>
		<h3><lang:pass_field_password></h3>
		<h4><lang:pass_field_password_tip></h4>
		<input type=\"password\" name=\"current\" />
		<h3><lang:pass_field_new></h3>
		<h4><lang:pass_field_new_tip></h4>
		<input type=\"password\" name=\"new\" />
		<h3><lang:pass_field_con></h3>
		<h4><lang:pass_field_con_tip></h4>
		<input type=\"password\" name=\"confirm\"\" />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:pass_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:pass_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'page_wrapper', '<macro:img_mini_pages> {\$links}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'print', 'print_body', '<script language=\"JavaScript\">
	<!--
	window.print();
	-->
</script>
<div id=\"print\">
	<h2><span><conf:title> ( <a href=\"<conf:site_link>\" title=\"\"><conf:site_link></a> )</span> {\$topic[\'topics_title\']}</h2>
	<p class=\"bar\"><b><lang:source>: <a href=\"#\" onclick=\"javascript: return prompt(\'<lang:link_copy_prompt>:\', \'<conf:site_link><sys:gate>?gettopic={\$topic[\'topics_id\']}\');\"><conf:site_link><sys:gate>?gettopic={\$this->_id}</a></b></p>
	{\$content}
	<p class=\"bar\"><span><a href=\"javascript: scroll(0,0);\" title=\"\"><strong><lang:top></strong></a></span><strong><lang:source>: <a href=\"#\" onclick=\"javascript: return prompt(\'<lang:link_copy_prompt>:\', \'<conf:site_link><sys:gate>?gettopic={\$topic[\'topics_id\']}\');\"><conf:site_link><sys:gate>?gettopic={\$this->_id}</a></strong></p>
	<div id=\"copyright\"><span>Powered By: <strong>MyTopix&trade; | Personal Message Board</strong> <conf:version></span>Copyright &copy;  2004,  <a href=\"http://www.jaia-interactive.com/\" title=\"<lang:visit_jaia>\">Jaia Interactive</a> all rights reserved.</div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_full_result_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=search\" title=\"<lang:search_form_title>\"><lang:search_form_title></a> / <strong>{\$count}</strong> <lang:search_result_title>:
</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"8\">{\$count} <lang:search_result_title></td>
		</tr>
		<tr>
			<th width=\"5%\"><lang:result_col_score></th>
			<th width=\"5%\">&nbsp;</th>
			<th width=\"30%\"><lang:result_col_title></th>
			<th align=\"center\" width=\"10%\"><lang:result_col_replies></th>
			<th align=\"center\" width=\"10%\"><lang:result_col_views></th>
			<th align=\"center\" width=\"10%\"><lang:result_col_author></th>
			<th align=\"center\" width=\"20%\"><lang:result_col_forum></th>
			<th width=\"35%\"><lang:result_col_last></th>
		</tr>
		{\$list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sig', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <user:class_sigLength>;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}

}
</script>
<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
<form method=\'post\' action=\'<sys:gate>?a=ucp&amp;CODE=04\' name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:sig_title></h3>
		<p class=\"checkwrap\"><lang:sig_tip></p>
		<h3><lang:sig_field_current></h3>
		<p class=\"sig\">{\$parsed}</p>
		{\$bbcode}
		<h3><lang:sig_emoticons></h3>
		<h4><lang:sig_emoticons_tip></h4>
		{\$emoticons}
		<h3><lang:sig_field_body></h3>
		<h4><lang:sig_field_body_tip> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\" title=\"<lang:sig_link_code_title>\"><lang:sig_link_code></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\" title=\"<lang:sig_link_emoticons_tip>\"><lang:sig_link_emoticons></a> · <a href=\"javascript:check_length()\" title=\"<lang:sig_link_length_tip>\"><lang:sig_link_length></a> )</h4>
		<textarea name=\"body\">{\$sig}</textarea>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:sig_button_submit>\" /> 
			<input class=\"reset\" type=\"reset\" value=\"<lang:sig_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_jump_list', '<form method=\"post\" action=\"<sys:gate>?a=topics\" class=\"shaft\">
			<p class=\"sort\"><select name=\"forum\" class=\"jump\">
				{\$jump_list}
			</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:forum_jump>\" /></p>
		</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_full_result_row', '<tr>
	<td class=\"cellone {\$row_color}\" align=\"center\"><strong>{\$row[\'topics_score\']}%</strong></td>
	<td class=\"cellone {\$row_color}\" align=\"center\" valign=\"top\"><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\">{\$row[\'topics_marker\']}</a></td>
	<td class=\"cellone {\$row_color}\">{\$row[\'topics_prefix\']} <a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;hl={\$hlLink}\" title=\"\">{\$row[\'topics_title\']}</a> {\$inlineNav}<span class=\"special\">-- {\$row[\'topics_subject\']}</span></td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><strong>{\$row[\'topics_posts\']}</strong></td>
	<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'topics_views\']}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><strong>{\$row[\'topics_author\']}</strong></td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><a href=\"<sys:gate>?getforum={\$row[\'topics_forum\']}\" title=\"\">{\$row[\'forum_name\']}</a></td>
	<td class=\"cellone {\$row_color}\" nowrap=\"nowrap\"><span><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><macro:img_mini_box></a> {\$row[\'topics_last\']}</span><lang:topic_last_replied>: <strong>{\$row[\'topics_poster\']}</strong></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'move_topic', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / <a href=\"<sys:gate>?gettopic={\$this->_id}\" title=\"\">{\$row[\'topics_title\']}</a> / <lang:mod_move_bread>
</div>
<form method=\"post\" action=\"<sys:gate>?a=mod&amp;CODE=05&amp;t={\$this->_id}\">
	<div class=\"formwrap\">
		<h3><lang:mod_move_title></h3>
		<h4><lang:mod_move_desc></h4>
		<p class=\"checkwrap\">
			<input type=\"checkbox\" name=\"link\" class=\"check\" value=\"1\"> <strong><lang:mod_move_link></strong>
		</p>
		<p class=\"checkwrap\">
			<select name=\"forum\" size=\"5\" class=\"big\" id=\"forum\">
				{\$search_list}
			</select>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:mod_move_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:mod_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_validate_user', 'Hello, {\$username}

Our records indicate that you have just attempted to register a new account with our board.
Currently, the administrator of this community thinks it best to first validate all new 
user accounts to prevent spamming and abuse. To activate your account you only need to click
on the link below. Once you do this the system will allow you to log in to your account.

Activation Key:

<conf:site_link><sys:gate>?a=register&CODE=02&key={\$key}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'by_user_row', '<div id=\"resultwrap\">
	<h3><a href=\"<sys:gate>?a=read&amp;CODE=02&amp;p={\$row[\'posts_id\']}\" title=\"\"><b>{\$row[\'topics_title\']}</b></a> | <span>{\$row[\'posts_date\']}</span></h3>
	<div class=\"post\"><p>{\$row[\'posts_body\']}</p></div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'by_user_table', '<div id=\"crumb_nav\">
<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <strong>{\$count}</strong> <lang:search_result_user_title> <strong>{\$user}</strong>:
</div>
<div class=\"bar\">{\$pages}</div>
{\$list}
<div class=\"bar\">{\$pages}</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:search_form_title>:
</div>
<script language=\"javascript\">

	function selectAll(list, select)
	{
		var list = document.getElementById(list);
		
		for (var i = 0; i < list.length; i++)
		{
			list.options[i].selected = select.checked;
		}
	}

</script>
<form method=\"post\" action=\"<sys:gate>?a=search&CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:search_form_field_phrase></h3>
		<h4><lang:search_form_field_phrase_tip></h4>
		<input type=\"text\" name=\"keywords\" value=\"{\$this->_phrase}\" />
		<h3><lang:search_form_type>:</h3>
		<h4><lang:search_form_type_tip>.</h4>
		<p class=\"checkwrap\">
			<input type=\"radio\" name=\"mode\" class=\"check\" value=\"match\" checked=\"checked\" /> <strong><lang:search_form_basic></strong>&nbsp;
			<span id=\"matchtype\">
				<input type=\"checkbox\" name=\"type\" class=\"check\" value=\"1\" /> <lang:search_form_basic_exact>
			</span>
		</p>
		<p class=\"checkwrap\">
			<input type=\"radio\" name=\"mode\" class=\"check\" value=\"full\" /> <strong><lang:search_form_full></strong> &nbsp;
			<span id=\"limit\">
				<select name=\"limit\">
					<option value=\"10\" selected=\"selected\">10</option>
					<option value=\"20\">20</option>
					<option value=\"30\">30</option>
					<option value=\"40\">40</option>
				</select> <lang:search_form_full_limit>
			</span>
		</p>
		<h3><lang:search_form_forum_title></h3>
		<h4><lang:search_form_forum_desc></h4>
		<p class=\"checkwrap\">
			<input type=\"checkbox\" name=\"all\" class=\"check\" value=\"all\" onclick=\"selectAll(\'forums\', this)\" checked=\"checked\"/> <strong><lang:search_form_forum_all></strong>
		</p>
		<p class=\"checkwrap\">
			<select name=\"forums[]\" size=\"5\" multiple=\"multiple\" class=\"big\" id=\"forums\">
				{\$search_list}
			</select>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:search_form_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:search_form_button_reset>\" />
		</p>
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'sig', '<p class=\"sig\">{\$row[\'members_sig\']}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'register', 'form_register', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:register_crumb_title>
</div>
{\$error_list}
<form method=\"post\" action=\"<sys:gate>?a=register&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:registration_title></h3>
		<p class=\"checkwrap\"><lang:registration_tip></p>
		<h3><lang:field_username></h3>
		<h4><lang:field_username_tip></h4>
		<input type=\"text\" name=\"username\" value=\"{\$username}\" />
		<h3><lang:field_pass></h3>
		<h4><lang:field_pass_tip></h4>
		<input type=\"password\" name=\"password\" />
		<h3><lang:field_con_pass></h3>
		<h4><lang:field_con_pass_tip></h4>
		<input type=\"password\" name=\"cpassword\" />
		<h3><lang:field_email></h3>
		<h4><lang:field_email_tip></h4>
		<input type=\"text\" name=\"email\" value=\"{\$email_one}\" />
		<h3><lang:field_con_email></h3>
		<h4><lang:field_con_email_tip></h4>
		<input type=\"text\" name=\"cemail\" value=\"{\$email_two}\" />
		<h3><lang:field_terms></h3>
		<h4><lang:field_terms_tip></h4>
		<textarea rows=\"\" cols=\"\"><lang:field_terms_content></textarea>
		<p class=\"checkwrap\"><input class=\"check\" type=\"checkbox\" name=\"contract\" {\$contract} /> <strong><lang:field_agree></strong></p>
		{\$coppa_field}
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_general', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=02\'>
	<div class=\"formwrap\">
		<h3><lang:gen_title></h3>
		<p class=\"checkwrap\"><lang:gen_tip></p>
		<h3><lang:gen_field_location></h3>
		<h4><lang:gen_field_location_tip></h4>
		<input type=\"text\" name=\"location\" value=\"{\$location}\" />
		<h3><lang:gen_field_website></h3>
		<h4><lang:gen_field_website_tip></h4>
		<input type=\"text\" name=\"homepage\" value=\"{\$homepage}\" />
		<h3><lang:gen_field_birthday></h3>
		<h4><lang:gen_field_birthday_tip></h4>
		<p class=\"checkwrap\">
			<select name=\'bmonth\'>
				{\$months}
			</select>
			&nbsp;
			<select name=\'bday\'>
				{\$days}
			</select>
			&nbsp;
			<select name=\'byear\'>
				{\$years}
			</select>
		</p>
		<h3><lang:gen_field_aim></h3>
		<h4><lang:gen_field_aim_tip></h4>
		<input type=\"text\" name=\"aim\" value=\"{\$aim}\" />
		<h3><lang:gen_field_icq></h3>
		<h4><lang:gen_field_icq_tip></h4>
		<input type=\"text\" name=\"icq\" value=\"{\$icq}\" />
		<h3><lang:gen_field_yim></h3>
		<h4><lang:gen_field_yim_tip></h4>
		<input type=\"text\" name=\"yim\" value=\"{\$yim}\" />
		<h3><lang:gen_field_msn></h3>
		<h4><lang:gen_field_msn_tip></h4>
		<input type=\"text\" name=\"msn\" value=\"{\$msn}\" />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:gen_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:gen_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'post_row_guest', '<div class=\"user\">
	<a name=\"{\$row[\'posts_id\']}\"></a>
	<p><strong>{\$row[\'posts_author_name\']}</strong>
	<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span></p>
	<img src=\"<sys:skinPath>/ava_none.gif\" class=\"avatar\" alt=\"\" title=\"\" />
</div>
<div class=\"post\">
	<h5><strong><lang:posted_on> {\$row[\'posts_date\']}</strong><span>{\$linkDelete}{\$linkEdit}{\$linkQuote}</span></h5>
	<p>{\$row[\'posts_body\']}</p>{\$attach}
</div>
<div class=\"foot\">
	<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:entry_link_top_tip>\"><lang:entry_link_top></a></span>
	&nbsp;
</div>
<div class=\"postend\">&nbsp;</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'post_table', '{\$poll_data}
<div class=\"postwrap\">
        <div class=\"postheader\"><span>{\$topic[\'topics_title\']}</span></div>
        {\$list}
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_active', '<div class=\"infowrap\">
	<h1><lang:readers_title></h1>
	<h2><lang:readers_user_summary> ( <a href=\"<sys:gate>?a=active\" title=\"\"><lang:active_link_details></a> )</h2>
	<p>{\$list}</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_buttons', '<div class=\"postbutton\">
	<p class=\"links\">&nbsp;</p>
	{\$button_reply} {\$button_qwik} {\$button_topic} {\$button_poll}
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'reply_bit', '<div id=\"qwikwrap\" style=\"display: none;\">
	<script language=\"javascript\">
	function check_length()
	{
		var limit  = <conf:max_post> * 1000;
		var length = document.REPLIER.body.value.length;

		if ( (length > limit) ) {
			alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
		} else {
			alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
		}

	}
	</script>
	<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
	<a name=\"qwik\"></a>
	<form method=\"post\" action=\"<sys:gate>?a=post&amp;CODE=01&amp;t={\$this->_id}&amp;qwik=1\" name=\"REPLIER\">
		<div class=\"formwrap\">
			<h3><lang:qwik_title>.</h3>
			<p class=\"checkwrap\"><lang:qwik_title_tip>.</p>
			<h3><lang:qwik_field_body>:</h3>
			<h4><lang:qwik_field_body_tip> (<a href=\'javascript:smilie_window(\"<sys:gate>\");\' title=\"<lang:qwik_link_emoticons>\"><lang:qwik_link_emoticons></a> &middot; <a href=\"javascript:check_length();\" title=\"<lang:qwik_link_length>\"><lang:qwik_link_length></a>)</h2>
			<textarea name=\"body\" rows=\"\" cols=\"\"></textarea>
			<p class=\"submit\">
				<input class=\"button\" type=\"submit\" value=\"<lang:qwik_button_submit>\" />&nbsp;
				<input class=\"reset\" type=\"reset\" value=\"<lang:qwik_button_reset>\" />
			</p>
			<input type=\"hidden\" name=\"cOption\" value=\"1\" />
			<input type=\"hidden\" name=\"eOption\" value=\"1\" />
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		</div>
	</form>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'post_row', '<div class=\"user\">
	<a name=\"{\$row[\'posts_id\']}\"></a>
	<p><a href=\"<sys:gate>?getuser={\$row[\'members_id\']}\" title=\"<lang:entry_link_profile>\"><strong>{\$row[\'members_name\']}</strong></a> <em>( <a href=\"<sys:gate>?a=search&CODE=02&mid={\$row[\'members_id\']}\" title=\"<lang:entry_post_find> {\$row[\'members_name\']}\">{\$row[\'members_posts\']}</a> )</em>
	<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span>
	<span><strong>&middot; <lang:entry_rank></strong> {\$row[\'members_pips\']}</span></p>
	{\$avatar}<div style=\"clear:both;\" /></div>
</div>
<div class=\"post\">
	<h5><strong><lang:posted_on> {\$row[\'posts_date\']}</strong><span>{\$linkDelete}{\$linkEdit}{\$linkQuote}</span></h5>
	<p>{\$row[\'posts_body\']}</p>{\$attach}{\$sig}
</div>
<div class=\"foot\">
	<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:entry_link_top_tip>\"><lang:entry_link_top></a></span>
	<ul class=\"extras\"><li>{\$active}</li>{\$linkSpan}</ul>
</div>
<div class=\"postend\">&nbsp;</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'container_read', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / {\$topic[\'topics_title\']}
</div>
{\$buttons}
<div class=\"bar\">
	<span><a href=\"<sys:gate>?a=print&amp;t={\$topic[\'topics_id\']}\" title=\"<lang:print_view_tip>\" target=\"_blank\"><strong><lang:print_view></strong></a> &middot; <a href=\"<sys:gate>?gettopic={\$topic[\'topics_id\']}&amp;CODE=01\" title=\"<lang:subscribe_tip>\"><strong><lang:subscribe></strong></a></span>
	{\$pages}
</div>
{\$content}
<div class=\"bar\">
	<span><a href=\"<sys:gate>?gettopic={\$topic[\'topics_id\']}&amp;CODE=03&amp;forum={\$topic[\'topics_forum\']}\" title=\"<lang:previous>\"><strong><lang:previous></strong></a> &middot; <a href=\"<sys:gate>?a=topics&amp;forum={\$topic[\'topics_forum\']}\" title=\"<lang:index>\"><strong><lang:index></strong></a> &middot; <a href=\"<sys:gate>?gettopic={\$topic[\'topics_id\']}&amp;CODE=04&amp;forum={\$topic[\'topics_forum\']}\" title=\"<lang:next>\"><strong><lang:next></strong></a></span>
	{\$pages}
</div>
{\$buttons}
<div class=\"formwrap\">
{\$mod}
{\$jump}
</div>
{\$replier}
{\$readers}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'quote_field', '		<h3><lang:post_field_quote></h3>
		<h4><lang:post_field_quote_tip></h4>
		<textarea name=\"quote\">{\$message}</textarea>
		{\$hidden}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'smilie_wrapper', '<table class=\"emoticon\" cellpadding=\"0\" cellspacing=\"0\">
	{\$smilies}
</table>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_field_title', '		<h3><lang:post_field_title></h3>
		<h4><lang:post_field_title_tip></h4>
		<input type=\"text\" name=\"title\" tabindex=\"1\" value=\"{\$title}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'profile', 'profile_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:profile_title> {\$row[\'members_name\']}
</div>
<div id=\"left_column\">
	<div class=\"formwrap\">
		<h3><lang:profile_name></h3>
		<h4>{\$row[\'members_name\']} ( {\$row[\'class_prefix\']}{\$row[\'class_title\']}{\$row[\'class_suffix\']} )</h4>
		<h3><lang:profile_last_visit></h3>
		<h4>{\$row[\'members_lastvisit\']}</h4>
		<h3><lang:profile_registered></h3>
		<h4>{\$row[\'members_registered\']}</h4>
		<h3><lang:profile_birthday></h3>
		<h4>{\$birthday}</h4>
		<h3><lang:profile_stats></h3>
		<h4><a href=\'<sys:gate>?a=search&amp;CODE=02&amp;mid={\$row[\'members_id\']}\'>{\$row[\'members_posts\']}</a> <lang:profile_posts> ( {\$row[\'members_per_day\']} / <lang:per_day> )</h4>
		<h3><lang:profile_last_5></h3>
		<ul>
			{\$topics}
		</ul>
		<h3><lang:profile_location></h3>
		<h4>{\$row[\'members_location\']}</h4>
	</div>
</div>
<div id=\"right_column\">
	<div class=\"formwrap\">
		<h3><lang:profile_home></h3>
		<h4>{\$row[\'members_homepage\']}</h4>
		<h3><lang:profile_aol></h3>
		<h4>{\$row[\'members_aim\']}</h4>
		<h3><lang:profile_yim></h3>
		<h4>{\$row[\'members_yim\']}</h4>
		<h3><lang:profile_msn></h3>
		<h4>{\$row[\'members_msn\']}</h4>
		<h3><lang:profile_icq></h3>
		<h4>{\$row[\'members_icq\']}</h4>
		<h3><lang:profile_other></h3>
		<ul>
			<li><a href=\'<sys:gate>?a=notes&amp;CODE=07&amp;send={\$row[\'members_id\']}\'><lang:profile_link_note></a></li>
		</ul>
	</div>
</div>
<div id=\"signature\">
	<div class=\"formwrap\">
		<h3><lang:profile_sig></h3>
		<p class=\"sig\">{\$row[\'members_sig\']}</p>
	</div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'emoticons_field', '		<h3><lang:post_emoticon_title></h3>
		<h4><lang:post_emoticon_tip></h4>
		{\$smilies}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_wrapper', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> {\$bread_crumb}
</div>
{\$errors}
<script language=\'javascript\'>
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;
		if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}

}
</script>
<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
<form method=\"POST\" action=\"{\$this->_form_action}\" name=\"REPLIER\" {\$this->_form_multipart}>
	<div class=\"formwrap\">
		<h3>{\$this->_form_title}</h3>
		<p class=\"checkwrap\">{\$this->_form_tip}</p>
		{\$recipient}
		{\$name}
		{\$title}
		{\$subject}
		{\$bbcode}
		{\$emoticons}
		<h3><lang:post_message_title></h3>
		<h4><lang:post_message_tip> (  <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:post_link_bbcode></a> · <a href=\'javascript:smilie_window(\"<sys:gate>\")\'><lang:post_link_emoticons></a> · <a href=\'javascript:check_length()\'><lang:post_link_length></a> )</h4>
		<textarea name=\"body\" rows=\"5\" tabindex=\"1\">{\$message}</textarea>
		{\$quote}
		{\$convert}
		{\$upload}
		{\$tools}
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" tabindex=\"2\" value=\"{\$this->_form_submit}\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		{\$hidden}
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'bbcode_field', '	<div id=\'bbcode_panel\' style=\'display: none;\'>
		<h3><lang:bb_title></h3>
		<h4><lang:bb_title_tip></h4>
		<table cellpadding=\'3\' cellspacing=\'0\'>
			<tr>
				<td align=\'left\'>
					<input type=\'button\' class=\'bbcode\' value=\' U \' onClick=\'codeBasic(this)\' name=\'u\' />
					<input type=\'button\' class=\'bbcode\' value=\' I \' onClick=\'codeBasic(this)\' name=\'i\' />
					<input type=\'button\' class=\'bbcode\' value=\' B \' onClick=\'codeBasic(this)\' name=\'b\' /> 
					<select name=\'FONT\' style=\'width: 100px;\' onchange=\'fontFace(this.options[this.selectedIndex].value)\'>
						<option value=\'0\'><lang:bb_select_font></option>
						<option style=\'font-family: tahoma; font-weight: bold;\' value=\'Arial\'>Tahoma</option>
						<option style=\'font-family: times; font-weight: bold;\' value=\'Times\'>Times</option>
						<option style=\'font-family: courier; font-weight: bold;\' value=\'Courier\'>Courier</option>
						<option style=\'font-family: impact; font-weight: bold;\' value=\'Impact\'>Impact</option>
						<option style=\'font-family: geneva; font-weight: bold;\' value=\'Geneva\'>Geneva</option>
						<option style=\'font-family: optima; font-weight: bold;\' value=\'Optima\'>Optima</option>
					</select>
					<select name=\'SIZE\' style=\'width: 100px;\' onchange=\'fontSize(this.options[this.selectedIndex].value)\'>
						<option value=\'0\'><lang:bb_select_size></option>
						<option value=\'1\'><lang:bb_size_small></option>
						<option value=\'7\'><lang:bb_size_large></option>
						<option value=\'14\'><lang:bb_size_largest></option>
					</select>
					<select name=\'COLOR\' style=\'width: 100px;\' onchange=\'fontColor(this.options[this.selectedIndex].value)\'>
						<option value=\'0\'><lang:bb_select_color></option>
						<option value=\'blue\' style=\'color:blue\'><lang:bb_color_blue></option>
						<option value=\'red\' style=\'color:red\'><lang:bb_color_red></option>
						<option value=\'purple\' style=\'color:purple\'><lang:bb_color_purple></option>
						<option value=\'orange\' style=\'color:orange\'><lang:bb_color_orange></option>
						<option value=\'yellow\' style=\'color:yellow\'><lang:bb_color_yellow></option>
						<option value=\'gray\' style=\'color:gray\'><lang:bb_color_gray></option>
						<option value=\'green\' style=\'color:green\'><lang:bb_color_green></option>
					</select>
				</td>
			</tr>
			<tr>
				<td align=\'left\'>
					<input type=\'button\' class=\'bbcode\' value=\' # \' onClick=\'codeBasic(this)\' name=\'code\' />
					<input type=\'button\' class=\'bbcode\' value=\' \"QUOTE\" \' onClick=\'codeBasic(this)\' name=\'quote\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' List \' onClick=\'codeList()\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' IMG \' onClick=\'codeBasic(this)\' name=\'img\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' @ \' onClick=\'codeBasic(this)\' name=\'email\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' URL \' onClick=\'codeBasic(this)\' name=\'url\' /> 
				</td>
			</tr>
		</table>
		<p class=\"checkwrap\"><input type=\'radio\' class=\"check\" name=\'mode\' value=\'adv\' checked=\'checked\' /> <b><lang:bb_mode_advanced></b> <lang:bb_mode_advanced_tip>.</p>
		<p class=\"checkwrap\"><input type=\'radio\' class=\"check\" name=\'mode\' value=\'simple\'/> <b><lang:bb_mode_simple></b> <lang:bb_mode_simple_tip>.</p>
	</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"<conf:title>\"><conf:title></a> <macro:txt_bread_sep> <lang:notes_main_title>
</div>
<hr />
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>
</div>
<hr />
<div class=\"bar\">
	{\$pages}
</div>
<hr />
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"5\"><lang:note_your_notes> ( {\$filled}% <lang:note_full> )</td>
		</tr>
		<tr>
			<th align=\"left\" width=\"40%\" colspan=\"2\"><lang:note_col_title></td>
			<th align=\"center\" width=\"20%\"><lang:note_col_sender></td>
			<th align=\"center\" width=\"25%\"><lang:note_col_recieved></td>
			<th width=\"5%\">&nbsp;</td>
		</tr>
		{\$list}
	</table>
</div>
<hr />
<div class=\"bar\">
	{\$pages}
</div>
<hr />
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>&nbsp;<a href=\"<sys:gate>?a=notes&amp;CODE=05\" title=\"\" onclick=\"javascript: return confirm(\'<lang:empty_inbox_confirm>?\');\"><macro:btn_delete_note></a>
</div>
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_row', '<tr>
	<td class=\"cellone {\$row_color}\" align=\"center\" width=\"1%\"><a href=\'<sys:gate>?a=notes&amp;CODE=06&amp;nid={\$row[\'notes_id\']}\'>{\$row[\'notes_marker\']}</a></td>
	<td class=\"cellone {\$row_color}\"><a href=\"<sys:gate>?a=notes&amp;CODE=01&amp;nid={\$row[\'notes_id\']}\">{\$row[\'notes_title\']}</a></td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><a href=\'<sys:gate>?getuser={\$row[\'notes_sender\']}\'><strong>{\$row[\'members_name\']}</strong></a></td>
	<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'notes_date\']}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><a href=\"<sys:gate>?a=notes&amp;CODE=04&amp;nid={\$row[\'notes_id\']}\" title=\"\" onclick=\"javascript: return confirm(\'<lang:read_delete_confirm>?\');\"><b><lang:read_delete_title></b></a></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_read', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=notes\" title=\"\"><lang:notes_inbox_title></a> / <lang:notes_read_crumb_title> {\$row[\'notes_title\']}
</div>
<div class=\"postbutton\">
	<a href=\'<sys:gate>?a=notes&amp;CODE=3&amp;nid={\$this->_id}&amp;send={\$row[\'members_name\']}\'><macro:btn_note_reply></a>&nbsp;<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>
</div>
<div class=\"postwrap\">
	<div class=\"postheader\"><span>{\$row[\'notes_title\']}</span></div>
	<div class=\"user\">
		<a name=\"{\$row[\'notes_id\']}\"></a>
		<p><a href=\"<sys:gate>?getuser={\$row[\'members_id\']}\" title=\"<lang:entry_link_profile>\"><strong>{\$row[\'members_name\']}</strong></a> <em>( <a href=\"<sys:gate>?a=search&CODE=02&mid={\$row[\'members_id\']}\" title=\"<lang:entry_post_find> {\$row[\'members_name\']}\">{\$row[\'members_posts\']}</a> )</em>
		<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span>
		<span><strong>&middot; <lang:entry_rank></strong> {\$row[\'members_pips\']}</span></p>
		{\$avatar}<div style=\"clear:both;\" /></div>
	</div>
	<div class=\"post\">
		<h5><strong><lang:sent_on> {\$row[\'notes_date\']}</strong><span><a href=\"<sys:gate>?a=notes&amp;CODE=04&amp;nid={\$row[\'notes_id\']}\" title=\"<lang:read_button_delete>\" onclick=\"javascript: return confirm(\'<lang:read_delete_confirm>\');\"><img src=\"<sys:skinPath>/post_delete.gif\" alt=\"<lang:read_delete_confirm>\" /></a></span></h5>
		<p>{\$row[\'notes_body\']}</p>{\$sig}
	</div>
	<div class=\"foot\">
		<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:read_link_top_title>.\"><lang:read_link_top></a></span>
		<ul class=\"extras\">{\$linkSpan}</ul>
	</div>
	<div class=\"postend\">&nbsp;</div>
</div>
<div class=\"postbutton\">
	<a href=\'<sys:gate>?a=notes&amp;CODE=3&amp;nid={\$this->_id}&amp;send={\$row[\'members_name\']}\'><macro:btn_note_reply></a>&nbsp;<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_none', '							<tr>
								<td class=\"cellone\" align=\"center\" colspan=\"5\"><strong><lang:no_notes></strong></td>
							</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'notes_send_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <a href=\"<sys:gate>?a=notes\" title=\"\"><lang:notes_main_title></a> <macro:txt_bread_sep> <lang:notes_new_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
	function check_length()
	{
		var limit  = <conf:max_post> * 1000;
		var length = document.REPLIER.body.value.length;

		if ( (length > limit) ) {
			alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
		} else {
			alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
		}
	}
	</script>
	<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
	<a name=\"qwiknote\"></a>
	<form method=\"POST\" action=\"<sys:gate>?a=notes&amp;CODE=02\" name=\"REPLIER\">
		<div class=\"formwrap\">
			<h3><lang:notes_send_title></h3>
			<p class=\"checkwrap\"><lang:form_send_tip></p>
			<h3><lang:post_field_recipient_title>:</h3>
			<h4><lang:post_field_recipient_tip> ( <a href=\'<sys:gate>?a=members\'><lang:post_field_recipient_link_search></a> )</h4>
			<input type=\'text\' name=\'recipient\' value=\'{\$to}\' tabindex=\'1\'  />
			<h3><lang:post_field_title>:</h3>
			<h4><lang:post_field_title_tip>.</h4>
			<input type=\'text\' name=\'title\' tabindex=\'2\' value=\"{\$title}\" />
			{\$bbcode}
			<h3><lang:post_emoticon_title></h3>
			<h4><lang:post_emoticon_tip></h4>
			{\$emoticons}
			<h3><lang:post_message_title></h3>
			<h4><lang:post_message_tip> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:post_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:post_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:post_link_length></a> )</h4>
			<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
			<h3><lang:post_options></h3>
			<h4><lang:post_options_tip>.</h4>
			<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_code></p>
			<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_emoticon></p>
			<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:post_button_send>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:post_button_reset>\" /></p>
			<input type=\'hidden\' name=\'redirect\' value=\'new\' />
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		</div>
	</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'notes_reply_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=notes\" title=\"\"><lang:notes_inbox_title></a> / <a href=\"<sys:gate>?a=notes&amp;CODE=01&amp;nid={\$this->_id}\" title=\"\">{\$bread_title}</a> / <lang:notes_reply_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}

}
</script>
<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
<a name=\"qwiknote\"></a>
<form method=\"POST\" action=\"<sys:gate>?a=notes&amp;CODE=02&amp;nid={\$this->_id}\" name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:notes_reply_title> {\$note[\'notes_title\']}</h3>
		<h4><lang:form_send_tip></h4>
		<h3><lang:post_field_recipient_title>:</h3>
		<h4><lang:post_field_recipient_tip> ( <a href=\'<sys:gate>?a=members\'><lang:post_field_recipient_link_search></a> )</h4>
		<input type=\'text\' name=\'recipient\' value=\'{\$recipient}\' tabindex=\'1\' />
		<h3><lang:post_field_title>:</h3>
		<h4><lang:post_field_title_tip>.</h4>
		<input type=\'text\' name=\'title\' value=\"{\$note[\'notes_title\']} \"tabindex=\'2\' />
		{\$bbcode}
		<h3><lang:post_emoticon_title></h3>
		<h4><lang:post_emoticon_tip></h4>
		{\$emoticons}
		<h3><lang:post_message_title></h3>
		<h4><lang:post_message_tip> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:post_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:post_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:post_link_length></a> )</h4>
		<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
		<h3><lang:post_field_quote></h3>
		<h4><lang:post_field_quote_tip></h4>
		<textarea name=\"quote\" tabindex=\'3\'>{\$quote}</textarea>
		<h3><lang:post_options></h3>
		<h4><lang:post_options_tip>.</h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_code></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_emoticon></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:post_button_send>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:post_button_reset>\" /></p>
		<input type=\'hidden\' name=\"id\" value=\"{\$this->_id}\" />
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'misc', 'emoticon_row', '	<tr>
		<td class=\'celltwo\'>{\$code[\$i]}</td>
		<td class=\'celltwo\'>
			<a href=\'javascript:add_smilie(\"{\$code[\$i]}\")\'>{\$name[\$i]}</a>
		</td>
	</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'misc', 'emoticon_wrapper', '<script language=\'javascript\'>

	function add_smilie(text)
	{
		opener.document.REPLIER.body.value += \" \" + text + \" \";

	}

</script>
<table class=\"maintable\" cellpadding=\'6\' cellspacing=\'1\' width=\"95%\">
	<tr>
		<td class=\"header\" colspan=\"2\"><lang:emoticon_legend>:</td>
	</tr>
	<tr>
		<th class=\"cellone\" colspan=\'2\'>( <a href=\'javascript:this.close()\'><lang:close_window></a> )</th>
	</tr>
	{\$list}
	<tr>
		<td class=\"footer\" colspan=\"2\">&nbsp;</td>
	</tr>
</table>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'topic_editor', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / <a href=\"<sys:gate>?gettopic={\$this->_id}\" title=\"\">{\$topic[\'topics_title\']}</a> / <lang:mod_edit_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=mod&amp;CODE=03&amp;t={\$this->_id}\">
	<div class=\"formwrap\">
		<h3><lang:mod_form_title> {\$topic[\'topics_title\']}</h3>
		<h4><lang:mod_form_tip></h4>
		<h3><lang:mod_field_title></h3>
		<h4><lang:mod_field_title_tip></h4>
		<input type=\"text\" name=\"title\" value=\"{\$topic[\'topics_title\']}\" />
		<h3><lang:mod_field_subject></h3>
		<h4><lang:mod_field_subject></h4>
		<input type=\"text\" name=\"subject\" value=\"{\$topic[\'topics_subject\']}\" />
		<h3><lang:mod_field_views></h3>
		<h4><lang:mod_field_views_tip></h4>
		<input type=\"text\" name=\"views\" value=\"{\$topic[\'topics_views\']}\" />
		{\$mod_poll}
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" name=\"submit\" value=\"<lang:mod_edit_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:mod_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_table', '{\$buttons}
<hr />
<div class=\"bar\">
	<span>
		<a href=\"<sys:gate>?getforum={\$this->_forum}&amp;CODE=02\" title=\"<lang:forum_subscribe>\"><strong><lang:forum_subscribe></strong></a>
	</span>
	{\$pages}
</div>
<hr />
<div class=\"maintable\">
<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
	<tr>
		<td class=\"header\" colspan=\"5\">{\$forum_data[\'forum_name\']}</td>
	</tr>
	<tr>
		<th width=\"45%\" colspan=\"2\" align=\"left\"><lang:main_col_title></th>
		<th  align=\"center\" width=\"10%\"><lang:main_col_author></th>
		<th width=\"20%\"><lang:main_col_last_post></th>
		<th align=\"center\" width=\"25%\"><lang:topic_posts> / <lang:topic_views></th>
	</tr>
	{\$list}
</table>
</div>
<hr />
<div class=\"bar\">
	<span>
		<a href=\"<sys:gate>?getforum={\$this->_forum}&amp;CODE=01\" title=\"<lang:mark_read>\"><strong><lang:mark_read></strong></a>
	</span>
	{\$pages}
</div>
<hr />
{\$buttons}
<hr />
{\$post}
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'members', 'list_row', '<tr>
	<td class=\"cellone {\$row_color}\"><a href=\'<sys:gate>?getuser={\$row[\'members_id\']}\'>{\$row[\'class_prefix\']}{\$row[\'members_name\']}{\$row[\'class_suffix\']}</a></td>
	<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'members_posts\']}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'members_rank\']}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><strong>{\$row[\'class_title\']}</strong></td>
	<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'members_registered\']}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'members_homepage\']}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><a href=\'<sys:gate>?a=notes&amp;CODE=07&amp;send={\$row[\'members_id\']}\'><macro:btn_mini_note></a></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'members', 'list_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:index_title>
</div>
<div class=\"bar\">{\$pages}</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"8\"><lang:index_title>:</td>
		</tr>
		<tr>
			<th align=\"left\" width=\"15%\"><lang:member_name></th>
			<th align=\"center\" width=\"10%\"><lang:member_posts></th>
			<th align=\"center\" width=\"10%\"><lang:member_rank></th>
			<th align=\"center\" width=\"20%\"><lang:member_group></th>
			<th align=\"center\" width=\"25%\"><lang:member_joined></th>
			<th align=\"center\" width=\"10%\"><lang:member_page></th>
			<th align=\"center\" width=\"10%\"><lang:member_note></th>
		</tr>
		{\$list}
	</table>
</div>
<div class=\"bar\">{\$pages}</div>
<form method=\"post\" action=\"<sys:gate>?a=members\">
	<div class=\"formwrap\">
		<h3><lang:search_title></h3>
		<p class=\"sort\">
		<lang:search_get> 
		<select name=\'sGroup\'>
			<option value=\'all\'><lang:search_group></option>
			{\$sort_groups}
		</select> by 
		<select name=\'sField\'>
			{\$sort_type}
		</select> <lang:search_in>
		<select name=\'sOrder\'>
			{\$sort_order}
		</select> <lang:search_with>
		<select name=\'sResults\'>
			{\$sort_count}
		</select> <lang:search_per_page> 
		<input class=\"submit\" type=\"submit\" value=\"<lang:search_button>\" />
		</p>
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_row', '<tr>
	<td class=\"cellone {\$row_color}\" width=\"1%\"><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\">{\$row[\'topics_marker\']}</a></td>
	<td class=\"cellone {\$row_color}\">
		{\$row[\'topics_prefix\']} 
		<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}\" title=\"{\$row[\'topics_title\']}\">{\$row[\'topics_title\']}</a> {\$inlineNav}<br />
		<span class=\"subject\">{\$row[\'topics_subject\']}</span>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><strong>{\$row[\'topics_author\']}</strong></td>
	<td class=\"cellone {\$row_color}\">
		<span class=\"lastpost\">{\$row[\'topics_last\']}</span><br />
		<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><lang:topic_last_replied></a> <strong>{\$row[\'topics_poster\']}</strong>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$row[\'topics_posts\']} / {\$row[\'topics_views\']}</h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'active_users', '<div class=\"infowrap\">
	<h1><lang:active_user_title> </h1>
	<h2><lang:active_user_summary> (<a href=\"<sys:gate>?a=active\" title=\"<lang:active_link_details>\"><lang:active_link_details></a>)</h2>
	<p>{\$list}</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'container_main', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb}
</div>
{\$child_forums}
{\$topics}
<div class=\"formwrap\">
	{\$jump}
	<form method=\"post\" action=\"<sys:gate>?a=search&amp;CODE=01\">
		<input type=\"text\" class=\"small_text\" name=\"keywords\" />&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:search_forums>\" />
		<input type=\"hidden\" name=\"forum\" value=\"{\$this->_forum}\" />
	</form>
</div>
{\$active}
{\$board_stats}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'main_buttons', '<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=post&CODE=03&amp;forum={\$this->_forum}\" title=\"<lang:button_new_topic>\"><macro:btn_main_new></a>&nbsp;<a href=\"#qwik\" title=\"<lang:button_new_qwik>\" onclick=\"javascript:return toggleBox(\'qwikform\');\"><macro:btn_main_qtopic></a>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'statistics', '<div class=\"infowrap\">
	<h1><lang:stat_title>:</h1>
	<h2><lang:stat_tip></h2>
	<p><lang:stat_totals><br />
	<lang:stat_newest><br />
	<lang:stat_online></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_bit', '<div id=\"qwikform\" style=\"display: none;\">
	<script language=\"javascript\">
	function check_length()
	{

		var limit = {\$length};

		var length = document.REPLIER.body.value.length;

		if ( (length > limit) ) {

			alert(\'Your message is too long ( \' + length + \' chars ), please shorten it to less than \' + limit + \' characters.\');

		} else {

			alert(\'You are currently using \' + length + \' characters. Maximum allowable amount should not exceed \' + limit);

		}

	}
	</script>
	<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
	<form method=\"POST\" action=\"<sys:gate>?a=post&amp;CODE=00\" name=\"REPLIER\">
		<a name=\"qwik\"></a>
		<div class=\"formwrap\">
			<h3><lang:qwik_title></h3>
			<p class=\"checkwrap\"><lang:qwik_form_tip></p>
			<h3><lang:qwik_form_field_title></h3>
			<h4><lang:qwik_form_field_title_field></h4>
			<input type=\"text\" name=\"title\" />
			<h3><lang:qwik_form_field_body></h3>
			<h4><lang:qwik_form_field_body_tip> ( <a href=\"javascript:smilie_window(\'<sys:gate>\')\" title=\"View emoticon choices\"><lang:qwik_form_link_emoticons></a> &middot; <a href=\"javascript:check_length()\" title=\"Check the length of your topic\"><lang:qwik_form_link_length></a> )</h4>
			<textarea name=\"body\" rows=\"\" cols=\"\"></textarea>
			<p class=\"submit\">
				<input class=\"button\" type=\"submit\" value=\"<lang:qwik_form_button_post>\" />&nbsp;
				<input class=\"reset\" type=\"reset\" value=\"<lang:qwik_form_button_reset>\" />
			</p>
			<input type=\"hidden\" name=\"cOption\" value=\"1\" />
			<input type=\"hidden\" name=\"eOption\" value=\"1\" />
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
			<input type=\"hidden\" name=\"subject\" value=\"\" />
			<input type=\"hidden\" name=\"forum\" value=\"{\$this->_forum}\" />
		</div>
	</form>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'logon', 'form_pass_retrieve_1', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:form_retrieve_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=04\">
	<div class=\"formwrap\">
		<h3><lang:form_retrieve_title></h3>
		<p class=\"checkwrap\"><lang:form_retrieve_tip></p>
		<h3><lang:form_retrieve_field_email></h3>
		<h4><lang:form_retrieve_field_email_tip></h4>
		<input type=\'text\' name=\'email\' tabindex=\'1\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:form_retrieve_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_retrieve_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_note_notify', 'Hello, {\$row[\'members_name\']}

<user:members_name>, from <conf:title> ( <conf:site_link> ), has just sent you a new personal note.
If you wish to read it, click the link below to go straight to your notes index:	

<conf:site_link><sys:gate>?a=notes

If you do not wish to recieve notifications any longer be sure to turn this feature off within your
personal control panel which can be found through the link above.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_subscribe_topic_notice', 'Hello {\$row[\'members_name\']},

{\$row[\'topics_last_poster_name\']}, from <conf:title> ( <conf:site_link> ), has just posted a reply
to a topic you have subscribed to. You may follow the link below to read this post:

<conf:site_link><sys:gate>?gettopic={\$this->_id}&p={\$page}#{\$post}

If you do not wish to recieve subscription notices any longer you may turn this feature 
off within your personal control panel. To do this you may access your UCP through the 
above link.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'help', 'title_row', '<li><a href=\"#{\$count}\" title=\"{\$row[\'help_title\']}\">{\$row[\'help_title\']}</a></li>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'logon', 'form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:form_logon_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:form_logon_title></h3>
		<p class=\"checkwrap\"><lang:form_logon_tip></p>
		<h3><lang:sys_err_option_title></h3>
		<ul>
			<li><a href=\"<sys:gate>?a=register\" title=\"\"><lang:sys_err_option_reg></a></li>
			<li><a href=\"<sys:gate>?a=logon&amp;CODE=03\" title=\"\"><lang:sys_err_option_rec></a></li>
			<li><a href=\"<sys:gate>?a=help\" title=\"\"><lang:sys_err_option_doc></a></li>
		</ul>
		<h3><lang:form_logon_field_username></h3>
		<h4><lang:form_logon_field_username_tip></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:form_logon_field_password></h3>
		<h4><lang:form_logon_field_password_tip></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:form_logon_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_logon_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'help', 'container_help', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:help_crumb_title>
</div>
<div class=\"infowrap\">
    <h1><lang:help_title></h1>
    <h2><lang:help_tip></h2>
    <ul>
        {\$titles}
    </ul>
</div>
{\$entries}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'help', 'content_row', '<div class=\"infowrap\">
	<a name=\"{\$count}\"></a>
	<h3>{\$count}. {\$row[\'help_title\']}</h3>
	<p>{\$row[\'help_content\']}</p>
	<p class=\"top\"><a href=\"javascript:scroll(0,0);\" title=\"<lang:link_top_title>\"><lang:link_top></a></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_footer', '
----------------------------------------------------------------
<lang:mailer_footer> MyTopix | Personal Message Board {\$this->config[\'version\']}.  http://www.jaia-interactive.com');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_wrapper', '			<div id=\"wrap\">
				<h1 id=\"logo\"><a href=\"<sys:gate>?a=main\" title=\"<lang:logo_alt>\">MyTopix</a></h1>
				<ul id=\"top_nav\">
					<li><a href=\"<conf:site_link><sys:gate>?a=members\" title=\"\"><lang:uni_tab_members></a></li>
					<li><a href=\"<conf:site_link><sys:gate>?a=search\" title=\"\"><lang:uni_tab_search></a></li>
					<li><a href=\"<conf:site_link><sys:gate>?a=calendar\" title=\"\"><lang:uni_tab_calendar></a></li>
				</ul>
				{\$this->welcome}
				{\$content}
				<p id=\"copyright\">Powered By: <strong>MyTopix <conf:version></strong><br />Copyright &copy;2004 - 2007,  <a href=\"http://www.jaia-interactive.com/\" title=\"<lang:visit_jaia>\">Jaia Interactive</a> all rights reserved.</p>
			</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_header', '{\$who} <lang:mailer_header> {\$sent}:
----------------------------------------------------------------

');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_member', '<div class=\"welcome\">
	<p class=\"shaft\"><a href=\"<sys:gate>?a=ucp\" title=\"<lang:welcome_control_title>\"><strong><lang:welcome_profile></strong></a> &middot; <a href=\"<sys:gate>?a=search&amp;CODE=03\" title=\"<lang:welcome_latest_title>\"><lang:welcome_latest></a> &middot; <a href=\"<sys:gate>?a=notes\" title=\"<lang:welcome_inbox_title>\"><lang:welcome_messages> (<user:members_newNotes>)</a></p>
	<p><lang:welcome_back>, <a href=\"<sys:gate>?getuser=<user:members_id>\" title=\"<lang:welcome_profile_title>\"><strong><user:members_name></strong></a>! (<a href=\"<sys:gate>?a=logon&CODE=02\" title=\"<lang:welcome_logout_title>\"><lang:welcome_logout></a>)</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_disabled', '<div class=\"welcome\">
        <p class=\"shaft\">&nbsp;</p>
	<p><lang:welcome_disabled></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_guest', '<div class=\"welcome\">
	<p class=\"shaft\"><a href=\"<sys:gate>?a=register&amp;CODE=03\" title=\"\"><lang:welcome_resend_validation></a></p>
	<p><lang:welcome_guest>, <user:members_name>! (<a href=\"<sys:gate>?a=register\" title=\"\"><lang:welcome_register></a> &middot; <a href=\"<sys:gate>?a=logon\" title=\"\"><lang:welcome_logon></a>)</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_message_level_1', '<div id=\"messenger\">
	<h2><lang:messenger_title>:</h2>
	<p>{\$message}</p>
	<h4>(<a href=\"{\$link}\" title=\"<lang:messenger_forward>\"><lang:messenger_forward></a>)</h4>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_admin', '<div class=\"welcome\">
	<p class=\"shaft\"><a href=\"<sys:gate>?a=ucp\" title=\"<lang:welcome_control_title>\"><strong><lang:welcome_profile></strong></a> &middot; <a href=\"<sys:gate>?a=search&amp;CODE=03\" title=\"<lang:welcome_latest_title>\"><lang:welcome_latest></a> &middot; <a href=\"<sys:gate>?a=notes\" title=\"<lang:welcome_inbox_title>\"><lang:welcome_messages> (<user:members_newNotes>)</a> &middot; <a href=\"<conf:site_link>admin/\" title=\"<lang:welcome_admin_title>\"><lang:welcome_link_admin></a></p>
	<p><lang:welcome_back>, <a href=\"<sys:gate>?getuser=<user:members_id>\" title=\"<lang:welcome_profile_title>\"><strong><user:members_name></strong></a>! (<a href=\"<sys:gate>?a=logon&CODE=02\" title=\"<lang:welcome_logout_title>\"><lang:welcome_logout></a>)</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_body', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<!-- Powered By: <conf:application> <conf:version> -->
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en\" xml:lang=\"en\"  dir=\"<lang:text_direction>\">
	<head>
		<title><conf:forum_title> - <lang:powered_by> <conf:application></title>
		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
		<meta name=\"generator\" content=\"editplus\" />
		<meta name=\"author\" content=\"Daniel Wilhelm II Murdoch, wilhelm@jaia-interactive.com, http://www.jaia-interactive.com\" />
		<meta name=\"keywords\" content=\"<conf:application> <conf:version>\" />
		<meta name=\"description\" content=\"\" />
		<script src=\"<sys:skinPath>/js/main.js\" type=\"text/javascript\"></script>
		<link href=\"<sys:skinPath>/styles.css\" rel=\"stylesheet\" type=\"text/css\" title=\"default\" />
	</head>
	<body>
	{\$content}
	</body>
</html>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_board_closed', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:global_board_closed></h3>
		<div id=\"warning\">
			<h3><lang:err_warn_title></h3>
			<p><strong><conf:closed_message></strong></p>
		</div>
		<h3><lang:closed_form_name_title></h3>
		<h4><lang:closed_form_name_title_info></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:closed_form_pass_title></h3>
		<h4><lang:closed_form_pass_title_info></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:closed_form_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:closed_form_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'active', 'active_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"<conf:title>\"><conf:title></a> / <lang:location_active>
</div>
<hr />
<div class=\"bar\">{\$pages}</div>
<hr />
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"4\"><lang:active_title></td>
		</tr>
		<tr>
			<th align=\"left\" width=\"15%\"><lang:col_name></td>
			<th align=\"left\" width=\"25%\"><lang:col_location></td>
			<th align=\"center\" width=\"25%\"><lang:col_last_seen></td>
			<th align=\"center\" width=\"10%\"><lang:col_note></td>
		</tr>
		{\$list}
	</table>
</div>
<hr />
<div class=\"bar\">{\$pages}</div>
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'active', 'active_row', '		<tr>
			<td class=\"cellone {\$row_color}\" align=\"left\">{\$row[\'active_user\']} {\$row[\'active_ip\']}</td>
			<td class=\"cellone {\$row_color}\" align=\"left\">{\$row[\'active_location\']}</td>
			<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'active_time\']}</td>
			<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'active_notes\']}</td>
		</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_message_level_2', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <lang:sys_bread_title>
</div>
<div class=\"formwrap\">
	<h3><lang:sys_err_title></h3>
	<h4><lang:sys_err_desc></h4>
	<div id=\"warning\">
		<h3><lang:err_warn_title></h3>
		<p><strong>{\$message}</strong></p>
	</div>
	<h3><lang:sys_err_option_title></h3>
	<ul>
		<li><a href=\"<sys:gate>?a=register\" title=\"\"><lang:sys_err_option_reg></a></li>
		<li><a href=\"<sys:gate>?a=logon&amp;CODE=03\" title=\"\"><lang:sys_err_option_rec></a></li>
		<li><a href=\"<sys:gate>?a=help\" title=\"\"><lang:sys_err_option_doc></a></li>
	</ul>
</div>
{\$logon_form}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_message_level_2_logon', '<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:sys_log_name_title></h3>
		<h4><lang:sys_log_name_desc></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:sys_log_pass_title></h3>
		<h4><lang:sys_log_pass_desc></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:form_logon_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_logon_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		<input type=\"hidden\" name=\"referer\" value=\"{\$referer}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'register', 'form_coppa_field', '		<p class=\"checkwarn\"><input class=\"check\" type=\"checkbox\" name=\"coppa\" {\$coppa} /> <strong><lang:field_coppa_agree></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_admin_user_name', 'Hello, {\$member[\'members_name\']}

This message is to inform you that your user name for <conf:title> ( <conf:site_link> )
has been modified. Below you will find your new user name:

Username: {\$name}

Log into your account through the link below:
<conf:site_link><sys:gate>?a=logon');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_field_attach', '		<h3><lang:attach_title></h3>
		<h4>{\$size_lang}</h4>
		<p class=\"checkwrap\"><input type=\"file\" name=\"upload\" /></p>');";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'wtf.gif', ':wtf:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'wink.gif', ';)', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'huh.gif', ':huh:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'up.gif', ':up:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'tongue.gif', ':P', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'stare.gif', ':|', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'squint.gif', '>_<', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'smile.gif', ':)', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'sick.gif', ':sick:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'shock.gif', ':o', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'shame.gif', ':shame:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'scared.gif', ':scared:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'sad.gif', ':(', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'rolleyes.gif', ':rolleyes:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'right.gif', ':right:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'rage.gif', ':rage:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'point.gif', ':point:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'nerd.gif', ':nerd:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'lup.gif', ':lup:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'left.gif', ':left:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'ldown.gif', ':ldown:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'laugh.gif', ':laugh:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'joy.gif', ':joy:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'angry.gif', ':angry:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'happy.gif', ':happy:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'grin.gif', ':D', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'glare.gif', ':glare:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'evil.gif', ':evil:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'down.gif', ':down:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'dead.gif', ':dead:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'crazy.gif', ':crazy:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'cool.gif', ':cool:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'booyah.gif', ':booyah:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'blank.gif', ':blank:', 1);";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Newcomer', 0, 1, 'pip_blue.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Common Folk', 25, 3, 'pip_poop.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'MyTopix™ Enthusiast', 100, 4, 'pip_purple.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Needs a Life', 500, 6, 'pip_red.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Post Meister', 1000, 8, 'pip_green.gif', {$dir});";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_announce_old', '<img src=\"{%SKIN%}/post_announce_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'txt_online_sep', ',&nbsp;', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_announce_new', '<img src=\"{%SKIN%}/post_announce_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'txt_bread_sep', '/', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_email', '<img src=\"{%SKIN%}/btn_email.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_go', '<input type=\"image\" src=\"{%SKIN%}/btn_go.gif\" width=\"23px\" height=\"23px\" class=\"small_button\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_prefix', '<img src=\"{%SKIN%}/topic_prefix.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_note_reply', '<img src=\"{%SKIN%}/reply_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_online', '<img src=\"{%SKIN%}/btn_online.gif\" alt=\"\" title=\"\" />&nbsp;', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_pin_old', '<img src=\"{%SKIN%}/post_pinned_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_pin_new', '<img src=\"{%SKIN%}/post_pinned_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_offline', '<img src=\"{%SKIN%}/btn_offline.gif\" alt=\"\" title=\"\" />&nbsp;', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_new_dot', '<img src=\"{%SKIN%}/post_open_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_old_dot', '<img src=\"{%SKIN%}/post_open_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_old', '<img src=\"{%SKIN%}/post_open_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_new', '<img src=\"{%SKIN%}/post_open_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_moved', '<img src=\"{%SKIN%}/post_moved.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_old', '<img src=\"{%SKIN%}/post_locked_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_old_dot', '<img src=\"{%SKIN%}/post_locked_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_new_dot', '<img src=\"{%SKIN%}/post_locked_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_new', '<img src=\"{%SKIN%}/post_locked_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_old_dot', '<img src=\"{%SKIN%}/post_hot_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_old', '<img src=\"{%SKIN%}/post_hot_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_new_dot', '<img src=\"{%SKIN%}/post_hot_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_new', '<img src=\"{%SKIN%}/post_hot_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_post_quote', '<img src=\"{%SKIN%}/post_quote.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_post_edit', '<img src=\"{%SKIN%}/post_edit.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_post_delete', '<img src=\"{%SKIN%}/post_delete.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_mini_pages', '<img src=\"{%SKIN%}/pages.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_note_unread', '<img src=\"{%SKIN%}/note_unread.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_note_read', '<img src=\"{%SKIN%}/note_read.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_mini_box', '<img src=\"{%SKIN%}/mini_box.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_reply', '<img src=\"{%SKIN%}/main_reply.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_qtopic', '<img src=\"{%SKIN%}/main_qtopic.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_qreply', '<img src=\"{%SKIN%}/main_qreply.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_new', '<img src=\"{%SKIN%}/main_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_locked', '<img src=\"{%SKIN%}/main_locked.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_delete_note', '<img src=\"{%SKIN%}/delete_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_subs_old', '<img src=\"{%SKIN%}/cat_subs_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_subs_new', '<img src=\"{%SKIN%}/cat_subs_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_redirect', '<img src=\"{%SKIN%}/cat_red.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_old', '<img src=\"{%SKIN%}/cat_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_new', '<img src=\"{%SKIN%}/cat_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_archived', '<img src=\"{%SKIN%}/cat_archived.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_yim', '<img src=\"{%SKIN%}/btn_yim.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_profile', '<img src=\"{%SKIN%}/btn_profile.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_note', '<img src=\"{%SKIN%}/btn_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_msn', '<img src=\"{%SKIN%}/btn_msn.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_icq', '<img src=\"{%SKIN%}/btn_icq.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_homepage', '<img src=\"{%SKIN%}/btn_homepage.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_aim', '<img src=\"{%SKIN%}/btn_aim.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_go', '<img src=\"{%SKIN%}/btn_go.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_new', '<img src=\"{%SKIN%}/post_poll_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_new_dot', '<img src=\"{%SKIN%}/post_poll_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_old_dot', '<img src=\"{%SKIN%}/post_poll_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_old', '<img src=\"{%SKIN%}/post_poll_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_note_send', '<img src=\"{%SKIN%}/send_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_add_event', '<img src=\"{%SKIN%}/main_event.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_poll', '<img src=\"{%SKIN%}/main_poll.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_clip', '&nbsp;<img src=\"{%SKIN%}/topic_attach_prefix.gif\" alt=\"\" title=\"\" />', 0);";
?><?php
$temps  = array();
$emots  = array();
$titles = array();
$macros = array();
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_attach', '<p class=\"attach\">
	<a href=\"<sys:gate>?a=misc&amp;CODE=01&amp;id={\$row[\'upload_id\']}\" title=\"\">{\$row[\'upload_name\']}</a> <strong><lang:attach_size></strong> {\$row[\'upload_size\']} <strong><lang:attach_hits></strong> {\$row[\'upload_hits\']}
</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_coppa', 'In compliance with the COPPA act your account is currently inactive.

Please print this message out and have your parent or guardian sign and date it. 
Then fax it to:

<conf:coppa_fax>

OR mail it to:

<conf:coppa_mail>

------------------------------ CUT HERE ------------------------------
Permission to Participate at <conf:title> ( <conf:site_link> )

Username: {\$username}
Password: {\$password}
Email:    {\$email}

I HAVE REVIEWED THE INFORMATION PROVIDED BY MY CHILD AND HEREBY GRANT PERMISSION 
TO <conf:title> TO STORE THIS INFORMATION. I UNDERSTAND THIS INFORMATION CAN BE 
CHANGED AT ANY TIME BY ENTERING A PASSWORD. I UNDERSTAND THAT I MAY REQUEST FOR 
THIS INFORMATION TO BE REMOVED FROM <conf:title> AT ANY TIME.


Parent or Guardian: ____________________________
                       (print full name here)
Full Signature:     ____________________________

Today\'s Date:       ____________________________

------------------------------ CUT HERE ------------------------------


Once the administrator has received the above form via fax or regular mail your 
account will be activated.

Please do not forget your password as it has been encrypted in our database and 
we cannot retrieve it for you. However, should you forget your password you can 
request a new one which will be activated in the same way as this account.

Thank you for registering.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'form_error_wrapper', '<div id=\"warning\">
<h3><lang:err_wrap_title></h3>
<p><strong><lang:err_wrap_desc></strong></p>
<ul>{\$err_list}</ul>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_files_none', '<tr>
	<td colspan=\"7\" align=\"center\"><strong><lang:file_none></strong></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_files_row', '<tr>
	<td class=\"one\" align=\"center\"><strong>{\$row[\'upload_id\']}</strong></td>
	<td><a href=\"<sys:gate>?a=misc&amp;CODE=01&amp;id={\$row[\'upload_id\']}\" title=\"\">{\$row[\'upload_name\']}</a></td>
	<td class=\"one\"><a href=\"<sys:gate>?a=read&amp;CODE=02&amp;p={\$row[\'upload_post\']}\" title=\"\">{\$row[\'topics_title\']}</a></td>
	<td align=\"center\">{\$row[\'upload_date\']}</td>
	<td class=\"one\" align=\"center\">{\$row[\'upload_size\']}</td>
	<td align=\"center\">{\$row[\'upload_hits\']}</td>
	<td class=\"one\" align=\"center\"><a href=\"<sys:gate>?a=ucp&amp;CODE=18&amp;id={\$row[\'upload_id\']}\" title=\"\" onclick=\"javascript: return confirm(\'<lang:file_link_del_conf>\');\"><lang:file_link_del></a></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_new_note', '<div id=\"message_alert\">
	<h3><lang:note_title></h3>
	<p><a href=\"<sys:gate>?getuser={\$note[\'members_id\']}\" title=\"\">{\$note[\'members_name\']}</a> <lang:note_desc> <a href=\"<sys:gate>?a=notes&amp;CODE=01&amp;nid={\$note[\'notes_id\']}\" title=\"\">{\$note[\'notes_title\']}</a>!</p>
</div>
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'mod_poll_option_row', '		<input type=\"text\" name=\"choice[{\$val[\'id\']}]\" style=\"width: 60%;\" tabindex=\"2\" value=\"{\$val[\'choice\']}\" /><input type=\"text\" name=\"votes[{\$val[\'id\']}]\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$val[\'votes\']}\" /><br />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'attach_rem_field', '<p class=\"checkwarn\"><input type=\"checkbox\" class=\"check\" name=\"remove_attach\" value=\"1\"  />&nbsp;<lang:attach_rem>&nbsp;( <a href=\"<sys:gate>?a=misc&amp;CODE=01&amp;id={\$file_id}\">{\$file_name}</a> )</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'mod_poll_wrapper', '		<h3><lang:mod_poll_editor_title></h3>
		<h4><lang:mod_poll_editor_desc></h4>
		<input type=\"text\" name=\"poll_title\" tabindex=\"1\" value=\"{\$poll[\'poll_question\']}\" />
		<h3><lang:poll_choice_title></h3>
		<h4><lang:poll_choice_desc></h4>
		{\$choices}
		<h3><lang:poll_expire_title></h3>
		<h4><lang:poll_expire_desc></h4>
		<input type=\"text\" name=\"days\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$days}\" />
		<h3><lang:poll_lock_title></h3>
		<h4><lang:poll_lock_desc></h4>
		<input type=\"text\" name=\"vote_lock\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$poll[\'poll_vote_lock\']}\" />
		<h3><lang:poll_options_title></h3>
		<h4><lang:poll_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"poll_only\" value=\"1\" tabindex=\"3\" {\$poll_only} /> <lang:poll_lock_option></p>
		<p class=\"checkwarn\"><input type=\"checkbox\" class=\"check\" name=\"remove\" value=\"1\" tabindex=\"3\" /> <lang:poll_delete></p>
		<input type=\"hidden\" name=\"poll\" value=\"{\$poll[\'poll_id\']}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_result_wrapper', '<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"2\">{\$poll[\'poll_question\']}</td>
		</tr>
		<tr>
			<th width=\"50%\"><lang:poll_tbl_header_choice></th>
			<th><lang:poll_tbl_header_result></th>
		</tr>
			{\$poll_list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_poll_choice_row', '<tr>
	<td class=\"cellone np\"><p class=\"checkwrap\"><input type=\"radio\" name=\"vote\" class=\"check\" id=\"choice_{\$val[\'id\']}\" value=\"{\$val[\'id\']}\" />&nbsp;<label for=\"choice_{\$val[\'id\']}\"><strong>{\$val[\'choice\']}</strong></label></p></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_poll_result_row', '<tr>
	<td class=\"cellone\"><strong>{\$val[\'choice\']}</strong></td>
	<td class=\"cellone\" align=\"right\"><img src=\"<sys:skinPath>/bar_left.gif\" alt=\"\" /><img src=\"<sys:skinPath>/bar_center.gif\" alt=\"\" width=\"{\$width}\" height=\"17px\" /><img src=\"<sys:skinPath>/bar_right.gif\" alt=\"\" /><br />{\$percent}% ( {\$val[\'votes\']} votes ) --
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_option_poll', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"poll\" value=\"1\" {\$poll_check} /> <lang:post_options_poll></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_choice_wrapper', '<form method=\"post\" action=\"<sys:gate>?a=read&amp;CODE=05&amp;t={\$this->_id}\">
	<div class=\"maintable\">
		<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
			<tr>
				<td class=\"header\">{\$poll[\'poll_question\']}</td>
			</tr>
			<tr>
				<th>&nbsp;</th>
			</tr>
				{\$poll_list}
		</table>
	</div>
<p class=\"submit\"><input type=\"button\" value=\"<lang:poll_submit_add>\" style=\"width: auto;\" /></p>
	<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_attach_poll', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / <a href=\"<sys:gate>?gettopic={\$this->_id}\" title=\"\">{\$topic[\'topics_title\']}</a> / <lang:poll_bread_title>
</div>
{\$error_list}
<form method=\"POST\" action=\"<sys:gate>?a=post&amp;CODE=08&amp;t={\$this->_id}\">
	<div class=\"formwrap\">
		<h3><lang:poll_title_title></h3>
		<h4><lang:poll_title_desc></h4>
		<input type=\"text\" name=\"title\" tabindex=\"1\" value=\"{\$title}\" />
		<h3><lang:poll_choice_title></h3>
		<h4><lang:poll_choice_desc></h4>
		<textarea name=\"choices\" tabindex=\"1\">{\$choices}</textarea>
		<h3><lang:poll_expire_title></h3>
		<h4><lang:poll_expire_desc></h4>
		<input type=\"text\" name=\"days\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$days}\" />
		<h3><lang:poll_lock_title></h3>
		<h4><lang:poll_lock_desc></h4>
		<input type=\"text\" name=\"vote_lock\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$vote_lock}\" />
		<h3><lang:poll_options_title></h3>
		<h4><lang:poll_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"poll_only\" value=\"1\" tabindex=\"3\" {\$poll_only} /> <strong><lang:poll_lock_option></strong></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:poll_button_submit>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:poll_button_reset>\" /></p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_edit_event_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=calendar\" title=\"\"><lang:bread_title_two></a> / <a href=\"<sys:gate>?getevent={\$this->_id}\" title=\"\">{\$row[\'event_title\']}</a> / <lang:edit_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}
}
</script>
<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
<a name=\"qwiknote\"></a>
<form method=\"POST\" action=\"<sys:gate>?a=calendar&amp;CODE=06&amp;id={\$this->_id}\" name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:form_add_type_title></h3>
		<h4><lang:form_add_type_desc></h4>
		<p class=\"checkwrap\">
			<strong><lang:form_start_date_on></strong>&nbsp;
			<select name=\"start_month\">{\$start_months}</select>&nbsp;
			<select name=\"start_day\">{\$start_days}</select>&nbsp;
			<select name=\"start_year\">{\$start_years}</select>
		</p>
		<p class=\"checkwrap\">
			<strong><lang:form_loop_every> </strong>&nbsp;
			<select name=\"loop_type\">{\$loop_types}</select>&nbsp;<strong><lang:form_loop_until></strong>&nbsp;
			<select name=\"end_month\">{\$end_months}</select>&nbsp;
			<select name=\"end_day\">{\$end_days}</select>&nbsp;
			<select name=\"end_year\">{\$end_years}</select>
		</p>
		{\$groups}
		<h3><lang:form_add_title_title></h3>
		<h4><lang:form_add_title_desc></h4>
		<input type=\'text\' name=\'title\' tabindex=\'1\' value=\"{\$title}\">
		{\$bbcode}
		<h3><lang:form_emoticon_title></h3>
		<h4><lang:form_emoticon_desc></h4>
		{\$emoticons}
		<h3><lang:form_body_title></h3>
		<h4><lang:form_body_desc> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:form_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:form_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:form_link_length></a> )</h4>
		<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
		<h3><lang:form_options_title></h3>
		<h4><lang:form_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" {\$code_check} /> <lang:form_code_desc></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" {\$emo_check} /> <lang:form_emo_desc></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:form_button_update>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:form_button_reset>\" /></p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_month_event', '<p>{\$event}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_read_event', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=calendar\" title=\"\"><lang:bread_title_two></a> / <lang:bread_title_read> {\$row[\'event_title\']}
</div>
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=calendar&CODE=02\" title=\"\"><macro:btn_add_event></a>
</div>
<div class=\"postwrap\">
	<div class=\"postheader\">{\$row[\'event_title\']} <em>( {\$type} )</em></div>
	<div class=\"user\">
		<p><a href=\"<sys:gate>?getuser={\$row[\'members_id\']}\" title=\"<lang:entry_link_profile>\"><strong>{\$row[\'members_name\']}</strong></a> <em>( <a href=\"<sys:gate>?a=search&CODE=02&mid={\$row[\'members_id\']}\" title=\"<lang:entry_post_find> {\$row[\'members_name\']}\">{\$row[\'members_posts\']}</a> )</em>
		<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span>
		<span><strong>&middot; <lang:entry_rank></strong> {\$row[\'members_pips\']}</span></p>
		{\$avatar}
	</div>
	<div class=\"post\">
		<h5><strong><lang:event_started> {\$date_starts} <lang:event_ends> {\$date_ends}</strong><span>{\$link_delete}&nbsp;{\$link_edit}</span></h5>
		<div class=\"post_content\">
			<p>{\$row[\'event_body\']}</p>{\$sig}
		</div>
	</div>
	<div class=\"foot\">
		<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:read_link_top_title>.\"><lang:read_link_top></a></span>
		<ul class=\"extras\">{\$active}{\$linkSpan}</ul>
	</div>
	<div class=\"postend\">&nbsp;</div>
</div>
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=calendar&CODE=02\" title=\"\"><macro:btn_add_event></a>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_group_list', '		<h3><lang:form_groups_title></h3>
		<h4><lang:form_groups_desc></h4>
		<p class=\"checkwrap\"><select name=\"groups[]\" size=\"5\" multiple=\"multiple\" style=\"width: 200px;\" class=\"jump\">{\$group_list}</select></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_new_event_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=calendar\" title=\"\"><lang:bread_title_two></a> / <lang:add_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}
}
</script>
<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
<a name=\"qwiknote\"></a>
<form method=\"POST\" action=\"<sys:gate>?a=calendar&amp;CODE=03\" name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:form_add_type_title></h3>
		<h4><lang:form_add_type_desc></h4>
		<p class=\"checkwrap\">
			<strong><lang:form_start_date_on> </strong>&nbsp;
			<select name=\"start_month\">{\$start_months}</select>&nbsp;
			<select name=\"start_day\">{\$start_days}</select>&nbsp;
			<select name=\"start_year\">{\$start_years}</select>
		</p>
		<p class=\"checkwrap\">
			<strong><lang:form_loop_every> </strong>&nbsp;
			<select name=\"loop_type\">{\$loop_types}</select>&nbsp;<strong><lang:form_loop_until></strong>&nbsp;
			<select name=\"end_month\">{\$end_months}</select>&nbsp;
			<select name=\"end_day\">{\$end_days}</select>&nbsp;
			<select name=\"end_year\">{\$end_years}</select>
		</p>
		{\$groups}
		<h3><lang:form_add_title_title></h3>
		<h4><lang:form_add_title_desc></h4>
		<input type=\'text\' name=\'title\' tabindex=\'1\' value=\"{\$title}\" />
		{\$bbcode}
		<h3><lang:form_emoticon_title></h3>
		<h4><lang:form_emoticon_desc></h4>
		{\$emoticons}
		<h3><lang:form_body_title></h3>
		<h4><lang:form_body_desc> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:form_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:form_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:form_link_length></a> )</h4>
		<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
		<h3><lang:form_options_title></h3>
		<h4><lang:form_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" checked=\"checked\" /> <lang:form_code_desc></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" checked=\"checked\" /> <lang:form_emo_desc></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:form_button_submit>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:form_button_reset>\" /></p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_blank_row', '<td class=\"{\$class}\">&nbsp;</td>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_date_row', '<td class=\"{\$class}\"><h4>{\$day}</h4><div class=\"events\">{\$events}</div></td>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_month_wrapper', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:bread_title> {\$lit_month}, {\$lit_year}
</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"2\" align=\"left\"><a href=\"<sys:gate>?a=calendar{\$link_prev}\" title=\"\">« {\$link_prev_lit_month}, {\$link_prev_lit_year}</a></td>
			<td class=\"header\" colspan=\"3\" align=\"center\">{\$lit_month}, {\$lit_year}</td>
			<td class=\"header\" colspan=\"2\" align=\"right\"><a href=\"<sys:gate>?a=calendar{\$link_next}\" title=\"\">{\$link_next_lit_month}, {\$link_next_lit_year} »</a></td>
		</tr>
		<tr>
			<th width=\"14%\" align=\"center\"><lang:lit_day_one></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_two></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_three></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_four></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_five></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_six></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_seven></th>
		</tr>
			{\$day_list}
	</table>
</div>
<div class=\"postbutton\"><a href=\"<sys:gate>?a=calendar&amp;CODE=02\" title=\"\"><macro:btn_add_event></a>
</div>
<form method=\"post\" action=\"<sys:gate>?a=calendar\">
<div class=\"formwrap\"><p class=\"sort\">
					<select name=\"month\" class=\"jump\">{\$months}</select>
					<select name=\"year\" class=\"jump\">{\$years}</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"go\" /></p>
</div>
				</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_avatar_row', '<li><a href=\"<sys:gate>?a=ucp&amp;CODE=16&amp;avatar={\$val}&amp;gallery={\$gallery}\" title=\"{\$val}\"><img src=\"<sys:sys_path>sys_images/ava_gallery/{\$gallery}/{\$val}\" alt=\"{\$val}\" /></li>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_avatar_gallery_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:ava_gallery_form_title></h3>
	<p class=\"checkwrap\"><lang:ava_tip></p>
	<h3><lang:ava_gallery_title></h3>
	<h4><lang:ava_gallery_tip></h4>
	<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=15\">
		<p class=\"checkwrap\">
			<select name=\"gallery\" class=\"jump\">
				{\$gallery_list}
			</select>
		</p>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:ava_gallery_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</form>
	<div id=\"avatar-gallery\">
		<ul>
			{\$avatar_rows}
		</ul>
	</div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sub_forum_row', '		<tr>
			<td align=\"center\" class=\"one\" width=\"1%\"><macro:icon_open_new></td>
			<td><a href=\"<sys:gate>?getforum={\$row[\'forum_id\']}\" title=\"\"><strong>{\$row[\'forum_name\']}</strong></a></td>
			<td align=\"center\" class=\"one\">{\$row[\'track_date\']}</td>
			<td align=\"center\"><a href=\"<sys:gate>?a=ucp&amp;CODE=13&amp;forum={\$row[\'forum_id\']}\" title=\"\"><strong><lang:sub_delete></strong></a></td>
		</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_stats', '<div class=\"infowrap\">
	<h1><lang:stat_title>:</h1>
	<h2><lang:stat_tip></h2>
	<p><lang:stat_totals><br />
	<lang:stat_newest><br />
	<lang:stat_online></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_announce', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"announce\" value=\"1\" {\$check[\'announce\']} /> <strong><lang:post_mod_options_announce></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_avatar_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:ava_title></h3>
	<p class=\"checkwrap\"><lang:ava_tip></p>
	<h4><strong><lang:ava_current></strong><br /> {\$avatar}</h4>
	<h4><lang:ava_ext> {\$ext}</h4>
</div>
<div class=\"formwrap\">
	<h3><lang:ava_gallery_title></h3>
	<h4><lang:ava_gallery_tip></h4>
	<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=15\">
		<p class=\"checkwrap\">
			<select name=\"gallery\" class=\"jump\">
				{\$gallery_list}
			</select>
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		</p>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:ava_gallery_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</form>
</div>
<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=17\" enctype=\'multipart/form-data\'>
	<div class=\"formwrap\">
		<h3><lang:ava_url_title></h3>
		<h4><lang:ava_url_tip></h4>
		<input type=\"text\" name=\"url\" value=\"{\$url}\" />
	</div>
	<div class=\"formwrap\">
		<h3><lang:ava_upload_title></h3>
		<h4><lang:ava_upload_tip></h4>
		<input type=\"file\" name=\"upload\" />
	</div>
	<div class=\"formwrap\">
		<h3><lang:ava_remove_title></h3>
		<p class=\"checkwarn\"><input type=\"checkbox\" class=\"check\" name=\"remove\" value=\"1\" /> <strong><lang:ava_remove_warn></strong></p>
		<p class=\"submit\">
		<input class=\"button\" type=\"submit\" value=\"<lang:ava_submit>\" />&nbsp;
		<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_jump_list', '	<form method=\"post\" action=\"<sys:gate>?a=topics\">
		<p class=\"sort\"><select name=\"forum\" class=\"jump\">
			{\$jump_list}
		</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:forum_jump>\" /></p>
	</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_mod_list', '	<form method=\"post\" action=\"<sys:gate>?a=mod&amp;t={\$this->_id}\" class=\"shaft\">
		<p class=\"sort\"><select name=\"CODE\" class=\"jump\">
			{\$mod_list}
		</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:mod_list>\" /></p>
		<input type=\"hidden\"  name=\"hash\" value=\"{\$hash}\" />
	</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topics_active', '<div class=\"infowrap\">
	<h1><lang:viewers_title></h1>
	<h2><lang:viewers_user_summary> ( <a href=\"<sys:gate>?a=active\" title=\"\"><lang:active_link_details></a> )</h2>
	<p>{\$list}</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_mod_wrapper', '<p class=\"moderator_list\"><em><lang:mod_label></em> {\$mod_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_sub_wrapper', '<p class=\"subforum_list\">{\$sub_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_mod_wrapper', '<p class=\"moderator_list\"><em><lang:mod_label></em> {\$mod_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_sub_wrapper', '<p class=\"subforum_list\">{\$sub_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_subscribe_forum_notice', 'Hello {\$row[\'members_name\']},

{\$topic[\'topics_last_poster_name\']}, from <conf:title> ( <conf:site_link> ), has just posted a reply
to a forum you have subscribed to ( {\$row[\'forum_name\']} ). You may follow the link below to 
read this topic:

<conf:site_link><sys:gate>?gettopic={\$topic[\'topics_id\']}

If you do not wish to receive subscription notices any longer you may turn this feature 
off within your personal control panel. To do this you may access your UCP through the 
above link.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_subs', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:sub_title></h3>
	<p class=\"checkwrap\"><lang:sub_tip></p>
	<h3><lang:sub_topics_title></h3>
	<h4><lang:sub_topics_desc></h4>
	<table class=\"ucp_table\" cellpadding=\"3\" cellspacing=\"1\">
		{\$topics}
	</table>
	<h3><lang:sub_forums_title></h3>
	<h4><lang:sub_forums_desc></h4>
	<table class=\"ucp_table\" cellpadding=\"3\" cellspacing=\"1\">
		{\$forums}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_field_subject', '		<h3><lang:post_field_subject></h3>
		<h4><lang:post_field_subject_tip></h4>
		<input type=\"text\" name=\"subject\" tabindex=\"1\" value=\"{\$subject}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_last_post', '	<span class=\"lastpost\">{\$last_date}</span><br />
	<strong><lang:last_post_in></strong> {\$forum[\'forum_last_post_title\']}<br />
	<strong><lang:last_post_by></strong> {\$forum[\'forum_last_post_user_name\']}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_wrapper', '		<h3><lang:post_options></h3>
		<h4><lang:post_options_tip></h4>
		{\$lock}
		{\$pin}
		{\$announce}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_pin', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"stick\" value=\"1\" {\$check[\'stuck\']} /> <strong><lang:post_mod_options_pin></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_option_bar', '		<h3><lang:post_options></h3>
		<h4><lang:post_options_tip>.</h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" {\$check_code} /> <lang:post_options_code></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" {\$check_emoticon} /> <lang:post_options_emoticon></p>
		{\$poll}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'topic_prefix', '<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><macro:img_prefix></a>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_button', '<a href=\"<sys:gate>{\$url}\" title=\"{\$title}\"><img src=\"<sys:skinPath>/{\$button}.gif\" alt=\"\" /></a>&nbsp;');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_cat_redirect', '<tr>
	<td class=\"cellone {\$row_color}\" width=\"1%\" align=\"center\"><macro:cat_redirect></td>
	<td class=\"cellone {\$row_color}\" colspan=\"2\">
		<h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$forum[\'forum_name\']}</a></h4>
		<p>{\$forum[\'forum_description\']}</p>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$forum[\'forum_red_clicks\']} <lang:cat_redirect></h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_cat_wrapper', '<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"5\"><a href=\"<sys:gate>?getforum={\$category[\'forum_id\']}\" title=\"{\$category[\'forum_name\']}\">{\$category[\'forum_name\']}</a></td>
		</tr>
		<tr>
			<th colspan=\"2\" align=\"left\" width=\"50%\"><lang:topics_col_forum></th>
			<th align=\"left\" width=\"30%\"><lang:topics_col_topics></th>
			<th align=\"center\" width=\"20%\"><lang:topics_col_topics> / <lang:topics_col_replies></th>
		</tr>
		{\$forum_list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_last_post', '	<span class=\"lastpost\">{\$last_date}</span><br />
	<strong><lang:last_post_in></strong> {\$forum[\'forum_last_post_title\']}<br />
	<strong><lang:last_post_by></strong> {\$forum[\'forum_last_post_user_name\']}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_news_section', '<p id=\"community_news\">
	<strong><lang:news_title>: <a href=\"<sys:gate>?a=read&amp;CODE=02&amp;p={\$news[\'news_post\']}\" title=\"<lang:news_title>\">{\$news[\'news_title\']}</a></strong><br />
	<cite>--<lang:news_date> {\$news[\'news_date\']}.</cite>
</p>
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_none', '							<tr>
								<td class=\"cellone\" align=\"center\" colspan=\"6\"><strong><lang:no_topics></strong></td>
							</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_cat_row', '<tr>
	<td class=\"cellone {\$row_color}\" width=\"1%\" align=\"center\">
		<a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$marker}</a>
	</td>
	<td class=\"cellone {\$row_color}\">
		<h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$forum[\'forum_name\']}</a></h4>
		{\$subs}
		<p>{\$forum[\'forum_description\']}{\$mods}</p>
	</td>
	<td class=\"cellone {\$row_color}\">{\$last_post}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$forum[\'forum_topics\']} / {\$forum[\'forum_posts\']}</h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sub_none', '<tr>
	<td colspan=\"4\" align=\"center\"><strong><lang:main_sub_none></strong></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sub_topic_row', '		<tr>
			<td align=\"center\" class=\"one\"><macro:icon_open_new></td>
			<td><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}\" title=\"\"><strong>{\$row[\'topics_title\']}</strong></a></td>
			<td align=\"center\" class=\"one\">{\$row[\'track_date\']}</td>
			<td align=\"center\"><a href=\"<sys:gate>?a=ucp&amp;CODE=12&amp;id={\$row[\'topics_id\']}\" title=\"\"><strong><lang:sub_delete></strong></a></td>
		</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_container', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <lang:bread_title>
</div>
<hr />
{\$new_note}
{\$news_bit}
{\$category_list}
<hr />
<div class=\"bar\"><span><a href=\"<sys:gate>?a=logon&amp;CODE=06\" title=\"<lang:link_delete_cookies>\"><strong><lang:link_delete_cookies></strong></a> &middot; <a href=\"<sys:gate>?a=logon&amp;CODE=07\" title=\"<lang:link_mark_all_read>\"><strong><lang:link_mark_all_read></strong></a></span>&nbsp;</div>
<hr />
{\$active_users}
<hr />
{\$board_stats}
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_cat_row', '<tr>
	<td class=\"cellone {\$row_color}\" width=\"1%\" align=\"center\">
		<a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$marker}</a>
	</td>
	<td class=\"cellone {\$row_color}\">
		<h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$forum[\'forum_name\']}</a></h4>
		{\$subs}
		<p>{\$forum[\'forum_description\']}{\$mods}</p>
	</td>
	<td class=\"cellone {\$row_color}\">{\$last_post}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$forum[\'forum_topics\']} / {\$forum[\'forum_posts\']}</h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_cat_redirect', '<tr>
	<td class=\"cellone {\$row_color}\" width=\"1%\" align=\"center\"><macro:cat_redirect></td>
	<td class=\"cellone {\$row_color}\" colspan=\"2\">
		<h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$forum[\'forum_name\']}</a></h4>
		<p>{\$forum[\'forum_description\']}</p>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$forum[\'forum_red_clicks\']} <lang:cat_redirect></h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_cat_wrapper', '<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"5\"><a href=\"<sys:gate>?getforum={\$category[\'forum_id\']}\" title=\"{\$category[\'forum_name\']}\">{\$category[\'forum_name\']}</a></td>
		</tr>
		<tr>
			<th colspan=\"2\" align=\"left\" width=\"50%\"><lang:main_col_forum></th>
			<th align=\"left\" width=\"30%\"><lang:main_col_latest></th>
			<th align=\"center\" width=\"20%\"><lang:main_col_topics> / <lang:main_col_replies></th>
		</tr>
		{\$forum_list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'register', 'resend_validation_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:validate_crumb_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=register&amp;CODE=04\">
	<div class=\"formwrap\">
		<h3><lang:validate_title></h3>
		<p class=\"checkwrap\"><lang:validate_tip></p>
		<h3><lang:validate_field_email></h4>
		<h4><lang:validate_field_email_tip></h3>
		<input type=\'text\' name=\'email\' tabindex=\'1\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:validate_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:validate_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_registration_complete', 'Hello, {\$username}

The account you created at <conf:title> ( <conf:site_link> ) is now activated and ready to
use. Depending on your browser settings you may or may not be automatically logged in.
If not just use the following link to log your account:

<conf:site_link><sys:gate>?a=logon

Thank you for participating in our community!');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_main', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:main_title></h3>
	<p class=\"checkwrap\"><lang:main_tip></p>
	<h3><lang:main_email></h3>
	<h4><user:members_email></h4>
	<h3><lang:main_joined></h3>
	<h4>{\$join_date}</h4>
	<h3><lang:main_posts></h3>
	<h4><a href=\"<sys:gate>?a=search&amp;CODE=02&amp;mid=<user:members_id>\">{\$total_posts}</a> <lang:main_posts_stat></h4>
	<h3><lang:main_notes></h3>
	<h4><a href=\"<sys:gate>?a=notes\">{\$total_notes}</a> <lang:main_notes_stat></h4>
	<h3><lang:file_title></h3>
	<h4><lang:file_desc></h4>
	<table class=\"ucp_table\" cellpadding=\"3\" cellspacing=\"1\" with=\"100%\">
		<tr>
			<th width=\"1%\" align=\"center\"><lang:file_col_id></th>
			<th><lang:file_col_name></th>
			<th><lang:file_col_topic></th>
			<th align=\"center\"><lang:file_col_date></th>
			<th align=\"center\"><lang:file_col_size></th>
			<th align=\"center\"><lang:file_col_hits></th>
			<th>&nbsp;</th>
		</tr>
		{\$files}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_tabs', '<ul id=\"ucp_tabs\">
	{\$list}
</ul>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_match_result_row', '<tr>
	<td class=\"cellone {\$row_color}\" align=\"center\" width=\"1%\"><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\">{\$row[\'topics_marker\']}</a></td>
	<td class=\"cellone {\$row_color}\">
		{\$row[\'topics_prefix\']} 
		<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;hl={\$hlLink}\" title=\"{\$row[\'topics_title\']}\">{\$row[\'topics_title\']}</a> {\$inlineNav}<br />
		<span class=\"subject\">{\$row[\'topics_subject\']}</span>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><strong>{\$row[\'topics_author\']}</strong></td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><a href=\"<sys:gate>?getforum={\$row[\'topics_forum\']}\" title=\"\">{\$row[\'forum_name\']}</a></td>
	<td class=\"cellone {\$row_color}\">
		<span class=\"lastpost\">{\$row[\'topics_last\']}</span><br />
		<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><lang:topic_last_replied>:</a> <strong>{\$row[\'topics_poster\']}</strong>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$row[\'topics_posts\']} / {\$row[\'topics_views\']}</h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_match_result_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=search\" title=\"<lang:search_form_title>\"><lang:search_form_title></a> / <strong>{\$count}</strong> <lang:search_result_title>:
</div>
<div class=\"bar\">{\$pages}</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"6\">{\$count} <lang:search_result_title></td>
		</tr>
		<tr>
			<th align=\"left\" width=\"30%\" colspan=\"2\"><lang:result_col_title></th>
			<th align=\"center\" width=\"10%\"><lang:result_col_author></th>
			<th align=\"center\" width=\"20%\"><lang:result_col_forum></th>
			<th align=\"center\" width=\"20%\"><lang:result_col_last></th>
			<th align=\"center\" width=\"15%\"><lang:result_col_replies> / <lang:result_col_views></th>
		</tr>
		{\$list}
	</table>
</div>
<div class=\"bar\">{\$pages}</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_pass_get_1', 'You have recently attempted to recover your password from <conf:title> ( <conf:site_link> ).
To complete the process you must click the following link to validate your request. Once validation is 
complete you will be mailed your new account password. You will be able to change this password at anytime 
via your control panel.

{\$url}

Take note that this validation link will expire within 24 hours.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_admin_user', 'Hello, {\$name}

This message is to inform you that your account for <conf:title> ( <conf:site_link> )
has been activated. Below you will find your account access information which you may change
at anytime through your personal control panel.

Username: {\$name}
Password: {\$password}

Log your account through the link below:
<conf:site_link><sys:gate>?a=logon\";');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_pass_get_2', 'Hello, {\$row[\'members_name\']}

This message is to inform you that your account for <config:title> ( <config:site_link> )
has been activated. Below you will find your account access information which you may change
at anytime through your personal control panel.

Username: {\$row[\'members_name\']}
Password: {\$pass}

Log your account through the link below:

<conf:site_link><sys:gate>?a=logon');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_email', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=10\'>
	<div class=\"formwrap\">
		<h3><lang:email_title></h3>
		<p class=\"checkwrap\"><lang:email_tip></p>
		<h4><strong><lang:email_current></strong> <user:members_email></h4>
		<h3><lang:email_field_pass></h3>
		<h4><lang:email_field_pass_tip></h4>
		<input type=\"password\" name=\"password\" />
		<h3><lang:email_field_new></h3>
		<h4><lang:email_field_new_tip></h4>
		<input type=\"text\" name=\"new\" value=\"{\$email_one}\" />
		<h3><lang:email_field_con></h3>
		<h4><lang:email_field_con_tip></h4>
		<input type=\"text\" name=\"confirm\" value=\"{\$email_two}\" />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:email_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:email_button_reset>\" />
		</p>
	</div>
	<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_options', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=08\'>
	<div class=\"formwrap\">
		<h3><lang:board_title></h3>
		<p class=\"checkwrap\"><lang:board_tip></p>
		<h3><lang:board_field_skin></h3>
		<h4><lang:board_field_skin_tip></h4>
		<p class=\"checkwrap\"><select name=\"skin\">
			{\$skins}
		</select></p>
		<h3><lang:board_field_lang></h3>
		<h4><lang:board_field_lang_tip></h4>
		<p class=\"checkwrap\"><select name=\"lang\">
			{\$langs}
		</select></p>
		<h3><lang:board_field_zone></h3>
		<h4><lang:board_field_zone_tip></h4>
		<p class=\"checkwrap\"><select name=\"zone\">
			{\$zones}
		</select></p>
		<h3><lang:board_field_notify></h3>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"notes\" value=\"1\"{\$checked[\'notes\']} /> <b><lang:board_field_note>?</b></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"sigs\" value=\"1\"{\$checked[\'sigs\']} /> <b><lang:board_field_sigs>?</b></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"avatars\" value=\"1\"{\$checked[\'avatars\']} /> <b><lang:board_field_avatars>?</b></p>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:board_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'print', 'print_row', '<div id=\"resultwrap\">
	<h3><a href=\'<sys:gate>?getuser={\$row[\'members_id\']}\'><strong>{\$row[\'members_name\']}</strong></a> | <span>{\$row[\'posts_date\']}</span></h3>
	<div class=\"post\"><p>{\$row[\'posts_body\']}</p></div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_lock', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"lock\" value=\"1\" {\$check[\'locked\']} /> <strong><lang:post_mod_options_lock></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'post_name_field', '		<h3><lang:post_field_name></h3>
		<h4><lang:post_field_name_tip></h4>
		<input type\"text\" name=\"name\" tabindex=\"1\" value=\"{\$name}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_banned', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:banned_title></h3>
		<div id=\"warning\">
			<h3><lang:err_warn_title></h3>
			<p><strong><lang:banned_info></strong></p>
		</div>
		<h3><lang:banned_form_name_title></h3>
		<h4><lang:banned_form_name_title_info></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:banned_form_pass_title></h3>
		<h4><lang:banned_form_pass_title_info></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:banned_form_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:banned_form_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_pass', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=06\'>
	<div class=\"formwrap\">
		<h3><lang:pass_title></h3>
		<p class=\"checkwrap\"><lang:pass_tip></p>
		<h3><lang:pass_field_password></h3>
		<h4><lang:pass_field_password_tip></h4>
		<input type=\"password\" name=\"current\" />
		<h3><lang:pass_field_new></h3>
		<h4><lang:pass_field_new_tip></h4>
		<input type=\"password\" name=\"new\" />
		<h3><lang:pass_field_con></h3>
		<h4><lang:pass_field_con_tip></h4>
		<input type=\"password\" name=\"confirm\"\" />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:pass_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:pass_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'page_wrapper', '<macro:img_mini_pages> {\$links}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'print', 'print_body', '<script language=\"JavaScript\">
	<!--
	window.print();
	-->
</script>
<div id=\"print\">
	<h2><span><conf:title> ( <a href=\"<conf:site_link>\" title=\"\"><conf:site_link></a> )</span> {\$topic[\'topics_title\']}</h2>
	<p class=\"bar\"><b><lang:source>: <a href=\"#\" onclick=\"javascript: return prompt(\'<lang:link_copy_prompt>:\', \'<conf:site_link><sys:gate>?gettopic={\$topic[\'topics_id\']}\');\"><conf:site_link><sys:gate>?gettopic={\$this->_id}</a></b></p>
	{\$content}
	<p class=\"bar\"><span><a href=\"javascript: scroll(0,0);\" title=\"\"><strong><lang:top></strong></a></span><strong><lang:source>: <a href=\"#\" onclick=\"javascript: return prompt(\'<lang:link_copy_prompt>:\', \'<conf:site_link><sys:gate>?gettopic={\$topic[\'topics_id\']}\');\"><conf:site_link><sys:gate>?gettopic={\$this->_id}</a></strong></p>
	<div id=\"copyright\"><span>Powered By: <strong>MyTopix&trade; | Personal Message Board</strong> <conf:version></span>Copyright &copy;  2004,  <a href=\"http://www.jaia-interactive.com/\" title=\"<lang:visit_jaia>\">Jaia Interactive</a> all rights reserved.</div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_full_result_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=search\" title=\"<lang:search_form_title>\"><lang:search_form_title></a> / <strong>{\$count}</strong> <lang:search_result_title>:
</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"7\">{\$count} <lang:search_result_title></td>
		</tr>
		<tr>
			<th align=\"left\" width=\"1%\"><lang:result_col_score></th>
			<th align=\"left\" width=\"30%\" colspan=\"2\"><lang:result_col_title></th>
			<th align=\"center\" width=\"10%\"><lang:result_col_author></th>
			<th align=\"center\" width=\"20%\"><lang:result_col_forum></th>
			<th align=\"center\" width=\"20%\"><lang:result_col_last></th>
			<th align=\"center\" width=\"15%\"><lang:result_col_replies> / <lang:result_col_views></th>
		</tr>
		{\$list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sig', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <user:class_sigLength>;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}

}
</script>
<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
<form method=\'post\' action=\'<sys:gate>?a=ucp&amp;CODE=04\' name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:sig_title></h3>
		<p class=\"checkwrap\"><lang:sig_tip></p>
		<h3><lang:sig_field_current></h3>
		<p class=\"sig\">{\$parsed}</p>
		{\$bbcode}
		<h3><lang:sig_emoticons></h3>
		<h4><lang:sig_emoticons_tip></h4>
		{\$emoticons}
		<h3><lang:sig_field_body></h3>
		<h4><lang:sig_field_body_tip> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\" title=\"<lang:sig_link_code_title>\"><lang:sig_link_code></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\" title=\"<lang:sig_link_emoticons_tip>\"><lang:sig_link_emoticons></a> · <a href=\"javascript:check_length()\" title=\"<lang:sig_link_length_tip>\"><lang:sig_link_length></a> )</h4>
		<textarea name=\"body\">{\$sig}</textarea>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:sig_button_submit>\" /> 
			<input class=\"reset\" type=\"reset\" value=\"<lang:sig_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_jump_list', '<form method=\"post\" action=\"<sys:gate>?a=topics\" class=\"shaft\">
			<p class=\"sort\"><select name=\"forum\" class=\"jump\">
				{\$jump_list}
			</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:forum_jump>\" /></p>
		</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_full_result_row', '<tr>
	<td class=\"cellone {\$row_color}\" align=\"center\"><strong>{\$row[\'topics_score\']}%</strong></td>
	<td class=\"cellone {\$row_color}\" align=\"center\" width=\"1%\"><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\">{\$row[\'topics_marker\']}</a></td>
	<td class=\"cellone {\$row_color}\">
		{\$row[\'topics_prefix\']} 
		<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;hl={\$hlLink}\" title=\"{\$row[\'topics_title\']}\">{\$row[\'topics_title\']}</a> {\$inlineNav}<br />
		<span class=\"subject\">{\$row[\'topics_subject\']}</span>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><strong>{\$row[\'topics_author\']}</strong></td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><a href=\"<sys:gate>?getforum={\$row[\'topics_forum\']}\" title=\"{\$row[\'forum_name\']}\">{\$row[\'forum_name\']}</a></td>
	<td class=\"cellone {\$row_color}\">
		<span class=\"lastpost\">{\$row[\'topics_last\']}</span><br />
		<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><lang:topic_last_replied>:</a> <strong>{\$row[\'topics_poster\']}</strong>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$row[\'topics_posts\']} / {\$row[\'topics_views\']}</h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'move_topic', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / <a href=\"<sys:gate>?gettopic={\$this->_id}\" title=\"\">{\$row[\'topics_title\']}</a> / <lang:mod_move_bread>
</div>
<form method=\"post\" action=\"<sys:gate>?a=mod&amp;CODE=05&amp;t={\$this->_id}\">
	<div class=\"formwrap\">
		<h3><lang:mod_move_title></h3>
		<h4><lang:mod_move_desc></h4>
		<p class=\"checkwrap\">
			<input type=\"checkbox\" name=\"link\" class=\"check\" value=\"1\"> <strong><lang:mod_move_link></strong>
		</p>
		<p class=\"checkwrap\">
			<select name=\"forum\" size=\"5\" class=\"big\" id=\"forum\">
				{\$search_list}
			</select>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:mod_move_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:mod_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_validate_user', 'Hello, {\$username}

Our records indicate that you have just attempted to register a new account with our board.
Currently, the administrator of this community thinks it best to first validate all new 
user accounts to prevent spamming and abuse. To activate your account you only need to click
on the link below. Once you do this the system will allow you to log in to your account.

Activation Key:

<conf:site_link><sys:gate>?a=register&CODE=02&key={\$key}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'by_user_row', '<div id=\"resultwrap\">
	<h3><a href=\"<sys:gate>?a=read&amp;CODE=02&amp;p={\$row[\'posts_id\']}\" title=\"\"><b>{\$row[\'topics_title\']}</b></a> | <span>{\$row[\'posts_date\']}</span></h3>
	<div class=\"post\"><p>{\$row[\'posts_body\']}</p></div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'by_user_table', '<div id=\"crumb_nav\">
<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <strong>{\$count}</strong> <lang:search_result_user_title> <strong>{\$user}</strong>:
</div>
<div class=\"bar\">{\$pages}</div>
{\$list}
<div class=\"bar\">{\$pages}</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:search_form_title>:
</div>
<script language=\"javascript\">

	function selectAll(list, select)
	{
		var list = document.getElementById(list);
		
		for (var i = 0; i < list.length; i++)
		{
			list.options[i].selected = select.checked;
		}
	}

</script>
<form method=\"post\" action=\"<sys:gate>?a=search&CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:search_form_field_phrase></h3>
		<h4><lang:search_form_field_phrase_tip></h4>
		<input type=\"text\" name=\"keywords\" value=\"{\$this->_phrase}\" />
		<h3><lang:search_form_type>:</h3>
		<h4><lang:search_form_type_tip>.</h4>
		<p class=\"checkwrap\">
			<input type=\"radio\" name=\"mode\" class=\"check\" value=\"match\" checked=\"checked\" /> <strong><lang:search_form_basic></strong>&nbsp;
			<span id=\"matchtype\">
				<input type=\"checkbox\" name=\"type\" class=\"check\" value=\"1\" /> <lang:search_form_basic_exact>
			</span>
		</p>
		<p class=\"checkwrap\">
			<input type=\"radio\" name=\"mode\" class=\"check\" value=\"full\" /> <strong><lang:search_form_full></strong> &nbsp;
			<span id=\"limit\">
				<select name=\"limit\">
					<option value=\"10\" selected=\"selected\">10</option>
					<option value=\"20\">20</option>
					<option value=\"30\">30</option>
					<option value=\"40\">40</option>
				</select> <lang:search_form_full_limit>
			</span>
		</p>
		<h3><lang:search_form_forum_title></h3>
		<h4><lang:search_form_forum_desc></h4>
		<p class=\"checkwrap\">
			<input type=\"checkbox\" name=\"all\" class=\"check\" value=\"all\" onclick=\"selectAll(\'forums\', this)\" checked=\"checked\"/> <strong><lang:search_form_forum_all></strong>
		</p>
		<p class=\"checkwrap\">
			<select name=\"forums[]\" size=\"5\" multiple=\"multiple\" class=\"big\" id=\"forums\">
				{\$search_list}
			</select>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:search_form_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:search_form_button_reset>\" />
		</p>
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'sig', '<p class=\"sig\">{\$row[\'members_sig\']}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'register', 'form_register', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:register_crumb_title>
</div>
{\$error_list}
<form method=\"post\" action=\"<sys:gate>?a=register&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:registration_title></h3>
		<p class=\"checkwrap\"><lang:registration_tip></p>
		<h3><lang:field_username></h3>
		<h4><lang:field_username_tip></h4>
		<input type=\"text\" name=\"username\" value=\"{\$username}\" />
		<h3><lang:field_pass></h3>
		<h4><lang:field_pass_tip></h4>
		<input type=\"password\" name=\"password\" />
		<h3><lang:field_con_pass></h3>
		<h4><lang:field_con_pass_tip></h4>
		<input type=\"password\" name=\"cpassword\" />
		<h3><lang:field_email></h3>
		<h4><lang:field_email_tip></h4>
		<input type=\"text\" name=\"email\" value=\"{\$email_one}\" />
		<h3><lang:field_con_email></h3>
		<h4><lang:field_con_email_tip></h4>
		<input type=\"text\" name=\"cemail\" value=\"{\$email_two}\" />
		<h3><lang:field_terms></h3>
		<h4><lang:field_terms_tip></h4>
		<textarea rows=\"\" cols=\"\"><lang:field_terms_content></textarea>
		<p class=\"checkwrap\"><input class=\"check\" type=\"checkbox\" name=\"contract\" {\$contract} /> <strong><lang:field_agree></strong></p>
		{\$coppa_field}
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_general', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=02\'>
	<div class=\"formwrap\">
		<h3><lang:gen_title></h3>
		<p class=\"checkwrap\"><lang:gen_tip></p>
		<h3><lang:gen_field_location></h3>
		<h4><lang:gen_field_location_tip></h4>
		<input type=\"text\" name=\"location\" value=\"{\$location}\" />
		<h3><lang:gen_field_website></h3>
		<h4><lang:gen_field_website_tip></h4>
		<input type=\"text\" name=\"homepage\" value=\"{\$homepage}\" />
		<h3><lang:gen_field_birthday></h3>
		<h4><lang:gen_field_birthday_tip></h4>
		<p class=\"checkwrap\">
			<select name=\'bmonth\'>
				{\$months}
			</select>
			&nbsp;
			<select name=\'bday\'>
				{\$days}
			</select>
			&nbsp;
			<select name=\'byear\'>
				{\$years}
			</select>
		</p>
		<h3><lang:gen_field_aim></h3>
		<h4><lang:gen_field_aim_tip></h4>
		<input type=\"text\" name=\"aim\" value=\"{\$aim}\" />
		<h3><lang:gen_field_icq></h3>
		<h4><lang:gen_field_icq_tip></h4>
		<input type=\"text\" name=\"icq\" value=\"{\$icq}\" />
		<h3><lang:gen_field_yim></h3>
		<h4><lang:gen_field_yim_tip></h4>
		<input type=\"text\" name=\"yim\" value=\"{\$yim}\" />
		<h3><lang:gen_field_msn></h3>
		<h4><lang:gen_field_msn_tip></h4>
		<input type=\"text\" name=\"msn\" value=\"{\$msn}\" />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:gen_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:gen_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'post_row_guest', '<div class=\"user\">
	<a name=\"{\$row[\'posts_id\']}\"></a>
	<p><strong>{\$row[\'posts_author_name\']}</strong>
	<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span></p>
	<img src=\"<sys:skinPath>/ava_none.gif\" class=\"avatar\" alt=\"\" title=\"\" />
</div>
<div class=\"post\">
	<h5><strong><lang:posted_on> {\$row[\'posts_date\']}</strong><span>{\$linkDelete}{\$linkEdit}{\$linkQuote}</span></h5>
	<p>{\$row[\'posts_body\']}</p>{\$attach}
</div>
<div class=\"foot\">
	<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:entry_link_top_tip>\"><lang:entry_link_top></a></span>
	&nbsp;
</div>
<div class=\"postend\">&nbsp;</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'post_table', '{\$poll_data}
<div class=\"postwrap\">
        <div class=\"postheader\"><span>{\$topic[\'topics_title\']}</span></div>
        {\$list}
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_active', '<div class=\"infowrap\">
	<h1><lang:readers_title></h1>
	<h2><lang:readers_user_summary> ( <a href=\"<sys:gate>?a=active\" title=\"\"><lang:active_link_details></a> )</h2>
	<p>{\$list}</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_buttons', '<div class=\"postbutton\">
	{\$button_reply} {\$button_qwik} {\$button_topic} {\$button_poll}
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'reply_bit', '<div id=\"qwikwrap\" style=\"display: none;\">
	<script language=\"javascript\">
	function check_length()
	{
		var limit  = <conf:max_post> * 1000;
		var length = document.REPLIER.body.value.length;

		if ( (length > limit) ) {
			alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
		} else {
			alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
		}

	}
	</script>
	<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
	<a name=\"qwik\"></a>
	<form method=\"post\" action=\"<sys:gate>?a=post&amp;CODE=01&amp;t={\$this->_id}&amp;qwik=1\" name=\"REPLIER\">
		<div class=\"formwrap\">
			<h3><lang:qwik_title>.</h3>
			<p class=\"checkwrap\"><lang:qwik_title_tip>.</p>
			<h3><lang:qwik_field_body>:</h3>
			<h4><lang:qwik_field_body_tip> (<a href=\'javascript:smilie_window(\"<sys:gate>\");\' title=\"<lang:qwik_link_emoticons>\"><lang:qwik_link_emoticons></a> &middot; <a href=\"javascript:check_length();\" title=\"<lang:qwik_link_length>\"><lang:qwik_link_length></a>)</h2>
			<textarea name=\"body\" rows=\"\" cols=\"\"></textarea>
			<p class=\"submit\">
				<input class=\"button\" type=\"submit\" value=\"<lang:qwik_button_submit>\" />&nbsp;
				<input class=\"reset\" type=\"reset\" value=\"<lang:qwik_button_reset>\" />
			</p>
			<input type=\"hidden\" name=\"cOption\" value=\"1\" />
			<input type=\"hidden\" name=\"eOption\" value=\"1\" />
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		</div>
	</form>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'post_row', '<div class=\"user\">
	<a name=\"{\$row[\'posts_id\']}\"></a>
	<p><a href=\"<sys:gate>?getuser={\$row[\'members_id\']}\" title=\"<lang:entry_link_profile>\"><strong>{\$row[\'members_name\']}</strong></a> <em>( <a href=\"<sys:gate>?a=search&CODE=02&mid={\$row[\'members_id\']}\" title=\"<lang:entry_post_find> {\$row[\'members_name\']}\">{\$row[\'members_posts\']}</a> )</em>
	<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span>
	<span><strong>&middot; <lang:entry_rank></strong> {\$row[\'members_pips\']}</span></p>
	{\$avatar}<div style=\"clear:both;\" /></div>
</div>
<div class=\"post\">
	<h5><strong><lang:posted_on> {\$row[\'posts_date\']}</strong><span>{\$linkDelete}{\$linkEdit}{\$linkQuote}</span></h5>
	<div class=\"post_content\">
		<p>{\$row[\'posts_body\']}</p>{\$attach}{\$sig}
	</div>
</div>
<div class=\"foot\">
	<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:entry_link_top_tip>\"><lang:entry_link_top></a></span>
	<ul class=\"extras\"><li>{\$active}</li>{\$linkSpan}</ul>
</div>
<div class=\"postend\">&nbsp;</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'container_read', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / {\$topic[\'topics_title\']}
</div>
{\$buttons}
	<div class=\"bar\">
		<span><a href=\"<sys:gate>?gettopic={\$topic[\'topics_id\']}&amp;CODE=01\" title=\"<lang:subscribe_tip>\"><strong><lang:subscribe></strong></a></span>
		{\$pages}
	</div>
{\$content}
<div class=\"bar\">
	<span><a href=\"<sys:gate>?gettopic={\$topic[\'topics_id\']}&amp;CODE=03&amp;forum={\$topic[\'topics_forum\']}\" title=\"<lang:previous>\"><strong><lang:previous></strong></a> &middot; <a href=\"<sys:gate>?a=topics&amp;forum={\$topic[\'topics_forum\']}\" title=\"<lang:index>\"><strong><lang:index></strong></a> &middot; <a href=\"<sys:gate>?gettopic={\$topic[\'topics_id\']}&amp;CODE=04&amp;forum={\$topic[\'topics_forum\']}\" title=\"<lang:next>\"><strong><lang:next></strong></a></span>
	{\$pages}
</div>
{\$buttons}
<div class=\"formwrap\">
{\$mod}
{\$jump}
</div>
{\$replier}
{\$readers}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'quote_field', '		<h3><lang:post_field_quote></h3>
		<h4><lang:post_field_quote_tip></h4>
		<textarea name=\"quote\">{\$message}</textarea>
		{\$hidden}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'smilie_wrapper', '<table class=\"emoticon\" cellpadding=\"0\" cellspacing=\"0\">
	{\$smilies}
</table>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_field_title', '		<h3><lang:post_field_title></h3>
		<h4><lang:post_field_title_tip></h4>
		<input type=\"text\" name=\"title\" tabindex=\"1\" value=\"{\$title}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'profile', 'profile_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:profile_title> {\$row[\'members_name\']}
</div>
<div id=\"left_column\">
	<div class=\"formwrap\">
		<h3><lang:profile_name></h3>
		<h4>{\$row[\'members_name\']} ( {\$row[\'class_prefix\']}{\$row[\'class_title\']}{\$row[\'class_suffix\']} )</h4>
		<h3><lang:profile_last_visit></h3>
		<h4>{\$row[\'members_lastvisit\']}</h4>
		<h3><lang:profile_registered></h3>
		<h4>{\$row[\'members_registered\']}</h4>
		<h3><lang:profile_birthday></h3>
		<h4>{\$birthday}</h4>
		<h3><lang:profile_stats></h3>
		<h4><a href=\'<sys:gate>?a=search&amp;CODE=02&amp;mid={\$row[\'members_id\']}\'>{\$row[\'members_posts\']}</a> <lang:profile_posts> ( {\$row[\'members_per_day\']} / <lang:per_day> )</h4>
		<h3><lang:profile_last_5></h3>
		<ul>
			{\$topics}
		</ul>
		<h3><lang:profile_location></h3>
		<h4>{\$row[\'members_location\']}</h4>
	</div>
</div>
<div id=\"right_column\">
	<div class=\"formwrap\">
		<h3><lang:profile_home></h3>
		<h4>{\$row[\'members_homepage\']}</h4>
		<h3><lang:profile_aol></h3>
		<h4>{\$row[\'members_aim\']}</h4>
		<h3><lang:profile_yim></h3>
		<h4>{\$row[\'members_yim\']}</h4>
		<h3><lang:profile_msn></h3>
		<h4>{\$row[\'members_msn\']}</h4>
		<h3><lang:profile_icq></h3>
		<h4>{\$row[\'members_icq\']}</h4>
		<h3><lang:profile_other></h3>
		<ul>
			<li><a href=\'<sys:gate>?a=notes&amp;CODE=07&amp;send={\$row[\'members_id\']}\'><lang:profile_link_note></a></li>
		</ul>
	</div>
</div>
<div id=\"signature\">
	<div class=\"formwrap\">
		<h3><lang:profile_sig></h3>
		<p class=\"sig\">{\$row[\'members_sig\']}</p>
	</div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'emoticons_field', '		<h3><lang:post_emoticon_title></h3>
		<h4><lang:post_emoticon_tip></h4>
		{\$smilies}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_wrapper', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> {\$bread_crumb}
</div>
{\$errors}
<script language=\'javascript\'>
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;
		if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}

}
</script>
<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
<form method=\"POST\" action=\"{\$this->_form_action}\" name=\"REPLIER\" {\$this->_form_multipart}>
	<div class=\"formwrap\">
		<h3>{\$this->_form_title}</h3>
		<p class=\"checkwrap\">{\$this->_form_tip}</p>
		{\$recipient}
		{\$name}
		{\$title}
		{\$subject}
		{\$bbcode}
		{\$emoticons}
		<h3><lang:post_message_title></h3>
		<h4><lang:post_message_tip> (  <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:post_link_bbcode></a> · <a href=\'javascript:smilie_window(\"<sys:gate>\")\'><lang:post_link_emoticons></a> · <a href=\'javascript:check_length()\'><lang:post_link_length></a> )</h4>
		<textarea name=\"body\" rows=\"5\" tabindex=\"1\">{\$message}</textarea>
		{\$quote}
		{\$convert}
		{\$upload}
		{\$tools}
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" tabindex=\"2\" value=\"{\$this->_form_submit}\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		{\$hidden}
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'bbcode_field', '	<div id=\'bbcode_panel\' style=\'display: none;\'>
		<h3><lang:bb_title></h3>
		<h4><lang:bb_title_tip></h4>
		<table cellpadding=\'3\' cellspacing=\'0\'>
			<tr>
				<td align=\'left\'>
					<input type=\'button\' class=\'bbcode\' value=\' U \' onClick=\'codeBasic(this)\' name=\'u\' />
					<input type=\'button\' class=\'bbcode\' value=\' I \' onClick=\'codeBasic(this)\' name=\'i\' />
					<input type=\'button\' class=\'bbcode\' value=\' B \' onClick=\'codeBasic(this)\' name=\'b\' /> 
					<select name=\'FONT\' style=\'width: 100px;\' onchange=\'fontFace(this.options[this.selectedIndex].value)\'>
						<option value=\'0\'><lang:bb_select_font></option>
						<option style=\'font-family: tahoma; font-weight: bold;\' value=\'Arial\'>Tahoma</option>
						<option style=\'font-family: times; font-weight: bold;\' value=\'Times\'>Times</option>
						<option style=\'font-family: courier; font-weight: bold;\' value=\'Courier\'>Courier</option>
						<option style=\'font-family: impact; font-weight: bold;\' value=\'Impact\'>Impact</option>
						<option style=\'font-family: geneva; font-weight: bold;\' value=\'Geneva\'>Geneva</option>
						<option style=\'font-family: optima; font-weight: bold;\' value=\'Optima\'>Optima</option>
					</select>
					<select name=\'SIZE\' style=\'width: 100px;\' onchange=\'fontSize(this.options[this.selectedIndex].value)\'>
						<option value=\'0\'><lang:bb_select_size></option>
						<option value=\'1\'><lang:bb_size_small></option>
						<option value=\'7\'><lang:bb_size_large></option>
						<option value=\'14\'><lang:bb_size_largest></option>
					</select>
					<select name=\'COLOR\' style=\'width: 100px;\' onchange=\'fontColor(this.options[this.selectedIndex].value)\'>
						<option value=\'0\'><lang:bb_select_color></option>
						<option value=\'blue\' style=\'color:blue\'><lang:bb_color_blue></option>
						<option value=\'red\' style=\'color:red\'><lang:bb_color_red></option>
						<option value=\'purple\' style=\'color:purple\'><lang:bb_color_purple></option>
						<option value=\'orange\' style=\'color:orange\'><lang:bb_color_orange></option>
						<option value=\'yellow\' style=\'color:yellow\'><lang:bb_color_yellow></option>
						<option value=\'gray\' style=\'color:gray\'><lang:bb_color_gray></option>
						<option value=\'green\' style=\'color:green\'><lang:bb_color_green></option>
					</select>
				</td>
			</tr>
			<tr>
				<td align=\'left\'>
					<input type=\'button\' class=\'bbcode\' value=\' # \' onClick=\'codeBasic(this)\' name=\'code\' />
					<input type=\'button\' class=\'bbcode\' value=\' \"QUOTE\" \' onClick=\'codeBasic(this)\' name=\'quote\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' List \' onClick=\'codeList()\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' IMG \' onClick=\'codeBasic(this)\' name=\'img\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' @ \' onClick=\'codeBasic(this)\' name=\'email\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' URL \' onClick=\'codeBasic(this)\' name=\'url\' /> 
				</td>
			</tr>
		</table>
		<p class=\"checkwrap\"><input type=\'radio\' class=\"check\" name=\'mode\' value=\'adv\' checked=\'checked\' /> <b><lang:bb_mode_advanced></b> <lang:bb_mode_advanced_tip>.</p>
		<p class=\"checkwrap\"><input type=\'radio\' class=\"check\" name=\'mode\' value=\'simple\'/> <b><lang:bb_mode_simple></b> <lang:bb_mode_simple_tip>.</p>
	</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"<conf:title>\"><conf:title></a> <macro:txt_bread_sep> <lang:notes_main_title>
</div>
<hr />
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>
</div>
<hr />
<div class=\"bar\">
	{\$pages}
</div>
<hr />
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"5\"><lang:note_your_notes> ( {\$filled}% <lang:note_full> )</td>
		</tr>
		<tr>
			<th align=\"left\" width=\"40%\" colspan=\"2\"><lang:note_col_title></td>
			<th align=\"center\" width=\"20%\"><lang:note_col_sender></td>
			<th align=\"center\" width=\"25%\"><lang:note_col_recieved></td>
			<th width=\"5%\">&nbsp;</td>
		</tr>
		{\$list}
	</table>
</div>
<hr />
<div class=\"bar\">
	{\$pages}
</div>
<hr />
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>&nbsp;<a href=\"<sys:gate>?a=notes&amp;CODE=05\" title=\"\" onclick=\"javascript: return confirm(\'<lang:empty_inbox_confirm>?\');\"><macro:btn_delete_note></a>
</div>
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_row', '<tr>
	<td class=\"cellone {\$row_color}\" align=\"center\" width=\"1%\"><a href=\'<sys:gate>?a=notes&amp;CODE=06&amp;nid={\$row[\'notes_id\']}\'>{\$row[\'notes_marker\']}</a></td>
	<td class=\"cellone {\$row_color}\"><a href=\"<sys:gate>?a=notes&amp;CODE=01&amp;nid={\$row[\'notes_id\']}\">{\$row[\'notes_title\']}</a></td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><a href=\'<sys:gate>?getuser={\$row[\'notes_sender\']}\'><strong>{\$row[\'members_name\']}</strong></a></td>
	<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'notes_date\']}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><a href=\"<sys:gate>?a=notes&amp;CODE=04&amp;nid={\$row[\'notes_id\']}\" title=\"\" onclick=\"javascript: return confirm(\'<lang:read_delete_confirm>?\');\"><b><lang:read_delete_title></b></a></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_read', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=notes\" title=\"\"><lang:notes_inbox_title></a> / <lang:notes_read_crumb_title> {\$row[\'notes_title\']}
</div>
<div class=\"postbutton\">
	<a href=\'<sys:gate>?a=notes&amp;CODE=3&amp;nid={\$this->_id}&amp;send={\$row[\'members_name\']}\'><macro:btn_note_reply></a>&nbsp;<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>
</div>
<div class=\"postwrap\">
	<div class=\"postheader\"><span>{\$row[\'notes_title\']}</span></div>
	<div class=\"user\">
		<a name=\"{\$row[\'notes_id\']}\"></a>
		<p><a href=\"<sys:gate>?getuser={\$row[\'members_id\']}\" title=\"<lang:entry_link_profile>\"><strong>{\$row[\'members_name\']}</strong></a> <em>( <a href=\"<sys:gate>?a=search&CODE=02&mid={\$row[\'members_id\']}\" title=\"<lang:entry_post_find> {\$row[\'members_name\']}\">{\$row[\'members_posts\']}</a> )</em>
		<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span>
		<span><strong>&middot; <lang:entry_rank></strong> {\$row[\'members_pips\']}</span></p>
		{\$avatar}<div style=\"clear:both;\" /></div>
	</div>
	<div class=\"post\">
		<h5><strong><lang:sent_on> {\$row[\'notes_date\']}</strong><span><a href=\"<sys:gate>?a=notes&amp;CODE=04&amp;nid={\$row[\'notes_id\']}\" title=\"<lang:read_button_delete>\" onclick=\"javascript: return confirm(\'<lang:read_delete_confirm>\');\"><img src=\"<sys:skinPath>/post_delete.gif\" alt=\"<lang:read_delete_confirm>\" /></a></span></h5>
		<div class=\"post_content\">
			<p>{\$row[\'event_body\']}</p>{\$sig}
		</div>
	</div>
	<div class=\"foot\">
		<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:read_link_top_title>.\"><lang:read_link_top></a></span>
		<ul class=\"extras\">{\$linkSpan}</ul>
	</div>
	<div class=\"postend\">&nbsp;</div>
</div>
<div class=\"postbutton\">
	<a href=\'<sys:gate>?a=notes&amp;CODE=3&amp;nid={\$this->_id}&amp;send={\$row[\'members_name\']}\'><macro:btn_note_reply></a>&nbsp;<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_none', '							<tr>
								<td class=\"cellone\" align=\"center\" colspan=\"5\"><strong><lang:no_notes></strong></td>
							</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'notes_send_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <a href=\"<sys:gate>?a=notes\" title=\"\"><lang:notes_main_title></a> <macro:txt_bread_sep> <lang:notes_new_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
	function check_length()
	{
		var limit  = <conf:max_post> * 1000;
		var length = document.REPLIER.body.value.length;

		if ( (length > limit) ) {
			alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
		} else {
			alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
		}
	}
	</script>
	<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
	<a name=\"qwiknote\"></a>
	<form method=\"POST\" action=\"<sys:gate>?a=notes&amp;CODE=02\" name=\"REPLIER\">
		<div class=\"formwrap\">
			<h3><lang:notes_send_title></h3>
			<p class=\"checkwrap\"><lang:form_send_tip></p>
			<h3><lang:post_field_recipient_title>:</h3>
			<h4><lang:post_field_recipient_tip> ( <a href=\'<sys:gate>?a=members\'><lang:post_field_recipient_link_search></a> )</h4>
			<input type=\'text\' name=\'recipient\' value=\'{\$to}\' tabindex=\'1\'  />
			<h3><lang:post_field_title>:</h3>
			<h4><lang:post_field_title_tip>.</h4>
			<input type=\'text\' name=\'title\' tabindex=\'2\' value=\"{\$title}\" />
			{\$bbcode}
			<h3><lang:post_emoticon_title></h3>
			<h4><lang:post_emoticon_tip></h4>
			{\$emoticons}
			<h3><lang:post_message_title></h3>
			<h4><lang:post_message_tip> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:post_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:post_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:post_link_length></a> )</h4>
			<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
			<h3><lang:post_options></h3>
			<h4><lang:post_options_tip>.</h4>
			<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_code></p>
			<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_emoticon></p>
			<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:post_button_send>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:post_button_reset>\" /></p>
			<input type=\'hidden\' name=\'redirect\' value=\'new\' />
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		</div>
	</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'notes_reply_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=notes\" title=\"\"><lang:notes_inbox_title></a> / <a href=\"<sys:gate>?a=notes&amp;CODE=01&amp;nid={\$this->_id}\" title=\"\">{\$bread_title}</a> / <lang:notes_reply_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}

}
</script>
<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
<a name=\"qwiknote\"></a>
<form method=\"POST\" action=\"<sys:gate>?a=notes&amp;CODE=02&amp;nid={\$this->_id}\" name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:notes_reply_title> {\$note[\'notes_title\']}</h3>
		<h4><lang:form_send_tip></h4>
		<h3><lang:post_field_recipient_title>:</h3>
		<h4><lang:post_field_recipient_tip> ( <a href=\'<sys:gate>?a=members\'><lang:post_field_recipient_link_search></a> )</h4>
		<input type=\'text\' name=\'recipient\' value=\'{\$recipient}\' tabindex=\'1\' />
		<h3><lang:post_field_title>:</h3>
		<h4><lang:post_field_title_tip>.</h4>
		<input type=\'text\' name=\'title\' value=\"{\$note[\'notes_title\']} \"tabindex=\'2\' />
		{\$bbcode}
		<h3><lang:post_emoticon_title></h3>
		<h4><lang:post_emoticon_tip></h4>
		{\$emoticons}
		<h3><lang:post_message_title></h3>
		<h4><lang:post_message_tip> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:post_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:post_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:post_link_length></a> )</h4>
		<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
		<h3><lang:post_field_quote></h3>
		<h4><lang:post_field_quote_tip></h4>
		<textarea name=\"quote\" tabindex=\'3\'>{\$quote}</textarea>
		<h3><lang:post_options></h3>
		<h4><lang:post_options_tip>.</h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_code></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_emoticon></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:post_button_send>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:post_button_reset>\" /></p>
		<input type=\'hidden\' name=\"id\" value=\"{\$this->_id}\" />
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'misc', 'emoticon_row', '	<tr>
		<td class=\'celltwo\'>{\$code[\$i]}</td>
		<td class=\'celltwo\'>
			<a href=\'javascript:add_smilie(\"{\$code[\$i]}\")\'>{\$name[\$i]}</a>
		</td>
	</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'misc', 'emoticon_wrapper', '<script language=\'javascript\'>

	function add_smilie(text)
	{
		opener.document.REPLIER.body.value += \" \" + text + \" \";

	}

</script>
<table class=\"maintable\" cellpadding=\'6\' cellspacing=\'1\' width=\"95%\">
	<tr>
		<td class=\"header\" colspan=\"2\"><lang:emoticon_legend>:</td>
	</tr>
	<tr>
		<th class=\"cellone\" colspan=\'2\'>( <a href=\'javascript:this.close()\'><lang:close_window></a> )</th>
	</tr>
	{\$list}
	<tr>
		<td class=\"footer\" colspan=\"2\">&nbsp;</td>
	</tr>
</table>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'topic_editor', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / <a href=\"<sys:gate>?gettopic={\$this->_id}\" title=\"\">{\$topic[\'topics_title\']}</a> / <lang:mod_edit_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=mod&amp;CODE=03&amp;t={\$this->_id}\">
	<div class=\"formwrap\">
		<h3><lang:mod_form_title> {\$topic[\'topics_title\']}</h3>
		<h4><lang:mod_form_tip></h4>
		<h3><lang:mod_field_title></h3>
		<h4><lang:mod_field_title_tip></h4>
		<input type=\"text\" name=\"title\" value=\"{\$topic[\'topics_title\']}\" />
		<h3><lang:mod_field_subject></h3>
		<h4><lang:mod_field_subject></h4>
		<input type=\"text\" name=\"subject\" value=\"{\$topic[\'topics_subject\']}\" />
		<h3><lang:mod_field_views></h3>
		<h4><lang:mod_field_views_tip></h4>
		<input type=\"text\" name=\"views\" value=\"{\$topic[\'topics_views\']}\" />
		{\$mod_poll}
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" name=\"submit\" value=\"<lang:mod_edit_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:mod_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_table', '{\$buttons}
<hr />
<div class=\"bar\">
	<span>
		<a href=\"<sys:gate>?getforum={\$this->_forum}&amp;CODE=02\" title=\"<lang:forum_subscribe>\"><strong><lang:forum_subscribe></strong></a>
	</span>
	{\$pages}
</div>
<hr />
<div class=\"maintable\">
<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
	<tr>
		<td class=\"header\" colspan=\"5\">{\$forum_data[\'forum_name\']}</td>
	</tr>
	<tr>
		<th width=\"45%\" colspan=\"2\" align=\"left\"><lang:main_col_title></th>
		<th  align=\"center\" width=\"10%\"><lang:main_col_author></th>
		<th width=\"20%\"><lang:main_col_last_post></th>
		<th align=\"center\" width=\"25%\"><lang:topic_posts> / <lang:topic_views></th>
	</tr>
	{\$list}
</table>
</div>
<hr />
<div class=\"bar\">
	<span>
		<a href=\"<sys:gate>?getforum={\$this->_forum}&amp;CODE=01\" title=\"<lang:mark_read>\"><strong><lang:mark_read></strong></a>
	</span>
	{\$pages}
</div>
<hr />
{\$buttons}
<hr />
{\$post}
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'members', 'list_row', '<tr>
	<td class=\"cellone {\$row_color}\"><a href=\'<sys:gate>?getuser={\$row[\'members_id\']}\'>{\$row[\'class_prefix\']}{\$row[\'members_name\']}{\$row[\'class_suffix\']}</a></td>
	<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'members_posts\']}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'members_rank\']}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><strong>{\$row[\'class_title\']}</strong></td>
	<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'members_registered\']}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'members_homepage\']}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><a href=\'<sys:gate>?a=notes&amp;CODE=07&amp;send={\$row[\'members_id\']}\'><macro:btn_mini_note></a></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'members', 'list_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:index_title>
</div>
<div class=\"bar\">{\$pages}</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"8\"><lang:index_title>:</td>
		</tr>
		<tr>
			<th align=\"left\" width=\"15%\"><lang:member_name></th>
			<th align=\"center\" width=\"10%\"><lang:member_posts></th>
			<th align=\"center\" width=\"10%\"><lang:member_rank></th>
			<th align=\"center\" width=\"20%\"><lang:member_group></th>
			<th align=\"center\" width=\"25%\"><lang:member_joined></th>
			<th align=\"center\" width=\"10%\"><lang:member_page></th>
			<th align=\"center\" width=\"10%\"><lang:member_note></th>
		</tr>
		{\$list}
	</table>
</div>
<div class=\"bar\">{\$pages}</div>
<form method=\"post\" action=\"<sys:gate>?a=members\">
	<div class=\"formwrap\">
		<h3><lang:search_title></h3>
		<p class=\"sort\">
		<lang:search_get> 
		<select name=\'sGroup\'>
			<option value=\'all\'><lang:search_group></option>
			{\$sort_groups}
		</select> by 
		<select name=\'sField\'>
			{\$sort_type}
		</select> <lang:search_in>
		<select name=\'sOrder\'>
			{\$sort_order}
		</select> <lang:search_with>
		<select name=\'sResults\'>
			{\$sort_count}
		</select> <lang:search_per_page> 
		<input class=\"submit\" type=\"submit\" value=\"<lang:search_button>\" />
		</p>
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_row', '<tr>
	<td class=\"cellone {\$row_color}\" width=\"1%\"><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\">{\$row[\'topics_marker\']}</a></td>
	<td class=\"cellone {\$row_color}\">
		{\$row[\'topics_prefix\']} 
		<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}\" title=\"{\$row[\'topics_title\']}\">{\$row[\'topics_title\']}</a> {\$inlineNav}<br />
		<span class=\"subject\">{\$row[\'topics_subject\']}</span>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><strong>{\$row[\'topics_author\']}</strong></td>
	<td class=\"cellone {\$row_color}\">
		<span class=\"lastpost\">{\$row[\'topics_last\']}</span><br />
		<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><lang:topic_last_replied></a> <strong>{\$row[\'topics_poster\']}</strong>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$row[\'topics_posts\']} / {\$row[\'topics_views\']}</h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'active_users', '<div class=\"infowrap\">
	<h1><lang:active_user_title> </h1>
	<h2><lang:active_user_summary> (<a href=\"<sys:gate>?a=active\" title=\"<lang:active_link_details>\"><lang:active_link_details></a>)</h2>
	<p>{\$list}</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'container_main', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb}
</div>
{\$child_forums}
{\$topics}
<div class=\"formwrap\">
	{\$jump}
	<form method=\"post\" action=\"<sys:gate>?a=search&amp;CODE=01\">
		<input type=\"text\" class=\"small_text\" name=\"keywords\" />&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:search_forums>\" />
		<input type=\"hidden\" name=\"forum\" value=\"{\$this->_forum}\" />
	</form>
</div>
{\$active}
{\$board_stats}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'main_buttons', '<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=post&CODE=03&amp;forum={\$this->_forum}\" title=\"<lang:button_new_topic>\"><macro:btn_main_new></a>&nbsp;<a href=\"#qwik\" title=\"<lang:button_new_qwik>\" onclick=\"javascript:return toggleBox(\'qwikform\');\"><macro:btn_main_qtopic></a>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'statistics', '<div class=\"infowrap\">
	<h1><lang:stat_title>:</h1>
	<h2><lang:stat_tip></h2>
	<p><lang:stat_totals><br />
	<lang:stat_newest><br />
	<lang:stat_online></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_bit', '<div id=\"qwikform\" style=\"display: none;\">
	<script language=\"javascript\">
	function check_length()
	{

		var limit = {\$length};

		var length = document.REPLIER.body.value.length;

		if ( (length > limit) ) {

			alert(\'Your message is too long ( \' + length + \' chars ), please shorten it to less than \' + limit + \' characters.\');

		} else {

			alert(\'You are currently using \' + length + \' characters. Maximum allowable amount should not exceed \' + limit);

		}

	}
	</script>
	<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
	<form method=\"POST\" action=\"<sys:gate>?a=post&amp;CODE=00\" name=\"REPLIER\">
		<a name=\"qwik\"></a>
		<div class=\"formwrap\">
			<h3><lang:qwik_title></h3>
			<p class=\"checkwrap\"><lang:qwik_form_tip></p>
			<h3><lang:qwik_form_field_title></h3>
			<h4><lang:qwik_form_field_title_field></h4>
			<input type=\"text\" name=\"title\" />
			<h3><lang:qwik_form_field_body></h3>
			<h4><lang:qwik_form_field_body_tip> ( <a href=\"javascript:smilie_window(\'<sys:gate>\')\" title=\"View emoticon choices\"><lang:qwik_form_link_emoticons></a> &middot; <a href=\"javascript:check_length()\" title=\"Check the length of your topic\"><lang:qwik_form_link_length></a> )</h4>
			<textarea name=\"body\" rows=\"\" cols=\"\"></textarea>
			<p class=\"submit\">
				<input class=\"button\" type=\"submit\" value=\"<lang:qwik_form_button_post>\" />&nbsp;
				<input class=\"reset\" type=\"reset\" value=\"<lang:qwik_form_button_reset>\" />
			</p>
			<input type=\"hidden\" name=\"cOption\" value=\"1\" />
			<input type=\"hidden\" name=\"eOption\" value=\"1\" />
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
			<input type=\"hidden\" name=\"subject\" value=\"\" />
			<input type=\"hidden\" name=\"forum\" value=\"{\$this->_forum}\" />
		</div>
	</form>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'logon', 'form_pass_retrieve_1', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:form_retrieve_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=04\">
	<div class=\"formwrap\">
		<h3><lang:form_retrieve_title></h3>
		<p class=\"checkwrap\"><lang:form_retrieve_tip></p>
		<h3><lang:form_retrieve_field_email></h3>
		<h4><lang:form_retrieve_field_email_tip></h4>
		<input type=\'text\' name=\'email\' tabindex=\'1\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:form_retrieve_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_retrieve_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_note_notify', 'Hello, {\$row[\'members_name\']}

<user:members_name>, from <conf:title> ( <conf:site_link> ), has just sent you a new personal note.
If you wish to read it, click the link below to go straight to your notes index:	

<conf:site_link><sys:gate>?a=notes

If you do not wish to recieve notifications any longer be sure to turn this feature off within your
personal control panel which can be found through the link above.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_subscribe_topic_notice', 'Hello {\$row[\'members_name\']},

{\$row[\'topics_last_poster_name\']}, from <conf:title> ( <conf:site_link> ), has just posted a reply
to a topic you have subscribed to. You may follow the link below to read this post:

<conf:site_link><sys:gate>?gettopic={\$this->_id}&p={\$page}#{\$post}

If you do not wish to recieve subscription notices any longer you may turn this feature 
off within your personal control panel. To do this you may access your UCP through the 
above link.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'help', 'title_row', '<li><a href=\"#{\$count}\" title=\"{\$row[\'help_title\']}\">{\$row[\'help_title\']}</a></li>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'logon', 'form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:form_logon_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:form_logon_title></h3>
		<p class=\"checkwrap\"><lang:form_logon_tip></p>
		<h3><lang:sys_err_option_title></h3>
		<ul>
			<li><a href=\"<sys:gate>?a=register\" title=\"\"><lang:sys_err_option_reg></a></li>
			<li><a href=\"<sys:gate>?a=logon&amp;CODE=03\" title=\"\"><lang:sys_err_option_rec></a></li>
		</ul>
		<h3><lang:form_logon_field_username></h3>
		<h4><lang:form_logon_field_username_tip></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:form_logon_field_password></h3>
		<h4><lang:form_logon_field_password_tip></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:form_logon_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_logon_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'help', 'container_help', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:help_crumb_title>
</div>
<div class=\"infowrap\">
    <h1><lang:help_title></h1>
    <h2><lang:help_tip></h2>
    <ul>
        {\$titles}
    </ul>
</div>
{\$entries}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'help', 'content_row', '<div class=\"infowrap\">
	<a name=\"{\$count}\"></a>
	<h3>{\$count}. {\$row[\'help_title\']}</h3>
	<p>{\$row[\'help_content\']}</p>
	<p class=\"top\"><a href=\"javascript:scroll(0,0);\" title=\"<lang:link_top_title>\"><lang:link_top></a></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_footer', '
----------------------------------------------------------------
<lang:mailer_footer> MyTopix | Personal Message Board {\$this->config[\'version\']}.  http://www.jaia-interactive.com');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_wrapper', '			<div id=\"wrap\">
				<h1 id=\"logo\"><a href=\"<sys:gate>?a=main\" title=\"<lang:logo_alt>\">MyTopix</a></h1>
				<ul id=\"top_nav\">
					<li><a href=\"<conf:site_link><sys:gate>?a=members\" title=\"\"><lang:uni_tab_members></a></li>
					<li><a href=\"<conf:site_link><sys:gate>?a=search\" title=\"\"><lang:uni_tab_search></a></li>
					<li><a href=\"<conf:site_link><sys:gate>?a=calendar\" title=\"\"><lang:uni_tab_calendar></a></li>
				</ul>
				{\$this->welcome}
				{\$content}
				<p id=\"copyright\">Powered By: <strong>MyTopix <conf:version></strong><br />Copyright &copy;2004 - 2007,  <a href=\"http://www.jaia-interactive.com/\" title=\"<lang:visit_jaia>\">Jaia Interactive</a> all rights reserved.</p>
			</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_header', '{\$who} <lang:mailer_header> {\$sent}:
----------------------------------------------------------------

');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_member', '<div class=\"welcome\">
	<p class=\"shaft\"><a href=\"<sys:gate>?a=ucp\" title=\"<lang:welcome_control_title>\"><strong><lang:welcome_profile></strong></a> &middot; <a href=\"<sys:gate>?a=search&amp;CODE=03\" title=\"<lang:welcome_latest_title>\"><lang:welcome_latest></a> &middot; <a href=\"<sys:gate>?a=notes\" title=\"<lang:welcome_inbox_title>\"><lang:welcome_messages> (<user:members_newNotes>)</a></p>
	<p><lang:welcome_back>, <a href=\"<sys:gate>?getuser=<user:members_id>\" title=\"<lang:welcome_profile_title>\"><strong><user:members_name></strong></a>! (<a href=\"<sys:gate>?a=logon&CODE=02\" title=\"<lang:welcome_logout_title>\"><lang:welcome_logout></a>)</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_disabled', '<div class=\"welcome\">
        <p class=\"shaft\">&nbsp;</p>
	<p><lang:welcome_disabled></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_guest', '<div class=\"welcome\">
	<p class=\"shaft\"><a href=\"<sys:gate>?a=register&amp;CODE=03\" title=\"\"><lang:welcome_resend_validation></a></p>
	<p><lang:welcome_guest>, <user:members_name>! (<a href=\"<sys:gate>?a=register\" title=\"\"><lang:welcome_register></a> &middot; <a href=\"<sys:gate>?a=logon\" title=\"\"><lang:welcome_logon></a>)</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_message_level_1', '<div id=\"messenger\">
	<h2><span><a href=\"{\$link}\" title=\"<lang:messenger_forward>\"><lang:messenger_forward></a></span><lang:messenger_title>:</h2>
	<p>{\$message}</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_admin', '<div class=\"welcome\">
	<p class=\"shaft\"><a href=\"<sys:gate>?a=ucp\" title=\"<lang:welcome_control_title>\"><strong><lang:welcome_profile></strong></a> &middot; <a href=\"<sys:gate>?a=search&amp;CODE=03\" title=\"<lang:welcome_latest_title>\"><lang:welcome_latest></a> &middot; <a href=\"<sys:gate>?a=notes\" title=\"<lang:welcome_inbox_title>\"><lang:welcome_messages> (<user:members_newNotes>)</a> &middot; <a href=\"<conf:site_link>admin/\" title=\"<lang:welcome_admin_title>\"><lang:welcome_link_admin></a></p>
	<p><lang:welcome_back>, <a href=\"<sys:gate>?getuser=<user:members_id>\" title=\"<lang:welcome_profile_title>\"><strong><user:members_name></strong></a>! (<a href=\"<sys:gate>?a=logon&CODE=02\" title=\"<lang:welcome_logout_title>\"><lang:welcome_logout></a>)</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_body', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<!-- Powered By: <conf:application> <conf:version> -->
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en\" xml:lang=\"en\"  dir=\"<lang:text_direction>\">
	<head>
		<title><conf:forum_title> - <lang:powered_by> <conf:application></title>
		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
		<meta name=\"generator\" content=\"editplus\" />
		<meta name=\"author\" content=\"Daniel Wilhelm II Murdoch, wilhelm@jaia-interactive.com, http://www.jaia-interactive.com\" />
		<meta name=\"keywords\" content=\"<conf:application> <conf:version>\" />
		<meta name=\"description\" content=\"\" />
		<script src=\"<sys:skinPath>/js/main.js\" type=\"text/javascript\"></script>
		<link href=\"<sys:skinPath>/styles.css\" rel=\"stylesheet\" type=\"text/css\" title=\"default\" />
	</head>
	<body>
	{\$content}
	</body>
</html>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_board_closed', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:global_board_closed></h3>
		<div id=\"warning\">
			<h3><lang:err_warn_title></h3>
			<p><strong><conf:closed_message></strong></p>
		</div>
		<h3><lang:closed_form_name_title></h3>
		<h4><lang:closed_form_name_title_info></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:closed_form_pass_title></h3>
		<h4><lang:closed_form_pass_title_info></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:closed_form_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:closed_form_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'active', 'active_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"<conf:title>\"><conf:title></a> / <lang:location_active>
</div>
<hr />
<div class=\"bar\">{\$pages}</div>
<hr />
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"4\"><lang:active_title></td>
		</tr>
		<tr>
			<th align=\"left\" width=\"15%\"><lang:col_name></td>
			<th align=\"left\" width=\"25%\"><lang:col_location></td>
			<th align=\"center\" width=\"25%\"><lang:col_last_seen></td>
			<th align=\"center\" width=\"10%\"><lang:col_note></td>
		</tr>
		{\$list}
	</table>
</div>
<hr />
<div class=\"bar\">{\$pages}</div>
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'active', 'active_row', '		<tr>
			<td class=\"cellone {\$row_color}\" align=\"left\">{\$row[\'active_user\']} {\$row[\'active_ip\']}</td>
			<td class=\"cellone {\$row_color}\" align=\"left\">{\$row[\'active_location\']}</td>
			<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'active_time\']}</td>
			<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'active_notes\']}</td>
		</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_message_level_2', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <lang:sys_bread_title>
</div>
<div class=\"formwrap\">
	<h3><lang:sys_err_title></h3>
	<h4><lang:sys_err_desc></h4>
	<div id=\"warning\">
		<h3><lang:err_warn_title></h3>
		<p><strong>{\$message}</strong></p>
	</div>
	<h3><lang:sys_err_option_title></h3>
	<ul>
		<li><a href=\"<sys:gate>?a=register\" title=\"\"><lang:sys_err_option_reg></a></li>
		<li><a href=\"<sys:gate>?a=logon&amp;CODE=03\" title=\"\"><lang:sys_err_option_rec></a></li>
	</ul>
</div>
{\$logon_form}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_message_level_2_logon', '<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:sys_log_name_title></h3>
		<h4><lang:sys_log_name_desc></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:sys_log_pass_title></h3>
		<h4><lang:sys_log_pass_desc></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:form_logon_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_logon_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		<input type=\"hidden\" name=\"referer\" value=\"{\$referer}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'register', 'form_coppa_field', '		<p class=\"checkwarn\"><input class=\"check\" type=\"checkbox\" name=\"coppa\" {\$coppa} /> <strong><lang:field_coppa_agree></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_admin_user_name', 'Hello, {\$member[\'members_name\']}

This message is to inform you that your user name for <conf:title> ( <conf:site_link> )
has been modified. Below you will find your new user name:

Username: {\$name}

Log into your account through the link below:
<conf:site_link><sys:gate>?a=logon');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_field_attach', '		<h3><lang:attach_title></h3>
		<h4>{\$size_lang}</h4>
		<p class=\"checkwrap\"><input type=\"file\" name=\"upload\" /></p>');";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'wtf.gif', ':wtf:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'wink.gif', ';)', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'huh.gif', ':huh:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'up.gif', ':up:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'tongue.gif', ':P', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'stare.gif', ':|', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'squint.gif', '>_<', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'smile.gif', ':)', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'sick.gif', ':sick:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'shock.gif', ':o', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'shame.gif', ':shame:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'scared.gif', ':scared:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'sad.gif', ':(', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'rolleyes.gif', ':rolleyes:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'right.gif', ':right:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'rage.gif', ':rage:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'point.gif', ':point:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'nerd.gif', ':nerd:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'lup.gif', ':lup:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'left.gif', ':left:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'ldown.gif', ':ldown:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'laugh.gif', ':laugh:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'joy.gif', ':joy:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'angry.gif', ':angry:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'happy.gif', ':happy:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'grin.gif', ':D', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'glare.gif', ':glare:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'evil.gif', ':evil:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'down.gif', ':down:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'dead.gif', ':dead:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'crazy.gif', ':crazy:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'cool.gif', ':cool:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'booyah.gif', ':booyah:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'blank.gif', ':blank:', 1);";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Newcomer', 0, 1, 'pip_blue.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Common Folk', 25, 3, 'pip_poop.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'MyTopix™ Enthusiast', 100, 4, 'pip_purple.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Needs a Life', 500, 6, 'pip_red.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Post Meister', 1000, 8, 'pip_green.gif', {$dir});";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_announce_old', '<img src=\"{%SKIN%}/post_announce_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'txt_online_sep', ',&nbsp;', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_announce_new', '<img src=\"{%SKIN%}/post_announce_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'txt_bread_sep', '/', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_email', '<img src=\"{%SKIN%}/btn_email.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_go', '<input type=\"image\" src=\"{%SKIN%}/btn_go.gif\" width=\"23px\" height=\"23px\" class=\"small_button\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_prefix', '<img src=\"{%SKIN%}/topic_prefix.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_note_reply', '<img src=\"{%SKIN%}/reply_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_online', '<img src=\"{%SKIN%}/btn_online.gif\" alt=\"\" title=\"\" />&nbsp;', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_pin_old', '<img src=\"{%SKIN%}/post_pinned_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_pin_new', '<img src=\"{%SKIN%}/post_pinned_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_offline', '<img src=\"{%SKIN%}/btn_offline.gif\" alt=\"\" title=\"\" />&nbsp;', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_new_dot', '<img src=\"{%SKIN%}/post_open_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_old_dot', '<img src=\"{%SKIN%}/post_open_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_old', '<img src=\"{%SKIN%}/post_open_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_new', '<img src=\"{%SKIN%}/post_open_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_moved', '<img src=\"{%SKIN%}/post_moved.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_old', '<img src=\"{%SKIN%}/post_locked_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_old_dot', '<img src=\"{%SKIN%}/post_locked_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_new_dot', '<img src=\"{%SKIN%}/post_locked_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_new', '<img src=\"{%SKIN%}/post_locked_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_old_dot', '<img src=\"{%SKIN%}/post_hot_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_old', '<img src=\"{%SKIN%}/post_hot_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_new_dot', '<img src=\"{%SKIN%}/post_hot_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_new', '<img src=\"{%SKIN%}/post_hot_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_post_quote', '<img src=\"{%SKIN%}/post_quote.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_post_edit', '<img src=\"{%SKIN%}/post_edit.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_post_delete', '<img src=\"{%SKIN%}/post_delete.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_mini_pages', '<img src=\"{%SKIN%}/pages.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_note_unread', '<img src=\"{%SKIN%}/note_unread.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_note_read', '<img src=\"{%SKIN%}/note_read.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_mini_box', '<img src=\"{%SKIN%}/mini_box.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_reply', '<img src=\"{%SKIN%}/main_reply.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_qtopic', '<img src=\"{%SKIN%}/main_qtopic.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_qreply', '<img src=\"{%SKIN%}/main_qreply.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_new', '<img src=\"{%SKIN%}/main_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_locked', '<img src=\"{%SKIN%}/main_locked.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_delete_note', '<img src=\"{%SKIN%}/delete_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_subs_old', '<img src=\"{%SKIN%}/cat_subs_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_subs_new', '<img src=\"{%SKIN%}/cat_subs_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_redirect', '<img src=\"{%SKIN%}/cat_red.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_old', '<img src=\"{%SKIN%}/cat_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_new', '<img src=\"{%SKIN%}/cat_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_archived', '<img src=\"{%SKIN%}/cat_archived.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_yim', '<img src=\"{%SKIN%}/btn_yim.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_profile', '<img src=\"{%SKIN%}/btn_profile.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_note', '<img src=\"{%SKIN%}/btn_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_msn', '<img src=\"{%SKIN%}/btn_msn.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_icq', '<img src=\"{%SKIN%}/btn_icq.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_homepage', '<img src=\"{%SKIN%}/btn_homepage.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_aim', '<img src=\"{%SKIN%}/btn_aim.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_go', '<img src=\"{%SKIN%}/btn_go.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_new', '<img src=\"{%SKIN%}/post_poll_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_new_dot', '<img src=\"{%SKIN%}/post_poll_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_old_dot', '<img src=\"{%SKIN%}/post_poll_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_old', '<img src=\"{%SKIN%}/post_poll_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_note_send', '<img src=\"{%SKIN%}/send_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_add_event', '<img src=\"{%SKIN%}/main_event.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_poll', '<img src=\"{%SKIN%}/main_poll.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_clip', '&nbsp;<img src=\"{%SKIN%}/topic_attach_prefix.gif\" alt=\"\" title=\"\" />', 0);";
?><?php
$temps  = array();
$emots  = array();
$titles = array();
$macros = array();
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_attach', '<p class=\"attach\">
	<a href=\"<sys:gate>?a=misc&amp;CODE=01&amp;id={\$row[\'upload_id\']}\" title=\"\">{\$row[\'upload_name\']}</a> <strong><lang:attach_size></strong> {\$row[\'upload_size\']} <strong><lang:attach_hits></strong> {\$row[\'upload_hits\']}
</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_coppa', 'In compliance with the COPPA act your account is currently inactive.

Please print this message out and have your parent or guardian sign and date it. 
Then fax it to:

<conf:coppa_fax>

OR mail it to:

<conf:coppa_mail>

------------------------------ CUT HERE ------------------------------
Permission to Participate at <conf:title> ( <conf:site_link> )

Username: {\$username}
Password: {\$password}
Email:    {\$email}

I HAVE REVIEWED THE INFORMATION PROVIDED BY MY CHILD AND HEREBY GRANT PERMISSION 
TO <conf:title> TO STORE THIS INFORMATION. I UNDERSTAND THIS INFORMATION CAN BE 
CHANGED AT ANY TIME BY ENTERING A PASSWORD. I UNDERSTAND THAT I MAY REQUEST FOR 
THIS INFORMATION TO BE REMOVED FROM <conf:title> AT ANY TIME.


Parent or Guardian: ____________________________
                       (print full name here)
Full Signature:     ____________________________

Today\'s Date:       ____________________________

------------------------------ CUT HERE ------------------------------


Once the administrator has received the above form via fax or regular mail your 
account will be activated.

Please do not forget your password as it has been encrypted in our database and 
we cannot retrieve it for you. However, should you forget your password you can 
request a new one which will be activated in the same way as this account.

Thank you for registering.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'form_error_wrapper', '<div id=\"warning\">
<h3><lang:err_wrap_title></h3>
<p><strong><lang:err_wrap_desc></strong></p>
<ul>{\$err_list}</ul>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_files_none', '<tr>
	<td colspan=\"7\" align=\"center\"><strong><lang:file_none></strong></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_files_row', '<tr>
	<td class=\"one\" align=\"center\"><strong>{\$row[\'upload_id\']}</strong></td>
	<td><a href=\"<sys:gate>?a=misc&amp;CODE=01&amp;id={\$row[\'upload_id\']}\" title=\"\">{\$row[\'upload_name\']}</a></td>
	<td class=\"one\"><a href=\"<sys:gate>?a=read&amp;CODE=02&amp;p={\$row[\'upload_post\']}\" title=\"\">{\$row[\'topics_title\']}</a></td>
	<td align=\"center\">{\$row[\'upload_date\']}</td>
	<td class=\"one\" align=\"center\">{\$row[\'upload_size\']}</td>
	<td align=\"center\">{\$row[\'upload_hits\']}</td>
	<td class=\"one\" align=\"center\"><a href=\"<sys:gate>?a=ucp&amp;CODE=18&amp;id={\$row[\'upload_id\']}\" title=\"\" onclick=\"javascript: return confirm(\'<lang:file_link_del_conf>\');\"><lang:file_link_del></a></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_new_note', '<div id=\"message_alert\">
	<h3><lang:note_title></h3>
	<p><a href=\"<sys:gate>?getuser={\$note[\'members_id\']}\" title=\"\">{\$note[\'members_name\']}</a> <lang:note_desc> <a href=\"<sys:gate>?a=notes&amp;CODE=01&amp;nid={\$note[\'notes_id\']}\" title=\"\">{\$note[\'notes_title\']}</a>!</p>
</div>
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'mod_poll_option_row', '		<input type=\"text\" name=\"choice[{\$val[\'id\']}]\" style=\"width: 60%;\" tabindex=\"2\" value=\"{\$val[\'choice\']}\" /><input type=\"text\" name=\"votes[{\$val[\'id\']}]\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$val[\'votes\']}\" /><br />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'attach_rem_field', '<p class=\"checkwarn\"><input type=\"checkbox\" class=\"check\" name=\"remove_attach\" value=\"1\"  />&nbsp;<lang:attach_rem>&nbsp;( <a href=\"<sys:gate>?a=misc&amp;CODE=01&amp;id={\$file_id}\">{\$file_name}</a> )</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'mod_poll_wrapper', '		<h3><lang:mod_poll_editor_title></h3>
		<h4><lang:mod_poll_editor_desc></h4>
		<input type=\"text\" name=\"poll_title\" tabindex=\"1\" value=\"{\$poll[\'poll_question\']}\" />
		<h3><lang:poll_choice_title></h3>
		<h4><lang:poll_choice_desc></h4>
		{\$choices}
		<h3><lang:poll_expire_title></h3>
		<h4><lang:poll_expire_desc></h4>
		<input type=\"text\" name=\"days\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$days}\" />
		<h3><lang:poll_lock_title></h3>
		<h4><lang:poll_lock_desc></h4>
		<input type=\"text\" name=\"vote_lock\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$poll[\'poll_vote_lock\']}\" />
		<h3><lang:poll_options_title></h3>
		<h4><lang:poll_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"poll_only\" value=\"1\" tabindex=\"3\" {\$poll_only} /> <lang:poll_lock_option></p>
		<p class=\"checkwarn\"><input type=\"checkbox\" class=\"check\" name=\"remove\" value=\"1\" tabindex=\"3\" /> <lang:poll_delete></p>
		<input type=\"hidden\" name=\"poll\" value=\"{\$poll[\'poll_id\']}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_result_wrapper', '<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"2\">{\$poll[\'poll_question\']}</td>
		</tr>
		<tr>
			<th width=\"50%\"><lang:poll_tbl_header_choice></th>
			<th><lang:poll_tbl_header_result></th>
		</tr>
			{\$poll_list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_poll_choice_row', '<tr>
	<td class=\"cellone np\"><p class=\"checkwrap\"><input type=\"radio\" name=\"vote\" class=\"check\" id=\"choice_{\$val[\'id\']}\" value=\"{\$val[\'id\']}\" />&nbsp;<label for=\"choice_{\$val[\'id\']}\"><strong>{\$val[\'choice\']}</strong></label></p></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_poll_result_row', '<tr>
	<td class=\"cellone\"><strong>{\$val[\'choice\']}</strong></td>
	<td class=\"cellone\" align=\"right\"><img src=\"<sys:skinPath>/bar_left.gif\" alt=\"\" /><img src=\"<sys:skinPath>/bar_center.gif\" alt=\"\" width=\"{\$width}\" height=\"17px\" /><img src=\"<sys:skinPath>/bar_right.gif\" alt=\"\" /><br />{\$percent}% ( {\$val[\'votes\']} votes ) --
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_option_poll', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"poll\" value=\"1\" {\$poll_check} /> <lang:post_options_poll></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_choice_wrapper', '<form method=\"post\" action=\"<sys:gate>?a=read&amp;CODE=05&amp;t={\$this->_id}\">
	<div class=\"maintable\">
		<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
			<tr>
				<td class=\"header\">{\$poll[\'poll_question\']}</td>
			</tr>
			<tr>
				<th>&nbsp;</th>
			</tr>
				{\$poll_list}
		</table>
	</div>
<p class=\"submit\"><input type=\"submit\" value=\"<lang:poll_submit_add>\" style=\"width: auto;\" /></p>
	<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_attach_poll', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / <a href=\"<sys:gate>?gettopic={\$this->_id}\" title=\"\">{\$topic[\'topics_title\']}</a> / <lang:poll_bread_title>
</div>
{\$error_list}
<form method=\"POST\" action=\"<sys:gate>?a=post&amp;CODE=08&amp;t={\$this->_id}\">
	<div class=\"formwrap\">
		<h3><lang:poll_title_title></h3>
		<h4><lang:poll_title_desc></h4>
		<input type=\"text\" name=\"title\" tabindex=\"1\" value=\"{\$title}\" />
		<h3><lang:poll_choice_title></h3>
		<h4><lang:poll_choice_desc></h4>
		<textarea name=\"choices\" tabindex=\"1\">{\$choices}</textarea>
		<h3><lang:poll_expire_title></h3>
		<h4><lang:poll_expire_desc></h4>
		<input type=\"text\" name=\"days\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$days}\" />
		<h3><lang:poll_lock_title></h3>
		<h4><lang:poll_lock_desc></h4>
		<input type=\"text\" name=\"vote_lock\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$vote_lock}\" />
		<h3><lang:poll_options_title></h3>
		<h4><lang:poll_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"poll_only\" value=\"1\" tabindex=\"3\" {\$poll_only} /> <strong><lang:poll_lock_option></strong></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:poll_button_submit>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:poll_button_reset>\" /></p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_edit_event_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=calendar\" title=\"\"><lang:bread_title_two></a> / <a href=\"<sys:gate>?getevent={\$this->_id}\" title=\"\">{\$row[\'event_title\']}</a> / <lang:edit_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}
}
</script>
<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
<a name=\"qwiknote\"></a>
<form method=\"POST\" action=\"<sys:gate>?a=calendar&amp;CODE=06&amp;id={\$this->_id}\" name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:form_add_type_title></h3>
		<h4><lang:form_add_type_desc></h4>
		<p class=\"checkwrap\">
			<strong><lang:form_start_date_on></strong>&nbsp;
			<select name=\"start_month\">{\$start_months}</select>&nbsp;
			<select name=\"start_day\">{\$start_days}</select>&nbsp;
			<select name=\"start_year\">{\$start_years}</select>
		</p>
		<p class=\"checkwrap\">
			<strong><lang:form_loop_every> </strong>&nbsp;
			<select name=\"loop_type\">{\$loop_types}</select>&nbsp;<strong><lang:form_loop_until></strong>&nbsp;
			<select name=\"end_month\">{\$end_months}</select>&nbsp;
			<select name=\"end_day\">{\$end_days}</select>&nbsp;
			<select name=\"end_year\">{\$end_years}</select>
		</p>
		{\$groups}
		<h3><lang:form_add_title_title></h3>
		<h4><lang:form_add_title_desc></h4>
		<input type=\'text\' name=\'title\' tabindex=\'1\' value=\"{\$title}\">
		{\$bbcode}
		<h3><lang:form_emoticon_title></h3>
		<h4><lang:form_emoticon_desc></h4>
		{\$emoticons}
		<h3><lang:form_body_title></h3>
		<h4><lang:form_body_desc> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:form_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:form_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:form_link_length></a> )</h4>
		<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
		<h3><lang:form_options_title></h3>
		<h4><lang:form_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" {\$code_check} /> <lang:form_code_desc></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" {\$emo_check} /> <lang:form_emo_desc></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:form_button_update>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:form_button_reset>\" /></p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_month_event', '<p>{\$event}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_read_event', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=calendar\" title=\"\"><lang:bread_title_two></a> / <lang:bread_title_read> {\$row[\'event_title\']}
</div>
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=calendar&CODE=02\" title=\"\"><macro:btn_add_event></a>
</div>
<div class=\"postwrap\">
	<div class=\"postheader\">{\$row[\'event_title\']} <em>( {\$type} )</em></div>
	<div class=\"user\">
		<p><a href=\"<sys:gate>?getuser={\$row[\'members_id\']}\" title=\"<lang:entry_link_profile>\"><strong>{\$row[\'members_name\']}</strong></a> <em>( <a href=\"<sys:gate>?a=search&CODE=02&mid={\$row[\'members_id\']}\" title=\"<lang:entry_post_find> {\$row[\'members_name\']}\">{\$row[\'members_posts\']}</a> )</em>
		<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span>
		<span><strong>&middot; <lang:entry_rank></strong> {\$row[\'members_pips\']}</span></p>
		{\$avatar}
	</div>
	<div class=\"post\">
		<h5><strong><lang:event_started> {\$date_starts} <lang:event_ends> {\$date_ends}</strong><span>{\$link_delete}&nbsp;{\$link_edit}</span></h5>
		<div class=\"post_content\">
			<p>{\$row[\'event_body\']}</p>{\$sig}
		</div>
	</div>
	<div class=\"foot\">
		<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:read_link_top_title>.\"><lang:read_link_top></a></span>
		<ul class=\"extras\">{\$active}{\$linkSpan}</ul>
	</div>
	<div class=\"postend\">&nbsp;</div>
</div>
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=calendar&CODE=02\" title=\"\"><macro:btn_add_event></a>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_group_list', '		<h3><lang:form_groups_title></h3>
		<h4><lang:form_groups_desc></h4>
		<p class=\"checkwrap\"><select name=\"groups[]\" size=\"5\" multiple=\"multiple\" style=\"width: 200px;\" class=\"jump\">{\$group_list}</select></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_new_event_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=calendar\" title=\"\"><lang:bread_title_two></a> / <lang:add_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}
}
</script>
<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
<a name=\"qwiknote\"></a>
<form method=\"POST\" action=\"<sys:gate>?a=calendar&amp;CODE=03\" name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:form_add_type_title></h3>
		<h4><lang:form_add_type_desc></h4>
		<p class=\"checkwrap\">
			<strong><lang:form_start_date_on> </strong>&nbsp;
			<select name=\"start_month\">{\$start_months}</select>&nbsp;
			<select name=\"start_day\">{\$start_days}</select>&nbsp;
			<select name=\"start_year\">{\$start_years}</select>
		</p>
		<p class=\"checkwrap\">
			<strong><lang:form_loop_every> </strong>&nbsp;
			<select name=\"loop_type\">{\$loop_types}</select>&nbsp;<strong><lang:form_loop_until></strong>&nbsp;
			<select name=\"end_month\">{\$end_months}</select>&nbsp;
			<select name=\"end_day\">{\$end_days}</select>&nbsp;
			<select name=\"end_year\">{\$end_years}</select>
		</p>
		{\$groups}
		<h3><lang:form_add_title_title></h3>
		<h4><lang:form_add_title_desc></h4>
		<input type=\'text\' name=\'title\' tabindex=\'1\' value=\"{\$title}\" />
		{\$bbcode}
		<h3><lang:form_emoticon_title></h3>
		<h4><lang:form_emoticon_desc></h4>
		{\$emoticons}
		<h3><lang:form_body_title></h3>
		<h4><lang:form_body_desc> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:form_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:form_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:form_link_length></a> )</h4>
		<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
		<h3><lang:form_options_title></h3>
		<h4><lang:form_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" checked=\"checked\" /> <lang:form_code_desc></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" checked=\"checked\" /> <lang:form_emo_desc></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:form_button_submit>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:form_button_reset>\" /></p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_blank_row', '<td class=\"{\$class}\">&nbsp;</td>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_date_row', '<td class=\"{\$class}\"><h4>{\$day}</h4><div class=\"events\">{\$events}</div></td>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_month_wrapper', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:bread_title> {\$lit_month}, {\$lit_year}
</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"2\" align=\"left\"><a href=\"<sys:gate>?a=calendar{\$link_prev}\" title=\"\">« {\$link_prev_lit_month}, {\$link_prev_lit_year}</a></td>
			<td class=\"header\" colspan=\"3\" align=\"center\">{\$lit_month}, {\$lit_year}</td>
			<td class=\"header\" colspan=\"2\" align=\"right\"><a href=\"<sys:gate>?a=calendar{\$link_next}\" title=\"\">{\$link_next_lit_month}, {\$link_next_lit_year} »</a></td>
		</tr>
		<tr>
			<th width=\"14%\" align=\"center\"><lang:lit_day_one></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_two></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_three></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_four></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_five></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_six></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_seven></th>
		</tr>
			{\$day_list}
	</table>
</div>
<div class=\"postbutton\"><a href=\"<sys:gate>?a=calendar&amp;CODE=02\" title=\"\"><macro:btn_add_event></a>
</div>
<form method=\"post\" action=\"<sys:gate>?a=calendar\">
<div class=\"formwrap\"><p class=\"sort\">
					<select name=\"month\" class=\"jump\">{\$months}</select>
					<select name=\"year\" class=\"jump\">{\$years}</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"go\" /></p>
</div>
				</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_avatar_row', '<li><a href=\"<sys:gate>?a=ucp&amp;CODE=16&amp;avatar={\$val}&amp;gallery={\$gallery}\" title=\"{\$val}\"><img src=\"<sys:sys_path>sys_images/ava_gallery/{\$gallery}/{\$val}\" alt=\"{\$val}\" /></li>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_avatar_gallery_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:ava_gallery_form_title></h3>
	<p class=\"checkwrap\"><lang:ava_tip></p>
	<h3><lang:ava_gallery_title></h3>
	<h4><lang:ava_gallery_tip></h4>
	<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=15\">
		<p class=\"checkwrap\">
			<select name=\"gallery\" class=\"jump\">
				{\$gallery_list}
			</select>
		</p>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:ava_gallery_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</form>
	<div id=\"avatar-gallery\">
		<ul>
			{\$avatar_rows}
		</ul>
	</div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sub_forum_row', '		<tr>
			<td align=\"center\" class=\"one\" width=\"1%\"><macro:icon_open_new></td>
			<td><a href=\"<sys:gate>?getforum={\$row[\'forum_id\']}\" title=\"\"><strong>{\$row[\'forum_name\']}</strong></a></td>
			<td align=\"center\" class=\"one\" width=\"20%\">{\$row[\'track_date\']}</td>
			<td align=\"center\" width=\"10%\"><a href=\"<sys:gate>?a=ucp&amp;CODE=13&amp;forum={\$row[\'forum_id\']}\" title=\"\"><strong><lang:sub_delete></strong></a></td>
		</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_stats', '<div class=\"infowrap\">
	<h1><lang:stat_title>:</h1>
	<h2><lang:stat_tip></h2>
	<p><lang:stat_totals><br />
	<lang:stat_newest><br />
	<lang:stat_online></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_announce', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"announce\" value=\"1\" {\$check[\'announce\']} /> <strong><lang:post_mod_options_announce></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_avatar_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:ava_title></h3>
	<p class=\"checkwrap\"><lang:ava_tip></p>
	<h4><strong><lang:ava_current></strong><br /> {\$avatar}</h4>
	<h4><lang:ava_ext> {\$ext}</h4>
</div>
<div class=\"formwrap\">
	<h3><lang:ava_gallery_title></h3>
	<h4><lang:ava_gallery_tip></h4>
	<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=15\">
		<p class=\"checkwrap\">
			<select name=\"gallery\" class=\"jump\">
				{\$gallery_list}
			</select>
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		</p>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:ava_gallery_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</form>
</div>
<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=17\" enctype=\'multipart/form-data\'>
	<div class=\"formwrap\">
		<h3><lang:ava_url_title></h3>
		<h4><lang:ava_url_tip></h4>
		<input type=\"text\" name=\"url\" value=\"{\$url}\" />
	</div>
	<div class=\"formwrap\">
		<h3><lang:ava_upload_title></h3>
		<h4><lang:ava_upload_tip></h4>
		<input type=\"file\" name=\"upload\" />
	</div>
	<div class=\"formwrap\">
		<h3><lang:ava_remove_title></h3>
		<p class=\"checkwarn\"><input type=\"checkbox\" class=\"check\" name=\"remove\" value=\"1\" /> <strong><lang:ava_remove_warn></strong></p>
		<p class=\"submit\">
		<input class=\"button\" type=\"submit\" value=\"<lang:ava_submit>\" />&nbsp;
		<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_jump_list', '	<form method=\"post\" action=\"<sys:gate>?a=topics\">
		<p class=\"sort\"><select name=\"forum\" class=\"jump\">
			{\$jump_list}
		</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:forum_jump>\" /></p>
	</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_mod_list', '	<form method=\"post\" action=\"<sys:gate>?a=mod&amp;t={\$this->_id}\" class=\"shaft\">
		<p class=\"sort\"><select name=\"CODE\" class=\"jump\">
			{\$mod_list}
		</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:mod_list>\" /></p>
		<input type=\"hidden\"  name=\"hash\" value=\"{\$hash}\" />
	</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topics_active', '<div class=\"infowrap\">
	<h1><lang:viewers_title></h1>
	<h2><lang:viewers_user_summary> ( <a href=\"<sys:gate>?a=active\" title=\"\"><lang:active_link_details></a> )</h2>
	<p>{\$list}</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_mod_wrapper', '<p class=\"moderator_list\"><em><lang:mod_label></em> {\$mod_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_sub_wrapper', '<p class=\"subforum_list\">{\$sub_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_mod_wrapper', '<p class=\"moderator_list\"><em><lang:mod_label></em> {\$mod_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_sub_wrapper', '<p class=\"subforum_list\">{\$sub_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_subscribe_forum_notice', 'Hello {\$row[\'members_name\']},

{\$topic[\'topics_last_poster_name\']}, from <conf:title> ( <conf:site_link> ), has just posted a reply
to a forum you have subscribed to ( {\$row[\'forum_name\']} ). You may follow the link below to 
read this topic:

<conf:site_link><sys:gate>?gettopic={\$topic[\'topics_id\']}

If you do not wish to receive subscription notices any longer you may turn this feature 
off within your personal control panel. To do this you may access your UCP through the 
above link.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_subs', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:sub_title></h3>
	<p class=\"checkwrap\"><lang:sub_tip></p>
	<h3><lang:sub_topics_title></h3>
	<h4><lang:sub_topics_desc></h4>
	<table class=\"ucp_table\" cellpadding=\"3\" cellspacing=\"1\">
		{\$topics}
	</table>
	<h3><lang:sub_forums_title></h3>
	<h4><lang:sub_forums_desc></h4>
	<table class=\"ucp_table\" cellpadding=\"3\" cellspacing=\"1\">
		{\$forums}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_field_subject', '		<h3><lang:post_field_subject></h3>
		<h4><lang:post_field_subject_tip></h4>
		<input type=\"text\" name=\"subject\" tabindex=\"1\" value=\"{\$subject}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_last_post', '	<span class=\"lastpost\">{\$last_date}</span><br />
	<strong><lang:last_post_in></strong> {\$forum[\'forum_last_post_title\']}<br />
	<strong><lang:last_post_by></strong> {\$forum[\'forum_last_post_user_name\']}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_wrapper', '		<h3><lang:post_options></h3>
		<h4><lang:post_options_tip></h4>
		{\$lock}
		{\$pin}
		{\$announce}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_pin', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"stick\" value=\"1\" {\$check[\'stuck\']} /> <strong><lang:post_mod_options_pin></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_option_bar', '		<h3><lang:post_options></h3>
		<h4><lang:post_options_tip>.</h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" {\$check_code} /> <lang:post_options_code></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" {\$check_emoticon} /> <lang:post_options_emoticon></p>
		{\$poll}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'topic_prefix', '<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><macro:img_prefix></a>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_button', '<a href=\"<sys:gate>{\$url}\" title=\"{\$title}\"><img src=\"<sys:skinPath>/{\$button}.gif\" alt=\"\" /></a>&nbsp;');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_cat_redirect', '<tr>
	<td class=\"cellone {\$row_color}\" width=\"1%\" align=\"center\"><macro:cat_redirect></td>
	<td class=\"cellone {\$row_color}\" colspan=\"2\">
		<h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$forum[\'forum_name\']}</a></h4>
		<p>{\$forum[\'forum_description\']}</p>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$forum[\'forum_red_clicks\']} <lang:cat_redirect></h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_cat_wrapper', '<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"5\"><a href=\"<sys:gate>?getforum={\$category[\'forum_id\']}\" title=\"{\$category[\'forum_name\']}\">{\$category[\'forum_name\']}</a></td>
		</tr>
		<tr>
			<th colspan=\"2\" align=\"left\" width=\"50%\"><lang:topics_col_forum></th>
			<th align=\"left\" width=\"30%\"><lang:topics_col_topics></th>
			<th align=\"center\" width=\"20%\"><lang:topics_col_topics> / <lang:topics_col_replies></th>
		</tr>
		{\$forum_list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_last_post', '	<span class=\"lastpost\">{\$last_date}</span><br />
	<strong><lang:last_post_in></strong> {\$forum[\'forum_last_post_title\']}<br />
	<strong><lang:last_post_by></strong> {\$forum[\'forum_last_post_user_name\']}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_news_section', '<p id=\"community_news\">
	<strong><lang:news_title>: <a href=\"<sys:gate>?a=read&amp;CODE=02&amp;p={\$news[\'news_post\']}\" title=\"<lang:news_title>\">{\$news[\'news_title\']}</a></strong><br />
	<cite>--<lang:news_date> {\$news[\'news_date\']}.</cite>
</p>
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_none', '							<tr>
								<td class=\"cellone\" align=\"center\" colspan=\"6\"><strong><lang:no_topics></strong></td>
							</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_cat_row', '<tr>
	<td class=\"cellone {\$row_color}\" width=\"1%\" align=\"center\">
		<a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$marker}</a>
	</td>
	<td class=\"cellone {\$row_color}\">
		<h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$forum[\'forum_name\']}</a></h4>
		{\$subs}
		<p>{\$forum[\'forum_description\']}{\$mods}</p>
	</td>
	<td class=\"cellone {\$row_color}\">{\$last_post}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$forum[\'forum_topics\']} / {\$forum[\'forum_posts\']}</h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sub_none', '<tr>
	<td colspan=\"4\" align=\"center\"><strong><lang:main_sub_none></strong></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sub_topic_row', '		<tr>
			<td align=\"center\" class=\"one\" width=\"1%\"><macro:icon_open_new></td>
			<td><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}\" title=\"\"><strong>{\$row[\'topics_title\']}</strong></a></td>
			<td align=\"center\" class=\"one\" width=\"20%\">{\$row[\'track_date\']}</td>
			<td align=\"center\" width=\"10%\"><a href=\"<sys:gate>?a=ucp&amp;CODE=12&amp;id={\$row[\'topics_id\']}\" title=\"\"><strong><lang:sub_delete></strong></a></td>
		</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_container', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <lang:bread_title>
</div>
<hr />
{\$new_note}
{\$news_bit}
{\$category_list}
<hr />
<div class=\"bar\"><span><a href=\"<sys:gate>?a=logon&amp;CODE=06\" title=\"<lang:link_delete_cookies>\"><strong><lang:link_delete_cookies></strong></a> &middot; <a href=\"<sys:gate>?a=logon&amp;CODE=07\" title=\"<lang:link_mark_all_read>\"><strong><lang:link_mark_all_read></strong></a></span>&nbsp;</div>
<hr />
{\$active_users}
<hr />
{\$board_stats}
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_cat_row', '<tr>
	<td class=\"cellone {\$row_color}\" width=\"1%\" align=\"center\">
		<a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$marker}</a>
	</td>
	<td class=\"cellone {\$row_color}\">
		<h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$forum[\'forum_name\']}</a></h4>
		{\$subs}
		<p>{\$forum[\'forum_description\']}{\$mods}</p>
	</td>
	<td class=\"cellone {\$row_color}\">{\$last_post}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$forum[\'forum_topics\']} / {\$forum[\'forum_posts\']}</h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_cat_redirect', '<tr>
	<td class=\"cellone {\$row_color}\" width=\"1%\" align=\"center\"><macro:cat_redirect></td>
	<td class=\"cellone {\$row_color}\" colspan=\"2\">
		<h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$forum[\'forum_name\']}</a></h4>
		<p>{\$forum[\'forum_description\']}</p>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$forum[\'forum_red_clicks\']} <lang:cat_redirect></h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_cat_wrapper', '<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"5\"><a href=\"<sys:gate>?getforum={\$category[\'forum_id\']}\" title=\"{\$category[\'forum_name\']}\">{\$category[\'forum_name\']}</a></td>
		</tr>
		<tr>
			<th colspan=\"2\" align=\"left\" width=\"50%\"><lang:main_col_forum></th>
			<th align=\"left\" width=\"30%\"><lang:main_col_latest></th>
			<th align=\"center\" width=\"20%\"><lang:main_col_topics> / <lang:main_col_replies></th>
		</tr>
		{\$forum_list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'register', 'resend_validation_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:validate_crumb_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=register&amp;CODE=04\">
	<div class=\"formwrap\">
		<h3><lang:validate_title></h3>
		<p class=\"checkwrap\"><lang:validate_tip></p>
		<h3><lang:validate_field_email></h4>
		<h4><lang:validate_field_email_tip></h3>
		<input type=\'text\' name=\'email\' tabindex=\'1\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:validate_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:validate_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_registration_complete', 'Hello, {\$username}

The account you created at <conf:title> ( <conf:site_link> ) is now activated and ready to
use. Depending on your browser settings you may or may not be automatically logged in.
If not just use the following link to log your account:

<conf:site_link><sys:gate>?a=logon

Thank you for participating in our community!');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_main', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:main_title></h3>
	<p class=\"checkwrap\"><lang:main_tip></p>
	<h3><lang:main_email></h3>
	<h4><user:members_email></h4>
	<h3><lang:main_joined></h3>
	<h4>{\$join_date}</h4>
	<h3><lang:main_posts></h3>
	<h4><a href=\"<sys:gate>?a=search&amp;CODE=02&amp;mid=<user:members_id>\">{\$total_posts}</a> <lang:main_posts_stat></h4>
	<h3><lang:main_notes></h3>
	<h4><a href=\"<sys:gate>?a=notes\">{\$total_notes}</a> <lang:main_notes_stat></h4>
	<h3><lang:file_title></h3>
	<h4><lang:file_desc></h4>
	<table class=\"ucp_table\" cellpadding=\"3\" cellspacing=\"1\" with=\"100%\">
		<tr>
			<th width=\"1%\" align=\"center\"><lang:file_col_id></th>
			<th><lang:file_col_name></th>
			<th><lang:file_col_topic></th>
			<th align=\"center\"><lang:file_col_date></th>
			<th align=\"center\"><lang:file_col_size></th>
			<th align=\"center\"><lang:file_col_hits></th>
			<th>&nbsp;</th>
		</tr>
		{\$files}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_tabs', '<ul id=\"ucp_tabs\">
	{\$list}
</ul>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_match_result_row', '<tr>
	<td class=\"cellone {\$row_color}\" align=\"center\" width=\"1%\"><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\">{\$row[\'topics_marker\']}</a></td>
	<td class=\"cellone {\$row_color}\">
		{\$row[\'topics_prefix\']} 
		<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;hl={\$hlLink}\" title=\"{\$row[\'topics_title\']}\">{\$row[\'topics_title\']}</a> {\$inlineNav}<br />
		<span class=\"subject\">{\$row[\'topics_subject\']}</span>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><strong>{\$row[\'topics_author\']}</strong></td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><a href=\"<sys:gate>?getforum={\$row[\'topics_forum\']}\" title=\"\">{\$row[\'forum_name\']}</a></td>
	<td class=\"cellone {\$row_color}\">
		<span class=\"lastpost\">{\$row[\'topics_last\']}</span><br />
		<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><lang:topic_last_replied>:</a> <strong>{\$row[\'topics_poster\']}</strong>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$row[\'topics_posts\']} / {\$row[\'topics_views\']}</h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_match_result_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=search\" title=\"<lang:search_form_title>\"><lang:search_form_title></a> / <strong>{\$count}</strong> <lang:search_result_title>:
</div>
<div class=\"bar\">{\$pages}</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"6\">{\$count} <lang:search_result_title></td>
		</tr>
		<tr>
			<th align=\"left\" width=\"30%\" colspan=\"2\"><lang:result_col_title></th>
			<th align=\"center\" width=\"10%\"><lang:result_col_author></th>
			<th align=\"center\" width=\"20%\"><lang:result_col_forum></th>
			<th align=\"center\" width=\"20%\"><lang:result_col_last></th>
			<th align=\"center\" width=\"15%\"><lang:result_col_replies> / <lang:result_col_views></th>
		</tr>
		{\$list}
	</table>
</div>
<div class=\"bar\">{\$pages}</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_pass_get_1', 'You have recently attempted to recover your password from <conf:title> ( <conf:site_link> ).
To complete the process you must click the following link to validate your request. Once validation is 
complete you will be mailed your new account password. You will be able to change this password at anytime 
via your control panel.

{\$url}

Take note that this validation link will expire within 24 hours.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_admin_user', 'Hello, {\$name}

This message is to inform you that your account for <conf:title> ( <conf:site_link> )
has been activated. Below you will find your account access information which you may change
at anytime through your personal control panel.

Username: {\$name}
Password: {\$password}

Log your account through the link below:
<conf:site_link><sys:gate>?a=logon\";');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_pass_get_2', 'Hello, {\$row[\'members_name\']}

This message is to inform you that your account for <config:title> ( <config:site_link> )
has been activated. Below you will find your account access information which you may change
at anytime through your personal control panel.

Username: {\$row[\'members_name\']}
Password: {\$pass}

Log your account through the link below:

<conf:site_link><sys:gate>?a=logon');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_email', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=10\'>
	<div class=\"formwrap\">
		<h3><lang:email_title></h3>
		<p class=\"checkwrap\"><lang:email_tip></p>
		<h4><strong><lang:email_current></strong> <user:members_email></h4>
		<h3><lang:email_field_pass></h3>
		<h4><lang:email_field_pass_tip></h4>
		<input type=\"password\" name=\"password\" />
		<h3><lang:email_field_new></h3>
		<h4><lang:email_field_new_tip></h4>
		<input type=\"text\" name=\"new\" value=\"{\$email_one}\" />
		<h3><lang:email_field_con></h3>
		<h4><lang:email_field_con_tip></h4>
		<input type=\"text\" name=\"confirm\" value=\"{\$email_two}\" />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:email_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:email_button_reset>\" />
		</p>
	</div>
	<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_options', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=08\'>
	<div class=\"formwrap\">
		<h3><lang:board_title></h3>
		<p class=\"checkwrap\"><lang:board_tip></p>
		<h3><lang:board_field_skin></h3>
		<h4><lang:board_field_skin_tip></h4>
		<p class=\"checkwrap\"><select name=\"skin\">
			{\$skins}
		</select></p>
		<h3><lang:board_field_lang></h3>
		<h4><lang:board_field_lang_tip></h4>
		<p class=\"checkwrap\"><select name=\"lang\">
			{\$langs}
		</select></p>
		<h3><lang:board_field_zone></h3>
		<h4><lang:board_field_zone_tip></h4>
		<p class=\"checkwrap\"><select name=\"zone\">
			{\$zones}
		</select></p>
		<h3><lang:board_field_notify></h3>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"notes\" value=\"1\"{\$checked[\'notes\']} /> <b><lang:board_field_note>?</b></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"sigs\" value=\"1\"{\$checked[\'sigs\']} /> <b><lang:board_field_sigs>?</b></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"avatars\" value=\"1\"{\$checked[\'avatars\']} /> <b><lang:board_field_avatars>?</b></p>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:board_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'print', 'print_row', '<div id=\"resultwrap\">
	<h3><a href=\'<sys:gate>?getuser={\$row[\'members_id\']}\'><strong>{\$row[\'members_name\']}</strong></a> | <span>{\$row[\'posts_date\']}</span></h3>
	<div class=\"post\"><p>{\$row[\'posts_body\']}</p></div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_lock', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"lock\" value=\"1\" {\$check[\'locked\']} /> <strong><lang:post_mod_options_lock></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'post_name_field', '		<h3><lang:post_field_name></h3>
		<h4><lang:post_field_name_tip></h4>
		<input type\"text\" name=\"name\" tabindex=\"1\" value=\"{\$name}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_banned', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:banned_title></h3>
		<div id=\"warning\">
			<h3><lang:err_warn_title></h3>
			<p><strong><lang:banned_info></strong></p>
		</div>
		<h3><lang:banned_form_name_title></h3>
		<h4><lang:banned_form_name_title_info></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:banned_form_pass_title></h3>
		<h4><lang:banned_form_pass_title_info></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:banned_form_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:banned_form_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_pass', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=06\'>
	<div class=\"formwrap\">
		<h3><lang:pass_title></h3>
		<p class=\"checkwrap\"><lang:pass_tip></p>
		<h3><lang:pass_field_password></h3>
		<h4><lang:pass_field_password_tip></h4>
		<input type=\"password\" name=\"current\" />
		<h3><lang:pass_field_new></h3>
		<h4><lang:pass_field_new_tip></h4>
		<input type=\"password\" name=\"new\" />
		<h3><lang:pass_field_con></h3>
		<h4><lang:pass_field_con_tip></h4>
		<input type=\"password\" name=\"confirm\"\" />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:pass_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:pass_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'page_wrapper', '<macro:img_mini_pages> {\$links}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'print', 'print_body', '<script language=\"JavaScript\">
	<!--
	window.print();
	-->
</script>
<div id=\"print\">
	<h2><span><conf:title> ( <a href=\"<conf:site_link>\" title=\"\"><conf:site_link></a> )</span> {\$topic[\'topics_title\']}</h2>
	<p class=\"bar\"><b><lang:source>: <a href=\"#\" onclick=\"javascript: return prompt(\'<lang:link_copy_prompt>:\', \'<conf:site_link><sys:gate>?gettopic={\$topic[\'topics_id\']}\');\"><conf:site_link><sys:gate>?gettopic={\$this->_id}</a></b></p>
	{\$content}
	<p class=\"bar\"><span><a href=\"javascript: scroll(0,0);\" title=\"\"><strong><lang:top></strong></a></span><strong><lang:source>: <a href=\"#\" onclick=\"javascript: return prompt(\'<lang:link_copy_prompt>:\', \'<conf:site_link><sys:gate>?gettopic={\$topic[\'topics_id\']}\');\"><conf:site_link><sys:gate>?gettopic={\$this->_id}</a></strong></p>
	<div id=\"copyright\"><span>Powered By: <strong>MyTopix&trade; | Personal Message Board</strong> <conf:version></span>Copyright &copy;  2004,  <a href=\"http://www.jaia-interactive.com/\" title=\"<lang:visit_jaia>\">Jaia Interactive</a> all rights reserved.</div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_full_result_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=search\" title=\"<lang:search_form_title>\"><lang:search_form_title></a> / <strong>{\$count}</strong> <lang:search_result_title>:
</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"7\">{\$count} <lang:search_result_title></td>
		</tr>
		<tr>
			<th align=\"left\" width=\"1%\"><lang:result_col_score></th>
			<th align=\"left\" width=\"30%\" colspan=\"2\"><lang:result_col_title></th>
			<th align=\"center\" width=\"10%\"><lang:result_col_author></th>
			<th align=\"center\" width=\"20%\"><lang:result_col_forum></th>
			<th align=\"center\" width=\"20%\"><lang:result_col_last></th>
			<th align=\"center\" width=\"15%\"><lang:result_col_replies> / <lang:result_col_views></th>
		</tr>
		{\$list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sig', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <user:class_sigLength>;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}

}
</script>
<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
<form method=\'post\' action=\'<sys:gate>?a=ucp&amp;CODE=04\' name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:sig_title></h3>
		<p class=\"checkwrap\"><lang:sig_tip></p>
		<h3><lang:sig_field_current></h3>
		<p class=\"sig\">{\$parsed}</p>
		{\$bbcode}
		<h3><lang:sig_emoticons></h3>
		<h4><lang:sig_emoticons_tip></h4>
		{\$emoticons}
		<h3><lang:sig_field_body></h3>
		<h4><lang:sig_field_body_tip> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\" title=\"<lang:sig_link_code_title>\"><lang:sig_link_code></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\" title=\"<lang:sig_link_emoticons_tip>\"><lang:sig_link_emoticons></a> · <a href=\"javascript:check_length()\" title=\"<lang:sig_link_length_tip>\"><lang:sig_link_length></a> )</h4>
		<textarea name=\"body\">{\$sig}</textarea>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:sig_button_submit>\" /> 
			<input class=\"reset\" type=\"reset\" value=\"<lang:sig_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_jump_list', '<form method=\"post\" action=\"<sys:gate>?a=topics\" class=\"shaft\">
			<p class=\"sort\"><select name=\"forum\" class=\"jump\">
				{\$jump_list}
			</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:forum_jump>\" /></p>
		</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_full_result_row', '<tr>
	<td class=\"cellone {\$row_color}\" align=\"center\"><strong>{\$row[\'topics_score\']}%</strong></td>
	<td class=\"cellone {\$row_color}\" align=\"center\" width=\"1%\"><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\">{\$row[\'topics_marker\']}</a></td>
	<td class=\"cellone {\$row_color}\">
		{\$row[\'topics_prefix\']} 
		<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;hl={\$hlLink}\" title=\"{\$row[\'topics_title\']}\">{\$row[\'topics_title\']}</a> {\$inlineNav}<br />
		<span class=\"subject\">{\$row[\'topics_subject\']}</span>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><strong>{\$row[\'topics_author\']}</strong></td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><a href=\"<sys:gate>?getforum={\$row[\'topics_forum\']}\" title=\"{\$row[\'forum_name\']}\">{\$row[\'forum_name\']}</a></td>
	<td class=\"cellone {\$row_color}\">
		<span class=\"lastpost\">{\$row[\'topics_last\']}</span><br />
		<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><lang:topic_last_replied>:</a> <strong>{\$row[\'topics_poster\']}</strong>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$row[\'topics_posts\']} / {\$row[\'topics_views\']}</h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'move_topic', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / <a href=\"<sys:gate>?gettopic={\$this->_id}\" title=\"\">{\$row[\'topics_title\']}</a> / <lang:mod_move_bread>
</div>
<form method=\"post\" action=\"<sys:gate>?a=mod&amp;CODE=05&amp;t={\$this->_id}\">
	<div class=\"formwrap\">
		<h3><lang:mod_move_title></h3>
		<h4><lang:mod_move_desc></h4>
		<p class=\"checkwrap\">
			<input type=\"checkbox\" name=\"link\" class=\"check\" value=\"1\"> <strong><lang:mod_move_link></strong>
		</p>
		<p class=\"checkwrap\">
			<select name=\"forum\" size=\"5\" class=\"big\" id=\"forum\">
				{\$search_list}
			</select>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:mod_move_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:mod_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_validate_user', 'Hello, {\$username}

Our records indicate that you have just attempted to register a new account with our board.
Currently, the administrator of this community thinks it best to first validate all new 
user accounts to prevent spamming and abuse. To activate your account you only need to click
on the link below. Once you do this the system will allow you to log in to your account.

Activation Key:

<conf:site_link><sys:gate>?a=register&CODE=02&key={\$key}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'by_user_row', '<div id=\"resultwrap\">
	<h3><a href=\"<sys:gate>?a=read&amp;CODE=02&amp;p={\$row[\'posts_id\']}\" title=\"\"><b>{\$row[\'topics_title\']}</b></a> | <span>{\$row[\'posts_date\']}</span></h3>
	<div class=\"post\"><p>{\$row[\'posts_body\']}</p></div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'by_user_table', '<div id=\"crumb_nav\">
<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <strong>{\$count}</strong> <lang:search_result_user_title> <strong>{\$user}</strong>:
</div>
<div class=\"bar\">{\$pages}</div>
{\$list}
<div class=\"bar\">{\$pages}</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:search_form_title>:
</div>
<script language=\"javascript\">

	function selectAll(list, select)
	{
		var list = document.getElementById(list);
		
		for (var i = 0; i < list.length; i++)
		{
			list.options[i].selected = select.checked;
		}
	}

</script>
<form method=\"post\" action=\"<sys:gate>?a=search&CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:search_form_field_phrase></h3>
		<h4><lang:search_form_field_phrase_tip></h4>
		<input type=\"text\" name=\"keywords\" value=\"{\$this->_phrase}\" />
		<h3><lang:search_form_type>:</h3>
		<h4><lang:search_form_type_tip>.</h4>
		<p class=\"checkwrap\">
			<input type=\"radio\" name=\"mode\" class=\"check\" value=\"match\" checked=\"checked\" /> <strong><lang:search_form_basic></strong>&nbsp;
			<span id=\"matchtype\">
				<input type=\"checkbox\" name=\"type\" class=\"check\" value=\"1\" /> <lang:search_form_basic_exact>
			</span>
		</p>
		<p class=\"checkwrap\">
			<input type=\"radio\" name=\"mode\" class=\"check\" value=\"full\" /> <strong><lang:search_form_full></strong> &nbsp;
			<span id=\"limit\">
				<select name=\"limit\">
					<option value=\"10\" selected=\"selected\">10</option>
					<option value=\"20\">20</option>
					<option value=\"30\">30</option>
					<option value=\"40\">40</option>
				</select> <lang:search_form_full_limit>
			</span>
		</p>
		<h3><lang:search_form_forum_title></h3>
		<h4><lang:search_form_forum_desc></h4>
		<p class=\"checkwrap\">
			<input type=\"checkbox\" name=\"all\" class=\"check\" value=\"all\" onclick=\"selectAll(\'forums\', this)\" checked=\"checked\"/> <strong><lang:search_form_forum_all></strong>
		</p>
		<p class=\"checkwrap\">
			<select name=\"forums[]\" size=\"5\" multiple=\"multiple\" class=\"big\" id=\"forums\">
				{\$search_list}
			</select>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:search_form_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:search_form_button_reset>\" />
		</p>
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'sig', '<p class=\"sig\">{\$row[\'members_sig\']}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'register', 'form_register', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:register_crumb_title>
</div>
{\$error_list}
<form method=\"post\" action=\"<sys:gate>?a=register&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:registration_title></h3>
		<p class=\"checkwrap\"><lang:registration_tip></p>
		<h3><lang:field_username></h3>
		<h4><lang:field_username_tip></h4>
		<input type=\"text\" name=\"username\" value=\"{\$username}\" />
		<h3><lang:field_pass></h3>
		<h4><lang:field_pass_tip></h4>
		<input type=\"password\" name=\"password\" />
		<h3><lang:field_con_pass></h3>
		<h4><lang:field_con_pass_tip></h4>
		<input type=\"password\" name=\"cpassword\" />
		<h3><lang:field_email></h3>
		<h4><lang:field_email_tip></h4>
		<input type=\"text\" name=\"email\" value=\"{\$email_one}\" />
		<h3><lang:field_con_email></h3>
		<h4><lang:field_con_email_tip></h4>
		<input type=\"text\" name=\"cemail\" value=\"{\$email_two}\" />
		<h3><lang:field_terms></h3>
		<h4><lang:field_terms_tip></h4>
		<textarea rows=\"\" cols=\"\"><lang:field_terms_content></textarea>
		<p class=\"checkwrap\"><input class=\"check\" type=\"checkbox\" name=\"contract\" {\$contract} /> <strong><lang:field_agree></strong></p>
		{\$coppa_field}
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_general', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=02\'>
	<div class=\"formwrap\">
		<h3><lang:gen_title></h3>
		<p class=\"checkwrap\"><lang:gen_tip></p>
		<h3><lang:gen_field_location></h3>
		<h4><lang:gen_field_location_tip></h4>
		<input type=\"text\" name=\"location\" value=\"{\$location}\" />
		<h3><lang:gen_field_website></h3>
		<h4><lang:gen_field_website_tip></h4>
		<input type=\"text\" name=\"homepage\" value=\"{\$homepage}\" />
		<h3><lang:gen_field_birthday></h3>
		<h4><lang:gen_field_birthday_tip></h4>
		<p class=\"checkwrap\">
			<select name=\'bmonth\'>
				{\$months}
			</select>
			&nbsp;
			<select name=\'bday\'>
				{\$days}
			</select>
			&nbsp;
			<select name=\'byear\'>
				{\$years}
			</select>
		</p>
		<h3><lang:gen_field_aim></h3>
		<h4><lang:gen_field_aim_tip></h4>
		<input type=\"text\" name=\"aim\" value=\"{\$aim}\" />
		<h3><lang:gen_field_icq></h3>
		<h4><lang:gen_field_icq_tip></h4>
		<input type=\"text\" name=\"icq\" value=\"{\$icq}\" />
		<h3><lang:gen_field_yim></h3>
		<h4><lang:gen_field_yim_tip></h4>
		<input type=\"text\" name=\"yim\" value=\"{\$yim}\" />
		<h3><lang:gen_field_msn></h3>
		<h4><lang:gen_field_msn_tip></h4>
		<input type=\"text\" name=\"msn\" value=\"{\$msn}\" />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:gen_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:gen_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'post_row_guest', '<div class=\"user\">
	<a name=\"{\$row[\'posts_id\']}\"></a>
	<p><strong>{\$row[\'posts_author_name\']}</strong>
	<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span></p>
	<img src=\"<sys:skinPath>/ava_none.gif\" class=\"avatar\" alt=\"\" title=\"\" />
</div>
<div class=\"post\">
	<h5><strong><lang:posted_on> {\$row[\'posts_date\']}</strong><span>{\$linkDelete}{\$linkEdit}{\$linkQuote}</span></h5>
	<p>{\$row[\'posts_body\']}</p>{\$attach}
</div>
<div class=\"foot\">
	<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:entry_link_top_tip>\"><lang:entry_link_top></a></span>
	&nbsp;
</div>
<div class=\"postend\">&nbsp;</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'post_table', '{\$poll_data}
<div class=\"postwrap\">
        <div class=\"postheader\"><span>{\$topic[\'topics_title\']}</span></div>
        {\$list}
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_active', '<div class=\"infowrap\">
	<h1><lang:readers_title></h1>
	<h2><lang:readers_user_summary> ( <a href=\"<sys:gate>?a=active\" title=\"\"><lang:active_link_details></a> )</h2>
	<p>{\$list}</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_buttons', '<div class=\"postbutton\">
	{\$button_reply} {\$button_qwik} {\$button_topic} {\$button_poll}
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'reply_bit', '<div id=\"qwikwrap\" style=\"display: none;\">
	<script language=\"javascript\">
	function check_length()
	{
		var limit  = <conf:max_post> * 1000;
		var length = document.REPLIER.body.value.length;

		if ( (length > limit) ) {
			alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
		} else {
			alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
		}

	}
	</script>
	<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
	<a name=\"qwik\"></a>
	<form method=\"post\" action=\"<sys:gate>?a=post&amp;CODE=01&amp;t={\$this->_id}&amp;qwik=1\" name=\"REPLIER\">
		<div class=\"formwrap\">
			<h3><lang:qwik_title>.</h3>
			<p class=\"checkwrap\"><lang:qwik_title_tip>.</p>
			<h3><lang:qwik_field_body>:</h3>
			<h4><lang:qwik_field_body_tip> (<a href=\'javascript:smilie_window(\"<sys:gate>\");\' title=\"<lang:qwik_link_emoticons>\"><lang:qwik_link_emoticons></a> &middot; <a href=\"javascript:check_length();\" title=\"<lang:qwik_link_length>\"><lang:qwik_link_length></a>)</h2>
			<textarea name=\"body\" rows=\"\" cols=\"\"></textarea>
			<p class=\"submit\">
				<input class=\"button\" type=\"submit\" value=\"<lang:qwik_button_submit>\" />&nbsp;
				<input class=\"reset\" type=\"reset\" value=\"<lang:qwik_button_reset>\" />
			</p>
			<input type=\"hidden\" name=\"cOption\" value=\"1\" />
			<input type=\"hidden\" name=\"eOption\" value=\"1\" />
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		</div>
	</form>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'post_row', '<div class=\"user\">
	<a name=\"{\$row[\'posts_id\']}\"></a>
	<p><a href=\"<sys:gate>?getuser={\$row[\'members_id\']}\" title=\"<lang:entry_link_profile>\"><strong>{\$row[\'members_name\']}</strong></a> <em>( <a href=\"<sys:gate>?a=search&CODE=02&mid={\$row[\'members_id\']}\" title=\"<lang:entry_post_find> {\$row[\'members_name\']}\">{\$row[\'members_posts\']}</a> )</em>
	<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span>
	<span><strong>&middot; <lang:entry_rank></strong> {\$row[\'members_pips\']}</span></p>
	{\$avatar}<div style=\"clear:both;\" /></div>
</div>
<div class=\"post\">
	<h5><strong><lang:posted_on> {\$row[\'posts_date\']}</strong><span>{\$linkDelete}{\$linkEdit}{\$linkQuote}</span></h5>
	<div class=\"post_content\">
		<p>{\$row[\'posts_body\']}</p>{\$attach}{\$sig}
	</div>
</div>
<div class=\"foot\">
	<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:entry_link_top_tip>\"><lang:entry_link_top></a></span>
	<ul class=\"extras\"><li>{\$active}</li>{\$linkSpan}</ul>
</div>
<div class=\"postend\">&nbsp;</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'container_read', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / {\$topic[\'topics_title\']}
</div>
{\$buttons}
	<div class=\"bar\">
		<span><a href=\"<sys:gate>?gettopic={\$topic[\'topics_id\']}&amp;CODE=01\" title=\"<lang:subscribe_tip>\"><strong><lang:subscribe></strong></a></span>
		{\$pages}
	</div>
{\$content}
<div class=\"bar\">
	<span><a href=\"<sys:gate>?gettopic={\$topic[\'topics_id\']}&amp;CODE=03&amp;forum={\$topic[\'topics_forum\']}\" title=\"<lang:previous>\"><strong><lang:previous></strong></a> &middot; <a href=\"<sys:gate>?a=topics&amp;forum={\$topic[\'topics_forum\']}\" title=\"<lang:index>\"><strong><lang:index></strong></a> &middot; <a href=\"<sys:gate>?gettopic={\$topic[\'topics_id\']}&amp;CODE=04&amp;forum={\$topic[\'topics_forum\']}\" title=\"<lang:next>\"><strong><lang:next></strong></a></span>
	{\$pages}
</div>
{\$buttons}
<div class=\"formwrap\">
{\$mod}
{\$jump}
</div>
{\$replier}
{\$readers}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'quote_field', '		<h3><lang:post_field_quote></h3>
		<h4><lang:post_field_quote_tip></h4>
		<textarea name=\"quote\">{\$message}</textarea>
		{\$hidden}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'smilie_wrapper', '<table class=\"emoticon\" cellpadding=\"0\" cellspacing=\"0\">
	{\$smilies}
</table>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_field_title', '		<h3><lang:post_field_title></h3>
		<h4><lang:post_field_title_tip></h4>
		<input type=\"text\" name=\"title\" tabindex=\"1\" value=\"{\$title}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'profile', 'profile_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:profile_title> {\$row[\'members_name\']}
</div>
<div id=\"left_column\">
	<div class=\"formwrap\">
		<h3><lang:profile_name></h3>
		<h4>{\$row[\'members_name\']} ( {\$row[\'class_prefix\']}{\$row[\'class_title\']}{\$row[\'class_suffix\']} )</h4>
		<h3><lang:profile_last_visit></h3>
		<h4>{\$row[\'members_lastvisit\']}</h4>
		<h3><lang:profile_registered></h3>
		<h4>{\$row[\'members_registered\']}</h4>
		<h3><lang:profile_birthday></h3>
		<h4>{\$birthday}</h4>
		<h3><lang:profile_stats></h3>
		<h4><a href=\'<sys:gate>?a=search&amp;CODE=02&amp;mid={\$row[\'members_id\']}\'>{\$row[\'members_posts\']}</a> <lang:profile_posts> ( {\$row[\'members_per_day\']} / <lang:per_day> )</h4>
		<h3><lang:profile_last_5></h3>
		<ul>
			{\$topics}
		</ul>
		<h3><lang:profile_location></h3>
		<h4>{\$row[\'members_location\']}</h4>
	</div>
</div>
<div id=\"right_column\">
	<div class=\"formwrap\">
		<h3><lang:profile_home></h3>
		<h4>{\$row[\'members_homepage\']}</h4>
		<h3><lang:profile_aol></h3>
		<h4>{\$row[\'members_aim\']}</h4>
		<h3><lang:profile_yim></h3>
		<h4>{\$row[\'members_yim\']}</h4>
		<h3><lang:profile_msn></h3>
		<h4>{\$row[\'members_msn\']}</h4>
		<h3><lang:profile_icq></h3>
		<h4>{\$row[\'members_icq\']}</h4>
		<h3><lang:profile_other></h3>
		<ul>
			<li><a href=\'<sys:gate>?a=notes&amp;CODE=07&amp;send={\$row[\'members_id\']}\'><lang:profile_link_note></a></li>
		</ul>
	</div>
</div>
<div id=\"signature\">
	<div class=\"formwrap\">
		<h3><lang:profile_sig></h3>
		<p class=\"sig\">{\$row[\'members_sig\']}</p>
	</div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'emoticons_field', '		<h3><lang:post_emoticon_title></h3>
		<h4><lang:post_emoticon_tip></h4>
		{\$smilies}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_wrapper', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> {\$bread_crumb}
</div>
{\$errors}
<script language=\'javascript\'>
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;
		if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}

}
</script>
<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
<form method=\"POST\" action=\"{\$this->_form_action}\" name=\"REPLIER\" {\$this->_form_multipart}>
	<div class=\"formwrap\">
		<h3>{\$this->_form_title}</h3>
		<p class=\"checkwrap\">{\$this->_form_tip}</p>
		{\$recipient}
		{\$name}
		{\$title}
		{\$subject}
		{\$bbcode}
		{\$emoticons}
		<h3><lang:post_message_title></h3>
		<h4><lang:post_message_tip> (  <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:post_link_bbcode></a> · <a href=\'javascript:smilie_window(\"<sys:gate>\")\'><lang:post_link_emoticons></a> · <a href=\'javascript:check_length()\'><lang:post_link_length></a> )</h4>
		<textarea name=\"body\" rows=\"5\" tabindex=\"1\">{\$message}</textarea>
		{\$quote}
		{\$convert}
		{\$upload}
		{\$tools}
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" tabindex=\"2\" value=\"{\$this->_form_submit}\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		{\$hidden}
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'bbcode_field', '	<div id=\'bbcode_panel\' style=\'display: none;\'>
		<h3><lang:bb_title></h3>
		<h4><lang:bb_title_tip></h4>
		<table cellpadding=\'3\' cellspacing=\'0\'>
			<tr>
				<td align=\'left\'>
					<input type=\'button\' class=\'bbcode\' value=\' U \' onClick=\'codeBasic(this)\' name=\'u\' />
					<input type=\'button\' class=\'bbcode\' value=\' I \' onClick=\'codeBasic(this)\' name=\'i\' />
					<input type=\'button\' class=\'bbcode\' value=\' B \' onClick=\'codeBasic(this)\' name=\'b\' /> 
					<select name=\'FONT\' style=\'width: 100px;\' onchange=\'fontFace(this.options[this.selectedIndex].value)\'>
						<option value=\'0\'><lang:bb_select_font></option>
						<option style=\'font-family: tahoma; font-weight: bold;\' value=\'Arial\'>Tahoma</option>
						<option style=\'font-family: times; font-weight: bold;\' value=\'Times\'>Times</option>
						<option style=\'font-family: courier; font-weight: bold;\' value=\'Courier\'>Courier</option>
						<option style=\'font-family: impact; font-weight: bold;\' value=\'Impact\'>Impact</option>
						<option style=\'font-family: geneva; font-weight: bold;\' value=\'Geneva\'>Geneva</option>
						<option style=\'font-family: optima; font-weight: bold;\' value=\'Optima\'>Optima</option>
					</select>
					<select name=\'SIZE\' style=\'width: 100px;\' onchange=\'fontSize(this.options[this.selectedIndex].value)\'>
						<option value=\'0\'><lang:bb_select_size></option>
						<option value=\'1\'><lang:bb_size_small></option>
						<option value=\'7\'><lang:bb_size_large></option>
						<option value=\'14\'><lang:bb_size_largest></option>
					</select>
					<select name=\'COLOR\' style=\'width: 100px;\' onchange=\'fontColor(this.options[this.selectedIndex].value)\'>
						<option value=\'0\'><lang:bb_select_color></option>
						<option value=\'blue\' style=\'color:blue\'><lang:bb_color_blue></option>
						<option value=\'red\' style=\'color:red\'><lang:bb_color_red></option>
						<option value=\'purple\' style=\'color:purple\'><lang:bb_color_purple></option>
						<option value=\'orange\' style=\'color:orange\'><lang:bb_color_orange></option>
						<option value=\'yellow\' style=\'color:yellow\'><lang:bb_color_yellow></option>
						<option value=\'gray\' style=\'color:gray\'><lang:bb_color_gray></option>
						<option value=\'green\' style=\'color:green\'><lang:bb_color_green></option>
					</select>
				</td>
			</tr>
			<tr>
				<td align=\'left\'>
					<input type=\'button\' class=\'bbcode\' value=\' # \' onClick=\'codeBasic(this)\' name=\'code\' />
					<input type=\'button\' class=\'bbcode\' value=\' \"QUOTE\" \' onClick=\'codeBasic(this)\' name=\'quote\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' List \' onClick=\'codeList()\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' IMG \' onClick=\'codeBasic(this)\' name=\'img\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' @ \' onClick=\'codeBasic(this)\' name=\'email\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' URL \' onClick=\'codeBasic(this)\' name=\'url\' /> 
				</td>
			</tr>
		</table>
		<p class=\"checkwrap\"><input type=\'radio\' class=\"check\" name=\'mode\' value=\'adv\' checked=\'checked\' /> <b><lang:bb_mode_advanced></b> <lang:bb_mode_advanced_tip>.</p>
		<p class=\"checkwrap\"><input type=\'radio\' class=\"check\" name=\'mode\' value=\'simple\'/> <b><lang:bb_mode_simple></b> <lang:bb_mode_simple_tip>.</p>
	</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"<conf:title>\"><conf:title></a> <macro:txt_bread_sep> <lang:notes_main_title>
</div>
<hr />
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>
</div>
<hr />
<div class=\"bar\">
	{\$pages}
</div>
<hr />
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"5\"><lang:note_your_notes> ( {\$filled}% <lang:note_full> )</td>
		</tr>
		<tr>
			<th align=\"left\" width=\"40%\" colspan=\"2\"><lang:note_col_title></td>
			<th align=\"center\" width=\"20%\"><lang:note_col_sender></td>
			<th align=\"center\" width=\"25%\"><lang:note_col_recieved></td>
			<th width=\"5%\">&nbsp;</td>
		</tr>
		{\$list}
	</table>
</div>
<hr />
<div class=\"bar\">
	{\$pages}
</div>
<hr />
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>&nbsp;<a href=\"<sys:gate>?a=notes&amp;CODE=05\" title=\"\" onclick=\"javascript: return confirm(\'<lang:empty_inbox_confirm>?\');\"><macro:btn_delete_note></a>
</div>
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_row', '<tr>
	<td class=\"cellone {\$row_color}\" align=\"center\" width=\"1%\"><a href=\'<sys:gate>?a=notes&amp;CODE=06&amp;nid={\$row[\'notes_id\']}\'>{\$row[\'notes_marker\']}</a></td>
	<td class=\"cellone {\$row_color}\"><a href=\"<sys:gate>?a=notes&amp;CODE=01&amp;nid={\$row[\'notes_id\']}\">{\$row[\'notes_title\']}</a></td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><a href=\'<sys:gate>?getuser={\$row[\'notes_sender\']}\'><strong>{\$row[\'members_name\']}</strong></a></td>
	<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'notes_date\']}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><a href=\"<sys:gate>?a=notes&amp;CODE=04&amp;nid={\$row[\'notes_id\']}\" title=\"\" onclick=\"javascript: return confirm(\'<lang:read_delete_confirm>?\');\"><b><lang:read_delete_title></b></a></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_read', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=notes\" title=\"\"><lang:notes_inbox_title></a> / <lang:notes_read_crumb_title> {\$row[\'notes_title\']}
</div>
<div class=\"postbutton\">
	<a href=\'<sys:gate>?a=notes&amp;CODE=3&amp;nid={\$this->_id}&amp;send={\$row[\'members_name\']}\'><macro:btn_note_reply></a>&nbsp;<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>
</div>
<div class=\"postwrap\">
	<div class=\"postheader\"><span>{\$row[\'notes_title\']}</span></div>
	<div class=\"user\">
		<a name=\"{\$row[\'notes_id\']}\"></a>
		<p><a href=\"<sys:gate>?getuser={\$row[\'members_id\']}\" title=\"<lang:entry_link_profile>\"><strong>{\$row[\'members_name\']}</strong></a> <em>( <a href=\"<sys:gate>?a=search&CODE=02&mid={\$row[\'members_id\']}\" title=\"<lang:entry_post_find> {\$row[\'members_name\']}\">{\$row[\'members_posts\']}</a> )</em>
		<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span>
		<span><strong>&middot; <lang:entry_rank></strong> {\$row[\'members_pips\']}</span></p>
		{\$avatar}<div style=\"clear:both;\" /></div>
	</div>
	<div class=\"post\">
		<h5><strong><lang:sent_on> {\$row[\'notes_date\']}</strong><span><a href=\"<sys:gate>?a=notes&amp;CODE=04&amp;nid={\$row[\'notes_id\']}\" title=\"<lang:read_button_delete>\" onclick=\"javascript: return confirm(\'<lang:read_delete_confirm>\');\"><img src=\"<sys:skinPath>/post_delete.gif\" alt=\"<lang:read_delete_confirm>\" /></a></span></h5>
		<div class=\"post_content\">
			<p>{\$row[\'notes_body\']}</p>{\$sig}
		</div>
	</div>
	<div class=\"foot\">
		<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:read_link_top_title>.\"><lang:read_link_top></a></span>
		<ul class=\"extras\">{\$linkSpan}</ul>
	</div>
	<div class=\"postend\">&nbsp;</div>
</div>
<div class=\"postbutton\">
	<a href=\'<sys:gate>?a=notes&amp;CODE=3&amp;nid={\$this->_id}&amp;send={\$row[\'members_name\']}\'><macro:btn_note_reply></a>&nbsp;<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_none', '							<tr>
								<td class=\"cellone\" align=\"center\" colspan=\"5\"><strong><lang:no_notes></strong></td>
							</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'notes_send_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <a href=\"<sys:gate>?a=notes\" title=\"\"><lang:notes_main_title></a> <macro:txt_bread_sep> <lang:notes_new_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
	function check_length()
	{
		var limit  = <conf:max_post> * 1000;
		var length = document.REPLIER.body.value.length;

		if ( (length > limit) ) {
			alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
		} else {
			alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
		}
	}
	</script>
	<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
	<a name=\"qwiknote\"></a>
	<form method=\"POST\" action=\"<sys:gate>?a=notes&amp;CODE=02\" name=\"REPLIER\">
		<div class=\"formwrap\">
			<h3><lang:notes_send_title></h3>
			<p class=\"checkwrap\"><lang:form_send_tip></p>
			<h3><lang:post_field_recipient_title>:</h3>
			<h4><lang:post_field_recipient_tip> ( <a href=\'<sys:gate>?a=members\'><lang:post_field_recipient_link_search></a> )</h4>
			<input type=\'text\' name=\'recipient\' value=\'{\$to}\' tabindex=\'1\'  />
			<h3><lang:post_field_title>:</h3>
			<h4><lang:post_field_title_tip>.</h4>
			<input type=\'text\' name=\'title\' tabindex=\'2\' value=\"{\$title}\" />
			{\$bbcode}
			<h3><lang:post_emoticon_title></h3>
			<h4><lang:post_emoticon_tip></h4>
			{\$emoticons}
			<h3><lang:post_message_title></h3>
			<h4><lang:post_message_tip> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:post_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:post_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:post_link_length></a> )</h4>
			<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
			<h3><lang:post_options></h3>
			<h4><lang:post_options_tip>.</h4>
			<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_code></p>
			<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_emoticon></p>
			<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:post_button_send>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:post_button_reset>\" /></p>
			<input type=\'hidden\' name=\'redirect\' value=\'new\' />
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		</div>
	</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'notes_reply_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=notes\" title=\"\"><lang:notes_inbox_title></a> / <a href=\"<sys:gate>?a=notes&amp;CODE=01&amp;nid={\$this->_id}\" title=\"\">{\$bread_title}</a> / <lang:notes_reply_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}

}
</script>
<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
<a name=\"qwiknote\"></a>
<form method=\"POST\" action=\"<sys:gate>?a=notes&amp;CODE=02&amp;nid={\$this->_id}\" name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:notes_reply_title> {\$note[\'notes_title\']}</h3>
		<h4><lang:form_send_tip></h4>
		<h3><lang:post_field_recipient_title>:</h3>
		<h4><lang:post_field_recipient_tip> ( <a href=\'<sys:gate>?a=members\'><lang:post_field_recipient_link_search></a> )</h4>
		<input type=\'text\' name=\'recipient\' value=\'{\$recipient}\' tabindex=\'1\' />
		<h3><lang:post_field_title>:</h3>
		<h4><lang:post_field_title_tip>.</h4>
		<input type=\'text\' name=\'title\' value=\"{\$note[\'notes_title\']} \"tabindex=\'2\' />
		{\$bbcode}
		<h3><lang:post_emoticon_title></h3>
		<h4><lang:post_emoticon_tip></h4>
		{\$emoticons}
		<h3><lang:post_message_title></h3>
		<h4><lang:post_message_tip> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:post_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:post_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:post_link_length></a> )</h4>
		<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
		<h3><lang:post_field_quote></h3>
		<h4><lang:post_field_quote_tip></h4>
		<textarea name=\"quote\" tabindex=\'3\'>{\$quote}</textarea>
		<h3><lang:post_options></h3>
		<h4><lang:post_options_tip>.</h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_code></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_emoticon></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:post_button_send>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:post_button_reset>\" /></p>
		<input type=\'hidden\' name=\"id\" value=\"{\$this->_id}\" />
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'misc', 'emoticon_row', '	<tr>
		<td class=\'celltwo\'>{\$code[\$i]}</td>
		<td class=\'celltwo\'>
			<a href=\'javascript:add_smilie(\"{\$code[\$i]}\")\'>{\$name[\$i]}</a>
		</td>
	</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'misc', 'emoticon_wrapper', '<script language=\'javascript\'>

	function add_smilie(text)
	{
		opener.document.REPLIER.body.value += \" \" + text + \" \";

	}

</script>
<table class=\"maintable\" cellpadding=\'6\' cellspacing=\'1\' width=\"95%\">
	<tr>
		<td class=\"header\" colspan=\"2\"><lang:emoticon_legend>:</td>
	</tr>
	<tr>
		<th class=\"cellone\" colspan=\'2\'>( <a href=\'javascript:this.close()\'><lang:close_window></a> )</th>
	</tr>
	{\$list}
	<tr>
		<td class=\"footer\" colspan=\"2\">&nbsp;</td>
	</tr>
</table>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'topic_editor', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / <a href=\"<sys:gate>?gettopic={\$this->_id}\" title=\"\">{\$topic[\'topics_title\']}</a> / <lang:mod_edit_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=mod&amp;CODE=03&amp;t={\$this->_id}\">
	<div class=\"formwrap\">
		<h3><lang:mod_form_title> {\$topic[\'topics_title\']}</h3>
		<h4><lang:mod_form_tip></h4>
		<h3><lang:mod_field_title></h3>
		<h4><lang:mod_field_title_tip></h4>
		<input type=\"text\" name=\"title\" value=\"{\$topic[\'topics_title\']}\" />
		<h3><lang:mod_field_subject></h3>
		<h4><lang:mod_field_subject></h4>
		<input type=\"text\" name=\"subject\" value=\"{\$topic[\'topics_subject\']}\" />
		<h3><lang:mod_field_views></h3>
		<h4><lang:mod_field_views_tip></h4>
		<input type=\"text\" name=\"views\" value=\"{\$topic[\'topics_views\']}\" />
		{\$mod_poll}
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" name=\"submit\" value=\"<lang:mod_edit_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:mod_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_table', '{\$buttons}
<hr />
<div class=\"bar\">
	<span>
		<a href=\"<sys:gate>?getforum={\$this->_forum}&amp;CODE=02\" title=\"<lang:forum_subscribe>\"><strong><lang:forum_subscribe></strong></a>
	</span>
	{\$pages}
</div>
<hr />
<div class=\"maintable\">
<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
	<tr>
		<td class=\"header\" colspan=\"5\">{\$forum_data[\'forum_name\']}</td>
	</tr>
	<tr>
		<th width=\"45%\" colspan=\"2\" align=\"left\"><lang:main_col_title></th>
		<th  align=\"center\" width=\"10%\"><lang:main_col_author></th>
		<th width=\"20%\"><lang:main_col_last_post></th>
		<th align=\"center\" width=\"25%\"><lang:topic_posts> / <lang:topic_views></th>
	</tr>
	{\$list}
</table>
</div>
<hr />
<div class=\"bar\">
	<span>
		<a href=\"<sys:gate>?getforum={\$this->_forum}&amp;CODE=01\" title=\"<lang:mark_read>\"><strong><lang:mark_read></strong></a>
	</span>
	{\$pages}
</div>
<hr />
{\$buttons}
<hr />
{\$post}
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'members', 'list_row', '<tr>
	<td class=\"cellone {\$row_color}\"><a href=\'<sys:gate>?getuser={\$row[\'members_id\']}\'>{\$row[\'class_prefix\']}{\$row[\'members_name\']}{\$row[\'class_suffix\']}</a></td>
	<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'members_posts\']}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'members_rank\']}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><strong>{\$row[\'class_title\']}</strong></td>
	<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'members_registered\']}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'members_homepage\']}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><a href=\'<sys:gate>?a=notes&amp;CODE=07&amp;send={\$row[\'members_id\']}\'><macro:btn_mini_note></a></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'members', 'list_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:index_title>
</div>
<div class=\"bar\">{\$pages}</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"8\"><lang:index_title>:</td>
		</tr>
		<tr>
			<th align=\"left\" width=\"15%\"><lang:member_name></th>
			<th align=\"center\" width=\"10%\"><lang:member_posts></th>
			<th align=\"center\" width=\"10%\"><lang:member_rank></th>
			<th align=\"center\" width=\"20%\"><lang:member_group></th>
			<th align=\"center\" width=\"25%\"><lang:member_joined></th>
			<th align=\"center\" width=\"10%\"><lang:member_page></th>
			<th align=\"center\" width=\"10%\"><lang:member_note></th>
		</tr>
		{\$list}
	</table>
</div>
<div class=\"bar\">{\$pages}</div>
<form method=\"post\" action=\"<sys:gate>?a=members\">
	<div class=\"formwrap\">
		<h3><lang:search_title></h3>
		<p class=\"sort\">
		<lang:search_get> 
		<select name=\'sGroup\'>
			<option value=\'all\'><lang:search_group></option>
			{\$sort_groups}
		</select> by 
		<select name=\'sField\'>
			{\$sort_type}
		</select> <lang:search_in>
		<select name=\'sOrder\'>
			{\$sort_order}
		</select> <lang:search_with>
		<select name=\'sResults\'>
			{\$sort_count}
		</select> <lang:search_per_page> 
		<input class=\"submit\" type=\"submit\" value=\"<lang:search_button>\" />
		</p>
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_row', '<tr>
	<td class=\"cellone {\$row_color}\" width=\"1%\"><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\">{\$row[\'topics_marker\']}</a></td>
	<td class=\"cellone {\$row_color}\">
		{\$row[\'topics_prefix\']} 
		<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}\" title=\"{\$row[\'topics_title\']}\">{\$row[\'topics_title\']}</a> {\$inlineNav}<br />
		<span class=\"subject\">{\$row[\'topics_subject\']}</span>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><strong>{\$row[\'topics_author\']}</strong></td>
	<td class=\"cellone {\$row_color}\">
		<span class=\"lastpost\">{\$row[\'topics_last\']}</span><br />
		<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><lang:topic_last_replied></a> <strong>{\$row[\'topics_poster\']}</strong>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$row[\'topics_posts\']} / {\$row[\'topics_views\']}</h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'active_users', '<div class=\"infowrap\">
	<h1><lang:active_user_title> </h1>
	<h2><lang:active_user_summary> (<a href=\"<sys:gate>?a=active\" title=\"<lang:active_link_details>\"><lang:active_link_details></a>)</h2>
	<p>{\$list}</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'container_main', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb}
</div>
{\$child_forums}
{\$topics}
<div class=\"formwrap\">
	{\$jump}
	<form method=\"post\" action=\"<sys:gate>?a=search&amp;CODE=01\">
		<input type=\"text\" class=\"small_text\" name=\"keywords\" />&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:search_forums>\" />
		<input type=\"hidden\" name=\"forum\" value=\"{\$this->_forum}\" />
	</form>
</div>
{\$active}
{\$board_stats}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'main_buttons', '<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=post&CODE=03&amp;forum={\$this->_forum}\" title=\"<lang:button_new_topic>\"><macro:btn_main_new></a>&nbsp;<a href=\"#qwik\" title=\"<lang:button_new_qwik>\" onclick=\"javascript:return toggleBox(\'qwikform\');\"><macro:btn_main_qtopic></a>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'statistics', '<div class=\"infowrap\">
	<h1><lang:stat_title>:</h1>
	<h2><lang:stat_tip></h2>
	<p><lang:stat_totals><br />
	<lang:stat_newest><br />
	<lang:stat_online></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_bit', '<div id=\"qwikform\" style=\"display: none;\">
	<script language=\"javascript\">
	function check_length()
	{

		var limit = {\$length};

		var length = document.REPLIER.body.value.length;

		if ( (length > limit) ) {

			alert(\'Your message is too long ( \' + length + \' chars ), please shorten it to less than \' + limit + \' characters.\');

		} else {

			alert(\'You are currently using \' + length + \' characters. Maximum allowable amount should not exceed \' + limit);

		}

	}
	</script>
	<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
	<form method=\"POST\" action=\"<sys:gate>?a=post&amp;CODE=00\" name=\"REPLIER\">
		<a name=\"qwik\"></a>
		<div class=\"formwrap\">
			<h3><lang:qwik_title></h3>
			<p class=\"checkwrap\"><lang:qwik_form_tip></p>
			<h3><lang:qwik_form_field_title></h3>
			<h4><lang:qwik_form_field_title_field></h4>
			<input type=\"text\" name=\"title\" />
			<h3><lang:qwik_form_field_body></h3>
			<h4><lang:qwik_form_field_body_tip> ( <a href=\"javascript:smilie_window(\'<sys:gate>\')\" title=\"View emoticon choices\"><lang:qwik_form_link_emoticons></a> &middot; <a href=\"javascript:check_length()\" title=\"Check the length of your topic\"><lang:qwik_form_link_length></a> )</h4>
			<textarea name=\"body\" rows=\"\" cols=\"\"></textarea>
			<p class=\"submit\">
				<input class=\"button\" type=\"submit\" value=\"<lang:qwik_form_button_post>\" />&nbsp;
				<input class=\"reset\" type=\"reset\" value=\"<lang:qwik_form_button_reset>\" />
			</p>
			<input type=\"hidden\" name=\"cOption\" value=\"1\" />
			<input type=\"hidden\" name=\"eOption\" value=\"1\" />
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
			<input type=\"hidden\" name=\"subject\" value=\"\" />
			<input type=\"hidden\" name=\"forum\" value=\"{\$this->_forum}\" />
		</div>
	</form>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'logon', 'form_pass_retrieve_1', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:form_retrieve_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=04\">
	<div class=\"formwrap\">
		<h3><lang:form_retrieve_title></h3>
		<p class=\"checkwrap\"><lang:form_retrieve_tip></p>
		<h3><lang:form_retrieve_field_email></h3>
		<h4><lang:form_retrieve_field_email_tip></h4>
		<input type=\'text\' name=\'email\' tabindex=\'1\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:form_retrieve_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_retrieve_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_note_notify', 'Hello, {\$row[\'members_name\']}

<user:members_name>, from <conf:title> ( <conf:site_link> ), has just sent you a new personal note.
If you wish to read it, click the link below to go straight to your notes index:	

<conf:site_link><sys:gate>?a=notes

If you do not wish to recieve notifications any longer be sure to turn this feature off within your
personal control panel which can be found through the link above.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_subscribe_topic_notice', 'Hello {\$row[\'members_name\']},

{\$row[\'topics_last_poster_name\']}, from <conf:title> ( <conf:site_link> ), has just posted a reply
to a topic you have subscribed to. You may follow the link below to read this post:

<conf:site_link><sys:gate>?gettopic={\$this->_id}&p={\$page}#{\$post}

If you do not wish to recieve subscription notices any longer you may turn this feature 
off within your personal control panel. To do this you may access your UCP through the 
above link.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'help', 'title_row', '<li><a href=\"#{\$count}\" title=\"{\$row[\'help_title\']}\">{\$row[\'help_title\']}</a></li>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'logon', 'form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:form_logon_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:form_logon_title></h3>
		<p class=\"checkwrap\"><lang:form_logon_tip></p>
		<h3><lang:sys_err_option_title></h3>
		<ul>
			<li><a href=\"<sys:gate>?a=register\" title=\"\"><lang:sys_err_option_reg></a></li>
			<li><a href=\"<sys:gate>?a=logon&amp;CODE=03\" title=\"\"><lang:sys_err_option_rec></a></li>
		</ul>
		<h3><lang:form_logon_field_username></h3>
		<h4><lang:form_logon_field_username_tip></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:form_logon_field_password></h3>
		<h4><lang:form_logon_field_password_tip></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:form_logon_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_logon_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'help', 'container_help', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:help_crumb_title>
</div>
<div class=\"infowrap\">
    <h1><lang:help_title></h1>
    <h2><lang:help_tip></h2>
    <ul>
        {\$titles}
    </ul>
</div>
{\$entries}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'help', 'content_row', '<div class=\"infowrap\">
	<a name=\"{\$count}\"></a>
	<h3>{\$count}. {\$row[\'help_title\']}</h3>
	<p>{\$row[\'help_content\']}</p>
	<p class=\"top\"><a href=\"javascript:scroll(0,0);\" title=\"<lang:link_top_title>\"><lang:link_top></a></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_footer', '
----------------------------------------------------------------
<lang:mailer_footer> MyTopix | Personal Message Board {\$this->config[\'version\']}.  http://www.jaia-interactive.com');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_wrapper', '			<div id=\"wrap\">
				<h1 id=\"logo\"><a href=\"<sys:gate>?a=main\" title=\"<lang:logo_alt>\">MyTopix</a></h1>
				<ul id=\"top_nav\">
					<li><a href=\"<conf:site_link><sys:gate>?a=members\" title=\"\"><lang:uni_tab_members></a></li>
					<li><a href=\"<conf:site_link><sys:gate>?a=search\" title=\"\"><lang:uni_tab_search></a></li>
					<li><a href=\"<conf:site_link><sys:gate>?a=calendar\" title=\"\"><lang:uni_tab_calendar></a></li>
				</ul>
				{\$this->welcome}
				{\$content}
				<p id=\"copyright\">Powered By: <strong>MyTopix <conf:version></strong><br />Copyright &copy;2004 - 2007,  <a href=\"http://www.jaia-interactive.com/\" title=\"<lang:visit_jaia>\">Jaia Interactive</a> all rights reserved.</p>
			</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_header', '{\$who} <lang:mailer_header> {\$sent}:
----------------------------------------------------------------

');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_member', '<div class=\"welcome\">
	<p class=\"shaft\"><a href=\"<sys:gate>?a=ucp\" title=\"<lang:welcome_control_title>\"><strong><lang:welcome_profile></strong></a> &middot; <a href=\"<sys:gate>?a=search&amp;CODE=03\" title=\"<lang:welcome_latest_title>\"><lang:welcome_latest></a> &middot; <a href=\"<sys:gate>?a=notes\" title=\"<lang:welcome_inbox_title>\"><lang:welcome_messages> (<user:members_newNotes>)</a></p>
	<p><lang:welcome_back>, <a href=\"<sys:gate>?getuser=<user:members_id>\" title=\"<lang:welcome_profile_title>\"><strong><user:members_name></strong></a>! (<a href=\"<sys:gate>?a=logon&CODE=02\" title=\"<lang:welcome_logout_title>\"><lang:welcome_logout></a>)</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_disabled', '<div class=\"welcome\">
        <p class=\"shaft\">&nbsp;</p>
	<p><lang:welcome_disabled></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_guest', '<div class=\"welcome\">
	<p class=\"shaft\"><a href=\"<sys:gate>?a=register&amp;CODE=03\" title=\"\"><lang:welcome_resend_validation></a></p>
	<p><lang:welcome_guest>, <user:members_name>! (<a href=\"<sys:gate>?a=register\" title=\"\"><lang:welcome_register></a> &middot; <a href=\"<sys:gate>?a=logon\" title=\"\"><lang:welcome_logon></a>)</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_message_level_1', '<div id=\"messenger\">
	<h2><span><a href=\"{\$link}\" title=\"<lang:messenger_forward>\"><lang:messenger_forward></a></span><lang:messenger_title>:</h2>
	<p>{\$message}</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_admin', '<div class=\"welcome\">
	<p class=\"shaft\"><a href=\"<sys:gate>?a=ucp\" title=\"<lang:welcome_control_title>\"><strong><lang:welcome_profile></strong></a> &middot; <a href=\"<sys:gate>?a=search&amp;CODE=03\" title=\"<lang:welcome_latest_title>\"><lang:welcome_latest></a> &middot; <a href=\"<sys:gate>?a=notes\" title=\"<lang:welcome_inbox_title>\"><lang:welcome_messages> (<user:members_newNotes>)</a> &middot; <a href=\"<conf:site_link>admin/\" title=\"<lang:welcome_admin_title>\"><lang:welcome_link_admin></a></p>
	<p><lang:welcome_back>, <a href=\"<sys:gate>?getuser=<user:members_id>\" title=\"<lang:welcome_profile_title>\"><strong><user:members_name></strong></a>! (<a href=\"<sys:gate>?a=logon&CODE=02\" title=\"<lang:welcome_logout_title>\"><lang:welcome_logout></a>)</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_body', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<!-- Powered By: <conf:application> <conf:version> -->
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en\" xml:lang=\"en\"  dir=\"<lang:text_direction>\">
	<head>
		<title><conf:forum_title> - <lang:powered_by> <conf:application></title>
		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
		<meta name=\"generator\" content=\"editplus\" />
		<meta name=\"author\" content=\"Daniel Wilhelm II Murdoch, wilhelm@jaia-interactive.com, http://www.jaia-interactive.com\" />
		<meta name=\"keywords\" content=\"<conf:application> <conf:version>\" />
		<meta name=\"description\" content=\"\" />
		<script src=\"<sys:skinPath>/js/main.js\" type=\"text/javascript\"></script>
		<link href=\"<sys:skinPath>/styles.css\" rel=\"stylesheet\" type=\"text/css\" title=\"default\" />
	</head>
	<body>
	{\$content}
	</body>
</html>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_board_closed', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:global_board_closed></h3>
		<div id=\"warning\">
			<h3><lang:err_warn_title></h3>
			<p><strong><conf:closed_message></strong></p>
		</div>
		<h3><lang:closed_form_name_title></h3>
		<h4><lang:closed_form_name_title_info></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:closed_form_pass_title></h3>
		<h4><lang:closed_form_pass_title_info></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:closed_form_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:closed_form_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'active', 'active_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"<conf:title>\"><conf:title></a> / <lang:location_active>
</div>
<hr />
<div class=\"bar\">{\$pages}</div>
<hr />
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"4\"><lang:active_title></td>
		</tr>
		<tr>
			<th align=\"left\" width=\"15%\"><lang:col_name></td>
			<th align=\"left\" width=\"25%\"><lang:col_location></td>
			<th align=\"center\" width=\"25%\"><lang:col_last_seen></td>
			<th align=\"center\" width=\"10%\"><lang:col_note></td>
		</tr>
		{\$list}
	</table>
</div>
<hr />
<div class=\"bar\">{\$pages}</div>
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'active', 'active_row', '		<tr>
			<td class=\"cellone {\$row_color}\" align=\"left\">{\$row[\'active_user\']} {\$row[\'active_ip\']}</td>
			<td class=\"cellone {\$row_color}\" align=\"left\">{\$row[\'active_location\']}</td>
			<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'active_time\']}</td>
			<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'active_notes\']}</td>
		</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_message_level_2', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <lang:sys_bread_title>
</div>
<div class=\"formwrap\">
	<h3><lang:sys_err_title></h3>
	<h4><lang:sys_err_desc></h4>
	<div id=\"warning\">
		<h3><lang:err_warn_title></h3>
		<p><strong>{\$message}</strong></p>
	</div>
	<h3><lang:sys_err_option_title></h3>
	<ul>
		<li><a href=\"<sys:gate>?a=register\" title=\"\"><lang:sys_err_option_reg></a></li>
		<li><a href=\"<sys:gate>?a=logon&amp;CODE=03\" title=\"\"><lang:sys_err_option_rec></a></li>
	</ul>
</div>
{\$logon_form}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_message_level_2_logon', '<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:sys_log_name_title></h3>
		<h4><lang:sys_log_name_desc></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:sys_log_pass_title></h3>
		<h4><lang:sys_log_pass_desc></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:form_logon_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_logon_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		<input type=\"hidden\" name=\"referer\" value=\"{\$referer}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'register', 'form_coppa_field', '		<p class=\"checkwarn\"><input class=\"check\" type=\"checkbox\" name=\"coppa\" {\$coppa} /> <strong><lang:field_coppa_agree></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_admin_user_name', 'Hello, {\$member[\'members_name\']}

This message is to inform you that your user name for <conf:title> ( <conf:site_link> )
has been modified. Below you will find your new user name:

Username: {\$name}

Log into your account through the link below:
<conf:site_link><sys:gate>?a=logon');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_field_attach', '		<h3><lang:attach_title></h3>
		<h4>{\$size_lang}</h4>
		<p class=\"checkwrap\"><input type=\"file\" name=\"upload\" /></p>');";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'wtf.gif', ':wtf:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'wink.gif', ';)', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'huh.gif', ':huh:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'up.gif', ':up:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'tongue.gif', ':P', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'stare.gif', ':|', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'squint.gif', '>_<', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'smile.gif', ':)', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'sick.gif', ':sick:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'shock.gif', ':o', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'shame.gif', ':shame:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'scared.gif', ':scared:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'sad.gif', ':(', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'rolleyes.gif', ':rolleyes:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'right.gif', ':right:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'rage.gif', ':rage:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'point.gif', ':point:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'nerd.gif', ':nerd:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'lup.gif', ':lup:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'left.gif', ':left:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'ldown.gif', ':ldown:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'laugh.gif', ':laugh:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'joy.gif', ':joy:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'angry.gif', ':angry:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'happy.gif', ':happy:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'grin.gif', ':D', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'glare.gif', ':glare:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'evil.gif', ':evil:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'down.gif', ':down:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'dead.gif', ':dead:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'crazy.gif', ':crazy:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'cool.gif', ':cool:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'booyah.gif', ':booyah:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'blank.gif', ':blank:', 1);";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Newcomer', 0, 1, 'pip_blue.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Common Folk', 25, 3, 'pip_poop.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'MyTopix™ Enthusiast', 100, 4, 'pip_purple.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Needs a Life', 500, 6, 'pip_red.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Post Meister', 1000, 8, 'pip_green.gif', {$dir});";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_announce_old', '<img src=\"{%SKIN%}/post_announce_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'txt_online_sep', ',&nbsp;', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_announce_new', '<img src=\"{%SKIN%}/post_announce_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'txt_bread_sep', '/', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_email', '<img src=\"{%SKIN%}/btn_email.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_go', '<input type=\"image\" src=\"{%SKIN%}/btn_go.gif\" width=\"23px\" height=\"23px\" class=\"small_button\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_prefix', '<img src=\"{%SKIN%}/topic_prefix.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_note_reply', '<img src=\"{%SKIN%}/reply_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_online', '<img src=\"{%SKIN%}/btn_online.gif\" alt=\"\" title=\"\" />&nbsp;', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_pin_old', '<img src=\"{%SKIN%}/post_pinned_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_pin_new', '<img src=\"{%SKIN%}/post_pinned_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_offline', '<img src=\"{%SKIN%}/btn_offline.gif\" alt=\"\" title=\"\" />&nbsp;', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_new_dot', '<img src=\"{%SKIN%}/post_open_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_old_dot', '<img src=\"{%SKIN%}/post_open_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_old', '<img src=\"{%SKIN%}/post_open_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_new', '<img src=\"{%SKIN%}/post_open_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_moved', '<img src=\"{%SKIN%}/post_moved.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_old', '<img src=\"{%SKIN%}/post_locked_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_old_dot', '<img src=\"{%SKIN%}/post_locked_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_new_dot', '<img src=\"{%SKIN%}/post_locked_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_new', '<img src=\"{%SKIN%}/post_locked_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_old_dot', '<img src=\"{%SKIN%}/post_hot_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_old', '<img src=\"{%SKIN%}/post_hot_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_new_dot', '<img src=\"{%SKIN%}/post_hot_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_new', '<img src=\"{%SKIN%}/post_hot_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_post_quote', '<img src=\"{%SKIN%}/post_quote.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_post_edit', '<img src=\"{%SKIN%}/post_edit.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_post_delete', '<img src=\"{%SKIN%}/post_delete.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_mini_pages', '<img src=\"{%SKIN%}/pages.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_note_unread', '<img src=\"{%SKIN%}/note_unread.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_note_read', '<img src=\"{%SKIN%}/note_read.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_mini_box', '<img src=\"{%SKIN%}/mini_box.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_reply', '<img src=\"{%SKIN%}/main_reply.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_qtopic', '<img src=\"{%SKIN%}/main_qtopic.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_qreply', '<img src=\"{%SKIN%}/main_qreply.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_new', '<img src=\"{%SKIN%}/main_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_locked', '<img src=\"{%SKIN%}/main_locked.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_delete_note', '<img src=\"{%SKIN%}/delete_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_subs_old', '<img src=\"{%SKIN%}/cat_subs_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_subs_new', '<img src=\"{%SKIN%}/cat_subs_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_redirect', '<img src=\"{%SKIN%}/cat_red.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_old', '<img src=\"{%SKIN%}/cat_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_new', '<img src=\"{%SKIN%}/cat_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_archived', '<img src=\"{%SKIN%}/cat_archived.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_yim', '<img src=\"{%SKIN%}/btn_yim.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_profile', '<img src=\"{%SKIN%}/btn_profile.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_note', '<img src=\"{%SKIN%}/btn_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_msn', '<img src=\"{%SKIN%}/btn_msn.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_icq', '<img src=\"{%SKIN%}/btn_icq.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_homepage', '<img src=\"{%SKIN%}/btn_homepage.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_aim', '<img src=\"{%SKIN%}/btn_aim.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_go', '<img src=\"{%SKIN%}/btn_go.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_new', '<img src=\"{%SKIN%}/post_poll_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_new_dot', '<img src=\"{%SKIN%}/post_poll_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_old_dot', '<img src=\"{%SKIN%}/post_poll_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_old', '<img src=\"{%SKIN%}/post_poll_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_note_send', '<img src=\"{%SKIN%}/send_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_add_event', '<img src=\"{%SKIN%}/main_event.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_poll', '<img src=\"{%SKIN%}/main_poll.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_clip', '&nbsp;<img src=\"{%SKIN%}/topic_attach_prefix.gif\" alt=\"\" title=\"\" />', 0);";
?><?php
$temps  = array();
$emots  = array();
$titles = array();
$macros = array();
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_attach', '<p class=\"attach\">
	<a href=\"<sys:gate>?a=misc&amp;CODE=01&amp;id={\$row[\'upload_id\']}\" title=\"\">{\$row[\'upload_name\']}</a> <strong><lang:attach_size></strong> {\$row[\'upload_size\']} <strong><lang:attach_hits></strong> {\$row[\'upload_hits\']}
</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_coppa', 'In compliance with the COPPA act your account is currently inactive.

Please print this message out and have your parent or guardian sign and date it. 
Then fax it to:

<conf:coppa_fax>

OR mail it to:

<conf:coppa_mail>

------------------------------ CUT HERE ------------------------------
Permission to Participate at <conf:title> ( <conf:site_link> )

Username: {\$username}
Password: {\$password}
Email:    {\$email}

I HAVE REVIEWED THE INFORMATION PROVIDED BY MY CHILD AND HEREBY GRANT PERMISSION 
TO <conf:title> TO STORE THIS INFORMATION. I UNDERSTAND THIS INFORMATION CAN BE 
CHANGED AT ANY TIME BY ENTERING A PASSWORD. I UNDERSTAND THAT I MAY REQUEST FOR 
THIS INFORMATION TO BE REMOVED FROM <conf:title> AT ANY TIME.


Parent or Guardian: ____________________________
                       (print full name here)
Full Signature:     ____________________________

Today\'s Date:       ____________________________

------------------------------ CUT HERE ------------------------------


Once the administrator has received the above form via fax or regular mail your 
account will be activated.

Please do not forget your password as it has been encrypted in our database and 
we cannot retrieve it for you. However, should you forget your password you can 
request a new one which will be activated in the same way as this account.

Thank you for registering.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'form_error_wrapper', '<div id=\"warning\">
<h3><lang:err_wrap_title></h3>
<p><strong><lang:err_wrap_desc></strong></p>
<ul>{\$err_list}</ul>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_files_none', '<tr>
	<td colspan=\"7\" align=\"center\"><strong><lang:file_none></strong></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_files_row', '<tr>
	<td class=\"one\" align=\"center\"><strong>{\$row[\'upload_id\']}</strong></td>
	<td><a href=\"<sys:gate>?a=misc&amp;CODE=01&amp;id={\$row[\'upload_id\']}\" title=\"\">{\$row[\'upload_name\']}</a></td>
	<td class=\"one\"><a href=\"<sys:gate>?a=read&amp;CODE=02&amp;p={\$row[\'upload_post\']}\" title=\"\">{\$row[\'topics_title\']}</a></td>
	<td align=\"center\">{\$row[\'upload_date\']}</td>
	<td class=\"one\" align=\"center\">{\$row[\'upload_size\']}</td>
	<td align=\"center\">{\$row[\'upload_hits\']}</td>
	<td class=\"one\" align=\"center\"><a href=\"<sys:gate>?a=ucp&amp;CODE=18&amp;id={\$row[\'upload_id\']}\" title=\"\" onclick=\"javascript: return confirm(\'<lang:file_link_del_conf>\');\"><lang:file_link_del></a></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_new_note', '<div id=\"message_alert\">
	<h3><lang:note_title></h3>
	<p><a href=\"<sys:gate>?getuser={\$note[\'members_id\']}\" title=\"\">{\$note[\'members_name\']}</a> <lang:note_desc> <a href=\"<sys:gate>?a=notes&amp;CODE=01&amp;nid={\$note[\'notes_id\']}\" title=\"\">{\$note[\'notes_title\']}</a>!</p>
</div>
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'mod_poll_option_row', '		<input type=\"text\" name=\"choice[{\$val[\'id\']}]\" style=\"width: 60%;\" tabindex=\"2\" value=\"{\$val[\'choice\']}\" /><input type=\"text\" name=\"votes[{\$val[\'id\']}]\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$val[\'votes\']}\" /><br />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'attach_rem_field', '<p class=\"checkwarn\"><input type=\"checkbox\" class=\"check\" name=\"remove_attach\" value=\"1\"  />&nbsp;<lang:attach_rem>&nbsp;( <a href=\"<sys:gate>?a=misc&amp;CODE=01&amp;id={\$file_id}\">{\$file_name}</a> )</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'mod_poll_wrapper', '		<h3><lang:mod_poll_editor_title></h3>
		<h4><lang:mod_poll_editor_desc></h4>
		<input type=\"text\" name=\"poll_title\" tabindex=\"1\" value=\"{\$poll[\'poll_question\']}\" />
		<h3><lang:poll_choice_title></h3>
		<h4><lang:poll_choice_desc></h4>
		{\$choices}
		<h3><lang:poll_expire_title></h3>
		<h4><lang:poll_expire_desc></h4>
		<input type=\"text\" name=\"days\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$days}\" />
		<h3><lang:poll_lock_title></h3>
		<h4><lang:poll_lock_desc></h4>
		<input type=\"text\" name=\"vote_lock\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$poll[\'poll_vote_lock\']}\" />
		<h3><lang:poll_options_title></h3>
		<h4><lang:poll_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"poll_only\" value=\"1\" tabindex=\"3\" {\$poll_only} /> <lang:poll_lock_option></p>
		<p class=\"checkwarn\"><input type=\"checkbox\" class=\"check\" name=\"remove\" value=\"1\" tabindex=\"3\" /> <lang:poll_delete></p>
		<input type=\"hidden\" name=\"poll\" value=\"{\$poll[\'poll_id\']}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_result_wrapper', '<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"2\">{\$poll[\'poll_question\']}</td>
		</tr>
		<tr>
			<th width=\"50%\"><lang:poll_tbl_header_choice></th>
			<th><lang:poll_tbl_header_result></th>
		</tr>
			{\$poll_list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_poll_choice_row', '<tr>
	<td class=\"cellone np\"><p class=\"checkwrap\"><input type=\"radio\" name=\"vote\" class=\"check\" id=\"choice_{\$val[\'id\']}\" value=\"{\$val[\'id\']}\" />&nbsp;<label for=\"choice_{\$val[\'id\']}\"><strong>{\$val[\'choice\']}</strong></label></p></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_poll_result_row', '<tr>
	<td class=\"cellone\"><strong>{\$val[\'choice\']}</strong></td>
	<td class=\"cellone\" align=\"right\"><img src=\"<sys:skinPath>/bar_left.gif\" alt=\"\" /><img src=\"<sys:skinPath>/bar_center.gif\" alt=\"\" width=\"{\$width}\" height=\"17px\" /><img src=\"<sys:skinPath>/bar_right.gif\" alt=\"\" /><br />{\$percent}% ( {\$val[\'votes\']} votes ) --
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_option_poll', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"poll\" value=\"1\" {\$poll_check} /> <lang:post_options_poll></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_choice_wrapper', '<form method=\"post\" action=\"<sys:gate>?a=read&amp;CODE=05&amp;t={\$this->_id}\">
	<div class=\"maintable\">
		<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
			<tr>
				<td class=\"header\">{\$poll[\'poll_question\']}</td>
			</tr>
			<tr>
				<th>&nbsp;</th>
			</tr>
				{\$poll_list}
		</table>
	</div>
<p class=\"submit\"><input type=\"submit\" value=\"<lang:poll_submit_add>\" style=\"width: auto;\" /></p>
	<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_attach_poll', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / <a href=\"<sys:gate>?gettopic={\$this->_id}\" title=\"\">{\$topic[\'topics_title\']}</a> / <lang:poll_bread_title>
</div>
{\$error_list}
<form method=\"POST\" action=\"<sys:gate>?a=post&amp;CODE=08&amp;t={\$this->_id}\">
	<div class=\"formwrap\">
		<h3><lang:poll_title_title></h3>
		<h4><lang:poll_title_desc></h4>
		<input type=\"text\" name=\"title\" tabindex=\"1\" value=\"{\$title}\" />
		<h3><lang:poll_choice_title></h3>
		<h4><lang:poll_choice_desc></h4>
		<textarea name=\"choices\" tabindex=\"1\">{\$choices}</textarea>
		<h3><lang:poll_expire_title></h3>
		<h4><lang:poll_expire_desc></h4>
		<input type=\"text\" name=\"days\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$days}\" />
		<h3><lang:poll_lock_title></h3>
		<h4><lang:poll_lock_desc></h4>
		<input type=\"text\" name=\"vote_lock\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{\$vote_lock}\" />
		<h3><lang:poll_options_title></h3>
		<h4><lang:poll_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"poll_only\" value=\"1\" tabindex=\"3\" {\$poll_only} /> <strong><lang:poll_lock_option></strong></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:poll_button_submit>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:poll_button_reset>\" /></p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_edit_event_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=calendar\" title=\"\"><lang:bread_title_two></a> / <a href=\"<sys:gate>?getevent={\$this->_id}\" title=\"\">{\$row[\'event_title\']}</a> / <lang:edit_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}
}
</script>
<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
<a name=\"qwiknote\"></a>
<form method=\"POST\" action=\"<sys:gate>?a=calendar&amp;CODE=06&amp;id={\$this->_id}\" name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:form_add_type_title></h3>
		<h4><lang:form_add_type_desc></h4>
		<p class=\"checkwrap\">
			<strong><lang:form_start_date_on></strong>&nbsp;
			<select name=\"start_month\">{\$start_months}</select>&nbsp;
			<select name=\"start_day\">{\$start_days}</select>&nbsp;
			<select name=\"start_year\">{\$start_years}</select>
		</p>
		<p class=\"checkwrap\">
			<strong><lang:form_loop_every> </strong>&nbsp;
			<select name=\"loop_type\">{\$loop_types}</select>&nbsp;<strong><lang:form_loop_until></strong>&nbsp;
			<select name=\"end_month\">{\$end_months}</select>&nbsp;
			<select name=\"end_day\">{\$end_days}</select>&nbsp;
			<select name=\"end_year\">{\$end_years}</select>
		</p>
		{\$groups}
		<h3><lang:form_add_title_title></h3>
		<h4><lang:form_add_title_desc></h4>
		<input type=\'text\' name=\'title\' tabindex=\'1\' value=\"{\$title}\">
		{\$bbcode}
		<h3><lang:form_emoticon_title></h3>
		<h4><lang:form_emoticon_desc></h4>
		{\$emoticons}
		<h3><lang:form_body_title></h3>
		<h4><lang:form_body_desc> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:form_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:form_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:form_link_length></a> )</h4>
		<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
		<h3><lang:form_options_title></h3>
		<h4><lang:form_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" {\$code_check} /> <lang:form_code_desc></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" {\$emo_check} /> <lang:form_emo_desc></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:form_button_update>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:form_button_reset>\" /></p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_month_event', '<p>{\$event}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_read_event', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=calendar\" title=\"\"><lang:bread_title_two></a> / <lang:bread_title_read> {\$row[\'event_title\']}
</div>
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=calendar&CODE=02\" title=\"\"><macro:btn_add_event></a>
</div>
<div class=\"postwrap\">
	<div class=\"postheader\">{\$row[\'event_title\']} <em>( {\$type} )</em></div>
	<div class=\"user\">
		<p><a href=\"<sys:gate>?getuser={\$row[\'members_id\']}\" title=\"<lang:entry_link_profile>\"><strong>{\$row[\'members_name\']}</strong></a> <em>( <a href=\"<sys:gate>?a=search&CODE=02&mid={\$row[\'members_id\']}\" title=\"<lang:entry_post_find> {\$row[\'members_name\']}\">{\$row[\'members_posts\']}</a> )</em>
		<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span>
		<span><strong>&middot; <lang:entry_rank></strong> {\$row[\'members_pips\']}</span></p>
		{\$avatar}
	</div>
	<div class=\"post\">
		<h5><strong><lang:event_started> {\$date_starts} <lang:event_ends> {\$date_ends}</strong><span>{\$link_delete}&nbsp;{\$link_edit}</span></h5>
		<div class=\"post_content\">
			<p>{\$row[\'event_body\']}</p>{\$sig}
		</div>
	</div>
	<div class=\"foot\">
		<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:read_link_top_title>.\"><lang:read_link_top></a></span>
		<ul class=\"extras\">{\$active}{\$linkSpan}</ul>
	</div>
	<div class=\"postend\">&nbsp;</div>
</div>
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=calendar&CODE=02\" title=\"\"><macro:btn_add_event></a>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_group_list', '		<h3><lang:form_groups_title></h3>
		<h4><lang:form_groups_desc></h4>
		<p class=\"checkwrap\"><select name=\"groups[]\" size=\"5\" multiple=\"multiple\" style=\"width: 200px;\" class=\"jump\">{\$group_list}</select></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_new_event_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=calendar\" title=\"\"><lang:bread_title_two></a> / <lang:add_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}
}
</script>
<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
<a name=\"qwiknote\"></a>
<form method=\"POST\" action=\"<sys:gate>?a=calendar&amp;CODE=03\" name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:form_add_type_title></h3>
		<h4><lang:form_add_type_desc></h4>
		<p class=\"checkwrap\">
			<strong><lang:form_start_date_on> </strong>&nbsp;
			<select name=\"start_month\">{\$start_months}</select>&nbsp;
			<select name=\"start_day\">{\$start_days}</select>&nbsp;
			<select name=\"start_year\">{\$start_years}</select>
		</p>
		<p class=\"checkwrap\">
			<strong><lang:form_loop_every> </strong>&nbsp;
			<select name=\"loop_type\">{\$loop_types}</select>&nbsp;<strong><lang:form_loop_until></strong>&nbsp;
			<select name=\"end_month\">{\$end_months}</select>&nbsp;
			<select name=\"end_day\">{\$end_days}</select>&nbsp;
			<select name=\"end_year\">{\$end_years}</select>
		</p>
		{\$groups}
		<h3><lang:form_add_title_title></h3>
		<h4><lang:form_add_title_desc></h4>
		<input type=\'text\' name=\'title\' tabindex=\'1\' value=\"{\$title}\" />
		{\$bbcode}
		<h3><lang:form_emoticon_title></h3>
		<h4><lang:form_emoticon_desc></h4>
		{\$emoticons}
		<h3><lang:form_body_title></h3>
		<h4><lang:form_body_desc> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:form_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:form_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:form_link_length></a> )</h4>
		<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
		<h3><lang:form_options_title></h3>
		<h4><lang:form_options_desc></h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" checked=\"checked\" /> <lang:form_code_desc></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" checked=\"checked\" /> <lang:form_emo_desc></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:form_button_submit>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:form_button_reset>\" /></p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_blank_row', '<td class=\"{\$class}\">&nbsp;</td>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_date_row', '<td class=\"{\$class}\"><h4>{\$day}</h4><div class=\"events\">{\$events}</div></td>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'calendar', 'cal_month_wrapper', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:bread_title> {\$lit_month}, {\$lit_year}
</div>
<div class=\"postbutton\"><a href=\"<sys:gate>?a=calendar&amp;CODE=02\" title=\"\"><macro:btn_add_event></a></div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"2\" align=\"left\"><a href=\"<sys:gate>?a=calendar{\$link_prev}\" title=\"\">« {\$link_prev_lit_month}, {\$link_prev_lit_year}</a></td>
			<td class=\"header\" colspan=\"3\" align=\"center\">{\$lit_month}, {\$lit_year}</td>
			<td class=\"header\" colspan=\"2\" align=\"right\"><a href=\"<sys:gate>?a=calendar{\$link_next}\" title=\"\">{\$link_next_lit_month}, {\$link_next_lit_year} »</a></td>
		</tr>
		<tr>
			<th width=\"14%\" align=\"center\"><lang:lit_day_one></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_two></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_three></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_four></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_five></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_six></th>
			<th width=\"14%\" align=\"center\"><lang:lit_day_seven></th>
		</tr>
			{\$day_list}
	</table>
</div>
<div class=\"postbutton\"><a href=\"<sys:gate>?a=calendar&amp;CODE=02\" title=\"\"><macro:btn_add_event></a></div>
<form method=\"post\" action=\"<sys:gate>?a=calendar\">
<div class=\"formwrap\"><p class=\"sort\">
					<select name=\"month\" class=\"jump\">{\$months}</select>
					<select name=\"year\" class=\"jump\">{\$years}</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"go\" /></p>
</div>
				</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_avatar_row', '<li><a href=\"<sys:gate>?a=ucp&amp;CODE=16&amp;avatar={\$val}&amp;gallery={\$gallery}\" title=\"{\$val}\"><img src=\"<sys:sys_path>sys_images/ava_gallery/{\$gallery}/{\$val}\" alt=\"{\$val}\" /></li>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_avatar_gallery_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:ava_gallery_form_title></h3>
	<p class=\"checkwrap\"><lang:ava_tip></p>
	<h3><lang:ava_gallery_title></h3>
	<h4><lang:ava_gallery_tip></h4>
	<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=15\">
		<p class=\"checkwrap\">
			<select name=\"gallery\" class=\"jump\">
				{\$gallery_list}
			</select>
		</p>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:ava_gallery_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</form>
	<div id=\"avatar-gallery\">
		<ul>
			{\$avatar_rows}
		</ul>
	</div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sub_forum_row', '		<tr>
			<td align=\"center\" class=\"one\" width=\"1%\"><macro:icon_open_new></td>
			<td><a href=\"<sys:gate>?getforum={\$row[\'forum_id\']}\" title=\"\"><strong>{\$row[\'forum_name\']}</strong></a></td>
			<td align=\"center\" class=\"one\" width=\"20%\">{\$row[\'track_date\']}</td>
			<td align=\"center\" width=\"10%\"><a href=\"<sys:gate>?a=ucp&amp;CODE=13&amp;forum={\$row[\'forum_id\']}\" title=\"\"><strong><lang:sub_delete></strong></a></td>
		</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_stats', '<div class=\"infowrap\">
	<h1><lang:stat_title>:</h1>
	<h2><lang:stat_tip></h2>
	<p><lang:stat_totals><br />
	<lang:stat_newest><br />
	<lang:stat_online></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_announce', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"announce\" value=\"1\" {\$check[\'announce\']} /> <strong><lang:post_mod_options_announce></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_avatar_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:ava_title></h3>
	<p class=\"checkwrap\"><lang:ava_tip></p>
	<h4><strong><lang:ava_current></strong><br /> {\$avatar}</h4>
	<h4><lang:ava_ext> {\$ext}</h4>
</div>
<div class=\"formwrap\">
	<h3><lang:ava_gallery_title></h3>
	<h4><lang:ava_gallery_tip></h4>
	<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=15\">
		<p class=\"checkwrap\">
			<select name=\"gallery\" class=\"jump\">
				{\$gallery_list}
			</select>
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		</p>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:ava_gallery_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</form>
</div>
<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=17\" enctype=\'multipart/form-data\'>
	<div class=\"formwrap\">
		<h3><lang:ava_url_title></h3>
		<h4><lang:ava_url_tip></h4>
		<input type=\"text\" name=\"url\" value=\"{\$url}\" />
	</div>
	<div class=\"formwrap\">
		<h3><lang:ava_upload_title></h3>
		<h4><lang:ava_upload_tip></h4>
		<input type=\"file\" name=\"upload\" />
	</div>
	<div class=\"formwrap\">
		<h3><lang:ava_remove_title></h3>
		<p class=\"checkwarn\"><input type=\"checkbox\" class=\"check\" name=\"remove\" value=\"1\" /> <strong><lang:ava_remove_warn></strong></p>
		<p class=\"submit\">
		<input class=\"button\" type=\"submit\" value=\"<lang:ava_submit>\" />&nbsp;
		<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_jump_list', '	<form method=\"post\" action=\"<sys:gate>?a=topics\">
		<p class=\"sort\"><select name=\"forum\" class=\"jump\">
			{\$jump_list}
		</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:forum_jump>\" /></p>
	</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_mod_list', '	<form method=\"post\" action=\"<sys:gate>?a=mod&amp;t={\$this->_id}\" class=\"shaft\">
		<p class=\"sort\"><select name=\"CODE\" class=\"jump\">
			{\$mod_list}
		</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:mod_list>\" /></p>
		<input type=\"hidden\"  name=\"hash\" value=\"{\$hash}\" />
	</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topics_active', '<div class=\"infowrap\">
	<h1><lang:viewers_title></h1>
	<h2><lang:viewers_user_summary> ( <a href=\"<sys:gate>?a=active\" title=\"\"><lang:active_link_details></a> )</h2>
	<p>{\$list}</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_mod_wrapper', '<p class=\"moderator_list\"><em><lang:mod_label></em> {\$mod_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_sub_wrapper', '<p class=\"subforum_list\">{\$sub_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_mod_wrapper', '<p class=\"moderator_list\"><em><lang:mod_label></em> {\$mod_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_sub_wrapper', '<p class=\"subforum_list\">{\$sub_list}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_subscribe_forum_notice', 'Hello {\$row[\'members_name\']},

{\$topic[\'topics_last_poster_name\']}, from <conf:title> ( <conf:site_link> ), has just posted a reply
to a forum you have subscribed to ( {\$row[\'forum_name\']} ). You may follow the link below to 
read this topic:

<conf:site_link><sys:gate>?gettopic={\$topic[\'topics_id\']}

If you do not wish to receive subscription notices any longer you may turn this feature 
off within your personal control panel. To do this you may access your UCP through the 
above link.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_subs', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:sub_title></h3>
	<p class=\"checkwrap\"><lang:sub_tip></p>
	<h3><lang:sub_topics_title></h3>
	<h4><lang:sub_topics_desc></h4>
	<table class=\"ucp_table\" cellpadding=\"3\" cellspacing=\"1\">
		{\$topics}
	</table>
	<h3><lang:sub_forums_title></h3>
	<h4><lang:sub_forums_desc></h4>
	<table class=\"ucp_table\" cellpadding=\"3\" cellspacing=\"1\">
		{\$forums}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_field_subject', '		<h3><lang:post_field_subject></h3>
		<h4><lang:post_field_subject_tip></h4>
		<input type=\"text\" name=\"subject\" tabindex=\"1\" value=\"{\$subject}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_last_post', '	<span class=\"lastpost\">{\$last_date}</span><br />
	<strong><lang:last_post_in></strong> {\$forum[\'forum_last_post_title\']}<br />
	<strong><lang:last_post_by></strong> {\$forum[\'forum_last_post_user_name\']}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_wrapper', '		<h3><lang:post_options></h3>
		<h4><lang:post_options_tip></h4>
		{\$lock}
		{\$pin}
		{\$announce}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_pin', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"stick\" value=\"1\" {\$check[\'stuck\']} /> <strong><lang:post_mod_options_pin></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_option_bar', '		<h3><lang:post_options></h3>
		<h4><lang:post_options_tip>.</h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" {\$check_code} /> <lang:post_options_code></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" {\$check_emoticon} /> <lang:post_options_emoticon></p>
		{\$poll}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'topic_prefix', '<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><macro:img_prefix></a>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_button', '<a href=\"<sys:gate>{\$url}\" title=\"{\$title}\"><img src=\"<sys:skinPath>/{\$button}.gif\" alt=\"\" /></a>&nbsp;');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_cat_redirect', '<tr>
	<td class=\"cellone {\$row_color}\" width=\"1%\" align=\"center\"><macro:cat_redirect></td>
	<td class=\"cellone {\$row_color}\" colspan=\"2\">
		<h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$forum[\'forum_name\']}</a></h4>
		<p>{\$forum[\'forum_description\']}</p>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$forum[\'forum_red_clicks\']} <lang:cat_redirect></h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_cat_wrapper', '<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"5\"><a href=\"<sys:gate>?getforum={\$category[\'forum_id\']}\" title=\"{\$category[\'forum_name\']}\">{\$category[\'forum_name\']}</a></td>
		</tr>
		<tr>
			<th colspan=\"2\" align=\"left\" width=\"50%\"><lang:topics_col_forum></th>
			<th align=\"left\" width=\"30%\"><lang:topics_col_topics></th>
			<th align=\"center\" width=\"20%\"><lang:topics_col_topics> / <lang:topics_col_replies></th>
		</tr>
		{\$forum_list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_last_post', '	<span class=\"lastpost\">{\$last_date}</span><br />
	<strong><lang:last_post_in></strong> {\$forum[\'forum_last_post_title\']}<br />
	<strong><lang:last_post_by></strong> {\$forum[\'forum_last_post_user_name\']}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_news_section', '<p id=\"community_news\">
	<strong><lang:news_title>: <a href=\"<sys:gate>?a=read&amp;CODE=02&amp;p={\$news[\'news_post\']}\" title=\"<lang:news_title>\">{\$news[\'news_title\']}</a></strong><br />
	<cite>--<lang:news_date> {\$news[\'news_date\']}.</cite>
</p>
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_none', '							<tr>
								<td class=\"cellone\" align=\"center\" colspan=\"6\"><strong><lang:no_topics></strong></td>
							</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_cat_row', '<tr>
	<td class=\"cellone {\$row_color}\" width=\"1%\" align=\"center\">
		<a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$marker}</a>
	</td>
	<td class=\"cellone {\$row_color}\">
		<h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$forum[\'forum_name\']}</a></h4>
		{\$subs}
		<p>{\$forum[\'forum_description\']}{\$mods}</p>
	</td>
	<td class=\"cellone {\$row_color}\">{\$last_post}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$forum[\'forum_topics\']} / {\$forum[\'forum_posts\']}</h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sub_none', '<tr>
	<td colspan=\"4\" align=\"center\"><strong><lang:main_sub_none></strong></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sub_topic_row', '		<tr>
			<td align=\"center\" class=\"one\" width=\"1%\"><macro:icon_open_new></td>
			<td><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}\" title=\"\"><strong>{\$row[\'topics_title\']}</strong></a></td>
			<td align=\"center\" class=\"one\" width=\"20%\">{\$row[\'track_date\']}</td>
			<td align=\"center\" width=\"10%\"><a href=\"<sys:gate>?a=ucp&amp;CODE=12&amp;id={\$row[\'topics_id\']}\" title=\"\"><strong><lang:sub_delete></strong></a></td>
		</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_container', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <lang:bread_title>
</div>
<hr />
{\$new_note}
{\$news_bit}
{\$category_list}
<hr />
<div class=\"bar\"><span><a href=\"<sys:gate>?a=logon&amp;CODE=06\" title=\"<lang:link_delete_cookies>\"><strong><lang:link_delete_cookies></strong></a> &middot; <a href=\"<sys:gate>?a=logon&amp;CODE=07\" title=\"<lang:link_mark_all_read>\"><strong><lang:link_mark_all_read></strong></a></span>&nbsp;</div>
<hr />
{\$active_users}
<hr />
{\$board_stats}
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_cat_row', '<tr>
	<td class=\"cellone {\$row_color}\" width=\"1%\" align=\"center\">
		<a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$marker}</a>
	</td>
	<td class=\"cellone {\$row_color}\">
		<h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$forum[\'forum_name\']}</a></h4>
		{\$subs}
		<p>{\$forum[\'forum_description\']}{\$mods}</p>
	</td>
	<td class=\"cellone {\$row_color}\">{\$last_post}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$forum[\'forum_topics\']} / {\$forum[\'forum_posts\']}</h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_cat_redirect', '<tr>
	<td class=\"cellone {\$row_color}\" width=\"1%\" align=\"center\"><macro:cat_redirect></td>
	<td class=\"cellone {\$row_color}\" colspan=\"2\">
		<h4><a href=\"<sys:gate>?getforum={\$forum[\'forum_id\']}\" title=\"{\$forum[\'forum_name\']}\">{\$forum[\'forum_name\']}</a></h4>
		<p>{\$forum[\'forum_description\']}</p>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$forum[\'forum_red_clicks\']} <lang:cat_redirect></h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'main_cat_wrapper', '<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"5\"><a href=\"<sys:gate>?getforum={\$category[\'forum_id\']}\" title=\"{\$category[\'forum_name\']}\">{\$category[\'forum_name\']}</a></td>
		</tr>
		<tr>
			<th colspan=\"2\" align=\"left\" width=\"50%\"><lang:main_col_forum></th>
			<th align=\"left\" width=\"30%\"><lang:main_col_latest></th>
			<th align=\"center\" width=\"20%\"><lang:main_col_topics> / <lang:main_col_replies></th>
		</tr>
		{\$forum_list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'register', 'resend_validation_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:validate_crumb_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=register&amp;CODE=04\">
	<div class=\"formwrap\">
		<h3><lang:validate_title></h3>
		<p class=\"checkwrap\"><lang:validate_tip></p>
		<h3><lang:validate_field_email></h4>
		<h4><lang:validate_field_email_tip></h3>
		<input type=\'text\' name=\'email\' tabindex=\'1\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:validate_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:validate_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_registration_complete', 'Hello, {\$username}

The account you created at <conf:title> ( <conf:site_link> ) is now activated and ready to
use. Depending on your browser settings you may or may not be automatically logged in.
If not just use the following link to log your account:

<conf:site_link><sys:gate>?a=logon

Thank you for participating in our community!');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_main', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<div class=\"formwrap\">
	<h3><lang:main_title></h3>
	<p class=\"checkwrap\"><lang:main_tip></p>
	<h3><lang:main_email></h3>
	<h4><user:members_email></h4>
	<h3><lang:main_joined></h3>
	<h4>{\$join_date}</h4>
	<h3><lang:main_posts></h3>
	<h4><a href=\"<sys:gate>?a=search&amp;CODE=02&amp;mid=<user:members_id>\">{\$total_posts}</a> <lang:main_posts_stat></h4>
	<h3><lang:main_notes></h3>
	<h4><a href=\"<sys:gate>?a=notes\">{\$total_notes}</a> <lang:main_notes_stat></h4>
	<h3><lang:file_title></h3>
	<h4><lang:file_desc></h4>
	<table class=\"ucp_table\" cellpadding=\"3\" cellspacing=\"1\" with=\"100%\">
		<tr>
			<th width=\"1%\" align=\"center\"><lang:file_col_id></th>
			<th><lang:file_col_name></th>
			<th><lang:file_col_topic></th>
			<th align=\"center\"><lang:file_col_date></th>
			<th align=\"center\"><lang:file_col_size></th>
			<th align=\"center\"><lang:file_col_hits></th>
			<th>&nbsp;</th>
		</tr>
		{\$files}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_tabs', '<ul id=\"ucp_tabs\">
	{\$list}
</ul>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_match_result_row', '<tr>
	<td class=\"cellone {\$row_color}\" align=\"center\" width=\"1%\"><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\">{\$row[\'topics_marker\']}</a></td>
	<td class=\"cellone {\$row_color}\">
		{\$row[\'topics_prefix\']} 
		<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;hl={\$hlLink}\" title=\"{\$row[\'topics_title\']}\">{\$row[\'topics_title\']}</a> {\$inlineNav}<br />
		<span class=\"subject\">{\$row[\'topics_subject\']}</span>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><strong>{\$row[\'topics_author\']}</strong></td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><a href=\"<sys:gate>?getforum={\$row[\'topics_forum\']}\" title=\"\">{\$row[\'forum_name\']}</a></td>
	<td class=\"cellone {\$row_color}\">
		<span class=\"lastpost\">{\$row[\'topics_last\']}</span><br />
		<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><lang:topic_last_replied>:</a> <strong>{\$row[\'topics_poster\']}</strong>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$row[\'topics_posts\']} / {\$row[\'topics_views\']}</h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_match_result_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=search\" title=\"<lang:search_form_title>\"><lang:search_form_title></a> / <strong>{\$count}</strong> <lang:search_result_title>:
</div>
<div class=\"bar\">{\$pages}</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"6\">{\$count} <lang:search_result_title></td>
		</tr>
		<tr>
			<th align=\"left\" width=\"30%\" colspan=\"2\"><lang:result_col_title></th>
			<th align=\"center\" width=\"10%\"><lang:result_col_author></th>
			<th align=\"center\" width=\"20%\"><lang:result_col_forum></th>
			<th align=\"center\" width=\"20%\"><lang:result_col_last></th>
			<th align=\"center\" width=\"15%\"><lang:result_col_replies> / <lang:result_col_views></th>
		</tr>
		{\$list}
	</table>
</div>
<div class=\"bar\">{\$pages}</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_pass_get_1', 'You have recently attempted to recover your password from <conf:title> ( <conf:site_link> ).
To complete the process you must click the following link to validate your request. Once validation is 
complete you will be mailed your new account password. You will be able to change this password at anytime 
via your control panel.

{\$url}

Take note that this validation link will expire within 24 hours.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_admin_user', 'Hello, {\$name}

This message is to inform you that your account for <conf:title> ( <conf:site_link> )
has been activated. Below you will find your account access information which you may change
at anytime through your personal control panel.

Username: {\$name}
Password: {\$password}

Log your account through the link below:
<conf:site_link><sys:gate>?a=logon\";');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_pass_get_2', 'Hello, {\$row[\'members_name\']}

This message is to inform you that your account for <config:title> ( <config:site_link> )
has been activated. Below you will find your account access information which you may change
at anytime through your personal control panel.

Username: {\$row[\'members_name\']}
Password: {\$pass}

Log your account through the link below:

<conf:site_link><sys:gate>?a=logon');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_email', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=10\'>
	<div class=\"formwrap\">
		<h3><lang:email_title></h3>
		<p class=\"checkwrap\"><lang:email_tip></p>
		<h4><strong><lang:email_current></strong> <user:members_email></h4>
		<h3><lang:email_field_pass></h3>
		<h4><lang:email_field_pass_tip></h4>
		<input type=\"password\" name=\"password\" />
		<h3><lang:email_field_new></h3>
		<h4><lang:email_field_new_tip></h4>
		<input type=\"text\" name=\"new\" value=\"{\$email_one}\" />
		<h3><lang:email_field_con></h3>
		<h4><lang:email_field_con_tip></h4>
		<input type=\"text\" name=\"confirm\" value=\"{\$email_two}\" />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:email_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:email_button_reset>\" />
		</p>
	</div>
	<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_options', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=08\'>
	<div class=\"formwrap\">
		<h3><lang:board_title></h3>
		<p class=\"checkwrap\"><lang:board_tip></p>
		<h3><lang:board_field_skin></h3>
		<h4><lang:board_field_skin_tip></h4>
		<p class=\"checkwrap\"><select name=\"skin\">
			{\$skins}
		</select></p>
		<h3><lang:board_field_lang></h3>
		<h4><lang:board_field_lang_tip></h4>
		<p class=\"checkwrap\"><select name=\"lang\">
			{\$langs}
		</select></p>
		<h3><lang:board_field_zone></h3>
		<h4><lang:board_field_zone_tip></h4>
		<p class=\"checkwrap\"><select name=\"zone\">
			{\$zones}
		</select></p>
		<h3><lang:board_field_notify></h3>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"notes\" value=\"1\"{\$checked[\'notes\']} /> <b><lang:board_field_note>?</b></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"sigs\" value=\"1\"{\$checked[\'sigs\']} /> <b><lang:board_field_sigs>?</b></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"avatars\" value=\"1\"{\$checked[\'avatars\']} /> <b><lang:board_field_avatars>?</b></p>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:board_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'print', 'print_row', '<div id=\"resultwrap\">
	<h3><a href=\'<sys:gate>?getuser={\$row[\'members_id\']}\'><strong>{\$row[\'members_name\']}</strong></a> | <span>{\$row[\'posts_date\']}</span></h3>
	<div class=\"post\"><p>{\$row[\'posts_body\']}</p></div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'mod_option_lock', '		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"lock\" value=\"1\" {\$check[\'locked\']} /> <strong><lang:post_mod_options_lock></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'post_name_field', '		<h3><lang:post_field_name></h3>
		<h4><lang:post_field_name_tip></h4>
		<input type\"text\" name=\"name\" tabindex=\"1\" value=\"{\$name}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_banned', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:banned_title></h3>
		<div id=\"warning\">
			<h3><lang:err_warn_title></h3>
			<p><strong><lang:banned_info></strong></p>
		</div>
		<h3><lang:banned_form_name_title></h3>
		<h4><lang:banned_form_name_title_info></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:banned_form_pass_title></h3>
		<h4><lang:banned_form_pass_title_info></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:banned_form_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:banned_form_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_pass', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=06\'>
	<div class=\"formwrap\">
		<h3><lang:pass_title></h3>
		<p class=\"checkwrap\"><lang:pass_tip></p>
		<h3><lang:pass_field_password></h3>
		<h4><lang:pass_field_password_tip></h4>
		<input type=\"password\" name=\"current\" />
		<h3><lang:pass_field_new></h3>
		<h4><lang:pass_field_new_tip></h4>
		<input type=\"password\" name=\"new\" />
		<h3><lang:pass_field_con></h3>
		<h4><lang:pass_field_con_tip></h4>
		<input type=\"password\" name=\"confirm\"\" />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:pass_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:pass_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'page_wrapper', '<macro:img_mini_pages> {\$links}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'print', 'print_body', '<script language=\"JavaScript\">
	<!--
	window.print();
	-->
</script>
<div id=\"print\">
	<h2><span><conf:title> ( <a href=\"<conf:site_link>\" title=\"\"><conf:site_link></a> )</span> {\$topic[\'topics_title\']}</h2>
	<p class=\"bar\"><b><lang:source>: <a href=\"#\" onclick=\"javascript: return prompt(\'<lang:link_copy_prompt>:\', \'<conf:site_link><sys:gate>?gettopic={\$topic[\'topics_id\']}\');\"><conf:site_link><sys:gate>?gettopic={\$this->_id}</a></b></p>
	{\$content}
	<p class=\"bar\"><span><a href=\"javascript: scroll(0,0);\" title=\"\"><strong><lang:top></strong></a></span><strong><lang:source>: <a href=\"#\" onclick=\"javascript: return prompt(\'<lang:link_copy_prompt>:\', \'<conf:site_link><sys:gate>?gettopic={\$topic[\'topics_id\']}\');\"><conf:site_link><sys:gate>?gettopic={\$this->_id}</a></strong></p>
	<div id=\"copyright\"><span>Powered By: <strong>MyTopix&trade; | Personal Message Board</strong> <conf:version></span>Copyright &copy;  2004,  <a href=\"http://www.jaia-interactive.com/\" title=\"<lang:visit_jaia>\">Jaia Interactive</a> all rights reserved.</div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_full_result_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=search\" title=\"<lang:search_form_title>\"><lang:search_form_title></a> / <strong>{\$count}</strong> <lang:search_result_title>:
</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"7\">{\$count} <lang:search_result_title></td>
		</tr>
		<tr>
			<th align=\"left\" width=\"1%\"><lang:result_col_score></th>
			<th align=\"left\" width=\"30%\" colspan=\"2\"><lang:result_col_title></th>
			<th align=\"center\" width=\"10%\"><lang:result_col_author></th>
			<th align=\"center\" width=\"20%\"><lang:result_col_forum></th>
			<th align=\"center\" width=\"20%\"><lang:result_col_last></th>
			<th align=\"center\" width=\"15%\"><lang:result_col_replies> / <lang:result_col_views></th>
		</tr>
		{\$list}
	</table>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_sig', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <user:class_sigLength>;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}

}
</script>
<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
<form method=\'post\' action=\'<sys:gate>?a=ucp&amp;CODE=04\' name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:sig_title></h3>
		<p class=\"checkwrap\"><lang:sig_tip></p>
		<h3><lang:sig_field_current></h3>
		<p class=\"sig\">{\$parsed}</p>
		{\$bbcode}
		<h3><lang:sig_emoticons></h3>
		<h4><lang:sig_emoticons_tip></h4>
		{\$emoticons}
		<h3><lang:sig_field_body></h3>
		<h4><lang:sig_field_body_tip> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\" title=\"<lang:sig_link_code_title>\"><lang:sig_link_code></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\" title=\"<lang:sig_link_emoticons_tip>\"><lang:sig_link_emoticons></a> · <a href=\"javascript:check_length()\" title=\"<lang:sig_link_length_tip>\"><lang:sig_link_length></a> )</h4>
		<textarea name=\"body\">{\$sig}</textarea>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:sig_button_submit>\" /> 
			<input class=\"reset\" type=\"reset\" value=\"<lang:sig_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_jump_list', '<form method=\"post\" action=\"<sys:gate>?a=topics\" class=\"shaft\">
			<p class=\"sort\"><select name=\"forum\" class=\"jump\">
				{\$jump_list}
			</select>&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:forum_jump>\" /></p>
		</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_full_result_row', '<tr>
	<td class=\"cellone {\$row_color}\" align=\"center\"><strong>{\$row[\'topics_score\']}%</strong></td>
	<td class=\"cellone {\$row_color}\" align=\"center\" width=\"1%\"><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\">{\$row[\'topics_marker\']}</a></td>
	<td class=\"cellone {\$row_color}\">
		{\$row[\'topics_prefix\']} 
		<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;hl={\$hlLink}\" title=\"{\$row[\'topics_title\']}\">{\$row[\'topics_title\']}</a> {\$inlineNav}<br />
		<span class=\"subject\">{\$row[\'topics_subject\']}</span>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><strong>{\$row[\'topics_author\']}</strong></td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><a href=\"<sys:gate>?getforum={\$row[\'topics_forum\']}\" title=\"{\$row[\'forum_name\']}\">{\$row[\'forum_name\']}</a></td>
	<td class=\"cellone {\$row_color}\">
		<span class=\"lastpost\">{\$row[\'topics_last\']}</span><br />
		<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><lang:topic_last_replied>:</a> <strong>{\$row[\'topics_poster\']}</strong>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$row[\'topics_posts\']} / {\$row[\'topics_views\']}</h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'move_topic', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / <a href=\"<sys:gate>?gettopic={\$this->_id}\" title=\"\">{\$row[\'topics_title\']}</a> / <lang:mod_move_bread>
</div>
<form method=\"post\" action=\"<sys:gate>?a=mod&amp;CODE=05&amp;t={\$this->_id}\">
	<div class=\"formwrap\">
		<h3><lang:mod_move_title></h3>
		<h4><lang:mod_move_desc></h4>
		<p class=\"checkwrap\">
			<input type=\"checkbox\" name=\"link\" class=\"check\" value=\"1\"> <strong><lang:mod_move_link></strong>
		</p>
		<p class=\"checkwrap\">
			<select name=\"forum\" size=\"5\" class=\"big\" id=\"forum\">
				{\$search_list}
			</select>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:mod_move_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:mod_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_validate_user', 'Hello, {\$username}

Our records indicate that you have just attempted to register a new account with our board.
Currently, the administrator of this community thinks it best to first validate all new 
user accounts to prevent spamming and abuse. To activate your account you only need to click
on the link below. Once you do this the system will allow you to log in to your account.

Activation Key:

<conf:site_link><sys:gate>?a=register&CODE=02&key={\$key}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'by_user_row', '<div id=\"resultwrap\">
	<h3><a href=\"<sys:gate>?a=read&amp;CODE=02&amp;p={\$row[\'posts_id\']}\" title=\"\"><b>{\$row[\'topics_title\']}</b></a> | <span>{\$row[\'posts_date\']}</span></h3>
	<div class=\"post\"><p>{\$row[\'posts_body\']}</p></div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'by_user_table', '<div id=\"crumb_nav\">
<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <strong>{\$count}</strong> <lang:search_result_user_title> <strong>{\$user}</strong>:
</div>
<div class=\"bar\">{\$pages}</div>
{\$list}
<div class=\"bar\">{\$pages}</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'search', 'search_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:search_form_title>:
</div>
<script language=\"javascript\">

	function selectAll(list, select)
	{
		var list = document.getElementById(list);
		
		for (var i = 0; i < list.length; i++)
		{
			list.options[i].selected = select.checked;
		}
	}

</script>
<form method=\"post\" action=\"<sys:gate>?a=search&CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:search_form_field_phrase></h3>
		<h4><lang:search_form_field_phrase_tip></h4>
		<input type=\"text\" name=\"keywords\" value=\"{\$this->_phrase}\" />
		<h3><lang:search_form_type>:</h3>
		<h4><lang:search_form_type_tip>.</h4>
		<p class=\"checkwrap\">
			<input type=\"radio\" name=\"mode\" class=\"check\" value=\"match\" checked=\"checked\" /> <strong><lang:search_form_basic></strong>&nbsp;
			<span id=\"matchtype\">
				<input type=\"checkbox\" name=\"type\" class=\"check\" value=\"1\" /> <lang:search_form_basic_exact>
			</span>
		</p>
		<p class=\"checkwrap\">
			<input type=\"radio\" name=\"mode\" class=\"check\" value=\"full\" /> <strong><lang:search_form_full></strong> &nbsp;
			<span id=\"limit\">
				<select name=\"limit\">
					<option value=\"10\" selected=\"selected\">10</option>
					<option value=\"20\">20</option>
					<option value=\"30\">30</option>
					<option value=\"40\">40</option>
				</select> <lang:search_form_full_limit>
			</span>
		</p>
		<h3><lang:search_form_forum_title></h3>
		<h4><lang:search_form_forum_desc></h4>
		<p class=\"checkwrap\">
			<input type=\"checkbox\" name=\"all\" class=\"check\" value=\"all\" onclick=\"selectAll(\'forums\', this)\" checked=\"checked\"/> <strong><lang:search_form_forum_all></strong>
		</p>
		<p class=\"checkwrap\">
			<select name=\"forums[]\" size=\"5\" multiple=\"multiple\" class=\"big\" id=\"forums\">
				{\$search_list}
			</select>
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:search_form_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:search_form_button_reset>\" />
		</p>
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'sig', '<p class=\"sig\">{\$row[\'members_sig\']}</p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'register', 'form_register', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:register_crumb_title>
</div>
{\$error_list}
<form method=\"post\" action=\"<sys:gate>?a=register&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:registration_title></h3>
		<p class=\"checkwrap\"><lang:registration_tip></p>
		<h3><lang:field_username></h3>
		<h4><lang:field_username_tip></h4>
		<input type=\"text\" name=\"username\" value=\"{\$username}\" />
		<h3><lang:field_pass></h3>
		<h4><lang:field_pass_tip></h4>
		<input type=\"password\" name=\"password\" />
		<h3><lang:field_con_pass></h3>
		<h4><lang:field_con_pass_tip></h4>
		<input type=\"password\" name=\"cpassword\" />
		<h3><lang:field_email></h3>
		<h4><lang:field_email_tip></h4>
		<input type=\"text\" name=\"email\" value=\"{\$email_one}\" />
		<h3><lang:field_con_email></h3>
		<h4><lang:field_con_email_tip></h4>
		<input type=\"text\" name=\"cemail\" value=\"{\$email_two}\" />
		<h3><lang:field_terms></h3>
		<h4><lang:field_terms_tip></h4>
		<textarea rows=\"\" cols=\"\"><lang:field_terms_content></textarea>
		<p class=\"checkwrap\"><input class=\"check\" type=\"checkbox\" name=\"contract\" {\$contract} /> <strong><lang:field_agree></strong></p>
		{\$coppa_field}
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'ucp', 'ucp_general', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>
</div>
{\$ucp_tabs}
{\$error_list}
<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=02\'>
	<div class=\"formwrap\">
		<h3><lang:gen_title></h3>
		<p class=\"checkwrap\"><lang:gen_tip></p>
		<h3><lang:gen_field_location></h3>
		<h4><lang:gen_field_location_tip></h4>
		<input type=\"text\" name=\"location\" value=\"{\$location}\" />
		<h3><lang:gen_field_website></h3>
		<h4><lang:gen_field_website_tip></h4>
		<input type=\"text\" name=\"homepage\" value=\"{\$homepage}\" />
		<h3><lang:gen_field_birthday></h3>
		<h4><lang:gen_field_birthday_tip></h4>
		<p class=\"checkwrap\">
			<select name=\'bmonth\'>
				{\$months}
			</select>
			&nbsp;
			<select name=\'bday\'>
				{\$days}
			</select>
			&nbsp;
			<select name=\'byear\'>
				{\$years}
			</select>
		</p>
		<h3><lang:gen_field_aim></h3>
		<h4><lang:gen_field_aim_tip></h4>
		<input type=\"text\" name=\"aim\" value=\"{\$aim}\" />
		<h3><lang:gen_field_icq></h3>
		<h4><lang:gen_field_icq_tip></h4>
		<input type=\"text\" name=\"icq\" value=\"{\$icq}\" />
		<h3><lang:gen_field_yim></h3>
		<h4><lang:gen_field_yim_tip></h4>
		<input type=\"text\" name=\"yim\" value=\"{\$yim}\" />
		<h3><lang:gen_field_msn></h3>
		<h4><lang:gen_field_msn_tip></h4>
		<input type=\"text\" name=\"msn\" value=\"{\$msn}\" />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:gen_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:gen_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'post_row_guest', '<div class=\"user\">
	<a name=\"{\$row[\'posts_id\']}\"></a>
	<p><strong>{\$row[\'posts_author_name\']}</strong>
	<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span></p>
	<img src=\"<sys:skinPath>/ava_none.gif\" class=\"avatar\" alt=\"\" title=\"\" />
</div>
<div class=\"post\">
	<h5><strong><lang:posted_on> {\$row[\'posts_date\']}</strong><span>{\$linkDelete}{\$linkEdit}{\$linkQuote}</span></h5>
	<p>{\$row[\'posts_body\']}</p>{\$attach}
</div>
<div class=\"foot\">
	<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:entry_link_top_tip>\"><lang:entry_link_top></a></span>
	&nbsp;
</div>
<div class=\"postend\">&nbsp;</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'post_table', '{\$poll_data}
<div class=\"postwrap\">
        <div class=\"postheader\"><span>{\$topic[\'topics_title\']}</span></div>
        {\$list}
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_active', '<div class=\"infowrap\">
	<h1><lang:readers_title></h1>
	<h2><lang:readers_user_summary> ( <a href=\"<sys:gate>?a=active\" title=\"\"><lang:active_link_details></a> )</h2>
	<p>{\$list}</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'read_buttons', '<div class=\"postbutton\">
	{\$button_reply} {\$button_qwik} {\$button_topic} {\$button_poll}
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'reply_bit', '<div id=\"qwikwrap\" style=\"display: none;\">
	<script language=\"javascript\">
	function check_length()
	{
		var limit  = <conf:max_post> * 1000;
		var length = document.REPLIER.body.value.length;

		if ( (length > limit) ) {
			alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
		} else {
			alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
		}

	}
	</script>
	<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
	<a name=\"qwik\"></a>
	<form method=\"post\" action=\"<sys:gate>?a=post&amp;CODE=01&amp;t={\$this->_id}&amp;qwik=1\" name=\"REPLIER\">
		<div class=\"formwrap\">
			<h3><lang:qwik_title>.</h3>
			<p class=\"checkwrap\"><lang:qwik_title_tip>.</p>
			<h3><lang:qwik_field_body>:</h3>
			<h4><lang:qwik_field_body_tip> (<a href=\'javascript:smilie_window(\"<sys:gate>\");\' title=\"<lang:qwik_link_emoticons>\"><lang:qwik_link_emoticons></a> &middot; <a href=\"javascript:check_length();\" title=\"<lang:qwik_link_length>\"><lang:qwik_link_length></a>)</h2>
			<textarea name=\"body\" rows=\"\" cols=\"\"></textarea>
			<p class=\"submit\">
				<input class=\"button\" type=\"submit\" value=\"<lang:qwik_button_submit>\" />&nbsp;
				<input class=\"reset\" type=\"reset\" value=\"<lang:qwik_button_reset>\" />
			</p>
			<input type=\"hidden\" name=\"cOption\" value=\"1\" />
			<input type=\"hidden\" name=\"eOption\" value=\"1\" />
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		</div>
	</form>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'post_row', '<div class=\"user\">
	<a name=\"{\$row[\'posts_id\']}\"></a>
	<p><a href=\"<sys:gate>?getuser={\$row[\'members_id\']}\" title=\"<lang:entry_link_profile>\"><strong>{\$row[\'members_name\']}</strong></a> <em>( <a href=\"<sys:gate>?a=search&CODE=02&mid={\$row[\'members_id\']}\" title=\"<lang:entry_post_find> {\$row[\'members_name\']}\">{\$row[\'members_posts\']}</a> )</em>
	<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span>
	<span><strong>&middot; <lang:entry_rank></strong> {\$row[\'members_pips\']}</span></p>
	{\$avatar}<div style=\"clear:both;\" /></div>
</div>
<div class=\"post\">
	<h5><strong><lang:posted_on> {\$row[\'posts_date\']}</strong><span>{\$linkDelete}{\$linkEdit}{\$linkQuote}</span></h5>
	<div class=\"post_content\">
		<p>{\$row[\'posts_body\']}</p>{\$attach}{\$sig}
	</div>
</div>
<div class=\"foot\">
	<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:entry_link_top_tip>\"><lang:entry_link_top></a></span>
	<ul class=\"extras\"><li>{\$active}</li>{\$linkSpan}</ul>
</div>
<div class=\"postend\">&nbsp;</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'read', 'container_read', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / {\$topic[\'topics_title\']}
</div>
{\$buttons}
	<div class=\"bar\">
		<span><a href=\"<sys:gate>?gettopic={\$topic[\'topics_id\']}&amp;CODE=01\" title=\"<lang:subscribe_tip>\"><strong><lang:subscribe></strong></a></span>
		{\$pages}
	</div>
{\$content}
<div class=\"bar\">
	<span><a href=\"<sys:gate>?gettopic={\$topic[\'topics_id\']}&amp;CODE=03&amp;forum={\$topic[\'topics_forum\']}\" title=\"<lang:previous>\"><strong><lang:previous></strong></a> &middot; <a href=\"<sys:gate>?a=topics&amp;forum={\$topic[\'topics_forum\']}\" title=\"<lang:index>\"><strong><lang:index></strong></a> &middot; <a href=\"<sys:gate>?gettopic={\$topic[\'topics_id\']}&amp;CODE=04&amp;forum={\$topic[\'topics_forum\']}\" title=\"<lang:next>\"><strong><lang:next></strong></a></span>
	{\$pages}
</div>
{\$buttons}
<div class=\"formwrap\">
{\$mod}
{\$jump}
</div>
{\$replier}
{\$readers}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'quote_field', '		<h3><lang:post_field_quote></h3>
		<h4><lang:post_field_quote_tip></h4>
		<textarea name=\"quote\">{\$message}</textarea>
		{\$hidden}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'smilie_wrapper', '<table class=\"emoticon\" cellpadding=\"0\" cellspacing=\"0\">
	{\$smilies}
</table>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_field_title', '		<h3><lang:post_field_title></h3>
		<h4><lang:post_field_title_tip></h4>
		<input type=\"text\" name=\"title\" tabindex=\"1\" value=\"{\$title}\" />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'profile', 'profile_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:profile_title> {\$row[\'members_name\']}
</div>
<div id=\"left_column\">
	<div class=\"formwrap\">
		<h3><lang:profile_name></h3>
		<h4>{\$row[\'members_name\']} ( {\$row[\'class_prefix\']}{\$row[\'class_title\']}{\$row[\'class_suffix\']} )</h4>
		<h3><lang:profile_last_visit></h3>
		<h4>{\$row[\'members_lastvisit\']}</h4>
		<h3><lang:profile_registered></h3>
		<h4>{\$row[\'members_registered\']}</h4>
		<h3><lang:profile_birthday></h3>
		<h4>{\$birthday}</h4>
		<h3><lang:profile_stats></h3>
		<h4><a href=\'<sys:gate>?a=search&amp;CODE=02&amp;mid={\$row[\'members_id\']}\'>{\$row[\'members_posts\']}</a> <lang:profile_posts> ( {\$row[\'members_per_day\']} / <lang:per_day> )</h4>
		<h3><lang:profile_last_5></h3>
		<ul>
			{\$topics}
		</ul>
		<h3><lang:profile_location></h3>
		<h4>{\$row[\'members_location\']}</h4>
	</div>
</div>
<div id=\"right_column\">
	<div class=\"formwrap\">
		<h3><lang:profile_home></h3>
		<h4>{\$row[\'members_homepage\']}</h4>
		<h3><lang:profile_aol></h3>
		<h4>{\$row[\'members_aim\']}</h4>
		<h3><lang:profile_yim></h3>
		<h4>{\$row[\'members_yim\']}</h4>
		<h3><lang:profile_msn></h3>
		<h4>{\$row[\'members_msn\']}</h4>
		<h3><lang:profile_icq></h3>
		<h4>{\$row[\'members_icq\']}</h4>
		<h3><lang:profile_other></h3>
		<ul>
			<li><a href=\'<sys:gate>?a=notes&amp;CODE=07&amp;send={\$row[\'members_id\']}\'><lang:profile_link_note></a></li>
		</ul>
	</div>
</div>
<div id=\"signature\">
	<div class=\"formwrap\">
		<h3><lang:profile_sig></h3>
		<p class=\"sig\">{\$row[\'members_sig\']}</p>
	</div>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'emoticons_field', '		<h3><lang:post_emoticon_title></h3>
		<h4><lang:post_emoticon_tip></h4>
		{\$smilies}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_wrapper', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> {\$bread_crumb}
</div>
{\$errors}
<script language=\'javascript\'>
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;
		if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}

}
</script>
<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
<form method=\"POST\" action=\"{\$this->_form_action}\" name=\"REPLIER\" {\$this->_form_multipart}>
	<div class=\"formwrap\">
		<h3>{\$this->_form_title}</h3>
		<p class=\"checkwrap\">{\$this->_form_tip}</p>
		{\$recipient}
		{\$name}
		{\$title}
		{\$subject}
		{\$bbcode}
		{\$emoticons}
		<h3><lang:post_message_title></h3>
		<h4><lang:post_message_tip> (  <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:post_link_bbcode></a> · <a href=\'javascript:smilie_window(\"<sys:gate>\")\'><lang:post_link_emoticons></a> · <a href=\'javascript:check_length()\'><lang:post_link_length></a> )</h4>
		<textarea name=\"body\" rows=\"5\" tabindex=\"1\">{\$message}</textarea>
		{\$quote}
		{\$convert}
		{\$upload}
		{\$tools}
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" tabindex=\"2\" value=\"{\$this->_form_submit}\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		{\$hidden}
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'bbcode_field', '	<div id=\'bbcode_panel\' style=\'display: none;\'>
		<h3><lang:bb_title></h3>
		<h4><lang:bb_title_tip></h4>
		<table cellpadding=\'3\' cellspacing=\'0\'>
			<tr>
				<td align=\'left\'>
					<input type=\'button\' class=\'bbcode\' value=\' U \' onClick=\'codeBasic(this)\' name=\'u\' />
					<input type=\'button\' class=\'bbcode\' value=\' I \' onClick=\'codeBasic(this)\' name=\'i\' />
					<input type=\'button\' class=\'bbcode\' value=\' B \' onClick=\'codeBasic(this)\' name=\'b\' /> 
					<select name=\'FONT\' style=\'width: 100px;\' onchange=\'fontFace(this.options[this.selectedIndex].value)\'>
						<option value=\'0\'><lang:bb_select_font></option>
						<option style=\'font-family: tahoma; font-weight: bold;\' value=\'Arial\'>Tahoma</option>
						<option style=\'font-family: times; font-weight: bold;\' value=\'Times\'>Times</option>
						<option style=\'font-family: courier; font-weight: bold;\' value=\'Courier\'>Courier</option>
						<option style=\'font-family: impact; font-weight: bold;\' value=\'Impact\'>Impact</option>
						<option style=\'font-family: geneva; font-weight: bold;\' value=\'Geneva\'>Geneva</option>
						<option style=\'font-family: optima; font-weight: bold;\' value=\'Optima\'>Optima</option>
					</select>
					<select name=\'SIZE\' style=\'width: 100px;\' onchange=\'fontSize(this.options[this.selectedIndex].value)\'>
						<option value=\'0\'><lang:bb_select_size></option>
						<option value=\'1\'><lang:bb_size_small></option>
						<option value=\'7\'><lang:bb_size_large></option>
						<option value=\'14\'><lang:bb_size_largest></option>
					</select>
					<select name=\'COLOR\' style=\'width: 100px;\' onchange=\'fontColor(this.options[this.selectedIndex].value)\'>
						<option value=\'0\'><lang:bb_select_color></option>
						<option value=\'blue\' style=\'color:blue\'><lang:bb_color_blue></option>
						<option value=\'red\' style=\'color:red\'><lang:bb_color_red></option>
						<option value=\'purple\' style=\'color:purple\'><lang:bb_color_purple></option>
						<option value=\'orange\' style=\'color:orange\'><lang:bb_color_orange></option>
						<option value=\'yellow\' style=\'color:yellow\'><lang:bb_color_yellow></option>
						<option value=\'gray\' style=\'color:gray\'><lang:bb_color_gray></option>
						<option value=\'green\' style=\'color:green\'><lang:bb_color_green></option>
					</select>
				</td>
			</tr>
			<tr>
				<td align=\'left\'>
					<input type=\'button\' class=\'bbcode\' value=\' # \' onClick=\'codeBasic(this)\' name=\'code\' />
					<input type=\'button\' class=\'bbcode\' value=\' \"QUOTE\" \' onClick=\'codeBasic(this)\' name=\'quote\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' List \' onClick=\'codeList()\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' IMG \' onClick=\'codeBasic(this)\' name=\'img\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' @ \' onClick=\'codeBasic(this)\' name=\'email\' /> 
					<input type=\'button\' class=\'bbcode\' value=\' URL \' onClick=\'codeBasic(this)\' name=\'url\' /> 
				</td>
			</tr>
		</table>
		<p class=\"checkwrap\"><input type=\'radio\' class=\"check\" name=\'mode\' value=\'adv\' checked=\'checked\' /> <b><lang:bb_mode_advanced></b> <lang:bb_mode_advanced_tip>.</p>
		<p class=\"checkwrap\"><input type=\'radio\' class=\"check\" name=\'mode\' value=\'simple\'/> <b><lang:bb_mode_simple></b> <lang:bb_mode_simple_tip>.</p>
	</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"<conf:title>\"><conf:title></a> <macro:txt_bread_sep> <lang:notes_main_title>
</div>
<hr />
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>
</div>
<hr />
<div class=\"bar\">
	{\$pages}
</div>
<hr />
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"5\"><lang:note_your_notes> ( {\$filled}% <lang:note_full> )</td>
		</tr>
		<tr>
			<th align=\"left\" width=\"40%\" colspan=\"2\"><lang:note_col_title></td>
			<th align=\"center\" width=\"20%\"><lang:note_col_sender></td>
			<th align=\"center\" width=\"25%\"><lang:note_col_recieved></td>
			<th width=\"5%\">&nbsp;</td>
		</tr>
		{\$list}
	</table>
</div>
<hr />
<div class=\"bar\">
	{\$pages}
</div>
<hr />
<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>&nbsp;<a href=\"<sys:gate>?a=notes&amp;CODE=05\" title=\"\" onclick=\"javascript: return confirm(\'<lang:empty_inbox_confirm>?\');\"><macro:btn_delete_note></a>
</div>
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_row', '<tr>
	<td class=\"cellone {\$row_color}\" align=\"center\" width=\"1%\"><a href=\'<sys:gate>?a=notes&amp;CODE=06&amp;nid={\$row[\'notes_id\']}\'>{\$row[\'notes_marker\']}</a></td>
	<td class=\"cellone {\$row_color}\"><a href=\"<sys:gate>?a=notes&amp;CODE=01&amp;nid={\$row[\'notes_id\']}\">{\$row[\'notes_title\']}</a></td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><a href=\'<sys:gate>?getuser={\$row[\'notes_sender\']}\'><strong>{\$row[\'members_name\']}</strong></a></td>
	<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'notes_date\']}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><a href=\"<sys:gate>?a=notes&amp;CODE=04&amp;nid={\$row[\'notes_id\']}\" title=\"\" onclick=\"javascript: return confirm(\'<lang:read_delete_confirm>?\');\"><b><lang:read_delete_title></b></a></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_read', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=notes\" title=\"\"><lang:notes_inbox_title></a> / <lang:notes_read_crumb_title> {\$row[\'notes_title\']}
</div>
<div class=\"postbutton\">
	<a href=\'<sys:gate>?a=notes&amp;CODE=3&amp;nid={\$this->_id}&amp;send={\$row[\'members_name\']}\'><macro:btn_note_reply></a>&nbsp;<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>
</div>
<div class=\"postwrap\">
	<div class=\"postheader\"><span>{\$row[\'notes_title\']}</span></div>
	<div class=\"user\">
		<a name=\"{\$row[\'notes_id\']}\"></a>
		<p><a href=\"<sys:gate>?getuser={\$row[\'members_id\']}\" title=\"<lang:entry_link_profile>\"><strong>{\$row[\'members_name\']}</strong></a> <em>( <a href=\"<sys:gate>?a=search&CODE=02&mid={\$row[\'members_id\']}\" title=\"<lang:entry_post_find> {\$row[\'members_name\']}\">{\$row[\'members_posts\']}</a> )</em>
		<span><strong>&middot; <lang:posted_group></strong> {\$row[\'class_title\']}</span>
		<span><strong>&middot; <lang:entry_rank></strong> {\$row[\'members_pips\']}</span></p>
		{\$avatar}<div style=\"clear:both;\" /></div>
	</div>
	<div class=\"post\">
		<h5><strong><lang:sent_on> {\$row[\'notes_date\']}</strong><span><a href=\"<sys:gate>?a=notes&amp;CODE=04&amp;nid={\$row[\'notes_id\']}\" title=\"<lang:read_button_delete>\" onclick=\"javascript: return confirm(\'<lang:read_delete_confirm>\');\"><img src=\"<sys:skinPath>/post_delete.gif\" alt=\"<lang:read_delete_confirm>\" /></a></span></h5>
		<div class=\"post_content\">
			<p>{\$row[\'notes_body\']}</p>{\$sig}
		</div>
	</div>
	<div class=\"foot\">
		<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:read_link_top_title>.\"><lang:read_link_top></a></span>
		<ul class=\"extras\">{\$linkSpan}</ul>
	</div>
	<div class=\"postend\">&nbsp;</div>
</div>
<div class=\"postbutton\">
	<a href=\'<sys:gate>?a=notes&amp;CODE=3&amp;nid={\$this->_id}&amp;send={\$row[\'members_name\']}\'><macro:btn_note_reply></a>&nbsp;<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'note_none', '							<tr>
								<td class=\"cellone\" align=\"center\" colspan=\"5\"><strong><lang:no_notes></strong></td>
							</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'notes_send_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <a href=\"<sys:gate>?a=notes\" title=\"\"><lang:notes_main_title></a> <macro:txt_bread_sep> <lang:notes_new_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
	function check_length()
	{
		var limit  = <conf:max_post> * 1000;
		var length = document.REPLIER.body.value.length;

		if ( (length > limit) ) {
			alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
		} else {
			alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
		}
	}
	</script>
	<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
	<a name=\"qwiknote\"></a>
	<form method=\"POST\" action=\"<sys:gate>?a=notes&amp;CODE=02\" name=\"REPLIER\">
		<div class=\"formwrap\">
			<h3><lang:notes_send_title></h3>
			<p class=\"checkwrap\"><lang:form_send_tip></p>
			<h3><lang:post_field_recipient_title>:</h3>
			<h4><lang:post_field_recipient_tip> ( <a href=\'<sys:gate>?a=members\'><lang:post_field_recipient_link_search></a> )</h4>
			<input type=\'text\' name=\'recipient\' value=\'{\$to}\' tabindex=\'1\'  />
			<h3><lang:post_field_title>:</h3>
			<h4><lang:post_field_title_tip>.</h4>
			<input type=\'text\' name=\'title\' tabindex=\'2\' value=\"{\$title}\" />
			{\$bbcode}
			<h3><lang:post_emoticon_title></h3>
			<h4><lang:post_emoticon_tip></h4>
			{\$emoticons}
			<h3><lang:post_message_title></h3>
			<h4><lang:post_message_tip> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:post_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:post_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:post_link_length></a> )</h4>
			<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
			<h3><lang:post_options></h3>
			<h4><lang:post_options_tip>.</h4>
			<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_code></p>
			<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_emoticon></p>
			<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:post_button_send>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:post_button_reset>\" /></p>
			<input type=\'hidden\' name=\'redirect\' value=\'new\' />
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		</div>
	</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'notes', 'notes_reply_form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=notes\" title=\"\"><lang:notes_inbox_title></a> / <a href=\"<sys:gate>?a=notes&amp;CODE=01&amp;nid={\$this->_id}\" title=\"\">{\$bread_title}</a> / <lang:notes_reply_crumb_title>
</div>
{\$error_list}
<script language=\"javascript\">
function check_length()
{
	var limit  = <conf:max_post> * 1000;
	var length = document.REPLIER.body.value.length;

	if ( (length > limit) ) {
		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');
	} else {
		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);
	}

}
</script>
<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>
<a name=\"qwiknote\"></a>
<form method=\"POST\" action=\"<sys:gate>?a=notes&amp;CODE=02&amp;nid={\$this->_id}\" name=\"REPLIER\">
	<div class=\"formwrap\">
		<h3><lang:notes_reply_title> {\$note[\'notes_title\']}</h3>
		<h4><lang:form_send_tip></h4>
		<h3><lang:post_field_recipient_title>:</h3>
		<h4><lang:post_field_recipient_tip> ( <a href=\'<sys:gate>?a=members\'><lang:post_field_recipient_link_search></a> )</h4>
		<input type=\'text\' name=\'recipient\' value=\'{\$recipient}\' tabindex=\'1\' />
		<h3><lang:post_field_title>:</h3>
		<h4><lang:post_field_title_tip>.</h4>
		<input type=\'text\' name=\'title\' value=\"{\$note[\'notes_title\']} \"tabindex=\'2\' />
		{\$bbcode}
		<h3><lang:post_emoticon_title></h3>
		<h4><lang:post_emoticon_tip></h4>
		{\$emoticons}
		<h3><lang:post_message_title></h3>
		<h4><lang:post_message_tip> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:post_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:post_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:post_link_length></a> )</h4>
		<textarea name=\"body\" tabindex=\'3\'>{\$body}</textarea>
		<h3><lang:post_field_quote></h3>
		<h4><lang:post_field_quote_tip></h4>
		<textarea name=\"quote\" tabindex=\'3\'>{\$quote}</textarea>
		<h3><lang:post_options></h3>
		<h4><lang:post_options_tip>.</h4>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_code></p>
		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_emoticon></p>
		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:post_button_send>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:post_button_reset>\" /></p>
		<input type=\'hidden\' name=\"id\" value=\"{\$this->_id}\" />
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'misc', 'emoticon_row', '	<tr>
		<td class=\'celltwo\'>{\$code[\$i]}</td>
		<td class=\'celltwo\'>
			<a href=\'javascript:add_smilie(\"{\$code[\$i]}\")\'>{\$name[\$i]}</a>
		</td>
	</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'misc', 'emoticon_wrapper', '<script language=\'javascript\'>

	function add_smilie(text)
	{
		opener.document.REPLIER.body.value += \" \" + text + \" \";

	}

</script>
<table class=\"maintable\" cellpadding=\'6\' cellspacing=\'1\' width=\"95%\">
	<tr>
		<td class=\"header\" colspan=\"2\"><lang:emoticon_legend>:</td>
	</tr>
	<tr>
		<th class=\"cellone\" colspan=\'2\'>( <a href=\'javascript:this.close()\'><lang:close_window></a> )</th>
	</tr>
	{\$list}
	<tr>
		<td class=\"footer\" colspan=\"2\">&nbsp;</td>
	</tr>
</table>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mod', 'topic_editor', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb} / <a href=\"<sys:gate>?gettopic={\$this->_id}\" title=\"\">{\$topic[\'topics_title\']}</a> / <lang:mod_edit_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=mod&amp;CODE=03&amp;t={\$this->_id}\">
	<div class=\"formwrap\">
		<h3><lang:mod_form_title> {\$topic[\'topics_title\']}</h3>
		<h4><lang:mod_form_tip></h4>
		<h3><lang:mod_field_title></h3>
		<h4><lang:mod_field_title_tip></h4>
		<input type=\"text\" name=\"title\" value=\"{\$topic[\'topics_title\']}\" />
		<h3><lang:mod_field_subject></h3>
		<h4><lang:mod_field_subject></h4>
		<input type=\"text\" name=\"subject\" value=\"{\$topic[\'topics_subject\']}\" />
		<h3><lang:mod_field_views></h3>
		<h4><lang:mod_field_views_tip></h4>
		<input type=\"text\" name=\"views\" value=\"{\$topic[\'topics_views\']}\" />
		{\$mod_poll}
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" name=\"submit\" value=\"<lang:mod_edit_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:mod_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_table', '{\$buttons}
<hr />
<div class=\"bar\">
	<span>
		<a href=\"<sys:gate>?getforum={\$this->_forum}&amp;CODE=02\" title=\"<lang:forum_subscribe>\"><strong><lang:forum_subscribe></strong></a>
	</span>
	{\$pages}
</div>
<hr />
<div class=\"maintable\">
<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
	<tr>
		<td class=\"header\" colspan=\"5\">{\$forum_data[\'forum_name\']}</td>
	</tr>
	<tr>
		<th width=\"45%\" colspan=\"2\" align=\"left\"><lang:main_col_title></th>
		<th  align=\"center\" width=\"10%\"><lang:main_col_author></th>
		<th width=\"20%\"><lang:main_col_last_post></th>
		<th align=\"center\" width=\"25%\"><lang:topic_posts> / <lang:topic_views></th>
	</tr>
	{\$list}
</table>
</div>
<hr />
<div class=\"bar\">
	<span>
		<a href=\"<sys:gate>?getforum={\$this->_forum}&amp;CODE=01\" title=\"<lang:mark_read>\"><strong><lang:mark_read></strong></a>
	</span>
	{\$pages}
</div>
<hr />
{\$buttons}
<hr />
{\$post}
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'members', 'list_row', '<tr>
	<td class=\"cellone {\$row_color}\"><a href=\'<sys:gate>?getuser={\$row[\'members_id\']}\'>{\$row[\'class_prefix\']}{\$row[\'members_name\']}{\$row[\'class_suffix\']}</a></td>
	<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'members_posts\']}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'members_rank\']}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><strong>{\$row[\'class_title\']}</strong></td>
	<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'members_registered\']}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'members_homepage\']}</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><a href=\'<sys:gate>?a=notes&amp;CODE=07&amp;send={\$row[\'members_id\']}\'><macro:btn_mini_note></a></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'members', 'list_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:index_title>
</div>
<div class=\"bar\">{\$pages}</div>
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"8\"><lang:index_title>:</td>
		</tr>
		<tr>
			<th align=\"left\" width=\"15%\"><lang:member_name></th>
			<th align=\"center\" width=\"10%\"><lang:member_posts></th>
			<th align=\"center\" width=\"10%\"><lang:member_rank></th>
			<th align=\"center\" width=\"20%\"><lang:member_group></th>
			<th align=\"center\" width=\"25%\"><lang:member_joined></th>
			<th align=\"center\" width=\"10%\"><lang:member_page></th>
			<th align=\"center\" width=\"10%\"><lang:member_note></th>
		</tr>
		{\$list}
	</table>
</div>
<div class=\"bar\">{\$pages}</div>
<form method=\"post\" action=\"<sys:gate>?a=members\">
	<div class=\"formwrap\">
		<h3><lang:search_title></h3>
		<p class=\"sort\">
		<lang:search_get> 
		<select name=\'sGroup\'>
			<option value=\'all\'><lang:search_group></option>
			{\$sort_groups}
		</select> by 
		<select name=\'sField\'>
			{\$sort_type}
		</select> <lang:search_in>
		<select name=\'sOrder\'>
			{\$sort_order}
		</select> <lang:search_with>
		<select name=\'sResults\'>
			{\$sort_count}
		</select> <lang:search_per_page> 
		<input class=\"submit\" type=\"submit\" value=\"<lang:search_button>\" />
		</p>
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_row', '<tr>
	<td class=\"cellone {\$row_color}\" width=\"1%\"><a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\">{\$row[\'topics_marker\']}</a></td>
	<td class=\"cellone {\$row_color}\">
		{\$row[\'topics_prefix\']} 
		<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}\" title=\"{\$row[\'topics_title\']}\">{\$row[\'topics_title\']}</a> {\$inlineNav}<br />
		<span class=\"subject\">{\$row[\'topics_subject\']}</span>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><strong>{\$row[\'topics_author\']}</strong></td>
	<td class=\"cellone {\$row_color}\">
		<span class=\"lastpost\">{\$row[\'topics_last\']}</span><br />
		<a href=\"<sys:gate>?gettopic={\$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><lang:topic_last_replied></a> <strong>{\$row[\'topics_poster\']}</strong>
	</td>
	<td class=\"cellone {\$row_color}\" align=\"center\"><h2>{\$row[\'topics_posts\']} / {\$row[\'topics_views\']}</h2></td>
</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'active_users', '<div class=\"infowrap\">
	<h1><lang:active_user_title> </h1>
	<h2><lang:active_user_summary> (<a href=\"<sys:gate>?a=active\" title=\"<lang:active_link_details>\"><lang:active_link_details></a>)</h2>
	<p>{\$list}</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'container_main', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {\$bread_crumb}
</div>
{\$child_forums}
{\$topics}
<div class=\"formwrap\">
	{\$jump}
	<form method=\"post\" action=\"<sys:gate>?a=search&amp;CODE=01\">
		<input type=\"text\" class=\"small_text\" name=\"keywords\" />&nbsp;<input class=\"submit\" type=\"submit\" value=\"<lang:search_forums>\" />
		<input type=\"hidden\" name=\"forum\" value=\"{\$this->_forum}\" />
	</form>
</div>
{\$active}
{\$board_stats}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'main_buttons', '<div class=\"postbutton\">
	<a href=\"<sys:gate>?a=post&CODE=03&amp;forum={\$this->_forum}\" title=\"<lang:button_new_topic>\"><macro:btn_main_new></a>&nbsp;<a href=\"#qwik\" title=\"<lang:button_new_qwik>\" onclick=\"javascript:return toggleBox(\'qwikform\');\"><macro:btn_main_qtopic></a>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'main', 'statistics', '<div class=\"infowrap\">
	<h1><lang:stat_title>:</h1>
	<h2><lang:stat_tip></h2>
	<p><lang:stat_totals><br />
	<lang:stat_newest><br />
	<lang:stat_online></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'topics', 'topic_bit', '<div id=\"qwikform\" style=\"display: none;\">
	<script language=\"javascript\">
	function check_length()
	{

		var limit = {\$length};

		var length = document.REPLIER.body.value.length;

		if ( (length > limit) ) {

			alert(\'Your message is too long ( \' + length + \' chars ), please shorten it to less than \' + limit + \' characters.\');

		} else {

			alert(\'You are currently using \' + length + \' characters. Maximum allowable amount should not exceed \' + limit);

		}

	}
	</script>
	<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>
	<form method=\"POST\" action=\"<sys:gate>?a=post&amp;CODE=00\" name=\"REPLIER\">
		<a name=\"qwik\"></a>
		<div class=\"formwrap\">
			<h3><lang:qwik_title></h3>
			<p class=\"checkwrap\"><lang:qwik_form_tip></p>
			<h3><lang:qwik_form_field_title></h3>
			<h4><lang:qwik_form_field_title_field></h4>
			<input type=\"text\" name=\"title\" />
			<h3><lang:qwik_form_field_body></h3>
			<h4><lang:qwik_form_field_body_tip> ( <a href=\"javascript:smilie_window(\'<sys:gate>\')\" title=\"View emoticon choices\"><lang:qwik_form_link_emoticons></a> &middot; <a href=\"javascript:check_length()\" title=\"Check the length of your topic\"><lang:qwik_form_link_length></a> )</h4>
			<textarea name=\"body\" rows=\"\" cols=\"\"></textarea>
			<p class=\"submit\">
				<input class=\"button\" type=\"submit\" value=\"<lang:qwik_form_button_post>\" />&nbsp;
				<input class=\"reset\" type=\"reset\" value=\"<lang:qwik_form_button_reset>\" />
			</p>
			<input type=\"hidden\" name=\"cOption\" value=\"1\" />
			<input type=\"hidden\" name=\"eOption\" value=\"1\" />
			<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
			<input type=\"hidden\" name=\"subject\" value=\"\" />
			<input type=\"hidden\" name=\"forum\" value=\"{\$this->_forum}\" />
		</div>
	</form>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'logon', 'form_pass_retrieve_1', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:form_retrieve_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=04\">
	<div class=\"formwrap\">
		<h3><lang:form_retrieve_title></h3>
		<p class=\"checkwrap\"><lang:form_retrieve_tip></p>
		<h3><lang:form_retrieve_field_email></h3>
		<h4><lang:form_retrieve_field_email_tip></h4>
		<input type=\'text\' name=\'email\' tabindex=\'1\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:form_retrieve_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_retrieve_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_note_notify', 'Hello, {\$row[\'members_name\']}

<user:members_name>, from <conf:title> ( <conf:site_link> ), has just sent you a new personal note.
If you wish to read it, click the link below to go straight to your notes index:	

<conf:site_link><sys:gate>?a=notes

If you do not wish to recieve notifications any longer be sure to turn this feature off within your
personal control panel which can be found through the link above.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_subscribe_topic_notice', 'Hello {\$row[\'members_name\']},

{\$row[\'topics_last_poster_name\']}, from <conf:title> ( <conf:site_link> ), has just posted a reply
to a topic you have subscribed to. You may follow the link below to read this post:

<conf:site_link><sys:gate>?gettopic={\$this->_id}&p={\$page}#{\$post}

If you do not wish to recieve subscription notices any longer you may turn this feature 
off within your personal control panel. To do this you may access your UCP through the 
above link.');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'help', 'title_row', '<li><a href=\"#{\$count}\" title=\"{\$row[\'help_title\']}\">{\$row[\'help_title\']}</a></li>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'logon', 'form', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:form_logon_title>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:form_logon_title></h3>
		<p class=\"checkwrap\"><lang:form_logon_tip></p>
		<h3><lang:sys_err_option_title></h3>
		<ul>
			<li><a href=\"<sys:gate>?a=register\" title=\"\"><lang:sys_err_option_reg></a></li>
			<li><a href=\"<sys:gate>?a=logon&amp;CODE=03\" title=\"\"><lang:sys_err_option_rec></a></li>
		</ul>
		<h3><lang:form_logon_field_username></h3>
		<h4><lang:form_logon_field_username_tip></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:form_logon_field_password></h3>
		<h4><lang:form_logon_field_password_tip></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:form_logon_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_logon_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'help', 'container_help', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:help_crumb_title>
</div>
<div class=\"infowrap\">
    <h1><lang:help_title></h1>
    <h2><lang:help_tip></h2>
    <ul>
        {\$titles}
    </ul>
</div>
{\$entries}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'help', 'content_row', '<div class=\"infowrap\">
	<a name=\"{\$count}\"></a>
	<h3>{\$count}. {\$row[\'help_title\']}</h3>
	<p>{\$row[\'help_content\']}</p>
	<p class=\"top\"><a href=\"javascript:scroll(0,0);\" title=\"<lang:link_top_title>\"><lang:link_top></a></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_footer', '
----------------------------------------------------------------
<lang:mailer_footer> MyTopix | Personal Message Board {\$this->config[\'version\']}.  http://www.jaia-interactive.com');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_wrapper', '			<div id=\"wrap\">
				<h1 id=\"logo\"><a href=\"<sys:gate>?a=main\" title=\"<lang:logo_alt>\">MyTopix</a></h1>
				<ul id=\"top_nav\">
					<li><a href=\"<conf:site_link><sys:gate>?a=members\" title=\"\"><lang:uni_tab_members></a></li>
					<li><a href=\"<conf:site_link><sys:gate>?a=search\" title=\"\"><lang:uni_tab_search></a></li>
					<li><a href=\"<conf:site_link><sys:gate>?a=calendar\" title=\"\"><lang:uni_tab_calendar></a></li>
				</ul>
				{\$this->welcome}
				{\$content}
				<p id=\"copyright\">Powered By: <strong>MyTopix <conf:version></strong><br />Copyright &copy;2004 - 2007,  <a href=\"http://www.jaia-interactive.com/\" title=\"<lang:visit_jaia>\">Jaia Interactive</a> all rights reserved.</p>
			</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_header', '{\$who} <lang:mailer_header> {\$sent}:
----------------------------------------------------------------

');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_member', '<div class=\"welcome\">
	<p class=\"shaft\"><a href=\"<sys:gate>?a=ucp\" title=\"<lang:welcome_control_title>\"><strong><lang:welcome_profile></strong></a> &middot; <a href=\"<sys:gate>?a=search&amp;CODE=03\" title=\"<lang:welcome_latest_title>\"><lang:welcome_latest></a> &middot; <a href=\"<sys:gate>?a=notes\" title=\"<lang:welcome_inbox_title>\"><lang:welcome_messages>{\$note_count}</a></p>
	<p><lang:welcome_back>, <a href=\"<sys:gate>?getuser=<user:members_id>\" title=\"<lang:welcome_profile_title>\"><strong><user:members_name></strong></a>! (<a href=\"<sys:gate>?a=logon&CODE=02\" title=\"<lang:welcome_logout_title>\"><lang:welcome_logout></a>)</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_disabled', '<div class=\"welcome\">
        <p class=\"shaft\">&nbsp;</p>
	<p><lang:welcome_disabled></p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_guest', '<div class=\"welcome\">
	<p class=\"shaft\"><a href=\"<sys:gate>?a=register&amp;CODE=03\" title=\"\"><lang:welcome_resend_validation></a></p>
	<p><lang:welcome_guest>, <user:members_name>! (<a href=\"<sys:gate>?a=register\" title=\"\"><lang:welcome_register></a> &middot; <a href=\"<sys:gate>?a=logon\" title=\"\"><lang:welcome_logon></a>)</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_message_level_1', '<div id=\"messenger\">
	<h2><span><a href=\"{\$link}\" title=\"<lang:messenger_forward>\"><lang:messenger_forward></a></span><lang:messenger_title>:</h2>
	<p>{\$message}</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_welcome_admin', '<div class=\"welcome\">
	<p class=\"shaft\"><a href=\"<sys:gate>?a=ucp\" title=\"<lang:welcome_control_title>\"><strong><lang:welcome_profile></strong></a> &middot; <a href=\"<sys:gate>?a=search&amp;CODE=03\" title=\"<lang:welcome_latest_title>\"><lang:welcome_latest></a> &middot; <a href=\"<sys:gate>?a=notes\" title=\"<lang:welcome_inbox_title>\"><lang:welcome_messages>{\$note_count}</a> &middot; <a href=\"<conf:site_link>admin/\" title=\"<lang:welcome_admin_title>\"><lang:welcome_link_admin></a></p>
	<p><lang:welcome_back>, <a href=\"<sys:gate>?getuser=<user:members_id>\" title=\"<lang:welcome_profile_title>\"><strong><user:members_name></strong></a>! (<a href=\"<sys:gate>?a=logon&CODE=02\" title=\"<lang:welcome_logout_title>\"><lang:welcome_logout></a>)</p>
</div>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_body', '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<!-- Powered By: <conf:application> <conf:version> -->
<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en\" xml:lang=\"en\"  dir=\"<lang:text_direction>\">
	<head>
		<title><conf:forum_title> - <lang:powered_by> <conf:application></title>
		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
		<meta name=\"generator\" content=\"editplus\" />
		<meta name=\"author\" content=\"Daniel Wilhelm II Murdoch, wilhelm@jaia-interactive.com, http://www.jaia-interactive.com\" />
		<meta name=\"keywords\" content=\"<conf:application> <conf:version>\" />
		<meta name=\"description\" content=\"\" />
		<script src=\"<sys:skinPath>/js/main.js\" type=\"text/javascript\"></script>
		<link href=\"<sys:skinPath>/styles.css\" rel=\"stylesheet\" type=\"text/css\" title=\"default\" />
	</head>
	<body>
	{\$content}
	</body>
</html>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_board_closed', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a>
</div>
<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:global_board_closed></h3>
		<div id=\"warning\">
			<h3><lang:err_warn_title></h3>
			<p><strong><conf:closed_message></strong></p>
		</div>
		<h3><lang:closed_form_name_title></h3>
		<h4><lang:closed_form_name_title_info></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:closed_form_pass_title></h3>
		<h4><lang:closed_form_pass_title_info></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:closed_form_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:closed_form_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'active', 'active_table', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"<conf:title>\"><conf:title></a> / <lang:location_active>
</div>
<hr />
<div class=\"bar\">{\$pages}</div>
<hr />
<div class=\"maintable\">
	<table cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
		<tr>
			<td class=\"header\" colspan=\"4\"><lang:active_title></td>
		</tr>
		<tr>
			<th align=\"left\" width=\"15%\"><lang:col_name></td>
			<th align=\"left\" width=\"25%\"><lang:col_location></td>
			<th align=\"center\" width=\"25%\"><lang:col_last_seen></td>
			<th align=\"center\" width=\"10%\"><lang:col_note></td>
		</tr>
		{\$list}
	</table>
</div>
<hr />
<div class=\"bar\">{\$pages}</div>
<hr />');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'active', 'active_row', '		<tr>
			<td class=\"cellone {\$row_color}\" align=\"left\">{\$row[\'active_user\']} {\$row[\'active_ip\']}</td>
			<td class=\"cellone {\$row_color}\" align=\"left\">{\$row[\'active_location\']}</td>
			<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'active_time\']}</td>
			<td class=\"cellone {\$row_color}\" align=\"center\">{\$row[\'active_notes\']}</td>
		</tr>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_message_level_2', '<div id=\"crumb_nav\">
	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <lang:sys_bread_title>
</div>
<div class=\"formwrap\">
	<h3><lang:sys_err_title></h3>
	<h4><lang:sys_err_desc></h4>
	<div id=\"warning\">
		<h3><lang:err_warn_title></h3>
		<p><strong>{\$message}</strong></p>
	</div>
	<h3><lang:sys_err_option_title></h3>
	<ul>
		<li><a href=\"<sys:gate>?a=register\" title=\"\"><lang:sys_err_option_reg></a></li>
		<li><a href=\"<sys:gate>?a=logon&amp;CODE=03\" title=\"\"><lang:sys_err_option_rec></a></li>
	</ul>
</div>
{\$logon_form}');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'global', 'global_message_level_2_logon', '<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">
	<div class=\"formwrap\">
		<h3><lang:sys_log_name_title></h3>
		<h4><lang:sys_log_name_desc></h4>
		<input type=\'text\' name=\'username\' tabindex=\'1\' />
		<h3><lang:sys_log_pass_title></h3>
		<h4><lang:sys_log_pass_desc></h4>
		<input type=\'password\' name=\'password\' tabindex=\'2\' />
		<p class=\"submit\">
			<input class=\"button\" type=\"submit\" value=\"<lang:form_logon_button_submit>\" />&nbsp;
			<input class=\"reset\" type=\"reset\" value=\"<lang:form_logon_button_reset>\" />
		</p>
		<input type=\"hidden\" name=\"hash\" value=\"{\$hash}\" />
		<input type=\"hidden\" name=\"referer\" value=\"{\$referer}\" />
	</div>
</form>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'register', 'form_coppa_field', '		<p class=\"checkwarn\"><input class=\"check\" type=\"checkbox\" name=\"coppa\" {\$coppa} /> <strong><lang:field_coppa_agree></strong></p>');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'mailer', 'mail_admin_user_name', 'Hello, {\$member[\'members_name\']}

This message is to inform you that your user name for <conf:title> ( <conf:site_link> )
has been modified. Below you will find your new user name:

Username: {\$name}

Log into your account through the link below:
<conf:site_link><sys:gate>?a=logon');";
$temps[] = "INSERT INTO " . DB_PREFIX . "templates VALUES ({$dir}, 'post', 'form_field_attach', '		<h3><lang:attach_title></h3>
		<h4>{\$size_lang}</h4>
		<p class=\"checkwrap\"><input type=\"file\" name=\"upload\" /></p>');";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'wtf.gif', ':wtf:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'wink.gif', ';)', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'huh.gif', ':huh:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'up.gif', ':up:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'tongue.gif', ':P', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'stare.gif', ':|', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'squint.gif', '>_<', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'smile.gif', ':)', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'sick.gif', ':sick:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'shock.gif', ':o', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'shame.gif', ':shame:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'scared.gif', ':scared:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'sad.gif', ':(', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'rolleyes.gif', ':rolleyes:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'right.gif', ':right:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'rage.gif', ':rage:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'point.gif', ':point:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'nerd.gif', ':nerd:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'lup.gif', ':lup:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'left.gif', ':left:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'ldown.gif', ':ldown:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'laugh.gif', ':laugh:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'joy.gif', ':joy:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'angry.gif', ':angry:', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'happy.gif', ':happy:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'grin.gif', ':D', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'glare.gif', ':glare:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'evil.gif', ':evil:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'down.gif', ':down:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'dead.gif', ':dead:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'crazy.gif', ':crazy:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'cool.gif', ':cool:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'booyah.gif', ':booyah:', 1);";
$emots[] = "INSERT INTO " . DB_PREFIX . "emoticons VALUES (null, {$dir}, 'blank.gif', ':blank:', 1);";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Newcomer', 0, 1, 'pip_blue.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Common Folk', 25, 3, 'pip_poop.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'MyTopix™ Enthusiast', 100, 4, 'pip_purple.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Needs a Life', 500, 6, 'pip_red.gif', {$dir});";
$titles[] = "INSERT INTO " . DB_PREFIX . "titles VALUES (null, 'Post Meister', 1000, 8, 'pip_green.gif', {$dir});";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_announce_old', '<img src=\"{%SKIN%}/post_announce_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'txt_online_sep', ',&nbsp;', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_announce_new', '<img src=\"{%SKIN%}/post_announce_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'txt_bread_sep', '/', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_email', '<img src=\"{%SKIN%}/btn_email.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_go', '<input type=\"image\" src=\"{%SKIN%}/btn_go.gif\" width=\"23px\" height=\"23px\" class=\"small_button\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_prefix', '<img src=\"{%SKIN%}/topic_prefix.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_note_reply', '<img src=\"{%SKIN%}/reply_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_online', '<img src=\"{%SKIN%}/btn_online.gif\" alt=\"\" title=\"\" />&nbsp;', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_pin_old', '<img src=\"{%SKIN%}/post_pinned_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_pin_new', '<img src=\"{%SKIN%}/post_pinned_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_offline', '<img src=\"{%SKIN%}/btn_offline.gif\" alt=\"\" title=\"\" />&nbsp;', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_new_dot', '<img src=\"{%SKIN%}/post_open_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_old_dot', '<img src=\"{%SKIN%}/post_open_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_old', '<img src=\"{%SKIN%}/post_open_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_open_new', '<img src=\"{%SKIN%}/post_open_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_moved', '<img src=\"{%SKIN%}/post_moved.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_old', '<img src=\"{%SKIN%}/post_locked_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_old_dot', '<img src=\"{%SKIN%}/post_locked_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_new_dot', '<img src=\"{%SKIN%}/post_locked_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_locked_new', '<img src=\"{%SKIN%}/post_locked_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_old_dot', '<img src=\"{%SKIN%}/post_hot_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_old', '<img src=\"{%SKIN%}/post_hot_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_new_dot', '<img src=\"{%SKIN%}/post_hot_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_hot_new', '<img src=\"{%SKIN%}/post_hot_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_post_quote', '<img src=\"{%SKIN%}/post_quote.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_post_edit', '<img src=\"{%SKIN%}/post_edit.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_post_delete', '<img src=\"{%SKIN%}/post_delete.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_mini_pages', '<img src=\"{%SKIN%}/pages.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_note_unread', '<img src=\"{%SKIN%}/note_unread.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_note_read', '<img src=\"{%SKIN%}/note_read.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_mini_box', '<img src=\"{%SKIN%}/mini_box.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_reply', '<img src=\"{%SKIN%}/main_reply.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_qtopic', '<img src=\"{%SKIN%}/main_qtopic.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_qreply', '<img src=\"{%SKIN%}/main_qreply.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_new', '<img src=\"{%SKIN%}/main_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_locked', '<img src=\"{%SKIN%}/main_locked.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_delete_note', '<img src=\"{%SKIN%}/delete_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_subs_old', '<img src=\"{%SKIN%}/cat_subs_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_subs_new', '<img src=\"{%SKIN%}/cat_subs_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_redirect', '<img src=\"{%SKIN%}/cat_red.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_old', '<img src=\"{%SKIN%}/cat_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_new', '<img src=\"{%SKIN%}/cat_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'cat_archived', '<img src=\"{%SKIN%}/cat_archived.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_yim', '<img src=\"{%SKIN%}/btn_yim.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_profile', '<img src=\"{%SKIN%}/btn_profile.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_note', '<img src=\"{%SKIN%}/btn_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_msn', '<img src=\"{%SKIN%}/btn_msn.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_icq', '<img src=\"{%SKIN%}/btn_icq.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_homepage', '<img src=\"{%SKIN%}/btn_homepage.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_mini_aim', '<img src=\"{%SKIN%}/btn_aim.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_go', '<img src=\"{%SKIN%}/btn_go.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_new', '<img src=\"{%SKIN%}/post_poll_new.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_new_dot', '<img src=\"{%SKIN%}/post_poll_new_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_old_dot', '<img src=\"{%SKIN%}/post_poll_old_dot.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'icon_poll_old', '<img src=\"{%SKIN%}/post_poll_old.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_note_send', '<img src=\"{%SKIN%}/send_note.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_add_event', '<img src=\"{%SKIN%}/main_event.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'btn_main_poll', '<img src=\"{%SKIN%}/main_poll.gif\" alt=\"\" title=\"\" />', 0);";
$emots[] = "INSERT INTO " . DB_PREFIX . "macros VALUES (null, {$dir}, 'img_clip', '&nbsp;<img src=\"{%SKIN%}/topic_attach_prefix.gif\" alt=\"\" title=\"\" />', 0);";
?>