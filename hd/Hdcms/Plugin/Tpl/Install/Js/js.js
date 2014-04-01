//删除与添加插件
$(function () {
    $('form').submit(function () {
        $.post(METH, $(this).serialize(), function (data) {
            if (data.state == 1) {
                $.dialog({
                    "message": data.message,
                    "type": "success",
                    "close_handler": function () {
                        //更新后台菜单
                        update_menu(91,APP+'&c=Plugin&m=plugin_list');
                    }
                });
            }else{
                $.dialog({
                    "message": data.message,
                    "type": "error",
                    "close_handler": function () {
                        //更新后台菜单
                        update_menu(91,APP+'&c=Plugin&m=plugin_list');
                    }
                });
            }
        }, 'JSON')
        return false;
    })
})