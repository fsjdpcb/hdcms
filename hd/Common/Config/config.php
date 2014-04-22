<?php
if (!defined('HDPHP_PATH')) exit('No direct script access allowed');
$globalConfig = require './data/config/config.inc.php';
$config = array(
        //标签
        'TPL_TAGS' => array(
            '@@.Hdcms.Index.Tag.ContentTag'
        ),
        //自动加载文件
        'AUTO_LOAD_FILE' => array(
            'functions.php'
        ),
        //404跳转url
        '404_URL' => '',
        //session处理
        'SESSION_ENGINE' => 'mysql',
        //普通模式 GET方式
        'URL_TYPE' => 2, 
        //默认组
        'DEFAULT_GROUP' => 'Hdcms',
        //默认应用
        'DEFAULT_APP' => 'Index',
        //模板后缀
        'TPL_FIX' => '.php',
        //图片上传缩放开启
        'UPLOAD_IMG_RESIZE_ON' => true,
        //编辑器上传文件储存位置
        'EDITOR_SAVE_PATH' => ROOT_PATH . 'upload/editor/' . date('Y/m/d/'), //文件储存目录
        'TPL_ERROR' => 'hd/Common/Template/error.html', //错误页面
        'TPL_SUCCESS' => 'hd/Common/Template/success.html', //正确页面
        'ROUTE'=>array(
            //首页分页
            '/^(\d+).html$/'=>'Index/Index/index/page/#1',
            //栏目
            '/^list_(\d+).html$/'=>'Index/Category/category/cid/#1',
            //栏目分页
            '/^list_(\d+)_(\d+).html$/'=>'Index/Category/category/cid/#1/page/#2',
            //普通文章
            '/^(\d+)_(\d+)_(\d+).html$/'=>'Index/Article/show/mid/#1/cid/#2/aid/#3',
            //单文章
            '/^single_(\d+).html$/'=>'Index/Single/show/cid/#1',
            //搜索
            '/^([a-z]+)_(.+).html$/'=>'Search/Search/search/Hdcms/type/#1/word/#2',
            //栏目（有页码）
            '/^list_(\d+)_(\d+).html$/'=>'Index/Category/category/cid/#1/page/#2',
            //个人主页
            '/^([0-9a-z]+)$/'=>'a=Space&c=Index&m=index&g=Member&u=#1',
		)
    );
//Index应用时设置Rewrite规则
if(!isset($_GET['a']) || $_GET['a']=='Index'){
	//url重写模式
    $config['URL_REWRITE']=intval($globalConfig['open_rewrite']);
    //类型1 pathinfo  2 普通GET方式
	$config['URL_TYPE']=intval($globalConfig['pathinfo_type'])?1:2;
}
return array_merge(
	//网站配置
    $globalConfig,
    //数据库
    require './data/config/db.inc.php',
    $config
    
);