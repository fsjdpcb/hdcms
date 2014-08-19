<include file="__PUBLIC__/header.php"/>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'index'}">会员列表</a></li>
            <li><a href="javascript:;" class="action">修改会员</a></li>
        </ul>
    </div>
    <div class="title-header">添加会员组</div>
    <form method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:index}')">
        <input type="hidden" name="uid" value="{$field.uid}"/>
        <table class="table1">
            <tr>
                <th class="w100">用户名</th>
                <td>
                    {$field.username}
                </td>
            </tr>
            <tr>
                <th class="w100">会员组</th>
                <td>
                    <select name="rid">
                        <list from="$role" name="r">
                            <option value="{$r.rid}"
                            <if value="$field.rid eq $r.rid">selected=""</if>
                            >{$r.rname}</option>
                        </list>
                    </select>
                </td>
            </tr>
            <tr>
                <th class="w100">昵称</th>
                <td>
                    {$field.nickname}
                </td>
            </tr>
            <tr>
                <th class="w100">锁定到期时间</th>
                <td>
                    <label>
                    	<input type="text"  name="lock_end_time" id="lock_end_time" value="{$field.lock_end_time|date:'Y/m/d',@@}"/>
                    	<script>
                    		$('#lock_end_time').calendar({format: 'yyyy/MM/dd'})
                    	</script>
                    	<span id="hd_lock_end_time" class="validate-message">超过这个时间自动解锁</span>
                </td>
            </tr>
            <tr>
                <th class="w100">密码</th>
                <td>
                    <input type="password" name="password" value="" class="w300"/>
                </td>
            </tr>
            <tr>
                <th class="w100">确认密码</th>
                <td>
                    <input type="password" name="password_c" value="" class="w300"/>
                </td>
            </tr>
            <tr>
                <th class="w100">邮箱</th>
                <td>
                    <input type="text" name="email" value="{$field.email}" class="w300"/>
                </td>
            </tr>
            <tr>
                <th class="w100">QQ</th>
                <td>
                    <input type="text" name="qq" value="{$field.qq}" class="w300"/>
                </td>
            </tr>
            <tr>
                <th class="w100">积分</th>
                <td>
                    <input type="text" name="credits" value="{$field.credits}" class="w300" required=""/>
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
                regexp: /^\w{5,}$/
            },
            error: {
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
                ajax: {url: CONTROLLER + "&a=checkEmail", field: ['uid']}
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