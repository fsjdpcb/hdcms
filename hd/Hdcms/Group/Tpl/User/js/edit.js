$(function () {
    $("form").validate({
        password: {
            rule: {
                regexp:/^\w{5,}$/
            },
            error: {
                regexp:'密码不能小于5位'
            }
        },
        'password-c': {
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
                email: true,
                ajax: {url: CONTROL + "&m=check_email", field: ['uid']}
            },
            error: {
                email: '邮箱格式不正确',
                ajax: '邮箱已经使用'
            }
        }
    })
})