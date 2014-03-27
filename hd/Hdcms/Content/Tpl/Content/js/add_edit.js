//表单验证
$(function () {
    $("form").validate({
        title: {
            rule: {
                required: true,
                regexp: /^.{10,100}$/
            },
            error: {
                required: "标题不能为空",
                regexp: '标题字数在10~100间'
            }
        },
        keywords: {
            message: '如果不填，系统将自动从内容中提取'
        },
        description: {
            message: '如果不填，系统将自动从内容中提取'
        },
        html_path: {
            message: '如:houdunwang.html,如果不填将按栏目规则生成静态。栏目开启生成静态才有效'
        },
        read_credits: {
            rule: {
                required: true,
                regexp: /^\d+$/
            },
            error: {
                required: "阅读积分不能为空",
                regexp: '必须为数字'
            }
        },
        click: {
            rule: {
                required: true,
                regexp: /^\d+$/
            },
            error: {
                required: "点击数不能为空",
                regexp: '必须为数字'
            }
        },
        redirecturl: {
            rule: {
                http: true
            },
            error: {
                http: '网址格式错误'
            }
        }
    })
})
//添加或修改文章
$(function () {
    $("form#add,form#edit").submit(function () {
        //验证自定义字段
        $("[onblur*='field_check']").each(function () {
            $(this).trigger("blur");
        })
        //验证内容
        if (!UE.getEditor('hd_content').hasContents()) {
            alert("内容不能为空");
            return false;
        }
        //表单验证
        if ($(this).is_validate()) {
            var _post = $(this).serialize();
            dialog_message("正在发表...", 30);
            $.ajax({
                type: "POST",
                url: METH,
                dataType: "JSON",
                cache: false,
                data: _post,
                success: function (data) {
                    //关闭提示框
                    dialog_message(false);
                    if (data.state == 1) {
                        $.modal({
                            width: 230, height: 180, button: true,
                            title: '消息',
                            button_success: "继续操作",
                            button_cancel: "关闭窗口",
                            message: "操作成功!",
                            type: "success",
                            success: function () {
                                if (window.opener) {
                                    window.opener.location.reload();
                                }
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
                            message: "操作失败",
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
//标题颜色
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
