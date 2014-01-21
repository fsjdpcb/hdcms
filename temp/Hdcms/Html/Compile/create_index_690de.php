<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>生成首页</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Html&c=Html&m=create_index&_=0.9301216343331613';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Html';
		CONTROL = 'http://localhost/hdcms/index.php?a=Html&c=Html';
		METH = 'http://localhost/hdcms/index.php?a=Html&c=Html&m=create_index';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Html/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Html/Tpl/Html';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Html/Tpl/Public';
</script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/Hdcms/Html/Tpl/Html/css/css.css"/>
</head>
<body>
<form method="post" action="http://localhost/hdcms/index.php?a=Html&c=Html&m=create_index" class="hd-form" target="_iframe" onsubmit="return $.modalShow();">
    <div class="wrap">
        <div class="title-header">温馨提示</div>
        <div class="help">
            建议创建计划任务，自动更新首页
        </div>
        <div class="title-header">生成网站首页html文件</div>
        <br/>
        <input type="submit" value="开始更新" class="hd-success"/>
    </div>
</form>
<script>
    $.modal({title: '生成首页', button_cancel: '关闭', width: 450, height: 200, show: false,
        content: "<iframe name='_iframe' scrolling='no' frameborder='0' style='height:110px;'></iframe>",
        cancel: function () {
            window.location.reload(true);
        }
    })
</script>
</body>
</html>