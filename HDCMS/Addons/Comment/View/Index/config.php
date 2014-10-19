<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>配置</title>
    <hdjs/>
</head>
<body>
<form action="{|U:'add'}" method="post" class="hd-form" onsubmit="return hd_submit(this,'{|U:index}')">
    <div class="wrap">
        <div class="menu_list">
            <ul>
                <li>
                    <a href="{|U:'Admin/index'}">
                        广告位
                    </a>
                </li>
                <li>
                    <a href="{|U:'Admin/add'}" class="action">
                        添加广告位
                    </a>
                </li>
                <li>
                    <a href="{|U:'Ad/index'}">
                        所有广告
                    </a>
                </li>
                <li>
                    <a href="{|U:'Ad/add'}">
                        添加广告
                    </a>
                </li>
            </ul>
        </div>
        <div class="title-header">
            添加广告位
        </div>
        <table class="table1">
            <tr>
                <th class="w100">广告位名称</th>
                <td>
                    <input type="text" name="posname" class="w200"/>
                </td>
            </tr>
        </table>
    </div>
    <div class="position-bottom">
        <input type="submit" value="确定" class="hd-success"/>
    </div>
</form>
</body>
</html>