//点击菜单时选中所有子集
$(function () {
    $("div.level2 input").click(function () {
        //一级input
        var c = $(this).attr("checked");
        //改变二级input选中状态
        $(this).parents("tr").find("td input").attr("checked", c != undefined);
    })
})

/**
 * 设置常用菜单
 */
function set_favorite() {
    $.post(CONTROL + '&m=set_favorite',$('form').serialize(), function (data) {
        if (data.state == 1) {
            $.dialog({
                "message": "设置常用菜单成功",
                "type": "success",
                "timeout": 2,
                "close_handler": function () {
                    top.location.reload();
                }
            });
        } else {
            $.dialog({
                "message": "设置常用菜单失败",
                "type": "error"
            });
        }
    }, 'json');
}