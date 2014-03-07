/**
 * 表单验证
 */
$(function () {
    $("form").validate({
        email: {
            rule: {
                email: true
            },
            error: {
                email: '邮箱格式不正确'
            }
        }
    })
})