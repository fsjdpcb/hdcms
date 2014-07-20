//表单验证
$(function () {
    $("form").validate({
        //验证规则
        title: {
            rule: {
                required: true,
                china: true
            },
            error: {
                required: "字段标题不能为空",
                china: "不能输入特殊字母"
            }
        },
        field_name: {
            rule: {
                required: true,
                regexp: /^[a-z]\w*$/i,
                ajax: {url: CONTROLLER + "&a=fieldIsExists", field: ["mid"]}
            },
            error: {
                required: "字段名不能为空",
                regexp: "必须输入英文字母",
                ajax: "字段已经存在"
            }
        },
        //最小长度
        minlength: {
            rule: {
                regexp: /^\d+$/
            },
            error: {
                regexp: "请输入数字"
            }
        },
        //最大长度
        maxlength: {
            rule: {
                regexp: /^\d+$/
            },
            error: {
                regexp: "请输入数字"
            }
        }
    })
})

//选择字段模板
$(function () {
    //模板类型缓存
    var field_tpl = {};
    $("#field_type").change(function () {
        var field_type = $(this).val();
        if (field_tpl[field_type]) {
            $(".field_tpl").html(field_tpl[field_type]);
        } else {
            $.ajax({
                url: CONTROLLER + "&a=getFieldTpl",
                type: "POST",
                data: {field_type: field_type, tpl_type: tpl_type, mid: mid},
                cache: false,
                success: function (data) {
                    field_tpl[field_type] = data;
                    $(".field_tpl").html(data);
                }
            })
        }
    })
    //加载时触发，add时默认加载input模板
    $("#field_type").trigger("change");
})

//验证规则切换
$(function () {
    $("#field_check").live("change", function () {
        $("[name='validate']").val($(this).val());
    })
})






