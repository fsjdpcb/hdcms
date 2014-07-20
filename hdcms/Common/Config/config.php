<?php
$globalConfig 					    = require './data/config/config.inc.php';
$globalConfig['EMAIL_FORMMAIL']	    = $globalConfig['EMAIL_USERNAME'];//邮箱发件人
$config = array(
	'AUTO_LOAD_FILE' 				=> array('hdcms/Common/Functions/functions.php'), //自动加载文件
	'SESSION_OPTIONS' 				=> array('type' => 'mysql', 'table' => 'session'), //session处理
	'URL_TYPE' 						=> 2, //普通模式 GET方式
	'EDITOR_SAVE_PATH' 			    => 'upload/editor/' . date('y/m/d/'), //文件储存目录
	 '404_URL'					    => '?m=_404', //404跳转url
);
$config['URL_REWRITE'] 			= 	intval($globalConfig['OPEN_REWRITE']);//REWRITE重写

if (!empty($globalConfig['SESSION_NAME'])) 		$config['SESSION_OPTIONS']['name'] 		= $globalConfig['SESSION_NAME'];
if (!empty($globalConfig['SESSION_DOMAIN']))	$config['SESSION_OPTIONS']['domain'] 	= $globalConfig['SESSION_DOMAIN'];
//路由处理
if (intval($globalConfig['PATHINFO_TYPE'])) {
    $config['ROUTE'] 				= array(
        '/^list_(\d+)_(\d+).html$/' 			=> 'm=Index&c=Index&a=category&mid=#1&cid=#2',
        '/^list_(\d+)_(\d+)_(\d+).html$/' 	=> 'm=Index&c=Index&a=category&mid=#1&cid=#2&page=#3',
        '/^(\d+)_(\d+)_(\d+).html$/' 		=> 'm=Index&c=Index&a=content&mid=#1&cid=#2&aid=#3',
    );
}
$config['ROUTE']['/^([0-9a-z]+)$/']	=	'm=Member&c=Space&a=index&u=#1';//个人主页
return array_merge($globalConfig,require './data/config/db.inc.php', $config);
?>