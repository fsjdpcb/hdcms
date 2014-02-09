<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>插件安装</title>
    <hdjs/>
    <js file="__ROOT__/hd/Hdcms/Hdcms/Tpl/Index/js/menu.js"/>
    <js file="__CONTROL_TPL__/Js/js.js"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li>
                <a href="__WEB__?a=Plugin&c=Plugin&m=plugin_list">插件列表</a>
            </li>
            <li>
                <a class="action" href="javascript:;">安装插件</a>
            </li>
        </ul>
    </div>
    <div class="title-header">安装插件</div>
    <form method="post" onsubmit="return false;">
        <input type="hidden" name="plug" value="{$plug.plug}"/>
        <table class="table1 hd-form">
            <tr>
                <th class="w150">插件名称</th>
                <td>{$plug.name}</td>
            </tr>
            <tr>
                <th>插件版本</th>
                <td>{$plug.version}</td>
            </tr>
            <tr>
                <th>团队名称</th>
                <td>{$plug.team}</td>
            </tr>
            <tr>
                <th>发布时间</th>
                <td>{$plug.pubdate}</td>
            </tr>
            <tr>
                <th>网站</th>
                <td>{$plug.web}</td>
            </tr>
            <tr>
                <th>电子邮箱</th>
                <td>{$plug.email}</td>
            </tr>
        </table>
        <div class="position-bottom">
            <input type="submit" value="安装" class="hd-success"/>
        </div>
    </form>
</div>
</body>
</html>