$(function () {
    $('form').submit(function () {
        $.post($(this).attr('action'), $('form').serialize(), function (error) {
            if (error==18) {
                location.reload(true);
            } else {
                $('.alert').removeClass('hide').html(error);
            }
        }, 'json');
    })
})