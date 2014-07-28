//表单验证
$(function () {
    $("form").validate({
        //验证规则
        title: {
            rule: {
                required: true
            },
            error: {
                required: "菜单名称不能为空"
            }
        }
    })
})