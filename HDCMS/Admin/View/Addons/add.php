<include file="__PUBLIC__/header.php"/>
<body>
<!--onsubmit="return hd_submit(this,'{|U:index}')"-->
<form class="hd-form" method="post">
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li>
                    <a href="{|U:'index'}">插件列表</a>
                </li>
                <li>
                    <a href="{|U:'add'}" class="action">创建插件</a>
                </li>
            </ul>
        </div>

        <div class="title-header">
            创建插件
        </div>
        <table class="table1">
            <tr>
                <th class="w100">标识名</th>
                <td>
                    <input type="text" name="name" class="w200" value="Example"/>
                </td>
            </tr>
            <tr>
                <th class="w100">插件名</th>
                <td>
                    <input type="text" name="title" class="w200" value="示例"/>
                </td>
            </tr>
            <tr>
                <th class="w100">版本</th>
                <td>
                    <input type="text" name="version" class="w200" value="0.1"/>
                </td>
            </tr>
            <tr>
                <th class="w100">作者</th>
                <td>
                    <input type="text" name="author" class="w200" value="无名"/>
                </td>
            </tr>

            <tr>
                <th class="w100">描述</th>
                <td>
                    <textarea name="description" class="w300 h100">这是一个临时描述</textarea>
                </td>
            </tr>
            <tr>
                <th>插件是否有后台</th>
                <td>
                    <label><input type="checkbox" name="has_adminlist" value="1" checked=""/> 有</label>
                </td>
            </tr>
            <tr>
                <th>开启外部访问</th>
                <td>
                    <label><input type="checkbox" name="has_outurl" value="1" checked=""/> 开启</label>
                </td>
            </tr>
            <tr>
                <th>是否需要配置</th>
                <td>
                    <label><input type="checkbox" name="config" value="1" checked=""/> 需要</label>
                </td>
            </tr>
            <tr>
                <th>实现的钩子方法</th>
                <td>
                    <select name="hooks[]" multiple="multiple" size="8" class="w300">
                        <list from="$hooks" name="h">
                            <option value="{$h.name}">{$h.name}</option>
                        </list>
                    </select>
                </td>
            </tr>
        </table>

    </div>
    <div class="position-bottom">
        <input type="submit" value="确定" class="hd-success"/>
    </div>
</form>
<script>
    $("form").va1lidate({
        name: {
            rule: {required: true},
            error: {required: '标识名不能为空'},
            message: '只能是英文开头，且首字母大写，标识只能包含英文、数子、下划线'
        }
    })
</script>
</body>
</html>