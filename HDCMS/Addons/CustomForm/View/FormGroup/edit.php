<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改表单组</title>
    <hdjs/>
</head>
<body>
<form action="{|U:'edit'}" method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:index}')">
    <input type="hidden" name="gid" value="{$field.gid}"/>
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
                    <a href="javascript:;" class="action">
                        修改表单组
                    </a>
                </li>
            </ul>
        </div>
        <div class="title-header">温馨提示</div>
        <div class="help">
            <ul>
                <li>向提交者发送邮箱，需要邮箱配置设置正确</li>
            </ul>
        </div>
        <div class="title-header">
            添加表单组
        </div>
        <div class="right_content">
            <table class="table1">
                <tr>
                    <th class="w100">表单组名称</th>
                    <td>
                        <input type="text" name="gname" class="w200" value="{$field.gname}"/>
                    </td>
                </tr>
                <tr>
                    <th class="w100">提交者发送邮件</th>
                    <td>
                        <label>
                            <input type="radio" name="send_mail" value="1" <if value="$field.send_mail eq 1"> checked=""</if>/> 发送邮件
                        </label>
                        <label>
                            <input type="radio" name="send_mail" value="0" <if value="$field.send_mail eq 0"> checked=""</if>/> 不发送邮件
                        </label>
                        <span id="hd_send_mail"></span>
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