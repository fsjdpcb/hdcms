<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>批量移动文章</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Content&c=Content&m=move_content&cid=3&aid=5|4|1';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Content';
		CONTROL = 'http://localhost/hdcms/index.php?a=Content&c=Content';
		METH = 'http://localhost/hdcms/index.php?a=Content&c=Content&m=move_content';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Content/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Content/Tpl/Content';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Content/Tpl/Public';
		HISTORY = 'http://localhost/hdcms/index.php?a=Content&c=Content&m=content&cid=3&state=1';
		HTTPREFERER = 'http://localhost/hdcms/index.php?a=Content&c=Content&m=content&cid=3&state=1';
</script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Hdcms/Content/Tpl/Content/js/move_content.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/Hdcms/Content/Tpl/Content/css/move_content.css"/>
</head>
<body>
<div class="wrap">
    <div class="title-header">温馨提示</div>
    <div class="help"> 不能够跨模型移动文章</div>
    <div class="line"></div>
    <form action="http://localhost/hdcms/index.php?a=Content&c=Content&m=move_content" method="post" onsubmit="return false" class="form-inline hd-form">
        <input type="hidden" name="cid" value="<?php echo $_GET['cid'];?>"/>
        <table style="width:100%">
            <tr>
                <td>
                    指定来源
                </td>
                <td>
                    目标栏目
                </td>
            </tr>
            <tr>
                <td>
                    <ul class="fromtype">
                        <li>
                            <label><input type="radio" name="from_type" value="1" checked="checked"/> 从指定aid</label>
                        </li>
                        <li>
                            <label><input type="radio" name="from_type" value="2" /> 从指定栏目</label>
                        </li>
                    </ul>
                    <div id="t_aid">
                        <textarea name="aid" class="w250 h250"><?php echo $_GET['aid'];?></textarea>
                    </div>
                    <div id="f_cat" style="display: none">
                        <select id="fromid" style="width:250px;height:250px;" multiple="multiple" size="2"
                                name="from_cid[]">
                            <?php $hd["list"]["c"]["total"]=0;if(isset($category) && !empty($category)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($category));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($category,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

                                <option value="<?php echo $c['cid'];?>" <?php echo $c['disabled'];?>>
                                <?php echo $c['catname'];?>
                                </option>
                            <?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                        </select>
                    </div>
                </td>
                <td>
                    <select id="fromid" style="width:250px;height:290px;"  size="100"
                            name="to_cid">
                        <?php $hd["list"]["c"]["total"]=0;if(isset($category) && !empty($category)):$_id_c=0;$_index_c=0;$lastc=min(1000,count($category));
$hd["list"]["c"]["first"]=true;
$hd["list"]["c"]["last"]=false;
$_total_c=ceil($lastc/1);$hd["list"]["c"]["total"]=$_total_c;
$_data_c = array_slice($category,0,$lastc);
if(count($_data_c)==0):echo "";
else:
foreach($_data_c as $key=>$c):
if(($_id_c)%1==0):$_id_c++;else:$_id_c++;continue;endif;
$hd["list"]["c"]["index"]=++$_index_c;
if($_index_c>=$_total_c):$hd["list"]["c"]["last"]=true;endif;?>

                            <option value="<?php echo $c['cid'];?>" <?php echo $c['disabled'];?> <?php echo $c['selected'];?>>
                            <?php echo $c['catname'];?>
                            </option>
                        <?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </select>
                </td>
            </tr>
        </table>
        <div class="btn_wrap">
            <input type="submit" class="hd-success" value="确定"/>
            <input type="button" class="hd-cancel" id="close_window" value="关闭"/>
        </div>
    </form>
</div>
</body>
</html>