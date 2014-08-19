<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>钓子列表</title>
    <hdjs/>
    <css file="__PUBLIC__/common.css"/>
</head>
<body>
<div class="wrap">
    <form action="" class="hd-form">
        <div class="menu_list">
            <ul>
                <li>
                    <a href="{|U:'index'}" class="action">钓子列表</a>
                </li>
                <li>
                    <a href="{|U:'add'}">添加钓子</a>
                </li>
            </ul>
        </div>
        <table class="table2">
            <thead>
            <tr>
                <td class="w50">ID</td>
                <td class="w300">名称</td>
                <td>描述</td>
                <td>类型</td>
                <td class="w80">操作</td>
            </tr>
            </thead>
            <tbody>
            <list from="$data" name="d">
                <tr>
                    <td>{$d.id}</td>
                    <td>{$d.name}</td>
                    <td>{$d.description}</td>
                    <td><if value="$d.type eq 1">控制器<else>视图</if></td>
                    <td>
                        <a href="{|U:'edit',array('id'=>$d['id'])}">编辑</a>
                        <a href="javascript:hd_confirm('确证删除吗？',function(){hd_ajax(CONTROLLER + '&a=del', {id: {$d.id}})})">
                            删除</a>
                    </td>
                </tr>
            </list>
            </tbody>
        </table>
    </form>
</div>

</body>
</html>