//点击input表单实现 全选或反选
$(function () {
    //全选
    $("input#select_all").click(function () {
        $("[type='checkbox']").attr("checked", $(this).attr("checked") == "checked");
    })
})
//全选文章
function select_all() {
    $("[type='checkbox']").attr("checked", "checked");
}
//反选文章
function reverse_select() {
    $("[type='checkbox']").attr("checked", function () {
        return !$(this).attr("checked") == 1;
    });
}
/**
 * 删除文章
 * @param mid
 */
function del(mid) {
    var ids = $("input:checked").serialize();
    if (ids) {
        hd_confirm('确定要删除文章吗', function () {
            $.ajax({
                type: "POST",
                url: CONTROLLER + "&a=del&mid="+mid,
                dataType: "JSON",
                cache: false,
                data: ids,
                success: function (data) {
                    if (data.status == 1) {
                        $.dialog({
                            message: "删除文章成功",
                            type: "success",
                            timeout: 3,
                            close_handler: function () {
                                location.href = URL;
                            }
                        });
                    } else {
                        $.dialog({
                            message: data.message,
                            type: "error",
                            close_handler: function () {
                                location.href = URL;
                            }
                        });
                    }
                }
            })
        });
    } else {
        alert("请选择删除的文章");
    }
}
//设置状态
function audit(mid, status) {
    //单文章删除
    var ids = $("input:checked").serialize();
    if (ids) {
        $.ajax({
            type: "POST",
            url: CONTROLLER + "&a=audit" + "&status=" + status + "&mid=" + mid,
            dataType: "JSON",
            cache: false,
            data: ids,
            success: function (data) {
                if (data.status == 1) {
                    $.dialog({
                        message: "设置文章成功",
                        type: "success",
                        timeout: 3,
                        close_handler: function () {
                            location.href = URL;
                        }
                    });
                } else {
                    $.dialog({
                        message: data.message,
                        type: "error",
                        close_handler: function () {
                            location.href = URL;
                        }
                    });
                }
            }
        })
    } else {
        alert("请选择设置的文章");
    }
}















