<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>计划任务</title>
    <hdjs/>
    <style type="text/css">
        div.hd-search {
            padding: 10px;
        }

        div.hd-search td {
            padding-right: 5px;
        }
    </style>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li>
                <a href="{|U:'Admin/index'}" class="action">
                    任务列表
                </a>
            </li>
            <li>
                <a href="{|U:'Admin/add'}">
                    添加任务
                </a>
            </li>
        </ul>
    </div>

    <div class="content">
        <table class="table2 table-title">
            <thead>
            <tr>
                <td class="w50">id</td>
                <td>任务名称</td>
                <td>创建人</td>
                <td>执行时间</td>
                <td>执行程序</td>
                <td class="w100">操作</td>
            </tr>
            </thead>
            <tbody>
            <list from="$data" name="d">
                <tr>
                    <td>{$d.id}</td>
                    <td>{$d.title}</td>
                    <td>{$d.username}</td>
                    <td>
                        每隔 {$d.mday} 天
                        {$d.hours} 小时
                        {$d.minutes} 分
                    </td>
                    <td>
                        {$d.classname}.class.php
                    </td>
                    <td>
                        <a href="{|U:'edit',array('id'=>$d['id'])}">修改<a> |
                       <a href="javascript:hd_confirm('确证删除吗？',function(){hd_ajax(CONTROLLER + '&g=addons&a=del', {id: {$d.id}})})">删除</a>
                    </td>
                </tr>
            </list>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>