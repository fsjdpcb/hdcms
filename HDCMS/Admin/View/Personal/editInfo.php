<include file="__PUBLIC__/header.php"/>
<body>
<div class="wrap">
    <div class="title-header">个人资料修改</div>
    <form method="post" onsubmit="return hd_submit(this,'__ACTION__')" class="hd-form">
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
<script>
    $("form").validate({
        email: {
            rule: {
                required: true,
                email: true,
                ajax: {
                    url: CONTROLLER + "&a=checkEmail",
                    field: ['uid']
                }
            },
            error: {
                required: "邮箱不能为空",
                email: '邮箱格式不正确',
                ajax: '邮箱已经使用'
            }
        }
    })
</script>
</body>
</html>