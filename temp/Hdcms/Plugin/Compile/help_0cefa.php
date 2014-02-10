<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>插件说明</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Plugin&c=Install&m=help&plug=Link';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Plugin';
		CONTROL = 'http://localhost/hdcms/index.php?a=Plugin&c=Install';
		METH = 'http://localhost/hdcms/index.php?a=Plugin&c=Install&m=help';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Plugin/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Plugin/Tpl/Install';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Plugin/Tpl/Public';
		HISTORY = 'http://localhost/hdcms/index.php?g=Hdcms&a=Plugin&c=Plugin&m=Plugin_list&_=0.4749971092197687';
		HTTPREFERER = 'http://localhost/hdcms/index.php?g=Hdcms&a=Plugin&c=Plugin&m=Plugin_list&_=0.4749971092197687';
</script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/Hdcms/Plugin/Tpl/Install/css/help.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li>
                <a href="http://localhost/hdcms/index.php?a=Plugin&c=Plugin&m=plugin_list">插件列表</a>
            </li>
            <li>
                <a class="action" href="javascript:;">插件说明</a>
            </li>
        </ul>
    </div>
    <div class="title-header">插件说明</div>
    <div class="help">
        <?php echo $help;?>
    </div>
</div>
</body>
</html>