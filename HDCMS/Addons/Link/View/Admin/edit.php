<include file="__PUBLIC__/header.php"/>
<body>
<form method="post" class="hd-form" enctype="multipart/form-data">
    <input type="hidden" name="id" value="{$field.id}"/>
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="{|U:'index'}" class="action">链接列表</a></li>
            </ul>
        </div>
        <div class="title-header">链接信息</div>
        <table class="table1">
            <tr>
                <th class="w100">网站名称:</th>
                <td>
                    <input type="text" name="webname" class="w200" value="{$field.webname}"/>
                </td>
            </tr>
            <tr>
                <th>网址:</th>
                <td>
                    <input type="text" name="url" class="w300" value="{$field.url}"/>
                </td>
            </tr>
            <tr>
                <th>Logo:</th>
                <td>
                    <input type="hidden" name="logo" value="{$field.logo}"/>
                    <input type="file" name="logo"/>
                    <if value="$field.logo">
                        <img src="{$field.logo}" class="w100 h100"/>
                    </if>
                </td>
            </tr>
            <tr>
                <th>站长邮箱:</th>
                <td>
                    <input type="text" name="email" class="w300" value="{$field.email}"/>
                </td>
            </tr>
            <tr>
                <th>站长QQ:</th>
                <td>
                    <input type="text" name="qq" class="w300" value="{$field.qq}"/>
                </td>
            </tr>
            <tr>
                <th>网站介绍:</th>
                <td>
                    <textarea name="comment" class="w300 h100">{$field.comment}</textarea>
                </td>
            </tr>
            <tr>
                <th>状态:</th>
                <td>
                    <label><input type="radio" name="status" value="1" <if value="$field.status eq 1">checked=""</if>> 显示</label>
                    <label><input type="radio" name="status" value="0" <if value="$field.status eq 0">checked=""</if>> 隐藏</label>
                </td>
            </tr>
        </table>
    </div>
    <div class="position-bottom">
        <input type="submit" class="hd-success" value="确定"/>
    </div>
</form>
</body>
</html>