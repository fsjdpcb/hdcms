//全选 or  反选
$(function () {
    //全选
    $("input#select_all").click(function () {
        $("[type='checkbox']").attr("checked", $(this).attr("checked") == "checked");
    })
    //底部按钮
    $("input.s_all").click(function () {
        $("[type='checkbox']").attr("checked", "checked");
    })
    //反选
    $("input.r_select").click(function () {
        $("[type='checkbox']").attr("checked", function () {
            return !$(this).attr("checked") == 1
        });
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
        alert("请选择删除的关键词");
        return;
    }
    if (confirm("确定要删除搜索词吗?")) {
        $.ajax({
            type: "POST",
            url: CONTROL + "&m=del",
            cache: false,
            data: data,
            success: function (stat) {
                if (stat == 1) {
                    $.dialog({
                        msg: "删除搜索词成功",
                        type: "success",
                        timeout: 3,
                        close_handler: function () {
                            window.location.reload();
                        }
                    });
                } else {
                    $.dialog({
                        msg: "删除搜索词失败",
                        type: "error"
                    });
                }
            }
        })
    }
}
//修改搜索词
$(function () {
    $("form").submit(function () {
        var data = $("form").serialize();
        $.ajax({
            type: "POST",
            url: METH,
            cache: false,
            data: data,
            success: function (stat) {
                if (stat == 1) {
                    $.dialog({
                        msg: "修改搜索词成功",
                        type: "success",
                        timeout: 3,
                        close_handler: function () {
                            location.href = CONTROL;
                        }
                    });
                } else {
                    $.dialog({
                        msg: "修改搜索词失败",
                        type: "error"
                    });
                }
            }
        })
    })
})