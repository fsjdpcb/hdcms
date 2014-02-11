//表单验证
$(function () {
    $("form").validate({
        //验证规则
        name: {
            rule: {
                required: true
            },
            error: {
                required: "JS名称不能为空"
            }
        }
    })
})
//删除标签
function del(id) {
    if (confirm('确定要删除吗？')) {
        hd_ajax(CONTROL + "&m=del&id=" + id);
    }
}