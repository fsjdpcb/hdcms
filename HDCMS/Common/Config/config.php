<?php
$config 					    = require APP_CONFIG_PATH.'config.inc.php';
$config['HDCMS_NAME']           = 'HDCMS 简体中文 UTF8 版';
$config['HDCMS_VERSION']        = '2014.10.7';
$config['SESSION_OPTIONS']      = array('type' => 'mysql', 'table' => 'session');
$config['HOOK']                 = array("APP_INIT" => array("AppInitHook"));
$config['URL_TYPE']             = 2;
$config['TPL_FIX']             = '.php'; //模板后缀
$config['EDITOR_SAVE_PATH']     = 'upload/editor/' . date('y/m/d/');//编辑器上传文件存储目录
$config['TPL_TAGS']             = array('@.Index.Tag.ContentTag');//模板标签
$config['AUTO_LOAD_FILE']       = array('functions.php');//自动加载文件
$config['ROUTE']                = array(
    '/^list_(\d+)_(\d+).html$/' 		=> 'm=Index&c=Index&a=category&mid=#1&cid=#2',//栏目
    '/^list_(\d+)_(\d+)_(\d+).html$/' 	=> 'm=Index&c=Index&a=category&mid=#1&cid=#2&page=#3',//栏目分页
    '/^(\d+)_(\d+)_(\d+).html$/' 		=> 'm=Index&c=Index&a=content&mid=#1&cid=#2&aid=#3',//内页页
);
return array_merge($config,require APP_CONFIG_PATH.'db.inc.php');
?>