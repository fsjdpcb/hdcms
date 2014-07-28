//点击input表单实现 全选或反选
$(function () {
    //全选
    $("input.select_all").click(function () {
        $("[type='checkbox']").attr("checked", $(this).attr('checked') == 'checked');
    })
})
//全选复选框
function select_all(state) {
    if (state == 1) {
        $("[type='checkbox']").attr("checked", state);
    } else {
        $("[type='checkbox']").attr("checked", function () {
            return !$(this).attr('checked')
        });
    }
}
//指量删除
function BulkDel() {
    if ($("input[type='checkbox']:checked").length == 0) {
        $.dialog({
            message: '请选择文件',
            type: "error"
        });
        return false;
    }
    hd_confirm('确定要删除图片吗？',function(){
        $("form").trigger('submit');
    })
}
//预览图片
function view_image(obj) {
	var src = $(obj).attr('src');
	var viewImg = $('#view_img');
	//删除预览图
	if (viewImg.length >= 1) {
		viewImg.remove();
	}
	//鼠标移除时删除预览图
	$(obj).mouseout(function(){
		$('#view_img').remove();
	})
	if (src) {
		var offset = $(obj).offset();
		var _left = 100+offset.left+"px";
		var _top = offset.top-50+"px";
		var html = '<img src="' + src + '" style="border:solid 5px #dcdcdc;position:absolute;z-index:1000;width:300px;height:200px;left:'+_left+';top:'+_top+';" id="view_img"/>';
		$('body').append(html);
	}
}
