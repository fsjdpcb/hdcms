<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理员角色</title>
    <hdjs/>
    <css file="__PUBLIC__/common.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'index'}" class="action">角色列表</a></li>
            <li><a href="{|U:'add'}">添加角色</a></li>
            <li><a href="javascript:;" onclick="hd_ajax('{|U:updateCache}')">更新缓存</a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td class="w30">rid</td>
            <td class="w150">角色名称</td>
            <td>描述</td>
            <td class="w100">系统</td>
            <td class="w180">操作</td>
        </tr>
        </thead>
        <tbody>
        <list from="$data" name="d">
            <tr>
                <td>{$d.rid}</td>
                <td>{$d.rname}</td>
                <td>{$d.title}</td>
                <td>
                    <if value="$d.system">
                        <font color="red">√</font>
                        <else/>
                        <font color="blue">×</font>
                    </if>
                </td>
                <td>
                    <a href="{|U:'edit',array('rid'=>$d['rid'])}">修改</a> |
                    <if value="$d.system eq 0">
                        <a href="javascript:hd_confirm('确定删除吗?',function(){hd_ajax('{|U:del}',{rid:{$d.rid}})})">删除</a>
                    <else>
                            删除
                    </if>
                    |
                    <if value="$d.rid eq 1">
                        权限设置
                        <else>
                            <a href="{|U:'Access/edit',array('rid'=>$d['rid'])}">权限设置</a>
                    </if>
                </td>
            </tr>
        </list>
        </tbody>
    </table>
</div>
</body>
</html>