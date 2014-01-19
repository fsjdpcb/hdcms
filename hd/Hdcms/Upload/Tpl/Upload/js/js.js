//----------获得站内图片与未使用图片-----------------
//图片缓存数据
var pic_list = {};
$(function () {
    $("li[lab='site']").click(function () {
        get_pics(ROOT+"/index.php?a=Upload&c=Upload&&m=site", $("div#site"))
    })
    $("li[lab='untreated']").click(function () {
        get_pics(ROOT+"/index.php?a=Upload&c=Upload&&m=untreated", $("div#untreated"))
    })
})
//点击分页
$("div.page1 a").live("click", function () {
    get_pics($(this).attr("href"), $(this).parents("div.hd_tab_content_div").eq(0));
    return false;
})

//异步获得图片列表，站内图片与未使用图片
function get_pics(_url, _div) {
    if (pic_list[_url]) {
        _div.html(pic_list[_url]);
    } else {
        var _html = "";
        $.ajax({
            url: _url,
            success: function (html) {
                pic_list[_url] = html;
                _div.html(pic_list[_url]);
            }
        })
    }
}
//----------获得站内图片与未使用图片-----------------


//选中图片
$("li.upload_thumb").live("click", function () {
    if ($("img", this).attr("selected") == "selected") {
        //反选（原来选中的图片取沙选中)
        $(this).css({"border": "4px solid #fff"}).find("img").removeAttr("selected");
    } else if ($("img[selected='selected']").length >= num) {
        //判断选中数量
        alert("只能选择" + num + "个文件。请取消已经选择的文件后再选择");
    } else {
        //成功选中
        $(this).css({"border": "4px solid #E93614"}).find("img").attr("selected", "selected");
    }
})
//点击确定
$(function () {
    $("#pic_selected").click(function () {
        switch (type) {
            case "thumb":
                //父级IMG标签
                var _p_obj = $(parent.document).find("#" + id);
                //父级input表单
                var _input_obj = $(parent.document).find("[name=" + id + "]");
                //选中的图片
                var _img = $("img[selected='selected']").eq(0);
                //更改父级img标签src值
                _p_obj.attr("src", _img.attr("src"));
                //更改父级input值
                _input_obj.val(_img.attr("path"));
                break;
            //images多图
            case "images":
                var img_div = $(parent.document).find("#" + id);
                //所有选中的图片
                var _img = $("img[selected='selected']");
                var _ul = "<ul>";
                $(_img).each(function (i) {
                    _ul += "<li><input type='text' name='" + name + "[url][]'  value='" + $(_img[i]).attr("path") + "' src='" + $(_img[i]).attr("src") + "' class='w400 images'/> ";
                    _ul += "<input type='text' name='" + name + "[alt][]' class='w200'/>";
                    _ul += " <a href='javascript:;' class='hd-cancel-small' onclick='remove_upload(this,\""+id+"\",\""+type+"\")'>移除</a>";
                    _ul += "</li>";
                })
                _ul = _ul + "</ul>";
                img_div.append(_ul);
                //父窗口中记录数量的span标签
                var _num_span = $(parent.document).find('#hd_up_'+id);
                //更改数量
                _num_span.text(_num_span.text()*1-_img.length);
                break;
            //单图
            case "image":
                var _input_obj = $(parent.document).find("#" + id);
                var _img = $("img[selected='selected']").eq(0);
                _input_obj.val(_img.attr("path"));
                _input_obj.attr("src", _img.attr("src"));
                break;
        }
        close_window();
    })
})
//关闭
function close_window() {
    $(parent.document).find("[class*=modal]").remove();
}




































