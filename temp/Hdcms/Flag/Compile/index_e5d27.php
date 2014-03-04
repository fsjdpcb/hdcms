<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><?php if (!defined("HDPHP_PATH")) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>属性管理</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?g=Hdcms&a=Flag&c=Flag&m=index&_=0.5637706363176158';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Flag';
		CONTROL = 'http://localhost/hdcms/index.php?a=Flag&c=Flag';
		METH = 'http://localhost/hdcms/index.php?a=Flag&c=Flag&m=index';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Flag/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Flag/Tpl/Flag';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Flag/Tpl/Public';
		HISTORY = 'http://localhost/hdcms/index.php?a=Hdcms&c=Index&m=index';
		HTTPREFERER = 'http://localhost/hdcms/index.php?a=Hdcms&c=Index&m=index';
</script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/Hdcms/Flag/Tpl/Flag/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">属性管理</a></li>
            <li><a href="<?php echo U('add');?>">添加属性</a></li>
            <li><a href="javascript:hd_ajax('<?php echo U(update_cache);?>')">更新缓存</a></li>
        </ul>
    </div>
    <form action="<?php echo U('edit');?>" method="post" id="edit_form" class="hd-form" onsubmit="return hd_submit(this);">
        <table class="table2">
            <thead>
            <tr>
                <td class="w30">fid</td>
                <td>属性名称</td>
                <td class="w100">系统属性</td>
                <td width="50">操作</td>
            </tr>
            </thead>
            <tbody>
            <?php $hd["list"]["f"]["total"]=0;if(isset($flag) && !empty($flag)):$_id_f=0;$_index_f=0;$lastf=min(1000,count($flag));
$hd["list"]["f"]["first"]=true;
$hd["list"]["f"]["last"]=false;
$_total_f=ceil($lastf/1);$hd["list"]["f"]["total"]=$_total_f;
$_data_f = array_slice($flag,0,$lastf);
if(count($_data_f)==0):echo "";
else:
foreach($_data_f as $key=>$f):
if(($_id_f)%1==0):$_id_f++;else:$_id_f++;continue;endif;
$hd["list"]["f"]["index"]=++$_index_f;
if($_index_f>=$_total_f):$hd["list"]["f"]["last"]=true;endif;?>

                <tr>
                    <td>
                        <?php echo $f['fid'];?>
                    </td>
                    <td>
                        <input type="text" name="flag[<?php echo $f['fid'];?>][flagname]" value="<?php echo $f['flagname'];?>"/>
                    </td>
                    <td>
                        <?php if($f['system']==1){?>是<?php  }else{ ?>否<?php }?>
                    </td>
                    <td>
                        <?php if($f['system']==1){?>
                            <span style="color:#999;">删除</span>
                            <?php  }else{ ?>
                            <a href="javascript:;" onclick="if(confirm('确定要删除属性吗？'))hd_ajax('<?php echo U(del);?>',{fid:<?php echo $f['fid'];?>})">删除</a>
                        <?php }?>

                    </td>
                </tr>
            <?php $hd["list"]["f"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
            </tbody>
        </table>
        <div class="position-bottom">
            <input type="submit" class="hd-success" id="updateSort" value="修改"/>
        </div>
    </form>
</div>
</body>
</html>