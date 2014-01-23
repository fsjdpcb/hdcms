<?php if(!defined("HDPHP_PATH"))exit;C("SHOW_NOTICE",FALSE);?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>修改文章</title>
    <script type='text/javascript' src='http://localhost/hdphp/hdphp/../hdjs/jquery-1.8.2.min.js'></script>
<link href='http://localhost/hdphp/hdphp/../hdjs/css/hdjs.css' rel='stylesheet' media='screen'>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/hdjs.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/js/slide.js'></script>
<script src='http://localhost/hdphp/hdphp/../hdjs/org/cal/lhgcalendar.min.js'></script>
<script type='text/javascript'>
		HOST = 'http://localhost';
		ROOT = 'http://localhost/hdcms';
		WEB = 'http://localhost/hdcms/index.php';
		URL = 'http://localhost/hdcms/index.php?a=Single&c=Single&m=edit&aid=1';
		HDPHP = 'http://localhost/hdphp/hdphp';
		HDPHPDATA = 'http://localhost/hdphp/hdphp/Data';
		HDPHPTPL = 'http://localhost/hdphp/hdphp/Lib/Tpl';
		HDPHPEXTEND = 'http://localhost/hdphp/hdphp/Extend';
		APP = 'http://localhost/hdcms/index.php?a=Single';
		CONTROL = 'http://localhost/hdcms/index.php?a=Single&c=Single';
		METH = 'http://localhost/hdcms/index.php?a=Single&c=Single&m=edit';
		GROUP = 'http://localhost/hdcms/hd';
		TPL = 'http://localhost/hdcms/hd/Hdcms/Single/Tpl';
		CONTROLTPL = 'http://localhost/hdcms/hd/Hdcms/Single/Tpl/Single';
		STATIC = 'http://localhost/hdcms/Static';
		PUBLIC = 'http://localhost/hdcms/hd/Hdcms/Single/Tpl/Public';
</script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/static/js/js.js"></script>
    <script type="text/javascript" src="http://localhost/hdcms/hd/Hdcms/Single/Tpl/Single/js/add_edit.js"></script>
    <link type="text/css" rel="stylesheet" href="http://localhost/hdcms/hd/Hdcms/Single/Tpl/Single/css/css.css"/>
    <script>
        //内容编辑器id，用于验证正文时使用
        var editor_id ='hd_<?php echo $model['tablename'];?>_data[content]';
    </script>
</head>
<body>
<form action="<?php echo U(edit);?>" method="post" id="edit" class="hd-form" onsubmit="return false">
    <input type="hidden" value="<?php echo $field['aid'];?>" name="aid"/>
    <div class="wrap">
        <!--右侧缩略图区域-->
        <div class="content_right">
            <table class="table1">
                <tr>
                    <th>缩略图</th>
                </tr>
                <tr>
                    <td>
                        <img id="thumb" src="<?php echo $field['thumb_img'];?>" style="cursor: pointer;width:135px;height:113px;"
                             onclick="file_upload('thumb','thumb',1,'thumb')"/>
                        <input type="hidden" name="thumb" value="<?php echo $field['thumb'];?>"/>
                        <button type="button" class="hd-cancel-small" onclick="file_upload('thumb','thumb',1,'thumb')">
                            上传图片
                        </button>
                        <button type="button" class="hd-cancel-small" onclick="remove_thumb(this)">取消上传</button>
                    </td>
                </tr>
                <tr>
                    <th>发布时间</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" id="updatetime" readonly="readonly" name="updatetime"
                               value="<?php echo date('Y/m/d H:i:s',$field['updatetime']);?>"
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
                        <input type="text" name="redirecturl" value="<?php echo $field['redirecturl'];?>" class="w150"/>
                    </td>
                </tr>
                <tr>
                    <th>生成静态</th>
                </tr>
                <tr>
                    <td>
                        <label><input type="radio" name="ishtml" value="1"
                            <?php if($field['ishtml']==1){?>checked="checked"<?php }?>
                            /> 是</label>
                        <label><input type="radio" name="ishtml" value="0"
                            <?php if($field['ishtml']==0){?>checked="checked"<?php }?>
                            /> 否</label>
                    </td>
                </tr>
                <tr>
                    <th>允许回复</th>
                </tr>
                <tr>
                    <td>
                        <label><input type="radio" name="allowreply" value="1"
                            <?php if($field['allowreply']==1){?>checked="checked"<?php }?>
                            />
                            允许</label>
                        <label><input type="radio" name="allowreply" value="0"
                            <?php if($field['allowreply']==0){?>checked="checked"<?php }?>
                            /> 不允许</label>
                    </td>
                </tr>
                <tr>
                    <th>点击</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="click" class="w150" value="<?php echo $field['click'];?>"/>
                    </td>
                </tr>
                <tr>
                    <th>来源</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="source" value="<?php echo $field['source'];?>" class="w150"/>
                    </td>
                </tr>
                <tr>
                    <th>作者</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="author" class="w150" value="<?php echo $field['author'];?>"/>
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
                        <input id="title" type="text" name="title" value="<?php echo $field['title'];?>" class="title w400"/>
                        <label>
                            标题颜色 <input type="text" name="color" value="<?php echo $field['color'];?>" class="w60"/>
                        </label>
                        <button type="button" onclick="selectColor(this,'color')" class="btn">选取颜色</button>
                        <label class='checkbox inline'><input type="checkbox" name="new_window" value="1"
                            <?php if($field['new_window']==1){?>checked='checked'<?php }?>
                            /> 新窗口打开</label>
                    </td>
                </tr>
                <tr>
                    <th class="w80">SEO标题</th>
                    <td>
                        <input type="text" name="seo_title" value="<?php echo $field['seo_title'];?>" class="w400"/>
                    </td>
                </tr>
                <!--标准模型显示正文字段-->
                    <tr>
                        <th>内容<span class="star">*</span></th>
                        <td>
                            <?php echo tag("ueditor",array("name"=>"content","content"=>$field['content']));?>
                            <div class="editor_set">
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
                        <input type="text" name="keywords" value="<?php echo $field['keywords'];?>" class="w400"/>
                        <span class="validate-message">如果不填，系统将自动从内容中提取</span>
                    </td>
                </tr>
                <tr>
                    <th>摘要</th>
                    <td>
                        <textarea name="description" class="w450 h80"><?php echo $field['description'];?></textarea>
                        <span class="validate-message">如果不填，系统将自动从内容中提取</span>
                    </td>
                </tr>
                <tr>
                    <th>模板</th>
                    <td>
                        <input class="w250" type="text" name="template" value="<?php echo $field['template'];?>" id="template" onclick="select_template('template');">
                        <button class="hd-cancel-small" type="button" onclick="select_template('template');">选择模板
                        </button>
                    </td>
                </tr>
                <tr>
                    <th>HTML文件</th>
                    <td>
                        <input class="w250" type="text" name="html_path" value="<?php echo $field['html_path'];?>">
                        <span class="validate-message">如果不填,将按栏目规则生成静态</span>
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