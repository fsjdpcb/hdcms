<?php
//调试模式
define('DEBUG', True);
//设置时区
date_default_timezone_set('PRC');
//应用目录
if (isset($_GET['app'])) {
    define('APP_PATH', 'hdcms/Addons/');
} else {
    define('APP_PATH', 'hdcms/');
}
//临时目录
define('TEMP_PATH', 'temp/');
//插件目录
define('APP_ADDON_PATH','Addons/');
//引入框架主文件
require '../hdphp/hdphp/hdphp.php';