<?php
//调试模式
  define('DEBUG', True);

//设置时区
date_default_timezone_set('PRC');

//应用目录
define('APP_PATH','HDCMS/');

//Temp目录
define('TEMP_PATH','Temp/');

//引入框架主文件
require '../hdphp/hdphp/hdphp.php';
//require 'HDCMS/hdphp/hdphp.php';