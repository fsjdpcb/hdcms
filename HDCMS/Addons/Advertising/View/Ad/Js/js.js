//添加广告图片
function addAd() {
    var tr = $("tr.pic_list:eq(0)").clone();
    tr.find('input').val('');
    $('#pic').append(tr);
    changeImageInputId();
}
//更新图片Input ID值
function changeImageInputId() {
    //更新ID
    $('tr.pic_list').each(function (i) {
        var id = 'image' + $(this).index();
        $(this).find('input').eq(2).attr('id', id);
    })
}

/**
 * 文件上传
 * @param id 显示图片列表id
 * @param type 类型 images image
 * @param num 数量
 * @param name 表单名
 * @param upload_img_max_width 最大宽度（超过这个尺寸，会进行图片裁切)
 * @param upload_img_max_width 最大高度（超过这个尺寸，会进行图片裁切)
 * @param water 是否加水印
 * @returns {boolean}
 * id, type, num, name, upload_img_max_width, upload_img_max_height
 */
function file_upload(obj) {
    var id = $(obj).prev('input').attr('id');
    options = {"id": id, "type": "image", "num": 1, "name": "image", "allow_size": "2"};
    //多文件(图片与文件)上传时，判断是否已经超出了允许上传的图片数量
    switch (options.type) {
        case 'thumb':
            var url = WEB + "?m=Admin&c=ContentUpload&a=index&id=" + options.id + "&type=" + options.type + "&num=" + options.num + "&name=" + options.name + '&allow_size=' + options.allow_size;
            break;
        case 'image':
            var url = WEB + "?m=Admin&c=ContentUpload&a=index&id=" + options.id + "&type=" + options.type + "&num=" + options.num + "&name=" + options.name + '&allow_size=' + options.allow_size;
            break;
        case 'images':
            //span储存的文件数量
            num = $('#hd_up_' + options.id).text() * 1;
            if (num == 0) {
                alert('已经达到上传最大数!');
                return false;
            }
            var url = WEB + "?m=Admin&c=ContentUpload&a=index&id=" + options.id + "&type=" + options.type + "&num=" + num + "&name=" + options.name + "&filetype=" + options.filetype + '&allow_size=' + options.allow_size;
            break;
        case 'files':
            num = $('#hd_up_' + options.id).text() * 1;
            if (num == 0) {
                alert('已经达到上传最大数!');
                return false;
            }
            var url = WEB + "?m=Admin&c=ContentUpload&a=index&id=" + options.id + "&type=" + options.type + "&num=" + num + "&name=" + options.name + "&filetype=" + options.filetype + '&allow_size=' + options.allow_size;
            break;
    }
    $.modal({
        title: '文件上传',
        width: 650,
        height: 505,
        content: '<iframe frameborder=0 scrolling="no" style="height:100%;border:none;" src="' + url + '"></iframe>'
    });
}

/**
 * 关闭文件上传窗口
 */
function close_file_upload() {
    $.removeModal();
}

/**
 * 删除单图上传的图片（自定义字段）
 * @param obj 按钮对象
 */
function remove_upload_one_img(obj) {
    if ($('.pic_list').length <= 1) {
        alert('必须保留一个图片字段');
        return false;
    } else {
        $(obj).parents('tr').eq(0).remove();
        changeImageInputId();
    }
}

//预览单张图片
function view_image(obj) {
    var src = $(obj).attr('src');
    if (!src)return;
    var id = $(obj).attr('id');
    var viewImg = $('#view_' + id);
    //删除预览图
    if (viewImg.length >= 1) {
        viewImg.remove();
    }
    //鼠标移除时删除预览图
    $(obj).mouseout(function () {
        $('#view_' + id).remove();
    })
    if (src) {
        var offset = $(obj).offset();
        var _left = 320 + offset.left + "px";
        var _top = offset.top - 75 + "px";
        var html = '<img src="' + src + '" style="border:solid 5px #dcdcdc;position:absolute;z-index:1000;height:100px;left:' + _left + ';top:' + _top + ';" id="view_' + id + '"/>';
        $('body').append(html);
    }
}
