<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加字段</title>
    <hdjs/>
</head>
<body>
<form action="{|U:'add'}" method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:index,array('gid'=>$_GET['gid'])}')">
    <input type="hidden" name="gid" value="{$hd.get.gid}"/>
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li>
                    <a href="{|U:'Admin/index'}">
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
                    <a href="{|U:'index',array('gid'=>$_GET['gid'])}">
                        字段列表
                    </a>
                </li>
                <li>
                    <a href="javascript:;"  class="action">
                        添加字段
                    </a>
                </li>
            </ul>
        </div>
        <div class="title-header">
            添加字段
        </div>
        <div class="right_content">
            <table class="table1">
                <tr>
                    <th class="w100">字段标题(中文)</th>
                    <td>
                        <input type="text" name="title" class="w200"/>
                    </td>
                </tr>
                <tr>
                    <th class="w100">字段名(英文)</th>
                    <td>
                        <input type="text" name="name" class="w200"/>
                    </td>
                </tr>
                <tr>
                    <th class="w100">必须填写</th>
                    <td>
                        <label>
                            <input type="radio" name="isrequired" value="1"/> 是
                        </label>
                        <label>
                            <input type="radio" name="isrequired" value="0" checked=""/> 否
                        </label>
                    </td>
                </tr>
                <tr>
                    <th class="w100">表单类型</th>
                    <td>
                        <select name="show_type" class="w200">
                            <option value="text">text</option>
                            <option value="radio">radio</option>
                            <option value="select">select</option>
                            <option value="textarea">textarea</option>
                            <option value="email">email</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th class="w100">选项列表</th>
                    <td>
                        <textarea name="info" class="w300 h100"></textarea>
                    </td>
                </tr>
                <tr>
                    <th>默认值</th>
                    <td>
                        <input type="text" name="value"/>
                    </td>
                </tr>
                <tr>
                    <th>排序</th>
                    <td>
                        <input type="text" name="order_list" value="100"/>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="position-bottom">
        <input type="submit" value="确定" class="hd-success"/>
    </div>
</form>
<js file="__CONTROLLER_VIEW__/Js/validate.js"/>
</body>
</html>