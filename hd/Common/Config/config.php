<?php
if (!defined("HDPHP_PATH")) exit('No direct script access allowed');
return array_merge(
//网站配置
    require "./data/config/config.inc.php",
    //数据库
    require "./data/config/db.inc.php",
    array(
        'LOG_RECORD'                    => true,       //记录日志
        //标签
        'TPL_TAGS' => array(
            '@@.Hdcms.Index.Tag.ContentTag'
        ),
        //自动加载文件
        'AUTO_LOAD_FILE' => array(
            'functions.php'
        ),
        //不显示"页面找不到"错误
        "404_TPL" => '',
        //session处理
        "SESSION_ENGINE" => "mysql",
        //伪静态后缀
        "PATHINFO_HTML" => '',
        //普通模式 GET方式
        "URL_TYPE" => 2,
//        "URL_REWRITE"=>1,
        //默认组
        "DEFAULT_GROUP" => "Hdcms",
        //默认应用
        "DEFAULT_APP" => "Index",
        //模板后缀
        "TPL_FIX" => ".php",
        //图片上传缩放开启
        "UPLOAD_IMG_RESIZE_ON" => true,
        //编辑器上传文件储存位置
        'EDITOR_SAVE_PATH' => ROOT_PATH . 'upload/editor/' . date('Y/m/d/'), //文件储存目录
        //公共函数库
        "AUTO_LOAD_FILE" => array('functions.php'),
        "TPL_ERROR" => "./hd/Common/Template/error.html", //错误页面
        "TPL_SUCCESS" => "./hd/Common/Template/success.html", //正确页面
        'ROUTE' => array(
            //栏目
            '/^list_(\d+).html$/'=>'a=Index&c=Category&m=category&cid=#1',
            //普通文章
            '/^(\d+)_(\d+)_(\d+).html$/'=>'a=Index&c=Article&m=show&mid=#1&cid=#2&aid=#3',
            //搜索
            '/^([a-z]+)_(.+).html$/'=>'a=Search&c=Search&m=search&g=Hdcms&type=#1&word=#2',
            //栏目（有页码）
            '/^list_(\d+)_(\d+).html$/'=>'a=Index&c=Category&m=category&cid=#1&page=#2',
            //个人主页
            '/^([^&=_]+)$/'=>'a=Space&c=Index&m=index&g=Member&u=#1',
        ),
    )
);
