<?php
$config 					    = require 'data/config/config.inc.php';
$config['EMAIL_FORMMAIL']	    = $config['EMAIL_USERNAME'];
$config['TPL_TAGS']             = array('@.Common.Tag.ContentTag');
$config['AUTO_LOAD_FILE']       = array('hdcms/Common/Functions/functions.php');
$config['SESSION_OPTIONS']      = array('type' => 'mysql', 'table' => 'session');
$config['URL_TYPE']             = 2;
$config['EDITOR_SAVE_PATH']     = 'upload/editor/' . date('y/m/d/');
$config['404_URL']              = '?a=_404';
$config['URL_REWRITE'] 			= intval($config['OPEN_REWRITE']);

//------------------------SESSION------------------------
if (!empty($config['SESSION_NAME'])) 		$config['SESSION_OPTIONS']['name'] 		= $config['SESSION_NAME'];
if (!empty($config['SESSION_DOMAIN']))	$config['SESSION_OPTIONS']['domain'] 	= $config['SESSION_DOMAIN'];

//------------------------路由器------------------------
if (intval($config['PATHINFO_TYPE'])) {
    $config['ROUTE']= array(
        '/^list_(\d+)_(\d+).html$/' 		=> 'm=Index&c=Index&a=category&mid=#1&cid=#2',
        '/^list_(\d+)_(\d+)_(\d+).html$/' 	=> 'm=Index&c=Index&a=category&mid=#1&cid=#2&page=#3',
        '/^(\d+)_(\d+)_(\d+).html$/' 		=> 'm=Index&c=Index&a=content&mid=#1&cid=#2&aid=#3',
    );
}
$config['ROUTE']['/^([0-9a-z]+)$/']	=	'm=Member&c=Space&a=index&u=#1';//个人主页路由
return array_merge($config,require './data/config/db.inc.php');
?>