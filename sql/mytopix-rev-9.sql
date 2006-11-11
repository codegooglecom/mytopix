-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.18-nt


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO, MYSQL323' */;


--
-- Table structure for table `mytopix_old`.`my_active`
--

DROP TABLE IF EXISTS `my_active`;
CREATE TABLE `my_active` (
  `active_id` varchar(32) NOT NULL default '',
  `active_ip` varchar(15) NOT NULL default '',
  `active_user` int(10) unsigned NOT NULL default '1',
  `active_user_name` varchar(100) NOT NULL default '',
  `active_location` varchar(20) default NULL,
  `active_forum` int(10) unsigned default NULL,
  `active_topic` int(10) unsigned default NULL,
  `active_time` int(10) unsigned default NULL,
  `active_is_bot` tinyint(1) unsigned NOT NULL default '0',
  `active_agent` varchar(128) NOT NULL default '',
  PRIMARY KEY  (`active_id`),
  UNIQUE KEY `active_ip` (`active_ip`)
) TYPE=MyISAM;

--
-- Dumping data for table `mytopix_old`.`my_active`
--

/*!40000 ALTER TABLE `my_active` DISABLE KEYS */;
INSERT INTO `my_active` (`active_id`,`active_ip`,`active_user`,`active_user_name`,`active_location`,`active_forum`,`active_topic`,`active_time`,`active_is_bot`,`active_agent`) VALUES 
 ('06ac3b1af2fa6c7571e769af490353ab','127.0.0.1',1,'Guest','main',0,0,1163229104,0,'Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.8.1) Gecko/20061010 Firefox/2.0');
/*!40000 ALTER TABLE `my_active` ENABLE KEYS */;


--
-- Table structure for table `mytopix_old`.`my_cache`
--

DROP TABLE IF EXISTS `my_cache`;
CREATE TABLE `my_cache` (
  `cache_title` varchar(250) NOT NULL default '0',
  `cache_value` mediumtext NOT NULL,
  `cache_date` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`cache_title`)
) TYPE=MyISAM;

--
-- Dumping data for table `mytopix_old`.`my_cache`
--

/*!40000 ALTER TABLE `my_cache` DISABLE KEYS */;
INSERT INTO `my_cache` (`cache_title`,`cache_value`,`cache_date`) VALUES 
 ('forums','a:6:{i:1;a:19:{s:8:\"forum_id\";s:1:\"1\";s:12:\"forum_parent\";s:1:\"0\";s:10:\"forum_name\";s:18:\"Top-Level Category\";s:17:\"forum_description\";s:0:\"\";s:12:\"forum_closed\";s:1:\"0\";s:13:\"forum_red_url\";s:7:\"http://\";s:12:\"forum_red_on\";s:1:\"0\";s:16:\"forum_red_clicks\";s:1:\"0\";s:19:\"forum_access_matrix\";s:118:\"a:4:{s:8:\"can_view\";s:7:\"1|2|3|5\";s:8:\"can_read\";s:7:\"1|2|3|5\";s:9:\"can_reply\";s:5:\"2|3|5\";s:9:\"can_start\";s:3:\"2|3\";}\";s:12:\"forum_topics\";s:1:\"0\";s:11:\"forum_posts\";s:1:\"0\";s:18:\"forum_last_post_id\";s:1:\"0\";s:20:\"forum_last_post_time\";s:1:\"0\";s:25:\"forum_last_post_user_name\";s:0:\"\";s:23:\"forum_last_post_user_id\";s:1:\"0\";s:21:\"forum_last_post_title\";s:0:\"\";s:14:\"forum_position\";s:1:\"0\";s:19:\"forum_allow_content\";s:1:\"0\";s:24:\"forum_enable_post_counts\";s:1:\"1\";}i:2;a:19:{s:8:\"forum_id\";s:1:\"2\";s:12:\"forum_parent\";s:1:\"1\";s:10:\"forum_name\";s:12:\"Normal Forum\";s:17:\"forum_description\";s:23:\"This is a normal forum.\";s:12:\"forum_closed\";s:1:\"0\";s:13:\"forum_red_url\";s:7:\"http://\";s:12:\"forum_red_on\";s:1:\"0\";s:16:\"forum_red_clicks\";s:1:\"0\";s:19:\"forum_access_matrix\";s:146:\"a:5:{s:9:\"can_reply\";s:5:\"2|3|5\";s:9:\"can_start\";s:3:\"2|3\";s:8:\"can_view\";s:7:\"1|2|3|5\";s:8:\"can_read\";s:7:\"1|2|3|5\";s:10:\"can_upload\";s:3:\"2|3\";}\";s:12:\"forum_topics\";s:1:\"9\";s:11:\"forum_posts\";s:2:\"44\";s:18:\"forum_last_post_id\";s:2:\"79\";s:20:\"forum_last_post_time\";s:10:\"1163228446\";s:25:\"forum_last_post_user_name\";s:4:\"root\";s:23:\"forum_last_post_user_id\";s:1:\"2\";s:21:\"forum_last_post_title\";s:17:\"Bbcode Test Topic\";s:14:\"forum_position\";s:1:\"0\";s:19:\"forum_allow_content\";s:1:\"1\";s:24:\"forum_enable_post_counts\";s:1:\"1\";}i:3;a:19:{s:8:\"forum_id\";s:1:\"3\";s:12:\"forum_parent\";s:1:\"1\";s:10:\"forum_name\";s:12:\"Locked Forum\";s:17:\"forum_description\";s:38:\"This forum is locked from further use.\";s:12:\"forum_closed\";s:1:\"1\";s:13:\"forum_red_url\";s:7:\"http://\";s:12:\"forum_red_on\";s:1:\"0\";s:16:\"forum_red_clicks\";s:1:\"0\";s:19:\"forum_access_matrix\";s:146:\"a:5:{s:9:\"can_reply\";s:7:\"2|3|4|5\";s:9:\"can_start\";s:7:\"2|3|4|5\";s:8:\"can_view\";s:7:\"2|3|4|5\";s:8:\"can_read\";s:7:\"2|3|4|5\";s:10:\"can_upload\";b:0;}\";s:12:\"forum_topics\";s:1:\"1\";s:11:\"forum_posts\";s:1:\"0\";s:18:\"forum_last_post_id\";s:2:\"78\";s:20:\"forum_last_post_time\";s:10:\"1163228185\";s:25:\"forum_last_post_user_name\";s:4:\"root\";s:23:\"forum_last_post_user_id\";s:1:\"2\";s:21:\"forum_last_post_title\";s:11:\"Moved Topic\";s:14:\"forum_position\";s:1:\"0\";s:19:\"forum_allow_content\";s:1:\"1\";s:24:\"forum_enable_post_counts\";s:1:\"1\";}i:4;a:19:{s:8:\"forum_id\";s:1:\"4\";s:12:\"forum_parent\";s:1:\"1\";s:10:\"forum_name\";s:12:\"Parent Forum\";s:17:\"forum_description\";s:24:\"This forum has children.\";s:12:\"forum_closed\";s:1:\"0\";s:13:\"forum_red_url\";s:7:\"http://\";s:12:\"forum_red_on\";s:1:\"0\";s:16:\"forum_red_clicks\";s:1:\"0\";s:19:\"forum_access_matrix\";s:166:\"a:5:{s:9:\"can_reply\";s:9:\"1|2|3|4|5\";s:9:\"can_start\";s:9:\"1|2|3|4|5\";s:8:\"can_view\";s:9:\"1|2|3|4|5\";s:8:\"can_read\";s:9:\"1|2|3|4|5\";s:10:\"can_upload\";s:9:\"1|2|3|4|5\";}\";s:12:\"forum_topics\";s:1:\"0\";s:11:\"forum_posts\";s:1:\"0\";s:18:\"forum_last_post_id\";s:1:\"0\";s:20:\"forum_last_post_time\";s:1:\"0\";s:25:\"forum_last_post_user_name\";s:0:\"\";s:23:\"forum_last_post_user_id\";s:1:\"0\";s:21:\"forum_last_post_title\";s:0:\"\";s:14:\"forum_position\";s:1:\"0\";s:19:\"forum_allow_content\";s:1:\"1\";s:24:\"forum_enable_post_counts\";s:1:\"1\";}i:6;a:19:{s:8:\"forum_id\";s:1:\"6\";s:12:\"forum_parent\";s:1:\"1\";s:10:\"forum_name\";s:14:\"Redirect Forum\";s:17:\"forum_description\";s:25:\"This is a redirect forum.\";s:12:\"forum_closed\";s:1:\"0\";s:13:\"forum_red_url\";s:31:\"http://www.jaia-interactive.com\";s:12:\"forum_red_on\";s:1:\"1\";s:16:\"forum_red_clicks\";s:1:\"0\";s:19:\"forum_access_matrix\";s:166:\"a:5:{s:9:\"can_reply\";s:9:\"1|2|3|4|5\";s:9:\"can_start\";s:9:\"1|2|3|4|5\";s:8:\"can_view\";s:9:\"1|2|3|4|5\";s:8:\"can_read\";s:9:\"1|2|3|4|5\";s:10:\"can_upload\";s:9:\"1|2|3|4|5\";}\";s:12:\"forum_topics\";s:1:\"0\";s:11:\"forum_posts\";s:1:\"0\";s:18:\"forum_last_post_id\";s:1:\"0\";s:20:\"forum_last_post_time\";s:1:\"0\";s:25:\"forum_last_post_user_name\";s:0:\"\";s:23:\"forum_last_post_user_id\";s:1:\"0\";s:21:\"forum_last_post_title\";s:0:\"\";s:14:\"forum_position\";s:1:\"0\";s:19:\"forum_allow_content\";s:1:\"0\";s:24:\"forum_enable_post_counts\";s:1:\"0\";}i:5;a:19:{s:8:\"forum_id\";s:1:\"5\";s:12:\"forum_parent\";s:1:\"4\";s:10:\"forum_name\";s:11:\"Child Forum\";s:17:\"forum_description\";s:22:\"This is a child forum.\";s:12:\"forum_closed\";s:1:\"0\";s:13:\"forum_red_url\";s:7:\"http://\";s:12:\"forum_red_on\";s:1:\"0\";s:16:\"forum_red_clicks\";s:1:\"0\";s:19:\"forum_access_matrix\";s:166:\"a:5:{s:9:\"can_reply\";s:9:\"1|2|3|4|5\";s:9:\"can_start\";s:9:\"1|2|3|4|5\";s:8:\"can_view\";s:9:\"1|2|3|4|5\";s:8:\"can_read\";s:9:\"1|2|3|4|5\";s:10:\"can_upload\";s:9:\"1|2|3|4|5\";}\";s:12:\"forum_topics\";s:1:\"0\";s:11:\"forum_posts\";s:1:\"0\";s:18:\"forum_last_post_id\";s:1:\"0\";s:20:\"forum_last_post_time\";s:1:\"0\";s:25:\"forum_last_post_user_name\";s:0:\"\";s:23:\"forum_last_post_user_id\";s:1:\"0\";s:21:\"forum_last_post_title\";s:0:\"\";s:14:\"forum_position\";s:1:\"0\";s:19:\"forum_allow_content\";s:1:\"1\";s:24:\"forum_enable_post_counts\";s:1:\"1\";}}',1163228446),
 ('emoticons','a:34:{i:24;a:5:{s:6:\"emo_id\";s:2:\"24\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:9:\"angry.gif\";s:8:\"emo_code\";s:7:\":angry:\";s:9:\"emo_click\";s:1:\"0\";}i:34;a:5:{s:6:\"emo_id\";s:2:\"34\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:9:\"blank.gif\";s:8:\"emo_code\";s:7:\":blank:\";s:9:\"emo_click\";s:1:\"1\";}i:33;a:5:{s:6:\"emo_id\";s:2:\"33\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:10:\"booyah.gif\";s:8:\"emo_code\";s:8:\":booyah:\";s:9:\"emo_click\";s:1:\"1\";}i:32;a:5:{s:6:\"emo_id\";s:2:\"32\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:8:\"cool.gif\";s:8:\"emo_code\";s:6:\":cool:\";s:9:\"emo_click\";s:1:\"1\";}i:31;a:5:{s:6:\"emo_id\";s:2:\"31\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:9:\"crazy.gif\";s:8:\"emo_code\";s:7:\":crazy:\";s:9:\"emo_click\";s:1:\"1\";}i:30;a:5:{s:6:\"emo_id\";s:2:\"30\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:8:\"dead.gif\";s:8:\"emo_code\";s:6:\":dead:\";s:9:\"emo_click\";s:1:\"1\";}i:29;a:5:{s:6:\"emo_id\";s:2:\"29\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:8:\"down.gif\";s:8:\"emo_code\";s:6:\":down:\";s:9:\"emo_click\";s:1:\"1\";}i:28;a:5:{s:6:\"emo_id\";s:2:\"28\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:8:\"evil.gif\";s:8:\"emo_code\";s:6:\":evil:\";s:9:\"emo_click\";s:1:\"1\";}i:27;a:5:{s:6:\"emo_id\";s:2:\"27\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:9:\"glare.gif\";s:8:\"emo_code\";s:7:\":glare:\";s:9:\"emo_click\";s:1:\"1\";}i:26;a:5:{s:6:\"emo_id\";s:2:\"26\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:8:\"grin.gif\";s:8:\"emo_code\";s:2:\":D\";s:9:\"emo_click\";s:1:\"1\";}i:25;a:5:{s:6:\"emo_id\";s:2:\"25\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:9:\"happy.gif\";s:8:\"emo_code\";s:7:\":happy:\";s:9:\"emo_click\";s:1:\"1\";}i:3;a:5:{s:6:\"emo_id\";s:1:\"3\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:7:\"huh.gif\";s:8:\"emo_code\";s:5:\":huh:\";s:9:\"emo_click\";s:1:\"1\";}i:23;a:5:{s:6:\"emo_id\";s:2:\"23\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:7:\"joy.gif\";s:8:\"emo_code\";s:5:\":joy:\";s:9:\"emo_click\";s:1:\"0\";}i:22;a:5:{s:6:\"emo_id\";s:2:\"22\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:9:\"laugh.gif\";s:8:\"emo_code\";s:7:\":laugh:\";s:9:\"emo_click\";s:1:\"0\";}i:21;a:5:{s:6:\"emo_id\";s:2:\"21\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:9:\"ldown.gif\";s:8:\"emo_code\";s:7:\":ldown:\";s:9:\"emo_click\";s:1:\"0\";}i:20;a:5:{s:6:\"emo_id\";s:2:\"20\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:8:\"left.gif\";s:8:\"emo_code\";s:6:\":left:\";s:9:\"emo_click\";s:1:\"1\";}i:19;a:5:{s:6:\"emo_id\";s:2:\"19\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:7:\"lup.gif\";s:8:\"emo_code\";s:5:\":lup:\";s:9:\"emo_click\";s:1:\"1\";}i:18;a:5:{s:6:\"emo_id\";s:2:\"18\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:8:\"nerd.gif\";s:8:\"emo_code\";s:6:\":nerd:\";s:9:\"emo_click\";s:1:\"1\";}i:17;a:5:{s:6:\"emo_id\";s:2:\"17\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:9:\"point.gif\";s:8:\"emo_code\";s:7:\":point:\";s:9:\"emo_click\";s:1:\"1\";}i:16;a:5:{s:6:\"emo_id\";s:2:\"16\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:8:\"rage.gif\";s:8:\"emo_code\";s:6:\":rage:\";s:9:\"emo_click\";s:1:\"1\";}i:15;a:5:{s:6:\"emo_id\";s:2:\"15\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:9:\"right.gif\";s:8:\"emo_code\";s:7:\":right:\";s:9:\"emo_click\";s:1:\"1\";}i:14;a:5:{s:6:\"emo_id\";s:2:\"14\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:12:\"rolleyes.gif\";s:8:\"emo_code\";s:10:\":rolleyes:\";s:9:\"emo_click\";s:1:\"1\";}i:13;a:5:{s:6:\"emo_id\";s:2:\"13\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:7:\"sad.gif\";s:8:\"emo_code\";s:2:\":(\";s:9:\"emo_click\";s:1:\"1\";}i:12;a:5:{s:6:\"emo_id\";s:2:\"12\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:10:\"scared.gif\";s:8:\"emo_code\";s:8:\":scared:\";s:9:\"emo_click\";s:1:\"1\";}i:11;a:5:{s:6:\"emo_id\";s:2:\"11\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:9:\"shame.gif\";s:8:\"emo_code\";s:7:\":shame:\";s:9:\"emo_click\";s:1:\"1\";}i:10;a:5:{s:6:\"emo_id\";s:2:\"10\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:9:\"shock.gif\";s:8:\"emo_code\";s:2:\":o\";s:9:\"emo_click\";s:1:\"1\";}i:9;a:5:{s:6:\"emo_id\";s:1:\"9\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:8:\"sick.gif\";s:8:\"emo_code\";s:6:\":sick:\";s:9:\"emo_click\";s:1:\"1\";}i:8;a:5:{s:6:\"emo_id\";s:1:\"8\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:9:\"smile.gif\";s:8:\"emo_code\";s:2:\":)\";s:9:\"emo_click\";s:1:\"1\";}i:7;a:5:{s:6:\"emo_id\";s:1:\"7\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:10:\"squint.gif\";s:8:\"emo_code\";s:3:\">_<\";s:9:\"emo_click\";s:1:\"1\";}i:6;a:5:{s:6:\"emo_id\";s:1:\"6\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:9:\"stare.gif\";s:8:\"emo_code\";s:2:\":|\";s:9:\"emo_click\";s:1:\"1\";}i:5;a:5:{s:6:\"emo_id\";s:1:\"5\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:10:\"tongue.gif\";s:8:\"emo_code\";s:2:\":P\";s:9:\"emo_click\";s:1:\"1\";}i:4;a:5:{s:6:\"emo_id\";s:1:\"4\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:6:\"up.gif\";s:8:\"emo_code\";s:4:\":up:\";s:9:\"emo_click\";s:1:\"1\";}i:2;a:5:{s:6:\"emo_id\";s:1:\"2\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:8:\"wink.gif\";s:8:\"emo_code\";s:2:\";)\";s:9:\"emo_click\";s:1:\"1\";}i:1;a:5:{s:6:\"emo_id\";s:1:\"1\";s:8:\"emo_skin\";s:1:\"1\";s:8:\"emo_name\";s:7:\"wtf.gif\";s:8:\"emo_code\";s:5:\":wtf:\";s:9:\"emo_click\";s:1:\"1\";}}',1163227744);
INSERT INTO `my_cache` (`cache_title`,`cache_value`,`cache_date`) VALUES 
 ('moderators','a:3:{i:3;a:13:{s:6:\"mod_id\";s:1:\"3\";s:9:\"mod_forum\";s:1:\"3\";s:11:\"mod_user_id\";s:1:\"0\";s:9:\"mod_group\";s:1:\"2\";s:13:\"mod_user_name\";s:7:\"Members\";s:15:\"mod_edit_topics\";s:1:\"1\";s:20:\"mod_edit_other_posts\";s:1:\"1\";s:22:\"mod_delete_other_posts\";s:1:\"1\";s:23:\"mod_delete_other_topics\";s:1:\"1\";s:15:\"mod_move_topics\";s:1:\"1\";s:15:\"mod_lock_topics\";s:1:\"1\";s:14:\"mod_pin_topics\";s:1:\"1\";s:12:\"mod_announce\";s:1:\"1\";}i:4;a:13:{s:6:\"mod_id\";s:1:\"4\";s:9:\"mod_forum\";s:1:\"3\";s:11:\"mod_user_id\";s:1:\"3\";s:9:\"mod_group\";s:1:\"0\";s:13:\"mod_user_name\";s:11:\"TestUserOne\";s:15:\"mod_edit_topics\";s:1:\"1\";s:20:\"mod_edit_other_posts\";s:1:\"1\";s:22:\"mod_delete_other_posts\";s:1:\"1\";s:23:\"mod_delete_other_topics\";s:1:\"1\";s:15:\"mod_move_topics\";s:1:\"1\";s:15:\"mod_lock_topics\";s:1:\"1\";s:14:\"mod_pin_topics\";s:1:\"1\";s:12:\"mod_announce\";s:1:\"1\";}i:5;a:13:{s:6:\"mod_id\";s:1:\"5\";s:9:\"mod_forum\";s:1:\"3\";s:11:\"mod_user_id\";s:1:\"5\";s:9:\"mod_group\";s:1:\"0\";s:13:\"mod_user_name\";s:11:\"TestUserTwo\";s:15:\"mod_edit_topics\";s:1:\"1\";s:20:\"mod_edit_other_posts\";s:1:\"1\";s:22:\"mod_delete_other_posts\";s:1:\"1\";s:23:\"mod_delete_other_topics\";s:1:\"1\";s:15:\"mod_move_topics\";s:1:\"1\";s:15:\"mod_lock_topics\";s:1:\"1\";s:14:\"mod_pin_topics\";s:1:\"1\";s:12:\"mod_announce\";s:1:\"1\";}}',1163228944),
 ('titles','a:5:{i:1;a:6:{s:9:\"titles_id\";s:1:\"1\";s:11:\"titles_name\";s:8:\"Newcomer\";s:12:\"titles_posts\";s:1:\"0\";s:11:\"titles_pips\";s:1:\"1\";s:11:\"titles_file\";s:12:\"pip_blue.gif\";s:11:\"titles_skin\";s:1:\"1\";}i:2;a:6:{s:9:\"titles_id\";s:1:\"2\";s:11:\"titles_name\";s:11:\"Common Folk\";s:12:\"titles_posts\";s:2:\"25\";s:11:\"titles_pips\";s:1:\"3\";s:11:\"titles_file\";s:12:\"pip_poop.gif\";s:11:\"titles_skin\";s:1:\"1\";}i:3;a:6:{s:9:\"titles_id\";s:1:\"3\";s:11:\"titles_name\";s:18:\"MyTopix Enthusiast\";s:12:\"titles_posts\";s:3:\"100\";s:11:\"titles_pips\";s:1:\"4\";s:11:\"titles_file\";s:14:\"pip_purple.gif\";s:11:\"titles_skin\";s:1:\"1\";}i:4;a:6:{s:9:\"titles_id\";s:1:\"4\";s:11:\"titles_name\";s:12:\"Needs a Life\";s:12:\"titles_posts\";s:3:\"500\";s:11:\"titles_pips\";s:1:\"6\";s:11:\"titles_file\";s:11:\"pip_red.gif\";s:11:\"titles_skin\";s:1:\"1\";}i:5;a:6:{s:9:\"titles_id\";s:1:\"5\";s:11:\"titles_name\";s:12:\"Post Meister\";s:12:\"titles_posts\";s:4:\"1000\";s:11:\"titles_pips\";s:1:\"8\";s:11:\"titles_file\";s:13:\"pip_green.gif\";s:11:\"titles_skin\";s:1:\"1\";}}',1163227744);
INSERT INTO `my_cache` (`cache_title`,`cache_value`,`cache_date`) VALUES 
 ('filter','a:5:{i:1;a:4:{s:10:\"replace_id\";s:1:\"1\";s:14:\"replace_search\";s:4:\"fuck\";s:15:\"replace_replace\";s:3:\"sex\";s:13:\"replace_match\";s:1:\"1\";}i:2;a:4:{s:10:\"replace_id\";s:1:\"2\";s:14:\"replace_search\";s:3:\"ass\";s:15:\"replace_replace\";s:8:\"backdoor\";s:13:\"replace_match\";s:1:\"1\";}i:3;a:4:{s:10:\"replace_id\";s:1:\"3\";s:14:\"replace_search\";s:4:\"piss\";s:15:\"replace_replace\";s:7:\"pee-pee\";s:13:\"replace_match\";s:1:\"1\";}i:4;a:4:{s:10:\"replace_id\";s:1:\"4\";s:14:\"replace_search\";s:5:\"pussy\";s:15:\"replace_replace\";s:10:\"girl parts\";s:13:\"replace_match\";s:1:\"0\";}i:5;a:4:{s:10:\"replace_id\";s:1:\"5\";s:14:\"replace_search\";s:4:\"shit\";s:15:\"replace_replace\";s:4:\"p00p\";s:13:\"replace_match\";s:1:\"1\";}}',1163227744),
 ('skins','a:1:{i:1;a:5:{s:8:\"skins_id\";s:1:\"1\";s:10:\"skins_name\";s:14:\"FuBerry - Blue\";s:12:\"skins_author\";s:16:\"Jaia Interactive\";s:17:\"skins_author_link\";s:31:\"http://www.jaia-interactive.com\";s:12:\"skins_hidden\";s:1:\"0\";}}',1163227744),
 ('languages','a:2:{i:0;s:4:\".svn\";i:1;s:7:\"english\";}',1163227744);
