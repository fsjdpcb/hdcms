<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>插件列表</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?g=Hdcms&a=Plugin&c=Plugin&m=Plugin_list&_=0.5259979250928347';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Plugin';
		CONTROL = 'http://localhost/hdcms/index.php?a=Plugin&c=Plugin';
		METH = 'http://localhost/hdcms/index.php?a=Plugin&c=Plugin&m=Plugin_list';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Plugin/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Plugin/Tpl/Plugin';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Plugin/Tpl/Public';
		HISTORY = 'http://localhost/hdcms/index.php?a=Hdcms&c=Index&m=index';
		HTTPREFERER = 'http://localhost/hdcms/index.php?a=Hdcms&c=Index&m=index';
</script>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li>
                <a class="action" href="http://localhost/hdcms/index.php?a=Plugin&c=Plugin&m=plugin_list">插件列表</a>
            </li>
        </ul>
    </div>
    <table class="table2 hd-form">
        <thead>
        <tr>
            <td>插件名称</td>
            <td class="w150">版本号</td>
            <td class="w150">发布时间</td>
            <td class="w150">开发团队</td>
            <td class="w150">插件状态</td>
            <td class="w100">插件目录</td>
            <td class="w50">管理</td>
        </tr>
        </thead>
        <tbody>
        <?php $hd["list"]["p"]["total"]=0;if(isset($plugin) && !empty($plugin)):$_id_p=0;$_index_p=0;$lastp=min(1000,count($plugin));
$hd["list"]["p"]["first"]=true;
$hd["list"]["p"]["last"]=false;
$_total_p=ceil($lastp/1);$hd["list"]["p"]["total"]=$_total_p;
$_data_p = array_slice($plugin,0,$lastp);
if(count($_data_p)==0):echo "";
else:
foreach($_data_p as $key=>$p):
if(($_id_p)%1==0):$_id_p++;else:$_id_p++;continue;endif;
$hd["list"]["p"]["index"]=++$_index_p;
if($_index_p>=$_total_p):$hd["list"]["p"]["last"]=true;endif;?>

            <tr>
                <td><?php echo $p['name'];?></td>
                <td><?php echo $p['version'];?></td>
                <td><?php echo $p['pubdate'];?></td>
                <td><?php echo $p['team'];?></td>
                <td><?php echo $p['state'];?></td>
                <td><?php echo $p['app'];?></td>
                <td>
                    <a href="<?php echo U('Install/help',array('plug'=>$p['app']));?>">使用说明</a>
                </td>
            </tr>
        <?php $hd["list"]["p"]["first"]=false;
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