<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>模型字段管理</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Field&c=Field&m=index&mid=2';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Field';
		CONTROL = 'http://localhost/hdcms/index.php?a=Field&c=Field';
		METH = 'http://localhost/hdcms/index.php?a=Field&c=Field&m=index';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Field/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Field/Tpl/Field';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Field/Tpl/Public';
</script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/Hdcms/Field/Tpl/Field/css/css.css"/>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Hdcms/Field/Tpl/Field/js/js.js"></script>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="<?php echo U('Model/Model/index');?>">模型列表</a></li>
            <li><a href="javascript:;" class="action">字段列表</a></li>
            <li><a href="<?php echo U('add',array('mid'=>$_GET['mid']));?>">添加字段</a></li>
            <li><a href="javascript:;" onclick="hd_ajax('<?php echo U(update_cache);?>',{mid:<?php echo $_GET['mid'];?>})">更新字段缓存</a></li>
        </ul>
    </div>
    <table class="table2 hd-form">
        <thead>
        <tr>
            <td width="30">排序</td>
            <td width="30">Fid</td>
            <td width="200">描述</td>
            <td>字段名</td>
            <td width="80">系统</td>
            <td width="60">主表</td>
            <td width="100">操作</td>
        </tr>
        </thead>
        <tbody>
        <?php $hd["list"]["f"]["total"]=0;if(isset($field) && !empty($field)):$_id_f=0;$_index_f=0;$lastf=min(1000,count($field));
$hd["list"]["f"]["first"]=true;
$hd["list"]["f"]["last"]=false;
$_total_f=ceil($lastf/1);$hd["list"]["f"]["total"]=$_total_f;
$_data_f = array_slice($field,0,$lastf);
if(count($_data_f)==0):echo "";
else:
foreach($_data_f as $key=>$f):
if(($_id_f)%1==0):$_id_f++;else:$_id_f++;continue;endif;
$hd["list"]["f"]["index"]=++$_index_f;
if($_index_f>=$_total_f):$hd["list"]["f"]["last"]=true;endif;?>

            <tr>
                <td>
                    <input type="text" name="fieldsort[<?php echo $f['fid'];?>]" class="w30" value="<?php echo $f['fieldsort'];?>"/>
                </td>
                <td>
                    <?php echo $f['fid'];?>
                </td>
                <td><?php echo $f['title'];?></td>
                <td><?php echo $f['field_name'];?></td><td>
                    <?php if($f['is_system']){?>是
                        <?php  }else{ ?>否
                    <?php }?>
                </td>
                <td>
                    <?php if($f['is_main_table']){?>是
                        <?php  }else{ ?>否
                    <?php }?>
                </td>
                <td>
                    <a href="<?php echo U('edit',array('mid'=>$f['mid'],'fid'=>$f['fid']));?>">修改</a>
                    |
                    <a href="javascript:"
                       onclick="return confirm('确定删除【<?php echo $f['field_name'];?>】字段吗？')?hd_ajax('<?php echo U(del);?>',{mid:<?php echo $f['mid'];?>,fid:<?php echo $f['fid'];?>}):false;">删除</a>
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
        <input type="button" class="hd-success" id="updateSort" value="排序"/>
    </div>
</div>
</body>
</html>