<include file="__PUBLIC__/header.php"/>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'index'}" class="action">导航列表</a></li>
            <li><a href="{|U:'add',array('pid'=>0)}">添加导航</a></li>
        </ul>
    </div>
    <table class="table2 hd-form form-inline">
        <thead>
        <tr>
            <td class="w50">排序</td>
            <td class="w50">nid</td>
            <td class="w200">菜单名称</td>
            <td>链接</td>
            <td class="w100">打开方式</td>
            <td class="w80">显示</td>
            <td class="w80">操作</td>
        </tr>
        </thead>
        <list from="$navigation" name="n">
            <tr>
                <td>
                    <input type="text" class="w30" value="{$n.list_order}" name="list_order[{$n.nid}]"/>
                </td>
                <td>{$n.nid}</td>
                <td>{$n.title}</td>
                <td>{$n.url}</td>
                <td>{$n.target}</td>
                <td>
                    <if value="$n.status"><font color="red">√</font><else><font color="blue">×</font></if>
                </td>
                <td>
                    <a href="{|U('edit',array('nid'=>$n['nid']))}">修改</a> |
                    <a href="javascript:" onclick="hd_confirm('确认删除吗？',function(){hd_ajax('{|U:del}',{nid:{$n.nid}})})">删除</a>
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
        $.post(CONTROL + "&m=update_order", data, function (data) {
            if (data.state == 1) {
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