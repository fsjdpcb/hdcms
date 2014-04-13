//表单验证 添加管理员
$(function () {
    $("form").validate({
        email: {
            rule: {
                required: true,
                email: true
            },
            error: {
                required: '邮箱不能为空',
                email: "邮箱输入错误"
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