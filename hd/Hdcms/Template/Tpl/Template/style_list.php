<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>风格列表</title>
    <hdjs/>
    <js file="__CONTROL_TPL__/js/style_list.js"/>
    <css file="__CONTROL_TPL__/css/style_list.css"/>
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
            <list from="$style" name="t">
                <li <if value="$t.current==1">class="active current"</if>>
                    <img src="{$t.img}" width="260"/>
                    <h4>{$t[0]} {$t.active}</h4>

                    <p>作者: {$t[1]}</p>

                    <p>Email: {$t[2]}</p>

                    <div class="link">
                        <if value="$t.current neq 1">
                            <a href="javascript:;" class="btn" onclick="hd_ajax('{|U:select_style}',{dir_name:'{$t.dir_name|basename}'})">使用</a>
                        </if>
                        <a href="{|U:'show_dir',array('dir_name'=>$style_cur['dir_name'])}" class="btn">编辑</a>
                    </div>
                    <if value="$t.current==1">
                        <div class="style_cur">
                            正在使用
                        </div>
                    </if>
                </li>
            </list>
        </ul>
    </div>
</div>
</body>
</html>