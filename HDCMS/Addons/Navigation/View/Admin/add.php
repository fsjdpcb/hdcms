<include file="__PUBLIC__/header.php"/>
<body>
<form method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:index}')">
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="{|U:'index'}">导航列表</a></li>
                <li><a href="{|U:'add',array('pid'=>0)}" class="action">添加导航</a></li>
            </ul>
        </div>
        <div class="title-header">菜单信息</div>
        <table class="table1">
            <tr>
                <td>导航:</td>
                <td>
                    <input type="text" name="title" class="w200"/>
                </td>
            </tr>
            <tr>
                <td>链接Url:</td>
                <td>
                    <input type="text" name="url" class="w300"/>
                </td>
            </tr>
            <tr>
                <td class="w100">打开方式</td>
                <td>
                    <select name="target">
                        <option value="1">当前窗口  _self </option>
                        <option value="2">新窗口  _blank </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>状态:</td>
                <td>
                    <label><input type="radio" name="status" value="1" checked="checked"> 显示</label>
                    <label><input type="radio" name="status" value="0"> 隐藏</label>
                </td>
            </tr>
        </table>
    </div>
    <div class="position-bottom">
        <input type="submit" class="hd-success" value="确定"/>
    </div>
</form>
<script>
    //表单验证
    $("form").validate({
        //验证规则
        title: {
            rule: {
                required: true
            },
            error: {
                required: "不能为空"
            }
        },
        url: {
            rule: {
                required: true
            },
            error: {
                required: '不能为空'
            }
        }
    })
</script>
</body>
</html>