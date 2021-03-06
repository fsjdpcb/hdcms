<include file="__PUBLIC__/header.php"/>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'index'}">tag列表</a></li>
            <li><a href="javascript:;" class="action">修改tag</a></li>
        </ul>
    </div>
    <div class="title-header">修改Tag</div>
    <form action="{|U:'edit'}" method="post" onsubmit="return hd_submit(this,'{|U:index}')" class="hd-form">
        <input type="hidden" name="tid" value="{$field.tid}"/>
        <table class="table1">
            <tr>
                <th class="w100">tag</th>
                <td>
                    <input type="text" name="tag" value="{$field.tag}" class="w200"/>
                </td>
            </tr>
            <tr>
                <th class="w100">统计</th>
                <td>
                    <input type="text" name="total" value="{$field.total}" class="w200"/>
                </td>
            </tr>
        </table>
        <div class="position-bottom">
            <input type="submit" class="hd-success" value="确定"/>
        </div>
    </form>
</div>
<script>
    $('form').validate({
        tag: {
            rule: {
                required: true
            },
            error: {
                required: 'tag内容不能为空'
            },
            success: '输入正确'
        },
        total: {
            rule: {
                required: true,
                regexp:/^\d+$/i
            },
            error: {
                required: '统计数不能为空',
                regexp:'统计数输入错误'
            },
            success: '输入正确'
        }
    })
</script>
</body>
</html>