<include file="__PUBLIC__/header.php"/>
<body>
<div class="wrap">
    <div class="title-header">修改密码</div>
    <form method="post" onsubmit="return hd_submit(this)" class="hd-form">
        <table class="table1">
            <tr>
                <th class="w100">管理员名称</th>
                <td>
                    {$user.username}
                </td>
            </tr>
            <tr>
                <th class="w100">旧密码</th>
                <td>
                    <input type="password" name="old_password" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">新密码</th>
                <td>
                    <input type="password" name="password" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">确认密码</th>
                <td>
                    <input type="password" name="passwordc" class="w200"/>
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
        //验证规则
        old_password: {
            rule: {
                required: true,
                ajax: {url: CONTROLLER + "&a=checkPassword"}
            },
            error: {
                required: "旧密码不能为空",
                ajax: "旧密码输入错误"
            }
        },
        password: {
            rule: {
                required: true,
                regexp: /^\w{5,}$/
            },
            error: {
                required: "密码不能为空",
                regexp: "密码不能小于5位"
            }
        },
        passwordc: {
            rule: {
                required: true,
                confirm: "password"
            },
            error: {
                required: "确认密码不能为空",
                confirm: "两次密码不一致"
            }
        }
    })
</script>
</body>
</html>