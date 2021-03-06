<include file="__PUBLIC__/header.php"/>
<body>
<form method="post" class="hd-form" onsubmit="return hd_submit(this,'__CONTROLLER__');">
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="{|U:'index'}">管理员</a></li>
                <li><a href="javascript:;" class="action">修改管理员</a></li>
            </ul>
        </div>
        <div class="title-header">管理员信息</div>
        <input type="hidden" name="uid" value="{$field.uid}"/>
        <table class="table1">
            <tr>
                <th class="w100">帐号</th>
                <td>
                    {$field.username}
                </td>
            </tr>
            <tr>
                <th class="w100">所属角色</th>
                <td>
                    <select name="rid">
                        <list from="$role" name="r">
                            <option value="{$r.rid}"
                            <if value="$field.rid eq $r.rid">selected="selected"</if>
                            >{$r.rname}</option>
                        </list>
                    </select>
                </td>
            </tr>
            <tr>
                <th class="w100">密码</th>
                <td>
                    <input type="password" name="password" class="w200" value=""/>
                </td>
            </tr>
            <tr>
                <th class="w100">确认密码</th>
                <td>
                    <input type="password" name="c_password" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">邮箱</th>
                <td>
                    <input type="text" name="email" value="{$field.email}" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">积分</th>
                <td>
                    <input type="text" name="credits" class="w200" value="{$field.credits}"/>
                </td>
            </tr>
        </table>
    </div>
    <div class="position-bottom">
        <input type="submit" class="hd-success" value="确定"/>
    </div>
</form>
<script type="text/javascript" charset="utf-8">
    $(function () {
        $("form").validate({
            email: {
                rule: {
                    required: true,
                    email: true,
                    ajax: {url: CONTROLLER + '&a=checkEmail', field: ['uid']}
                },
                error: {
                    required: '邮箱不能为空',
                    email: "邮箱输入错误",
                    ajax: '邮箱已经存在'
                }
            },
            password: {
                rule: {
                    regexp: /^\w{5,}$/
                },
                error: {
                    regexp: "密码不能小于5位"
                }
            },
            c_password: {
                rule: {
                    confirm: "password"
                },
                error: {
                    confirm: "两次密码不一致"
                }
            },
            credits: {
                rule: {
                    required: true,
                    regexp: /^\d+$/
                },
                error: {
                    required: "积分不能为空",
                    regexp: "必须为数字"
                }
            }

        })
    })
</script>
</body>
</html>