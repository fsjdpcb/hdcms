/**
 * 表单验证
 */
$(function () {
    $("form").submit(function () {
        if (!validate_form())return false;
    })
})
