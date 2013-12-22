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
function del(tid) {
    if (tid) {
        var data = {'tid[]': tid};
    } else {
        var data = $("[name*='tid']:checked").serialize();
    }
    if (!data) {
        alert("请选择删除的tag");
        return;
    }
    if (confirm("确定要删除tag吗?")) {
        $.ajax({
            type: "POST",
            url: CONTROL + "&m=del",
            cache: false,
            data: data,
            success: function (stat) {
                if (stat == 1) {
                    $.dialog({
                        msg: "删除tag成功",
                        type: "success",
                        timeout: 3,
                        close_handler: function () {
                            window.location.reload();
                        }
                    });
                } else {
                    $.dialog({
                        msg: "删除tag失败",
                        type: "error"
                    });
                }
            }
        })
    }
}
//添加&修改搜索词
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
                        msg: "操作成功",
                        type: "success",
                        timeout: 3,
                        close_handler: function () {
                            location.href = CONTROL;
                        }
                    });
                } else {
                    $.dialog({
                        msg: "操作失败",
                        type: "error"
                    });
                }
            }
        })
    })
})