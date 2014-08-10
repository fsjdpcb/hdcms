<?php
$config 					    = require 'data/config/config.inc.php';
$config['HDCMS_NAME']           = 'HDCMS 简体中文 UTF8 版';
$config['HDCMS_VERSION']        = '2014.07.08';
$config['SESSION_OPTIONS']      = array('type' => 'mysql', 'table' => 'session');
$config['HOOK']                 = array("APP_START" => array("AppStartHook"));
$config['URL_TYPE']             = 2;
$config['EDITOR_SAVE_PATH']     = 'upload/editor/' . date('y/m/d/');//编辑器上传文件存储目录
$config['TPL_TAGS']             = array('@.Common.Tag.ContentTag');//模板标签
$config['EMAIL_FORMMAIL']       = $config['EMAIL_USERNAME'];//邮件发送者
$config['AUTO_LOAD_FILE']       = array('hdcms/Common/Functions/functions.php');//自动加载文件
$config['ROUTE']                = array(
    '/^list_(\d+)_(\d+).html$/' 		=> 'm=Index&c=Index&a=category&mid=#1&cid=#2',//栏目
    '/^list_(\d+)_(\d+)_(\d+).html$/' 	=> 'm=Index&c=Index&a=category&mid=#1&cid=#2&page=#3',//栏目分页
    '/^(\d+)_(\d+)_(\d+).html$/' 		=> 'm=Index&c=Index&a=content&mid=#1&cid=#2&aid=#3',//内页页
);
return array_merge($config,require 'data/config/db.inc.php');
?>