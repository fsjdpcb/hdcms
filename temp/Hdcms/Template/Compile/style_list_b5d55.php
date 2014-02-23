<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>风格列表</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?g=Hdcms&a=Template&c=Template&m=style_list&_=0.3414069577305495';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Template';
		CONTROL = 'http://localhost/hdcms/index.php?a=Template&c=Template';
		METH = 'http://localhost/hdcms/index.php?a=Template&c=Template&m=style_list';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Template/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Template/Tpl/Template';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Template/Tpl/Public';
		HISTORY = 'http://localhost/hdcms/index.php?a=Hdcms&c=Index&m=index';
		HTTPREFERER = 'http://localhost/hdcms/index.php?a=Hdcms&c=Index&m=index';
</script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Hdcms/Template/Tpl/Template/js/style_list.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/Hdcms/Template/Tpl/Template/css/style_list.css"/>
</head>
<body>
<div class="wrap" style="bottom: 0px;">
    <div class="title-header">友情提示</div>
    <div class="help">
        <p>1. HDCMS官网不断更新免费优质模板 <a href="http://www.hdphp.com" class="action" target="_blank">立刻获取</a></p>

        <p>2. 非HDCMS官网提供的模板，可能存在恶意木马程序</p>
    </div>
    <div class="title-header">当前模板</div>
    <div class="help">
        <p>你需要了解HDCMS标签，才可以灵活编辑模板，当然这很简单 >>><a href="http://www.hdphp.com" target="_blank">获得视频教程</a></p>
    </div>
    <div class="tpl-list">
        <ul>
            <?php $hd["list"]["t"]["total"]=0;if(isset($style) && !empty($style)):$_id_t=0;$_index_t=0;$lastt=min(1000,count($style));
$hd["list"]["t"]["first"]=true;
$hd["list"]["t"]["last"]=false;
$_total_t=ceil($lastt/1);$hd["list"]["t"]["total"]=$_total_t;
$_data_t = array_slice($style,0,$lastt);
if(count($_data_t)==0):echo "";
else:
foreach($_data_t as $key=>$t):
if(($_id_t)%1==0):$_id_t++;else:$_id_t++;continue;endif;
$hd["list"]["t"]["index"]=++$_index_t;
if($_index_t>=$_total_t):$hd["list"]["t"]["last"]=true;endif;?>

                <li <?php if($t['current']==1){?>class="active current"<?php }?>>
                    <img src="<?php echo $t['img'];?>" width="260"/>
                    <h4><?php echo $t[0];?> <?php echo $t['active'];?></h4>

                    <p>作者: <?php echo $t[1];?></p>

                    <p>Email: <?php echo $t[2];?></p>

                    <div class="link">
                        <?php if($t['current'] <> 1){?>
                            <a href="javascript:;" class="btn" attr='select_tpl' onclick="hd_ajax('<?php echo U(select_style);?>',{dir_name:'<?php echo basename($t['dir_name']);?>'})">使用</a>
                        <?php }?>
                        <a href="<?php echo U('show_dir',array('dir_name'=>$style_cur['dir_name']));?>" class="btn">编辑</a>
                    </div>
                    <?php if($t['current']==1){?>
                        <div class="style_cur">
                            正在使用
                        </div>
                    <?php }?>
                </li>
            <?php $hd["list"]["t"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
        </ul>
    </div>
</div>
</body>
</html>