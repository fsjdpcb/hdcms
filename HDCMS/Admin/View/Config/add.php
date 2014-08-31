<include file="__PUBLIC__/header.php"/>
<body>
<form method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:edit}')">
	<input type="hidden" name="type" value="custom"/>
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="{|U:'edit'}">配置列表</a></li>
                <li><a href="{|U:'add'}" class="action">添加配置</a></li>
            </ul>
        </div>
        <div class="title-header">温馨提示</div>
        <div class="help">
            <ul>
                <li>大部分是二次开发时需要定义配置项</li>
            </ul>
        </div>
        <div class="title-header">
           	 添加模型
        </div>
        <div class="right_content">
            <table class="table1">
            	<tr>
                    <th class="w100">标题</th>
                    <td>
                        <input type="text" name="title" class="w200"/>
                    </td>
                </tr>
                <tr>
                    <th class="w100">变量名(英文)</th>
                    <td>
                        <input type="text" name="name" class="w200"/>
                    </td>
                </tr>
                <tr>
                    <th>配置值</th>
                    <td>
                        <input type="text" name="value" class="w200"/>
                    </td>
                </tr>
                
                <tr>
                    <th>提示信息</th>
                    <td>
                        <textarea name="message" class="w350 h80"></textarea>
                    </td>
                </tr>
                </table>
        </div>
    </div>
    <div class="position-bottom">
        <input type="submit" value="确定" class="hd-success"/>
    </div>
</form>
<script>
	$("form").validate({
		name:{
			rule:{required:true,regexp:/^[a-z]+$/i},
			error:{required:'不能为空',regexp:'必须为英文字母'}
		},
		title:{
			rule:{required:true},
			error:{required:'标题不能为空'}
		}
	});
</script>
</body>
</html>