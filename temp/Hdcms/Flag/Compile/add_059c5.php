<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if (!defined("HDPHP_PATH")) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>属性管理</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Flag&c=Flag&m=add';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Flag';
		CONTROL = 'http://localhost/hdcms/index.php?a=Flag&c=Flag';
		METH = 'http://localhost/hdcms/index.php?a=Flag&c=Flag&m=add';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Flag/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Flag/Tpl/Flag';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Flag/Tpl/Public';
</script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/Hdcms/Flag/Tpl/Flag/css/css.css"/>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Hdcms/Flag/Tpl/Flag/js/add.js"></script>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="<?php echo U(index);?>">属性管理</a></li>
            <li><a href="javascript:;" class="action">添加属性</a></li>
        </ul>
    </div>
    <div class="title-header">添加属性</div>
    <form method="post" class="hd-form" onsubmit="return hd_submit(this,'<?php echo U(index);?>');">
        <table class="table1">
            <tr>
                <th class="w100">属性名称</th>
                <td>
                    <input type="text" name="flagname" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">别名</th>
                <td>
                    <input type="text" name="title" class="w100"/>
                </td>
            </tr>
        </table>
        <div class="position-bottom">
            <input type="submit" class="hd-success" value="确定"/>
        </div>
    </form>
</div>
</body>
</html>