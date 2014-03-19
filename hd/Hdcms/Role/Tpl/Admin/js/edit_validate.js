//表单验证 添加管理员
$(function () {
    $("form").validate({
        nickname: {
            rule: {
                required: true,
                ajax: {url: CONTROL + '&m=check_nickname',field:['uid']}
            },
            error: {
                required: "昵称不能为空",
                ajax: '昵称已经存在'
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
        email: {
            rule: {
                required: true,
                email: true
            },
            error: {
                required: '邮箱不能为空',
                email: "邮箱输入错误"
            }

        }
    })
})