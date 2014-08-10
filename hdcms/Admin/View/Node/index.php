<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>后台菜单管理</title>
    <hdjs/>
    <js file="__CONTROLLER_TPL__/js/index.js"/>
    <css file="__PUBLIC__/common.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'index'}" class="action">菜单管理</a></li>
            <li><a href="{|U:'add',array('pid'=>0)}">添加菜单</a></li>
            <li><a href="javascript:hd_ajax('{|U:updateCache}');">更新缓存</a></li>
        </ul>
    </div>
    <table class="table2 hd-form form-inline">
        <thead>
        <tr>
            <td class="w50">排序</td>
            <td class="w50">ID</td>
            <td>菜单名称</td>
            <td>状态</td>
            <td class="w80">类型</td>
            <td class="w150">操作</td>
        </tr>
        </thead>
        <list from="$node" name="n">
            <tr>
                <td>
                    <input type="text" class="w30" value="{$n.list_order}" name="list_order[{$n.nid}]"/>
                </td>
                <td>{$n.nid}</td>
                <td>{$n._name}</td>
                <td>
                    <if value="$n.state eq 1">
                        显示
                    <else>
                        不显示
                    </if>
                </td>
                <td>
                    <if value="$n.type eq 1">
                        权限菜单
                    <else>
                         普通菜单
                    </if>
                </td>
                <td style="text-align: right">
                    <if value="$n._level eq 3">
                        <span class="disabled">添加子菜单  | </span>
                    <else>
                        <a href="{|U('add',array('pid'=>$n['nid']))}">添加子菜单</a> |
                    </if>

                    <if value="$n.is_system eq 0">
                        <a href="{|U('edit',array('nid'=>$n['nid']))}">修改</a> |
                        <a href="javascript:hd_confirm('确定删除菜单吗？',function(){hd_ajax('{|U:del}',{nid:{$n.nid}})})">删除</a>
                    <else/>
                        <span class="disabled">修改 | </span>
                        <span class="disabled">删除</span>
                    </if>
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