<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>上传文件管理</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?g=Hdcms&a=Upload&c=Index&m=index&_=0.5414213690047559';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Upload';
		CONTROL = 'http://localhost/hdcms/index.php?a=Upload&c=Index';
		METH = 'http://localhost/hdcms/index.php?a=Upload&c=Index&m=index';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Upload/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Upload/Tpl/Index';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Upload/Tpl/Public';
		HISTORY = 'http://localhost/hdcms/index.php?a=Hdcms&c=Index&m=index';
		HTTPREFERER = 'http://localhost/hdcms/index.php?a=Hdcms&c=Index&m=index';
</script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Hdcms/Upload/Tpl/Index/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/Hdcms/Upload/Tpl/Index/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">附件管理</a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td class="w50">ID</td>
            <td class="w100">预览</td>
            <td >文件名</td>
            <td>大小</td>
            <td class="w200">上传时间</td>
            <td class="w100">用户id</td>
            <td class="w50">操作</td>
        </tr>
        </thead>
        <?php $hd["list"]["u"]["total"]=0;if(isset($upload) && !empty($upload)):$_id_u=0;$_index_u=0;$lastu=min(1000,count($upload));
$hd["list"]["u"]["first"]=true;
$hd["list"]["u"]["last"]=false;
$_total_u=ceil($lastu/1);$hd["list"]["u"]["total"]=$_total_u;
$_data_u = array_slice($upload,0,$lastu);
if(count($_data_u)==0):echo "";
else:
foreach($_data_u as $key=>$u):
if(($_id_u)%1==0):$_id_u++;else:$_id_u++;continue;endif;
$hd["list"]["u"]["index"]=++$_index_u;
if($_index_u>=$_total_u):$hd["list"]["u"]["last"]=true;endif;?>

            <tr>
                <td><?php echo $u['id'];?></td>
                <td>
                    <img src="<?php echo $u['pic'];?>" class="w60 h30" onclick="view('<?php echo $u['pic'];?>')" title="点击预览大图"/>
                </td>
                <td>
                    <?php echo $u['basename'];?>
                </td>
                <td>
                    <?php echo get_size($u['size']);?>
                </td>
                <td>
                    <?php echo date('Y-m-d',$u['uptime']);?>
                </td>
                <td>
                    <?php echo $u['uid'];?>
                </td>
                <td>
                    <?php if($u['isimage']){?>
                    <a href="javascript:;" onclick="view('http://localhost/hdcms/<?php echo $u['path'];?>')">预览</a><span
                        class="line">|</span>
                    <?php }?>
                    <a href="javascript:;" onclick="hd_ajax('<?php echo U(del);?>',{id:<?php echo $u['id'];?>})">删除</a>
                </td>
            </tr>
        <?php $hd["list"]["u"]["first"]=false;
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