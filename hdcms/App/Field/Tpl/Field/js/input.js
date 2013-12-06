//表单验证
$(function () {
    $("form").validation({
        input_size: {
            rule: {
                required: true,
                regexp: /^\d+$/
            },
            error: {
                required: "显示长度不能为空",
                regexp: "请输入数字"
            }
        },
        input_validation: {//验证规则
            rule: {
                regexp: /^\/.+\/$/
            },
            error: {
                regexp: "请输入正则"
            }
        }
    })
})