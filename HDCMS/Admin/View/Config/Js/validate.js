$("form").validate({
    title: {
        rule: {required: true, ajax: {url: CONTROLLER + '&a=check_title', field: ['id']}},
        error: {required: '变量名不能为空', ajax: '标题已经存在'},
        message: '中文标题',
        success: '输入正确'
    },
    name: {
        rule: {required: true, regexp: /^[A-Z\-]+$/, ajax: {url: CONTROLLER + '&a=check_name', field: ['id']}},
        error: {required: '变量名不能为空', regexp: '必须为大写英文', ajax: '变量已经存在'},
        message: '大写英文',
        success: '输入正确'
    },
    info: {
        rule: {required: false},
        error: {required: ''},
        message: '如：1|开启,0|关闭',
        success: '输入正确'
    }
});