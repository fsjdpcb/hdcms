<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>解决反馈</title>
    <hdjs/>
    <js file="__ROOT__/hdcms/static/js/js.js"/>
    <js file="__CONTROL_TPL__/js/add_validation.js"/>
    <js file="__CONTROL_TPL__/js/js.js"/>
    <css file="__CONTROL_TPL__/css/css.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'showBug'}" class="action">所有反馈</a></li>
        </ul>
    </div>
    <div class="title-header">反馈处理</div>
    <form method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:'showBug'}')">
        <input type="hidden" value="{$field.bid}" name="bid"/>
        <table class="table1">
            <tr>
                <th class="w100">反馈者</th>
                <td>
                    {$field.username}
                </td>
            </tr>
            <tr>
                <th class="w100">邮箱</th>
                <td>
                    <a href="mailto:{$field.email}">{$field.email}</a>
                </td>
            </tr>
            <tr>
                <th class="w100">提交时间</th>
                <td>
                    {$field.addtime|date:"Y-m-d H:i:s",@@}
                </td>
            </tr>
            <tr>
                <th class="w100">问题摘要</th>
                <td>
                    <textarea class="w600 h200">{$field.content}</textarea>
                </td>
            </tr>
            <tr>
                <th class="w100">问题类型</th>
                <td>
                    {$field.type}
                </td>
            </tr>
            <tr>
                <th class="w100">状态</th>
                <td>
                    <label><input type="radio" name="status" value="未审核"
                        <if value="$field.status=='未审核'">checked='checked'</if>
                        /> 未审核</label>
                    <label><input type="radio" name="status" value="处理中"
                        <if value="$field.status=='处理中'">checked='checked'</if>
                        /> 处理中</label>
                    <label><input type="radio" name="status" value="已解决"
                        <if value="$field.status=='已解决'">checked='checked'</if>
                        /> 已解决</label>
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