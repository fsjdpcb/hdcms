<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>字段集</title>
    <hdjs/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li>
                <a href="{|U:'Admin/index'}">
                    表单列表
                </a>
            </li>
            <li>
                <a href="{|U:'FormGroup/index'}" class="action">
                    表单组列表
                </a>
            </li>
            <li>
                <a href="{|U:'FormGroup/add'}">
                    添加表单组
                </a>
            </li>
        </ul>
    </div>
    <div class="content">
        <table class="table2 table-title">
            <thead>
                <tr>
                    <td class="w30">gid</td>
                    <td class="w200">表单组名称</td>
                    <td>模板文件</td>
                    <td class="w100">操作</td>
                </tr>
            </thead>
            <tbody>
                <list from="$data" name="d">
                    <tr>
                        <td>{$d.gid}</td>
                        <td>{$d.gname}</td>
                        <td>
                            ./Hdcms/Addons/CustomForm/Template/{$d.gid}.php
                        </td>
                        <td>
                            <a href="{|U:'Field/index',array('gid'=>$d['gid'])}">字段</a> |
                            <a href="{|U:'edit',array('gid'=>$d['gid'])}">
                                修改
                            </a> |
                            <a href="javascript:hd_confirm('确证删除吗？',function(){hd_ajax(CONTROLLER + '&g=addons&a=del', {gid: {$d.gid}})})">删除</a>
                        </td>
                    </tr>
                </list>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>