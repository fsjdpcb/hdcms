<include file="__PUBLIC__/header.php"/>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'index'}" class="action">链接列表</a></li>
            <li><a href="{|U:'add'}">添加链接</a></li>
        </ul>
    </div>
    <table class="table2 hd-form form-inline">
        <thead>
        <tr>
            <td class="w50">排序</td>
            <td class="w50">nid</td>
            <td class="w200">网站名称</td>
            <td>网址</td>
            <td class="w300">logo</td>
            <td class="w80">显示</td>
            <td class="w80">操作</td>
        </tr>
        </thead>
        <list from="$data" name="d">
            <tr>
                <td>
                    <input type="text" class="w30" value="{$d.list_order}" name="list_order[{$d.id}]"/>
                </td>
                <td>{$d.id}</td>
                <td>{$d.webname}</td>
                <td>{$d.url}</td>
                <td>
                    <if value="{$d.logo}">
                        <img src="{$d.logo}" class="w50 h50"/>
                    </if>
                </td>
                <td>
                    <if value="$d.status"><font color="red">√</font><else><font color="blue">×</font></if>
                </td>
                <td>
                    <a href="{|U('edit',array('id'=>$d['id']))}">修改</a> |
                    <a href="javascript:" onclick="hd_confirm('确认删除吗？',function(){hd_ajax('{|U:del}',{id:{$d.id}})})">删除</a>
                </td>
            </tr>
        </list>
    </table>
</div>
<div class="position-bottom">
    <input type="button" class="hd-success" value="更改排序" onclick="update_order();"/>
</div>
<script>
    //更改列表排序
    function update_order() {
        var data = $("[name*='list_order']").serialize();
        $.post(CONTROLLER + "&a=update_order", data, function (data) {
            if (data.status == 1) {
                $.dialog({
                    "message":data.message,
                    "type": "success",
                    "close_handler": function () {
                        location.href = URL;
                    }
                });
            } else {
                $.dialog({
                    "message": "排序修改失败",
                    "type": "error"
                });
            }
        },'json')
    }
</script>
</body>
</html>