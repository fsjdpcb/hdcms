//更改列表排序
function update_order() {
    var data = $("[name*='list_order']").serialize();
    $.post(CONTROLLER + "&a=updateOrder", data, function (data) {
        if (data.status == 1) {
            $.dialog({
                "message": data.message,
                "type": "success",
                "close_handler": function () {
                    location.href = URL;
                }
            });
        } else {
            $.dialog({
                "message": "排序修改失败",
                "type": "error"
            });
        }
    }, 'json')
}