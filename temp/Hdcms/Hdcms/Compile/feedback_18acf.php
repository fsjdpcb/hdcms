<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>HDCMS快速建站利器</title>
    <script type='text/javascript' src='http://localhost/hdcms/hd/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdcms/hd/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdcms/hd/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdcms/hd/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdcms/hd/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Hdcms&c=Index&m=feedback';
		HDPHP = 'http://localhost/hdcms/hd/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdcms/hd/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdcms/hd/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdcms/hd/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Hdcms';
		CONTROL = 'http://localhost/hdcms/index.php?a=Hdcms&c=Index';
		METH = 'http://localhost/hdcms/index.php?a=Hdcms&c=Index&m=feedback';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Hdcms/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Hdcms/Tpl/Index';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Hdcms/Tpl/Public';
		HTTPREFERER = 'http://localhost/hdcms/index.php?a=Content&c=Content&m=index&nid=4&_=0.8924004539461099';
</script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/Hdcms/Hdcms/Tpl/Index/css/welcome.css"/>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Hdcms/Hdcms/Tpl/Index/js/feedback.js"></script>
</head>
<body>
<div class="wrap">

    <div class="title-header">安全提示</div>
    <table class="table2">
        <tr>
            <td>1. 默认应用组目录hdphp(及子目录)设置为750,文件设置为640</td>
        </tr>
        <tr>
            <td>2. 建议删除安装目录install</td>
        </tr>
    </table>
    <div style="height:10px;overflow: hidden">&nbsp;</div>
    <div class="title-header">HDCMS动态</div>
    <table class="table2">
        <tr>
            <td><a href="#">[2013-2-22] 增加DISCUZ论坛整合</a></td>
        </tr>
        <tr>
            <td><a href="#">[2013-2-22] 增加SINA接口整合</a></td>
        </tr>
    </table>
    &nbsp;&nbsp;&nbsp;<a href="http://www.hdphp.com">>>查看所有动态</a>

    <div style="height:10px;overflow: hidden">&nbsp;</div>
    <div class="title-header">系统信息</div>
    <table class="table2">
        <tr>
            <td class="w80">HDCMS版本</td>
            <td>
                <?php echo C("VERSION");?>
            </td>
        </tr>
        <tr>
            <td class="w80">核心框架</td>
            <td>
                <a href="http://www.hdphp.com" target="_blank">HDPHP</a>
            </td>
        </tr>
        <tr>
            <td>PHP版本</td>
            <td>
                <?php echo PHP_OS; ?>
            </td>
        </tr>
        <tr>
            <td>运行环境</td>
            <td>
                <?php echo $_SERVER['SERVER_SOFTWARE'];?>
            </td>
        </tr>
        <tr>
            <td>允许上传大小</td>
            <td>
                <?php echo ini_get("upload_max_filesize"); ?>
            </td>
        </tr>
        <tr>
            <td>剩余空间</td>
            <td>
                <?php echo get_size(disk_free_space(".")); ?>
            </td>
        </tr>
    </table>
    <div style="height:10px;overflow: hidden">&nbsp;</div>
    <div class="title-header">程序团队</div>
    <table class="table2">
        <tr>
            <td class="w80">版权所有</td>
            <td>
                <a href="http://www.houdunwang.com" target="_blank">后盾网</a> &
                <a href="http://www.hdphp.com/hdcms" target="_blank">HDCMS</a>
            </td>
        </tr>
        <tr>
            <td>项目负责人</td>
            <td>
                向军
            </td>
        </tr>
        <tr>
            <td>鸣谢</td>
            <td>
                <a href="http://bbs.houdunwang.com" target="_blank">后盾网所有盾友</a>

            </td>
        </tr>
    </table>
    <div style="height:10px;overflow: hidden">&nbsp;</div>
    <div class="title-header">反馈</div>
    <a name="bug"></a>

    <form action="?a=Bug&c=BugSuggest&m=suggest" method="post" class="form-inline hd-form">
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
        <input type="submit" value="提交" class="hd-success"/>
    </form>
</div>
</body>
</html>