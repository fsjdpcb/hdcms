<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台菜单管理</title>
    <hdjs/>
    <js file="__CONTROLLER_TPL__/js/addEdit.js"/>
    <css file="__CONTROLLER_TPL__/css/css.css"/>
    <css file="__PUBLIC__/common.css"/>
</head>
<body>
<form method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:index}')">
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="{|U:'index'}">导航列表</a></li>
                <li><a href="{|U:'add',array('pid'=>0)}" class="action">添加导航</a></li>
                <li><a href="javascript:hd_ajax('{|U:update_cache}');">更新缓存</a></li>
            </ul>
        </div>
        <div class="title-header">菜单信息</div>
        <table class="table1">
            <tr>
                <td class="w100">上级:</td>
                <td>
                    <select name="pid">
                        <option value="0"> == 一级导航 == </option>
                        <list from="$navigation" name="n">
                                <option value="{$n.nid}" <if value="$n.nid eq $hd.get.pid">selected="selected"</if>>{$n._name}</option>
                        </list>
                    </select>
                </td>
            </tr>
            <tr>
                <td>导航:</td>
                <td>
                    <input type="text" name="title" class="w200"/>
                </td>
            </tr>
            <tr>
                <td>链接Url:</td>
                <td>
                    <input type="text" name="url" class="w300"/>
                </td>
            </tr>
            <tr>
                <td class="w100">打开方式</td>
                <td>
                    <select name="target">
                        <option value="1">当前窗口  _self </option>
                        <option value="2">新窗口  _blank </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>状态:</td>
                <td>
                    <label><input type="radio" name="status" value="1" checked="checked"> 显示</label>
                    <label><input type="radio" name="status" value="0"> 隐藏</label>
                </td>
            </tr>
        </table>
    </div>
    <div class="position-bottom">
        <input type="button" class="hd-success" value="更改排序" onclick="update_order();"/>
    </div>
</form>
</body>
</html>