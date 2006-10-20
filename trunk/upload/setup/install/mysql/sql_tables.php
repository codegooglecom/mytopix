<?php

if(false == defined('INSTALLER'))
{
    die('<b>ERROR:</b> You may not access this file directly!');
}

setup_log('... Creating active user table');

$query[] = "DROP TABLE IF EXISTS " . DB_PREFIX . "active";
$query[] = "DROP TABLE IF EXISTS " . DB_PREFIX . "cache";
$query[] = "DROP TABLE IF EXISTS " . DB_PREFIX . "class";
$query[] = "DROP TABLE IF EXISTS " . DB_PREFIX . "emails";
$query[] = "DROP TABLE IF EXISTS " . DB_PREFIX . "emoticons";
$query[] = "DROP TABLE IF EXISTS " . DB_PREFIX . "events";
$query[] = "DROP TABLE IF EXISTS " . DB_PREFIX . "filter";
$query[] = "DROP TABLE IF EXISTS " . DB_PREFIX . "forums";
$query[] = "DROP TABLE IF EXISTS " . DB_PREFIX . "help";
$query[] = "DROP TABLE IF EXISTS " . DB_PREFIX . "macros";
$query[] = "DROP TABLE IF EXISTS " . DB_PREFIX . "members";
$query[] = "DROP TABLE IF EXISTS " . DB_PREFIX . "moderators";
$query[] = "DROP TABLE IF EXISTS " . DB_PREFIX . "notes";
$query[] = "DROP TABLE IF EXISTS " . DB_PREFIX . "polls";
$query[] = "DROP TABLE IF EXISTS " . DB_PREFIX . "posts";
$query[] = "DROP TABLE IF EXISTS " . DB_PREFIX . "skins";
$query[] = "DROP TABLE IF EXISTS " . DB_PREFIX . "templates";
$query[] = "DROP TABLE IF EXISTS " . DB_PREFIX . "titles";
$query[] = "DROP TABLE IF EXISTS " . DB_PREFIX . "topics";
$query[] = "DROP TABLE IF EXISTS " . DB_PREFIX . "tracker";
$query[] = "DROP TABLE IF EXISTS " . DB_PREFIX . "uploads";
$query[] = "DROP TABLE IF EXISTS " . DB_PREFIX . "vkeys";
$query[] = "DROP TABLE IF EXISTS " . DB_PREFIX . "voters";

$query[] = "CREATE TABLE " . DB_PREFIX . "active (
  active_id varchar(32) NOT NULL default '',
  active_ip varchar(15) NOT NULL default '',
  active_user int(10) unsigned NOT NULL default '1',
  active_user_name varchar(100) NOT NULL default '',
  active_location varchar(20) default NULL,
  active_forum int(10) unsigned default NULL,
  active_topic int(10) unsigned default NULL,
  active_time int(10) unsigned default NULL,
  active_is_bot tinyint(1) unsigned NOT NULL default '0',
  active_agent varchar(128) NOT NULL default '',
  PRIMARY KEY  (active_id),
  UNIQUE KEY active_ip (active_ip)
) TYPE=MyISAM;";

setup_log('... Creating system cache table');

$query[] = "CREATE TABLE " . DB_PREFIX . "cache (
  cache_title varchar(250) NOT NULL default '0',
  cache_value mediumtext NOT NULL,
  cache_date int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (cache_title)
) TYPE=MyISAM;";

setup_log('... Creating user group table');

