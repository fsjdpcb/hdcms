<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>还原备份</title>
    <hdjs/>
    <js file="__CONTROLLER_TPL__/js/index.js"/>
    <css file="__PUBLIC__/common.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'backup'}">备份数据</a></li>
            <li><a href="{|U:'index'}" class="action">备份列表</a></li>
        </ul>
    </div>
    <form action="{|U:'delBackupDir'}" method="post" class="form-inline hd-form">
        <table class="table2">
            <thead>
            <tr>
                <td width="50">
                    <label><input type="checkbox" class="s_all_ck"/> 全选</label>
                </td>
                <td>备份目录</td>
                <td>备份时间</td>
                <td>大小</td>
                <td width="150">操作</td>
            </tr>
            </thead>
            <tbody>
            <list from="$dir" name="d">
                <tr>
                    <td width="50">
                        <label><input type="checkbox" name="dir[]" value="{$d.name}"/></label>
                    </td>
                    <td>{$d.name}</td>
                    <td>{$d.filemtime|date:'Y-m-d h:i:s',@@}</td>
                    <td>{$d.size|get_size}</td>
                    <td>
                        <a href="javascript:confirm('确定还原吗？')?location.href='{|U:'recovery',array('dir'=>$d['name'])}':false;">还原</a> |
                        <a href="javascript:" onclick="hd_confirm('确认删除吗？',function(){hd_ajax('{|U:del}',{dir:['{$d.name}']})})">删除</a>
                    </td>
                </tr>
            </list>
            </tbody>
        </table>
    </form>
</div>
<div class="position-bottom">
    <input type="button" class="hd-cancel" onclick="select_all('.table2')" value="全选"/>
    <input type="button" class="hd-cancel" onclick="reverse_select('.table2')" value="反选"/>
    <input type="button" class="hd-cancel" onclick="del_backup()" value="批量删除"/>
</div>
</body>
</html>