INSERT INTO `my_cache` (`cache_title`,`cache_value`,`cache_date`) VALUES 
 ('groups','a:5:{i:1;a:37:{s:8:\"class_id\";s:1:\"1\";s:11:\"class_title\";s:6:\"Guests\";s:12:\"class_system\";s:5:\"GUEST\";s:12:\"class_prefix\";s:3:\"<i>\";s:12:\"class_suffix\";s:4:\"</i>\";s:16:\"class_upload_max\";s:1:\"0\";s:13:\"class_canPost\";s:1:\"0\";s:15:\"class_canSearch\";s:1:\"1\";s:17:\"class_canSeeStats\";s:1:\"1\";s:17:\"class_canViewHelp\";s:1:\"1\";s:20:\"class_canViewMembers\";s:1:\"1\";s:17:\"class_canUseNotes\";s:1:\"0\";s:18:\"class_canSendNotes\";s:1:\"0\";s:17:\"class_canGetNotes\";s:1:\"0\";s:23:\"class_canDeleteOwnPosts\";s:1:\"0\";s:20:\"class_canStartTopics\";s:1:\"0\";s:21:\"class_canEditOwnPosts\";s:1:\"0\";s:19:\"class_canReadTopics\";s:1:\"1\";s:20:\"class_canEditProfile\";s:1:\"0\";s:21:\"class_canViewProfiles\";s:1:\"1\";s:19:\"class_canPostLocked\";s:1:\"0\";s:18:\"class_canSeeActive\";s:1:\"1\";s:15:\"class_sigLength\";s:1:\"0\";s:18:\"class_canSendEmail\";s:1:\"0\";s:16:\"class_floodDelay\";s:1:\"0\";s:14:\"class_maxNotes\";s:1:\"0\";s:17:\"class_change_pass\";s:1:\"0\";s:18:\"class_change_email\";s:1:\"0\";s:22:\"class_see_hidden_skins\";s:1:\"0\";s:18:\"class_canSubscribe\";s:1:\"0\";s:24:\"class_canViewClosedBoard\";s:1:\"0\";s:12:\"class_hidden\";s:1:\"0\";s:20:\"class_upload_avatars\";s:1:\"0\";s:17:\"class_use_avatars\";s:1:\"0\";s:21:\"class_can_post_events\";s:1:\"0\";s:21:\"class_can_start_polls\";s:1:\"0\";s:20:\"class_can_vote_polls\";s:1:\"0\";}i:2;a:37:{s:8:\"class_id\";s:1:\"2\";s:11:\"class_title\";s:7:\"Members\";s:12:\"class_system\";s:6:\"MEMBER\";s:12:\"class_prefix\";s:0:\"\";s:12:\"class_suffix\";s:0:\"\";s:16:\"class_upload_max\";s:2:\"50\";s:13:\"class_canPost\";s:1:\"1\";s:15:\"class_canSearch\";s:1:\"1\";s:17:\"class_canSeeStats\";s:1:\"1\";s:17:\"class_canViewHelp\";s:1:\"1\";s:20:\"class_canViewMembers\";s:1:\"1\";s:17:\"class_canUseNotes\";s:1:\"1\";s:18:\"class_canSendNotes\";s:1:\"1\";s:17:\"class_canGetNotes\";s:1:\"1\";s:23:\"class_canDeleteOwnPosts\";s:1:\"0\";s:20:\"class_canStartTopics\";s:1:\"1\";s:21:\"class_canEditOwnPosts\";s:1:\"1\";s:19:\"class_canReadTopics\";s:1:\"1\";s:20:\"class_canEditProfile\";s:1:\"1\";s:21:\"class_canViewProfiles\";s:1:\"1\";s:19:\"class_canPostLocked\";s:1:\"0\";s:18:\"class_canSeeActive\";s:1:\"1\";s:15:\"class_sigLength\";s:3:\"350\";s:18:\"class_canSendEmail\";s:1:\"1\";s:16:\"class_floodDelay\";s:1:\"5\";s:14:\"class_maxNotes\";s:2:\"25\";s:17:\"class_change_pass\";s:1:\"1\";s:18:\"class_change_email\";s:1:\"1\";s:22:\"class_see_hidden_skins\";s:1:\"1\";s:18:\"class_canSubscribe\";s:1:\"1\";s:24:\"class_canViewClosedBoard\";s:1:\"0\";s:12:\"class_hidden\";s:1:\"0\";s:20:\"class_upload_avatars\";s:1:\"1\";s:17:\"class_use_avatars\";s:1:\"1\";s:21:\"class_can_post_events\";s:1:\"1\";s:21:\"class_can_start_polls\";s:1:\"1\";s:20:\"class_can_vote_polls\";s:1:\"1\";}i:3;a:37:{s:8:\"class_id\";s:1:\"3\";s:11:\"class_title\";s:14:\"Administrators\";s:12:\"class_system\";s:5:\"ADMIN\";s:12:\"class_prefix\";s:49:\"<span style=\"color: #707070; font-weight: bold;\">\";s:12:\"class_suffix\";s:7:\"</span>\";s:16:\"class_upload_max\";s:1:\"0\";s:13:\"class_canPost\";s:1:\"1\";s:15:\"class_canSearch\";s:1:\"1\";s:17:\"class_canSeeStats\";s:1:\"1\";s:17:\"class_canViewHelp\";s:1:\"1\";s:20:\"class_canViewMembers\";s:1:\"1\";s:17:\"class_canUseNotes\";s:1:\"1\";s:18:\"class_canSendNotes\";s:1:\"1\";s:17:\"class_canGetNotes\";s:1:\"1\";s:23:\"class_canDeleteOwnPosts\";s:1:\"1\";s:20:\"class_canStartTopics\";s:1:\"1\";s:21:\"class_canEditOwnPosts\";s:1:\"1\";s:19:\"class_canReadTopics\";s:1:\"1\";s:20:\"class_canEditProfile\";s:1:\"1\";s:21:\"class_canViewProfiles\";s:1:\"1\";s:19:\"class_canPostLocked\";s:1:\"1\";s:18:\"class_canSeeActive\";s:1:\"1\";s:15:\"class_sigLength\";s:3:\"350\";s:18:\"class_canSendEmail\";s:1:\"1\";s:16:\"class_floodDelay\";s:1:\"0\";s:14:\"class_maxNotes\";s:3:\"100\";s:17:\"class_change_pass\";s:1:\"1\";s:18:\"class_change_email\";s:1:\"1\";s:22:\"class_see_hidden_skins\";s:1:\"1\";s:18:\"class_canSubscribe\";s:1:\"1\";s:24:\"class_canViewClosedBoard\";s:1:\"1\";s:12:\"class_hidden\";s:1:\"0\";s:20:\"class_upload_avatars\";s:1:\"1\";s:17:\"class_use_avatars\";s:1:\"1\";s:21:\"class_can_post_events\";s:1:\"1\";s:21:\"class_can_start_polls\";s:1:\"1\";s:20:\"class_can_vote_polls\";s:1:\"1\";}i:4;a:37:{s:8:\"class_id\";s:1:\"4\";s:11:\"class_title\";s:6:\"Banned\";s:12:\"class_system\";s:6:\"BANNED\";s:12:\"class_prefix\";s:54:\"<span style=\"color: red; font-weight: bold;\">! </span>\";s:12:\"class_suffix\";s:0:\"\";s:16:\"class_upload_max\";s:1:\"0\";s:13:\"class_canPost\";s:1:\"0\";s:15:\"class_canSearch\";s:1:\"0\";s:17:\"class_canSeeStats\";s:1:\"0\";s:17:\"class_canViewHelp\";s:1:\"0\";s:20:\"class_canViewMembers\";s:1:\"0\";s:17:\"class_canUseNotes\";s:1:\"0\";s:18:\"class_canSendNotes\";s:1:\"0\";s:17:\"class_canGetNotes\";s:1:\"0\";s:23:\"class_canDeleteOwnPosts\";s:1:\"0\";s:20:\"class_canStartTopics\";s:1:\"0\";s:21:\"class_canEditOwnPosts\";s:1:\"0\";s:19:\"class_canReadTopics\";s:1:\"0\";s:20:\"class_canEditProfile\";s:1:\"0\";s:21:\"class_canViewProfiles\";s:1:\"0\";s:19:\"class_canPostLocked\";s:1:\"0\";s:18:\"class_canSeeActive\";s:1:\"0\";s:15:\"class_sigLength\";s:1:\"0\";s:18:\"class_canSendEmail\";s:1:\"0\";s:16:\"class_floodDelay\";s:1:\"0\";s:14:\"class_maxNotes\";s:1:\"0\";s:17:\"class_change_pass\";s:1:\"0\";s:18:\"class_change_email\";s:1:\"0\";s:22:\"class_see_hidden_skins\";s:1:\"0\";s:18:\"class_canSubscribe\";s:1:\"0\";s:24:\"class_canViewClosedBoard\";s:1:\"0\";s:12:\"class_hidden\";s:1:\"0\";s:20:\"class_upload_avatars\";s:1:\"0\";s:17:\"class_use_avatars\";s:1:\"0\";s:21:\"class_can_post_events\";s:1:\"0\";s:21:\"class_can_start_polls\";s:1:\"0\";s:20:\"class_can_vote_polls\";s:1:\"0\";}i:5;a:37:{s:8:\"class_id\";s:1:\"5\";s:11:\"class_title\";s:10:\"Validating\";s:12:\"class_system\";s:10:\"VALIDATING\";s:12:\"class_prefix\";s:45:\"<span style=\"text-decoration: line-through;\">\";s:12:\"class_suffix\";s:7:\"</span>\";s:16:\"class_upload_max\";s:1:\"0\";s:13:\"class_canPost\";s:1:\"1\";s:15:\"class_canSearch\";s:1:\"1\";s:17:\"class_canSeeStats\";s:1:\"1\";s:17:\"class_canViewHelp\";s:1:\"1\";s:20:\"class_canViewMembers\";s:1:\"1\";s:17:\"class_canUseNotes\";s:1:\"1\";s:18:\"class_canSendNotes\";s:1:\"1\";s:17:\"class_canGetNotes\";s:1:\"1\";s:23:\"class_canDeleteOwnPosts\";s:1:\"0\";s:20:\"class_canStartTopics\";s:1:\"0\";s:21:\"class_canEditOwnPosts\";s:1:\"0\";s:19:\"class_canReadTopics\";s:1:\"1\";s:20:\"class_canEditProfile\";s:1:\"1\";s:21:\"class_canViewProfiles\";s:1:\"1\";s:19:\"class_canPostLocked\";s:1:\"0\";s:18:\"class_canSeeActive\";s:1:\"1\";s:15:\"class_sigLength\";s:3:\"350\";s:18:\"class_canSendEmail\";s:1:\"0\";s:16:\"class_floodDelay\";s:1:\"5\";s:14:\"class_maxNotes\";s:2:\"25\";s:17:\"class_change_pass\";s:1:\"0\";s:18:\"class_change_email\";s:1:\"0\";s:22:\"class_see_hidden_skins\";s:1:\"0\";s:18:\"class_canSubscribe\";s:1:\"0\";s:24:\"class_canViewClosedBoard\";s:1:\"0\";s:12:\"class_hidden\";s:1:\"0\";s:20:\"class_upload_avatars\";s:1:\"0\";s:17:\"class_use_avatars\";s:1:\"0\";s:21:\"class_can_post_events\";s:1:\"0\";s:21:\"class_can_start_polls\";s:1:\"0\";s:20:\"class_can_vote_polls\";s:1:\"1\";}}',1163227744);
/*!40000 ALTER TABLE `my_cache` ENABLE KEYS */;


--
-- Table structure for table `mytopix_old`.`my_class`
--

DROP TABLE IF EXISTS `my_class`;
CREATE TABLE `my_class` (
  `class_id` int(10) unsigned NOT NULL,
  `class_title` varchar(250) NOT NULL default '',
  `class_system` varchar(15) NOT NULL default 'MEMBER',
  `class_prefix` varchar(250) default NULL,
  `class_suffix` varchar(250) default NULL,
  `class_upload_max` int(10) unsigned NOT NULL default '0',
  `class_canPost` int(1) unsigned NOT NULL default '1',
  `class_canSearch` int(1) unsigned NOT NULL default '1',
  `class_canSeeStats` int(1) unsigned NOT NULL default '1',
  `class_canViewHelp` int(1) unsigned NOT NULL default '1',
  `class_canViewMembers` int(1) unsigned NOT NULL default '1',
  `class_canUseNotes` int(1) unsigned NOT NULL default '1',
  `class_canSendNotes` int(1) unsigned NOT NULL default '1',
  `class_canGetNotes` int(1) unsigned NOT NULL default '1',
  `class_canDeleteOwnPosts` int(1) unsigned NOT NULL default '0',
  `class_canStartTopics` int(1) unsigned NOT NULL default '1',
  `class_canEditOwnPosts` int(1) unsigned NOT NULL default '1',
  `class_canReadTopics` int(1) unsigned NOT NULL default '1',
  `class_canEditProfile` int(1) unsigned NOT NULL default '1',
  `class_canViewProfiles` int(1) unsigned NOT NULL default '1',
  `class_canPostLocked` int(1) unsigned NOT NULL default '0',
  `class_canSeeActive` int(1) unsigned NOT NULL default '1',
  `class_sigLength` int(10) unsigned default '350',
  `class_canSendEmail` int(1) unsigned NOT NULL default '0',
  `class_floodDelay` int(10) unsigned default '30',
  `class_maxNotes` int(10) unsigned default '30',
  `class_change_pass` int(1) unsigned NOT NULL default '1',
  `class_change_email` int(1) unsigned NOT NULL default '1',
  `class_see_hidden_skins` int(1) unsigned default '0',
  `class_canSubscribe` int(1) unsigned NOT NULL default '1',
  `class_canViewClosedBoard` int(1) unsigned NOT NULL default '0',
  `class_hidden` tinyint(1) unsigned NOT NULL default '0',
  `class_upload_avatars` tinyint(1) unsigned NOT NULL default '1',
  `class_use_avatars` tinyint(1) unsigned NOT NULL default '1',
  `class_can_post_events` tinyint(1) unsigned NOT NULL default '0',
  `class_can_start_polls` tinyint(1) unsigned NOT NULL default '1',
  `class_can_vote_polls` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`class_id`),
  UNIQUE KEY `name` (`class_title`,`class_system`)
) TYPE=MyISAM;

--
-- Dumping data for table `mytopix_old`.`my_class`
--

/*!40000 ALTER TABLE `my_class` DISABLE KEYS */;
INSERT INTO `my_class` (`class_id`,`class_title`,`class_system`,`class_prefix`,`class_suffix`,`class_upload_max`,`class_canPost`,`class_canSearch`,`class_canSeeStats`,`class_canViewHelp`,`class_canViewMembers`,`class_canUseNotes`,`class_canSendNotes`,`class_canGetNotes`,`class_canDeleteOwnPosts`,`class_canStartTopics`,`class_canEditOwnPosts`,`class_canReadTopics`,`class_canEditProfile`,`class_canViewProfiles`,`class_canPostLocked`,`class_canSeeActive`,`class_sigLength`,`class_canSendEmail`,`class_floodDelay`,`class_maxNotes`,`class_change_pass`,`class_change_email`,`class_see_hidden_skins`,`class_canSubscribe`,`class_canViewClosedBoard`,`class_hidden`,`class_upload_avatars`,`class_use_avatars`,`class_can_post_events`,`class_can_start_polls`,`class_can_vote_polls`) VALUES 
 (1,'Guests','GUEST','<i>','</i>',0,0,1,1,1,1,0,0,0,0,0,0,1,0,1,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),
 (2,'Members','MEMBER','','',50,1,1,1,1,1,1,1,1,0,1,1,1,1,1,0,1,350,1,5,25,1,1,1,1,0,0,1,1,1,1,1),
 (3,'Administrators','ADMIN','<span style=\"color: #707070; font-weight: bold;\">','</span>',0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,350,1,0,100,1,1,1,1,1,0,1,1,1,1,1),
 (4,'Banned','BANNED','<span style=\"color: red; font-weight: bold;\">! </span>','',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
INSERT INTO `my_class` (`class_id`,`class_title`,`class_system`,`class_prefix`,`class_suffix`,`class_upload_max`,`class_canPost`,`class_canSearch`,`class_canSeeStats`,`class_canViewHelp`,`class_canViewMembers`,`class_canUseNotes`,`class_canSendNotes`,`class_canGetNotes`,`class_canDeleteOwnPosts`,`class_canStartTopics`,`class_canEditOwnPosts`,`class_canReadTopics`,`class_canEditProfile`,`class_canViewProfiles`,`class_canPostLocked`,`class_canSeeActive`,`class_sigLength`,`class_canSendEmail`,`class_floodDelay`,`class_maxNotes`,`class_change_pass`,`class_change_email`,`class_see_hidden_skins`,`class_canSubscribe`,`class_canViewClosedBoard`,`class_hidden`,`class_upload_avatars`,`class_use_avatars`,`class_can_post_events`,`class_can_start_polls`,`class_can_vote_polls`) VALUES 
 (5,'Validating','VALIDATING','<span style=\"text-decoration: line-through;\">','</span>',0,1,1,1,1,1,1,1,1,0,0,0,1,1,1,0,1,350,0,5,25,0,0,0,0,0,0,0,0,0,0,1);
/*!40000 ALTER TABLE `my_class` ENABLE KEYS */;


--
-- Table structure for table `mytopix_old`.`my_emails`
--

DROP TABLE IF EXISTS `my_emails`;
CREATE TABLE `my_emails` (
  `email_id` int(10) unsigned NOT NULL,
  `email_to` int(10) unsigned NOT NULL default '0',
  `email_from` int(10) unsigned NOT NULL default '0',
  `email_subject` varchar(250) NOT NULL default '',
  `email_body` mediumtext NOT NULL,
  `email_date` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`email_id`)
) TYPE=MyISAM;

--
-- Dumping data for table `mytopix_old`.`my_emails`
--

/*!40000 ALTER TABLE `my_emails` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_emails` ENABLE KEYS */;


--
-- Table structure for table `mytopix_old`.`my_emoticons`
--

DROP TABLE IF EXISTS `my_emoticons`;
CREATE TABLE `my_emoticons` (
  `emo_id` int(10) unsigned NOT NULL,
  `emo_skin` int(10) unsigned NOT NULL default '0',
  `emo_name` varchar(50) NOT NULL default '',
  `emo_code` varchar(50) NOT NULL default '',
  `emo_click` int(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`emo_id`),
  KEY `emo_skin` (`emo_skin`)
) TYPE=MyISAM;

--
-- Dumping data for table `mytopix_old`.`my_emoticons`
--

/*!40000 ALTER TABLE `my_emoticons` DISABLE KEYS */;
INSERT INTO `my_emoticons` (`emo_id`,`emo_skin`,`emo_name`,`emo_code`,`emo_click`) VALUES 
 (1,1,'wtf.gif',':wtf:',1),
 (2,1,'wink.gif',';)',1),
 (3,1,'huh.gif',':huh:',1),
 (4,1,'up.gif',':up:',1),
 (5,1,'tongue.gif',':P',1),
 (6,1,'stare.gif',':|',1),
 (7,1,'squint.gif','>_<',1),
 (8,1,'smile.gif',':)',1),
 (9,1,'sick.gif',':sick:',1),
 (10,1,'shock.gif',':o',1),
 (11,1,'shame.gif',':shame:',1),
 (12,1,'scared.gif',':scared:',1),
 (13,1,'sad.gif',':(',1),
 (14,1,'rolleyes.gif',':rolleyes:',1),
 (15,1,'right.gif',':right:',1),
 (16,1,'rage.gif',':rage:',1),
 (17,1,'point.gif',':point:',1),
 (18,1,'nerd.gif',':nerd:',1),
 (19,1,'lup.gif',':lup:',1),
 (20,1,'left.gif',':left:',1),
 (21,1,'ldown.gif',':ldown:',0),
 (22,1,'laugh.gif',':laugh:',0),
 (23,1,'joy.gif',':joy:',0),
 (24,1,'angry.gif',':angry:',0),
 (25,1,'happy.gif',':happy:',1),
 (26,1,'grin.gif',':D',1),
 (27,1,'glare.gif',':glare:',1),
 (28,1,'evil.gif',':evil:',1),
 (29,1,'down.gif',':down:',1),
 (30,1,'dead.gif',':dead:',1),
 (31,1,'crazy.gif',':crazy:',1);
INSERT INTO `my_emoticons` (`emo_id`,`emo_skin`,`emo_name`,`emo_code`,`emo_click`) VALUES 
 (32,1,'cool.gif',':cool:',1),
 (33,1,'booyah.gif',':booyah:',1),
 (34,1,'blank.gif',':blank:',1);
/*!40000 ALTER TABLE `my_emoticons` ENABLE KEYS */;


--
-- Table structure for table `mytopix_old`.`my_events`
--

DROP TABLE IF EXISTS `my_events`;
CREATE TABLE `my_events` (
  `event_id` int(10) unsigned NOT NULL,
  `event_user` int(10) unsigned NOT NULL default '0',
  `event_title` varchar(250) NOT NULL default '0',
  `event_body` mediumtext NOT NULL,
  `event_emoticons` tinyint(1) unsigned NOT NULL default '1',
  `event_code` tinyint(1) unsigned NOT NULL default '1',
  `event_start_day` tinyint(2) unsigned NOT NULL default '0',
  `event_start_month` tinyint(2) unsigned NOT NULL default '0',
  `event_start_year` int(4) unsigned NOT NULL default '0',
  `event_start_stamp` int(10) unsigned NOT NULL default '0',
  `event_end_day` tinyint(2) unsigned NOT NULL default '0',
  `event_end_month` tinyint(2) unsigned NOT NULL default '0',
  `event_end_year` int(4) unsigned NOT NULL default '0',
  `event_end_stamp` int(10) unsigned NOT NULL default '0',
  `event_groups` varchar(250) NOT NULL default '0',
  `event_loop` tinyint(1) unsigned NOT NULL default '0',
  `event_loop_type` char(1) NOT NULL default 'w',
  PRIMARY KEY  (`event_id`),
  KEY `event_user` (`event_user`)
) TYPE=MyISAM;

--
-- Dumping data for table `mytopix_old`.`my_events`
--

/*!40000 ALTER TABLE `my_events` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_events` ENABLE KEYS */;


--
-- Table structure for table `mytopix_old`.`my_filter`
--

DROP TABLE IF EXISTS `my_filter`;
CREATE TABLE `my_filter` (
  `replace_id` int(10) unsigned NOT NULL,
  `replace_search` mediumtext NOT NULL,
  `replace_replace` mediumtext NOT NULL,
  `replace_match` int(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`replace_id`)
) TYPE=MyISAM;

--
-- Dumping data for table `mytopix_old`.`my_filter`
--

/*!40000 ALTER TABLE `my_filter` DISABLE KEYS */;
INSERT INTO `my_filter` (`replace_id`,`replace_search`,`replace_replace`,`replace_match`) VALUES 
 (1,'fuck','sex',1),
 (2,'ass','backdoor',1),
 (3,'piss','pee-pee',1),
 (4,'pussy','girl parts',0),
 (5,'shit','p00p',1);
/*!40000 ALTER TABLE `my_filter` ENABLE KEYS */;


--
-- Table structure for table `mytopix_old`.`my_forums`
--

DROP TABLE IF EXISTS `my_forums`;
CREATE TABLE `my_forums` (
  `forum_id` int(10) unsigned NOT NULL,
  `forum_parent` int(10) unsigned NOT NULL default '0',
  `forum_name` varchar(250) NOT NULL default '',
  `forum_description` mediumtext NOT NULL,
  `forum_closed` tinyint(1) unsigned NOT NULL default '0',
  `forum_red_url` varchar(250) NOT NULL default '',
  `forum_red_on` tinyint(1) unsigned NOT NULL default '0',
  `forum_red_clicks` int(10) unsigned NOT NULL default '0',
  `forum_access_matrix` mediumtext NOT NULL,
  `forum_topics` int(10) unsigned NOT NULL default '0',
  `forum_posts` int(10) unsigned NOT NULL default '0',
  `forum_last_post_id` int(10) unsigned NOT NULL default '0',
  `forum_last_post_time` int(10) unsigned NOT NULL default '0',
  `forum_last_post_user_name` varchar(250) NOT NULL default '',
  `forum_last_post_user_id` int(11) NOT NULL default '0',
  `forum_last_post_title` varchar(250) NOT NULL default '',
  `forum_position` int(10) unsigned NOT NULL default '0',
  `forum_allow_content` tinyint(1) unsigned NOT NULL default '1',
  `forum_enable_post_counts` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`forum_id`),
  KEY `forum_parent` (`forum_parent`)
) TYPE=MyISAM;

--
-- Dumping data for table `mytopix_old`.`my_forums`
--

/*!40000 ALTER TABLE `my_forums` DISABLE KEYS */;
INSERT INTO `my_forums` (`forum_id`,`forum_parent`,`forum_name`,`forum_description`,`forum_closed`,`forum_red_url`,`forum_red_on`,`forum_red_clicks`,`forum_access_matrix`,`forum_topics`,`forum_posts`,`forum_last_post_id`,`forum_last_post_time`,`forum_last_post_user_name`,`forum_last_post_user_id`,`forum_last_post_title`,`forum_position`,`forum_allow_content`,`forum_enable_post_counts`) VALUES 
 (1,0,'Top-Level Category','',0,'http://',0,0,'a:4:{s:8:\"can_view\";s:7:\"1|2|3|5\";s:8:\"can_read\";s:7:\"1|2|3|5\";s:9:\"can_reply\";s:5:\"2|3|5\";s:9:\"can_start\";s:3:\"2|3\";}',0,0,0,0,'',0,'',0,0,1),
 (2,1,'Normal Forum','This is a normal forum.',0,'http://',0,0,'a:5:{s:9:\"can_reply\";s:5:\"2|3|5\";s:9:\"can_start\";s:3:\"2|3\";s:8:\"can_view\";s:7:\"1|2|3|5\";s:8:\"can_read\";s:7:\"1|2|3|5\";s:10:\"can_upload\";s:3:\"2|3\";}',9,44,79,1163228446,'root',2,'Bbcode Test Topic',0,1,1),
 (3,1,'Locked Forum','This forum is locked from further use.',1,'http://',0,0,'a:5:{s:9:\"can_reply\";s:7:\"2|3|4|5\";s:9:\"can_start\";s:7:\"2|3|4|5\";s:8:\"can_view\";s:7:\"2|3|4|5\";s:8:\"can_read\";s:7:\"2|3|4|5\";s:10:\"can_upload\";b:0;}',1,0,78,1163228185,'root',2,'Moved Topic',0,1,1),
 (4,1,'Parent Forum','This forum has children.',0,'http://',0,0,'a:5:{s:9:\"can_reply\";s:9:\"1|2|3|4|5\";s:9:\"can_start\";s:9:\"1|2|3|4|5\";s:8:\"can_view\";s:9:\"1|2|3|4|5\";s:8:\"can_read\";s:9:\"1|2|3|4|5\";s:10:\"can_upload\";s:9:\"1|2|3|4|5\";}',0,0,0,0,'',0,'',0,1,1);
INSERT INTO `my_forums` (`forum_id`,`forum_parent`,`forum_name`,`forum_description`,`forum_closed`,`forum_red_url`,`forum_red_on`,`forum_red_clicks`,`forum_access_matrix`,`forum_topics`,`forum_posts`,`forum_last_post_id`,`forum_last_post_time`,`forum_last_post_user_name`,`forum_last_post_user_id`,`forum_last_post_title`,`forum_position`,`forum_allow_content`,`forum_enable_post_counts`) VALUES 
 (5,4,'Child Forum','This is a child forum.',0,'http://',0,0,'a:5:{s:9:\"can_reply\";s:9:\"1|2|3|4|5\";s:9:\"can_start\";s:9:\"1|2|3|4|5\";s:8:\"can_view\";s:9:\"1|2|3|4|5\";s:8:\"can_read\";s:9:\"1|2|3|4|5\";s:10:\"can_upload\";s:9:\"1|2|3|4|5\";}',0,0,0,0,'',0,'',0,1,1),
 (6,1,'Redirect Forum','This is a redirect forum.',0,'http://www.jaia-interactive.com',1,0,'a:5:{s:9:\"can_reply\";s:9:\"1|2|3|4|5\";s:9:\"can_start\";s:9:\"1|2|3|4|5\";s:8:\"can_view\";s:9:\"1|2|3|4|5\";s:8:\"can_read\";s:9:\"1|2|3|4|5\";s:10:\"can_upload\";s:9:\"1|2|3|4|5\";}',0,0,0,0,'',0,'',0,0,0);
/*!40000 ALTER TABLE `my_forums` ENABLE KEYS */;


--
-- Table structure for table `mytopix_old`.`my_help`
--

DROP TABLE IF EXISTS `my_help`;
CREATE TABLE `my_help` (
  `help_id` int(10) unsigned NOT NULL,
  `help_title` varchar(250) NOT NULL default '',
  `help_content` text NOT NULL,
  `help_position` int(3) unsigned NOT NULL default '0',
  PRIMARY KEY  (`help_id`)
) TYPE=MyISAM;

--
-- Dumping data for table `mytopix_old`.`my_help`
--

/*!40000 ALTER TABLE `my_help` DISABLE KEYS */;
INSERT INTO `my_help` (`help_id`,`help_title`,`help_content`,`help_position`) VALUES 
 (1,'What are Cookies?','A &quot;Cookie&quot; is the name given to a small piece of information stored on your computer. This information is set by MyTopix to remember your member ID and password, last visit times and other preferences. This is not used to collect any other information from you and MyTopix will only access the cookies set by itself. No other information can be read from your computer.',2),
 (2,'How do I Login / Out?','[b]Logging in:[/b]\r\nIf you have just registered with this board you may wish to log in and start using your account. This is done by simply clicking the &#39;logon&#39; link at the top of the screen. You will be prompted to include the user name and password you specified during registration. Once the form is filled all that you must do is click the &#39;Submit&#39; button at the bottom of the form. You MUST have cookies enabled if you wish to logon.\r\n\r\n[b]Logging out:[/b]\r\nAll you must do to log out of your current session is click the &#39;logoff&#39; link next to your name at the top of the screen. You can do this at any time during your session and all it will do is erase the cookies used by the system to track your activity.\r\n\r\n[i]Please note that it is our recommendation that you log off when you are finished browsing if you are on a shared computer.[/i]\r\n\r\n[b]Lost Password:[/b]\r\nIf you cannot remember your password you have the option of receiving a new one. To do this you must visit the [url=?a=logon&amp;CODE=03]password recovery screen[/url]. Just enter your registered email address and submit the form. The system will then send you an activation link to verify your identity. Click this link and, if the system verifies ownership of the key, you will be sent a new password that you may change at any time within your user control panel.',4),
 (3,'Where / How do I Register an Account?','[b]Where to Register:[/b]\r\nYou may register a new account by clicking the &#39;register&#39; link near the top of the screen. You will be taken to a form that MUST be filled out completely before submitting.\r\n\r\n[b]How to Register:[/b]\r\nThe link above will take you to a new screen. It will prompt you to enter in a user name ( or handle ), password and email. You will also have to confirm these fields to ensure that they have been properly entered. You must also comply with the terms stated in the registration agreement before continuing. When the form is filled out simply press the &#39;Submit&#39; button and the automated process will do the rest.\r\n\r\n[i]If account verification is turned on you will be sent an email message with an account activation link. This may be used as a countermeasure to account spamming or malicious behavior.[/i]',5);
INSERT INTO `my_help` (`help_id`,`help_title`,`help_content`,`help_position`) VALUES 
 (4,'Using the Member List ...','The community member listing area has been put into place so that users have a simple way of searching for and contacting other members. They are sorted alphabetically and the entire list is split into multiple pages, you may also do a custom sort to pin-point certain members if you wish. To do this you should scroll to the bottom of the page to the sorting bar. Just choose your criterion and submit the form.',6),
 (5,'Posting Topics / Replies ...','Posting refers to either starting a new topic of conversation, or replying to an existing topic of conversation. To reply, simply click on the &#39;New Topic&#39; or &#39;New Post&#39; buttons at the top of the page and enter your message INTO into the form. If you are posting a new topic you will have to include a valid topic title. There are also bbcode buttons and emoticons in place so that you may format the information within your posts. Should you receive any error messages be sure to go back and view the format of your content to make sure it meets the requirements.',1),
 (6,'What is the User Control Panel?','The user control panel (UCP) allows you to, depending on your permission settings, manage almost every aspect of your account. The UCP is split up into logical groups. Each group allows you to manage a specific part of your profile. To switch among different UCP groups you may click the appropriate section link placed above the main UCP area. Below is a complete listing and explanation of these groups.\r\n\r\n[b]MyHome:[/b]\r\nThis is the initial section of the UCP. It outlines simple account information such as posting and personal note statistics. You may also view a list of topics that you have subscribed to near the bottom of the page. To remove a subscription, simply click the &#39;remove&#39; link next to each topic title on the list.\r\n\r\n[b]Personal:[/b]\r\nThis section covers personal public information such as your birthday and geographical location. You may also manage your personal contact information here as well.\r\n\r\n[b]Signature:[/b]\r\nThe signature editor allows you to edit your personal signature that is placed below each of your postings. This screen is very much like a regular &#39;new topic&#39; or &#39;reply&#39; form. You may preview your current or modified signature near the top of the form.\r\n\r\n[b]Password:[/b]\r\nIf you are allowed you may, at any time, modify your current account password. To do this you must first know your current password. Enter it into the first field, then complete the form by typing your new password and confirming it in the last box. Submit the form and the changes should be complete.\r\n\r\n[i]Depending on your web browser&#39;s settings you may have to logoff and back on for the changes to take effect.[/i]\r\n\r\n[b]Board:[/b]\r\nThese settings allow you to personalize your browsing experience. The administrator may have extra language packs or board designs you may choose from. You can also specify whether or not you would like to be informed of certain events or receive emails from other community members.\r\n\r\n[b]Email:[/b]\r\nIf you are allowed you may, at any time, modify your current registered email address. To do this you must first know your current password. Enter it into the first field, then complete the form by typing your new email address and confirming it in the last box. Submit the form and the changes should be complete.',3);
INSERT INTO `my_help` (`help_id`,`help_title`,`help_content`,`help_position`) VALUES 
 (7,'How do I use Notes?','[b]Overview:[/b]\r\nThe notes system was put into place to be used as a personal messenger of sorts. The main notes screen consists of your inbox, which lists all read and unread notes, as well as a form for sending new notes.\r\n\r\n[b]Sending a Note:[/b]\r\nSending a note is a relatively simple process. First, you will need to specify a recipient which can be done a variety of ways. You can either just manually type the name in the recipient box, click the &#39;send note&#39; link within a user&#39;s profile or use the member&#39;s list and do the same. You will be taken back to the note form and the chosen recipient&#39;s name will appear within the recipient box. Next, you will need a note title and finally an actual message which can be typed into the main textarea box. When you&#39;re ready just click the &#39;Submit&#39; button and your new note will be sent. ( providing the recipient has their notes turned &#39;on&#39;, their inbox isn&#39;t full or if they even have permission to use notes )\r\n\r\n[b]Replying to a Note:[/b]\r\nReplying to a note is just as simple as sending a new one, just click the reply button while reading a note and follow the steps above.\r\n\r\n[b]Deleting Notes:[/b]\r\nThere are two ways of deleting unwanted notes. The first is to delete an individual note, which can be accomplished by simply clicking the &#39;delete&#39; link in the note display screen. The second allows you to clear your entire inbox of notes. This can be done by clicking the &#39;empty folder&#39; button on the main notes listing.\r\n\r\n[b]Read Status:[/b]\r\nAnother small feature allows you to set a &#39;read&#39; note as &#39;unread&#39;. Just click the status icon of each note within the main inbox listing. If the icon status is &#39;unread&#39; clicking on it will take you to the message viewing screen.\r\n\r\n[i]Please note that this messaging system is a privilege, not a right, and can be revoked by the administrator at any time with or without reason. DO NO abuse this system.[/i]',7);
