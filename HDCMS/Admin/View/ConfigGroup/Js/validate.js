$("form").validate({
    cgname: {
        rule: {required: true, regexp: /^[a-z]+$/, ajax: {url: CONTROLLER+'&a=check_cgname',field:['cgid']}},
        error: {required: '不能为空', regexp: '必须为小写英文', ajax: '配置组已经存在'},
        message: '英文小写字母',
        success:'输入正确'
    },
    cgtitle: {
        rule: {required: true,ajax: {url: CONTROLLER+'&a=check_cgtitle',field:['cgid']}},
        error: {required: '不能为空',ajax:'组标题已经存在'},
        message: '配置组的中文描述',
        success:'输入正确'
    },
    cgorder: {
        rule: {required: true, regexp: /^[0-9]+$/},
        error: {required: '不能为空', regexp: '必须为数字'},
        message: '输入数字',
        success:'输入正确'
    }
});