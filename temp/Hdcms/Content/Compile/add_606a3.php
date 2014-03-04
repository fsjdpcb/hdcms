<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>添加文章</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Content&c=Content&m=add&cid=3';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Content';
		CONTROL = 'http://localhost/hdcms/index.php?a=Content&c=Content';
		METH = 'http://localhost/hdcms/index.php?a=Content&c=Content&m=add';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Content/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Content/Tpl/Content';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Content/Tpl/Public';
		HISTORY = 'http://localhost/hdcms/index.php?a=Content&c=Content&m=content&cid=3&state=1';
		HTTPREFERER = 'http://localhost/hdcms/index.php?a=Content&c=Content&m=content&cid=3&state=1';
</script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Hdcms/Content/Tpl/Content/js/add_edit.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/Hdcms/Content/Tpl/Content/css/css.css"/>
    <script>
        //内容编辑器id，用于验证正文时使用
        var editor_id ='hd_<?php echo $model['table_name'];?>_data[content]';
    </script>
</head>
<body>
<form action="<?php echo U(add);?>" method="post" onsubmit="return false;" id="add" class="hd-form">
    <div class="wrap">
        <!--右侧缩略图区域-->
        <div class="content_right">
            <table class="table1">
                <tr>
                    <th>缩略图</th>
                </tr>
                <tr>
                    <td align="center">
                        <img id="thumb" src="http://localhost/hdcms/hd/static/img/upload-pic.png" style="cursor: pointer;width:145px;height:123px;" onclick="file_upload('thumb','thumb',1,'thumb')"/>
                        <input type="hidden" name="thumb"/>
                        <!--<button type="button" class="btn btn-small" onclick="imageCrop('thumb')">裁切图片</button>-->
                        <button type="button" class="hd-cancel-small" onclick="file_upload('thumb','thumb',1,'thumb')">上传图片</button>
                        &nbsp;&nbsp;
                        <button type="button" class="hd-cancel-small" onclick="remove_thumb(this)">取消上传</button>
                    </td>
                </tr>
                <tr>
                    <th>发布时间</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" readonly="readonly" id="updatetime" name="updatetime"
                               value="<?php echo date('Y/m/d h:i:s');?>"
                               class="w150"/>
                        <script>
                            $('#updatetime').calendar({format: 'yyyy/MM/dd HH:mm:ss'});
                        </script>
                    </td>
                </tr>
                <tr>
                    <th>跳转地址</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="redirecturl" class="w150"/><br/>
                        <span id="hd-redirecturl"></span>
                    </td>
                </tr>
                <tr>
                    <th>允许回复</th>
                </tr>
                <tr>
                    <td>
                        <label><input type="radio" name="allowreply" value="1" checked="checked"/>
                            允许</label>
                        <label><input type="radio" name="allowreply" value="0"/> 不允许</label>
                    </td>
                </tr>
                <tr>
                    <th>点击</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="click" class="w150" value="100"/>
                    </td>
                </tr>
                <tr>
                    <th>来源</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="source" class="w150"/>
                    </td>
                </tr>
                <tr>
                    <th>作者</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="author" class="w150" value="<?php echo $_SESSION['username'];?>"/>
                    </td>
                </tr>
            </table>
        </div>
        <div class="content_left">
            <div class="title-header">添加文章</div>
            <table class="table1">
                <tr>
                    <th class="w80">标题<span class="star">*</span></th>
                    <td>
                        <input id="title" type="text" name="title" class="title w400"/>
                        <label class="checkbox inline">
                            标题颜色 <input type="text" name="color" class="w60"/>
                        </label>
                        <button type="button" onclick="selectColor(this,'color')" class="hd-cancel">选取颜色</button>
                        <label class="checkbox inline">
                            <input type="checkbox" name="new_window" value="1"/> 新窗口打开
                        </label>
                    </td>
                </tr>
                <tr>
                    <th class="w80">SEO标题</th>
                    <td>
                        <input type="text" name="seo_title" class="w400"/>
                    </td>
                </tr>
                <tr>
                    <th>属性</th>
                    <td>
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

                            <input type="hidden" name="content_flag[<?php echo $f['fid'];?>][cid]" value="<?php echo $category['cid'];?>"/>
                            <label class="checkbox inline">
                                <input type="checkbox" name="content_flag[<?php echo $f['fid'];?>][fid]" value="<?php echo $f['fid'];?>"/>
                                <?php echo $f['flagname'];?> [<?php echo $f['fid'];?>]
                            </label>
                        <?php $hd["list"]["f"]["first"]=false;
