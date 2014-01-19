<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>模型管理</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Model&c=Model&m=add';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Model';
		CONTROL = 'http://localhost/hdcms/index.php?a=Model&c=Model';
		METH = 'http://localhost/hdcms/index.php?a=Model&c=Model&m=add';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Model/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Model/Tpl/Model';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Model/Tpl/Public';
</script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/Hdcms/Model/Tpl/Model/css/css.css"/>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Hdcms/Model/Tpl/Model/js/validate.js"></script>
</head>
<body>
<form action="<?php echo U('add');?>" method="post" class="hd-form" onsubmit="return hd_submit(this,'<?php echo U(index);?>')">
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="<?php echo U('index');?>">模型列表</a></li>
                <li><a href="javascript:;" class="action">添加模型</a></li>
            </ul>
        </div>
        <div class="title-header">
            添加模型
        </div>
        <div class="right_content">
            <table class="table1">
                <tr>
                    <th class="w100">模型名称</th>
                    <td>
                        <input type="text" name="model_name" class="w200"/>
                    </td>
                </tr>
                <tr>
                    <th>表名</th>
                    <td>
                        <input type="text" name="tablename" class="w200"/>
                    </td>
                </tr>
                <tr>
                    <th>类型</th>
                    <td>
                        <label><input type="radio" name="type" value="1" checked="checked"/> 基本模型</label>
                        <label><input type="radio" name="type" value="2"/> 独立模型(只有主表)</label>
                    </td>
                </tr>
                <tr>
                    <th>允许前台投稿</th>
                    <td>
                        <label><input type="radio" name="is_submit" value="1"/> 允许</label>
                        <label><input type="radio" name="is_submit" value="0" checked="checked"/>
                            不允许</label>
                    </td>
                </tr>
                <tr>
                    <th>模型描述</th>
                    <td>
                        <textarea name="description" class="w300 h100"></textarea>
                    </td>
                </tr>
                <tr>
                    <th>应用名称</th>
                    <td>
                        <input type="text" name="app_name" value="Content" class="w200"/>
                        <span class="validation"></span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="position-bottom">
        <input type="submit" value="确定" class="hd-success"/>
    </div>
</form>
</body>
</html>