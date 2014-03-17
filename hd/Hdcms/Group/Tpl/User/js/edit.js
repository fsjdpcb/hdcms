$(function () {
    $("form").validate({
        'password-c': {
            rule: {
                confirm: 'password'
            },
            error: {
                confirm: '两次密码不匹配'
            }
        },
        email: {
            rule: {
                email: true,
                ajax: {url: CONTROL + "&m=check_email",field:['uid']}
            },
            error: {
                email: '邮箱格式错误',
                ajax: '邮箱已经使用'
            }
        }
    })
})
