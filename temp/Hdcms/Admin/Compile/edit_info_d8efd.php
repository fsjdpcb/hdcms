<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>个人资料修改</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?g=Hdcms&a=Admin&c=Personal&m=edit_info&_=0.7521946823842458';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Admin';
		CONTROL = 'http://localhost/hdcms/index.php?a=Admin&c=Personal';
		METH = 'http://localhost/hdcms/index.php?a=Admin&c=Personal&m=edit_info';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Admin/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Admin/Tpl/Personal';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Admin/Tpl/Public';
		HISTORY = 'http://localhost/hdcms/index.php?a=Hdcms&c=Index&m=index';
		HTTPREFERER = 'http://localhost/hdcms/index.php?a=Hdcms&c=Index&m=index';
</script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Hdcms/Admin/Tpl/Personal/js/edit_info.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/Hdcms/Admin/Tpl/Personal/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="title-header">个人资料修改</div>
    <form action="<?php echo U('edit_info');?>" method="post" onsubmit="return hd_submit(this,'http://localhost/hdcms/index.php?a=Admin&c=Personal&m=edit_info')" class="hd-form">
        <input type="hidden" name="uid" value="<?php echo $user['uid'];?>"/>
        <table class="table1">
            <tr>
                <th class="w100">管理员名称</th>
                <td>
                    <?php echo $user['username'];?>
                </td>
            </tr>
            <tr>
                <th class="w100">最后登录时间</th>
                <td>
                    <?php echo date('Y-m-d',$user['logintime']);?>
                </td>
            </tr>
            <tr>
                <th class="w100">最后登录IP</th>
                <td>
                    <?php echo $user['ip'];?>
                </td>
            </tr>
            <tr>
                <th class="w100">真实姓名</th>
                <td>
                    <input type="text" name="realname" class="w200" value="<?php echo $user['realname'];?>"/>
                </td>
            </tr>
            <tr>
                <th class="w100">邮箱</th>
                <td>
                    <input type="text" name="email" class="w200" value="<?php echo $user['email'];?>"/>
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