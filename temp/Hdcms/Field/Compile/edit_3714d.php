<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>修改字段</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Field&c=Field&m=edit&mid=2&fid=3';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Field';
		CONTROL = 'http://localhost/hdcms/index.php?a=Field&c=Field';
		METH = 'http://localhost/hdcms/index.php?a=Field&c=Field&m=edit';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Field/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Field/Tpl/Field';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Field/Tpl/Public';
</script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/static/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/Hdcms/Field/Tpl/Field/css/css.css"/>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Hdcms/Field/Tpl/Field/js/js.js"></script>
    <script type="text/javascript">
        var mid = '<?php echo $_GET['mid'];?>';
    </script>
</head>
<body>
<form action="<?php echo U('edit');?>" method="post" class="hd-form">
    <input type="hidden" name="fid" value="<?php echo $_GET['fid'];?>"/>

    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="<?php echo U('Hdcms/Model/index');?>">模型列表</a></li>
                <li><a href="<?php echo U('index',array('mid'=>$_GET['mid']));?>">字段列表</a></li>
                <li><a href="javascript:;" class="action">修改字段</a></li>
            </ul>
        </div>
        <div class="title-header">
            修改字段
        </div>
        <input type="hidden" name="mid" value="<?php echo $_GET['mid'];?>"/>
        <table class="table1">
            <tr>
                <th class="w100">模型</th>
                <td>
                    <input type="text" disabled="disabled" value="<?php echo $model['model_name'];?>"/>
                </td>
            </tr>
            <tr>
                <th>标题<span class="star">*</span></th>
                <td>
                    <input type="text" name="title" class="w200" value="<?php echo $field['title'];?>"/>
                </td>
            </tr>
            <tr>
                <th>会员中心显示</th>
                <td>
                    <label><input type="radio" name="ismember" value="1"
                        <?php if($field['ismember']==1){?>checked="checked"<?php }?>
                        /> 是</label>
                    <label><input type="radio" name="ismember" value="0"
                        <?php if($field['ismember']==0){?>checked="checked"<?php }?>
                        /> 否</label>
                </td>
            </tr>
            <tr>
                <th>提示</th>
                <td>
                    <input type="text" name="set[message]" class="w350"/>
                </td>
            </tr>
        </table>
        <div class="field_tpl">
            <?php require TPL_PATH . '/Form/edit/' . $field['show_type'] . '.php'; ?>
        </div>
        <div class="h60"></div>
    </div>
    <div class="position-bottom">
        <input type="submit" value="确定" class="hd-success"/>
    </div>
</form>
</body>
</html>