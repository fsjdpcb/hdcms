<?php
$config 					    = require 'data/config/config.inc.php';
$config['HDCMS_NAME']           = 'HDCMS 简体中文 UTF8 版';
$config['HDCMS_VERSION']        = '2014.07.08';
$config['SESSION_OPTIONS']      = array('type' => 'mysql', 'table' => 'session');
$config['HOOK']                 = array("APP_START" => array("AppStartHook"));
$config['URL_TYPE']             = 2;
return array_merge($config,require 'data/config/db.inc.php');
?>