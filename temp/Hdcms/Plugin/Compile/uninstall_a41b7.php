<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>卸载插件</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Plugin&c=Install&m=uninstall&plug=Link';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Plugin';
		CONTROL = 'http://localhost/hdcms/index.php?a=Plugin&c=Install';
		METH = 'http://localhost/hdcms/index.php?a=Plugin&c=Install&m=uninstall';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Plugin/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Plugin/Tpl/Install';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Plugin/Tpl/Public';
		HISTORY = 'http://localhost/hdcms/index.php?g=Hdcms&a=Plugin&c=Plugin&m=Plugin_list&_=0.234868037955411';
		HTTPREFERER = 'http://localhost/hdcms/index.php?g=Hdcms&a=Plugin&c=Plugin&m=Plugin_list&_=0.234868037955411';
</script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Hdcms/Hdcms/Tpl/Index/js/menu.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Hdcms/Plugin/Tpl/Install/Js/js.js"></script>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li>
                <a href="http://localhost/hdcms/index.php?a=Plugin&c=Plugin&m=plugin_list">插件列表</a>
            </li>
            <li>
                <a class="action" href="javascript:;">安装插件</a>
            </li>
        </ul>
    </div>
    <div class="title-header">安装插件</div>
    <form method="post" onsubmit="return false">
        <input type="hidden" name="plug" value="<?php echo $plug['plug'];?>"/>
        <table class="table1 hd-form">
            <tr>
                <th class="w150">插件名称</th>
                <td><?php echo $plug['name'];?></td>
            </tr>
            <tr>
                <th>插件版本</th>
                <td><?php echo $plug['version'];?></td>
            </tr>
            <tr>
                <th>团队名称</th>
                <td><?php echo $plug['team'];?></td>
            </tr>
            <tr>
                <th>发布时间</th>
                <td><?php echo $plug['pubdate'];?></td>
            </tr>
            <tr>
                <th>网站</th>
                <td><?php echo $plug['web'];?></td>
            </tr>
            <tr>
                <th>电子邮箱</th>
                <td><?php echo $plug['email'];?></td>
            </tr>
            <tr>
                <th>对于模块的文件处理方法</th>
                <td>
                    <label>
                        <input type="radio" name="del_file" value="0" checked="checked"/> 手工删除文件，仅运行卸载程序
                    </label>
                    <label>
                        <input type="radio" name="del_file" value="1"/> 删除模块的所有文件
                    </label>
                </td>
            </tr>
        </table>
        <div class="position-bottom">
            <input type="submit" value="安装" class="hd-success"/>
        </div>
    </form>
</div>
</body>
</html>