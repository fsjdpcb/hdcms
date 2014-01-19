//表单验证
$(function () {
    $("form").validate({
        //验证规则
        username: {
            rule: {
                required: true
            },
            error: {
                required: "反馈者不能为空"
            }
        },
        email: {
            rule: {
                required: true,
                email:true
            },
            error: {
                required: "邮箱不能为空",
                email:'邮箱格式不正确'
            }
        },
        content: {
            rule: {
                required: true,
                regexp: /^.{20,}$/
            },
            error: {
                required: "内容不能为空",
                regexp: "内容描述不能少于20个字"
            }
        }
    })
})