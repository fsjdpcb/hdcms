<include file="__PUBLIC__/header.php"/>
<body>
<form method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:index}')">
    <input type="hidden" name="nid" value="{$field.nid}"/>
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li><a href="{|U:'index'}">导航列表</a></li>
                <li><a href="javascript:;" class="action">修改导航</a></li>
                <li><a href="javascript:hd_ajax('{|U:update_cache}');">更新缓存</a></li>
            </ul>
        </div>
        <div class="title-header">菜单信息</div>
        <table class="table1">
            <tr>
                <td class="w100">上级:</td>
                <td>
                    <select name="pid">
                        <option value="0"> == 一级导航 == </option>
                        <list from="$navigation" name="n">
                            <option value="{$n.nid}" {$n.disabled} {$n.selected}>{$n._name}</option>
                        </list>
                    </select>
                </td>
            </tr>
            <tr>
                <td>导航:</td>
                <td>
                    <input type="text" name="title" class="w200" value="{$field.title}"/>
                </td>
            </tr>
            <tr>
                <td>链接Url:</td>
                <td>
                    <input type="text" name="url" class="w300" value="{$field.url}"/>
                </td>
            </tr>
            <tr>
                <td class="w100">打开方式</td>
                <td>
                    <select name="target">
                        <option value="1" <if value="$field.target==1">selected="selected"</if>>当前窗口  _self </option>
                        <option value="2" <if value="$field.target==2">selected="selected"</if>>新窗口  _blank </option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>状态:</td>
                <td>
                    <label><input type="radio" name="state" value="1" <if value="$field.state==1">checked="checked"</if>> 显示</label>
                    <label><input type="radio" name="state" value="0" <if value="$field.state==0">checked="checked"</if>> 隐藏</label>
                </td>
            </tr>
        </table>
    </div>
    <div class="position-bottom">
        <input type="submit" class="hd-success" value="提交"/>
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