$query[] = "CREATE TABLE " . DB_PREFIX . "class (
  class_id int(10) unsigned NOT NULL auto_increment,
  class_title varchar(250) NOT NULL default '',
  class_system varchar(15) NOT NULL default 'MEMBER',
  class_prefix varchar(250) default NULL,
  class_suffix varchar(250) default NULL,
  class_upload_max int(10) unsigned NOT NULL default '0',
  class_canPost int(1) unsigned NOT NULL default '1',
  class_canSearch int(1) unsigned NOT NULL default '1',
  class_canSeeStats int(1) unsigned NOT NULL default '1',
  class_canViewHelp int(1) unsigned NOT NULL default '1',
  class_canViewMembers int(1) unsigned NOT NULL default '1',
  class_canUseNotes int(1) unsigned NOT NULL default '1',
  class_canSendNotes int(1) unsigned NOT NULL default '1',
  class_canGetNotes int(1) unsigned NOT NULL default '1',
  class_canDeleteOwnPosts int(1) unsigned NOT NULL default '0',
  class_canStartTopics int(1) unsigned NOT NULL default '1',
  class_canEditOwnPosts int(1) unsigned NOT NULL default '1',
  class_canReadTopics int(1) unsigned NOT NULL default '1',
  class_canEditProfile int(1) unsigned NOT NULL default '1',
  class_canViewProfiles int(1) unsigned NOT NULL default '1',
  class_canPostLocked int(1) unsigned NOT NULL default '0',
  class_canSeeActive int(1) unsigned NOT NULL default '1',
  class_sigLength int(10) unsigned default '350',
  class_canSeeHidden int(1) unsigned default '0',
  class_canPostHidden int(1) unsigned default '0',
  class_canSendEmail int(1) unsigned NOT NULL default '0',
  class_floodDelay int(10) unsigned default '30',
  class_maxNotes int(10) unsigned default '30',
  class_change_pass int(1) unsigned NOT NULL default '1',
  class_change_email int(1) unsigned NOT NULL default '1',
  class_see_hidden_skins int(1) unsigned default '0',
  class_canSubscribe int(1) unsigned NOT NULL default '1',
  class_canViewClosedBoard int(1) unsigned NOT NULL default '0',
  class_hidden tinyint(1) unsigned NOT NULL default '0',
  class_upload_avatars tinyint(1) unsigned NOT NULL default '1',
  class_use_avatars tinyint(1) unsigned NOT NULL default '1',
  class_can_post_events tinyint(1) unsigned NOT NULL default '0',
  class_can_start_polls tinyint(1) unsigned NOT NULL default '1',
  class_can_vote_polls tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (class_id),
  UNIQUE KEY name (class_title,class_system)
) TYPE=MyISAM;";

setup_log('... Creating email log table');

$query[] = "CREATE TABLE " . DB_PREFIX . "emails (
  email_id int(10) unsigned NOT NULL auto_increment,
  email_to int(10) unsigned NOT NULL default '0',
  email_from int(10) unsigned NOT NULL default '0',
  email_subject varchar(250) NOT NULL default '',
  email_body mediumtext NOT NULL,
  email_date int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (email_id),
  KEY email_id (email_id)
) TYPE=MyISAM;";

setup_log('... Creating emoticon table');

$query[] = "CREATE TABLE " . DB_PREFIX . "emoticons (
  emo_id int(10) unsigned NOT NULL auto_increment,
  emo_skin int(10) unsigned NOT NULL default '0',
  emo_name varchar(50) NOT NULL default '',
  emo_code varchar(50) NOT NULL default '',
  emo_click int(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (emo_id),
  KEY emo_skin (emo_skin)
) TYPE=MyISAM;";

setup_log('... Creating community calendar events table');

$query[] = "CREATE TABLE " . DB_PREFIX . "events (
  event_id int(10) unsigned NOT NULL auto_increment,
  event_user int(10) unsigned NOT NULL default '0',
  event_title varchar(250) NOT NULL default '0',
  event_body mediumtext NOT NULL,
  event_emoticons tinyint(1) unsigned NOT NULL default '1',
  event_code tinyint(1) unsigned NOT NULL default '1',
  event_start_day tinyint(2) unsigned NOT NULL default '0',
  event_start_month tinyint(2) unsigned NOT NULL default '0',
  event_start_year int(4) unsigned NOT NULL default '0',
  event_start_stamp int(10) unsigned NOT NULL default '0',
  event_end_day tinyint(2) unsigned NOT NULL default '0',
  event_end_month tinyint(2) unsigned NOT NULL default '0',
  event_end_year int(4) unsigned NOT NULL default '0',
  event_end_stamp int(10) unsigned NOT NULL default '0',
  event_groups varchar(250) NOT NULL default '0',
  event_loop tinyint(1) unsigned NOT NULL default '0',
  event_loop_type char(1) NOT NULL default 'w',
  PRIMARY KEY  (event_id),
  KEY event_user (event_user)
) TYPE=MyISAM;";

setup_log('... Creating word filter table');

$query[] = "CREATE TABLE " . DB_PREFIX . "filter (
  replace_id int(10) unsigned NOT NULL auto_increment,
  replace_search mediumtext NOT NULL,
  replace_replace mediumtext NOT NULL,
  replace_match int(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (replace_id)
) TYPE=MyISAM;";

setup_log('... Creating forum table table');

