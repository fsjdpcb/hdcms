<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>文件管理</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Upload&c=Upload&m=index&id=img_images&type=images&num=10&name=images';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Upload';
		CONTROL = 'http://localhost/hdcms/index.php?a=Upload&c=Upload';
		METH = 'http://localhost/hdcms/index.php?a=Upload&c=Upload&m=index';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Upload/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Upload/Tpl/Upload';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Upload/Tpl/Public';
</script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Hdcms/Upload/Tpl/Upload/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/Hdcms/Upload/Tpl/Upload/css/css.css"/>
    <script>
        <?php echo $get;?>
    </script>
</head>
<body>
    <div class="tab">
        <ul class="tab_menu">
            <li lab="upload"><a href="#">上传文件</a></li>
            <li lab="site"><a href="#">站内图片</a></li>
            <li lab="untreated"><a href="#">未使用图片</a></li>
        </ul>
        <div class="tab_content">
            <div id="upload" style="padding: 5px;">
                <?php echo $upload;?>
            </div>
            <div id="site">

            </div>
            <div id="untreated">

            </div>
        </div>
    </div>
<div class="position-bottom">
    <input type="button" class="hd-success" id="pic_selected" value="确定"/>
    <input type="button" class="hd-cancel" value="关闭" onclick="close_window();"/>
</div>
</body>
</html>