<include file="__PUBLIC__/header.php"/>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'index'}">会员列表</a></li>
            <li><a href="javascript:;" class="action">添加会员</a></li>
        </ul>
    </div>
    <div class="title-header">添加会员</div>
    <form method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:index}');">
        <table class="table1">
            <tr>
                <th class="w100">用户名</th>
                <td>
                    <input type="text" name="username" class="w300" required=""/>
                </td>
            </tr>
            <tr>
                <th class="w100">会员组</th>
                <td>
                    <select name="rid">
                        <list from="$role" name="r">
                            <option value="{$r.rid}">{$r.rname} (<if value="$r.admin">管理组<else>会员组</if>)</option>
                        </list>
                    </select>
                </td>
            </tr>
            <tr>
                <th class="w100">密码</th>
                <td>
                    <input type="password" name="password" class="w300" required=""/>
                </td>
            </tr>
            <tr>
                <th class="w100">确认密码</th>
                <td>
                    <input type="password" name="password_c" class="w300" required=""/>
                </td>
            </tr>
            <tr>
                <th class="w100">邮箱</th>
                <td>
                    <input type="text" name="email" class="w300"/>
                </td>
            </tr>
            <tr>
                <th class="w100">QQ</th>
                <td>
                    <input type="text" name="qq" class="w300"/>
                </td>
            </tr>
            <tr>
                <th class="w100">积分</th>
                <td>
                    <input type="text" name="credits" class="w300" value="{$hd.config.init_credits}" required=""/>
                </td>
            </tr>

        </table>
        <div class="position-bottom">
            <input type="submit" value="确定" class="hd-success"/>
        </div>
    </form>
</div>
<script>
    $("form").validate({
        username: {
            rule: {
                required: true,
                ajax: {url: CONTROLLER + "&a=checkUsername", field: ['uid']}
            },
            error: {
                required: "密码不能为空",
                ajax: '帐号已经存在'
            }
        },
        password: {
            rule: {
                required: true,
                regexp: /^\w{5,}$/
            },
            error: {
                required: "密码不能为空",
                regexp: '密码不能小于5位'
            }
        },
        'password_c': {
            rule: {
                confirm: 'password'
            },
            error: {
                confirm: '两次密码不匹配'
            }
        },
        credits: {
            rule: {
                required: true,
                regexp: /^\d+$/
            },
            error: {
                required: "积分不能为空",
                regexp: "积分必须为数字"
            }
        },
        email: {
            rule: {
                required: true,
                email: true,
                ajax: {url: CONTROLLER + "&a=checkEmail"}
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