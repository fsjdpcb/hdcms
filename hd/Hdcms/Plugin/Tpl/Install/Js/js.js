$(function () {
    $('form').submit(function () {
        $.post(METH, $(this).serialize(), function (data) {
            if (data.state == 1) {
                $.dialog({
                    "message": data.message,
                    "type": "success",
                    "close_handler": function () {
                        update_menu(91);
                    }
                });
            }
        },'JSON')
        return false;
    })
})