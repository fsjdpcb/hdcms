$(function () {
    $("form").validate({
        password: {
            rule: {
                required: true
            },
            error: {
                required: "密码不能为空"
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
                ajax: {url: CONTROL + "&m=check_email", field: ['uid']}
            },
            error: {
                ajax: '邮箱已经使用'
            }
        }
    })
})
