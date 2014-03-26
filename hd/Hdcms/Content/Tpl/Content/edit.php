<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>修改文章</title>
    <hdjs/>
    <js file="__GROUP__/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/add_edit.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
    <script>
        //内容编辑器id，用于验证正文时使用
        var editor_id ='hd_{$model.table_name}_data[content]';
    </script>
</head>
<body>
<form action="{|U:edit}" method="post" id="edit" class="hd-form form-horizontal" onsubmit="return false">
    <input type="hidden" value="{$field.aid}" name="aid"/>
    <div class="wrap">
        <!--右侧缩略图区域-->
        <div class="content_right">
            <table class="table1">
                <tr>
                    <th>缩略图</th>
                </tr>
                <tr>
                    <td>
                        <img id="thumb" src="{$field.thumb_img}" style="cursor: pointer;width:135px;height:113px;"
                             onclick="file_upload('thumb','thumb',1,'thumb')"/>
                        <input type="hidden" name="thumb" value="{$field.thumb}"/>
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
                               value="{$field.updatetime|date:'Y/m/d H:i:s',@@}"
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
                        <input type="text" name="redirecturl" value="{$field.redirecturl}" class="w150"/>
                    </td>
                </tr>
                <tr>
                    <th>允许回复</th>
                </tr>
                <tr>
                    <td>
                        <label><input type="radio" name="allowreply" value="1"
                            <if value="$field.allowreply==1">checked="checked"</if>
                            />
                            允许</label>
                        <label><input type="radio" name="allowreply" value="0"
                            <if value="$field.allowreply==0">checked="checked"</if>
                            /> 不允许</label>
                    </td>
                </tr>
                <tr>
                    <th>点击</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="click" class="w150" value="{$field.click}"/>
                    </td>
                </tr>
                <tr>
                    <th>来源</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="source" value="{$field.source}" class="w150"/>
                    </td>
                </tr>
                <tr>
                    <th>作者</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="author" class="w150" value="{$field.author}"/>
                    </td>
                </tr>
                <tr>
                    <th>阅读积分</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="read_credits" class="w150" value="{$field.read_credits}"/>
                    </td>
                </tr>
            </table>

        </div>
        <div class="content_left">
            <div class="title-header">添加文章</div>
            <table class="table1">
                <tr>
                    <th class="w100">标题<span class="star">*</span></th>
                    <td>
                        <input id="title" type="text" name="title" value="{$field.title}" class="title w400"/>
                        <label>
                            标题颜色 <input type="text" name="color" value="{$field.color}" class="w100"/>
                        </label>
                        <button type="button" onclick="selectColor(this,'color')" class="btn btn-default">选取颜色</button>
                        <label class='inline'><input type="checkbox" name="new_window" value="1"
                            <if value="$field.new_window==1">checked='checked'</if>
                            /> 新窗口打开</label>
                    </td>
                </tr>
                <tr>
                    <th class="w80">SEO标题</th>
                    <td>
                        <input type="text" name="seo_title" value="{$field.seo_title}" class="w400"/>
                    </td>
                </tr>
                <tr>
                    <th>属性</th>
                    <td>
                        <list from="$flag" name="f">
                            <label class="checkbox inline">
                                <input type="checkbox" name="flag[]" value="{$f}"
                                       <?php if(strstr($field['flag'],$f)){?>checked="chedked"<?php } ?>/>
                                {$f} {$hd.list.f.index}
                            </label>
                        </list>
                    </td>
                </tr>
                <tr>
                    <th>栏目</th>
                    <td>
                        <input type="hidden" name="cid" value="{$field.cid}"/>
                        {$field.catname}
                    </td>
                </tr>
                <!--标准模型显示正文字段-->
                <if value="$model.type==1">

                    <tr>
                        <th>内容<span class="star">*</span></th>
                        <td>
                            {|tag:"ueditor",array("name"=>$model['table_name']."_data[content]","content"=>$field['content'])}
                            <div class="editor_set">
                                <label class="inline">
                                    <input type="checkbox" name="down_remote_pic" value="1"
                                    <if value="$hd.config.down_remote_pic==1">checked="checked"</if>
                                    />下载远程图片
                                </label>
                                <label class="inline">
                                    <input type="checkbox" name="auto_desc" value="1"
                                    <if value="$hd.config.auto_desc==1">checked="checked"</if>
                                    />截取内容
                                </label>
                                <label class="inline">
                                    <input type="text" value="200" class="input-mini" name="auto_desc_length"> 字符至内容摘要
                                </label>
                                <label class="inline">
                                    <input type="checkbox" name="auto_thumb" value="1"
                                    <if value="$hd.config.auto_thumb==1">checked="checked"</if>
                                    />获取内容第
                                </label>
                                <label class="inline">
                                    <input type="text" class="input-mini" value="1" name="auto_thumb_num">
                                    张图片为缩略图
                                </label>
                            </div>
                        </td>
                    </tr>
                </if>
                <!--自定义字段-->
                {$custom_field}
                <!--自定义字段-->
                <tr>
                    <th>关键字</th>
                    <td>
                        <input type="text" name="keywords" value="{$field.keywords}" class="w400"/>
                        <span class="validate-message">如果不填，系统将自动从内容中提取</span>
                    </td>
                </tr>
                <tr>
                    <th>摘要</th>
                    <td>
                        <textarea name="description" class="w450 h80">{$field.description}</textarea>
                        <span class="validate-message">如果不填，系统将自动从内容中提取</span>
                    </td>
                </tr>
                <tr>
                    <th>模板</th>
                    <td>
                        <input class="w250" type="text" name="template" value="{$field.template}" id="template" onclick="select_template('template');">
                        <button class="hd-cancel-small" type="button" onclick="select_template('template');">选择模板
                        </button>
                    </td>
                </tr>
                <tr>
                    <th>访问方式</th>
                    <td>
                        <label><input type="radio" name="url_type" value="1" <if value="$field.url_type==3">checked="checked"</if>/> 静态</label>
                        <label><input type="radio" name="url_type" value="2" <if value="$field.url_type==1">checked="checked"</if>/> 动态</label>
                    </td>
                </tr>
                <tr>
                    <th>HTML文件</th>
                    <td>
                        <input class="w250" type="text" name="html_path" value="{$field.html_path}">
                        <span class="validate-message">如:houdunwang.html,如果不填将按栏目规则生成静态。栏目开启生成静态才有效</span>
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