$("form").validate({
    title: {
        rule: {required: true},
        error: {required: '不能为空'},
        message: '输入任务的中文描述',
        success:'输入正确'
    },
    classname: {
        rule: {required: true},
        error: {required: '不能为空'},
        message: '执行程序必须放在Crontab插件的Soft目录中'
    }
});