<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>设置常用菜单</title>
    <hdjs/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<form method="post" class="hd-form" onsubmit="return false">
    <div class="wrap">
        <div class="title-header">设置常用菜单</div>
        <table class="table1">
            <list from="$menu" name="n">
                <tr>
                    <th class="w200">
                        <div class="level2">{$n.html}</div>
                    </th>
                    <td>
                        <ul>
                            <list from="$n.data" name="m">
                                <li>{$m.html}</li>
                            </list>
                        </ul>
                    </td>
                </tr>
            </list>
        </table>
    </div>
    <div class="position-bottom">
        <input type='button' class="hd-success" onclick="set_favorite()" value="确定"/>
    </div>
</form>