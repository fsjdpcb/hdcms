<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>附件管理</title>
    <hdjs/>
    <js file="__CONTROLLER_TPL__/js/js.js"/>
</head>
<body>
<form action='{|U:' BulkDel'}' method="post" onsubmit="return hd_submit(this,'{|U:'index'}');">
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="javascript:;" class="action">附件管理</a></li>
        </ul>
    </div>
    <table class="table2">
        <thead>
        <tr>
            <td class="w30">
                <input type="checkbox" class="select_all"/>
            </td>
            <td class="w50">ID</td>
            <td class="w100">预览</td>
            <td>文件名</td>
            <td>大小</td>
            <td class="w200">上传时间</td>
            <td class="w100">用户id</td>
            <td class="w50">操作</td>
        </tr>
        </thead>
        <list from="$upload" name="u">
            <tr>
                <td>
                    <input type="checkbox" name="ids[]" value="{$u.id}"/>
                </td>
                <td>{$u.id}</td>
                <td>
                    <if value="$u.image">
                        <a href="{$u.pic}" target="_blank">
                            <img src="{$u.pic}" class="w40 h30" title="点击预览大图" onmouseover="view_image(this)"/>
                        </a>
                        <else>
                            <img src="{$u.pic}" class="w40 h30" title="点击预览大图"/>
                    </if>
                </td>
                <td>
                    {$u.basename}
                </td>
                <td>
                    {$u.size|get_size}
                </td>
                <td>
                    {$u.uptime|date:"Y-m-d",@@}
                </td>
                <td>
                    {$u.username}
                </td>
                <td>
                    <a href="javascript:;"
                       onclick="hd_confirm('确认删除吗？',function(){hd_ajax('{|U:'del'}',{id:{$u.id}})})">删除</a>
                </td>
            </tr>
        </list>
    </table>
    <div class="page1">
        {$page}
    </div>
    <div class="position-bottom">
        <input type="button" class="hd-cancel" onclick="select_all(1)" value='全选'/>
        <input type="button" class="hd-cancel" onclick="select_all(0)" value='反选'/>
        <input type="button" class="hd-cancel" onclick="BulkDel()" value="批量删除"/>
    </div>
</div>
</form>
</body>
</html>