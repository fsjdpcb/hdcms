<?php if (!defined("HDPHP_PATH")) exit; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>属性管理</title>
    <hdjs/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">属性管理</a></li>
            <li><a href="{|U:'add'}">添加属性</a></li>
        </ul>
    </div>
    <form action="{|U:'edit'}" method="post" id="edit_form" class="hd-form" onsubmit="return hd_submit(this);">
        <table class="table2">
            <thead>
            <tr>
                <td class="w30">fid</td>
                <td class="w100">别名</td>
                <td>属性名称</td>
                <td class="w100">系统属性</td>
                <td width="50">操作</td>
            </tr>
            </thead>
            <tbody>
            <list from="$flag" name="f">
                <tr>
                    <td>
                        {$f.fid}
                    </td>
                    <td>
                        <input type="text" name="flag[{$f.fid}][title]" value="{$f.title}" class="w30"/>
                    </td>
                    <td>
                        <input type="text" name="flag[{$f.fid}][flagname]" value="{$f.flagname}"/>
                    </td>
                    <td>
                        <if value="$f.system==1">是<else/>否</if>
                    </td>
                    <td>
                        <if value="$f.system==1">
                            <span style="color:#999;">删除</span>
                            <else/>
                            <a href="javascript:;" onclick="if(confirm('确定要删除属性吗？'))hd_ajax('{|U:del}',{fid:{$f.fid}})">删除</a>
                        </if>

                    </td>
                </tr>
            </list>
            </tbody>
        </table>
        <div class="position-bottom">
            <input type="submit" class="hd-success" id="updateSort" value="修改"/>
        </div>
    </form>
</div>
</body>
</html>