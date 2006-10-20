<?php

$modules = array();

//MODULE NAMES:        CACHE GROUPS:

$modules['active']   = array('forums');
$modules['email']    = array('filter');
$modules['help']     = array('emoticons');
$modules['logon']    = array();
$modules['main']     = array('forums', 'moderators');
$modules['members']  = array('titles');
$modules['misc']     = array('emoticons',  'forums');
$modules['mod']      = array('moderators', 'filter',    'forums');
$modules['notes']    = array('titles',     'filter',    'emoticons');
$modules['post']     = array('moderators', 'forums',    'filter',    'emoticons');
$modules['print']    = array('titles',     'filter',    'emoticons', 'forums');
$modules['profile']  = array('forums',     'emoticons', 'filter');
$modules['read']     = array('moderators', 'titles',    'filter',    'emoticons', 'forums');
$modules['register'] = array();
$modules['search']   = array('forums',     'emoticons');
$modules['ucp']      = array('emoticons',  'filter');
$modules['topics']   = array('forums',     'moderators');
$modules['calendar'] = array('emoticons', 'filter', 'titles');

?>