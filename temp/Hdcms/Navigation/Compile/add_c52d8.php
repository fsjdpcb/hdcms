<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>后台菜单管理</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Navigation&c=Navigation&m=add&pid=0';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Navigation';
		CONTROL = 'http://localhost/hdcms/index.php?a=Navigation&c=Navigation';
		METH = 'http://localhost/hdcms/index.php?a=Navigation&c=Navigation&m=add';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Navigation/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Navigation/Tpl/Navigation';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Navigation/Tpl/Public';
		HISTORY = 'http://localhost/hdcms/index.php?a=Navigation&c=Navigation&m=index';
		HTTPREFERER = 'http://localhost/hdcms/index.php?a=Navigation&c=Navigation&m=index';
</script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Hdcms/Navigation/Tpl/Navigation/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/Hdcms/Navigation/Tpl/Navigation/css/css.css"/>
</head>
<body>
<form action="<?php echo U('add');?>" method="post" class="hd-form" onsubmit="return hd_submit(this,'<?php echo U(index);?>')">
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="<?php echo U('index');?>">导航列表</a></li>
                <li><a href="javascript:;" class="action">添加导航</a></li>
                <li><a href="javascript:hd_ajax('<?php echo U(update_cache);?>');">更新缓存</a></li>
            </ul>
        </div>
        <div class="title-header">菜单信息</div>
        <table class="table1">
            <tr>
                <td class="w100">上级:</td>
                <td>
                    <select name="pid">
                        <option value="0"> == 一级导航 == </option>
                        <?php $hd["list"]["n"]["total"]=0;if(isset($nav) && !empty($nav)):$_id_n=0;$_index_n=0;$lastn=min(1000,count($nav));
$hd["list"]["n"]["first"]=true;
$hd["list"]["n"]["last"]=false;
$_total_n=ceil($lastn/1);$hd["list"]["n"]["total"]=$_total_n;
$_data_n = array_slice($nav,0,$lastn);
if(count($_data_n)==0):echo "";
else:
foreach($_data_n as $key=>$n):
if(($_id_n)%1==0):$_id_n++;else:$_id_n++;continue;endif;
$hd["list"]["n"]["index"]=++$_index_n;
if($_index_n>=$_total_n):$hd["list"]["n"]["last"]=true;endif;?>

                                <option value="<?php echo $n['nid'];?>" <?php if($n['nid']==$_GET['pid']){?>selected="selected"<?php }?>><?php echo $n['_name'];?></option>
                        <?php $hd["list"]["n"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>导航:</td>
                <td>
                    <input type="text" name="title" class="w200"/>
                </td>
            </tr>
            <tr>
                <td>链接Url:</td>
                <td>
                    <input type="text" name="url" class="w300"/>
                </td>
            </tr>
            <tr>
                <td class="w100">打开方式</td>
                <td>
                    <select name="target">
                        <option value="1">当前窗口  _self </option>
                        <option value="2">新窗口  _blank </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>状态:</td>
                <td>
                    <label><input type="radio" name="status" value="1" checked="checked"> 显示</label>
                    <label><input type="radio" name="status" value="0"> 隐藏</label>
                </td>
            </tr>
        </table>
    </div>
    <div class="position-bottom">
        <input type="submit" class="hd-success" value="提交"/>
    </div>
</form>
</body>
</html>