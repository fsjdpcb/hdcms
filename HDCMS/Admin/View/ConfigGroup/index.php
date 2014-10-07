<include file="__PUBLIC__/header.php"/>
<body>
<div class="wrap">
    <div class="menu_list">
        <ul>
            <li><a href="{|U:'index'}" class="action">配置组列表</a></li>
            <li><a href="{|U:'add'}">添加配置组</a></li>
        </ul>
    </div>
    <table class="table2 hd-form">
        <thead>
            <tr>
                <td class="w50">ID</td>
                <td class="w100">组名</td>
                <td>中文标题</td>
                <td>系统组</td>
                <td class="w80"></td>
            </tr>
        </thead>
        <tbody>
        <list from="$data" name="d">
            <tr>
                <td>{$d.cgid}</td>
                <td>{$d.cgname}</td>
                <td>{$d.cgtitle}</td>
                <td>
                    <if value="$d['system']">
                        <font color="red">√</font>
                        <else>
                            <font color="blue">×</font>
                    </if>
                </td>
                <td>
                    <if value="$d['system']">
                        <span>修改</span> |
                        <span>删除</span>
                    <else>
                        <a href="{|U:'edit',array('cgid'=>$d['cgid'])}">修改</a> |
                        <a href="javascript:hd_confirm('确证删除吗？',function(){hd_ajax(CONTROLLER + '&a=del', {cgid: {$d.cgid}})})">删除</a>
                    </if>
                </td>
            </tr>
        </list>
        </tbody>
    </table>
</div>
</body>
</html>