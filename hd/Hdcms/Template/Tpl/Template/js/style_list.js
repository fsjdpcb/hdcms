$(function () {
    $(".tpl-list li").mouseover(function () {
        $(this).addClass("active")
    }).mouseout(function () {
            $(this).removeClass("active")
        })
})