$query[] = "CREATE TABLE " . DB_PREFIX . "forums (
  forum_id int(10) unsigned NOT NULL auto_increment,
  forum_parent int(10) unsigned NOT NULL default '0',
  forum_name varchar(250) NOT NULL default '',
  forum_description mediumtext NOT NULL,
  forum_closed tinyint(1) unsigned NOT NULL default '0',
  forum_red_url varchar(250) NOT NULL default '',
  forum_red_on tinyint(1) unsigned NOT NULL default '0',
  forum_red_clicks int(10) unsigned NOT NULL default '0',
  forum_access_matrix mediumtext NOT NULL,
  forum_topics int(10) unsigned NOT NULL default '0',
  forum_posts int(10) unsigned NOT NULL default '0',
  forum_last_post_id int(10) unsigned NOT NULL default '0',
  forum_last_post_time int(10) unsigned NOT NULL default '0',
  forum_last_post_user_name varchar(250) NOT NULL default '',
  forum_last_post_user_id int(11) NOT NULL default '0',
  forum_last_post_title varchar(250) NOT NULL default '',
  forum_position int(10) unsigned NOT NULL default '0',
  forum_allow_content tinyint(1) unsigned NOT NULL default '1',
  forum_enable_post_counts tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (forum_id),
  KEY forum_parent (forum_parent)
) TYPE=MyISAM;";

setup_log('... Creating system documentation (help) table');

$query[] = "CREATE TABLE " . DB_PREFIX . "help (
  help_id int(10) unsigned NOT NULL auto_increment,
  help_title varchar(250) NOT NULL default '',
  help_content text NOT NULL,
  help_position int(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (help_id)
) TYPE=MyISAM;";

setup_log('... Creating skin macros table');

$query[] = "CREATE TABLE " . DB_PREFIX . "macros (
  macro_id int(10) unsigned NOT NULL auto_increment,
  macro_skin int(10) unsigned NOT NULL default '0',
  macro_title varchar(200) default '0',
  macro_body mediumtext NOT NULL,
  macro_remove tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (macro_id),
  KEY macro_skin (macro_skin)
) TYPE=MyISAM;";

setup_log('... Creating member account table');

$query[] = "CREATE TABLE " . DB_PREFIX . "members (
  members_id int(10) unsigned NOT NULL auto_increment,
  members_name varchar(250) NOT NULL default '',
  members_pass varchar(32) NOT NULL default '',
  members_pass_auto varchar(32) NOT NULL default '',
  members_pass_salt varchar(5) NOT NULL default '',
  members_class int(10) NOT NULL default '2',
  members_email varchar(150) NOT NULL default '',
  members_ip varchar(15) NOT NULL default '',
  members_homepage varchar(150) NOT NULL default '',
  members_registered int(10) unsigned NOT NULL default '0',
  members_lastaction int(10) unsigned NOT NULL default '0',
  members_lastvisit int(10) unsigned NOT NULL default '0',
  members_posts int(10) unsigned NOT NULL default '0',
  members_is_admin int(1) unsigned NOT NULL default '0',
  members_is_super_mod int(1) unsigned NOT NULL default '0',
  members_is_banned int(1) unsigned NOT NULL default '0',
  members_show_email int(10) unsigned default '0',
  members_timeZone varchar(4) NOT NULL default '0',
  members_location varchar(250) NOT NULL default '',
  members_aim varchar(250) NOT NULL default '',
  members_icq varchar(250) NOT NULL default '',
  members_yim varchar(250) NOT NULL default '',
  members_msn varchar(250) NOT NULL default '',
  members_sig mediumtext NOT NULL,
  members_noteNotify int(1) unsigned default '1',
  members_language varchar(50) NOT NULL default 'english',
  members_skin int(10) unsigned NOT NULL default '1',
  members_newNotes int(1) unsigned NOT NULL default '0',
  members_see_avatars tinyint(1) unsigned NOT NULL default '1',
  members_see_sigs tinyint(1) unsigned NOT NULL default '1',
  members_avatar_location varchar(250) NOT NULL default '',
  members_avatar_dims varchar(15) NOT NULL default '',
  members_avatar_type tinyint(1) unsigned NOT NULL default '1',
  members_birth_day tinyint(2) unsigned NOT NULL default '0',
  members_birth_month tinyint(2) unsigned NOT NULL default '0',
  members_birth_year int(4) unsigned NOT NULL default '0',
  members_coppa tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (members_id)
) TYPE=MyISAM;";

setup_log('... Creating forum moderators table');

