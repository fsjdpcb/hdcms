<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>属性管理</title>
    <hdjs/>
    <css file="__CONTROLLER_TPL__/css/css.css"/>
    <js file="__CONTROLLER_TPL__/js/add.js"/>
    <css file="__PUBLIC__/common.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:index,array('mid'=>$_REQUEST['mid'])}">属性管理</a></li>
            <li><a href="{|U:'add',array('mid'=>$_REQUEST['mid'])}" class="action">添加属性</a></li>
        </ul>
    </div>
    <div class="title-header">添加属性</div>
    <form method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:index,array('mid'=>$_REQUEST['mid'])}');">
        <table class="table1">
            <tr>
                <th class="w100">属性名称</th>
                <td>
                    <input type="text" name="value" class="w200"/>
                </td>
            </tr>
        </table>
        <div class="position-bottom">
            <input type="submit" class="hd-success" value="确定"/>
        </div>
    </form>
</div>
</body>
</html>