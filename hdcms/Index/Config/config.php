<?php
return array(
    'TPL_FIX'           => '.html', //模板后缀
    'TPL_TAGS'          => array('@.Common.Tag.ContentTag'), //模板标签
    'EDITOR_SAVE_PATH'  => 'upload/editor/' . date('y/m/d/'),//编辑器上传文件存储目录
    'EMAIL_FORMMAIL'    => $config['EMAIL_USERNAME'],//邮件发送者
    'AUTO_LOAD_FILE'    => array('hdcms/Common/Functions/functions.php'),//自动加载文件
    'ROUTE'             => array(
        '/^list_(\d+)_(\d+).html$/' 		=> 'm=Index&c=Index&a=category&mid=#1&cid=#2',
        '/^list_(\d+)_(\d+)_(\d+).html$/' 	=> 'm=Index&c=Index&a=category&mid=#1&cid=#2&page=#3',
        '/^(\d+)_(\d+)_(\d+).html$/' 		=> 'm=Index&c=Index&a=content&mid=#1&cid=#2&aid=#3',
    )
);
?>