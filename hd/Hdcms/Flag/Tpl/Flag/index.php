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
            <li><a href="javascript:hd_ajax('{|U:update_cache}')">更新缓存</a></li>
        </ul>
    </div>
    <form action="{|U:'edit'}" method="post" id="edit_form" class="hd-form" onsubmit="return hd_submit(this);">
        <table class="table2">
            <thead>
            <tr>
                <td class="w30">fid</td>
                <td>属性名称</td>
                <td width="50">操作</td>
            </tr>
            </thead>
            <tbody>
            <list from="$flag" name="name">
                <tr>
                    <td class="w100">
                        {$name}
                    </td>
                    <td>
                        <input type="text" name="flag[]" value="{$name}"/>
                    </td>
                    <td>
                        <if value="$hd.list.name.index gt 7">
                            <a href="javascript:;"
                               onclick="if(confirm('确定要删除属性吗？'))hd_ajax('{|U:del}',{number:<?php echo $hd['list']['name']['index'] - 1; ?>})">删除</a>
                        <else>
                            无
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