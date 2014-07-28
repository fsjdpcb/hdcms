//表单验证
$(function () {
    $("form").validate({
        //验证规则
        title: {
            rule: {
                required: true
            },
            error: {
                required: "不能为空"
            }
        },
        url: {
            rule: {
                required: true
            },
            error: {
                required: '不能为空'
            }
        }
    })
})