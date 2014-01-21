<?php
if (!defined("HDPHP_PATH")) exit('No direct script access allowed');
return array_merge(
//网站配置
    require "./data/config/config.inc.php",
    //数据库
    require "./data/config/db.inc.php",
    array(
        //显示debug信息
        "DEBUG_SHOW" => 1,
        //不显示"页面找不到"错误
        "404_TPL" => "",
        //session处理
        "SESSION_ENGINE" => "mysql",
        //伪静态后缀
        "PATHINFO_HTML" => "",
        //普通模式 GET方式
        "URL_TYPE" => 2,
        //默认组
        "DEFAULT_GROUP" => "Hdcms",
        //默认应用
        "DEFAULT_APP" => "Index",
        //模板后缀
        "TPL_FIX" => ".php",
        //编辑器上传文件储存位置
        'EDITOR_SAVE_PATH'          => ROOT_PATH . 'upload/editor/'.date('Y/m/d/'), //文件储存目录
        //公共函数库
        "AUTO_LOAD_FILE" => array(),
        "TPL_ERROR" => "./hd/Common/Template/error.html", //错误页面
        "TPL_SUCCESS" => "./hd/Common/Template/success.html", //正确页面
    )
);