/*!40000 ALTER TABLE `my_help` ENABLE KEYS */;


--
-- Table structure for table `mytopix_old`.`my_macros`
--

DROP TABLE IF EXISTS `my_macros`;
CREATE TABLE `my_macros` (
  `macro_id` int(10) unsigned NOT NULL,
  `macro_skin` int(10) unsigned NOT NULL default '0',
  `macro_title` varchar(200) default '0',
  `macro_body` mediumtext NOT NULL,
  `macro_remove` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`macro_id`),
  KEY `macro_skin` (`macro_skin`)
) TYPE=MyISAM;

--
-- Dumping data for table `mytopix_old`.`my_macros`
--

/*!40000 ALTER TABLE `my_macros` DISABLE KEYS */;
INSERT INTO `my_macros` (`macro_id`,`macro_skin`,`macro_title`,`macro_body`,`macro_remove`) VALUES 
 (1,1,'img_go','<img src=\"{%SKIN%}/btn_go.gif\" alt=\"\" title=\"\" />',0),
 (2,1,'btn_mini_aim','<img src=\"{%SKIN%}/btn_aim.gif\" alt=\"\" title=\"\" />',0),
 (3,1,'btn_mini_homepage','<img src=\"{%SKIN%}/btn_homepage.gif\" alt=\"\" title=\"\" />',0),
 (4,1,'btn_mini_icq','<img src=\"{%SKIN%}/btn_icq.gif\" alt=\"\" title=\"\" />',0),
 (5,1,'btn_mini_msn','<img src=\"{%SKIN%}/btn_msn.gif\" alt=\"\" title=\"\" />',0),
 (6,1,'btn_mini_note','<img src=\"{%SKIN%}/btn_note.gif\" alt=\"\" title=\"\" />',0),
 (7,1,'btn_mini_profile','<img src=\"{%SKIN%}/btn_profile.gif\" alt=\"\" title=\"\" />',0),
 (8,1,'btn_mini_yim','<img src=\"{%SKIN%}/btn_yim.gif\" alt=\"\" title=\"\" />',0),
 (9,1,'cat_archived','<img src=\"{%SKIN%}/cat_archived.gif\" alt=\"\" title=\"\" />',0),
 (10,1,'cat_new','<img src=\"{%SKIN%}/cat_new.gif\" alt=\"\" title=\"\" />',0),
 (11,1,'cat_old','<img src=\"{%SKIN%}/cat_old.gif\" alt=\"\" title=\"\" />',0),
 (12,1,'cat_redirect','<img src=\"{%SKIN%}/cat_red.gif\" alt=\"\" title=\"\" />',0);
INSERT INTO `my_macros` (`macro_id`,`macro_skin`,`macro_title`,`macro_body`,`macro_remove`) VALUES 
 (13,1,'cat_subs_new','<img src=\"{%SKIN%}/cat_subs_new.gif\" alt=\"\" title=\"\" />',0),
 (14,1,'cat_subs_old','<img src=\"{%SKIN%}/cat_subs_old.gif\" alt=\"\" title=\"\" />',0),
 (15,1,'btn_delete_note','<img src=\"{%SKIN%}/delete_note.gif\" alt=\"\" title=\"\" />',0),
 (16,1,'btn_main_locked','<img src=\"{%SKIN%}/main_locked.gif\" alt=\"\" title=\"\" />',0),
 (17,1,'btn_main_new','<img src=\"{%SKIN%}/main_new.gif\" alt=\"\" title=\"\" />',0),
 (18,1,'btn_main_qreply','<img src=\"{%SKIN%}/main_qreply.gif\" alt=\"\" title=\"\" />',0),
 (19,1,'btn_main_qtopic','<img src=\"{%SKIN%}/main_qtopic.gif\" alt=\"\" title=\"\" />',0),
 (20,1,'btn_main_reply','<img src=\"{%SKIN%}/main_reply.gif\" alt=\"\" title=\"\" />',0),
 (21,1,'img_mini_box','<img src=\"{%SKIN%}/mini_box.gif\" alt=\"\" title=\"\" />',0),
 (22,1,'img_note_read','<img src=\"{%SKIN%}/note_read.gif\" alt=\"\" title=\"\" />',0),
 (23,1,'img_note_unread','<img src=\"{%SKIN%}/note_unread.gif\" alt=\"\" title=\"\" />',0),
 (24,1,'img_mini_pages','<img src=\"{%SKIN%}/pages.gif\" alt=\"\" title=\"\" />',0);
INSERT INTO `my_macros` (`macro_id`,`macro_skin`,`macro_title`,`macro_body`,`macro_remove`) VALUES 
 (25,1,'btn_post_delete','<img src=\"{%SKIN%}/post_delete.gif\" alt=\"\" title=\"\" />',0),
 (26,1,'btn_post_edit','<img src=\"{%SKIN%}/post_edit.gif\" alt=\"\" title=\"\" />',0),
 (27,1,'btn_post_quote','<img src=\"{%SKIN%}/post_quote.gif\" alt=\"\" title=\"\" />',0),
 (28,1,'icon_hot_new','<img src=\"{%SKIN%}/post_hot_new.gif\" alt=\"\" title=\"\" />',0),
 (29,1,'icon_hot_new_dot','<img src=\"{%SKIN%}/post_hot_new_dot.gif\" alt=\"\" title=\"\" />',0),
 (30,1,'icon_hot_old','<img src=\"{%SKIN%}/post_hot_old.gif\" alt=\"\" title=\"\" />',0),
 (31,1,'icon_hot_old_dot','<img src=\"{%SKIN%}/post_hot_old_dot.gif\" alt=\"\" title=\"\" />',0),
 (32,1,'icon_locked_new','<img src=\"{%SKIN%}/post_locked_new.gif\" alt=\"\" title=\"\" />',0),
 (33,1,'icon_locked_new_dot','<img src=\"{%SKIN%}/post_locked_new_dot.gif\" alt=\"\" title=\"\" />',0),
 (34,1,'icon_locked_old_dot','<img src=\"{%SKIN%}/post_locked_old_dot.gif\" alt=\"\" title=\"\" />',0),
 (35,1,'icon_locked_old','<img src=\"{%SKIN%}/post_locked_old.gif\" alt=\"\" title=\"\" />',0);
INSERT INTO `my_macros` (`macro_id`,`macro_skin`,`macro_title`,`macro_body`,`macro_remove`) VALUES 
 (36,1,'icon_moved','<img src=\"{%SKIN%}/post_moved.gif\" alt=\"\" title=\"\" />',0),
 (37,1,'icon_open_new','<img src=\"{%SKIN%}/post_open_new.gif\" alt=\"\" title=\"\" />',0),
 (38,1,'icon_open_old','<img src=\"{%SKIN%}/post_open_old.gif\" alt=\"\" title=\"\" />',0),
 (39,1,'icon_open_old_dot','<img src=\"{%SKIN%}/post_open_old_dot.gif\" alt=\"\" title=\"\" />',0),
 (40,1,'icon_open_new_dot','<img src=\"{%SKIN%}/post_open_new_dot.gif\" alt=\"\" title=\"\" />',0),
 (41,1,'btn_mini_offline','<img src=\"{%SKIN%}/btn_offline.gif\" alt=\"\" title=\"\" />&nbsp;',0),
 (42,1,'icon_pin_new','<img src=\"{%SKIN%}/post_pinned_new.gif\" alt=\"\" title=\"\" />',0),
 (43,1,'icon_pin_old','<img src=\"{%SKIN%}/post_pinned_old.gif\" alt=\"\" title=\"\" />',0),
 (44,1,'btn_mini_online','<img src=\"{%SKIN%}/btn_online.gif\" alt=\"\" title=\"\" />&nbsp;',0),
 (45,1,'icon_private_new','<img src=\"{%SKIN%}/post_private_new.gif\" alt=\"\" title=\"\" />',0),
 (46,1,'icon_private_new_dot','<img src=\"{%SKIN%}/post_private_new_dot.gif\" alt=\"\" title=\"\" />',0);
INSERT INTO `my_macros` (`macro_id`,`macro_skin`,`macro_title`,`macro_body`,`macro_remove`) VALUES 
 (47,1,'icon_private_old_dot','<img src=\"{%SKIN%}/post_private_old_dot.gif\" alt=\"\" title=\"\" />',0),
 (48,1,'icon_private_old','<img src=\"{%SKIN%}/post_private_old.gif\" alt=\"\" title=\"\" />',0),
 (49,1,'btn_note_reply','<img src=\"{%SKIN%}/reply_note.gif\" alt=\"\" title=\"\" />',0),
 (50,1,'img_prefix','<img src=\"{%SKIN%}/topic_prefix.gif\" alt=\"\" title=\"\" />',0),
 (51,1,'btn_go','<input type=\"image\" src=\"{%SKIN%}/btn_go.gif\" width=\"23px\" height=\"23px\" class=\"small_button\" />',0),
 (52,1,'btn_mini_email','<img src=\"{%SKIN%}/btn_email.gif\" alt=\"\" title=\"\" />',0),
 (53,1,'txt_bread_sep','/',0),
 (54,1,'txt_online_sep',',&nbsp;',0),
 (55,1,'icon_announce_new','<img src=\"{%SKIN%}/post_announce_new.gif\" alt=\"\" title=\"\" />',0),
 (56,1,'icon_announce_old','<img src=\"{%SKIN%}/post_announce_old.gif\" alt=\"\" title=\"\" />',0),
 (57,1,'icon_poll_new','<img src=\"{%SKIN%}/post_poll_new.gif\" alt=\"\" title=\"\" />',0),
 (58,1,'icon_poll_new_dot','<img src=\"{%SKIN%}/post_poll_new_dot.gif\" alt=\"\" title=\"\" />',0);
INSERT INTO `my_macros` (`macro_id`,`macro_skin`,`macro_title`,`macro_body`,`macro_remove`) VALUES 
 (59,1,'icon_poll_old_dot','<img src=\"{%SKIN%}/post_poll_old_dot.gif\" alt=\"\" title=\"\" />',0),
 (60,1,'icon_poll_old','<img src=\"{%SKIN%}/post_poll_old.gif\" alt=\"\" title=\"\" />',0),
 (61,1,'btn_note_send','<img src=\"{%SKIN%}/send_note.gif\" alt=\"\" title=\"\" />',0),
 (62,1,'btn_add_event','<img src=\"{%SKIN%}/main_event.gif\" alt=\"\" title=\"\" />',0),
 (63,1,'btn_main_poll','<img src=\"{%SKIN%}/main_poll.gif\" alt=\"\" title=\"\" />',0),
 (64,1,'img_clip','&nbsp;<img src=\"{%SKIN%}/topic_attach_prefix.gif\" alt=\"\" title=\"\" />',0),
 (65,1,'testte','test',1);
/*!40000 ALTER TABLE `my_macros` ENABLE KEYS */;


--
-- Table structure for table `mytopix_old`.`my_members`
--

DROP TABLE IF EXISTS `my_members`;
CREATE TABLE `my_members` (
  `members_id` int(10) unsigned NOT NULL,
  `members_name` varchar(250) NOT NULL default '',
  `members_pass` varchar(32) NOT NULL default '',
  `members_pass_auto` varchar(32) NOT NULL default '',
  `members_pass_salt` varchar(5) NOT NULL default '',
  `members_class` int(10) NOT NULL default '2',
  `members_email` varchar(150) NOT NULL default '',
  `members_ip` varchar(15) NOT NULL default '',
  `members_homepage` varchar(150) NOT NULL default '',
  `members_registered` int(10) unsigned NOT NULL default '0',
  `members_lastaction` int(10) unsigned NOT NULL default '0',
  `members_lastvisit` int(10) unsigned NOT NULL default '0',
  `members_posts` int(10) unsigned NOT NULL default '0',
  `members_is_admin` int(1) unsigned NOT NULL default '0',
  `members_is_super_mod` int(1) unsigned NOT NULL default '0',
  `members_is_banned` int(1) unsigned NOT NULL default '0',
  `members_show_email` int(10) unsigned default '0',
  `members_timeZone` varchar(4) NOT NULL default '0',
  `members_location` varchar(250) NOT NULL default '',
  `members_aim` varchar(250) NOT NULL default '',
  `members_icq` varchar(250) NOT NULL default '',
  `members_yim` varchar(250) NOT NULL default '',
  `members_msn` varchar(250) NOT NULL default '',
  `members_sig` mediumtext,
  `members_noteNotify` int(1) unsigned default NULL,
  `members_language` varchar(50) NOT NULL default 'english',
  `members_skin` int(10) unsigned NOT NULL default '1',
  `members_newNotes` int(1) unsigned NOT NULL default '0',
  `members_see_avatars` tinyint(1) unsigned NOT NULL default '1',
  `members_see_sigs` tinyint(1) unsigned NOT NULL default '1',
  `members_avatar_location` varchar(250) NOT NULL default '',
  `members_avatar_dims` varchar(15) NOT NULL default '',
  `members_avatar_type` tinyint(1) unsigned NOT NULL default '1',
  `members_birth_day` tinyint(2) unsigned NOT NULL default '0',
  `members_birth_month` tinyint(2) unsigned NOT NULL default '0',
  `members_birth_year` int(4) unsigned NOT NULL default '0',
  `members_coppa` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`members_id`)
) TYPE=MyISAM;

--
-- Dumping data for table `mytopix_old`.`my_members`
--

/*!40000 ALTER TABLE `my_members` DISABLE KEYS */;
INSERT INTO `my_members` (`members_id`,`members_name`,`members_pass`,`members_pass_auto`,`members_pass_salt`,`members_class`,`members_email`,`members_ip`,`members_homepage`,`members_registered`,`members_lastaction`,`members_lastvisit`,`members_posts`,`members_is_admin`,`members_is_super_mod`,`members_is_banned`,`members_show_email`,`members_timeZone`,`members_location`,`members_aim`,`members_icq`,`members_yim`,`members_msn`,`members_sig`,`members_noteNotify`,`members_language`,`members_skin`,`members_newNotes`,`members_see_avatars`,`members_see_sigs`,`members_avatar_location`,`members_avatar_dims`,`members_avatar_type`,`members_birth_day`,`members_birth_month`,`members_birth_year`,`members_coppa`) VALUES 
 (1,'Guest','','','',1,'','','',0,0,0,0,0,0,0,0,'0','','','','','','',0,'english',1,0,1,1,'','',1,0,0,0,0),
 (2,'root','ee92497c51b34b0a7cfb9214a215f587','02b2fc2df05c9196c1fd4e829dce5a35',')#fy.',3,'root@root.com','127.0.0.1','',1160763657,1163229103,1163229103,54,1,1,0,1,'','','','','','','',0,'english',1,0,1,1,'','',0,0,0,0,0),
 (3,'TestUserOne','065082a97b9efa8515f89e093198738f','fe816c96f7d2f795ffcda22ec75dc5b1','/OO9j',2,'blah@blah.com','127.0.0.1','',1162647019,1163225644,1163225644,0,0,0,0,0,'0','','','','','',NULL,0,'english',1,0,1,1,'','',1,0,0,0,0);
INSERT INTO `my_members` (`members_id`,`members_name`,`members_pass`,`members_pass_auto`,`members_pass_salt`,`members_class`,`members_email`,`members_ip`,`members_homepage`,`members_registered`,`members_lastaction`,`members_lastvisit`,`members_posts`,`members_is_admin`,`members_is_super_mod`,`members_is_banned`,`members_show_email`,`members_timeZone`,`members_location`,`members_aim`,`members_icq`,`members_yim`,`members_msn`,`members_sig`,`members_noteNotify`,`members_language`,`members_skin`,`members_newNotes`,`members_see_avatars`,`members_see_sigs`,`members_avatar_location`,`members_avatar_dims`,`members_avatar_type`,`members_birth_day`,`members_birth_month`,`members_birth_year`,`members_coppa`) VALUES 
 (5,'TestUserTwo','6a26e48bee480089d86c93f7a6ba2df6','65e9f180c0e235ea38cfb9dc7e14aeb8',']eK0O',2,'blah@blah.com','','',1163187185,1163187185,0,0,0,0,0,0,'0','','','','','',NULL,0,'english',1,0,1,1,'','',1,0,0,0,0);
/*!40000 ALTER TABLE `my_members` ENABLE KEYS */;


--
-- Table structure for table `mytopix_old`.`my_moderators`
--

DROP TABLE IF EXISTS `my_moderators`;
CREATE TABLE `my_moderators` (
  `mod_id` int(10) unsigned NOT NULL,
  `mod_forum` int(10) unsigned NOT NULL default '0',
  `mod_user_id` int(10) unsigned NOT NULL default '0',
  `mod_group` int(10) unsigned NOT NULL default '0',
  `mod_user_name` varchar(100) NOT NULL default '',
  `mod_edit_topics` tinyint(1) unsigned NOT NULL default '1',
  `mod_edit_other_posts` tinyint(1) unsigned NOT NULL default '0',
  `mod_delete_other_posts` tinyint(1) unsigned NOT NULL default '0',
  `mod_delete_other_topics` tinyint(1) unsigned NOT NULL default '0',
  `mod_move_topics` tinyint(1) unsigned NOT NULL default '0',
  `mod_lock_topics` tinyint(1) unsigned NOT NULL default '0',
  `mod_pin_topics` tinyint(1) unsigned NOT NULL default '0',
  `mod_announce` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`mod_id`),
  KEY `mod_user_id` (`mod_user_id`),
  KEY `mod_forum` (`mod_forum`),
  KEY `mod_group` (`mod_group`)
) TYPE=MyISAM;

--
-- Dumping data for table `mytopix_old`.`my_moderators`
--

/*!40000 ALTER TABLE `my_moderators` DISABLE KEYS */;
INSERT INTO `my_moderators` (`mod_id`,`mod_forum`,`mod_user_id`,`mod_group`,`mod_user_name`,`mod_edit_topics`,`mod_edit_other_posts`,`mod_delete_other_posts`,`mod_delete_other_topics`,`mod_move_topics`,`mod_lock_topics`,`mod_pin_topics`,`mod_announce`) VALUES 
 (3,3,0,2,'Members',1,1,1,1,1,1,1,1),
 (4,3,3,0,'TestUserOne',1,1,1,1,1,1,1,1),
 (5,3,5,0,'TestUserTwo',1,1,1,1,1,1,1,1);
/*!40000 ALTER TABLE `my_moderators` ENABLE KEYS */;


--
-- Table structure for table `mytopix_old`.`my_notes`
--

DROP TABLE IF EXISTS `my_notes`;
CREATE TABLE `my_notes` (
  `notes_id` int(10) unsigned NOT NULL,
  `notes_sender` int(10) unsigned NOT NULL default '0',
  `notes_recipient` int(10) unsigned NOT NULL default '0',
  `notes_date` int(10) unsigned NOT NULL default '0',
  `notes_title` varchar(250) NOT NULL default '',
  `notes_body` mediumtext NOT NULL,
  `notes_isRead` int(1) unsigned NOT NULL default '0',
  `notes_code` tinyint(1) unsigned NOT NULL default '1',
  `notes_emoticons` tinyint(1) unsigned NOT NULL default '1',
  PRIMARY KEY  (`notes_id`)
) TYPE=MyISAM;

--
-- Dumping data for table `mytopix_old`.`my_notes`
--

/*!40000 ALTER TABLE `my_notes` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_notes` ENABLE KEYS */;


--
-- Table structure for table `mytopix_old`.`my_polls`
--

DROP TABLE IF EXISTS `my_polls`;
CREATE TABLE `my_polls` (
  `poll_id` int(10) unsigned NOT NULL,
  `poll_topic` int(10) unsigned NOT NULL default '0',
  `poll_question` varchar(150) NOT NULL default '',
  `poll_start_date` int(10) unsigned NOT NULL default '0',
  `poll_end_date` int(10) unsigned NOT NULL default '0',
  `poll_vote_count` int(10) unsigned NOT NULL default '0',
  `poll_choices` mediumtext NOT NULL,
  `poll_vote_lock` int(10) unsigned NOT NULL default '0',
  `poll_no_replies` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`poll_id`),
  KEY `poll_topic` (`poll_topic`)
) TYPE=MyISAM;

--
-- Dumping data for table `mytopix_old`.`my_polls`
--

/*!40000 ALTER TABLE `my_polls` DISABLE KEYS */;
INSERT INTO `my_polls` (`poll_id`,`poll_topic`,`poll_question`,`poll_start_date`,`poll_end_date`,`poll_vote_count`,`poll_choices`,`poll_vote_lock`,`poll_no_replies`) VALUES 
 (1,23,'Been Waiting Long Enough?',1163228145,0,0,'a:2:{i:0;a:3:{s:2:\"id\";i:1;s:6:\"choice\";s:4:\"Yes\r\";s:5:\"votes\";i:0;}i:1;a:3:{s:2:\"id\";i:2;s:6:\"choice\";s:2:\"No\";s:5:\"votes\";i:0;}}',0,0);
/*!40000 ALTER TABLE `my_polls` ENABLE KEYS */;


--
-- Table structure for table `mytopix_old`.`my_posts`
--

DROP TABLE IF EXISTS `my_posts`;
CREATE TABLE `my_posts` (
  `posts_id` int(10) unsigned NOT NULL,
  `posts_topic` int(10) unsigned NOT NULL default '0',
  `posts_author` int(10) unsigned NOT NULL default '0',
  `posts_date` int(10) unsigned NOT NULL default '0',
  `posts_ip` varchar(15) NOT NULL default '0',
  `posts_body` text NOT NULL,
  `posts_code` int(10) unsigned NOT NULL default '1',
  `posts_emoticons` int(10) unsigned NOT NULL default '1',
  `posts_author_name` varchar(200) NOT NULL default '',
  PRIMARY KEY  (`posts_id`),
  KEY `posts_topic` (`posts_topic`),
  KEY `posts_author` (`posts_author`),
  FULLTEXT KEY `posts_body` (`posts_body`)
) TYPE=MyISAM;

--
-- Dumping data for table `mytopix_old`.`my_posts`
--

/*!40000 ALTER TABLE `my_posts` DISABLE KEYS */;
INSERT INTO `my_posts` (`posts_id`,`posts_topic`,`posts_author`,`posts_date`,`posts_ip`,`posts_body`,`posts_code`,`posts_emoticons`,`posts_author_name`) VALUES 
 (25,17,2,1163227794,'127.0.0.1','Here is some content ...',1,1,'root'),
 (26,18,2,1163227882,'127.0.0.1','This is some content ...',1,1,'root'),
 (27,18,2,1163227888,'127.0.0.1','This is some content ...',1,1,'root'),
 (28,18,2,1163227892,'127.0.0.1','This is some content ...',1,1,'root'),
 (29,18,2,1163227895,'127.0.0.1','This is some content ...',1,1,'root'),
 (30,18,2,1163227897,'127.0.0.1','This is some content ...',1,1,'root'),
 (31,18,2,1163227899,'127.0.0.1','This is some content ...',1,1,'root'),
 (32,18,2,1163227902,'127.0.0.1','This is some content ...',1,1,'root'),
 (33,18,2,1163227909,'127.0.0.1','This is some content ...',1,1,'root'),
 (34,18,2,1163227911,'127.0.0.1','This is some content ...',1,1,'root'),
 (35,18,2,1163227914,'127.0.0.1','This is some content ...',1,1,'root'),
 (36,18,2,1163227916,'127.0.0.1','This is some content ...',1,1,'root'),
 (38,18,2,1163227933,'127.0.0.1','This is some content ...',1,1,'root');
INSERT INTO `my_posts` (`posts_id`,`posts_topic`,`posts_author`,`posts_date`,`posts_ip`,`posts_body`,`posts_code`,`posts_emoticons`,`posts_author_name`) VALUES 
 (39,18,2,1163227936,'127.0.0.1','This is some content ...',1,1,'root'),
 (40,18,2,1163227939,'127.0.0.1','This is some content ...',1,1,'root'),
 (43,19,2,1163228001,'127.0.0.1','This is some content ...',1,1,'root'),
 (42,18,2,1163227944,'127.0.0.1','This is some content ...',1,1,'root'),
 (44,19,2,1163228003,'127.0.0.1','This is some content ...',1,1,'root'),
 (45,19,2,1163228005,'127.0.0.1','This is some content ...',1,1,'root'),
 (46,19,2,1163228008,'127.0.0.1','This is some content ...',1,1,'root'),
 (47,19,2,1163228010,'127.0.0.1','This is some content ...',1,1,'root'),
 (48,19,2,1163228013,'127.0.0.1','This is some content ...',1,1,'root'),
 (49,19,2,1163228015,'127.0.0.1','This is some content ...',1,1,'root'),
 (50,19,2,1163228017,'127.0.0.1','This is some content ...',1,1,'root'),
 (51,19,2,1163228019,'127.0.0.1','This is some content ...',1,1,'root'),
 (52,19,2,1163228021,'127.0.0.1','This is some content ...',1,1,'root');
INSERT INTO `my_posts` (`posts_id`,`posts_topic`,`posts_author`,`posts_date`,`posts_ip`,`posts_body`,`posts_code`,`posts_emoticons`,`posts_author_name`) VALUES 
 (53,19,2,1163228023,'127.0.0.1','This is some content ...',1,1,'root'),
 (54,19,2,1163228026,'127.0.0.1','This is some content ...',1,1,'root'),
 (55,19,2,1163228029,'127.0.0.1','This is some content ...',1,1,'root'),
 (56,19,2,1163228031,'127.0.0.1','This is some content ...',1,1,'root'),
 (57,19,2,1163228034,'127.0.0.1','This is some content ...',1,1,'root'),
 (58,19,2,1163228036,'127.0.0.1','This is some content ...',1,1,'root'),
 (59,19,2,1163228040,'127.0.0.1','This is some content ...',1,1,'root'),
 (60,19,2,1163228042,'127.0.0.1','This is some content ...',1,1,'root'),
 (61,19,2,1163228044,'127.0.0.1','This is some content ...',1,1,'root'),
 (62,19,2,1163228047,'127.0.0.1','This is some content ...',1,1,'root'),
 (63,19,2,1163228049,'127.0.0.1','This is some content ...',1,1,'root'),
 (64,19,2,1163228051,'127.0.0.1','This is some content ...',1,1,'root'),
 (65,19,2,1163228054,'127.0.0.1','This is some content ...',1,1,'root');
INSERT INTO `my_posts` (`posts_id`,`posts_topic`,`posts_author`,`posts_date`,`posts_ip`,`posts_body`,`posts_code`,`posts_emoticons`,`posts_author_name`) VALUES 
 (66,19,2,1163228056,'127.0.0.1','This is some content ...',1,1,'root'),
 (67,19,2,1163228058,'127.0.0.1','This is some content ...',1,1,'root'),
 (68,19,2,1163228060,'127.0.0.1','This is some content ...',1,1,'root'),
 (69,19,2,1163228064,'127.0.0.1','This is some content ...',1,1,'root'),
 (70,19,2,1163228068,'127.0.0.1','This is some content ...',1,1,'root'),
 (71,19,2,1163228070,'127.0.0.1','This is some content ...',1,1,'root'),
 (72,19,2,1163228073,'127.0.0.1','This is some content ...',1,1,'root'),
 (73,19,2,1163228077,'127.0.0.1','This is some content ...',1,1,'root'),
 (74,20,2,1163228028,'127.0.0.1','This is some content ...',1,1,'root'),
 (75,21,2,1163228054,'127.0.0.1','This is some content ...',1,1,'root'),
 (76,22,2,1163228073,'127.0.0.1','This is some content ...',1,1,'root'),
 (77,23,2,1163228117,'127.0.0.1','This is some content ...',1,1,'root'),
 (78,24,2,1163228185,'127.0.0.1','This is some content ...',1,1,'root');
INSERT INTO `my_posts` (`posts_id`,`posts_topic`,`posts_author`,`posts_date`,`posts_ip`,`posts_body`,`posts_code`,`posts_emoticons`,`posts_author_name`) VALUES 
 (79,26,2,1163228446,'127.0.0.1',':angry:  :blank:  :booyah:  :cool:  :crazy:  :dead: \r\n\r\n[b]bold text[/b]\r\n[i]italics text[/i]\r\n[u]underlined text[/u] \r\n[s]striked text[/s]\r\n\r\n[font=courier]Courier Font[/font]\r\n[color=red]Red Text[/color]\r\n[size=25]Large Text[/size]\r\n\r\nhttp://www.jaia-interactive.com\r\n[url]http://www.jaia-interactive.com[/url]\r\n[url=http://www.jaia-interactive.com]Jaia&#39;s Homepage[/url]\r\n\r\n[email]blah@blah.com[/email]\r\n[email=blah@blah.com]An Email Address[/email]\r\n\r\n(tm) (c) (r)\r\n\r\n<img src=\"http://localhost/mytopix/upload/skins/1/cat_new.gif\" width=\"24\" height=\"29\" alt=\"http://localhost/mytopix/upload/skins/1/cat_new.gif\" />\r\n\r\n[list]\r\n[*]Item One\r\n[*]Item Two\r\n[*]Item Three\r\n[/list]\r\n\r\n[quote]A simple quote.[/quote]\r\n\r\n[quote=Root]A named quote.[/quote]\r\n\r\n[quote][quote]A nested quote.[/quote][/quote]\r\n\r\n[code]	function formatReturns ( $string )\r\n	{\r\n		$string = str_replace ( &quot;&#092;r&#092;n&quot;, &quot;&#092;n&quot;, $string );\r\n		$string = str_replace ( &quot;&#092;r&quot;,   &quot;&#092;n&quot;, $string );\r\n\r\n		return $string;\r\n	}[/code]',1,1,'root');
