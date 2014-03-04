<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>添加会员组</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Member&c=Group&m=add';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Member';
		CONTROL = 'http://localhost/hdcms/index.php?a=Member&c=Group';
		METH = 'http://localhost/hdcms/index.php?a=Member&c=Group&m=add';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Member/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Member/Tpl/Group';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Member/Tpl/Public';
		HISTORY = 'http://localhost/hdcms/index.php?g=Hdcms&a=Member&c=Group&m=index&_=0.14402518249076224';
		HTTPREFERER = 'http://localhost/hdcms/index.php?g=Hdcms&a=Member&c=Group&m=index&_=0.14402518249076224';
</script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Hdcms/Member/Tpl/Group/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/Hdcms/Member/Tpl/Group/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="<?php echo U('index');?>" >会员组列表</a></li>
            <li><a href="javascript:;" class="action">添加会员组</a></li>
        </ul>
    </div>
    <div class="title-header">添加会员组</div>
    <form action="<?php echo U('add');?>" method="post" onsubmit="return hd_submit(this)" class="hd-form">
        <table class="table1">
            <tr>
                <th class="w100">会员组名称</th>
                <td>
                    <input type="text" name="gname" class="w300"/>
                </td>
            </tr>
            <tr>
                <th class="w100">积分小于</th>
                <td>
                    <input type="text" name="point" class="w300" value="0"/>
                </td>
            </tr>
            <tr>
                <th class="w100">用户权限</th>
                <td>
                  <ul>
                      <li>
                          <label><input type="checkbox" value="1" name="allowpost" checked="checked"/> 允许投稿 </label>
                      </li>
                      <li>
                          <label><input type="checkbox" value="1" name="allowpostverify"/> 投稿不需审核 </label>
                      </li>
                      <li>
                          <label><input type="checkbox" value="1" name="allowsendmessage" checked="checked"/> 允许发短消息 </label>
                      </li>
                  </ul>
                </td>
            </tr>
            <tr>
                <th class="w100">简洁描述</th>
                <td>
                    <input type="text" name="description" class="w300"/>
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