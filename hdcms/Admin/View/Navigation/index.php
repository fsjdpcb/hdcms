<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>导航管理</title>
    <hdjs/>
    <js file="__CONTROLLER_TPL__/js/js.js"/>
    <css file="__CONTROLLER_TPL__/css/css.css"/>
    <css file="__PUBLIC__/common.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'index'}" class="action">导航列表</a></li>
            <li><a href="{|U:'add',array('pid'=>0)}">添加导航</a></li>
            <li><a href="javascript:hd_ajax('{|U:update_cache}');">更新缓存</a></li>
        </ul>
    </div>
    <table class="table2 hd-form form-inline">
        <thead>
        <tr>
            <td class="w50">排序</td>
            <td class="w50">nid</td>
            <td>菜单名称</td>
            <td class="w50">状态</td>
            <td class="w150">操作</td>
        </tr>
        </thead>
        <list from="$navigation" name="n">
            <tr>
                <td>
                    <input type="text" class="w30" value="{$n.list_order}" name="list_order[{$n.nid}]"/>
                </td>
                <td>{$n.nid}</td>
                <td>{$n._name}</td>
                <td>
                    <if value="$n.state==1">
                        显示
                    <else>
                        不显示
                    </if>
                </td>
                <td>
                    <a href="{|U('add',array('pid'=>$n['nid']))}">添加子菜单</a> |
                    <a href="{|U('edit',array('nid'=>$n['nid']))}">修改</a> |
                    <a href="javascript:" onclick="hd_confirm('确认删除吗？',function(){hd_ajax('{|U:del}',{nid:{$n.nid}})})">删除</a>
                </td>
            </tr>
        </list>
    </table>
</div>
<div class="position-bottom">
    <input type="button" class="hd-success" value="更改排序" onclick="update_order();"/>
</div>
</body>
</html>