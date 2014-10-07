<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>字段管理</title>
    <hdjs/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li>
                <a href="{|U:'Data/index'}">
                    表单列表
                </a>
            </li>
            <li>
                <a href="{|U:'FormGroup/index'}">
                    表单组列表
                </a>
            </li>
            <li>
                <a href="{|U:'FormGroup/add'}">
                    添加表单组
                </a>
            </li>
            <li>
                <a href="{|U:'index'}" class="action">
                    字段列表
                </a>
            </li>
            <li>
                <a href="{|U:'add',array('gid'=>$_GET['gid'])}">
                    添加字段
                </a>
            </li>
        </ul>
    </div>
    <div class="content">
        <table class="table2  hd-form">
            <thead>
                <tr>
                    <td class="w30">fid</td>
                    <td class="w30">gid</td>
                    <td class="w30">排序</td>
                    <td class="w100">字段名</td>
                    <td>字段标题</td>
                    <td class="w100">显示类型</td>
                    <td class="w100">表单组</td>
                    <td class="w100">操作</td>
                </tr>
            </thead>
            <tbody>
                <list from="$data" name="$d">
                    <tr>
                        <td>{$d.fid}</td>
                        <td>{$d.gid}</td>
                        <td>
                            <input type="text" name="field[{$d.fid}][order_list]" value="{$d.order_list}" class="w50"/>
                            <input type="hidden" name="field[{$d.fid}][fid]" value="{$d.fid}" class="w50"/>
                        </td>
                        <td>{$d.name}</td>
                        <td>{$d.title}</td>
                        <td>{$d.show_type}</td>
                        <td>{$d.gname}</td>
                        <td>
                            <a href="{|U:'edit',array('fid'=>$d['fid'],'gid'=>$_GET['gid'])}">修改</a> |
                            <a href="javascript:hd_confirm('确证删除吗？',function(){hd_ajax(CONTROLLER + '&a=del&g=addons', {fid: {$d.fid}})})">删除</a>
                        </td>
                    </tr>
                </list>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>