<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>添加分类</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?g=Plugin&a=Link&c=Type&m=add';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Link';
		CONTROL = 'http://localhost/hdcms/index.php?a=Link&c=Type';
		METH = 'http://localhost/hdcms/index.php?a=Link&c=Type&m=add';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Plugin/Link/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Plugin/Link/Tpl/Type';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Plugin/Link/Tpl/Public';
		HISTORY = 'http://localhost/hdcms/index.php?g=Plugin&a=Link&c=Manage&m=audit';
		HTTPREFERER = 'http://localhost/hdcms/index.php?g=Plugin&a=Link&c=Manage&m=audit';
</script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/static/css/common.css"/>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Plugin/Link/Tpl/Type/js/add_validate.js"></script>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="http://localhost/hdcms/index.php?g=Plugin&a=Link&c=Manage&m=index">友情链接</a></li>
            <li><a href="http://localhost/hdcms/index.php?g=Plugin&a=Link&c=Manage&m=audit">审核申请</a></li>
            <li><a href="http://localhost/hdcms/index.php?g=Plugin&a=Link&c=Manage&m=add">添加链接</a></li>
            <li><a href="http://localhost/hdcms/index.php?g=Plugin&a=Link&c=Type&m=add" class="action">添加分类</a></li>
            <li><a href="http://localhost/hdcms/index.php?g=Plugin&a=Link&c=Type&m=index">分类管理</a></li>
            <li><a href="http://localhost/hdcms/index.php?g=Plugin&a=Link&c=Set&m=set">模块配置</a></li>
        </ul>
    </div>
    <form action="" method="post" class="hd-form" enctype="multipart/form-data" onsubmit="return hd_submit(this,'<?php echo U(index,array('g'=>'Plugin'));?>')">
        <div class="title-header">添加分类</div>
        <table class="table1">
            <tr>
                <th class="w100">类型名称</th>
                <td>
                    <input type="text" name="type_name" class="w200"/>
                </td>
            </tr>

        </table>
        <div class="position-bottom">
            <input type="submit" value="确定" class="hd-success"/>
        </div>
    </form>
</div>
</body>
</html>