//添加或修改文章
$(function () {
    $("form").submit(function () {
        //验证标题
        if (!$.trim($("[name='title']").val())) {
            alert('标题不能为空');
            return false;
        }
        //验证内容
        if ($("[id^='hd_content_data']").length > 0 && !UE.getEditor('hd_content_data[content]').hasContents()) {
            alert("内容不能为空");
            return false;
        }
        if ($(this).is_validation()) {
            var _post = $(this).serialize();
            dialog_message("正在发表...");
            $.ajax({
                type: "POST",
                url: METH,
                dataType: "JSON",
                cache: false,
                data: _post,
                success: function (stat) {
                    dialog_message("", true);
                    if (stat == 1) {
                        $.modal({
                            width: 230, height: 180, button: true,
                            title: '消息', cancel_title: "关闭窗口",
                            send_title: "继续操作",
                            message: "操作成功!",
                            type: "success",
                            send: function () {
                                window.location.reload();
                            },
                            cancel: function () {
                                if (window.opener) {
                                    window.opener.location.reload();
                                }
                                window.close();
                            }

                        })
                    } else {
                        $.dialog({
                            msg: "操作失败",
                            type: "error",
                            close_handler: function () {
                                location.href = URL;
                            }
                        });
                    }
                }
            })
        }
        return false;
    })
})

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
//更新排序
function update_order(cid) {
    var post = $("input[type='text']").serialize();
    $.ajax({
        type: "POST",
        url: CONTROL + "&m=update_order&cid=" + cid,
        dataType: "JSON",
        cache: false,
        data: post,
        success: function (data) {
            if (data.stat == 1) {
                $.dialog({
                    msg: data.msg,
                    type: "success",
                    timeout: 3,
                    close_handler: function () {
                        location.href = URL;
                    }
                });
            }
        }
    })
}
//删除文章
function del(method, cid, aid) {
    if (confirm("确定要删除文章吗?")) {
        //单文章删除
        if (aid) {
            var ids = {aid: aid}
        } else {//多文章删除
            var ids = $("input:checked").serialize();
        }
        if (ids) {
            $.ajax({
                type: "POST",
                url: CONTROL + "&m=" + method + "&cid=" + cid,
                dataType: "JSON",
                cache: false,
                data: ids,
                success: function (data) {
                    if (data.stat == 1) {
                        $.dialog({
                            msg: data.msg,
                            type: "success",
                            timeout: 3,
                            close_handler: function () {
                                location.href = URL;
                            }
                        });
                    }
                }
            })
        }
    }
}

/**
 * 选择颜色
 * @param obj 颜色选择对象，按钮对象
 * @param _input 颜色name=color表单
 */
function selectColor(obj, _input) {
    if ($("div.colors").length == 0) {
        var _div = "<div class='colors' style='width:80px;height:160px;position: absolute;z-index:999;'>";//颜色块
        var colors = ["#f00f00", "#272964", "#4C4952", "#74C0C0", "#3B111B", "#147ABC", "#666B7F", "#A95026", "#7F8150"
            , "#F09A21", "#7587AD", "#231012", "#DE745C", "#ED2F8D", "#B57E3E", "#002D7E", "#F27F00", "#B74589"
        ];
        for (var i = 0; i < 16; i++) {
            _div += "<div color='" + colors[i] + "' style='background:" + colors[i] + ";width:20px;height:20px;float:left;cursor:pointer;'></div>"
        }
        _div += "</div>";
        $("body").append(_div);
        $(".colors").css({top: $(obj).offset().top + 30, left: $(obj).offset().left});
    }
    $("div.colors").show();
    $("div.colors div").click(function () {
        $("div.colors").hide();
        var _c = $(this).attr("color");
        $("[name='" + _input + "']").val(_c);
        $("[name='title']").css({color: _c});
    })
}

//选择模板
$(function () {
    $("#template").focus(function () {
        select_tpl('template');
    })
})
//关闭窗口
$(function () {
    $("input.close_window").click(function () {
        if (confirm("确定关闭窗口吗？")) {
            window.close();
        }
    })
})

function update_title_color() {
    var title = $("[name='title']").css({"color": $("[name='color']").val()});
}
//编辑文章时更改标题颜色
$(function () {
    //更改颜色文本框时
    $("[name='color']").blur(function () {
        update_title_color();
    })
    update_title_color();
})
//批量还原回收站内的文章
function recovery(cid, aid) {
    if (aid) {//还原一篇文章
        var data = {aid: aid};
    } else {//批量还原
        var aid = $("[name*='aid']");
        if (aid.length == 0) {
            alert("请选择要还原的文章");
            return false;
        }
        var data = aid.serialize();
    }
    $.ajax({
        type: "post",
        url: CONTROL + "&m=recovery&cid=" + cid,
        data: data,
        dataType: "json",
        success: function (data) {
            if (data.stat == 1) {
                $.dialog({
                    msg: data.msg,
                    type: "success",
                    close_handler: function () {
                        location.href = URL;
                    }
                });
            } else {
                $.dialog({
                    msg: data.msg,
                    type: "success"
                });
            }
        }
    })
}



































