<include file="__PUBLIC__/header.php"/>
<body>
<form action="{|U:'edit'}" method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:index}')">
    <input type="hidden" name="cgid" value="{$field.cgid}"/>
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="{|U:'index'}" class="action">配置组列表</a></li>
                <li><a href="{|U:'add'}">添加配置组</a></li>
            </ul>
        </div>
        <div class="title-header">
            添加配置组
        </div>
        <div class="right_content">
            <table class="table1">
                <tr>
                    <th class="w100">组名称</th>
                    <td>
                        <input type="text" name="cgname" class="w200" value="{$field.cgname}"/>
                    </td>
                </tr>
                <tr>
                    <th>组标题</th>
                    <td>
                        <input type="text" name="cgtitle" class="w200" value="{$field.cgtitle}"/>
                    </td>
                </tr>
                <tr>
                    <th>排序</th>
                    <td>
                        <input type="text" name="cgorder" class="w200" value="100" value="{$field.cgorder}"/>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="position-bottom">
        <input type="submit" value="确定" class="hd-success"/>
    </div>
</form>
<js file="__CONTROLLER_VIEW__/js/validate.js"/>
</body>
</html>