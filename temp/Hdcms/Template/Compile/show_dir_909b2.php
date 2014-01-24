<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>内容列表</title>
    <script type='text/javascript' src='http://localhost/hdcms/hd/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdcms/hd/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdcms/hd/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdcms/hd/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdcms/hd/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Template&c=Template&m=show_dir&_=0.5096079439069874';
		HDPHP = 'http://localhost/hdcms/hd/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdcms/hd/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdcms/hd/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdcms/hd/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Template';
		CONTROL = 'http://localhost/hdcms/index.php?a=Template&c=Template';
		METH = 'http://localhost/hdcms/index.php?a=Template&c=Template&m=show_dir';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Template/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Template/Tpl/Template';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Template/Tpl/Public';
		HTTPREFERER = 'http://localhost/hdcms/index.php?a=Hdcms&c=Index&m=index';
</script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Hdcms/Template/Tpl/Template/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/Hdcms/Template/Tpl/Template/css/css.css"/>
</head>
<body>
<div class="wrap" style="bottom: 0px;">
    <div class="title-header">温馨提示</div>
    <div class="help">
        修改模板文件前，请做好备份操作！
    </div>
    <?php if($_GET['dir_name']){?>
        <a href="javascript:window.back();" class="hd-cancel" style="display: inline-block;margin-bottom: 15px;">返回</a>
    <?php }?>
    <table class="table2">
        <thead>
        <tr>
            <td>文件名</td>
            <td>修改时间</td>
            <td>大小</td>
            <td class="w100">操作</td>
        </tr>
        </thead>
        <?php $hd["list"]["d"]["total"]=0;if(isset($dirs) && !empty($dirs)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($dirs));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($dirs,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

            <tr>
                <td><?php echo $d['name'];?></td>
                <td><?php echo date('Y-m-d H:i',$d['filemtime']);?></td>
                <td><?php echo get_size($d['size']);?></td>
                <td>
                    <?php if($d['type']=='dir'){?>
                        <a href="http://localhost/hdcms/index.php?a=Template&c=Template&m=show_dir&dir_name=<?php echo urlencode($d['path']);?>">进入</a>
                        <?php  }else{ ?>
                            <a href="javascript:;" onclick="hd_open_window('http://localhost/hdcms/index.php?a=Template&c=Template&m=edit_tpl&file_path=<?php echo urlencode($d['path']);?>')">修改</a>
                    <?php }?>
                </td>
            </tr>
        <?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
    </table>
</div>
</body>
</html>