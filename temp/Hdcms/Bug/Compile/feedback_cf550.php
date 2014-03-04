<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>HDCMS反馈</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?g=Hdcms&a=Bug&c=Bug&m=feedback&_=0.2434289219830329';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Bug';
		CONTROL = 'http://localhost/hdcms/index.php?a=Bug&c=Bug';
		METH = 'http://localhost/hdcms/index.php?a=Bug&c=Bug&m=feedback';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Bug/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Bug/Tpl/Bug';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Bug/Tpl/Public';
		HISTORY = 'http://localhost/hdcms/index.php?a=Hdcms&c=Index&m=index';
		HTTPREFERER = 'http://localhost/hdcms/index.php?a=Hdcms&c=Index&m=index';
</script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/Hdcms/Bug/Tpl/Bug/css/css.css"/>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Hdcms/Bug/Tpl/Bug/js/feedback.js"></script>
</head>
<body>
<form action="?a=Bug&c=BugSuggest&m=suggest" method="post" class="hd-form">
    <div class="wrap">
        <div class="title-header">反馈HDCMS问题或建议</div>
        <a name="bug"></a>
        <table class="table2">
            <tr>
                <td class="w80">类型</td>
                <td>
                    <select name="type">
                        <option value="1">BUG反馈</option>
                        <option value="2">功能建议</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="w80">反馈者</td>
                <td>
                    <input type="text" name="username"/>
                </td>
            </tr>
            <tr>
                <td class="w80">邮箱</td>
                <td>
                    <input type="text" name="email"/>
                </td>
            </tr>
            <tr>
                <td class="w80">内容描述</td>
                <td>
                    <textarea name="content" class="w500 h200"></textarea>
                </td>
            </tr>
        </table>

    </div>
    <div class="position-bottom">
        <input type="submit" value="提交" class="hd-success"/>
    </div>
</form>
</body>
</html>