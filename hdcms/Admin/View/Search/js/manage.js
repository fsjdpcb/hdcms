//全选 or  反选
$(function () {
    $("input#select_all").click(function () {
        $("[type='checkbox']").attr("checked", $(this).attr("checked") == "checked");
    })
})
//删除
function del(sid) {
    if (sid) {
        var data = {'sid[]': sid};
    } else {
        var data = $("[name*='sid']:checked").serialize();
    }
    if (!data) {
        $.dialog({message: '请选择删除的关键词', type: "error"});
        return;
    }
    if (confirm("确定要删除搜索词吗?")) {
        $.ajax({
            type: "POST",
            url: CONTROLLER + "&a=del",
            cache: false,
            data: data,
            dataType:'json',
            success: function (data) {
                if (data.status == 1) {
                    $.dialog({
                        message: data.message,
                        type: "success",
                        close_handler: function () {
                            window.location.reload();
                        }
                    });
                } else {
                    $.dialog({
                        message: "删除失败",
                        type: "error"
                    });
                }
            }
        })
    }
}