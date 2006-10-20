<?php

error_reporting(0);

define('DEBUG',         false);
define('GATEWAY',       '');
define('INSTALLER',     true);
define('ONEPANEL',      true);
define('SYSTEM_PATH',   '../');
define('PHP_MAGIC_GPC', get_magic_quotes_gpc());

define('F_ENTS',     1);
define('F_CHARS',    2);
define('F_BREAKS',   4);
define('F_CURSE',    8);
define('F_CODE',    16);
define('F_SMILIES', 32);
define('F_BBSTRIP', 64);

?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>

<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>
	<head>
		<title>MyTopix&trade; - Installation Manager</title>
		<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1' />
		<script src="install.js" type="text/javascript"></script>
		<link href="<?php echo SYSTEM_PATH; ?>admin/lib/theme/styles.css" rel="stylesheet" type="text/css" title="default" />
        <style type="text/css">

        #wrapper {
            width: 450px;
            background: transparent;
        }
        
        #footer { text-align: center; }

        h3 {font-size: 13px;}

        </style>
		</head>
	<body style="margin: 50px; text-align: left;">
        <div id="wrapper">
<?php

include_once SYSTEM_PATH . 'config/settings.php';
include_once SYSTEM_PATH . 'lib/file.han.php';
include_once SYSTEM_PATH . 'lib/http.han.php';
include_once SYSTEM_PATH . 'lib/time.han.php';
include_once SYSTEM_PATH . 'admin/lib/onepanel.php';
require_once SYSTEM_PATH . 'admin/lib/form.han.php';
require_once SYSTEM_PATH . 'admin/lib/table.han.php';
require_once SYSTEM_PATH . 'admin/lib/tab.han.php';
require_once SYSTEM_PATH . 'lib/file.han.php';
require_once SYSTEM_PATH . 'lib/db/database.db.php';
require_once SYSTEM_PATH . 'lib/db/MySql.db.php';
require_once SYSTEM_PATH . 'lib/db/MySql41.db.php';
require_once SYSTEM_PATH . 'lib/time.han.php';
require_once SYSTEM_PATH . 'lib/parse.han.php';
require_once SYSTEM_PATH . 'lib/cookie.han.php';
require_once SYSTEM_PATH . 'lib/cache.han.php';

$_GET  = HttpHandler::checkVars($_GET);
$_POST = HttpHandler::checkVars($_POST);

unset($HttpHandler);

$CookieHandler = new CookieHandler($config, $_COOKIE);
$FileHandler   = new FileHandler($config);
$TimeHandler   = new TimeHandler(null, $config);
$Panel         = new OnePanel(null);

if(file_exists('setup.lock'))
{
    echo warning('<strong>FATAL ERROR:</strong> The installer is locked from use! You may <strong>NOT</strong> continue.');
    exit();
}

$files = array(SYSTEM_PATH . 'config/settings.php',
               SYSTEM_PATH . 'lang/',
               SYSTEM_PATH . 'lang/english/',
               SYSTEM_PATH . 'skins/',
               SYSTEM_PATH . 'skins/1/',
               SYSTEM_PATH . 'skins/1/styles.css',
               SYSTEM_PATH . 'skins/1/emoticons/',
               SYSTEM_PATH . 'uploads/attachments/',
               SYSTEM_PATH . 'uploads/avatars/',
               SYSTEM_PATH . 'setup/');

$errors = '';

foreach($files as $val)
{
    if(false == is_writable($val))
    {
        $errors .= "<li>{$val}</li>";
    }
}

if($errors)
{
    $errors = "<ul>{$errors}</ul>";

    echo warning('You must set the appropriate file system access permissions to the following list of files & directories before continuing. If you are not sure which CHMOD setting to use, try 0777:' . $errors);
    exit();
}

$mode = isset($_GET['mode'])  ? $_GET['mode']  : 'begin';
$mode = isset($_POST['mode']) ? $_POST['mode'] : 'begin';

if(isset($_POST['mode']))
{
    $mode = $_POST['mode'];
}
elseif(isset($_GET['mode']))
{
    $mode = $_GET['mode'];
}