endforeach;
endif;
else:
echo "";
endif;?>
                    </td>
                </tr>
                <tr>
                    <th>栏目</th>
                    <td>
                        <input type="hidden" name="cid" value="<?php echo $category['cid'];?>"/>
                        <?php echo $category['catname'];?>
                    </td>
                </tr>
                <!--标准模型显示正文字段-->
                <?php if($model['type']==1){?>
                    <tr>
                        <th>内容<span class="star">*</span></th>
                        <td>
                            <?php echo tag("ueditor",array("name"=>$model['table_name']."_data[content]",'php'=>'http://localhost/hdcms/index.php?a=Upload&c=Upload&m=ueditor_upload'));?>
                            <div class="editor_set control-group">
                                <label class="checkbox inline">
                                    <input type="checkbox" name="down_remote_pic" value="1"
                                    <?php if(C("down_remote_pic")==1){?>checked="checked"<?php }?>
                                    />下载远程图片
                                </label>
                                <label class="checkbox inline">
                                    <input type="checkbox" name="auto_desc" value="1"
                                    <?php if(C("auto_desc")==1){?>checked="checked"<?php }?>
                                    />截取内容
                                </label>
                                <label class="checkbox inline">
                                    <input type="text" value="200" class="input-mini" name="auto_desc_length"> 字符至内容摘要
                                </label>
                                <label class="checkbox inline">
                                    <input type="checkbox" name="auto_thumb" value="1"
                                    <?php if(C("auto_thumb")==1){?>checked="checked"<?php }?>
                                    />获取内容第
                                </label>
                                <label class="checkbox inline">
                                    <input type="text" class="input-mini" value="1" name="auto_thumb_num">
                                     张图片作为缩略图
                                </label>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>关键字</th>
                        <td>
                            <input type="text" name="keywords" class="w400"/>
                            <span class="message">如果不填，系统将自动从内容中提取</span>
                        </td>
                    </tr>
                    <tr>
                        <th>摘要</th>
                        <td>
                            <textarea name="description" class="w450 h80"></textarea>
                            <span class="message">如果不填，系统将自动从内容中提取</span>
                        </td>
                    </tr>
                <?php }?>
                <!--自定义字段-->
                <?php echo $custom_field;?>
                <!--自定义字段-->
                <tr>
                    <th>模板</th>
                    <td>
                        <input class="w250" type="text" name="template" id="template" onfocus="select_template('template');">
                        <button class="hd-cancel-small" type="button" onclick="select_template('template');">选择模板</button>
                    </td>
                </tr>
                <tr>
                    <th>访问方式</th>
                    <td>
                        <label><input type="radio" name="url_type" value="1" checked="checked"/> 静态</label>
                        <label><input type="radio" name="url_type" value="2"/> 动态</label>
                    </td>
                </tr>
                <tr>
                    <th>静态文件</th>
                    <td>
                        <input class="w250" type="text" name="html_path">
                        <span class="message">如:houdunwang.html,如果不填将按栏目规则生成静态。栏目开启生成静态才有效</span>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="position-bottom">
        <input type="submit" class="hd-success" value="确定"/>
        <input type="button" class="hd-cancel" onclick="hd_close_window()" value="关闭"/>
    </div>
</form>
</body>
</html>