$query[] = "CREATE TABLE " . DB_PREFIX . "moderators (
  mod_id int(10) unsigned NOT NULL auto_increment,
  mod_forum int(10) unsigned NOT NULL default '0',
  mod_user_id int(10) unsigned NOT NULL default '0',
  mod_group int(10) unsigned NOT NULL default '0',
  mod_user_name varchar(100) NOT NULL default '',
  mod_edit_topics tinyint(1) unsigned NOT NULL default '1',
  mod_edit_other_posts tinyint(1) unsigned NOT NULL default '0',
  mod_delete_other_posts tinyint(1) unsigned NOT NULL default '0',
  mod_delete_other_topics tinyint(1) unsigned NOT NULL default '0',
  mod_move_topics tinyint(1) unsigned NOT NULL default '0',
  mod_lock_topics tinyint(1) unsigned NOT NULL default '0',
  mod_pin_topics tinyint(1) unsigned NOT NULL default '0',
  mod_hide_topics tinyint(1) unsigned NOT NULL default '0',
  mod_announce tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (mod_id),
  KEY mod_user_id (mod_user_id),
  KEY mod_forum (mod_forum),
  KEY mod_group (mod_group)
) TYPE=MyISAM;";

setup_log('... Creating personal notes table');

$query[] = "CREATE TABLE " . DB_PREFIX . "notes (
  notes_id int(10) unsigned NOT NULL auto_increment,
  notes_sender int(10) unsigned NOT NULL default '0',
  notes_recipient int(10) unsigned NOT NULL default '0',
  notes_date int(10) unsigned NOT NULL default '0',
  notes_title varchar(250) NOT NULL default '',
  notes_body mediumtext NOT NULL,
  notes_isRead int(1) unsigned NOT NULL default '0',
  notes_code tinyint(1) unsigned NOT NULL default '1',
  notes_emoticons tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (notes_id)
) TYPE=MyISAM;";

setup_log('... Creating topic poll table');

$query[] = "CREATE TABLE " . DB_PREFIX . "polls (
  poll_id int(10) unsigned NOT NULL auto_increment,
  poll_topic int(10) unsigned NOT NULL default '0',
  poll_question varchar(150) NOT NULL default '',
  poll_start_date int(10) unsigned NOT NULL default '0',
  poll_end_date int(10) unsigned NOT NULL default '0',
  poll_vote_count int(10) unsigned NOT NULL default '0',
  poll_choices mediumtext NOT NULL,
  poll_vote_lock int(10) unsigned NOT NULL default '0',
  poll_no_replies tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (poll_id),
  KEY poll_topic (poll_topic)
) TYPE=MyISAM;";

setup_log('... Creating post table');

$query[] = "CREATE TABLE " . DB_PREFIX . "posts (
  posts_id int(10) unsigned NOT NULL auto_increment,
  posts_topic int(10) unsigned NOT NULL default '0',
  posts_author int(10) unsigned NOT NULL default '0',
  posts_date int(10) unsigned NOT NULL default '0',
  posts_ip varchar(15) NOT NULL default '0',
  posts_body text NOT NULL,
  posts_code int(10) unsigned NOT NULL default '1',
  posts_emoticons int(10) unsigned NOT NULL default '1',
  posts_author_name varchar(200) NOT NULL default '',
  PRIMARY KEY  (posts_id),
  KEY id (posts_id),
  KEY posts_topic (posts_topic),
  KEY posts_author (posts_author),
  FULLTEXT KEY posts_body (posts_body)
) TYPE=MyISAM;";

setup_log('... Creating skins table');

$query[] = "CREATE TABLE " . DB_PREFIX . "skins (
  skins_id int(10) unsigned NOT NULL auto_increment,
  skins_name varchar(20) NOT NULL default '',
  skins_author varchar(100) NOT NULL default '',
  skins_author_link varchar(250) NOT NULL default '',
  skins_hidden int(1) unsigned NOT NULL default '0',
  skins_macro mediumtext NOT NULL,
  PRIMARY KEY  (skins_id)
) TYPE=MyISAM;";

setup_log('... Creating skin templates table');

$query[] = "CREATE TABLE " . DB_PREFIX . "templates (
  temp_skin int(10) unsigned NOT NULL default '0',
  temp_section varchar(50) NOT NULL default '',
  temp_name varchar(50) NOT NULL default '0',
  temp_code mediumtext NOT NULL,
  KEY temp_skin (temp_skin),
  KEY temp_section (temp_section)
) TYPE=MyISAM;";

