<include file="__PUBLIC__/header.php"/>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'index'}">角色列表</a></li>
            <li><a href="javascript:;" class="action">修改角色</a></li>
        </ul>
    </div>
    <div class="title-header">角色信息</div>
    <form action="{|U:'edit'}" method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:index}')">
        <input type="hidden" name="rid" value="{$field.rid}"/>
        <input type="hidden" name="admin" value="1"/>
        <table class="table1">
            <tr>
                <th class="w100">角色名称</th>
                <td>
                    <input type="text" name="rname" value="{$field.rname}" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">角色描述</th>
                <td>
                    <textarea name="title" class="w300 h100">{$field.title}</textarea>
                </td>
            </tr>
        </table>
        <div class="position-bottom">
            <input type="submit" class="hd-success" value="确定"/>
        </div>
    </form>
</div>
<script>
    //表单验证
    $("form").validate({
        //验证规则
        rname: {
            rule: {
                required: true,
                ajax: {url: CONTROLLER + "&a=checkRole", field: ["rid"]}
            },
            error: {
                required: '角色名称不能为空',
                ajax: "角色已经存在"
            }
        }
    })
</script>
</body>
</html>