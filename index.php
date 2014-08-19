<?php
//调试模式
define('DEBUG', True);

//设置时区
date_default_timezone_set('PRC');

//插件目录
define('APP_ADDON_PATH','Addons/');

//应用目录
define('APP_PATH','HDCMS/');
//define('APP_PATH',isset($_GET['app'])?APP_ADDON_PATH:'HDCMS/');

//引入框架主文件
require '../hdphp/hdphp/hdphp.php';