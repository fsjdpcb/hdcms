//表单验证 添加管理员
$(function () {
    $("form").validate({
        //验证规则
        username: {
            rule: {
                required: true,
                ajax: {url: CONTROL + '&m=check_username', field: ['uid']}
            },
            error: {
                required: "管理员名不能为空",
                ajax: '帐号已经存在'
            }
        },
        email: {
            rule: {
                required: true,
                email: true,
                ajax: {url: CONTROL + '&m=check_email'}
            },
            error: {
                required: '邮箱不能为空',
                email: "邮箱输入错误",
                ajax: '邮箱已经存在'
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
        c_password: {
            rule: {
                required: true,
                confirm: "password"
            },
            error: {
                required: "确认密码不能为空",
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