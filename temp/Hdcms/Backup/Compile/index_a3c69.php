<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>还原备份</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Backup&c=Backup&m=index';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Backup';
		CONTROL = 'http://localhost/hdcms/index.php?a=Backup&c=Backup';
		METH = 'http://localhost/hdcms/index.php?a=Backup&c=Backup&m=index';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Backup/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Backup/Tpl/Backup';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Backup/Tpl/Public';
</script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Hdcms/Backup/Tpl/Backup/js/index.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/Hdcms/Backup/Tpl/Backup/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">备份列表</a></li>
            <li><a href="<?php echo U('backup');?>">备份数据</a></li>
        </ul>
    </div>
    <form action="<?php echo U('delBackupDir');?>" method="post" class="form-inline hd-form">
        <table class="table2">
            <thead>
            <tr>
                <td width="50">
                    <label><input type="checkbox" class="s_all_ck"/> 全选</label>
                </td>
                <td>备份目录</td>
                <td>备份时间</td>
                <td>大小</td>
                <td width="150">操作</td>
            </tr>
            </thead>
            <tbody>
            <?php $hd["list"]["d"]["total"]=0;if(isset($dir) && !empty($dir)):$_id_d=0;$_index_d=0;$lastd=min(1000,count($dir));
$hd["list"]["d"]["first"]=true;
$hd["list"]["d"]["last"]=false;
$_total_d=ceil($lastd/1);$hd["list"]["d"]["total"]=$_total_d;
$_data_d = array_slice($dir,0,$lastd);
if(count($_data_d)==0):echo "";
else:
foreach($_data_d as $key=>$d):
if(($_id_d)%1==0):$_id_d++;else:$_id_d++;continue;endif;
$hd["list"]["d"]["index"]=++$_index_d;
if($_index_d>=$_total_d):$hd["list"]["d"]["last"]=true;endif;?>

                <tr>
                    <td width="50">
                        <label><input type="checkbox" name="dir[]" value="<?php echo $d['name'];?>"/></label>
                    </td>
                    <td><?php echo $d['name'];?></td>
                    <td><?php echo date('Y-m-d h:i:s',$d['filemtime']);?></td>
                    <td><?php echo get_size($d['size']);?></td>
                    <td>
                        <a href="javascript:recovery('<?php echo $d['name'];?>')">还原</a> |
                        <a href="javascript:hd_ajax('<?php echo U(del);?>',{dir:['<?php echo $d['name'];?>']})">删除</a>
                    </td>
                </tr>
            <?php $hd["list"]["d"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
            </tbody>
        </table>
    </form>
</div>
<div class="position-bottom">
    <input type="button" class="hd-cancel" onclick="select_all('.table2')" value="全选"/>
    <input type="button" class="hd-cancel" onclick="reverse_select('.table2')" value="反选"/>
    <input type="button" class="hd-cancel" onclick="del_backup()" value="批量删除"/>
</div>
</body>
</html>