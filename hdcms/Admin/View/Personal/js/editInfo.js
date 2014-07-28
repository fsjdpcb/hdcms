$(function() {
	$("form").validate({
		email : {
			rule : {
				required : true,
				email : true,
				ajax : {
					url : CONTROLLER + "&a=checkEmail",
					field : ['uid']
				}
			},
			error : {
				required : "邮箱不能为空",
				email : '邮箱格式不正确',
				ajax : '邮箱已经使用'
			}
		}
	})
})