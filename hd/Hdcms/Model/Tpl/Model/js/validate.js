//表单验证
$(function () {
    $("form").validate({
        //验证规则
        model_name: {
            rule: {
                required: true,
                //编辑时传入当前模型的mid（用于不检测当前模型）
                ajax: {url: CONTROL + "&m=check_model_name", field: ["mid"]}
            },
            error: {
                required: "模型名称不能为空",
                ajax: "模型已经存在"
            }
        },
        tablename: {
            rule: {
                required: true,
                regexp:/^\w+$/,
                ajax: {url: CONTROL + "&m=check_table_name", field: ["mid"]}
            },
            error: {
                required: "表名不能为空",
                regexp:"表名必须由英文或数字组成",
                ajax: "数据表已经存在"
            },
            message:'不要写表前缀'
        },
        app_group: {
            rule: {
                required: true
            },
            error: {
                required: "应用组不能为空"
            }
        },
        app: {
            rule: {
                required: true
            },
            error: {
                required: "应用不能为空"
            }
        },
        control: {
            rule: {
                required: true
            },
            error: {
                required: "控制器不能为空"
            }
        },
        method: {
            rule: {
                required: true
            },
            error: {
                required: "方法不能为空"
            }
        }
    })
})