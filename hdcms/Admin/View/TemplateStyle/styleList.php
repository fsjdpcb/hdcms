<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>风格列表</title>
    <hdjs/>
    <js file="__CONTROLLER_TPL__/js/styleList.js"/>
    <css file="__CONTROLLER_TPL__/css/styleList.css"/>

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
                    <img src="{$t.template_img}" width="260"/>
                    <h2>{$t.name}</h2>
                    <p>作者: {$t.author}</p>
                    <p>Email: {$t.email}</p>
                    <p>目录: {$t.dir_name}</p>

                    <div class="link">
                        <if value="$t.current neq 1">
                            <a href="javascript:;" class="btn" attr='select_tpl' onclick="hd_ajax('{|U:select_style}',{dir_name:'{$t.dir_name|basename}'})">使用</a>
                       <else/>
                        <strong>使用中...</strong>
                        </if>
                    </div>
                </li>
            </list>
        </ul>
    </div>
</div>
</body>
</html>