<include file="__PUBLIC__/header.php"/>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:index,array('mid'=>$_REQUEST['mid'])}">属性管理</a></li>
            <li><a href="{|U:'add',array('mid'=>$_REQUEST['mid'])}" class="action">添加属性</a></li>
        </ul>
    </div>
    <div class="title-header">添加属性</div>
    <form method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:index,array('mid'=>$_REQUEST['mid'])}');">
        <table class="table1">
            <tr>
                <th class="w100">属性名称</th>
                <td>
                    <input type="text" name="value" class="w200"/>
                </td>
            </tr>
        </table>
        <div class="position-bottom">
            <input type="submit" class="hd-success" value="确定"/>
        </div>
    </form>
</div>
<script>
    $("form").validate({
        //验证规则
        flagname: {
            rule: {
                required: true
            },
            error: {
                required: "属性名不能为空"
            }
        },
        title: {
            rule: {
                required: true
            },
            error: {
                required: "属性别名不能为空"
            }
        }
    })
</script>
</body>
</html>