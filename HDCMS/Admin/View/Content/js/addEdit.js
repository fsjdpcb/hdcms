//添加或修改文章
$(function() {
	$("form").submit(function() {
		//表单验证
		if ($(this).is_validate()) {
			var _post = $(this).serialize();
			dialog_message("正在发表...", 30);
			$.ajax({
				type : "POST",
				url : ACTION,
				dataType : "JSON",
				cache : false,
				data : _post,
				success : function(data) {
					//关闭提示框
					dialog_message(false);
					if (data.status == 1) {
						$.modal({
							width : 300,
							height : 175,
							button : true,
							title : '消息',
							button_success : "继续操作",
							button_cancel : "关闭窗口",
							message : data.message,
							type : "success",
							success : function() {
								if (window.opener) {
									window.opener.location.reload();
								}
								window.location.reload();
							},
							cancel : function() {
								if (window.opener) {
									window.opener.location.reload();
								}
								window.close();
							}
						})
					} else {//错误
						$.dialog({
							message : data.message,
							type : "error"
						});
					}
				},
				error : function() {
					$.dialog({
						message : "请求超时，请稍候再试",
						type : "error"
					});
				}
			})
		}
		return false;
	})
})
/**
 * 选择颜色
 * @param obj 颜色选择对象，按钮对象
 * @param _input 颜色name=color表单
 */
function selectColor(obj, _input) {
	if ($("div.colors").length == 0) {
		var _div = "<div class='colors' style='width:80px;height:160px;position: absolute;z-index:999;'>";
		//颜色块
		var colors = ["#f00f00", "#272964", "#4C4952", "#74C0C0", "#3B111B", "#147ABC", "#666B7F", "#A95026", "#7F8150", "#F09A21", "#7587AD", "#231012", "#DE745C", "#ED2F8D", "#B57E3E", "#002D7E", "#F27F00", "#B74589"];
		for (var i = 0; i < 16; i++) {
			_div += "<div color='" + colors[i] + "' style='background:" + colors[i] + ";width:20px;height:20px;float:left;cursor:pointer;'></div>"
		}
		_div += "</div>";
		$("body").append(_div);
		$(".colors").css({
			top : $(obj).offset().top + 30,
			left : $(obj).offset().left
		});
	}
	$("div.colors").show();
	$("div.colors div").click(function() {
		$("div.colors").hide();
		var _c = $(this).attr("color");
		$("[name='" + _input + "']").val(_c);
		$("[name='title']").css({
			color : _c
		});
	})
}

//标题颜色
function update_title_color() {
	var title = $("[name='title']").css({
		"color" : $("[name='color']").val()
	});
}

//编辑文章时更改标题颜色
$(function() {
	//更改颜色文本框时
	$("[name='color']").blur(function() {
		update_title_color();
	})
	update_title_color();
})
/**
 * 更换模板
 * @param input_id
 */
function select_template(name) {
	$.modal({
		title : '选择模板文件',
		button_cancel : '关闭',
		width : 650,
		height : 400,
		content : '<iframe frameborder=0 scrolling="no" style="height:99%;border:none;" src="' + MODULE + '&c=TemplateSelect&a=selectTpl&name=' + name + '"></iframe>'
	});
}

/**
 * 关闭模板选择窗口
 */
function close_select_template() {
	$.removeModal();
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
function file_upload(options) {
	//多文件(图片与文件)上传时，判断是否已经超出了允许上传的图片数量
	switch(options.type) {
		case 'thumb':
			var url =WEB + "?m=Admin&c=ContentUpload&a=index&id=" + options.id + "&type=" + options.type + "&num=" + options.num + "&name=" + options.name+'&allow_size='+options.allow_size;
			break;
		case 'image':
			var url = WEB + "?m=Admin&c=ContentUpload&a=index&id=" + options.id + "&type=" + options.type + "&num=" + options.num + "&name=" + options.name+'&allow_size='+options.allow_size;
			break;
		case 'images':
			//span储存的文件数量
			num = $('#hd_up_' + options.id).text() * 1;
			if (num == 0) {
				alert('已经达到上传最大数!');
				return false;
			}
			var url =WEB + "?m=Admin&c=ContentUpload&a=index&id=" + options.id + "&type=" + options.type + "&num=" + num + "&name=" + options.name + "&filetype=" + options.filetype+'&allow_size='+options.allow_size;
			break;
		case 'files':
			num = $('#hd_up_' + options.id).text() * 1;
			if (num == 0) {
				alert('已经达到上传最大数!');
				return false;
			}
			var url = WEB + "?m=Admin&c=ContentUpload&a=index&id=" + options.id + "&type=" + options.type + "&num=" + num + "&name=" + options.name + "&filetype=" + options.filetype+'&allow_size='+options.allow_size;
			break;
	}
	$.modal({
		title : '文件上传',
		width : 650,
		height : 505,
		content : '<iframe frameborder=0 scrolling="no" style="height:100%;border:none;" src="' + url + '"></iframe>'
	});
}

/**
 * 关闭文件上传窗口
 */
function close_file_upload() {
	$.removeModal();
}

//------------------------上传图片处理（自定义表单）-------------------------
//移除缩略图
function remove_thumb(obj, type, id) {
	$(obj).siblings("img").attr("src", APP + "/Static/image/upload_pic.png");
	$(obj).siblings("input").val('');
}

/**
 * 删除单图上传的图片（自定义字段）
 * @param obj 按钮对象
 */
function remove_upload_one_img(obj) {
	$(obj).parent().find('input').val('').attr('src', '');
}

//预览单张图片
function view_image(obj) {
	var src = $(obj).attr('src');
    if(!src)return;
	var id = $(obj).attr('id');
	var viewImg = $('#view_' + id);
	//删除预览图
	if (viewImg.length >= 1) {
		viewImg.remove();
	}
	//鼠标移除时删除预览图
	$(obj).mouseout(function(){
		$('#view_' + id).remove();
	})
	if (src) {
		var offset = $(obj).offset();
		var _left = 320+offset.left+"px";
		var _top = offset.top-75+"px";
		var html = '<img src="' + src + '" style="border:solid 5px #dcdcdc;position:absolute;z-index:1000;height:100px;left:'+_left+';top:'+_top+';" id="view_'+id+'"/>';
		$('body').append(html);
	}
}

/**
 * 删除多图上传的图片（自定义字段）
 * @param obj 按钮对象
 */
function remove_upload(obj, id) {
	//记录上传数量的span
	var _span = $('#hd_up_' + id);
	_span.text(_span.text() * 1 + 1);
	$(obj).parents('li').eq(0).remove();
}