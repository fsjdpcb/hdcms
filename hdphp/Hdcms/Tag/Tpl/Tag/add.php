<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>搜索关键词</title>
    <hdui bootstrap="true"/>
    <js file="__GROUP__/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/tag.js"/>
    <css file="__CONTROL_TPL__/css/tag.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'index'}">tag列表</a></li>
            <li><a href="javascript:;" class="action">添加tag</a></li>
        </ul>
    </div>
    <form action="{|U:'add'}" method="post" onsubmit="return false" class="hd-form">
        <table class="table1">
            <tr>
                <th class="w100">tag内容</th>
                <td>
                    <input type="text" name="name" value="{$field.name}" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">统计</th>
                <td>
                    <input type="text" name="total" value="{$field.total}" class="w200"/>
                </td>
            </tr>
        </table>
        <div class="btn_wrap">
            <input type="submit" class="btn" value="确定"/>
        </div>
    </form>
</div>
</body>
</html>