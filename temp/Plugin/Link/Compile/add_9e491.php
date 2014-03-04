<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>添加分类</title>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/static/css/common.css"/>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?g=Plugin&a=Link&c=Manage&m=add';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Link';
		CONTROL = 'http://localhost/hdcms/index.php?a=Link&c=Manage';
		METH = 'http://localhost/hdcms/index.php?a=Link&c=Manage&m=add';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Plugin/Link/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Plugin/Link/Tpl/Manage';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Plugin/Link/Tpl/Public';
		HISTORY = 'http://localhost/hdcms/index.php?g=Plugin&a=Link&c=Manage&m=index&_=0.7376928490660738';
		HTTPREFERER = 'http://localhost/hdcms/index.php?g=Plugin&a=Link&c=Manage&m=index&_=0.7376928490660738';
</script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Plugin/Link/Tpl/Manage/js/validate.js"></script>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="http://localhost/hdcms/index.php?g=Plugin&a=Link&c=Manage&m=index">友情链接</a></li>
            <li><a href="http://localhost/hdcms/index.php?g=Plugin&a=Link&c=Manage&m=audit">审核申请</a></li>
            <li><a href="http://localhost/hdcms/index.php?g=Plugin&a=Link&c=Manage&m=add" class="action">添加链接</a></li>
            <li><a href="http://localhost/hdcms/index.php?g=Plugin&a=Link&c=Type&m=add">添加分类</a></li>
            <li><a href="http://localhost/hdcms/index.php?g=Plugin&a=Link&c=Type&m=index">分类管理</a></li>
            <li><a href="http://localhost/hdcms/index.php?g=Plugin&a=Link&c=Set&m=set">模块配置</a></li>
        </ul>
    </div>
    <form action="" method="post" class="hd-form" enctype="multipart/form-data">
        <div class="title-header">添加分类</div>
        <table class="table1">
            <tr>
                <th class="w100">网站名称<span class="star">*</span> </th>
                <td>
                    <input type="text" name="webname" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">网址<span class="star">*</span></th>
                <td>
                    <input type="text" name="url" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">分类</th>
                <td>
                    <select name="tid">
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

                            <option value="<?php echo $t['tid'];?>"><?php echo $t['type_name'];?></option>
                        <?php $hd["list"]["t"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </select>
                </td>
            </tr>
            <tr>
                <th class="w100">站长邮箱</th>
                <td>
                    <input type="text" name="email" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">联系QQ</th>
                <td>
                    <input type="text" name="qq" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">LOGO</th>
                <td>
                    <input type="file" name="logo"/>
                    <span class="message">如果是图片链接，需要上传LOGO图片</span>
                </td>
            </tr>
            <tr>
                <th>网站介绍</th>
                <td>
                    <textarea name="comment" class="w400 h120"></textarea>
                </td>
            </tr>
            <tr>
                <th class="w100">已审核</th>
                <td>
                    <label><input type="radio" name="state" value="1" checked="checked"/> 是</label>
                    <label><input type="radio" name="state" value="0"/> 否</label>
                </td>
            </tr>
        </table>
        <div class="position-bottom">
            <input type="submit" value="确定" class="hd-success"/>
        </div>
    </form>
</div>
</body>
</html>