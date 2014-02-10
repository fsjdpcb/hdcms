<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>添加自定义JS标签</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=TemplateTag&c=CustomJs&m=add';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=TemplateTag';
		CONTROL = 'http://localhost/hdcms/index.php?a=TemplateTag&c=CustomJs';
		METH = 'http://localhost/hdcms/index.php?a=TemplateTag&c=CustomJs&m=add';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/TemplateTag/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/TemplateTag/Tpl/CustomJs';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/TemplateTag/Tpl/Public';
		HISTORY = 'http://localhost/hdcms/index.php?g=Hdcms&a=TemplateTag&c=CustomJs&m=index&_=0.5864145671948477';
		HTTPREFERER = 'http://localhost/hdcms/index.php?g=Hdcms&a=TemplateTag&c=CustomJs&m=index&_=0.5864145671948477';
</script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/Hdcms/TemplateTag/Tpl/CustomJs/css/css.css"/>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Hdcms/TemplateTag/Tpl/CustomJs/js/js.js"></script>
</head>
<body>
<form action="<?php echo U('add');?>" method="post" class="hd-form" onsubmit="return hd_submit(this,'http://localhost/hdcms/index.php?a=TemplateTag&c=CustomJs')">
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="<?php echo U('index');?>">标签列表</a></li>
                <li><a href="<?php echo U('add');?>" class="action">添加自定义JS标签</a></li>
            </ul>
        </div>
        <div class="title-header">
            添加模型
        </div>
        <div class="right_content">
            <table class="table1">
                <tr>
                    <th class="w100">JS名称</th>
                    <td>
                        <input type="text" name="name" class="w200"/>
                    </td>
                </tr>
                <tr>
                    <th>JS 描述</th>
                    <td>
                        <input type="text" name="description" class="w400"/>
                        <span class="message">请在此输入js说明，方便以后查找</span>
                    </td>
                </tr>
            </table>

            <table class="table1">
                <tr>
                    <th class="w100">选择栏目</th>
                    <td class="w300">
                        <select name="options[cid][]" multiple="multiple" size="5">
                            <option value="0"> - 所有栏目 -</option>
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

                                <option value="<?php echo $c['cid'];?>" <?php echo $c['disabled'];?>><?php echo $c['_name'];?></option>
                            <?php $hd["list"]["c"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th class="w100">属性控制</th>
                    <td colspan="2">
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

                        <label class="checkbox inline"><input type="checkbox" name="options[flag][]" value="<?php echo $f['fid'];?>"/> <?php echo $f['flagname'];?></label>
                    <?php $hd["list"]["f"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </td>
                </tr>
                <tr>
                    <th>链接目标</th>
                    <td>
                        <select name="options[target]">
                            <option value=""> - 不指定链接目标 -</option>
                            <option value="_blank"> 新窗口打开(_blank)</option>
                            <option value="_self"> 当前窗口打开(_self)</option>
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th>排序方法</th>
                    <td>
                        <select name="options[order]" id="">
                            <option value=""> - 不指定排序方法 -</option>
                            <option value="aid DESC"> 按id排序</option>
                            <option value="addtime desc"> 最新发表</option>
                        </select>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <th>文档数量</th>
                    <td>
                        <input type="text" class="w100" value="10" name="options[row]"/> 条
                    </td>
                    <td>
<!--                        链接目标-->
<!--                        <select name="" id="">-->
<!--                            <option value="0"> - 没有设置 -</option>-->
<!--                            <option value="0"> - 新窗口打开_blank -</option>-->
<!--                            <option value="0"> - 当前窗口_self -</option>-->
<!--                        </select>-->
                    </td>
                </tr>
                <tr>
                    <th>日期格式</th>
                    <td>
                        <select name="options[date_format]">
                            <option value=""> - 不指定日期格式 -</option>
                            <option value="Y-m"> 2013-10 (年-月) </option>
                            <option value="Y-m-d"> 2013-10-12 (年-月-日)</option>
                            <option value="m-d"> 10-12 (月-日)</option>
                            <option value="Y-m-d H:i"> 2013-10-12 10:22 (年-月-日 时:分)</option>
                            <option value="Y-m-d H:i:s"> 2013-10-12 10:22:55 (年-月-日 时:分:秒)</option>
                        </select>
                    </td>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="position-bottom">
        <input type="submit" value="确定" class="hd-success"/>
    </div>
</form>
</body>
</html>