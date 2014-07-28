<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>修改会员组</title>
    <hdjs/>
    <js file="__CONTROLLER_TPL__/js/addEdit.js"/>
    <css file="__PUBLIC__/common.css"/>
</head>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'index'}">会员组列表</a></li>
            <li><a href="__URL__" class="action">修改会员组</a></li>
        </ul>
    </div>
    <div class="title-header">添加会员组</div>
    <form method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:index}');">
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
                <th class="w100">评论不需要审核</th>
                <td>
                    <label>
                        <input type="radio" name="comment_state" value="1" <if value="$field.comment_state==1">checked="checked"</if>/> 是
                    </label> 
                    <label>
                        <input type="radio" name="comment_state" value="0" <if value="$field.comment_state==0">checked="checked"</if>/> 否
                    </label>
                </td>
            </tr>
            <tr>
                <th class="w100">允许发短消息</th>
                <td>
                    <label>
                        <input type="radio" name="allowsendmessage" value="1" <if value="$field.allowsendmessage==1">checked="checked"</if>/>是
                    </label> 
                    <label>
                        <input type="radio" name="allowsendmessage" value="0" <if value="$field.allowsendmessage==0">checked="checked"</if>/>否
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