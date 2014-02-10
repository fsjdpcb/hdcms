<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>自定义JS列表</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?g=Hdcms&a=TemplateTag&c=CustomJs&m=index&_=0.5864145671948477';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=TemplateTag';
		CONTROL = 'http://localhost/hdcms/index.php?a=TemplateTag&c=CustomJs';
		METH = 'http://localhost/hdcms/index.php?a=TemplateTag&c=CustomJs&m=index';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/TemplateTag/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/TemplateTag/Tpl/CustomJs';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/TemplateTag/Tpl/Public';
		HISTORY = 'http://localhost/hdcms/index.php?a=Hdcms&c=Index&m=index';
		HTTPREFERER = 'http://localhost/hdcms/index.php?a=Hdcms&c=Index&m=index';
</script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Hdcms/TemplateTag/Tpl/CustomJs/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/Hdcms/TemplateTag/Tpl/CustomJs/css/css.css"/>
</head>
<body>
<form method="post" action="http://localhost/hdcms/index.php?a=TemplateTag&c=CustomJs&m=make_all">
    <div class="wrap">
        <div class="title-header">温馨提示</div>
        <div class="help">
            1 页面生成HTML后，有新文章添加时并不会及时显示，这时可以使用js标签功能<br/>
            2 js标签会及时显示文章内容，但不适用大量使用<br/>
        </div>
        <div class="menu_list">
            <ul>
                <li><a href="<?php echo U('index');?>" class="action">标签列表</a></li>
                <li><a href="<?php echo U('add');?>">添加自定义JS标签</a></li>
            </ul>
        </div>
        <table class="table2">
            <thead>
            <tr>
                <td class="w30">tid</td>
                <td>标签名称</td>
                <td class="w150">添加时间</td>
                <td class="w150">操作</td>
            </tr>
            </thead>
            <?php $hd["list"]["t"]["total"]=0;if(isset($tag) && !empty($tag)):$_id_t=0;$_index_t=0;$lastt=min(1000,count($tag));
$hd["list"]["t"]["first"]=true;
$hd["list"]["t"]["last"]=false;
$_total_t=ceil($lastt/1);$hd["list"]["t"]["total"]=$_total_t;
$_data_t = array_slice($tag,0,$lastt);
if(count($_data_t)==0):echo "";
else:
foreach($_data_t as $key=>$t):
if(($_id_t)%1==0):$_id_t++;else:$_id_t++;continue;endif;
$hd["list"]["t"]["index"]=++$_index_t;
if($_index_t>=$_total_t):$hd["list"]["t"]["last"]=true;endif;?>

                <tr>
                    <td><?php echo $t['id'];?></td>
                    <td>
                        <?php echo $t['name'];?>
                    </td>
                    <td>
                        <?php echo date('Y-m-d H:i',$t['addtime']);?>
                    </td>
                    <td align="right">
                        <a href="http://localhost/hdcms/index.php?a=TemplateTag&c=CustomJs&m=get_js&id=<?php echo $t['id'];?>">JS调用</a><span
                            class="line">|</span>
                        <a href="http://localhost/hdcms/index.php?a=TemplateTag&c=CustomJs&m=edit&id=<?php echo $t['id'];?>">编辑</a><span
                            class="line">|</span>
                        <a href="javascript:;" onclick="del(<?php echo $t['id'];?>)">删除</a>
                    </td>
                </tr>
            <?php $hd["list"]["t"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
        </table>
    </div>
</form>