setup_log('... Creating member titles table');

$query[] = "CREATE TABLE " . DB_PREFIX . "titles (
  titles_id int(10) unsigned NOT NULL auto_increment,
  titles_name varchar(250) default NULL,
  titles_posts int(10) unsigned default NULL,
  titles_pips int(10) unsigned default NULL,
  titles_file varchar(15) NOT NULL default '',
  titles_skin int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (titles_id)
) TYPE=MyISAM;";

setup_log('... Creating topic table');

$query[] = "CREATE TABLE " . DB_PREFIX . "topics (
  topics_id int(10) unsigned NOT NULL auto_increment,
  topics_forum int(10) unsigned NOT NULL default '0',
  topics_title varchar(250) NOT NULL default '',
  topics_subject varchar(255) NOT NULL default '',
  topics_date int(10) unsigned NOT NULL default '0',
  topics_author int(10) unsigned NOT NULL default '0',
  topics_views int(10) unsigned NOT NULL default '0',
  topics_posts varchar(8) NOT NULL default '0',
  topics_last_poster int(10) unsigned NOT NULL default '0',
  topics_last_post_time int(10) unsigned NOT NULL default '0',
  topics_state int(1) unsigned NOT NULL default '0',
  topics_pinned int(1) NOT NULL default '0',
  topics_last_poster_name varchar(200) default NULL,
  topics_repliers mediumtext NOT NULL,
  topics_hidden int(1) NOT NULL default '0',
  topics_author_name varchar(200) NOT NULL default '',
  topics_moved tinyint(1) unsigned NOT NULL default '0',
  topics_mtopic int(10) unsigned NOT NULL default '0',
  topics_announce tinyint(1) unsigned default '0',
  topics_is_poll tinyint(1) unsigned NOT NULL default '0',
  topics_has_file tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (topics_id),
  KEY topics_forum (topics_forum)
) TYPE=MyISAM;";

setup_log('... Creating subscriptions table');

$query[] = "CREATE TABLE " . DB_PREFIX . "tracker (
  track_id int(10) unsigned NOT NULL auto_increment,
  track_user int(10) unsigned NOT NULL default '0',
  track_topic int(10) unsigned NOT NULL default '0',
  track_forum int(10) unsigned NOT NULL default '0',
  track_date int(10) unsigned NOT NULL default '0',
  track_expire int(10) unsigned NOT NULL default '0',
  track_sent int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (track_id),
  KEY track_user (track_user),
  KEY track_topic (track_topic),
  KEY track_forum (track_forum)
) TYPE=MyISAM;";

setup_log('... Creating file uploads table');

$query[] = "CREATE TABLE " . DB_PREFIX . "uploads (
  upload_id int(10) unsigned NOT NULL auto_increment,
  upload_post int(10) unsigned NOT NULL default '0',
  upload_user int(10) unsigned NOT NULL default '0',
  upload_date int(10) unsigned NOT NULL default '0',
  upload_name varchar(250) NOT NULL default '0',
  upload_file varchar(32) NOT NULL default '',
  upload_size int(10) unsigned NOT NULL default '0',
  upload_ext varchar(10) NOT NULL default '0',
  upload_hits int(10) unsigned NOT NULL default '0',
  upload_mime varchar(250) NOT NULL default '',
  PRIMARY KEY  (upload_id),
  KEY upload_post (upload_post,upload_user)
) TYPE=MyISAM;";

setup_log('... Creating validation keys table');

$query[] = "CREATE TABLE " . DB_PREFIX . "vkeys (
  key_id int(10) unsigned NOT NULL auto_increment,
  key_user int(10) unsigned NOT NULL default '0',
  key_hash varchar(32) NOT NULL default '',
  key_date int(10) unsigned NOT NULL default '0',
  key_type varchar(5) NOT NULL default '',
  PRIMARY KEY  (key_id),
  KEY key_user (key_user)
) TYPE=MyISAM;";

setup_log('... Creating poll voters table');

$query[] = "CREATE TABLE " . DB_PREFIX . "voters (
  vote_id int(10) unsigned NOT NULL auto_increment,
  vote_topic int(10) unsigned NOT NULL default '0',
  vote_user int(10) unsigned NOT NULL default '0',
  vote_date int(10) unsigned NOT NULL default '0',
  vote_ip varchar(15) NOT NULL default '0.0.0.0',
  PRIMARY KEY  (vote_id),
  KEY vote_topic (vote_topic)
) TYPE=MyISAM;";

?>