//＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝模板选择START＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
/**
 * 更换模板
 * @param input_id
 */
function select_template(input_id) {
    $.modal({
        title: '选择模板文件',
        button_cancel: '关闭',
        content: '<iframe frameborder=0 style="height:100%;border:none;" src="' + WEB + '?a=Template&c=Template&m=select_tpl&input_id=' + input_id + '"></iframe>'
    });
}
/**
 * 关闭模板选择窗口
 */
function close_select_template() {
    $.removeModal();
}
//＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝模板选择END＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝


/**
 * 自定义字段验证
 * @param obj 表单
 * @param validataion 验证规则
 * @param msg 默认信息
 * @param error 错误信息
 * @param required 是否必须输入
 */
function field_check(obj, validataion, msg, error, required) {
    //没有验证规则
    if (validataion == '')return;
    //表单值
    var _val = $.trim($(obj).val());
    //提示信息span表单
    var _span = $(obj).next("span");
    $(obj).attr("validation", 1);
    _span.removeClass("validate-error validate-success validate-message");
    //表单为空且为非必填项时返回真
    if (!required && !_val) {
        _span.html(msg).addClass('validate-message');
        return true;
    }
    //验证通过
    if (validataion.test(_val)) {
        $(obj).attr("validation", 1);
        _span.addClass("validate-message");
        _span.text(msg);
    } else {
        $(obj).attr("validation", 0);
        _span.addClass("validate-error").text(error || "输入错误");
    }
}


/**
 * 文件上传
 * @param id    id
 * @param type 上传类型 thumb 缩略图  images多图
 * @param num 上传数量
 * @param name 表单名
 */
function file_upload(id, type, num, name) {
    //多图上传时，判断是否已经超出了允许上传的图片数量
    if(type=='images'){
        num = $('#hd_up_'+id).text()*1;
        if(num==0){
            alert('已经达到上传最大数!');
            return false;
        }
    }
    var url = WEB + "?a=Upload&c=Upload&m=index&id=" + id + "&type=" + type + "&num=" + num + "&name=" + name;
    $.modal({
        title: '文件上传',
        width: 600,
        height: 420,
        content: '<iframe frameborder=0 style="height:100%;border:none;" src="' + url + '"></iframe>'
    });
}
/**
 * 关闭模板选择窗口
 */
function close_file_upload() {
    $.removeModal();
}
//image || images上传图片显示预览
$(function () {
    $("input.images").live("mouseover",function () {
        //添加预览DIV
        if ($("#img_view").length == 0) {
            var div = "<div id='img_view' style='position:absolute;border:solid 5px #dcdcdc;padding:0px;'><img src='' width='205' height='183'/></div>";
            $("body").append(div);
        }
        var offset = $(this).offset();
        var _l = parseInt(offset.left) + 420;
        var _t = parseInt(offset.top) - 50;
        //有上传图片才可以预览
        if ($(this).val())
            $("#img_view").css({left: _l, top: _t}).find("img").attr("src", $(this).attr("src")).end().fadeIn(200);

    }).live("mouseout", function () {
            $("#img_view").hide();
        })
})
//------------------------上传图片处理（自定义表单）-------------------------
//移除缩略图
function remove_thumb(obj,type,id) {
    $(obj).siblings("img").attr("src", ROOT + "/hd/static/img/upload-pic.png");
    $(obj).siblings("input").val('');
}
/**
 * 删除单图上传的图片（自定义字段）
 * @param obj 按钮对象
 */
function remove_upload_one_img(obj) {
    $(obj).parent().find('input').val('').attr('src', '');
}
/**
 * 删除多图上传的图片（自定义字段）
 * @param obj 按钮对象
 */
function remove_upload(obj,id,type) {
    //记录上传数量的span
    var _span =$('#hd_up_'+id);
    _span.text(_span.text()*1+1);
    $(obj).parent().remove();
}
//------------------------上传图片处理（自定义表单）-------------------------