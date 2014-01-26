<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>备份数据库</title>
    <script type='text/javascript' src='http://localhost/hdcms/hd/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdcms/hd/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdcms/hd/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdcms/hd/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdcms/hd/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Backup&c=Backup&m=backup';
		HDPHP = 'http://localhost/hdcms/hd/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdcms/hd/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdcms/hd/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdcms/hd/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Backup';
		CONTROL = 'http://localhost/hdcms/index.php?a=Backup&c=Backup';
		METH = 'http://localhost/hdcms/index.php?a=Backup&c=Backup&m=backup';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Backup/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Backup/Tpl/Backup';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Backup/Tpl/Public';
		HTTPREFERER = 'http://localhost/hdcms/index.php?a=Backup&c=Backup&m=index&nid=12&_=0.8906534870571917';
</script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Hdcms/Backup/Tpl/Backup/js/backup.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/Hdcms/Backup/Tpl/Backup/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="<?php echo U('Backup/index');?>">备份列表</a></li>
            <li><a href="javascript:;" class="action">备份数据</a></li>
        </ul>
    </div>
    <form action="<?php echo U('backup_db');?>" method="post" target="_iframe" class="hd-form" onsubmit="return backup();">
        <table class="table2">
            <thead>
            <tr>
                <td width="50">数据备份</td>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td width="50">
                    <table class="table">
                        <tr>
                            <td class="w100">分卷大小</td>
                            <td>
                                <input type="text" class="w150" name="size" value="200"/> KB
                            </td>
                        </tr>
                        <tr>
                            <td class="w100"></td>
                            <td>
                                <label>
                                    <input type="checkbox" name="structure" value="1" checked="checked">
                                    备份表结构
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td class="w100">&nbsp;</td>
                            <td>
                                <input type="submit" class="hd-cancel" value="开始备份"/>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            </tbody>
        </table>
        <table class="table2">
            <thead>
            <tr>
                <td width="50">
                    <label><input type="checkbox" class="s_all_ck"/> 全选</label>
                </td>
                <td>表名</td>
                <td>类型</td>
                <td>编码</td>
                <td>记录数</td>
                <td>使用空间</td>
                <td>碎片</td>
                <td width="200">操作</td>
            </tr>
            </thead>
            <tbody>
            <?php $hd["list"]["t"]["total"]=0;if(isset($table['table']) && !empty($table['table'])):$_id_t=0;$_index_t=0;$lastt=min(1000,count($table['table']));
$hd["list"]["t"]["first"]=true;
$hd["list"]["t"]["last"]=false;
$_total_t=ceil($lastt/1);$hd["list"]["t"]["total"]=$_total_t;
$_data_t = array_slice($table['table'],0,$lastt);
if(count($_data_t)==0):echo "";
else:
foreach($_data_t as $key=>$t):
if(($_id_t)%1==0):$_id_t++;else:$_id_t++;continue;endif;
$hd["list"]["t"]["index"]=++$_index_t;
if($_index_t>=$_total_t):$hd["list"]["t"]["last"]=true;endif;?>

                <tr>
                    <td>
                        <input type="checkbox" name="table[]" value="<?php echo $t['tablename'];?>"/>
                    </td>
                    <td><?php echo $t['tablename'];?></td>
                    <td><?php echo $t['engine'];?></td>
                    <td><?php echo $t['charset'];?></td>
                    <td><?php echo $t['rows'];?></td>
                    <td><?php echo $t['size'];?></td>
                    <td><?php echo _default($t['data_free'],0);?></td>
                    <td>
                        <a href="javascript:hd_ajax('<?php echo U(optimize);?>',{table:['<?php echo $t['tablename'];?>']})">优化</a> |
                        <a href="javascript:hd_ajax('<?php echo U(repair);?>',{table:['<?php echo $t['tablename'];?>']})">修复</a>
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
    </form>
</div>
<div class="position-bottom">
    <input type="button" class="hd-cancel" onclick="select_all('.table2')" value="全选"/>
    <input type="button" class="hd-cancel" onclick="reverse_select('.table2')" value="反选"/>
    <input type="button" class="hd-cancel" onclick="optimize()" value="批量优化"/>
    <input type="button" class="hd-cancel" onclick="repair()" value="批量修复"/>
</div>
<script>
    $.modal({title:'数据库备份[请不要中断备份]',button_cancel:'关闭',width:450,height:200,show:false,
        content:"<iframe name='_iframe'></iframe>",
        cancel:function(){
            window.location.reload(true);
        }
    })
</script>
</body>
</html>