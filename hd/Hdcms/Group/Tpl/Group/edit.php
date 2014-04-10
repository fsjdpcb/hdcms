<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
    <title>修改会员组</title>
    <hdjs/>
    <js file="__CONTROL_TPL__/js/js.js"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'index'}">会员组列表</a></li>
            <li><a href="javascript:;" class="action">修改会员组</a></li>
        </ul>
    </div>
    <div class="title-header">添加会员组</div>
    <form action="{|U:edit}" method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:index}');">
        <input type="hidden" name="rid" class="w300" value="{$field.rid}"/>
        <table class="table1">
            <tr>
                <th class="w100">组名</th>
                <td>
                    <input type="text" name="rname" class="w300" value="{$field.rname}" required=""/>
                </td>
            </tr>
            <tr>
                <th class="w100">积分小于</th>
                <td>
                    <input type="text" name="creditslower" class="w300" value="{$field.creditslower}" required=""/>
                </td>
            </tr>
            <tr>
                <th class="w100">用户权限</th>
                <td>
                    <label>
                        <input type="checkbox" name="comment_state" value="1"
                        <if value="$field.comment_state">checked="checked"</if>
                        /> 评论不需要审核
                    </label>&nbsp&nbsp&nbsp&nbsp;
                    <label>
                        <input type="checkbox" name="allowsendmessage" value="1"
                        <if value="$field.allowsendmessage">checked="checked"</if>
                        /> 允许发短消息
                    </label>
                </td>
            </tr>
            <tr>
                <th class="w100">描述</th>
                <td>
                    <input type="text" name="title" class="w300" value="{$field.title}"/>
                </td>
            </tr>
        </table>
        <div class="position-bottom">
            <input type="submit" value="确定" class="hd-success"/>
        </div>
    </form>
</div>
</body>
</html>