if(false == $mode)
{
    $mode = 'begin';
}

switch($mode)
{
    case 'begin':

        setup_log('Choosing installation type.');

        $Panel->addHeader('Step One: Installation Type');

		$Panel->form->startForm('index.php');
		$Panel->appendBuffer($Panel->form->flushBuffer());

			$out  = $Panel->form->addRadio('mode', 'install', " checked=\"checked\"",   'New MyTopix&trade; Installation', true);
			$out .= $Panel->form->addRadio('mode', 'upgrade', false, 'Upgrade From Previous Version', true);
			$out .= $Panel->form->addRadio('mode', 'convert', " disabled=\"disabled\"", 'Convert From Another Board', true);
			$out .= $Panel->form->addRadio('mode', 'plugin',  " disabled=\"disabled\"", 'MyTopix&trade; PlugInstaller', true);

            $Panel->form->addWrap($out, 'MyTopix&trade; Installation Manager:', 'Welcome to the installer! Please choose one of the following options:', true);

		$Panel->form->endForm('Next Step');
		$Panel->appendBuffer($Panel->form->flushBuffer());

        echo $Panel->buffer;

        break;

    case 'install':

        $step = isset($_GET['step']) ? $_GET['step'] : 1;

        switch($step)
        {
            case 1:

                setup_log('INSTALLING MYTOPIX');
                setup_log('Entering database information');

                $Panel->addHeader('Step Two: Database Information');

                $Panel->form->startForm('index.php?step=2');
                $Panel->appendBuffer($Panel->form->flushBuffer());

                    $Panel->form->addTextBox('db_user', false, false,
                                             array(1,   'User Name',
                                             'The username given to you by your host to connect to your database.'));

                    $Panel->form->addPassBox('db_pass', false, false,
                                             array(1,   'User Password',
                                             'Word or phrase used to gain access to your database.'));

                    $Panel->form->addTextBox('db_name', 'mytopix', false,
                                             array(1,   'Database Name',
                                             'The name of the database to install MyTopix&trade to.'));

                    $Panel->form->addTextBox('db_host', 'localhost', false,
                                             array(1,   'Database Server Location',
                                             'The location of your database server <em>( usually localhost )</em>.'));

                    $Panel->form->addTextBox('db_port', '3306', false,
                                             array(1,   'Database Server Port',
                                             'The port to connect to on your database server <em>( usually 3306 )</em>.'));

                    $Panel->form->addTextBox('db_pref', 'my_', false,
                                             array(1,   'Database Prefix',
                                             'If you are installing into an already-in-use database, using a table prefix could clear up naming issues with other tables. This is completely optional.'));

                    $database = array('MySql'   => 'MySQL 4.0.x',
                                      'MySql41' => 'MySQL 4.1.x');

			        $Panel->form->addWrapSelect('db_type', $database, 'MySql', false,
									            array(1, 'Database Engine:',
                                                'Please select your database backend you wish to use from the following list.'));

                    $out  = $Panel->form->addRadio('db_persist', 1, " checked=\"checked\"", '<strong>Yes, enable persistent connections.</strong>', true);
                    $out .= $Panel->form->addRadio('db_persist', 0, false, '<strong>Do not enable persistent connections.</strong>', true);

                    $Panel->form->addWrap($out, 'Persistent Connections', 'Depending on your server setup, persistent connections <em>may</em> offer added efficiency when accessing your database.', true);

                    $Panel->form->addHidden('mode', 'install');

                $Panel->form->endForm('Next Step');
                $Panel->appendBuffer($Panel->form->flushBuffer());

                echo $Panel->buffer;

                break;

            case 2:

                extract($_POST);

                setup_log('Processing database information');

                if(false == $db_user)
                {
                    setup_log('... ERROR: no server account username');

                    echo warning('<strong>ERROR:</strong> You must include a user name to access your account.' .
                                 '<br /><a href="javascript:history.back(-1);"><strong>« Go Back</strong></a>');
                    exit();
                }

                if(false == $db_host)
                {
                    setup_log('... ERROR: no server host');

                    echo warning('<strong>ERROR:</strong> You must include your database server\'s location' .
                                 '!<br /><a href="javascript:history.back(-1);"><strong>« Go Back</strong></a>');
                    exit();
                }

                if(false == $db_name)
                {
                    setup_log('... ERROR: no database name');

                    echo warning('<strong>ERROR:</strong> The installation requires the name of a database to ' .
                                 'install to. Please go back and include this information.<br />'     .
                                 '<a href="javascript:history.back(-1);"><strong>« Go Back</strong></a>');
                    exit();
                }

                $db_handler_name = $db_type . 'Handler';

                $DB = new $db_handler_name($db_host, $db_port);
                $DB->doConnect($db_user, $db_pass, $db_name, $db_persist);

                $status = '... Pass';

                if(false == $DB->isConnected())
                {
                    $status = '... Fail';

                    echo warning('<strong>ERROR:</strong> A connection to your database could not be '     .
                                 'established with the information you have provided. Please '   .
                                 'go back and double check your data!<br /><a href="javascript:' .
                                 'history.back(-1);"><strong>« Go Back</strong></a>');
                    exit();
                }

                setup_log('Preforming database connectivity test' . $status);

                require_once SYSTEM_PATH . 'config/settings.php';

                $config['db_user']    = $db_user;
                $config['db_pass']    = $db_pass;
                $config['db_name']    = $db_name;
                $config['db_host']    = $db_host;
                $config['db_pref']    = $db_pref;
                $config['db_port']    = $db_port;
                $config['db_persist'] = $db_persist;
                $config['db_type']    = $db_type;

                FileHandler::updateFileArray($config, 'config', SYSTEM_PATH . 'config/settings.php');

                setup_log('Updating settings.php with database connectivity information');

                echo message('<strong>SUCCESS!</strong> A connection to your database has been established!' .
                             ' Your settings have been updated. Please continue to the next step.' .
                             '<br /><a href="index.php?mode=install&amp;step=3"><strong>Click to Continue »</strong></a>', true);
                break;

            case 3:

                setup_log('Entering community data');

                $Panel->addHeader('Step Three: Community Information');

                $Panel->form->startForm('index.php?step=4&amp;mode=install');
                $Panel->appendBuffer($Panel->form->flushBuffer());

                    $Panel->form->addTextBox('title', 'My Community', false,
                                             array(1, 'Board Title',
                                             'This will be the name of your MyTopix&trade; community.'));

                    $Panel->form->addTextBox('site_link', false, false,
                                             array(1,    'Site Address (URI)',
                                             'This is the direct web address of this discussion board. <br /><strong>MUST END WITH A TRAILING SLASH</strong>'));

                    $Panel->form->addSelect('servertime', TimeHandler::makeTimeZones(), false, false,
                                            array(1,      'Server Timezone',
                                            'Choose the timezone this server is located in.'));

                    $Panel->form->addSelect('language', fetchPacks(), false, false,
                                            array(1,    'Default Language',
                                            'Choose your default custom language pack.'));

                $Panel->form->endForm('Next Step');
                $Panel->appendBuffer($Panel->form->flushBuffer());

                echo $Panel->buffer;

                break;

            case 4:

                extract($_POST);

                setup_log('Processing community data');

                require_once SYSTEM_PATH . 'lib/parse.han.php';
                require_once SYSTEM_PATH . 'config/settings.php';

                $current = getcwd();
                chdir('../');
                $abs_path = getcwd();
                chdir($current);

                $abs_path = substr($abs_path, strlen($abs_path) - 1, 1) != '/'
                           ? $abs_path . '/'
                           : $abs_path;

                $config['site_path'] = PHP_OS == 'WINNT'
                                     ? str_replace(array('admin', '\\'), array('', '/'), $abs_path)
                                     : $abs_path;

                if(false == preg_match("#^http://#", $site_link))
                {
                    $site_link = "http://{$site_link}";
                }

                if(false == preg_match("#/$#", $site_link))
                {
                    $site_link = "{$site_link}/";
                }

                $config['site_link']  = $site_link;
                $config['title']      = stripslashes($title);
                $config['language']   = $language;
                $config['servertime'] = $servertime;

                FileHandler::updateFileArray($config, 'config', SYSTEM_PATH . 'config/settings.php');

                setup_log('Community data processing complete');

                echo message('<strong>SUCCESS!</strong> Your community settings have been saved! Please'   .
                             ' continue to the next step. <br /><a href="index.php?mode=install' .
                             '&amp;step=5"><strong>Click to Continue »</strong></a>');
                break;

            case 5:

                setup_log('Entering default administrator account profile');

                $Panel->addHeader('Step Four: Administrator Account');

                $Panel->form->startForm('index.php?step=6&amp;mode=install');
                $Panel->appendBuffer($Panel->form->flushBuffer());

                    $Panel->form->addTextBox('username', false, false,
                                             array(1,    'Your Account Name',
                                             'This is the name of your administrator account.'));

                    $Panel->form->addPassBox('password',  false, false,
                                             array(1,     'Your Password',
                                             'The secret word or phrase you will use to access your account.'));

                    $Panel->form->addPassBox('cpassword', false, false,
                                             array(1,     'Confirm Your Password',
                                             'Please confirm the above password in the field below.'));

                    $Panel->form->addTextBox('email', false, false,
                                             array(1, 'Your Email Account',
                                             'This will be your account\'s registered email address.'));

                    $Panel->form->addTextBox('cemail', false, false,
                                             array(1,  'Confirm Your Email Account',
                                             'Please confirm the above email address.'));

                $Panel->form->endForm('Install MyTopix&trade;!!!');
                $Panel->appendBuffer($Panel->form->flushBuffer());

                echo $Panel->buffer;

                break;

            case 6:

                extract($_POST);

                setup_log('Processing default administration account');

                $len_user = preg_replace("/&#([0-9]+);/", '_', $username);
                $len_pass = preg_replace("/&#([0-9]+);/", '_', $password);
                $username = preg_replace("/\s{2,}/",      ' ', $username);

                if(strlen($len_user) > 32)
                {
                    setup_log('... ERROR: password is too long');

                    echo warning('<strong>ERROR:</strong> Please shorten your user name to under <strong>32</strong> charactors.' .
                                 '<br /><a href="javascript:history.back(-1);"><strong>« Go Back</strong></a>');
                    exit();
                }

                if(strlen($len_user) < 3)
                {
                    setup_log('... ERROR: password is too short');

                    echo warning('<strong>ERROR:</strong> Please lengthen your user name to, at least, <strong>3</strong> charactors.' .
                                 '<br /><a href="javascript:history.back(-1);"><strong>« Go Back</strong></a>');

                    exit();
                }

                if($password != $cpassword)
                {
                    setup_log('... ERROR: password confirmation');

                    echo warning('<strong>ERROR:</strong> Please reconfirm your password, it does not match.' .
                                 '<br /><a href="javascript:history.back(-1);"><strong>« Go Back</strong></a>');
                    exit();
                }

                if(false == preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*$/i", $email))
                {
                    setup_log('... ERROR: invalid email');

                    echo warning('<strong>ERROR:</strong> You have entered an invalid email format.' .
                                 '<br /><a href="javascript:history.back(-1);"><strong>« Go Back</strong></a>');
                    exit();
                }

                if($email != $cemail)
                {
                    setup_log('ERROR: email confirmation');

                    echo warning('<strong>ERROR:</strong> Please reconfirm your email address, it does not match.' .
                                 '<br /><a href="javascript:history.back(-1);"><strong>« Go Back</strong></a>');
                    exit();
                }

                require_once SYSTEM_PATH . 'config/settings.php';

                setup_log('Opening database connection for admin account and default system data insertion');

                $db_handler_name = $config['db_type'] . 'Handler';

                $DB = new $db_handler_name($config['db_host'], $config['db_port']);
                $DB->doConnect($config['db_user'], $config['db_pass'], $config['db_name'], $config['db_persist']);

                $salt = makeSalt();
                $auto = md5(makeSalt(100));

                $password = md5(md5($salt) . md5($password));
                $db_type  = strtolower($config['db_type']);

                define('DB_PREFIX', $config['db_pref']);

                setup_log('Installing system tables:');

                $query = array();

                include_once 'install/' . $db_type . '/sql_tables.php';

                foreach($query as $sql)
                {
                    $DB->query($sql);
                }

                setup_log('Installing default system information:');

                $query = array();

                include_once 'install/' . $db_type . '/sql_default.php';

                foreach($query as $sql)
                {
                    $DB->query($sql);
                }

                setup_log('Table and system default information stored');

                $config['news_forum']         = 2;
                $config['installed']          = time();
                $config['latest_member_name'] = stripslashes($username);
                $config['latest_member_id']   = 2;
                $config['total_members']      = 1;
                $config['most_online_date']   = time();

                $config['topics'] = 1;
                $config['posts']  = 0;

                FileHandler::updateFileArray($config, 'config', SYSTEM_PATH . 'config/settings.php');

                setup_log('Updating settings.php with default system statistics');
                setup_log('Installing default templates');

                $query = array();

                include_once 'install/' . $db_type . '/sql_templates.php';

                foreach($query as $sql)
                {
                    $DB->query($sql);
                }

                setup_log('Finishing installing default templates');

                setup_log('Updating system cache groups');

                $CacheHandler = new CacheHandler($DB, false);
                $CacheHandler->updateAllCache();
                $CacheHandler->updateCache('macros', $config['skin']);

                setup_log('Attempting to log in administrator');

                $CookieHandler->setVar('id',   2,     (86400 * 365));
                $CookieHandler->setVar('pass', $auto, (86400 * 365));

                setup_log('Locking installer');

                $handle = @fopen('setup.lock', 'w');
                @fwrite($handle, 'p00p');
                @fclose($handle);

                echo message('<strong>SUCCESS!</strong> Your MyTopix&trade; | Personal Message Board is now'         .
                             ' installed and ready for use. If you find that you are not logged in, you will have '  .
                             'to do so using the main log in form. Enjoy your new community!' .
                             '<br /><a href="' . $config['site_link'] . '"><strong>Click to ' .
                             'Continue »</strong></a>');

                setup_log('INSTALLATION COMPLETE');
                @rename('setup_log.txt', 'setup_log.bak');

                break;

            default:

                echo warning('<strong>FATAL ERROR:</strong> Invalid Access Attempt!');

                break;
        }

        break;

    case 'upgrade':

        if(false == is_writable('upgrade/'))
        {
            echo warning('Before you can use this feature, the upgrade manager must be able to write to it\'s folder. Please CHMOD "\setup\upgrade\" to 0777.');
            exit();
        }

        define('DB_PREFIX', $config['db_pref']);

        $step = isset($_GET['step']) ? $_GET['step'] : 1;

        $version_bits    = explode(' ', $config['version']);
        $current_version = $version_bits[1];

        if($handle = opendir('upgrade/'))
        {
            $versions = array();

            while(false !== ($file = readdir($handle)))
            {
                $ext = end(explode('.', $file));

                if($file != '.'    &&
                   $file != '..'   &&
                   false == in_array($ext, array('html', 'txt')))
                {
                    list($from, $to) = explode('-', $file);

                    $versions[$file] = array('FROM' => str_replace('_', '.', $from),
                                             'TO'   => str_replace('_', '.', $to));
                }
            }
            closedir($handle);
        }

        $db_handler_name = $config['db_type'] . 'Handler';

        $DB = new $db_handler_name($config['db_host'], $config['db_port']);
        $DB->doConnect($config['db_user'], $config['db_pass'], $config['db_name'], $config['db_persist']);

        switch($step)
        {
            case 1:
                
                if(false == $versions)
                {
                    echo warning('<strong>FATAL ERROR:</strong> Upgrades could not be found! Please double check your upgrade files.');
                    exit();
                }

                $Panel->addHeader("Upgrade Your Board From Version {$current_version}:");

                $Panel->form->startForm('index.php?step=2');
                $Panel->appendBuffer($Panel->form->flushBuffer());

                $out = '';

                foreach($versions as $path => $ver)
                {
                    $disabled = '';

                    if($current_version >= $ver['TO'])
                    {
                        $disabled = " disabled=\"disabled\"";
                    }

                    if($current_version < $ver['FROM'])
                    {
                        $disabled = " disabled=\"disabled\"";
                    }

                    $out .= $Panel->form->addRadio('version', $path, $disabled, "From {$ver['FROM']} To {$ver['TO']}", true);
                }

                $Panel->form->addWrap($out, 'MyTopix&trade; Upgrade Manager:', 'The upgrader only makes changes to database, language and configuration files. Other files included within the upgrade Please choose which version to upgrade to.', true);

                $Panel->form->addHidden('mode', 'upgrade');

                $Panel->form->endForm('Upgrade');
                $Panel->appendBuffer($Panel->form->flushBuffer());

                echo $Panel->buffer;

                break;

            case 2:

                extract($_POST);

                if(false == isset($version))
                {
                    echo warning('<strong>FATAL ERROR:</strong> Please choose an upgrade package.');
                    exit();
                }

                if($current_version >= $versions[$version]['TO'])
                {
                    echo warning('<strong>FATAL ERROR:</strong> You must first upgrade to the version following the current version of your board.');
                    exit();
                }

                if($current_version < $versions[$version]['FROM'])
                {
                    echo warning('<strong>FATAL ERROR:</strong> There is no need to use this upgrade.');
                    exit();
                }

                $file = "upgrade/{$current_version}-{$versions[$version]['TO']}-log.txt";

                setup_log("Upgrading from {$current_version} to {$versions[$version]['TO']}", $file);

                include_once "upgrade/{$version}/upgrade.php";
   
                setup_log('UPGRADE COMPLETE.', $file);

                setup_log('Locking installer');

                $handle = @fopen('setup.lock', 'w');
                @fwrite($handle, 'p00p');
                @fclose($handle);

                echo message('<strong>SUCCESS!</strong> Your installation has been upgraded and the installer has been locked. Be sure to properly unpack any files that have been included within this package!' .
                             "<br /><a href=\"{$config['site_link']}\"><strong>Goto Your Board »</strong></a>", true);

                break;

            default:

                echo warning('<strong>FATAL ERROR:</strong> Invalid Access Attempt!');
                break;

        }

        break;

    case 'convert':

        break;

    case 'plug':

        break;

    default:

        echo warning('<strong>FATAL ERROR:</strong> Invalid Access Attempt!');

        break;
}

?>
        <br />
		<div id="footer">
            <p>Powered By: <strong>MyTopix&trade; | Personal Message Board</strong> <?php echo $config['version']; ?><br />
			copyright &copy; 2004 <a href="http://www.jaia-interactive.com" title="">Jaia Interactive</a>, all rights reserved</p>
		</div>
    </div>
</body>

<?php

function message($message)
{
    $out  = "<div id=\"message\" style=\"width: 100%;\">";
    $out .= "<h3>System Message:</h3>";
    $out .= "<p>{$message}</p>";
    $out .= "</div>";

    return $out;
}

function warning($message)
{
    $out  = "<div id=\"warning\" style=\"width: 100%;\">";
    $out .= "<h3>Warning:</h3>";
    $out .= "<p>{$message}</p>";
    $out .= "</div>";

    return $out;
}

function setup_log($msg, $file = 'setup_log.txt')
{
    $time = date("D M j G:i:s T Y", time());
    $msg  = $time . ' - ' . $msg . "\n";

    $handle = @fopen($file, 'a');
    @fwrite($handle, $msg);
    @fclose($handle);
    @chmod($file, 0777);

    return true;
}

function fetchPacks()
{
    $handle = opendir(SYSTEM_PATH . 'lang/');
    while(false !== ($file = readdir($handle)))
    {
        if(false == file_exists($file) && $file != 'index.html' && end(explode('.', $file)) != 'tar')
        {
            $list[$file] = $file;
        }
    }
    closedir($handle);

    return $list;
}

function makeSalt($size = 5)
{
    srand((double)microtime() * 1000000);

    $salt = '';
    for($i = 0; $i < $size; $i++)
    {
        $salt .= chr(rand(33, 126));
    }

    return addslashes($salt);
}

?>