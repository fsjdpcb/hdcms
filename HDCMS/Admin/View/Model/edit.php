<include file="__PUBLIC__/header.php"/>
<body>
<form action="{|U:'edit'}" method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:index}')">
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="{|U:'index'}">模型列表</a></li>
                <li><a href="javascript:;" class="action">修改模型</a></li>
            </ul>
        </div>
        <div class="title-header">
            修改模型
        </div>
        <div class="right_content">
            <input type="hidden" name="mid" value="{$field.mid}"/>
            <table class="table1">
                <tr>
                    <th class="w100">模型名称</th>
                    <td>
                        <input type="text" value="{$field.model_name}" name="model_name" class="w200"/>
                    </td>
                </tr>
                <tr>
                    <th>模型描述</th>
                    <td>
                        <textarea name="description" class="w300 h100">{$field.description}</textarea>
                    </td>
                </tr>
                <tr>
                    <th>模型状态</th>
                    <td>
                        <label>
                            <input type="radio" name="enable" value="1" <if value="$field.enable eq 1">checked=""</if>/> 开启模型
                        </label>
                        <label>
                            <input type="radio" name="enable" value="0" <if value="$field.enable eq 0">checked=""</if>/> 关闭模型
                        </label>
                    </td>
                </tr>
                <tr>
                    <th>允许投稿</th>
                    <td>
                        <label>
                            <input type="radio" name="contribute" value="1" <if value="$field.contribute eq 1">checked=""</if>/> 允许投稿
                        </label>
                        <label>
                            <input type="radio" name="contribute" value="0" <if value="$field.contribute eq 0">checked=""</if>/> 禁止投稿
                        </label>
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
		model_name:{
			rule:{required:true,ajax:{url:"{|U:'checkModelName'}",field:['mid']}},
			error:{required:'不能为空',ajax:'已经存在'}
		}
	});
</script>
</body>
</html>