/*!40000 ALTER TABLE `my_posts` ENABLE KEYS */;


--
-- Table structure for table `mytopix_old`.`my_skins`
--

DROP TABLE IF EXISTS `my_skins`;
CREATE TABLE `my_skins` (
  `skins_id` int(10) unsigned NOT NULL,
  `skins_name` varchar(20) NOT NULL default '',
  `skins_author` varchar(100) NOT NULL default '',
  `skins_author_link` varchar(250) NOT NULL default '',
  `skins_hidden` int(1) unsigned NOT NULL default '0',
  `skins_macro` mediumtext NOT NULL,
  PRIMARY KEY  (`skins_id`)
) TYPE=MyISAM;

--
-- Dumping data for table `mytopix_old`.`my_skins`
--

/*!40000 ALTER TABLE `my_skins` DISABLE KEYS */;
INSERT INTO `my_skins` (`skins_id`,`skins_name`,`skins_author`,`skins_author_link`,`skins_hidden`,`skins_macro`) VALUES 
 (1,'FuBerry - Blue','Jaia Interactive','http://www.jaia-interactive.com',0,'a:65:{i:0;a:2:{s:5:\"title\";s:13:\"btn_add_event\";s:4:\"body\";s:53:\"<img src=\"{%SKIN%}/main_event.gif\" alt=\"\" title=\"\" />\";}i:1;a:2:{s:5:\"title\";s:15:\"btn_delete_note\";s:4:\"body\";s:54:\"<img src=\"{%SKIN%}/delete_note.gif\" alt=\"\" title=\"\" />\";}i:2;a:2:{s:5:\"title\";s:6:\"btn_go\";s:4:\"body\";s:96:\"<input type=\"image\" src=\"{%SKIN%}/btn_go.gif\" width=\"23px\" height=\"23px\" class=\"small_button\" />\";}i:3;a:2:{s:5:\"title\";s:15:\"btn_main_locked\";s:4:\"body\";s:54:\"<img src=\"{%SKIN%}/main_locked.gif\" alt=\"\" title=\"\" />\";}i:4;a:2:{s:5:\"title\";s:12:\"btn_main_new\";s:4:\"body\";s:51:\"<img src=\"{%SKIN%}/main_new.gif\" alt=\"\" title=\"\" />\";}i:5;a:2:{s:5:\"title\";s:13:\"btn_main_poll\";s:4:\"body\";s:52:\"<img src=\"{%SKIN%}/main_poll.gif\" alt=\"\" title=\"\" />\";}i:6;a:2:{s:5:\"title\";s:15:\"btn_main_qreply\";s:4:\"body\";s:54:\"<img src=\"{%SKIN%}/main_qreply.gif\" alt=\"\" title=\"\" />\";}i:7;a:2:{s:5:\"title\";s:15:\"btn_main_qtopic\";s:4:\"body\";s:54:\"<img src=\"{%SKIN%}/main_qtopic.gif\" alt=\"\" title=\"\" />\";}i:8;a:2:{s:5:\"title\";s:14:\"btn_main_reply\";s:4:\"body\";s:53:\"<img src=\"{%SKIN%}/main_reply.gif\" alt=\"\" title=\"\" />\";}i:9;a:2:{s:5:\"title\";s:12:\"btn_mini_aim\";s:4:\"body\";s:50:\"<img src=\"{%SKIN%}/btn_aim.gif\" alt=\"\" title=\"\" />\";}i:10;a:2:{s:5:\"title\";s:14:\"btn_mini_email\";s:4:\"body\";s:52:\"<img src=\"{%SKIN%}/btn_email.gif\" alt=\"\" title=\"\" />\";}i:11;a:2:{s:5:\"title\";s:17:\"btn_mini_homepage\";s:4:\"body\";s:55:\"<img src=\"{%SKIN%}/btn_homepage.gif\" alt=\"\" title=\"\" />\";}i:12;a:2:{s:5:\"title\";s:12:\"btn_mini_icq\";s:4:\"body\";s:50:\"<img src=\"{%SKIN%}/btn_icq.gif\" alt=\"\" title=\"\" />\";}i:13;a:2:{s:5:\"title\";s:12:\"btn_mini_msn\";s:4:\"body\";s:50:\"<img src=\"{%SKIN%}/btn_msn.gif\" alt=\"\" title=\"\" />\";}i:14;a:2:{s:5:\"title\";s:13:\"btn_mini_note\";s:4:\"body\";s:51:\"<img src=\"{%SKIN%}/btn_note.gif\" alt=\"\" title=\"\" />\";}i:15;a:2:{s:5:\"title\";s:16:\"btn_mini_offline\";s:4:\"body\";s:60:\"<img src=\"{%SKIN%}/btn_offline.gif\" alt=\"\" title=\"\" />&nbsp;\";}i:16;a:2:{s:5:\"title\";s:15:\"btn_mini_online\";s:4:\"body\";s:59:\"<img src=\"{%SKIN%}/btn_online.gif\" alt=\"\" title=\"\" />&nbsp;\";}i:17;a:2:{s:5:\"title\";s:16:\"btn_mini_profile\";s:4:\"body\";s:54:\"<img src=\"{%SKIN%}/btn_profile.gif\" alt=\"\" title=\"\" />\";}i:18;a:2:{s:5:\"title\";s:12:\"btn_mini_yim\";s:4:\"body\";s:50:\"<img src=\"{%SKIN%}/btn_yim.gif\" alt=\"\" title=\"\" />\";}i:19;a:2:{s:5:\"title\";s:14:\"btn_note_reply\";s:4:\"body\";s:53:\"<img src=\"{%SKIN%}/reply_note.gif\" alt=\"\" title=\"\" />\";}i:20;a:2:{s:5:\"title\";s:13:\"btn_note_send\";s:4:\"body\";s:52:\"<img src=\"{%SKIN%}/send_note.gif\" alt=\"\" title=\"\" />\";}i:21;a:2:{s:5:\"title\";s:15:\"btn_post_delete\";s:4:\"body\";s:54:\"<img src=\"{%SKIN%}/post_delete.gif\" alt=\"\" title=\"\" />\";}i:22;a:2:{s:5:\"title\";s:13:\"btn_post_edit\";s:4:\"body\";s:52:\"<img src=\"{%SKIN%}/post_edit.gif\" alt=\"\" title=\"\" />\";}i:23;a:2:{s:5:\"title\";s:14:\"btn_post_quote\";s:4:\"body\";s:53:\"<img src=\"{%SKIN%}/post_quote.gif\" alt=\"\" title=\"\" />\";}i:24;a:2:{s:5:\"title\";s:12:\"cat_archived\";s:4:\"body\";s:55:\"<img src=\"{%SKIN%}/cat_archived.gif\" alt=\"\" title=\"\" />\";}i:25;a:2:{s:5:\"title\";s:7:\"cat_new\";s:4:\"body\";s:50:\"<img src=\"{%SKIN%}/cat_new.gif\" alt=\"\" title=\"\" />\";}i:26;a:2:{s:5:\"title\";s:7:\"cat_old\";s:4:\"body\";s:50:\"<img src=\"{%SKIN%}/cat_old.gif\" alt=\"\" title=\"\" />\";}i:27;a:2:{s:5:\"title\";s:12:\"cat_redirect\";s:4:\"body\";s:50:\"<img src=\"{%SKIN%}/cat_red.gif\" alt=\"\" title=\"\" />\";}i:28;a:2:{s:5:\"title\";s:12:\"cat_subs_new\";s:4:\"body\";s:55:\"<img src=\"{%SKIN%}/cat_subs_new.gif\" alt=\"\" title=\"\" />\";}i:29;a:2:{s:5:\"title\";s:12:\"cat_subs_old\";s:4:\"body\";s:55:\"<img src=\"{%SKIN%}/cat_subs_old.gif\" alt=\"\" title=\"\" />\";}i:30;a:2:{s:5:\"title\";s:17:\"icon_announce_new\";s:4:\"body\";s:60:\"<img src=\"{%SKIN%}/post_announce_new.gif\" alt=\"\" title=\"\" />\";}i:31;a:2:{s:5:\"title\";s:17:\"icon_announce_old\";s:4:\"body\";s:60:\"<img src=\"{%SKIN%}/post_announce_old.gif\" alt=\"\" title=\"\" />\";}i:32;a:2:{s:5:\"title\";s:12:\"icon_hot_new\";s:4:\"body\";s:55:\"<img src=\"{%SKIN%}/post_hot_new.gif\" alt=\"\" title=\"\" />\";}i:33;a:2:{s:5:\"title\";s:16:\"icon_hot_new_dot\";s:4:\"body\";s:59:\"<img src=\"{%SKIN%}/post_hot_new_dot.gif\" alt=\"\" title=\"\" />\";}i:34;a:2:{s:5:\"title\";s:12:\"icon_hot_old\";s:4:\"body\";s:55:\"<img src=\"{%SKIN%}/post_hot_old.gif\" alt=\"\" title=\"\" />\";}i:35;a:2:{s:5:\"title\";s:16:\"icon_hot_old_dot\";s:4:\"body\";s:59:\"<img src=\"{%SKIN%}/post_hot_old_dot.gif\" alt=\"\" title=\"\" />\";}i:36;a:2:{s:5:\"title\";s:15:\"icon_locked_new\";s:4:\"body\";s:58:\"<img src=\"{%SKIN%}/post_locked_new.gif\" alt=\"\" title=\"\" />\";}i:37;a:2:{s:5:\"title\";s:19:\"icon_locked_new_dot\";s:4:\"body\";s:62:\"<img src=\"{%SKIN%}/post_locked_new_dot.gif\" alt=\"\" title=\"\" />\";}i:38;a:2:{s:5:\"title\";s:15:\"icon_locked_old\";s:4:\"body\";s:58:\"<img src=\"{%SKIN%}/post_locked_old.gif\" alt=\"\" title=\"\" />\";}i:39;a:2:{s:5:\"title\";s:19:\"icon_locked_old_dot\";s:4:\"body\";s:62:\"<img src=\"{%SKIN%}/post_locked_old_dot.gif\" alt=\"\" title=\"\" />\";}i:40;a:2:{s:5:\"title\";s:10:\"icon_moved\";s:4:\"body\";s:53:\"<img src=\"{%SKIN%}/post_moved.gif\" alt=\"\" title=\"\" />\";}i:41;a:2:{s:5:\"title\";s:13:\"icon_open_new\";s:4:\"body\";s:56:\"<img src=\"{%SKIN%}/post_open_new.gif\" alt=\"\" title=\"\" />\";}i:42;a:2:{s:5:\"title\";s:17:\"icon_open_new_dot\";s:4:\"body\";s:60:\"<img src=\"{%SKIN%}/post_open_new_dot.gif\" alt=\"\" title=\"\" />\";}i:43;a:2:{s:5:\"title\";s:13:\"icon_open_old\";s:4:\"body\";s:56:\"<img src=\"{%SKIN%}/post_open_old.gif\" alt=\"\" title=\"\" />\";}i:44;a:2:{s:5:\"title\";s:17:\"icon_open_old_dot\";s:4:\"body\";s:60:\"<img src=\"{%SKIN%}/post_open_old_dot.gif\" alt=\"\" title=\"\" />\";}i:45;a:2:{s:5:\"title\";s:12:\"icon_pin_new\";s:4:\"body\";s:58:\"<img src=\"{%SKIN%}/post_pinned_new.gif\" alt=\"\" title=\"\" />\";}i:46;a:2:{s:5:\"title\";s:12:\"icon_pin_old\";s:4:\"body\";s:58:\"<img src=\"{%SKIN%}/post_pinned_old.gif\" alt=\"\" title=\"\" />\";}i:47;a:2:{s:5:\"title\";s:13:\"icon_poll_new\";s:4:\"body\";s:56:\"<img src=\"{%SKIN%}/post_poll_new.gif\" alt=\"\" title=\"\" />\";}i:48;a:2:{s:5:\"title\";s:17:\"icon_poll_new_dot\";s:4:\"body\";s:60:\"<img src=\"{%SKIN%}/post_poll_new_dot.gif\" alt=\"\" title=\"\" />\";}i:49;a:2:{s:5:\"title\";s:13:\"icon_poll_old\";s:4:\"body\";s:56:\"<img src=\"{%SKIN%}/post_poll_old.gif\" alt=\"\" title=\"\" />\";}i:50;a:2:{s:5:\"title\";s:17:\"icon_poll_old_dot\";s:4:\"body\";s:60:\"<img src=\"{%SKIN%}/post_poll_old_dot.gif\" alt=\"\" title=\"\" />\";}i:51;a:2:{s:5:\"title\";s:16:\"icon_private_new\";s:4:\"body\";s:59:\"<img src=\"{%SKIN%}/post_private_new.gif\" alt=\"\" title=\"\" />\";}i:52;a:2:{s:5:\"title\";s:20:\"icon_private_new_dot\";s:4:\"body\";s:63:\"<img src=\"{%SKIN%}/post_private_new_dot.gif\" alt=\"\" title=\"\" />\";}i:53;a:2:{s:5:\"title\";s:16:\"icon_private_old\";s:4:\"body\";s:59:\"<img src=\"{%SKIN%}/post_private_old.gif\" alt=\"\" title=\"\" />\";}i:54;a:2:{s:5:\"title\";s:20:\"icon_private_old_dot\";s:4:\"body\";s:63:\"<img src=\"{%SKIN%}/post_private_old_dot.gif\" alt=\"\" title=\"\" />\";}i:55;a:2:{s:5:\"title\";s:8:\"img_clip\";s:4:\"body\";s:68:\"&nbsp;<img src=\"{%SKIN%}/topic_attach_prefix.gif\" alt=\"\" title=\"\" />\";}i:56;a:2:{s:5:\"title\";s:6:\"img_go\";s:4:\"body\";s:49:\"<img src=\"{%SKIN%}/btn_go.gif\" alt=\"\" title=\"\" />\";}i:57;a:2:{s:5:\"title\";s:12:\"img_mini_box\";s:4:\"body\";s:51:\"<img src=\"{%SKIN%}/mini_box.gif\" alt=\"\" title=\"\" />\";}i:58;a:2:{s:5:\"title\";s:14:\"img_mini_pages\";s:4:\"body\";s:48:\"<img src=\"{%SKIN%}/pages.gif\" alt=\"\" title=\"\" />\";}i:59;a:2:{s:5:\"title\";s:13:\"img_note_read\";s:4:\"body\";s:52:\"<img src=\"{%SKIN%}/note_read.gif\" alt=\"\" title=\"\" />\";}i:60;a:2:{s:5:\"title\";s:15:\"img_note_unread\";s:4:\"body\";s:54:\"<img src=\"{%SKIN%}/note_unread.gif\" alt=\"\" title=\"\" />\";}i:61;a:2:{s:5:\"title\";s:10:\"img_prefix\";s:4:\"body\";s:55:\"<img src=\"{%SKIN%}/topic_prefix.gif\" alt=\"\" title=\"\" />\";}i:62;a:2:{s:5:\"title\";s:6:\"testte\";s:4:\"body\";s:4:\"test\";}i:63;a:2:{s:5:\"title\";s:13:\"txt_bread_sep\";s:4:\"body\";s:1:\"/\";}i:64;a:2:{s:5:\"title\";s:14:\"txt_online_sep\";s:4:\"body\";s:7:\",&nbsp;\";}}');
/*!40000 ALTER TABLE `my_skins` ENABLE KEYS */;


--
-- Table structure for table `mytopix_old`.`my_templates`
--

DROP TABLE IF EXISTS `my_templates`;
CREATE TABLE `my_templates` (
  `temp_skin` int(10) unsigned NOT NULL default '0',
  `temp_section` varchar(50) NOT NULL default '',
  `temp_name` varchar(50) NOT NULL default '0',
  `temp_code` mediumtext NOT NULL,
  KEY `temp_skin` (`temp_skin`),
  KEY `temp_section` (`temp_section`)
) TYPE=MyISAM;

--
-- Dumping data for table `mytopix_old`.`my_templates`
--

