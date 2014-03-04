<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>友情链接类型列表</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?g=Plugin&a=Link&c=Type&m=index';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Link';
		CONTROL = 'http://localhost/hdcms/index.php?a=Link&c=Type';
		METH = 'http://localhost/hdcms/index.php?a=Link&c=Type&m=index';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Plugin/Link/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Plugin/Link/Tpl/Type';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Plugin/Link/Tpl/Public';
		HISTORY = 'http://localhost/hdcms/index.php?g=Plugin&a=Link&c=Type&m=add';
		HTTPREFERER = 'http://localhost/hdcms/index.php?g=Plugin&a=Link&c=Type&m=add';
</script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/static/css/common.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="http://localhost/hdcms/index.php?g=Plugin&a=Link&c=Manage&m=index">友情链接</a></li>
            <li><a href="http://localhost/hdcms/index.php?g=Plugin&a=Link&c=Manage&m=audit">审核申请</a></li>
            <li><a href="http://localhost/hdcms/index.php?g=Plugin&a=Link&c=Manage&m=add">添加链接</a></li>
            <li><a href="http://localhost/hdcms/index.php?g=Plugin&a=Link&c=Type&m=add">添加分类</a></li>
            <li><a href="http://localhost/hdcms/index.php?g=Plugin&a=Link&c=Type&m=index" class="action">分类管理</a></li>
            <li><a href="http://localhost/hdcms/index.php?g=Plugin&a=Link&c=Set&m=set">模块配置</a></li>
        </ul>
    </div>
    <table class="table2 hd-form">
        <thead>
        <tr>
            <td class="w30">tid</td>
            <td>类型名称</td>
            <td class="w100">系统内置</td>
            <td class="w100">操作</td>
        </tr>
        </thead>
        <tbody>
        <?php $hd["list"]["t"]["total"]=0;if(isset($type) && !empty($type)):$_id_t=0;$_index_t=0;$lastt=min(1000,count($type));
$hd["list"]["t"]["first"]=true;
$hd["list"]["t"]["last"]=false;
$_total_t=ceil($lastt/1);$hd["list"]["t"]["total"]=$_total_t;
$_data_t = array_slice($type,0,$lastt);
if(count($_data_t)==0):echo "";
else:
foreach($_data_t as $key=>$t):
if(($_id_t)%1==0):$_id_t++;else:$_id_t++;continue;endif;
$hd["list"]["t"]["index"]=++$_index_t;
if($_index_t>=$_total_t):$hd["list"]["t"]["last"]=true;endif;?>

            <tr>
                <td><?php echo $t['tid'];?></td>
                <td><?php echo $t['type_name'];?></td>
                <td>
                    <?php if($t['system'] == 1){?>是<?php  }else{ ?>否<?php }?>
                </td>
                <td>
                    <a href="<?php echo U('edit',array('g'=>'Plugin','tid'=>$t['tid']));?>">编辑</a>
                    <?php if($t['system']==1){?>
                        <span style="color:#999;">删除</span>
                    <?php  }else{ ?>
                        <a href="javascript:hd_ajax('<?php echo U('del',array('g'=>'Plugin'));?>',{tid:<?php echo $t['tid'];?>});">删除</a>
                    <?php }?>

                </td>
            </tr>
        <?php $hd["list"]["t"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
        </tbody>
    </table>
</div>
</body>
</html>