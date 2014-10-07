$("form").validate({
    gname: {
        rule: {required: true},
        error: {required: '不能为空'},
        message: '表单组的中文描述',
        success:'输入正确'
    },
    send_mail: {
        rule: {required: true},
        error: {required: '不能为空'},
        message: '取第一个邮箱字段'
    }
});