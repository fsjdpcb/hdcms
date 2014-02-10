<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>单文章列表</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?g=Hdcms&a=Single&c=single&m=index&_=0.4775521160351429';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Single';
		CONTROL = 'http://localhost/hdcms/index.php?a=Single&c=Single';
		METH = 'http://localhost/hdcms/index.php?a=Single&c=Single&m=index';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Single/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Single/Tpl/Single';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Single/Tpl/Public';
		HISTORY = 'http://localhost/hdcms/index.php?a=Hdcms&c=Index&m=index';
		HTTPREFERER = 'http://localhost/hdcms/index.php?a=Hdcms&c=Index&m=index';
</script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/static/js/js.js"></script>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="<?php echo U('content',array('cid'=>$_GET['cid'],'state'=>1));?>" class="action">内容列表</a></li>
            <li><a href="javascript:;" onclick="window.open('<?php echo U(add);?>')">添加内容</a></li>
        </ul>
    </div>
    <div class="title-header">温馨提示</div>
    <div class="help">
        <ul>
            <li>单文章用来添加如：联系我们、公司简介等文章</li>
            <li>模板中调用单文章使用&lt;single&gt;&lt;/single&gt;标签</li>
        </ul>
    </div>
    <table class="table2 hd-form">
        <thead>
        <tr>
            <td class="w30">aid</td>
            <td width="30">排序</td>
            <td>标题</td>
            <td class="w80">作者</td>
            <td class="w80">修改时间</td>
            <td class="w100">操作</td>
        </tr>
        </thead>
        <?php $hd["list"]["c"]["total"]=0;if(isset($data) && !empty($data)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($data));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($data,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

            <tr>
                <td><?php echo $c['aid'];?></td>
                <td>
                    <input type="text" class="w30" value="<?php echo $c['arc_sort'];?>" name="arc_order[<?php echo $c['aid'];?>]"/>
                </td>
                <td><a href="<?php echo U(edit,array('aid'=>$c['aid']));?>" target="_blank"><?php echo $c['title'];?></a>
                    <?php echo $c['flag'];?>
                </td>
                <td>
                    <?php echo $c['author'];?>
                </td>
                <td>
                    <?php echo date('Y-m-d',$c['updatetime']);?>
                </td>
                <td align="right">
                    <a href="<?php echo U('Index/Single/single',array('aid'=>$c['aid']));?>" target="_blank">访问</a><span
                        class="line">|</span>
                    <a href="javascript:;" onclick="window.open('<?php echo U(edit,array('aid'=>$c['aid']));?>')">编辑</a><span
                        class="line">|</span>
                    <a href="javascript:hd_ajax('<?php echo U(del);?>',{aid:<?php echo $c['aid'];?>});">删除</a>
<!--                    <span class="line">|</span><a href="">评论</a>-->
                </td>
            </tr>
        <?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
    </table>
    <div class="page1">
        <?php echo $page;?>
    </div>
</div>
</body>
</html>