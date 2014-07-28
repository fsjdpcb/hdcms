<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>个人资料修改</title>
    <hdjs/>
    <js file="__CONTROLLER_TPL__/js/editInfo.js"/>
    <css file="__PUBLIC__/common.css"/>
</head>
<body>
<div class="wrap">
    <div class="title-header">个人资料修改</div>
    <form method="post" onsubmit="return hd_submit(this,'__ACTION__')" class="hd-form">
        <input type="hidden" name="uid" value="{$hd.session.uid}"/>
        <table class="table1">
            <tr>
                <th class="w100">管理员名称</th>
                <td>
                    {$user.username}
                </td>
            </tr>
            <tr>
                <th class="w100">最后登录时间</th>
                <td>
                    {$user.logintime|date:"Y-m-d",@@}
                </td>
            </tr>
            <tr>
                <th class="w100">最后登录IP</th>
                <td>
                    {$user.lastip}
                </td>
            </tr>
            <tr>
                <th class="w100">昵称</th>
                <td>
                    <input type="text" name="nickname" class="w200" value="{$user.nickname}"/>
                </td>
            </tr>
            <tr>
                <th class="w100">邮箱</th>
                <td>
                    <input type="text" name="email" class="w200" value="{$user.email}"/>
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