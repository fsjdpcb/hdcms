$(function () {
    $("form").validation({
        // 验证规则
        search: {
            rule: {
                required: true
            },
            error: {
                required: "搜索关键字不能为空"
            }
        }
    })
})
