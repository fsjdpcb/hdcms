$("form").validate({
    name: {
        rule: {required: true,regexp:/^[a-z]+$/},
        error: {required: '不能为空'},
        message: '输入小写英文，添加后不可以修改',
        success:'输入正确'
    },
    title: {
        rule: {required: true},
        error: {required: '不能为空'},
        message: '中文标题'
    },
    info: {
        rule: {required: false},
        error: {required: ''},
        message: '只对radio,select表单类型有效，如：1|男,2|女 默认值取1或2'
    }
});