<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>HDCMS反馈</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Bug&c=Bug&m=showBug&_=0.8117067614099719';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Bug';
		CONTROL = 'http://localhost/hdcms/index.php?a=Bug&c=Bug';
		METH = 'http://localhost/hdcms/index.php?a=Bug&c=Bug&m=showBug';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Bug/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Bug/Tpl/Bug';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Bug/Tpl/Public';
		HISTORY = 'http://localhost/hdcms/index.php?a=Hdcms&c=Index&m=index';
		HTTPREFERER = 'http://localhost/hdcms/index.php?a=Hdcms&c=Index&m=index';
</script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Hdcms/Bug/Tpl/Bug/js/js.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/Hdcms/Bug/Tpl/Bug/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="http://localhost/hdcms/index.php?a=Bug&c=Bug&m=showBug&status=1"
                <?php if($_GET['status']==1){?>class="action"<?php }?>
                >未审核</a></li>
            <li><a href="http://localhost/hdcms/index.php?a=Bug&c=Bug&m=showBug&status=2"
                <?php if($_GET['status']==2){?>class="action"<?php }?>
                >处理中</a></li>
            <li><a href="http://localhost/hdcms/index.php?a=Bug&c=Bug&m=showBug&status=3"
                <?php if($_GET['status']==3){?>class="action"<?php }?>
                >已解决</a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td class="w30">
                <input type="checkbox" onclick="select_all(this)"/>
            </td>
            <td class="w30">bid</td>
            <td class="w120">反馈者</td>
            <td class="w100">邮箱</td>
            <td class="w100">提交时间</td>
            <td>问题摘要</td>
            <td class="w60">问题类型</td>
            <td class="w50">状态</td>
            <td width="50">操作</td>
        </tr>
        </thead>
        <?php $hd["list"]["b"]["total"]=0;if(isset($data) && !empty($data)):$_id_b=0;$_index_b=0;$lastb=min(1000,count($data));
$hd["list"]["b"]["first"]=true;
$hd["list"]["b"]["last"]=false;
$_total_b=ceil($lastb/1);$hd["list"]["b"]["total"]=$_total_b;
$_data_b = array_slice($data,0,$lastb);
if(count($_data_b)==0):echo "";
else:
foreach($_data_b as $key=>$b):
if(($_id_b)%1==0):$_id_b++;else:$_id_b++;continue;endif;
$hd["list"]["b"]["index"]=++$_index_b;
if($_index_b>=$_total_b):$hd["list"]["b"]["last"]=true;endif;?>

            <tr>
                <td class="w30">
                    <input type="checkbox" name="bid[]" value="<?php echo $b['bid'];?>"/>
                </td>
                <td><?php echo $b['bid'];?></td>
                <td><?php echo $b['username'];?></td>
                <td><?php echo $b['email'];?></td>
                <td><?php echo date('Y-m-d H:i',$b['addtime']);?></td>
                <td>
                    <?php echo mb_substr($b['content'],0,55,'utf-8');?>...
                </td>
                <td><?php echo $b['type'];?></td>
                <td><?php echo $b['status'];?></td>
                <td>
                    <a href="http://localhost/hdcms/index.php?a=Bug&c=Bug&m=resolve&bid=<?php echo $b['bid'];?>">处理</a>
                </td>
            </tr>
        <?php $hd["list"]["b"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
    </table>
</div>
<div class="position-bottom">
    <input type="submit" class="hd-success" value="批量删除" onclick="hd_ajax('<?php echo U(del);?>',$('input').serialize())"/>
</div>
</body>
</html>