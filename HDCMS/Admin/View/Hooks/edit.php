<include file="__PUBLIC__/header.php"/>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li>
                <a href="{|U:'index'}">钓子列表</a>
            </li>
            <li>
                <a href="{|U:'edit'}" class="action">编辑钓子</a>
            </li>
        </ul>
    </div>
    <form class="hd-form" method="post" onsubmit="return hd_submit(this,'{|U:index}')">
        <input type="hidden" name="id" value="{$field.id}"/>
        <div class="title-header">
            修改钓子
        </div>
        <table class="table1">
            <tr>
                <th class="w100">钩子名称</th>
                <td>
                    <input type="text" name="name" class="w200" value="{$field.name}"/>
                </td>
            </tr>
            <tr>
                <th class="w100">钩子描述</th>
                <td>
                    <textarea name="description" class="w300 h100">{$field.description}</textarea>
                </td>
            </tr>
            <tr>
                <th class="w100">状态</th>
                <td>
                    <label><input type="radio" name="status" value="1" <if value="$field.status eq 1">checked=""</if>/> 开启</label>
                    <label><input type="radio" name="status" value="0" <if value="$field.status eq 0">checked=""</if>/> 关闭</label>
                </td>
            </tr>
            <tr>
                <th>钩子类型</th>
                <td>
                    <select name="type" class="w150">
                        <option value="1" <if value="$field.type eq 1"> checked=""</if>>控制器</option>
                        <option value="2" <if value="$field.type eq 2"> checked=""</if>>视图</option>
                    </select>
                </td>
            </tr>
        </table>
        <div class="position-bottom">
            <input type="submit" value="确定" class="hd-success"/>
        </div>
    </form>
</div>
<script>
    $("form").validate({
        name: {
            rule: {required: true},
            error: {required: '钓子不能为空'},
            message: '需要在程序中先添加钩子，否则无效'
        },
        description: {
            rule: {required: true},
            error: {required: '描述不能为空'},
            message: '钩子的描述信息'
        },
        type: {
            message: '区分钩子的主要用途'
        }
    })
</script>
</body>
</html>