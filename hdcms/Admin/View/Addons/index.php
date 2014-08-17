<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>插件列表</title>
    <hdjs/>
    <css file="__PUBLIC__/common.css"/>
</head>
<body>
<div class="wrap">
    <form action="" class="hd-form">
        <div class="menu_list">
            <ul>
                <li>
                    <a href="{|U:'index'}" class="action">插件列表</a>
                </li>
                <li>
                    <a href="{|U:'add'}">创建插件</a>
                </li>
            </ul>
        </div>
        <table class="table2">
            <thead>
            <tr>
                <td class="w200">名称</td>
                <td class="w200">标识</td>
                <td>描述</td>
                <td class="w100">状态</td>
                <td class="w100">作者</td>
                <td class="w100">版本</td>
                <td class="w150">操作</td>
            </tr>
            </thead>
            <tbody>
            <list from="$data" name="d">
                <tr>
                    <td>{$d.name}</td>
                    <td>{$d.title}</td>
                    <td>{$d.description}</td>
                    <td>{$d.status}</td>
                    <td>{$d.author}</td>
                    <td>{$d.version}</td>
                    <td>
                        <if value="$d.status">
                            <a href="{|U:'config',array('addon'=>$d['name'])}">设置</a>
                            <a href="{|U:'disabled',array('addon'=>$d['name'])}">禁用</a>
                            <a href="{|U:'uninstall',array('addon'=>$d['name'])}">卸载</a>
                        <else>
                            <a href="{|U:'install',array('addon'=>$d['name'])}">安装</a>
                        </if>
                    </td>
                </tr>
            </list>
            </tbody>
        </table>
    </form>
</div>

</body>
</html>