/*!40000 ALTER TABLE `my_templates` DISABLE KEYS */;
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'active','active_row','		<tr>\r\n			<td class=\"cellone\" align=\"left\" title=\"{$row[\'active_ip\']}\">{$row[\'active_user\']} {$row[\'active_ip\']}</td>\r\n			<td class=\"celltwo\" align=\"left\">{$row[\'active_location\']}</td>\r\n			<td class=\"cellone\" align=\"center\">{$row[\'active_time\']}</td>\r\n			<td class=\"celltwo\" align=\"center\">{$row[\'active_notes\']}</td>\r\n		</tr>'),
 (1,'active','active_table','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:location_active>\r\n</div>\r\n<div class=\"bar\">{$pages}</div>\r\n<div class=\"maintable\">\r\n	<table cellpadding=\"6\" cellspacing=\"1\" width=\"100%\">\r\n		<tr>\r\n			<td class=\"header\" colspan=\"4\"><lang:active_title></td>\r\n		</tr>\r\n		<tr>\r\n			<th align=\"left\" width=\"15%\"><lang:col_name></td>\r\n			<th align=\"left\" width=\"25%\"><lang:col_location></td>\r\n			<th align=\"center\" width=\"25%\"><lang:col_last_seen></td>\r\n			<th align=\"center\" width=\"10%\"><lang:col_note></td>\r\n		</tr>\r\n		{$list}\r\n		<tr>\r\n			<td class=\"footer\" colspan=\"4\">&nbsp;</td>\r\n		</tr>\r\n	</table>\r\n</div>\r\n<div class=\"bar\">{$pages}</div>'),
 (1,'global','global_board_closed','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a>\r\n</div>\r\n<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">\r\n	<div class=\"formwrap\">\r\n		<h3><lang:global_board_closed></h3>\r\n		<div id=\"warning\">\r\n			<h3><lang:err_warn_title></h3>\r\n			<p><strong><conf:closed_message></strong></p>\r\n		</div>\r\n		<h3><lang:closed_form_name_title></h3>\r\n		<h4><lang:closed_form_name_title_info></h4>\r\n		<input type=\'text\' name=\'username\' tabindex=\'1\' />\r\n		<h3><lang:closed_form_pass_title></h3>\r\n		<h4><lang:closed_form_pass_title_info></h4>\r\n		<input type=\'password\' name=\'password\' tabindex=\'2\' />\r\n		<p class=\"submit\">\r\n			<input class=\"button\" type=\"submit\" value=\"<lang:closed_form_submit>\" />&nbsp;\r\n			<input class=\"reset\" type=\"reset\" value=\"<lang:closed_form_reset>\" />\r\n		</p>\r\n		<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n	</div>\r\n</form>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'global','global_body','<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\r\n<!-- Powered By: <conf:application> <conf:version> -->\r\n<html xmlns=\"http://www.w3.org/1999/xhtml\" lang=\"en\" xml:lang=\"en\"  dir=\"<lang:text_direction>\">\r\n	<head>\r\n		<title><conf:title> - <lang:powered_by> <conf:application> <conf:version></title>\r\n		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />\r\n		<meta name=\"generator\" content=\"editplus\" />\r\n		<meta name=\"author\" content=\"Daniel Wilhelm II Murdoch, wilhelm@jaia-interactive.com, http://www.jaia-interactive.com\" />\r\n		<meta name=\"keywords\" content=\"<conf:application> <conf:version>\" />\r\n		<meta name=\"description\" content=\"\" />\r\n		<script src=\"<sys:skinPath>/js/main.js\" type=\"text/javascript\"></script>\r\n		<link href=\"<sys:skinPath>/styles.css\" rel=\"stylesheet\" type=\"text/css\" title=\"default\" />\r\n	</head>\r\n	<body>\r\n	{$content}\r\n	</body>\r\n</html>'),
 (1,'global','global_message_level_1','<div id=\"messenger\">\r\n	<h2><lang:messenger_title>:</h2>\r\n	<p>{$message}</p>\r\n	<h4>(<a href=\"{$link}\" title=\"<lang:messenger_forward>\"><lang:messenger_forward></a>)</h4>\r\n</div>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'global','global_welcome_admin','<div class=\"welcome\">\r\n	<p class=\"links\"><lang:welcome_back>, <a href=\"<sys:gate>?getuser=<user:members_id>\" title=\"<lang:welcome_profile_title>\"><strong><user:members_name></strong></a>! (<a href=\"<sys:gate>?a=logon&CODE=02\" title=\"<lang:welcome_logout_title>\"><lang:welcome_logout></a>)</p>\r\n	<p><a href=\"<sys:gate>?a=ucp\" title=\"<lang:welcome_control_title>\"><strong><lang:welcome_profile></strong></a> &middot; <a href=\"<sys:gate>?a=search&amp;CODE=03\" title=\"<lang:welcome_latest_title>\"><lang:welcome_latest></a> &middot; <a href=\"<sys:gate>?a=notes\" title=\"<lang:welcome_inbox_title>\"><lang:welcome_messages> (<user:members_newNotes>)</a> &middot; <a href=\"<conf:site_link>admin/\" title=\"<lang:welcome_admin_title>\"><lang:welcome_link_admin></a></p>\r\n</div>'),
 (1,'global','global_welcome_disabled','<div class=\"welcome\">\r\n	<p class=\"links\"><lang:welcome_disabled></p>\r\n        <p>&nbsp;</p>\r\n</div>'),
 (1,'global','global_welcome_guest','<div class=\"welcome\">\r\n	<p class=\"links\"><lang:welcome_guest>, <user:members_name>! (<a href=\"<sys:gate>?a=register\" title=\"\"><lang:welcome_register></a> &middot; <a href=\"<sys:gate>?a=logon\" title=\"\"><lang:welcome_logon></a>)</p>\r\n	<p><a href=\"<sys:gate>?a=register&amp;CODE=03\" title=\"\"><lang:welcome_resend_validation></a></p>\r\n</div>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'global','global_welcome_member','<div class=\"welcome\">\r\n	<p class=\"links\"><lang:welcome_back>, <a href=\"<sys:gate>?getuser=<user:members_id>\" title=\"<lang:welcome_profile_title>\"><strong><user:members_name></strong></a>! (<a href=\"<sys:gate>?a=logon&CODE=02\" title=\"<lang:welcome_logout_title>\"><lang:welcome_logout></a>)</p>\r\n	<p><a href=\"<sys:gate>?a=ucp\" title=\"<lang:welcome_control_title>\"><strong><lang:welcome_profile></strong></a> &middot; <a href=\"<sys:gate>?a=search&amp;CODE=03\" title=\"<lang:welcome_latest_title>\"><lang:welcome_latest></a> &middot; <a href=\"<sys:gate>?a=notes\" title=\"<lang:welcome_inbox_title>\"><lang:welcome_messages> (<user:members_newNotes>)</a></p>\r\n</div>'),
 (1,'mailer','mail_header','{$who} <lang:mailer_header> {$sent}:\r\n----------------------------------------------------------------\r\n\r\n'),
 (1,'mailer','mail_footer','\r\n----------------------------------------------------------------\r\n<lang:mailer_footer> MyTopix | Personal Message Board {$this->config[\'version\']}.  http://www.jaia-interactive.com'),
 (1,'global','global_wrapper','			<div id=\"container\">\r\n				<h1><a href=\"<sys:gate>?a=main\" title=\"<lang:logo_alt>\">&nbsp;</a></h1>\r\n				<div id=\"top_nav\">\r\n					<ul>\r\n						<li><a href=\"<conf:site_link><sys:gate>?a=members\" title=\"\"><lang:uni_tab_members></a> &middot;</li>\r\n						<li><a href=\"<conf:site_link><sys:gate>?a=search\" title=\"\"><lang:uni_tab_search></a> &middot;</li>\r\n						<li><a href=\"<conf:site_link><sys:gate>?a=help\" title=\"\"><lang:uni_tab_help></a> &middot;</li>\r\n						<li><a href=\"<conf:site_link><sys:gate>?a=calendar\" title=\"\"><lang:uni_tab_calendar></a></li>\r\n					</ul>\r\n				</div>\r\n				{$this->welcome}\r\n				{$content}\r\n				<div id=\"copyright\"><span>Powered By: <strong>MyTopix&trade; | Personal Message Board</strong> <conf:version></span>Copyright &copy;  2004,  <a href=\"http://www.jaia-interactive.com/\" title=\"<lang:visit_jaia>\">Jaia Interactive</a> all rights reserved.</div>\r\n			</div>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'help','container_help','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:help_crumb_title>\r\n</div>\r\n<div class=\"infowrap\">\r\n    <h1><lang:help_title></h1>\r\n    <h2><lang:help_tip></h2>\r\n    <ul>\r\n        {$titles}\r\n    </ul>\r\n</div>\r\n{$entries}'),
 (1,'help','content_row','<div class=\"infowrap\">\r\n	<a name=\"{$count}\"></a>\r\n	<h3>{$count}. {$row[\'help_title\']}</h3>\r\n	<p>{$row[\'help_content\']}</p>\r\n	<p class=\"top\"><a href=\"javascript:scroll(0,0);\" title=\"<lang:link_top_title>\"><lang:link_top></a></p>\r\n</div>'),
 (1,'help','title_row','<li><a href=\"#{$count}\" title=\"{$row[\'help_title\']}\">{$row[\'help_title\']}</a></li>'),
 (1,'logon','form','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:form_logon_title>\r\n</div>\r\n<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">\r\n	<div class=\"formwrap\">\r\n		<h3><lang:form_logon_title></h3>\r\n		<p class=\"checkwrap\"><lang:form_logon_tip></p>\r\n		<h3><lang:sys_err_option_title></h3>\r\n		<ul>\r\n			<li><a href=\"<sys:gate>?a=register\" title=\"\"><lang:sys_err_option_reg></a></li>\r\n			<li><a href=\"<sys:gate>?a=logon&amp;CODE=03\" title=\"\"><lang:sys_err_option_rec></a></li>\r\n			<li><a href=\"<sys:gate>?a=help\" title=\"\"><lang:sys_err_option_doc></a></li>\r\n		</ul>\r\n		<h3><lang:form_logon_field_username></h3>\r\n		<h4><lang:form_logon_field_username_tip></h4>\r\n		<input type=\'text\' name=\'username\' tabindex=\'1\' />\r\n		<h3><lang:form_logon_field_password></h3>\r\n		<h4><lang:form_logon_field_password_tip></h4>\r\n		<input type=\'password\' name=\'password\' tabindex=\'2\' />\r\n		<p class=\"submit\">\r\n			<input class=\"button\" type=\"submit\" value=\"<lang:form_logon_button_submit>\" />&nbsp;\r\n			<input class=\"reset\" type=\"reset\" value=\"<lang:form_logon_button_reset>\" />\r\n		</p>\r\n		<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n	</div>\r\n</form>'),
 (1,'logon','form_pass_retrieve_1','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:form_retrieve_title>\r\n</div>\r\n<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=04\">\r\n	<div class=\"formwrap\">\r\n		<h3><lang:form_retrieve_title></h3>\r\n		<p class=\"checkwrap\"><lang:form_retrieve_tip></p>\r\n		<h3><lang:form_retrieve_field_email></h3>\r\n		<h4><lang:form_retrieve_field_email_tip></h4>\r\n		<input type=\'text\' name=\'email\' tabindex=\'1\' />\r\n		<p class=\"submit\">\r\n			<input class=\"button\" type=\"submit\" value=\"<lang:form_retrieve_submit>\" />&nbsp;\r\n			<input class=\"reset\" type=\"reset\" value=\"<lang:form_retrieve_reset>\" />\r\n		</p>\r\n		<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n	</div>\r\n</form>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'mailer','mail_note_notify','Hello, {$row[\'members_name\']}\r\n\r\n<user:members_name>, from <conf:title> ( <conf:site_link> ), has just sent you a new personal note.\r\nIf you wish to read it, click the link below to go straight to your notes index:	\r\n\r\n<conf:site_link><sys:gate>?a=notes\r\n\r\nIf you do not wish to recieve notifications any longer be sure to turn this feature off within your\r\npersonal control panel which can be found through the link above.'),
 (1,'mailer','mail_subscribe_topic_notice','Hello {$row[\'members_name\']},\r\n\r\n{$row[\'topics_last_poster_name\']}, from <conf:title> ( <conf:site_link> ), has just posted a reply\r\nto a topic you have subscribed to. You may follow the link below to read this post:\r\n\r\n<conf:site_link><sys:gate>?gettopic={$this->_id}&p={$page}#{$post}\r\n\r\nIf you do not wish to recieve subscription notices any longer you may turn this feature \r\noff within your personal control panel. To do this you may access your UCP through the \r\nabove link.'),
 (1,'main','active_users','<div class=\"infowrap\">\r\n	<h1><lang:active_user_title> </h1>\r\n	<h2><lang:active_user_summary> (<a href=\"<sys:gate>?a=active\" title=\"<lang:active_link_details>\"><lang:active_link_details></a>)</h2>\r\n	<p>{$list}</p>\r\n</div>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'topics','container_main','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {$bread_crumb}\r\n</div>\r\n{$child_forums}\r\n{$topics}\r\n<div class=\"bar\">\r\n	{$jump}\r\n	<form method=\"post\" action=\"<sys:gate>?a=search&amp;CODE=01\">\r\n		<input type=\"text\" class=\"small_text\" name=\"keywords\" value=\"<lang:search_forums>\" onfocus=\"javascript: this.value=\'\';\" /><input type=\"image\" src=\"<sys:skinPath>/btn_go.gif\" class=\"small_button\" value=\"<lang:search_forums>\" />\r\n		<input type=\"hidden\" name=\"forum\" value=\"{$this->_forum}\" />\r\n	</form>\r\n</div>\r\n{$active}\r\n{$board_stats}'),
 (1,'topics','main_buttons','<div class=\"postbutton\">\r\n	<a href=\"<sys:gate>?a=post&CODE=03&amp;forum={$this->_forum}\" title=\"<lang:button_new_topic>\"><macro:btn_main_new></a>&nbsp;<a href=\"#qwik\" title=\"<lang:button_new_qwik>\" onclick=\"javascript:return toggleBox(\'qwikform\');\"><macro:btn_main_qtopic></a>\r\n</div>'),
 (1,'main','statistics','<div class=\"infowrap\">\r\n	<h1><lang:stat_title>:</h1>\r\n	<h2><lang:stat_tip></h2>\r\n	<p><lang:stat_totals><br />\r\n	<lang:stat_newest><br />\r\n	<lang:stat_online></p>\r\n</div>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'topics','topic_bit','<div id=\"qwikform\" style=\"display: none;\">\r\n	<script language=\"javascript\">\r\n	function check_length()\r\n	{\r\n\r\n		var limit = {$length};\r\n\r\n		var length = document.REPLIER.body.value.length;\r\n\r\n		if ( (length > limit) ) {\r\n\r\n			alert(\'Your message is too long ( \' + length + \' chars ), please shorten it to less than \' + limit + \' characters.\');\r\n\r\n		} else {\r\n\r\n			alert(\'You are currently using \' + length + \' characters. Maximum allowable amount should not exceed \' + limit);\r\n\r\n		}\r\n\r\n	}\r\n	</script>\r\n	<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>\r\n	<form method=\"POST\" action=\"<sys:gate>?a=post&amp;CODE=00\" name=\"REPLIER\">\r\n		<a name=\"qwik\"></a>\r\n		<div class=\"formwrap\">\r\n			<h3><lang:qwik_title></h3>\r\n			<p class=\"checkwrap\"><lang:qwik_form_tip></p>\r\n			<h3><lang:qwik_form_field_title></h3>\r\n			<h4><lang:qwik_form_field_title_field></h4>\r\n			<input type=\"text\" name=\"title\" />\r\n			<h3><lang:qwik_form_field_body></h3>\r\n			<h4><lang:qwik_form_field_body_tip> ( <a href=\"javascript:smilie_window(\'<sys:gate>\')\" title=\"View emoticon choices\"><lang:qwik_form_link_emoticons></a> &middot; <a href=\"javascript:check_length()\" title=\"Check the length of your topic\"><lang:qwik_form_link_length></a> )</h4>\r\n			<textarea name=\"body\" rows=\"\" cols=\"\"></textarea>\r\n			<p class=\"submit\">\r\n				<input class=\"button\" type=\"submit\" value=\"<lang:qwik_form_button_post>\" />&nbsp;\r\n				<input class=\"reset\" type=\"reset\" value=\"<lang:qwik_form_button_reset>\" />\r\n			</p>\r\n			<input type=\"hidden\" name=\"cOption\" value=\"1\" />\r\n			<input type=\"hidden\" name=\"eOption\" value=\"1\" />\r\n			<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n			<input type=\"hidden\" name=\"subject\" value=\"\" />\r\n			<input type=\"hidden\" name=\"forum\" value=\"{$this->_forum}\" />\r\n		</div>\r\n	</form>\r\n</div>'),
 (1,'topics','topic_row','<tr>\r\n	<td class=\"cellthree\"><a href=\"<sys:gate>?gettopic={$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\">{$row[\'topics_marker\']}</a></td>\r\n	<td class=\"cellone\">{$row[\'topics_prefix\']} <a href=\"<sys:gate>?gettopic={$row[\'topics_id\']}\" title=\"\">{$row[\'topics_title\']}</a> {$inlineNav}<span class=\"special\">-- {$row[\'topics_subject\']}</span></td>\r\n	<td class=\"celltwo\" align=\"center\"><strong>{$row[\'topics_posts\']}</strong></td>\r\n	<td class=\"cellone\" align=\"center\">{$row[\'topics_views\']}</td>\r\n	<td class=\"celltwo\" align=\"center\"><strong>{$row[\'topics_author\']}</strong></td>\r\n	<td class=\"celllast\" nowrap=\"nowrap\"><span><a href=\"<sys:gate>?gettopic={$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><macro:img_mini_box></a> {$row[\'topics_last\']}</span><lang:topic_last_replied> <strong>{$row[\'topics_poster\']}</strong></td>\r\n</tr>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'topics','topic_table','{$buttons}\r\n<div class=\"bar\">\r\n	<span>\r\n		<a href=\"<sys:gate>?getforum={$this->_forum}&amp;CODE=02\" title=\"\"><strong><lang:forum_subscribe></strong></a>\r\n	</span>\r\n	{$pages}\r\n</div>\r\n<div class=\"maintable\">\r\n<table cellpadding=\"0\" cellspacing=\"1\" width=\"100%\">\r\n		<tr>\r\n			<td class=\"header\" colspan=\"6\">{$forum_data[\'forum_name\']}</td>\r\n		</tr>\r\n	<tr>\r\n		<th width=\"1%\">&nbsp;</th>\r\n		<th width=\"30%\"><lang:main_col_title></th>\r\n		<th align=\"center\" width=\"10%\"><lang:topic_posts></th>\r\n		<th align=\"center\" width=\"10%\"><lang:topic_views></th>\r\n		<th  align=\"center\" width=\"10%\"><lang:main_col_author></th>\r\n		<th width=\"25%\"><lang:main_col_last_post></th>\r\n	</tr>\r\n	{$list}\r\n	<tr>\r\n		<td class=\"footer\" colspan=\"6\"><a href=\"javascript:scroll(0,0);\" title=\"Scroll to the top\">Top</a></td>\r\n	</tr>\r\n</table>\r\n</div>\r\n<div class=\"bar\">\r\n	<span>\r\n		<a href=\"<sys:gate>?getforum={$this->_forum}&amp;CODE=01\" title=\"<lang:mark_read>\"><strong><lang:mark_read></strong></a>\r\n	</span>\r\n	{$pages}\r\n</div>\r\n{$buttons}\r\n{$post}'),
 (1,'members','list_row','<tr>\r\n	<td class=\"cellone\"><a href=\'<sys:gate>?getuser={$row[\'members_id\']}\'>{$row[\'class_prefix\']}{$row[\'members_name\']}{$row[\'class_suffix\']}</a></td>\r\n	<td class=\"celltwo\" align=\"center\">{$row[\'members_posts\']}</td>\r\n	<td class=\"cellone\" align=\"center\">{$row[\'members_rank\']}</td>\r\n	<td class=\"celltwo\" align=\"center\"><strong>{$row[\'class_title\']}</strong></td>\r\n	<td class=\"cellone\" align=\"center\">{$row[\'members_registered\']}</td>\r\n	<td class=\"celltwo\" align=\"center\">{$row[\'members_homepage\']}</td>\r\n	<td class=\"celltwo\" align=\"center\">{$row[\'members_email\']}</td>\r\n	<td class=\"celltwo\" align=\"center\"><a href=\'<sys:gate>?a=notes&amp;CODE=07&amp;send={$row[\'members_id\']}\'><macro:btn_mini_note></a></td>\r\n</tr>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'members','list_table','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:index_title>\r\n</div>\r\n<div class=\"bar\">{$pages}</div>\r\n<div class=\"maintable\">\r\n	<table cellpadding=\"6\" cellspacing=\"1\" width=\"100%\">\r\n		<tr>\r\n			<td class=\"header\" colspan=\"8\"><lang:index_title>:</td>\r\n		</tr>\r\n		<tr>\r\n			<th width=\"15%\"><lang:member_name></th>\r\n			<th align=\"center\" width=\"10%\"><lang:member_posts></th>\r\n			<th align=\"center\" width=\"10%\"><lang:member_rank></th>\r\n			<th align=\"center\" width=\"20%\"><lang:member_group></th>\r\n			<th align=\"center\" width=\"25%\"><lang:member_joined></th>\r\n			<th align=\"center\" width=\"10%\"><lang:member_page></th>\r\n			<th align=\"center\" width=\"10%\"><lang:member_email></th>\r\n			<th align=\"center\" width=\"10%\"><lang:member_note></th>\r\n		</tr>\r\n		{$list}\r\n		<tr>\r\n			<td class=\"footer\" colspan=\"8\">&nbsp;</td>\r\n		</tr>\r\n	</table>\r\n</div>\r\n<div class=\"bar\">{$pages}</div>\r\n<form method=\"post\" action=\"<sys:gate>?a=members\">\r\n	<div class=\"formwrap\">\r\n		<h3><lang:search_title></h3>\r\n		<p class=\"sort\">\r\n		<lang:search_get> \r\n		<select name=\'sGroup\'>\r\n			<option value=\'all\'><lang:search_group></option>\r\n			{$sort_groups}\r\n		</select> by \r\n		<select name=\'sField\'>\r\n			{$sort_type}\r\n		</select> <lang:search_in>\r\n		<select name=\'sOrder\'>\r\n			{$sort_order}\r\n		</select> <lang:search_with>\r\n		<select name=\'sResults\'>\r\n			{$sort_count}\r\n		</select> <lang:search_per_page> \r\n		<input class=\"submit\" type=\"submit\" value=\"<lang:search_button>\" />\r\n		</p>\r\n	</div>\r\n</form>'),
 (1,'misc','emoticon_row','	<tr>\r\n		<td class=\'celltwo\'>{$code[$i]}</td>\r\n		<td class=\'celltwo\'>\r\n			<a href=\'javascript:add_smilie(\"{$code[$i]}\")\'>{$name[$i]}</a>\r\n		</td>\r\n	</tr>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'misc','emoticon_wrapper','<script language=\'javascript\'>\r\n\r\n	function add_smilie(text)\r\n	{\r\n		opener.document.REPLIER.body.value += \" \" + text + \" \";\r\n\r\n	}\r\n\r\n</script>\r\n<table class=\"maintable\" cellpadding=\'6\' cellspacing=\'1\' width=\"95%\">\r\n	<tr>\r\n		<td class=\"header\" colspan=\"2\"><lang:emoticon_legend>:</td>\r\n	</tr>\r\n	<tr>\r\n		<th class=\"cellone\" colspan=\'2\'>( <a href=\'javascript:this.close()\'><lang:close_window></a> )</th>\r\n	</tr>\r\n	{$list}\r\n	<tr>\r\n		<td class=\"footer\" colspan=\"2\">&nbsp;</td>\r\n	</tr>\r\n</table>'),
 (1,'mod','topic_editor','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {$bread_crumb} / <a href=\"<sys:gate>?gettopic={$this->_id}\" title=\"\">{$topic[\'topics_title\']}</a> / <lang:mod_edit_title>\r\n</div>\r\n<form method=\"post\" action=\"<sys:gate>?a=mod&amp;CODE=03&amp;t={$this->_id}\">\r\n	<div class=\"formwrap\">\r\n		<h3><lang:mod_form_title> {$topic[\'topics_title\']}</h3>\r\n		<h4><lang:mod_form_tip></h4>\r\n		<h3><lang:mod_field_title></h3>\r\n		<h4><lang:mod_field_title_tip></h4>\r\n		<input type=\"text\" name=\"title\" value=\"{$topic[\'topics_title\']}\" />\r\n		<h3><lang:mod_field_subject></h3>\r\n		<h4><lang:mod_field_subject></h4>\r\n		<input type=\"text\" name=\"subject\" value=\"{$topic[\'topics_subject\']}\" />\r\n		<h3><lang:mod_field_views></h3>\r\n		<h4><lang:mod_field_views_tip></h4>\r\n		<input type=\"text\" name=\"views\" value=\"{$topic[\'topics_views\']}\" />\r\n		{$mod_poll}\r\n		<p class=\"submit\">\r\n			<input class=\"button\" type=\"submit\" name=\"submit\" value=\"<lang:mod_edit_button_submit>\" />&nbsp;\r\n			<input class=\"reset\" type=\"reset\" value=\"<lang:mod_button_reset>\" />\r\n		</p>\r\n		<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n	</div>\r\n</form>'),
 (1,'notes','notes_reply_form','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=notes\" title=\"\"><lang:notes_inbox_title></a> / <a href=\"<sys:gate>?a=notes&amp;CODE=01&amp;nid={$this->_id}\" title=\"\">{$bread_title}</a> / <lang:notes_reply_crumb_title>\r\n</div>\r\n{$error_list}\r\n<script language=\"javascript\">\r\nfunction check_length()\r\n{\r\n	var limit  = <conf:max_post> * 1000;\r\n	var length = document.REPLIER.body.value.length;\r\n\r\n	if ( (length > limit) ) {\r\n		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');\r\n	} else {\r\n		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);\r\n	}\r\n\r\n}\r\n</script>\r\n<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>\r\n<a name=\"qwiknote\"></a>\r\n<form method=\"POST\" action=\"<sys:gate>?a=notes&amp;CODE=02&amp;nid={$this->_id}\" name=\"REPLIER\">\r\n	<div class=\"formwrap\">\r\n		<h3><lang:notes_reply_title> {$note[\'notes_title\']}</h3>\r\n		<h4><lang:form_send_tip></h4>\r\n		<h3><lang:post_field_recipient_title>:</h3>\r\n		<h4><lang:post_field_recipient_tip> ( <a href=\'<sys:gate>?a=members\'><lang:post_field_recipient_link_search></a> )</h4>\r\n		<input type=\'text\' name=\'recipient\' value=\'{$recipient}\' tabindex=\'1\' />\r\n		<h3><lang:post_field_title>:</h3>\r\n		<h4><lang:post_field_title_tip>.</h4>\r\n		<input type=\'text\' name=\'title\' value=\"{$note[\'notes_title\']} \"tabindex=\'2\' />\r\n		{$bbcode}\r\n		<h3><lang:post_emoticon_title></h3>\r\n		<h4><lang:post_emoticon_tip></h4>\r\n		{$emoticons}\r\n		<h3><lang:post_message_title></h3>\r\n		<h4><lang:post_message_tip> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:post_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:post_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:post_link_length></a> )</h4>\r\n		<textarea name=\"body\" tabindex=\'3\'>{$body}</textarea>\r\n		<h3><lang:post_field_quote></h3>\r\n		<h4><lang:post_field_quote_tip></h4>\r\n		<textarea name=\"quote\" tabindex=\'3\'>{$quote}</textarea>\r\n		<h3><lang:post_options></h3>\r\n		<h4><lang:post_options_tip>.</h4>\r\n		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_code></p>\r\n		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_emoticon></p>\r\n		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:post_button_send>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:post_button_reset>\" /></p>\r\n		<input type=\'hidden\' name=\"id\" value=\"{$this->_id}\" />\r\n		<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n	</div>\r\n</form>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'notes','notes_send_form','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <a href=\"<sys:gate>?a=notes\" title=\"\"><lang:notes_main_title></a> <macro:txt_bread_sep> <lang:notes_new_crumb_title>\r\n</div>\r\n{$error_list}\r\n<script language=\"javascript\">\r\n	function check_length()\r\n	{\r\n		var limit  = <conf:max_post> * 1000;\r\n		var length = document.REPLIER.body.value.length;\r\n\r\n		if ( (length > limit) ) {\r\n			alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');\r\n		} else {\r\n			alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);\r\n		}\r\n	}\r\n	</script>\r\n	<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>\r\n	<a name=\"qwiknote\"></a>\r\n	<form method=\"POST\" action=\"<sys:gate>?a=notes&amp;CODE=02\" name=\"REPLIER\">\r\n		<div class=\"formwrap\">\r\n			<h3><lang:notes_send_title></h3>\r\n			<p class=\"checkwrap\"><lang:form_send_tip></p>\r\n			<h3><lang:post_field_recipient_title>:</h3>\r\n			<h4><lang:post_field_recipient_tip> ( <a href=\'<sys:gate>?a=members\'><lang:post_field_recipient_link_search></a> )</h4>\r\n			<input type=\'text\' name=\'recipient\' value=\'{$to}\' tabindex=\'1\'  />\r\n			<h3><lang:post_field_title>:</h3>\r\n			<h4><lang:post_field_title_tip>.</h4>\r\n			<input type=\'text\' name=\'title\' tabindex=\'2\' value=\"{$title}\" />\r\n			{$bbcode}\r\n			<h3><lang:post_emoticon_title></h3>\r\n			<h4><lang:post_emoticon_tip></h4>\r\n			{$emoticons}\r\n			<h3><lang:post_message_title></h3>\r\n			<h4><lang:post_message_tip> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:post_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:post_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:post_link_length></a> )</h4>\r\n			<textarea name=\"body\" tabindex=\'3\'>{$body}</textarea>\r\n			<h3><lang:post_options></h3>\r\n			<h4><lang:post_options_tip>.</h4>\r\n			<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_code></p>\r\n			<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" checked=\"checked\" /> <lang:post_options_emoticon></p>\r\n			<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:post_button_send>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:post_button_reset>\" /></p>\r\n			<input type=\'hidden\' name=\'redirect\' value=\'new\' />\r\n			<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n		</div>\r\n	</form>'),
 (1,'notes','note_none','							<tr>\r\n								<td class=\"cellone\" align=\"center\" colspan=\"5\"><strong><lang:no_notes></strong></td>\r\n							</tr>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'notes','note_read','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=notes\" title=\"\"><lang:notes_inbox_title></a> / <lang:notes_read_crumb_title> {$row[\'notes_title\']}\r\n</div>\r\n<div class=\"postbutton\">\r\n	<a href=\'<sys:gate>?a=notes&amp;CODE=3&amp;nid={$this->_id}&amp;send={$row[\'members_name\']}\'><macro:btn_note_reply></a>&nbsp;<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>\r\n</div>\r\n<div class=\"postwrap\">\r\n	<div class=\"postheader\">{$row[\'notes_title\']}</div>\r\n	<div class=\"user\">\r\n		<a name=\"{$row[\'notes_id\']}\"></a>\r\n		<p><a href=\"<sys:gate>?getuser={$row[\'members_id\']}\" title=\"<lang:entry_link_profile>\"><strong>{$row[\'members_name\']}</strong></a> <em>( <a href=\"<sys:gate>?a=search&CODE=02&mid={$row[\'members_id\']}\" title=\"<lang:entry_post_find> {$row[\'members_name\']}\">{$row[\'members_posts\']}</a> )</em>\r\n		<span><strong>&middot; <lang:posted_group></strong> {$row[\'class_title\']}</span>\r\n		<span><strong>&middot; <lang:entry_rank></strong> {$row[\'members_pips\']}</span></p>\r\n		{$avatar}<div style=\"clear:both;\" /></div>\r\n	</div>\r\n	<div class=\"post\">\r\n		<h5><span><a href=\"<sys:gate>?a=notes&amp;CODE=04&amp;nid={$row[\'notes_id\']}\" title=\"<lang:read_button_delete>\" onclick=\"javascript: return confirm(\'<lang:read_delete_confirm>\');\"><img src=\"<sys:skinPath>/post_delete.gif\" alt=\"<lang:read_delete_confirm>\" /></a></span><strong><lang:sent_on></strong> {$row[\'notes_date\']}</h5>\r\n		<p>{$row[\'notes_body\']}</p>{$sig}\r\n	</div>\r\n	<div class=\"foot\">\r\n		<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:read_link_top_title>.\"><lang:read_link_top></a></span>\r\n		<ul class=\"extras\">{$linkSpan}</ul>\r\n	</div>\r\n	<div class=\"postend\">&nbsp;</div>\r\n</div>\r\n<div class=\"postbutton\">\r\n	<a href=\'<sys:gate>?a=notes&amp;CODE=3&amp;nid={$this->_id}&amp;send={$row[\'members_name\']}\'><macro:btn_note_reply></a>&nbsp;<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>\r\n</div>'),
 (1,'notes','note_row','<tr>\r\n	<td class=\'cellone\' align=\"center\"><a href=\'<sys:gate>?a=notes&amp;CODE=06&amp;nid={$row[\'notes_id\']}\'>{$row[\'notes_marker\']}</a></td>\r\n	<td class=\'celltwo\'><a href=\'<sys:gate>?a=notes&amp;CODE=01&amp;nid={$row[\'notes_id\']}\'>{$row[\'notes_title\']}</a></td>\r\n	<td class=\'cellone\' align=\"center\"><a href=\'<sys:gate>?getuser={$row[\'notes_sender\']}\'><strong>{$row[\'members_name\']}</strong></a></td>\r\n	<td class=\'celltwo\' align=\"center\">{$row[\'notes_date\']}</td>\r\n	<td class=\'celllast\' align=\"center\"><a href=\"<sys:gate>?a=notes&amp;CODE=04&amp;nid={$row[\'notes_id\']}\" title=\"\" onclick=\"javascript: return confirm(\'<lang:read_delete_confirm>?\');\"><b><lang:read_delete_title></b></a></td>\r\n</tr>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'notes','note_table','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <lang:notes_main_title>\r\n</div>\r\n<div class=\"postbutton\">\r\n	<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>\r\n</div>\r\n<div class=\"bar\">\r\n	{$pages}\r\n</div>\r\n<div class=\"maintable\">\r\n	<table cellpadding=\"6\" cellspacing=\"1\" width=\"100%\">\r\n		<tr>\r\n			<td class=\"header\" colspan=\"5\"><lang:note_your_notes> ( {$filled}% <lang:note_full> )</td>\r\n		</tr>\r\n		<tr>\r\n			<th align=\"left\" width=\"5%\">&nbsp;</td>\r\n			<th align=\"left\" width=\"35%\"><lang:note_col_title></td>\r\n			<th align=\"center\" width=\"20%\"><lang:note_col_sender></td>\r\n			<th align=\"center\" width=\"25%\"><lang:note_col_recieved></td>\r\n			<th width=\"5%\">&nbsp;</td>\r\n		</tr>\r\n		{$list}\r\n		<tr>\r\n			<td class=\"footer\" colspan=\"5\">&nbsp;</td>\r\n		</tr>\r\n	</table>\r\n</div>\r\n<div class=\"bar\">\r\n	{$pages}\r\n</div>\r\n<div class=\"postbutton\">\r\n	<a href=\"<sys:gate>?a=notes&amp;CODE=07\" title=\"\"><macro:btn_note_send></a>&nbsp;<a href=\"<sys:gate>?a=notes&amp;CODE=05\" title=\"\" onclick=\"javascript: return confirm(\'<lang:empty_inbox_confirm>?\');\"><macro:btn_delete_note></a>\r\n</div>'),
 (1,'post','bbcode_field','	<div id=\'bbcode_panel\' style=\'display: none;\'>\r\n		<h3><lang:bb_title></h3>\r\n		<h4><lang:bb_title_tip></h4>\r\n		<table cellpadding=\'3\' cellspacing=\'0\'>\r\n			<tr>\r\n				<td align=\'left\'>\r\n					<input type=\'button\' class=\'bbcode\' value=\' U \' onClick=\'codeBasic(this)\' name=\'u\' />\r\n					<input type=\'button\' class=\'bbcode\' value=\' I \' onClick=\'codeBasic(this)\' name=\'i\' />\r\n					<input type=\'button\' class=\'bbcode\' value=\' B \' onClick=\'codeBasic(this)\' name=\'b\' /> \r\n					<select name=\'FONT\' style=\'width: 100px;\' onchange=\'fontFace(this.options[this.selectedIndex].value)\'>\r\n						<option value=\'0\'><lang:bb_select_font></option>\r\n						<option style=\'font-family: tahoma; font-weight: bold;\' value=\'Arial\'>Tahoma</option>\r\n						<option style=\'font-family: times; font-weight: bold;\' value=\'Times\'>Times</option>\r\n						<option style=\'font-family: courier; font-weight: bold;\' value=\'Courier\'>Courier</option>\r\n						<option style=\'font-family: impact; font-weight: bold;\' value=\'Impact\'>Impact</option>\r\n						<option style=\'font-family: geneva; font-weight: bold;\' value=\'Geneva\'>Geneva</option>\r\n						<option style=\'font-family: optima; font-weight: bold;\' value=\'Optima\'>Optima</option>\r\n					</select>\r\n					<select name=\'SIZE\' style=\'width: 100px;\' onchange=\'fontSize(this.options[this.selectedIndex].value)\'>\r\n						<option value=\'0\'><lang:bb_select_size></option>\r\n						<option value=\'1\'><lang:bb_size_small></option>\r\n						<option value=\'7\'><lang:bb_size_large></option>\r\n						<option value=\'14\'><lang:bb_size_largest></option>\r\n					</select>\r\n					<select name=\'COLOR\' style=\'width: 100px;\' onchange=\'fontColor(this.options[this.selectedIndex].value)\'>\r\n						<option value=\'0\'><lang:bb_select_color></option>\r\n						<option value=\'blue\' style=\'color:blue\'><lang:bb_color_blue></option>\r\n						<option value=\'red\' style=\'color:red\'><lang:bb_color_red></option>\r\n						<option value=\'purple\' style=\'color:purple\'><lang:bb_color_purple></option>\r\n						<option value=\'orange\' style=\'color:orange\'><lang:bb_color_orange></option>\r\n						<option value=\'yellow\' style=\'color:yellow\'><lang:bb_color_yellow></option>\r\n						<option value=\'gray\' style=\'color:gray\'><lang:bb_color_gray></option>\r\n						<option value=\'green\' style=\'color:green\'><lang:bb_color_green></option>\r\n					</select>\r\n				</td>\r\n			</tr>\r\n			<tr>\r\n				<td align=\'left\'>\r\n					<input type=\'button\' class=\'bbcode\' value=\' # \' onClick=\'codeBasic(this)\' name=\'code\' />\r\n					<input type=\'button\' class=\'bbcode\' value=\' \"QUOTE\" \' onClick=\'codeBasic(this)\' name=\'quote\' /> \r\n					<input type=\'button\' class=\'bbcode\' value=\' List \' onClick=\'codeList()\' /> \r\n					<input type=\'button\' class=\'bbcode\' value=\' IMG \' onClick=\'codeBasic(this)\' name=\'img\' /> \r\n					<input type=\'button\' class=\'bbcode\' value=\' @ \' onClick=\'codeBasic(this)\' name=\'email\' /> \r\n					<input type=\'button\' class=\'bbcode\' value=\' URL \' onClick=\'codeBasic(this)\' name=\'url\' /> \r\n				</td>\r\n			</tr>\r\n		</table>\r\n		<p class=\"checkwrap\"><input type=\'radio\' class=\"check\" name=\'mode\' value=\'adv\' checked=\'checked\' /> <b><lang:bb_mode_advanced></b> <lang:bb_mode_advanced_tip>.</p>\r\n		<p class=\"checkwrap\"><input type=\'radio\' class=\"check\" name=\'mode\' value=\'simple\'/> <b><lang:bb_mode_simple></b> <lang:bb_mode_simple_tip>.</p>\r\n	</div>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'post','emoticons_field','		<h3><lang:post_emoticon_title></h3>\r\n		<h4><lang:post_emoticon_tip></h4>\r\n		{$smilies}'),
 (1,'post','form_wrapper','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> {$bread_crumb}\r\n</div>\r\n{$errors}\r\n<script language=\'javascript\'>\r\nfunction check_length()\r\n{\r\n	var limit  = <conf:max_post> * 1000;\r\n	var length = document.REPLIER.body.value.length;\r\n		if ( (length > limit) ) {\r\n		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');\r\n	} else {\r\n		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);\r\n	}\r\n\r\n}\r\n</script>\r\n<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>\r\n<form method=\"POST\" action=\"{$this->_form_action}\" name=\"REPLIER\" {$this->_form_multipart}>\r\n	<div class=\"formwrap\">\r\n		<h3>{$this->_form_title}</h3>\r\n		<p class=\"checkwrap\">{$this->_form_tip}</p>\r\n		{$recipient}\r\n		{$name}\r\n		{$title}\r\n		{$subject}\r\n		{$bbcode}\r\n		{$emoticons}\r\n		<h3><lang:post_message_title></h3>\r\n		<h4><lang:post_message_tip> (  <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:post_link_bbcode></a> · <a href=\'javascript:smilie_window(\"<sys:gate>\")\'><lang:post_link_emoticons></a> · <a href=\'javascript:check_length()\'><lang:post_link_length></a> )</h4>\r\n		<textarea name=\"body\" rows=\"5\" tabindex=\"1\">{$message}</textarea>\r\n		{$quote}\r\n		{$convert}\r\n		{$upload}\r\n		{$tools}\r\n		<p class=\"submit\">\r\n			<input class=\"button\" type=\"submit\" tabindex=\"2\" value=\"{$this->_form_submit}\" />&nbsp;\r\n			<input class=\"reset\" type=\"reset\" value=\"<lang:form_button_reset>\" />\r\n		</p>\r\n		<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n		{$hidden}\r\n	</div>\r\n</form>'),
 (1,'post','quote_field','		<h3><lang:post_field_quote></h3>\r\n		<h4><lang:post_field_quote_tip></h4>\r\n		<textarea name=\"quote\">{$message}</textarea>\r\n		{$hidden}');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'post','smilie_wrapper','<table class=\"emoticon\" cellpadding=\"0\" cellspacing=\"0\">\r\n	{$smilies}\r\n</table>'),
 (1,'post','form_field_title','		<h3><lang:post_field_title></h3>\r\n		<h4><lang:post_field_title_tip></h4>\r\n		<input type=\"text\" name=\"title\" tabindex=\"1\" value=\"{$title}\" />'),
 (1,'profile','profile_table','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:profile_title> {$row[\'members_name\']}\r\n</div>\r\n<div id=\"left_column\">\r\n	<div class=\"formwrap\">\r\n		<h3><lang:profile_name></h3>\r\n		<h4>{$row[\'members_name\']} ( {$row[\'class_prefix\']}{$row[\'class_title\']}{$row[\'class_suffix\']} )</h4>\r\n		<h3><lang:profile_last_visit></h3>\r\n		<h4>{$row[\'members_lastvisit\']}</h4>\r\n		<h3><lang:profile_registered></h3>\r\n		<h4>{$row[\'members_registered\']}</h4>\r\n		<h3><lang:profile_birthday></h3>\r\n		<h4>{$birthday}</h4>\r\n		<h3><lang:profile_stats></h3>\r\n		<h4><a href=\'<sys:gate>?a=search&amp;CODE=02&amp;mid={$row[\'members_id\']}\'>{$row[\'members_posts\']}</a> <lang:profile_posts> ( {$row[\'members_per_day\']} / <lang:per_day> )</h4>\r\n		<h3><lang:profile_last_5></h3>\r\n		<ul>\r\n			{$topics}\r\n		</ul>\r\n		<h3><lang:profile_location></h3>\r\n		<h4>{$row[\'members_location\']}</h4>\r\n	</div>\r\n</div>\r\n<div id=\"right_column\">\r\n	<div class=\"formwrap\">\r\n		<h3><lang:profile_home></h3>\r\n		<h4>{$row[\'members_homepage\']}</h4>\r\n		<h3><lang:profile_aol></h3>\r\n		<h4>{$row[\'members_aim\']}</h4>\r\n		<h3><lang:profile_yim></h3>\r\n		<h4>{$row[\'members_yim\']}</h4>\r\n		<h3><lang:profile_msn></h3>\r\n		<h4>{$row[\'members_msn\']}</h4>\r\n		<h3><lang:profile_icq></h3>\r\n		<h4>{$row[\'members_icq\']}</h4>\r\n		<h3><lang:profile_other></h3>\r\n		<ul>\r\n			<li><a href=\'<sys:gate>?a=notes&amp;CODE=07&amp;send={$row[\'members_id\']}\'><lang:profile_link_note></a></li>\r\n			<li><a href=\'<sys:gate>?a=email&amp;id={$row[\'members_id\']}\'><lang:profile_link_email></a></li>\r\n		</ul>\r\n	</div>\r\n</div>\r\n<div id=\"signature\">\r\n	<div class=\"formwrap\">\r\n		<h3><lang:profile_sig></h3>\r\n		<p class=\"sig\">{$row[\'members_sig\']}</p>\r\n	</div>\r\n</div>'),
 (1,'read','container_read','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {$bread_crumb} / {$topic[\'topics_title\']}\r\n</div>\r\n{$buttons}\r\n<div class=\"bar\">\r\n	<span><a href=\"<sys:gate>?a=print&amp;t={$topic[\'topics_id\']}\" title=\"<lang:print_view_tip>\" target=\"_blank\"><strong><lang:print_view></strong></a> &middot; <a href=\"<sys:gate>?gettopic={$topic[\'topics_id\']}&amp;CODE=01\" title=\"<lang:subscribe_tip>\"><strong><lang:subscribe></strong></a></span>\r\n	{$pages}\r\n</div>\r\n{$content}\r\n<div class=\"bar\">\r\n	<span><a href=\"<sys:gate>?gettopic={$topic[\'topics_id\']}&amp;CODE=03&amp;forum={$topic[\'topics_forum\']}\" title=\"<lang:previous>\"><strong><lang:previous></strong></a> &middot; <a href=\"<sys:gate>?a=topics&amp;forum={$topic[\'topics_forum\']}\" title=\"<lang:index>\"><strong><lang:index></strong></a> &middot; <a href=\"<sys:gate>?gettopic={$topic[\'topics_id\']}&amp;CODE=04&amp;forum={$topic[\'topics_forum\']}\" title=\"<lang:next>\"><strong><lang:next></strong></a></span>\r\n	{$pages}\r\n</div>\r\n{$buttons}\r\n{$mod}\r\n{$jump}\r\n{$replier}\r\n{$readers}');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'read','post_row','<div class=\"user\">\r\n	<a name=\"{$row[\'posts_id\']}\"></a>\r\n	<p><a href=\"<sys:gate>?getuser={$row[\'members_id\']}\" title=\"<lang:entry_link_profile>\"><strong>{$row[\'members_name\']}</strong></a> <em>( <a href=\"<sys:gate>?a=search&CODE=02&mid={$row[\'members_id\']}\" title=\"<lang:entry_post_find> {$row[\'members_name\']}\">{$row[\'members_posts\']}</a> )</em>\r\n	<span><strong>&middot; <lang:posted_group></strong> {$row[\'class_title\']}</span>\r\n	<span><strong>&middot; <lang:entry_rank></strong> {$row[\'members_pips\']}</span></p>\r\n	{$avatar}<div style=\"clear:both;\" /></div>\r\n</div>\r\n<div class=\"post\">\r\n	<h5><span>{$linkDelete}{$linkEdit}{$linkQuote}</span><strong><lang:posted_on></strong> {$row[\'posts_date\']}</h5>\r\n	<p>{$row[\'posts_body\']}</p>{$attach}{$sig}\r\n</div>\r\n<div class=\"foot\">\r\n	<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:entry_link_top_tip>\"><lang:entry_link_top></a></span>\r\n	<ul class=\"extras\"><li>{$active}</li>{$linkSpan}</ul>\r\n</div>\r\n<div class=\"postend\">&nbsp;</div>'),
 (1,'read','post_row_guest','<div class=\"user\">\r\n	<a name=\"{$row[\'posts_id\']}\"></a>\r\n	<p><strong>{$row[\'posts_author_name\']}</strong>\r\n	<span><strong>&middot; <lang:posted_group></strong> {$row[\'class_title\']}</span></p>\r\n	<img src=\"<sys:skinPath>/ava_none.gif\" class=\"avatar\" alt=\"\" title=\"\" />\r\n</div>\r\n<div class=\"post\">\r\n	<h5><span>{$linkDelete}{$linkEdit}{$linkQuote}</span><strong><lang:posted_on></strong> {$row[\'posts_date\']}</h5>\r\n	<p>{$row[\'posts_body\']}</p>{$attach}\r\n</div>\r\n<div class=\"foot\">\r\n	<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:entry_link_top_tip>\"><lang:entry_link_top></a></span>\r\n	&nbsp;\r\n</div>\r\n<div class=\"postend\">&nbsp;</div>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'read','post_table','{$poll_data}\r\n<div class=\"postwrap\">\r\n        <div class=\"postheader\">{$topic[\'topics_title\']}</div>\r\n        {$list}\r\n</div>'),
 (1,'read','read_active','<div class=\"infowrap\">\r\n	<h1><lang:readers_title></h1>\r\n	<h2><lang:readers_user_summary> ( <a href=\"<sys:gate>?a=active\" title=\"\"><lang:active_link_details></a> )</h2>\r\n	<p>{$list}</p>\r\n</div>'),
 (1,'read','read_buttons','<div class=\"postbutton\">\r\n	<p class=\"links\">&nbsp;</p>\r\n	{$button_reply} {$button_qwik} {$button_topic} {$button_poll}\r\n</div>'),
 (1,'read','reply_bit','<div id=\"qwikwrap\" style=\"display: none;\">\r\n	<script language=\"javascript\">\r\n	function check_length()\r\n	{\r\n		var limit  = <conf:max_post> * 1000;\r\n		var length = document.REPLIER.body.value.length;\r\n\r\n		if ( (length > limit) ) {\r\n			alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');\r\n		} else {\r\n			alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);\r\n		}\r\n\r\n	}\r\n	</script>\r\n	<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>\r\n	<a name=\"qwik\"></a>\r\n	<form method=\"post\" action=\"<sys:gate>?a=post&amp;CODE=01&amp;t={$this->_id}&amp;qwik=1\" name=\"REPLIER\">\r\n		<div class=\"formwrap\">\r\n			<h3><lang:qwik_title>.</h3>\r\n			<p class=\"checkwrap\"><lang:qwik_title_tip>.</p>\r\n			<h3><lang:qwik_field_body>:</h3>\r\n			<h4><lang:qwik_field_body_tip> (<a href=\'javascript:smilie_window(\"<sys:gate>\");\' title=\"<lang:qwik_link_emoticons>\"><lang:qwik_link_emoticons></a> &middot; <a href=\"javascript:check_length();\" title=\"<lang:qwik_link_length>\"><lang:qwik_link_length></a>)</h2>\r\n			<textarea name=\"body\" rows=\"\" cols=\"\"></textarea>\r\n			<p class=\"submit\">\r\n				<input class=\"button\" type=\"submit\" value=\"<lang:qwik_button_submit>\" />&nbsp;\r\n				<input class=\"reset\" type=\"reset\" value=\"<lang:qwik_button_reset>\" />\r\n			</p>\r\n			<input type=\"hidden\" name=\"cOption\" value=\"1\" />\r\n			<input type=\"hidden\" name=\"eOption\" value=\"1\" />\r\n			<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n		</div>\r\n	</form>\r\n</div>'),
 (1,'ucp','ucp_general','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>\r\n</div>\r\n{$ucp_tabs}\r\n{$error_list}\r\n<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=02\'>\r\n	<div class=\"formwrap\">\r\n		<h3><lang:gen_title></h3>\r\n		<p class=\"checkwrap\"><lang:gen_tip></p>\r\n		<h3><lang:gen_field_location></h3>\r\n		<h4><lang:gen_field_location_tip></h4>\r\n		<input type=\"text\" name=\"location\" value=\"{$location}\" />\r\n		<h3><lang:gen_field_website></h3>\r\n		<h4><lang:gen_field_website_tip></h4>\r\n		<input type=\"text\" name=\"homepage\" value=\"{$homepage}\" />\r\n		<h3><lang:gen_field_birthday></h3>\r\n		<h4><lang:gen_field_birthday_tip></h4>\r\n		<p class=\"checkwrap\">\r\n			<select name=\'bmonth\'>\r\n				{$months}\r\n			</select>\r\n			&nbsp;\r\n			<select name=\'bday\'>\r\n				{$days}\r\n			</select>\r\n			&nbsp;\r\n			<select name=\'byear\'>\r\n				{$years}\r\n			</select>\r\n		</p>\r\n		<h3><lang:gen_field_aim></h3>\r\n		<h4><lang:gen_field_aim_tip></h4>\r\n		<input type=\"text\" name=\"aim\" value=\"{$aim}\" />\r\n		<h3><lang:gen_field_icq></h3>\r\n		<h4><lang:gen_field_icq_tip></h4>\r\n		<input type=\"text\" name=\"icq\" value=\"{$icq}\" />\r\n		<h3><lang:gen_field_yim></h3>\r\n		<h4><lang:gen_field_yim_tip></h4>\r\n		<input type=\"text\" name=\"yim\" value=\"{$yim}\" />\r\n		<h3><lang:gen_field_msn></h3>\r\n		<h4><lang:gen_field_msn_tip></h4>\r\n		<input type=\"text\" name=\"msn\" value=\"{$msn}\" />\r\n		<p class=\"submit\">\r\n			<input class=\"button\" type=\"submit\" value=\"<lang:gen_button_submit>\" />&nbsp;\r\n			<input class=\"reset\" type=\"reset\" value=\"<lang:gen_button_reset>\" />\r\n		</p>\r\n		<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n	</div>\r\n</form>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'read','sig','<p class=\"sig\">{$row[\'members_sig\']}</p>'),
 (1,'register','form_register','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:register_crumb_title>\r\n</div>\r\n{$error_list}\r\n<form method=\"post\" action=\"<sys:gate>?a=register&amp;CODE=01\">\r\n	<div class=\"formwrap\">\r\n		<h3><lang:registration_title></h3>\r\n		<p class=\"checkwrap\"><lang:registration_tip></p>\r\n		<h3><lang:field_username></h3>\r\n		<h4><lang:field_username_tip></h4>\r\n		<input type=\"text\" name=\"username\" value=\"{$username}\" />\r\n		<h3><lang:field_pass></h3>\r\n		<h4><lang:field_pass_tip></h4>\r\n		<input type=\"password\" name=\"password\" />\r\n		<h3><lang:field_con_pass></h3>\r\n		<h4><lang:field_con_pass_tip></h4>\r\n		<input type=\"password\" name=\"cpassword\" />\r\n		<h3><lang:field_email></h3>\r\n		<h4><lang:field_email_tip></h4>\r\n		<input type=\"text\" name=\"email\" value=\"{$email_one}\" />\r\n		<h3><lang:field_con_email></h3>\r\n		<h4><lang:field_con_email_tip></h4>\r\n		<input type=\"text\" name=\"cemail\" value=\"{$email_two}\" />\r\n		<h3><lang:field_terms></h3>\r\n		<h4><lang:field_terms_tip></h4>\r\n		<textarea rows=\"\" cols=\"\"><lang:field_terms_content></textarea>\r\n		<p class=\"checkwrap\"><input class=\"check\" type=\"checkbox\" name=\"contract\" {$contract} /> <strong><lang:field_agree></strong></p>\r\n		{$coppa_field}\r\n		<p class=\"submit\">\r\n			<input class=\"button\" type=\"submit\" value=\"<lang:button_submit>\" />&nbsp;\r\n			<input class=\"reset\" type=\"reset\" value=\"<lang:button_reset>\" />\r\n		</p>\r\n		<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n	</div>\r\n</form>'),
 (1,'mailer','mail_validate_user','Hello, {$username}\r\n\r\nOur records indicate that you have just attempted to register a new account with our board.\r\nCurrently, the administrator of this community thinks it best to first validate all new \r\nuser accounts to prevent spamming and abuse. To activate your account you only need to click\r\non the link below. Once you do this the system will allow you to log in to your account.\r\n\r\nActivation Key:\r\n\r\n<conf:site_link><sys:gate>?a=register&CODE=02&key={$key}');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'search','by_user_row','<div id=\"resultwrap\">\r\n	<h4><a href=\"<sys:gate>?a=read&amp;CODE=02&amp;p={$row[\'posts_id\']}\" title=\"\"><b>{$row[\'topics_title\']}</b></a> | <span>{$row[\'posts_date\']}</span></h4>\r\n	<div class=\"post\"><p>{$row[\'posts_body\']}</p></div>\r\n</div>'),
 (1,'search','by_user_table','<div id=\"crumb_nav\">\r\n<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <strong>{$count}</strong> <lang:search_result_user_title> <strong>{$user}</strong>:\r\n</div>\r\n<div class=\"bar\">{$pages}</div>\r\n{$list}\r\n<div class=\"bar\">{$pages}</div>'),
 (1,'search','search_form','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:search_form_title>:\r\n</div>\r\n<script language=\"javascript\">\r\n\r\n	function selectAll(list, select)\r\n	{\r\n		var list = document.getElementById(list);\r\n		\r\n		for (var i = 0; i < list.length; i++)\r\n		{\r\n			list.options[i].selected = select.checked;\r\n		}\r\n	}\r\n\r\n</script>\r\n<form method=\"post\" action=\"<sys:gate>?a=search&CODE=01\">\r\n	<div class=\"formwrap\">\r\n		<h3><lang:search_form_field_phrase></h3>\r\n		<h4><lang:search_form_field_phrase_tip></h4>\r\n		<input type=\"text\" name=\"keywords\" value=\"{$this->_phrase}\" />\r\n		<h3><lang:search_form_type>:</h3>\r\n		<h4><lang:search_form_type_tip>.</h4>\r\n		<p class=\"checkwrap\">\r\n			<input type=\"radio\" name=\"mode\" class=\"check\" value=\"match\" checked=\"checked\" /> <strong><lang:search_form_basic></strong>&nbsp;\r\n			<span id=\"matchtype\">\r\n				<input type=\"checkbox\" name=\"type\" class=\"check\" value=\"1\" /> <lang:search_form_basic_exact>\r\n			</span>\r\n		</p>\r\n		<p class=\"checkwrap\">\r\n			<input type=\"radio\" name=\"mode\" class=\"check\" value=\"full\" /> <strong><lang:search_form_full></strong> &nbsp;\r\n			<span id=\"limit\">\r\n				<select name=\"limit\">\r\n					<option value=\"10\" selected=\"selected\">10</option>\r\n					<option value=\"20\">20</option>\r\n					<option value=\"30\">30</option>\r\n					<option value=\"40\">40</option>\r\n				</select> <lang:search_form_full_limit>\r\n			</span>\r\n		</p>\r\n		<h3><lang:search_form_forum_title></h3>\r\n		<h4><lang:search_form_forum_desc></h4>\r\n		<p class=\"checkwrap\">\r\n			<input type=\"checkbox\" name=\"all\" class=\"check\" value=\"all\" onclick=\"selectAll(\'forums\', this)\"/> <strong><lang:search_form_forum_all></strong>\r\n		</p>\r\n		<p class=\"checkwrap\">\r\n			<select name=\"forums[]\" size=\"5\" multiple=\"multiple\" class=\"big\" id=\"forums\">\r\n				{$search_list}\r\n			</select>\r\n		<p class=\"submit\">\r\n			<input class=\"button\" type=\"submit\" value=\"<lang:search_form_button_submit>\" />&nbsp;\r\n			<input class=\"reset\" type=\"reset\" value=\"<lang:search_form_button_reset>\" />\r\n		</p>\r\n	</div>\r\n</form>'),
 (1,'mod','move_topic','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {$bread_crumb} / <a href=\"<sys:gate>?gettopic={$this->_id}\" title=\"\">{$row[\'topics_title\']}</a> / <lang:mod_move_bread>\r\n</div>\r\n<form method=\"post\" action=\"<sys:gate>?a=mod&amp;CODE=05&amp;t={$this->_id}\">\r\n	<div class=\"formwrap\">\r\n		<h3><lang:mod_move_title></h3>\r\n		<h4><lang:mod_move_desc></h4>\r\n		<p class=\"checkwrap\">\r\n			<input type=\"checkbox\" name=\"link\" class=\"check\" value=\"1\"> <strong><lang:mod_move_link></strong>\r\n		</p>\r\n		<p class=\"checkwrap\">\r\n			<select name=\"forum\" size=\"5\" class=\"big\" id=\"forum\">\r\n				{$search_list}\r\n			</select>\r\n		<p class=\"submit\">\r\n			<input class=\"button\" type=\"submit\" value=\"<lang:mod_move_button_submit>\" />&nbsp;\r\n			<input class=\"reset\" type=\"reset\" value=\"<lang:mod_button_reset>\" />\r\n		</p>\r\n		<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n	</div>\r\n</form>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'topics','topic_jump_list','	<span>\r\n		<form method=\"post\" action=\"<sys:gate>?a=topics\">\r\n			<select name=\"forum\" class=\"jump\">\r\n				{$jump_list}\r\n			</select><input type=\"image\" src=\"<sys:skinPath>/btn_go.gif\" class=\"small_button\" value=\"<lang:forum_jump>\" />\r\n		</form>\r\n	</span>'),
 (1,'search','search_full_result_row','<tr>\r\n	<td class=\"cellone\" align=\"center\"><strong>{$row[\'topics_score\']}%</strong></td>\r\n	<td class=\"cellthree\" align=\"center\" valign=\"top\"><a href=\"<sys:gate>?gettopic={$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\">{$row[\'topics_marker\']}</a></td>\r\n	<td class=\"cellone\">{$row[\'topics_prefix\']} <a href=\"<sys:gate>?gettopic={$row[\'topics_id\']}&amp;hl={$hlLink}\" title=\"\">{$row[\'topics_title\']}</a> {$inlineNav}<span class=\"special\">-- {$row[\'topics_subject\']}</span></td>\r\n	<td class=\"celltwo\" align=\"center\"><strong>{$row[\'topics_posts\']}</strong></td>\r\n	<td class=\"cellone\" align=\"center\">{$row[\'topics_views\']}</td>\r\n	<td class=\"celltwo\" align=\"center\"><strong>{$row[\'topics_author\']}</strong></td>\r\n	<td class=\"cellone\" align=\"center\"><a href=\"<sys:gate>?getforum={$row[\'topics_forum\']}\" title=\"\">{$row[\'forum_name\']}</a></td>\r\n	<td class=\"celllast\" nowrap=\"nowrap\"><span><a href=\"<sys:gate>?gettopic={$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><macro:img_mini_box></a> {$row[\'topics_last\']}</span><lang:topic_last_replied>: <strong>{$row[\'topics_poster\']}</strong></td>\r\n</tr>'),
 (1,'search','search_full_result_table','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=search\" title=\"<lang:search_form_title>\"><lang:search_form_title></a> / <strong>{$count}</strong> <lang:search_result_title>:\r\n</div>\r\n<div class=\"maintable\">\r\n	<table cellpadding=\"0\" cellspacing=\"1\" width=\"100%\">\r\n		<tr>\r\n			<td class=\"header\" colspan=\"8\">{$count} <lang:search_result_title></td>\r\n		</tr>\r\n		<tr>\r\n			<th width=\"5%\"><lang:result_col_score></th>\r\n			<th width=\"5%\">&nbsp;</th>\r\n			<th width=\"30%\"><lang:result_col_title></th>\r\n			<th align=\"center\" width=\"10%\"><lang:result_col_replies></th>\r\n			<th align=\"center\" width=\"10%\"><lang:result_col_views></th>\r\n			<th align=\"center\" width=\"10%\"><lang:result_col_author></th>\r\n			<th align=\"center\" width=\"20%\"><lang:result_col_forum></th>\r\n			<th width=\"35%\"><lang:result_col_last></th>\r\n		</tr>\r\n		{$list}\r\n		<tr>\r\n			<td class=\"footer\" colspan=\"8\">&nbsp;</td>\r\n		</tr>\r\n	</table>\r\n</div>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'ucp','ucp_sig','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>\r\n</div>\r\n{$ucp_tabs}\r\n{$error_list}\r\n<script language=\"javascript\">\r\nfunction check_length()\r\n{\r\n	var limit  = <user:class_sigLength>;\r\n	var length = document.REPLIER.body.value.length;\r\n\r\n	if ( (length > limit) ) {\r\n		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');\r\n	} else {\r\n		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);\r\n	}\r\n\r\n}\r\n</script>\r\n<script language=\"Javascript\" src=\"<sys:skinPath>/js/bbcode.js\"></script>\r\n<form method=\'post\' action=\'<sys:gate>?a=ucp&amp;CODE=04\' name=\"REPLIER\">\r\n	<div class=\"formwrap\">\r\n		<h3><lang:sig_title></h3>\r\n		<p class=\"checkwrap\"><lang:sig_tip></p>\r\n		<h3><lang:sig_field_current></h3>\r\n		<p class=\"sig\">{$parsed}</p>\r\n		{$bbcode}\r\n		<h3><lang:sig_emoticons></h3>\r\n		<h4><lang:sig_emoticons_tip></h4>\r\n		{$emoticons}\r\n		<h3><lang:sig_field_body></h3>\r\n		<h4><lang:sig_field_body_tip> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\" title=\"<lang:sig_link_code_title>\"><lang:sig_link_code></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\" title=\"<lang:sig_link_emoticons_tip>\"><lang:sig_link_emoticons></a> · <a href=\"javascript:check_length()\" title=\"<lang:sig_link_length_tip>\"><lang:sig_link_length></a> )</h4>\r\n		<textarea name=\"body\">{$sig}</textarea>\r\n		<p class=\"submit\">\r\n			<input class=\"button\" type=\"submit\" value=\"<lang:sig_button_submit>\" /> \r\n			<input class=\"reset\" type=\"reset\" value=\"<lang:sig_button_reset>\" />\r\n		</p>\r\n		<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n	</div>\r\n</form>'),
 (1,'ucp','ucp_pass','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>\r\n</div>\r\n{$ucp_tabs}\r\n{$error_list}\r\n<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=06\'>\r\n	<div class=\"formwrap\">\r\n		<h3><lang:pass_title></h3>\r\n		<p class=\"checkwrap\"><lang:pass_tip></p>\r\n		<h3><lang:pass_field_password></h3>\r\n		<h4><lang:pass_field_password_tip></h4>\r\n		<input type=\"password\" name=\"current\" />\r\n		<h3><lang:pass_field_new></h3>\r\n		<h4><lang:pass_field_new_tip></h4>\r\n		<input type=\"password\" name=\"new\" />\r\n		<h3><lang:pass_field_con></h3>\r\n		<h4><lang:pass_field_con_tip></h4>\r\n		<input type=\"password\" name=\"confirm\"\" />\r\n		<p class=\"submit\">\r\n			<input class=\"button\" type=\"submit\" value=\"<lang:pass_button_submit>\" />&nbsp;\r\n			<input class=\"reset\" type=\"reset\" value=\"<lang:pass_button_reset>\" />\r\n		</p>\r\n		<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n	</div>\r\n</form>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'global','page_wrapper','<macro:img_mini_pages> {$links}'),
 (1,'email','email_member_form','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:email_title>\r\n</div>\r\n{$error_list}\r\n<form method=\"post\" action=\"<sys:gate>?a=email&amp;CODE=01&amp;id={$this->_id}\">\r\n	<div class=\"formwrap\">\r\n		<h3><lang:email_form_title></h3>\r\n		<p class=\"checkwrap\"><lang:email_form_tip></p>\r\n		<h3><lang:email_form_subject></h3>\r\n		<h4><lang:email_form_subject_info></h4>\r\n		<input type=\'text\' name=\'subject\' tabindex=\'1\' value=\"{$subject}\" />\r\n		<h3><lang:email_form_body></h3>\r\n		<h4><lang:email_form_body_info></h4>\r\n		<textarea name=\'body\' rows=\'5\' tabindex=\'2\'>{$body}</textarea>\r\n		<p class=\"submit\">\r\n			<input class=\"button\" type=\"submit\" value=\"<lang:email_form_submit>\" />&nbsp;\r\n			<input class=\"reset\" type=\"reset\" value=\"<lang:email_form_reset>\" />\r\n		</p>\r\n		<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n	</div>\r\n</form>'),
 (1,'print','print_body','<script language=\"JavaScript\">\r\n	<!--\r\n	window.print();\r\n	-->\r\n</script>\r\n<div id=\"print\">\r\n	<h2><span><conf:title> ( <a href=\"<conf:site_link>\" title=\"\"><conf:site_link></a> )</span>{$topic[\'topics_title\']}</h2>\r\n	<p class=\"bar\"><b><lang:source>: <a href=\"#\" onclick=\"javascript: return prompt(\'<lang:link_copy_prompt>:\', \'<conf:site_link><sys:gate>?gettopic={$topic[\'topics_id\']}\');\"><conf:site_link><sys:gate>?gettopic={$this->_id}</a></b></p>\r\n	{$content}\r\n	<p class=\"bar\"><span><a href=\"javascript: scroll(0,0);\" title=\"\"><strong><lang:top></strong></a></span><strong><lang:source>: <a href=\"#\" onclick=\"javascript: return prompt(\'<lang:link_copy_prompt>:\', \'<conf:site_link><sys:gate>?gettopic={$topic[\'topics_id\']}\');\"><conf:site_link><sys:gate>?gettopic={$this->_id}</a></strong></p>\r\n	<div id=\"copyright\"><span>Powered By: <strong>MyTopix&trade; | Personal Message Board</strong> <conf:version></span>Copyright &copy;  2004,  <a href=\"http://www.jaia-interactive.com/\" title=\"<lang:visit_jaia>\">Jaia Interactive</a> all rights reserved.</div>\r\n</div>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'print','print_row','<h4><a href=\'<sys:gate>?getuser={$row[\'members_id\']}\'><strong>{$row[\'members_name\']}</strong></a> | <span>{$row[\'posts_date\']}</span></h4>\r\n<div class=\"post\">{$row[\'posts_body\']}</div>'),
 (1,'post','mod_option_lock','		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"lock\" value=\"1\" {$check[\'locked\']} /> <strong><lang:post_mod_options_lock></strong></p>'),
 (1,'post','post_name_field','		<h3><lang:post_field_name></h3>\r\n		<h4><lang:post_field_name_tip></h4>\r\n		<input type\"text\" name=\"name\" tabindex=\"1\" value=\"{$name}\" />'),
 (1,'global','global_banned','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a>\r\n</div>\r\n<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">\r\n	<div class=\"formwrap\">\r\n		<h3><lang:banned_title></h3>\r\n		<div id=\"warning\">\r\n			<h3><lang:err_warn_title></h3>\r\n			<p><strong><lang:banned_info></strong></p>\r\n		</div>\r\n		<h3><lang:banned_form_name_title></h3>\r\n		<h4><lang:banned_form_name_title_info></h4>\r\n		<input type=\'text\' name=\'username\' tabindex=\'1\' />\r\n		<h3><lang:banned_form_pass_title></h3>\r\n		<h4><lang:banned_form_pass_title_info></h4>\r\n		<input type=\'password\' name=\'password\' tabindex=\'2\' />\r\n		<p class=\"submit\">\r\n			<input class=\"button\" type=\"submit\" value=\"<lang:banned_form_submit>\" />&nbsp;\r\n			<input class=\"reset\" type=\"reset\" value=\"<lang:banned_form_reset>\" />\r\n		</p>\r\n		<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n	</div>\r\n</form>'),
 (1,'ucp','ucp_options','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>\r\n</div>\r\n{$ucp_tabs}\r\n<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=08\'>\r\n	<div class=\"formwrap\">\r\n		<h3><lang:board_title></h3>\r\n		<p class=\"checkwrap\"><lang:board_tip></p>\r\n		<h3><lang:board_field_skin></h3>\r\n		<h4><lang:board_field_skin_tip></h4>\r\n		<p class=\"checkwrap\"><select name=\"skin\">\r\n			{$skins}\r\n		</select></p>\r\n		<h3><lang:board_field_lang></h3>\r\n		<h4><lang:board_field_lang_tip></h4>\r\n		<p class=\"checkwrap\"><select name=\"lang\">\r\n			{$langs}\r\n		</select></p>\r\n		<h3><lang:board_field_zone></h3>\r\n		<h4><lang:board_field_zone_tip></h4>\r\n		<p class=\"checkwrap\"><select name=\"zone\">\r\n			{$zones}\r\n		</select></p>\r\n		<h3><lang:board_field_notify></h3>\r\n		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"email\" value=\"1\"{$checked[\'email\']} /> <b><lang:board_field_email>?</b></p>\r\n		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"notes\" value=\"1\"{$checked[\'notes\']} /> <b><lang:board_field_note>?</b></p>\r\n		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"sigs\" value=\"1\"{$checked[\'sigs\']} /> <b><lang:board_field_sigs>?</b></p>\r\n		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"avatars\" value=\"1\"{$checked[\'avatars\']} /> <b><lang:board_field_avatars>?</b></p>\r\n		<p class=\"submit\">\r\n			<input class=\"button\" type=\"submit\" value=\"<lang:board_button_submit>\" />&nbsp;\r\n			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />\r\n		</p>\r\n		<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n	</div>\r\n</form>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'ucp','ucp_email','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>\r\n</div>\r\n{$ucp_tabs}\r\n{$error_list}\r\n<form method=\'post\' action=\'<sys:gate>?a=ucp&CODE=10\'>\r\n	<div class=\"formwrap\">\r\n		<h3><lang:email_title></h3>\r\n		<p class=\"checkwrap\"><lang:email_tip></p>\r\n		<h4><strong><lang:email_current></strong> <user:members_email></h4>\r\n		<h3><lang:email_field_pass></h3>\r\n		<h4><lang:email_field_pass_tip></h4>\r\n		<input type=\"password\" name=\"password\" />\r\n		<h3><lang:email_field_new></h3>\r\n		<h4><lang:email_field_new_tip></h4>\r\n		<input type=\"text\" name=\"new\" value=\"{$email_one}\" />\r\n		<h3><lang:email_field_con></h3>\r\n		<h4><lang:email_field_con_tip></h4>\r\n		<input type=\"text\" name=\"confirm\" value=\"{$email_two}\" />\r\n		<p class=\"submit\">\r\n			<input class=\"button\" type=\"submit\" value=\"<lang:email_button_submit>\" />&nbsp;\r\n			<input class=\"reset\" type=\"reset\" value=\"<lang:email_button_reset>\" />\r\n		</p>\r\n	</div>\r\n	<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n</form>'),
 (1,'mailer','mail_pass_get_2','Hello, {$row[\'members_name\']}\r\n\r\nThis message is to inform you that your account for <config:title> ( <config:site_link> )\r\nhas been activated. Below you will find your account access information which you may change\r\nat anytime through your personal control panel.\r\n\r\nUsername: {$row[\'members_name\']}\r\nPassword: {$pass}\r\n\r\nLog INTO my_your account through the link below:\r\n\r\n<conf:site_link><sys:gate>?a=logon');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'mailer','mail_pass_get_1','You have recently attempted to recover your password from <conf:title> ( <conf:site_link> ).\r\nTo complete the process you must click the following link to validate your request. Once validation is \r\ncomplete you will be mailed your new account password. You will be able to change this password at anytime \r\nvia your control panel.\r\n\r\n{$url}\r\n\r\nTake note that this validation link will expire within 24 hours.'),
 (1,'mailer','mail_admin_user','Hello, {$name}\r\n\r\nThis message is to inform you that your account for <conf:title> ( <conf:site_link> )\r\nhas been activated. Below you will find your account access information which you may change\r\nat anytime through your personal control panel.\r\n\r\nUsername: {$name}\r\nPassword: {$password}\r\n\r\nLog INTO my_your account through the link below:\r\n<conf:site_link><sys:gate>?a=logon\";'),
 (1,'ucp','ucp_tabs','<ul id=\"ucp_tabs\">\r\n	{$list}\r\n</ul>'),
 (1,'search','search_match_result_row','<tr>\r\n	<td class=\"cellthree\" align=\"center\" valign=\"top\"><a href=\"<sys:gate>?gettopic={$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\">{$row[\'topics_marker\']}</a></td>\r\n	<td class=\"cellone\">{$row[\'topics_prefix\']} <a href=\"<sys:gate>?gettopic={$row[\'topics_id\']}&amp;hl={$hlLink}\" title=\"\">{$row[\'topics_title\']}</a> {$inlineNav}<span class=\"special\">-- {$row[\'topics_subject\']}</span></td>\r\n	<td class=\"celltwo\" align=\"center\"><strong>{$row[\'topics_posts\']}</strong></td>\r\n	<td class=\"cellone\" align=\"center\">{$row[\'topics_views\']}</td>\r\n	<td class=\"celltwo\" align=\"center\"><strong>{$row[\'topics_author\']}</strong></td>\r\n	<td class=\"cellone\" align=\"center\"><a href=\"<sys:gate>?getforum={$row[\'topics_forum\']}\" title=\"\">{$row[\'forum_name\']}</a></td>\r\n	<td class=\"celllast\" nowrap=\"nowrap\"><span><a href=\"<sys:gate>?gettopic={$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><macro:img_mini_box></a> {$row[\'topics_last\']}</span><lang:topic_last_replied>: <strong>{$row[\'topics_poster\']}</strong></td>\r\n</tr>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'search','search_match_result_table','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=search\" title=\"<lang:search_form_title>\"><lang:search_form_title></a> / <strong>{$count}</strong> <lang:search_result_title>:\r\n</div>\r\n<div class=\"bar\">{$pages}</div>\r\n<div class=\"maintable\">\r\n	<table cellpadding=\"0\" cellspacing=\"1\" width=\"100%\">\r\n		<tr>\r\n			<td class=\"header\" colspan=\"7\">{$count} <lang:search_result_title></td>\r\n		</tr>\r\n		<tr>\r\n			<th width=\"5%\">&nbsp;</th>\r\n			<th width=\"30%\"><lang:result_col_title></th>\r\n			<th align=\"center\" width=\"10%\"><lang:result_col_replies></th>\r\n			<th align=\"center\" width=\"10%\"><lang:result_col_views></th>\r\n			<th align=\"center\" width=\"10%\"><lang:result_col_author></th>\r\n			<th align=\"center\" width=\"20%\"><lang:result_col_forum></th>\r\n			<th width=\"25%\"><lang:result_col_last></th>\r\n		</tr>\r\n		{$list}\r\n		<tr>\r\n			<td class=\"footer\" colspan=\"7\">&nbsp;</td>\r\n		</tr>\r\n	</table>\r\n</div>\r\n<div class=\"bar\">{$pages}</div>'),
 (1,'register','resend_validation_form','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:validate_crumb_title>\r\n</div>\r\n<form method=\"post\" action=\"<sys:gate>?a=register&amp;CODE=04\">\r\n	<div class=\"formwrap\">\r\n		<h3><lang:validate_title></h3>\r\n		<p class=\"checkwrap\"><lang:validate_tip></p>\r\n		<h3><lang:validate_field_email></h4>\r\n		<h4><lang:validate_field_email_tip></h3>\r\n		<input type=\'text\' name=\'email\' tabindex=\'1\' />\r\n		<p class=\"submit\">\r\n			<input class=\"button\" type=\"submit\" value=\"<lang:validate_button_submit>\" />&nbsp;\r\n			<input class=\"reset\" type=\"reset\" value=\"<lang:validate_button_reset>\" />\r\n		</p>\r\n		<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n	</div>\r\n</form>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'mailer','mail_registration_complete','Hello, {$username}\r\n\r\nThe account you created at <conf:title> ( <conf:site_link> ) is now activated and ready to\r\nuse. Depending on your browser settings you may or may not be automatically logged in.\r\nIf not just use the following link to log INTO my_your account:\r\n\r\n<conf:site_link><sys:gate>?a=logon\r\n\r\nThank you for participating in our community!'),
 (1,'ucp','ucp_main','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>\r\n</div>\r\n{$ucp_tabs}\r\n<div class=\"formwrap\">\r\n	<h3><lang:main_title></h3>\r\n	<p class=\"checkwrap\"><lang:main_tip></p>\r\n	<h3><lang:main_email></h3>\r\n	<h4><user:members_email></h4>\r\n	<h3><lang:main_joined></h3>\r\n	<h4>{$join_date}</h4>\r\n	<h3><lang:main_posts></h3>\r\n	<h4><a href=\"<sys:gate>?a=search&amp;CODE=02&amp;mid=<user:members_id>\">{$total_posts}</a> <lang:main_posts_stat></h4>\r\n	<h3><lang:main_notes></h3>\r\n	<h4><a href=\"<sys:gate>?a=notes\">{$total_notes}</a> <lang:main_notes_stat></h4>\r\n	<h3><lang:file_title></h3>\r\n	<h4><lang:file_desc></h4>\r\n	<table class=\"ucp_table\" cellpadding=\"3\" cellspacing=\"1\" with=\"100%\">\r\n		<tr>\r\n			<th width=\"1%\" align=\"center\"><lang:file_col_id></th>\r\n			<th><lang:file_col_name></th>\r\n			<th><lang:file_col_topic></th>\r\n			<th align=\"center\"><lang:file_col_date></th>\r\n			<th align=\"center\"><lang:file_col_size></th>\r\n			<th align=\"center\"><lang:file_col_hits></th>\r\n			<th>&nbsp;</th>\r\n		</tr>\r\n		{$files}\r\n	</table>\r\n	<h3></h3>\r\n</div>'),
 (1,'ucp','ucp_sub_none','<tr>\r\n	<td colspan=\"4\" align=\"center\"><strong><lang:main_sub_none></strong></td>\r\n</tr>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'ucp','ucp_sub_topic_row','		<tr>\r\n			<td align=\"center\" class=\"one\"><macro:icon_open_new></td>\r\n			<td><a href=\"<sys:gate>?gettopic={$row[\'topics_id\']}\" title=\"\"><strong>{$row[\'topics_title\']}</strong></a></td>\r\n			<td align=\"center\" class=\"one\">{$row[\'track_date\']}</td>\r\n			<td align=\"center\"><a href=\"<sys:gate>?a=ucp&amp;CODE=12&amp;id={$row[\'topics_id\']}\" title=\"\"><strong><lang:sub_delete></strong></a></td>\r\n		</tr>'),
 (1,'main','main_container','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <lang:bread_title>\r\n</div>\r\n{$new_note}\r\n{$news_bit}\r\n{$category_list}\r\n<div class=\"bar\"><span><a href=\"<sys:gate>?a=logon&amp;CODE=06\" title=\"<lang:link_delete_cookies>\"><lang:link_delete_cookies></a> &middot; <a href=\"<sys:gate>?a=logon&amp;CODE=07\" title=\"<lang:link_mark_all_read>\"><lang:link_mark_all_read></a></span>&nbsp;</div>\r\n{$active_users}\r\n{$board_stats}'),
 (1,'main','main_cat_row','<tr>\r\n	<td class=\"cellthree\" align=\"center\" valign=\"top\"><a href=\"<sys:gate>?getforum={$forum[\'forum_id\']}\" title=\"\">{$marker}</a></td>\r\n	<td class=\"cellone\"><h4><a href=\"<sys:gate>?getforum={$forum[\'forum_id\']}\" title=\"\">{$forum[\'forum_name\']}</a></h4><p>{$forum[\'forum_description\']}{$mods}{$subs}</p></td>\r\n	<td class=\"celltwo\" align=\"center\"><strong>{$forum[\'forum_topics\']}</strong></td>\r\n	<td class=\"celltwo\" align=\"center\">{$forum[\'forum_posts\']}</td>\r\n	<td class=\"celllast\" nowrap=\"nowrap\">{$last_post}</td>\r\n</tr>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'main','main_cat_redirect','<tr>\r\n	<td class=\"cellthree\" align=\"center\" valign=\"top\"><macro:cat_redirect></td>\r\n	<td class=\"cellone\"><h4><a href=\"<sys:gate>?getforum={$forum[\'forum_id\']}\" title=\"\">{$forum[\'forum_name\']}</a></h4><p>{$forum[\'forum_description\']}</p></td>\r\n	<td class=\"redirect\" nowrap=\"nowrap\" align=\"center\" colspan=\"3\">{$forum[\'forum_red_clicks\']} <lang:cat_redirect></td>\r\n</tr>'),
 (1,'main','main_cat_wrapper','<div class=\"maintable\">\r\n	<table cellpadding=\"0\" cellspacing=\"1\" width=\"100%\">\r\n		<tr>\r\n			<td class=\"header\" colspan=\"5\"><a href=\"<sys:gate>?getforum={$category[\'forum_id\']}\">{$category[\'forum_name\']}</a></td>\r\n		</tr>\r\n		<tr>\r\n			<th width=\"1%\">&nbsp;</th>\r\n			<th width=\"49%\"><lang:main_col_forum></th>\r\n			<th align=\"center\" width=\"10%\"><lang:main_col_topics></th>\r\n			<th align=\"center\" width=\"10%\"><lang:main_col_replies></th>\r\n			<th  align=\"left\" width=\"30%\"><lang:main_col_latest></th>\r\n		</tr>\r\n			{$forum_list}\r\n		<tr>\r\n			<td class=\"footer\" colspan=\"5\"><a href=\"javascript:scroll(0,0);\" title=\"<lang:main_scroll_desc>\"><lang:main_scroll_title></a></td>\r\n		</tr>\r\n	</table>\r\n</div>'),
 (1,'main','main_last_post','<span><macro:img_mini_box> {$last_date}</span>\r\n<lang:last_post_in> {$forum[\'forum_last_post_title\']}\r\n<br /><lang:last_post_by> <strong>{$forum[\'forum_last_post_user_name\']}</strong>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'main','main_news_section','<div id=\"community_news\">\r\n	<strong><lang:news_title>: <a href=\"<sys:gate>?a=read&amp;CODE=02&amp;p={$news[\'news_post\']}\" title=\"<lang:news_title>\">{$news[\'news_title\']}</a></strong>\r\n	<span><lang:news_date> {$news[\'news_date\']}.</span>\r\n</div>'),
 (1,'topics','topic_none','							<tr>\r\n								<td class=\"cellone\" align=\"center\" colspan=\"6\"><strong><lang:no_topics></strong></td>\r\n							</tr>'),
 (1,'topics','topic_cat_row','<tr>\r\n	<td class=\"cellthree\" align=\"center\" valign=\"top\"><a href=\"<sys:gate>?getforum={$forum[\'forum_id\']}\" title=\"\">{$marker}</a></td>\r\n	<td class=\"cellone\"><h4><a href=\"<sys:gate>?getforum={$forum[\'forum_id\']}\" title=\"\">{$forum[\'forum_name\']}</a></h4><p>{$forum[\'forum_description\']}{$mods}{$subs}</p></td>\r\n	<td class=\"celltwo\" align=\"center\"><strong>{$forum[\'forum_topics\']}</strong></td>\r\n	<td class=\"celltwo\" align=\"center\">{$forum[\'forum_posts\']}</td>\r\n	<td class=\"celllast\" nowrap=\"nowrap\">{$last_post}</td>\r\n</tr>'),
 (1,'topics','topic_cat_redirect','<tr>\r\n	<td class=\"cellthree\" align=\"center\" valign=\"top\"><macro:cat_redirect></td>\r\n	<td class=\"cellone\"><h4><a href=\"<sys:gate>?getforum={$forum[\'forum_id\']}\" title=\"\">{$forum[\'forum_name\']}</a></h4><p>{$forum[\'forum_description\']}</p></td>\r\n	<td class=\"redirect\" nowrap=\"nowrap\" align=\"center\" colspan=\"3\">{$forum[\'forum_red_clicks\']} <lang:cat_redirect></td>\r\n</tr>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'topics','topic_cat_wrapper','<div class=\"maintable\">\r\n	<table cellpadding=\"0\" cellspacing=\"1\" width=\"100%\">\r\n		<tr>\r\n			<td class=\"header\" colspan=\"5\"><a href=\"<sys:gate>?getforum={$category[\'forum_id\']}\">{$category[\'forum_name\']}</a></td>\r\n		</tr>\r\n		<tr>\r\n			<th width=\"1%\">&nbsp;</th>\r\n			<th width=\"35%\"><lang:topics_col_forum></th>\r\n			<th align=\"center\" width=\"5%\"><lang:topics_col_topics></th>\r\n			<th align=\"center\" width=\"5%\"><lang:topics_col_replies></th>\r\n			<th  align=\"left\" width=\"15%\"><lang:topics_col_latest></th>\r\n		</tr>\r\n			{$forum_list}\r\n		<tr>\r\n			<td class=\"footer\" colspan=\"5\"><a href=\"javascript:scroll(0,0);\" title=\"<lang:topics_scroll_desc>\"><lang:topics_scroll_title></a></td>\r\n		</tr>\r\n	</table>\r\n</div>'),
 (1,'topics','topic_last_post','<span><macro:img_mini_box> {$last_date}</span>\r\n<lang:last_post_in> {$forum[\'forum_last_post_title\']}\r\n<br /><lang:last_post_by> <strong>{$forum[\'forum_last_post_user_name\']}</strong>'),
 (1,'post','mod_option_wrapper','		<h3><lang:post_options></h3>\r\n		<h4><lang:post_options_tip></h4>\r\n		{$lock}\r\n		{$pin}\r\n		{$hide}\r\n		{$announce}');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'post','mod_option_pin','		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"stick\" value=\"1\" {$check[\'stuck\']} /> <strong><lang:post_mod_options_pin></strong></p>'),
 (1,'post','form_option_bar','		<h3><lang:post_options></h3>\r\n		<h4><lang:post_options_tip>.</h4>\r\n		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" {$check_code} /> <lang:post_options_code></p>\r\n		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" {$check_emoticon} /> <lang:post_options_emoticon></p>\r\n		{$poll}'),
 (1,'global','topic_prefix','<a href=\"<sys:gate>?gettopic={$row[\'topics_id\']}&amp;view=lastpost\" title=\"<lang:link_post_jump>\"><macro:img_prefix></a>'),
 (1,'topics','topic_button','<a href=\"<sys:gate>{$url}\" title=\"{$title}\"><img src=\"<sys:skinPath>/{$button}.gif\" alt=\"\" /></a>&nbsp;'),
 (1,'post','form_field_subject','		<h3><lang:post_field_subject></h3>\r\n		<h4><lang:post_field_subject_tip></h4>\r\n		<input type=\"text\" name=\"subject\" tabindex=\"1\" value=\"{$subject}\" />');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'read','read_jump_list','<div class=\"bar\">\r\n	<form method=\"post\" action=\"<sys:gate>?a=topics\">\r\n		<select name=\"forum\" class=\"jump\">\r\n			{$jump_list}\r\n		</select><input type=\"image\" src=\"<sys:skinPath>/btn_go.gif\" class=\"small_button\" value=\"<lang:forum_jump>\" />\r\n	</form>\r\n</div>'),
 (1,'read','read_mod_list','<div class=\"bar\">\r\n	<form method=\"post\" action=\"<sys:gate>?a=mod&amp;t={$this->_id}\">\r\n		<select name=\"CODE\" class=\"jump\">\r\n			{$mod_list}\r\n		</select>\r\n		<input type=\"image\" src=\"<sys:skinPath>/btn_go.gif\" class=\"small_button\" value=\"<lang:mod_list>\" />\r\n		<input type=\"hidden\"  name=\"hash\" value=\"{$hash}\" />\r\n	</form>\r\n</div>'),
 (1,'topics','topics_active','<div class=\"infowrap\">\r\n	<h1><lang:viewers_title></h1>\r\n	<h2><lang:viewers_user_summary> ( <a href=\"<sys:gate>?a=active\" title=\"\"><lang:active_link_details></a> )</h2>\r\n	<p>{$list}</p>\r\n</div>'),
 (1,'main','main_mod_wrapper','<p class=\"mod_list\"><strong><lang:mod_label></strong> {$mod_list}</p>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'main','main_sub_wrapper','<p class=\"mod_list\"><strong><lang:sub_label></strong> {$sub_list}</p>'),
 (1,'topics','topic_mod_wrapper','<p class=\"mod_list\"><strong><lang:mod_label></strong> {$mod_list}</p>'),
 (1,'topics','topic_sub_wrapper','<p class=\"mod_list\"><strong><lang:sub_label></strong> {$sub_list}</p>'),
 (1,'mailer','mail_subscribe_forum_notice','Hello {$row[\'members_name\']},\r\n\r\n{$topic[\'topics_last_poster_name\']}, from <conf:title> ( <conf:site_link> ), has just posted a reply\r\nto a forum you have subscribed to ( {$row[\'forum_name\']} ). You may follow the link below to \r\nread this topic:\r\n\r\n<conf:site_link><sys:gate>?gettopic={$topic[\'topics_id\']}\r\n\r\nIf you do not wish to receive subscription notices any longer you may turn this feature \r\noff within your personal control panel. To do this you may access your UCP through the \r\nabove link.'),
 (1,'ucp','ucp_subs','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>\r\n</div>\r\n{$ucp_tabs}\r\n<div class=\"formwrap\">\r\n	<h3><lang:sub_title></h3>\r\n	<p class=\"checkwrap\"><lang:sub_tip></p>\r\n	<h3><lang:sub_topics_title></h3>\r\n	<h4><lang:sub_topics_desc></h4>\r\n	<table class=\"ucp_table\" cellpadding=\"3\" cellspacing=\"1\">\r\n		{$topics}\r\n	</table>\r\n	<h3><lang:sub_forums_title></h3>\r\n	<h4><lang:sub_forums_desc></h4>\r\n	<table class=\"ucp_table\" cellpadding=\"3\" cellspacing=\"1\">\r\n		{$forums}\r\n	</table>\r\n	<h3></h3>\r\n</div>'),
 (1,'ucp','ucp_sub_forum_row','		<tr>\r\n			<td align=\"center\" class=\"one\" width=\"1%\"><macro:icon_open_new></td>\r\n			<td><a href=\"<sys:gate>?getforum={$row[\'forum_id\']}\" title=\"\"><strong>{$row[\'forum_name\']}</strong></a></td>\r\n			<td align=\"center\" class=\"one\">{$row[\'track_date\']}</td>\r\n			<td align=\"center\"><a href=\"<sys:gate>?a=ucp&amp;CODE=13&amp;forum={$row[\'forum_id\']}\" title=\"\"><strong><lang:sub_delete></strong></a></td>\r\n		</tr>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'topics','topic_stats','<div class=\"infowrap\">\r\n	<h1><lang:stat_title>:</h1>\r\n	<h2><lang:stat_tip></h2>\r\n	<p><lang:stat_totals><br />\r\n	<lang:stat_newest><br />\r\n	<lang:stat_online></p>\r\n</div>'),
 (1,'post','mod_option_announce','		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"announce\" value=\"1\" {$check[\'announce\']} /> <strong><lang:post_mod_options_announce></strong></p>'),
 (1,'ucp','ucp_avatar_form','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>\r\n</div>\r\n{$ucp_tabs}\r\n<div class=\"formwrap\">\r\n	<h3><lang:ava_title></h3>\r\n	<p class=\"checkwrap\"><lang:ava_tip></p>\r\n	<h4><strong><lang:ava_current></strong><br /> {$avatar}</h4>\r\n	<h4><lang:ava_ext> {$ext}</h4>\r\n</div>\r\n<div class=\"formwrap\">\r\n	<h3><lang:ava_gallery_title></h3>\r\n	<h4><lang:ava_gallery_tip></h4>\r\n	<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=15\">\r\n		<p class=\"checkwrap\">\r\n			<select name=\"gallery\" class=\"jump\">\r\n				{$gallery_list}\r\n			</select>\r\n			<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n		</p>\r\n		<p class=\"submit\">\r\n			<input class=\"button\" type=\"submit\" value=\"<lang:ava_gallery_submit>\" />&nbsp;\r\n			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />\r\n		</p>\r\n		<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n	</form>\r\n</div>\r\n<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=17\" enctype=\'multipart/form-data\'>\r\n	<div class=\"formwrap\">\r\n		<h3><lang:ava_url_title></h3>\r\n		<h4><lang:ava_url_tip></h4>\r\n		<input type=\"text\" name=\"url\" value=\"{$url}\" />\r\n	</div>\r\n	<div class=\"formwrap\">\r\n		<h3><lang:ava_upload_title></h3>\r\n		<h4><lang:ava_upload_tip></h4>\r\n		<input type=\"file\" name=\"upload\" />\r\n	</div>\r\n	<div class=\"formwrap\">\r\n		<h3><lang:ava_remove_title></h3>\r\n		<p class=\"checkwarn\"><input type=\"checkbox\" class=\"check\" name=\"remove\" value=\"1\" /> <strong><lang:ava_remove_warn></strong></p>\r\n		<p class=\"submit\">\r\n		<input class=\"button\" type=\"submit\" value=\"<lang:ava_submit>\" />&nbsp;\r\n		<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />\r\n		</p>\r\n		<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n	</div>\r\n</form>'),
 (1,'ucp','ucp_avatar_gallery_form','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:ucp_crumb_title>\r\n</div>\r\n{$ucp_tabs}\r\n<div class=\"formwrap\">\r\n	<h3><lang:ava_gallery_form_title></h3>\r\n	<p class=\"checkwrap\"><lang:ava_tip></p>\r\n	<h3><lang:ava_gallery_title></h3>\r\n	<h4><lang:ava_gallery_tip></h4>\r\n	<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=15\">\r\n		<p class=\"checkwrap\">\r\n			<select name=\"gallery\" class=\"jump\">\r\n				{$gallery_list}\r\n			</select>\r\n		</p>\r\n		<p class=\"submit\">\r\n			<input class=\"button\" type=\"submit\" value=\"<lang:ava_gallery_submit>\" />&nbsp;\r\n			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />\r\n		</p>\r\n		<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n	</form>\r\n	<form method=\"post\" action=\"<sys:gate>?a=ucp&amp;CODE=16\">\r\n		<div id=\"maintable\">\r\n			<table cellpadding=\"15\" cellspacing=\"1\" width=\"100%\">\r\n				{$avatar_rows}\r\n			</table>\r\n		</div>\r\n		<p class=\"submit\">\r\n			<input class=\"button\" type=\"submit\" value=\"<lang:ava_submit>\" />&nbsp;\r\n			<input class=\"reset\" type=\"reset\" value=\"<lang:board_button_reset>\" />\r\n		</p>\r\n		<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n		<input type=\"hidden\" name=\"gallery\" value=\"{$gallery}\" />\r\n	</form>\r\n</div>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'ucp','ucp_avatar_row','<td align=\"center\">\r\n	<label for=\"{$val}\"><img src=\"<sys:sys_path>sys_images/ava_gallery/{$gallery}/{$val}\" alt=\"{$val}\" /><br />\r\n	<strong>{$val}</strong></label><br /><input type=\"radio\" class=\"check\" name=\"avatar\" value=\"{$val}\" id=\"{$val}\" />\r\n</td>'),
 (1,'calendar','cal_month_wrapper','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <lang:bread_title> {$lit_month}, {$lit_year}\r\n</div>\r\n<div class=\"maintable\">\r\n	<table cellpadding=\"0\" cellspacing=\"1\" width=\"100%\">\r\n		<tr>\r\n			<td class=\"header\" colspan=\"2\" align=\"left\"><a href=\"<sys:gate>?a=calendar{$link_prev}\" title=\"\">« {$link_prev_lit_month}, {$link_prev_lit_year}</a></td>\r\n			<td class=\"header\" colspan=\"3\" align=\"center\">{$lit_month}, {$lit_year}</td>\r\n			<td class=\"header\" colspan=\"2\" align=\"right\"><a href=\"<sys:gate>?a=calendar{$link_next}\" title=\"\">{$link_next_lit_month}, {$link_next_lit_year} »</a></td>\r\n		</tr>\r\n		<tr>\r\n			<th width=\"14%\" align=\"center\"><lang:lit_day_one></th>\r\n			<th width=\"14%\" align=\"center\"><lang:lit_day_two></th>\r\n			<th width=\"14%\" align=\"center\"><lang:lit_day_three></th>\r\n			<th width=\"14%\" align=\"center\"><lang:lit_day_four></th>\r\n			<th width=\"14%\" align=\"center\"><lang:lit_day_five></th>\r\n			<th width=\"14%\" align=\"center\"><lang:lit_day_six></th>\r\n			<th width=\"14%\" align=\"center\"><lang:lit_day_seven></th>\r\n		</tr>\r\n			{$day_list}\r\n		<tr>\r\n			<td class=\"footer\" colspan=\"7\"><span><a href=\"<sys:gate>?a=calendar&amp;CODE=02\" title=\"\"><macro:btn_add_event></a></span>\r\n				<form method=\"post\" action=\"<sys:gate>?a=calendar\">\r\n					<select name=\"month\" class=\"jump\">{$months}</select>\r\n					<select name=\"year\" class=\"jump\">{$years}</select><macro:btn_go>\r\n				</form>\r\n			</td>\r\n		</tr>\r\n	</table>\r\n</div>'),
 (1,'calendar','cal_blank_row','<td class=\"{$class}\">&nbsp;</td>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'calendar','cal_date_row','<td class=\"{$class}\"><h4>{$day}</h4><div class=\"events\">{$events}</div></td>'),
 (1,'calendar','cal_new_event_form','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=calendar\" title=\"\"><lang:bread_title_two></a> / <lang:add_crumb_title>\r\n</div>\r\n{$error_list}\r\n<script language=\"javascript\">\r\nfunction check_length()\r\n{\r\n	var limit  = <conf:max_post> * 1000;\r\n	var length = document.REPLIER.body.value.length;\r\n\r\n	if ( (length > limit) ) {\r\n		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');\r\n	} else {\r\n		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);\r\n	}\r\n}\r\n</script>\r\n<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>\r\n<a name=\"qwiknote\"></a>\r\n<form method=\"POST\" action=\"<sys:gate>?a=calendar&amp;CODE=03\" name=\"REPLIER\">\r\n	<div class=\"formwrap\">\r\n		<h3><lang:form_add_type_title></h3>\r\n		<h4><lang:form_add_type_desc></h4>\r\n		<p class=\"checkwrap\">\r\n			<strong><lang:form_start_date_on> </strong>&nbsp;\r\n			<select name=\"start_month\">{$start_months}</select>&nbsp;\r\n			<select name=\"start_day\">{$start_days}</select>&nbsp;\r\n			<select name=\"start_year\">{$start_years}</select>\r\n		</p>\r\n		<p class=\"checkwrap\">\r\n			<strong><lang:form_loop_every> </strong>&nbsp;\r\n			<select name=\"loop_type\">{$loop_types}</select>&nbsp;<strong><lang:form_loop_until></strong>&nbsp;\r\n			<select name=\"end_month\">{$end_months}</select>&nbsp;\r\n			<select name=\"end_day\">{$end_days}</select>&nbsp;\r\n			<select name=\"end_year\">{$end_years}</select>\r\n		</p>\r\n		{$groups}\r\n		<h3><lang:form_add_title_title></h3>\r\n		<h4><lang:form_add_title_desc></h4>\r\n		<input type=\'text\' name=\'title\' tabindex=\'1\' value=\"{$title}\" />\r\n		{$bbcode}\r\n		<h3><lang:form_emoticon_title></h3>\r\n		<h4><lang:form_emoticon_desc></h4>\r\n		{$emoticons}\r\n		<h3><lang:form_body_title></h3>\r\n		<h4><lang:form_body_desc> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:form_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:form_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:form_link_length></a> )</h4>\r\n		<textarea name=\"body\" tabindex=\'3\'>{$body}</textarea>\r\n		<h3><lang:form_options_title></h3>\r\n		<h4><lang:form_options_desc></h4>\r\n		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" checked=\"checked\" /> <lang:form_code_desc></p>\r\n		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" checked=\"checked\" /> <lang:form_emo_desc></p>\r\n		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:form_button_submit>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:form_button_reset>\" /></p>\r\n		<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n	</div>\r\n</form>'),
 (1,'calendar','cal_month_event','<p>{$event}</p>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'calendar','cal_read_event','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=calendar\" title=\"\"><lang:bread_title_two></a> / <lang:bread_title_read> {$row[\'event_title\']}\r\n</div>\r\n<div class=\"postbutton\">\r\n	<a href=\"<sys:gate>?a=calendar&CODE=02\" title=\"\"><macro:btn_add_event></a>\r\n</div>\r\n<div class=\"postwrap\">\r\n	<div class=\"postheader\">{$row[\'event_title\']} <em>( {$type} )</em></div>\r\n	<div class=\"user\">\r\n		<p><a href=\"<sys:gate>?getuser={$row[\'members_id\']}\" title=\"<lang:entry_link_profile>\"><strong>{$row[\'members_name\']}</strong></a> <em>( <a href=\"<sys:gate>?a=search&CODE=02&mid={$row[\'members_id\']}\" title=\"<lang:entry_post_find> {$row[\'members_name\']}\">{$row[\'members_posts\']}</a> )</em>\r\n		<span><strong>&middot; <lang:posted_group></strong> {$row[\'class_title\']}</span>\r\n		<span><strong>&middot; <lang:entry_rank></strong> {$row[\'members_pips\']}</span></p>\r\n		{$avatar}\r\n	</div>\r\n	<div class=\"post\">\r\n		<h5><span>{$link_delete}&nbsp;{$link_edit}</span><strong><lang:event_started></strong> {$date_starts} <strong><lang:event_ends></strong> {$date_ends}</h5>\r\n		<p>{$row[\'event_body\']}</p>{$sig}\r\n	</div>\r\n	<div class=\"foot\">\r\n		<span><a href=\"javascript:scroll(0,0);\" title=\"<lang:read_link_top_title>.\"><lang:read_link_top></a></span>\r\n		<ul class=\"extras\">{$active}{$linkSpan}</ul>\r\n	</div>\r\n	<div class=\"postend\">&nbsp;</div>\r\n</div>\r\n<div class=\"postbutton\">\r\n	<a href=\"<sys:gate>?a=calendar&CODE=02\" title=\"\"><macro:btn_add_event></a>\r\n</div>'),
 (1,'calendar','cal_group_list','		<h3><lang:form_groups_title></h3>\r\n		<h4><lang:form_groups_desc></h4>\r\n		<p class=\"checkwrap\"><select name=\"groups[]\" size=\"5\" multiple=\"multiple\" style=\"width: 200px;\" class=\"jump\">{$group_list}</select></p>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'calendar','cal_edit_event_form','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / <a href=\"<sys:gate>?a=calendar\" title=\"\"><lang:bread_title_two></a> / <a href=\"<sys:gate>?getevent={$this->_id}\" title=\"\">{$row[\'event_title\']}</a> / <lang:edit_crumb_title>\r\n</div>\r\n{$error_list}\r\n<script language=\"javascript\">\r\nfunction check_length()\r\n{\r\n	var limit  = <conf:max_post> * 1000;\r\n	var length = document.REPLIER.body.value.length;\r\n\r\n	if ( (length > limit) ) {\r\n		alert(length + \' <lang:js_length_max_one> \' + limit + \' <lang:js_length_max_two>\');\r\n	} else {\r\n		alert(\'<lang:js_length_first> \' + length + \' <lang:js_length_min_two> \' + limit);\r\n	}\r\n}\r\n</script>\r\n<script language=\'Javascript\' src=\'<sys:skinPath>/js/bbcode.js\'></script>\r\n<a name=\"qwiknote\"></a>\r\n<form method=\"POST\" action=\"<sys:gate>?a=calendar&amp;CODE=06&amp;id={$this->_id}\" name=\"REPLIER\">\r\n	<div class=\"formwrap\">\r\n		<h3><lang:form_add_type_title></h3>\r\n		<h4><lang:form_add_type_desc></h4>\r\n		<p class=\"checkwrap\">\r\n			<strong><lang:form_start_date_on></strong>&nbsp;\r\n			<select name=\"start_month\">{$start_months}</select>&nbsp;\r\n			<select name=\"start_day\">{$start_days}</select>&nbsp;\r\n			<select name=\"start_year\">{$start_years}</select>\r\n		</p>\r\n		<p class=\"checkwrap\">\r\n			<strong><lang:form_loop_every> </strong>&nbsp;\r\n			<select name=\"loop_type\">{$loop_types}</select>&nbsp;<strong><lang:form_loop_until></strong>&nbsp;\r\n			<select name=\"end_month\">{$end_months}</select>&nbsp;\r\n			<select name=\"end_day\">{$end_days}</select>&nbsp;\r\n			<select name=\"end_year\">{$end_years}</select>\r\n		</p>\r\n		{$groups}\r\n		<h3><lang:form_add_title_title></h3>\r\n		<h4><lang:form_add_title_desc></h4>\r\n		<input type=\'text\' name=\'title\' tabindex=\'1\' value=\"{$title}\">\r\n		{$bbcode}\r\n		<h3><lang:form_emoticon_title></h3>\r\n		<h4><lang:form_emoticon_desc></h4>\r\n		{$emoticons}\r\n		<h3><lang:form_body_title></h3>\r\n		<h4><lang:form_body_desc> ( <a href=\"javascript:toggleBox(\'bbcode_panel\')\"><lang:form_link_bbcode></a> · <a href=\"javascript:smilie_window(\'<sys:gate>\')\"><lang:form_link_emoticons></a> · <a href=\"javascript:check_length()\"><lang:form_link_length></a> )</h4>\r\n		<textarea name=\"body\" tabindex=\'3\'>{$body}</textarea>\r\n		<h3><lang:form_options_title></h3>\r\n		<h4><lang:form_options_desc></h4>\r\n		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"cOption\" value=\"1\" {$code_check} /> <lang:form_code_desc></p>\r\n		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\"  name=\"eOption\" value=\"1\" {$emo_check} /> <lang:form_emo_desc></p>\r\n		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:form_button_update>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:form_button_reset>\" /></p>\r\n		<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n	</div>\r\n</form>'),
 (1,'post','form_attach_poll','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> / {$bread_crumb} / <a href=\"<sys:gate>?gettopic={$this->_id}\" title=\"\">{$topic[\'topics_title\']}</a> / <lang:poll_bread_title>\r\n</div>\r\n{$error_list}\r\n<form method=\"POST\" action=\"<sys:gate>?a=post&amp;CODE=08&amp;t={$this->_id}\">\r\n	<div class=\"formwrap\">\r\n		<h3><lang:poll_title_title></h3>\r\n		<h4><lang:poll_title_desc></h4>\r\n		<input type=\"text\" name=\"title\" tabindex=\"1\" value=\"{$title}\" />\r\n		<h3><lang:poll_choice_title></h3>\r\n		<h4><lang:poll_choice_desc></h4>\r\n		<textarea name=\"choices\" tabindex=\"1\">{$choices}</textarea>\r\n		<h3><lang:poll_expire_title></h3>\r\n		<h4><lang:poll_expire_desc></h4>\r\n		<input type=\"text\" name=\"days\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{$days}\" />\r\n		<h3><lang:poll_lock_title></h3>\r\n		<h4><lang:poll_lock_desc></h4>\r\n		<input type=\"text\" name=\"vote_lock\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{$vote_lock}\" />\r\n		<h3><lang:poll_options_title></h3>\r\n		<h4><lang:poll_options_desc></h4>\r\n		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"poll_only\" value=\"1\" tabindex=\"3\" {$poll_only} /> <strong><lang:poll_lock_option></strong></p>\r\n		<p class=\"submit\"><input class=\"button\" type=\"submit\" value=\"<lang:poll_button_submit>\" />&nbsp;<input class=\"reset\" type=\"reset\" value=\"<lang:poll_button_reset>\" /></p>\r\n		<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n	</div>\r\n</form>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'post','form_option_poll','		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"poll\" value=\"1\" {$poll_check} /> <lang:post_options_poll></p>'),
 (1,'read','read_choice_wrapper','<form method=\"post\" action=\"<sys:gate>?a=read&amp;CODE=05&amp;t={$this->_id}\">\r\n	<div class=\"maintable\">\r\n		<table cellpadding=\"0\" cellspacing=\"1\" width=\"100%\">\r\n			<tr>\r\n				<td class=\"header\">{$poll[\'poll_question\']}</td>\r\n			</tr>\r\n			<tr>\r\n				<th>&nbsp;</th>\r\n			</tr>\r\n				{$poll_list}\r\n			<tr>\r\n				<td class=\"footer\" style=\"text-align: center;\"><input type=\"submit\" value=\"<lang:poll_submit_add>\" style=\"width: auto;\" /></td>\r\n			</tr>\r\n		</table>\r\n	</div>\r\n	<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n</form>'),
 (1,'read','read_poll_choice_row','<tr>\r\n	<td class=\"cellone\"><p class=\"checkwrap\"><input type=\"radio\" name=\"vote\" class=\"check\" id=\"choice_{$val[\'id\']}\" value=\"{$val[\'id\']}\" />&nbsp;<label for=\"choice_{$val[\'id\']}\"><strong>{$val[\'choice\']}</strong></label></p></td>\r\n</tr>'),
 (1,'read','read_poll_result_row','<tr>\r\n	<td class=\"cellone\"><strong>{$val[\'choice\']}</strong></td>\r\n	<td class=\"cellone\" align=\"right\"><img src=\"<sys:skinPath>/bar_left.gif\" alt=\"\" /><img src=\"<sys:skinPath>/bar_center.gif\" alt=\"\" width=\"{$width}\" height=\"17px\" /><img src=\"<sys:skinPath>/bar_right.gif\" alt=\"\" /><br />{$percent}% ( {$val[\'votes\']} votes ) --\r\n</tr>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'read','read_result_wrapper','<div class=\"maintable\">\r\n	<table cellpadding=\"0\" cellspacing=\"1\" width=\"100%\">\r\n		<tr>\r\n			<td class=\"header\" colspan=\"2\">{$poll[\'poll_question\']}</td>\r\n		</tr>\r\n		<tr>\r\n			<th width=\"50%\"><lang:poll_tbl_header_choice></th>\r\n			<th><lang:poll_tbl_header_result></th>\r\n		</tr>\r\n			{$poll_list}\r\n		<tr>\r\n			<td class=\"footer\" style=\"text-align: center;\" colspan=\"2\">&nbsp;</td>\r\n		</tr>\r\n	</table>\r\n</div>'),
 (1,'mod','mod_poll_wrapper','		<h3><lang:mod_poll_editor_title></h3>\r\n		<h4><lang:mod_poll_editor_desc></h4>\r\n		<input type=\"text\" name=\"poll_title\" tabindex=\"1\" value=\"{$poll[\'poll_question\']}\" />\r\n		<h3><lang:poll_choice_title></h3>\r\n		<h4><lang:poll_choice_desc></h4>\r\n		{$choices}\r\n		<h3><lang:poll_expire_title></h3>\r\n		<h4><lang:poll_expire_desc></h4>\r\n		<input type=\"text\" name=\"days\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{$days}\" />\r\n		<h3><lang:poll_lock_title></h3>\r\n		<h4><lang:poll_lock_desc></h4>\r\n		<input type=\"text\" name=\"vote_lock\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{$poll[\'poll_vote_lock\']}\" />\r\n		<h3><lang:poll_options_title></h3>\r\n		<h4><lang:poll_options_desc></h4>\r\n		<p class=\"checkwrap\"><input type=\"checkbox\" class=\"check\" name=\"poll_only\" value=\"1\" tabindex=\"3\" {$poll_only} /> <lang:poll_lock_option></p>\r\n		<p class=\"checkwarn\"><input type=\"checkbox\" class=\"check\" name=\"remove\" value=\"1\" tabindex=\"3\" /> <lang:poll_delete></p>\r\n		<input type=\"hidden\" name=\"poll\" value=\"{$poll[\'poll_id\']}\" />'),
 (1,'mod','mod_poll_option_row','		<input type=\"text\" name=\"choice[{$val[\'id\']}]\" style=\"width: 60%;\" tabindex=\"2\" value=\"{$val[\'choice\']}\" /><input type=\"text\" name=\"votes[{$val[\'id\']}]\" size=\"5\" style=\"width: auto;\" tabindex=\"2\" value=\"{$val[\'votes\']}\" /><br />');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'post','attach_rem_field','<p class=\"checkwarn\"><input type=\"checkbox\" class=\"check\" name=\"remove_attach\" value=\"1\"  />&nbsp;<lang:attach_rem>&nbsp;( <a href=\"<sys:gate>?a=misc&amp;CODE=01&amp;id={$file_id}\">{$file_name}</a> )</p>'),
 (1,'main','main_new_note','<div id=\"message_alert\">\r\n	<h3><lang:note_title></h3>\r\n	<p><a href=\"<sys:gate>?getuser={$note[\'members_id\']}\" title=\"\">{$note[\'members_name\']}</a> <lang:note_desc> <a href=\"<sys:gate>?a=notes&amp;CODE=01&amp;nid={$note[\'notes_id\']}\" title=\"\">{$note[\'notes_title\']}</a>!</p>\r\n</div>'),
 (1,'global','form_error_wrapper','<div id=\"warning\">\r\n<h3><lang:err_wrap_title></h3>\r\n<p><strong><lang:err_wrap_desc></strong></p>\r\n<ul>{$err_list}</ul>\r\n</div>'),
 (1,'ucp','ucp_files_none','<tr>\r\n	<td colspan=\"7\" align=\"center\"><strong><lang:file_none></strong></td>\r\n</tr>'),
 (1,'ucp','ucp_files_row','<tr>\r\n	<td class=\"one\" align=\"center\"><strong>{$row[\'upload_id\']}</strong></td>\r\n	<td><a href=\"<sys:gate>?a=misc&amp;CODE=01&amp;id={$row[\'upload_id\']}\" title=\"\">{$row[\'upload_name\']}</a></td>\r\n	<td class=\"one\"><a href=\"<sys:gate>?a=read&amp;CODE=02&amp;p={$row[\'upload_post\']}\" title=\"\">{$row[\'topics_title\']}</a></td>\r\n	<td align=\"center\">{$row[\'upload_date\']}</td>\r\n	<td class=\"one\" align=\"center\">{$row[\'upload_size\']}</td>\r\n	<td align=\"center\">{$row[\'upload_hits\']}</td>\r\n	<td class=\"one\" align=\"center\"><a href=\"<sys:gate>?a=ucp&amp;CODE=18&amp;id={$row[\'upload_id\']}\" title=\"\" onclick=\"javascript: return confirm(\'<lang:file_link_del_conf>\');\"><lang:file_link_del></a></td>\r\n</tr>'),
 (1,'read','read_attach','<p class=\"attach\">\r\n	<a href=\"<sys:gate>?a=misc&amp;CODE=01&amp;id={$row[\'upload_id\']}\" title=\"\">{$row[\'upload_name\']}</a> <strong><lang:attach_size></strong> {$row[\'upload_size\']} <strong><lang:attach_hits></strong> {$row[\'upload_hits\']}\r\n</p>');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'mailer','mail_coppa','In compliance with the COPPA act your account is currently inactive.\r\n\r\nPlease print this message out and have your parent or guardian sign and date it. \r\nThen fax it to:\r\n\r\n<conf:coppa_fax>\r\n\r\nOR mail it to:\r\n\r\n<conf:coppa_mail>\r\n\r\n------------------------------ CUT HERE ------------------------------\r\nPermission to Participate at <conf:title> ( <conf:site_link> )\r\n\r\nUsername: {$username}\r\nPassword: {$password}\r\nEmail:    {$email}\r\n\r\nI HAVE REVIEWED THE INFORMATION PROVIDED BY MY CHILD AND HEREBY GRANT PERMISSION \r\nTO <conf:title> TO STORE THIS INFORMATION. I UNDERSTAND THIS INFORMATION CAN BE \r\nCHANGED AT ANY TIME BY ENTERING A PASSWORD. I UNDERSTAND THAT I MAY REQUEST FOR \r\nTHIS INFORMATION TO BE REMOVED FROM <conf:title> AT ANY TIME.\r\n\r\n\r\nParent or Guardian: ____________________________\r\n                       (print full name here)\r\nFull Signature:     ____________________________\r\n\r\nToday\'s Date:       ____________________________\r\n\r\n------------------------------ CUT HERE ------------------------------\r\n\r\n\r\nOnce the administrator has received the above form via fax or regular mail your \r\naccount will be activated.\r\n\r\nPlease do not forget your password as it has been encrypted in our database and \r\nwe cannot retrieve it for you. However, should you forget your password you can \r\nrequest a new one which will be activated in the same way as this account.\r\n\r\nThank you for registering.'),
 (1,'global','global_message_level_2','<div id=\"crumb_nav\">\r\n	<a href=\"<conf:site_link>\" title=\"\"><conf:title></a> <macro:txt_bread_sep> <lang:sys_bread_title>\r\n</div>\r\n<div class=\"formwrap\">\r\n	<h3><lang:sys_err_title></h3>\r\n	<h4><lang:sys_err_desc></h4>\r\n	<div id=\"warning\">\r\n		<h3><lang:err_warn_title></h3>\r\n		<p><strong>{$message}</strong></p>\r\n	</div>\r\n	<h3><lang:sys_err_option_title></h3>\r\n	<ul>\r\n		<li><a href=\"<sys:gate>?a=register\" title=\"\"><lang:sys_err_option_reg></a></li>\r\n		<li><a href=\"<sys:gate>?a=logon&amp;CODE=03\" title=\"\"><lang:sys_err_option_rec></a></li>\r\n		<li><a href=\"<sys:gate>?a=help\" title=\"\"><lang:sys_err_option_doc></a></li>\r\n	</ul>\r\n</div>\r\n{$logon_form}');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'global','global_message_level_2_logon','<form method=\"post\" action=\"<sys:gate>?a=logon&amp;CODE=01\">\r\n	<div class=\"formwrap\">\r\n		<h3><lang:sys_log_name_title></h3>\r\n		<h4><lang:sys_log_name_desc></h4>\r\n		<input type=\'text\' name=\'username\' tabindex=\'1\' />\r\n		<h3><lang:sys_log_pass_title></h3>\r\n		<h4><lang:sys_log_pass_desc></h4>\r\n		<input type=\'password\' name=\'password\' tabindex=\'2\' />\r\n		<p class=\"submit\">\r\n			<input class=\"button\" type=\"submit\" value=\"<lang:form_logon_button_submit>\" />&nbsp;\r\n			<input class=\"reset\" type=\"reset\" value=\"<lang:form_logon_button_reset>\" />\r\n		</p>\r\n		<input type=\"hidden\" name=\"hash\" value=\"{$hash}\" />\r\n		<input type=\"hidden\" name=\"referer\" value=\"{$referer}\" />\r\n	</div>\r\n</form>'),
 (1,'register','form_coppa_field','		<p class=\"checkwarn\"><input class=\"check\" type=\"checkbox\" name=\"coppa\" {$coppa} /> <strong><lang:field_coppa_agree></strong></p>'),
 (1,'mailer','mail_admin_user_name','Hello, {$member[\'members_name\']}\r\n\r\nThis message is to inform you that your user name for <conf:title> ( <conf:site_link> )\r\nhas been modified. Below you will find your new user name:\r\n\r\nUsername: {$name}\r\n\r\nLog into your account through the link below:\r\n<conf:site_link><sys:gate>?a=logon');
INSERT INTO `my_templates` (`temp_skin`,`temp_section`,`temp_name`,`temp_code`) VALUES 
 (1,'post','form_field_attach','		<h3><lang:attach_title></h3>\r\n		<h4>{$size_lang}</h4>\r\n		<p class=\"checkwrap\"><input type=\"file\" name=\"upload\" /></p>');
/*!40000 ALTER TABLE `my_templates` ENABLE KEYS */;


--
-- Table structure for table `mytopix_old`.`my_titles`
--

DROP TABLE IF EXISTS `my_titles`;
CREATE TABLE `my_titles` (
  `titles_id` int(10) unsigned NOT NULL,
  `titles_name` varchar(250) default NULL,
  `titles_posts` int(10) unsigned default NULL,
  `titles_pips` int(10) unsigned default NULL,
  `titles_file` varchar(15) NOT NULL default '',
  `titles_skin` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`titles_id`)
) TYPE=MyISAM;

--
-- Dumping data for table `mytopix_old`.`my_titles`
--

/*!40000 ALTER TABLE `my_titles` DISABLE KEYS */;
INSERT INTO `my_titles` (`titles_id`,`titles_name`,`titles_posts`,`titles_pips`,`titles_file`,`titles_skin`) VALUES 
 (1,'Newcomer',0,1,'pip_blue.gif',1),
 (2,'Common Folk',25,3,'pip_poop.gif',1),
 (3,'MyTopix Enthusiast',100,4,'pip_purple.gif',1),
 (4,'Needs a Life',500,6,'pip_red.gif',1),
 (5,'Post Meister',1000,8,'pip_green.gif',1);
/*!40000 ALTER TABLE `my_titles` ENABLE KEYS */;


--
-- Table structure for table `mytopix_old`.`my_topics`
--

DROP TABLE IF EXISTS `my_topics`;
CREATE TABLE `my_topics` (
  `topics_id` int(10) unsigned NOT NULL,
  `topics_forum` int(10) unsigned NOT NULL default '0',
  `topics_title` varchar(250) NOT NULL default '',
  `topics_subject` varchar(255) NOT NULL default '',
  `topics_date` int(10) unsigned NOT NULL default '0',
  `topics_author` int(10) unsigned NOT NULL default '0',
  `topics_views` int(10) unsigned NOT NULL default '0',
  `topics_posts` varchar(8) NOT NULL default '0',
  `topics_last_poster` int(10) unsigned NOT NULL default '0',
  `topics_last_post_time` int(10) unsigned NOT NULL default '0',
  `topics_state` int(1) unsigned NOT NULL default '0',
  `topics_pinned` int(1) NOT NULL default '0',
  `topics_last_poster_name` varchar(200) default NULL,
  `topics_repliers` mediumtext,
  `topics_author_name` varchar(200) NOT NULL default '',
  `topics_moved` tinyint(1) unsigned NOT NULL default '0',
  `topics_mtopic` int(10) unsigned NOT NULL default '0',
  `topics_announce` tinyint(1) unsigned default '0',
  `topics_is_poll` tinyint(1) unsigned NOT NULL default '0',
  `topics_has_file` tinyint(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`topics_id`),
  KEY `topics_forum` (`topics_forum`)
) TYPE=MyISAM;

--
-- Dumping data for table `mytopix_old`.`my_topics`
--

/*!40000 ALTER TABLE `my_topics` DISABLE KEYS */;
INSERT INTO `my_topics` (`topics_id`,`topics_forum`,`topics_title`,`topics_subject`,`topics_date`,`topics_author`,`topics_views`,`topics_posts`,`topics_last_poster`,`topics_last_post_time`,`topics_state`,`topics_pinned`,`topics_last_poster_name`,`topics_repliers`,`topics_author_name`,`topics_moved`,`topics_mtopic`,`topics_announce`,`topics_is_poll`,`topics_has_file`) VALUES 
 (17,2,'Normal Topic','This is a normal topic.',1163227794,2,1,'0',2,1163227794,0,0,'root','a:1:{i:0;s:1:\"2\";}','root',0,0,0,0,0),
 (18,2,'Hot Topic','I have a lot of replies!',1163227882,2,39,'14',2,1163227944,0,0,'root','a:1:{i:0;s:1:\"2\";}','root',0,0,0,0,0),
 (19,2,'Multi-page Topic','I have more than one page.',1163228001,2,61,'30',2,1163228077,0,0,'root','a:1:{i:0;s:1:\"2\";}','root',0,0,0,0,0),
 (26,2,'Bbcode Test Topic','Let&#39;s test out all the bbcode we can use.',1163228446,2,6,'0',2,1163228446,0,0,'root','a:1:{i:0;s:1:\"2\";}','root',0,0,0,0,0),
 (25,2,'Moved Topic','I&#39;ve been moved to a different forum.',1163228185,2,0,'0',2,1163228185,0,0,'root',NULL,'root',1,24,0,0,0),
 (24,3,'Moved Topic','I&#39;ve been moved to a different forum.',1163228185,2,2,'0',2,1163228185,0,0,'root','a:1:{i:0;s:1:\"2\";}','root',0,0,0,0,0);
INSERT INTO `my_topics` (`topics_id`,`topics_forum`,`topics_title`,`topics_subject`,`topics_date`,`topics_author`,`topics_views`,`topics_posts`,`topics_last_poster`,`topics_last_post_time`,`topics_state`,`topics_pinned`,`topics_last_poster_name`,`topics_repliers`,`topics_author_name`,`topics_moved`,`topics_mtopic`,`topics_announce`,`topics_is_poll`,`topics_has_file`) VALUES 
 (23,2,'Poll Topic','I have a poll!',1163228117,2,1,'0',2,1163228117,0,0,'root','a:1:{i:0;s:1:\"2\";}','root',0,0,0,1,0),
 (22,2,'Locked Topic','I&#39;m locked from posting.',1163228073,2,1,'0',2,1163228073,1,0,'root','a:1:{i:0;s:1:\"2\";}','root',0,0,0,0,0),
 (21,2,'Announcement Topic','I&#39;m at the top of every page!',1163228054,2,1,'0',2,1163228054,0,0,'root','a:1:{i:0;s:1:\"2\";}','root',0,0,1,0,0),
 (20,2,'Pinned Topic','I&#39;m pinned to the top!',1163228028,2,2,'0',2,1163228028,0,1,'root','a:1:{i:0;s:1:\"2\";}','root',0,0,0,0,0);
/*!40000 ALTER TABLE `my_topics` ENABLE KEYS */;


--
-- Table structure for table `mytopix_old`.`my_tracker`
--

DROP TABLE IF EXISTS `my_tracker`;
CREATE TABLE `my_tracker` (
  `track_id` int(10) unsigned NOT NULL,
  `track_user` int(10) unsigned NOT NULL default '0',
  `track_topic` int(10) unsigned NOT NULL default '0',
  `track_forum` int(10) unsigned NOT NULL default '0',
  `track_date` int(10) unsigned NOT NULL default '0',
  `track_expire` int(10) unsigned NOT NULL default '0',
  `track_sent` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`track_id`),
  KEY `track_user` (`track_user`),
  KEY `track_topic` (`track_topic`),
  KEY `track_forum` (`track_forum`)
) TYPE=MyISAM;

--
-- Dumping data for table `mytopix_old`.`my_tracker`
--

/*!40000 ALTER TABLE `my_tracker` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_tracker` ENABLE KEYS */;


--
-- Table structure for table `mytopix_old`.`my_uploads`
--

DROP TABLE IF EXISTS `my_uploads`;
CREATE TABLE `my_uploads` (
  `upload_id` int(10) unsigned NOT NULL,
  `upload_post` int(10) unsigned NOT NULL default '0',
  `upload_user` int(10) unsigned NOT NULL default '0',
  `upload_date` int(10) unsigned NOT NULL default '0',
  `upload_name` varchar(250) NOT NULL default '0',
  `upload_file` varchar(32) NOT NULL default '',
  `upload_size` int(10) unsigned NOT NULL default '0',
  `upload_ext` varchar(10) NOT NULL default '0',
  `upload_hits` int(10) unsigned NOT NULL default '0',
  `upload_mime` varchar(250) NOT NULL default '',
  PRIMARY KEY  (`upload_id`),
  KEY `upload_post` (`upload_post`,`upload_user`)
) TYPE=MyISAM;

--
-- Dumping data for table `mytopix_old`.`my_uploads`
--

/*!40000 ALTER TABLE `my_uploads` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_uploads` ENABLE KEYS */;


--
-- Table structure for table `mytopix_old`.`my_vkeys`
--

DROP TABLE IF EXISTS `my_vkeys`;
CREATE TABLE `my_vkeys` (
  `key_id` int(10) unsigned NOT NULL,
  `key_user` int(10) unsigned NOT NULL default '0',
  `key_hash` varchar(32) NOT NULL default '',
  `key_date` int(10) unsigned NOT NULL default '0',
  `key_type` varchar(5) NOT NULL default '',
  PRIMARY KEY  (`key_id`),
  KEY `key_user` (`key_user`)
) TYPE=MyISAM;

--
-- Dumping data for table `mytopix_old`.`my_vkeys`
--

/*!40000 ALTER TABLE `my_vkeys` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_vkeys` ENABLE KEYS */;


--
-- Table structure for table `mytopix_old`.`my_voters`
--

DROP TABLE IF EXISTS `my_voters`;
CREATE TABLE `my_voters` (
  `vote_id` int(10) unsigned NOT NULL,
  `vote_topic` int(10) unsigned NOT NULL default '0',
  `vote_user` int(10) unsigned NOT NULL default '0',
  `vote_date` int(10) unsigned NOT NULL default '0',
  `vote_ip` varchar(15) NOT NULL default '0.0.0.0',
  PRIMARY KEY  (`vote_id`),
  KEY `vote_topic` (`vote_topic`)
) TYPE=MyISAM;

--
-- Dumping data for table `mytopix_old`.`my_voters`
--

/*!40000 ALTER TABLE `my_voters` DISABLE KEYS */;
/*!40000 ALTER TABLE `my_voters` ENABLE KEYS */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
