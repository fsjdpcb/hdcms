//表单验证
$(function () {
    $("form").validate({
        'set[input_width]': {//文本框宽度
            rule: {
                required: true,
                regexp: /^\d+$/
            },
            error: {
                required: "请输入数字",
                regexp: "请输入数字"
            },
            message: "px"
        },
        'set[upload_img_max_width]': {//图片最大宽度
            rule: {
                required: true,
                regexp: /^\d+$/
            },
            error: {
                required: "请输入数字",
                regexp: "请输入数字"
            },
            message: "px （上传图片超过这个宽度将进行裁切）"
        },
        'set[upload_img_max_height]': {//图片最大高度
            rule: {
                required: true,
                regexp: /^\d+$/
            },
            error: {
                required: "请输入数字",
                regexp: "请输入数字"
            },
            message: "px （上传图片超过这个高度将进行裁切）"
        },
        'set[num]': {//允许上传数量
            rule: {
                required: true,
                regexp: /^\d+$/
            },
            error: {
                required: "请输入数字",
                regexp: "请输入数字"
            },
            message: "个"
        }
    })
})