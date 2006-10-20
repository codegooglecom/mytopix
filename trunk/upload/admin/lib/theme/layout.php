<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en"  dir="ltr">
	<head>
		<title>MyTopix | Personal Message Board&trade; - Admin Control</title>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta name="generator" content="editplus" />
		<meta name="author" content="" />
		<link href="lib/theme/styles.css" rel="stylesheet" type="text/css" title="default" />
	</head>
	<body>
		<div id="wrapper">
			<div id="header">
				<div id="logo">&nbsp;</div>
				<div id="first_lvl_nav"><?php echo $this->_nav_top; ?></div>
			</div>
            <div id="welcome"><p><a href="?a=main">ACP Main</a> | <a href="../index.php?a=main">View Board</a> | <a href="../index.php?a=logon&CODE=02">Log Off</a></p>Welcome Back, <a href="?a=members&code=05&uid=<?php echo $this->_System->UserHandler->getField('members_id'); ?>"><strong><?php echo $this->_System->UserHandler->getField('members_name'); ?></strong></a>!</div>

            <?php if($this->_nav_middle): ?>
                <br style="clear: both;" />
                <div id="second_lvl_nav" style="clear: both;">
                    <?php echo $this->_nav_middle; ?>
                </div>
            <?php endif; ?>

            <?php if($this->_nav_bottom): ?>
                <br style="clear: both;" />
                <div id="third_lvl_nav">
                    <?php echo $this->_nav_bottom; ?>
                </div>
            <?php endif; ?>

			<div id="container">
				<div id="content">

                    <?php echo $this->buffer; ?>

				</div>
			</div>
			<div id="copyright">
				Copyright &copy; 2004 <a href="#" title="#">Jaia Interactive</a>, all rights reserved
			</div>
		</div>
	</body>
</html>