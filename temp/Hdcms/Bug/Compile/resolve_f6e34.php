<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>解决反馈</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Bug&c=Bug&m=resolve&bid=6';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Bug';
		CONTROL = 'http://localhost/hdcms/index.php?a=Bug&c=Bug';
		METH = 'http://localhost/hdcms/index.php?a=Bug&c=Bug&m=resolve';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Bug/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Bug/Tpl/Bug';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Bug/Tpl/Public';
</script>
    <script type="text/javascript" src="http://localhost/hdcms/hdcms/static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Hdcms/Bug/Tpl/Bug/js/add_validation.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Hdcms/Bug/Tpl/Bug/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/Hdcms/Bug/Tpl/Bug/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="<?php echo U('showBug');?>" class="action">所有反馈</a></li>
        </ul>
    </div>
    <div class="title-header">反馈处理</div>
    <form method="post" class="hd-form" onsubmit="return hd_submit(this,'<?php echo U('showBug');?>')">
        <input type="hidden" value="<?php echo $field['bid'];?>" name="bid"/>
        <table class="table1">
            <tr>
                <th class="w100">反馈者</th>
                <td>
                    <?php echo $field['username'];?>
                </td>
            </tr>
            <tr>
                <th class="w100">邮箱</th>
                <td>
                    <a href="mailto:<?php echo $field['email'];?>"><?php echo $field['email'];?></a>
                </td>
            </tr>
            <tr>
                <th class="w100">提交时间</th>
                <td>
                    <?php echo date('Y-m-d H:i:s',$field['addtime']);?>
                </td>
            </tr>
            <tr>
                <th class="w100">问题摘要</th>
                <td>
                    <textarea class="w600 h200"><?php echo $field['content'];?></textarea>
                </td>
            </tr>
            <tr>
                <th class="w100">问题类型</th>
                <td>
                    <?php echo $field['type'];?>
                </td>
            </tr>
            <tr>
                <th class="w100">状态</th>
                <td>
                    <label><input type="radio" name="status" value="未审核"
                        <?php if($field['status']=='未审核'){?>checked='checked'<?php }?>
                        /> 未审核</label>
                    <label><input type="radio" name="status" value="处理中"
                        <?php if($field['status']=='处理中'){?>checked='checked'<?php }?>
                        /> 处理中</label>
                    <label><input type="radio" name="status" value="已解决"
                        <?php if($field['status']=='已解决'){?>checked='checked'<?php }?>
                        /> 已解决</label>
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